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
    if (file_exists($file)) include_once $file;
    else die('Request Not Found');
  }

}

function base_url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}

date_default_timezone_set("Asia/Jakarta");
session_start();
