<ons-template id="about">
  <ons-page id="aboutpage" >
    <ons-toolbar>
      <div class="center">Our Team</div>
    </ons-toolbar>
    <ons-card>
    <div class="carousel" style="height: 350px;" id="carousel">
      <div  class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/team.jpeg" alt="itpolsri"></div>
      <a class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/arief.jpeg" alt="arief"></a>
      <a class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/sutan.jpeg" alt="sutan"></a>
      <a class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/aji.jpeg" alt="irvan"></a>
      <a class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/irvan.jpeg" alt="irvan"></a>
    </div>
      <div class="title center">
        We Are ITPolsri 
      </div>
      <div class="content">
        <div>
          <ons-button onclick="like()"><ons-icon icon="ion-heart"></ons-icon></ons-button>
          <ons-button onclick="share()"><ons-icon icon="ion-social-instagram-outline" ></ons-icon></ons-icon></ons-icon></ons-button>
          <ons-button onclick="contact()" class="right">Contact Us</ons-button>
        </div>
      </div>
    </ons-card>
    <ons-card style="background-image: linear-gradient(to right bottom, #007CC1, #4550FF, darkblue);">
      <ons-list modifier="inset">
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/aji.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Aji Prasetyo</span>
            <span class="list-item__subtitle">On the Internet</span>
          </div>
        </ons-list-item>
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/arief.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Arief Al-kahfi Verdana</span>
            <span class="list-item__subtitle">On the Internet</span>
          </div>
        </ons-list-item>
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="https://placekitten.com/g/40/40">
          </div>
          <div class="center">
            <span class="list-item__title">Jian Malik Hidayat</span>
            <span class="list-item__subtitle">On the Internet</span>
          </div>
        </ons-list-item>
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/irvan.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Muhammad Irvan Refnaldy</span>
            <span class="list-item__subtitle">On the Internet</span>
          </div>
        </ons-list-item>
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/sutan.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Sutan Gading Fadillah Nst.</span>
            <span class="list-item__subtitle">On the Internet</span>
          </div>
        </ons-list-item>
      </ons-list>
    </ons-card>
  </ons-oage>
</ons-template>