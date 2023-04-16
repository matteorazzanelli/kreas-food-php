<?php

require 'vendor/autoload.php';

require 'core/bootstrap.php';

// require Router::load('routes.php')
//   ->direct(Request::uri());

//settaggio delle variabili d'ambiente dal file .env
$Envs= file(__DIR__."/example.env");
foreach($Envs as $Env){
  putenv(trim($Env));
}
$frontend = getenv('FRONTEND');
// echo $frontend;

use App\Core\{Router, Request};

$router = new Router();
require 'app/routes.php';
$router->direct(Request::uri(), Request::method());
