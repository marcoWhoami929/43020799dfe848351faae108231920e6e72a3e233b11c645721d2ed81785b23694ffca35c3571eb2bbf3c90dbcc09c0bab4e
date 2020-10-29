<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        IMPORTE DE VENTA
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">IMPORTE DE VENTA</li>
    
    </ol>

  </section>

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

         echo "<h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3>";

         ?>

         <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
        

      </div>

      <div class="box-body">
         <?php
            $url = $_SERVER['REQUEST_URI'];
            $rest = explode('=',$url);
            $fecha = $rest[1];
            $importeVenta = strtok($rest[2], "&");
            $folioCorte = strtok($rest[3], "&");
     
            $fechaFactura = $fecha;
            echo '<input type="hidden" id="fechaFactura" class="form-control input-sm" value="'.$fechaFactura.'">';
             echo '<input type="hidden" id="session" class="form-control input-sm" value="'.$_SESSION["nombre"].'">';
          ?>
        <br>
        <br>
        <CENTER><h2>DOCUMENTOS QUE CORRESPONDEN AL IMPORTE DE VENTA DEL CORTE DE CAJA <span style="color: #2667ce;font-weight: bold">CTC <?php echo $folioCorte ?></span></h2></CENTER>
        
        <div class="box-tools">
         
          <br>
          <br>
          <h3 style="color: black;font-weight: bold;">Importe Venta Total: <span style="color: #2667ce;font-weight: bold"><?php echo $importeVenta?></span></h3>
          
          
        </div>
       
        <table class="table-bordered table-striped dt-responsive tablaImportesVenta" width="100%" id="importesVenta" style="border: 2px solid #001f3f">
          
          <thead style="background:#001f3f;color: white">
           
           <tr style="">

             <th style="border:none">Fecha Factura</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Cliente</th>
             <th style="border:none">Total</th>
             <th style="border:none">Forma Pago</th>
           </tr> 

          </thead>
        </table>


      </div>

    </div>

  
  </section>

</div>
<script type="text/javascript">
/*=============================================
CARGAR LA TABLA DINÁMICA DE LAS FACTURAS IMPORTE VENTA
=============================================*/
var fechaFactura = $("#fechaFactura").val();
var importesVenta = $(".tablaImportesVenta").DataTable({
   "ajax":"ajax/tablaImportesVenta.ajax.php?fechaFactura="+fechaFactura,
   //"ajax":"ajax/tablaFacturacionTiendas.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
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