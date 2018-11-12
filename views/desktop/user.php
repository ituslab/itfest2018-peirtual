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
                <li class="tab"><a class="active" href="#profile">Profile <?= substr($usernama, 0, strpos($usernama, " ")); ?></a></li>
                <li class="tab"><a class="active" href="#collections">Koleksi <?= substr($usernama, 0, strpos($usernama, " ")); ?></a></li>
              </ul>
            </div>
            <div class="row content">
              <div id="profile" class="col s12 z-depth-3">
                <div class="section" style="padding: 0 15px">
                  <form method="POST">
                    <div class="row section">
                      <?php if (hash_equals($usertoken, $token)): ?>
                        <div class="input-field col s12">
                          <input disabled id="Id" value="<?= $id ?>" type="text" class="validate" />
                          <label for="Id">ID User</label>
                        </div>
                      <?php endif; ?>
                      <div class="input-field col s12">
                        <input disabled id="Nama" value="<?= $usernama ?>" type="text" class="user-edit validate" />
                        <label for="Nama">Nama</label>
                      </div>
                      <div class="input-field col s12">
                        <input disabled id="Username" value="<?= $username ?>" type="text" class="user-edit validate" />
                        <label for="Username">Username</label>
                      </div>
                      <div class="input-field col s12">
                        <textarea disabled id="Deskripsi" data-length="120" class="user-edit materialize-textarea"><?= $userdesc ?></textarea>
                        <label for="Deskripsi">Deskripsi</label>
                      </div>
                      <div class="divider"></div>
                      <?php if (hash_equals($usertoken, $token)): ?>
                        <div class="section row">
                          <input id="token" type="hidden" name="csrftoken" value="<?= csrftoken(true) ?>">
                          <div class="col s12">
                            <button id="edit-mode" onclick="changeEditMode($(this), event)" class="btn waves-effect waves-light" type="button">
                              <i class="material-icons left">border_color</i>
                              Edit Profile
                            </button>
                            <button onclick="cancelEditMode(event)" style="display: none" id="cancel-edit-mode" class="btn waves-effect waves-light grey" type="button">
                              Cancel
                            </button>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>
                  </form>
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
