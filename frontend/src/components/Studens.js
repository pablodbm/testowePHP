import React, { Component } from 'react';
import Exams from './Exams';

class Studens extends Component {
    constructor(){
        super()
        this.state = {
            score:[],
            name:""
        }
    }
    render() {
        console.log(this.props.data)
        return (
            <div style={{
                display:"flex",
                flexDirection:"row"
            }}>
                <div style={{
                    display:"flex",
                    flexDirection:"column"
                }}>
                    {
                        this.props.data.map((item,index)=>(
                            <div style={{
                                display:"flex",
                                flexDirection:"row",
                                padding:5
                            }} key={index}>
                                <p>{item.name}</p>
                                <button onClick={()=>{
                                    console.log(item)
                                    this.setState({
                                        score:item.scores,
                                        name:item.name
                                    })

                                }} >Zobacz oceny {index}</button>
                            </div>
                        ))
                    }
                </div>
                <Exams score={this.state.score} name={this.state.name}/>
            </div>
            
        
        );
    }
}

export default Studens;