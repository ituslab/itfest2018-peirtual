<?php use Package\App\Session; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title>Home | Peirtual</title>
  </head>
  <body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="section">
      <div class="row">
        <ul id="home-tabs" class="tabs tab-demo z-depth-1">
          <li class="tab"><a class="active teal-text" id="tab-beranda" href="#books"><i class="material-icons">home</i>Beranda</a></li>
          <li class="tab"><a class="active" id="tab-user" href="#users"><i class="material-icons">group</i>Users</a></li>
          <li class="tab"><a id="tab-upload" class="active" href="#form-upload"><i class="material-icons">book</i>Upload Buku</a></li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div id="books" class="col s12">
        <div class="section container" style="padding: 0 15px">
          <div class="row" id="row-books">
            <!-- LIST BOOK HERE -->
          </div>
          <div class="container">
            <div class="row">
              <div class="col s12">
                <div class="row" id="loading-container"></div>
                <p class="center-align" id="btn-load-book-container">
                  <button type="button" id="btn-load-more-books" class="btn teal">LOAD MORE</button>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="users" class="col s12">
        <div class="section container" style="padding: 0 15px">
          <div class="row">
            <ul id="row-users" class="collection">
              <!-- LIST USER -->
            </ul>
          </div>
          <div class="container">
            <div class="row">
              <div class="col s12">
                <div class="row" id="loading-container-u"></div>
                <p class="center-align" id="btn-load-user-container">
                  <button type="button" id="btn-load-more-users" class="btn teal">LOAD MORE</button>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="form-upload" class="col s12">
        <div class="section" style="padding: 0 15px">
          <div class="container">
            <form id="form-upload-buku" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col s12 m3">
                  <div class="row">
                    <div class="card">
                      <div onclick="" class="card-image waves-effect waves-block waves-light">
                        <img id="cover-preview" onclick="$('#upload-cover').click()" class="activator" style="width:100%;margin:auto" src="<?= baseurl() ?>/assets/img/uploadplaceholder.png">
                        <input name="upload-cover" onclick="validateImage($(this), '#cover-preview', '')" id="upload-cover" type="file" accept="image/*" class="book-upload">
                      </div>
                    </div>
                  </div>
                  <div class="red-text" id="error-upload-cover"></div>
                </div>
                <div class="col s12 m1"></div>
                <div class="col s12 m8 z-depth-3">
                  <h5 class="center">Upload Buku</h5>
                  <div class="divider"></div>
                  <div class="row section" style="padding: 15px;">
                    <div class="input-field col s12">
                      <input id="Judul" name="Judul" type="text" class="book-upload user-edit validate" />
                      <label for="Judul">Judul</label>
                      <div class="red-text" id="error-Judul"></div>
                    </div>
                    <div class="input-field col s12">
                      <input id="Penulis" name="Penulis"  type="text" class="book-upload user-edit validate" />
                      <label for="Penulis">Penulis</label>
                      <div class="red-text" id="error-Penulis"></div>
                    </div>
                    <div class="input-field col s12">
                      <input id="Penerbit" name="Penerbit" type="text" class="book-upload user-edit validate" />
                      <label for="Penerbit">Penerbit</label>
                      <div class="red-text" id="error-Penerbit"></div>
                    </div>
                    <div class="input-field col s12">
                      <input id="Halaman" name="Halaman" value="0" min="0" max="2000" type="number" class="user-edit validate" />
                      <label for="Halaman">Jumlah Halaman</label>
                      <div class="red-text" id="error-Halaman"></div>
                    </div>
                    <div class="input-field col s12">
                      <select id="Kategori" name="Kategori">
                        <option value="" disabled selected>Pilih Kategori Buku</option>
                      </select>
                      <label for="Kategori">Kategori Buku</label>
                      <div class="red-text" id="error-Kategori"></div>
                    </div>
                    <div class="input-field col s12">
                      <textarea id="Deskripsi" name="Deskripsi" class="book-upload materialize-textarea" data-length="200"></textarea>
                      <label for="Deskripsi">Deskripsi Buku</label>
                      <div class="red-text" id="error-Deskripsi"></div>
                    </div>
                    <div class="file-field input-field col s12">
                      <div class="btn">
                        <span>Upload Buku (PDF)</span>
                        <input class="book-upload" name="upload-buku" onclick="validateBook($(this))" id="upload-buku" type="file" accept="application/pdf">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="book-upload file-path validate" type="text">
                      </div>
                      <div class="red-text" id="error-upload-buku"></div>
                    </div>
                    <div id="upload-loading" style="display: none;" class="col s12">
                      <div class="progress">
                        <div class="indeterminate"></div>
                      </div>
                    </div>
                    <div class="divider"></div>
                    <div id="feedback-msg" class="teal-text container">
                    </div>
                    <br />
                    <div class="col s12">
                      <input type="hidden" id="csrftoken" value="<?= csrftoken(true) ?>">
                      <button disabled id="btn-upload" type="submit" class="btn right">
                        Upload
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
  </body>
</html>
