function changeEditMode(that, event) {
  event.preventDefault();
  arrDataEditUserCache = {
    nama: $('#Nama').val(),
    username: $('#Username').val(),
    deskripsi: $('#Deskripsi').val()
  }
  if (that.attr('type') === 'submit') {
    that.attr('onclick', '');
    that.submit();
    return;
  }
  that.attr('type', 'submit');
  $('.user-edit').prop('disabled', false);
  $('#cancel-edit-mode').show();
}

function cancelEditMode(event) {
  event.preventDefault();
  $('#Nama').val(arrDataEditUserCache.nama);
  $('#Username').val(arrDataEditUserCache.username);
  $('#Deskripsi').val(arrDataEditUserCache.desc);
  $('#edit-mode').attr('onclick', "changeEditMode($(this), event)");
  $('#edit-mode').attr('type', 'button');
  $('.user-edit').prop('disabled', true);
  $('.error').empty();
  $('#cancel-edit-mode').hide();
}

function editUser() {
  var
    id = $('#Id').val()
    nama = $('#Nama').val(),
    username = $('#Username').val(),
    deskripsi = $('#Deskripsi').val(),
    token = $('#token').val();

  $.ajax({
    url: host+'/users/edit',
    type: 'POST',
    data: {
      id: id,
      nama: nama,
      username: username,
      deskripsi: deskripsi,
      csrftoken: token
    },
    dataType: 'JSON'
  })
  .done(function(response) {
    if (!response.status) {
      $('#error-Username').html(response.msg);
      return;
    }
    window.location.href = host+'/users/'+username;
  })
  .fail(function(err, status, xhr) {

  });

}

function deleteBook(event) {
  var
    token = $('#token').val(),
    bookid = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
  swal({
    title: "Apakah anda yakin ?",
    text: "Buku akan dihapus selamanya !",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: host+'/books/delete',
        type: 'POST',
        dataType: 'JSON',
        data: {
          id: bookid,
          csrftoken: token
        },
        beforeSend: function(){
          $('#delete-loading').show();
        },
      })
      .done(function(res) {
        swal(res.msg, {
          icon: "success",
        });
        setTimeout(function(){
          window.location.href = host+'/home'
        }, 1000);
      })
      .fail(function(err, status, xhr){
        console.log(err);
        console.log(status);
        console.log(xhr);
        swal("Menghapus buku gagal Error: "+err.status);
      });
    } else {
      swal("Anda membatalkan menghapus buku");
    }
  });
}
