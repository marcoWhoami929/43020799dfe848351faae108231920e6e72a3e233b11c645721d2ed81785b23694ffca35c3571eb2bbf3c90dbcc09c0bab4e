<?php 
session_start();
require_once "../../../controladores/cotizaciones.controlador.php";
require_once "../../../modelos/cotizaciones.modelo.php";
require_once "../../../controladores/notificaciones.controlador.php";
require_once "../../../modelos/notificaciones.modelo.php";

          $cotizacionesAprobadas = ControladorCotizaciones::ctrMostrarCotizacionesAprobadas();
          $cotizacionesGenerales = ControladorCotizaciones::ctrMostrarCotizacionesTotales();
          $cotizacionesPorAprobar= ControladorCotizaciones::ctrMostrarCotizacionesPorAprobar();
          $cotizacionesCanceladas = ControladorCotizaciones::ctrMostrarCotizacionesCanceladas();

          $countAprobadas = 0;
          $countGenerales = 0;
          $countPorAprobar = 0;
          $countCanceladas = 0;
            foreach ($cotizacionesAprobadas as $value) {
                     $countAprobadas++;
                  }
            foreach ($cotizacionesGenerales as $value) {
                    $countGenerales++;
                  }
            foreach ($cotizacionesPorAprobar as $value) {
                    $countPorAprobar++;
                  }
            foreach ($cotizacionesCanceladas as $value) {
                    $countCanceladas++;
                  }



?>
 <div  style="float: left;position: fixed;z-index: 101">
          <div class="small-box bg-orange" style="border-radius: 200px 200px 200px 200px;-moz-border-radius: 200px 200px 200px 200px;-webkit-border-radius: 200px 200px 200px 200px;">

                      <!-- inner -->

                        <?php

                                  $notificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

                                  $totalNotificaciones = $notificaciones["nuevasCotizaciones"] + $notificaciones["cotizacionesAprobadas"] + $notificaciones["nuevosProspectos"];

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
        
      <div class="box-body" >
        <center><img src="vistas/img/plantilla/logo.png" width="20%"></center>
        <br>
        <br>
      
          <!-- col -->
          <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <a href="realizarCotizacion" class="hvr-grow"><div class="small-box bg-green " style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;color: transparent;">0</h3>

                        <P style="font-weight: bold;font-size: 25px;margin-left: 10PX;">Crear</P>
                        <P style="font-weight: bold;font-size: 19px;margin-left: 10PX;">Cotización</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <img src="vistas/img/plantilla/agregar.png" width="30%" style="float: right;margin-top: 10px">
                      
                      </div>
                      
                    </div></a>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <a href="verCotizaciones"><div class="small-box bg-green " style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                         <h3 style="font-weight: bold;margin-left: 10PX;color: transparent;">0</h3>

                        <P style="font-weight: bold;font-size: 25px;margin-left: 10PX;">Ver</P>
                        <P style="font-weight: bold;font-size: 19px;margin-left: 10PX;">Cotizaciones</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <img src="vistas/img/plantilla/editar.png" width="40%" style="float: right;margin-top: 10px">
                      
                      </div>
                      
                    </div></a>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                   <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <a href="enviarCotizaciones"><div class="small-box bg-green " style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        <h3 style="font-weight: bold;margin-left: 10PX;color: transparent;">0</h3>   
      
                        <P style="font-weight: bold;font-size: 25px;margin-left: 10PX;">Enviar</P>
                        <P style="font-weight: bold;font-size: 19px;margin-left: 10PX;">Cotizaciones</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <img src="vistas/img/plantilla/email-icon.png" width="40%" style="float: right;margin-top: 10px">
                      
                      </div>
                      
                    </div></a>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                   <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <a href="vistas/modulos/reportes.php?reporteCotizaciones=cotizaciones"><div class="small-box bg-green " style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;color: transparent;">0</h3>

                        <P style="font-weight: bold;font-size: 25px;margin-left: 10PX;">Exportar a</P>
                        <P style="font-weight: bold;font-size: 19px;margin-left: 10PX;">Excel</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <img src="vistas/img/plantilla/excel.png" width="30%" style="float: right;margin-top: 10px">
                      
                      </div>
                      
                    </div></a>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <a href="#"><div class="small-box bg-aqua " style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;"><?php echo $countGenerales  ?></h3>

                        <P style="font-weight: bold;font-size: 25px;margin-left: 10PX;">Cotizaciones</P>
                        <P style="font-weight: bold;font-size: 19px;margin-left: 10PX;">Totales</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                        <div class="icon">
                        
                          <i class="fa fa-bell" aria-hidden="true"></i>
                        
                        </div>
                        <!-- icon -->
                        
                      
                    </div></a>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                     <!-- small box -->
                    <a href="#"><div class="small-box bg-aqua " style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        <h3 style="font-weight: bold;margin-left: 10PX;"><?php echo $countAprobadas ?></h3>    
      
                        <P style="font-weight: bold;font-size: 25px;margin-left: 10PX;">Cotizaciones</P>
                        <P style="font-weight: bold;font-size: 19px;margin-left: 10PX;">Aprobadas</P>
                      
                      </div>
                      <!-- inner -->
                      
                       <!-- icon -->
                        <div class="icon">
                        
                          <i class="fa fa-download" aria-hidden="true"></i>
                        
                        </div>
                        <!-- icon -->
                        
                      
                    </div></a>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                   <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                     <!-- small box -->
                    <a href="#"><div class="small-box bg-aqua " style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        <h3 style="font-weight: bold;margin-left: 10PX;"><?php echo $countCanceladas ?></h3>    
      
                        <P style="font-weight: bold;font-size: 25px;margin-left: 10PX;">Cotizaciones</P>
                        <P style="font-weight: bold;font-size: 19px;margin-left: 10PX;">Canceladas</P>
                      
                      </div>
                      <!-- inner -->
                      
                       <!-- icon -->
                        <div class="icon">
                        
                          <i class="fa fa-times" aria-hidden="true"></i>
                        
                        </div>
                        <!-- icon -->
                        
                      
                    </div></a>
                    <!-- small box -->
                   

                  </div>
                  <!-- col -->
                   <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <a href="#"><div class="small-box bg-aqua " style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        <h3 style="font-weight: bold;margin-left: 10PX;"><?php echo $countPorAprobar ?></h3>    
      
                        <P style="font-weight: bold;font-size: 25px;margin-left: 10PX;">Cotizaciones</P>
                        <P style="font-weight: bold;font-size: 19px;margin-left: 10PX;">Por Aprobar</P>
                      
                      </div>
                      <!-- inner -->
                      
                       <!-- icon -->
                        <div class="icon">
                        
                          <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        
                        </div>
                        <!-- icon -->
                        
                      
                    </div></a>
                    <!-- small box -->

                  </div>
                  <!-- col -->