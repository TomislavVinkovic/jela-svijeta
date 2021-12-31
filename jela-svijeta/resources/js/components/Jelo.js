import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';

const Jelo = (id) => {

    const [message, setMessage] = useState(null);
    const [isPending, setIsPending] = useState(true);

    

    useEffect(() => {
        const abortController = new AbortController;
        const signal = abortController;
        axios.get(`/jela/filter`, {signal})
            .then((response) => {
                setIsPending(false);
                //console.log(response);
            }).catch((err) =>{
                console.log(err);
            });
        
        return abortController.abort();
    });

    return ( 
        
        <div>
            { isPending && <div>Loading...</div>}
            
        </div>
     );
}
 
export default Jelo;