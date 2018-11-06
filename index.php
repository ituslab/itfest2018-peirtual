<?php
  require_once __DIR__.'/vendor/autoload.php';
  require_once __DIR__.'/init.php';

  $route = new Bramus\Router\Router();

  $route->get('/', function(){
    view('landing');
  });

  $route->run();
?>
