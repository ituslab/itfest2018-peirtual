const loader = `<div class="center loader"><ons-icon icon="md-spinner" size="50px" spin></ons-icon><h3> Loading...</h3></div>`
const category = ["Teknik Komputer","Teknik Kimia", "Teknik Mesin", "Teknik Dokter"];
const url = window.location.protocol + "//" + window.location.host + '/E-Perpus';
//! http://localhost/E-Perpus/home#form-upload = link uplado buku
console.log("ini host",host);
$(document).ready(function(){


    // todo recently

    $.ajax({
      url :host+'/api/list_all_books',
      method: 'GET',
      dataType : 'JSON',
      beforeSend : function(){
        $('#recently').html(loader)
      },
    }).done((res)=>{
      $('#recently').html(``);
      res.map(data => {

        $('#recently').append(`
      <li class="tab-recently" >
        <div class=" card book-recently">
          <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="${host+'/'+data.Cover}">
          </div>
          <div class="card-content">
            <span class=" activator  text-darken-5">${data.Judul}<i class="material-icons right">more_vert</i></span>
            <p style="margin-left:10px;"><a href="${host}/books/${data.Id}">Read More..</a></p>
          </div>
          <div class="card-reveal ">
            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
            <p style="word-wrap: break-word;width:100px;" >${data.Deskripsi}</p>
          </div>
        </div>
      </li>
      `);
      });
    });
    // .fail((data, stat, xhr)=>{
      //   ons.notification.alert(`Turn <i class="ion-android-wifi"></i>N The Internet   `)
      //   .then(()=> window.location.reload())
      // })


      //! UPDATE SOON!!
    //TOdo Category
    // $.ajax({
    //   url : host+'/api/list_all_categories',
    //   method: 'GET',
    //   dataType : 'JSON',
    //   beforeSend : function(){
    //     $('#category').html(loader)
    //   },
    // }).done(function(response){
    //   $('#category').html(``);
    //   category.map(cat => {
    //     $('#category').append(`
    //     <li id="${cat.Id}" class="tab-category" >
    //       <ons-card class="book-category">
    //         <div>${cat.Kategori}</div>
    //       </ons-card>
    //     </li>
    //     `);
    //   });
    // });

    // todo List All Users
    $.ajax({
      url :host+'/api/list_all_users',
      method: 'GET',
      dataType : 'JSON',
      beforeSend : function(){
        $('#category').html(loader)
      },
    }).done((res)=>{
      $('#category').html(``);

      res.map(data => {
        
        $('#category').append(`
      <li class="tab-category" >
        <div class=" card book-recently">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="${data.Avatar}">
          </div>
          <div class="card-content">
            <span class="card-title activator  text-darken-5 small">${data.Username}<i class="material-icons right">more_vert</i></span>
            <p style="margin-left:10px;"><a href="${host}/books/${data.Id}">Read More..</a></p>
          </div>
        </div>
      </li>
      `);
      });
    });

    // todo Reload
    $('.toolbar').click(function(){
      window.location.reload();
    })

    //todo carousel
    setTimeout(function(){
      console.log('load image')
      $('.carousel').carousel({duration : 400});

    }, 3000)

});


  // ? Like Button
  function like(){
    ons.notification.toast('Thanks For Your Like!', {timeout:1700, animation : "fall"})
  }
  // ? Look Button
  function share(){
    ons.notification.confirm('Feel Free to See Our Profile on Social Media').then((yes)=>{
      if (yes) {
        window.location.href = 'https://www.instagram.com/p/BpItpDMBDXY/?utm_source=ig_share_sheet&igshid=wgud5vfgyx1z'
      }
    })
  }

  function contact(){
    ons.notification.alert('Silahkan DM Ke Instagram Kami');
  }
