<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Annet Landa Alvarado" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Ivan Herrera Perez" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "Sucursal Acatepec"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        LISTA DE FACTURAS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">FACTURAS</li>
    
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
        <CENTER><h2>FACTURAS</h2></CENTER>
        
        <div class="box-tools">

        <?php 

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Annet Landa Alvarado"  || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Ivan Herrera Perez" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "Sucursal Acatepec") {


               if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {
                                        
                  $tabla = "facturasgenerales";

                }else{

                  if (isset($_POST["tienda"])) {

                    if ($_POST["tienda"] == "Industrial" || $_POST["tienda"] == "Mayoreo" || $_POST["tienda"] == "Rutas") {

                       $tabla = "facturasgenerales";
                    }else{

                       $tabla = "facturastiendas";
                    }

                  }else{
                   
                     $tabla = "facturastiendas";
                  }

                  

                }

              
              if (isset($_POST["fecha"])) {
                echo '<a href="vistas/modulos/reportes.php?reporteFacturasTiendas='.$tabla.'&fechaInicioF='.date('Y-m-d', strtotime($_POST["fecha"])).'&fechaFinalF='.date('Y-m-d', strtotime($_POST["fechaFin"])).'&tienda='.$_POST["tienda"].'">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
                
              }else{
                echo '<a href="vistas/modulos/reportes.php?reporteFacturasTiendas='.$tabla.'">

                <button class="report btn btn-info" id="report" name="report" ><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              }
              echo '<button class="report btn btn-success" id="updateFacturasTiendas"><i class="fa fa-spinner"></i>Actualizar</button>';
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteFacturasTiendas='.$tabla.'">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';


            }

          ?>
            
             <?php
              if ($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Sucursal Acatepec") {?>
                  <?php
                  echo '<div class="container col-lg-12 col-md-12 col-sm-12"><br>
                    <h5 style="font-weight: bold;font-size: 25px">Búsqueda por Rango de Fechas</h5><br>
                    <div class="row">
                     <form action="facturasTiendas" method="POST">
                      <div class="container col-lg-12 col-md-12 col-sm-12">
                        
                        <div class="col-lg-3">';?>
                            <?php
                            if (isset($_POST["fecha"])) {
                               echo '<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fecha"])).'">';
                               echo '<input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaFin"])).'" required>';

                                if ($_SESSION["nombre"] == "Diego Ávila") {
                                  
                                
                                 $usuario = "Mayoreo";

                               }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

                                  $usuario = "Rutas";

                               }else if($_SESSION["nombre"] == "Aurora Fernandez"){

                                 $usuario = "Industrial";

                               }else{

                                 $usuario = $_SESSION["nombre"];

                               }
                               echo '<input type="hidden" name="tienda" id="tienda" value="'.$usuario.'">';

                            }else {

                                 echo '<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" required>';
                                 echo '<input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" required>';
                                 echo '<input type="hidden" name="tienda" id="tienda" value="">';

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
              if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Annet Landa Alvarado"  || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "Ivan Herrera Perez" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Credito y Cobranza") {?>
                  <?php
                  echo '<div class="container">
                    <h5 style="font-weight: bold;font-size: 25px">Búsqueda por Sucursal y Rango de Fechas</h5>
                    <div class="row">
                     <form action="facturasTiendas" method="POST">
                      <div class="container">
                        
                        <div class="col-lg-3">';?>
                          <?php
                          if (isset($_POST["tienda"])) {
                             echo '<select class="form-control" name="tienda" id="tienda"><option value="'.$_POST["tienda"].'">'.$_POST["tienda"].'</option><option value="Sucursal San Manuel">Sucursal San Manuel</option><option value="Sucursal Capu">Sucursal Capu</option><option value="Sucursal Reforma">Sucursal Reforma</option><option value="Sucursal Santiago">Sucursal Santiago</option><option value="Sucursal Las Torres">Sucursal Las Torres</option><option value="Sucursal Acatepec">Sucursal Acatepec</option><option value="Industrial">Industrial</option><option value="Mayoreo">Mayoreo</option><option value="Rutas">Rutas</option></select>';
                            

                          }else {

                               echo '<select class="form-control" name="tienda" id="tienda"><option value="Sucursal San Manuel">Sucursal San Manuel</option><option value="Sucursal Capu">Sucursal Capu</option><option value="Sucursal Reforma">Sucursal Reforma</option><option value="Sucursal Santiago">Sucursal Santiago</option><option value="Sucursal Las Torres">Sucursal Las Torres</option><option value="Sucursal Acatepec">Sucursal Acatepec</option><option value="Industrial">Industrial</option><option value="Mayoreo">Mayoreo</option><option value="Rutas">Rutas</option></select>';

                           }
                          ?>

                        <?php
                        echo'</div>';?>
                        <?php
                        echo '<div class="col-lg-3">';?>
                            <?php
                            if (isset($_POST["fecha"])) {
                               echo '<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fecha"])).'" required>';

                               echo '<input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaFin"])).'" required>';
                               

                            }else {

                                 echo '<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" required>';

                                 echo '<input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" required>';

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
        <?php

        if ($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Sucursal Acatepec") {
                      
               

          }

              
          ?>
        <small>Nota: Para visualizar las tablas dar doble click en la pestaña seleccionada.</small>
        <div class="container  col-lg-12 col-md-12 col-sm-12">
          <h2></h2>
           <div class="alert alert-dismissible animated fadeInDown" role="alert" id="successFormaPago" style="display: none;z-index: 1001;position: absolute;">
            <span id="msgSuccessOrError"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <ul class="nav nav-tabs">
            <li class="active" ><a data-toggle="tab" href="#facturas" id="obtenerListaFacturasGenerales" class="tabsFacturas">Mis Facturas</a></li>
            <li><a data-toggle="tab" href="#facturasSaldosPendientes" id="obtenerFacturasSaldosPendientes" class="tabsFacturas" >Facturas Con Saldos Pendientes</a></li>
                <li><a data-toggle="tab" href="#facturasAbonoParcial" id="obtenerFacturasAbonoParcial" class="tabsFacturas" >Facturas Con Abono Parcial</a></li>
          </ul>

          <div class="tab-content col-lg-12 col-md-12 col-sm-12">
            <div id="facturas" class="tab-pane fade in active">
              <br>
              <table class="table-bordered table-striped dt-responsive tablaFacturacionTiendas estiloBordesTablas" width="100%" id="facturacionTiendas" >
         
                  <thead class="estilosTablas">
                   
                   <tr style="">
                     
                     <th style="width:20px;height: 40px;border:none">#</th>
                     <th style="border:none">Fecha Factura</th>
                     <th style="border:none">Crédito</th>
                     <th style="border:none">Serie</th>
                     <th style="border:none">Folio</th>
                     <th style="border:none">Codigo Cliente</th>
                     <th style="border:none">Rfc</th>
                     <th style="border:none">Cliente</th>
                     <th style="border:none">Vencimiento</th>
                     <th style="border:none">Dias Crédito</th>
                     <th style="border:none">Neto</th>
                     <th style="border:none">Descuento</th>
                     <th style="border:none">Impuesto</th>
                     <th style="border:none">Total</th>
                     <th style="border:none">Pendiente</th>
                     <th style="border:none">Pagado</th>
                     <th style="border:none">Fecha Cobro</th>
                     <th style="border:none">Forma Pago</th>
                     <th style="border:none">Sucursal</th>
                     <th style="border:none">Estatus</th>
                     <th>Forma Pago</th>
                      <th>Observaciones</th>

                   </tr> 

                  </thead>
                </table>
            </div>
            <div id="facturasSaldosPendientes" class="tab-pane fade">
              <br>
              <table class="table-bordered table-striped dt-responsive tablaFacturacionTiendasSaldosPendientes estiloBordesTablas" width="100%" id="facturacionTiendasSaldosPendientes" >
         
                <thead class="estilosTablas">
                 
                 <tr style="">
                   
                   <th style="width:20px;height: 40px;border:none">#</th>
                   <th style="border:none">Fecha Factura</th>
                   <th style="border:none">Serie</th>
                   <th style="border:none">Folio</th>
                   <th style="border:none">Codigo Cliente</th>
                   <th style="border:none">Rfc</th>
                   <th style="border:none">Cliente</th>
                   <th style="border:none">Vencimiento</th>
                   <th style="border:none">Dias Crédito</th>
                   <th style="border:none">Neto</th>
                   <th style="border:none">Descuento</th>
                   <th style="border:none">Impuesto</th>
                   <th style="border:none">Total</th>
                   <th style="border:none">Pendiente</th>
                   <th style="border:none">Pagado</th>
                   <th style="border:none">Fecha Cobro</th>
                   <th style="border:none">Forma Pago</th>
                   <th style="border:none">Sucursal</th>
                   <th style="border:none">Estatus</th>

                 </tr> 

                </thead>
              </table>
            </div>
            <div id="facturasAbonoParcial" class="tab-pane fade">
              <br>
              <table class="table-bordered table-striped dt-responsive tablaFacturacionTiendasAbonoParcial estiloBordesTablas" width="100%" id="facturacionTiendasAbonoParcial" >
         
                <thead class="estilosTablas">
                 
                 <tr style="">
                   
                   <th style="width:20px;height: 40px;border:none">#</th>
                   <th style="border:none">Fecha Factura</th>
                   <th style="border:none">Serie</th>
                   <th style="border:none">Folio</th>
                   <th style="border:none">Codigo Cliente</th>
                   <th style="border:none">Rfc</th>
                   <th style="border:none">Cliente</th>
                   <th style="border:none">Neto</th>
                   <th style="border:none">Descuento</th>
                   <th style="border:none">Impuesto</th>
                   <th style="border:none">Total</th>
                   <th style="border:none">Pendiente</th>
                   <th style="border:none">Pagado</th>
                   <th style="border:none">Fecha Cobro</th>
                   <th style="border:none">Forma Pago</th>
                   <th style="border:none">Sucursal</th>

                 </tr> 

                </thead>
              </table>
            </div>
         
          </div>
        </div>

        <br>

        <!-- Modal Generar Ticket de Solcitud de Cancelacion-->
        <div class="modal fade" id="modalGenerarTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background:#001f3f;color: white">
                <h3 class="modal-title" id="exampleModalLabel">Solicitud De Cancelación</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
              
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                       <form role="form" method="post" enctype="multipart/form-data">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                              <span style="font-weight: bold">Título</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-ticket"></i></span> 

                                <select class="form-control input-lg" name="crearTituloT" id="crearTituloT" required>
                                    <option value="Devolución">Devolución</option>
                                    <option value="Nota de Crédito">Nota de Crédito</option>
                                    <option value="Cancelación" selected>Cancelación</option>
                                    <option value="Refacturación">Refacturación</option>
                                    <option value="Recibo Electrónico de Pago">Recibo Electrónico de Pago</option>
                                    <option value="Enviar PDF Y XML">Enviar PDF Y XML</option>
                                    <option value="otro">Otro</option>

                                </select>
                                
                                <input type="hidden" class="form-control input-lg" name="seriePedidoT" id="seriePedidoT" value="">
                                <input type="hidden" class="form-control input-lg" name="folioPedidoT" id="folioPedidoT" value="">
                                <input type="hidden" class="form-control input-lg" name="serieFacturaT" id="serieFacturaT">
                                <input type="hidden" class="form-control input-lg" name="folioFacturaT" id="folioFacturaT">
                                <input type="hidden" name="idFacturaSolicitud" id="idFacturaSolicitud">

                              </div>
                            </div>
                            
                          </div>
                           <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                              <span style="font-weight: bold">Departamento</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-building"></i></span> 
                                <select class="form-control" id="crearDepartamentoT" name="crearDepartamentoT" required>
                                  <option value="2" selected>Gerencia</option>
                               
                                 </select>
                              </div>
                            </div>
                            
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                              <span style="font-weight: bold">Usuario Departamento</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-building"></i></span> 
                                <select class="form-control" id="crearDepartamentoUsuarioT" name="crearDepartamentoUsuarioT" required>
                                  <option value="51" selected>Roberto Gutierrez</option>
                                 
                                 </select>
            
                              </div>
                            </div>
                            
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                              <span style="font-weight: bold">Prioridad</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-flag-o"></i></span> 
                                <select class="form-control" id="crearPrioridadT" name="crearPrioridadT" required>
                                    <option value="">Elegir Prioridad</option>
                                    <option value="1" selected>Alta</option>
                                    <option value="2">Media</option>
                                    <option value="3">Baja</option>
                                 </select>
                              </div>
                            </div>
                            
                          </div>
                          <br>
                            <div class="col-lg-6 col-md-6 col-sm-6" style="display: none;">
                              <div class="form-group">
                                <span style="font-weight: bold">Cargar Pedido</span>
                                <div class="input-group">
                                  <input id="archivoPedidoT" type="file" name="archivoPedidoT" onchange="return fileValidation()">
                                </div>
                              </div>
                              
                            </div>
                          <br>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                              <span style="font-weight: bold">Cargar Factura</span>
                              <div class="input-group">
                                <input id="archivoFacturaT" type="file" name="archivoFacturaT" onchange="return fileValidationFacturaT()" required>
                              </div>
                            </div>
                            
                          </div>
                          <br>
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">

                             <textarea class="form-control" name="crearContenidoT" id="crearContenidoT" rows="10" cols="100"></textarea>
                             <br>

                              <div class="col-lg-4 col-md-4 col-sm-4">
                                <button class="btn btn-danger" type="submit">Crear Ticket</button>
                              </div>
                          </div>
                          </div>
                          
        
                              <?php
                                
                                  $crearTicket = new ControladorTickets();
                                  $crearTicket -> ctrCrearTicketSolicitud();

                              ?>
                         </form>
                    </div>
                  </div>

                </div>
     
              </div>
              <br>
              <div class="modal-footer"> 
                   
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Para Ve el detalle del ticket de cancelacion generado-->
        <div class="modal fade" id="modalVistaDetalleTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background:#001f3f;color: white">
                <h3 class="modal-title" id="exampleModalLabel">Detalle Ticket</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="Tickets" class="tabcontent">
                  <div class="col-lg-12 col-md-12 col-sm-12 cabeceraEdicion">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                   
                      <h2 class="estiloDatosTicket"><span id="numeroTicket"></span></h2>

                      
                      </div>
                    
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 contenidoEdicion">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4">
                      <h3 class="estiloTicket">Departamento</h3>
                      <h4 class="estiloDatosTicket"><span id="dptoTicket"></span></h4>

                      
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket">Autor</h3>
                        <h4 class="estiloDatosTicket"><span id="autorTicket"></span></h4>
                        
                        
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket">Prioridad</h3>
                        <h4 class="estiloDatosTicket">
                          <span class='label' id="prioridadTicket"></span>
                  
                          </h4>
                        
                        
                      </div>
                      
                    </div>
                    <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket">Estado</h3>
                        <h4 class="estiloDatosTicket">
                          
                          <span class='label' id="estadoTicket"></span>

                          </h4>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket2">Serie Factura</h3>
                         <h4 class="estiloDatosTicket"><span id="serieFacturaTicket"></span></h4>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket2">Folio Factura</h3>
                         <h4 class="estiloDatosTicket"><span id="folioFacturaTicket"></span></h4>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 conversacionEdicion">
                  <div class="direct-chat-messages">

                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right" id="fechaTicket"></span>
                      </div>
              
                      <img class="direct-chat-img" src="vistas/dist/img/user.png" alt="message user image">
                  
                      <div class="direct-chat-text">
                        <span id="motivoCancelacionTicket"></span>
                      </div>
        
                    </div>

                  </div>  
                </div>
                <br>
          
              </div>
              </div>
              <br>
              <br>
              <br>
              <div class="modal-footer"> 
                   <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  
  </section>

</div>
<!--=====================================
MODAL CARGAR DOCUMENTOS
======================================-->
<div class="modal fade" id="modalDocumentosCredito"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header estilosTablas" >
    <center><h3 class="modal-title" style="color:white"><i class="fa fa-file-text"></i>DOCUMENTOS CREDITO</h3></center>
        <button type="button" class="close btnCloseDocuments" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="contenedorDatosCarga" style="display: none">
             <div class="col-lg-6 col-md-6 col-sm-6">
            <p>Usuario:</p> <span id="usuarioLoad"></span>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <p>Fecha De Carga:</p> <span id="dateLoad"></span>
          </div>
          </div>

          <div class="container col-lg-12 col-md-12 col-sm-12">
            <div class="row">
         
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Cargar Archivo</h3>
                </div>
                <div class="panel-body">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                   
                      <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label class="btn btn-primary" for="my-file-selector">
                          <input  type="file" class="form-control" name="fileCharge" id="fileCharge">
                        </label>
                        
                      </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <button class="btn btn-primary" id="enviar">Cargar Archivo</button>
                      </div>
                   
               
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6"> </div>
                </div>
              </div>
            
       
              <div class="panel panel-primary">
                <div class="alert alert-warning alert-dismissible animated bounceInLeft" role="alert" style="display: none" id="fileDeleted">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Archivo Eliminado!</strong> Exitosamente
                </div>
                <div class="alert alert-info alert-dismissible animated bounceInLeft" role="alert" style="display: none" id="fileCanceled">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Estuvo a punto de eliminar el archivo!</strong>
                </div>
                <div class="alert alert-danger alert-dismissible animated bounceInLeft" role="alert" style="display: none" id="fileLoadDanger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>No se pudo cargar el archivo!</strong>
                </div>
                <div class="alert alert-success alert-dismissible animated bounceInLeft" role="alert" style="display: none" id="fileLoadSuccess">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Cargado Exitosamente</strong>
                </div>
                <div class="panel-heading">
                  <h3 class="panel-title">Archivos Cargados</h3>
                </div>
                  <div class="panel-body" id="panelLoadsFiles">
                      
                      <table class="table" id="tablePanelLoadsFiles">
                     
                    </table>
                   
                  </div>
              </div>
                 
            </div>
          </div>  
        
      </div>
      <div class="modal-footer" style="margin-top:100px">
        <button type="button" class="btn btn-default btnCloseDocuments" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary btnSaveDocumentsCredito">Guardar</button>-->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


      function agregar(){
        $.ajax({
          url: "bitacora.php",
          method: "GET",
          async: false,
          data: {funcion: "funcion36"},
          dataType: "json",
          success: function(respuesta){

          }
        })
      };

    </script>
    <script>
    /**
     * Funcion que captura las variables pasados por GET
     * Devuelve un array de clave=>valor
     */
    function getGET()
    {
        // capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];
            // obtenemos un array con cada clave=valor
            var GET = getString.split('&');
            var get = {};
 
            // recorremos todo el array de valores
            for(var i = 0, l = GET.length; i < l; i++){
                var tmp = GET[i].split('=');
                get[tmp[0]] = unescape(decodeURI(tmp[1]));
            }
            return get;
        }
    }
 
    window.onload = function()
    {
        // Cogemos los valores pasados por get
        var valores=getGET();
        if(valores)
        {
            // hacemos un bucle para pasar por cada indice del array de valores
            for(var index in valores)
            {
                
                if (valores[index] == "success") {
              
                  swal({

                      type: "success",
                      title: "¡Las facturas han sido cargadas correctamente!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                      if(result.value){
                        
                        window.location = "facturasTiendas";

                      }

                    });
                }else if (valores[index] == "error") {
                  swal({

                        type: "error",
                        title: "¡UPPS! Hubo un error durante la ejecución",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                      }).then(function(result){

                        if(result.value){
                        
                          window.location = "facturasTiendas";

                        }

                      });
                }else if (valores[index] == "invalid_file") {
                      swal({

                        type: "error",
                        title: "¡UPPS!El formato del archivo es inválido",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                      }).then(function(result){

                        if(result.value){
                        
                          window.location = "facturasTiendas";

                        }

                      });
                }
            }
        }else{
            
        }
    }
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
     
    </script>
    <style type="text/css">
      /* Style the tab content */
		.tabcontent {
		  float: left;
		  padding: 10px 12px;
		  border-radius: 10px 10px 10px 10px;
		  -moz-border-radius: 10px 10px 10px 10px;
		  -webkit-border-radius: 10px 10px 10px 10px;
		  border: 1px solid  #ccc;
		  -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
		  -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
		  box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
		  width: 100%;
		  height: auto;
		  margin-left: 0px;
		}
		.color-panel{
		  color: white;
		  background: #94a4b9;
		  height: 25%;
		  padding-top: 20px;
		  font-size: 25px;
		  font-weight: bold;
		}
		.cabeceraEdicion{
		background: #94a4b9;
		height: auto;
		border-radius: 10px 10px 0px 0px;
		-moz-border-radius: 10px 10px 0px 0px;
		-webkit-border-radius: 10px 10px 0px 0px;
		border: 0px solid #000000;
		}
		.contenidoEdicion{
		background: #cccccc;
		height: 20%;
		border-radius: 0px 0px 0px 0px;
		-moz-border-radius: 0px 0px 0px 0px;
		-webkit-border-radius: 0px 0px 0px 0px;
		border: 0px solid #000000;
		}
		.conversacionEdicion{
		background:#f1f1f1;
		height: auto;
		border-radius: 0px 0px 0px 0px;
		-moz-border-radius: 0px 0px 0px 0px;
		-webkit-border-radius: 0px 0px 0px 0px;
		border: 0px solid #000000;
		}
		.respondewhiteicion{
		background: #94a4b9;
		height: 5%;
		border-radius: 10px 10px 0px 0px;
		-moz-border-radius: 10px 10px 0px 0px;
		-webkit-border-radius: 10px 10px 0px 0px;
		border: 0px solid #000000;
		}
		.respondewhiteicion h3{
		  color: white;
		}
		.contenidoRespuestaEdicion{
		background: #cccccc;
		height: auto;
		border-radius: 0px 0px 0px 0px;
		-moz-border-radius: 0px 0px 0px 0px;
		-webkit-border-radius: 0px 0px 0px 0px;
		border: 0px solid #000000;
		}
		#editor{
		  width: 100%;
		}
		.botoneraTicket{
		  margin-top: 20px;
		  margin-bottom: 100px;
		}
		.estiloTicket{
		  padding-top: 20px;
		  margin-bottom: 20px;
		  text-align: center;
		}
		.estiloTicket2{
		  padding-top: 10px;
		  margin-bottom: 20px;
		  text-align: center;
		}
		.estiloDatosTicket{
		  font-weight: bold;
		  text-align: center;
		  color: #2489c5;
		  margin-top: -10px;
		}
		.tabsFacturas{

		}
    </style>