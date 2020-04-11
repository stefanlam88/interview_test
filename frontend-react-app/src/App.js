import React, { Component } from 'react';
import Cards from './components/cards';

class App extends Component {
    constructor(props) {
      super(props);

    }

    state = {
        cards: [],
        pageNum: 4, //default set as 4 players
        message: '' //message to be displayed to indicate correct or incorrect value
    }

    _callPlayingCardsAPI = () => {
        //API URL, temporary hardcode for demo purpose
        fetch('http://playingcard-web-service.localhost.com/api/card?number_users='+this.state.pageNum)
              .then(res => res.json())
              .then((data) => {
                if(data.status){
                  this.setState({ cards: data.data , message: 'Success'})
                }
                else{
                  this.setState({ cards: [], message: data.error})

                }

              })
              .catch(
                //this.setState({ cards: [], message: 'Irregularity occurred'})
              );
    };

    _setNumberUsers = (event) => {
      console.log(event.target.value);
      this.setState({pageNum: event.target.value});
    }

    componentDidMount() {
        this._callPlayingCardsAPI();
    }



      render() {
        return (
          <div className="card">
            <div className="card-body">
              <h5 className="card-title">Number of Players</h5>
              <input className="form-control col-3" value={this.state.pageNum} onChange={this._setNumberUsers}/>
              <button className="col-3 btn-primary mt-2" onClick={() => this._callPlayingCardsAPI()} >Get Cards</button>
              <Cards cards={this.state.cards} message={this.state.message} />
            </div>
          </div>
        );
      }
}

export default App;
