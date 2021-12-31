import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import Select from 'react-select'
import { URLSearchParamsInit } from 'react-router-dom';


const Navigation = (props) => {

    const location = useLocation();
    const redirectFunction = props.redirectFunction;
    const urlParams = new URLSearchParams(location.search);
    let lang = urlParams.get('lang');
    lang === null ? lang = 'en' : lang=lang;

    const languages = [
        {value: 'en', label: 'EN'},
        {value: 'hr', label: 'HR'}
    ];


    return ( 
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
            <Link as="a" to="/jela/en" className="navbar-brand" > Jela Svijeta </Link>
            <div className="navbar-nav ml-auto">
                <Select 
                    options={languages}
                    defaultValue={lang === 'en' ? languages[0]: languages[1]}
                    onChange={(value) => redirectFunction(value.value)}
                />
            </div>
        </nav>
    );
}
 
export default Navigation;