/*=============================================
CARGAR LA TABLA DINÁMICA DE FACTURACION
=============================================*/
if ($("#fechaIni").val() != "") {
  var fechaInicio = $("#fechaIni").val();
}
else {
  var fechaInicio = "00";
}
var tablaAcumuladoMensual = $(".reportAcumuladoMensual").DataTable({
   "ajax":"ajax/tablaAcumuladoMensual.ajax.php?fechaInicio="+fechaInicio,
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": false,
    "order": false,
       "rowCallback": function(row, data, index){
    if(data[0] == "CEDIS"){
        $(row).find("td:eq(0),td:eq(1),td:eq(2),td:eq(3),td:eq(4),td:eq(5),td:eq(6),td:eq(7),td:eq(8)").css("background-color", "#A9E2F3");
    }
    
    if(data[0] == "CUENTAS CORPORATIVAS"){
        $(row).find("td:eq(0),td:eq(1),td:eq(2),td:eq(3),td:eq(4),td:eq(5),td:eq(6),td:eq(7),td:eq(8)").css("background-color", "#A9E2F3");
    }
    if(data[0] == "TOTALES"){
        $(row).find("td:eq(0),td:eq(1),td:eq(2),td:eq(3),td:eq(4),td:eq(5),td:eq(6),td:eq(7),td:eq(8)").css("background-color", "#A9E2F3");
    }
  },
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

