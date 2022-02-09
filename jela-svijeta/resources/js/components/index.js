import React from 'react';
import { BrowserRouter as Router, Link, Route, Routes } from 'react-router-dom';
import ReactDOM from 'react-dom';
import Home from './Home';

const Index = () => {

    return ( 
        <Router>
            <Routes>
                <Route exact path="/" element={< Home/>}></Route>
            </Routes>
        </Router>
    );
}
 
export default Index;

if(document.getElementById('index')){
    ReactDOM.render(<Index/>, document.getElementById('index'));
}