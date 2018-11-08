<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title></title>
  </head>
  <body style="background-image: url('https://sutanlab.js.org/assets/img/bg/desk1.jpg')">
    <?php include_once 'includes/navbar.php' ?>
    <div class="section">
      <div class="row">
        <div style="opacity:0.9" class="col s12 m6 offset-m3">
          <div class="card shadow-box brown-text">
            <form action="<?= baseurl() ?>/register" method="POST">
              <div class="card-content">
                <span class="card-title center"><h4>Register</h4></span>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input required id="email" name="Email" type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">https</i>
                    <input required id="password" name="Password" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                </div>
              </div>
              <div class="card-action">
                <input type="submit" class="btn deep-purple darken-2" value="Register">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'includes/scripts.php'; ?>
  </body>
</html>
