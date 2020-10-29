/*=============================================
ACTIVAR PERFIL
=============================================*/
$(".tablaUsuarios").on("click", ".btnActivar", function(){

	var idPerfil = $(this).attr("idPerfil");
	var estadoPerfil = $(this).attr("estadoPerfil");

	var datos = new FormData();
 	datos.append("activarId", idPerfil);
  	datos.append("activarPerfil", estadoPerfil);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
      	console.log("respuesta", respuesta);
      }

  	})

  	if(estadoPerfil == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoPerfil',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoPerfil',0);

  	}

})

/*=============================================
EDITAR PERFIL
=============================================*/
$(".tablaUsuarios").on("click", ".btnEditarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");
  
  var datos = new FormData();
  datos.append("idPerfil", idPerfil);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 

      $("#editarNombre").val(respuesta["profile_name"]);
      $("#idPerfil").val(respuesta["user_id"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#passwordActual").val(respuesta["password"]);


    }


  })


})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablaUsuarios").on("click", ".btnEliminarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");
  var nombre = $(this).attr("nombre");


  swal({
    title: '¿Está seguro de borrar el perfil?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar perfil!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idPerfil="+idPerfil+"&nombre="+nombre;

    }

  })

})