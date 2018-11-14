$('#form-upload-buku').one('click', function() {
  $.ajax({
    url: host+'/api/list_all_category',
    type: 'GET',
    dataType: 'JSON',
  })
  .done(function(response) {
    response.forEach(function(cat){
      $('#Kategori').append('<option value="'+cat.Id+'">'+cat.Deskripsi+'</option>');
      $('select').formSelect();
    });
  });
});

function uploadBuku(event) {
  event.preventDefault();
  var data = new FormData();
  var cover = document.getElementById('upload-cover').files[0];
  var buku = document.getElementById('upload-buku').files[0];
  data.append('cover', cover);
  data.append('buku', buku);
  data.append('Judul', $('#Judul').val());
  data.append('Penulis', $('#Penulis').val());
  data.append('Penerbit', $('#Penerbit').val());
  data.append('Halaman', $('#Halaman').val());
  data.append('Kategori', $('#Kategori').val());
  data.append('Deskripsi', $('#Deskripsi').val());
  data.append('csrftoken', $('#csrftoken').val());
  $.ajax({
    url: host+'/books/upload',
    method: 'POST',
    contentType: false,
    processData: false,
    data: data,
    beforeSend: function(){
      $('#upload-loading').show();
    }
  })
  .done(function(res) {
    formUploadReset();
    M.toast({html: res});
  })
  .fail(function(err, status, xhr) {
    formUploadReset();
    M.toast({html: err});
  });
}

function formUploadReset() {
  $('#upload-cover').attr('src', host+'/assets/img/uploadplaceholder.png');
  $('#upload-loading').hide();
  $('.book-upload').val('');
  $('#Halaman').val('0');
  $('#Kategori').formSelect();
}
