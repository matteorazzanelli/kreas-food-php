<?php
namespace App\Models;

use App\Models\Model;

class OrderModel extends Model{

  protected $date;
  protected $country;
  
  public function __construct($pdo){
    parent::__construct($pdo);
  }
}
