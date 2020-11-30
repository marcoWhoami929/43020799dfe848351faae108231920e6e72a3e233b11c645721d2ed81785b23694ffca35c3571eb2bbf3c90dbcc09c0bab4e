//MOSTRAR TABLA DE TICKETS
/*=============================================
CARGAR LA TABLA DINÁMICA DE TICKETS
=============================================*/
var tickets = $(".tablaListaTickets").DataTable({
    "ajax": "ajax/tablaListaTickets.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "fixedHeader": true,
    "iDisplayLength": 10,
    "order": [
        [0, "desc"]
    ],
    /*"scrollX": true,*/
    "lengthMenu": [
        [10, 25, 50, 100, 150, 200, 300, -1],
        [10, 25, 50, 100, 150, 200, 300, "All"]
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
    tickets.ajax.reload(null, false); // user paging is not reset on reload
}, 5000);

var ticketsGenerales = $(".tablaListaTicketsGenerales").DataTable({
    "ajax": "ajax/tablaListaTicketsGenerales.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "fixedHeader": true,
    "iDisplayLength": 10,
    "order": [
        [0, "desc"]
    ],
    /*"scrollX": true,*/
    "lengthMenu": [
        [10, 25, 50, 100, 150, 200, 300, -1],
        [10, 25, 50, 100, 150, 200, 300, "All"]
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
    ticketsGenerales.ajax.reload(null, false); // user paging is not reset on reload
}, 5000);
var ticketsCreados = $(".tablaListaTicketsCreados").DataTable({
    "ajax": "ajax/tablaTicketsCreados.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "fixedHeader": true,
    "iDisplayLength": 10,
    "order": [
        [0, "desc"]
    ],
    /*"scrollX": true,*/
    "lengthMenu": [
        [10, 25, 50, 100, 150, 200, 300, -1],
        [10, 25, 50, 100, 150, 200, 300, "All"]
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
    ticketsCreados.ajax.reload(null, false); // user paging is not reset on reload
}, 5000);
var estatusTickets = $(".tablaEstatusTickets").DataTable({
    "ajax": "ajax/tablaEstatusTickets.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "iDisplayLength": 10,
    "scrollX": true,
    "order": [
        [0, "desc"]
    ],
    /*"scrollX": true,*/
    "lengthMenu": [
        [10, 25, 50, 100, 150, 200, 300, -1],
        [10, 25, 50, 100, 150, 200, 300, "All"]
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
    estatusTickets.ajax.reload(null, false); // user paging is not reset on reload
}, 5000);
/*=============================================
VER TICKETS
=============================================*/
$(".tablaListaTickets").on("click", ".btnVerTicket", function() {
    var idTicket = $(this).attr("idTicket");
    var datos = new FormData();
    datos.append("idTicket", idTicket);
    $.ajax({
        url: "ajax/tickets.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#tituloTicket").val(respuesta["titulo"]);
            $("#contenidoTicket").val(respuesta["contenido"]);
            $("#autorTicket").val(respuesta["autor"]);
            if (respuesta["cerrado"] == 0) {
                $("#estadoTicket").removeClass("label label-danger");
                $("#estadoTicket").addClass("label label-success");
                document.getElementById('estadoTicket').innerHTML = 'Abierto';
            } else {
                $("#estadoTicket").removeClass("label label-success");
                $("#estadoTicket").addClass("label label-danger");
                document.getElementById('estadoTicket').innerHTML = 'Cerrado';
            }
            if (respuesta["prioridad"] == 1) {
                $("#prioridadTicket").removeClass("label label-success");
                $("#prioridadTicket").removeClass("label label-warning");
                $("#prioridadTicket").addClass("label label-danger");
                document.getElementById('prioridadTicket').innerHTML = 'Alta';
            } else if (respuesta["prioridad"] == 2) {
                $("#prioridadTicket").removeClass("label label-success");
                $("#prioridadTicket").removeClass("label label-danger");
                $("#prioridadTicket").addClass("label label-warning");
                document.getElementById('prioridadTicket').innerHTML = 'Media';
            } else if (respuesta["prioridad"] == 3) {
                $("#prioridadTicket").removeClass("label label-success");
                $("#prioridadTicket").removeClass("label label-warning");
                $("#prioridadTicket").addClass("label label-success");
                document.getElementById('prioridadTicket').innerHTML = 'Baja';
            }
            var totalComentarios = respuesta["comentarios"];
            document.getElementById('comentariosTicket').innerHTML = totalComentarios;
        }
    })
})
/*=============================================
VER TICKETS GENERALES
=============================================*/
$(".tablaListaTicketsGenerales").on("click", ".btnVerTicketGeneral", function() {
    var idTicket2 = $(this).attr("idTicket2");
    var datos = new FormData();
    datos.append("idTicket2", idTicket2);
    $.ajax({
        url: "ajax/tickets.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#tituloTicketGeneral").val(respuesta["titulo"]);
            $("#contenidoTicketGeneral").val(respuesta["contenido"]);
            $("#autorTicketGeneral").val(respuesta["autor"]);
            if (respuesta["cerrado"] == 0) {
                $("#estadoTicketGeneral").removeClass("label label-danger");
                $("#estadoTicketGeneral").addClass("label label-success");
                document.getElementById('estadoTicketGeneral').innerHTML = 'Abierto';
            } else {
                $("#estadoTicketGeneral").removeClass("label label-success");
                $("#estadoTicketGeneral").addClass("label label-danger");
                document.getElementById('estadoTicketGeneral').innerHTML = 'Cerrado';
            }
            if (respuesta["prioridad"] == 1) {
                $("#prioridadTicketGeneral").removeClass("label label-success");
                $("#prioridadTicketGeneral").removeClass("label label-warning");
                $("#prioridadTicketGeneral").addClass("label label-danger");
                document.getElementById('prioridadTicketGeneral').innerHTML = 'Alta';
            } else if (respuesta["prioridad"] == 2) {
                $("#prioridadTicketGeneral").removeClass("label label-success");
                $("#prioridadTicketGeneral").removeClass("label label-danger");
                $("#prioridadTicketGeneral").addClass("label label-warning");
                document.getElementById('prioridadTicketGeneral').innerHTML = 'Media';
            } else if (respuesta["prioridad"] == 3) {
                $("#prioridadTicketGeneral").removeClass("label label-success");
                $("#prioridadTicketGeneral").removeClass("label label-warning");
                $("#prioridadTicketGeneral").addClass("label label-success");
                document.getElementById('prioridadTicketGeneral').innerHTML = 'Baja';
            }
            var totalComentarios = respuesta["comentarios"];
            document.getElementById('comentariosTicketGeneral').innerHTML = totalComentarios;
        }
    })
});
/*=============================================
VER TICKETS CREADOS
=============================================*/
$(".tablaListaTicketsCreados").on("click", ".btnVerTicketCreado", function() {
    var idTicket3 = $(this).attr("idTicket3");
    var datos = new FormData();
    datos.append("idTicket3", idTicket3);
    $.ajax({
        url: "ajax/tickets.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#tituloTicketCreado").val(respuesta["titulo"]);
            $("#contenidoTicketCreado").val(respuesta["contenido"]);
            $("#autorTicketCreado").val(respuesta["autor"]);
            if (respuesta["cerrado"] == 0) {
                $("#estadoTicketCreado").removeClass("label label-danger");
                $("#estadoTicketCreado").addClass("label label-success");
                document.getElementById('estadoTicketCreado').innerHTML = 'Abierto';
            } else {
                $("#estadoTicketCreado").removeClass("label label-success");
                $("#estadoTicketCreado").addClass("label label-danger");
                document.getElementById('estadoTicketCreado').innerHTML = 'Cerrado';
            }
            if (respuesta["prioridad"] == 1) {
                $("#prioridadTicketCreado").removeClass("label label-success");
                $("#prioridadTicketCreado").removeClass("label label-warning");
                $("#prioridadTicketCreado").addClass("label label-danger");
                document.getElementById('prioridadTicketCreado').innerHTML = 'Alta';
            } else if (respuesta["prioridad"] == 2) {
                $("#prioridadTicketCreado").removeClass("label label-success");
                $("#prioridadTicketCreado").removeClass("label label-danger");
                $("#prioridadTicketCreado").addClass("label label-warning");
                document.getElementById('prioridadTicketCreado').innerHTML = 'Media';
            } else if (respuesta["prioridad"] == 3) {
                $("#prioridadTicketCreado").removeClass("label label-success");
                $("#prioridadTicketCreado").removeClass("label label-warning");
                $("#prioridadTicketCreado").addClass("label label-success");
                document.getElementById('prioridadTicketCreado').innerHTML = 'Baja';
            }
            var totalComentarios = respuesta["comentarios"];
            document.getElementById('comentariosTicketCreado').innerHTML = totalComentarios;
        }
    })
})
/*=============================================
CERRAR TICKET
=============================================*/
$(".btnCerrarTicket").click(function() {
    var idNumeroTicket = $(this).attr("idNumeroTicket");
    var ruta = $(this).attr("urlTicket");
    var rutaFinal = ruta;

    var serieFactura = $("#serieFacturaCancelacion").val();
    var folioFactura = $("#folioFacturaCancelacion").val();
    var motivoCancelacion = $("#motivoCancelacionFactura").val();

    localStorage.setItem("rutaEdicionTicket", ruta);
    swal({
        title: '¿Está seguro de cerrar el ticket?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, cerrar!',
    }).then(function(result) {
        if (result.value) {
             var url = "https://sanfranciscodekkerlab.com/crm/apiTickets.php?callback=?";
            
            var dataString = "serieFactura=" + serieFactura + "&folioFactura=" + folioFactura + "&motivoCancelacion=" + motivoCancelacion + "&cancelarFacturaVenta=";
            $.ajax({
              type: "POST",
              url: url,
              data: dataString,
              crossDomain: true,
              cache: false,
              success: function(data) {
                if (data != "failed") {
                  
                  window.location = rutaFinal + "&idNumeroTicket=" + idNumeroTicket;

                }else{
                  
                  window.location = rutaFinal + "&idNumeroTicket=" + idNumeroTicket;

                }
              }
            });

            
        } else {
            swal("Error!", 'Opps estuvo apunto de cerrar el ticket', "error");
        }
    })
});
/*=============================================
CERRAR TICKET
=============================================*/
$(".btnRespuestaTicket").click(function() {
    var ruta = $(this).attr("urlTicket");

    var rutaFinal = ruta;
    localStorage.setItem("rutaEdicionTicket", ruta);
});
$(".btnAprobarTicket").click(function() {
    var ruta = $(this).attr("urlTicket");

    var rutaFinal = ruta;
    localStorage.setItem("rutaEdicionTicket", ruta);
});
$(".btnCancelarTicket").click(function() {
    var ruta = $(this).attr("urlTicket");

    var rutaFinal = ruta;
    localStorage.setItem("rutaEdicionTicket", ruta);
});
/*=============================================
ASIGNAR DATOS DE PEDIDO A TICKET
=============================================*/
$(".tablaEstatus").on("click", ".btnCrearTicket", function() {
    var serie = $(this).attr("serie");
    var folio = $(this).attr("folio");
    var serieFactura = $(this).attr("serieFactura");
    var folioFactura = $(this).attr("folioFactura");
    document.location.href = 'generadorTickets?serie=' + serie + '&folio=' + folio + '&serieFactura=' + serieFactura + '&folioFactura=' + folioFactura;
});
$(".tablaEstatusOrdenes").on("click", ".btnCrearTicket", function() {
    var serie = $(this).attr("serie");
    var folio = $(this).attr("folio");
    var serieFactura = $(this).attr("serieFactura");
    var folioFactura = $(this).attr("folioFactura");
    document.location.href = 'generadorTickets?serie=' + serie + '&folio=' + folio + '&serieFactura=' + serieFactura + '&folioFactura=' + folioFactura;
});
/**ELEGIR AL USUARIO DEL DEPARTAMENTO**/
$.ajax({
    type: "POST",
    url: "ajax/procesarUsuariosTickets.ajax.php",
    data: {
        departamentos: "Departamento"
    }
}).done(function(data) {
    $("#crearDepartamento").html(data);
});
// Obtener usuario
$("#crearDepartamento").change(function() {
    var departamento = $("#crearDepartamento option:selected").val();
    $.ajax({
        type: "POST",
        url: "ajax/procesarUsuariosTickets.ajax.php",
        data: {
            usuarios: departamento
        }
    }).done(function(data) {
        $("#crearDepartamentoUsuario").html(data);
    });
});
/**ELEGIR AL USUARIO DEL DEPARTAMENTO**/
$.ajax({
    type: "POST",
    url: "ajax/procesarUsuariosTickets.ajax.php",
    data: {
        departamentos: "Departamento"
    }
}).done(function(data) {
    $("#reasignarDepartamento").html(data);
});
// Obtener usuario
$("#reasignarDepartamento").change(function() {
    var departamento = $("#reasignarDepartamento option:selected").val();
    $.ajax({
        type: "POST",
        url: "ajax/procesarUsuariosTickets.ajax.php",
        data: {
            usuarios: departamento
        }
    }).done(function(data) {
        $("#reasignarDepartamentoUsuario").html(data);
    });
});
$(document).ready(function() {
    function load_unseen_notification(view = '') {
        $.ajax({
            url: "vistas/modulos/cabezote/listarNotificaciones.php",
            method: "POST",
            data: {
                view: view
            },
            dataType: "json",
            success: function(data) {
                $('#dropdown-menu2').html(data.notification);
                if (data.unseen_notification > 0) {
                    $('.count').html(data.unseen_notification);
                } else if (data.unseen_notification == 0) {
                    $('.count').html(data.unseen_notification);
                }
            }
        });
    }
    load_unseen_notification();
    $('#comment_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#subject').val() != '' && $('#comment').val() != '') {
            var form_data = $(this).serialize();
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: form_data,
                success: function(data) {
                    $('#comment_form')[0].reset();
                    load_unseen_notification();
                }
            });
        } else {
            alert('Campos Obligatorios');
        }
    });
    $(document).on('click', '.notifyId', function() {
        var id = $(this).attr('id');
        load_unseen_notification(id);
    });
    setInterval(function() {
        load_unseen_notification();;
    }, 5000);
});
//MOSTRAR QUE EL TICKET HA SIDO VISTO POR EL USUARIO
$(".tablaListaTickets").on("click", ".btnVisto", function() {
    var idVistoTicket = $(this).attr("idVisto");
    var visto = $(this).attr("visto");
    var folioTicket = $(this).attr("folioTicket");
    var autorTicket = $(this).attr("autorTicket");
    var datos = new FormData();
    datos.append("statusVisto", visto);
    datos.append("activarIdVisto", idVistoTicket);
    datos.append("folioTicket", folioTicket);
    datos.append("autorTicket", autorTicket);
    $.ajax({
        url: "ajax/tickets.ajax.php",
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
        $(this).html('<i class="fa fa-check"></i>');
        $(this).attr('visto', 1);
    } else {
        $(this).addClass('btn-info');
        $(this).removeClass('btn-warning');
        $(this).html('<i class="fa fa-check"></i>');
        $(this).attr('visto', 0);
    }
});
$(".tablaListaTickets").on("click", ".verDetalleTicketBtn", function() {
    var idB= $(this).attr('idB');
    localStorage.setItem("idTicketE", idB);
    

});
$(".btnVerTicketsPendientes").click(function(){

    var idDepartamentoTicket = $(this).attr("idDepartamento");
   
    var datos = new FormData();
    datos.append("idDepartamentoTicket",idDepartamentoTicket);

    $.ajax({

    url:"ajax/tickets.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
            
            


            var listaCabeceras = ['Usuario','Tickets Pendientes'];

            body = document.getElementById("tablaTicketsPendientes");

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

            var arregloDatos = ['usuario','total'];

            // Crea las celdas
            for (var i = 0; i < respuesta.length; i++) {
              // Crea las hileras de la tabla
              var hilera = document.createElement("tr");
           
              for (var j = 0; j < arregloDatos.length; j++) {
               

                var celda = document.createElement("td");
                var textoCelda = document.createTextNode(respuesta[i][arregloDatos[j]]);
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
 $(".btnCerrarListaTicketsPendientes").on("click", function() {

        var nodos = document.getElementById('tablaTicketsPendientes');
        while (nodos.firstChild) {
          nodos.removeChild(nodos.firstChild);
        }
});
