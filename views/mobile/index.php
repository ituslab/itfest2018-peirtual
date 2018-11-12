<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | Mobile </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Main UI-->
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
  <link rel="stylesheet" href="views/mobile/assets/css/materialize.css">
  <link rel="stylesheet" href="views/mobile/assets/css/index.css">
 
</head>
<body> 
  <ons-page>

    <ons-tabbar swipeable position="auto">
      <ons-tab id="dashboard" page="dashboard.html" label="Home" icon="ion-ios-home-outline" active-icon="ion-ios-home" active></ons-tab>
      <ons-tab id="profile" page="profile.html" label="Profile" icon="ion-ios-contact-outline" active-icon="ion-ios-contact"></ons-tab>
      <ons-tab id="setting" page="setting.html" label="Setting" icon="ion-ios-cog-outline" active-icon="ion-ios-cog" ></ons-tab>
    </ons-tabbar>
    
  </ons-page>

  <ons-template id="dashboard.html">
    <ons-page>
      <ons-toolbar id="reload">
        <div class="center">HOME</div>
      </ons-toolbar>
      <div class="content" id="content">
        <h2 class="title--home">Recently Update..</h2>
        <div class="row">
          <div class="col s12">
            <ul class="tabs-recently" id="recently">
              <li class="tab-recently">
                <ons-card class="book-recently">
                  
                </ons-card>
              </li>
              <li class="tab-recently">
                <ons-card class="book-recently">
                  
                </ons-card>
              </li>
              <li class="tab-recently">
                <ons-card class="book-recently">
                  
                </ons-card>
              </li>
              <li class="tab-recently">
                <ons-card class="book-recently">
                  
                </ons-card>
              </li>
            </ul>
          </div>
        </div>
        <h2 class="title--home">Category..</h2>  
        <div class="row" >
          <div class="col s12"   >
            <ul class="tabs-category" id="category" >
            </ul>
          </div>
        </div>
      </div>
    </ons-page>
  </ons-template>
  
  <ons-template id="profile.html">
    <ons-page id="profs">
      <ons-toolbar>
        <div class="center">Profile</div>
      </ons-toolbar>
      <ons-card>
        <ons-icon icon="md-spinner" size="32px" spin></ons-icon>
      </ons-card>
    </ons-page>
  </ons-template>


<ons-template id="setting.html">
  <ons-page>
    <ons-toolbar>
      <div class="center">Setting</div>
    </ons-toolbar>
    
  </ons-oage>
</ons-template>
  

<script src="views/mobile/assets/js/app.js"></script>
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