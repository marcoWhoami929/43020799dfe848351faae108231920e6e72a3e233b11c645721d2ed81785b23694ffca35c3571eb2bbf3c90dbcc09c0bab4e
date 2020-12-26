/*=============================================
CARGAR LA TABLA DINÁMICA DE FACTURACION TIENDAS
=============================================*/

if ($("#fecha").val() != "") {
  var fecha = $("#fecha").val();
}
else {
  var fecha = "";
}
if ($("#fechaFin").val() != "") {
  var fechaFin = $("#fechaFin").val();
}
else {
  var fechaFin = "";
}
if($("#tienda").val() != ""){
  var sucursal = $("#tienda").val();

}else {
  var sucursal  = "";
}


facturasTiendas = $(".tablaFacturacionTiendas").DataTable({
   "ajax":"ajax/tablaFacturacionTiendas.ajax.php?fecha="+fecha+"&fechaFin="+fechaFin+"&sucursal="+sucursal,
   //"ajax":"ajax/tablaFacturacionTiendas.ajax.php",
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
facturasTiendasSaldosPendientes = $(".tablaFacturacionTiendasSaldosPendientes").DataTable({
   "ajax":"ajax/tablaFacturacionTiendasSaldosPendientes.ajax.php?fecha="+fecha+"&fechaFin="+fechaFin+"&sucursal="+sucursal,
   //"ajax":"ajax/tablaFacturacionTiendas.ajax.php",
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
CARGAR LA TABLA DINÁMICA DE VENTAS TIENDAS
=============================================*/

if ($("#fechaVenta").val() != "") {
  var fechaVenta = $("#fechaVenta").val();
}
else {
  var fechaVenta = "";
}

if($("#sucursalVenta").val() != ""){
  var sucursalVenta = $("#sucursalVenta").val();

}else {
  var sucursalVenta  = "";
}


var ventasTiendas = $(".tablaVentasTiendas").DataTable({
   "ajax":"ajax/tablaVentasTiendas.ajax.php?fechaVenta="+fechaVenta+"&sucursalVenta="+sucursalVenta,
   //"ajax":"ajax/tablaFacturacionTiendas.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
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
CARGAR LA TABLA DINÁMICA DE COBROS TIENDAS
=============================================*/

if ($("#fechaCobro").val() != "") {
  var fechaCobro = $("#fechaCobro").val();
}
else {
  var fechaCobro = "";
}

if($("#sucursalCobro").val() != ""){
  var sucursalCobro = $("#sucursalCobro").val();

}else {
  var sucursalCobro  = "";
}


var cobrosTiendas = $(".tablaCobrosTiendas").DataTable({
   "ajax":"ajax/tablaCobrosTiendas.ajax.php?fechaCobro="+fechaCobro+"&sucursalCobro="+sucursalCobro,
   "columns" : [
      {
        className      : 'details-control',
        defaultContent : '',
        data           : null,

        orderable      : false
      },
      {data : '0'},
      {data : '1'},
      {data : '2'},
      {data : '3'},
      {data : '4'},
      {data : '5'},
      {data : '6'},
      {data : '7'},
      {data : '8'}
    ],
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 50,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
    /*"scrollX": true,*/
    /*"scrollY":  "500px",*/
    
    "paging":         false,

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
 $('.tablaCobrosTiendas tbody').on('click', 'td.details-control', function () {
     var tr  = $(this).closest('tr'),
         row = cobrosTiendas.row(tr);
    
     if (row.child.isShown()) {
       tr.next('tr').removeClass('details-row');
       row.child.hide();
       tr.removeClass('shown');
    
     }
     else { 

             
              var cliente = $(this).parents("tr").find("td:eq(1)").html();
              if ($("#fechaCobro").val() != "") {
                  var fechaCobro = $("#fechaCobro").val();
                }
                else {
                  var fechaCobro = "";
                }

                if($("#sucursalCobro").val() != ""){
                  var sucursalCobro = $("#sucursalCobro").val();

                }else {
                  var sucursalCobro  = "";
                }
              var fechaCobroCorte = fechaCobro;
               var sucursalCobroCorte = sucursalCobro;


              var datos = new FormData();
              datos.append('nombreCliente',cliente);
              datos.append('fechaCobroCorte',fechaCobroCorte);
              datos.append('sucursalCobroCorte',sucursalCobroCorte);
              $.ajax({

                    url:"ajax/facturacionTiendas.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta){ 
                       
                    
                         row.child(format(JSON.stringify(respuesta))).show();
                         tr.next('tr').addClass('details-row');
                         tr.addClass('shown');
                    }

                  });
      
    
     }
  });
/*=============================================
CARGAR LA TABLA DINÁMICA DE GASTOS
=============================================*/

gastosTiendas = $(".tablaGastosTiendas").DataTable({
   "ajax":"ajax/tablaGastosTiendas.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 4, "asc" ]],
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
CARGAR LA TABLA DINÁMICA DE CANCELACIONES TIENDAS
=============================================*/
if ($("#sucursalElegida").val() != "") {
  var sucursalElegida = $("#sucursalElegida").val();
}
else {
  var sucursalElegida = "";
}
var cancelacionesTiendas = $(".tablaCancelacionesTiendas").DataTable({
   "ajax":"ajax/tablaCancelacionesTiendas.ajax.php?sucursalElegida="+sucursalElegida,
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
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
CARGAR LA TABLA DINÁMICA DE LA LISTA DE FACTURAS
=============================================*/
if ($("#sucursalElegida").val() != "") {
  var sucursalElegida = $("#sucursalElegida").val();
}
else {
  var sucursalElegida = "";
}
var listaFacturas = $(".tablaListaFacturasTiendas").DataTable({
    "ajax":"ajax/tablaListaFacturas.ajax.php?sucursalElegida="+sucursalElegida,
    "deferRender": true,
    "responsive": true,
    "retrieve": true,
    "processing": true,
    "iDisplayLength": 5,
    "scrollY": 300,
    "scrollX": true,
    "scrollCollapse": true,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
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
$(".tablaCancelacionesTiendas").on("click", ".btnRefacturar", function(){

    var idFacturaTienda = $(this).attr("idFacturaTienda");

    $("#idFacturaTienda").val(idFacturaTienda);

    listaFacturas.ajax.reload();




})
$(".tablaListaFacturasTiendas").on("click", ".btnVincularFactura", function() {
    var idFactura = $(this).attr("idFactura");
    var idFacturaTienda = $("#idFacturaTienda").val();

    var datos = new FormData();
    datos.append("idFactura", idFactura);
    datos.append("idFacturaTienda", idFacturaTienda);
  
    $.ajax({
        url: "ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            var response = respuesta;
            var responseFinal = response.replace(/['"]+/g, '');
            if (responseFinal == "ok") {

                $("#vinculacionExitosa").css('display', 'block');
                setTimeout(function() {
                   $("#vinculacionExitosa").css('display', 'none');
                }, 3000);
                listaFacturas.ajax.reload();
                cancelacionesTiendas.ajax.reload();

              

            }
        }
    })
    
   
});
$(".btnActualizarCanceladas").click(function(){
    cancelacionesTiendas.ajax.reload();
}) 

$(".tablaCancelacionesTiendas").on("click", ".btnVerFacturaVinculada", function() {
    var idFacturaVista = $(this).attr("idFacturaTiendaVista");
    var datos = new FormData();
      datos.append("idFacturaVista", idFacturaVista);

      $.ajax({

        url:"ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
          $("#serieVinculado").val(respuesta["serie"]);
          $("#folioVinculado").val(respuesta["folio"]);
          $("#fechaFacturaVinculado").val(respuesta["fechaFactura"]);
          $("#nombreClienteVinculado").val(respuesta["nombreCliente"]);
          let total = respuesta["total"];
          $("#totalVinculado").val("$"+" "+respuesta["total"]);
          
        }


      })


});

/*=============================================
CARGAR LA TABLA DINÁMICA DE DEPOSITOS DE TIENDAS
=============================================*/
$("#btnBuscarMovimientoBancario").click(function(){

  var movimiento = $("#movimientoBancario").val();
  localStorage.setItem("busquedaMovimiento", movimiento);
  location.reload();

})
if (localStorage.getItem("busquedaMovimiento") == null) {
  
    var numeroMovimientoBanco = $("#movimientoBancario").val();

}else{
    $("#movimientoBancario").val(localStorage.getItem("busquedaMovimiento"));
    var numeroMovimientoBanco = localStorage.getItem("busquedaMovimiento");

}
$("#btnLimpiarMovimiento").click(function(){

    localStorage.removeItem("busquedaMovimiento");

});

depositosTiendas = $(".tablaDepositosTiendas").DataTable({
    "ajax":"ajax/tablaDepositosTiendas.ajax.php?numeroMovimientoBanco="+numeroMovimientoBanco,
    "deferRender": true,
    "responsive": true,
    "retrieve": true,
    "processing": true,
    "iDisplayLength": 5,
    "scrollY": 300,
    "scrollX": true,
    "scrollCollapse": true,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
    /*"scrollX": true,*/
     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Lo sentimos el movimiento no se encuentra registrado :(",
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
$(".tablaDepositosTiendas").on("click", ".btnIdentificarDeposito", function() {
    var idMovimientoBanco = $(this).attr("idMovimientoBanco");
    var abono = $(this).attr("abono");
    var fechaAbono = $(this).attr("fechaAbono");

    $("#abonoBanco").html("$"+" "+abono);
    $("#abonoBancoTotal").val(abono);
    $("#idMovimientoBanco").val(idMovimientoBanco);

    localStorage.setItem("idMovimientoBanco", idMovimientoBanco);
    localStorage.setItem("abonoBanco", abono);
    localStorage.setItem("fechaAbono", fechaAbono);

    $("#abonoFacturas").html("$"+" "+"0");

    listaFacturasDepositos = $(".tablaListaFacturasDepositos").DataTable({
        "ajax":"ajax/tablaListaFacturasDepositos.ajax.php?idMovimientoBanco="+idMovimientoBanco,
        "deferRender": true,
        "responsive": true,
        "retrieve": true,
        "processing": true,
        "iDisplayLength": 5,
       
        "scrollCollapse": true,
        "fixedHeader": true,
        "order": [[ 0, "asc" ]],
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



});
$(".tablaDepositosTiendas").on("click", ".btnEditarDeposito", function() {
    var idMovimientoBanco = $(this).attr("idMovimientoBanco");

    listaFacturasDepositos = $(".tablaListaFacturasDepositos").DataTable({
        "ajax":"ajax/tablaListaFacturasDepositos.ajax.php?idMovimientoBanco="+idMovimientoBanco,
        "deferRender": true,
        "responsive": true,
        "retrieve": true,
        "processing": true,
        "iDisplayLength": 5,
       
        "scrollCollapse": true,
        "fixedHeader": true,
        "order": [[ 0, "asc" ]],
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


    var abono = $(this).attr("abono");
    var fechaAbono = $(this).attr("fechaAbono");
    var abonadoFacturas = $(this).attr("abonadoFacturas");
    var arregloClientes = $(this).attr("arregloClientes");
    var arregloDocumento = $(this).attr("arregloDocumento");
    var arregloFacturas = $(this).attr("arregloFacturas");
    var arregloValorDocumento = $(this).attr("arregloValorDocumentos");
    var numeroParciales = $(this).attr("parciales");
    var span = $(this).attr("span");

    var arregloSpan = span.split(',');
    var arreglosFacturas = arregloFacturas.split(',');
    var arreglosDocumentos = arregloDocumento.split(',');

    for (var i=0; i < arregloSpan.length; i++) {

      let spanFacturas = "<span id="+arregloSpan[i]+">"+arreglosDocumentos[i]+' '+'$ '+arreglosFacturas[i]+' '+"</span>";
      $("#listaFacturas").append(spanFacturas);
      
    }
    

    var totalAbonado  = abonadoFacturas;

    $("#abonoBanco").html("$"+" "+abono);
    $("#abonoBancoTotal").val(abono);
    $("#idMovimientoBanco").val(idMovimientoBanco);

    $("#abonoFacturas").html("$"+" "+totalAbonado);

    localStorage.setItem("idMovimientoBanco", idMovimientoBanco);
    localStorage.setItem("abonoBanco", abono);
    localStorage.setItem("fechaAbono", fechaAbono);
    localStorage.setItem("abonadoFacturas", totalAbonado);
    localStorage.setItem("arregloClientes", arregloClientes);
    localStorage.setItem("arregloDocumento", arregloDocumento);
    localStorage.setItem("arregloFacturas", arregloFacturas);
    localStorage.setItem("arregloValorDocumento", arregloValorDocumento);
    localStorage.setItem("numeroParciales", numeroParciales);
    localStorage.setItem("spanLista",arregloSpan);

    if (localStorage.getItem("arregloFacturas") == null || localStorage.getItem("arregloFacturas") == "") {

          var arregloFacturas = [];

    }else{

          var arregloFacturas = localStorage.getItem("arregloFacturas").split(',');

    }
    if (localStorage.getItem("arregloClientes") == null || localStorage.getItem("arregloClientes") == "") {

          var arregloClientes = [];

    }else{

          var arregloClientes = localStorage.getItem("arregloClientes").split(',');

    }
    if (localStorage.getItem("arregloDocumento") == null || localStorage.getItem("arregloDocumento") == "") {

          var arregloDocumento = [];

    }else{

          var arregloDocumento = localStorage.getItem("arregloDocumento").split(',');

    }
    if (localStorage.getItem("arregloValorDocumento") == null || localStorage.getItem("arregloValorDocumento") == "") {

          var arregloValorDocumento = [];

    }else{

          var arregloValorDocumento = localStorage.getItem("arregloValorDocumento").split(',');

    }
    if (localStorage.getItem("spanLista") == null || localStorage.getItem("spanLista") == "") {

          var spanLista = [];

    }else{

          var spanLista = localStorage.getItem("spanLista").split(',');

    }

});

/*=============================================
CARGAR LA TABLA DINÁMICA DE LA LISTA DE FACTURAS
=============================================*/


 $(".tablaListaFacturasDepositos").on("click", ".btnVincularFacturaDepositada", function() {

  if (localStorage.getItem("arregloFacturas") == null || localStorage.getItem("arregloFacturas") == "") {

          var arregloFacturas = [];

    }else{

          var arregloFacturas = localStorage.getItem("arregloFacturas").split(',');

    }
    if (localStorage.getItem("arregloClientes") == null || localStorage.getItem("arregloClientes") == "") {

          var arregloClientes = [];

    }else{

          var arregloClientes = localStorage.getItem("arregloClientes").split(',');

    }
    if (localStorage.getItem("arregloDocumento") == null || localStorage.getItem("arregloDocumento") == "") {

          var arregloDocumento = [];

    }else{

          var arregloDocumento = localStorage.getItem("arregloDocumento").split(',');

    }
    if (localStorage.getItem("arregloValorDocumento") == null || localStorage.getItem("arregloValorDocumento") == "") {

          var arregloValorDocumento = [];

    }else{

          arregloValorDocumento = localStorage.getItem("arregloValorDocumento").split(',');

    }
    if (localStorage.getItem("spanLista") == null || localStorage.getItem("spanLista") == "") {

          var spanLista = [];

    }else{

          var spanLista = localStorage.getItem("spanLista").split(',');

    }

    var identificador = $(this).attr("identificador");
    var idFacturaDepositada = $(this).attr("idFacturaDepositada");
    var nombreSucursal = $(this).attr("nombreSucursal");
    var montoFactura = $("#importeDeposito"+identificador).val();
    var valorDocumento = $(this).attr('valorDocumento');
    var nombreCliente = $(this).attr("nombreCliente");
    var serieFactura = $(this).attr("serieFactura");
    var folioFactura = $(this).attr("folioFactura");
    let spanFacturas = "<span id="+Math.trunc(montoFactura+identificador)+">"+serieFactura+' '+folioFactura+' '+'$ '+montoFactura+"</span>";

    $("#listaFacturas").append(spanFacturas);
    
    spanLista.push(Math.trunc(montoFactura+identificador));

    localStorage.setItem("spanLista", spanLista);
   

    var documento = serieFactura+" "+folioFactura;

    arregloFacturas.push(montoFactura);
    arregloClientes.push(nombreCliente);
    arregloDocumento.push(documento);
    arregloValorDocumento.push(valorDocumento);

    localStorage.setItem("arregloFacturas", arregloFacturas);
    localStorage.setItem("arregloClientes", arregloClientes);
    localStorage.setItem("arregloDocumento", arregloDocumento);
    localStorage.setItem("arregloValorDocumento", arregloValorDocumento);
    localStorage.setItem("sucursal", nombreSucursal);

    var arrayFacturas = localStorage.getItem("arregloFacturas").split(',');
    var arrayClientes = localStorage.getItem("arregloClientes").split(',');
 
    /*****FUNCION UNIQUE PARA MOSTRAR SOLO LOS ELEMENTOS DEL ARREGLO UNA SOLA VEZ*******/
    function unique(array) {
    return $.grep(array, function(el, index) {
        return index == $.inArray(el, array);
    });
    }
    /*****FUNCION UNIQUE PARA MOSTRAR SOLO LOS ELEMENTOS DEL ARREGLO UNA SOLA VEZ*******/
    var numeroParciales = unique(arrayClientes);

    localStorage.setItem("numeroParciales", numeroParciales.length);

    var total = 0;
    for(var i = 0; i < arrayFacturas.length; i++) {
        total += parseFloat(arrayFacturas[i]);
    }

    var totalAbono = $("#abonoBancoTotal").val();
    var tot = parseFloat(totalAbono) + 1;
   
    if (total > tot) {
        document.getElementById("btnVincularFacturas").disabled = true;
    
        document.getElementById("abonoFacturas").style.color = "red";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));

    }else{

         document.getElementById("btnVincularFacturas").disabled =false;
        document.getElementById("abonoFacturas").style.color = "black";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));
    }
    

   

    var datos = new FormData();
    datos.append("serieFacturaDepositada", serieFactura);
    datos.append("folioFacturaDepositada", folioFactura);
    datos.append("abonoFactura", montoFactura);

    $.ajax({
        url: "ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

           listaFacturasDepositos.ajax.reload();

        }
    })
    
    
   
}); 


function borraItemValor(array, valor){
    for(var i in array){
       
        if(array[i]==valor){
            array.splice(i,1);
            break;
        }
    }
}
$(".tablaListaFacturasDepositos").on("click", ".btnQuitarFacturaDepositada", function() {

     if (localStorage.getItem("arregloFacturas") == null || localStorage.getItem("arregloFacturas") == "") {

          var arregloFacturas = [];

    }else{

          var arregloFacturas = localStorage.getItem("arregloFacturas").split(',');

    }
    if (localStorage.getItem("arregloClientes") == null || localStorage.getItem("arregloClientes") == "") {

          var arregloClientes = [];

    }else{

          var arregloClientes = localStorage.getItem("arregloClientes").split(',');

    }
    if (localStorage.getItem("arregloDocumento") == null || localStorage.getItem("arregloDocumento") == "") {

          var arregloDocumento = [];

    }else{

          var arregloDocumento = localStorage.getItem("arregloDocumento").split(',');

    }
    if (localStorage.getItem("arregloValorDocumento") == null || localStorage.getItem("arregloValorDocumento") == "") {

          var arregloValorDocumento = [];

    }else{

          arregloValorDocumento = localStorage.getItem("arregloValorDocumento").split(',');

    }
    if (localStorage.getItem("spanLista") == null || localStorage.getItem("spanLista") == "") {

          var spanLista = [];

    }else{

          var spanLista = localStorage.getItem("spanLista").split(',');

    }


    var identificador = $(this).attr("identificadorRemove");
    var idFacturaDepositadaRemove = $(this).attr("idFacturaDepositadaRemove");
    var montoFactura = $("#importeDeposito"+identificador).val();
    var valorDocumento = $(this).attr('valorDocumentoRemove');
    var nombreCliente = $(this).attr("nombreCliente");
    var serieFactura = $(this).attr("serieFactura");
    var folioFactura = $(this).attr("folioFactura");
    $("#"+Math.trunc(montoFactura+identificador)+"").remove();
    var variable = Math.trunc(montoFactura+identificador);

    var documento = serieFactura+" "+folioFactura;
    
    
    borraItemValor(arregloFacturas, montoFactura);
    borraItemValor(arregloClientes, nombreCliente);
    borraItemValor(arregloDocumento, documento);
    borraItemValor(arregloValorDocumento, valorDocumento);
    borraItemValor(spanLista,variable);

    localStorage.setItem("arregloFacturas", arregloFacturas);
    localStorage.setItem("arregloClientes", arregloClientes);
    localStorage.setItem("arregloDocumento", arregloDocumento);
    localStorage.setItem("arregloValorDocumento", arregloValorDocumento);
    localStorage.setItem("spanLista", spanLista);

    var arrayFacturas = localStorage.getItem("arregloFacturas").split(',');
    var arrayClientes = localStorage.getItem("arregloClientes").split(',');

     /*****FUNCION UNIQUE PARA MOSTRAR SOLO LOS ELEMENTOS DEL ARREGLO UNA SOLA VEZ*******/
    function unique(array) {
    return $.grep(array, function(el, index) {
        return index == $.inArray(el, array);
    });
    }
    /*****FUNCION UNIQUE PARA MOSTRAR SOLO LOS ELEMENTOS DEL ARREGLO UNA SOLA VEZ*******/
    var numeroParciales = unique(arrayClientes);

    localStorage.setItem("numeroParciales", numeroParciales.length);
    
    var total = 0;
    for(var i = 0; i < arrayFacturas.length; i++) {
        total += parseFloat(arrayFacturas[i]);
    }

   
    var totalAbono = $("#abonoBancoTotal").val();
    var tot = parseFloat(totalAbono) + 1;
    if (total > tot) {

        document.getElementById("btnVincularFacturas").disabled = true;
        document.getElementById("abonoFacturas").style.color = "red";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));

    }else{

        document.getElementById("btnVincularFacturas").disabled = false;
        document.getElementById("abonoFacturas").style.color = "black";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));
    }
   var idMovimientoBanco = localStorage.getItem("idMovimientoBanco")
   var datos = new FormData();
     datos.append("serieFacturaDepositadaRemove", serieFactura);
     datos.append("folioFacturaDepositadaRemove", folioFactura);
     datos.append("abonoFacturaRemove", montoFactura);
     datos.append("idMovimientoBancoRemove", idMovimientoBanco);

    $.ajax({
        url: "ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

           listaFacturasDepositos.ajax.reload();

        }
    })
    
    
   
});
$(".btnActualizarDepositos").click(function(){
     localStorage.removeItem("arregloFacturas");         
     localStorage.removeItem("arregloClientes");         
     localStorage.removeItem("arregloDocumento");   
     localStorage.removeItem("arregloValorDocumento");       
     localStorage.removeItem("idMovimientoBanco");
     localStorage.removeItem("abonoBanco");
     localStorage.removeItem("nombreSucursal");
     localStorage.removeItem("numeroParciales");
     localStorage.removeItem("abonadoFacturas");
     localStorage.removeItem("fechaAbono");
     localStorage.removeItem("spanLista");
     $("#listaFacturas").empty();
      listaFacturasDepositos.destroy();
});

$("#btnVincularFacturas").click(function(){

  var idMovimiento = localStorage.getItem("idMovimientoBanco");
  var conceptoAbono = localStorage.getItem("arregloDocumento");
  var clientesAbono = localStorage.getItem("arregloClientes");
  var parcialesAbono = localStorage.getItem("arregloFacturas");
  var totalAbonado = localStorage.getItem("abonadoFacturas");
  var nombreSucursal = localStorage.getItem("sucursal");
  var numeroParciales = localStorage.getItem("numeroParciales");
  var fechaAbono = localStorage.getItem("fechaAbono");
  var listaSpan = localStorage.getItem("spanLista");

  var totalAbono = localStorage.getItem("abonoBanco");

  var totalDocumento = localStorage.getItem("arregloValorDocumento");

  var saldoPendiente = totalAbono - totalAbonado;

  if (totalAbonado == 0 || totalAbonado === null) {

      $("#fracaso").css('display', 'block');
                setTimeout(function() {
                   $("#fracaso").css('display', 'none');
                }, 3000);

  }else{

      var datos = new FormData();

      datos.append("idMovimientoBancario", idMovimiento);
      datos.append("conceptoAbono", conceptoAbono);
      datos.append("clientesAbono", clientesAbono);
      datos.append("parcialesAbono", parcialesAbono);
      datos.append("saldoPendiente", saldoPendiente);
      datos.append("abono", totalAbono);
      datos.append("nombreSucursal", nombreSucursal);
      datos.append("numeroParciales", numeroParciales);
      datos.append("fechaAbono", fechaAbono);
      datos.append("totalDocumento", totalDocumento);
      datos.append("totalAbonado", totalAbonado);
      datos.append("listaSpan",listaSpan);

     $.ajax({
        url: "ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

          localStorage.removeItem("arregloFacturas");         
          localStorage.removeItem("arregloClientes");         
          localStorage.removeItem("arregloDocumento");   
          localStorage.removeItem("arregloValorDocumento");       
          localStorage.removeItem("idMovimientoBanco");
          localStorage.removeItem("abonoBanco");
          localStorage.removeItem("nombreSucursal");
          localStorage.removeItem("numeroParciales");
          localStorage.removeItem("abonadoFacturas");
          localStorage.removeItem("fechaAbono");
          localStorage.removeItem("spanLista");
          $("#listaFacturas").empty();

          //$("#abonoFacturas").html("$"+" "+"0.00");
          //document.getElementById("listaFacturas").innerHTML="";
           $("#exito").css('display', 'block');
           document.getElementById('statusProceso').innerHTML = "Procesando Datos";
                setTimeout(function() {
                  document.getElementById('statusProceso').innerHTML = "Datos Procesados";
                   //$("#exito").css('display', 'none');
                   //depositosTiendas.ajax.reload();
                   location.reload();
                }, 2000);
                

        }
    })
    
  }
  
  
    
})
$(".tablaFacturacionTiendas").on("click", ".btnGenerarSolicitudCancelacion", function() {
    var serieFactura = $(this).attr("serieFac");
    var folioFactura = $(this).attr("folioFac");
    var clienteFactura = $(this).attr("clienteFac");
    var idFacturaSolic = $(this).attr("idFacturaSolic");

    $("#serieFacturaT").val(serieFactura);
    $("#folioFacturaT").val(folioFactura);

    $("#datosFactura").html(serieFactura+" "+folioFactura);
    $("#nombreCliente").html(clienteFactura);
    $("#idFacturaSolicitud").val(idFacturaSolic);

    document.getElementById("crearContenidoT").value = "Se solicita la cancelación de la factura"+" "+serieFactura+" "+folioFactura+" "+"del cliente"+" "+clienteFactura+".";



});

function fileValidationFacturaT(){
    var fileInput = document.getElementById('archivoFacturaT');
    var filePath = fileInput.value;
    var allowedExtensions = /(.xml|.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
          swal({

            type: "error",
            title: "¡Solo se permiten archivos pdf.!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){
            
             

            }

          });

        fileInput.value = '';
        return false;
    }
}
$(".tablaFacturacionTiendas").on("click",".btnVerDetallesTicket",function(){
    var idSolicitudCancelacion = $(this).attr("idSolicitud");
    var datos = new FormData();
    datos.append('idSolicitud',idSolicitudCancelacion);

    $.ajax({
      url:"ajax/facturacionTiendas.ajax.php",
      method:"POST",
      data:datos,
      cache:false,
      contentType:false,
      processData:false,
      dataType: "json",
      success:function(respuesta){
        
        document.getElementById("dptoTicket").innerHTML = respuesta["departamento"];
        document.getElementById("numeroTicket").innerHTML = "#"+" "+respuesta["numeroTicket"]+" "+respuesta["titulo"];
        document.getElementById("autorTicket").innerHTML = respuesta["autor"];
        if (respuesta["prioridad"] == 1) {

          $("#prioridadTicket").addClass('label-danger');
          document.getElementById("prioridadTicket").innerHTML = "Alta";

        }else if(respuesta["prioridad"] == 2){

           $("#prioridadTicket").addClass('label-warning');
          document.getElementById("prioridadTicket").innerHTML = "Media";

        }else if(respuesta["prioridad"] == 3){

           $("#prioridadTicket").addClass('label-success');
          document.getElementById("prioridadTicket").innerHTML = "Baja";

        }

        if (respuesta["cerrado"] == 0) {

           $("#estadoTicket").addClass('label-success');
          document.getElementById("estadoTicket").innerHTML = "Abierto";

        }else{

          $("#estadoTicket").addClass('label-danger');
          document.getElementById("estadoTicket").innerHTML = "Cerrado";

        }
        document.getElementById("serieFacturaTicket").innerHTML = respuesta["serieFactura"];
        document.getElementById("folioFacturaTicket").innerHTML = respuesta["folioFactura"];
        document.getElementById("fechaTicket").innerHTML = respuesta["fecha"];
        document.getElementById("motivoCancelacionTicket").innerHTML = respuesta["contenido"];
      }

    })
});
$(".tablaCancelacionesTiendas").on("click",".btnVerDetallesTicketCancelado",function(){
    var idSolicitudCancelacion = $(this).attr("idSolicitudTicket");
    var datos = new FormData();
    datos.append('idSolicitud',idSolicitudCancelacion);

    $.ajax({
      url:"ajax/facturacionTiendas.ajax.php",
      method:"POST",
      data:datos,
      cache:false,
      contentType:false,
      processData:false,
      dataType: "json",
      success:function(respuesta){

        
        document.getElementById("dptoTicket").innerHTML = respuesta["departamento"];
        document.getElementById("numeroTicket").innerHTML = "#"+" "+respuesta["numeroTicket"]+" "+respuesta["titulo"];
        document.getElementById("autorTicket").innerHTML = respuesta["autor"];
        if (respuesta["prioridad"] == 1) {

          $("#prioridadTicket").addClass('label-danger');
          document.getElementById("prioridadTicket").innerHTML = "Alta";

        }else if(respuesta["prioridad"] == 2){

           $("#prioridadTicket").addClass('label-warning');
          document.getElementById("prioridadTicket").innerHTML = "Media";

        }else if(respuesta["prioridad"] == 3){

           $("#prioridadTicket").addClass('label-success');
          document.getElementById("prioridadTicket").innerHTML = "Baja";

        }

        if (respuesta["cerrado"] == 0) {

           $("#estadoTicket").addClass('label-success');
          document.getElementById("estadoTicket").innerHTML = "Abierto";

        }else{

          $("#estadoTicket").addClass('label-danger');
          document.getElementById("estadoTicket").innerHTML = "Cerrado";

        }
        document.getElementById("serieFacturaTicket").innerHTML = respuesta["serieFactura"];
        document.getElementById("folioFacturaTicket").innerHTML = respuesta["folioFactura"];
        document.getElementById("fechaTicket").innerHTML = respuesta["fecha"];
        document.getElementById("motivoCancelacionTicket").innerHTML = respuesta["contenido"];
        document.getElementById("spanFacturaTicket").setAttribute('href', respuesta["rutaFactura"]);
      }

    })
});
/*=============================================
EDITAR DATOS GASTO
=============================================*/
$(".tablaGastosTiendas").on("click", ".btnEditarDatosGastos", function(){

  var idGasto = $(this).attr("idGasto");
  
  var datos = new FormData();
  datos.append("idGasto", idGasto);

  $.ajax({

    url:"ajax/gastosTiendas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){   

            $("#editarDepartamento").val(respuesta["departamento"]);
            $("#idGasto").val(respuesta["id"]);
            $("#editarFolioGasto").val(respuesta["folioGasto"]);
            $("#editarGrupo").val(respuesta["grupo"]);
            $("#editarSubgrupo").val(respuesta["subgrupo"]);
            $("#editarMes").val(respuesta["mes"]);
            $("#editarFecha").val(respuesta["fecha"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarImporteGasto").val(respuesta["importeGasto"]);
            $("#editarAcreedor").val(respuesta["acreedor"]);
            $("#editarNumeroDocumento").val(respuesta["numeroDocumento"]);
            $("#editarFolioFiscal").val(respuesta["folioFiscal"]);
            $("#editarTieneIva").val(respuesta["tieneIva"]);
            $("#editarTieneRetenciones").val(respuesta["tieneRetenciones"]);
            $("#editarTipoRetencion").val(respuesta["tipoRetencion"]);
            $("#editarImporteRetenciones").val(respuesta["importeRetenciones"]);
            $("#editarRutaFactura").val(respuesta["rutaFactura"]);
            $("#editarRutaXml").val(respuesta["rutaXml"]);

            

            if (respuesta["rutaFactura"] != "") {

              var facturaGasto = document.getElementById("facturaGasto");
               facturaGasto.disabled = true;
            

            }else{

              var facturaGasto = document.getElementById("facturaGasto");
               facturaGasto.disabled = false;
       
            }
            if (respuesta["rutaXml"] != "") {

              var xmlGasto = document.getElementById("xmlGasto");
               xmlGasto.disabled = true;

            }else{

              var xmlGasto = document.getElementById("xmlGasto");
               xmlGasto.style.display = "";
            }
            if (respuesta["subgrupo"] == "99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales") {

                
                $("#editarNumeroDocumento").removeAttr("onblur");
                $("#editarFolioFiscal").removeAttr("onblur");
                $("#editarFolioFiscal").removeAttr("required");
                var facturaGasto = document.getElementById("facturaGasto");
                facturaGasto.setAttribute("required", "");
                $("#btnGuardarGasto").attr("onclick","validacionesNoDeducibles()");
                var xmlGasto = document.getElementById("xmlGasto");
                xmlGasto.style.display = "none";
                xmlGasto.removeAttribute("required");
                var btnGuardar = document.getElementById("btnGuardarGasto");
                btnGuardar.disabled = false;
             


            }else{

                 $("#editarNumeroDocumento").attr("onblur","return validarFactura()");
                 $("#editarFolioFiscal").attr("onblur","return validarFolioFiscal()");
                 var folioFiscal = document.getElementById("editarFolioFiscal");
                 folioFiscal.setAttribute("required", "");
                 
                 var facturaGasto = document.getElementById("facturaGasto");
                 facturaGasto.setAttribute("required", "");
                 var xmlGasto = document.getElementById("xmlGasto");
                 xmlGasto.setAttribute("required", "");
                 $("#btnGuardarGasto").attr("onclick","validaciones()");
             

            }

            

            var valor = document.getElementById("editarTieneRetenciones").value;
            var aprobada = respuesta["aprobada"];

            if (valor == "01") {
              div0 = document.getElementById("div_01");
              div0.style.display = "";
              

            }else if (valor == "0") {
              div0 = document.getElementById("div_01");
              div0.style.display = "none";
            }else if (valor == "1") {
              div0 = document.getElementById("div_01");
              div0.style.display = "";
            }

            if(aprobada == 0){

              div1 = document.getElementById("divNumeroDocumento");
              div1.style.display = "";
              div2 = document.getElementById("divArchivosGasto");
              div2.style.display = "";

            }else{

              div1 = document.getElementById("divNumeroDocumento");
              div1.style.display = "none";
              div2 = document.getElementById("divArchivosGasto");
              div2.style.display = "none";

            }




        }
 

  })
});

$(".tablaGastosTiendas").on("click", ".btnSolicitarAprobacionGasto", function(){

    var idSolicitudAprobacion = $(this).attr("idSolicitudGasto");
     var datos = new FormData();
     datos.append('idSolicitudAprobacion',idSolicitudAprobacion);

     $.ajax({

    url:"ajax/gastosTiendas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 

          switch (respuesta) {
            case "ok":
              alerta = document.getElementById("solicitudTrue");
              alerta.style.display = "";
              $("#solicitudTrue").addClass("alert-success");
              document.getElementById("mensajeSolicitud").innerHTML = "<strong>Perfecto!</strong> Solicitud enviada al área correspondiente.";

              setTimeout( function () {
                  alerta.style.display = "none";
                  
              }, 3000);
              gastosTiendas.ajax.reload();
              break;
            case "error":
               alerta = document.getElementById("solicitudTrue");
              alerta.style.display = "";
              $("#solicitudTrue").addClass("alert-danger");
              document.getElementById("mensajeSolicitud").innerHTML = "<strong>Error!</strong> NO se ha podido generar la solicitud intentelo mas tarde.";

              setTimeout( function () {
                  alerta.style.display = "none";
                  
              }, 3000);
              gastosTiendas.ajax.reload();
              break;
            default:
              // statements_def
              break;
          }



        }

  })

});
/**********FUNCION PARA MOSTRAR LAS NOTIFICACIONES****/
$(document).ready(function() {
    function load_unseen_notification_gastos(view = '') {
        $.ajax({
            url: "vistas/modulos/cabezote/listarNotificacionesGastos.php",
            method: "POST",
            data: {
                view: view
            },
            dataType: "json",
            success: function(data) {
                $('#dropdown-menu3').html(data.notification);
                if (data.unseen_notification > 0) {
                    $('.count2').html(data.unseen_notification);
                } else if (data.unseen_notification == 0) {
                    $('.count2').html(data.unseen_notification);
                }
            }
        });
    }
    load_unseen_notification_gastos();
  
    $(document).on('click', '.notifyIdGasto', function() {
        var id = $(this).attr('id');
        load_unseen_notification_gastos(id);
    });
    setInterval(function() {
        load_unseen_notification_gastos();;
    }, 5000);
});

/**********FUNCION PARA MOSTRAR LAS NOTIFICACIONES****/
function validarCampoFactura() { 
  var valorFactura = document.getElementById("editarNumeroDocumento").value;
  var expreg = /^[A-Za-z0-9\S]+$/;
  
  if(expreg.test(valorFactura))
  alert("Es correcta"); 
  else 
    alert("NO es correcta"); 
} 
/********DESGLOSAR ABONOS POR NUMERO DE MOVIMIENTO *******/
$(".tablaDepositosTiendas").on("click", ".btnVerDesgloseAbonos", function() {
    var idMovimientoBanco = $(this).attr("idMovimientoBanco");

    var datos = new FormData();
    datos.append('idMovimientoBancoDesglose',idMovimientoBanco);
    $.ajax({

    url:"ajax/facturacionTiendas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
            
            var abonado = respuesta[0]["abonadoDeposito"];
            var numeroMovimientoAbono = respuesta[0]["idMovimientoBanco"];
            document.getElementById("detalleAbonado").innerHTML = '$'+' '+abonado;
            document.getElementById("numeroMovimientoAbono").innerHTML = numeroMovimientoAbono;
            var detalle = document.getElementById("detalleAbonado")
            detalle.setAttribute('style', 'font-weight:bold;color:#2667ce;font-size:22px');
            var movimiento = document.getElementById("numeroMovimientoAbono");
            movimiento.setAttribute('style', 'font-weight:bold;color:#2667ce;font-size:22px');


            var listaCabeceras = ['Serie Abono','Folio Abono','Serie Factura','Folio Factura','Total Abono','Pendiente','Creador','Fecha'];

            body = document.getElementById("tablaDetalleAbono");

            thead = document.createElement("thead");
            thead.setAttribute('style','background:#2667ce;color: white');

            theadTr = document.createElement("tr");

            for (var h = 0; h < listaCabeceras.length; h++) {
                
                var celdaThead = document.createElement("th");
                var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
                celdaThead.appendChild(textoCeldaThead);
                theadTr.appendChild(celdaThead);

            }
          
            thead.appendChild(theadTr);
 
            tblBody = document.createElement("tbody");

            var arregloNombres = ['serieAbono','id','serieFactura','folioFactura','totalAbono','pendienteFactura','nombre','fechaAbono'];

            // Crea las celdas
            for (var i = 0; i < respuesta.length; i++) {
              // Crea las hileras de la tabla
              var hilera = document.createElement("tr");
           
              for (var j = 0; j < arregloNombres.length; j++) {
               

                var celda = document.createElement("td");
                var textoCelda = document.createTextNode(respuesta[i][arregloNombres[j]]);
                celda.appendChild(textoCelda);
                hilera.appendChild(celda);
               
              }
           
              // agrega la hilera al final de la tabla (al final del elemento tblbody)
              tblBody.appendChild(hilera);
            }
           
            // appends <table> into <body>
            body.appendChild(tblBody);
            body.appendChild(thead);
          
        }



  })



});
 $(".btnCerrarDesgloseAbonos").on("click", function() {

        var nodos = document.getElementById('tablaDetalleAbono');
        while (nodos.firstChild) {
          nodos.removeChild(nodos.firstChild);
        }
});

/*=============================================
CARGAR LA TABLA DINÁMICA DE GASTOS DE SOLICITUDES
=============================================*/

gastosSolicitudes = $(".tablaGastosSolicitudes").DataTable({
   "ajax":"ajax/tablaGastosSolicitudes.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 3, "asc" ]],
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
$(".tablaGastosSolicitudes").on("click", ".btnAprobarSolicitudGasto", function() {

   var idAprobarSolicitud = $(this).attr("idAprobarSolicitud");
   var aprobado = $(this).attr("aprobado");

   var datos = new FormData();

   datos.append('idAprobarSolicitud',idAprobarSolicitud);

   $.ajax({

    url:"ajax/gastosTiendas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 

        switch (respuesta) {
            case "ok":
              alerta = document.getElementById("solicitudAprobacion");
              alerta.style.display = "";
              $("#solicitudAprobacion").addClass("alert-success");
              document.getElementById("mensajeSolicitudAprobacion").innerHTML = "<strong>Perfecto!</strong> El gasto ha sido aprobado.";

              setTimeout( function () {
                  alerta.style.display = "none";
                  
              }, 3000);
              gastosSolicitudes.ajax.reload();
              break;
            case "error":
               alerta = document.getElementById("solicitudAprobacion");
              alerta.style.display = "";
              $("#solicitudAprobacion").addClass("alert-danger");
              document.getElementById("mensajeSolicitudAprobacion").innerHTML = "<strong>Error!</strong> NO se ha podido aprobar el gasto intentelo mas tarde.";

              setTimeout( function () {
                  alerta.style.display = "none";
                  
              }, 3000);
              gastosSolicitudes.ajax.reload();
              break;
            default:
              // statements_def
              break;
          }
            
                      
        }

  })
  if (aprobado == 0) {
        $(this).removeClass('btn-warning');
        $(this).addClass('btn-success');
        $(this).html('<i class="fa fa-flag"></i>');
        $(this).attr('aprobado', 1);
         $(this).attr('disabled','disabled');
    } else {
        $(this).addClass('btn-warning');
        $(this).removeClass('btn-success');
        $(this).html('<i class="fa fa-flag"></i>');
        $(this).attr('aprobado', 0);

    }


});

$(".tablaGastosTiendas").on("click", ".checkSolicitud", function(){
   if (localStorage.getItem("arregloGastos") == null || localStorage.getItem("arregloGastos") == "") {

        arregloGastos = [];

    }else{

        arregloGastos = localStorage.getItem("arregloGastos").split(',');

    }

  var idGasto = $(this).attr('gastoId');

  var parent = $("#checkReembolso"+idGasto+"");
   
  if ($(this).is(':checked')) {
      parent.removeAttr('checked');
       arregloGastos.push(idGasto);
      localStorage.setItem("arregloGastos", arregloGastos);

  } else {
      parent.attr('checked');
      borraItemValor(arregloGastos,idGasto);
      localStorage.setItem("arregloGastos", arregloGastos);
  }


});


$("#solicitarReembolso").on('click', function(){

       
        if( $("input:checkbox").is(':checked')){
       
            var arreglo = localStorage.getItem("arregloGastos");

            var array = arreglo.replace(/,/g, "-");

            swal({

                    type: "warning",
                    title: "¡Generar Reembolso!",
                    confirmButtonText: "Generar",
                    cancelButtonText: 'Cancelar',
                    showCancelButton: true
                  }).then(function(result){
                      
                      if (result.value == true) {

                        var datos = new FormData();

                         datos.append('idGastoReembolsado',arreglo);


                         $.ajax({

                          url:"ajax/gastosTiendas.ajax.php",
                          method: "POST",
                          data: datos,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(respuesta){ 

                              if (respuesta == "ok") {

                                   //location.href = "pedido/"+array;

                                   location.href="vistas/modulos/reportes.php?reporteReembolsos=gastos&idGasto="+array;
                                 
                                   localStorage.removeItem("arregloGastos");

                                   gastosTiendas.ajax.reload();

                                 }
            
                             }

                        });

                      }else{

                        swal({

                            type: "error",
                            title: "¡Estuvo apunto de generar el reembolso!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                          }).then(function(result){

                          });
                      }
                     
                  });

              } else {
                  
                  swal({

                      type: "error",
                      title: "¡No hay un gasto seleccionado  para reembolsar!",
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                    });
              }




});
/*=============================================
CARGAR LA TABLA DINÁMICA DE AJUSTE DE SALDOS
=============================================*/

ajusteSaldos = $(".tablaAjusteSaldos").DataTable({
   "ajax":"ajax/tablaAjusteSaldos.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
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
CARGAR LA TABLA DINÁMICA DE DOCUMENTOS AJUSTADOS
=============================================*/

ajustesDocumentos = $(".tablaAjustesDocumentos").DataTable({
   "ajax":"ajax/tablaAjustesDocumentos.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
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
CARGAR LA TABLA DINÁMICA DE ABONOS DOCUMENTOS
=============================================*/

abonosDocumentos = $(".tablaAbonosDocumentos").DataTable({
   "ajax":"ajax/tablaAbonosFacturas.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
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
EMITIR RECIBO DE CAJA
=============================================*/
$(".tablaDepositosTiendas").on("click", ".btnEmitirReciboCaja", function(){

  var idMovimientoRecibo = $(this).attr("idMovimientoBanco");

  var datos = new FormData();
  datos.append('idMovimientoRecibo', idMovimientoRecibo);

  depositosTiendas.ajax.reload();
            $("#modalProcesoCargaDatosRecibo").modal('show');
            setTimeout(function(){ 
                $("#modalProcesoCargaDatosRecibo").modal('hide');

                 $.ajax({

                    url:"ajax/facturacionTiendas.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta){ 
                      depositosTiendas.ajax.reload();
                      var opcion = 2;
                      window.open("vistas/modulos/reciboCaja.php/?idMovimiento="+idMovimientoRecibo+"&opcion="+opcion,'_blank');
                      //window.location.href ="vistas/modulos/mostrarCotizacion.php/?folio="+folio3+"&opcion="+opcion;
                    }

                  })

             }, 3000);

  /*
  swal({
    title: '¿Que desea realizar?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    showConfirmButton: false,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Visualizar',
      confirmButtonText: 'Descargar',
      
  }).then(function(result){

    if(result.value){

       var datos = new FormData();
      datos.append('idMovimientoRecibo', idMovimientoRecibo);

       $.ajax({

          url:"ajax/facturacionTiendas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){ 
            depositosTiendas.ajax.reload();
            var opcion = 1;
            window.location = "index.php?ruta=misDepositos&idMovimiento="+idMovimientoRecibo+"&opcion="+opcion;
          
          }

        })

    }else {

      var datos = new FormData();
      datos.append('idMovimientoRecibo', idMovimientoRecibo);

       $.ajax({

          url:"ajax/facturacionTiendas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){ 
            depositosTiendas.ajax.reload();
            var opcion = 2;
            window.open("vistas/modulos/reciboCaja.php/?idMovimiento="+idMovimientoRecibo+"&opcion="+opcion,'_blank');
          //window.location.href ="vistas/modulos/mostrarCotizacion.php/?folio="+folio3+"&opcion="+opcion;
          
          }

        })

          
    }

  })
  
  */
});

/*********FUNCIONES PARA LA VALIDACION DEL FOLIO DISCAL DE LA FACTURA******/
$("#editarSubgrupo").on("change",function(){
  var subgrupo = document.getElementById("editarSubgrupo").value;
  if (subgrupo == "99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales") {
      

      $("#editarNumeroDocumento").removeAttr("onblur");
      $("#editarFolioFiscal").removeAttr("onblur");
      $("#editarFolioFiscal").removeAttr("required");
      var facturaGasto = document.getElementById("facturaGasto");
      facturaGasto.setAttribute("required", "");
      $("#btnGuardarGasto").attr("onclick","validacionesNoDeducibles()");
      var xmlGasto = document.getElementById("xmlGasto");
      xmlGasto.style.display = "none";
      xmlGasto.removeAttribute("required");
      var btnGuardar = document.getElementById("btnGuardarGasto");
      btnGuardar.disabled = false;



  }else{

       $("#editarNumeroDocumento").attr("onblur","return validarFactura()");
       $("#editarFolioFiscal").attr("onblur","return validarFolioFiscal()");
       var folioFiscal = document.getElementById("editarFolioFiscal");
       folioFiscal.setAttribute("required", "");
       $("#btnGuardarGasto").attr("onclick","validaciones()");
       var facturaGasto = document.getElementById("facturaGasto");
       facturaGasto.setAttribute("required", "");
       var xmlGasto = document.getElementById("xmlGasto");
       xmlGasto.setAttribute("required", "");
       xmlGasto.style.display = "";

  }
});
function validarFactura() { 
  var m = document.getElementById("editarNumeroDocumento").value;
  var m = m.replace('/', '-',m);
  document.getElementById("editarNumeroDocumento").value = m;
  var expreg = /^[A-Za-z0-9-/S]+$/;
  
  if(expreg.test(m)){
   
      $("#divAlertaValidacion").removeClass("animated fadeInDown");
      document.getElementById("divAlertaValidacion").style.display = 'none';
      var btnGuardar = document.getElementById("btnGuardarGasto");
      btnGuardar.disabled = false;
      return false;

  }else{
     
     document.getElementById("divAlertaValidacion").style.display = '';
     $("#divAlertaValidacion").addClass("animated fadeInDown");
     document.getElementById("mensajeValidacion").innerHTML = "El campo debe estar escrito de la siguiente manera SERIE-FOLIO";
     var btnGuardar = document.getElementById("btnGuardarGasto");
     btnGuardar.disabled = true;
     return true;

  }

};

function validarFolioFiscal(){

   folioFiscal = document.getElementById("editarFolioFiscal").value;
   folioGasto = document.getElementById("idGasto").value;
   sta = "";
  
  if(folioFiscal != ""){

     
      var datos = new FormData();
      datos.append('folioFiscal', folioFiscal);

      $.ajax({

        url:"ajax/facturacionTiendas.ajax.php",
        method:"POST",
        data:datos,
        cache:false,
        contentType: false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
           folioFiscal = document.getElementById("editarFolioFiscal").value;
           folioGasto = document.getElementById("idGasto").value;
           sta = "";
          if (respuesta["folioFiscal"] == folioFiscal && respuesta["folioGasto"] == folioGasto && respuesta["folio"] == 1) {

              document.getElementById("divAlertaValidacion").style.display = 'none';
              $("#divAlertaValidacion").removeClass("animated fadeInDown");
              document.getElementById("divAlertaValidacionFolio").style.display = 'none';
              var btnGuardar = document.getElementById("btnGuardarGasto");         
              btnGuardar.disabled = false;
              sta = false;
              localStorage.setItem("sta", sta);
             

          }else if (respuesta["folioFiscal"] == folioFiscal && respuesta["folioGasto"] != folioGasto && respuesta["folio"] == 1) {

               document.getElementById("divAlertaValidacion").style.display = 'none';
               document.getElementById("divAlertaValidacionFolio").style.display = '';
               $("#divAlertaValidacion").addClass("animated fadeInDown");
               document.getElementById("mensajeValidacionFolio").innerHTML = "El gasto SGM-"+""+respuesta["folioGasto"]+" "+"Contiene el mismo folio fiscal";
               var btnGuardar = document.getElementById("btnGuardarGasto");
               btnGuardar.disabled = true;
              
               sta = true;
               localStorage.setItem("sta", sta);


          }else if (respuesta["folioFiscal"] != folioFiscal && respuesta["folioGasto"] != folioGasto && respuesta["folio"] == 0){

              document.getElementById("divAlertaValidacion").style.display = 'none';
              $("#divAlertaValidacion").removeClass("animated fadeInDown");
              document.getElementById("divAlertaValidacionFolio").style.display = 'none';
              var btnGuardar = document.getElementById("btnGuardarGasto");         
              btnGuardar.disabled = false;
                   
              sta = false;
              localStorage.setItem("sta", sta);

          }
         

        }


      });
      
     var sta = localStorage.getItem("sta");
    return sta;

  }else{

      document.getElementById("divAlertaValidacion").style.display = '';
      $("#divAlertaValidacion").addClass("animated fadeInDown");
      document.getElementById("mensajeValidacion").innerHTML = "Debe llenar el campo de folio fiscal";


  }
   
  

};
function validaciones(){

    validarFactura();
    validarFolioFiscal();

    if(validarFactura() === false && validarFolioFiscal() === 'false'){
     
      $("#btnGuardarGastos").click();
      localStorage.removeItem("sta");

    }
   

};
function validacionesNoDeducibles(){
       document.getElementById("divAlertaValidacion").style.display = 'none';
      $("#divAlertaValidacion").removeClass("animated fadeInDown");
      document.getElementById("divAlertaValidacionFolio").style.display = 'none';
      
      $("#btnGuardarGastos").click();
     


};

$(".minimizarGastos").on("click",function(){
  document.getElementById("divAlertaValidacion").style.display = 'none';
  $("#divAlertaValidacion").removeClass("animated fadeInDown");
  document.getElementById("divAlertaValidacionFolio").style.display = 'none';
  var btnGuardar = document.getElementById("btnGuardarGasto");         
  btnGuardar.disabled = false;
  localStorage.removeItem("sta");

});
/*************GENERAR AJUSTE DE REMANENTES********************/


    $('#formAjuste').on('submit', function (e) {
      e.preventDefault(); // se previene la acción por defecto
      var valorAjuste =  $("#valorAjuste").val();
      var fechaInicioAjuste =  $("#fechaInicioAjuste").val();
      var fechaFinAjuste =  $("#fechaFinAjuste").val();
      

      
      $("#btnClicMostrarModalAjuste").click();

      document.getElementById("spanFechaInicioAjuste").innerHTML = fechaInicioAjuste;
      document.getElementById("spanFechaFinAjuste").innerHTML = fechaFinAjuste;
      document.getElementById("spanValorAjuste").innerHTML = "$"+" "+valorAjuste;
      var concepto = document.getElementById("sucursalAjuste").value;

      //btnGenerarAjusteRemanentes

      switch (concepto) {
        case "Sucursal San Manuel":
          var conceptoFactura = "FACTURA SAN MANUEL V 3.3";
          break;
        case "Sucursal Capu":
          var conceptoFactura = "FACTURA CAPU V 3.3";
        break;
        case "Sucursal Reforma":
          var conceptoFactura = "FACTURA REFORMA V 3.3";
        break;
        case "Sucursal Las Torres":
          var conceptoFactura = "FACTURA TORRES";
        break;
        case "Sucursal Santiago":
          var conceptoFactura = "FACTURA SANTIAGO V 3.3";
        break;
        default:
         
          break;
      }
      listaFacturasSaldosRemanentes = $(".tablaListaFacturasSaldosRemanentes").DataTable({
          "ajax":"ajax/tablaListaFacturasSaldosRemanentes.ajax.php?valorAjuste="+valorAjuste+"&fechaInicioAjuste="+fechaInicioAjuste+"&fechaFinAjuste="+fechaFinAjuste+"&concepto="+conceptoFactura,
          "deferRender": true,
          "responsive": true,
          "retrieve": true,
          "processing": true,
          "iDisplayLength": 5,
        
          "scrollCollapse": true,
          "fixedHeader": true,
          "order": [[ 0, "asc" ]],
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
      


      //
      //tablaListaFacturasSaldosRemanentes
      // realizar petición AJAX
    });

$(".btnCerrarSaldadoRemanentes").on("click", function(){

      listaFacturasSaldosRemanentes.destroy();

});
$("#btnGenerarAjusteRemanentes").on("click", function(){

     if (listaFacturasSaldosRemanentes.data().any() ) {
    
     swal({
        title: '¿Desea Ejecutar el Saldado de Remanentes?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'No ejecutar',
          confirmButtonText: 'Ejecutar',
          
      }).then(function(result){

        if(result.value){

          document.getElementById("exitoLoader").style.display = '';
          $("#exitoLoader").addClass("animated fadeInDown");
          document.getElementById("textLoader").innerHTML = "GENERANDO AJUSTE";

          var valorAjuste =  $("#valorAjuste").val();
          var fechaInicioAjuste =  $("#fechaInicioAjuste").val();
          var fechaFinAjuste =  $("#fechaFinAjuste").val();
          var concepto = document.getElementById("sucursalAjuste").value;
          switch (concepto) {
              case "Sucursal San Manuel":
                var conceptoFactura = "FACTURA SAN MANUEL V 3.3";
                break;
              case "Sucursal Capu":
                var conceptoFactura = "FACTURA CAPU V 3.3";
              break;
              case "Sucursal Reforma":
                var conceptoFactura = "FACTURA REFORMA V 3.3";
              break;
              case "Sucursal Las Torres":
                var conceptoFactura = "FACTURA TORRES";
              break;
              case "Sucursal Santiago":
                var conceptoFactura = "FACTURA SANTIAGO V 3.3";
              break;
              default:
               
                break;
            }

            var datos = new FormData();
            datos.append('valorAjuste',valorAjuste);
            datos.append('fechaInicioAjuste',fechaInicioAjuste);
            datos.append('fechaFinAjuste',fechaFinAjuste);
            datos.append('concepto',conceptoFactura);

            $.ajax({

                url:"ajax/facturacionTiendas.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(respuesta){ 

                    var response = respuesta;
                    var responseFinal = response.replace(/['"]+/g, '');
                    if (responseFinal == "ok") {

                       
                         setTimeout(function() {

                            document.getElementById("exitoLoader").style.display = 'none';
                            $("#exitoLoader").removeClass("animated fadeInDown");
                            document.getElementById("textLoader").innerHTML = "AJUSTE GENERADO";
                              
                             location.reload();
                             listaFacturasSaldosRemanentes.ajax.reload();
                             ajusteSaldos.ajax.reload();

                          }, 2000);


                        
                    }
                    
                   
                                    
                }


            });
          

        }else {

      
            swal({

                type: "error",
                title: "¡Estuvo apunto de ejecutar el proceso!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

             }).then(function(result){

            });  

        }

      })
      
    }
    else{
        swal({

                type: "error",
                title: "¡No hay datos para saldar, verifique los datos de ajuste!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

             }).then(function(result){

            });  

    }


});
$(".tablaAjusteSaldos").on("click", ".btnDownloadAjuste", function(){

   var rutaArchivo = $(this).attr("rutaArchivo");
  
    location.href ="downloadAjuste.php?rutaArchivo="+rutaArchivo;
});
/**********************CORTE DE CAJA***************************************/
/*=============================================
CARGAR LA TABLA DINÁMICA DE LA LISTA DE CORTES DE CAJA
=============================================*/


if ($("#fechaCorte").val() != "") {
  var fechaCorte = $("#fechaCorte").val();
}
else {
  var fechaCorte = "";
}
var cortesDeCaja = $(".tablaCortesDeCaja").DataTable({
    "ajax":"ajax/tablaCortesDeCaja.ajax.php?fechaCorte="+fechaCorte,
    "deferRender": true,
    "responsive": true,
    "retrieve": true,
    "processing": true,
    "iDisplayLength": 5,
    "scrollY": 300,
    "scrollX": true,
    "scrollCollapse": true,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
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


$("#notificacionCorteCaja").on("click",function(){
    location.href = "notificarFondoCaja.php";
});
$("#vincularPendientesPago").on("click",function(){

    if (localStorage.getItem("folioCorteCaja") === null) {

        var folioCorteCaja = "";

    }else{

        var folioCorteCaja = localStorage.getItem("folioCorteCaja");

    }

    var fondoCaja = $("#fondoCaja").val();
    var fondoCaja =  fondoCaja.replace(',','',fondoCaja);
    
    var datos = new FormData();
    datos.append('fondoCaja', fondoCaja);
    datos.append('folioCorteCajaInicial', folioCorteCaja);

    $.ajax({

        url:"ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
          localStorage.setItem('folioCorteCaja',respuesta["folioCorteCaja"]);

          var listaCabeceras = ['Denominación','Cantidad','Total'];

            body = document.getElementById("tablaDenominaciones");

            thead = document.createElement("thead");
            thead.setAttribute('style','background:#2667ce;color: white');

            theadTr = document.createElement("tr");

            for (var h = 0; h < listaCabeceras.length; h++) {
                
                var celdaThead = document.createElement("th");
                var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
                celdaThead.appendChild(textoCeldaThead);
                theadTr.appendChild(celdaThead);

            }
          
            thead.appendChild(theadTr);
 
            tblBody = document.createElement("tbody");

            var arregloDenominaciones = ['$ 1,000.00','$ 500.00','$ 200.00','$ 100.00','$ 50.00','$ 20.00','$ 10.00','$ 5.00','$ 2.00','$ 1.00','$ 0.50','$ 0.20','$ 0.10','$ 0.05'];
            var arregloMontosDenominaciones = ['1000.00','500.00','200.00','100.00','50.00','20.00','10.00','5.00','2.00','1.00','0.50','0.20','0.10','0.05'];

            // Crea las celdas
            for (var i = 0; i < arregloDenominaciones.length; i++) {
              // Crea las hileras de la tabla
              var hilera = document.createElement("tr");

           
              for (var j = 0; j < 3; j++) {
               

                var celda = document.createElement("td");

                var input =  document.createElement("input");

                input.setAttribute("class", "inputsDenominaciones"+j+" form-control input-sm");
                input.setAttribute("type", "text");
                input.setAttribute("id", "denom"+j+"n"+i+"");
                input.setAttribute("name", i);
                input.setAttribute("onblur", "calcularCantidad(this.name)");
                
                celda.appendChild(input);
                
                hilera.appendChild(celda);

               
              }

              // agrega la hilera al final de la tabla (al final del elemento tblbody)
              tblBody.appendChild(hilera);
            }
           
            // appends <table> into <body>
            body.appendChild(tblBody);
            body.appendChild(thead);

            for (var i = 0; i < arregloDenominaciones.length; i++) {
                var textoCelda = arregloDenominaciones[i];
                var denominacion = document.getElementById("denom0n"+i+"");
                denominacion.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;margin: 0px 0 0px 0;");
                denominacion.setAttribute("disabled", "true");
                denominacion.value = textoCelda;
            }
            for (var i = 0; i < arregloDenominaciones.length; i++) {
             
                var denominacion = document.getElementById("denom2n"+i+"");
                denominacion.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;margin:0px 0 0px 0;");
                denominacion.setAttribute("disabled", "true");
                var j = i + 1;
                var valor = respuesta["dn"+j+""] / arregloMontosDenominaciones[i];
                var totalEfectivo =  arregloMontosDenominaciones[i] * valor;
                denominacion.value = formatNumber.new(totalEfectivo.toFixed(2), "$");
               
            }
            for (var i = 0; i < arregloDenominaciones.length; i++) {
             
                var denominacion = document.getElementById("denom1n"+i+"");
                denominacion.setAttribute("style","font-weight:bold;font-size:14px;margin:0px 0 0px 0;");
                var j = i + 1;
                var valor = respuesta["dn"+j+""] / arregloMontosDenominaciones[i];
                if (respuesta["total"] == 0) {
                  denominacion.setAttribute("value", valor.toFixed(2));
                  
                }else{
                  denominacion.setAttribute("value", valor.toFixed(2));
                 

                }
                
               
            }
                var total = document.getElementById("totalDenominaciones");
                total.setAttribute("style","font-weight:bold;color:#2667ce;font-size:19px;");
                var montos = respuesta["total"] * 1;
                total.innerHTML = formatNumber.new(montos.toFixed(2), "$");

        }


      })

});
/*
var elemento = document.getElementsByClassName('inputsDenominaciones0'); 
              var cantidad = elemento.length;
              alert(cantidad);
              var array_id = Array();

              for(var i = 0; i < cantidad; i++){
                  var id = elemento[i].value;
                  array_id.push(id);
              }
 */
/***********FUNCION PARA FORMATEAR NUMERO*************/
var formatNumber = {
     separador: ",", // separador para los miles
     sepDecimal: '.', // separador para los decimales
     formatear:function (num){
     num +='';
     var splitStr = num.split('.');
     var splitLeft = splitStr[0];
     var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
     var regx = /(\d+)(\d{3})/;
     while (regx.test(splitLeft)) {
     splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
     }
     return this.simbol + splitLeft +splitRight;
     },
     new:function(num, simbol){
     this.simbol = simbol ||'';
     return this.formatear(num);
     }
}
/***********FUNCION PARA FORMATEAR NUMERO*************/
function calcularCantidad(id){

      var cantidad = $("#denom1n"+id+"").val();
      var denominacion = $("#denom0n"+id+"").val();
      var denominacion = denominacion.replace('$ ', '');
      var denominacion = denominacion.replace(',','');

      var totalEfectivo = cantidad * denominacion;

      var totalDenominacion = document.getElementById("denom2n"+id+"");
      totalDenominacion.value = formatNumber.new(totalEfectivo.toFixed(2), "$");


      var elemento = document.getElementsByClassName('inputsDenominaciones2'); 
              var totalElementos = elemento.length;
              var montos = 0;
              for(var i = 0; i < totalElementos; i++){
                  
                  var monto = elemento[i].value;
                  var monto = monto.replace('$', '');
                  var monto = monto.replace(',','');
                  montos += parseFloat(monto);
    
              }

      var total = document.getElementById("totalDenominaciones");
      total.setAttribute("style","font-weight:bold;color:#2667ce;font-size:19px;");
      total.innerHTML = formatNumber.new(montos.toFixed(2), "$");

}
/***********PROCESAR SI ESTAN CORRECTAS LA DENOMINACIONES*********/
$("#procesarDenominaciones").on("click",function(){
 
  

  swal({

                    type: "warning",
                    title: "¡Confirma la totalidad de la caja!",
                    confirmButtonText: "Confirmar",
                    cancelButtonText: 'Revisar',
                    showCancelButton: true
                  }).then(function(result){
                      
                      if (result.value == true) {
                        var folioCorteCaja = localStorage.getItem("folioCorteCaja");
                        var elemento = document.getElementsByClassName('inputsDenominaciones2'); 
                        var totalElementos = elemento.length;
                        var montos = 0;
                        var arregloDenominaciones = [];
                        for(var i = 0; i < totalElementos; i++){
                            
                            var monto = elemento[i].value;
                            var monto = monto.replace('$', '');
                            var monto = monto.replace(',','');
                            montos += parseFloat(monto);
                            arregloDenominaciones.push(monto);
              
                        }

                        var totalDenominaciones = montos.toFixed(2);
                        var arregloMontos = arregloDenominaciones;

                        var datos = new FormData();
                        datos.append('folioCorteCaja',folioCorteCaja);
                        datos.append('arregloDenominaciones',arregloMontos);
                        datos.append('totalDenominaciones', totalDenominaciones);

                         $.ajax({

                          url:"ajax/facturacionTiendas.ajax.php",
                          method: "POST",
                          data: datos,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(respuesta){ 
                              var response = respuesta;
                              var responseFinal = response.replace(/['"]+/g, '');
                              if (responseFinal == "ok") {

                                $("#procesarSiguiente").click();
                               
                                var folioCorte = localStorage.getItem("folioCorteCaja");

                                var datos = new FormData();
                        
                                  datos.append("folioCorte", folioCorte);


                                  $.ajax({

                                    url:"ajax/facturacionTiendas.ajax.php",
                                    method: "POST",
                                    data: datos,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    dataType: "json",
                                    success: function(respuesta){ 

                                      var efectivo = (respuesta[0]["efectivo"] * 1);
                                      $("#efectivoDetalle").val(formatNumber.new(efectivo.toFixed(2), "$"));
                                      var chequeNominativo = (respuesta[0]["chequeNominativo"] * 1);
                                      $("#chequeNominativoDetalle").val(formatNumber.new(chequeNominativo.toFixed(2), "$"));
                                      var transferenciaElectronica = (respuesta[0]["transferenciaElectronica"] * 1);
                                      $("#transferenciaElectronicaDetalle").val(formatNumber.new(transferenciaElectronica.toFixed(2), "$"));
                                      var tarjetaCredito = (respuesta[0]["tarjetaCredito"] * 1);
                                      $("#tarjetaCreditoDetalle").val(formatNumber.new(tarjetaCredito.toFixed(2), "$"));
                                      var tarjetaDebito = (respuesta[0]["tarjetaDebito"] * 1);
                                      $("#tarjetaDebitoDetalle").val(formatNumber.new(tarjetaDebito.toFixed(2), "$"));
                                      var porDefinir = (respuesta[0]["porDefinir"] * 1);
                                      $("#porDefinirDetalle").val(formatNumber.new(porDefinir.toFixed(2), "$"));
                                      var credito = (respuesta[0]["credito"] * 1);
                                      $("#creditoDetalle").val(formatNumber.new(credito.toFixed(2), "$"));

                                      var totalDetalle = efectivo+chequeNominativo+transferenciaElectronica+tarjetaCredito+tarjetaDebito+porDefinir+credito;

                                      $("#totalDetalle").val(formatNumber.new(totalDetalle.toFixed(2), "$"));
                                      
                                      
                                    }


                                  })



                                 }
            
                             }

                        });

                        

                      }else{

                        swal({

                            type: "error",
                            title: "¡Porfavor haga una revisión!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                          }).then(function(result){

                          });
                      }
                    });

  

});
$("#procesarFormasPago").on("click",function(){

swal({

                    type: "warning",
                    title: "¡Los montos totales que se muestran por forma de pago son correctos.!",
                    confirmButtonText: "Confirmar",
                    cancelButtonText: 'Revisar',
                    showCancelButton: true
                  }).then(function(result){
                      
                      if (result.value == true) {

                        var folioCorteCajaDetalle = localStorage.getItem("folioCorteCaja");
                        var efectivoDetalle = $("#efectivoDetalle").val();
                        var efectivoDetalle = efectivoDetalle.replace('$', '');
                        var efectivoDetalle = efectivoDetalle.replace(',', '');
                        var chequeDetalle = $("#chequeNominativoDetalle").val();
                        var chequeDetalle = chequeDetalle.replace('$', '');
                        var chequeDetalle = chequeDetalle.replace(',', '');
                        var transferenciaDetalle = $("#transferenciaElectronicaDetalle").val();
                        var transferenciaDetalle = transferenciaDetalle.replace('$', '');
                        var transferenciaDetalle = transferenciaDetalle.replace(',', '');
                        var tarjetaDebitoDetalle = $("#tarjetaDebitoDetalle").val();
                        var tarjetaDebitoDetalle = tarjetaDebitoDetalle.replace('$', '');
                        var tarjetaDebitoDetalle = tarjetaDebitoDetalle.replace(',', '');
                        var tarjetaCreditoDetalle = $("#tarjetaCreditoDetalle").val();
                        var tarjetaCreditoDetalle = tarjetaCreditoDetalle.replace('$', '');
                        var tarjetaCreditoDetalle = tarjetaCreditoDetalle.replace(',', '');
                        var porDefinirDetalle = $("#porDefinirDetalle").val();
                        var porDefinirDetalle = porDefinirDetalle.replace('$', '');
                        var porDefinirDetalle = porDefinirDetalle.replace(',', '');
                        var creditoDetalle = $("#creditoDetalle").val();
                        var creditoDetalle = creditoDetalle.replace('$', '');
                        var creditoDetalle = creditoDetalle.replace(',', '');
                        var importeVenta = $("#totalDetalle").val();
                        var importeVenta = importeVenta.replace('$','');
                        var importeVenta = importeVenta.replace(',','');
                       

                        var datos = new FormData();
                        datos.append('folioCorteCajaDetalle',folioCorteCajaDetalle);
                        datos.append('efectivoDetalle',efectivoDetalle);
                        datos.append('chequeDetalle',chequeDetalle);
                        datos.append('transferenciaDetalle', transferenciaDetalle);
                        datos.append('tarjetaDebitoDetalle', tarjetaDebitoDetalle);
                        datos.append('tarjetaCreditoDetalle', tarjetaCreditoDetalle);
                        datos.append('porDefinirDetalle', porDefinirDetalle);
                        datos.append('creditoDetalle', creditoDetalle);
                        datos.append('importeVenta', importeVenta);


                         $.ajax({

                          url:"ajax/facturacionTiendas.ajax.php",
                          method: "POST",
                          data: datos,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(respuesta){ 
                                /*
                                var fechaCorte = respuesta["fechaCorte"];
                                var fechaFinCorte = respuesta["fechaTerminoCorte"];
                                var tiempoProceso = respuesta["tiempoTranscurrido"];

                                var fechaCorteIniciado = document.getElementById("fechaCorteIniciado");
                                fechaCorteIniciado.innerHTML = fechaCorte;
                                var fechaTerminoCorte = document.getElementById("fechaCorteProceso");
                                fechaTerminoCorte.innerHTML = fechaFinCorte;

                                var hours = Math.floor( tiempoProceso / 3600 );  
                                var minutes = Math.floor( (tiempoProceso % 3600) / 60 );
                                var seconds = tiempoProceso % 60;
                                 
                                //Anteponiendo un 0 a los minutos si son menos de 10 
                                minutes = minutes < 10 ? '0' + minutes : minutes;
                                 
                                //Anteponiendo un 0 a los segundos si son menos de 10 
                                seconds = seconds < 10 ? '0' + seconds : seconds;
                                 
                                var result = hours + "Hora(s) " + minutes + "minutos y " + seconds + " " + "segundos."; 
                                var tiempoProcesoCorte = document.getElementById("tiempoProcesoCorte");
                                tiempoProcesoCorte.innerHTML = result;

                                */
                          
                          var listaCabeceras = ['Forma de Pago','Monto'];

                                body = document.getElementById("tablaFormasPago");

                                thead = document.createElement("thead");
                                thead.setAttribute('style','background:#2667ce;color: white');

                                theadTr = document.createElement("tr");

                                for (var h = 0; h < listaCabeceras.length; h++) {
                                    
                                    var celdaThead = document.createElement("th");
                                    var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
                                    celdaThead.appendChild(textoCeldaThead);
                                    theadTr.appendChild(celdaThead);

                                }
                              
                                thead.appendChild(theadTr);
                     
                                tblBody = document.createElement("tbody");

                                var arregloFormasPago = ['EFECTIVO','CHEQUE NOMINATIVO','TRANSFERENCIA ELECTRÓNICA','TARJETA DE CREDITO','TARJETA DE DEBITO','POR DEFINIR','CREDITO','TOTAL'];
                                var arregloValoresFormasPago = ['efectivo','cheque','transferencia','tarjetaCredito','tarjetaDebito','porDefinir','credito','totalGeneral'];         

                                // Crea las celdas
                                for (var i = 0; i < arregloFormasPago.length; i++) {
                                  // Crea las hileras de la tabla
                                  var hilera = document.createElement("tr");
                               
                                  for (var j = 0; j < 2; j++) {
                                   

                                    var celda = document.createElement("td");
                                    var input =  document.createElement("input");

                                    input.setAttribute("class", "inputFormasPago"+j+" form-control input-sm");
                                    input.setAttribute("type", "text");
                                    input.setAttribute("id", "formPago"+j+"n"+i+"");
                                    input.setAttribute("name", i);

                                    celda.appendChild(input);
                                    
                                    hilera.appendChild(celda);

                                   
                                  }

                                  // agrega la hilera al final de la tabla (al final del elemento tblbody)
                                  tblBody.appendChild(hilera);
                                }
                               
                                // appends <table> into <body>
                                body.appendChild(tblBody);
                                body.appendChild(thead);

                                for (var i = 0; i < arregloFormasPago.length; i++) {
                                    var textoCelda = arregloFormasPago[i];
                                    var denominacion = document.getElementById("formPago0n"+i+"");
                                     denominacion.setAttribute("style","font-weight:bold;color:black;font-size:11px;margin: 0px 0 0px 0;");
                                    denominacion.setAttribute("disabled", "true");
                                    denominacion.value = textoCelda;
                                }
                                for (var i = 0; i < arregloFormasPago.length; i++) {
                                    
                                    var denominacion = document.getElementById("formPago0n7");
                                    denominacion.setAttribute("style","font-weight:bold;color:black;font-size:14px;margin: 0px 0 0px 0;");

      
                                }
                                for (var i = 0; i < arregloFormasPago.length; i++) {
                                 
                                    var denominacion = document.getElementById("formPago1n"+i+"");
                                    denominacion.setAttribute("style","font-weight:lighter;color:black;font-size:12px;margin: 0px 0 0px 0;");
                                    denominacion.setAttribute("disabled", "true");
                                    var valor = respuesta[arregloValoresFormasPago[i]] * 1;
                                    denominacion.value = formatNumber.new(valor.toFixed(2), "$");
                                    var denominacion2 = document.getElementById("formPago1n7");
                                    denominacion2.setAttribute("style","font-weight:bold;color:#2667ce;font-size:14px;margin: 0px 0 0px 0;");
                                   
                                }

                                /**************TABLA DE DENOMINACIONES EFECTIVO*****************/

                                var cabeceras = ['Denominación','Cantidad','Total'];

                                bodyEfectivo = document.getElementById("tablaEfectivoDenominaciones");

                                theadEfectivo = document.createElement("thead");
                                theadEfectivo.setAttribute('style','background:#2667ce;color: white');

                                theadTrEfectivo = document.createElement("tr");

                                for (var h = 0; h < cabeceras.length; h++) {
                                    
                                    var celdaTheadEfectivo = document.createElement("th");
                                    var textoCeldaTheadEfectivo = document.createTextNode(cabeceras[h]);
                                    celdaTheadEfectivo.appendChild(textoCeldaTheadEfectivo);
                                    theadTrEfectivo.appendChild(celdaTheadEfectivo);

                                }
                              
                                theadEfectivo.appendChild(theadTrEfectivo);
                     
                                tblBodyEfectivo = document.createElement("tbody");

                                var arregloDenominaciones = ['$ 1,000.00','$ 500.00','$ 200.00','$ 100.00','$ 50.00','$ 20.00','$ 10.00','$ 5.00','$ 2.00','$ 1.00','$ 0.50','$ 0.20','$ 0.10','$ 0.05'];
                                var arregloMontosDenominaciones = ['1000.00','500.00','200.00','100.00','50.00','20.00','10.00','5.00','2.00','1.00','0.50','0.20','0.10','0.05'];

                                // Crea las celdas
                                for (var i = 0; i < arregloDenominaciones.length; i++) {
                                  // Crea las hileras de la tabla
                                  var hileraEfectivo = document.createElement("tr");
                               
                                  for (var j = 0; j < 3; j++) {
                                   

                                    var celdaEfectivo = document.createElement("td");
                                    var inputEfectivo =  document.createElement("input");

                                    inputEfectivo.setAttribute("class", "inputsDenominacionesEfectivo"+j+" form-control input-sm");
                                    inputEfectivo.setAttribute("type", "text");
                                    inputEfectivo.setAttribute("id", "efecDenom"+j+"n"+i+"");
                                    inputEfectivo.setAttribute("name", i);
                                    
                                    celdaEfectivo.appendChild(inputEfectivo);
                                    
                                    hileraEfectivo.appendChild(celdaEfectivo);

                                   
                                  }

                                  // agrega la hilera al final de la tabla (al final del elemento tblbody)
                                  tblBodyEfectivo.appendChild(hileraEfectivo);
                                }
                               
                                // appends <table> into <body>
                                bodyEfectivo.appendChild(tblBodyEfectivo);
                                bodyEfectivo.appendChild(theadEfectivo);

                                for (var i = 0; i < arregloDenominaciones.length; i++) {
                                    var textoCeldaEfectivo = arregloDenominaciones[i];
                                    var denominacionEfectivo = document.getElementById("efecDenom0n"+i+"");
                                    denominacionEfectivo.setAttribute("style","font-weight:bold;color:#2667ce;font-size:15px;margin:0px 0 0px 0");
                                    denominacionEfectivo.setAttribute("disabled", "true");
                                    denominacionEfectivo.value = textoCeldaEfectivo;
                                }
                                for (var i = 0; i < arregloDenominaciones.length; i++) {
                                 
                                    var denominacionEfectivo = document.getElementById("efecDenom2n"+i+"");
                                    denominacionEfectivo.setAttribute("style","font-weight:bold;color:#2667ce;font-size:15px;margin:0px 0 0px 0");
                                    denominacionEfectivo.setAttribute("disabled", "true");
                                    var j = i + 1;
                                    var valorEfectivo = respuesta["dn"+j+""] / arregloMontosDenominaciones[i];
                                    var totalEfectivo =  arregloMontosDenominaciones[i] * valorEfectivo;
                                    denominacionEfectivo.value = formatNumber.new(totalEfectivo.toFixed(2), "$");
                                   
                                }
                                for (var i = 0; i < arregloDenominaciones.length; i++) {
                                 
                                    var denominacionEfectivo = document.getElementById("efecDenom1n"+i+"");
                                    denominacionEfectivo.setAttribute("style","font-weight:lighter;color:black;font-size:15px;margin:0px 0 0px 0");
                                    denominacionEfectivo.setAttribute("disabled", "true");
                                    var j = i + 1;
                                    var valorEfectivo = respuesta["dn"+j+""] / arregloMontosDenominaciones[i];
                                    denominacionEfectivo.setAttribute("value", valorEfectivo.toFixed(2));
                                   
                                }
                                var importeVentaTotal = document.getElementById("importeVentaTotal");
                                importeVentaTotal.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;");
                                var montoVenta = respuesta["importeVenta"] * 1;
                                importeVentaTotal.value = formatNumber.new(montoVenta.toFixed(2), "$");

                                var gastosTotal = document.getElementById("gastosTotal");
                                gastosTotal.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;");
                                var montoGasto = respuesta["gastos"] * 1;
                                gastosTotal.value = formatNumber.new(montoGasto.toFixed(2), "$");

                                var fondoCajaTotal = document.getElementById("fondoCajaTotal");
                                fondoCajaTotal.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;");
                                var montoCaja = respuesta["fondoCaja"] * 1;
                                fondoCajaTotal.value = formatNumber.new(montoCaja.toFixed(2), "$");

                                var diferenciaTotal = document.getElementById("diferenciaTotal");
                                diferenciaTotal.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;");
                                var montoDiferencia = respuesta["diferencia"] * 1;
                                diferenciaTotal.value = formatNumber.new(montoDiferencia.toFixed(2), "$");

                                var btnVerImporteVenta =  document.getElementById("btnVerImporteVenta");
                                btnVerImporteVenta.setAttribute("fechaFactura", respuesta["fechaFactura"]);
                                var btnVerGastosSucursal =  document.getElementById("btnVerGastosSucursal");
                                btnVerGastosSucursal.setAttribute("foliosGasto", respuesta["folioGasto"]);

                                var observacionesCorteDetalle = document.getElementById("observacionesCorte");
                                observacionesCorteDetalle.value = respuesta["observaciones"];

                                $("#procesarFormaPago").click();

                             }

                        });

                        

                      }else{

                        swal({

                            type: "error",
                            title: "¡Porfavor revisa la forma de pago de las facturas.!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                          }).then(function(result){

                          });
                      }
                    });

});
$("#finalizarCorteCaja").on("click",function(){

swal({

                    type: "warning",
                    title: "¡Seguro(a) que desea finalizar el corte de Caja.!",
                    confirmButtonText: "Finalizar",
                    cancelButtonText: 'Revisar',
                    showCancelButton: true
                  }).then(function(result){
                      
                      if (result.value == true) {

                        localStorage.removeItem("totalPendientePago");
                        localStorage.removeItem("pendientesPago");
                        var finalizado = "1";
                        var observacionesCorte = $("#observacionesCorte").val();
                        var folioCorteCajaEdit = localStorage.getItem("folioCorteCaja");
    
                        var datos = new FormData();
                        datos.append('valorFinalizado',finalizado);
                        datos.append('folioCorteCajaEdit',folioCorteCajaEdit);
                        datos.append('observacionesCorte',observacionesCorte);
                    
                         $.ajax({

                          url:"ajax/facturacionTiendas.ajax.php",
                          method: "POST",
                          data: datos,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(respuesta){
                          /* 
                            location.href = "notificarDiferenciasCorteCaja.php";
                            */
                        
                              if (respuesta != "false") {

                                  var datos = new FormData();
                                  datos.append('total',respuesta["total"]);
                                  datos.append('importeVenta', respuesta["importeVenta"]);
                                  datos.append('diferencia', respuesta["diferencia"]);
                                  datos.append('gastos', respuesta["gastos"]);
                                  datos.append('fondoCaja', respuesta["fondoCaja"]);
                                  datos.append('serie', respuesta["serie"]);
                                  datos.append('folio', respuesta["folio"]);
                                  datos.append('fechaCorte', respuesta["fechaCorte"]);
                                  $("#modalCargarDatosCorte").modal('show');
                                  $.ajax({

                                    url:"notificarDiferenciasCorteCaja.php",
                                    method: "POST",
                                    data: datos,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                  
                                    success: function(respuesta){
                                          
                                          var response = respuesta;
                                          var responseFinal = response.replace(/['"]+/g, '');
                                          
                                          if (responseFinal == "exito") {
                                            $("#modalCargarDatosCorte").modal('hide');

                                             localStorage.removeItem("folioCorteCaja");
                                              
                                              swal({
                                                  type: "success",
                                                  title: "Excelente",
                                                  text: "Corte de caja generado correctamente!",
                                                  button: "Finalizar",
                                                }).then(function(result){

                                                  window.location.href = 'corteCaja';
                                                  });
                                                

                                          }else{


                                          swal({

                                              type: "error",
                                              title: "¡Hubo un error durante el proceso, comunicate con el administrador.!",
                                              button :"Cerrar",

                                            }).then(function(result){

                                              window.location.href = 'corteCaja';

                                            });



                                          }
                    
                                       }

                                  });

                              }else{
                                 localStorage.removeItem("folioCorteCaja");
                                swal({
                                      type: "success",
                                      title: "Excelente",
                                      text: "Corte de caja generado correctamente!",
                                      button: "Finalizar",
                                    }).then(function(result){

                                      window.location.href = 'corteCaja';
                                      });

                              }
      
                             }

                        });

                        

                      }else{

                        swal({

                            type: "error",
                            title: "¡Porfavor revisa los resultados antes de finalizar el corte.!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                          }).then(function(result){

                          });
                      }
                    });

});
$("#btnVerImporteVenta").on("click",function(){

    var fechaFactura = $(this).attr("fechaFactura");
    var importeVentaTotal = $("#importeVentaTotal").val();
    var importeVentaTotal = importeVentaTotal.replace(',', '');
    var folioCorteCaja = localStorage.getItem("folioCorteCaja");

    abrirVentana('http://dkmatrizz.ddns.net/importesVenta?fechaFactura='+fechaFactura+'&importeVenta='+importeVentaTotal+'&folioCorteCaja='+folioCorteCaja);

});
$("#btnVerGastosSucursal").on("click",function(){

    var folioGasto = $(this).attr("foliosGasto");
    abrirVentana('http://dkmatrizz.ddns.net/gastosCorteCaja?folioGasto='+folioGasto);

    

});
function abrirVentana(url) {
        window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
}
$(".tablaCortesDeCaja").on("click", ".btnVerDetalleCorteCaja", function() {

    var folioCorteCajaVistaDetalle = $(this).attr("folioCorteCajaVistaDetalle");
  
    var datos = new FormData();
    datos.append("folioCorteCajaVistaDetalle", folioCorteCajaVistaDetalle);


      $.ajax({

        url:"ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 

        
                                var fechaCorte = respuesta["fechaCorte"];
                                var fechaFinCorte = respuesta["fechaTerminoCorte"];
                                var tiempoProceso = respuesta["tiempoTranscurrido"];

                                var fechaCorteIniciado = document.getElementById("fechaCorteIniciadoDetalle");
                                fechaCorteIniciado.innerHTML = fechaCorte;
                                var fechaTerminoCorte = document.getElementById("fechaCorteProcesoDetalle");
                                fechaTerminoCorte.innerHTML = fechaFinCorte;

                                var hours = Math.floor( tiempoProceso / 3600 );  
                                var minutes = Math.floor( (tiempoProceso % 3600) / 60 );
                                var seconds = tiempoProceso % 60;
                                 
                                //Anteponiendo un 0 a los minutos si son menos de 10 
                                minutes = minutes < 10 ? '0' + minutes : minutes;
                                 
                                //Anteponiendo un 0 a los segundos si son menos de 10 
                                seconds = seconds < 10 ? '0' + seconds : seconds;
                                 
                                var result = hours + " Hora(s) " + minutes + " minutos y " + seconds + " " + " segundos."; 
                                var tiempoProcesoCorte = document.getElementById("tiempoProcesoCorteDetalle");
                                tiempoProcesoCorte.innerHTML = result;

                              

                                var listaCabeceras = ['Forma de Pago','Monto'];

                                body = document.getElementById("tablaFormasPagoDetalle");

                                thead = document.createElement("thead");
                                thead.setAttribute('style','background:#2667ce;color: white');

                                theadTr = document.createElement("tr");

                                for (var h = 0; h < listaCabeceras.length; h++) {
                                    
                                    var celdaThead = document.createElement("th");
                                    var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
                                    celdaThead.appendChild(textoCeldaThead);
                                    theadTr.appendChild(celdaThead);

                                }
                              
                                thead.appendChild(theadTr);
                     
                                tblBody = document.createElement("tbody");

                                var arregloFormasPago = ['EFECTIVO','CHEQUE NOMINATIVO','TRANSFERENCIA ELECTRÓNICA','TARJETA DE CREDITO','TARJETA DE DEBITO','POR DEFINIR','CREDITO','TOTAL'];
                                var arregloValoresFormasPago = ['efectivo','cheque','transferencia','tarjetaCredito','tarjetaDebito','porDefinir','credito','totalGeneral'];         

                                // Crea las celdas
                                for (var i = 0; i < arregloFormasPago.length; i++) {
                                  // Crea las hileras de la tabla
                                  var hilera = document.createElement("tr");
                               
                                  for (var j = 0; j < 2; j++) {
                                   

                                    var celda = document.createElement("td");
                                    var input =  document.createElement("input");

                                    input.setAttribute("class", "inputFormasPagoDetalle"+j+" form-control input-sm");
                                    input.setAttribute("type", "text");
                                    input.setAttribute("id", "formPagoDetalle"+j+"n"+i+"");
                                    input.setAttribute("name", i);

                                    celda.appendChild(input);
                                    
                                    hilera.appendChild(celda);

                                   
                                  }

                                  // agrega la hilera al final de la tabla (al final del elemento tblbody)
                                  tblBody.appendChild(hilera);
                                }
                               
                                // appends <table> into <body>
                                body.appendChild(tblBody);
                                body.appendChild(thead);

                                for (var i = 0; i < arregloFormasPago.length; i++) {
                                    var textoCelda = arregloFormasPago[i];
                                    var denominacion = document.getElementById("formPagoDetalle0n"+i+"");
                                     denominacion.setAttribute("style","font-weight:bold;color:black;font-size:11px;margin: 0px 0 0px 0;");
                                    denominacion.setAttribute("disabled", "true");
                                    denominacion.value = textoCelda;
                                }
                                for (var i = 0; i < arregloFormasPago.length; i++) {
                                    
                                    var denominacion = document.getElementById("formPagoDetalle0n7");
                                    denominacion.setAttribute("style","font-weight:bold;color:black;font-size:14px;margin: 0px 0 0px 0;");

      
                                }
                                for (var i = 0; i < arregloFormasPago.length; i++) {
                                 
                                    var denominacion = document.getElementById("formPagoDetalle1n"+i+"");
                                    denominacion.setAttribute("style","font-weight:lighter;color:black;font-size:12px;margin: 0px 0 0px 0;");
                                    denominacion.setAttribute("disabled", "true");
                                    var valor = respuesta[arregloValoresFormasPago[i]] * 1;
                                    denominacion.value = formatNumber.new(valor.toFixed(2), "$");
                                    var denominacion2 = document.getElementById("formPagoDetalle1n7");
                                    denominacion2.setAttribute("style","font-weight:bold;color:#2667ce;font-size:14px;margin: 0px 0 0px 0;");
                                   
                                }

                                /**************TABLA DE DENOMINACIONES EFECTIVO*****************/

                                var cabeceras = ['Denominación','Cantidad','Total'];

                                bodyEfectivo = document.getElementById("tablaEfectivoDenominacionesDetalle");

                                theadEfectivo = document.createElement("thead");
                                theadEfectivo.setAttribute('style','background:#2667ce;color: white');

                                theadTrEfectivo = document.createElement("tr");

                                for (var h = 0; h < cabeceras.length; h++) {
                                    
                                    var celdaTheadEfectivo = document.createElement("th");
                                    var textoCeldaTheadEfectivo = document.createTextNode(cabeceras[h]);
                                    celdaTheadEfectivo.appendChild(textoCeldaTheadEfectivo);
                                    theadTrEfectivo.appendChild(celdaTheadEfectivo);

                                }
                              
                                theadEfectivo.appendChild(theadTrEfectivo);
                     
                                tblBodyEfectivo = document.createElement("tbody");

                                var arregloDenominaciones = ['$ 1,000.00','$ 500.00','$ 200.00','$ 100.00','$ 50.00','$ 20.00','$ 10.00','$ 5.00','$ 2.00','$ 1.00','$ 0.50','$ 0.20','$ 0.10','$ 0.05'];
                                var arregloMontosDenominaciones = ['1000.00','500.00','200.00','100.00','50.00','20.00','10.00','5.00','2.00','1.00','0.50','0.20','0.10','0.05'];

                                // Crea las celdas
                                for (var i = 0; i < arregloDenominaciones.length; i++) {
                                  // Crea las hileras de la tabla
                                  var hileraEfectivo = document.createElement("tr");
                               
                                  for (var j = 0; j < 3; j++) {
                                   

                                    var celdaEfectivo = document.createElement("td");
                                    var inputEfectivo =  document.createElement("input");

                                    inputEfectivo.setAttribute("class", "inputsDenominacionesEfectivoDetalle"+j+" form-control input-sm");
                                    inputEfectivo.setAttribute("type", "text");
                                    inputEfectivo.setAttribute("id", "efecDenomDetalle"+j+"n"+i+"");
                                    inputEfectivo.setAttribute("name", i);
                                    
                                    celdaEfectivo.appendChild(inputEfectivo);
                                    
                                    hileraEfectivo.appendChild(celdaEfectivo);

                                   
                                  }

                                  // agrega la hilera al final de la tabla (al final del elemento tblbody)
                                  tblBodyEfectivo.appendChild(hileraEfectivo);
                                }
                               
                                // appends <table> into <body>
                                bodyEfectivo.appendChild(tblBodyEfectivo);
                                bodyEfectivo.appendChild(theadEfectivo);

                                for (var i = 0; i < arregloDenominaciones.length; i++) {
                                    var textoCeldaEfectivo = arregloDenominaciones[i];
                                    var denominacionEfectivo = document.getElementById("efecDenomDetalle0n"+i+"");
                                    denominacionEfectivo.setAttribute("style","font-weight:bold;color:#2667ce;font-size:15px;margin:0px 0 0px 0");
                                    denominacionEfectivo.setAttribute("disabled", "true");
                                    denominacionEfectivo.value = textoCeldaEfectivo;
                                }
                                for (var i = 0; i < arregloDenominaciones.length; i++) {
                                 
                                    var denominacionEfectivo = document.getElementById("efecDenomDetalle2n"+i+"");
                                    denominacionEfectivo.setAttribute("style","font-weight:bold;color:#2667ce;font-size:15px;margin:0px 0 0px 0");
                                    denominacionEfectivo.setAttribute("disabled", "true");
                                    var j = i + 1;
                                    var valorEfectivo = respuesta["dn"+j+""] / arregloMontosDenominaciones[i];
                                    var totalEfectivo =  arregloMontosDenominaciones[i] * valorEfectivo;
                                    denominacionEfectivo.value = formatNumber.new(totalEfectivo.toFixed(2), "$");
                                   
                                }
                                for (var i = 0; i < arregloDenominaciones.length; i++) {
                                 
                                    var denominacionEfectivo = document.getElementById("efecDenomDetalle1n"+i+"");
                                    denominacionEfectivo.setAttribute("style","font-weight:lighter;color:black;font-size:15px;margin:0px 0 0px 0");
                                    denominacionEfectivo.setAttribute("disabled", "true");
                                    var j = i + 1;
                                    var valorEfectivo = respuesta["dn"+j+""] / arregloMontosDenominaciones[i];
                                    denominacionEfectivo.setAttribute("value", valorEfectivo.toFixed(2));
                                   
                                }
                                var importeVentaTotal = document.getElementById("importeVentaTotalDetalle");
                                importeVentaTotal.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;");
                                var montoVenta = respuesta["importeVenta"] * 1;
                                importeVentaTotal.value = formatNumber.new(montoVenta.toFixed(2), "$");

                                var gastosTotal = document.getElementById("gastosTotalDetalle");
                                gastosTotal.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;");
                                var montoGasto = respuesta["gastos"] * 1;
                                gastosTotal.value = formatNumber.new(montoGasto.toFixed(2), "$");

                                var fondoCajaTotal = document.getElementById("fondoCajaTotalDetalle");
                                fondoCajaTotal.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;");
                                var montoCaja = respuesta["fondoCaja"] * 1;
                                fondoCajaTotal.value = formatNumber.new(montoCaja.toFixed(2), "$");

                                var diferenciaTotal = document.getElementById("diferenciaTotalDetalle");
                                diferenciaTotal.setAttribute("style","font-weight:bold;color:#2667ce;font-size:16px;");
                                var montoDiferencia = respuesta["diferencia"] * 1;
                                diferenciaTotal.value = formatNumber.new(montoDiferencia.toFixed(2), "$");

                                var btnVerImporteVenta =  document.getElementById("btnVerImporteVentaDetalle");
                                btnVerImporteVenta.setAttribute("fechaFacturaDetalle", respuesta["fechaFactura"]);
                                btnVerImporteVenta.setAttribute("folioCorteCajaDetalleVista", respuesta["folio"]);
                                var btnVerGastosSucursal =  document.getElementById("btnVerGastosSucursalDetalle");
                                btnVerGastosSucursal.setAttribute("foliosGastoDetalle", respuesta["folioGasto"]);

                                var observacionesCorteDetalle = document.getElementById("observacionesCorteDetalle");
                                observacionesCorteDetalle.value = respuesta["observaciones"];

                                var usuarioCorte = document.getElementById("usuarioCorte");
                                usuarioCorte.innerHTML = respuesta["nombre"];
          
        }


      })


});
$(".btnCerrarVistaDetalle").on('click', function(){

   var nodos = document.getElementById('tablaFormasPagoDetalle');
        while (nodos.firstChild) {
          nodos.removeChild(nodos.firstChild);
    }
    var nodos2 = document.getElementById('tablaEfectivoDenominacionesDetalle');
        while (nodos2.firstChild) {
          nodos2.removeChild(nodos2.firstChild);
    }

});
$("#btnVerImporteVentaDetalle").on("click",function(){

    var fechaFactura = $(this).attr("fechaFacturaDetalle");
    var importeVentaTotal = $("#importeVentaTotalDetalle").val();
    var importeVentaTotal = importeVentaTotal.replace(',', '');
    var folioCorteCaja = $(this).attr("folioCorteCajaDetalleVista");

    abrirVentana('http://dkmatrizz.ddns.net/importesVenta?fechaFactura='+fechaFactura+'&importeVenta='+importeVentaTotal+'&folioCorteCaja='+folioCorteCaja);

});
$("#btnVerGastosSucursalDetalle").on("click",function(){

    var folioGasto = $(this).attr("foliosGastoDetalle");
    abrirVentana('http://dkmatrizz.ddns.net/gastosCorteCaja?folioGasto='+folioGasto);

    

});
/*=============================================
EMITIR RECIBO DE AJUSTES
=============================================*/
$(".tablaAjusteSaldos").on("click", ".btnEmitirReciboAjuste", function(){

  var folioAjusteRecibo = $(this).attr("folioAjuste");

  var datos = new FormData();
  datos.append('folioAjusteRecibo', folioAjusteRecibo);

            $("#modalProcesoCargaDatosRecibo").modal('show');
            setTimeout(function(){ 
                $("#modalProcesoCargaDatosRecibo").modal('hide');

                 $.ajax({

                    url:"ajax/facturacionTiendas.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta){ 
                      
                      var opcion = 2;
                      window.open("vistas/modulos/reciboAjuste.php/?folioAjuste="+folioAjusteRecibo+"&opcion="+opcion,'_blank');
                   
                    }

                  })

             }, 3000);

});
/*=============================================
EMITIR RECIBO DE AJUSTES
=============================================*/
$(".tablaAjustesDocumentos").on("click", ".btnEmitirReciboAjuste", function(){

  var folioAjusteRecibo = $(this).attr("folioAjuste");

  var datos = new FormData();
  datos.append('folioAjusteRecibo', folioAjusteRecibo);

            $("#modalProcesoCargaDatosRecibo").modal('show');
            setTimeout(function(){ 
                $("#modalProcesoCargaDatosRecibo").modal('hide');

                 $.ajax({

                    url:"ajax/facturacionTiendas.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta){ 
                      
                      var opcion = 2;
                      window.open("vistas/modulos/reciboAjuste.php/?folioAjuste="+folioAjusteRecibo+"&opcion="+opcion,'_blank');
                   
                    }

                  })

             }, 3000);

});
/*=============================================
EMITIR RECIBO DE CORTE DE CAJA
=============================================*/
$(".tablaCortesDeCaja").on("click", ".btnEmitirReciboCorteCaja", function(){

  var folioReciboCorte = $(this).attr("folioReciboCorte");


            $("#modalProcesoCargaDatosRecibo").modal('show');
            setTimeout(function(){ 
                $("#modalProcesoCargaDatosRecibo").modal('hide');

                var opcion = 2;
                window.open("vistas/modulos/reciboCorteCaja.php/?folioReciboCorte="+folioReciboCorte+"&opcion="+opcion,'_blank');

             }, 3000);

});

$(".tablaAjustesDocumentos").on("click", ".btnDownloadAjuste", function(){

   var rutaArchivo = $(this).attr("rutaArchivo");
  
    location.href ="downloadAjuste.php?rutaArchivo="+rutaArchivo;
});

$("#obtenerFacturasSaldosPendientes").on("click",function(){
 
 facturasTiendasSaldosPendientes.ajax.reload();
});
$("#obtenerListaFacturasGenerales").on("click",function(){

 facturasTiendas.ajax.reload();


});
/**
 * Generar pago en el banco
 */
$(".btnGenerarPagoBanco").on("click",function(){
  
  var fechaCobro = $("#fechaCobro").val();

  abrirVentana('http://dkmatrizz.ddns.net/depositoEfectivoBanco?fechaCobro='+fechaCobro);
});
/**
 * NUEVAS FUNCIONES PARA PENDIENTES DE PAGO
 */
$("#generarCorteCaja").on("click", function() {

    var totalPendientePagos = localStorage.getItem("totalPendientePago");
  
    if (totalPendientePagos === null) {
      var totalPendientePago = "0.00";
    }else{
      var totalPendientePago = localStorage.getItem("totalPendientePago");
    }
    document.getElementById("totalPendientesPago").innerHTML = "$ "+ " "+totalPendientePago;

    var sucursal = $(this).attr("sucursal");

    switch (sucursal) {
      case 'Sucursal San Manuel':
        var concepto = "FACTURA SAN MANUEL V 3.3";
        break;
      case 'Sucursal Reforma':
        var concepto = "FACTURA REFORMA V 3.3";
        break;
      case 'Sucursal Capu':
        var concepto = "FACTURA CAPU V 3.3";
        break;
      case 'Sucursal Santiago':
        var concepto = "FACTURA SANTIAGO V 3.3";
        break;
      case 'Sucursal Las Torres':
        var concepto = "FACTURA TORRES";
        break;
      default:
        
        break;
    }

    pendientesPago = $(".tablaPendientesPago").DataTable({
        "ajax":"ajax/tablaPendientesPago.ajax.php?concepto="+concepto,
        "deferRender": true,
        "responsive": true,
        "retrieve": true,
        "processing": true,
        "iDisplayLength": 5,
       
        "scrollCollapse": true,
        "fixedHeader": true,
        "order": [[ 0, "asc" ]],
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



});
$(".tablaPendientesPago").on("click", ".selectorPendiente", function(){
   if (localStorage.getItem("pendientesPago") == null || localStorage.getItem("pendientesPago") == "") {

        pendientesPago = [];

    }else{

        pendientesPago = localStorage.getItem("pendientesPago").split(',');

    }
    if (localStorage.getItem("totalPendientePago") == null || localStorage.getItem("totalPendientePago") == "") {

        totalPendientePago = 0;

    }else{

        totalPendientePago = localStorage.getItem("totalPendientePago");

    }
  var idFacturaPendiente = $(this).attr('facturaPendiente');

  var parent = $("#selectorPendiente"+idFacturaPendiente+"");
  var puntero = $(this).attr("puntero");

  if ($(this).is(':checked')) {
      parent.removeAttr('checked');
      pendientesPago.push(idFacturaPendiente);
      localStorage.setItem("pendientesPago", pendientesPago);

      var cobrado = $("#importeCobradoFactura"+puntero+"").val();

      var formaPago = $("#formaPagoPendiente"+puntero+"").val();

      var datos = new FormData();
      datos.append('formaPagoPendiente',formaPago);
      datos.append('idFacturaPendiente',idFacturaPendiente);
      datos.append('cobradoPendiente',cobrado);
      datos.append('pendientePago',"1");
      $.ajax({

        url:"ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
          

        }

      });

      var totalPendientePago = parseFloat(totalPendientePago) + parseFloat(cobrado);
      localStorage.setItem("totalPendientePago", totalPendientePago.toFixed(2));
      document.getElementById("totalPendientesPago").innerHTML = "$ "+ " "+totalPendientePago.toFixed(2);

  } else {
      parent.attr('checked');

      borraItemValor(pendientesPago,idFacturaPendiente);
      localStorage.setItem("pendientesPago", pendientesPago);

      var cobrado = $("#importeCobradoFactura"+puntero+"").val();

      var formaPago = $("#formaPagoPendiente"+puntero+"").val();

      var datos = new FormData();
      datos.append('formaPagoPendiente',formaPago);
      datos.append('idFacturaPendiente',idFacturaPendiente);
      datos.append('pendientePago',"0");
      $.ajax({

        url:"ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
   
        }

      });

      var totalPendientePago = parseFloat(totalPendientePago) - parseFloat(cobrado);
      localStorage.setItem("totalPendientePago", totalPendientePago.toFixed(2));
      document.getElementById("totalPendientesPago").innerHTML = "$ "+ " "+totalPendientePago.toFixed(2);

  }


});
$("#vincularPendientesPago").on("click", function(){

        if( $("input:checkbox").is(':checked')){
            

                
              } else {
                  /*
                  swal({

                      type: "error",
                      title: "¡No hay ninguna factura elegida!",
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                    });
                    */
              }

});
/*===============================================================================
=            SCRIPTS FUNCIONES CORTE CAJA VINCULACION FACTURAS BANCO            =
===============================================================================*/

$(".btnBancoElegido").on("click",function(){
    var banco = $(this).attr("banco");
    var tabla = $(this).attr("tabla");
    localStorage.setItem("tablaBanco", tabla);
    localStorage.setItem("bancoElegido", banco);
});

$("."+localStorage.getItem("tablaBanco")+"").on("click",".btnEditarDatos", function(){

    var idMovimientoBanco = $(this).attr("idBanco");
    var abono = $(this).attr("abono");
    var fechaAbono = $(this).attr("fechaAbono");

    localStorage.setItem("idMovimientoBanco",idMovimientoBanco);
    localStorage.setItem("abonoBanco", abono);
    localStorage.setItem("fechaAbono", fechaAbono);

    $("#abonoFacturas").html("$"+" "+"0");

    $("#abonoBanco").html("$"+" "+abono);
    $("#abonoBancoTotal").val(abono);
    $("#idMovimientoBanco").val(idMovimientoBanco);

    var bancoElegido = localStorage.getItem("bancoElegido");

    var datos = new FormData();
    datos.append('bancoElegido',bancoElegido);
    datos.append('idMovimientoBancoElegido',idMovimientoBanco);

    $.ajax({

        url:"ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 

            var response = respuesta;
            if (response === false) {

              var arregloFacturas = [];
              var arregloClientes = [];
              var arregloDocumento = [];
              var arregloValorDocumento = [];
              var spanLista = [];
              
              localStorage.setItem("abonadoFacturas","");
              localStorage.setItem("arregloClientes",arregloClientes);
              localStorage.setItem("arregloDocumento",arregloDocumento);
              localStorage.setItem("arregloFacturas",arregloFacturas);
              localStorage.setItem("arregloValorDocumento",arregloValorDocumento);
              localStorage.setItem("numeroParciales","");
              localStorage.setItem("spanLista",spanLista);


            }else{

              localStorage.setItem("abonadoFacturas",respuesta["abonadoDeposito"]);
              localStorage.setItem("arregloClientes",respuesta["clientesFacturas"]);
              localStorage.setItem("arregloDocumento",respuesta["conceptoFacturas"]);
              localStorage.setItem("arregloFacturas",respuesta["montoFacturas"]);
              localStorage.setItem("arregloValorDocumento",respuesta["totalDocumentos"]);
              localStorage.setItem("numeroParciales",respuesta["parciales"]);
              localStorage.setItem("spanLista",respuesta["span"]);

            }
   
        }

      });



});



$("#vincularPendientesCredito").on("click",function(){


    var idMovimientoBanco = localStorage.getItem("idMovimientoBanco");

    tablaPendientesCredito = $(".tablaPendientesCredito").DataTable({
        "ajax":"ajax/tablaPendientesCredito.ajax.php?idMovimientoBanco="+idMovimientoBanco,
        "deferRender": true,
        "responsive": true,
        "retrieve": true,
        "processing": true,
        "iDisplayLength": 5,
       
        "scrollCollapse": true,
        "fixedHeader": true,
        "order": [[ 0, "asc" ]],
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


    var abono = localStorage.getItem("abonBanco");
    var fechaAbono = localStorage.getItem("fechaAbono");
    var abonadoFacturas = localStorage.getItem("abonadoFacturas");
    var arregloClientes = localStorage.getItem("arregloClientes");
    var arregloDocumento = localStorage.getItem("arregloDocumento");
    var arregloFacturas =localStorage.getItem("arregloFacturas");
    var arregloValorDocumento = localStorage.getItem("arregloValorDocumento");
    var numeroParciales = localStorage.getItem("numeroParciales");
    var span = localStorage.getItem("spanLista");


    var arregloSpan = span.split(',');
    var arreglosFacturas = arregloFacturas.split(',');
    var arreglosDocumentos = arregloDocumento.split(',');

    if (span == "") {
      
    }else{
        for (var i=0; i < arregloSpan.length; i++) {

          let spanFacturas = "<span id="+arregloSpan[i]+">"+arreglosDocumentos[i]+' '+'$ '+arreglosFacturas[i]+' '+"</span>";
          $("#listaFacturas").append(spanFacturas);
          
        }
    }
  
    

    var totalAbonado  = abonadoFacturas;



    $("#abonoFacturas").html("$"+" "+totalAbonado);

    localStorage.setItem("abonadoFacturas", totalAbonado);
    localStorage.setItem("arregloClientes", arregloClientes);
    localStorage.setItem("arregloDocumento", arregloDocumento);
    localStorage.setItem("arregloFacturas", arregloFacturas);
    localStorage.setItem("arregloValorDocumento", arregloValorDocumento);
    localStorage.setItem("numeroParciales", numeroParciales);
    localStorage.setItem("spanLista",arregloSpan);

    if (localStorage.getItem("arregloFacturas") == null || localStorage.getItem("arregloFacturas") == "") {

          var arregloFacturas = [];

    }else{

          var arregloFacturas = localStorage.getItem("arregloFacturas").split(',');

    }
    if (localStorage.getItem("arregloClientes") == null || localStorage.getItem("arregloClientes") == "") {

          var arregloClientes = [];

    }else{

          var arregloClientes = localStorage.getItem("arregloClientes").split(',');

    }
    if (localStorage.getItem("arregloDocumento") == null || localStorage.getItem("arregloDocumento") == "") {

          var arregloDocumento = [];

    }else{

          var arregloDocumento = localStorage.getItem("arregloDocumento").split(',');

    }
    if (localStorage.getItem("arregloValorDocumento") == null || localStorage.getItem("arregloValorDocumento") == "") {

          var arregloValorDocumento = [];

    }else{

          var arregloValorDocumento = localStorage.getItem("arregloValorDocumento").split(',');

    }
    if (localStorage.getItem("spanLista") == null || localStorage.getItem("spanLista") == "") {

          var spanLista = [];

    }else{

          var spanLista = localStorage.getItem("spanLista").split(',');

    }


});

$(".tablaPendientesCredito").on("click", ".btnLigarFacturaPendiente", function() {

  if (localStorage.getItem("arregloFacturas") == null || localStorage.getItem("arregloFacturas") == "") {

          var arregloFacturas = [];

    }else{

          var arregloFacturas = localStorage.getItem("arregloFacturas").split(',');

    }
    if (localStorage.getItem("arregloClientes") == null || localStorage.getItem("arregloClientes") == "") {

          var arregloClientes = [];

    }else{

          var arregloClientes = localStorage.getItem("arregloClientes").split(',');

    }
    if (localStorage.getItem("arregloDocumento") == null || localStorage.getItem("arregloDocumento") == "") {

          var arregloDocumento = [];

    }else{

          var arregloDocumento = localStorage.getItem("arregloDocumento").split(',');

    }
    if (localStorage.getItem("arregloValorDocumento") == null || localStorage.getItem("arregloValorDocumento") == "") {

          var arregloValorDocumento = [];

    }else{

          arregloValorDocumento = localStorage.getItem("arregloValorDocumento").split(',');

    }
    if (localStorage.getItem("spanLista") == null || localStorage.getItem("spanLista") == "") {

          var spanLista = [];

    }else{

          var spanLista = localStorage.getItem("spanLista").split(',');

    }

    var identificador = $(this).attr("identificador");
    var idFacturaDepositada = $(this).attr("idFacturaDepositada");
    var nombreSucursal = $(this).attr("nombreSucursal");
    var montoFactura = $("#importeDeposito"+identificador).val();
    var valorDocumento = $(this).attr('valorDocumento');
    var nombreCliente = $(this).attr("nombreCliente");
    var serieFactura = $(this).attr("serieFactura");
    var folioFactura = $(this).attr("folioFactura");
    let spanFacturas = "<span id="+Math.trunc(montoFactura+identificador)+">"+serieFactura+' '+folioFactura+' '+'$ '+montoFactura+"</span>";

    $("#listaFacturas").append(spanFacturas);
    
    spanLista.push(Math.trunc(montoFactura+identificador));

    localStorage.setItem("spanLista", spanLista);
   

    var documento = serieFactura+" "+folioFactura;

    arregloFacturas.push(montoFactura);
    arregloClientes.push(nombreCliente);
    arregloDocumento.push(documento);
    arregloValorDocumento.push(valorDocumento);

    localStorage.setItem("arregloFacturas", arregloFacturas);
    localStorage.setItem("arregloClientes", arregloClientes);
    localStorage.setItem("arregloDocumento", arregloDocumento);
    localStorage.setItem("arregloValorDocumento", arregloValorDocumento);
    localStorage.setItem("sucursal", nombreSucursal);

    var arrayFacturas = localStorage.getItem("arregloFacturas").split(',');
    var arrayClientes = localStorage.getItem("arregloClientes").split(',');
 
    /*****FUNCION UNIQUE PARA MOSTRAR SOLO LOS ELEMENTOS DEL ARREGLO UNA SOLA VEZ*******/
    function unique(array) {
    return $.grep(array, function(el, index) {
        return index == $.inArray(el, array);
    });
    }
    /*****FUNCION UNIQUE PARA MOSTRAR SOLO LOS ELEMENTOS DEL ARREGLO UNA SOLA VEZ*******/
    var numeroParciales = unique(arrayClientes);

    localStorage.setItem("numeroParciales", numeroParciales.length);

    var total = 0;
    for(var i = 0; i < arrayFacturas.length; i++) {
        total += parseFloat(arrayFacturas[i]);
    }

    var totalAbono = $("#abonoBancoTotal").val();
    if (total > totalAbono) {
        document.getElementById("btnLigarFacturasPendientesCredito").disabled = true;
    
        document.getElementById("abonoFacturas").style.color = "red";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));

    }else{

         document.getElementById("btnLigarFacturasPendientesCredito").disabled =false;
        document.getElementById("abonoFacturas").style.color = "black";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));
    }
    

   

    var datos = new FormData();
    datos.append("serieFacturaDepositadaMovimiento", serieFactura);
    datos.append("folioFacturaDepositadaMovimiento", folioFactura);
    datos.append("abonoFacturaMovimiento", montoFactura);

    $.ajax({
        url: "ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

           tablaPendientesCredito.ajax.reload();

        }
    })
    
    
   
}); 
function borraItemValor(array, valor){
    for(var i in array){
       
        if(array[i]==valor){
            array.splice(i,1);
            break;
        }
    }
}
$(".tablaPendientesCredito").on("click", ".btnQuitarFacturaPendiente", function() {

     if (localStorage.getItem("arregloFacturas") == null || localStorage.getItem("arregloFacturas") == "") {

          var arregloFacturas = [];

    }else{

          var arregloFacturas = localStorage.getItem("arregloFacturas").split(',');

    }
    if (localStorage.getItem("arregloClientes") == null || localStorage.getItem("arregloClientes") == "") {

          var arregloClientes = [];

    }else{

          var arregloClientes = localStorage.getItem("arregloClientes").split(',');

    }
    if (localStorage.getItem("arregloDocumento") == null || localStorage.getItem("arregloDocumento") == "") {

          var arregloDocumento = [];

    }else{

          var arregloDocumento = localStorage.getItem("arregloDocumento").split(',');

    }
    if (localStorage.getItem("arregloValorDocumento") == null || localStorage.getItem("arregloValorDocumento") == "") {

          var arregloValorDocumento = [];

    }else{

          arregloValorDocumento = localStorage.getItem("arregloValorDocumento").split(',');

    }
    if (localStorage.getItem("spanLista") == null || localStorage.getItem("spanLista") == "") {

          var spanLista = [];

    }else{

          var spanLista = localStorage.getItem("spanLista").split(',');

    }


    var identificador = $(this).attr("identificadorRemove");

    var idFacturaDepositadaRemove = $(this).attr("idFacturaDepositadaRemove");
    var montoFactura = $("#importeDeposito"+identificador).val();

    var valorDocumento = $(this).attr("valorDocumentoRemove");
    var nombreCliente = $(this).attr("nombreCliente");
    var serieFactura = $(this).attr("serieFactura");
    var folioFactura = $(this).attr("folioFactura");
    $("#"+Math.trunc(montoFactura+identificador)+"").remove();
    var variable = Math.trunc(montoFactura+identificador);


    var documento = serieFactura+" "+folioFactura;
    
    
    borraItemValor(arregloFacturas, montoFactura);
    borraItemValor(arregloClientes, nombreCliente);
    borraItemValor(arregloDocumento, documento);
    borraItemValor(arregloValorDocumento, valorDocumento);
    borraItemValor(spanLista,variable);

    localStorage.setItem("arregloFacturas", arregloFacturas);
    localStorage.setItem("arregloClientes", arregloClientes);
    localStorage.setItem("arregloDocumento", arregloDocumento);
    localStorage.setItem("arregloValorDocumento", arregloValorDocumento);
    localStorage.setItem("spanLista", spanLista);

    var arrayFacturas = localStorage.getItem("arregloFacturas").split(',');
    var arrayClientes = localStorage.getItem("arregloClientes").split(',');

     /*****FUNCION UNIQUE PARA MOSTRAR SOLO LOS ELEMENTOS DEL ARREGLO UNA SOLA VEZ*******/
    function unique(array) {
    return $.grep(array, function(el, index) {
        return index == $.inArray(el, array);
    });
    }
    /*****FUNCION UNIQUE PARA MOSTRAR SOLO LOS ELEMENTOS DEL ARREGLO UNA SOLA VEZ*******/
    var numeroParciales = unique(arrayClientes);

    localStorage.setItem("numeroParciales", numeroParciales.length);

    var total = 0;
    for(var i = 0; i < arrayFacturas.length; i++) {
        total += parseFloat(arrayFacturas[i]);
    }
   
    var totalAbono = $("#abonoBancoTotal").val();
   
    if (total > totalAbono) {

        document.getElementById("btnLigarFacturasPendientesCredito").disabled = true;
        document.getElementById("abonoFacturas").style.color = "red";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));

    }else if(isNaN(total) == true){ 

        document.getElementById("btnLigarFacturasPendientesCredito").disabled =true;
        document.getElementById("abonoFacturas").style.color = "black";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));

    }else{

        document.getElementById("btnLigarFacturasPendientesCredito").disabled = false;
        document.getElementById("abonoFacturas").style.color = "black";
        $("#abonoFacturas").html("$"+" "+total.toFixed(2));
        localStorage.setItem("abonadoFacturas", total.toFixed(2));
    }
   var idMovimientoBanco = localStorage.getItem("idMovimientoBanco")
   var datos = new FormData();
     datos.append("serieFacturaDepositadaMovimientoRemove", serieFactura);
     datos.append("folioFacturaDepositadaMovimientoRemove", folioFactura);
     datos.append("abonoFacturaMovimientoRemove", montoFactura);
     datos.append("idMovimientoBancoMovimientoRemove", idMovimientoBanco);

    $.ajax({
        url: "ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

           tablaPendientesCredito.ajax.reload();

        }
    })
    
    
   
});
$(".btnCerrarFacturasPendientes").click(function(){
     localStorage.removeItem("arregloFacturas");         
     localStorage.removeItem("arregloClientes");         
     localStorage.removeItem("arregloDocumento");   
     localStorage.removeItem("arregloValorDocumento");       
     //localStorage.removeItem("idMovimientoBanco");
     localStorage.removeItem("abonoBanco");
     //llocalStorage.removeItem("sucursal");
     localStorage.removeItem("numeroParciales");
     localStorage.removeItem("abonadoFacturas");
     localStorage.removeItem("fechaAbono");
     localStorage.removeItem("spanLista");
     $("#listaFacturas").empty();
   
     
});

$("#btnLigarFacturasPendientesCredito").click(function(){

  var idMovimiento = localStorage.getItem("idMovimientoBanco");
  var conceptoAbono = localStorage.getItem("arregloDocumento");
  var clientesAbono = localStorage.getItem("arregloClientes");
  var parcialesAbono = localStorage.getItem("arregloFacturas");
  var totalAbonado = localStorage.getItem("abonadoFacturas");
  var nombreSucursal = localStorage.getItem("sucursal");
  var numeroParciales = localStorage.getItem("numeroParciales");
  var fechaAbono = localStorage.getItem("fechaAbono");
  var listaSpan = localStorage.getItem("spanLista");

  var totalAbono = localStorage.getItem("abonoBanco");

  var totalDocumento = localStorage.getItem("arregloValorDocumento");

  var saldoPendiente = totalAbono - totalAbonado;

  if (totalAbonado == 0 || totalAbonado === null) {

      $("#fracaso").css('display', 'block');
                setTimeout(function() {
                   $("#fracaso").css('display', 'none');
                }, 3000);

  }else{

      var datos = new FormData();
      var bancoMovimiento = localStorage.getItem("bancoElegido");

      datos.append("idMovimientoBancarioMovimiento", idMovimiento);
      datos.append("conceptoAbonoMovimiento", conceptoAbono);
      datos.append("clientesAbonoMovimiento", clientesAbono);
      datos.append("parcialesAbonoMovimiento", parcialesAbono);
      datos.append("saldoPendienteMovimiento", saldoPendiente);
      datos.append("abonoMovimiento", totalAbono);
      datos.append("nombreSucursalMovimiento", nombreSucursal);
      datos.append("numeroParcialesMovimiento", numeroParciales);
      datos.append("fechaAbonoMovimiento", fechaAbono);
      datos.append("totalDocumentoMovimiento", totalDocumento);
      datos.append("totalAbonadoMovimiento", totalAbonado);
      datos.append("listaSpanMovimiento",listaSpan);
      datos.append("bancoMovimiento",bancoMovimiento);

     $.ajax({
        url: "ajax/facturacionTiendas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

          localStorage.removeItem("arregloFacturas");         
          localStorage.removeItem("arregloClientes");         
          localStorage.removeItem("arregloDocumento");   
          localStorage.removeItem("arregloValorDocumento");       
          //localStorage.removeItem("idMovimientoBanco");
          localStorage.removeItem("abonoBanco");
          //llocalStorage.removeItem("sucursal");
          localStorage.removeItem("numeroParciales");
          localStorage.removeItem("abonadoFacturas");
          localStorage.removeItem("fechaAbono");
          localStorage.removeItem("spanLista");
          $("#listaFacturas").empty();

          //$("#abonoFacturas").html("$"+" "+"0.00");
          //document.getElementById("listaFacturas").innerHTML="";
           $("#exito").css('display', 'block');
           document.getElementById('statusProceso').innerHTML = "Procesando Datos";
                setTimeout(function() {
                  document.getElementById('statusProceso').innerHTML = "Datos Procesados";
                   $("#exito").css('display', 'none');
                   //depositosTiendas.ajax.reload();
                   //
                   var idBanco = localStorage.getItem("idMovimientoBanco");
                  
  
                    var datos = new FormData();
                    datos.append("idBanco", idBanco);
                   
                   $.ajax({

                      url:"ajax/"+bancoMovimiento+".ajax.php",
                      method: "POST",
                      data: datos,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(respuesta){ 

                        $("#editarDepartamento").val(respuesta["departamento"]);
                        $("#idBanco").val(respuesta["id"]);
                        $("#editarIdBanco").val(respuesta["id"]);
                        $("#editarGrupo").val(respuesta["grupo"]);
                        $("#editarSubgrupo").val(respuesta["subgrupo"]);
                        $("#editarMes").val(respuesta["mes"]);
                        $("#editarFecha").val(respuesta["fecha"]);
                        $("#editarDescripcion").val(respuesta["descripcion"]);
                        $("#editarCargo").val(respuesta["cargo"]);
                        $("#editarAbono").val(respuesta["abono"]);
                        $("#editarSaldo").val(respuesta["saldo"]);
                        $("#editarParciales").val(respuesta["parciales"]);
                        $("#editarParcial").val(respuesta["parcial"]);
                        $("#editarDepartamentoParcial1").val(respuesta["departamentoParcial1"]);
                        $("#editarParcial2").val(respuesta["parcial2"]);
                        $("#editarDepartamentoParcial2").val(respuesta["departamentoParcial2"]);
                        $("#editarParcial3").val(respuesta["parcial3"]);
                        $("#editarDepartamentoParcial3").val(respuesta["departamentoParcial3"]);
                        $("#editarParcial4").val(respuesta["parcial4"]);
                        $("#editarDepartamentoParcial4").val(respuesta["departamentoParcial4"]);
                        $("#editarParcial5").val(respuesta["parcial5"]);
                        $("#editarDepartamentoParcial5").val(respuesta["departamentoParcial5"]);
                        $("#editarParcial6").val(respuesta["parcial6"]);
                        $("#editarDepartamentoParcial6").val(respuesta["departamentoParcial6"]);
                        $("#editarParcial7").val(respuesta["parcial7"]);
                        $("#editarDepartamentoParcial7").val(respuesta["departamentoParcial7"]);
                        $("#editarParcial8").val(respuesta["parcial8"]);
                        $("#editarDepartamentoParcial8").val(respuesta["departamentoParcial8"]);
                        $("#editarParcial9").val(respuesta["parcial9"]);
                        $("#editarDepartamentoParcial9").val(respuesta["departamentoParcial9"]);
                        $("#editarParcial10").val(respuesta["parcial10"]);
                        $("#editarDepartamentoParcial10").val(respuesta["departamentoParcial10"]);
                        $("#editarParcial11").val(respuesta["parcial11"]);
                        $("#editarDepartamentoParcial11").val(respuesta["departamentoParcial11"]);
                        $("#editarParcial12").val(respuesta["parcial12"]);
                        $("#editarDepartamentoParcial12").val(respuesta["departamentoParcial12"]);
                        $("#editarFolio").val(respuesta["folio"]);
                        $("#editarSerie").val(respuesta["serie"]);
                        $("#select2-editarAcreedor-container").val(respuesta["acreedor"]);
                        $("#editarAcreedor").val(respuesta["acreedor"]);
                        $("#editarConcepto").val(respuesta["concepto"]);
                        $("#editarNumeroDocumento").val(respuesta["numeroDocumento"]);
                        $("#editarTieneIva").val(respuesta["tieneIva"]);
                        $("#editarTieneRetenciones").val(respuesta["tieneRetenciones"]);
                        $("#editarTipoRetencion").val(respuesta["tipoRetencion"]);
                        $("#editarImporteRetenciones").val(respuesta["importeRetenciones"]);


                        var valor1 = document.getElementById("editarParciales").value;
                        var valor = document.getElementById("editarTieneRetenciones").value;

                        if (valor == "01") {
                          div0 = document.getElementById("div_01");
                          div0.style.display = "";

                        }else if (valor == "0") {
                          div0 = document.getElementById("div_01");
                          div0.style.display = "none";
                        }
                           
                           if (valor1 == 0) {
                             
                            div1 = document.getElementById("1P");
                            div1.style.display = "none";

                            div2 = document.getElementById("2P");
                            div2.style.display = "none";

                            div3 = document.getElementById("3P");
                            div3.style.display = "none";

                            div4 = document.getElementById("4P");
                            div4.style.display = "none";

                            div5 = document.getElementById("5P");
                            div5.style.display = "none";

                            div6 = document.getElementById("6P");
                            div6.style.display = "none";

                            div7 = document.getElementById("7P");
                            div7.style.display = "none";

                            div8 = document.getElementById("8P");
                            div8.style.display = "none";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                           }

                           else if (valor1 == 1) {

                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "none";

                            div3 = document.getElementById("3P");
                            div3.style.display = "none";

                            div4 = document.getElementById("4P");
                            div4.style.display = "none";

                            div5 = document.getElementById("5P");
                            div5.style.display = "none";

                            div6 = document.getElementById("6P");
                            div6.style.display = "none";

                            div7 = document.getElementById("7P");
                            div7.style.display = "none";

                            div8 = document.getElementById("8P");
                            div8.style.display = "none";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }else if (valor1 == 2) {

                           div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "none";

                            div4 = document.getElementById("4P");
                            div4.style.display = "none";

                            div5 = document.getElementById("5P");
                            div5.style.display = "none";

                            div6 = document.getElementById("6P");
                            div6.style.display = "none";

                            div7 = document.getElementById("7P");
                            div7.style.display = "none";

                            div8 = document.getElementById("8P");
                            div8.style.display = "none";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }else if (valor1 == 3) {

                           div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "none";

                            div5 = document.getElementById("5P");
                            div5.style.display = "none";

                            div6 = document.getElementById("6P");
                            div6.style.display = "none";

                            div7 = document.getElementById("7P");
                            div7.style.display = "none";

                            div8 = document.getElementById("8P");
                            div8.style.display = "none";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }else if (valor1 == 4) {

                           div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "none";

                            div6 = document.getElementById("6P");
                            div6.style.display = "none";

                            div7 = document.getElementById("7P");
                            div7.style.display = "none";

                            div8 = document.getElementById("8P");
                            div8.style.display = "none";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }else if (valor1 == 5) {

                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "";

                            div6 = document.getElementById("6P");
                            div6.style.display = "none";

                            div7 = document.getElementById("7P");
                            div7.style.display = "none";

                            div8 = document.getElementById("8P");
                            div8.style.display = "none";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }
                          else if (valor1 == 6) {

                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "";

                            div6 = document.getElementById("6P");
                            div6.style.display = "";

                            div7 = document.getElementById("7P");
                            div7.style.display = "none";

                            div8 = document.getElementById("8P");
                            div8.style.display = "none";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }
                          else if (valor1 == 7) {
                          
                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "";

                            div6 = document.getElementById("6P");
                            div6.style.display = "";

                            div7 = document.getElementById("7P");
                            div7.style.display = "";

                            div8 = document.getElementById("8P");
                            div8.style.display = "none";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }else if (valor1 == 8) {
                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "";

                            div6 = document.getElementById("6P");
                            div6.style.display = "";

                            div7 = document.getElementById("7P");
                            div7.style.display = "";

                            div8 = document.getElementById("8P");
                            div8.style.display = "";

                            div9 = document.getElementById("9P");
                            div9.style.display = "none";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }else if (valor1 == 9) {
                            
                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "";

                            div6 = document.getElementById("6P");
                            div6.style.display = "";

                            div7 = document.getElementById("7P");
                            div7.style.display = "";

                            div8 = document.getElementById("8P");
                            div8.style.display = "";

                            div9 = document.getElementById("9P");
                            div9.style.display = "";

                            div10 = document.getElementById("10P");
                            div10.style.display = "none";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";


                          }else if (valor1 == 10) {
                            
                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "";

                            div6 = document.getElementById("6P");
                            div6.style.display = "";

                            div7 = document.getElementById("7P");
                            div7.style.display = "";

                            div8 = document.getElementById("8P");
                            div8.style.display = "";

                            div9 = document.getElementById("9P");
                            div9.style.display = "";

                            div10 = document.getElementById("10P");
                            div10.style.display = "";

                            div11 = document.getElementById("11P");
                            div11.style.display = "none";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }else if (valor1 == 11) {
                            
                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "";

                            div6 = document.getElementById("6P");
                            div6.style.display = "";

                            div7 = document.getElementById("7P");
                            div7.style.display = "";

                            div8 = document.getElementById("8P");
                            div8.style.display = "";

                            div9 = document.getElementById("9P");
                            div9.style.display = "";

                            div10 = document.getElementById("10P");
                            div10.style.display = "";

                            div11 = document.getElementById("11P");
                            div11.style.display = "";

                            div12 = document.getElementById("12P");
                            div12.style.display = "none";

                          }else if (valor1 == 12) {
                            
                            div1 = document.getElementById("1P");
                            div1.style.display = "";

                            div2 = document.getElementById("2P");
                            div2.style.display = "";

                            div3 = document.getElementById("3P");
                            div3.style.display = "";

                            div4 = document.getElementById("4P");
                            div4.style.display = "";

                            div5 = document.getElementById("5P");
                            div5.style.display = "";

                            div6 = document.getElementById("6P");
                            div6.style.display = "";

                            div7 = document.getElementById("7P");
                            div7.style.display = "";

                            div8 = document.getElementById("8P");
                            div8.style.display = "";

                            div9 = document.getElementById("9P");
                            div9.style.display = "";

                            div10 = document.getElementById("10P");
                            div10.style.display = "";

                            div11 = document.getElementById("11P");
                            div11.style.display = "";

                            div12 = document.getElementById("12P");
                            div12.style.display = "";

                          }
                       
                      }


                    })
                
                   $(".btnCerrarFacturasPendientes").click();

                }, 2000);
                

        }
    })
    
  }
  
  
    
})
/*=====  End of SCRIPTS FUNCIONES CORTE CAJA VINCULACION FACTURAS BANCO  ======*/