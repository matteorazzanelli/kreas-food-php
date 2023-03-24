<?php

require 'core/bootstrap.php';

// die(var_dump($app));

// require Router::load('routes.php')
//   ->direct(Request::uri());


$router = new Router();
require 'routes.php';
require $router->direct(Request::uri());