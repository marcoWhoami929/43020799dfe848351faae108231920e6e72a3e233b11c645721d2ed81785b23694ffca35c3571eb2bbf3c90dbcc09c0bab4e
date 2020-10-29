function scTop(){
 $(".msgs").animate({scrollTop:$(".msgs")[0].scrollHeight});
}
function load_new_stuff(){
 localStorage['lpid'] = $(".msgs .msg:last").attr("title");
 $(".msgs").load("msgs.php",function(){
  if(localStorage['lpid']!=$(".msgs .msg:last").attr("title")){
   scTop();
  }
 });
 $(".users").load("users.php");
}

$(document).ready(function(){
    $('.tab').click(function(){
  		var dip = $(this).data('dip');
  		if(dip == "chat"){
          $('.chat').css('display','block');
          $('.users').css('display','none');
  		}else{
          $('.chat').css('display','none');
          $('.users').css('display','block');
  		}
  		return false;										 
    });
  scTop();
  $("#msg_form").on("submit",function(){
    t=$(this);
    val=$(this).find("input[type=text]").val();
    if(val!=""){
     $.post("send.php",{msg:val},function(){
      load_new_stuff();
      t[0].reset();
     });
    }
    return false;
  });
});

setInterval(function(){
  load_new_stuff();
  $.ajax({
    url: 'notificaciones.php',
    type: 'GET',
    success: function (response){
      if (response != 1) {
        return;
      }

      if (!("Notification" in window)) {
        alert("Este navegador no soporta las notificaciones de escritorio");
      }
    

      if (Notification.permission === "granted") {
        var myFunction = function() {
               location.href="http://dkmatrizz.ddns.net/salaChat";
            };
        var myImg = "http://dkmatrizz.ddns.net/vistas/img/plantilla/icono.png";
        var settings = $.extend({
          title: "Nuevo mensaje",
          options: {
            body: "Hola.. Tienes un nuevo mensaje en la sala de chat.",
            icon: myImg,
            lang: 'en-MX',
            onClose: "",
            onClick: "",
            onError: ""
          }
        });
   
        var notification = new Notification(settings.title,settings.options);
        
        notification.onclose = function() {
            if (typeof settings.options.onClose == 'function') { 
                settings.options.onClose();
            }
        };

        notification.onclick = function(){
            if (typeof settings.options.onClick == 'function') { 
                settings.options.onClick();
            }
        };

        notification.onerror  = function(){
            if (typeof settings.options.onError  == 'function') { 
                settings.options.onError();
            }
        };

      }
    },
    error: function (error){
      console.log(error);
    }
  })
},5000);

