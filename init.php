<?php

use Package\App\Session;

class View {
  static function desktop($view){
    self::load(__DIR__."/views/desktop/{$view}.php");
  }

  static function mobile($view){
    self::load(__DIR__."/views/mobile/{$view}.php");
  }

  public function loadData($view, $data = []){
    $file = __DIR__."/views/desktop/{$view}.php";
    if (file_exists($file)) {
      extract($data);
      include_once $file;
    }
    else die('Request Not Found');
  }

  static function load($file){
    if (file_exists($file)) include_once $file;
    else die('Request Not Found');
  }

}

function baseurl(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    ':'.$_SERVER['SERVER_PORT'].'/E-Perpus'
  );
}

function redirect($url){
  if (!headers_sent()){ header('Location: '.$url); exit(); }
  else{
    die(
      '<script type="text/javascript">window.location.href="'.$url.'";</script>
      <noscript><meta http-equiv="refresh" content="0;url='.$url.'" /></noscript>'
    );
  }
}

date_default_timezone_set("Asia/Jakarta");
