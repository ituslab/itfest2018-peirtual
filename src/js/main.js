$('select').formSelect();
$('.sidenav').sidenav();
$('.parallax').parallax();

var instance = M.Tabs.init(document.getElementById('home-tabs'), {
  onShow: tabChange
});

AOS.init();

function tabChange(){
  var
    book = $('#tab-beranda'),
    user = $('#tab-user'),
    upload = $('#tab-upload'),
    profile = $('#tab-profile'),
    koleksi = $('#tab-collections');
  if (book.hasClass('active')) {
    loadAllBooks();
  }else if (user.hasClass('active')){
    loadAllUsers();
  }else if (upload.hasClass('active')) {
    loadAllCategories()
  }else if (koleksi.hasClass('active')){
    loadUserCollections();
  }else if (profile.hasClass('active')){
    console.log('profil');
  }
}tabChange();

function loadUserCollections() {
  if (execResponseCollection) return;
  var pageURL = window.location.href;
  var username = pageURL.substr(pageURL.lastIndexOf('/') + 1); // ambil segmen terakhir di url
  $.ajax({
    url: host+'/api/list_user_collections',
    type: 'POST',
    dataType: 'JSON',
    data: {username: username},
    beforeSend: function(){
      $('#row-collections').html('<div class="progress"><div class="indeterminate"></div></div>');
    }
  })
  .done(function(response) {
    execResponseCollection = true;
    $('#row-collections').empty();
    response.forEach(function(data){
      $('#row-collections').append(`
        <div class="card horizontal z-depth-2 hoverable">
          <div class="card-image">
            <img style="width: 100px; height: 140px; margin:auto;" src="${host+'/'+data.Cover}">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>${data.Deskripsi}</p>
            </div>
            <div class="card-action">
              <a href="${host+'/books/'+data.Id}">Info</a>
              <a target="_blank" href="${host+data.Buku}">Download</a>
            </div>
          </div>
        </div>
      `);
    })
  });
}

function loadAllCategories() {
  $.ajax({
    url: host+'/api/list_all_categories',
    type: 'GET',
    dataType: 'JSON',
  })
  .done(function(response) {
    $('#Kategori').html('<option selected disabled value="">Pilih Kategori</option>');
    response.forEach(function(cat){
      $('#Kategori').append('<option value="'+cat.Id+'">'+cat.Deskripsi+'</option>');
      $('select').formSelect();
    });
  });
}

function loadAllBooks() {
  $.ajax({
    url: host+'/api/list_all_books',
    type: 'GET',
    dataType: 'JSON'
  })
  .done(function(response) {
    $('#row-books').empty();
    response.forEach(function(data){
      $('#row-books').append(`
        <div class="col sm12 m3">
          <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
              <img style="width: 250px; height: 300px; margin: auto;" class="activator responsive-img" src="${host+data.Cover}">
            </div>
            <div class="card-content">
              <span class="activator grey-text text-darken-4">${data.Judul}<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-action">
              <a href="${host+'/books/'+data.Id}">Info</a>
              <a target="_blank" href="${host+data.Buku}">Download</a>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Bio<i class="material-icons right">close</i></span>
              <p>${data.Deskripsi}</p>
            </div>
          </div>
        </div>
      `);
    });
  })
  .fail(function(err, status, xhr) {

  });
}

function loadAllUsers() {
  $.ajax({
    url: host+'/api/list_all_users',
    type: 'GET',
    dataType: 'JSON'
  })
  .done(function(response) {
    $('#row-users').empty();
    response.forEach(function(data){
      $('#row-users').append(`
        <div class="col sm12 m2">
          <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="${data.Avatar}">
            </div>
            <div class="card-content">
              <span class="activator grey-text text-darken-4"><b>${data.Nama}</b><i class="material-icons right">more_vert</i></span>
              <br />
              <p><a href="${host+'/users/'+data.Username}">Lihat Profile</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Bio<i class="material-icons right">close</i></span>
              <p>${data.Deskripsi}</p>
            </div>
          </div>
        </div>
      `);
    });
  })
  .fail(function(err, status, xhr) {

  });
}
