import React, { Component } from 'react';
import Button from './Button';

class AppComponent extends Component {
    render() {
        return (
            
            <div className={"appcomponent"}>
                <p>App component</p>
                <Button counter={0}/>
                <Button counter={1}/>
                <Button counter={2}/>
            </div>
        );
    }
}

export default AppComponent;