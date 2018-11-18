<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mobile Home | Peirtual </title>
  <!--Main UI-->
  <script type="text/javascript">
  var mobile = {
    Android: function() {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
      return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },
    anyMobile: function() {
      return (this.Android() || this.BlackBerry() || this.iOS() || this.Opera() || this.Windows());
    }
  };
  if (!mobile.anyMobile()) {
    window.location.href = '/home';
  }
  </script>
  <script src="lib/onsen/js/onsenui.min.js"></script>
  <link rel="stylesheet" href="lib/onsen/css/onsen-css-components.css">
  <link rel="stylesheet" href="lib/onsen/css/onsenui.min.css">

  <!-- <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
  <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">  -->
  <link rel="manifest" href="views/mobile/manifest.json">

  <!--Tambahan-->
  <script src="lib/onsen/js/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css"> -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="views/mobile/assets/css/materialize.css">
  <link rel="stylesheet" href="views/mobile/assets/css/index.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
