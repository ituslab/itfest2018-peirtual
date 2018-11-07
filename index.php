<?php
  require_once __DIR__.'/vendor/autoload.php';
  require_once __DIR__.'/init.php';

  $app = new Bramus\Router\Router();

  $app->get('/', function(){
    View::desktop('landing');
  });

  $app->get('/m', function(){
    View::mobile('index');
  });

  $app->run();
?>
