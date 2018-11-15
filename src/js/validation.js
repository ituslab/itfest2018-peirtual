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

$('#form-edit-user').validate({
  rules: {
    Nama: {
      required: true,
      maxlength: 40
    },
    Username: {
      required: true,
      alphanumeric: true,
      maxlength: 40
    },
    Deskripsi: {
      maxlength: 200
    },
  },
  messages: {
    Nama: {
      required: 'Nama tidak boleh kosong !',
      maxlength: 'Nama maksimal 40 karakter'
    },
    Username: {
      required: 'Username tidak boleh kosong !',
      alphanumeric: 'Format Username harus huruf angka dan underscore !',
      maxlength: 'Username maksimal 40 karakter'
    },
    Deskripsi: {
      maxlength: 'Deskripsi maksimal 200 karakter'
    },
  },
  errorPlacement: function(errElement, validElement) {
    var
      errorText = $(errElement).html(),
      input = $(validElement).attr('name'),
      idErrElement = '#error-'+input;
    $(idErrElement).html(errorText);
  },
  success: function (label, validEl) {},
  submitHandler: editUser
});

$('#form-upload-buku').validate({
  rules: {
    Judul: {
      required: true,
      maxlength: 30
    },
    Penulis: {
      required: true,
      maxlength: 30
    },
    Penerbit: {
      required: true,
      maxlength: 30
    },
    Halaman: {
      required: true,
      digits: true
    },
    Kategori: {
      required: true,
    },
    Deskripsi: {
      required: true,
      maxlength: 200
    },
    'upload-buku': {
      required: true
    }
  },
  messages: {
    Judul: {
      required: 'Judul tidak boleh kosong !',
      maxlength: 'Judul maksimal 30 karakter !'
    },
    Penulis: {
      required: 'Penulis tidak boleh kosong !',
      maxlength: 'Penulis maksimal 30 karakter !'
    },
    Penerbit: {
      required: 'Penerbt tidak boleh kosong !',
      maxlength: 'Penerbit maksimal 30 karakter !'
    },
    Halaman: {
      required: 'Halaman tidak boleh kosong !',
      digits: 'Halaman seharusnya angka !'
    },
    Kategori: {
      required: 'Kategori tidak boleh kosong !'
    },
    Deskripsi: {
      required: 'Deskripsi tidak boleh kosong !',
      maxlength: 'Deskripsi maksimal 200 karakter !'
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
