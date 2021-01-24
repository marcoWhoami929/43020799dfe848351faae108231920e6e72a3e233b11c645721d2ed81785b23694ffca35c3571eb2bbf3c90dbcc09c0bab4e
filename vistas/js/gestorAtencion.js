

/*=============================================
CARGAR LA TABLA DINÁMICA DE ATENCION A CLIENTES
=============================================*/

 tablaAtencion = $(".tablaAtencion").DataTable({
   "ajax":"ajax/tablaAtencion.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "fixedHeader": true,
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

/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablaAtencion").on("click", ".btnEditarPedido", function(){

  var idPedido = $(this).attr("idPedido");
  
  var datos = new FormData();
  datos.append("idPedido", idPedido);

  $.ajax({

    url:"ajax/atencion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idPedido").val(respuesta["id"]);
      
      $("#editarCodigoCliente").val(respuesta["codigoCliente"]);
      $("#editarNombreCliente").val(respuesta["nombreCliente"]);
      var nombreCliente = $("#editarNombreCliente").val(respuesta["nombreCliente"]);

      if(nombreCliente.val() == "FLEX FINISHES MEXICO, S.A. DE C.V." || nombreCliente.val() == "PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V."){

           $("#editarCreado").val("Miguel Gutierrez");
           $("#editarTipoPago").val("Crédito");
           $("#editarMetodoPago").val("Pago en parcialidades");
           $("#editarFormaPago").val("99");
           $("#editarTipoRuta").val("Mostrador");

      }else {
          $("#editarCreado").val(respuesta["creado"]);
          $("#editarTipoPago").val(respuesta["tipoPago"]);
          $("#editarMetodoPago").val(respuesta["metodoPago"]);
          $("#editarFormaPago").val(respuesta["formaPago"]);
          $("#editarTipoRuta").val(respuesta["tipoRuta"]);
      }

      $("#editarCanal").val(respuesta["canal"]);
      $("#editarRfc").val(respuesta["rfc"]);
      $("#editarAgenteVentas").val(respuesta["agenteVentas"]);
      $("#editarDiasCredito").val(respuesta["diasCredito"]);
      var statusCliente = $("#editarStatusCliente").val(respuesta["statusCliente"]);

      if (statusCliente.val() == "1") {

        $("#editarStatusCliente").val("activado");
      }else {
        $("#editarStatusCliente").val("activado");
      }
      $("#editarSerie").val(respuesta["serie"]);
      $("#editarFolio").val(respuesta["folio"]);
     
      $("#editarOrdenCompra").val(respuesta["ordenCompra"]);
      $("#editarNumeroPartidas").val(respuesta["numeroPartidas"]);
      $("#editarNumeroUnidades").val(respuesta["numeroUnidades"]);
      $("#editarImporte").val(respuesta["importe"]);
      $("#editarFechaRecepcion").val(respuesta["fechaRecepcion"]);
      $("#editarFechaElaboracion").val(respuesta["fechaElaboracion"]);
      $("#tieneIgualado").val(respuesta["tieneIgualado"]);
      //$("#editarTipoCompra").val(respuesta["tipoCompra"]);
      $("#editarObservaciones").val(respuesta["observaciones"]);
      $("#editarObservaciones2").val(respuesta["observaciones2"]);
      $("#editarAsignacion").val(respuesta["asignacion1"]);
      $("#editarAsignacion2").val(respuesta["asignacion2"]);
    }


  })


});
/*=============================================
CANCELACION
=============================================*/
$(".tablaAtencion").on("click", ".Cancelado", function(){

  var idPedido2 = $(this).attr("idPedido2");
  
  var datos = new FormData();
  datos.append("idPedido2", idPedido2);

  $.ajax({

    url:"ajax/atencion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idPedido").val(respuesta["id"]);
      $("#verCancelacion").val(respuesta["motivoCancelacion"]);
    }


  })


})

/*=============================================
CANCELAR PEDIDO
=============================================*/
$(".tablaAtencion").on("click", ".btnEliminarPedidos", function(){

  var idPedido = $(this).attr("idPedido");
  var folio = $(this).attr("folio");
  var serie = $(this).attr("serie");

  swal({
    title: '¿Está seguro de cancelar el pedido?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    input: 'textarea',
    inputPlaceholder: 'Ingrese el motivo de cancelación del pedido',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, cancelar pedido!',
      
  }).then(function(result){

    if(result.value){
      
      var motivo = result.value;
      window.location = "index.php?ruta=atencionClientes&idPedido="+idPedido+"&folio="+folio+"&motivo="+motivo+"&serie="+serie;

    }else {

      swal("Error!",'Opps estuvo apunto de cancelar el pedido', "error");
    }

  })

});

/*=============================================
HABILITAR FOLIO
=============================================*/
$(".tablaAtencion").on("click", ".btnHabilitarFolio", function(){

  var idPedido4 = $(this).attr("idPedido3");
  var estadoPedido= $(this).attr("estadoPedido");

  var datos = new FormData();
  datos.append("activarId", idPedido4);
    datos.append("activarPedido", estadoPedido);

    $.ajax({

    url:"ajax/atencion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
        console.log("respuesta", respuesta);
      }

    })

    if(estadoPedido== 0){

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
/**
 * NUEVAS FUNCIONES
 */
 function obtenerPedidosNuevos(empresa){

  return new Promise((resolve, reject) => {

      n =  new Date();
      y = n.getFullYear();
      m = n.getMonth() + 1;
      d = n.getDate();

      var fechaActual = y+"-"+m+"-"+d;

      var datos = new  FormData();

      datos.append('fechaActual',fechaActual);
      datos.append('empresa', empresa);

      $.ajax({
          url:"ajax/atencion.ajax.php",
          method:"POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          error: function(XMLHttpRequest, textStatus, errorThrown) { 
            
            if (textStatus == 'parsererror') {
            
              localStorage.setItem("pausado",0);
              resolve(100);
            }

          },   
          success:function(respuesta){
             
            var json = JSON.stringify(respuesta);

             
              if (json === null) {

              }else{

                 var datosPedidos = new FormData();
                  datosPedidos.append('listaPedidos',json);
                  datosPedidos.append('empresaPedidos',empresa);


                  localStorage.setItem("pausado",1);
                   $.ajax({
                    url:"ajax/atencion.ajax.php",
                    method:"POST",
                    data: datosPedidos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success:function(respuesta){
                   
                         if (respuesta === "finalizado") {

                            if (empresa == "Flex") {
                               localStorage.setItem("pausado",0);
                            }

                            
                         }

                    }

                  })

              }
              

              
          }


        }).then(() => {
          
          resolve(100);
        })
         
      });
           
}
 function obtenerFacturasNuevas(empresa){

  return new Promise((resolve, reject) => {

  n =  new Date();
  //Año
  y = n.getFullYear();
//Mes
  m = n.getMonth() + 1;
//Día
  d = n.getDate();

  var fechaActual = y+"-"+m+"-"+d;
  //var fechaActual = "2020-11-05";

  var datos = new  FormData();

  datos.append('fechaActualFacturas',fechaActual);
  datos.append('empresaFacturas', empresa);

  $.ajax({
      url:"ajax/atencion.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
            
            if (textStatus == 'parsererror') {
            
              localStorage.setItem("pausadoFacturas",0);
              resolve(100);
            }

      }, 
      success:function(respuesta){
        var json = JSON.stringify(respuesta);
         
          if (json === null) {

             

          }else{

              var datosFacturas = new FormData();
              datosFacturas.append('listaFacturas',json);
              datosFacturas.append('empresaListaFacturas',empresa);
              localStorage.setItem("pausadoFacturas",1);
               $.ajax({
                url:"ajax/atencion.ajax.php",
                method:"POST",
                data: datosFacturas,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:function(respuesta){
               
                     if (respuesta === "finalizado") {

                          if (empresa == "Flex") {
                               localStorage.setItem("pausadoFacturas",0);
                            }
                     }else{

                        
                     }
                    
                }

          })
      
         


          }
          

          
      }


    }).then(() => {
          
          resolve(100);
        })

  });
              
}
/***OBTENER TRASPASOS*/
function obtenerTraspasos(empresa){

return new Promise((resolve, reject) => {
  n =  new Date();
  //Año
  y = n.getFullYear();
//Mes
  m = n.getMonth() + 1;
//Día
  d = n.getDate();

  var fechaActual = y+"-"+m+"-"+d;
  //var fechaActual = "2020-11-05";

  var datos = new  FormData();

  datos.append('fechaActualOrdenes',fechaActual);
  datos.append('empresaOrdenes', empresa);

  $.ajax({
      url:"ajax/atencion.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
            
            if (textStatus == 'parsererror') {
            
              localStorage.setItem("pausadoAlmacen",0);
              resolve(100);
            }

      }, 
      success:function(respuesta){
        var json = JSON.stringify(respuesta);
         
          if (json === null) {


          }else{

              var datosTraspasos = new FormData();
              datosTraspasos.append('listaTraspasos',json);
              datosTraspasos.append('empresaTraspasos',empresa);

              localStorage.setItem("pausadoAlmacen",1);
               $.ajax({
                url:"ajax/atencion.ajax.php",
                method:"POST",
                data: datosTraspasos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:function(respuesta){
               
                     if (respuesta === "finalizado") {

                           if (empresa == "Flex") {
                               localStorage.setItem("pausadoAlmacen",0);
                            }
                         

                     }else{

                      
                     }
 
                }

          })
      
         


          }
          

          
      }


    }).then(() => {
          
          resolve(100);
        })
  });
              
}
/***OBTENER TRASPASOS*/
/***OBTENER COMPRAS*/
function obtenerCompras(empresa){

return new Promise((resolve, reject) => {
  n =  new Date();
  //Año
  y = n.getFullYear();
//Mes
  m = n.getMonth() + 1;
//Día
  d = n.getDate();

  var fechaActual = y+"-"+m+"-"+d;
  //var fechaActual = "2020-11-05";

  var datos = new  FormData();

  datos.append('fechaActualCompras',fechaActual);
  datos.append('empresaCompras',empresa);

  $.ajax({
      url:"ajax/atencion.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
            
            if (textStatus == 'parsererror') {
            
              localStorage.setItem("pausadoCompras",0);
              resolve(100);
            }

      }, 
      success:function(respuesta){
        var json = JSON.stringify(respuesta);
         
          if (json === null) {


          }else{

              var datosCompras = new FormData();
              datosCompras.append('listaCompras',json);
              datosCompras.append('empresaListaCompras',empresa);

              localStorage.setItem("pausadoCompras",1);
               $.ajax({
                url:"ajax/atencion.ajax.php",
                method:"POST",
                data: datosCompras,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:function(respuesta){
               
                     if (respuesta === "finalizado") {

                        if (empresa == "Flex") {
                          
                          localStorage.setItem("pausadoCompras",0);
                        }
                         

                     }else{

                      
                     }
 
                }

          })
      
         


          }
          

          
      }


    }).then(() => {
          
          resolve(100);
        })

  });
              
}
/***OBTENER COMPRAS*/
$("#updatePedidos").on("click",function(){
  tablaAtencion.ajax.reload();
})

$("#btnEstatusOrdenes").on("click",function(){

 window.location.href = "http://dkmatrizz.ddns.net/estatusRuta";

});
$("#btnEstatusPedidos").on("click",function(){

 window.location.href = "http://dkmatrizz.ddns.net/estatusPedidos";

});
/*=============================================
OBTENER DETALLES DEL ESTATUS DEL CLIENTE
=============================================*/
$(".tablaAtencion").on("click", ".btnDetailClient", function(){

  var codigoCliente = $(this).attr("codigoCliente");
  var catalogo = $(this).attr("catalogo");
  var idClienteComercial = $(this).attr("idClienteComercial");

  var datos = new FormData();
  datos.append("codigoCliente", codigoCliente);
  datos.append("catalogo", catalogo);
  datos.append("idClienteComercial", idClienteComercial);

  
  $.ajax({

    url:"ajax/atencion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
      success: function(respuesta){ 

          var detalle = document.getElementById("detailClient")
            

                var listaCabeceras = ['Días Crédito','Límite de Crédito','Saldo Vencido','Límite de Doctos Vencidos','Documentos Vencidos','Estatus'];

                body = document.getElementById("tablaDetailClient");

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

                var arregloNombres = ['diasCredito','limiteCredito','saldoVencido','limDoctosVenc','documentosVencidos','statusCliente'];

                // Crea las celdas
                for (var i = 0; i < 1; i++) {
                  // Crea las hileras de la tabla
                  var hilera = document.createElement("tr");
               
                  for (var j = 0; j < arregloNombres.length; j++) {
                   

                    var celda = document.createElement("td");

                    const button = document.createElement('button'); 
                    button.type = 'button'; 

                    if (arregloNombres[j] == 'statusCliente' && respuesta[arregloNombres[j]] == 0) {

                      button.className = 'btn btn-danger';
                      button.innerText = 'Inactivo'; 
                      var textoCelda = button;

                    }else if (arregloNombres[j] == 'statusCliente' && respuesta[arregloNombres[j]] == 1) {
                      button.className = 'btn btn-success';
                      button.innerText = 'Activo'; 
                      var textoCelda = button;
                    }
                    else{
                      if (arregloNombres[j] == 'limiteCredito' || arregloNombres[j] == 'saldoVencido') {

                        var textoCelda = document.createTextNode("$"+respuesta[arregloNombres[j]]);
                      

                      }else{

                        var textoCelda = document.createTextNode(respuesta[arregloNombres[j]]);

                      }

                      
                    }
                    
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
    

})
  $(".btnCerrarDetailClient").on("click", function() {

        var nodos = document.getElementById('tablaDetailClient');
        while (nodos.firstChild) {
          nodos.removeChild(nodos.firstChild);
        }
        tablaAtencion.ajax.reload();
});