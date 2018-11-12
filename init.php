<?php

use Package\Middleware\Token;
use Package\App\Session;
use Package\App\Input;

function view($view, $device = 'desktop', $data = []){
  if ($device === 'desktop') $file = __DIR__."/views/desktop/{$view}.php";
  elseif ($device === 'mobile') $file = __DIR__."/views/mobile/{$view}.php";
  else $file = false;
  if (file_exists($file)) {
    if (!empty($data)) extract($data);
    include_once $file;
  }
  else die('Request Not Found');
}

function csrftoken($reset = false){
  if ($reset) {
    Session::set('csrftoken', Token::generate());
  }else if (!Session::get('csrftoken')) {
    Session::set('csrftoken', Token::generate());
  };
  return Session::get('csrftoken');
}

function csrfverify(){
  return Token::verify(csrftoken(), (Input::get('csrftoken')) ? Input::get('csrftoken') : '');
}

function baseurl(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    ':'.$_SERVER['SERVER_PORT'].'/E-Perpus'
  );
}

function requesturl(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    ':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI']
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
