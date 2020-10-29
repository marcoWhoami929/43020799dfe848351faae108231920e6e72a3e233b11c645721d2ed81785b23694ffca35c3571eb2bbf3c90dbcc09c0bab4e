<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "José Martinez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        LISTA DE ABONOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">LISTA DE ABONOS</li>
    
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
        <br>
        
        
        <br>
     
        
        <div class="box-tools">

        <?php 

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "José Martinez") {
              
              echo '<a href="vistas/modulos/reportes.php?reporteAbonos=abonos">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteAbonos=abonos">

                <button class="report btn btn-info" id="report" name="report" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
  
        </div>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaAbonosDocumentos" width="100%" id="abonosDocumentos" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border:none">Serie Abono</th>
             <th style="border:none">Folio Abono</th>
             <th style="border:none">Movimiento Banco</th>
             <th style="border:none">Serie Factura</th>
             <th style="border:none">Folio Factura</th>
             <th style="border:none">Abono</th>
             <th style="border:none">Pendiente</th>
             <th style="border:none">Fecha</th>
             <th style="border:none">Concepto</th>
             <th style="border:none">Usuario</th>

           </tr> 

          </thead>
        </table>

      </div>

    </div>

  
  </section>

</div>
