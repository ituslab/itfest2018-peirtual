$('select').formSelect();
$('.sidenav').sidenav();
$('.parallax').parallax();
$('textarea').characterCounter();
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
  }
}tabChange();

function historyState(html, title, url) {
  window.history.pushState({html: html, title: title}, title, url);
  window.onpopstate = function(event){
    if(event.state){
      $('html').html(event.state.html);
      document.title = event.state.title;
    }
  };
}

function loadUserCollections() {
  if (execResponseCollections) return;
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
    execResponseCollections = true;
    $('#row-collections').empty();
    response.forEach(function(data){
      $('#row-collections').append(`
        <div class="card horizontal z-depth-2 hoverable">
          <div class="card-image">
            <img style="width: 100px; height: 140px; margin:auto;" src="${host+'/'+data.Cover}">
          </div>
          <div class="card-stacked" style="overflow-x: auto">
            <div class="card-content">
              <p><b>${data.Judul}</b></p>
              <br />
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
  if (execResponseCategories) return;
  $.ajax({
    url: host+'/api/list_all_categories',
    type: 'GET',
    dataType: 'JSON',
  })
  .done(function(response) {
    execResponseCategories = true;
    $('#Kategori').html('<option selected disabled value="">Pilih Kategori</option>');
    response.forEach(function(cat){
      $('#Kategori').append('<option value="'+cat.Id+'">'+cat.Deskripsi+'</option>');
      $('select').formSelect();
    });
  });
}

function loadAllBooks() {
  if (execResponseBooks) return;
  $.ajax({
    url: host+'/books/load',
    type: 'POST',
    dataType: 'JSON',
    data: {
      startdata: bookData.start,
      totaldata: bookData.data
    },
    beforeSend: function() {
      $('#loading-container').html('<div class="progress"><div class="indeterminate"></div></div>');
      $('#btn-load-more-books').prop('disabled', true);
    }
  })
  .done(function(response) {
    execResponseBooks = true;
    bookData.start += bookData.data;
    $('#loading-container').empty();
    $('#btn-load-more-books').prop('disabled', false);
    if (!response) {
      $('#btn-load-book-container').empty();
    }else {
      response.forEach(function(data, i){
        $('#row-books').append(`
          <div class="card horizontal z-depth-2 hoverable">
            <div class="card-image">
              <img style="width: 100px; height: 140px; margin:auto;" src="${host+'/'+data.Cover}">
            </div>
            <div class="card-stacked" style="overflow-x: auto">
              <div class="card-content">
                <p><b>${data.Judul}</b></p>
                <br />
                <p>${data.Deskripsi}</p>
              </div>
              <div class="card-action">
                <a href="${host+'/books/'+data.Id}">Info</a>
                <a target="_blank" href="${host+data.Buku}">Download</a>
              </div>
            </div>
          </div>
        `);
      });
    }
  })
  .fail(function(err, status, xhr) {

  });
}

function loadAllUsers() {
  if (execResponseUsers) return;
  $.ajax({
    url: host+'/users/load',
    type: 'POST',
    dataType: 'JSON',
    data: {
      startdata: userData.start,
      totaldata: userData.data
    },
    beforeSend: function() {
      $('#loading-container-u').html('<div class="progress"><div class="indeterminate"></div></div>');
      $('#btn-load-more-users').prop('disabled', true);
    }
  })
  .done(function(response) {
    execResponseUsers = true;
    userData.start += userData.data;
    console.log(response);
    $('#loading-container-u').empty();
    $('#btn-load-more-users').prop('disabled', false);
    response.forEach(function(data){
      $('#row-users').append(`
        <li class="collection-item avatar">
          <img src="${data.Avatar}" alt="" class="circle">
          <span class="title"><a href="${host+'/users/'+data.Username}"><b>${data.Nama}</b></a></span>
          <p>${data.Deskripsi}</p>
          <a href="#" class="secondary-content"><i class="material-icons">grade</i></a>
        </li>
      `);
    });
  })
  .fail(function(err, status, xhr) {

  });
}
