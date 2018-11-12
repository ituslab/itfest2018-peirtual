$.fn.checkFileType = function (options) {
  var defaults = {
    allowedExtensions: [],
    size: 10000000,
    preview: "",
    success: function () {},
    error: function () {},
    errorExtension: function() {},
    errorSize: function () {}
  };
  options = $.extend(defaults, options);
  $previews = $(options.preview);
  return this.each(function (i) {
    $(this).on('change', function () {
      var value = $(this).val(),
      file = value.toLowerCase(),
      extension = file.substring(file.lastIndexOf('.') + 1),
      $preview = $previews.eq(i);
      if ($.inArray(extension, options.allowedExtensions) == -1) {
        options.errorExtension();
        $(this).focus();
      } else {
        if (this.files[0].size < options.size) {
          if (this.files && this.files[0] && $preview) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $preview.show().attr('src', e.target.result);
              options.success();
            };
            reader.readAsDataURL(this.files[0]);
          } else {
            options.error();
          }
        }else {
          options.errorSize();
        }
      }
    });
  });
};

function imageProcessing(inputSelector, target, msgSelector) {
  inputSelector.checkFileType({
    allowedExtensions: ['jpg', 'jpeg', "png"],
    preview: target,
    size: 3000000,
    error: function () {
      inputSelector.val('');
      $(target).attr('src', host+'/assets/img/uploadplaceholder.png');
      // $(msgSelector).html('<div class="row alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unknown Error. Try Again.</strong></div>');
    },
    errorExtension: function() {
      inputSelector.val('');
      $(target).attr('src', host+'/assets/img/uploadplaceholder.png');
      // $(msgSelector).html('<div class="row alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Format Foto harus JPG/JPEG/PNG</strong></div>');
    },
    errorSize: function() {
      inputSelector.val('');
      $(target).attr('src', host+'/assets/img/uploadplaceholder.png');
      // $(msgSelector).html('<div class="row alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Ukuran Foto tidak boleh melebihi batas 3MB</strong></div>');
    }
  });
}

function uploadBuku(event) {
  ev.preventDefault();
  var data = new FormData();
  var cover = document.getElementById('cover-upload').files[0];
  data.append('file-cover', cover);
  $.ajax({
    url: '/E-Perpus/upload',
    method: 'POST',
    contentType: false,
    processData: false,
    data: data
  })
  .done(function(res) {

  })
  .fail(function(err, status, xhr) {

  });
}
