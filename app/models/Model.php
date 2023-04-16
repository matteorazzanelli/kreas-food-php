<?php

namespace App\Models;

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

    $keys = array_keys($values);
    $fields = implode(",", $keys);
    $placeholder = implode(",", array_map(fn ($key) => ":$key", $keys));
    $query = "INSERT into $table ($fields) VALUES ($placeholder);";
    $statement = $this->pdo->prepare($query);
    foreach ($values as $field => $fieldValue) {
      $statement->bindValue(":$field", $fieldValue);
    }
    $statement->execute();
    // // substitute with bind
    // $sql = sprintf(
    //   'insert into %s (%s) values (%s)',
    //   $table,
    //   implode(', ', array_keys($parameters)),
    //   ':' . implode(', :', array_keys($parameters))
    // );

    // // die(var_dump($sql));

    // try {
    //   $statement = $this->pdo->prepare($sql);
    //   $statement->execute($parameters);
    // } catch (Exception $e) {
    //   //
    // }
    return true;
  }
}