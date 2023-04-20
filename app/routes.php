<?php

// to call names only for post requests comment out above and then do:
$this->get('','PagesController@home');

$this->get('products', 'ProductsController@index');
$this->post('products','ProductsController@store');
