/*=============================================
CARGAR LA TABLA DINÁMICA DE CLIENTES
=============================================*/

 $(".tablaClientes").DataTable({
   "ajax":"ajax/tablaClientes.ajax.php",
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

