<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

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

// var_dump($_SESSION);
// var_dump(http_response_code());

// session_start();
$_SESSION["last_result"] =  "Libro creato correttamente.";
$_SESSION["last_http_response"] =  201;
// http_response_code(201);

// var_dump($_POST);
// var_dump(http_response_code());

// die();

// header('Location: /');
// return; 
// header('Location: /');
// http_response_code(201);
// header('Location: index.php', true, 201);
// exit();
// var_dump(http_response_code());

$content = json_encode(array("message" => "Libro jhjgjhvjv correttamente."));
$statusCode = 201;
$type="Content-type:application/json";
$url = '/';
header($type, false, $statusCode);
// header('Location: ' . $url . '?content=' . $content, true, 301);
// http_response_code($statusCode);
// header('Location: /');
header('Location: ' . $url . '?content=' . $content, false, 301);
exit;
// var_dump(headers_list());
// // exit();
// // return;
// die();

// header($type);
// http_response_code(201);
// echo $content;
// echo http_response_code();
// echo http_response_code();

// header("refresh:2;url=/", false, $statusCode);
// header( "url=/index.php" );
// http_response_code($statusCode);
// echo $content;

// exit();


// function redirect($url, $statusCode = 303)
// {
//   header('Location: ' . $url, true, $statusCode);
//   die();
// }

// da manuale: header e poi http_response_code