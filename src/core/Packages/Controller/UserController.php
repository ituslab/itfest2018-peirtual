<?php

namespace Package\Controller;

use Package\Model\User;
use Package\App\Input;

/**
 *
 */
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

  }

  public function check($field, $value){
    $available = $this->controller->get([$field => ['=' => $value]]);
    if (!$available) return true;
    return false;
  }

  public function generateUsername($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    if ($this->check('Username', $randomString)) return $randomString;
    else $this->generateUsername();
  }

}


?>
