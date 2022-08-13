<?php
error_reporting(0);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Annet Landa Alvarado" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "Sucursal Acatepec"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        RESUMEN DE COBROS DEL DÍA
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Cobros</li>
    
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

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Annet Landa Alvarado" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "Sucursal Acatepec") {

              if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {
                                        
                  $tabla = "facturasgenerales";

                }else{

                  if (isset($_POST["sucursalCobro"])) {

                    if ($_POST["sucursalCobro"] == "Industrial" || $_POST["sucursalCobro"] == "Mayoreo" || $_POST["sucursalCobro"] == "Rutas") {

                       $tabla = "facturasgenerales";
                    }else{

                       $tabla = "facturastiendas";
                    }

                  }else{
                   
                     $tabla = "facturastiendas";
                  }

                  

                }

               if (isset($_POST["fechaCobro"])) {  
                echo '<a href="vistas/modulos/reportes.php?reporteCobrosTiendas='.$tabla.'&fechaCobro='.$_POST["fechaCobro"].'&sucursalCobro='.$_POST["sucursalCobro"].'">

                       <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

                 </a>';
                echo '<button class="report btn btn-warning btnGenerarPagoBanco"><i class="fa fa-eye" aria-hidden="true"></i>Depositar en Banco</button>';
              }else{
                echo '<a href="vistas/modulos/reportes.php?reporteCobrosTiendas='.$tabla.'">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              }
              
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteCobrosTiendas='.$tabla.'">

                <button class="report btn btn-info" id="report" name="report" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
           <?php
              if ($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Sucursal Acatepec") {?>
                  <?php
                  echo '<div class="container col-lg-12 col-md-12 col-sm-12"><br>
                    <h5 style="font-weight: bold;font-size: 25px">Búsqueda por Día de Cobro</h5><br>
                    <div class="row">
                     <form action="cobrosTiendas" method="POST">
                      <div class="container col-lg-12 col-md-12 col-sm-12">
                        
                        <div class="col-lg-3">';?>
                            <?php
                            if (isset($_POST["fechaCobro"])) {

                               if ($_SESSION["nombre"] == "Diego Ávila") {
                                  
                                
                                 $usuario = "Mayoreo";

                               }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

                                  $usuario = "Rutas";

                               }else if($_SESSION["nombre"] == "Aurora Fernandez"){

                                 $usuario = "Industrial";

                               }else{

                                 $usuario = $_SESSION["nombre"];

                               }
                               echo '<input type="date" id="fechaCobro" name="fechaCobro" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaCobro"])).'" required>';
                               echo '<input type="hidden" name="sucursalCobro" id="sucursalCobro" value="'.$usuario.'">';

                            }else {

                                 echo '<input type="date" id="fechaCobro" name="fechaCobro" class="form-control" placeholder="Fecha" required>';
                                 echo '<input type="hidden" name="sucursalCobro" id="sucursalCobro" value="">';

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
              if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Annet Landa Alvarado" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Credito y Cobranza") {?>
                  <?php
                  echo '<div class="container">
                    <h5 style="font-weight: bold;font-size: 25px">Búsqueda por Sucursal y Fecha de Cobro</h5>
                    <div class="row">
                     <form action="cobrosTiendas" method="POST">
                      <div class="container">
                        
                        <div class="col-lg-3">';?>
                          <?php
                          if (isset($_POST["sucursalCobro"])) {
                             echo '<select class="form-control" name="sucursalCobro" id="sucursalCobro"><option value="'.$_POST["sucursalCobro"].'">'.$_POST["sucursalCobro"].'</option><option value="Sucursal San Manuel">Sucursal San Manuel</option><option value="Sucursal Capu">Sucursal Capu</option><option value="Sucursal Reforma">Sucursal Reforma</option><option value="Sucursal Santiago">Sucursal Santiago</option><option value="Sucursal Las Torres">Sucursal Las Torres</option><option value="Sucursal Acatepec">Sucursal Acatepec</option><option value="Industrial">Industrial</option><option value="Mayoreo">Mayoreo</option><option value="Rutas">Rutas</option></select>';
                            

                          }else {

                               echo '<select class="form-control" name="sucursalCobro" id="sucursalCobro"><option value="Sucursal San Manuel">Sucursal San Manuel</option><option value="Sucursal Capu">Sucursal Capu</option><option value="Sucursal Reforma">Sucursal Reforma</option><option value="Sucursal Santiago">Sucursal Santiago</option><option value="Sucursal Las Torres">Sucursal Las Torres</option><option value="Sucursal Acatepec">Sucursal Acatepec</option><option value="Industrial">Industrial</option><option value="Mayoreo">Mayoreo</option><option value="Rutas">Rutas</option></select>';

                           }
                          ?>

                        <?php
                        echo'</div>';?>
                        <?php
                        echo '<div class="col-lg-3">';?>
                            <?php
                            if (isset($_POST["fechaCobro"])) {
                               echo '<input type="date" id="fechaCobro" name="fechaCobro" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaCobro"])).'" required>';
                              

                            }else {

                                 echo '<input type="date" id="fechaCobro" name="fechaCobro" class="form-control" placeholder="Fecha" required>';

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
         <table class="table-bordered table-striped dt-responsive tablaCobrosTiendas estiloBordesTablas" width="100%" id="cobrosTiendas" >
         
          <thead class="estilosTablas">
           
           <tr style="">
             
                
             <th style="border:none"></th>
             <th style="border:none;width: 250px">Cliente</th>
             <th style="border:none;width: 100px">Efectivo</th>
             <th style="border:none;width: 100px">Tarjeta Débito</th>
             <th style="border:none;width: 100px">Tarjeta Crédito</th>
             <th style="border:none;width: 100px">Transferencia</th>
             <th style="border:none;width: 100px">Cheque Nominativo</th>
             <th style="border:none;width: 100px">Crédito</th>
             <th style="border:none;width: 100px">Por Definir</th>
             <th style="border:none;width: 100px">Total General</th>
           </tr> 

          </thead>
          <tfoot>
              <?php

                if(isset($_POST["fechaCobro"])) {
                    $item = "fechaFactura";
                    $valor = date('Y-m-d', strtotime($_POST["fechaCobro"]));


                }else{

                    
                    $hoy = date("d/m/Y");
                    $fecha = str_replace('/', '-', $hoy);
                    $fechaFinal = date('Y-m-d', strtotime($fecha));
                    
                    $item = "fechaFactura";
                    $valor = $fechaFinal;
                    

                }
                $item2 = "concepto";
                if (isset($_POST["sucursalCobro"]) != "") {
                     if ($_SESSION["nombre"] == "Diego Ávila") {
                                  
                          $usuario = "Mayoreo";

                        }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

                          $usuario = "Rutas";

                        }else if($_SESSION["nombre"] == "Aurora Fernandez"){

                          $usuario = "Industrial";

                        }else{

                          $usuario = $_POST["sucursalCobro"];

                        }
                }else{
                    if ($_SESSION["nombre"] == "Diego Ávila") {
                                  
                      $usuario = "Mayoreo";

                    }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

                      $usuario = "Rutas";

                    }else if($_SESSION["nombre"] == "Aurora Fernandez"){

                      $usuario = "Industrial";

                    }else{

                      $usuario = $_SESSION["nombre"];

                    }
                }
              
                
                switch ($usuario) {

                  case 'Sucursal San Manuel':

                    $valor2 = "Factura San Manuel";

                    break;
                  case 'Sucursal Capu':

                    $valor2 = "Factura Capu";

                    break;
                  case 'Sucursal Reforma':

                    $valor2 = "Factura Reforma";

                    break;
                  case 'Sucursal Las Torres':

                    $valor2 = "Factura Torres";

                    break;
                  case 'Sucursal Santiago':

                    $valor2 = "Factura Santiago";

                    break;
                   case 'Sucursal Acatepec':

                    $valor2 = "Factura Acatepec";

                    break;
                  case 'Mayoreo':

                    $valor2 = "Factura Mayoreo";

                    break;
                  case 'Industrial':

                    $valor2 = "Factura Industrial";

                    break;
                  case 'Rutas':

                    $valor2 = "ALL";
                    
                    break;
                }
             
                $ventasTiendas = ControladorFacturasTiendas::ctrMostrarCobrosDiarioTiendasTotal($item, $valor,$item2, $valor2);

              ?>
             <th style="border:none;color: white;font-weight: bold;text-align: left;font-size: 13px"></th>
             <th style="border:none;color: white;font-weight: bold;text-align: left;font-size: 13px">Total General</th>

             <?php
    
              foreach ($ventasTiendas as $key => $value) {
            
                  echo '<th style="border:none;color: white;font-weight: bold;text-align: left;font-size: 12px">$ '.number_format($value[0],2).' </th>';
                  
           
              }

             ?>
          </tfoot>
        <tbody></tbody>
        </table>

      </div>

    </div>

  
  </section>

</div>
<script type="text/javascript">
  function format (datosFactura) {
      
       var json = datosFactura;
       var types = JSON.parse(json);


       var body = document.getElementsByTagName("body")[0];
       var tblDiv = document.createElement("div");
       tblDiv.setAttribute("class","details-container");
       var tblTable = document.createElement("table");
       tblTable.setAttribute("class","table-bordered table-striped dt-responsive details-table");
       tblTable.setAttribute("style", "width:100%");
       tblTable.setAttribute("id", "tablaDesglose");


 
       tblTable.setAttribute("cellpadding","0");
       tblTable.setAttribute("cellspacing","0");
       tblTable.setAttribute("border","0");
       var tblBody = document.createElement("tbody");

       var array = ['nombreCliente','serie','folio','efectivo','tarjetaDebito','tarjetaCredito','transferenciaElectronica','chequeNominativo','credito','porDefinir','totalGeneral'];
   
            for (var i = 0; i < types.length; i++) {
       
              var hilera = document.createElement("tr");
           
              for (var j = 0; j < 11; j++) {

                var celda = document.createElement("td");
                if (array[j] == "efectivo" || array[j] == "tarjetaDebito" || array[j] == "tarjetaCredito" || array[j] == "transferenciaElectronica" || array[j] == "chequeNominativo" || array[j] == "credito" || array[j] == "porDefinir" || array[j] == "totalGeneral") {
                  var valor = parseFloat(types[i][array[j]]);
                  var textoCelda = document.createTextNode("$ "+valor.toFixed(2)+"");

                }else if(array[j] == "nombreCliente"){

                  var textoCelda = document.createTextNode("");
                
                }else{

                  var textoCelda = document.createTextNode(""+types[i][array[j]]+"");

                }
                
              
                celda.appendChild(textoCelda);
                hilera.appendChild(celda);
              }
           
              tblBody.appendChild(hilera);
            }
            tblTable.appendChild(tblBody);
            tblDiv.appendChild(tblTable);
            // posiciona el <tbody> detach()ebajo del elemento <table>
            return body.appendChild(tblDiv);         
   
  };
</script>
<style type="text/css">
 
.container .details-row td {
  padding: 0;
  margin-right: 0px;


}

.details-container {
  width: 100%;
  height: 100%;
  background: transparent;
 
}

.details-table {
 
  background-color: #FFF;
  margin-right: -20px;
  background: transparent;
}

.title {
  font-weight: bold;
}

.iconSettings, td.details-control:before, tr.shown td.details-control:before {
  margin-top: 5px;
  margin-bottom: 10px;
  font-size: 12px;
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
}

td.details-control {
  cursor: pointer;
  text-align: center;
}
td.details-control:before {
  content: '\2b';
}

tr.shown td.details-control:before {
  content: '\2212';
}

</style>

