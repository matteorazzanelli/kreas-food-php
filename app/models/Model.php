<?php

namespace App\Models;
use Exception;

class Model
{
  protected $pdo;

  public function __construct($pdo){
    $this->pdo = $pdo;
  }
  public function selectAll($table, $intoClass){
    $query = "SELECT * FROM $table";
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll(\PDO::FETCH_CLASS, $intoClass);
  }

  public function insert($table, $values){
    var_dump($values);
    $keys = array_keys($values);
    $fields = implode(",", $keys);
    $placeholder = implode(",", array_map(fn ($key) => ":$key", $keys));
    $query = "INSERT into $table ($fields) VALUES ($placeholder);";

    try{
      $statement = $this->pdo->prepare($query);
      foreach ($values as $field => $fieldValue) {
        $statement->bindValue(":$field", $fieldValue);
      }
      $statement->execute();
    }
    catch (Exception $e){
      
    }
    return true;
  }
}