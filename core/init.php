<?php

spl_autoload_register(function($module){
  $packagePath = __DIR__.'/packages/';
  $notPackages = ['.', '..'];
  $packages = array_diff(scandir($packagePath), $notPackages);
  foreach ($packages as $package) {
    $modulePath = $packagePath.$package;
    if (is_dir($modulePath)) $file = "{$modulePath}/{$module}.php";
    else $file = "{$packagePath}/{$module}.php";
    if (file_exists($file)) { require_once($file); break; }
  }
});

date_default_timezone_set("Asia/Jakarta");
session_start();
