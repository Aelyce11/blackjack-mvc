<?php

require_once '../model/Player.php';
require_once '../model/Bank.php';
require_once '../model/Deck.php';
require_once '../model/Game.php';

class GameController {

  private $game;

  public function new() {

    $this->game = new Game();

    if (isset($_SESSION['savedGame'])) {
      $this->game->load($_SESSION['savedGame']);
    } else if (isset($_POST['player']) && is_string($_POST['player'])) {
      $this->game->setPlayer(htmlspecialchars($_POST['player']));
      $this->game->firstDeal();

      $_SESSION["savedGame"] = $this->game->save();
    } else {
      // include '../view/error.php';
      // return
    }

    if (isset($_POST["draw"])) {
      $this->draw();
    }
    if (isset($_POST["endturn"])) {
      $endgame = $this->game->bankPlay();

      if ($endgame == 'win') {
        $endMessage = 'You win !';
      } else if ($endgame == 'loose') {
        $endMessage = 'You loose !';
      }
    }
    if (isset($_POST["reset"])) {
      $this->reset();
    }

    $playerName = $this->game->getPlayerName();

    $playerHand = $this->game->getPlayerHand();
    $bankHand = $this->game->getBankHand();

    $playerValue = $this->game->getPlayerHandValue();
    $bankValue = $this->game->getBankHandValue();

    if ($this->game->autoWinCheck() == 'win') {
      $endMessage = 'You win !';
    } else if ($this->game->autoWinCheck() == 'loose') {
      $endMessage = 'You loose !';
    }

    include '../view/index/table.php';
  }

  private function draw() {

    $this->game->playerDraw();

    if ($this->game->autoWinCheck() == 'win') {
      $endMessage = 'You win !';
    } else if ($this->game->autoWinCheck() == 'loose') {
      $endMessage = 'You loose !';
    }

    $_SESSION["savedGame"] = $this->game->save();
  }

  public function reset() {
    $name = $this->game->getPlayerName();

    $this->game = new Game();

    $this->game->setPlayer($name);
    $this->game->firstDeal();

    $_SESSION["savedGame"] = $this->game->save();
  }

}