<?php use Package\App\Session; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title><?= $Judul ?> | Peirtual</title>
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
                  <img class="activator" style="width:100%;margin:auto" src="<?= $Cover ?>">
                </div>
                <div class="card-content">
                  <span><p class="grey-text text-darken-4"><b><?= $Judul ?></b></p></span>
                  <br />
                  <p>By : <a id="username=uploader" href="<?= baseurl()."/users/{$Diupload}" ?>"><?= $Diupload ?></a></p>
                </div>
                <div class="card-action">
                  <a class="teal-text" target="_blank" href="<?= baseurl()."/{$Buku}" ?>"><i class="material-icons">file_download</i>Download Buku</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col s12 m1"></div>
          <div class="col s12 m8">
            <div class="row">
              <ul id="home-tabs" class="tabs tab-demo z-depth-1">
                <li class="tab"><a class="active" href="#collections">Detail Buku</a></li>
              </ul>
            </div>
            <div class="row content">
              <div class="col s12 z-depth-3">
                <div class="section" style="padding: 0 15px">
                  <div class="row section">
                    <div class="input-field col s12">
                      <input readonly id="Judul" value="<?= $Judul ?>" type="text" class="user-edit grey-text" />
                      <label for="Judul">Judul</label>
                    </div>
                    <div class="input-field col s12">
                      <input readonly id="Penulis" value="<?= $Penulis ?>" type="text" class="user-edit grey-text" />
                      <label for="Penulis">Penulis</label>
                    </div>
                    <div class="input-field col s12">
                      <input readonly id="Penerbit" value="<?= $Penerbit ?>" type="text" class="user-edit grey-text" />
                      <label for="Penerbit">Penerbit</label>
                    </div>
                    <div class="input-field col s12">
                      <input readonly id="Halaman" value="<?= $Halaman ?>" type="text" class="user-edit grey-text" />
                      <label for="Halaman">Jumlah Halaman</label>
                    </div>
                    <div class="input-field col s12">
                      <input readonly id="Kategori" value="<?= $KategoriDesc ?>" type="text" class="user-edit grey-text" />
                      <label for="Kategori">Kategori</label>
                    </div>
                    <div class="input-field col s12">
                      <textarea readonly id="Deskripsi" data-length="120" class="user-edit grey-text materialize-textarea"><?= nl2br($Deskripsi) ?></textarea>
                      <label for="Deskripsi">Deskripsi</label>
                    </div>
                    <?php if (Session::get('username') == $Diupload): ?>
                      <div id="delete-loading" style="display: none" class="col s12">
                        <div class="progress">
                          <div class="indeterminate"></div>
                        </div>
                      </div>
                      <br />
                      <div class="col s12">
                        <input type="hidden" id="token" name="csrftoken" value="<?= csrftoken(true) ?>">
                        <button onclick="deleteBook(event)" class="btn red waves-effect waves-light right" type="button" name="action">
                          Hapus Buku
                        </button>
                      </div>
                    <?php endif; ?>
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
