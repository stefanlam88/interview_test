import React from 'react'

//card components to be displayed in the result
const Cards = ({ cards, message }) => {
      return (
        <div>
          <center><h1>Player Card List</h1></center>
          Status: {message}
          {cards.map((card, index) => (
            <div className="card" key={index}>
              <div className="card-body">

                {card.player.map((item, i) => (
                  <span key={i}>{ (i ? ',' : '')}{item.card ? item.card : 'No Card'}</span>
                ))}

              </div>
            </div>
          ))}
        </div>
      )
};

export default Cards
