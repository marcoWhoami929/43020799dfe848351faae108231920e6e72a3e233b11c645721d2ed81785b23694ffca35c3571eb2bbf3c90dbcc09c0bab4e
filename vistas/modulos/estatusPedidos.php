<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["perfil"] == "Almacen" || $_SESSION["perfil"] == "Laboratorio de Color" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Compras" || $_SESSION["perfil"] == "Logistica" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Contabilidad"){



}else {
echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      ESTATUS DE PEDIDOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">ESTATUS DE PEDIDOS</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box" style="z-index: 0">

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
         <br>
         <br>
         <br>
            
            
      </div>
      
      <div class="box-body">
      <div class="box-tools">
      

          <?php 

            if ($_SESSION["grupo"] == "Generador" || $_SESSION["grupo"] == "Administrador" || $_SESSION["grupo"] == "Editor" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
              echo '<a href="vistas/modulos/reportes.php?reportes=atencionaclientes">

            <button class="btn btn-info" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true" ></i>Reporte</button>

          </a>';

            }else{
              echo '<a href="vistas/modulos/reportes.php?reportes=atencionaclientes">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
            }

          ?>

        </div>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaEstatus" width="100%" id="estatusPedidos" style="border: 2px solid #605ca8">
         
          <thead style="background:#605ca8;color: white">
           
           <tr style="">
             
             <th style="width:10px;height: 40px;">#</th>
             <th style="width:10px;height: 40px;">Fecha</th>
             <th style="width:10px;height: 40px;">Serie</th>
             <th style="width:10px;height: 40px;">Folio</th>
             <th style="width:10px;height: 40px;">Serie Factura</th>
             <th style="width:10px;height: 40px;">Folio Factura</th>
             <th style="width:10px;height: 40px;">Cliente</th>
             <th>Estado del pedido</th>
             <th style="width:20px;height: 40px;">Estatus</th>
           </tr> 

          </thead>

        </table>

      </div>

    </div>

  </section>

</div>


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick').datetimepicker({
    format: 'YYYY-MM-DD h:mm:ss',
    ignoreReadonly: true
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick2').datetimepicker({
     format: 'YYYY-MM-DD h:mm:ss',
    ignoreReadonly: true
  });

});
</script>
<script type="text/javascript">

      function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion21"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }

    </script>