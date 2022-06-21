import React, { Component } from 'react';

class Button extends Component {
    constructor(props) {
        super(props)
        this.state = { a: this.props.counter }
        //this.click = this.click.bind(this)
    }
    click = () => {
        alert(this.state.a)
    }
    render() {
        return (
            <div className={'butki'}>
                <p>button component</p>
                <button className={"jedenButek"} onClick={this.click}>klik button</button>
            </div>
        );
    }
}

export default Button;