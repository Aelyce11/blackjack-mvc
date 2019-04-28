<?php

class Card {
  private $value;
  private $suit;
  private $sprite;

  public function __construct(string $value = "", string $suit = "") {
    $this->value = $value;
    $this->suit = $suit;

    $this->sprite = './resources/cards/' . $value . $suit . '.png';
  }

  public function getValue()  {
    return $this->value;
  }

  // public function getSuite()  {
  //   return $this->suite;
  // }

  public function getSprite()  {
    return $this->sprite;
  }
}