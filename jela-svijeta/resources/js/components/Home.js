import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Navigation from './static/Navigation';
import Select from 'react-select'
import ReactDOM from 'react-dom';
import { useParams, useLocation } from 'react-router-dom';
import { URLSearchParamsInit } from 'react-router-dom';
import useFetch from './hooks/useFetch';
import ReactPaginate from 'react-paginate';

const Home = () => {

    //Odredivanje jezika
    const location = useLocation();
    const urlParams = new URLSearchParams(location.search);
    let l = urlParams.get('lang');
    l === null ? l = 'en' : l=l;

    /* Sav state koji koristim. Nisam dobar s reduxom pa sam ga odlucio ne koristiti */
    const [lang, setLang] = useState(l);

    const [showIngredients, setShowIngredients] = useState(false);
    const [showCategory, setShowCategory] = useState(false);
    const [showTags, setShowTags] = useState(false);
    const [showDescription, setShowDescription] = useState(false);

    const [filterCategory, setFilterCategory] = useState(null);
    const [filterTags, setFilterTags] = useState([]);
    const [filterIngredients, setFilterIngredients] = useState([]);
    
    const [currentPage, setCurrentPage] = useState(1);
    const [resultsPerPage, setResultsPerPage] = useState(5);
    const pages = [
        {value: 5, label: 'Results per page: 5'},
        {value: 10, label: 'Results per page: 10'},
        {value: 15, label: 'Results per page: 15'},
        {value: 20, label: 'Results per page: 20'}
    ];

    const [jelaUrl, setJelaUrl] = useState(`/getjela?lang=${lang}&page=${currentPage}&perpage=${resultsPerPage}`);
    const [paramsUrl, setParamsUrl] = useState(`/getparams?lang=${lang}`);

    const { data:jela,  isJelaPending, error:jelaError } = useFetch(jelaUrl);
    const { data:params, isParamsPending, error:paramsError } = useFetch(paramsUrl);
    /* Funkcija koja mi pomaze pri mapiranju raznih komponenti */
    function getListValues(obj) {
        
        let values = [];
        for(const item of obj){
            values.push(item['value']);
        }
        return values;
    }

    /* Funkcija za filtraciju rezultata */
    function filterResults() {
        const urlWithParams = new URL('http://localhost:8000/getjelafiltered');

        urlWithParams.searchParams.append("lang", lang);
        if(filterCategory != null){
            urlWithParams.searchParams.append("category", filterCategory);
        }
        if(filterTags != []){
            urlWithParams.searchParams.append("tags", filterTags);
        }
        if(filterIngredients != []){
            urlWithParams.searchParams.append("ingredients", filterIngredients);
        }

        urlWithParams.searchParams.append("perpage", resultsPerPage);
        urlWithParams.searchParams.append("page", currentPage);

        setJelaUrl(urlWithParams.href);       
    }

    /* Use effect hookovi za promjenu broja stranice */
    useEffect(() => {
        filterResults();
    }, [currentPage]);

    useEffect(() => {
        filterResults();
    }, [resultsPerPage]);

    /* Toggle za opis jela */
    function toggleDesc(id) {
        var div = document.getElementById(id);
        var btn = document.getElementById(`btn-${id}`);
        if (div.style.display === "none") {
            div.style.display = "block";
            btn.className = "bi bi-chevron-up collapseIcon"
        } 
        else {
            div.style.display = "none";
            btn.className = "bi bi-chevron-down collapseIcon"
        }
    }

    /* Funkcija koju Navigation komponenta koristi za promjenu stranice pri promjeni jezika */
    const redirectFunction = (l) => {
        setJelaUrl(`http://localhost:8000/getjelafiltered?lang=${l}`);
        setLang(l);
    }

    function Jela() {
        return (
            <>
                <ul className='list-group padded'>
                    { isJelaPending && <span>Loading...</span> }
                    { jela && jela['jela'].map((jelo) => (
                        jelo && <li className='list-group-item' key={jelo['id']}>
                            <div className="row">
                                <div className="col-10"><h1 className='jeloTitle'>{jelo['title']}</h1></div>
                                <div className="col-2 contentRight">
                                    <i className="bi bi-chevron-down collapseIcon" id={`btn-${jelo['id']}`} onClick={() => toggleDesc(jelo['id'])}></i>
                                </div>
                            </div>
                            
                            {showCategory && 
                                <div>
                                    <p className='descriptor' style={{ paddingRight: "10px" }}>{lang == 'en' ? 'Category: ': 'Kategorija: '} </p>
                                    <p className='categoryText'> {jelo['category']['title']} </p> <br />
                                </div>
                            }
                            {showTags && 
                                <div>
                                    <p className="descriptor" style={{ paddingRight: "45px" }}>{lang == 'en' ? 'Tags: ': 'Tagovi: '} </p>
                                    {jelo['tags'].map((tag) => (
                                    <p key={tag['id']} className='tagText'> {tag['title']} </p>
                                    ))}
                                    <br />
                                </div>
                            }
                            {showIngredients && 
                                <div> 
                                    <p className="descriptor">{lang == 'en' ? 'Ingredients: ': 'Sastojci: '}</p>
                                    {jelo['ingredients'].map((ingredient) => (
                                    <p key={ingredient['id']} className='ingredientText'> {ingredient['title']} </p>
                                ))}
                                <br />
                                </div>
                            }
                                <div className="row description" id={jelo['id']} style={{ display: "none" }}>
                                    <div className='col'><p>{jelo['description']}</p></div>
                                </div>
                        </li>
                    ))}
                </ul>
            </>
        )
    }

    return ( 
        <>
            <Navigation redirectFunction={redirectFunction}/>
            <div className="container-fluid">
            { params && 
                <div className="row padded">
                    {/* Checkboxovi za filtriranje */}
                    <div className="col-md-3 col-sm-12">
                        <Select 
                            options={params['categories'].map((category) => {
                                return { value: category['category_id'], label: category['title'] }
                            })} 
                            onChange={(value) => setFilterCategory(value['value'])} 
                            isSearchable 
                            placeholder={lang === 'en' ? "Select a category" : "Odaberite kategoriju"}
                        />
                    </div>

                    <div className='col-md-3 col-sm-12'>
                        <Select 
                            options={params['ingredients'].map((ingredient) => {
                                return { value: ingredient['ingredient_id'], label: ingredient['title'] }
                            })}  
                            onChange={(value) => setFilterIngredients(getListValues(value))} 
                            isMulti 
                            isSearchable 
                            placeholder={lang === 'en' ? "Select ingredients" : "Odaberite sastojke"}
                        />
                    </div>
            
                    <div className='col-md-3 col-sm-12'>
                        <Select 
                            options={params['tags'].map((tag) => {
                                return { value: tag['tag_id'], label: tag['title'] }
                            })} 
                            onChange={(value) => setFilterTags(getListValues(value))} 
                            isMulti 
                            isSearchable 
                            placeholder={lang === 'en' ? "Select tags" : "Odaberite tagove"}
                        />
                    </div>

                    

                    <div className="col-md-3 col-sm-12 centeredContent">
                    <button type="button" onClick={filterResults} className="btn btn-outline-primary w-50 filterBtn">{ lang === 'en' ? 'Filter' : 'Filtriraj'}</button>
                    </div>

                </div>
            }

            { jela && 
                <>
                    {/* Izbor broja elemenata po stranici */}
                    <div className="row padded-pageselect">
                        <div className="col-sm-12 col-md-2" style={{ textAlign: "left" }}>
                            <Select 
                                options={pages} 
                                onChange={(value) => {
                                    setCurrentPage(1);
                                    setResultsPerPage(value.value);
                                }} 
                                defaultValue={ pages[0] } 
                            />
                        </div>
                        
                        {/* Checkboxovi za prikaz razlicitih komponenti */}
                        <div className='col-sm-12 col-md-3 centeredContent'>
                            
                            <input id='catBox' type="checkbox" className='checkbox-inline chk' onClick={() => setShowCategory(!showCategory)} />
                            <label className='form-check-label labelmargin' htmlFor="catBox"> { lang === 'en' ? "Show categories": "Prikaži kategorije" } </label>
                        </div>

                        <div className='col-sm-12 col-md-3 centeredContent'>
                            <input type="checkbox" className='checkbox-inline' onClick={() => setShowIngredients(!showIngredients)} />
                            <label className='form-check-label labelmargin' htmlFor="ingBox"> { lang === 'en' ? "Show ingredients": "Prikaži sastojke" } </label>
                        </div>

                        <div className='col-sm-12 col-md-3 centeredContent'>
                            <input type="checkbox" className='checkbox-inline' onClick={() => setShowTags(!showTags)} />
                            <label className='form-check-label labelmargin' htmlFor="tagBox"> { lang === 'en' ? "Show tags": "Prikaži tagove" } </label>
                        </div>

                    </div>
                

            
                    <Jela /> {/* Glavna komponenta gdje renderujem sva jela */}

                    {/* Tipke za sljedecu/prethodnu stranicu */}
                    <div className="row padded-btns">
                        <div className="col-md-3 col-sm-6" style={{ textAlign: "left" }}>
                            {currentPage == 1 ? 
                                <button type='button' disabled className="btn btn-primary"> <i className="bi bi-chevron-left"></i> {lang === 'en' ? 'Previous' : 'Prethodna'}</button>
                                : <button type='button' onClick={() => setCurrentPage(currentPage - 1)} className="btn btn-primary"> <i className="bi bi-chevron-left"></i> {lang === 'en' ? 'Previous' : 'Prethodna'}  </button>
                            }
                        </div>
                        <div className="col-md-9 col-sm-6" style={{ textAlign: "right" }}>
                            {jela['jela'].length < resultsPerPage ? 
                                <button type='button' disabled className="btn btn-primary"> {lang === 'en' ? 'Next' : 'Sljedeća'} <i className="bi bi-chevron-right"></i> </button>
                                : <button type='button' onClick={() => setCurrentPage(currentPage + 1)} className="btn btn-primary"> {lang === 'en' ? 'Next' : 'Sljedeća'} <i className="bi bi-chevron-right"></i> </button>
                            }
                            
                        </div>
                    </div>
            </>
            }
            </div>
        </>
    );
}
 
export default Home;