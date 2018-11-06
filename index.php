<?php
  require_once __DIR__.'/vendor/autoload.php';
  require_once __DIR__.'/init.php';

  use Package\Database\Mysql as DB;

  $route = new Bramus\Router\Router;

  $route->get('/', function(){
    view('landing');
  });

  $route->get('/dasboard', function(){
    echo "string";
  });

  $route->run();
?>
