<?php

namespace App\Core;
use Exception;

class Model
{
  protected $pdo;

  public function __construct($pdo){
    $this->pdo = $pdo;
  }
  public function selectAll($table, $intoClass){
    $query = "SELECT * FROM $table";
    // all the following instructions can emit a ERRMODE_EXCEPTION
    try{
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      return $statement->fetchAll(\PDO::FETCH_CLASS, $intoClass);
    }
    catch (Exception $e){
      return false;
    }
  }

  public function insert($table, $values){
    $keys = array_keys($values);
    $fields = implode(",", $keys);
    $placeholder = implode(",", array_map(fn ($key) => ":$key", $keys));
    $query = "INSERT into $table ($fields) VALUES ($placeholder);";
    // all the following instructions can emit a ERRMODE_EXCEPTION
    try{
      $statement = $this->pdo->prepare($query);
      foreach ($values as $field => $fieldValue) {
        $statement->bindValue(":$field", $fieldValue);
      }
      $statement->execute();
      // to check if last insert operation is ok
      return $this->pdo->lastInsertId();
    }
    catch (Exception $e){
      return false;
    }
    
  }
}