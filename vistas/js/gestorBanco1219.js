/*=============================================
CARGAR LA TABLA DINÁMICA DE BANCO1219
=============================================*/
 var mes=document.getElementById("elegirMeses");
 if (mes != null) {
    var mesFinal = mes.value;
}
else {
    var mesFinal = null;
}

 $("#elegirMes").val(mesFinal);
$(".tablaBanco1219").DataTable({
   "ajax":"ajax/tablaBanco1219.ajax.php",
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
CARGAR LA TABLA DINÁMICA DE BANCO1219
=============================================*/

$(".tablaBanco1219Credito").DataTable({
   "ajax":"ajax/tablaBanco1219Credito.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
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
EDITAR BANCO 
=============================================*/
$(".tablaBanco1219").on("click", ".btnEditarDatos", function(){

  var idBanco = $(this).attr("idBanco");
  
  var datos = new FormData();
  datos.append("idBanco", idBanco);

  $.ajax({

    url:"ajax/banco1219.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 

      $("#editarDepartamento").val(respuesta["departamento"]);
      $("#idBanco").val(respuesta["id"]);
      $("#editarIdBanco").val(respuesta["id"]);
      $("#editarGrupo").val(respuesta["grupo"]);
      $("#editarSubgrupo").val(respuesta["subgrupo"]);
      $("#editarMes").val(respuesta["mes"]);
      $("#editarFecha").val(respuesta["fecha"]);
      $("#editarDescripcion").val(respuesta["descripcion"]);
      $("#editarCargo").val(respuesta["cargo"]);
      $("#editarAbono").val(respuesta["abono"]);
      $("#editarSaldo").val(respuesta["saldo"]);
      $("#editarParciales").val(respuesta["parciales"]);
      $("#editarParcial").val(respuesta["parcial"]);
      $("#editarDepartamentoParcial1").val(respuesta["departamentoParcial1"]);
      $("#editarParcial2").val(respuesta["parcial2"]);
      $("#editarDepartamentoParcial2").val(respuesta["departamentoParcial2"]);
      $("#editarParcial3").val(respuesta["parcial3"]);
      $("#editarDepartamentoParcial3").val(respuesta["departamentoParcial3"]);
      $("#editarParcial4").val(respuesta["parcial4"]);
      $("#editarDepartamentoParcial4").val(respuesta["departamentoParcial4"]);
      $("#editarParcial5").val(respuesta["parcial5"]);
      $("#editarDepartamentoParcial5").val(respuesta["departamentoParcial5"]);
      $("#editarParcial6").val(respuesta["parcial6"]);
      $("#editarDepartamentoParcial6").val(respuesta["departamentoParcial6"]);
      $("#editarParcial7").val(respuesta["parcial7"]);
      $("#editarDepartamentoParcial7").val(respuesta["departamentoParcial7"]);
      $("#editarParcial8").val(respuesta["parcial8"]);
      $("#editarDepartamentoParcial8").val(respuesta["departamentoParcial8"]);
      $("#editarParcial9").val(respuesta["parcial9"]);
      $("#editarDepartamentoParcial9").val(respuesta["departamentoParcial9"]);
      $("#editarParcial10").val(respuesta["parcial10"]);
      $("#editarDepartamentoParcial10").val(respuesta["departamentoParcial10"]);
      $("#editarParcial11").val(respuesta["parcial11"]);
      $("#editarDepartamentoParcial11").val(respuesta["departamentoParcial11"]);
      $("#editarParcial12").val(respuesta["parcial12"]);
      $("#editarDepartamentoParcial12").val(respuesta["departamentoParcial12"]);
      $("#editarFolio").val(respuesta["folio"]);
      $("#editarSerie").val(respuesta["serie"]);
      $("#select2-editarAcreedor-container").val(respuesta["acreedor"]);
      $("#editarAcreedor").val(respuesta["acreedor"]);
      $("#editarConcepto").val(respuesta["concepto"]);
      $("#editarNumeroDocumento").val(respuesta["numeroDocumento"]);
      $("#editarTieneIva").val(respuesta["tieneIva"]);
      $("#editarTieneRetenciones").val(respuesta["tieneRetenciones"]);
      $("#editarTipoRetencion").val(respuesta["tipoRetencion"]);
      $("#editarImporteRetenciones").val(respuesta["importeRetenciones"]);


      var valor1 = document.getElementById("editarParciales").value;
      var valor = document.getElementById("editarTieneRetenciones").value;

      if (valor == "01") {
        div0 = document.getElementById("div_01");
        div0.style.display = "";

      }else if (valor == "0") {
        div0 = document.getElementById("div_01");
        div0.style.display = "none";
      }
         
         if (valor1 == 0) {
           
          div1 = document.getElementById("1P");
          div1.style.display = "none";

          div2 = document.getElementById("2P");
          div2.style.display = "none";

          div3 = document.getElementById("3P");
          div3.style.display = "none";

          div4 = document.getElementById("4P");
          div4.style.display = "none";

          div5 = document.getElementById("5P");
          div5.style.display = "none";

          div6 = document.getElementById("6P");
          div6.style.display = "none";

          div7 = document.getElementById("7P");
          div7.style.display = "none";

          div8 = document.getElementById("8P");
          div8.style.display = "none";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

         }

         else if (valor1 == 1) {

          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "none";

          div3 = document.getElementById("3P");
          div3.style.display = "none";

          div4 = document.getElementById("4P");
          div4.style.display = "none";

          div5 = document.getElementById("5P");
          div5.style.display = "none";

          div6 = document.getElementById("6P");
          div6.style.display = "none";

          div7 = document.getElementById("7P");
          div7.style.display = "none";

          div8 = document.getElementById("8P");
          div8.style.display = "none";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }else if (valor1 == 2) {

         div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "none";

          div4 = document.getElementById("4P");
          div4.style.display = "none";

          div5 = document.getElementById("5P");
          div5.style.display = "none";

          div6 = document.getElementById("6P");
          div6.style.display = "none";

          div7 = document.getElementById("7P");
          div7.style.display = "none";

          div8 = document.getElementById("8P");
          div8.style.display = "none";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }else if (valor1 == 3) {

         div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "none";

          div5 = document.getElementById("5P");
          div5.style.display = "none";

          div6 = document.getElementById("6P");
          div6.style.display = "none";

          div7 = document.getElementById("7P");
          div7.style.display = "none";

          div8 = document.getElementById("8P");
          div8.style.display = "none";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }else if (valor1 == 4) {

         div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "none";

          div6 = document.getElementById("6P");
          div6.style.display = "none";

          div7 = document.getElementById("7P");
          div7.style.display = "none";

          div8 = document.getElementById("8P");
          div8.style.display = "none";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }else if (valor1 == 5) {

          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "";

          div6 = document.getElementById("6P");
          div6.style.display = "none";

          div7 = document.getElementById("7P");
          div7.style.display = "none";

          div8 = document.getElementById("8P");
          div8.style.display = "none";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }
        else if (valor1 == 6) {

          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "";

          div6 = document.getElementById("6P");
          div6.style.display = "";

          div7 = document.getElementById("7P");
          div7.style.display = "none";

          div8 = document.getElementById("8P");
          div8.style.display = "none";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }
        else if (valor1 == 7) {
        
          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "";

          div6 = document.getElementById("6P");
          div6.style.display = "";

          div7 = document.getElementById("7P");
          div7.style.display = "";

          div8 = document.getElementById("8P");
          div8.style.display = "none";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }else if (valor1 == 8) {
          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "";

          div6 = document.getElementById("6P");
          div6.style.display = "";

          div7 = document.getElementById("7P");
          div7.style.display = "";

          div8 = document.getElementById("8P");
          div8.style.display = "";

          div9 = document.getElementById("9P");
          div9.style.display = "none";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }else if (valor1 == 9) {
          
          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "";

          div6 = document.getElementById("6P");
          div6.style.display = "";

          div7 = document.getElementById("7P");
          div7.style.display = "";

          div8 = document.getElementById("8P");
          div8.style.display = "";

          div9 = document.getElementById("9P");
          div9.style.display = "";

          div10 = document.getElementById("10P");
          div10.style.display = "none";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";


        }else if (valor1 == 10) {
          
          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "";

          div6 = document.getElementById("6P");
          div6.style.display = "";

          div7 = document.getElementById("7P");
          div7.style.display = "";

          div8 = document.getElementById("8P");
          div8.style.display = "";

          div9 = document.getElementById("9P");
          div9.style.display = "";

          div10 = document.getElementById("10P");
          div10.style.display = "";

          div11 = document.getElementById("11P");
          div11.style.display = "none";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }else if (valor1 == 11) {
          
          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "";

          div6 = document.getElementById("6P");
          div6.style.display = "";

          div7 = document.getElementById("7P");
          div7.style.display = "";

          div8 = document.getElementById("8P");
          div8.style.display = "";

          div9 = document.getElementById("9P");
          div9.style.display = "";

          div10 = document.getElementById("10P");
          div10.style.display = "";

          div11 = document.getElementById("11P");
          div11.style.display = "";

          div12 = document.getElementById("12P");
          div12.style.display = "none";

        }else if (valor1 == 12) {
          
          div1 = document.getElementById("1P");
          div1.style.display = "";

          div2 = document.getElementById("2P");
          div2.style.display = "";

          div3 = document.getElementById("3P");
          div3.style.display = "";

          div4 = document.getElementById("4P");
          div4.style.display = "";

          div5 = document.getElementById("5P");
          div5.style.display = "";

          div6 = document.getElementById("6P");
          div6.style.display = "";

          div7 = document.getElementById("7P");
          div7.style.display = "";

          div8 = document.getElementById("8P");
          div8.style.display = "";

          div9 = document.getElementById("9P");
          div9.style.display = "";

          div10 = document.getElementById("10P");
          div10.style.display = "";

          div11 = document.getElementById("11P");
          div11.style.display = "";

          div12 = document.getElementById("12P");
          div12.style.display = "";

        }
     
    }


  })


})
/*=============================================
MOSTRAR PARCIALES
=============================================*/
$(".tablaBanco1219").on("click", ".btnVerParciales", function(){

  var idPar = $(this).attr("idPar");
  
  var datos = new FormData();
  datos.append("idPar", idPar);

  $.ajax({

    url:"ajax/banco1219.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#cantParciales").val(respuesta["parciales"]);
      $("#idPar").val(respuesta["id"]);
      $("#cantParcial1").val(respuesta["parcial"]);
      $("#cantDepartamento1").val(respuesta["departamentoParcial1"]);
      $("#cantParcial2").val(respuesta["parcial2"]);
      $("#cantDepartamento2").val(respuesta["departamentoParcial2"]);
      $("#cantParcial3").val(respuesta["parcial3"]);
      $("#cantDepartamento3").val(respuesta["departamentoParcial3"]);
      $("#cantParcial4").val(respuesta["parcial4"]);
      $("#cantDepartamento4").val(respuesta["departamentoParcial4"]);
      $("#cantParcial5").val(respuesta["parcial5"]);
      $("#cantDepartamento5").val(respuesta["departamentoParcial5"]);
      $("#cantParcial6").val(respuesta["parcial6"]);
      $("#cantDepartamento6").val(respuesta["departamentoParcial6"]);
      $("#cantParcial7").val(respuesta["parcial7"]);
      $("#cantDepartamento7").val(respuesta["departamentoParcial7"]);
      $("#cantParcial8").val(respuesta["parcial8"]);
      $("#cantDepartamento8").val(respuesta["departamentoParcial8"]);
      $("#cantParcial9").val(respuesta["parcial9"]);
      $("#cantDepartamento9").val(respuesta["departamentoParcial9"]);
      $("#cantParcial10").val(respuesta["parcial10"]);
      $("#cantDepartamento10").val(respuesta["departamentoParcial10"]);
      $("#cantParcial11").val(respuesta["parcial11"]);
      $("#cantDepartamento11").val(respuesta["departamentoParcial11"]);
      $("#cantParcial12").val(respuesta["parcial12"]);
      $("#cantDepartamento12").val(respuesta["departamentoParcial12"]);

       var parcial1 = document.getElementById("cantParcial1").value;
      var parcial2 = document.getElementById("cantParcial2").value;
      var parcial3 = document.getElementById("cantParcial3").value;
      var parcial4 = document.getElementById("cantParcial4").value;
      var parcial5 = document.getElementById("cantParcial5").value;
      var parcial6 = document.getElementById("cantParcial6").value;
      var parcial7 = document.getElementById("cantParcial7").value;
      var parcial8 = document.getElementById("cantParcial8").value;
      var parcial9 = document.getElementById("cantParcial9").value;
      var parcial10 = document.getElementById("cantParcial10").value;
      var parcial11 = document.getElementById("cantParcial11").value;
      var parcial12 = document.getElementById("cantParcial12").value;


      var suma = parseFloat(parcial1) + parseFloat(parcial2) + parseFloat(parcial3) + parseFloat(parcial4) + parseFloat(parcial5) + parseFloat(parcial6) + parseFloat(parcial7) + parseFloat(parcial8) + parseFloat(parcial9) + parseFloat(parcial10) + parseFloat(parcial11) + parseFloat(parcial12);
      
      $("#totalParciales").val("$"+suma.toFixed(2));
      
       var valor = document.getElementById("cantParciales").value;
         
         if (valor == 0) {
           
           div1 = document.getElementById("1Par");
              div1.style.display = "none";

         div2 = document.getElementById("2Par");
           div2.style.display = "none";

        div3 = document.getElementById("3Par");
           div3.style.display = "none";

        div4 = document.getElementById("4Par");
           div4.style.display = "none";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

         }

         else if (valor == 1) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "none";

        div3 = document.getElementById("3Par");
           div3.style.display = "none";

        div4 = document.getElementById("4Par");
           div4.style.display = "none";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";


        }else if (valor == 2) {
         
        div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "none";

        div4 = document.getElementById("4Par");
           div4.style.display = "none";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 3) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "none";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 4) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 5) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 6) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 7) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 8) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }
        else if (valor == 9) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 10) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "";

        div10 = document.getElementById("10Par");
           div10.style.display = "";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 11) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "";

        div10 = document.getElementById("10Par");
           div10.style.display = "";

        div11 = document.getElementById("11Par");
           div11.style.display = "";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 12) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "";

        div10 = document.getElementById("10Par");
           div10.style.display = "";

        div11 = document.getElementById("11Par");
           div11.style.display = "";

        div12 = document.getElementById("12Par");
           div12.style.display = "";

        }
    
    }


  })


})
/*=============================================
MOSTRAR PARCIALES
=============================================*/
$(".tablaBanco1219Credito").on("click", ".btnVerParciales", function(){

  var idPar = $(this).attr("idPar");
  
  var datos = new FormData();
  datos.append("idPar", idPar);

  $.ajax({

    url:"ajax/banco1219.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
      
      $("#cantParciales").val(respuesta["parciales"]);
      $("#idPar").val(respuesta["id"]);
      $("#cantParcial1").val(respuesta["parcial"]);
      $("#cantDepartamento1").val(respuesta["departamentoParcial1"]);
      $("#cantParcial2").val(respuesta["parcial2"]);
      $("#cantDepartamento2").val(respuesta["departamentoParcial2"]);
      $("#cantParcial3").val(respuesta["parcial3"]);
      $("#cantDepartamento3").val(respuesta["departamentoParcial3"]);
      $("#cantParcial4").val(respuesta["parcial4"]);
      $("#cantDepartamento4").val(respuesta["departamentoParcial4"]);
      $("#cantParcial5").val(respuesta["parcial5"]);
      $("#cantDepartamento5").val(respuesta["departamentoParcial5"]);
      $("#cantParcial6").val(respuesta["parcial6"]);
      $("#cantDepartamento6").val(respuesta["departamentoParcial6"]);
      $("#cantParcial7").val(respuesta["parcial7"]);
      $("#cantDepartamento7").val(respuesta["departamentoParcial7"]);
      $("#cantParcial8").val(respuesta["parcial8"]);
      $("#cantDepartamento8").val(respuesta["departamentoParcial8"]);
      $("#cantParcial9").val(respuesta["parcial9"]);
      $("#cantDepartamento9").val(respuesta["departamentoParcial9"]);
      $("#cantParcial10").val(respuesta["parcial10"]);
      $("#cantDepartamento10").val(respuesta["departamentoParcial10"]);
      $("#cantParcial11").val(respuesta["parcial11"]);
      $("#cantDepartamento11").val(respuesta["departamentoParcial11"]);
      $("#cantParcial12").val(respuesta["parcial12"]);
      $("#cantDepartamento12").val(respuesta["departamentoParcial12"]);

       var parcial1 = document.getElementById("cantParcial1").value;
      var parcial2 = document.getElementById("cantParcial2").value;
      var parcial3 = document.getElementById("cantParcial3").value;
      var parcial4 = document.getElementById("cantParcial4").value;
      var parcial5 = document.getElementById("cantParcial5").value;
      var parcial6 = document.getElementById("cantParcial6").value;
      var parcial7 = document.getElementById("cantParcial7").value;
      var parcial8 = document.getElementById("cantParcial8").value;
      var parcial9 = document.getElementById("cantParcial9").value;
      var parcial10 = document.getElementById("cantParcial10").value;
      var parcial11 = document.getElementById("cantParcial11").value;
      var parcial12 = document.getElementById("cantParcial12").value;


      var suma = parseFloat(parcial1) + parseFloat(parcial2) + parseFloat(parcial3) + parseFloat(parcial4) + parseFloat(parcial5) + parseFloat(parcial6) + parseFloat(parcial7) + parseFloat(parcial8) + parseFloat(parcial9) + parseFloat(parcial10) + parseFloat(parcial11) + parseFloat(parcial12);
      
      $("#totalParciales").val("$"+suma.toFixed(2));
      
       var valor = document.getElementById("cantParciales").value;
         
         if (valor == 0) {
           
           div1 = document.getElementById("1Par");
              div1.style.display = "none";

         div2 = document.getElementById("2Par");
           div2.style.display = "none";

        div3 = document.getElementById("3Par");
           div3.style.display = "none";

        div4 = document.getElementById("4Par");
           div4.style.display = "none";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

         }

         else if (valor == 1) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "none";

        div3 = document.getElementById("3Par");
           div3.style.display = "none";

        div4 = document.getElementById("4Par");
           div4.style.display = "none";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";


        }else if (valor == 2) {
         
        div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "none";

        div4 = document.getElementById("4Par");
           div4.style.display = "none";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 3) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "none";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 4) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "none";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 5) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "none";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 6) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "none";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 7) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "none";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 8) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "none";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }
        else if (valor == 9) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "";

        div10 = document.getElementById("10Par");
           div10.style.display = "none";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 10) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "";

        div10 = document.getElementById("10Par");
           div10.style.display = "";

        div11 = document.getElementById("11Par");
           div11.style.display = "none";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 11) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "";

        div10 = document.getElementById("10Par");
           div10.style.display = "";

        div11 = document.getElementById("11Par");
           div11.style.display = "";

        div12 = document.getElementById("12Par");
           div12.style.display = "none";

        }else if (valor == 12) {

         div1 = document.getElementById("1Par");
              div1.style.display = "";

         div2 = document.getElementById("2Par");
           div2.style.display = "";

        div3 = document.getElementById("3Par");
           div3.style.display = "";

        div4 = document.getElementById("4Par");
           div4.style.display = "";

        div5 = document.getElementById("5Par");
           div5.style.display = "";

        div6 = document.getElementById("6Par");
           div6.style.display = "";

        div7 = document.getElementById("7Par");
           div7.style.display = "";

        div8 = document.getElementById("8Par");
           div8.style.display = "";

        div9 = document.getElementById("9Par");
           div9.style.display = "";

        div10 = document.getElementById("10Par");
           div10.style.display = "";

        div11 = document.getElementById("11Par");
           div11.style.display = "";

        div12 = document.getElementById("12Par");
           div12.style.display = "";

        }
    
    }


  })


})