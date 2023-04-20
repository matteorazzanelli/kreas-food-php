<?php

namespace App\Controllers;

use App\Core\App;

class ProductsController
{
  
  /**
   * Show the home page.
   */
  public function index()
  {
    $model = App::get('model');
    $products = $model->selectAll('products', 'App\\Models\\ProductModel');
    // $content = $_REQUEST['content'];
    // require 'views/index.view.php';

    // da orizon
    // resolve()
    //   renderApi($content)
    //     $contentJson = json_encode($content)
    //     $contentType = "Content-type:application/json"
    //     $code = 200
    // send()
    //   header($contentType);
    //   http_response_code($code);
    //   echo $contentJson;
    $contentJson = json_encode($products);
    $contentType = "Content-type:text/html";
    $statusCode = 201;
    header($contentType);
    http_response_code($statusCode);
    echo $contentJson;
    echo getenv('FRONTEND');


    return view('products', [
      'products' => $products,
      'statusCode' => $statusCode
    ]);
  }

  public function store()
  {
    // insert the user associated with the request
    // then, redirect back to all users
    var_dump($_POST);
    App::get('model')->insert('products', [
      'name' => $_POST['name'],
      'co2' => $_POST['co2']
    ]);
    // header('Location: /users');
    return redirect('products');
  }

}

// <?php

// // var_dump(http_response_code());
// // var_dump('SESSION : ' . $_SESSION['last_result']);

// // $responses = parse_http_response_header($http_response_header);
// // $code = $responses[0]['status']['code']; // last status code
// // echo "Status code (after all redirects): $code<br>\n";
// // var_dump($http_response_header);
// // var_dump($_SERVER);

// // with App::bind
// $users = App::get('database')->selectAll('users', 'User');
// // $users = $app['database']->selectAll('users', 'User');

// // do here to divide responsability
// // session_start();
// // echo http_response_code() . ' ' . $_SESSION['last_result'];


// // die();

// // if(isset($_REQUEST['content'])){
// //   echo 'IS SET';
// // }
// $content = $_REQUEST['content'];

// require 'views/index.view.php';

// /**
//  * parse_http_response_header
//  *
//  * @param array $headers as in $http_response_header
//  * @return array status and headers grouped by response, last first
//  */
// // function parse_http_response_header(array $headers)
// // {
// //     $responses = array();
// //     $buffer = NULL;
// //     foreach ($headers as $header)
// //     {
// //         if ('HTTP/' === substr($header, 0, 5))
// //         {
// //             // add buffer on top of all responses
// //             if ($buffer) array_unshift($responses, $buffer);
// //             $buffer = array();

// //             list($version, $code, $phrase) = explode(' ', $header, 3) + array('', FALSE, '');

// //             $buffer['status'] = array(
// //                 'line' => $header,
// //                 'version' => $version,
// //                 'code' => (int) $code,
// //                 'phrase' => $phrase
// //             );
// //             $fields = &$buffer['fields'];
// //             $fields = array();
// //             continue;
// //         }
// //         list($name, $value) = explode(': ', $header, 2) + array('', '');
// //         // header-names are case insensitive
// //         $name = strtoupper($name);
// //         // values of multiple fields with the same name are normalized into
// //         // a comma separated list (HTTP/1.0+1.1)
// //         if (isset($fields[$name]))
// //         {
// //             $value = $fields[$name].','.$value;
// //         }
// //         $fields[$name] = $value;
// //     }
// //     unset($fields); // remove reference
// //     array_unshift($responses, $buffer);

// //     return $responses;
// // }