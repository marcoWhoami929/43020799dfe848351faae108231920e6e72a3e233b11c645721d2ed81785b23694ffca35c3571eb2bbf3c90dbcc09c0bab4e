/*=============================================
CARGAR LA TABLA DINÁMICA DE ALMACEN
=============================================*/

var table2 = $(".tablaAlmacen").DataTable({
   "ajax":"ajax/tablaAlmacen.ajax.php",
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
    table2.ajax.reload(); // user paging is not reset on reload
}, 5000);

/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablaAlmacen").on("click", ".btnEditarPedido", function(){

  var idAlmacen2 = $(this).attr("idAlmacen2");
  
  var datos = new FormData();
  datos.append("idAlmacen2", idAlmacen2);

  $.ajax({

    url:"ajax/almacen.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#editarSuministrado").val(respuesta["suministrado"]);
      $("#idAlmacen2").val(respuesta["id"]);
      $("#editarSerie").val(respuesta["serie"]);
      $("#editarIdPedido").val(respuesta["idPedido"]);
      $("#editarFechaRecepcion").val(respuesta["fechaRecepcion"]);
      $("#editarFechaSuministro").val(respuesta["fechaSuministro"]);
      $("#editarFechaTermino").val(respuesta["fechaTermino"]);
      $("#editarStatus").val(respuesta["status"]);
      $("#editarTipoCompra").val(respuesta["tipoCompra"]);
      $("#editarObservaciones").val(respuesta["observaciones"]);
      $("#editarNumeroPartidas").val(respuesta["numeroPartidas"]);
      $("#editarNumeroUnidades").val(respuesta["numeroUnidades"]);
      $("#editarImporteTotal").val(respuesta["importeTotal"]);


    }


  })


});
/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablaAlmacen").on("click", ".btnVerObservaciones", function(){

  var idAlmacen4 = $(this).attr("idAlmacen4");
  
  var datos = new FormData();
  datos.append("idAlmacen4", idAlmacen4);

  $.ajax({

    url:"ajax/almacen.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#idAlmacen4").val(respuesta["id"]);
      $("#editarObservacionesExtras").val(respuesta["observacionesExtras"]);


    }


  })


})


/*=============================================
CANCELAR PEDIDO
=============================================*/
$(".tablaAlmacen").on("click", ".btnEliminarPedido", function(){

  var idAlmacen2 = $(this).attr("idAlmacen2");

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

      window.location = "index.php?ruta=almacen&idAlmacen2="+idAlmacen2;

    }

  })

})

/*=============================================
REVISAR SI EL FOLIO DEL PEDIDO EXISTE
=============================================*/

$(".validarPedido").click(function(){

  $(".alert").remove();

  var Pedido = $(this).val();

  var datos = new FormData();
  datos.append("validarPedido", Pedido);

   $.ajax({
      url:"ajax/almacen.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        if(respuesta.length != 0){

          $(".validarPedido").parent().after('<div class="alert alert-warning">Ya existe un pedido registrado con este folio.</div>');

          $(".validarPedido").val("");
          $("#numeroPartidas").val("");
          $("#numeroUnidades").val("");
          $("#importeTotal").val("");

        }

      }

    })

})

/*=============================================
HABILITAR FOLIO
=============================================*/
$(".tablaAlmacen").on("click", ".btnHabilitarFolio", function(){

  var idPedido = $(this).attr("idAlmacen3");
  var estadoPedido= $(this).attr("estadoPedido");

  var datos = new FormData();
  datos.append("activarId", idPedido);
    datos.append("activarPedido", estadoPedido);

    $.ajax({

    url:"ajax/almacen.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
        console.log("respuesta", respuesta);
      }

    })

    if(estadoPedido== 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('<i class="fa fa-power-off"></i>Deshabilitado');
      $(this).attr('estadoPedido',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('<i class="fa fa-power-off"></i>Habilitado');
      $(this).attr('estadoPedido',0);

    }

})
