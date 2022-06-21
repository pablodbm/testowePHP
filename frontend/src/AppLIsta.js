import React, { Component } from 'react';
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";
import Studens from './components/Studens';
import students from "./students.json"


class AppLIsta extends Component {
    render() {
        return (
            <div>
                <Router>
                    <Link to="/men">men</Link>
                    <Link to="/women">women</Link>
                    <Link to="/all">all</Link>
                    <Switch>
                        <Route path="/men">
                            <Studens data={students.filter(({name})=>{
                            //    console.log(name.split(' ')[0])
                                const firstName = name.split(' ')[0]
                                return firstName.toLowerCase()[firstName.length-1] !== 'a' 
                            })}/>
                        </Route>
                        <Route path="/women">
                        <Studens data={students.filter(({name})=>{
                            const firstName = name.split(' ')[0]
                                return firstName.toLowerCase()[firstName.length-1] === 'a' 
                            })}/>
                        </Route>
                        <Route path="/all">
                        <Studens data={students}/>
                        </Route>
                    </Switch>
                </Router>
            </div>
        );
    }
}

export default AppLIsta;