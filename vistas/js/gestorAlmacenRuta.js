

/*=============================================
EDITAR ORDEN ALMACEN
=============================================*/
$(".tablaAlmacen").on("click", ".btnEditarOrdenAlmacen", function(){

    var idOrden= $(this).attr("idOrdenAlmacen");
    
    var datos = new FormData();
    datos.append("idOrden", idOrden);
  
    $.ajax({
  
      url:"ajax/almacenRuta.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){ 
        $("#otIdOrdenAlmacenEdit").val(respuesta["id"]);
        $("#otClienteEdit").val(respuesta["nombreCliente"]);
        $("#otSerieEdit").val(respuesta["serie"]);
        $("#otFolioEdit").val(respuesta["idPedido"]);
       
        $("#otNumeroPartidasEdit").val(respuesta["numeroPartidas"]);
        $("#otNumeroUnidadesEdit").val(respuesta["numeroUnidades"]);
        $("#otImporteTotalEdit").val(respuesta["importeTotal"]);
        $("#otFechaRecepcionEdit").val(respuesta["fechaRecepcion"]);
        $("#otFechaSuministroEdit").val(respuesta["fechaSuministro"]);
        $("#otFechaTerminoEdit").val(respuesta["fechaTermino"]);
        $("#otAlmacenEdit").val(respuesta["almacen"]);
        $("#otEstatusEdit").val(respuesta["status"]);
        $("#otSuministradoEdit").val(respuesta["suministrado"]);
        $("#otComentariosEdit").val(respuesta["comentarios"]);

        
      }
  
  
    })
  
  
  });
  /*=============================================
  HABILITAR FOLIO  DE ORDEN DE TRABAJO
  =============================================*/
  $(".tablaAlmacen").on("click", ".btnHabilitarFolio", function(){

    var idOrden4 = $(this).attr("idOrden3");
    var estadoOrden= $(this).attr("estadoOrden");

    var datos = new FormData();
    datos.append("activarId", idOrden4);
      datos.append("activarOrden", estadoOrden);

      $.ajax({

      url:"ajax/almacenRuta.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
          console.log("respuesta", respuesta);
        }

      })

      if(estadoOrden== 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>Deshabilitado');
        $(this).attr('estadoOrden',1);

      }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('<i class="fa fa-power-off"></i>Habilitado');
        $(this).attr('estadoOrden',0);

      }

  })
  /*=============================================
  VER LA LISTA DE TRASPASOS
  =============================================*/
  $(".tablaAlmacen").on("click", ".btnVerOrdenes", function(){

    var serieOrden = $(this).attr("serieOrden");
    var folioOrden = $(this).attr("folioOrden");

    var datos = new FormData();
    datos.append("serieOrden", serieOrden);
    datos.append("folioOrden", folioOrden);

      $.ajax({

        url:"ajax/almacenRuta.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){


                var detalle = document.getElementById("detalleTraspasos")
            

                var listaCabeceras = ['Serie','Folio','Estatus','Unidades','Partidas','Total','Alm Origen','Alm Destino','Fecha'];

                body = document.getElementById("tablaDetalleTraspasos");

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

                var arregloNombres = ['serieTraspaso','folioTraspaso','cancelado','unidadesTraspaso','partidasTraspaso','totalTraspaso','almacenOrigen','almacenDestino','fechaTraspaso'];

                // Crea las celdas
                for (var i = 0; i < respuesta.length; i++) {
                  // Crea las hileras de la tabla
                  var hilera = document.createElement("tr");
               
                  for (var j = 0; j < arregloNombres.length; j++) {
                   

                    var celda = document.createElement("td");

                    const button = document.createElement('button'); 
                    button.type = 'button'; 

                    if (arregloNombres[j] == 'cancelado' && respuesta[i][arregloNombres[j]] == 0) {

                      button.className = 'btn btn-success';
                      button.innerText = 'Activo'; 
                      var textoCelda = button;

                    }else if (arregloNombres[j] == 'cancelado' && respuesta[i][arregloNombres[j]] == 1) {
                      button.className = 'btn btn-success';
                      button.innerText = 'Cancelado'; 
                      var textoCelda = button;
                    }
                    else{

                      var textoCelda = document.createTextNode(respuesta[i][arregloNombres[j]]);
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

  });
   $(".btnCerrarDesgloseTraspasos").on("click", function() {

        var nodos = document.getElementById('tablaDetalleTraspasos');
        while (nodos.firstChild) {
          nodos.removeChild(nodos.firstChild);
        }
});