<?php
session_start();
require_once "../../../controladores/notificaciones.controlador.php";
require_once "../../../modelos/notificaciones.modelo.php";
require_once "../../../controladores/controlMuestras.controlador.php";
require_once "../../../modelos/controlMuestras.modelo.php";


$item = null;
$valor = null;
$totalSolicitudes = ControladorControlMuestras::ctrMostrarTotalSolicitudes($item, $valor);
$enCamino = ControladorControlMuestras::ctrMostrarTotalEnCamino($item, $valor);
$enProceso= ControladorControlMuestras::ctrMostrarTotalEnProceso($item, $valor);
$enEntrega = ControladorControlMuestras::ctrMostrarTotalEnEntrega($item, $valor);
$concluido = ControladorControlMuestras::ctrMostrarTotalConcluido($item, $valor);




?>
 <div  style="float: right;position: fixed;z-index: 101">
          <div class="small-box bg-orange" style="border-radius: 200px 200px 200px 200px;-moz-border-radius: 200px 200px 200px 200px;-webkit-border-radius: 200px 200px 200px 200px;">

                      <!-- inner -->

                        <?php

                                  $notificaciones = ControladorNotificaciones::ctrMostrarNotificacionesApp();

                                  $totalNotificaciones = $notificaciones["nuevasSolicitudes"];

                                  if ($totalNotificaciones != 0) {
                                      
                                      echo ' <div class="inner animated infinite bounce" >
                        
                                            <a href="" class="actualizarNotificaciones" item="nuevasCotizaciones">
                        
                                                  <i class="fa fa-bell-o fa-2x" style="color: white"></i>

                                                  <span class="label label-danger">'.$totalNotificaciones.'</span>
                                                
                                                </a>


                                          </div>';


                                  }else {

                                      echo ' <div class="inner" >
                        
                                            <a href="">
                        
                                                  <i class="fa fa-bell-o fa-2x" style="color: white"></i>

                                                  <span class="label label-danger">'.$totalNotificaciones.'</span>
                                                
                                                </a>


                                          </div>';


                                  }

                      ?>
                     
                      <!-- inner -->
                 
                      
                    </div>
          
        </div>
<!--=====================================
CAJAS SUPERIORES
======================================-->
<!--===========================================================================-->
<div class="container col-lg-12" style="padding: 50px">
  <div class="row">

      <!-- col -->
      <div class="col-lg-3 col-md-6 col-xs-6" >
        
        <!-- small box -->
        <div class="small-box bg-green" style="-webkit-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
-moz-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);">

          <!-- inner -->
          <div class="inner">
            
            <h3><?php echo $totalSolicitudes["totales"] ?></h3>

            <h2>Total Solicitudes</h2>
            
          
          </div>
          <!-- inner -->
          
          <!-- icon -->
          <div class="icon">
            
            <i class="fa fa-paint-brush"></i>
          
          </div>
          
        </div>
        <!-- small box -->

      </div>
      <!-- col -->
      <!-- col -->
      <div class="col-lg-3 col-md-6 col-xs-6">
        
        <!-- small box -->
        <div class="small-box bg-yellow" style="-webkit-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
-moz-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);">

          <!-- inner -->
          <div class="inner">
            
            <h3><?php echo $enCamino["totales"] ?></h3>

            <h2>Recolección en Camino</h2>
            
          
          </div>
          <!-- inner -->
          
          <!-- icon -->
          <div class="icon">
            
            <i class="fa fa-motorcycle" aria-hidden="true"></i>
          
          </div>
          
        </div>
        <!-- small box -->

      </div>
      <!-- col -->
      <!-- col -->
      <div class="col-lg-3 col-md-6 col-xs-6">
        
        <!-- small box -->
        <div class="small-box bg-blue" style="-webkit-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
-moz-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);">

          <!-- inner -->
          <div class="inner">
            
            <h3><?php echo $enProceso["totales"] ?></h3>

            <h2>En Proceso</h2>
            
          
          </div>
          <!-- inner -->
          
          <!-- icon -->
          <div class="icon">
            
            <i class="fa fa-paint-brush"></i>
          
          </div>
          
        </div>
        <!-- small box -->

      </div>
      <!-- col -->
      <!-- col -->
      <div class="col-lg-3 col-md-6 col-xs-6">
        
        <!-- small box -->
        <div class="small-box bg-navy" style="-webkit-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
-moz-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);">

          <!-- inner -->
          <div class="inner">
            
            <h3><?php echo $enEntrega["totales"] ?></h3>

            <h2>Entrega en Camino</h2>
            
          
          </div>
          <!-- inner -->
          
          <!-- icon -->
          <div class="icon">
            
            <i class="fa fa-archive" aria-hidden="true"></i>
          
          </div>
          
        </div>
        <!-- small box -->

      </div>
      <!-- col -->
      <!-- col -->
      <div class="col-lg-3 col-md-6 col-xs-6">
        
        <!-- small box -->
        <div class="small-box bg-purple" style="-webkit-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
-moz-box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);
box-shadow: -16px 18px 5px 5px rgba(0,0,0,0.75);">

          <!-- inner -->
          <div class="inner">
            
            <h3><?php echo $concluido["totales"] ?></h3>

            <h2>Concluidas</h2>
            
          
          </div>
          <!-- inner -->
          
          <!-- icon -->
          <div class="icon">
            
            <i class="fa fa-paint-brush"></i>
          
          </div>
          
        </div>
        <!-- small box -->

      </div>
      <!-- col -->
    
  </div>


</div>