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
  <body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="container">
      <p><?php var_dump(Session::list()) ?></p>
      <a href="<?= baseurl() ?>/send_verification">Send Verification</a>
    </div>
    <?php include_once 'includes/scripts.php' ?>
  </body>
</html>
