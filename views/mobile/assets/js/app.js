const loader = `<div class="center loader"><ons-icon icon="md-spinner" size="50px" spin></ons-icon><h3> Loading...</h3></div>`
$(document).ready(function(){
    
    $.ajax({
      url :'https://randomuser.me/api/?results=11',
      method: 'GET',
      dataType : 'JSON',
      beforeSend : function(){
        $('#category').html(loader)
      },
    }).done(function(response){
      $('#category').html(``);
      response.results.map(d => {

        $('#category').append(`
        <li class="tab-category col">
        <ons-card class="book-category">
          <div class="cover card-image">
            <img src="${d.picture.large}" alt="${d.email}" ></img>
          </div>
          <ons-button class="read-more_">
            <a href="">Read More..</a>
          </ons-button>
        </ons-card>
        </li>
        `)
        
      })
    }).fail((data, stat, xhr)=>{
      ons.notification.alert(`Turn On The Internet  <i class="ion-android-wifi"></i> `)
      .then(()=> window.location.reload())
    })

    $('#reload').click(function(){
      window.location.reload();
    })
});
