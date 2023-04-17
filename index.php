<?php

require 'vendor/autoload.php';

require 'core/bootstrap.php';

//settaggio delle variabili d'ambiente dal file .env
$Envs= file(__DIR__."/example.env");
foreach($Envs as $Env){
  
  putenv(trim($Env));
}

use App\Core\{Router, Request};

$router = new Router();
$router->load('app/routes.php');
// require 'app/routes.php';
$router->direct(Request::uri(), Request::method());
