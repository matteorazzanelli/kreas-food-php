<?php

// $router->define([
//   '' => 'controllers/index.php',
//   'about'=>'controllers/about.php',
//   'about/culture'=>'controllers/about-culture.php',
//   'contact'=>'controllers/contact.php',
//   'names'=>'controllers/add-name.php' 
// ]);

// to call names only for post requests comment out above and then do:
$router->get('','controllers/index.php');
$router->get('about','controllers/about.php');
$router->get('about/culture','controllers/abot-culture.php');
$router->get('contact','controllers/contact.php');
$router->post('names','controllers/add-name.php');

// a questo punto va modificato la classe per dirgli chi è cosa
// (vanno create le funzioni per intenderci)

// echo '<pre>';
// var_dump($router);
// echo '</pre>';
