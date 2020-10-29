<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Tiendas"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>
    <style>
  #mapa-geocoder { 
    margin-left: 5%;
    width: 90%;
    height: 450px;
    box-shadow: 5px 5px 5px #888;
   

 }
 #verMapa{
  display: none;
 }
</style>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      CARTERA DE CLIENTES
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Cartera de Clientes</li>
    
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

      <br>
      <div class="box-body">
        <br>
        <table class="table-bordered table-striped dt-responsive tablaCarteraClientes" width="100%" style="border: 2px solid #001f3f">
          <thead style="background:#001f3f;color: white;">
             <tr>
             
             <th style="width:10px;">#</th>
             <th>Nombre</th>
             <th>Email</th>
             <th>Taller</th>
             <th>Telefono</th>
             <th>Celular</th>
             <th>Dirección</th>
             <th style="width:100px;">Acciones</th>

           </tr>
          </thead>
        </table>

      </div>

    </div>


 
  </section>

  <div class="modal fade" id="modalVerMapa" tabindex="-1" >
  <div class="modal-dialog" role="document" style="width: 60%">
    <div class="modal-content">

      <div class="modal-header" style="background:#808B96; color:white">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">UBICACIÓN</h5>
      </div>

      <div class="modal-body">
        
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;">Dirección:</span> 
          <input type="text" class="form-control input-lg buscador" id="direccion" name="direccion" readonly style="border: none;background: white;">
          
        </div>
        <button id="mostrarMapa" class="btn btn-success" style="margin-left: 82%;"><i class="fa fa-map-marker" aria-hidden="true"></i> Ver Ubicación</button>
        <div id="verMapa">
          <div id="mapa-geocoder" class="mapa"></div>
        </div>
        
        
      </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php

  $eliminarCliente = new ControladorControlMuestras();
  $eliminarCliente -> ctrEliminarCliente();

?>

<script>
$(document).ready(function() {
  $(window).on("load resize", function() {
    var alturaBuscador = $(".buscador").outerHeight(true),
      alturaVentana = $(window).height(),
      alturaMapa = alturaVentana - alturaBuscador;
    
    $("#mapa-geocoder").css("height", alturaMapa+"px");
  });
});
</script>