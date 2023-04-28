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

  public function update($table, $where_prop, $where_value, $newValues){
    $keys = array_keys($newValues);
    $values = array_values($newValues);
    $placeholder = implode(",", array_map(fn ($key) => "$key=:$key", $keys));
    $query = "UPDATE $table SET $placeholder WHERE $where_prop=:$where_prop;";
    try{
      $st = $this->pdo->prepare($query);
      // bind all paramters
      array_map(fn($key, $value) => $st->bindValue(":$key", $value), $keys, $values);
      $st->bindValue(":$where_prop", $where_value);
      $res = $st->execute(); // is always true
      return ($res && $st->rowCount()>0);
    }
    catch(Exception $e){
      return false;
    }
  }

  public function delete($table, $prop, $value){
    $query = "DELETE FROM $table WHERE $prop=:$prop;";
    try{
      $st = $this->pdo->prepare($query);
      $st->bindValue(":$prop", $value);
      $res = $st->execute(); // is always true
      // to really understand if some rows was deleted
      return ($res && $st->rowCount()>0);
    }
    catch(Exception $e){
      return false;
    }
  }
}