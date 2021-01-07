/*=============================================
CARGAR LA TABLA DINÁMICA DE ENTREGAS
=============================================*/

entregas = $(".tablaEntregas").DataTable({
   "ajax":"ajax/tablaEntregas.ajax.php",
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

tablaListaFacturasEntregas = $(".tablaListaFacturasEntregas").DataTable({
   "ajax":"ajax/tablaListaFacturasEntregas.ajax.php",
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

/*
CARGAR LAS UNIDADES DEPENDIENDO DEL TIPO DE RUTA
 */
$(document).ready(function(){
  $("select[name=entrega]").change(function(){
      
      var idRuta = $('select[name=entrega]').val()
      var nombreRuta = $('select[name=entrega] option:selected').text();
      
      var datos = new FormData();
      datos.append("idRuta", idRuta);
      datos.append("nombreRuta",nombreRuta);


      $.ajax({

        url:"ajax/entregas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
          var nodos = document.getElementById('unidad');
            while (nodos.firstChild) {
              nodos.removeChild(nodos.firstChild);
            }
          for (var i = 0; i < respuesta.length; i++) {
            
            $("select[name=unidad]").append('<option value="'+respuesta[i]["id"]+'">'+respuesta[i]["unidad"]+'</option>');
    
          }
          
        }


      })
          
   });
});

function borraItemValor(array, valor){
    for(var i in array){
       
        if(array[i]==valor){
            array.splice(i,1);
            break;
        }
    }
}
$(".tablaListaFacturasEntregas").on("click", ".btnAddFacturaEntrega", function(){
      var idFactura = $(this).attr("idFactura");
      var seriePedido = $(this).attr("seriePedido");
      var folioPedido = $(this).attr("folioPedido");  
      var pedido = seriePedido+"-"+folioPedido;   
      
       if (localStorage.getItem("arregloIdFacturas") == null || localStorage.getItem("arregloIdFacturas") == "") {
         var arregloIdFacturas = [];
        
         arregloIdFacturas.push(idFactura);

          localStorage.setItem("arregloIdFacturas", arregloIdFacturas);

          var arregloPedidos = [];

         arregloPedidos.push(pedido);

          localStorage.setItem("arregloPedidos", arregloPedidos);
       }else{

          var arregloIdFacturas = localStorage.getItem("arregloIdFacturas").split(',');

          arregloIdFacturas.push(idFactura);

          localStorage.setItem("arregloIdFacturas", arregloIdFacturas);

          var arregloPedidos = localStorage.getItem("arregloPedidos").split(',');
        
         arregloPedidos.push(pedido);

          localStorage.setItem("arregloPedidos", arregloPedidos);
       }

        var datos = new FormData();
        datos.append("idFactura", idFactura);

        $.ajax({

          url:"ajax/entregas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){ 
            
            tablaListaFacturasEntregas.ajax.reload();
            
          }


        });


});
$(".tablaListaFacturasEntregas").on("click", ".btnDelFacturaEntrega", function(){
      var idFactura = $(this).attr("idFactura");
      var seriePedido = $(this).attr("seriePedido");
      var folioPedido = $(this).attr("folioPedido");  
      var pedido = seriePedido+"-"+folioPedido;  
     
      
       if (localStorage.getItem("arregloIdFacturas") == null) {
         var arregloIdFacturas = [];
         localStorage.setItem("arregloIdFacturas",arregloIdFacturas);

         var arregloPedidos = [];

         localStorage.setItem("arregloPedidos", arregloPedidos);

       }else{

          var arregloIdFacturas = localStorage.getItem("arregloIdFacturas").split(',');

          var arregloPedidos = localStorage.getItem("arregloPedidos").split(',');

          borraItemValor(arregloIdFacturas, idFactura);
          borraItemValor(arregloPedidos, pedido);

          localStorage.setItem("arregloIdFacturas", arregloIdFacturas);
          localStorage.setItem("arregloPedidos", arregloPedidos);
       }

        var datos = new FormData();
        datos.append("idFacturaRemove", idFactura);

        $.ajax({

          url:"ajax/entregas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){ 
            
            tablaListaFacturasEntregas.ajax.reload();
            
          }


        });

});
$(".btnGenerarNuevaEntrega").click(function(){

    var fechaEntrega = $("#fechaEntrega").val();
    var operador = $("#operador").val();
    var entrega = $("#entrega").val();
    var nombreRuta = $('select[name=entrega] option:selected').text();
    var unidad = $("#unidad").val();
    var tipoEntrega = $("#tipoEntrega").val();

    var facturas = localStorage.getItem("arregloIdFacturas");
    var pedidos = localStorage.getItem("arregloPedidos");

    if (facturas == null || facturas.length == 0  || facturas.length == "") {

      swal({

            type: "warning",
            title: "¡No ha elegido una factura!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){
          

            }

          });

    }else{
      var arregloFacturas = localStorage.getItem("arregloIdFacturas").split(',');
      var arregloPedidos = localStorage.getItem("arregloPedidos").split(',');

      var datos = new FormData();

    datos.append("fechaEntrega",fechaEntrega);
    datos.append("operador",operador);
    datos.append("entrega",entrega);
    datos.append("nombreEntregaRuta",nombreRuta);
    datos.append("unidad",unidad);
    datos.append("tipoEntrega",tipoEntrega);
    datos.append("arregloFacturas",arregloFacturas);
    datos.append("arregloPedidos",arregloPedidos);

        $.ajax({

          url:"ajax/entregas.ajax.php",
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

              localStorage.removeItem("arregloIdFacturas");
              localStorage.removeItem("arregloPedidos");
              swal({

                type: "success",
                title: "Entrega Creada Correctamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

              }).then(function(result){

                if(result.value){

                      $(".btnSalirEntrega").click();

                      entregas.ajax.reload();
                      window.location.reload();

                }

              });

             }         
          }


        });

      
    }


});


$(".tablaEntregas").on("click", ".btnEdicionEntrega", function(){


    $("#tablaFacturasEntrega").dataTable().fnDestroy();

    var idEntrega = $(this).attr("idEntrega");

      var datos = new FormData();
        datos.append("idEntrega", idEntrega);

        $.ajax({

          url:"ajax/entregas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){ 

            $("#detalleFechaEntrega").val(respuesta["fecha"]);
            $("#detalleOperador").val(respuesta["operador"]);
            $("#detalleEntrega").val(respuesta["tipoRuta"]);
            $("#detalleUnidad").val(respuesta["unidad"]);
            $("#detalleTipoEntrega").val(respuesta["tipoEntrega"]);


                facturasEntrega = $(".tablaFacturasEntrega").DataTable({
                 "ajax":"ajax/tablaFacturasEntrega.ajax.php?idEntrega="+idEntrega,
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

            
          
            
          }


        });

});

$(".tablaFacturasEntrega").on("click", ".btnActualizarFechaEntrega", function(){


    var idFacturaEntrega = $(this).attr("idFactura");
    var idEntrega = $(this).attr("idEntrega");
    var inicio = $("#horaInicio"+idFacturaEntrega+"").val();
    var termino = $("#horaFinal"+idFacturaEntrega+"").val();

    var datos = new FormData();
    
    datos.append("idFacturaEntrega", idFacturaEntrega);
    datos.append("horaInicio", inicio);
    datos.append("horaTermino", termino);
    datos.append("idEntregaFinalizada", idEntrega);

        $.ajax({

          url:"ajax/entregas.ajax.php",
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

                 $(".btnSalirEntregaEdicion").click();

                  entregas.ajax.reload();

             }

            
          
            
          }


        });


});

$(".tablaEntregas").on("click", ".btnVisualizarEntrega", function(){


   $("#tablaFacturasEntregaView").dataTable().fnDestroy();
    var idEntrega = $(this).attr("idEntrega");

      var datos = new FormData();
        datos.append("idEntrega", idEntrega);

        $.ajax({

          url:"ajax/entregas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){ 




            $("#detalleFechaEntregaView").val(respuesta["fecha"]);
            $("#detalleOperadorView").val(respuesta["operador"]);
            $("#detalleEntregaView").val(respuesta["tipoRuta"]);
            $("#detalleUnidadView").val(respuesta["unidad"]);
            $("#detalleTipoEntregaView").val(respuesta["tipoEntrega"]);


                facturasEntregaView = $(".tablaFacturasEntregaView").DataTable({
                 "ajax":"ajax/tablaFacturasEntregaView.ajax.php?idEntregaDetalle="+idEntrega,
                 "deferRender": true,
                 "scrollY": 200,
                  "scrollX": true,
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

            
          
            
          }


        });

});