<?php

if($_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["nombre"] == "Jesús Serrano" ||  $_SESSION["perfil"] == "Administrador General"  && $_SESSION["cotizador"] == "1"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    GESTOR DE PROSPECTOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">PROSPECTOS</li>
    
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
     
        <div class="logi" id="logi">
          <CENTER><h2>LISTA DE PROSPECTOS</h2></CENTER>
         
         <div class="box-tools">
          <a href="vistas/modulos/reportes.php?reporte=prospectos">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>
        

        </div>
        <br>

        <br>
        <table class="table table-bordered table-striped dt-responsive tablaProspectos" width="100%" id="prospectos">
         
          <thead>
           
           <tr>
             
             <th>#</th>
             <th>Código Prospecto</th>
             <th>Rfc</th>
             <th>Nombre del Prospecto</th>
             <th>Fase</th>
             <th>Agente</th>
             <th>Fecha Ingreso</th>
      


           </tr> 

          </thead>

        </table>
        </div>
        

      </div>

    </div>

  
  </section>

</div>
