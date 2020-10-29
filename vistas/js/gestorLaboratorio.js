/*=============================================
CARGAR LA TABLA DINÁMICA DE LABORATORIO DE COLOR
=============================================*/

var table3 = $(".tablaLaboratorio").DataTable({
   "ajax":"ajax/tablaLaboratorio.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "fixedHeader": true,
    "iDisplayLength": 5,
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
EDITAR PEDIDO LABORATORIO
=============================================*/
$(".tablaLaboratorio").on("click", ".btnEditarPedido", function(){

  var idLaboratorio2 = $(this).attr("idLaboratorio2");
  
  var datos = new FormData();
  datos.append("idLaboratorio2", idLaboratorio2);

  $.ajax({

    url:"ajax/laboratorio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#idLaboratorio2").val(respuesta["id"]);
      $("#editarSerie").val(respuesta["serie"]);
      $("#editarIdPedido").val(respuesta["idPedido"]);
      $("#editarNombreCliente").val(respuesta["nombreCliente"]);
      $("#editarNumeroOrden").val(respuesta["numeroOrden"]);
      $("#editarSecciones").val(respuesta["secciones"]);
      $("#editarCodigo1").val(respuesta["codigo"]);
      $("#editarDescripcionColor").val(respuesta["descripcionColor"]);
      $("#editarCantidad").val(respuesta["cantidad"]);
      $("#editarFechaInicio").val(respuesta["fechaInicio"]);
      $("#editarFechaTermino").val(respuesta["fechaTermino"]);
      $("#editarCodigo2").val(respuesta["codigo2"]);
      $("#editarDescripcionColor2").val(respuesta["descripcionColor2"]);
      $("#editarCantidad2").val(respuesta["cantidad2"]);
      $("#editarFechaInicio2").val(respuesta["fechaInicio2"]);
      $("#editarFechaTermino2").val(respuesta["fechaTermino2"]);
      $("#editarCodigo3").val(respuesta["codigo3"]);
      $("#editarDescripcionColor3").val(respuesta["descripcionColor3"]);
      $("#editarCantidad3").val(respuesta["cantidad3"]);
      $("#editarFechaInicio3").val(respuesta["fechaInicio3"]);
      $("#editarFechaTermino3").val(respuesta["fechaTermino3"]);
      $("#editarCodigo4").val(respuesta["codigo4"]);
      $("#editarDescripcionColor4").val(respuesta["descripcionColor4"]);
      $("#editarCantidad4").val(respuesta["cantidad4"]);
      $("#editarFechaInicio4").val(respuesta["fechaInicio4"]);
      $("#editarFechaTermino4").val(respuesta["fechaTermino4"]);
      $("#editarCodigo5").val(respuesta["codigo5"]);
      $("#editarDescripcionColor5").val(respuesta["descripcionColor5"]);
      $("#editarCantidad5").val(respuesta["cantidad5"]);
      $("#editarFechaInicio5").val(respuesta["fechaInicio5"]);
      $("#editarFechaTermino5").val(respuesta["fechaTermino5"]);
      $("#editarFechaRecepcion").val(respuesta["fechaRecepcion"]);
      $("#editarStatus").val(respuesta["status"]);
      $("#editarObservaciones").val(respuesta["observaciones"]);

      var valor1 = document.getElementById("editarSecciones").value;
         if (valor1 == 1) {
         div1 = document.getElementById("1E");
              div1.style.display = "";

         div2 = document.getElementById("2E");
           div2.style.display = "none";

        div3 = document.getElementById("3E");
           div3.style.display = "none";

        div4 = document.getElementById("4E");
           div4.style.display = "none";

        div5 = document.getElementById("5E");
           div5.style.display = "none";

        }else if (valor1 == 2) {
         div1 = document.getElementById("1E");
              div1.style.display = "";

         div2 = document.getElementById("2E");
           div2.style.display = "";

        div3 = document.getElementById("3E");
           div3.style.display = "none";

        div4 = document.getElementById("4E");
           div4.style.display = "none";

        div5 = document.getElementById("5E");
           div5.style.display = "none";

        }else if (valor1 == 3) {
         div1 = document.getElementById("1E");
              div1.style.display = "";

         div2 = document.getElementById("2E");
           div2.style.display = "";

        div3 = document.getElementById("3E");
           div3.style.display = "";

        div4 = document.getElementById("4E");
           div4.style.display = "none";

        div5 = document.getElementById("5E");
           div5.style.display = "none";

        }else if (valor1 == 4) {
         div1 = document.getElementById("1E");
              div1.style.display = "";

         div2 = document.getElementById("2E");
           div2.style.display = "";

        div3 = document.getElementById("3E");
           div3.style.display = "";

        div4 = document.getElementById("4E");
           div4.style.display = "";

        div5 = document.getElementById("5E");
           div5.style.display = "none";

        }else if (valor1 == 5) {
        div1 = document.getElementById("1E");
              div1.style.display = "";

         div2 = document.getElementById("2E");
           div2.style.display = "";

        div3 = document.getElementById("3E");
           div3.style.display = "";

        div4 = document.getElementById("4E");
           div4.style.display = "";

        div5 = document.getElementById("5E");
           div5.style.display = "";

        }
    }


  })


})

/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablaLaboratorio").on("click", ".btnVerObservaciones", function(){

  var idLaboratorio4 = $(this).attr("idLaboratorio4");
  
  var datos = new FormData();
  datos.append("idLaboratorio4", idLaboratorio4);

  $.ajax({

    url:"ajax/laboratorio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#idLaboratorio4").val(respuesta["id"]);
      $("#editarObservacionesExtras").val(respuesta["observacionesExtras"]);


    }


  })


})

/*=============================================
MOSTRAR IGUALADOS
=============================================*/
$(".tablaLaboratorio").on("click", ".btnVerIgualados", function(){

  var idLab = $(this).attr("idLab");
  
  var datos = new FormData();
  datos.append("idLab", idLab);

  $.ajax({

    url:"ajax/laboratorio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#iguSecciones").val(respuesta["secciones"]);
      $("#iguCodigo").val(respuesta["codigo"]);
      $("#idLab").val(respuesta["id"]);
      $("#iguDescripcion").val(respuesta["descripcionColor"]);
      $("#iguCantidad").val(respuesta["cantidad"]);
      $("#iguCodigo2").val(respuesta["codigo2"]);
      $("#iguDescripcion2").val(respuesta["descripcionColor2"]);
      $("#iguCantidad2").val(respuesta["cantidad2"]);
      $("#iguCodigo3").val(respuesta["codigo3"]);
      $("#iguDescripcion3").val(respuesta["descripcionColor3"]);
      $("#iguCantidad3").val(respuesta["cantidad3"]);
      $("#iguCodigo4").val(respuesta["codigo4"]);
      $("#iguDescripcion4").val(respuesta["descripcionColor4"]);
      $("#iguCantidad4").val(respuesta["cantidad4"]);
      $("#iguCodigo5").val(respuesta["codigo5"]);
      $("#iguDescripcion5").val(respuesta["descripcionColor5"]);
      $("#iguCantidad5").val(respuesta["cantidad5"]);

       var valor = document.getElementById("iguSecciones").value;
         if (valor == 1) {
         div1 = document.getElementById("1Co");
              div1.style.display = "";

         div2 = document.getElementById("2Co");
           div2.style.display = "none";

        div3 = document.getElementById("3Co");
           div3.style.display = "none";

        div4 = document.getElementById("4Co");
           div4.style.display = "none";

        div5 = document.getElementById("5Co");
           div5.style.display = "none";

        }else if (valor == 2) {
         div1 = document.getElementById("1Co");
              div1.style.display = "";

         div2 = document.getElementById("2Co");
           div2.style.display = "";

        div3 = document.getElementById("3Co");
           div3.style.display = "none";

        div4 = document.getElementById("4Co");
           div4.style.display = "none";

        div5 = document.getElementById("5Co");
           div5.style.display = "none";

        }else if (valor == 3) {
         div1 = document.getElementById("1Co");
              div1.style.display = "";

         div2 = document.getElementById("2Co");
           div2.style.display = "";

        div3 = document.getElementById("3Co");
           div3.style.display = "";

        div4 = document.getElementById("4Co");
           div4.style.display = "none";

        div5 = document.getElementById("5Co");
           div5.style.display = "none";

        }else if (valor == 4) {
         div1 = document.getElementById("1Co");
              div1.style.display = "";

         div2 = document.getElementById("2Co");
           div2.style.display = "";

        div3 = document.getElementById("3Co");
           div3.style.display = "";

        div4 = document.getElementById("4Co");
           div4.style.display = "";

        div5 = document.getElementById("5Co");
           div5.style.display = "none";

        }else if (valor == 5) {
         div1 = document.getElementById("1Co");
              div1.style.display = "";

         div2 = document.getElementById("2Co");
           div2.style.display = "";

        div3 = document.getElementById("3Co");
           div3.style.display = "";

        div4 = document.getElementById("4Co");
           div4.style.display = "";

        div5 = document.getElementById("5Co");
           div5.style.display = "";

        }
    
    }


  })


})


/*=============================================
CANCELAR PEDIDO
=============================================*/
$(".tablaLaboratorio").on("click", ".btnEliminarPedido", function(){

  var idLaboratorio2 = $(this).attr("idLaboratorio2");

  swal({
    title: '¿Está seguro de cancelar el pedido?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, cancelar pedido!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=laboratorioColor&idLaboratorio2="+idLaboratorio2;

    }

  })

})

/*=============================================
REVISAR SI EL FOLIO DEL PEDIDO EXISTE
=============================================*/

$(".validarPedido2").click(function(){

  $(".alert").remove();

  var Pedido = $(this).val();

  var datos = new FormData();
  datos.append("validarPedido2", Pedido);

   $.ajax({
      url:"ajax/laboratorio.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        if(respuesta.length != 0){

          $(".validarPedido2").parent().after('<div class="alert alert-warning">Este folio de pedido ya fue editado</div>');

          $(".validarPedido2").val("");
          $("#nombreCliente").val("");
          $("#numeroOrden").val("");

        }

      }

    })

})
/*=============================================
HABILITAR FOLIO
=============================================*/
$(".tablaLaboratorio").on("click", ".btnHabilitarFolio", function(){

  var idPedido = $(this).attr("idLaboratorio3");
  var estadoPedido= $(this).attr("estadoPedido");

  var datos = new FormData();
  datos.append("activarId", idPedido);
    datos.append("activarPedido", estadoPedido);

    $.ajax({

    url:"ajax/laboratorio.ajax.php",
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