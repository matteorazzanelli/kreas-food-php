<?php

// to call names only for post requests comment out above and then do:
$this->get('','StatisticsController@index');

$this->get('products', 'ProductsController@index');
$this->post('products', 'ProductsController@store');
$this->delete('products', 'ProductsController@delete');
$this->patch('products', 'ProductsController@patch');

$this->get('orders', 'OrdersController@index');
$this->post('orders','OrdersController@store');
$this->delete('orders', 'OrdersController@delete');
$this->patch('orders', 'OrdersController@patch');
