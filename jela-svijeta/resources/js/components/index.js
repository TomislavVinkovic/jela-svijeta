import React from 'react';
import { BrowserRouter as Router, Link, Route, Routes } from 'react-router-dom';
import ReactDOM from 'react-dom';
import Home from './Home';
import Jelo from './Jelo';

const Index = () => {

    return ( 
        <Router>
            <Routes>
                <Route exact path="/jela" element={<Home />}></Route>
                <Route exact path="/jela/:id" element={<Jelo />}></Route>
            </Routes>
        </Router>
    );
}
 
export default Index;

if(document.getElementById('index')){
    ReactDOM.render(<Index/>, document.getElementById('index'));
}