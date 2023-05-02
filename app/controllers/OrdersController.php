<?php

namespace App\Controllers;

use App\Core\{App, Controller};
use App\Models\OrderProductModel;

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
    // [
    //   "date" => "01/01/1970", 
    //   "country" => "Italy",    
    //   "products" => ["p1","p2","p3"],
    //   "quantities" => [10,20,30],
    // ];
    $model = App::get('model');

    // TODO: improve validator formatting
    $products = explode(',',trim($_POST['products']," ,"));
    $quantities = explode(',',trim($_POST['quantities']," ,"));

    // return an id for storing products
    $idOrder = $model->insert('orders', [
      'date' => $_POST['date'],
      'country' => $_POST['country']
    ]);

    // first try to add order
    if(!$idOrder){
      $this->setCode(400);
      return $this->renderApi([
        'result' => [],
        'page' => 'orders',
        'message' => 'may be the order is already added'
      ]);
    }

    // then using its id and try to add products in the order
    $order_product = new OrderProductModel();
    $res = $order_product->storeOrderProduct($idOrder, $products, $quantities, $model);
    if(!$res){
      $this->setCode(404);
      // TODO: if storing products fails, delete the entire order
      return $this->renderApi([
        'result' => '-1',
        'page' => 'orders',
        'message' => 'one or more products not found'
      ]);
    }
    else{
      // if we are here, the order has been well processed
      $this->setCode(201);
      return $this->renderApi([
        'result' => $idOrder,
        'page' => 'orders',
        'message' => 'new order added with ID'
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
    $model = App::get('model');
    $updatedOrder = $model->update('orders', 'id', $_POST['id'],[
      'date' => $_POST['date'],
      'country' => $_POST['country']
    ]);
    if($updatedOrder){
      $this->setCode(200);
      return $this->renderApi([
        'result' => $_POST['id'],
        'page' => 'orders',
        'message' => 'updated correctly order '
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
}