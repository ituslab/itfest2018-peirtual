<?php use Package\App\Session; ?>
<div class="navbar-fixed">
  <nav id="nav" class="deep-purple darken-3 z-depth-2" role="navigation">
    <div class="nav-wrapper" style="padding: 0 15px">
      <a href="<?= baseurl() ?>/" class="brand-logo">PerGi</a>
      <ul class="right hide-on-med-and-down">
        <?php if (!Session::get('userlogin')): ?>
          <li><a href="<?= baseurl() ?>/login">Login</a></li>
          <li><a href="<?= baseurl() ?>/register">Register</a></li>
        <?php else: ?>
          <li><a href="<?= baseurl() ?>/home">Home</a></li>
          <li><a class="dropdown-trigger nav-user-avatar" href='#' data-target='nav-user-dropdown'><img class="circle" src="<?= Session::get('useravatar') ?>" /></a></li>
          <ul id='nav-user-dropdown' class='dropdown-content'>
            <?php if (Session::get('userauth')): ?>
              <li><a href="<?= baseurl().'/users/'.Session::get('username'); ?>" class="brown-text">Profile</a></li>
              <li class="divider" tabindex="-1"></li>
            <?php endif; ?>
            <li><a href="<?= baseurl() ?>/logout" class="brown-text">Logout</a></li>
          </ul>
        <?php endif; ?>
      </ul>
      <a id="nav-trigger" href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>


<ul id="nav-mobile" class="sidenav deep-purple darken-3">
  <?php if (!Session::get('userlogin')): ?>
    <li><a class="white-text" href="<?= baseurl() ?>/login">Login</a></li>
    <li><a class="white-text" href="<?= baseurl() ?>/register">Register</a></li>
  <?php else: ?>
    <li>
      <div class="user-view">
        <div class="background">
          <img src="https://materializecss.com/images/office.jpg">
        </div>
        <img class="circle" src="<?= Session::get('useravatar') ?>" />
        <span class="white-text name"><?= Session::get('usernama') ?></span>
        <span class="white-text email"><?= Session::get('useremail') ?></span>
      </div>
    </li>
    <li><a class="white-text" href="<?= baseurl() ?>/home">Home</a></li>
    <?php if (Session::get('userauth')): ?>
      <li><a class="white-text" href="<?= baseurl().'/users/'.Session::get('username'); ?>">Profile</a></li>
      <li class="divider" tabindex="-1"></li>
    <?php endif; ?>
    <li><a class="white-text" href="<?= baseurl() ?>/logout">Logout</a></li>
  <?php endif; ?>
</ul>
