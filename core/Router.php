<?php

namespace App\Core;
use Exception;

class Router{

  protected $routes = [
    'GET'=>[],
    'POST'=>[]
  ];

  public function __construct(){}

  public function load($file){
    require $file;
  }

  public function get($uri, $controller){
    $this->routes['GET'][$uri] = $controller;
  }

  public function post($uri, $controller){
    $this->routes['POST'][$uri] = $controller;
  }

  //Load the requested URI's associated controller method.
  public function direct($uri, $requestType)
  {
    // PageController@home => explode!
    // ... with this each of the item of the array will be converted in 
    // a separated argument !
    if (array_key_exists($uri, $this->routes[$requestType])) {
      return $this->callAction(
        ...explode('@', $this->routes[$requestType][$uri])
      );
    }

    throw new Exception('No route defined for this URI.');
  }

  //Load and call the relevant controller action (i.e. the page)
  protected function callAction($controller, $action)
  {
    $controller = "App\\Controllers\\{$controller}";
    $controller = new $controller;

    if (! method_exists($controller, $action)) {
      throw new Exception(
        "{$controller} does not respond to the {$action} action."
      );
    }

    return $controller->$action();
  }
}