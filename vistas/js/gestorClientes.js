/*=============================================
CARGAR LA TABLA DINÁMICA DE CLIENTES
=============================================*/

var table = $(".tablaClientes").DataTable({
   "ajax":"ajax/tablaClientes.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
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
    table.ajax.reload();
}, 3000 );
/*=============================================
ACTIVAR CLIENTE
=============================================*/

$(".tablaClientes tbody").on("click", ".btnActivar", function(){

  var idCliente = $(this).attr("idCliente");
  var estadoCliente = $(this).attr("estadoCliente");

  var datos = new FormData();
  datos.append("activarId", idCliente);
    datos.append("activarCliente", estadoCliente);

    $.ajax({

       url:"ajax/clientes.ajax.php",
       method: "POST",
      data: datos,
      cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){ 
            
          console.log("respuesta", respuesta);

        }    

    });

    if(estadoCliente == "activado"){
      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');      
      $(this).html('Activado');
      $(this).attr('estadoCliente', 'desactivado');

      

    }else{
      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoCliente', 'activado');

    }

})

