<?php


use App\Core\App;
use App\Core\Model;

App::bind('config', require 'config.php');

$config = App::get('config');
$pdo = Connection::make($config['database']);

// bind to model, it not depends on the specific application
App::bind('model', new Model($pdo));

require 'helpers.php';