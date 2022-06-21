import React, { Component } from 'react';
import MySelect from './MySelect';

const books = [
    { id: 0, name: "hamlet" },
    { id: 1, name: "krzyzacy" },
    { id: 2, name: "lalka" }
]

const cities = [
    { id: 0, name: "Kraków" },
    { id: 1, name: "Warszawa" },
    { id: 2, name: "Gdańsk" },
    { id: 3, name: "Toruń" }
]

class MyForm extends Component {

    constructor() {
        super()
        this.state = {
            selectedBook: 0,
            selectedCity: 0,
            sent: []
        }
    }
    handleSend = (e) => {
        e.preventDefault()
       // window.alert(books[this.state.selectedBook].name,cities[this.state.selectedCity].name)
        this.setState({
            sent:[...this.state.sent,books[this.state.selectedBook].name,cities[this.state.selectedCity].name]
        },()=>{
            window.alert(this.state.sent)
        })
    }
    render() {
        return (
            <div>
                <form>
                    <p>KOmponent myform</p>
                    <MySelect options={books} selectedOption={this.state.selectedBook} handleChange={(index) => {
                        this.setState({
                            selectedBook: index
                        })
                    }} />
                    <MySelect options={cities} selectedOption={this.state.selectedCity} handleChange={(index) => {
                        this.setState({
                            selectedCity: index
                        })
                    }} />
                    <button onClick={this.handleSend}>send</button>

                </form>
            </div>
        );
    }
}

export default MyForm;