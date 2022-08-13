<?php
error_reporting(E_ALL);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Sucursal Acatepec"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        PREVISUALIZACION DE FACTURAS DEL DIA
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Previsualización</li>
    
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
      
        <div class="box-tools">

        <center><button class="btn btn-info" id="btnObtenerFacturasComercial" style="width: 100px;height: 100px"  data-toggle="modal" data-target="#modalObtenerFacturasComercial" data-dismiss="modal" data-backdrop="false" sucursal="<?php echo $_SESSION['nombre'] ?>"><img src="vistas/img/plantilla/obtenerFacturas.png" width="100%" ></button></center>
        </div>
        <br>
        <div class="alert alert-dismissible animated fadeInDown" role="alert" id="successFormaPago" style="display: none;z-index: 1001;position: absolute;">
            <span id="msgSuccessOrError"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="container  col-lg-12 col-md-12 col-sm-12" id="contenedorPrevisualizacion">
            
            <table class="table-bordered table-striped dt-responsive tablaPrevisualizacionFacturas estiloBordesTablas" width="100%" id="previsualizacionFacturas" >
         
                  <thead class="estilosTablas">
                   
                   <tr style="">
                     
                     <th style="width:20px;height: 40px;border:none">#</th>
                     <th style="border:none">Fecha Factura</th>
                     <th style="border:none">Serie</th>
                     <th style="border:none">Folio</th>
                     <th style="border:none">Forma Pago</th>
                     <th style="border:none">Codigo Cliente</th>
                     <th style="border:none">Rfc</th>
                     <th style="border:none">Cliente</th>
                     <th style="border:none">Vencimiento</th>
                     <th style="border:none">Dias Crédito</th>
                     <th style="border:none">Neto</th>
                     <th style="border:none">Descuento</th>
                     <th style="border:none">Impuesto</th>
                     <th style="border:none">Total</th>
                    

                   </tr> 

                  </thead>
                </table>
                
       
        </div>

      </div>

    </div>

  
  </section>

</div>
<div class="modal fade" id="modalObtenerFacturasComercial" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header estilosTablas">
                  <center><h4>Procesando Datos</h4></center>
                </div>
                <div class="modal-body">

                  <div class="alert alert" role="alert" id="loaderFacturas" style="display: none;opacity:1;background: white;height: 250px">
                           <center><span id="facturasTextLoader" style="font-weight: bold;font-size: 17px;color:#001f3f"></span></center>
                           <center><img src="vistas/img/plantilla/loader.gif" alt="img-responsive" style="width: 100%;"></center>

                  </div>
                  <span id="processLoaderFacturas"></span>
                </div>

              </div>
            </div>
          </div>

    <script>
   
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
     
    </script>
 