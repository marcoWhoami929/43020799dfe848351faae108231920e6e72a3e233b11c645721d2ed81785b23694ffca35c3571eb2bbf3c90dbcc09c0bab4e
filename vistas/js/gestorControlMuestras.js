/*=============================================
CARGAR LA TABLA DINÁMICA DE PCONTROL DE MUESTRAS
=============================================*/
var tablaMuestras = $(".tablaControlMuestras").DataTable({
    "ajax": "ajax/tablaControlMuestras.ajax.php?Muestras=",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [
        [0, "desc"]
    ],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
setInterval(function() {
    tablaMuestras.ajax.reload(); // user paging is not reset on reload
}, 5000);
//Estado De solicitud Enviada
$(".tablaControlMuestras").on("click", ".btnHabilitar1", function() {
    var idStado1 = $(this).attr("idStado1");
    var estado1 = $(this).attr("estado1");
    var datos = new FormData();
    datos.append("status1", estado1);
    datos.append("activarId1", idStado1);
    $.ajax({
        url: "ajax/statusProceso.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (estado1 == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado1', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado1', 0);
    }
});
//MOTO EN CAMINO
$(".tablaControlMuestras").on("click", ".btnHabilitar3", function() {
    var idStado3 = $(this).attr("idStado3");
    var estado3 = $(this).attr("estado3");
    var datos = new FormData();
    datos.append("status3", estado3);
    datos.append("activarId3", idStado3);
    $.ajax({
        url: "ajax/statusProceso.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (estado3 == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado3', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado3', 0);
    }
});
//EN PROCESO
$(".tablaControlMuestras").on("click", ".btnHabilitar5", function() {
    var idStado5 = $(this).attr("idStado5");
    var estado5 = $(this).attr("estado5");
    var datos = new FormData();
    datos.append("status5", estado5);
    datos.append("activarId5", idStado5);
    $.ajax({
        url: "ajax/statusProceso.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (estado5 == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado5', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado5', 0);
    }
});
//MOTO EN CAMINO REGRESO 
$(".tablaControlMuestras").on("click", ".btnHabilitar7", function() {
    var idStado7 = $(this).attr("idStado7");
    var estado7 = $(this).attr("estado7");
    var datos = new FormData();
    datos.append("status7", estado7);
    datos.append("activarId7", idStado7);
    $.ajax({
        url: "ajax/statusProceso.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (estado7 == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado7', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado7', 0);
    }
});
//FINALIZADO
$(".tablaControlMuestras").on("click", ".btnHabilitar8", function() {
    var idStado8 = $(this).attr("idStado8");
    var estado8 = $(this).attr("estado8");
    var datos = new FormData();
    datos.append("status8", estado8);
    datos.append("activarId8", idStado8);
    $.ajax({
        url: "ajax/statusProceso.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (estado8 == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado8', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>');
        $(this).attr('estado8', 0);
    }
});
/*=============================================
DESCARGAR SOLICITUD
=============================================*/
$(".tablaControlMuestras").on("click", ".btnDescargarSolicitud", function() {
    var idSolicitud = $(this).attr("idSolicitud");
    var folio = $(this).attr("idSolicitud");
    swal({
        title: '¿Que desea realizar?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Descargar',
        cancelButtonText: 'Emitir Solicitud',
    }).then(function(result) {
        if (result.value) {
            var opcion = 1;
            window.location = "index.php?ruta=controlMuestras&idSolicitud=" + idSolicitud + "&folio=" + folio + "&opcion=" + opcion;
        }else{
          
            var datos = new FormData();
            datos.append("folioSolicitud", idSolicitud);
            
            $.ajax({
                url: "ajax/statusProceso.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    console.log("respuesta", respuesta);
                }
            })
            var opcion = 2;
            window.location = "index.php?ruta=controlMuestras&idSolicitud=" + idSolicitud + "&folio=" + folio + "&opcion=" + opcion;          

        }
    })
})
//FINALIZADO
$(".tablaControlMuestras").on("click", ".btnVisto", function() {
    var idVisto = $(this).attr("idVisto");
    var visto = $(this).attr("visto");
    var datos = new FormData();
    datos.append("statusVisto", visto);
    datos.append("activarIdVisto", idVisto);
    $.ajax({
        url: "ajax/statusProceso.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (visto == 0) {
        $(this).removeClass('btn-info');
        $(this).addClass('btn-warning');
        $(this).html('<i class="fa fa-eye"></i>');
        $(this).attr('visto', 1);
    } else {
        $(this).addClass('btn-info');
        $(this).removeClass('btn-warning');
        $(this).html('<i class="fa fa-eye"></i>');
        $(this).attr('visto', 0);
    }
});

/*============================================
    MOSTRAR TABLA CARTERA DE CLIENTES
============================================*/


var tablaCarteraClientes = $(".tablaCarteraClientes").DataTable({
   "ajax":"ajax/tablaControlMuestras.ajax.php?Cartera=",
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
MOSTRAR DATOS DEL CLIENTE EN SOLICITUD
=============================================*/
$(".tablaControlMuestras").on("click", ".btnVerDatos", function(){

  var idDatosCliente = $(this).attr("idDatosCliente");
  
  var datos = new FormData();
  datos.append("idDatosCliente", idDatosCliente);

  $.ajax({

    url:"ajax/controlMuestrasAcciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#idDatosCliente").val(respuesta["id"]);
      $("#nombre").val(respuesta["nombre"]);
      $("#taller").val(respuesta["taller"]);
      $("#telefono").val(respuesta["telefono"]);
      $("#celular").val(respuesta["celular"]);
      $("#direccion").val(respuesta["direccion"]);

      $("#latitudCliente").val(respuesta["latitud"]);
      $("#longitudCliente").val(respuesta["longitud"]);


    }

  })

})
$(".tablaControlMuestras").on("click", ".btnVerDatos", function(){

var nameSucursal = $(this).attr("nameSucursal");
  
  var datos = new FormData();
  datos.append("nameSucursal", nameSucursal);

  $.ajax({

    url:"ajax/controlMuestrasAcciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#nameSucursal").val(respuesta["sucursal"]);
      $("#latitudSucursal").val(respuesta["latitud"]);
      $("#longitudSucursal").val(respuesta["longitud"]);


    }

  })

})

/*=============================================
MOSTRAR MAPA DE UBICACION
=============================================*/
$(".tablaCarteraClientes").on("click", ".btnVerMapa", function(){


  var mapa = $(this).attr("direccion");
  $("#direccion").val(mapa);

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablaCarteraClientes").on("click", ".btnEliminarCliente", function(){

  var idCliente = $(this).attr("idCliente");

  swal({
    title: '¿Está seguro de borrar los Datos?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=carteraClientes&idCliente="+idCliente;

    }

  })

})
