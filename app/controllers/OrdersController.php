<?php

namespace App\Controllers;

use App\Core\{App, Controller};

class OrdersController extends Controller
{
  public function index()
  {
    $model = App::get('model');
    $orders = $model->selectAll('orders', 'App\\Models\\OrderModel');
    $this->setCode(200);
    return $this->renderApi([
      'result' => $orders,
      'page' => 'orders',
      'message' => 'showing complete list'
    ]);
  }

  public function store()
  {
    $model = App::get('model');
    // deve tornare un id così che nel caso manchi il frontend posso mettere in echo quello
    $newOrder = $model->insert('orders', [
      'date' => $_POST['date'],
      'country' => $_POST['country']
    ]);
    $this->setCode(201);
    return $this->renderApi([
      'result' => $newOrder,
      'page' => 'orders',
      'message' => 'new order added with ID'
    ]);
  }

}