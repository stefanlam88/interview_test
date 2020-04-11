<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    public static function shuffled_deck($players)
    {
        $suits = array( 'C', 'H', 'D', 'S' );

        $pips = array( '2', '3', '4', '5', '6', '7', '8', '9', 'T', 'J', 'Q', 'K', 'A' );
        $deck = array();

        foreach($suits as $suit){
          foreach($pips as $pip){
            array_push($deck, $suit.$pip);
          }
        }

        //shuffle on the existing desk to make it random
        shuffle($deck);

        $player_hand = array();
        $card_per_player = floor(sizeOf($deck) / $players);

        //if size of players more than 52, set maximum of 1 player received 1 card
        if($players > sizeOf($deck)){
            $card_per_player = 1;
        }

        $chunk = array_chunk($deck, $players);

        for ($j=0; $j < $players; $j++)
        {
            for ($i=0; $i < $card_per_player; $i++)
            {
              //assigned card deck into the player, if not exist means the latest user cant receive the card, first come first serve,
              //p.s note player means
              if(isset($chunk[$i][$j])){
                $player_hand[$j]['player'][] = array('card' => substr_replace($chunk[$i][$j], '-', 1, 0));
              }
              else{
                $player_hand[$j]['player'][] =  array('card' => '');
              }


            }
        }

        return $player_hand;

    }
}
