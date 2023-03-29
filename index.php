<?php
echo http_response_code();

require 'core/bootstrap.php';

// die(var_dump($app));

// require Router::load('routes.php')
//   ->direct(Request::uri());

$router = new Router();
require 'routes.php';
require $router->direct(Request::uri(), Request::method());

session_destroy();