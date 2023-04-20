<?php

namespace App\Controllers;

use App\Core\App;

class OrdersController
{
  public function index()
  {
    $model = App::get('model');
    $orders = $model->selectAll('orders', 'App\\Models\\OrderModel');

    $contentJson = json_encode($orders);
    $contentType = "Content-type:text/html";
    $statusCode = 201;
    header($contentType);
    http_response_code($statusCode);
    echo $contentJson;
    echo getenv('FRONTEND');


    return view('orders', [
      'orders' => $orders,
      'statusCode' => $statusCode
    ]);
  }

  public function store()
  {
    App::get('model')->insert('orders', [
      'date' => $_POST['date'],
      'country' => $_POST['country']
    ]);
    return redirect('orders');
  }

}