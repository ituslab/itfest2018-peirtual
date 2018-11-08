<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | Mobile </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="lib/onsen/js/onsenui.min.js"></script>
  <script src="lib/onsen/js/jquery.min.js"></script>
  
<!--   
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
  <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
-->
  <!-- <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css"> -->
  <link rel="stylesheet" href="lib/onsen/css/onsen-css-components.css">
  <link rel="stylesheet" href="lib/onsen/css/onsenui.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="views/mobile/assets/css/index.css">
</head>
<body> 
  <ons-page>

    <ons-tabbar swipeable position="auto">
      <ons-tab id="dashboard" page="dashboard.html" label="Dashboard" icon="ion-ios-home-outline" active-icon="ion-ios-home" active></ons-tab>
      <ons-tab id="profile" page="profile.html" label="Profile" icon="ion-ios-contact-outline" active-icon="ion-ios-contact"></ons-tab>
      <ons-tab id="setting" page="setting.html" label="Setting" icon="ion-ios-cog-outline" active-icon="ion-ios-cog"></ons-tab>
      
    </ons-tabbar>
  </ons-page>

  <ons-template id="dashboard.html">
    <ons-page>
      <ons-toolbar>
        <div class="center">Dashboard</div>
      </ons-toolbar>
      <div class="content">
        <ons-card >
          
          <ons-button id="click">
            ClickME!
          </ons-button>
        
        </ons-card>
      </div>
    </ons-page>
  </ons-template>
  
  <ons-template id="profile.html">
    <ons-page id="profs">
      <ons-toolbar>
        <div class="center">Profile</div>
      </ons-toolbar>
      <ons-card>
        <div id="card-profile1"></div>
      </ons-card>
    </ons-page>
  </ons-template>
    
  <ons-template id="setting.html">
      <ons-page>
        <ons-toolbar>
          <div class="center">Setting</div>
        </ons-toolbar>
      </ons-page>
  </ons-template>

<script src="views/mobile/assets/js/app.js"></script>
</body>
</html>