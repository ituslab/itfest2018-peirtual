<?php
/**
 *
 */
namespace Package\Core;
use Package\Core\Database;
use Package\Config\Mysql;

class Model extends Database {
  private static $connection;

  public static function connect(){
    if (!isset(self::$connection)) {
      self::$connection = new parent(Mysql::DBH, Mysql::USER, Mysql::PASS);
    }
    return self::$connection;
  }

  public static function connectInfo(){
    return array(
      'host' => Config::SERVER,
      'user' => Config::USER,
      'pass' => Config::PASS,
      'db' => Config::DB
    );
  }

}

?>
