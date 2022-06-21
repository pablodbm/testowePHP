import React, { Component } from 'react';


class Divs extends Component {
    render() {
       // console.log(this.props)
        return (
            <div>
                {(()=>{
                    const toReturn = []
                    for(let i =0;i<this.props.match.params.id;i++){
                        toReturn.push(<p>{i}</p>)
                    }
                    return toReturn
                })()}
            </div>
        );
    }
}

export default Divs;