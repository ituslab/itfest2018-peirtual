<?php use Package\App\Session; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title>Register | Peirtual</title>
  </head>
  <body style="background-image: url('https://sutanlab.js.org/assets/img/bg/desk1.jpg')">
    <?php include_once 'includes/navbar.php' ?>
    <div class="section">
      <div class="row">
        <div data-aos="zoom-out" data-aos-duration="800" style="opacity:0.9" class="col s12 m6 offset-m3">
          <div class="card shadow-box brown-text">
            <form id="register-user" action="<?= baseurl() ?>/register" method="POST">
              <div class="card-content">
                <span class="card-title center"><h4>Register</h4></span>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input required id="nama" name="Nama" type="text" class="validate">
                    <label for="nama">Nama</label>
                    <div class="red-text" id="error-Nama"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input required id="email" name="Email" type="email" class="validate">
                    <label for="email">Email</label>
                    <div class="red-text" id="error-Email"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">https</i>
                    <input required id="password" name="Password" type="password" class="validate">
                    <label for="password">Password</label>
                    <div class="red-text" id="error-Password"></div>
                  </div>
                </div>
                <?php if (Session::get('flashmsg')): ?>
                  <div class="row">
                    <div class="col s12">
                      <div class="card-panel red">
                        <span class="white-text">
                          <?= Session::get('flashmsg') ?>
                        </span>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              <div class="card-action">
                <button type="submit" class="btn teal waves-effect waves-light">
                  Register
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'includes/footer.php'; ?>
  </body>
</html>
