/*=============================================
EDITAR ORDEN ALMACEN
=============================================*/
$(".tablaAtencion").on("click", ".btnEditarOrden", function(){

    var idOrden= $(this).attr("idOrden");
    
    var datos = new FormData();
    datos.append("idOrden", idOrden);
  
    $.ajax({
  
      url:"ajax/ordenTrabajo.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){ 
        $("#otIdOrdenEdit").val(respuesta["id"]);
        $("#otCreadoEdit").val(respuesta["creado"]);
        $("#otCodigoClienteEdit").val(respuesta["codigoCliente"]);
        $("#otNombreClienteEdit").val(respuesta["nombreCliente"]);
        $("#otRfcClienteEdit").val(respuesta["rfc"]);
        $("#otVendedorEdit").val(respuesta["agenteVentas"]);
        $("#otDiasCreditoEdit").val(respuesta["diasCredito"]);
        $("#otSerieEdit").val(respuesta["serie"]);
        $("#otFolioEdit").val(respuesta["folio"]);
        $("#otEstatusClienteEdit").val(respuesta["statusCliente"]);
        $("#otPartidasEdit").val(respuesta["numeroPartidas"]);
        $("#otUnidadesEdit").val(respuesta["numeroUnidades"]);
        $("#otImporteEdit").val(respuesta["importe"]);
        $("#otFechaRecepcionEdit").val(respuesta["fechaRecepcion"]);
        $("#otFechaElaboracionEdit").val(respuesta["fechaElaboracion"]);
        $("#otFechaRecepcionEdit").val(respuesta["fechaRecepcion"]);
        $("#otTipoRutaEdit").val(respuesta["tipoRuta"]);
        $("#otMovimientoEdit").val(respuesta["observacionesOrden"]);
        $("#otComentariosEdit").val(respuesta["comentarios"]);
        $("#otOrden").val(respuesta["orden"]);

        
      }
  
  
    })
  
  
  });
 /*=============================================
CANCELAR ORDEN
=============================================*/
$(".tablaAtencion").on("click", ".btnCancelarOrden", function(){

    var idOrden = $(this).attr("idOrden");
    var folio = $(this).attr("folio");
    var serie = $(this).attr("serie");
  
    swal({
      title: '¿Está seguro de cancelar la orden?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      input: 'textarea',
      inputPlaceholder: 'Ingrese el motivo de cancelación',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, cancelar Orden!',
        
    }).then(function(result){
  
      if(result.value){
        
        var motivo = result.value;
        window.location = "index.php?ruta=ordenTrabajo&idOrden="+idOrden+"&folio="+folio+"&motivo="+motivo+"&serie="+serie;
  
      }else {
  
        swal("Error!",'Opps estuvo apunto de cancelar la orden', "error");
      }
  
    })
  
  });
/*=============================================
HABILITAR FOLIO  DE ORDEN DE TRABAJO
=============================================*/
$(".tablaAtencion").on("click", ".btnHabilitarFolio", function(){

    var idOrden4 = $(this).attr("idOrden3");
    var estadoOrden= $(this).attr("estadoOrden");
  
    var datos = new FormData();
    datos.append("activarId", idOrden4);
      datos.append("activarOrden", estadoOrden);
  
      $.ajax({
  
      url:"ajax/ordenTrabajo.ajax.php",
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
  VER MOTIVOS DE CANCELACION DE ORDEN
  =============================================*/
  $(".tablaAtencion").on("click", ".Cancelado", function(){

    var idOrden2 = $(this).attr("idOrden2");
    
    var datos = new FormData();
    datos.append("idOrden2", idOrden2);
  
    $.ajax({
  
      url:"ajax/ordenTrabajo.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){ 
        $("#verCancelacion").val(respuesta["motivoCancelacion"]);
      }
  
  
    })
  })
  