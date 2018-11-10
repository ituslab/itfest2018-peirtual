<?php

namespace Package\Controller;

use Package\Model\User;
use Package\App\Input;
use Package\App\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class UserController {
  private $controller;

  public function __construct(){
    $this->controller = new User();
  }

  public function register(){
    $email = Input::get('Email');
    $pass = password_hash(Input::get('Password'), PASSWORD_BCRYPT);
    return $this->controller->insert([
      'Username' => $this->generateAuthKey(),
      'Email' => $email,
      'Password' => $pass,
      'KodeVerifikasi' => $this->generateAuthKey(10, true)
    ]);
  }

  public function logout(){
    Session::destroy();
    redirect(baseurl().'/login');
  }

  public function login(){
    $uname = Input::get('Uname');
    $pass = Input::get('Password');
    $login = (filter_var($uname, FILTER_VALIDATE_EMAIL)) ? 'Email' : 'Username';
    $data = $this->check($login, $uname);
    if ($data) {
      if (password_verify($pass, $data->Password)) {
        Session::set([
          'userlogin' => true,
          'userid' => $data->Id,
          'username' => $data->Username,
          'usernama' => $data->Nama,
          'useremail' => $data->Email,
          'useravatar' => $data->Avatar,
          'userauth' => (strtolower($data->Verifikasi) === 'true') ? true : false,
          'userauthkey' => $data->KodeVerifikasi,
          'usertoken' => $this->generateAuthKey(10, true)
        ]);
        redirect(baseurl().'/home');
        return;
      }else {
        Session::set('errlogin', 'Password yang anda masukkan salah !');
      }
    }else {
      Session::set('errlogin', 'Username atau Email belum terdaftar !');
    }
    redirect(baseurl().'/login');
  }

  public function verify(){
    $uname = Input::get('uname');
    $key = Input::get('authkey');
    $check = $this->check('Username', $uname);
    if (hash_equals($check->KodeVerifikasi, $key)) {
      $update = $this->controller->update('Username', $uname, [
        'Verifikasi' => 'True'
      ]);
      if ($update) {
        Session::set('userauth', true);
        echo "Akun telah di verifikasi";
      }
    }else {
      echo "kode salah";
    }
  }

  public function check($field, $value){
    return $this->controller->get([$field => ['=' => $value]]);
  }

  public function generateAuthKey($length = 10, $hash = false) {
    $characters = ($hash) ? '0123456789abcdefghijklmnopqrstuvwxyz!?@#$%^&*_' : '0123456789abcdefghijklmnopqrstuvwxyz_';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    if ($hash) return hash('sha256', time().$randomString);
    else {
      if (!$this->check('Username', $randomString)) return $randomString;
      else $this->generateUsername();
    }
  }

  public function sendAccountVerification(){
    $mail = new PHPMailer(true);
    $link = baseurl().'/verification?uname='.Session::get('username').'&authkey='.Session::get('userauthkey');
    try{
      // $mail->SMTPDebug = 2 ;
      $mail->IsSMTP();

      $mail->SMTPSecure = 'ssl';
      $mail->Host = "mail.itpolsri.org";
      // $mail->SMTPDebug = 2;
      $mail->Port = 465;
      $mail->SMTPAuth = true;

      $mail->Username = "admin@itpolsri.org";
      $mail->Password = "tekkompower2016";
      $mail->SetFrom("noreply@eperpus.com", "Sys E-Perpus");
      $mail->AddAddress(Session::get('useremail'), Session::get('usernama'));  //tujuan email
      $mail->isHTML(true);
      $mail->Subject = "Konfirmasi Akun"; //subyek email
      $mail->Body = "Silahkan klik link ini untuk memverifikasi akun anda <a href='{$link}'>{$link}</a>";
      $mail->send();
      echo "berhasil";
    }catch(Exception $e) {
      echo "gagal : ".$e->getMessage();
    }
  }

}


?>
