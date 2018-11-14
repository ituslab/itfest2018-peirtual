function changeEditMode(that, event) {
  event.preventDefault();
  if (that.attr('type') === 'submit') {
    editUser();
    return;
  }
  that.attr('type', 'submit');
  $('.user-edit').prop('disabled', false);
  $('#cancel-edit-mode').show();
}

function cancelEditMode(event) {
  event.preventDefault();
  $('#edit-mode').attr('type', 'button');
  $('.user-edit').prop('disabled', true);
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
    }
  })
  .done(function() {
    window.location.href = host+'/users/'+username;
  })
  .fail(function(err, status, xhr) {
    console.log(err);
    console.log(status);
    console.log(xhr);
  });

}
