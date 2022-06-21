import React, { Component } from 'react';

class Exams extends Component {

    render() {
        console.log(this.props)
        let sum = 0;
        return (
            <div>
                <p>{this.props.name}</p>

                {this.props.score && this.props.score.map((item, index) => {
                    sum += item.score
                    return <p key={index}>{item.type}:{Math.round(item.score*100)/100}</p>
                })}
                {
                    this.props.score.length > 0 && <p>
                        average:{Math.round(100*sum / this.props.score.length)/100}
                    </p>
                }

            </div>
        );
    }
}

export default Exams;