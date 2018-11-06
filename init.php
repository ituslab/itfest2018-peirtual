<?php
function view($view){
  $view = __DIR__."/views/{$view}.php";
  if (file_exists($view)) {
    include_once $view;
  }else {
    die('Request Not Found');
  }
}

date_default_timezone_set("Asia/Jakarta");
session_start();
