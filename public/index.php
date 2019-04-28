<?php

  require_once '../model/Game.php';

  session_start();
  $controller_query = $_GET["controller"] ?? "index";
  $action = $_GET["action"] ?? "home";

  $controllerName = ucfirst($controller_query)."Controller";

  require("../controller/" . $controllerName . ".php");
  $controller = new $controllerName;
  $controller->$action();
