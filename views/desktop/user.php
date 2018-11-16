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
                <li class="tab"><a id="tab-profile" class="active" href="#profile">Profile <?= substr($usernama, 0, strpos($usernama, " ")); ?></a></li>
                <li class="tab"><a id="tab-collections" class="active" href="#collections">Koleksi <?= substr($usernama, 0, strpos($usernama, " ")); ?></a></li>
                <?php if (hash_equals($usertoken, $token)): ?>
                  <li class="tab"><a id="tab-password" class="active" href="#password">Ganti Password</a></li>
                <?php endif; ?>
              </ul>
            </div>
            <div class="row content">
              <div id="profile" class="col s12 z-depth-3">
                <div class="section" style="padding: 0 15px">
                  <form method="POST" id="form-edit-user">
                    <div class="row section">
                      <?php if (hash_equals($usertoken, $token)): ?>
                        <div class="input-field col s12">
                          <input disabled id="Id" value="<?= $id ?>" type="text" class="validate" />
                          <label for="Id">ID User</label>
                        </div>
                      <?php endif; ?>
                      <div class="input-field col s12">
                        <input disabled id="Nama" name="Nama" value="<?= $usernama ?>" type="text" class="user-edit validate" />
                        <label for="Nama">Nama</label>
                        <div class="error red-text" id="error-Nama"></div>
                      </div>
                      <div class="input-field col s12">
                        <input disabled id="Username" name="Username" value="<?= $username ?>" type="text" class="user-edit validate" />
                        <label for="Username">Username</label>
                        <div class="error red-text" id="error-Username"></div>
                      </div>
                      <div class="input-field col s12">
                        <textarea disabled id="Deskripsi" name="Deskripsi" data-length="200" class="user-edit materialize-textarea"><?= $userdesc ?></textarea>
                        <label for="Deskripsi">Deskripsi</label>
                        <div class="error red-text" id="error-Deskripsi"></div>
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
              <?php if (hash_equals($usertoken, $token)): ?>
                <div id="password" class="col s12 z-depth-3">
                  <div class="section" style="padding: 0 15px">
                    <form method="post" id="edit-user-password" action="<?= baseurl().'/users/changepass' ?>">
                      <div class="row section">
                        <div class="input-field col s12">
                          <input id="OldPassword" name="OldPassword" type="password" class="user-pass validate" />
                          <label for="OldPassword">Password Sekarang</label>
                          <div class="error red-text" id="error-OldPassword">
                            <?php if (Session::get('errmsg')): ?>
                              <?= Session::get('errmsg'); Session::unset('errmsg') ?>
                            <?php endif; ?>
                          </div>
                        </div>
                        <div class="input-field col s12">
                          <input id="NewPassword" name="NewPassword" type="password" class="user-pass validate" />
                          <label for="NewPassword">Password Baru</label>
                          <div class="error red-text" id="error-NewPassword"></div>
                        </div>
                        <div class="input-field col s12">
                          <input id="Password" name="Password" type="password" class="user-pass validate" />
                          <label for="Password">Konfirmasi Password</label>
                          <div class="error red-text" id="error-Password"></div>
                        </div>
                        <div class="divider"></div>
                        <?php if (Session::get('flashmsg')): ?>
                          <div class="row">
                            <div class="col s12">
                              <div class="card-panel teal">
                                <span class="white-text">
                                  <?= Session::get('flashmsg') ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                        <div class="section row">
                          <input id="token" type="hidden" name="csrftoken" value="<?= csrftoken() ?>">
                          <div class="col s12">
                            <button class="btn waves-effect waves-light" type="submit">
                              <i class="material-icons left">https</i>
                              Ganti Password
                            </button>
                            <button class="btn waves-effect waves-light grey" type="reset">
                              Cancel
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              <?php endif; ?>
              <div id="collections" class="col s12">
                <div id="row-collections" class="section" style="padding: 0 15px">
                  <!-- USER COLLECTIONS -->
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
