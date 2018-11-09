<?php use Package\App\Session; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title>Home | E-Perpus</title>
  </head>
  <body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="container">
      <h1>Halo, <?= Session::get('usernama'); ?></h1>
    </div>
    <?php include_once 'includes/footer.php' ?>
  </body>
</html>
