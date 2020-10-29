/*=============================================
CARGAR LA TABLA DINÁMICA DE FACTURACION
=============================================*/
tablaFacturacion = $(".tablaFacturacion").DataTable({
   "ajax":"ajax/tablaFacturacion.ajax.php",
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
/*setInterval( function () {
    tableFacturacion.ajax.reload(); // user paging is not reset on reload
}, 10000);*/

/*=============================================
EDITAR PEDIDO FACTURA
=============================================*/
$(".tablaFacturacion").on("click", ".btnEditarFactura", function(){

  var idFacturacion = $(this).attr("idFacturacion");
  var idPedido = $(this).attr("idPedido");
  var seriePedido = $(this).attr("seriePedido");
  
  var datos = new FormData();
  datos.append("idFacturacion", idFacturacion);
  datos.append("idPedido", idPedido);
  datos.append("seriePedido", seriePedido);

  $.ajax({

    url:"ajax/facturacion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      $("#idFacturacion").val(respuesta[0]["id"]);
      $("#editarUsuario").val(respuesta[0]["usuario"]);
      $("#editarSerie").val(respuesta[0]["seriePedido"]);
      $("#editarIdPedido").val(respuesta[0]["idPedido"]);
      $("#serieFacturaGral").val(respuesta[0]["serie"]);
      $("#folioFacturaGral").val(respuesta[0]["folio"]);
      $("#editarOrdenCompra").val(respuesta[0]["ordenCompra"]);
      $("#editarImporteInicial").val(respuesta[0]["importeInicial"]);
      $("#editarSecciones").val(respuesta[0]["secciones"]);
      $("#editarStatus").val(respuesta[0]["status"]);
      $("#editarFechaRecepcion").val(respuesta[0]["fechaRecepcion"]);
      $("#editarFechaEntrega").val(respuesta[0]["fechaEntrega"]);
      $("#editarObservaciones").val(respuesta[0]["observaciones"]);
      $("#editarNombreCliente").val(respuesta[0]["nombreCliente"]);
      $("#cantidad").val(respuesta[0]["cantidad"]);
      //console.log(respuesta[0]["nombreCliente"]);

      var seriePedido = $("#editarSerie").val(respuesta[0]["seriePedido"]);
      var folioPedido = $("#editarIdPedido").val(respuesta[0]["idPedido"]);

      var serie = $("#serieFacturaGral").val(respuesta[0]["serie"]);
      var folio = $("#folioFacturaGral").val(respuesta[0]["folio"]);

      var secciones = document.getElementById("editarSecciones").value;

      for (i=1; i < secciones;i++){

          const value = i;
          var select = document.getElementById("editarSecciones");
          let option = select.querySelector(`option[value="${value}"]`);
          option.disabled = true;

      }

      $("#editarTipo").val(respuesta[0]["tipo"]);
      $("#numeroFacturas").val(respuesta[0]["secciones"]);
      sections = respuesta[0]["secciones"];

      var status = $("#editarStatusCliente").val(respuesta[0]["estadoCliente"]);

      if (status.val() == "1" || status.val() == "activado") {
        $("#editarStatusCliente").val("activado");
      }else {
        $("#editarStatusCliente").val("desactivado");
      }

      var tipoRuta = $("#editarTipoRuta").val(respuesta[0]["tipoRuta"]);
      if (tipoRuta.val() == "1") {
        $("#editarTipoRuta").val(1);
      }else{
        $("#editarTipoRuta").val(2);
      }
      
      if (respuesta[0]["secciones"] != 0) {
        div1 = document.getElementById("1F");
        div1.setAttribute("style","display:;border-bottom: #fff 20px solid;");
      }else{
        div1 = document.getElementById("1F");
        div1.setAttribute("style","display:none;");
      }

      $("#eliminarFactura0").attr({"seriePedido":respuesta[0]["seriePedido"], "folioPedido":respuesta[0]["idPedido"], "serieFactura":respuesta[0]["serie"], "foliofactura":respuesta[0]["folio"]});

      $("#eliminarFactura0").click(function(){
          var seriePedidoF = $("#eliminarFactura0").attr("seriePedido");
          var folioPedido = $("#eliminarFactura0").attr("folioPedido");
          var folioFactura = $("#eliminarFactura0").attr("foliofactura");
          var serieFactura = $("#eliminarFactura0").attr("serieFactura");
          console.log(serieFactura);
          var datos = new FormData();
          datos.append("seriePedidoF", seriePedidoF);
          datos.append("folioPedido", folioPedido);
          datos.append("folioFactura", folioFactura);
          datos.append("serieFactura", serieFactura);
 

          $.ajax({
            url: "ajax/facturacion.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
              if (respuesta == 'ok') {
                swal({
                    type: "success",
                    title: "La Factura Ha Sido Eliminada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      if (result.value) {
                        tablaFacturacion.ajax.reload();
                        $("#salirEditar").click();

                      }
                    })
              }else{
                swal({
                    type: "warning",
                    title: "No se pudo Procesar",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result) {
                      if (result.value) {
                        tablaFacturacion.ajax.reload();
                        $("#salirEditar").click();

                      }
                    })
              }
            }
          })
      });

      var listaTitulos = ['Serie Factura','Folio Factura','Importe','Partidas Surtidas','Unidades Surtidas'];
      var contenedor = document.getElementById("datosFacturas");

      var contenedorInputs =document.getElementById("inputsDi");
      var arregloDatos = ['serie','folio','importeFactura','numeroPartidas','numeroUnidades'];
      var arregloNameInputs = ['editarSerieFactura','editarFolioFactura','editarImporte','editarPartidasSurtidas','editarUnidadesSurtidas'];
      var nameButton = 'eliminarFactura';
      for(var i = 0; i < arregloDatos.length;i++){
        
        var ids  = $("#"+arregloNameInputs[i]+0).val(respuesta[0][arregloDatos[i]]);
        
      }  

      for (var i = 1; i < respuesta.length; i++) {
        var divDat = document.createElement("div");
        divDat.setAttribute("class","col-lg-12 col-md-12 col-sm-12 input-group divsContenedor");
        divDat.setAttribute("style","border-bottom: #fff 20px solid;");
        var puntero = i;

        for (var j = 0; j < arregloDatos.length; j++) {

          var span = document.createElement("span");
          span.setAttribute("class","input-group-addon");
          span.setAttribute("style","width:15px; height: 46px;");

          var spani = document.createElement("i");
          spani.setAttribute("class","fa fa-hashtag");

          var divInput = document.createElement("div");
          divInput.setAttribute("class","col-lg-4 col-md-4 col-sm-4");
               
          var inpusDat = document.createElement("input");
          inpusDat.setAttribute("style","width:71%; margin-left:40px; margin-top:-32%");
          inpusDat.setAttribute("class","form-control input-lg inputsDinamicosFacturas");
          inpusDat.setAttribute("type","text");
          inpusDat.setAttribute("id",arregloNameInputs[j]+puntero);


          var button = document.createElement("button");
          button.setAttribute("type", "button");
          button.setAttribute("class", "btn btn-danger");
          button.setAttribute("id", nameButton+puntero);
          button.setAttribute("onclick","obtenerIdButton(this)");
          button.setAttribute("serie",respuesta[i][arregloDatos[0]]);
          button.setAttribute("folio",respuesta[i][arregloDatos[1]]);
          button.setAttribute("seriePedido",respuesta[0]["seriePedido"]);
          button.setAttribute("folioPedido",respuesta[0]["idPedido"]);

          var spaniBtn = document.createElement("i");
          spaniBtn.setAttribute("class","fa fa-trash");
                
          var datosName = document.createElement("label");
          var textoLabel = document.createTextNode(listaTitulos[j]);
          datosName.appendChild(textoLabel);
          divInput.appendChild(datosName);
          
          inpusDat.setAttribute("value",respuesta[i][arregloDatos[j]]);
          contenedorInputs.appendChild(divDat);
          divInput.appendChild(span);
          span.appendChild(spani);
          divInput.appendChild(inpusDat);
          divDat.appendChild(divInput);
               
        }
        button.appendChild(spaniBtn);
        divDat.appendChild(button);
        
      }
      contenedor.appendChild(contenedorInputs);
      
    }
  })
});

function obtenerIdButton(valor){
  let id = valor.id;
  var serie = $("#"+id+"").attr("serie");
  var folio = $("#"+id+"").attr("folio");
  var seriePedidoF = $("#"+id+"").attr("seriePedido");
  var folioPedido = $("#"+id+"").attr("folioPedido");

  var datos = new FormData();

  datos.append("seriePedidoF",seriePedidoF);
  datos.append("folioPedido",folioPedido);
  datos.append("serieFactura",serie);
  datos.append("folioFactura",folio);

  $.ajax({
        url: "ajax/facturacion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          if (respuesta == 'ok') {
            swal({
                type: "success",
                title: "La Factura Ha Sido Eliminada",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result) {
                  if (result.value) {
                    tablaFacturacion.ajax.reload();
                    $("#salirEditar").click();

                    }
                })
          }else{
            swal({
                type: "warning",
                title: "No se pudo Procesar",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result) {
                  if (result.value) {
                    tablaFacturacion.ajax.reload();
                    $("#salirEditar").click();

                  }
                })
              }
            }
        })
}  

$("#salirEditar").click(function(){
  var nodos = document.getElementById("inputsDi");
  while(nodos.firstChild){
    nodos.removeChild(nodos.firstChild);
  }
  var nodos2 = document.getElementById("inputsDinamicos");
  while(nodos2.firstChild){
    nodos2.removeChild(nodos2.firstChild);
  }
});
$("#xEditar").click(function(){
  var nodos = document.getElementById("inputsDi");
  while(nodos.firstChild){
    nodos.removeChild(nodos.firstChild);
  }
  var nodos2 = document.getElementById("inputsDinamicos");
  while(nodos2.firstChild){
    nodos2.removeChild(nodos2.firstChild);
  }
});
/**
* FUNCION PARA OBTENER EL VALOR DEL SELECT DE EL NUMERO DE FACTURAS Y MANDARLO
* A LA FUNCION PARA CREAR LOS INPUTS DINAMICOS
**/

$("#editarSecciones").on("change",function(){

  nFacturas = document.getElementById("editarSecciones").value;

    
  var contenedor = document.getElementById("nnuevos_inputs");
  var div =document.getElementById("inputsDinamicos");
  var listaTitulos = ['Serie Factura','Folio Factura','Importe','Partidas Surtidas','Unidades Surtidas'];

  var divs = document.getElementsByClassName("divsContenedor").length;
      
  var nodos = document.getElementById('inputsDinamicos');

  var nFacturas = nFacturas * 1;

   if(nFacturas == 1){

    var div1 = document.getElementById("1F");
    div1.setAttribute("style","display:;border-bottom: #fff 20px solid;");
    
    var sum = ++sections;
  }else{

  }

  if (nodos == null) {

  }else{

    while (nodos.firstChild) {
      nodos.removeChild(nodos.firstChild);
    }
  }
     
      
  var arregloNameInputs = ['editarSerieFactura','editarFolioFactura','editarImporte','editarPartidasSurtidas','editarUnidadesSurtidas'];

  for(var i = sections; i < nFacturas; i++){

    var divDat = document.createElement("div");

    divDat.setAttribute("class","col-lg-12 col-md-12 col-sm-12 input-group divsContenedor");
    divDat.setAttribute("style","border-bottom: #fff 20px solid;");
        
    for (var j = 0; j < listaTitulos.length; j++) {
      var span = document.createElement("span");
      span.setAttribute("class","input-group-addon");
      span.setAttribute("style","width:15px; height: 46px;");

      var spani = document.createElement("i");
      spani.setAttribute("class","fa fa-hashtag");

      var divInput = document.createElement("div");
      divInput.setAttribute("class","col-lg-4 col-md-4 col-sm-4");

      inpusDat = document.createElement("input");
      inpusDat.setAttribute("style","width:71%; margin-left:40px; margin-top:-32%");
      inpusDat.setAttribute("class","form-control input-lg inputsDinamicosFacturas");
      inpusDat.setAttribute("type","text");
      inpusDat.setAttribute("id",arregloNameInputs[j]+i);

      var datosName = document.createElement("label");
      textoLabel = document.createTextNode(listaTitulos[j]);
      datosName.appendChild(textoLabel);
      divInput.appendChild(datosName);
    
      div.appendChild(divDat);
      divInput.appendChild(span);
      span.appendChild(spani);
      divInput.appendChild(inpusDat);
      divDat.appendChild(divInput);

    }
      
  }
  contenedor.appendChild(div);

      
});
/**
* OBTENER LOS DATOS PARA EDITARLOS
*/
   
$("#modificarP").click(function(){

  var facturas = $("#editarSecciones").val();
  var usuario = $("#editarUsuario").val();
  var editarSerie = $("#editarSerie").val();
  var editarIdPedido = $("#editarIdPedido").val();
  var editarStatus = $("#editarStatus").val();
  var editarOrdenCompra = $("#editarOrdenCompra").val();
  var editarTipo = $("#editarTipo").val();
  var editarStatusCliente = $("#editarStatusCliente").val();
  var editarTipoRuta = $("#editarTipoRuta").val();
  var editarFechaRecepcion = $("#editarFechaRecepcion").val();
  var editarFechaEntrega = $("#editarFechaEntrega").val();
  var editarObservaciones = $("#editarObservaciones").val();
  var editarNombreCliente = $("#editarNombreCliente").val();
  var editarFormatoPedido = $("#editarFormatoPedido").val();
  var cantidad = $("#cantidad").val();
      
  var arreglo = [];
  var general = [];
  var arregloFacturasFacturacion = "";
  
  for (var i = 0; i < facturas; i++) {

    var serieFactura = $("#editarSerieFactura"+i).val();
    var folioFactura = $("#editarFolioFactura"+i).val();
    var editarImporte = $("#editarImporte"+i).val();
    var editarPartidasSurtidas = $("#editarPartidasSurtidas"+i).val();
    var editarUnidadesSurtidas = $("#editarUnidadesSurtidas"+i).val();

    arreglo.push({serieFactura, folioFactura,editarImporte,editarPartidasSurtidas,editarUnidadesSurtidas});

  }
  general.push(arreglo);
  localStorage.setItem("arregloFacturasFacturacion",JSON.stringify(general));
  var arregloGeneral = JSON.stringify(general);
   
  var datos = new FormData();
  datos.append("arregloGeneral",arregloGeneral);
  datos.append("editarSecciones", facturas);
  datos.append("editarUsuario", usuario);
  datos.append("editarSerie", editarSerie);
  datos.append("editarIdPedido", editarIdPedido);
  datos.append("editarStatus", editarStatus);
  datos.append("editarOrdenCompra", editarOrdenCompra);
  datos.append("editarTipo", editarTipo);
  datos.append("editarStatusCliente", editarStatusCliente);
  datos.append("editarTipoRuta", editarTipoRuta);
  datos.append("editarFechaRecepcion", editarFechaRecepcion);
  datos.append("editarFechaEntrega", editarFechaEntrega);
  datos.append("editarObservaciones", editarObservaciones);
  datos.append("editarNombreCliente", editarNombreCliente);
  datos.append("editarFormatoPedido", editarFormatoPedido);
  datos.append("cantidad", cantidad);
      
  $.ajax({
    url:"ajax/facturacion.ajax.php",  
    method:"POST",
    data:datos,
    cache:false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){
      var response = respuesta;

      if (response == true) {
        swal({
            type: "success",
            title: "La Factura Ha Sido Actualizada Correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result) {
              if (result.value) {
                tablaFacturacion.ajax.reload();
                $("#salirEditar").click();

              }
            })
      }else{
        swal({
            type: "warning",
            title: "No se pudo Procesar",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result) {
              if (result.value) {
               tablaFacturacion.ajax.reload();
               $("#salirEditar").click();

              }
            })
      }
    }
  })

});

/*=============================================
VER OBSERVACIONES
=============================================*/
$(".tablaFacturacion").on("click", ".btnVerObservaciones", function(){

  var idFacturacion4 = $(this).attr("idFacturacion4");
  
  var datos = new FormData();
  datos.append("idFacturacion4", idFacturacion4);

  $.ajax({

    url:"ajax/facturacion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#idFacturacion4").val(respuesta["id"]);
      $("#editarObservacionesExtras").val(respuesta["observacionesExtras"]);


    }


  })


})

/*=============================================
ELIMINAR FACTURACION PEDIDO
=============================================*/
$(".tablaFacturacion").on("click", ".btnEliminarFactura", function(){

  var idFacturacion = $(this).attr("idFacturacion");

  swal({
    title: '¿Está seguro de cancelar los datos de facturación?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, cancelar!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=facturacion&idFacturacion="+idFacturacion;

    }

  })

})

/*=============================================
REVISAR SI EL FOLIO DEL PEDIDO EXISTE
=============================================*/

$(".validarPedido7").click(function(){

  $(".alert").remove();

  var Pedido = $(this).val();

  var datos = new FormData();
  datos.append("validarPedido7", Pedido);

   $.ajax({
      url:"ajax/facturacion.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        if(respuesta.length != 0){

          $(".validarPedido7").parent().after('<div class="alert alert-warning">Este folio de pedido ya fue editado</div>');

          $(".validarPedido7").val("");
          $("#importeInicial").val("");
          $("#statusCliente").val("");
          $("#ordenCompra").val("");

        }

      }

    })

})
/*=============================================
HABILITAR FOLIO
=============================================*/
$(".tablaFacturacion").on("click", ".btnHabilitarFolio", function(){

  var idFactura = $(this).attr("idFacturacion3");
  var estadoFactura= $(this).attr("estadoFactura");

  var datos = new FormData();
  datos.append("activarId", idFactura);
    datos.append("activarFactura", estadoFactura);

    $.ajax({

    url:"ajax/facturacion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
        console.log("respuesta", respuesta);
      }

    })

    if(estadoFactura== 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('<i class="fa fa-power-off"></i>Deshabilitado');
      $(this).attr('estadoFactura',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('<i class="fa fa-power-off"></i>Habilitado');
      $(this).attr('estadoFactura',0);

    }

});
/*=============================================
MOSTRAR COMPRAS PEDIDOS
=============================================*/
$(".tablaFacturacion").on("click", ".btnVerFacturas", function(){

  var idFacturacion2 = $(this).attr("idFacturacion2");
  var serieFacturacion = $(this).attr("serieFacturacion");
  
  var datos = new FormData();
  datos.append("idFacturacion2", idFacturacion2);
  datos.append("serieFacturacion", serieFacturacion);

  $.ajax({

    url:"ajax/facturacion.ajax.php",
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
            
        var totalPart = respuesta[0]["totalImport"] * 1;

        palabraTotal.setAttribute("value", "Totales:");
        totalPartidas.setAttribute("value", respuesta[0]["totalPart"]);
        totalUnidades.setAttribute("value", respuesta[0]["totalUnid"]);
        totalImporte.setAttribute("value", totalPart.toFixed(2));

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

          var importeFac = respuesta[i]["importeFactura"] * 1;

          serieFactura.setAttribute("value", respuesta[i]["serie"]);
          folioFactura.setAttribute("value", respuesta[i]["folio"]);
          unidadesSurtidas.setAttribute("value", respuesta[i]["numeroPartidas"]);
          partidasSurtidas.setAttribute("value", respuesta[i]["numeroUnidades"]);
          importeFactura.setAttribute("value", importeFac.toFixed(2));

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
})