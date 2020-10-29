<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "José Martinez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        LISTA DE CORTES
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Cortes De Caja</li>
    
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
        <CENTER><h2></h2></CENTER>
        
        <div class="box-tools">

        <?php 

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "José Martinez") {
              
              if (isset($_POST["fechaCorte"])) {
                echo '<a href="vistas/modulos/reportes.php?reporteCorte=cortecaja&fechaCorte='.$_POST["fechaCorte"].'">

                <button class="report btn btn-info" id="report" name="report" ><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              }else{
                echo '<a href="vistas/modulos/reportes.php?reporteCorte=cortecaja">

                <button class="report btn btn-info" id="report" name="report" ><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              }
              
              if ($_SESSION["perfil"] != "Administrador General" && $_SESSION["nombre"] != "José Martinez") {
                 echo '<a href="nuevoCorteCaja"><button type="button" class="btn btn-success">Nuevo Corte <i class="fa fa-plus-circle " aria-hidden="true"></i></button></a>';
              }
              else{

              }
             

              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteCorte=cortecaja">

                <button class="report btn btn-info" id="report" name="report"  disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
          <div class="container">
              <h5 style="font-weight: bold;font-size: 25px">Búsqueda por dia</h5>
              <div class="row">
               <form action="corteCaja" method="POST">
                <div class="container">
                  <div class="col-lg-3">
                    <?php
                    if (isset($_POST["fechaCorte"])) {
                       echo '<input type="date" id="fechaCorte" name="fechaCorte" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaCorte"])).'">';
                       

                    }else {

                         echo '<input type="date" id="fechaCorte" name="fechaCorte" class="form-control" placeholder="Fecha" required>';

                     }
                    ?>


                  </div>
                  <div class="col-lg-2">
                    <input type="submit" class="btn btn-info" value="BUSCAR">
                  </div>
                   
                </div>
              </form>
              </div>
              
             </div>
        </div>
        <br>

        <br>

        <table class="table-bordered table-striped dt-responsive tablaCortesDeCaja" width="100%" id="cortesDeCaja" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border:none">Fecha De Corte</th>
             <th style="border:none">Importe Venta</th>
             <th style="border:none">Gastos</th>
             <th style="border:none">Fondo De Caja</th>
             <th style="border:none">Diferencia</th>
             <th style="border:none">Total</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Sucursal</th>
             <th style="border:none">Resumen Corte</th>
             <th style="border:none">Reporte</th>
           </tr> 

          </thead>
        </table>
       
          <!-- Modal Detalle Corte De Caja-->
          <div class="modal fade" id="modalDetalleCorte" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width: 90%">
              <div class="modal-content">
                <div class="modal-header" style="background:#001f3f;color: white">
                  <h3 class="modal-title" id="exampleModalLabel">Detalle Corte Caja</h3>

                  <button type="button" class="close  btnCerrarVistaDetalle" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <center>    
                    <h6>A continuación se detalla el corte de caja seleccionado.</h6>
                    <h4>----------------------------------------------------------------------------------------------------------</h4>
                    <br>

                    <h3>Corte de Caja <span class="nombreUsuario" id="usuarioCorte"></span> del <span class="nombreUsuario" id="fechaCorteVistaDetalle"></span></h3>
                    
                    <h4>Iniciado <span id="fechaCorteIniciadoDetalle" class="nombreUsuario"></span> a <span id="fechaCorteProcesoDetalle" class="nombreUsuario"></span></h4>
                    <h4><span id="tiempoProcesoCorteDetalle" class="nombreUsuario"></span></h4>
                
                    <br>
                    <h4>----------------------------------------------------------------------------------------------------------</h4>
                    </center> 
                  </div>
             
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="table-responsive">
                              <table class="table" id="tablaFormasPagoDetalle" cellspacing="0" cellpadding="0">
                                    
                              </table>
                        </div>
                        <br>
                        
                        <div class="col-lg-4 col-md-4 col-sm-4">
                           <strong><i class="fa fa-dollar" style="float: left"></i> Importe Venta</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                           <input type="text" id="importeVentaTotalDetalle" class="form-group input-sm" readonly>
                        </div>
                        <div class="co-lg-2 col-md-2 col-sm-2">
                          <button type='button' class='btn btn-success' id='btnVerImporteVentaDetalle'><i class='fa fa-eye'></i></button>
                        </div>
                        <br>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                           <strong><i class="fa fa-money" style="float: left"></i> Gastos</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                           <input type="text" id="gastosTotalDetalle" class="form-group input-sm" readonly>
                        </div>
                        <div class="co-lg-2 col-md-2 col-sm-2">
                          <button type='button' class='btn btn-success' id='btnVerGastosSucursalDetalle'><i class='fa fa-eye'></i></button>
                           
                        </div>
                        <br>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                           <strong><i class="fa fa-calculator" style="float: left"></i> Fondo Caja</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                           <input type="text" id="fondoCajaTotalDetalle" class="form-group input-sm" readonly>
                        </div>
                        <div class="co-lg-2 col-md-2 col-sm-2">
                            
                        </div>
                        <br>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                           <strong><i class="fa fa-minus-square" style="float: left"></i> Diferencia</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="text" id="diferenciaTotalDetalle" class="form-group input-sm" readonly>
                        </div> 
                        <div class="co-lg-2 col-md-2 col-sm-2">
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                             <strong>Observaciones corte:</strong>
                          </div>
                         
                          <textarea id="observacionesCorteDetalle" rows="4" cols="50"  readonly></textarea>
                        </div>
                      
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="table-responsive">
                              <table class="table" id="tablaEfectivoDenominacionesDetalle" cellspacing="0" cellpadding="0"></table>
                      </div>
                          
                      
                    </div>
                    
                  </div>
                </div>
                <br>
                <div class="modal-footer">
            
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <button type="button" class="btn btn-primary btnCerrarVistaDetalle" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>   
                     
                </div>
              </div>
            </div>
          </div>
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
<style type="text/css" >
  .denominaciones {

        font-weight: bold;
        color: black;
        font-size: 14px;
        margin:0px 0 0px 0;


      }
      .valorDenominaciones {

        font-weight: bold;
        color: #2667ce;
        font-size: 14px;
        margin:0px 0 0px 0;
        

      }
      .nombreUsuario{

        font-weight: bold;
        color: #2667ce;
        font-size: 18px;

      }
       #observacionesCorte {
        width:100%;
        height:100%;
        border: 2px dotted #000099;
      }
      
      table {     
    
        width: 500px; 
        text-align: left;   
        border-spacing: 0 !important;
        border-collapse: collapse !important;

      }

      td {    
       
        background: white;     
        color: #669;    

      }

      tr:hover td { 
        background: #d0dafd; 
        color: #339; 
      }

</style>
