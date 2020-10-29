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
      
        LISTA DE GASTOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">LISTA DE GASTOS</li>
    
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
            $folioGasto = $rest[1];
            $folioGasto = str_replace(',','-',$folioGasto);
     
          ?>
        <br>
        <br>
        <CENTER><h2>LISTA DE GASTOS QUE NO HAN SIDO REEMBOLSADOS</h2></CENTER>
        
        <div class="box-tools">
          <input type="hidden" id="folioGasto" value="<?php echo $folioGasto ?>">
        </div>
       
        <table class="table-bordered table-striped dt-responsive tablaGastosCorteCaja" width="100%" id="GastosCorteCaja" style="border: 2px solid #001f3f">
          
          <thead style="background:#001f3f;color: white">
           
           <tr style="">

             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none"></th>
             <th style="border:none">Departamento</th>
             <th style="border:none">Grupo</th>
             <th style="border:none">Subgrupo</th>
             <th style="border:none">Mes</th>
             <th style="border:none">Fecha</th>
             <th style="border:none">Descripción</th>
             <th style="border:none">Importe Gasto</th>
             <th style="border:none">Proveedor</th>
             <th style="border:none">Factura</th>
             <th style="border:none">Impuestos Gasto</th>
             <th style="border:none">Total Gasto</th>

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
var folioGasto = $("#folioGasto").val();
var gastosCorte = $(".tablaGastosCorteCaja").DataTable({
   "ajax":"ajax/tablaGastosCorteCaja.ajax.php?folioGasto="+folioGasto,
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