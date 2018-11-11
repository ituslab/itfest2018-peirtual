$(document).ready(function(){
  $.ajax({
    url :'https://randomuser.me/api/?results=10',
    method: 'GET',
    dataType : 'JSON',
    beforeSend : function(){
      $('#content').html(`
      <div class="center"><ons-icon icon="md-spinner" size="50px" spin></ons-icon><h3> Loading...</h3></div>
       `)
    },
  }).done(function(response){
    $('#content').html(``);
    response.results.map(d => {
      
      $('#content').append(`<ons-card style="width:200px;margin:0 5px auto;float:left;">
      <img src="${d.picture.large}" alt="photo"></img>
      <h3><strong>Nama:</strong> ${d.name.first} ${d.name.last}</h3>
    </ons-card >`)
    })
  }).fail((data, stat, xhr)=>{
    ons.notification.alert(`data code : ${data.status}`,{timeout: 1500})
  })
});
