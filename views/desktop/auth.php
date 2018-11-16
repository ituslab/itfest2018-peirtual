<?php
  use Package\App\Session;
  use Package\App\Input;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title>Account Verification | E-Perpus</title>
  </head>
  <body style="background-image: url('https://sutanlab.js.org/assets/img/bg/desk5.jpg')">
    <?php include_once 'includes/navbar.php' ?>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div style="opacity: 0.9" class="card darken-1">
            <div class="card-content brown-text">
              <span class="card-title"><h4>Konfirmasi akunmu.</h4></span>
              <?php if (Session::get('mailmsg')): ?>
                <p><?= Session::get('mailmsg') ?></p>
              <?php else: ?>
                <p>Kamu hampir selesai. Konfirmasi akunmu berikut ini untuk menyelesaikan membuat akun PerGi-mu.</p>
              <?php endif; ?>
            </div>
            <div class="card-action">
              <?php if (Session::get('mailmsg')): ?>
                <a class="teal-text" href="<?= baseurl() ?>/send_verification">Kirim Ulang Kode Verifikasi</a>
              <?php else: ?>
                <a class="teal-text" href="<?= baseurl() ?>/send_verification">Kirim Kode Verifikasi</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'includes/scripts.php' ?>
  </body>
</html>
