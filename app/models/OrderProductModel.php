<?php
namespace App\Models;

use App\Core\Model;

class OrderProductModel extends Model{
  
  public function __construct(){
    /*FIXME: $this->pdo = NULL */
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
}
