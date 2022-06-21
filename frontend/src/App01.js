import React from "react";
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";
import About from "./components/About";
import Home from './components/Home';
import "./App01.css"
import Products from "./components/Products";


function App() {
    return (
        <Router>
            <p className={"naglowek"}>ćw 01:React router - simple</p>
            <p>My application</p>
            <div className={"lista"}>
                <Link to="/home">Home</Link>
                <Link to="/about">About</Link>
                <Link to="/products">Products</Link>
            </div>
            <div className={"dolnyDivek"}>
                <Switch>
                    <Route exact path="/home" component={Home} />
                    <Route exact path="/about" component={About} />
                    <Route exact path="/products" component={Products} />
                </Switch>
            </div>
        </Router>
    );
}

export default App;
