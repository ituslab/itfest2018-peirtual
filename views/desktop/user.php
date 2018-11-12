<?php
  use Package\App\Session;
  $token = (Session::get('usertoken')) ? Session::get('usertoken') : '';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title><?= $usernama ?> | User E-PerGi</title>
  </head>
  <body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col s12 m3">
            <div class="row">
              <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" style="width:100%;margin:auto" src="<?= $useravatar ?>">
                </div>
                <div class="card-content">
                  <span class="card-title grey-text text-darken-4">
                    <?= $usernama ?>
                  </span>
                  <p><a href="mailto:<?= $useremail ?>"><?= $useremail ?></a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col s12 m1"></div>
          <div class="col s12 m8">
            <div class="row">
              <ul id="home-tabs" class="tabs tab-demo z-depth-1">
                <li class="tab"><a class="active" href="#profile">Profile <?= $usernama ?></a></li>
                <li class="tab"><a class="active" href="#collections">Koleksi <?= $usernama ?></a></li>
              </ul>
            </div>
            <div class="row content">
              <div id="profile" class="col s12 z-depth-3">
                <div class="section" style="padding: 0 15px">
                  <div class="row section">
                    <div class="input-field col s12">
                      <input disabled value="<?= $usernama ?>" type="text" class="user-edit validate" />
                      <label for="disabled">Nama</label>
                    </div>
                    <div class="input-field col s12">
                      <input disabled value="<?= $username ?>" type="text" class="user-edit validate" />
                      <label for="disabled">Username</label>
                    </div>
                    <p><?= $userdesc ?></p>
                    <div class="divider"></div>
                    <?php if (hash_equals($usertoken, $token)): ?>
                      <div class="section row">
                        <div class="col s12 m4">
                          <button class="btn waves-effect waves-light" type="submit" name="action">
                            <i class="material-icons left">border_color</i>
                            Edit Profile
                          </button>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div id="collections" class="col s12">
                <div class="section" style="padding: 0 15px">
                  <div class="card horizontal z-depth-2">
                    <div class="card-image">
                      <img src="<?= baseurl() ?>/uploads/books/1/cover.jpg">
                    </div>
                    <div class="card-stacked">
                      <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information.</p>
                      </div>
                      <div class="card-action">
                        <a href="#">This is a link</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
  </body>
</html>
