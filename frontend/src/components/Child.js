import React, { Component } from 'react';

class Child extends Component {
    render() {
        return (
            <h1>
                Child Page - params: {this.props.match.params.id}
            </h1>
        )
    }
}

export default Child;