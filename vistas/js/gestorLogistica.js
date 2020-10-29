/*=============================================
CARGAR LA TABLA DINÁMICA DE LOGISTICA
=============================================*/

var table5 = $(".tablaLogistica").DataTable({
   "ajax":"ajax/tablaLogistica.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
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



/*=============================================
EDITAR LOGISTICA
=============================================*/
$(".tablaLogistica").on("click", ".btnEditarPedido", function(){

  var idLogis = $(this).attr("idLogis");
  
  var datos = new FormData();
  datos.append("idLogis", idLogis);

  $.ajax({

    url:"ajax/logistica.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idLogis").val(respuesta["id"]);
      $("#editarIdPedido").val(respuesta["idPedido"]);
      $("#editarSerieFactura").val(respuesta["serieFactura"]);
      $("#editarFolioFactura").val(respuesta["folioFactura"]);
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#editarSerie").val(respuesta["serie"]);
      $("#editarFechaRecepcion").val(respuesta["fechaRecepcion"]);
      $("#editarFechaProgramada").val(respuesta["fechaProgramada"]);
      $("#editarStatus").val(respuesta["status"]);
      $("#editarTipoRuta").val(respuesta["tipoRuta"]);
      $("#editarOperador").val(respuesta["operador"]);
      $("#editarFechaEntregaCliente").val(respuesta["fechaEntregaCliente"]);
      $("#editarObservaciones").val(respuesta["observaciones"]);
    }


  })


})
/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablaLogistica").on("click", ".btnVerObservaciones", function(){

  var idLogistica4 = $(this).attr("idLogistica4");
  
  var datos = new FormData();
  datos.append("idLogistica4", idLogistica4);

  $.ajax({

    url:"ajax/logistica.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#idLogistica4").val(respuesta["id"]);
      $("#editarObservacionesExtras").val(respuesta["observacionesExtras"]);


    }


  })


})

/*=============================================
CANCELAR PEDIDO
=============================================*/
$(".tablaLogistica").on("click", ".btnEliminarPedido", function(){

  var idLogis = $(this).attr("idLogis");

  swal({
    title: '¿Está seguro de cancelar el pedido?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, cancelar pedido!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=logistica&idLogis="+idLogis;

    }

  })

})

/*=============================================
REVISAR SI EL FOLIO DEL PEDIDO EXISTE
=============================================*/

$(".validarPedido5").click(function(){

  $(".alert").remove();

  var Pedido = $(this).val();

  var datos = new FormData();
  datos.append("validarPedido5", Pedido);

   $.ajax({
      url:"ajax/logistica.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        if(respuesta.length != 0){

          $(".validarPedido5").parent().after('<div class="alert alert-warning">Este folio de pedido ya fue editado</div>');

          $(".validarPedido5").val("");

        }

      }

    })

})
/*=============================================
STATUS RUTA
=============================================*/


$(".tablaLogistica tbody").on("click", ".btnStatus", function(){


  var idLogistica = $(this).attr("idLogistica");
  var etapa = $(this).attr("etapa");

  var datos = new FormData();
  datos.append("idLogistica", idLogistica);
    datos.append("etapa", etapa);

      $.ajax({

       url:"ajax/logistica.ajax.php",
       method: "POST",
      data: datos,
      cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){ 
            
          console.log("respuesta", respuesta);

        }    

    });

    if(etapa == 1){
  
      $(this).addClass('btn-warning');
      $(this).removeClass('btn-danger');
      $(this).html('Ruta');
      $(this).attr('etapa', 2);

    }

  if(etapa == 2){
  
      $(this).addClass('btn-success');
      $(this).removeClass('btn-warning');
      $(this).html('Entregado');
  
    }
    

})