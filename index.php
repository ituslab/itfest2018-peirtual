<?php
  require_once __DIR__.'/vendor/autoload.php';
  require_once __DIR__.'/init.php';

  use Bramus\Router\Router;
  use Package\App\Session;
  use Package\App\Input;

  $app = new Router();

  $app->set404(function(){
    http_response_code(404);
    view('404');
  });

  //* Landing Page
  $app->get('/', function(){
    view('landing');
  });

  //* User Dashboard
  $app->get('/home', function(){
    if (Session::get('userauth')) {
      view('home');
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
      view('auth');
      return;
    }
    if (!Session::get('userlogin')) {
      Session::set('flashmsg', 'Anda harus login terlebih dahulu !');
    }
    redirect(baseurl().'/login');
  });

  $app->get('/login', function(){
    if (!Session::get('userlogin')){
      view('login');
      return;
    }
    if (Session::get('userauth')) redirect(baseurl().'/home');
    else redirect(baseurl().'/auth');
  });

  $app->get('/register', function(){
    if (!Session::get('userlogin')){
      view('register');
      return;
    }
    if (Session::get('userauth')) redirect(baseurl().'/home');
    else redirect(baseurl().'/auth');
  });

  $app->get('/m', function(){
    view('index', 'mobile');
  });

  $app->get('/send_verification', (Session::get('userlogin') && !Session::get('userauth')) ? 'Package\Controller\UserController@sendAccountVerification' : function (){
    redirect(baseurl().'/login');
  });

  $app->get('/verification', (Session::get('userlogin') && !Session::get('userauth')) ? 'Package\Controller\UserController@verify' : function (){
    if (!Session::get('userlogin')) {
      Session::set([
        'verificationurl' => requesturl(),
        'flashmsg' => 'Anda harus login terlebih dahulu !'
      ]);
    }
    redirect(baseurl().'/login');
  });

  $app->post('/login', 'Package\Controller\UserController@login');
  $app->post('/register', 'Package\Controller\UserController@register');
  $app->get('/logout', 'Package\Controller\UserController@logout');
  $app->get('/users/(\w+)', 'Package\Controller\UserController@showProfile');
  $app->post('/users/edit', 'Package\Controller\UserController@edit');

  // TEST BOOK
  $app->post('/books/upload', 'Package\Controller\BookController@upload');
  $app->get('/books/(\w+)', 'Package\Controller\BookController@showBook');

  // TEST API
  $app->get('/api/list_all_users', 'Package\Controller\UserController@listAllUsers');
  $app->get('/api/list_all_categories', 'Package\Controller\BookController@listAllCategories');
  $app->get('/api/list_all_books', 'Package\Controller\BookController@listAllBooks');
  $app->post('/api/list_user_collections', 'Package\Controller\BookController@listUserCollections');

  $app->run();
?>
