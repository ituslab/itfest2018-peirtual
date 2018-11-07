<?php
/**
 *
 */
class View {
  static function desktop($view){
    self::load(__DIR__."/views/desktop/{$view}.php");
  }

  static function mobile($view){
    self::load(__DIR__."/views/mobile/{$view}.html");
  }

  static function load($file){
    if (file_exists($file)) {
      include_once $file;
    }else {
      die('Request Not Found!');
    }
  }

}

date_default_timezone_set("Asia/Jakarta");
session_start();
