<?php
error_reporting(E_ALL);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Almacen" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["nombre"] == "Diego Ávila"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      ALMACÉN
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">ALMACÉN</li>
    
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
        <CENTER><h2>CONTROL DE ALMACÉN</h2></CENTER>
      
       <div class="box-tools">

          <?php 

            if ($_SESSION["grupo"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez") {
        

          if ($_SESSION["grupo"] == "Generador" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
            echo ' <a href="vistas/modulos/reportes.php?reporte=almacen">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
           echo '<button class="report btn btn-success" id="updateAlmacen"><i class="fa fa-spinner"></i>Actualizar</button>';
          }else{

              echo ' <a href="vistas/modulos/reportes.php?reporte=almacen">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';

          }
              
            }else{
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="vistas/modulos/reportes.php?reporte=almacen">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
          echo '<button class="report btn btn-success" id="updateAlmacen"><i class="fa fa-spinner"></i>Actualizar</button>';
            }

          ?>
        </div>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaAlmacen estilosBordesTablas" width="100%" id="almacen" >
         
          <thead class="estilosTablas">
           
           <tr>
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border:none">Cliente</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Suministrado por</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Suministro</th>
             <th style="border:none">Estatus</th>
             
             <th style="border:none">Fecha de Término</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Importante</th>
             <th style="border:none">Tiempo de Proceso</th>
             <th style="border:none">Número de Sku´s</th>
             <th style="border:none">Sku´ Surtidos</th>
             <th style="border:none">Nivel de Partidas</th>
             <th style="border:none">Número de Unidades</th>
             <th style="border:none">Unidades Surtidas</th>
             <th style="border:none">Nivel de Unidades</th>
             <th style="border:none">Importe Total</th>
             <th style="border:none">Importe Surtido</th>
             <th style="border:none">Nivel de Surtimiento</th>
             <th style="border:none">Traspasos</th>
             <th style="border:none">Habilitar</th>
             <th style="border:none">Acciones</th>
           </tr> 

          </thead>

        </table>

      </div>

    </div>

  
  </section>

</div>

<!-- Modal -->
<div class="modal fade" id="verObservaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header estilosTablas" >
        <h5 class="modal-title" id="exampleModalLabel">OBSERVACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <textarea type="text" class="form-control input-lg" id="editarObservacionesExtras" name="editarObservacionesExtras" readonly style="border: none;background: white;width: 100%"></textarea>
                  
     

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR PEDIDO
======================================-->

<div id="modalEditarPedido" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header estilosTablas" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Pedido</h4>

        </div>

          <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <div class="container col-lg-12">
                
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SELECCIONAR EL SUMINISTRADOR -->
                      <span style="font-weight: bold">Suministrado Por</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarSuministrado" id="editarSuministrado" required>
                          
                          <option value="" id="editarSuministrado">Suministrado por</option>

                          <option value="Ulises Tuxpan">Ulises Tuxpan</option>

                          <option value="Vidal Villarreal">Vidal Villarreal</option>

                          <option value="Carlos Aguilar">Carlos Aguilar</option>

                          <option value="Enrique Flores">Enrique Flores</option>
                          

                        </select>
                        

                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FOLIO PEDIDO -->
                      <span style="font-weight: bold">Serie de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" required readonly>
                        <input type="hidden" class="form-control input-lg" name="idAlmacen2" id="idAlmacen2"  >

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FOLIO PEDIDO -->
                      <span style="font-weight: bold">Folio de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarIdPedido" id="editarIdPedido" required readonly>
                        
                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FECHA Y HORA RECEPCION -->
                     <span style="font-weight: bold">Fecha Recepción</span>
                      <input type="text" class="form-control input-lg"  name="editarFechaRecepcion" id="editarFechaRecepcion" required>
                        
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12" id="messageUpdate">
                      <div class="alert alert-success collapse" role="alert" id="messageAlertUpdate" style="display:none;">Fecha de suministro actualizada.</div>
                      <div class="alert alert-success collapse" role="alert" id="messageAlertUpdateFin" style="display:none;">Fecha de termino actualizada.</div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FECHA SUMINISTRO -->
                     <button class="form-control btn btn-warning" type="button" name="btnActualizarFechaInicio" id="btnActualizarFechaInicio">Iniciar</button>

                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FECHA TÉRMINO -->
                      <button class="form-control btn btn-warning" type="button" name="btnActualizarFechaTermino" id="btnActualizarFechaTermino">Finalizar</button>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA ESTATUS-->
                    <span style="font-weight: bold">Estatus</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarStatus" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar el estatus" id="editarStatus" required>
                          
                          <option value="" id="editarStatus">Seleccionar estatus</option>

                          <option value="0">BackOrder</option>

                          <option value="1">Laboratorio</option>

                          <option value="2">Pendiente</option>

                          <option value="3">Suministrado</option>

                        </select>


                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA TIPO DE COMPRA -->
                    
                    <span style="font-weight: bold">Se Requiere Compra</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarTipoCompra" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar tipo de compra que realizará el área de compras" id="editarTipoCompra" required>
                          
                          <option value="" id="editarTipoCompra">Seleccionar tipo</option>

                          <option value="0">Sin compra</option>

                          <option value="1">Compra Con Proveedores Externos</option>

                          <option value="2">Compra Interna</option>

                        </select>


                      </div>
                  
                  </div>

                </div>
                <br>
                  <div class="row">
                  <div class="col-lg-12">
                    <!-- ENTRADA PARA OBSERVACIONES-->
                     <span style="font-weight: bold">Observaciones</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-comment"></i></span> 

                        <textarea type="text" class="form-control input-lg" name="editarObservaciones" placeholder="Colocar en este campo algún requerimiento y/o solicitud especial para el pedido" id="editarObservaciones" data-toggle="tooltip" data-placement="right" title="Colocar en este campo algún requerimiento y/o solicitud especial para el pedido"></textarea>

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-4">
                    <!-- ENTRADA PARA NUMERO PARTIDAS -->
                     <span style="font-weight: bold">Sku's</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="number" class="form-control input-lg" name="editarNumeroPartidas" id="editarNumeroPartidas"readonly>

                      </div>
                  </div>
                   <div class="col-lg-4">
                    <!-- ENTRADA PARA NUMERO DE UNIDADES -->
                     <span style="font-weight: bold"># Unidades</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="number" class="form-control input-lg" name="editarNumeroUnidades" id="editarNumeroUnidades"readonly>

                      </div>
                  </div>
                  <div class="col-lg-4">
                    <!-- ENTRADA PARA IMPORTE TOTAL -->
                     <span style="font-weight: bold">Importe Total</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarImporteTotal" id="editarImporteTotal" readonly>

                      </div>
                  </div>
                </div>
              
              </div>
             

            </div>


          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="minimizar">Salir</button>

          <button type="submit" class="btn btn-primary" id="modificar">Modificar Pedido</button>

        </div>
      
        <?php
          

          $editarPedido = new ControladorAlmacen();
          $editarPedido -> ctrEditarPedido();

          $registroBitacora =  new ControladorAlmacen();
          $registroBitacora -> ctrRegistroBitacora(); 

          $mostrarTiempoEdicion = new ControladorAlmacen();
          $mostrarTiempoEdicion -> ctrMostrarTiempoProcesoEdicion();

          $actualizarStatusAlmacenEdicion = new ControladorAlmacen();
          $actualizarStatusAlmacenEdicion -> ctrActualizarStatusAlmacenEdicion();

          $actualizarTipoCompraEdicion = new ControladorAlmacen();
          $actualizarTipoCompraEdicion -> ctrActualizarTipoCompraEdicion();

          $actualizarCompraEdicion = new ControladorAlmacen();
          $actualizarCompraEdicion -> ctrActualizarCompraEdicion();

          $actualizarEstado = new ControladorAlmacen();
          $actualizarEstado -> ctrActualizarEstadoAlmacen();

          $actualizarEstadoPedido = new ControladorAlmacen();
          $actualizarEstadoPedido -> ctrActualizarEstadoPedido();

          $actualizarStatusPedido = new ControladorAlmacen();
          $actualizarStatusPedido -> ctrActualizarStatusPedido();

        ?> 


      </form>

    </div>

  </div>

</div>
<!--=====================================
MODAL VER TRASPASOS
======================================-->
<div class="modal fade" id="modalVerTraspasos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header" style="background: #2667ce;">
    <center><h3 class="modal-title" style="color:white"><i class="fa fa-file-text"></i> LISTA DE TRASPASOS</h3></center>
        <button type="button" class="close btnCerrarDesgloseTraspasos" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="detalleTraspasos" name="detalleTraspasos">

                    <div class="table-responsive">
                      <table class="table" id="tablaDetalleTraspasos">
                        <caption>Detalles Traspasos</caption>
                      </table>
                    </div>
                          
                </div>
            </div>
       
      
      </div>
      <div class="modal-footer" style="margin-top:100px">
        <button type="button" class="btn btn-default btnCerrarDesgloseTraspasos" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR ORDEN DE TRABAJO
======================================-->

<div id="modalEditarOrdenAlmacen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: #2667ce;">

        <center><h3 class="modal-title" style="color:white"><i class="fa fa-file-text"></i> EDITAR ORDEN</h3></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">

            <div class="box-body">
        
                <div class="form-group">

                    <div class="container col-lg-12">

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <span style="font-weight: bold">Cliente</span>
                       
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" value="" id="otClienteEdit" name="otClienteEdit" readonly>
                                    <input type="hidden" class="form-control input-lg" value="" id="otIdOrdenAlmacenEdit" name="otIdOrdenAlmacenEdit" readonly>
                                    <input type="hidden" class="form-control input-lg" value="" id="otSerieEdit" name="otSerieEdit" readonly>
                                    <input type="hidden" class="form-control input-lg" value="" id="otFolioEdit" name="otFolioEdit" readonly>
                                   
                                </div>

                            </div>
                          

                        </div>
                       
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <span style="font-weight: bold">Partidas</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otNumeroPartidasEdit" id="otNumeroPartidasEdit" readonly>
                                
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                
                                <span style="font-weight: bold">Unidades</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otNumeroUnidadesEdit" id="otNumeroUnidadesEdit" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteTotalEdit" id="otImporteTotalEdit" readonly>
                                   
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Recepción</span>
                                <div class="input-group dtp1" id="dtp1">
                                    <input type="text" class="form-control input-lg dtp1" name="otFechaRecepcionEdit" id="otFechaRecepcionEdit">
                                    <div class="input-group-addon add-on dtp1">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    </div>
                                    

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Suministro</span>
                                    <div class="input-group dtp2" id="dtp2">
                                    <input type="text" class="form-control input-lg dtp2" name="otFechaSuministroEdit" id="otFechaSuministroEdit">
                                    <div class="input-group-addon add-on dtp2">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    </div>
                                    

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Término</span>
                                <div class="input-group dtp3" id="dtp3">
                                    <input type="text" class="form-control input-lg dtp3" name="otFechaTerminoEdit" id="otFechaTerminoEdit">
                                    <div class="input-group-addon add-on dtp3">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    </div>
                                    

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Elegir Almacén</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <select class="form-control" name="otAlmacenEdit" id="otAlmacenEdit">

                                         <?php

                                            $obtenerAlmacenes = ControladorFacturacion::ctrMostrarListaAlmacenes();

                                            foreach ($obtenerAlmacenes as $key => $value) {
                                                
                                                echo '<option value="'.$value["id"].'">'.$value["nombreAlmacen"].'</option>';
                                            }

                                          ?>

                                    </select>

                                </div>
                                    

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Estatus</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <select class="form-control" name="otEstatusEdit" id="otEstatusEdit" required>

                                    <option value="0">Colocación de Material</option>

                                    <option value="1">Traspaso</option>

                                    <option value="2">Entrega de Material</option>

                                    </select>


                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">

                            <span style="font-weight: bold">Editado Por</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" required="true" name="otSuministradoEdit" id="otSuministradoEdit">

                                    <option value="Ulises Tuxpan">Ulises Tuxpan</option>

                                    <option value="Enrique Flores">Enrique Flores</option>

                                    </select>

                                    
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <span style="font-weight: bold">Comentarios</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <textarea class="form-control input-lg" name="otComentariosEdit" id="otComentariosEdit" cols="10" rows="3"></textarea>
                                    
                                </div>
                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer" >
            
            <button type="button" class="btn btn-warning" style="background: #2667ce;" data-dismiss="modal" id="minimizarOrden">Salir</button>

            <button type="submit" class="btn btn-success" style="background: #2667ce;" id="modificarOrden">Editar</button>
        
        </div>

        <?php

        $editarOrdenAlmacen = new ControladorAlmacenRuta();
        $editarOrdenAlmacen -> ctrEditarOrdenAlmacen();

        $actualizarTiempoSegundos = new ControladorFacturacionRuta();
        $actualizarTiempoSegundos -> ctrActualizarTiempoSegundos();

        $actualizarTiempoFinal = new ControladorFacturacionRuta();
        $actualizarTiempoFinal -> ctrActualizarTiempoFinal();


        ?> 

      </form>

    </div>

  </div>

</div>
<!--=====================================
MODAL DETALLE CLIENTE
======================================-->
<div class="modal fade" id="modalDetailClientAlmacen" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header" style="background: #2667ce;">
    <center><h3 class="modal-title" style="color:white"><i class="fa fa-file-text"></i> DETALLE CLIENTE</h3></center>
        <button type="button" class="close btnCerrarDetailClientAlmacen" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="detailClientAlmacen" name="detailClientAlmacen">

                    <div class="table-responsive">
                      <table class="table" id="tablaDetailClientAlmacen">
                     
                      </table>
                    </div>
                          
                </div>
            </div>
       
      
      </div>
      <div class="modal-footer" style="margin-top:100px">
        <button type="button" class="btn btn-default btnCerrarDetailClientAlmacen" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



<script type="text/javascript">
  $(document).ready(function() {
  $('.dtp1').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.dtp2').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.dtp3').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
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
        data: {funcion: "funcion9"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }

    </script>
    <!--ATAJOS DE TECLAS EN SISTEMA-->
    <script type="text/javascript">
           
            shortcut.add("Ctrl+A",function() {
                 document.getElementById("editarPed").click();
            });
            shortcut.add("Esc",function() {
                 document.getElementById("minimizar").click();
            });
            shortcut.add("Ctrl+B", function() {
                document.getElementsByTagName("input")[0].focus();
            });
            shortcut.add("Ctrl+M", function() {
                document.getElementById("modificar").click();
            });

    </script>
    <script type="text/javascript">
       jQuery(function($){
           $("#editarFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaSuministro").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaTermino").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
      jQuery(function($){
           $("#otFechaRecepcionEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
      jQuery(function($){
           $("#otFechaSuministroEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
      jQuery(function($){
           $("#otFechaTerminoEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });

       $(document).ready(function() {
          
          $.timer(15000, function(temporizador){

            if (localStorage.getItem("pausadoAlmacen") === null) {

                localStorage.setItem("pausadoAlmacen",0);
            }else{

                 if (localStorage.getItem("pausadoAlmacen") == 1) {
               
                  }else{
           
                           obtenerTraspasos('Pinturas').then(
                              function () {
                                obtenerTraspasos('Flex');
                              }
                            );

                  }
             

            }
             
          })

      });



      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
     
    </script>