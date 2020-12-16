
/*=============================================
EDITAR ORDEN FACTURACION
=============================================*/
$(".tablaFacturacion").on("click", ".btnEditarOrdenFacturacion", function(){

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
        $("#otFolioEdit").val(respuesta["idPedido"]);
        var serieFactura = respuesta["serieFactura"];
        var folioFactura = respuesta["folioFactura"];
        var folio1 = respuesta["idPedido"];
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
        var folio = respuesta["idPedido"];
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
        var folio3 = respuesta["idPedido"];
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
        var folio4 = respuesta["idPedido"];
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
        var folio5 = respuesta["idPedido"];
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
        var folio6 = respuesta["idPedido"];
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
        var folio7 = respuesta["idPedido"];
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
  $(".tablaFacturacion").on("click", ".btnHabilitarFolio", function(){

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

 