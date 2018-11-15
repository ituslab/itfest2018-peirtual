<ons-template id="about">
  <ons-page id="aboutpage" >
    <ons-toolbar>
      <div class="center">Our Team</div>
    </ons-toolbar>
    <ons-card class="background--mind">
    <div class="carousel" style="height: 350px;" id="carousel">
      <div  class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/team.jpeg" alt="itpolsri"></div>
      <div class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/arief.jpeg" alt="arief"></div>
      <div class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/sutan.jpeg" alt="sutan"></div>
      <div class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/jian.jpeg" alt="jian"></div>
      <div class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/aji.jpeg" alt="aji"></div>
      <div class="carousel-item" href="#one!"><img class="img-load" src="views/mobile/assets/img/irvan.jpeg" alt="irvan"></div>
    </div>
      <div class="title center light-blue-text text-lighten-1">
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
    <ons-card class="background--mind">
      <ons-list modifier="inset">
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/aji.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Aji Prasetyo</span>
            <span class="list-item__subtitle">Frontend Developer</span>
          </div>
        </ons-list-item>
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/arief.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Arief Al-kahfi Verdana</span>
            <span class="list-item__subtitle">Fullstack Developer</span>
          </div>
        </ons-list-item>
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/jian.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Jian Malik Hidayat</span>
            <span class="list-item__subtitle">Network Engineer</span>
          </div>
        </ons-list-item>
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/irvan.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Muhammad Irvan Refnaldy</span>
            <span class="list-item__subtitle">Javascript Developer</span>
          </div>
        </ons-list-item>
        <ons-list-item>
          <div class="left">
            <img class="list-item__thumbnail" src="views/mobile/assets/img/sutan.jpeg">
          </div>
          <div class="center">
            <span class="list-item__title">Sutan Gading Fadhillah Nst.</span>
            <span class="list-item__subtitle">Fullstack Developer</span>
          </div>
        </ons-list-item>
      </ons-list>
    </ons-card>
  </ons-oage>
</ons-template>