<?php

require 'vendor/autoload.php';

// load env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'core/bootstrap.php';

use App\Core\{Router, Request};

$router = new Router();
$router->load('app/routes.php');
$router->direct(Request::uri(), Request::method());
