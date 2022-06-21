import React from "react";
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";
import "./app02.css"
import Child from "./components/Child";


function App() {
    return (

        <Router>
            
            <Link to="/1">param = 1</Link>
            <Link to="/2">param = 2</Link>
            <Link to="/3">param = 3</Link>

            <Switch>
                <Route path="/:id" component={Child} />
            </Switch>

        </Router>

    );
}

export default App;
