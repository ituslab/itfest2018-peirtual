<!DOCTYPE html>
<?php include_once "include/head.php"?>
<body>
  <ons-page>

    <ons-tabbar position="auto">
      <ons-tab id="dashboard" page="dashboard.html" label="Home" icon="ion-ios-home-outline" active-icon="ion-ios-home" active></ons-tab>
      <ons-tab id="setting" page="about" label="About" icon="ion-code" active-icon="ion-code-working" ></ons-tab>
    </ons-tabbar>

  </ons-page>

  <?php include_once "include/home.php" ?>

  <?php include_once "include/about.php" ?>

  <script type="text/javascript">var host = "<?= baseurl()?>"</script>
  <script src="views/mobile/assets/js/materialize.min.js"></script>
  <script type="text/javascript" src="views/mobile/assets/js/app.js"></script>

</body>
<script>
  if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('views/mobile/service-worker.js')
      .then(function(reg){
        console.log("Yes, it did.");
      }).catch(function(err) {
        console.log("No it didn't. This happened: ", err)
      });
  }
</script>

</html>
