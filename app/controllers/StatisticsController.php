<?php

namespace App\Controllers;

use App\Core\{App, Controller};
use App\Models\OrderProductModel;

class StatisticsController extends Controller
{
  // Receive the request

  // Delegate

  // Return a response
  
  public function index()
  {
    $model = App::get('model');

    // Validate inputs: should exist a specific class to handle them
    $products = $_GET['name'] ? 
      $model->getElementFromProperty('products', 'name', $_GET['name']) : 
      $model->selectAll('products', 'App\\Models\\ProductModel');

    $orders = $_GET['country'] ?
      $model->getElementFromProperty('orders', 'country', $_GET['country']) : 
      $model->selectAll('orders', 'App\\Models\\OrderModel');

    $dates = ($_GET['start_date'] && $_GET['end_date']) ||
      (!$_GET['start_date'] && !$_GET['end_date']) ? true : false;

    // hypothesis: dates must be inserted both or none of them 
    if(!$products || !$orders || !$dates){
      $this->setCode(400);
      return $this->renderApi([
        'result' => 0,
        'page' => 'statistics',
        'message' => 'bad request'
      ]);
    }
    
    $order_product = new OrderProductModel($model->getPDO());
    $products_quantities = $order_product->sumCO2ByProperty([
      'product' =>  $_GET['name'] ? $products['id'] : false,
      'country' => $_GET['country'] ? $orders['id'] : false,
      'fromDate' => $_GET['start_date'] ?? false,
      'toDate' => $_GET['end_date'] ?? false
    ]);

    $sumProducts = 0;

    foreach($products_quantities as $p_q){
      $p = $model->getElementFromProperty('products', 'id', $p_q['id']);
      $sumProducts += intval($p_q['sum'])*intval($p['co2']);
    }

    $this->setCode(200);
    return $this->renderApi([
      'result' => $sumProducts,
      'page' => 'statistics',
      'message' => 'OK'
    ]);
    
  }
}