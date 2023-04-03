<?php

// $router->define([
//   '' => 'controllers/index.php',
//   'about'=>'controllers/about.php',
//   'about/culture'=>'controllers/about-culture.php',
//   'contact'=>'controllers/contact.php',
//   'names'=>'controllers/add-name.php' 
// ]);

// to call names only for post requests comment out above and then do:
$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');

$router->get('users', 'UsersController@index');
$router->post('users','UsersController@store');

// a questo punto va modificato la classe per dirgli chi è cosa
// (vanno create le funzioni per intenderci)

// echo '<pre>';
// var_dump($router);
// echo '</pre>';
