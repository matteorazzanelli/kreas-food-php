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

  public function update($table, $prop, $value, $where_prop, $where_value){
    $query = "UPDATE $table SET $prop=:$prop WHERE $where_prop= :$where_prop;";
    try{
      $st = $this->pdo->prepare($query);
      $st->bindValue(":$prop", $value);
      $st->bindValue(":$where_prop", $where_value);
      return $st->execute();
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