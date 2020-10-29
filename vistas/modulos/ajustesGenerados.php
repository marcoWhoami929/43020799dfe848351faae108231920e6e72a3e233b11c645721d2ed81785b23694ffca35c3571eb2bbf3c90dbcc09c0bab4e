<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "José Martinez")){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        LISTA DE AJUSTES
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">LISTA DE AJUSTES</li>
    
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

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "José Martinez")) {
              
              echo '<a href="vistas/modulos/reportes.php?reporteAjustes=ajustesaldos">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteAjustes=ajustesaldos">

                <button class="report btn btn-info" id="report" name="report" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
          <br>
          <br>
     
  
        </div>

        <br>
        <table class="table-bordered table-striped dt-responsive tablaAjustesDocumentos" width="100%" id="ajustesDocumentos" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border:none">Serie Ajuste</th>
             <th style="border:none">Folio Ajuste</th>
             <th style="border:none">Saldo Ajustado</th>
             <th style="border:none">Creador Ajuste</th>
             <th style="border:none">Fecha Ajuste</th>
             <th style="border:none">Documento</th>

           </tr> 

          </thead>
        </table>
       
         <div class="modal" id="modalProcesoCargaDatosRecibo" data-backdrop="static" data-keyboard="false" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 80px">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#001f3f;color: white">
                  <center><h4>Generando Recibo</h4></center>
                </div>
                <div class="modal-body">

                  <center><i class="fa fa-spin fa-spinner fa-5x" aria-hidden="true" style="color: blue"></i></center>
                </div>

              </div>
            </div>
          </div>

      </div>

    </div>

  
  </section>

</div>

