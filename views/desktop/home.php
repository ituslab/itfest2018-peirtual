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
          <li class="tab"><a class="active" href="#books">Cari Buku</a></li>
          <li class="tab"><a class="active" href="#users">Cari User</a></li>
          <li class="tab"><a class="active" href="#form-upload">Upload Buku</a></li>
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
                  <p>I am a very simple card. I am good at containing small bits of information.
                  I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="users" class="col s12">
        <div class="section" style="padding: 0 15px">

        </div>
      </div>
      <div id="form-upload" class="col s12">
        <div class="section" style="padding: 0 15px">

        </div>
      </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
  </body>
</html>
