<?php

class Router{

  public $routes = [];

  public function __construct(){}

  public static function load($file){
    $router = new static; //create a new instance to access routes.php
    require $file;
    return $router;
  }
  public function define($routes){
    $this->routes = $routes;

  }

  public function direct($uri){
    if(array_key_exists($uri, $this->routes)){
      return $this->routes[$uri];
    }
    throw new Exception('No route defined.');
  }
}