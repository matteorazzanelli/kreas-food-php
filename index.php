<?php

require 'core/bootstrap.php';

$users = $app['database']->selectAll('users', 'User');
// $tasks = $query->selectAll('table-that-does-not-exist', 'Task');

// $tasks = array_map(function ($tasks){
//   return 'foo';
// }, $tasks);

// die(var_dump($tasks));


require 'index.view.php';