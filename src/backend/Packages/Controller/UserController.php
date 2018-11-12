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
    $nama = Input::get('Nama');
    $email = Input::get('Email');
    $pass = password_hash(Input::get('Password'), PASSWORD_DEFAULT);
    $register = $this->controller->insert([
      'Username' => $this->generateAuthKey(),
      'Email' => $email,
      'Password' => $pass,
      'Nama' => $nama,
      'Token' => $this->generateAuthKey(true)
    ]);
    if ($register === true) {
      $data = $this->check('Email', $email);
      $this->setSession($data);
      Session::set('flashmsg', 'Terima kasih sudah bergabung di PerGi, silahkan aktivasi akun anda !');
      redirect(baseurl().'/auth');
      return;
    }
    redirect(baseurl().'/register');
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
    $url = (Session::get('verificationurl')) ? Session::get('verificationurl') : baseurl().'/home';
    if ($data) {
      if (password_verify($pass, $data->Password)) {
        $this->setSession($data);
        redirect($url);
        return;
      }else {
        Session::set('flashmsg', 'Password yang anda masukkan salah !');
      }
    }else {
      Session::set('flashmsg', 'Username atau Email belum terdaftar !');
    }
    redirect(baseurl().'/login');
  }

  public function verify(){
    Session::unset('verificationurl');
    $uname = Input::get('uname');
    $key = Input::get('authkey');
    $check = $this->check('Username', $uname);
    if (hash_equals($check->Token, $key)) {
      $verify = $this->controller->update('Username', $uname, ['Aktivasi' => 'True']);
      if ($verify) {
        Session::set([
          'userauth' => true,
          'flashmsg' => 'Selamat, Akun anda sudah diaktivasi !'
        ]);
        redirect(baseurl().'/home');
        return;
      }else {
        Session::set('flashmsg', 'Terjadi kesalahan saat proses Aktivasi. Silahkan coba lagi nanti !');
      }
    }else {
      Session::set('flashmsg', 'Token Aktivasi invalid. Gagal Aktivasi !');
    }
    redirect(baseurl().'/auth');
  }

  public function showProfile($username){
    $data = $this->check('Username', $username);
    if ($data) {
      view('user', 'desktop', [
        'id' => $data->Id,
        'username' => $data->Username,
        'usernama' => $data->Nama,
        'useremail' => $data->Email,
        'useravatar' => $this->getAvatar($data),
        'userdesc' => $data->Deskripsi,
        'usertoken' => $data->Token
      ]);
    }
  }

  public function edit(){
    $id = Input::get('id');
    $username = Input::get('username');
    $nama = Input::get('nama');
    $deskripsi = Input::get('deskripsi');
    $update = $this->controller->update('Id', $id, [
      'Username' => $username,
      'Nama' => $nama,
      'Deskripsi' => $deskripsi
    ]);
    if ($update) {
      Session::set([
        'username' => $username,
        'usernama' => $nama
      ]);
    }
  }

  private function check($field, $value){
    return $this->controller->get([$field => ['=' => $value]]);
  }

  private function setSession($user){
    Session::set([
      'userlogin' => true,
      'userid' => $user->Id,
      'username' => $user->Username,
      'usernama' => $user->Nama,
      'useremail' => $user->Email,
      'useravatar' => $this->getAvatar($user),
      'userauth' => (strtolower($user->Aktivasi) === 'true') ? true : false,
      'usertoken' => $user->Token,
    ]);
  }

  private function generateAuthKey($hash = false) {
    if ($hash) {
      return hash('gost-crypto', crypt(uniqid(mt_rand().time()), ''));
    } else {
      $length = 15;
      $characters = '0123456789abcdefghijklmnopqrstuvwxyz_';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      if (!$this->check('Username', $randomString)) return $randomString;
      else $this->generateUsername();
    }
  }

  private function getAvatar($user){
    return (isset($user->Avatar)) ? $user->Avatar : "https://www.gravatar.com/avatar/".sha1($user->Email)."?d=monsterid";
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
      $mail->Body = "Silahkan klik link ini untuk mengaktivasi akun anda <a href='{$link}'>{$link}</a>";
      $mail->send();
      Session::set([
        'flashmsg' => 'Kode Aktivasi Sudah dikirim ke &lt;'.Session::get('useremail').'&gt;. Silahkan check email anda.'
      ]);
    }catch(Exception $e) {
      Session::set('flashmsg', 'Terjadi Kesalahan. Gagal mengirim email. Error Status: '.$e->getMessage());
    }
    redirect(baseurl().'/auth');
  }

}


?>
