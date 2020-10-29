<?php
error_reporting(E_ALL);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Laura Delgado" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["nombre"] == "Ulises Tuxpan" || $_SESSION["nombre"] == "Luis Gerardo Morales" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "José Enrique Flores" || $_SESSION["nombre"] == "Diego Ávila"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>


<div class="content-wrapper">

  <section class="content-header">
   
    <h1>
      
    <i class="fa fa-truck" aria-hidden="true"></i> ÓRDENES DE TRABAJO
  
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">ÓRDENES DE TRABAJO</li>
    
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
  
      </div>

      <div class="box-body">
         <div class="box-tools">
          
          <?php 
          
            if ($_SESSION["grupo"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez") {
          
          if ($_SESSION["grupo"] == "Generador"  || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
            echo '<button class="btn btn-warning" id="nuevaOrden" name="nuevaOrden" data-toggle="modal" data-target="#nuevaOrdenTrabajo"><i class="fa fa-file-text" aria-hidden="true"></i> Nueva Orden</button>';  
            
            echo '<a href="vistas/modulos/reportes.php?reporteRuta=ordenesdetrabajo">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
          }else{
            
              echo '<a href="vistas/modulos/reportes.php?reporteRuta=ordenesdetrabajo">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button></a>';
            
          }
              
            }else{
              echo '<button class="btn btn-warning" id="nuevaOrden" name="nuevaOrden" data-toggle="modal" data-target="#nuevaOrdenTrabajo"><i class="fa fa-file-text" aria-hidden="true"></i> Nueva Orden</button>';  
              
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="vistas/modulos/reportes.php?reporteRuta=ordenesdetrabajo">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
            }

          ?>
          

        </div> 
         <br>
        <table class="table-bordered table-striped dt-responsive tablaOrdenesTrabajo" width="100%" id="ordenesTrabajo" style="border: 2px solid #2667ce">
         
          <thead style="background:#2667ce;color: white">
           
           <tr>
             
             <th style="width:20px;height: 40px;border:none;">#</th>
             <th style="border:none">Creador</th>
             <th style="border:none">Código de Cliente</th>
             <th style="border:none">Cliente</th>
             <th style="border:none">Canal</th>
             <th style="border:none">Rfc</th>
             <th style="border:none">Agente de Ventas</th>
             <th style="border:none">Días de Crédito</th>
             <th style="border:none">Estatus del Cliente</th>
             <th style="border:none">Estatus de Orden</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Tipo de Pago</th>
             <th style="border:none">Metodo de Pago</th>
             <th style="border:none">Forma de Pago</th>
             <th style="border:none">Partidas</th>
             <th style="border:none">Unidades</th>
             <th style="border:none">Importe</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Elaboración</th>
             <th style="border:none">Tipo de Ruta</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Comentarios</th>
             <th style="border:none">Tiempo de proceso</th>
             <th style="border:none">Habilitar</th>
             <th style="border:none">Acciones</th>

           </tr> 

          </thead>

        
        </table>

      </div>

    </div>

  </section>

</div>
<!--=====================================
MODAL MOTIVO DE CANCELACION
======================================-->
<!-- Modal -->
<div class="modal fade" id="modalMotivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: tomato;">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white; font-weight: bolder;font-size: 15px;">MOTIVO DE CANCELACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><img src="vistas/img/plantilla/motivo.png" width="10%"></center>
            <br>

            <div class="col-lg-12">

                <textarea style="min-height: 200px;width: 100%;border: none;" name="verCancelacion" id="verCancelacion" style="border: none;text-transform: uppercase;font-size: 16px;width: 100%;" readonly></textarea>
            </div>
      
      </div>
      <br>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

<!--=====================================
MODAL CREAR NUEVA ORDEN DE TRABAJO
======================================-->
<div class="modal fade" id="nuevaOrdenTrabajo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form role="form" method="POST" enctype="multipart/form-data">
      <div class="modal-header" style="background: #2667ce;">
        <center><h3 class="modal-title" style="color:white"><i class="fa fa-file-text"></i> GENERAR NUEVA ORDEN</h3></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">

            <div class="box-body">
        
                <div class="form-group">

                    <div class="container col-lg-12">

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12">

                            <span style="font-weight: bold">Creado Por</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" required="true" name="otCreado" id="otCreado">

                                    <option value="Ulises Tuxpan">Ulises Tuxpan</option>

                                    <option value="Miguel Gutierrez">Miguel Gutierrez</option>

                                    </select>

                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <span style="font-weight: bold">Código Cliente</span>
                       
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg ui-autocomplete-input"  type="text" value="" id="otCodigoCliente" name="otCodigoCliente" placeholder="Ingrese Codigo o Nombre de Cliente"  autocomplete="off" required>
                                   
                                </div>

                            </div>
                          

                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Nombre Cliente</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otNombreCliente" id="otNombreCliente" required readonly>
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Rfc</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otRfcCliente" id="otRfcCliente" readonly>
                                   
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Vendedor</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otVendedor" id="otVendedor" readonly>
                                
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Días de Crédito</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                                    <input type="number" class="form-control input-lg" name="otDiasCredito" id="otDiasCredito" readonly>
                                    <input type="hidden" class="form-control input-lg" name="otEstatusCliente" id="otEstatusCliente">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Serie</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otSerie" id="otSerie" readonly value="OTRT">
                                
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Folio</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otFolio" id="otFolio">
                                   
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <span style="font-weight: bold">Partidas</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidas" id="otPartidas">
                                
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                
                                <span style="font-weight: bold">Unidades</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidades" id="otUnidades" required>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporte" id="otImporte" required>
                                   
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Recepción</span>
                                <div class="input-group dtp1" id="dtp1">
                                    <input type="text" class="form-control input-lg dtp1" name="otFechaRecepcion" id="otFechaRecepcion" required data-toggle="tooltip" data-placement="left" title="Ingresar fecha en que se recibio el pedido por parte del cliente y/o proveedor" placeholder="Fecha Recepción">
                                    <div class="input-group-addon add-on dtp1">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    </div>
                                    

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Elaboración</span>
                                    <div class="input-group dtp2" id="dtp2">
                                    <input type="text" class="form-control input-lg dtp2" name="otFechaElaboracion" id="otFechaElaboracion" required data-toggle="tooltip" data-placement="left" title="Ingresar fecha en que se concluyó la captura del pedido en sistema AdminPaq" placeholder="Fecha Elaboración">
                                    <div class="input-group-addon add-on dtp2">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    </div>
                                    

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Tipo de Ruta</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <select class="form-control" name="otTipoRuta" id="otTipoRuta" required>

                                    <option value="Mostrador">Mostrador</option>

                                    <option value="Foraneo">Foraneo</option>

                                    <option value="Local">Local</option>

                                    </select>


                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Observaciones</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <select class="form-control" name="otMovimiento"  id="otMovimiento">

                                    <option value="1">Facturar Y Resurtir</option>

                                    <option value="2">Facturar</option>


                                    </select>


                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <span style="font-weight: bold">Comentarios</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <textarea class="form-control input-lg" name="otComentarios" id="otComentarios" cols="10" rows="3"></textarea>

                                </div>
                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>
        </div>
        <div class="modal-footer" >
            <button type="button" class="btn btn-warning" style="background: #2667ce;" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-success" style="background: #2667ce;">Generar</button>
        </div>
        <?php

            $generarOrden = new ControladorOrdenes();
            $generarOrden -> ctrGenerarOrden();

        ?>
        </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR ORDEN DE TRABAJO
======================================-->

<div id="modalEditarOrden" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
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

                            <div class="col-lg-6 col-md-6 col-sm-12">

                            <span style="font-weight: bold">Creado Por</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" required="true" name="otCreadoEdit" id="otCreadoEdit">

                                    <option value="Ulises Tuxpan">Ulises Tuxpan</option>

                                    <option value="Enrique Flores">Enrique Flores</option>

                                    </select>

                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <span style="font-weight: bold">Código Cliente</span>
                       
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" value="" id="otCodigoClienteEdit" name="otCodigoClienteEdit" readonly>
                                    <input type="hidden" class="form-control input-lg" value="" id="otIdOrdenEdit" name="otIdOrdenEdit" readonly>
                                   
                                </div>

                            </div>
                          

                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Nombre Cliente</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otNombreClienteEdit" id="otNombreClienteEdit" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Rfc</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otRfcClienteEdit" id="otRfcClienteEdit" readonly>
                                   
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Vendedor</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otVendedorEdit" id="otVendedorEdit" readonly>
                                
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Días de Crédito</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                                    <input type="number" class="form-control input-lg" name="otDiasCreditoEdit" id="otDiasCreditoEdit" readonly>
                                    <input type="hidden" class="form-control input-lg" name="otEstatusClienteEdit" id="otEstatusClienteEdit">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Serie Orden</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otSerieEdit" id="otSerieEdit" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Folio Orden</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otFolioEdit" id="otFolioEdit" readonly>
                                   
                                </div>

                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <span style="font-weight: bold">Partidas</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidasEdit" id="otPartidasEdit" required>
                                
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                
                                <span style="font-weight: bold">Unidades</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidadesEdit" id="otUnidadesEdit" required>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteEdit" id="otImporteEdit" required>
                                   
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Recepción</span>
                                <div class="input-group dtp1E" id="dtp1E">
                                    <input type="text" class="form-control input-lg dtp1E" name="otFechaRecepcionEdit" id="otFechaRecepcionEdit" required data-toggle="tooltip" data-placement="left" title="Ingresar fecha en que se recibio el pedido por parte del cliente y/o proveedor" placeholder="Fecha Recepción" readonly>
                                    <div class="input-group-addon add-on dtp1E">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    </div>
                                    

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Elaboración</span>
                                    <div class="input-group dtp2E" id="dtp2E">
                                    <input type="text" class="form-control input-lg dtp2E" name="otFechaElaboracionEdit" id="otFechaElaboracionEdit" required data-toggle="tooltip" data-placement="left" title="Ingresar fecha en que se concluyó la captura del pedido en sistema AdminPaq" placeholder="Fecha Elaboración"  readonly>
                                    <div class="input-group-addon add-on dtp2E">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    </div>
                                    

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Tipo de Ruta</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <select class="form-control" name="otTipoRutaEdit" id="otTipoRutaEdit" required>

                                    <option value="Mostrador">Mostrador</option>

                                    <option value="Foraneo">Foraneo</option>

                                    <option value="Local">Local</option>

                                    </select>


                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Observaciones</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <select class="form-control" name="otMovimientoEdit"  id="otMovimientoEdit">

                                    <option value="1">Facturar Y Resurtir</option>

                                    <option value="2">Facturar</option>


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

            <button type="submit" class="btn btn-success" style="background: #2667ce;" id="modificarOrden">Actualizar</button>
        
        </div>

        <?php

          $editarOrdenTrabajo = new ControladorOrdenes();
          $editarOrdenTrabajo -> ctrEditarOrdenTrabajo();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $cancelarOrden = new ControladorOrdenes();
  $cancelarOrden -> ctrCancelarOrden();

?> 
<style type="text/css">
.ui-autocomplete-input {
  border: none; 
  font-size: 14px;
  margin-bottom: 5px;
  padding-top: 2px;
  border: 1px solid #DDD !important;
  padding-top: 0px !important;
  z-index: 1511;
  position: relative;
}
.ui-menu .ui-menu-item a {
  font-size: 12px;
}
.ui-autocomplete {
  position: fixed;
  top: 100%;
  left: 0;
  z-index: 1051 !important;
  float: left;
  display: none;
  min-width: 160px;
  width: 160px;
  padding: 4px 0;
  margin: 2px 0 0 0;
  list-style: none;
  background-color: #ffffff;
  border-color: #ccc;
  border-color: rgba(0, 0, 0, 0.2);
  border-style: solid;
  border-width: 1px;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 2px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  *border-right-width: 2px;
  *border-bottom-width: 2px;
}
.ui-menu-item > a.ui-corner-all {
    display: block;
    padding: 3px 15px;
    clear: both;
    font-weight: normal;
    line-height: 18px;
    color: #555555;
    white-space: nowrap;
    text-decoration: none;
}
.ui-state-hover, .ui-state-active {
      color: #ffffff;
      text-decoration: none;
      background-color: #0088cc;
      border-radius: 0px;
      -webkit-border-radius: 0px;
      -moz-border-radius: 0px;
      background-image: none;
}
</style>
<script type="text/javascript">
  $(document).ready(function() {
  $('.dtp1').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
 
});
$(document).ready(function() {
  $('.dtp2').datetimepicker({
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
        data: {funcion: "funcion31"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }
    </script>
    <script type="text/javascript">
       jQuery(function($){
           $("#otFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#otFechaElaboracion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     
    </script>
    

