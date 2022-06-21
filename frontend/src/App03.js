import React from "react";
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";
import "./app02.css"
import Child from "./components/Child";
import Links from "./components/Links";


function App() {
    return (

        <Router>

            <Links />
            <Switch>
                <Route path="/:id" component={Child} />
            </Switch>

        </Router>

    );
}

export default App;
