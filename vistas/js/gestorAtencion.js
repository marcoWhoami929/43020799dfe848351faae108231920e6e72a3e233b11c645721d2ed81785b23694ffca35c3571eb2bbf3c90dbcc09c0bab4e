

/*=============================================
CARGAR LA TABLA DINÁMICA DE ATENCION A CLIENTES
=============================================*/

 $(".tablaAtencion").DataTable({
   "ajax":"ajax/tablaAtencion.ajax.php",
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

/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablaAtencion").on("click", ".btnEditarPedido", function(){

  var idPedido = $(this).attr("idPedido");
  
  var datos = new FormData();
  datos.append("idPedido", idPedido);

  $.ajax({

    url:"ajax/atencion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idPedido").val(respuesta["id"]);
      
      $("#editarCodigoCliente").val(respuesta["codigoCliente"]);
      $("#editarNombreCliente").val(respuesta["nombreCliente"]);
      var nombreCliente = $("#editarNombreCliente").val(respuesta["nombreCliente"]);

      if(nombreCliente.val() == "FLEX FINISHES MEXICO, S.A. DE C.V." || nombreCliente.val() == "PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V."){

           $("#editarCreado").val("Miguel Gutierrez");
           $("#editarTipoPago").val("Crédito");
           $("#editarMetodoPago").val("Pago en parcialidades");
           $("#editarFormaPago").val("99");
           $("#editarTipoRuta").val("Mostrador");

      }else {
          $("#editarCreado").val(respuesta["creado"]);
          $("#editarTipoPago").val(respuesta["tipoPago"]);
          $("#editarMetodoPago").val(respuesta["metodoPago"]);
          $("#editarFormaPago").val(respuesta["formaPago"]);
          $("#editarTipoRuta").val(respuesta["tipoRuta"]);
      }

      $("#editarCanal").val(respuesta["canal"]);
      $("#editarRfc").val(respuesta["rfc"]);
      $("#editarAgenteVentas").val(respuesta["agenteVentas"]);
      $("#editarDiasCredito").val(respuesta["diasCredito"]);
      var statusCliente = $("#editarStatusCliente").val(respuesta["statusCliente"]);

      if (statusCliente.val() == "1") {

        $("#editarStatusCliente").val("activado");
      }else {
        $("#editarStatusCliente").val("activado");
      }
      $("#editarSerie").val(respuesta["serie"]);
      $("#editarFolio").val(respuesta["folio"]);
     
      $("#editarOrdenCompra").val(respuesta["ordenCompra"]);
      $("#editarNumeroPartidas").val(respuesta["numeroPartidas"]);
      $("#editarNumeroUnidades").val(respuesta["numeroUnidades"]);
      $("#editarImporte").val(respuesta["importe"]);
      $("#editarFechaRecepcion").val(respuesta["fechaRecepcion"]);
      $("#editarFechaElaboracion").val(respuesta["fechaElaboracion"]);
      $("#tieneIgualado").val(respuesta["tieneIgualado"]);
      //$("#editarTipoCompra").val(respuesta["tipoCompra"]);
      $("#editarObservaciones").val(respuesta["observaciones"]);
      $("#editarObservaciones2").val(respuesta["observaciones2"]);
    }


  })


});
/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablaAtencion").on("click", ".Cancelado", function(){

  var idPedido2 = $(this).attr("idPedido2");
  
  var datos = new FormData();
  datos.append("idPedido2", idPedido2);

  $.ajax({

    url:"ajax/atencion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idPedido").val(respuesta["id"]);
      $("#verCancelacion").val(respuesta["motivoCancelacion"]);
    }


  })


})


/*=============================================
REVISAR SI EL FOLIO DEL PEDIDO EXISTE
=============================================*/

$(".validarFolio").keyup(function(){

  $(".alert").remove();

  var Folio = $(this).val();

  var datos = new FormData();
  datos.append("validarFolio", Folio);

   $.ajax({
      url:"ajax/atencion.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        if(respuesta.length != 0){

          $(".validarFolio").parent().after('<div class="alert alert-warning">Ya existe un pedido registrado con este folio.</div>');

          $(".validarFolio").val("");
      

        }

      }

    })

})
/*=============================================
CANCELAR PEDIDO
=============================================*/
$(".tablaAtencion").on("click", ".btnEliminarPedidos", function(){

  var idPedido = $(this).attr("idPedido");
  var folio = $(this).attr("folio");
  var serie = $(this).attr("serie");

  swal({
    title: '¿Está seguro de cancelar el pedido?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    input: 'textarea',
    inputPlaceholder: 'Ingrese el motivo de cancelación del pedido',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, cancelar pedido!',
      
  }).then(function(result){

    if(result.value){
      
      var motivo = result.value;
      window.location = "index.php?ruta=atencionClientes&idPedido="+idPedido+"&folio="+folio+"&motivo="+motivo+"&serie="+serie;

    }else {

      swal("Error!",'Opps estuvo apunto de cancelar el pedido', "error");
    }

  })

});

/*=============================================
HABILITAR FOLIO
=============================================*/
$(".tablaAtencion").on("click", ".btnHabilitarFolio", function(){

  var idPedido4 = $(this).attr("idPedido3");
  var estadoPedido= $(this).attr("estadoPedido");

  var datos = new FormData();
  datos.append("activarId", idPedido4);
    datos.append("activarPedido", estadoPedido);

    $.ajax({

    url:"ajax/atencion.ajax.php",
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
