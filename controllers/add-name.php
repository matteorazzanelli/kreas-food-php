<?php

// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>'; 

// echo '<pre>';
// var_dump($_POST['name']);
// echo '</pre>'; 

// echo '<pre>';
// var_dump($app['database']);
// echo '</pre>'; 

// var_dump('You typed ' . $_POST['name']);

$app['database']->insert('users', [
  'name' => $_POST['name'],
  'completed' => 0
]);

header('Location: /');