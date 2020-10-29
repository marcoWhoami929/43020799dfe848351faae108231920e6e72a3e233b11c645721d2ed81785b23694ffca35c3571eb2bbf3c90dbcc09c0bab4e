/*=============================================
CARGAR LA TABLA DINÁMICA DE COTIZACIONES
=============================================*/

var tablaCot = $(".listaCotizaciones").DataTable({
   "ajax":"ajax/tablaCotizaciones.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
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



$('#listaCotizaciones tbody').on('click', 'tr', function () {
        var data = tablaCot.row( this ).data();
        //alert( 'Ha elegido la cotización '+data[1]+'' );

    } );

     $('#listaCotizaciones tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tablaCot.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
     $('#button').click( function () {
        tablaCot.row('.selected').remove().draw( false );
    } );

/*=============================================
CARGAR LA TABLA DINÁMICA DE COTIZACIONES
=============================================*/

 
/*=============================================
CANCELAR COTIZACION 
=============================================*/
$(".listaCotizaciones").on("click", ".btnCancelarCotizacion", function(){

  var idCotizacion = $(this).attr("idCotizacion");
  var folio = $(this).attr("folio");

  swal({
    title: '¿Está seguro de cancelar la cotizacion?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    input: 'textarea',
    inputPlaceholder: 'Ingrese el motivo de cancelación de la cotización',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, cancelar cotización!',
      
  }).then(function(result){

    if(result.value){
      
      var motivo = result.value;
      window.location = "index.php?ruta=cotizador&idCotizacion="+idCotizacion+"&folio="+folio+"&motivo="+motivo;

    }else {

      swal("Error!",'Opps estuvo apunto de cancelar la cotización', "error");
    }

  })

})
/*=============================================
DESCARGAR COTIZACION
=============================================*/
$(".listaCotizaciones").on("click", ".btnDescargarCotizacion", function(){

  var idCotizacion3 = $(this).attr("idCotizacion3");
  var folio3 = $(this).attr("idCotizacion3");

  swal({
    title: '¿Que desea realizar?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Visualizar',
      confirmButtonText: 'Descargar',
      
  }).then(function(result){

    if(result.value){

      var opcion = 1;
      window.location = "index.php?ruta=cotizador&idCotizacion3="+idCotizacion3+"&folio3="+folio3+"&opcion="+opcion;

    }else {

      var opcion = 2;
      window.open("vistas/modulos/mostrarCotizacion.php/?folio="+folio3+"&opcion="+opcion,'_blank')
      //window.location.href ="vistas/modulos/mostrarCotizacion.php/?folio="+folio3+"&opcion="+opcion;
    }

  })

})
/*=============================================
VER MOTIVO DE CANCELACIÓN
=============================================*/
$(".listaCotizaciones").on("click", ".Cancelado", function(){

  var idCotizacion2 = $(this).attr("idCotizacion2");
  
  var datos = new FormData();
  datos.append("idCotizacion2", idCotizacion2);

  $.ajax({

    url:"ajax/cotizaciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idCotizacion").val(respuesta["folio"]);
      $("#verCancelacion").val(respuesta["motivoCancelacion"]);
    }


  })


});
/*=============================================
EDITAR COTIZACION
=============================================*/
function getQueryVariable(variable) {
                
    var urlCotizacion = location.search;
    var query = urlCotizacion;
    var vars = query.split("?");
    for (var i=0; i < vars.length; i++) {
        var pair = vars[i].split("="); 
          if (pair[0] == variable) {
              return pair[1];
                }
            }
        return false;
    }
$(document).ready(function(){

  var URLactual = window.location;

   if (URLactual == "http://dkmatrizz.ddns.net/cotizador" || URLactual == "http://dkmatrizz.ddns.net/realizarCotizacion" || URLactual == "http://192.168.1.246/cotizador" || URLactual == "http://192.168.1.246/realizarCotizacion") {
                              
    }else{

      var idCotizacion = getQueryVariable("idCotizacion");

  
      var datos = new FormData();
      datos.append("idCotizacion", idCotizacion);

        $.ajax({

        url:"ajax/cotizaciones.ajax.php",
        method: "POST",
        data: datos,
        cache: true,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
          

          $.each(respuesta, function(i, item) {
             
              $("#idCotizacion").val(item[2]);
              $("#editarFolioCotizacion").val(item[2]);
              $("#editarFecha").val(item["fechaCotizacion"]);
              $("#editarDiasCredito").val(item["diasCredito"]);
              $("#editarEmpresa").val(item["empresa"]);
              $("#editarCodigoCliente").val(item["codigoCliente"]);
              $("#editarNombreCliente").val(item["nombreCliente"]);
              $("#editarRfc").val(item["rfc"]);
              $("#editarVencimiento").val(item["fechaVencimiento"]);
              $("#editarFechaEntrega").val(item["fechaEntrega"]);
              $("#editarDomicilioFiscal").val(item["domicilioFiscal"]);
              $("#editarReferencia").val(item["referencia"]);
              $("#editarObservaciones").val(item["observaciones"]);
              $("#editarMetodoPago").val(item["metodoPago"]);
              $("#editarFormaPago").val(item["formaPago"]);
              $("#editarMoneda").val(item["moneda"]);
              $("#editarTipoCambio").val(item["tipoCambio"]);
              $("#editarCodigoAgente").val(item["codigoAgente"]);
              $("#editarAgenteVentas").val(item["agenteVenta"]);
              $("#editarDescuentoMovimiento").val(item["porcentajeDescuento"]);
              $("#editarDescuentoMovimiento2").val(item["porcentajeDescuento2"]);
              $("#editarCodigo").val(item["codigoProducto"]);
              var listas = $("#editarListas").val(item["cantidadProductos"]);


          });
         
            /*

          $.each(respuesta, function(i, item2){
              console.log(item2["nombreProducto"])
              var parent = $('#unidad').parent();
              parent.find('input[name="nombre[]"]').val(item2["nombreProducto"]);
              parent.find('input[name="codigo[]"]').val(item2["codigoProducto"]);
              parent.find('input[name="cantidad[]"]').val(item2["cantidad"]);
              parent.find('input[name="unidadMedida[]"]').val(item2["unidad"]);
              parent.find('input[name="precio[]"]').val(item2["precio"]);
              parent.find('input[name="neto[]"]').val(item2["neto"]);
              parent.find('input[name="porcentajeDescuento[]"]').val(item2["porcentajeDescuento"]);
              parent.find('input[name="descuento[]"]').val(item2["descuento"]);
              parent.find('input[name="porcentajeDescuento2[]"]').val(item2["porcentajeDescuento2"]);
              parent.find('input[name="descuento2[]"]').val(item2["descuento2"]);
              parent.find('input[name="porcentajeIva[]"]').val(item2["porcentajeIva"]);
              parent.find('input[name="descuentoIva[]"]').val(item2["iva"]);
              parent.find('input[name="total[]"]').val(item2["total"]);
               
         
          
          });
          */
            


          /*
         for (var i = 0; i < respuesta.length; i++) {
          var parent = $('#unidad').parent().parent().parent();
          var valor = parent.find('input[name="nombre[]"]').val(respuesta[i]["nombreProducto"]);
          console.log(valor);
        
         }
         */
        

              /*
              $('[name="codigo[]"]').val(item2["codigoProducto"]);
              //$('[name="nombre[]"]').val(item2["nombreProducto"]);
              $('[name="cantidad[]"]').val(item2["cantidad"]);
              $('[name="unidadMedida[]"]').val(item2["unidad"]);
              $('[name="precio[]"]').val(item2["precio"]);
              $('[name="neto[]"]').val(item2["neto"]);
              $('[name="porcentajeDescuento[]"]').val(item2["porcentajeDescuento"]);
              $('[name="descuento[]"]').val(item2["descuento"]);
              $('[name="porcentajeDescuento2[]"]').val(item2["porcentajeDescuento2"]);
              $('[name="descuento2[]"]').val(item2["descuento2"]);
              $('[name="porcentajeIva[]"]').val(item2["porcentajeIva"]);
              $('[name="descuentoIva[]"]').val(item2["iva"]);
              $('[name="total[]"]').val(item2["total"]);
              */
 
        }


      })
     

    }
  


});
/*=============================================
ACTIVAR COTIZADOR
=============================================*/
$(".listaCotizaciones").on("click", ".btnAprobada", function(){

  var idPerAprobada = $(this).attr("idPerAprobada");
  var estadoAprobada = $(this).attr("estadoAprobada");

  var datos = new FormData();
  datos.append("activarIdCotiApro", idPerAprobada);
    datos.append("activarCotizadorApro", estadoAprobada);

    $.ajax({

    url:"ajax/cotizaciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
        console.log("respuesta", respuesta);
      }

    })

    if(estadoAprobada == 0){


      $(this).attr('estadoAprobada',1);

    }else{

      $(this).attr('estadoAprobada',0);

    }

})