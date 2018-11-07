<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include_once 'includes/head.php' ?>
  <title>Login</title>
</head>

<body style="background-image: url('https://sutanlab.js.org/assets/img/bg/desk1.jpg');">
  <?php include_once 'includes/navbar.php' ?>
  <div class="section">
    <div class="row">
      <div style="opacity:0.9" class="col s12 m6 offset-m3">
        <div class="card shadow-box">
          <div class="card-content">
            <span class="card-title black-text center"><h4>Login</h4></span>
            <form>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="username" name="Username" type="text" class="validate">
                  <label for="username">Username or Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">https</i>
                  <input id="password" name="Password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
              </div>
            </form>
          </div>
          <div class="card-action">
            <input type="submit" class="btn deep-purple darken-2" value="Sign In">
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'includes/footer.php'; ?>
</body>
</html>
