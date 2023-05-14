<?php
namespace App\Models;

use App\Core\Model;

class OrderProductModel extends Model{
  
  public function __construct($pdo){
    parent::__construct($pdo);
  }

  public function storeOrderProduct($idOrder, $products, $quantities, $model){
    // add relation order-product with quantities
    foreach($products as $key=>$value){
      $productValue = $model->getElementFromProperty('products', 'name', $value);
      if($productValue){
        // if product exist insert a new record in the orders-products table
        $idOrderProduct = $model->insert('orders_products', [
          'id_order' => $idOrder,
          'id_product' => $productValue['id'],
          'quantity' => $quantities[$key] ?? 1
        ]);
      }
      else{
        // if product does not exist return false
        return false;
      }
    }
    return true;
  }

  public function updateOrderProduct($idOrder, $products, $quantities, $model){
    // first delete from the table
    $model->delete('orders_products', 'id_order', $idOrder);
    // then add products as new ones
    return $this->storeOrderProduct($idOrder, $products, $quantities, $model);
  }

  public function sumCO2ByProperty($data){
    extract($data);
    $query = 
      "SELECT p.id,SUM(quantity) as sum from orders_products as op 
      INNER JOIN products as p ON op.id_product=p.id
      INNER JOIN orders as o on op.id_order=o.id";
    
    // TODO: handle better the combinations
    if($product || $country)
      $query = $query . ' WHERE';
    if($product)
      $query = $query . ' p.id=:product_prop';
    if($product && $country)
      $query = $query . ' AND';
    if($country)
      $query = $query . ' o.id=:country_prop';

    if($fromDate && !($product || $country))
      $query = $query . ' WHERE o.date BETWEEN :from_date AND :to_date';
    if($fromDate && ($product || $country))
      $query = $query . ' AND o.date BETWEEN :from_date AND :to_date';

    $query = $query . " GROUP BY p.id;";

    $st = $this->pdo->prepare($query);
    if($product)
      $st->bindValue(":product_prop", $product);
    if($country)
      $st->bindValue(":country_prop", $country);
    if($fromDate){
      $st->bindValue(":from_date", $fromDate);
      $st->bindValue(":to_date", $toDate);
    }
    $st->execute();

    return $st->fetchAll(\PDO::FETCH_ASSOC);
  }
}

