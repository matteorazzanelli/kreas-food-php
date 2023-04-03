<?php
echo http_response_code();

require 'vendor/autoload.php';

require 'core/bootstrap.php';

// die(var_dump($app));

// require Router::load('routes.php')
//   ->direct(Request::uri());

$router = new Router();
require 'routes.php';
$router->direct(Request::uri(), Request::method());

session_destroy();