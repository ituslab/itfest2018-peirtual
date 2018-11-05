<?php
/**
 *
 */
class Mysql extends Database {
  private static $connection;

  public static function connect(){
    if (!isset(self::$connection)) {
      self::$connection = new parent(Config::DBH, Config::USER, Config::PASS);
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
