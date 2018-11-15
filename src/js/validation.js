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

$('#form-upload-buku').validate({
  rules: {
    Judul: {
      required: true
    },
    Penulis: {
      required: true
    },
    Penerbit: {
      required: true
    },
    Halaman: {
      required: true
    },
    Kategori: {
      required: true,

    },
    Deskripsi: {
      required: true
    },
    'upload-buku': {
      required: true
    }
  },
  messages: {
    Judul: {
      required: 'Judul tidak boleh kosong !'
    },
    Penulis: {
      required: 'Penulis tidak boleh kosong !'
    },
    Penerbit: {
      required: 'Penerbt tidak boleh kosong !'
    },
    Halaman: {
      required: 'Halaman tidak boleh kosong !'
    },
    Kategori: {
      required: 'Kategori tidak boleh kosong !'
    },
    Deskripsi: {
      required: 'Deskripsi tidak boleh kosong !'
    },
    'upload-buku': {
      required: 'Kamu belum memilih buku untuk di upload !'
    }
  },
  errorPlacement: function(errElement, validElement) {
    var
      errorText = $(errElement).html(),
      input = $(validElement).attr('name'),
      idErrElement = '#error-'+input;
    $(idErrElement).html(errorText);
  },
  success: function (label, validEl) {},
  submitHandler: uploadBuku
});

$('#Kategori').on('change', function(){
  if ($(this).val().toString().trim() == '') {
    $('#btn-upload').prop('disabled', true);
  }else {
    $('#btn-upload').prop('disabled', false);
  }
});

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
