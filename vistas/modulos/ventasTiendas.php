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
      
        RESUMEN DE VENTAS DEL DÍA
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Ventas</li>
    
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
              if (isset($_POST["fechaVenta"])) {
                echo '<a href="vistas/modulos/reportes.php?reporteVentasTiendas=facturastiendas&fechaVenta='.$_POST["fechaVenta"].'&sucursalVenta='.$_POST["sucursalVenta"].'">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              }else{
                echo '<a href="vistas/modulos/reportes.php?reporteVentasTiendas=facturastiendas">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              }
              
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteVentasTiendas=facturastiendas">

                <button class="report btn btn-info" id="report" name="report"" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
           <?php
              if ($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma") {?>
                  <?php
                  echo '<div class="container col-lg-12 col-md-12 col-sm-12"><br>
                    <h5 style="font-weight: bold;font-size: 25px">Búsqueda por Día de Venta</h5><br>
                    <div class="row">
                     <form action="ventasTiendas" method="POST">
                      <div class="container col-lg-12 col-md-12 col-sm-12">
                        
                        <div class="col-lg-3">';?>
                            <?php
                            if (isset($_POST["fechaVenta"])) {
                               echo '<input type="date" id="fechaVenta" name="fechaVenta" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaVenta"])).'" required>';
                               echo '<input type="hidden" name="sucursalVenta" id="sucursalVenta" value="'.$_SESSION["nombre"].'">';

                            }else {

                                 echo '<input type="date" id="fechaVenta" name="fechaVenta" class="form-control" placeholder="Fecha" required>';
                                 echo '<input type="hidden" name="sucursalVenta" id="sucursalVenta" value="">';

                             }
                            ?>


                          <?php echo'</div>';?>

                        <?php
                        echo '<div class="col-lg-2">
                          <input type="submit" class="btn btn-info" value="BUSCAR">
                        </div>
                         
                      </div>
                    </form>
                    </div>
                    
                   </div>';
              }
              if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "José Martinez") {?>
                  <?php
                  echo '<div class="container">
                    <h5 style="font-weight: bold;font-size: 25px">Búsqueda por Sucursal y Fecha de Venta</h5>
                    <div class="row">
                     <form action="ventasTiendas" method="POST">
                      <div class="container">
                        
                        <div class="col-lg-3">';?>
                          <?php
                          if (isset($_POST["sucursalVenta"])) {
                             echo '<select class="form-control" name="sucursalVenta" id="sucursalVenta"><option value="'.$_POST["sucursalVenta"].'">'.$_POST["sucursalVenta"].'</option><option value="Sucursal San Manuel">Sucursal San Manuel</option><option value="Sucursal Capu">Sucursal Capu</option><option value="Sucursal Reforma">Sucursal Reforma</option><option value="Sucursal Santiago">Sucursal Santiago</option><option value="Sucursal Las Torres">Sucursal Las Torres</option></select>';
                            

                          }else {

                               echo '<select class="form-control" name="sucursalVenta" id="sucursalVenta"><option value="Sucursal San Manuel">Sucursal San Manuel</option><option value="Sucursal Capu">Sucursal Capu</option><option value="Sucursal Reforma">Sucursal Reforma</option><option value="Sucursal Santiago">Sucursal Santiago</option><option value="Sucursal Las Torres">Sucursal Las Torres</option></select>';

                           }
                          ?>

                        <?php
                        echo'</div>';?>
                        <?php
                        echo '<div class="col-lg-3">';?>
                            <?php
                            if (isset($_POST["fechaVenta"])) {
                               echo '<input type="date" id="fechaVenta" name="fechaVenta" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaVenta"])).'" required>';
                              

                            }else {

                                 echo '<input type="date" id="fechaVenta" name="fechaVenta" class="form-control" placeholder="Fecha" required>';

                             }
                            ?>


                          <?php echo'</div>';?>

                        <?php
                        echo '<div class="col-lg-2">
                          <input type="submit" class="btn btn-info" value="BUSCAR">
                        </div>
                         
                      </div>
                    </form>
                    </div>
                    
                   </div>';
              }

             ?>
         
        </div>
        <br>
     
        <br>
        <table class="table-bordered table-striped dt-responsive tablaVentasTiendas" width="100%" id="ventasTiendas" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             <th style="border:none">Cliente</th>
             <th style="border:none">Importe</th>
             <th style="border:none">Impuestos</th>
             <th style="border:none">Total Documento</th>

           </tr> 

          </thead>
          <tfoot>
              <?php

                if(isset($_POST["fechaVenta"])) {
                    $item = "fechaFactura";
                    $valor = date('Y-m-d', strtotime($_POST["fechaVenta"]));


                }else{

                    
                    $hoy = date("d/m/Y");
                    $fecha = str_replace('/', '-', $hoy);
                    $fechaFinal = date('Y-m-d', strtotime($fecha));
                  
                    $item = "fechaFactura";
                    $valor = $fechaFinal;

                }


                $item2 = "concepto";
                if ($_POST["sucursalVenta"] != "") {
                   $usuario = $_POST["sucursalVenta"];
                }else{
                   $usuario = $_SESSION["nombre"];
                }


                switch ($usuario) {
                  case 'Sucursal San Manuel':

                    $valor2 = "FACTURA SAN MANUEL V 3.3";

                    break;
                  case 'Sucursal Capu':

                    $valor2 = "FACTURA CAPU V 3.3";

                    break;
                  case 'Sucursal Reforma':

                    $valor2 = "FACTURA REFORMA V 3.3";

                    break;
                  case 'Sucursal Las Torres':

                    $valor2 = "FACTURA TORRES";

                    break;
                  case 'Sucursal Santiago':

                    $valor2 = "FACTURA SANTIAGO V 3.3";

                    break;
                }

                $ventasTiendas = ControladorFacturasTiendas::ctrMostrarVentasDiarioTiendasTotal($item, $valor,$item2, $valor2);
              
                $totalImporte = $ventasTiendas[0]["totalImporte"];
                $totalImpuesto = $ventasTiendas[0]["totalImpuesto"];
                $totalGeneral = $ventasTiendas[0]["totalGeneral"];




              ?>
             <th style="border:none;color: blue;font-weight: bold;text-align: left;font-size: 17px">Total General</th>
             <th style="border:none;color: blue;font-weight: bold;text-align: right;font-size: 17px">$ <?php echo number_format($totalImporte,2) ?></th>
             <th style="border:none;color: blue;font-weight: bold;text-align: right;font-size: 17px">$ <?php echo number_format($totalImpuesto,2) ?></th>
             <th style="border:none;color: blue;font-weight: bold;text-align: right;font-size: 17px">$ <?php echo number_format($totalGeneral,2) ?></th>

          </tfoot>
        </table>

      </div>

    </div>

  
  </section>

</div>

