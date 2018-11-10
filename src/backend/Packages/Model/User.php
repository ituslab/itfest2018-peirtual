<?php

namespace Package\Model;

use Package\Core\Model;

/**
 *
 */
class User {
  private $connection;
  private const table = 'Users';

  public function __construct(){
    $this->connection = Model::connect();
  }

  public function insert($datas = []){
    return $this->connection->insert(self::table, $datas);
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
