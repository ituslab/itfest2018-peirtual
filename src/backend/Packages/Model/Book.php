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

  public function get($conditions = [], $fields = '*'){
    return (
      $this->connection
      ->select(self::table, $fields)
      ->where($conditions)
      ->fetch()
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
