function validateImage(inputSelector, target) {
  inputSelector.checkFileType({
    allowedExtensions: ['jpg', 'jpeg', "png"],
    preview: target,
    size: 3000000,
    error: function () {
      inputSelector.val('');
      $(target).attr('src', host+'/assets/img/uploadplaceholder.png');
      M.toast({html: 'Terjadi error, coba lagi.'});
    },
    errorExtension: function() {
      inputSelector.val('');
      $(target).attr('src', host+'/assets/img/uploadplaceholder.png');
      M.toast({html: 'Format gambar setidaknya jpg, jpeg, png'});
    },
    errorSize: function() {
      inputSelector.val('');
      $(target).attr('src', host+'/assets/img/uploadplaceholder.png');
      M.toast({html: 'Gambar tidak boleh melebihi batas 3MB'});
    }
  });
}

function validateBook(inputSelector) {
  inputSelector.checkFileType({
    allowedExtensions: ['pdf'],
    error: function () {
      inputSelector.val('');
      M.toast({html: 'Terjadi error, coba lagi.'});
    },
    errorExtension: function() {
      inputSelector.val('');
      M.toast({html: 'Format buku seharusnya pdf'});
    }
  });
}

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
      if ($.inArray(extension.toLowerCase(), options.allowedExtensions) == -1) {
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
