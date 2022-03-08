e<?php
error_reporting(0);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        EFECTIVO A DEPOSITAR EN BANCO
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">EFECTIVO</li>
    
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
      <br>

      <a href="javascript:imprSelec('impresionBanco')" ><button class="report btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Efectivo A Depositar</button></a>
      <div class="box-body" id="impresionBanco">
         <?php
            $url = $_SERVER['REQUEST_URI'];
            $rest = explode('=',$url);
            $fecha = substr($rest[1],0,10);
            $sucursal = $rest[2];
            $sucursal = str_replace("-"," ",$sucursal);

            $fechaCobro = $fecha;

            if ($_SESSION["nombre"] == "Diego Ávila") {
                                  
              $banco = "0449546278";
              $sesion = "Mayoreo";

            }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

              $banco = "0188153450";
              $sesion = "Rutas";

            }else if($_SESSION["nombre"] == "Aurora Fernandez"){

              $banco = "0449546278";
              $sesion = "Industrial";

            }else{

              
              $sesion = $sucursal;

              if ($sesion == 'Industrial' || $sesion == 'Mayoreo' || $_SESSION["nombre"] == 'Sucursal Santiago') {
                $banco = "0449546278";
              }else if($sesion == 'Rutas'){
                $banco = "0188153450";
              }else{
                $banco = "0162310198";
              }

            }

          
            echo '<input type="hidden" id="fechaCobro" class="form-control input-sm" value="'.$fechaCobro.'">';
            echo '<input type="hidden" id="sucursal" class="form-control input-sm" value="'.$sucursal.'">';
          ?>
        <br>
        <br>
        <h3>SAN FRANCISCO DEKKERLAB</h3>
        <h4>EFECTIVO A DEPOSITAR</h4>
        <span style="color: black;font-weight: bold;text-transform: uppercase;"><?php echo $sesion ?> <?php echo $fechaCobro ?></span>
        <br>
        <span style="color: black;font-weight: bold;"></span>
        <div class="box-tools">
          <br>

          <h3 style="color: black;font-weight: bold;">DEPOSITAR A LA CUENTA: <span style="color: #2667ce;font-weight: bold"><?php echo $banco?></span></h3>
        </div>
        <br>

       
        <table class="table-bordered table-striped dt-responsive tablaEfectivoDeposito" width="100%" id="efectivoDeposito" style="border: 2px solid #001f3f">
          
          <thead style="background:#001f3f;color: white">
           
           <tr style="">

             <th style="border:none">Cliente</th>
             <th style="border:none">Total Efectivo</th>
   
           </tr> 

          </thead>
          <tfoot>
              <?php

                if(isset($fechaCobro)) {
                    $item = "fechaFactura";
                    $valor = date('Y-m-d', strtotime($fechaCobro));


                }else{

                    
                    $hoy = date("d/m/Y");
                    $fecha = str_replace('/', '-', $hoy);
                    $fechaFinal = date('Y-m-d', strtotime($fecha));
                    
                    $item = "fechaFactura";
                    $valor = $fechaFinal;

                }
                $item2 = "concepto";
                
                $usuario = $sucursal;
                
              
                
                switch ($usuario) {
                  case 'Sucursal San Manuel':

                    $valor2 = "'FACTURA SAN MANUEL V 3.3','Factura San Manuel'";

                    break;
                  case 'Sucursal Capu':

                    $valor2 = "'FACTURA CAPU V 3.3','Factura Capu'";

                    break;
                  case 'Sucursal Reforma':

                    $valor2 = "'FACTURA REFORMA V 3.3','Factura Reforma'";

                    break;
                  case 'Sucursal Las Torres':

                    $valor2 = "'FACTURA TORRES','Factura Torres'";

                    break;
                  case 'Sucursal Santiago':

                    $valor2 = "'FACTURA SANTIAGO V 3.3','Factura Santiago'";

                    break;
                  case 'Mayoreo':

                    $valor2 = "'FACTURA MAYOREO V 3.3','Factura Mayoreo'";

                    break;
                  case 'Industrial':

                    $valor2 = "'FACTURA INDUSTRIAL V 3.3','Factura Industrial'";

                    break;
                  case 'Rutas':

                    $valor2 = "ALL";

                    break;
                }

                //$ventasTiendas = ControladorFacturasTiendas::ctrMostrarCobrosDiarioTiendasTotal($item, $valor,$item2, $valor2);
                $ventasTiendas = ControladorFacturasTiendas::ctrMostrarTotalCobrosDiarios($item, $valor,$item2, $valor2);
                $efectivo = 0;
                foreach ($ventasTiendas as $key => $value) {
                    $efectivo += $value["efectivo"];
                }

              ?>
             <th style="border:none;color: blue;font-weight: bold;text-align: left;font-size: 17px">Total General</th>
             <th style="border:none;color: blue;font-weight: bold;text-align: left;font-size: 17px"><?php echo '$ '.number_format($efectivo,2).'' ?></th>
            
          </tfoot>
        </table>


      </div>

    </div>

  
  </section>

</div>
<script type="text/javascript">
/*=============================================
TABLA DE EFECTIVO A DEPOSITAR EN BANCO
=============================================*/
var fechaCobro = $("#fechaCobro").val();
var sucursal = $("#sucursal").val();
var importesVenta = $(".tablaEfectivoDeposito").DataTable({
   "ajax":"ajax/tablaDepositoEfectivoBanco.ajax.php?fechaCobro="+fechaCobro+"&sucursal="+sucursal,
   //"ajax":"ajax/tablaFacturacionTiendas.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 50,
    "fixedHeader": true,
    "bLengthChange": false ,
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
<script type="text/javascript">

  function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
  }

</script>