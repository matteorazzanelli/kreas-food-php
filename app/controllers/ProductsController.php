<?php

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

namespace App\Controllers;

use App\Core\{App, Controller};

class ProductsController extends Controller
{
  
  public function index()
  {
    $model = App::get('model');
    $products = $model->selectAll('products', 'App\\Models\\ProductModel');
    if($products){
      $this->setCode(200);
      return $this->renderApi([
        'result' => $products,
        'page' => 'products',
        'message' => 'showing complete list'
      ]);
    }
    else{
      $this->setCode(400);
      return $this->renderApi([
        'result' => [],
        'page' => 'products',
        'message' => 'bad request'
      ]);
    }
  }

  public function store()
  {
    // insert the user associated with the request
    $model = App::get('model');
    $newProduct = $model->insert('products', [
      'name' => $_POST['name'],
      'co2' => $_POST['co2']
    ]);
    if($newProduct){
      $this->setCode(201);
      return $this->renderApi([
        'result' => $newProduct,
        'page' => 'products',
        'message' => 'new product added with ID'
      ]);
    }
    else{
      $this->setCode(400);
      return $this->renderApi([
        'result' => [],
        'page' => 'products',
        'message' => 'may be the product is already added'
      ]);
    }
  }

  public function delete(){
    die(var_dump($_POST));
  }

  public function patch(){
    die(var_dump($_POST));
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