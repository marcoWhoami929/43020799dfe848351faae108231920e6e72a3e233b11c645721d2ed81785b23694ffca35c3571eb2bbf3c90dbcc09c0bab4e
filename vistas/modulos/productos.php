<?php

if($_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["perfil"] == "Administrador General"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    GESTOR DE PRODUCTOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">PRODUCTOS</li>
    
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
          <CENTER><h2>LISTA DE PRODUCTOS</h2></CENTER>
         
         <div class="box-tools">
          <a href="vistas/modulos/reportes.php?reporte=productos">

            <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>
          <button type="button" class="btn btn-success" onclick="actualizarProductos()"   data-toggle="modal" data-target="#modalActualizacionProductos" data-dismiss="modal" data-backdrop="false"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar</button>
        

        </div>
        <br>

        <br>
        <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%" id="productos">
         
          <thead>
           
           <tr>
             
             <th>#</th>
             <th>Código</th>
             <th>Descripción</th>
             <th>Catálogo</th>
             <th>Base</th>
             <th>Cubeta</th>
             <th>Galón</th>
             <th>Litro</th>
             <th>500 ML</th>
             <th>250 ML</th>
             <th>125 ML</th>
             <th>Distribuidor</th>
             <th>Estado</th>
             <th>Clave Sat</th>
             <th>Unidad Medida</th>

           </tr> 

          </thead>

        </table>
        </div>
        

      </div>

    </div>

  
  </section>

</div>
<div class="modal fade" id="modalActualizacionProductos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header estilosTablas">
                  <center><h4>Procesando Datos</h4></center>
                </div>
                <div class="modal-body">

                  <div class="alert alert" role="alert" id="loaderProductos" style="display: none;opacity:1;background: white;height: 250px">
                           <center><span id="productosTextLoader" style="font-weight: bold;font-size: 17px;color:#001f3f"></span></center>
                           <center><img src="vistas/img/plantilla/loader.gif" alt="img-responsive" style="width: 100%;"></center>

                  </div>
                  <span id="processLoaderProductos"></span>
                </div>

              </div>
            </div>
          </div>