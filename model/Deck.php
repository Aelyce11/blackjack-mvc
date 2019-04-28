<?php

require 'Card.php';

class Deck {
  protected $cards = [];

  public function __construct() {
    $values = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A');
    $suits  = array('S', 'H', 'D', 'C');

    foreach ($suits as $suit) {
			foreach ($values as $value) {
				array_push($this->cards, new Card($value, $suit));
			}
    }

    $this->shuffleDeck();
  }

  public function shuffleDeck() {
    shuffle($this->cards);
  }

  public function drawOne() {
    return array_shift($this->cards);
  }
}