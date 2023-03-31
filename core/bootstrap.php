<?php

// $app = [];

// $app['config'] = require 'config.php';

// // require 'User.php';

// // require 'core/Router.php';
// // require 'core/Request.php';

// // require 'core/database/Connection.php';
// // require 'core/database/QueryBuilder.php';

// $app['database'] = new QueryBuilder(
//   Connection::make($app['config']['database'])
// );

App::bind('config', require 'config.php');
// die(var_dump(App::get('config')));
$config = App::get('config');
App::bind('database', new QueryBuilder(
  Connection::make($config['database'])
));

// header('location: /');
// echo $_SESSION["last_result"];
session_start();
if(!isset($_SESSION["last_result"])){
  $_SESSION["last_result"]='Perform an action';
  $_SESSION["last_http_response"]=200;
}