<?php

// controller is responsible for recevingn request delegating and return a response

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
    $products = $model->selectAll('products', 'App\\Models\\ProductModel');
    $order_product = new OrderProductModel($model->getPDO());
    $sumProducts = 0;
    for($i = 0; $i < count($products); $i++){
      $res = $order_product->sumCO2ByProduct($products[$i]->id);
      $sumProducts += intval($res['sum'])*intval($products[$i]->co2);
    }

    $this->setCode(200);
    return $this->renderApi([
      'result' => $sumProducts,
      'page' => 'statistics',
      'message' => 'total CO2 saved'
    ]);
    
    
    // per ogni prodotto in products

    // (...) as temp;

    // select 

    // // vai in order
    // view('statistics');
  }
}