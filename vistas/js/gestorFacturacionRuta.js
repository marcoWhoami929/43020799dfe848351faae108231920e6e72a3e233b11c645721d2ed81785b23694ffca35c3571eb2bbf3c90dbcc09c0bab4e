/*=============================================
CARGAR LA TABLA DINÁMICA DE ORDENES DE TRABAJO DE FACTURACION
=============================================*/

var tablaFacturacionRuta = $(".tablaFacturacionRuta").DataTable({
    "ajax":"ajax/tablaFacturacionRuta.ajax.php",
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
 /*setInterval( function () {
    tablaFacturacionRuta.ajax.reload( null, false ); // user paging is not reset on reload
}, 10000);*/
/*=============================================
EDITAR ORDEN FACTURACION
=============================================*/
$(".tablaFacturacionRuta").on("click", ".btnEditarOrdenFacturacion", function(){

    var idOrden= $(this).attr("idOrdenFacturacion");
    var folioOrd= $(this).attr("folioOrdenFacturacion");
    
    var datos = new FormData();
    datos.append("idOrden", idOrden);
    datos.append("folioOrd", folioOrd);
  
    $.ajax({
  
      url:"ajax/facturacionRuta.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){ 
        
        $("#otIdOrdenFacturacionEdit").val(respuesta["id"]);
        $("#otSerieEdit").val(respuesta["serie"]);
        $("#otFolioEdit").val(respuesta["folio"]);
        var serieFactura = respuesta["serieFactura"];
        var folioFactura = respuesta["folioFactura"];
        var folio1 = respuesta["folio"];
        var serie1 = respuesta["serie"]; 

        if(serieFactura == null){
            $("#otSerieFacturaEdit1").val("FACD");
        }else{

            $("#otSerieFacturaEdit1").val(respuesta["serieFactura"]);

        }

        $("#btnDeleteFactura1").attr({"serieFactura":serieFactura, "folioFactura":folioFactura, "folio":folio1, "serie":serie1});
        $("#btnDeleteFactura1").click(function(){
          var editSerie = $("#btnDeleteFactura1").attr("serieFactura");
          var editFolio = $("#btnDeleteFactura1").attr("folioFactura");
          var eliminarSeccion = $("#btnDeleteFactura1").attr("folio");
          var actualizarNuFactura = $("#btnDeleteFactura1").attr("folio");
          var eliminarSeccionS = $("#btnDeleteFactura1").attr("serie");
                      
          var datFacturas = new FormData();
          datFacturas.append("editSerie", editSerie);
          datFacturas.append("editFolio", editFolio);
          datFacturas.append("eliminarSeccion", eliminarSeccion);
          datFacturas.append("actualizarNuFactura", actualizarNuFactura);
          datFacturas.append("eliminarSeccionS", eliminarSeccionS);

          $.ajax({
            url: "ajax/facturacionRuta.ajax.php",
            method: "POST",
            data: datFacturas,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                //console.log("respuesta", respuesta);
                var response = respuesta;
                var resp = response.replace(/['"]+/g, '');
                
                if (resp == 'ok') {
                  div2 = document.getElementById("1F");
                  div2.style.display = "none";
                }
            }
          })
        });


        var folioFactura = respuesta["folioFactura"];
        if(folioFactura == null){
            $("#otFolioFacturaEdit1").val("");
        }else{
            $("#otFolioFacturaEdit1").val(respuesta["folioFactura"]);
        }
        var estatusFactura = respuesta["estatusFactura"];
        if(estatusFactura == "0"){
            $("#otEstatusEdit").val("1");
        }else{
            $("#otEstatusEdit").val("1");
        }

        $("#otPartidasTotalesEdit").val(respuesta["partidasTotales"]);
        $("#otUnidadesTotalesEdit").val(respuesta["unidadesTotales"]);
        $("#otImporteInicialEdit").val(respuesta["importeTotal"]);
        var folio = respuesta["folio"];
        var serie2 = respuesta["serie"];
        var folioOrden = new FormData();
        folioOrden.append("folioOrden", folio);
        $.ajax({
                url:"ajax/facturacionRuta.ajax.php",
                method: "POST",
                data:  folioOrden,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:  function (response) {
                  var serieFactura2 = response["serie"];
                  var folioFactura2 = response["folio"];

                  if(serieFactura2 == ""){
                      $("#otSerieFacturaEdit2").val("");
                  }else{
                      $("#otSerieFacturaEdit2").val(response["serie"]);
                  }

                  $("#btnDeleteFactura2").attr({"serieFactura":serieFactura2, "folioFactura":folioFactura2, "folio":folio, "serie":serie2});
  
                    $("#btnDeleteFactura2").click(function(){
                      var editSerie = $("#btnDeleteFactura2").attr("serieFactura");
                      var editFolio = $("#btnDeleteFactura2").attr("folioFactura");
                      var eliminarSeccion = $("#btnDeleteFactura2").attr("folio");
                      var actualizarNuFactura = $("#btnDeleteFactura2").attr("folio");
                      var eliminarSeccionS = $("#btnDeleteFactura2").attr("serie");
                      
                      var datFacturas = new FormData();
                      datFacturas.append("editSerie", editSerie);
                      datFacturas.append("editFolio", editFolio);
                      datFacturas.append("eliminarSeccion", eliminarSeccion);
                      datFacturas.append("actualizarNuFactura", actualizarNuFactura);
                      datFacturas.append("eliminarSeccionS", eliminarSeccionS);

                      $.ajax({
                        url: "ajax/facturacionRuta.ajax.php",
                        method: "POST",
                        data: datFacturas,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log("respuesta", respuesta);
                            var response = respuesta;
                            var resp = response.replace(/['"]+/g, '');
                           
                            if (resp == 'ok') {
                              div2 = document.getElementById("2F");
                              div2.style.display = "none";
                            }
                        }
                      })
                    });

                  var folioFactura2 = response["folio"];
                  if(folioFactura2 == ""){
                      $("#otFolioFacturaEdit2").val("");
                  }else{
                      $("#otFolioFacturaEdit2").val(response["folio"]);
                  }
                  
                  $("#otImporteFacturaEdit2").val(response["importeFactura"]);
                  $("#otPartidasSurtidasEdit2").val(response["numeroPartidas"]);
                  $("#otUnidadesSurtidasEdit2").val(response["numeroUnidades"]);

                      
                }
        });
        var folio3 = respuesta["folio"];
        var serie3 = respuesta["serie"];
        var folioOrden3 = new FormData();
        folioOrden3.append("folioOrden3", folio3);
        $.ajax({
                url:"ajax/facturacionRuta.ajax.php",
                method: "POST",
                data:  folioOrden3,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:  function (response) {
                  var serieFactura3 = response["serie"];
                  var folioFactura3 = response["folio"];
                  if(serieFactura3 == ""){
                      $("#otSerieFacturaEdit3").val("");
                  }else{
                      $("#otSerieFacturaEdit3").val(response["serie"]);
                  }

                  $("#btnDeleteFactura3").attr({"serieFactura":serieFactura3, "folioFactura":folioFactura3, "folio":folio3, "serie":serie3});
  
                    $("#btnDeleteFactura3").click(function(){
                      var editSerie = $("#btnDeleteFactura3").attr("serieFactura");
                      var editFolio = $("#btnDeleteFactura3").attr("folioFactura");
                      var eliminarSeccion = $("#btnDeleteFactura3").attr("folio");
                      var actualizarNuFactura = $("#btnDeleteFactura3").attr("folio");
                      var eliminarSeccionS = $("#btnDeleteFactura3").attr("serie");
                      
                      var datFacturas = new FormData();
                      datFacturas.append("editSerie", editSerie);
                      datFacturas.append("editFolio", editFolio);
                      datFacturas.append("eliminarSeccion", eliminarSeccion);
                      datFacturas.append("actualizarNuFactura", actualizarNuFactura);
                      datFacturas.append("eliminarSeccionS", eliminarSeccionS);

                      $.ajax({
                        url: "ajax/facturacionRuta.ajax.php",
                        method: "POST",
                        data: datFacturas,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log("respuesta", respuesta);
                            var response = respuesta;
                            var resp = response.replace(/['"]+/g, '');
                            
                            if (resp == 'ok') {
                              div2 = document.getElementById("3F");
                              div2.style.display = "none";
                            }
                        }
                      })
                    });

                  var folioFactura3 = response["folio"];
                  if(folioFactura3 == ""){
                      $("#otFolioFacturaEdit3").val("");
                  }else{
                      $("#otFolioFacturaEdit3").val(response["folio"]);
                  }
                  $("#otImporteFacturaEdit3").val(response["importeFactura"]);
                  $("#otPartidasSurtidasEdit3").val(response["numeroPartidas"]);
                  $("#otUnidadesSurtidasEdit3").val(response["numeroUnidades"]);

                      
                }
        });
        var folio4 = respuesta["folio"];
        var serie4 = respuesta["serie"];
        var folioOrden4 = new FormData();
        folioOrden4.append("folioOrden4", folio4);
        $.ajax({
                url:"ajax/facturacionRuta.ajax.php",
                method: "POST",
                data:  folioOrden4,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:  function (response) {
                  var serieFactura4 = response["serie"];
                  var folioFactura4 = response["folio"];
                  if(serieFactura4 == ""){
                      $("#otSerieFacturaEdit4").val("");
                  }else{
                      $("#otSerieFacturaEdit4").val(response["serie"]);
                  }

                  $("#btnDeleteFactura4").attr({"serieFactura":serieFactura4, "folioFactura":folioFactura4, "folio":folio4, "serie":serie4});
  
                    $("#btnDeleteFactura4").click(function(){
                      var editSerie = $("#btnDeleteFactura4").attr("serieFactura");
                      var editFolio = $("#btnDeleteFactura4").attr("folioFactura");
                      var eliminarSeccion = $("#btnDeleteFactura4").attr("folio");
                      var actualizarNuFactura = $("#btnDeleteFactura4").attr("folio");
                      var eliminarSeccionS = $("#btnDeleteFactura4").attr("serie");
                      
                      var datFacturas = new FormData();
                      datFacturas.append("editSerie", editSerie);
                      datFacturas.append("editFolio", editFolio);
                      datFacturas.append("eliminarSeccion", eliminarSeccion);
                      datFacturas.append("actualizarNuFactura", actualizarNuFactura);
                      datFacturas.append("eliminarSeccionS", eliminarSeccionS);

                      $.ajax({
                        url: "ajax/facturacionRuta.ajax.php",
                        method: "POST",
                        data: datFacturas,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log("respuesta", respuesta);
                            var response = respuesta;
                            var resp = response.replace(/['"]+/g, '');
                           
                            if (resp == 'ok') {
                              div2 = document.getElementById("4F");
                              div2.style.display = "none";
                            }
                        }
                      })
                    });

                    console.log(response);

                  
                  if(folioFactura4 == ""){
                      $("#otFolioFacturaEdit4").val("");
                  }else{
                      $("#otFolioFacturaEdit4").val(response["folio"]);
                  }
                  $("#otImporteFacturaEdit4").val(response["importeFactura"]);
                  $("#otPartidasSurtidasEdit4").val(response["numeroPartidas"]);
                  $("#otUnidadesSurtidasEdit4").val(response["numeroUnidades"]);

                      
                }
        });
        var folio5 = respuesta["folio"];
        var serie5 = respuesta["serie"];
        var folioOrden5 = new FormData();
        folioOrden5.append("folioOrden5", folio5);
        $.ajax({
                url:"ajax/facturacionRuta.ajax.php",
                method: "POST",
                data:  folioOrden5,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:  function (response) {
                  var serieFactura5 = response["serie"];
                  var folioFactura5 = response["folio"];
                  if(serieFactura5 == ""){
                      $("#otSerieFacturaEdit5").val("");
                  }else{
                      $("#otSerieFacturaEdit5").val(respuesta["serieFactura"]);
                  }

                  $("#btnDeleteFactura5").attr({"serieFactura":serieFactura5, "folioFactura":folioFactura5, "folio":folio5, "serie":serie5});
  
                    $("#btnDeleteFactura5").click(function(){
                      var editSerie = $("#btnDeleteFactura5").attr("serieFactura");
                      var editFolio = $("#btnDeleteFactura5").attr("folioFactura");
                      var eliminarSeccion = $("#btnDeleteFactura5").attr("folio");
                      var actualizarNuFactura = $("#btnDeleteFactura5").attr("folio");
                      var eliminarSeccionS = $("#btnDeleteFactura5").attr("serie");
                      
                      var datFacturas = new FormData();
                      datFacturas.append("editSerie", editSerie);
                      datFacturas.append("editFolio", editFolio);
                      datFacturas.append("eliminarSeccion", eliminarSeccion);
                      datFacturas.append("actualizarNuFactura", actualizarNuFactura);
                      datFacturas.append("eliminarSeccionS", eliminarSeccionS);

                      $.ajax({
                        url: "ajax/facturacionRuta.ajax.php",
                        method: "POST",
                        data: datFacturas,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log("respuesta", respuesta);
                            var response = respuesta;
                            var resp = response.replace(/['"]+/g, '');
                            
                            if (resp == 'ok') {
                              div2 = document.getElementById("5F");
                              div2.style.display = "none";
                            }
                        }
                      })
                    });

                  if(folioFactura5 == ""){
                      $("#otFolioFacturaEdit5").val("");
                  }else{
                      $("#otFolioFacturaEdit5").val(response["folio"]);
                  }
                  $("#otImporteFacturaEdit5").val(response["importeFactura"]);
                  $("#otPartidasSurtidasEdit5").val(response["numeroPartidas"]);
                  $("#otUnidadesSurtidasEdit5").val(response["numeroUnidades"]);

                      
                }
        });
        var folio6 = respuesta["folio"];
        var serie6 = respuesta["serie"];
        var folioOrden6 = new FormData();
        folioOrden6.append("folioOrden6", folio6);
        $.ajax({
                url:"ajax/facturacionRuta.ajax.php",
                method: "POST",
                data:  folioOrden6,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:  function (response) {
                  var serieFactura6 = response["serie"];
                  var folioFactura6 = response["folio"];
                  if(serieFactura6 == ""){
                      $("#otSerieFacturaEdit6").val("");
                  }else{
                      $("#otSerieFacturaEdit6").val(respuesta["serie"]);
                  }

                  $("#btnDeleteFactura6").attr({"serieFactura":serieFactura6, "folioFactura":folioFactura6, "folio":folio6, "serie":serie6});
  
                    $("#btnDeleteFactura6").click(function(){
                      var editSerie = $("#btnDeleteFactura6").attr("serieFactura");
                      var editFolio = $("#btnDeleteFactura6").attr("folioFactura");
                      var eliminarSeccion = $("#btnDeleteFactura6").attr("folio");
                      var actualizarNuFactura = $("#btnDeleteFactura6").attr("folio");
                      var eliminarSeccionS = $("#btnDeleteFactura6").attr("serie");
                      
                      var datFacturas = new FormData();
                      datFacturas.append("editSerie", editSerie);
                      datFacturas.append("editFolio", editFolio);
                      datFacturas.append("eliminarSeccion", eliminarSeccion);
                      datFacturas.append("actualizarNuFactura", actualizarNuFactura);
                      datFacturas.append("eliminarSeccionS", eliminarSeccionS);

                      $.ajax({
                        url: "ajax/facturacionRuta.ajax.php",
                        method: "POST",
                        data: datFacturas,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log("respuesta", respuesta);
                            var response = respuesta;
                            var resp = response.replace(/['"]+/g, '');
                            
                            if (resp == 'ok') {
                              div2 = document.getElementById("6F");
                              div2.style.display = "none";
                            }
                        }
                      })
                    });

                  if(folioFactura6 == ""){
                      $("#otFolioFacturaEdit6").val("");
                  }else{
                      $("#otFolioFacturaEdit6").val(response["folio"]);
                  }
                  $("#otImporteFacturaEdit6").val(response["importeFactura"]);
                  $("#otPartidasSurtidasEdit6").val(response["numeroPartidas"]);
                  $("#otUnidadesSurtidasEdit6").val(response["numeroUnidades"]);

                      
                }
        });
        var folio7 = respuesta["folio"];
        var serie7 = respuesta["serie"];
        var folioOrden7 = new FormData();
        folioOrden7.append("folioOrden7", folio7);
        $.ajax({
                url:"ajax/facturacionRuta.ajax.php",
                method: "POST",
                data:  folioOrden7,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:  function (response) {
                  var serieFactura7 = response["serie"];
                  var folioFactura7 = response["folio"];
                  if(serieFactura7 == ""){
                      $("#otSerieFacturaEdit7").val("");
                  }else{
                      $("#otSerieFacturaEdit7").val(respuesta["serie"]);
                  }

                  $("#btnDeleteFactura7").attr({"serieFactura":serieFactura7, "folioFactura":folioFactura7, "folio":folio7, "serie":serie7});
  
                    $("#btnDeleteFactura7").click(function(){
                      var editSerie = $("#btnDeleteFactura7").attr("serieFactura");
                      var editFolio = $("#btnDeleteFactura7").attr("folioFactura");
                      var eliminarSeccion = $("#btnDeleteFactura7").attr("folio");
                      var actualizarNuFactura = $("#btnDeleteFactura7").attr("folio");
                      var eliminarSeccionS = $("#btnDeleteFactura7").attr("serie");
                      
                      var datFacturas = new FormData();
                      datFacturas.append("editSerie", editSerie);
                      datFacturas.append("editFolio", editFolio);
                      datFacturas.append("eliminarSeccion", eliminarSeccion);
                      datFacturas.append("actualizarNuFactura", actualizarNuFactura);
                      datFacturas.append("eliminarSeccionS", eliminarSeccionS);

                      $.ajax({
                        url: "ajax/facturacionRuta.ajax.php",
                        method: "POST",
                        data: datFacturas,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log("respuesta", respuesta);
                            var response = respuesta;
                            var resp = response.replace(/['"]+/g, '');
                            
                            if (resp == 'ok') {
                              div2 = document.getElementById("7F");
                              div2.style.display = "none";
                            }
                        }
                      })
                    });

                  if(folioFactura7 == ""){
                      $("#otFolioFacturaEdit7").val("");
                  }else{
                      $("#otFolioFacturaEdit7").val(response["folio"]);
                  }
                  $("#otImporteFacturaEdit7").val(response["importeFactura"]);
                  $("#otPartidasSurtidasEdit7").val(response["numeroPartidas"]);
                  $("#otUnidadesSurtidasEdit7").val(response["numeroUnidades"]);

                      
                }
        });

        var secciones = $("#otSeccionesEdit").val(respuesta["secciones"]);
        var nFacturas = $("#nFacturas").val(respuesta["secciones"]);
        
      if (secciones.val() == "0") {
          
           div1 = document.getElementById("1F");
           div1.style.display = "none";

           div2 = document.getElementById("2F");
           div2.style.display = "none";

           div3 = document.getElementById("3F");
           div3.style.display = "none";

           div4 = document.getElementById("4F");
           div4.style.display = "none";

           div5 = document.getElementById("5F");
           div5.style.display = "none";

           div6 = document.getElementById("6F");
           div6.style.display = "none";

           div7 = document.getElementById("7F");
           div7.style.display = "none";

      }else if (secciones.val() == "1") {
          
           div1 = document.getElementById("1F");
           div1.style.display = "";

           div2 = document.getElementById("2F");
           div2.style.display = "none";

           div3 = document.getElementById("3F");
           div3.style.display = "none";

           div4 = document.getElementById("4F");
           div4.style.display = "none";

           div5 = document.getElementById("5F");
           div5.style.display = "none";

           div6 = document.getElementById("6F");
           div6.style.display = "none";

           div7 = document.getElementById("7F");
           div7.style.display = "none";

      }else if (secciones.val() == "2") {         


           div1 = document.getElementById("1F");
           div1.style.display = "";

           div2 = document.getElementById("2F");
           div2.style.display = "";

           div3 = document.getElementById("3F");
           div3.style.display = "none";

           div4 = document.getElementById("4F");
           div4.style.display = "none";

           div5 = document.getElementById("5F");
           div5.style.display = "none";

           div6 = document.getElementById("6F");
           div6.style.display = "none";

           div7 = document.getElementById("7F");
           div7.style.display = "none";

        
      }else if (secciones.val() == "3") {
          
           div1 = document.getElementById("1F");
           div1.style.display = "";

           div2 = document.getElementById("2F");
           div2.style.display = "";

           div3 = document.getElementById("3F");
           div3.style.display = "";

           div4 = document.getElementById("4F");
           div4.style.display = "none";

           div5 = document.getElementById("5F");
           div5.style.display = "none";

           div6 = document.getElementById("6F");
           div6.style.display = "none";

           div7 = document.getElementById("7F");
           div7.style.display = "none";

      }else if (secciones.val() == "4") {
          
           div1 = document.getElementById("1F");
           div1.style.display = "";

           div2 = document.getElementById("2F");
           div2.style.display = "";

           div3 = document.getElementById("3F");
           div3.style.display = "";

           div4 = document.getElementById("4F");
           div4.style.display = "";

           div5 = document.getElementById("5F");
           div5.style.display = "none";

           div6 = document.getElementById("6F");
           div6.style.display = "none";

           div7 = document.getElementById("7F");
           div7.style.display = "none";

      }else if (secciones.val() == "5") {

           div1 = document.getElementById("1F");
           div1.style.display = "";

           div2 = document.getElementById("2F");
           div2.style.display = "";

           div3 = document.getElementById("3F");
           div3.style.display = "";

           div4 = document.getElementById("4F");
           div4.style.display = "";

           div5 = document.getElementById("5F");
           div5.style.display = "";

           div6 = document.getElementById("6F");
           div6.style.display = "none";

           div7 = document.getElementById("7F");
           div7.style.display = "none";

        
      }else if (secciones.val() == "6") {

           div1 = document.getElementById("1F");
           div1.style.display = "";

           div2 = document.getElementById("2F");
           div2.style.display = "";

           div3 = document.getElementById("3F");
           div3.style.display = "";

           div4 = document.getElementById("4F");
           div4.style.display = "";

           div5 = document.getElementById("5F");
           div5.style.display = "";

           div6 = document.getElementById("6F");
           div6.style.display = "";

           div7 = document.getElementById("7F");
           div7.style.display = "none";

        
      }else if (secciones.val() == "7") {

           div1 = document.getElementById("1F");
           div1.style.display = "";

           div2 = document.getElementById("2F");
           div2.style.display = "";

           div3 = document.getElementById("3F");
           div3.style.display = "";

           div4 = document.getElementById("4F");
           div4.style.display = "";

           div5 = document.getElementById("5F");
           div5.style.display = "";

           div6 = document.getElementById("6F");
           div6.style.display = "";

           div7 = document.getElementById("7F");
           div7.style.display = "";

        
      }

      $("#otImporteFacturaEdit1").val(respuesta["importeFactura"]);
      $("#otPartidasSurtidasEdit1").val(respuesta["numeroPartidas"]);
      $("#otUnidadesSurtidasEdit1").val(respuesta["numeroUnidades"]);
      $("#otAlmacenEdit").val(respuesta["almacen"]);
      if (respuesta["fechaRecepcion"] == "0000-00-00 00:00:00" && respuesta["fechaEntrega"] == "0000-00-00 00:00:00") {

        $("#otFechaRecepcionEdit").val(respuesta["fechaOrden"]);
        $("#otFechaEntregaEdit").val(respuesta["fechaImportacion"]);

      }else{


        $("#otFechaRecepcionEdit").val(respuesta["fechaRecepcion"]);
        $("#otFechaEntregaEdit").val(respuesta["fechaEntrega"]);


      }
      $("#otComentariosEdit").val(respuesta["comentarios"]);

        
      }
  
  
    })
  
  
  });
  /*=============================================
  HABILITAR FOLIO  DE ORDEN DE TRABAJO
  =============================================*/
  $(".tablaFacturacionRuta").on("click", ".btnHabilitarFolio", function(){

    var idOrden4 = $(this).attr("idOrdenFacturacion3");
    var estadoOrden= $(this).attr("estadoOrden");

    var datos = new FormData();
    datos.append("activarId", idOrden4);
    datos.append("activarOrden", estadoOrden);

      $.ajax({

      url:"ajax/facturacionRuta.ajax.php",
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
  VER LA LISTA DE FACTURAS
  =============================================*/
  $(".tablaFacturacionRuta").on("click", ".btnVerFacturas", function(){

    var idFacturasSec = $(this).attr("idFacturasSec");

    var datos = new FormData();
    datos.append("idFacturasSec", idFacturasSec);

      $.ajax({

        url:"ajax/facturacionRuta.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

          for (var i = 0; i < respuesta.length; i++) {
            var divTo = document.getElementById("totales");
            var saltoTo = document.createElement("P");
            while(divTo.firstChild)divTo.removeChild(divTo.firstChild);

            var palabraTotal = document.createElement("input");
            var totalPartidas = document.createElement("input");
            var totalUnidades = document.createElement("input");
            var totalImporte = document.createElement("input");

            palabraTotal.setAttribute("value", "Total de Documento:");
            totalPartidas.setAttribute("value", respuesta[0]["totalPart"]);
            totalUnidades.setAttribute("value", respuesta[0]["totalUnid"]);
            totalImporte.setAttribute("value", respuesta[0]["totalImport"]);

            palabraTotal.setAttribute("size", "25");
            palabraTotal.setAttribute("style", "background:transparent;text-align:right; font-weight: bold;font-family:Monaco,Georgia,Times,serif;border:none;");
            palabraTotal.className = "palabraTotal";
            palabraTotal.readOnly = true;

            totalPartidas.setAttribute("size", "8");
            totalPartidas.setAttribute("style","background: transparent;margin-left:2%;text-align: center;font-weight: bold;font-family:Monaco,Georgia,Times,serif;border:none;");
            totalPartidas.className = "totalPartidas";
            totalPartidas.readOnly = true;

            totalUnidades.setAttribute("size", "10");
            totalUnidades.setAttribute("style","background: transparent;margin-left:6%;text-align: center;font-weight: bold;font-family:Monaco,Georgia,Times,serif;border:none;");
            totalUnidades.className = "totalUnidades";
            totalUnidades.readOnly = true;

            totalImporte.setAttribute("size", "10");
            totalImporte.setAttribute("style","background: transparent;margin-left:1%;text-align: right;font-weight: bold;font-family:Monaco,Georgia,Times,serif;border:none;");
            totalImporte.className = "totalImporte";
            totalImporte.readOnly = true;

            saltoTo.appendChild(palabraTotal);
            saltoTo.appendChild(totalPartidas);
            saltoTo.appendChild(totalUnidades);
            saltoTo.appendChild(totalImporte);
            divTo.appendChild(saltoTo);
       
            var div = document.getElementById("datosConsulta");
            var cantidad = respuesta.length;

            while(div.firstChild)div.removeChild(div.firstChild); // remover elementos;
            for(var i = 0, cantidad = Number(cantidad); i <= cantidad; i++){
              var salto = document.createElement("P");
              var serieFactura = document.createElement("input");
              var folioFactura = document.createElement("input");
              var unidadesSurtidas = document.createElement("input");
              var partidasSurtidas = document.createElement("input");
              var importeFactura = document.createElement("input");

              var text = document.createTextNode( i);

              serieFactura.setAttribute("value", respuesta[i]["serie"]);
              folioFactura.setAttribute("value", respuesta[i]["folio"]);
              unidadesSurtidas.setAttribute("value", respuesta[i]["numeroPartidas"]);
              partidasSurtidas.setAttribute("value", respuesta[i]["numeroUnidades"]);
              importeFactura.setAttribute("value", respuesta[i]["importeFactura"]);

              serieFactura.setAttribute("size", "12");
              serieFactura.setAttribute("style","background: transparent;clear:both;margin-left:-4%;text-align: center;border:none;");
              serieFactura.className = "serieFactura";
              serieFactura.readOnly = true;

              folioFactura.setAttribute("size", "10");
              folioFactura.setAttribute("style","background: transparent;clear:both;margin-left:4%;text-align: center;border:none;");
              folioFactura.className = "folioFactura";
              folioFactura.readOnly = true;

              unidadesSurtidas.setAttribute("size", "8");
              unidadesSurtidas.setAttribute("style","background: transparent;clear:both;margin-left:7%;text-align: center;border:none;");
              unidadesSurtidas.className = "unidadesSurtidas";
              unidadesSurtidas.readOnly = true;

              partidasSurtidas.setAttribute("size", "8");
              partidasSurtidas.setAttribute("style","background: transparent;clear:both;margin-left:8%;text-align: center;border:none;");
              partidasSurtidas.className = "partidasSurtidas";
              partidasSurtidas.readOnly = true;

              importeFactura.setAttribute("size", "10");
              importeFactura.setAttribute("style","background: transparent;clear:both;margin-left:2%;text-align: right;border:none;");
              importeFactura.className = "importeFactura";
              importeFactura.readOnly = true;

                //salto.appendChild(text);
              salto.appendChild(serieFactura);
              salto.appendChild(folioFactura);
              salto.appendChild(unidadesSurtidas);
              salto.appendChild(partidasSurtidas);
              salto.appendChild(importeFactura);
              div.appendChild(salto);

              }
            }
          }
      })
  });