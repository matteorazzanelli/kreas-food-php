<?php


use App\Core\App;
use App\Models\OrderModel;
use App\Models\ProductModel;

App::bind('config', require 'config.php');

$config = App::get('config');
$pdo = Connection::make($config['database']);

// to do only once
App::bind('orderModel', new OrderModel($pdo));
App::bind('productModel', new ProductModel($pdo));

require 'helpers.php';