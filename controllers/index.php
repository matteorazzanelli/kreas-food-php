<?php

var_dump(http_response_code());
var_dump('SESSION : ' . $_SESSION['last_result']);

$users = $app['database']->selectAll('users', 'User');

// do here to divide responsability
// session_start();
// echo http_response_code() . ' ' . $_SESSION['last_result'];


// die();

// if(isset($_REQUEST['content'])){
//   echo 'IS SET';
// }
$content = $_REQUEST['content'];

require 'views/index.view.php';
