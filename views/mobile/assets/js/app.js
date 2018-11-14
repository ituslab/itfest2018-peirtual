const loader = `<div class="center loader"><ons-icon icon="md-spinner" size="50px" spin></ons-icon><h3> Loading...</h3></div>`
const category = ["Teknik Komputer","Teknik Kimia", "Teknik Mesin", "Teknik Dokter"];
const url = window.location.protocol + "//" + window.location.host + '/E-Perpus';

console.log("ini host",host);
$(document).ready(function(){
  
  
    // todo recently

    $.ajax({
      url :'https://randomuser.me/api/?results=4',
      method: 'GET',
      dataType : 'JSON',
      beforeSend : function(){
        $('#recently').html(loader)
      },
    }).done((res)=>{
      $('#recently').html(``);
      res.results.map(data => {
        $('#recently').append(`
      <li class="tab-recently" >
        <div class=" card book-recently">
          <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="${data.picture.medium}">
            </div>
          <div class="card-content">
            <span class="card-title activator  text-darken-5 small">Card Title<i class="material-icons right">more_vert</i></span>
            <p style="margin-left:10px;"><a href="${url}">Read More..</a></p>
          </div>
          <div class="card-reveal ">
            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
            <p style="word-wrap: break-word;width:100px;" >Here is some more information about this product that is only revealed once clicked on.</p>
          </div>
        </div>
      </li>
      `);
      })
    });


    //TOdo Category
    $.ajax({
      url :'https://randomuser.me/api/?results=4',
      method: 'GET',
      dataType : 'JSON',
      beforeSend : function(){
        $('#category').html(loader)
      },
    }).done(function(response){
      $('#category').html(``);
      category.map(cat => {
        $('#category').append(`
        <li id="${cat}" class="tab-category" onclick="listBuku(this)">
          <ons-card class="book-category">
            <div>${cat}</div>
          </ons-card>
        </li>
        `); 
      });
    }).fail((data, stat, xhr)=>{
      ons.notification.alert(`Turn <i class="ion-android-wifi"></i>N The Internet   `)
      .then(()=> window.location.reload())
    })

    
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
  
  // todo Category-click Slide Toggle
  function listBuku(ev){
    console.log(`#${($(ev).attr('id'))}`)
     
  }

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