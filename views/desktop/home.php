<?php use Package\App\Session; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'includes/head.php' ?>
    <title>Home | E-Perpus</title>
  </head>
  <body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="section">
      <div class="row">
        <ul id="home-tabs" class="tabs tab-demo z-depth-1">
          <li class="tab"><a class="active" href="#books">Beranda</a></li>
          <li class="tab"><a class="active" href="#users">Users</a></li>
          <li class="tab"><a id="form-upload-buku" class="active" href="#form-upload">Upload Buku</a></li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div id="books" class="col s12">
        <div class="section" style="padding: 0 15px">
          <div class="row">
            <div class="col s12 m3">
              <div class="card">
                <div class="card-image">
                  <img class="book-cover" src="uploads/books/1/cover.jpg">
                  <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">
                  <p>
                    I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.
                  </p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <ul class="pagination right">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="users" class="col s12">
        <div class="section" style="padding: 0 15px">
          <div class="row">
            <div class="col sm12 m2">
              <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="https://materializecss.com/images/office.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Sutan Gading Fadhillah Nasution<i class="material-icons right">more_vert</i></span>
                  <p><a href="#">Lihat Profile</a></p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                  <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <ul class="pagination right">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="form-upload" class="col s12">
        <div class="section" style="padding: 0 15px">
          <div class="container">
            <form onsubmit="uploadBuku(event)" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col s12 m3">
                  <div class="row">
                    <div class="card">
                      <div onclick="" class="card-image waves-effect waves-block waves-light">
                        <img id="cover-preview" onclick="$('#upload-cover').click()" class="activator" style="width:100%;margin:auto" src="<?= baseurl() ?>/assets/img/uploadplaceholder.png">
                        <input style="display: none;" onclick="validateImage($(this), '#cover-preview', '')" id="upload-cover" type="file" accept="image/*" class="book-upload">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m1"></div>
                <div class="col s12 m8 z-depth-3">
                  <h5 class="center">Upload Buku</h5>
                  <div class="divider"></div>
                  <div class="row section" style="padding: 15px;">
                    <div class="input-field col s12">
                      <input id="Judul" type="text" class="book-upload user-edit validate" />
                      <label for="Judul">Judul</label>
                    </div>
                    <div class="input-field col s12">
                      <input id="Penulis"  type="text" class="book-upload user-edit validate" />
                      <label for="Penulis">Penulis</label>
                    </div>
                    <div class="input-field col s12">
                      <input id="Penerbit"  type="text" class="book-upload user-edit validate" />
                      <label for="Penerbit">Penerbit</label>
                    </div>
                    <div class="input-field col s12">
                      <input id="Halaman" value="0" min="0" max="2000" type="number" class="user-edit validate" />
                      <label for="Halaman">Jumlah Halaman</label>
                    </div>
                    <div class="input-field col s12">
                      <select id="Kategori">
                        <option value="" disabled selected>Pilih Kategori Buku</option>
                      </select>
                      <label for="Kategori">Kategori Buku</label>
                    </div>
                    <div class="input-field col s12">
                      <textarea id="Deskripsi" class="book-upload materialize-textarea" data-length="120"></textarea>
                      <label for="Deskripsi">Deskripsi Buku</label>
                    </div>
                    <div class="file-field input-field col s12">
                      <div class="btn">
                        <span>Upload Buku (PDF)</span>
                        <input class="book-upload" onclick="validateBook($(this))" id="upload-buku" type="file" accept="application/pdf">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                    <div id="upload-loading" style="display: none;" class="col s12">
                      <div class="progress">
                        <div class="indeterminate"></div>
                      </div>
                    </div>
                    <div class="divider"></div>
                    <div class="col s12">
                      <input type="hidden" id="csrftoken" value="<?= csrftoken(true) ?>">
                      <button type="submit" class="btn right">
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
