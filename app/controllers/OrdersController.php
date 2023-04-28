<?php

namespace App\Controllers;

use App\Core\{App, Controller};

class OrdersController extends Controller {
  public function index(){
    $model = App::get('model');
    $orders = $model->selectAll('orders', 'App\\Models\\OrderModel');
    if(is_array($orders)){ // if the array is empty it doesn't mean the query is wrong
      $this->setCode(200);
      return $this->renderApi([
        'result' => $orders,
        'page' => 'orders',
        'message' => 'showing complete list'
      ]);
    }
    else{ // if it is not an array it was returned false => bad request! 
      $this->setCode(400);
      return $this->renderApi([
        'result' => [],
        'page' => 'orders',
        'message' => 'bad request'
      ]);
    }
  }

  public function store(){
    $model = App::get('model');
    // deve tornare un id così che nel caso manchi il frontend posso mettere in echo quello
    $newOrder = $model->insert('orders', [
      'date' => $_POST['date'],
      'country' => $_POST['country']
    ]);
    if($newOrder){
      $this->setCode(201);
      return $this->renderApi([
        'result' => $newOrder,
        'page' => 'orders',
        'message' => 'new order added with ID'
      ]);
    }
    else{
      $this->setCode(400);
      return $this->renderApi([
        'result' => [],
        'page' => 'orders',
        'message' => 'may be the order is already added'
      ]);
    }
  }

  public function delete(){
    // die(var_dump($_POST));
    $model = App::get('model');
    $deletedOrder = $model->delete('orders', 'id', $_POST['id']);
    if($deletedOrder){
      $this->setCode(200);
      return $this->renderApi([
        'result' => $_POST['id'],
        'page' => 'orders',
        'message' => 'deleted correctly order '
      ]);
    }
    else{
      $this->setCode(404);
      return $this->renderApi([
        'result' => '-1', // fail
        'page' => 'orders',
        'message' => 'order does not exist'
      ]);
    }
  }

  public function patch(){
    die(var_dump($_POST));
  }
}