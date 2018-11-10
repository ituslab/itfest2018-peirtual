<?php use Package\App\Session; ?>
<div class="navbar-fixed">
  <nav id="nav" class="deep-purple darken-3 z-depth-2" role="navigation">
    <div class="nav-wrapper" style="padding: 0 15px">
      <a href="<?= baseurl() ?>/" class="brand-logo">PerGi</a>
      <ul class="right hide-on-med-and-down">
        <?php if (!Session::get('login')): ?>
          <li><a href="<?= baseurl() ?>/login">Login</a></li>
          <li><a href="<?= baseurl() ?>/register">Register</a></li>
        <?php else: ?>
          <li><a href="<?= baseurl() ?>/home">Home</a></li>
          <a class='dropdown-trigger btn deep-purple' href='#' data-target='nav-user-dropdown'><?= Session::get('usernama') ?></a>
          <ul id='nav-user-dropdown' class='dropdown-content'>
            <li><a href="<?= baseurl() ?>/#" class="brown-text">Profile</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a href="<?= baseurl() ?>/logout" class="brown-text">Logout</a></li>
          </ul>
        <?php endif; ?>
      </ul>
      <a id="nav-trigger" href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>



<ul id="nav-mobile" class="sidenav deep-purple darken-3">
  <?php if (!Session::get('login')): ?>
    <li><a class="white-text" href="<?= baseurl() ?>/login">Login</a></li>
    <li><a class="white-text" href="<?= baseurl() ?>/register">Register</a></li>
  <?php else: ?>
    <li><a href="<?= baseurl() ?>/home">Home</a></li>
  <?php endif; ?>
</ul>
