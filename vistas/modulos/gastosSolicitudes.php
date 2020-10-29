<?php
error_reporting(E_ALL);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "José Martinez"){



}else {
  echo '<script>

  window.location = "tableroCortes";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        APROBACIÓN DE GASTOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Solicitud de Aprobación de Gastos</li>
    
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
   
        <div class="col-lg-12">
          <div class="col-lg-3 col-md-3 col-sm-3">
            <button type='button' class='btn btn-warning'><i class='fa fa-flag fa-1x' aria-hidden='true' style='color:white'></i></button>&nbsp;<span><strong>Aprobar Gasto</strong></span>

          </div>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <button type='button' class='btn btn-success'><i class='fa fa-flag fa-1x' aria-hidden='true' style='color:white'></i></button>&nbsp;<span><strong>Gasto Aprobado</strong></span>
          </div>
        </div>
        <br>
        <br>
        <br>
        <div class="box-tools">

        <?php 

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "José Martinez") {
              
              echo '<a href="vistas/modulos/reportes.php?reporteGastos=gastos">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteGastos=gastos">

                <button class="report btn btn-info" id="report" name="report" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
       
        </div>
        <br>
        
        <br>
        <div class="alert alert-dismissible" role="alert" id="solicitudAprobacion" style="display: none">
            <span id="mensajeSolicitudAprobacion"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <table class="table-bordered table-striped dt-responsive tablaGastosSolicitudes" width="100%" id="gastosSolicitudes" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             <th style="width:20px;height: 40px;border:none;">N°</th>
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
             <th style="border:none">Solicitante</th>
             <th style="border:none">Retención IVA Arrendamiento</th>
             <th style="border:none">Retencion ISR Arrendamiento</th>
             <th style="border:none">Retención IVA Flete</th>
             <th style="border:none">Retencion ISR Flete</th>
             <th style="border:none">Retención IVA Honorarios</th>
             <th style="border:none">Retencion ISR Honorarios</th>
            

           </tr>

          </thead>
          
        </table>
     

      </div>

    </div>

  
  </section>

</div>

   