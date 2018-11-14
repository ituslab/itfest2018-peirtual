$('select').formSelect();
$('.sidenav').sidenav();
$('.parallax').parallax();
var instance = M.Tabs.init(document.getElementById('home-tabs'), {
  onShow: tabChange
});

function tabChange(){
  var
    book = $('#tab-beranda'),
    user = $('#tab-user'),
    upload = $('#tab-upload');
  if (book.hasClass('active')) {
    loadAllBooks();
  }else if (user.hasClass('active')){
    loadAllUsers();
  }else if (upload.hasClass('active')) {
    loadAllCategories()
  }
}tabChange();

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
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image">
              <img class="book-cover" src="${host+data.Cover}">
              <span class="card-title">${data.Judul}</span>
            </div>
            <div class="card-content">
              <p>${data.Deskripsi}</p>
            </div>
            <div class="card-action">
              <a href="${host+'/books/'+data.Id}">Detail Buku</a>
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
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="${data.Avatar}">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">${data.Nama}<i class="material-icons right">more_vert</i></span>
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
