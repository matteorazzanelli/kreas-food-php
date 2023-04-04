<?php

namespace App\Core;

class Request{
  public static function uri(){
    // return trim($_SERVER['REQUEST_URI'],'/');
    // to remove all but arg in e.g. names?name=Matteo
    return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
  }

  public static function method(){
    return $_SERVER['REQUEST_METHOD'];
  }
}