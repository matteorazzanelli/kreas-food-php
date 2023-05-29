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
        // die(var_dump($result));

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
        $products_quantities = $order_product->sumCO2ByProperty([
          'product' =>  $_GET['name'] ? $products['id'] : false,
          'country' => $_GET['country'] ? $orders['id'] : false,
          'fromDate' => $_GET['start_date'] ?? false,
          'toDate' => $_GET['end_date'] ?? false
        ]);

        $sumProducts = 0;

        foreach($products_quantities as $p_q) {
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

    public function filter()
    {

    }
}
