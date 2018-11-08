<?php

namespace Package\Controller;

use Package\Model\User;
use Package\App\Input;
use Package\App\Session;

class UserController {
  private $controller;

  public function __construct(){
    $this->controller = new User();
  }

  public function register(){
    $email = Input::get('Email');
    $pass = \password_hash(Input::get('Password'), PASSWORD_BCRYPT);
    return $this->controller->insert([
      'Username' => $this->generateUsername(),
      'Email' => $email,
      'Password' => $pass
    ]);
  }

  public function login(){
    $uname = Input::get('Uname');
    $pass = Input::get('Password');
    $login = (filter_var($uname, FILTER_VALIDATE_EMAIL)) ? 'Email' : 'Username';
    $data = $this->check($login, $uname);
    if ($data) {
      if (password_verify($pass, $data->Password)) {
        die('Login Berhasil');
        return $data;
      }else {
        Session::set('errlogin', 'Password yang anda masukkan salah !');
      }
    }else {
      Session::set('errlogin', 'Username atau Email belum terdaftar !');
    }
    header('Location: '.baseurl().'/login');
  }

  public function check($field, $value){
    return $this->controller->get([$field => ['=' => $value]]);
  }

  public function generateUsername($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    if (!$this->check('Username', $randomString)) return $randomString;
    else $this->generateUsername();
  }

}


?>
