<?php use Package\App\Session; ?>
<div class="navbar-fixed">
  <nav id="nav" class="deep-purple darken-3" role="navigation">
    <div class="nav-wrapper" style="padding: 0 15px">
      <a href="<?= baseurl() ?>/" class="brand-logo">E-Perpus</a>
      <ul class="right hide-on-med-and-down">
        <?php if (!Session::get('login')): ?>
          <li><a href="<?= baseurl() ?>/login">Login</a></li>
          <li><a href="<?= baseurl() ?>/register">Register</a></li>
        <?php else: ?>
          <li><a href="<?= baseurl() ?>/home">Home</a></li>
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
