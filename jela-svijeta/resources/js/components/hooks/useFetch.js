import axios from 'axios';
import React, { useState, useEffect } from 'react';

const useFetch = (url) => {

    const [data, setData] = useState(null);
    const [isPending, setIsPending] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const abortController = new AbortController;
        const signal = abortController;
        axios.get(url, {signal})
            .then((response) => {
                setIsPending(false);
                setData(response.data);
                console.log(response.data);
                setError(response.data['error']);
                console.log(response.data['error']);
                console.log(response.data['jela']);

            }).catch((err) =>{
            });
        
        return abortController.abort();
    }, [url]);
    return ( 
        {
            isPending, data, error
        }
    );
}
 
export default useFetch;