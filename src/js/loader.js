$('#btn-load-more-books').on('click', function(event) {
  event.preventDefault();
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
    $('#loading-container').empty();
    $('#btn-load-more-books').prop('disabled', false);
    bookData.start += bookData.data;
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
    console.log(err);
    console.log(status);
    console.log(xhr);
  });
});


$('#btn-load-more-users').on('click', function(event) {
  event.preventDefault();
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
    $('#loading-container-u').empty();
    $('#btn-load-more-users').prop('disabled', false);
    userData.start += userData.data;
    if (!response) {
      $('#btn-load-user-container').empty();
    }else {
      console.log(response);
      response.forEach(function(data, i){
        $('#row-users').append(`
          <li class="collection-item avatar">
            <img src="${data.Avatar}" alt="" class="circle">
            <span class="title"><a href="${host+'/users/'+data.Username}"><b>${data.Nama}</b></a></span>
            <p>${data.Deskripsi}</p>
            <a href="#" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
        `);
      });
    }
  })
  .fail(function(err, status, xhr) {
    console.log(err);
    console.log(status);
    console.log(xhr);
  });
});
