<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Reporte de Cotizaciones
    
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Reporte de cotizaciones</li>

    </ol>
   

  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content">
    <div class="box">

      <div class="box-header with-border">
        
         <?php 


         $dia = date("l");
         $mes = date("l"); 
         $dianumero = date("d");
         $año = date("Y");

         setlocale(LC_ALL, "es_MX.UTF-8");
         $fecha = strftime('%B', strtotime($mes));
         $diaLetra = strftime('%A', strtotime($dia));

         echo "<div class='col-lg-6'><h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3></div>";


         ?>

         <div class="col-lg-6" >
            <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
         </div>
         
        
          

      </div>

    </div>
      <!-- row -->


    <div class="row">

      <div class="container">
              <h5 style="font-weight: bold;font-size: 25px">Búsqueda por rango de fechas</h5>
              <div class="row">
               <form action="reporteCotizacion" method="POST" name="ind" id="ind">
                <div class="container">
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <?php
                    if (isset($_POST["fechaInicio"])) {
                       echo '<input type="text" id="fechaInicio" name="fechaInicio" class="form-control" placeholder="Fecha Inicio" value="'.$_POST["fechaInicio"].'">';
                    }else {

                         echo '<input type="text" id="fechaInicio" name="fechaInicio" class="form-control" placeholder="Fecha Inicio">';
                     }
                    ?>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3">
                   <?php
                     if (isset($_POST["fechaFinal"])) {
                        echo '<input type="text" id="fechaFinal" name="fechaFinal" class="form-control" placeholder="Fecha Final" value="'.$_POST["fechaFinal"].'">';
                      }else {
                          echo '<input type="text" id="fechaFinal" name="fechaFinal" class="form-control" placeholder="Fecha Final">';
                      }
                    ?>
                   
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <input type="submit" class="btn btn-info" value="BUSCAR">
                  </div>
                   
                </div>
              </form>
              </div>
       </div>
             <br>
             <br>
    </div>
    <!-- row   CODIGO DE CLIENTE -->

     <div class="row">

      <div class="container">
              <h5 style="font-weight: bold;font-size: 25px">Búsqueda por código de cliente</h5>
              <div class="row">
               <form action="reporteCotizacion" method="POST" name="ind" id="ind">
                <div class="container">
                  <div class="col-lg-3 col-md-3 col-sm-3">
                  <?php
                    if (isset($_POST["codigoCliente"])) {
                       echo '<select class="listaCliente"  placeholder="codigo" required="true" style="width: 220px;margin-left: 20px;" onchange="mostrarCliente(this.value)" onkeypress="return pulsar(event)">

                       <option value="'.$_POST["codigoCliente"].'">'.$_POST["codigoCliente"].'</option>
                       </select>';

                       echo '<input type="hidden" id="codigoCliente" name="codigoCliente" class="form-control" placeholder="codigo" value="'.$_POST["codigoCliente"].'" >';


                    }else {

                        echo '<select class="listaCliente"  placeholder="codigo" required="true" style="width: 220px;margin-left: 20px;" onchange="mostrarCliente(this.value)" onkeypress="return pulsar(event)">

                       <option></option>
                       </select>';

                       echo '<input type="hidden" id="codigoCliente" name="codigoCliente" class="form-control" placeholder="codigo" value="'.$_POST["codigoCliente"].'">';

                    }
              

                  ?>
                    
                   
                  </div>
                 
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <input type="submit" class="btn btn-info" value="BUSCAR">
                  </div>
                   
                </div>
              </form>
              </div>
               
       </div>
    </div>

  <!---------------------->
  
  <div class="row" style="margin-left: 50%; margin-top: -20%">

      <div class="container">
              <h5 style="font-weight: bold;font-size: 25px; margin-top: 15%">Búsqueda por código de producto</h5>
              <div class="row">
               <form action="reporteCotizacion" method="POST" name="ind" id="ind">
                <div class="container">
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <?php
                    if (isset($_POST["codigoProducto"])) {

                      echo '<select class="listaProductos2"  placeholder="codigoProducto" required="true" style="width: 220px;margin-left: 20px;" onchange="mostrarProductos2(this.value)" onkeypress="return pulsar(event)">

                       <option value="'.$_POST["codigoProducto"].'">'.$_POST["codigoProducto"].'</option>
                       </select>';


                        echo '<input type="hidden" id="codigoProducto" name="codigoProducto" class="form-control" placeholder="codigoProducto" value="'.$_POST["codigoProducto"].'" >';
                    }else {

                      echo '<select class="listaProductos2"  placeholder="codigoProducto" required="true" style="width: 220px;margin-left: 20px;" onchange="mostrarProductos2(this.value)" onkeypress="return pulsar(event)">

                       <option></option>
                       </select>';

                       echo '<input type="hidden" id="codigoProducto" name="codigoProducto" class="form-control" placeholder="codigoProducto" value="'.$_POST["codigoProducto"].'">';
                      
                     }
                    ?>
                    
                   
                  </div>
                  
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <input type="submit" class="btn btn-info" value="BUSCAR">
                  </div>
                   
                </div>
              </form>
              </div>     
       </div>
    </div>
    <br><br>

    <!--------------->  

     <table class="table-bordered table-striped dt-responsive reporteCotizacion" id="reporteCotizacion" class="display" style="width:100%;border: 3px solid #00c0ef">
                    <thead style="background:#00c0ef;color: white">
                        <tr>
                            <th>Código</th>
                            <th>Nombre(Producto)</th>
                            <th>Código</th>
                            <th>Nombre(Cliente)</th>
                            <th>Fecha</th>
                            <th>Folio y Serie</th>
                            <th>Dias de Crédito</th>
                            <th>Concepto</th>
                            <th>Moneda</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>% Descto.1</th>
                            <th>Importe Descto.1</th>
                            <th>% Descto.2</th>
                            <th>Importe Descto.2</th>
                            <th>Importe</th>
                            <th>Impuestos</th>
                            <th>Total Documentos</th>
                            <th>Excel</th>
                        </tr>
                    </thead>
                </table>
 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->


  <script>
    if ($("#codigoProducto").val() != "") {

       var codigoProd = $("#codigoProducto").val();

    }else{

      var codigoProd = "";
    }

    if ($("#codigoCliente").val() != "") {

       var codigoCli = $("#codigoCliente").val();

    }else{

      var codigoCli = "";
    }

    if ($("#fechaInicio").val() != "") {

       var fechaInicio = $("#fechaInicio").val();

    }else{

      var fechaInicio = "";
    }

    if ($("#fechaFinal").val() != "") {

       var fechaFinal = $("#fechaFinal").val();

    }else{

      var fechaFinal = "";
    }




    
var tablaCoti = $(".reporteCotizacion").DataTable({
   "ajax":"ajax/tablaReporteCotizaciones.ajax.php?codigoProd="+codigoProd+"&codigoCli="+codigoCli+"&fechaInicio="+fechaInicio+"&fechaFinal="+fechaFinal,
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
  </script>
  <script type="text/javascript">

   $(document).ready(function(){
         $('.listaCliente').select2({
            placeholder: 'Seleccionar',
            allowClear: true,
            tags: true,
            ajax: {
              url: 'vistas/modulos/getClientesJson.php',
              dataType: 'json',
              delay: 250,
              selected: true,
              processResults: function (data) {
                return {
                  results: data

                };
              },
              cache: true
            }

          });


        $('.listaProductos2').select2({
          placeholder: 'Seleccionar',
          allowClear: true,
          open: true,
          tags: true,
          ajax: {
            url: 'vistas/modulos/getProductosJson.php',
            dataType: 'json',
            delay: 250,
            selected: true,
            processResults: function (data) {
              return {
                results: data

              };
            },
            cache: true
          }
        });

   });


    function mostrarCliente(dato) {
        if (dato != "") {

          $("#codigoCliente").val(dato);
          $("#codigoCliente").keyup();
          
        }
      }
      function mostrarProductos2(dato) {
        if (dato != "") {

          $("#codigoProducto").val(dato);
          $("#codigoProducto").keyup();
          
        }
      }
  
     function limpiar(){

        $("#fechaInicio").val("");
        $("#fechaFinal").val("");


     }
      function pulsar(e) { 
        tecla = (document.all) ? e.keyCode :e.which; 
        return (tecla!=13); 
      }
      $('#fechaInicio').mask("99/99/9999", {placeholder: 'DD/MM/YYYY' });
      $('#fechaFinal').mask("99/99/9999", {placeholder: 'DD/MM/YYYY' });
  </script>