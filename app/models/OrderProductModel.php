<?php

namespace App\Models;

use App\Core\Model;

class OrderProductModel extends Model
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function storeOrderProduct($idOrder, $products, $quantities, $model)
    {
        // add relation order-product with quantities
        foreach($products as $key=>$value) {
            $productValue = $model->getElementFromProperty('products', 'name', $value);
            if($productValue) {
                // if product exist insert a new record in the orders-products table
                $idOrderProduct = $model->insert('orders_products', [
                  'id_order' => $idOrder,
                  'id_product' => $productValue['id'],
                  'quantity' => $quantities[$key] ?? 1
                ]);
            } else {
                // if product does not exist return false
                return false;
            }
        }
        return true;
    }

    public function updateOrderProduct($idOrder, $products, $quantities, $model)
    {
        // first delete from the table
        $model->delete('orders_products', 'id_order', $idOrder);
        // then add products as new ones
        return $this->storeOrderProduct($idOrder, $products, $quantities, $model);
    }

    public function sumCO2Total()
    {
        $query =
          "SELECT SUM(t.sum*p.co2) as total from 
          (
            SELECT p.id,SUM(quantity) as sum from orders_products as op 
            INNER JOIN products as p ON op.id_product=p.id 
            INNER JOIN orders as o on op.id_order=o.id 
            GROUP BY p.id
          ) t 
          INNER JOIN products as p ON t.id=p.id;";
        $st = $this->pdo->prepare($query);
        $st->execute();
        
        return $st->fetch(\PDO::FETCH_ASSOC);
    } 

    public function sumCO2ByProperty($data)
    {
        extract($data);

        // if data not set, set them to min/today
        if(!$fromDate) {
            $query = "SELECT CAST('1753-1-1' as DATE) as fromDate;";
            $st = $this->pdo->prepare($query);
            $st->execute();
            $res = $st->fetch(\PDO::FETCH_ASSOC);
            $fromDate = $res['fromDate'];
        }

        if(!$toDate){
            $query = "SELECT CAST(CURRENT_TIMESTAMP as DATE) as toDate;";
            $st = $this->pdo->prepare($query);
            $st->execute();
            $res = $st->fetch(\PDO::FETCH_ASSOC);
            $toDate = $res['toDate'];
        }
        
        $query =
          "SELECT SUM(t.sum*p.co2) as total from 
          (
            SELECT p.id,SUM(quantity) as sum from orders_products as op 
            INNER JOIN products as p ON op.id_product=p.id
            INNER JOIN orders as o on op.id_order=o.id WHERE";

        // TODO: handle better the combinations
        if($product) {
            $query = $query . ' p.id=:product_prop';
        }
        if($product && $country) {
            $query = $query . ' AND';
        }
        if($country) {
            $query = $query . ' o.id=:country_prop';
        }
        if(!($product || $country)) {
            $query = $query . ' o.date BETWEEN :from_date AND :to_date';
        }
        else{
            $query = $query . ' AND o.date BETWEEN :from_date AND :to_date';
        }
        
        // close the query
        $query = $query . " GROUP BY p.id
          ) t 
          INNER JOIN products as p ON t.id=p.id;";

        $st = $this->pdo->prepare($query);
        if($product) {
            $st->bindValue(":product_prop", $product);
        }
        if($country) {
            $st->bindValue(":country_prop", $country);
        }
        $st->bindValue(":from_date", $fromDate);
        $st->bindValue(":to_date", $toDate);

        $st->execute();

        return $st->fetch(\PDO::FETCH_ASSOC);
    }
}
