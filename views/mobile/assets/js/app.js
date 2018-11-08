$(document).ready(function(){
  $('#click').click(function(){
    ons.notification.toast('You Have New Message', {timeout: 1200, animation : 'fall'})
  });

  $('#profile').click(()=>{
    $.get('https://my-json-server.typicode.com/zzcomzz/db/users/',(data)=>{
      ons.notification.alert(`${data}`);
    })
  })
});