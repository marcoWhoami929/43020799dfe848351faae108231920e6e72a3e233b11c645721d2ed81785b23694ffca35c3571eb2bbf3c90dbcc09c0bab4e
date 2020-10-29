<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      REPORTE ACUMULADO
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reporte Acumulado</li>
    
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

         setlocale(LC_ALL, "es_MX");
         $fecha = strftime('%B', strtotime($mes));
         $diaLetra = strftime('%A', strtotime($dia));

         echo "<h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3>";

         ?>

         <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
        

      </div>

      <div class="box-body">
        <br>
        
        
        <br>
        <CENTER><h2>REPORTE ACUMULADO</h2></CENTER>
    
  
        <table class="table-bordered table-striped dt-responsive reportAcumulado" width="100%" id="reportAcumulado" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             
             <th rowspan="2" style="border: none;">Agente Ventas</th>
             <th colspan="2" style="border:none">Pedido</th>
             <th colspan="2" style="border:none">Facturado</th>
             <th colspan="2" style="border:none">Diferencia</th>
             <th rowspan="2" style="border:none">Surtimiento</th>
             <th rowspan="2" style="border:none">Indicador</th>

             </tr> 
            <tr>
             <th style="border:none">PZ</th>
             <th style="border:none">Monto</th>
              <th style="border:none">Pz</th>
              <th style="border:none">Monto</th>
              <th style="border:none">Pz</th>
              <th style="border:none">Monto</th>
             
           </tr>

          </thead>
           </tr> 

          </thead>
        </table>

         <div id="container4" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col col-lg-6"></div>
         <div id="container5" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col col-lg-6"></div>

                <?php
                include("inicio/graficoAcumAnual1.php");
                include("inicio/graficoAcumAnual2.php");
                ?>

      </div>

      </div>

    </div>

  
  </section>

</div>
          