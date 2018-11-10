<?php use Package\App\Session; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title>Home | E-Perpus</title>
  </head>
  <body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="section">
      <div class="row">
        <ul id="home-tabs" class="tabs tab-demo z-depth-1">
          <li class="tab"><a class="active" href="#feeds">Feeds</a></li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div id="feeds" class="col s12 blue">

      </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
  </body>
</html>
