/*=============================================
CARGAR LA TABLA DINÁMICA DE ORDENES DE TRABAJO DE ALMACEN
=============================================*/

var tablaAlmacenRuta = $(".tablaAlmacenRuta").DataTable({
    "ajax":"ajax/tablaAlmacenRuta.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "fixedHeader": true,
     "iDisplayLength": 10,
     "order": [[ 0, "desc" ]],
     /*"scrollX": true,*/
      "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
    "language": {
 
     "sProcessing":     "Procesando...",
     "sLengthMenu":     "Mostrar _MENU_ registros",
     "sZeroRecords":    "No se encontraron resultados",
     "sEmptyTable":     "Ningún dato disponible en esta tabla",
     "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
     "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
     "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
     "sInfoPostFix":    "",
     "sSearch":         "Buscar:",
     "sUrl":            "",
     "sInfoThousands":  ",",
     "sLoadingRecords": "Cargando...",
     "oPaginate": {
       "sFirst":    "Primero",
       "sLast":     "Último",
       "sNext":     "Siguiente",
       "sPrevious": "Anterior"
     },
     "oAria": {
         "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
         "sSortDescending": ": Activar para ordenar la columna de manera descendente"
     }
 
    }
 
 });
 setInterval( function () {
    tablaAlmacenRuta.ajax.reload( null, false ); // user paging is not reset on reload
}, 10000);


/*=============================================
EDITAR ORDEN ALMACEN
=============================================*/
$(".tablaAlmacenRuta").on("click", ".btnEditarOrdenAlmacen", function(){

    var idOrden= $(this).attr("idOrdenAlmacen");
    
    var datos = new FormData();
    datos.append("idOrden", idOrden);
  
    $.ajax({
  
      url:"ajax/almacenRuta.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){ 
        $("#otIdOrdenAlmacenEdit").val(respuesta["id"]);
        $("#otClienteEdit").val(respuesta["cliente"]);
        $("#otSerieEdit").val(respuesta["serie"]);
        $("#otFolioEdit").val(respuesta["folio"]);
        $("#otSerieTraspasoEdit").val(respuesta["serieTraspaso"]);
        $("#otFolioTraspasoEdit").val(respuesta["folioTraspaso"]);
        $("#otNumeroPartidasTraspasoEdit").val(respuesta["partidasTraspaso"]);
        $("#otNumeroUnidadesTraspasoEdit").val(respuesta["unidadesTraspaso"]);
        $("#otSerieTraspaso2Edit").val(respuesta["serieTraspaso2"]);
        $("#otFolioTraspaso2Edit").val(respuesta["folioTraspaso2"]);
        $("#otNumeroPartidasTraspaso2Edit").val(respuesta["partidasTraspaso2"]);
        $("#otNumeroUnidadesTraspaso2Edit").val(respuesta["unidadesTraspaso2"]);
        $("#otNumeroPartidasEdit").val(respuesta["numeroPartidas"]);
        $("#otNumeroUnidadesEdit").val(respuesta["numeroUnidades"]);
        $("#otImporteTotalEdit").val(respuesta["importeTotal"]);
        $("#otFechaRecepcionEdit").val(respuesta["fechaRecepcion"]);
        $("#otFechaSuministroEdit").val(respuesta["fechaSuministro"]);
        $("#otFechaTerminoEdit").val(respuesta["fechaTermino"]);
        $("#otAlmacenEdit").val(respuesta["almacen"]);
        $("#otEstatusEdit").val(respuesta["status"]);
        $("#otSuministradoEdit").val(respuesta["suministrado"]);
        $("#otComentariosEdit").val(respuesta["comentarios"]);

        
      }
  
  
    })
  
  
  });
  /*=============================================
  HABILITAR FOLIO  DE ORDEN DE TRABAJO
  =============================================*/
  $(".tablaAlmacenRuta").on("click", ".btnHabilitarFolio", function(){

    var idOrden4 = $(this).attr("idOrden3");
    var estadoOrden= $(this).attr("estadoOrden");

    var datos = new FormData();
    datos.append("activarId", idOrden4);
      datos.append("activarOrden", estadoOrden);

      $.ajax({

      url:"ajax/almacenRuta.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
          console.log("respuesta", respuesta);
        }

      })

      if(estadoOrden== 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>Deshabilitado');
        $(this).attr('estadoOrden',1);

      }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>Habilitado');
        $(this).attr('estadoOrden',0);

      }

  })
  /*=============================================
  VER LA LISTA DE TRASPASOS
  =============================================*/
  $(".tablaAlmacenRuta").on("click", ".btnVerOrdenes", function(){

    var idOrden4 = $(this).attr("idOrden4");

    var datos = new FormData();
    datos.append("idOrden2", idOrden4);

      $.ajax({

        url:"ajax/almacenRuta.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

          if(respuesta["folioTraspaso"] == "0"){

            $("#serieTraspaso").val("");
            $("#folioTraspaso").val("");

          }else{

            $("#serieTraspaso").val(respuesta["serieTraspaso"]);
            $("#folioTraspaso").val(respuesta["folioTraspaso"]);

          }
          if(respuesta["partidasTraspaso"] == "0"){

            $("#partidasTraspaso").val("");

          }else{

            $("#partidasTraspaso").val(respuesta["partidasTraspaso"]);

          }
          if(respuesta["unidadesTraspaso"] == "0"){

            $("#unidadesTraspaso").val("");

          }else{

            $("#unidadesTraspaso").val(respuesta["unidadesTraspaso"]);

          }
          if(respuesta["folioTraspaso2"] == "0"){

            $("#serieTraspaso2").val("");
            $("#folioTraspaso2").val("");

          }else{

            $("#serieTraspaso2").val(respuesta["serieTraspaso2"]);
            $("#folioTraspaso2").val(respuesta["folioTraspaso2"]);

          }
         
          if(respuesta["partidasTraspaso2"] == "0"){

            $("#partidasTraspaso2").val("");

          }else{

            $("#partidasTraspaso2").val(respuesta["partidasTraspaso2"]);

          }
          if(respuesta["unidadesTraspaso2"] == "0"){

            $("#unidadesTraspaso2").val("");

          }else{

            $("#unidadesTraspaso2").val(respuesta["unidadesTraspaso2"]);

          }


   
        }

      })

  });