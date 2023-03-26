<?php

class Router{

  // public $routes = [];
  protected $routes = [
    'GET'=>[],
    'POST'=>[]
  ];

  public function __construct(){}

  public static function load($file){
    $router = new static; //create a new instance to access routes.php
    require $file;
    return $router;
  }
  // public function define($routes){
  //   $this->routes = $routes;

  // }
  public function get($uri, $controller){
    $this->routes['GET'][$uri] = $controller; // uri is the key in the GET array
  }

  public function post($uri, $controller){
    $this->routes['POST'][$uri] = $controller; // uri is the key in the GET array
  }

  // public function direct($uri){
  //   if(array_key_exists($uri, $this->routes)){
  //     return $this->routes[$uri];
  //   }
  //   throw new Exception('No route defined.');
  // }
  public function direct($uri, $requestType){
    if(array_key_exists($uri, $this->routes[$requestType])){
      return $this->routes[$requestType][$uri];
    }
    throw new Exception('No route defined.');
  }
}