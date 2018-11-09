<?php
  require_once __DIR__.'/vendor/autoload.php';
  require_once __DIR__.'/init.php';

  use Package\App\Session;
  use Bramus\Router\Router;

  $app = new Router();

  $app->get('/', function(){
    View::desktop('landing');
  });

  $app->get('/home', function(){
    if (Session::get('login')){
      View::desktop('home');
      return;
    }
    Session::set('errlogin', 'Anda harus login terlebih dahulu !');
    header('Location:'.baseurl().'/login');
  });

  $app->get('/auth', function(){
    // code...
  });

  $app->get('/login', function(){
    if (!Session::get('login')){
      View::desktop('login');
      return;
    }
    header('Location:'.baseurl().'/home');
  });

  $app->get('/register', function(){
    if (!Session::get('login')){
      View::desktop('register');
      return;
    }
    header('Location:'.baseurl().'/home');
  });

  $app->get('/m', function(){
    View::mobile('index');
  });

  $app->get('/logout', 'Package\Controller\UserController@logout');
  $app->post('/register', 'Package\Controller\UserController@register');
  $app->post('/login', 'Package\Controller\UserController@login');

  $app->run();
?>
