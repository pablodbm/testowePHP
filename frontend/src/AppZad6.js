import React, { Component } from 'react';
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";
import Links from './components/zad6/Links';
import Divs from './components/zad6/Divs';
class AppZad6 extends Component {
    render() {
        return (
            <Router>
                    {/* <Link to="/men">men</Link> */}
                    <Links/>
                    <Switch>
                        <Route  path="/divs/:id" component={Divs} /> 
                    </Switch>
                </Router>
        );
    }
}

export default AppZad6;