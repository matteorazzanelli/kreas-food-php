<?php


$users = $app['database']->selectAll('users', 'User');

require 'views/index.view.php';
