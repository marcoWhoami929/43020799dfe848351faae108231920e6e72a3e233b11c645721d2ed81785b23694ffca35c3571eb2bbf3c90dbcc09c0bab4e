<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Sucursal Capu" ){



}else {
  echo '<script>

              swal({

                type: "error",
                title: "¡No tiene los privilegios para realizar esta acción!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

              }).then(function(result){

                if(result.value){
                
                  window.location = "inicio";

                }

              });
            

            </script>'; 

}

?>
<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    LISTA DE COTIZACIONES
    
    </h1>

    <ol class="breadcrumb">

      <li><a href="cotizador"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Cotizaciones</li>

    </ol>
   

  </section>
  <!-- content-header -->

  <!-- content -->
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

         echo "<div class='col-lg-6'><h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3></div>";


         ?>

         <div class="col-lg-12">
           <center><h2 style="font-weight: bold;color:tomato;">COTIZADOR</h2></center>
         </div>
         <div class="col-lg-6">
            <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
         </div>

      </div>

      <div class="box-body">
        <center><img src="vistas/img/plantilla/logo.png" width="20%"></center>
        <br>
        <br>

        <table class="table-bordered table-striped dt-responsive verCotizaciones" id="verCotizaciones" class="display" style="width:99%;border: 2px solid #00c0ef">
                    <thead style="background:#00c0ef;color: white">
                        <tr>
                            <th>Serie</th>
                            <th>Folio</th>
                            <th>Fecha Cotización</th>
                            <th>Fecha Vencimiento</th>
                            <th>Fecha Entrega</th>
                            <th>Partidas</th>
                            <th>Unidades</th>
                            <th>Nombre Cliente</th>
                            <th>Rfc</th>
                            <th>Referencia</th>
                            <th>Observaciones</th>
                            <th>Agente de Venta</th>
                            <th>Status</th>
                            <th>Descuentos</th>
                            <th>Total de Cotización</th>
                            <th>Ver cotización</th>
                            <th>Plantilla Cotización</th>
                            <th>Agente Cotizador</th><!--/*HECHO POR DIEGO-PC*/-->
                        </tr>
                    </thead>
        </table>
        
      </div>

    </div>
      <!-- row -->
    
    <!-- row -->
 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->
<script type="text/javascript">
    function actualiza(){
    $("#cabeceras").load("vistas/modulos/inicio/cajas-superiores.php");
  }
  setInterval( "actualiza()", 1000 );

 $('#link').click(function(event){
    event.preventDefault();
    hola(); 
});
 function notificacion(){
      swal({
            type: "error",
            title: "!!!UPSS!!La cotización se encuentra cancelada.",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
            }).then(function(result) {
              
              })
 }
</script>
