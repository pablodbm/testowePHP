import React, { Component } from 'react';
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";

const getLinks=()=>{
    const arr = []
    for(let i=0;i<50;i++){
        arr.push(<Link to={`/${i}`}>param - {i}</Link>)
    }
    return arr
}

class Links extends Component {

    render() {
        return getLinks();
    }
}

export default Links;