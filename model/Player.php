<?php

class Player {
  private $name = "";
  private $hand = [];
  // private $money = 0;

  public function setName(string $name) {
    $this->name = $name;
  }

  public function getHand() {
    return $this->hand;
  }

  public function getName() {
    return $this->name;
  }

  public function addCard(Card $card) {
    array_push($this->hand, $card);
  }

  public function getValue() {
    $handValue = 0;
    $ace = 0;

    foreach ($this->hand as $card) {
      $value = $card->getValue();

      if (is_numeric($value)) {
        $handValue += intVal($value);
      } else if ($value == 'A') {
        $ace += 1;
      } else {
        $handValue += 10;
      }
    }

    if ($ace > 0) {
      for ($i=0; $i < $ace; $i++) {
        if (($handValue+11) < 21) {
          $handValue += 11;
        } else {
          $handValue += 1;
        }
      }
    }

    return $handValue;
  }
}