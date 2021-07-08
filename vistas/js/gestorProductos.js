/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

tablaProductos = $(".tablaProductos").DataTable({
   "ajax":"ajax/tablaProductos.ajax.php",
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
/****ACTUALIZACION DE PRODUCTOS***/
function actualizarProductos(){
 document.getElementById("loaderProductos").style.display = "";
  $("#loaderProductos").addClass("animated fadeInDown");
  document.getElementById("productosTextLoader").innerHTML =
    "Conectando CONTPAQI COMERCIAL.....";
  setTimeout(function () {
    document.getElementById("productosTextLoader").innerHTML =
      "Actualizando productos , espere un momento porfavor.....";
  }, 3000);

  var datos = new FormData();
  datos.append("empresaProductos", "PINTURAS");

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var json = JSON.stringify(respuesta);

      var datosFacturas = new FormData();
      datosFacturas.append("listadoActualizacionProductos", json);

      $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datosFacturas,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          if (respuesta === "finalizado") {
            $("#modalActualizacionProductos").modal("hide");

            tablaProductos.ajax.reload();
          } else {
          }
        },
      });
    },
  });
}