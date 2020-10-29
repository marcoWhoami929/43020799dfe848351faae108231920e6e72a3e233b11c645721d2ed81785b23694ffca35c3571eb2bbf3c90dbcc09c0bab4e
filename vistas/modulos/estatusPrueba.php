<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["perfil"] == "Almacen" || $_SESSION["perfil"] == "Laboratorio de Color" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Compras" || $_SESSION["perfil"] == "Logistica" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Generador de Reportes"){



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

         setlocale(LC_ALL, "es_MX");
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

            if ($_SESSION["grupo"] == "Generador" || $_SESSION["grupo"] == "Administrador" || $_SESSION["grupo"] == "Editor") {
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
        <table class="table-bordered table-striped dt-responsive tablaEstatus" width="100%" id="estatusPedidos">
         
          <thead>
           
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

          <tbody>

            <?php

              function seg_a_dhms($seg) {
                $dias = floor($seg / 86400);
                $horas = floor(($seg - ($dias * 86400)) / 3600);
                $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
                $segundos = $seg % 60;
                return "$dias dias, $horas horas, $minutos minutos, $segundos segundos";
                }


            $item = null;
            $valor = null;

            $atencionClientes = ControladorAtencion::ctrMostrarAtencion($item, $valor);
           

             foreach ($atencionClientes as $key => $value){


                 echo ' <tr>
                          <td style="height:40px;">'.($key+1).'</td>';
                         echo '<td>'.$value["fechaPedido"].'</td>';
                         echo '<td>'.$value["serie"].'</td>';
                         echo '<td>'.$value["folio"].'</td>';
                         echo '<td>'.$value["serieFactura"].'</td>';
                         echo '<td>'.$value["folioFactura"].'</td>';
                         echo '<td>'.$value["nombreCliente"].'</td>';

                          if ($value["estado"] == 0 && $value["estadoAlmacen"] == 0 && $value["statusAlmacen"] == 0 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 5 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td style="height:120px;">
                                    <h4><span class="label label-danger">PEDIDO CANCELADO POR CLIENTE</span></h4>
                                       
                                </td>';
                      
                        }
                        

                          if ($value["estado"] == 1 && $value["estadoAlmacen"] == 0 && $value["statusAlmacen"] == 0 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 0 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="active">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                          
                                          <li class="">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                      
                        }else  if ($value["estado"] == 1 && $value["estadoAlmacen"] == 0 && $value["statusAlmacen"] == 0 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="active">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                          
                                          <li class="">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                      
                        } 
                        if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 0 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="active">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                      
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] < 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] <= 4 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0  && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0){
                          echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="paused">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                          
                                           <li class="">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                           <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                        }
                        if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4  && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0) {
                               echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="active">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>
                                          
                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                      
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 0 && $value["estadoCompras"] == 1 && $value["statusCompras"] == 1 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0) {
                               echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="paused">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="paused">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>
                                          
                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                      
                        }
                        else  if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] <= 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] < 4 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0){

                          echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                          
                                          <li class="paused">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }else  if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] <= 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] > 4 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0){

                          echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                          
                                          <li class="paused">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }else  if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] <= 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] > 4 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0){

                          echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                          
                                          <li class="paused">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }
                        if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1  && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="previous visited">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="active">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                      
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] <= 3  && $value["estadoCompras"] == 1 && $value["statusCompras"] <= 4 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] < 1 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0){
                          echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                    
                                           <li class="previous visited">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                           <li class="paused">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                        }
                        
                        if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoLogistica"] == 1 && $value["statusLogistica"] == 2) {
                               echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                          
                                          <li class="previous visited">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="previous visited">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>
                                          
                                          <li class="actives">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                      
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoLogistica"] == 1 && $value["statusLogistica"] < 2){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>
                                              
                                          <li class="previous visited">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="previous visited">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="paused">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] < 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="paused">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                           <li class="active">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="previous visited">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }else  if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] < 3 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="paused">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="active">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }else  if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] < 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] < 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="paused">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                           <li class="active">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="paused">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }
                        /*
                        else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 ){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="paused">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="active">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="paused">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        } 
                        */
                        else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 0 && $value["statusAlmacen"] == 0 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 ){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="paused">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="active">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="previous visited">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }
                        else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] < 4 && $value["estadoLogistica"] == 1  && $value["statusLogistica"] == 2 ){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="paused">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="previous visited">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="actives">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }
                        else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] < 4){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="previous visited">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="paused">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="previous visited">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="actives">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }
                        else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 0 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] < 4){

                           echo '<td style="height:120px;">
                                    <div class="checkout-wrap">
                                        <ul class="checkout-bar">

                                          <li class="visited first">Atención<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoProceso"].'</span></li>
                                          
                                          <li class="paused">Almacén<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoAlmacen"].'</span></li>

                                          <li class="paused">Compras<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoCompras"].'</span></li>

                                          <li class="previous visited">Facturación<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoFacturacion"].'</span></li>

                                          <li class="actives">Logística<br><span style="font-weight: lighter;color: black;font-size: 10px">'.$value["tiempoLogistica"].'</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        }
                        



                      /* ESTATUS DEL PEDIDO   */
                      if ($value["estado"] == 0 && $value["estadoAlmacen"] == 0 && $value["statusAlmacen"] == 0 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 5 &&  $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td>
                                    <span class="label label-danger">Cancelado</span>
                                   
                                       
                                </td></tr>';
                      
                        }
                       
                       if ($value["estado"] == 1 && $value["estadoAlmacen"] == 0 && $value["statusAlmacen"] == 0 &&  $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 0 &&  $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td>
                                    <span class="label label-warning">Pendiente</span>
                                   
                                       
                                </td></tr>';
                      
                        }
                        if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 0 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td>
                                     <span class="label label-danger">Pendiente</span>
                                     
                                </td></tr>';
                      
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 0 && $value["estadoCompras"] == 1 && $value["statusCompras"] == 1 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0) {
                               echo '<td>
                                     <span class="label label-danger">Pendiente</span>
                                     
                                </td></tr>';
                      
                        }
                        else   if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] < 3 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 0 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0){

                            echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';


                        }
                        if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 0 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td>
                                     <span class="label label-info">En proceso</span>
                                     
                                       
                                </td></tr>';
                      
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3  && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] < 1 && $value["estadoCompras"] == 0 && $value["statusCompras"] == 0  && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {

                            echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';

                        }
                        if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 &&  $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0) {
                               echo '<td>
                                     <span class="label label-info">En proceso</span>
                                    
                                       
                                </td></tr>';
                      
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] <= 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] < 4 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0) {
                                
                                 echo '<td>
                                     <span class="label label-warning">Pendiente</span>
                                     
                                </td></tr>';

                        }
                        else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] <= 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] > 4 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0) {
                                
                                 echo '<td>
                                     <span class="label label-warning">Pendiente</span>
                                     
                                </td></tr>';

                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] <= 3 && $value["estadoCompras"] == 1 && $value["statusCompras"] > 4 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoLogistica"] == 0  && $value["statusLogistica"] == 0) {

                          echo '<td>
                                     <span class="label label-warning">Pendiente</span>
                                     
                                </td></tr>';
                          
                        }
                        else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3&& $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] < 4  &&  $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0){
                            echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';
                        }

                        if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 && $value["estadoLogistica"] == 1 && $value["statusLogistica"] == 2) {
                               echo '<td>
                                     <span class="label label-success">Concluido</span>
                                     <span>Tiempo Proceso</span>
                                     <span>'.$datos = seg_a_dhms($value["tiempoFinal"]).'</span>
                                </td></tr>';
                      
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 && $value["estadoLogistica"] == 1 && $value["statusLogistica"] < 2){

                            echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';

                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] < 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4) {
                            
                           echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';


                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] < 3 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4) {
                          
                         echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';

                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] < 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] < 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4) {
                          
                          echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';

                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] < 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4) {
                          
                            echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';

                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4){

                              echo '<td>
                                     <span class="label label-warning">Por concluir</span>
                                     
                                </td></tr>';

                        } else  if ($value["estado"] == 1 && $value["estadoAlmacen"] == 0 && $value["statusAlmacen"] == 0 && $value["estadoFacturacion"] == 0 && $value["statusFacturacion"] == 0 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 && $value["estadoLogistica"] == 0 && $value["statusLogistica"] == 0){

                               echo '<td>

                                     <span class="label label-warning">Pendiente</span>
                                     
                                </td></tr>';
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 0 && $value["statusAlmacen"] == 0 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 ){

                              echo '<td>

                                     <span class="label label-warning">Pendiente</span>
                                     
                                </td></tr>';
                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] >= 4 ){

                      

                        }else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 3 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] < 4 && $value["estadoLogistica"] == 1  && $value["statusLogistica"] == 2 ) {
                          
                          echo '<td>

                                     <span class="label label-warning">Pendiente</span>
                                     
                                </td></tr>';
                        }
                        else if ($value["estado"] == 1 && $value["estadoAlmacen"] == 1 && $value["statusAlmacen"] == 0 && $value["estadoFacturacion"] == 1 && $value["statusFacturacion"] == 1 && $value["estadoCompras"] == 1 && $value["statusCompras"] < 4) {
                          
                          echo '<td>

                                     <span class="label label-warning">Pendiente</span>
                                     
                                </td></tr>';
                        }
             }


            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>


<script type="text/javascript">
    $(document).ready( function () { $('#estatusPedidos').DataTable({
     "iDisplayLength": 10,
     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
    "language": idioma_espanol
  }); } );

  var idioma_espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}

</script>
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