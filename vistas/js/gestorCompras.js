/*=============================================
CARGAR LA TABLA DINÁMICA DE ALMACEN
=============================================*/

var table7 = $(".tablaCompras").DataTable({
   "ajax":"ajax/tablaCompras.ajax.php",
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
setInterval( function () {
    table7.ajax.reload(); // user paging is not reset on reload
}, 5000);

/*=============================================
EDITAR COMPRAS
=============================================*/
$(".tablaCompras").on("click", ".btnEditarCompra1", function(){

  var idCompra1 = $(this).attr("idCompra1");
  
  var datos = new FormData();
  datos.append("idCompra1", idCompra1);

  $.ajax({

    url:"ajax/compras.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idCompra1").val(respuesta["id"]);
      $("#idPedidoGeneral").val(respuesta["idPedido"]);
      $("#serieGeneral").val(respuesta["serie"]);
      $("#folioCompraGeneral").val(respuesta["folioCompra"]);
      $("#clienteGeneral").val(respuesta["cliente"]);
      $("#cantidadGeneral").val(respuesta["cantidad"]);
      $("#importeCompra").val(respuesta["importeCompra"]);
      $("#fechaRecepcionGeneral").val(respuesta["fechaRecepcion"]);
      $("#fechaElaboracionGeneral").val(respuesta["fechaElaboracion"]);
      $("#fechaTerminoGeneral").val(respuesta["fechaTermino"]);
      $("#editarObservaciones").val(respuesta["observaciones"]);
      
    }


  })


})
/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablaCompras").on("click", ".btnVerObservaciones", function(){

  var idCompras4 = $(this).attr("idCompras4");
  
  var datos = new FormData();
  datos.append("idCompras4", idCompras4);

  $.ajax({

    url:"ajax/compras.ajax.php",
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
EDITAR COMPRAS
=============================================*/
$(".tablaCompras").on("click", ".btnEditarCompra", function(){

  var idCompra = $(this).attr("idCompra");
  
  var datos = new FormData();
  datos.append("idCompra", idCompra);

  $.ajax({

    url:"ajax/compras.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idCompra").val(respuesta["id"]);
      $("#editarIdPedido").val(respuesta["idPedido"]);
      $("#editarVendedor").val(respuesta["vendedor"]);
      $("#editarSerie").val(respuesta["serie"]);
      $("#editarFolioCompra").val(respuesta["folioCompra"]);
      $("#editarFechaCotizacion").val(respuesta["fechaCotizacion"]);
      $("#editarCliente").val(respuesta["cliente"]);
      $("#editarSecciones").val(respuesta["secciones"]);
      $("#editarCantidad").val(respuesta["cantidad"]);
      $("#editarUnidad").val(respuesta["unidad"]);
      $("#editarCodigo").val(respuesta["codigo"]);
      $("#editarDescripcion").val(respuesta["descripcion"]);
      $("#editarPrecioUnitario").val(respuesta["precioUnitario"]);
      $("#editarPrecioCompra").val(respuesta["precioCompra"]);
      $("#editarDescuentoProveedor").val(respuesta["descuentoProveedor"]);
      $("#editarCantidad2").val(respuesta["cantidad2"]);
      $("#editarUnidad2").val(respuesta["unidad2"]);
      $("#editarCodigo2").val(respuesta["codigo2"]);
      $("#editarDescripcion2").val(respuesta["descripcion2"]);
      $("#editarPrecioUnitario2").val(respuesta["precioUnitario2"]);
      $("#editarPrecioCompra2").val(respuesta["precioCompra2"]);
      $("#editarDescuentoProveedor2").val(respuesta["descuentoProveedor2"]);
      $("#editarCantidad3").val(respuesta["cantidad3"]);
      $("#editarUnidad3").val(respuesta["unidad3"]);
      $("#editarCodigo3").val(respuesta["codigo3"]);
      $("#editarDescripcion3").val(respuesta["descripcion3"]);
      $("#editarPrecioUnitario3").val(respuesta["precioUnitario3"]);
      $("#editarPrecioCompra3").val(respuesta["precioCompra3"]);
      $("#editarDescuentoProveedor3").val(respuesta["descuentoProveedor3"]);
      $("#editarCantidad4").val(respuesta["cantidad4"]);
      $("#editarUnidad4").val(respuesta["unidad4"]);
      $("#editarCodigo4").val(respuesta["codigo4"]);
      $("#editarDescripcion4").val(respuesta["descripcion4"]);
      $("#editarPrecioUnitario4").val(respuesta["precioUnitario4"]);
      $("#editarPrecioCompra4").val(respuesta["precioCompra4"]);
      $("#editarDescuentoProveedor4").val(respuesta["descuentoProveedor4"]);
      $("#editarCantidad5").val(respuesta["cantidad5"]);
      $("#editarUnidad5").val(respuesta["unidad5"]);
      $("#editarCodigo5").val(respuesta["codigo5"]);
      $("#editarDescripcion5").val(respuesta["descripcion5"]);
      $("#editarPrecioUnitario5").val(respuesta["precioUnitario5"]);
      $("#editarPrecioCompra5").val(respuesta["precioCompra5"]);
      $("#editarDescuentoProveedor5").val(respuesta["descuentoProveedor5"]);
      $("#editarTiempoEntrega").val(respuesta["tiempoEntrega"]);
      $("#editarFechaRecepcion").val(respuesta["fechaRecepcion"]);
      $("#editarFechaElaboracion").val(respuesta["fechaElaboracion"]);
      $("#editarFechaTermino").val(respuesta["fechaTermino"]);
      $("#editarStatus").val(respuesta["status"]);
      $("#editarObservaciones").val(respuesta["observaciones"]);

      var valor1 = document.getElementById("editarSecciones").value;
         if (valor1 == 1) {
         div1 = document.getElementById("1");
              div1.style.display = "";

         div2 = document.getElementById("2");
           div2.style.display = "none";

        div3 = document.getElementById("3");
           div3.style.display = "none";

        div4 = document.getElementById("4");
           div4.style.display = "none";

        div5 = document.getElementById("5");
           div5.style.display = "none";

        }else if (valor1 == 2) {
        
        div1 = document.getElementById("1");
              div1.style.display = "";

         div2 = document.getElementById("2");
           div2.style.display = "";

        div3 = document.getElementById("3");
           div3.style.display = "none";

        div4 = document.getElementById("4");
           div4.style.display = "none";

        div5 = document.getElementById("5");
           div5.style.display = "none";

        }else if (valor1 == 3) {
         div1 = document.getElementById("1");
              div1.style.display = "";

         div2 = document.getElementById("2");
           div2.style.display = "";

        div3 = document.getElementById("3");
           div3.style.display = "";

        div4 = document.getElementById("4");
           div4.style.display = "none";

        div5 = document.getElementById("5");
           div5.style.display = "none";

        }else if (valor1 == 4) {
         div1 = document.getElementById("1");
              div1.style.display = "";

         div2 = document.getElementById("2");
           div2.style.display = "";

        div3 = document.getElementById("3");
           div3.style.display = "";

        div4 = document.getElementById("4");
           div4.style.display = "";

        div5 = document.getElementById("5");
           div5.style.display = "none";

        }else if (valor1 == 5) {
        div1 = document.getElementById("1");
              div1.style.display = "";

         div2 = document.getElementById("2");
           div2.style.display = "";

        div3 = document.getElementById("3");
           div3.style.display = "";

        div4 = document.getElementById("4");
           div4.style.display = "";

        div5 = document.getElementById("5");
           div5.style.display = "";

        }
    }


  })


})
/*=============================================
MOSTRAR COMPRAS PEDIDOS
=============================================*/
$(".tablaCompras").on("click", ".btnVerCompras", function(){

  var idCom = $(this).attr("idCom");
  
  var datos = new FormData();
  datos.append("idCom", idCom);

  $.ajax({

    url:"ajax/compras.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idCom").val(respuesta["id"]);
      $("#compSecciones").val(respuesta["secciones"]);
      $("#compCantidad").val(respuesta["cantidad"]);
      $("#compCantidad1").val(respuesta["cantidad"]);
      $("#compUnidad").val(respuesta["unidad"]);
      $("#compCodigo").val(respuesta["codigo"]);
      $("#compDescripcion").val(respuesta["descripcion"]);
      $("#compPrecioUnitario").val(respuesta["precioUnitario"]);
      $("#compPrecioCompra").val(respuesta["precioCompra"]);
      $("#compDescuentoProveedor").val(respuesta["descuentoProveedor"]);
      $("#compImporteCompra").val(respuesta["importeCompra"]);
      $("#compUtilidad").val(respuesta["utilidad"]);
      $("#compCantidad2").val(respuesta["cantidad2"]);
      $("#compUnidad2").val(respuesta["unidad2"]);
      $("#compCodigo2").val(respuesta["codigo2"]);
      $("#compDescripcion2").val(respuesta["descripcion2"]);
      $("#compPrecioUnitario2").val(respuesta["precioUnitario2"]);
      $("#compPrecioCompra2").val(respuesta["precioCompra2"]);
      $("#compDescuentoProveedor2").val(respuesta["descuentoProveedor2"]);
      $("#compUtilidad2").val(respuesta["utilidad2"]);
      $("#compCantidad3").val(respuesta["cantidad3"]);
      $("#compUnidad3").val(respuesta["unidad3"]);
      $("#compCodigo3").val(respuesta["codigo3"]);
      $("#compDescripcion3").val(respuesta["descripcion3"]);
      $("#compPrecioUnitario3").val(respuesta["precioUnitario3"]);
      $("#compPrecioCompra3").val(respuesta["precioCompra3"]);
      $("#compDescuentoProveedor3").val(respuesta["descuentoProveedor3"]);
      $("#compUtilidad3").val(respuesta["utilidad3"]);
      $("#compCantidad4").val(respuesta["cantidad4"]);
      $("#compUnidad4").val(respuesta["unidad4"]);
      $("#compCodigo4").val(respuesta["codigo4"]);
      $("#compDescripcion4").val(respuesta["descripcion4"]);
      $("#compPrecioUnitario4").val(respuesta["precioUnitario4"]);
      $("#compPrecioCompra4").val(respuesta["precioCompra4"]);
      $("#compDescuentoProveedor4").val(respuesta["descuentoProveedor4"]);
      $("#compUtilidad4").val(respuesta["utilidad4"]);
      $("#compCantidad5").val(respuesta["cantidad5"]);
      $("#compUnidad5").val(respuesta["unidad5"]);
      $("#compCodigo5").val(respuesta["codigo5"]);
      $("#compDescripcion5").val(respuesta["descripcion5"]);
      $("#compPrecioUnitario5").val(respuesta["precioUnitario5"]);
      $("#compPrecioCompra5").val(respuesta["precioCompra5"]);
      $("#compDescuentoProveedor5").val(respuesta["descuentoProveedor5"]);
      $("#compUtilidad5").val(respuesta["utilidad5"]);

       var valor = document.getElementById("compSecciones").value;
       console.log(valor);
         if (valor == 1) {
         div1 = document.getElementById("comp1");
              div1.style.display = "";

         div2 = document.getElementById("comp2");
           div2.style.display = "none";

        div3 = document.getElementById("comp3");
           div3.style.display = "none";

        div4 = document.getElementById("comp4");
           div4.style.display = "none";

        div5 = document.getElementById("comp5");
           div5.style.display = "none";

        }else if (valor == 2) {
         div1 = document.getElementById("comp1");
              div1.style.display = "";

         div2 = document.getElementById("comp2");
           div2.style.display = "";

        div3 = document.getElementById("comp3");
           div3.style.display = "none";

        div4 = document.getElementById("comp4");
           div4.style.display = "none";

        div5 = document.getElementById("comp5");
           div5.style.display = "none";

        }else if (valor == 3) {
         
         div1 = document.getElementById("comp1");
              div1.style.display = "";

         div2 = document.getElementById("comp2");
           div2.style.display = "";

        div3 = document.getElementById("comp3");
           div3.style.display = "";

        div4 = document.getElementById("comp4");
           div4.style.display = "none";

        div5 = document.getElementById("comp5");
           div5.style.display = "none";

        }else if (valor == 4) {

        div1 = document.getElementById("comp1");
              div1.style.display = "";

        div2 = document.getElementById("comp2");
           div2.style.display = "";

        div3 = document.getElementById("comp3");
           div3.style.display = "";

        div4 = document.getElementById("comp4");
           div4.style.display = "";

        div5 = document.getElementById("comp5");
           div5.style.display = "none";

        }else if (valor == 5) {

          div1 = document.getElementById("comp1");
              div1.style.display = "";

         div2 = document.getElementById("comp2");
           div2.style.display = "";

        div3 = document.getElementById("comp3");
           div3.style.display = "";

        div4 = document.getElementById("comp4");
           div4.style.display = "";

        div5 = document.getElementById("comp5");
           div5.style.display = "";

        }

        var valor2 = document.getElementById("compImporteCompra").value;
       console.log(valor2);
         if (valor2 == "") {
          div1 = document.getElementById("individual");
              div1.style.display = "";

         div2 = document.getElementById("general");
           div2.style.display = "none";


        }else if (valor2 != "") {
          
          div1 = document.getElementById("individual");
              div1.style.display = "none";

         div2 = document.getElementById("general");
           div2.style.display = "";

        }
      
    }


  })


})

/*=============================================
ELIMINAR COMPRA
=============================================*/
$(".tablaCompras").on("click", ".btnEliminarCompra", function(){

  var idCompra = $(this).attr("idCompra");
  var folioCompra =$(this).attr("folioCompra");

  swal({
    title: '¿Está seguro de eliminar la compra?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, eliminar la compra!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=compras&idCompra="+idCompra+"&folioCompra="+folioCompra;

    }

  })

})

/*=============================================
REVISAR SI EL FOLIO DEL PEDIDO EXISTE
=============================================*/

$(".validarPedido4").click(function(){

  $(".alert").remove();

  var Pedido = $(this).val();

  var datos = new FormData();
  datos.append("validarPedido4", Pedido);

   $.ajax({
      url:"ajax/compras.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        if(respuesta.length != 0){

          $(".validarPedido4").parent().after('<div class="alert alert-warning">Este folio de pedido ya fue editado</div>');

          $(".validarPedido4").val("");
          $("#cliente").val('');
          $("#cliente").val('');

        }

      }

    })

})

/*=============================================
REVISAR SI EL FOLIO DEL PEDIDO EXISTE
=============================================*/

$(".validarPedidos4").click(function(){

  $(".alert").remove();

  var Pedido = $(this).val();

  var datos = new FormData();
  datos.append("validarPedidos4", Pedido);

   $.ajax({
      url:"ajax/compras.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        if(respuesta.length != 0){

          $(".validarPedidos4").parent().after('<div class="alert alert-warning">Este folio de pedido ya fue editado</div>');

          $(".validarPedidos4").val("");
          $("#cliente").val('');
          $("#cliente").val('');

        }

      }

    })

})
/*=============================================
HABILITAR COMPRA
=============================================*/
$(".tablaCompras").on("click", ".btnHabilitarFolio", function(){

  var idPedido = $(this).attr("idCompras3");
  var estadoCompra= $(this).attr("estadoCompra");

  var datos = new FormData();
  datos.append("activarId", idPedido);
    datos.append("activarCompra", estadoCompra);

    $.ajax({

    url:"ajax/compras.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
        console.log("respuesta", respuesta);
      }

    })

    if(estadoCompra== 0){

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
