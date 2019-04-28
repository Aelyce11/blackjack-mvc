<?php

require_once 'Player.php';
require_once 'Bank.php';
require_once 'Deck.php';

class Game {
  private $player;
  private $bank;
  private $deck;

  public function __construct() {
    $this->player = new Player();
    $this->bank = new Bank();
    $this->deck = new Deck();
  }

  public function setPlayer($playerName) {
    $this->player->setName($playerName);
  }

  public function firstDeal() {
    $this->player->addCard($this->deck->drawOne());
    $this->player->addCard($this->deck->drawOne());
    $this->bank->addCard($this->deck->drawOne());
  }

  public function getPlayerHand() {
    $hand = $this->player->getHand();
    $sprites = [];
    foreach ($hand as $card) {
      array_push($sprites, $card->getSprite());
    }
    return $sprites;
  }

  public function getBankHand() {
    $hand = $this->bank->getHand();
    $sprites = [];
    foreach ($hand as $card) {
      array_push($sprites, $card->getSprite());
    }
    return $sprites;
  }

  public function getPlayerName() {
    return $this->player->getName();
  }

  public function getPlayerHandValue() {
    return $this->player->getValue();
  }

  public function getBankHandValue() {
    return $this->bank->getValue();
  }

  public function playerDraw() {
    $this->player->addCard($this->deck->drawOne());
  }

  public function autoWinCheck() {
    if ($this->player->getValue() == 21) {
      return 'win';
    } else if ($this->player->getValue() > 21) {
      return 'loose';
    }
  }

  public function bankPlay() {
    while ($this->getBankHandValue() < 17) {
      $this->bank->addCard($this->deck->drawOne());
    }

    if ($this->getBankHandValue() == 21) {
      return 'loose';
    } else if ($this->getBankHandValue() > 21) {
      return 'win';
    } else if ($this->getBankHandValue() > $this->getPlayerHandValue()) {
      return 'loose';
    } else if ($this->getBankHandValue() < $this->getPlayerHandValue()) {
      return 'win';
    } else {
      return 'loose';
    }
  }

  public function save() {
    return [
      'player' => $this->player,
      'bank' => $this->bank,
      'deck' => $this->deck
    ];
  }

  public function load(array $saved) {
    $this->player = $saved['player'];
    $this->bank = $saved['bank'];
    $this->deck = $saved['deck'];
  }
}