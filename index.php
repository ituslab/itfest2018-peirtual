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
    if (Session::get('userauth')) {
      View::desktop('home');
    } else {
      Session::set('flashmsg', 'Anda harus memverifikasi akun terlebih dahulu !');
      redirect(baseurl().'/auth');
    }
    if (!Session::get('userlogin')) {
      Session::set('flashmsg', 'Anda harus login terlebih dahulu !');
      redirect(baseurl().'/login');
    }
  });

  $app->get('/auth', function(){
    if (Session::get('userlogin') && !Session::get('userauth')) {
      View::desktop('auth');
      return;
    }
    if (!Session::get('userlogin')) {
      Session::set('flashmsg', 'Anda harus login terlebih dahulu !');
    }
    redirect(baseurl().'/login');
  });

  $app->get('/login', function(){
    if (!Session::get('userlogin')){
      View::desktop('login');
      return;
    }
    if (Session::get('userauth')) redirect(baseurl().'/home');
    else redirect(baseurl().'/auth');
  });

  $app->get('/register', function(){
    if (!Session::get('userlogin')){
      View::desktop('register');
      return;
    }
    if (Session::get('userauth')) redirect(baseurl().'/home');
    else redirect(baseurl().'/auth');
  });

  $app->get('/profile/(\w+)', function($uname) {
    echo 'Ini Profile ' . htmlentities($uname);
  });

  $app->get('/book/(\w+)', function($bookid) {
    echo 'Ini Buku ' . htmlentities($bookid);
  });

  $app->get('/m', function(){
    View::mobile('index');
  });

  $app->get('/send_verification', (Session::get('userlogin') && !Session::get('userauth')) ? 'Package\Controller\UserController@sendAccountVerification' : function (){ redirect(baseurl().'/login'); });
  $app->get('/verification', (Session::get('userlogin') && !Session::get('userauth')) ? 'Package\Controller\UserController@verify' : function (){ redirect(baseurl().'/login'); });
  $app->get('/logout', 'Package\Controller\UserController@logout');
  $app->post('/register', 'Package\Controller\UserController@register');
  $app->post('/login', 'Package\Controller\UserController@login');

  $app->run();
?>
