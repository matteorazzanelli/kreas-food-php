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
        $order_product = new OrderProductModel($model->getPDO());
        $result = $order_product->sumCO2Total();

        if(!$result) {
          $this->setCode(400);
          return $this->renderApi([
            'result' => 0,
            'page' => 'statistics',
            'message' => 'bad request'
          ]);
        }

        $this->setCode(200);
        return $this->renderApi([
          'result' => $result['total'],
          'page' => 'statistics',
          'message' => 'OK'
        ]);
    }

    public function filter()
    {
      $model = App::get('model');

      // Validate inputs: should exist a specific class to handle them
      $products = $_GET['name'] ?
        $model->getElementFromProperty('products', 'name', $_GET['name']) :
        $model->selectAll('products', 'App\\Models\\ProductModel');

      $orders = $_GET['country'] ?
        $model->getElementFromProperty('orders', 'country', $_GET['country']) :
        $model->selectAll('orders', 'App\\Models\\OrderModel');

      if(!$products || !$orders) {
        $this->setCode(400);
        return $this->renderApi([
          'result' => 0,
          'page' => 'filter',
          'message' => 'bad request'
        ]);
      }

      $order_product = new OrderProductModel($model->getPDO());
      $result = $order_product->sumCO2ByProperty([
        'product' =>  $_GET['name'] ? $products['id'] : false,
        'country' => $_GET['country'] ? $orders['id'] : false,
        'fromDate' => $_GET['start_date'] ?? false,
        'toDate' => $_GET['end_date'] ?? false
      ]);

      $this->setCode(200);
      return $this->renderApi([
        'result' => $result['total'],
        'page' => 'filter',
        'message' => 'OK'
      ]);
    }
}
