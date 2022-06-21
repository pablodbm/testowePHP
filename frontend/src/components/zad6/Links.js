import React, { Component } from 'react';
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";

const arr = [7, 3, 5, 6, 10, 20, 2, 1, 11];



class Links extends Component {
    render() {
        return (
            <div>
                {
                    arr.map((item,index)=>(
                        <Link   to={`/divs/${item}`}>param = {item}</Link>
                    ))
                }
            </div>
        );
    }
}

export default Links;