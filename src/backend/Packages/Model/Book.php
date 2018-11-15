<?php
namespace Package\Model;

use Package\Core\Model;

class Book {
  private $connection;
  private const table = 'Books';

  public function __construct(){
    $this->connection = Model::connect();
  }

  public function insert($datas = []){
    return $this->connection->insert(self::table, $datas);
  }

  public function listAll($table = self::table, $fields = '*'){
    return (
      $this->connection
      ->select($table, $fields)
      ->fetchAll()
      ->toJson()
      ->get()
    );
  }

  public function checkId($id){
    return (
      $this->get(['Id' => ['=' => $id]])
    );
  }

  public function showBookJoinCategory($id){
    $query = "SELECT b.*, k.Deskripsi AS KategoriDesc FROM Categories k
      INNER JOIN Books b
      ON k.Id = b.Kategori
      WHERE b.Id = :bookid";

    return (
      $this->connection
      ->query($query, [':bookid' => $id])
      ->fetch()
      ->get()
    );
  }

  public function get($conditions = [], $fields = '*'){
    return (
      $this->connection
      ->select(self::table, $fields)
      ->where($conditions)
      ->fetch()
      ->get()
    );
  }

  public function getAllJson($conditions = [], $fields = '*'){
    return (
      $this->connection
      ->select(self::table, $fields)
      ->where($conditions)
      ->fetchAll()
      ->toJson()
      ->get()
    );
  }

  public function update($field, $value, $set = []){
    return (
      $this->connection
      ->update(self::table, $field, $value, $set)
    );
  }

}


?>
