import React, { Component } from 'react';

class MySelect extends Component {
    render() {
        return (
            <div>
                <select value={this.props.selectedOption} onChange={(e)=>{
                    this.props.handleChange(e.target.value)
                }}>
                    {this.props.options.map((item)=>(
                        <option value={item.id} key={item.id}>{item.name}</option>
                    ))}
                </select>
            </div>
        );
    }
}

export default MySelect;