<?php

class IndexController {

  public function home(){
    $_SESSION = array();

    include("../view/index/home.php");
  }
}