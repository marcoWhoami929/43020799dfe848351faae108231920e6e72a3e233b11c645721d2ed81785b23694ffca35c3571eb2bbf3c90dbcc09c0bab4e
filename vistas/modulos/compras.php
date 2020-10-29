<?php
error_reporting(0);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Compras" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["nombre"] == "Diego Ávila"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
     COMPRAS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">COMPRAS</li>
    
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
        <div class="logi" id="logi">
          <CENTER><h2>CONTROL COMPRAS</h2></CENTER>
        <br>
        <?php
        $comprasExternas = ControladorCompras::ctrMostrarComprasExternasIndicador();
        $comprasInternas = ControladorCompras::ctrMostrarComprasInternasIndicador();
        ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#comprasExternas">Compras Con Provedores Externos <span class="badge"><?php echo $comprasExternas["comprasExternas"]; ?></span></button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#comprasInternas">Compras Internas <span class="badge"><?php echo $comprasInternas["comprasInternas"]; ?></span></button> 
        <br>
        <br>
        <br>
        <div class="box-tools">
          
          <?php 

              if ($_SESSION["grupo"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez") {
              

            if ($_SESSION["grupo"] == "Generador" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
              echo ' <a href="vistas/modulos/reportes.php?reporteCompras=compras">

               <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

            </a>';
            }else{

                echo ' <a href="vistas/modulos/reportes.php?reporteCompras=compras">

              <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

            </a>';

            }
                
              }else{
                echo '
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="vistas/modulos/reportes.php?reporteCompras=compras">

               <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

            </a>';
              }

            ?>

        </div>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaCompras" width="100%" id="compras" style="border: 2px solid #605ca8">
         
          <thead style="background:#605ca8;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border: none;">#</th>
             <th style="border:none">Folio de Pedido</th>
             <th style="border:none">Nombre del Vendedor</th>
             <th style="border:none">Nombre de Usuario</th>
             <th style="border:none">Número de Serie</th>
             <th style="border:none">Folio de Compra</th>
             <th style="border:none">Fecha de Cotización</th>
             <th style="border:none">Nombre del Cliente</th>
             <th style="border:none">Estatus de Compra</th>
             <th style="border:none">Tiempo de Entrega</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Elaboración</th>
             <th style="border:none">Fecha de Término</th>
             <th style="border:none">Importante</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Tiempo de Proceso</th>
             <th style="border:none">Utilidad</th>
             <th style="border:none">Compras</th>
             <th style="border:none;">Habilitar</th>
             <th style="border:none">Acciones</th>

           </tr> 

          </thead>

        </table>

        </div>
        

      </div>

    </div>

  
  </section>

</div>
<!-- Modal -->
<div class="modal fade" id="verObservaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:tomato; color:white">
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
MODAL HACER COMPRA INTERNA
======================================-->

<div id="modalEditarCompraInterna" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:tomato; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Compra Interna</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <div class="container col-lg-12">
                  
                <div class="row">
                  
                  <div class="col-lg-12">
                     <!-- ENTRADA PARA SELECCIONAR EL USUARIO -->
                      <span style="font-weight: bold">Usuario</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                         <input type="text" class="form-control input-lg" name="usuarioGeneral" id="usuarioGeneral" value="Guadalupe Hernández López" readonly>
                        

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SERIE DEL PEDIDO -->
                      <span style="font-weight: bold">Elegir Serie de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                         <input type="text" class="form-control input-lg" name="serieGeneral" id="serieGeneral" readonly>
                        

                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SELECCIONAR EL FOLIO DEL PEDIDO-->
                      <span style="font-weight: bold">Elegir Folio de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        
                         <input type="text" class="form-control input-lg" name="idPedidoGeneral" id="idPedidoGeneral" readonly>
                         <input type="hidden" name="idCompra1" id="idCompra1">

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">

                    <!-- ENTRADA PARA EL FOLIO DE COMPRA -->
                     <span style="font-weight: bold">Folio Compra</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" name="folioCompraGeneral" placeholder="Folio de Compra" required id="folioCompraGeneral">
                        
                      </div>

                  </div>
                  <div class="col-lg-6">

                    <!-- ENTRADA PARA EL NOMBRE DEL CLIENTE -->
                     <span style="font-weight: bold">Cliente</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" name="clienteGeneral" id="clienteGeneral" placeholder="Ingresar nombre del cliente" required readonly>
                        
                      </div>

                  </div>
                  
                </div>
                <br>
                <div class="row">
                  
                   <div class="col-lg-6">

                    <!-- ENTRADA PARA CANTIDAD -->
                     <span style="font-weight: bold">Cantidad</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="number" class="form-control input-lg" name="cantidadGeneral" placeholder="Cantidad" id="cantidadGeneral">
                        
                      </div>

                  </div>
                  <div class="col-lg-6">

                    <!-- ENTRADA PARA IMPORTE TOTAL DE COMPRA -->
                     <span style="font-weight: bold">Importe Total de Compra</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="importeCompra" placeholder="Importe total de compra" required id="importeCompra">
                        
                      </div>

                  </div>
                  
                </div>
                <br>
                
                <div class="row">
                   <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA RECEPCION -->
                     <span style="font-weight: bold">Fecha Recepción</span>
                      <div class="input-group datepick4" id="datepick4">
                          <input type="text" class="form-control input-lg datepick4" name="fechaRecepcionGeneral" id="fechaRecepcionGeneral" required  placeholder="Fecha Recepción">
                          <div class="input-group-addon add-on datepick4">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA ELABORACIÓN -->
                     <span style="font-weight: bold">Fecha Elaboración</span>
                      <div class="input-group datepick5" id="datepick5">
                          <input type="text" class="form-control input-lg datepick5" name="fechaElaboracionGeneral" id="fechaElaboracionGeneral" placeholder="Fecha Elaboración">
                          <div class="input-group-addon add-on datepick5">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                    </div>
                </div>
               
                <br>
                <div class="row">
                   <div class="col-lg-12">
                    <!-- ENTRADA PARA FECHA Y HORA TERMINO-->
                     <span style="font-weight: bold">Fecha Término</span>
                      <div class="input-group datepick6" id="datepick6">
                          <input type="text" class="form-control input-lg datepick6" name="fechaTerminoGeneral" id="fechaTerminoGeneral" data-toggle="tooltip" data-placement="left" title="" placeholder="Fecha Término">
                          <div class="input-group-addon add-on datepick6">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
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

                        <textarea type="text" class="form-control input-lg" name="observacionesGeneral" placeholder="Colocar en este campo algún requerimiento y/o solicitud especial para el pedido" id="observaciones" data-toggle="tooltip" data-placement="right" title="Colocar en este campo algún requerimiento y/o solicitud especial para el pedido"></textarea>

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

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

        <?php

          $realizarCompras = new ControladorCompras();
          $realizarCompras -> ctrRealizarComprasGenerales();

          $registroBitacora =  new ControladorCompras();
          $registroBitacora -> ctrRegistroBitacoraAgregar();


          $mostrarTiempoEdicion = new ControladorCompras();
          $mostrarTiempoEdicion -> ctrMostrarTiempoProcesoGenerales();

          $actualizarEstado = new ControladorCompras();
          $actualizarEstado -> ctrActualizarEstadoComprasGenerales();

          $actualizarStatusComprasEdicion = new ControladorCompras();
          $actualizarStatusComprasEdicion -> ctrActualizarStatusComprasGenerales();

          $actualizarEstadoPedido = new ControladorCompras();
          $actualizarEstadoPedido -> ctrActualizarEstadoPedidoGenerales();

          $actualizarStatusPedido = new ControladorCompras();
          $actualizarStatusPedido -> ctrActualizarStatusPedidoGenerales();


          $actualizarAdquisicionCompra = new ControladorCompras();
          $actualizarAdquisicionCompra -> ctrActualizarAdquisicionGenerales();

        
      
        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL VER COMPRAS
======================================-->

<!-- Modal -->
<div class="modal fade" id="modalVerCompras" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: tomato">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white">LISTA DE COMPRAS</h4>
      </div>
      <div class="modal-body" >
         <div class="container col-lg-12" id="individual">
                  <div class="row" >
                    <div class="col-lg-12" style="display: none;">
                      
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compSecciones" name="compSecciones" readonly style="border: none;background: white">
                        </div>
                    </div>
                   </div>
                   <div class="row" id="comp1">
                    <hr style="background: black">
                    <div class="col-lg-4">
                      <span style="font-weight: bold">Cantidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCantidad" name="compCantidad" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Unidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUnidad" name="compUnidad" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                      <span style="font-weight: bold">Código</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCodigo" name="compCodigo" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <span style="font-weight: bold">Descripción</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescripcion" name="compDescripcion" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <span style="font-weight: bold">Precio Venta</span>
                        <div class="input-group">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioUnitario" name="compPrecioUnitario" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                      <span style="font-weight: bold">Precio Compra</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioCompra" name="compPrecioCompra" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                      <span style="font-weight: bold">Descuento Proveedor</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescuentoProveedor" name="compDescuentoProveedor" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <span style="font-weight: bold">Utilidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUtilidad" name="compUtilidad" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                   </div>
                   <!--COMPRA 2-->
                   <div class="row" id="comp2" style="display: none">
                    <hr style="background: black">
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Cantidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCantidad2" name="compCantidad2" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Unidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUnidad2" name="compUnidad2" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Código</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCodigo2" name="compCodigo2" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Descripción</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescripcion2" name="compDescripcion2" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Precio Venta</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioUnitario2" name="compPrecioUnitario2" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Precio Compra</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioCompra2" name="compPrecioCompra2" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Descuento Proveedor</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescuentoProveedor2" name="compDescuentoProveedor" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Utilidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUtilidad2" name="compUtilidad2" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                   </div>
                   
                   <!-- COMPRA 3-->
                   <div class="row" id="comp3" style="display: none">
                    <hr style="background: black">
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Cantidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCantidad3" name="compCantidad3" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Unidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUnidad3" name="compUnidad3" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Código</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCodigo3" name="compCodigo3" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Descripción</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescripcion3" name="compDescripcion3" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Precio Venta</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioUnitario3" name="compPrecioUnitario3" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Precio Compra</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioCompra3" name="compPrecioCompra3" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Descuento Proveedor</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescuentoProveedor3" name="compDescuentoProveedor3" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <span style="font-weight: bold">Utilidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUtilidad3" name="compUtilidad3" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                   </div>
                   
                   <!--COMPRA 4-->
                   <div class="row" id="comp4" style="display: none">
                    <hr style="background: black">
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Cantidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCantidad4" name="compCantidad4" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Unidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUnidad4" name="compUnidad4" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Código</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCodigo4" name="compCodigo4" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Descripción</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescripcion4" name="compDescripcion4" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Precio Venta</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioUnitario4" name="compPrecioUnitario4" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Precio Compra</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioCompra4" name="compPrecioCompra4" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Descuento Proveedor</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescuentoProveedor4" name="compDescuentoProveedor4" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <span style="font-weight: bold">Utilidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUtilidad4" name="compUtilidad4" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                   </div>
                    
                   <!--COMPRA 5-->
                   <div class="row" id="comp5" style="display: none">
                    <hr style="background: black">
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Cantidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCantidad5" name="compCantidad5" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Unidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUnidad5" name="compUnidad5" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Código</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCodigo5" name="compCodigo5" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Descripción</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescripcion5" name="compDescripcion5" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Precio Venta</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioUnitario5" name="compPrecioUnitario5" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Precio Compra</span>
                        <div class="input-group">
                          <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span> 
                        <input type="text" class="form-control input-lg" id="compPrecioCompra5" name="compPrecioCompra5" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span style="font-weight: bold">Descuento Proveedor</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compDescuentoProveedor5" name="compDescuentoProveedor5" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <span style="font-weight: bold">Utilidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compUtilidad5" name="compUtilidad5" readonly style="border: none;background: white">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-percent"></i></span> 
                        </div>
                    </div>
                   </div>
                   
                   <!--FIN DE COLORES-->
                 

                </div>
                <div class="container col-lg-12" id="general">
                   <div class="row" id="comp6">
                    <hr style="background: black">
                    <div class="col-lg-6">
                      <span style="font-weight: bold">Cantidad</span>
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="compCantidad1" name="compCantidad1" readonly style="border: none;background: white">
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <span style="font-weight: bold">Importe de Compra</span>
                        <div class="input-group">
                        <span class="input-group-addon" style="border: none;"><i class="fa fa-dollar"></i></span>
                        <input type="text" class="form-control input-lg" id="compImporteCompra" name="compImporteCompra" readonly style="border: none;background: white">
                        </div>
                    </div>
                    
                   </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        
      </div>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR COMPRA
======================================-->

<div id="modalEditarCompraGeneral" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:tomato; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Compra Proveedores Externos</h4>

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
                     <!-- ENTRADA PARA SELECCIONAR EL VENDEDOR -->
                      <span style="font-weight: bold">Vendedor</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        
                        <select class="form-control" name="editarVendedor" id="editarVendedor" required>
                          
                          <option value="" id="editarVendedor">Seleccionar vendedor</option>

                          <option value="Luis Enrique Bustos Monterd">Luis Enrique Bustos Monterd</option>
                          <option value="Jose Luis Texis Rosas">Jose Luis Texis Rosas</option>
                          <option value="Orlando Raúl Briones Aguirre">Orlando Raúl Briones Aguirre</option>
                          <option value="Iván Chavez Campos">Iván Chavez Campos</option>
                          <option value="Edgar Pintle Huerta">Edgar Pintle Huerta</option>
                          <option value="Jonathan Gonzalez Sanchez">Jonathan Gonzalez Sanchez</option>

                        </select>

                        <input type="hidden" name="idCompra" id="idCompra">
                        
                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SELECCIONAR EL USUARIO -->
                      <span style="font-weight: bold">Usuario</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        
                        <input type="text" class="form-control input-lg" name="editarUsuario" id="editarUsuario" value="Guadalupe Hernández López" readonly>
                        

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SERIE DEL PEDIDO -->
                      <span style="font-weight: bold">Serie de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                        
                        <input type="text" class="form-control input-lg" name="editarSerie" required id="editarSerie" readonly>
                        
                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SELECCIONAR EL FOLIO DEL PEDIDO-->
                      <span style="font-weight: bold">Folio de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                        
                        <input type="text" class="form-control input-lg" name="editarIdPedido" required id="editarIdPedido" readonly>                        

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">

                    <!-- ENTRADA PARA EL FOLIO DE COMPRA -->
                     <span style="font-weight: bold">Folio Compra</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarFolioCompra" required id="editarFolioCompra" placeholder="Folio de Compra">
                        
                      </div>

                  </div>
                  <div class="col-lg-6">

                    <!-- ENTRADA PARA FECHA COTIZACIÓN -->
                     <span style="font-weight: bold">Fecha Cotización</span>
                       <div class="input-group datepick" id="datepick">
                          <input type="text" class="form-control input-lg datepick" name="editarFechaCotizacion" id="editarFechaCotizacion" required>
                          <div class="input-group-addon add-on datepick">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">

                    <!-- ENTRADA PARA EL NOMBRE DEL CLIENTE -->
                     <span style="font-weight: bold">Cliente</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required readonly>
                        
                      </div>

                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA NUMERO NUMERO DE SECCIONES-->
                     <span style="font-weight: bold">Cantidad de Compras</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <select name="editarSecciones" id="editarSecciones" class="form-control" onchange="comprasOnChange(this)" required>
                          
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                  </div>
                 
                </div>
                <br>
                <div class="container col-lg-12">
                   <div class="row" id="1">
                      
                      <div class="row">
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA CANTIDAD -->
                           <span style="font-weight: bold">Cantidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="number" class="form-control input-lg" name="editarCantidad"  id="editarCantidad" placeholder="Cantidad">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA UNIDAD -->
                           <span style="font-weight: bold">Unidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <select class="form-control" name="editarUnidad" id="editarUnidad" required>
                                <option value="" id="editarUnidad">Elegir unidad</option>

                                <option value="PZ">PZ</option>

                                <option value="LITRO">LITRO</option>

                                <option value="GALON">GALON</option>

                                <option value="CUBETA">CUBETA</option>

                              </select>
                              
                            </div>

                        </div>
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA EL CODIGO-->
                           <span style="font-weight: bold">Codigo</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" placeholder="Código">
                              
                            </div>

                        </div>
                       
                      </div>
                      <br>
                      <div class="row">
                        
                        <div class="col-lg-12">

                          <!-- ENTRADA PARA LA DESCRIPCION DEL PRODUCTO-->
                           <span style="font-weight: bold">Descripción</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" placeholder="Descripción">
                              
                            </div>

                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO UNITARIO -->
                           <span style="font-weight: bold">Precio Unitario Venta S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioUnitario" id="editarPrecioUnitario" placeholder="Precio de Venta">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO DE COMPRA-->
                           <span style="font-weight: bold">Precio de Compra Unitario S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioCompra" placeholder="Precio de Compra" id="editarPrecioCompra">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA DESCUENTO DEL PROVEEDOR-->
                           <span style="font-weight: bold">Descuento del Proveedor</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescuentoProveedor" id="editarDescuentoProveedor" placeholder="Descuento">
                              
                            </div>

                        </div>
                      </div>

                    </div>
                    <div class="row" id="2" style="display: none;">
                      
                      <div class="row">
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA CANTIDAD -->
                           <span style="font-weight: bold">Cantidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="number" class="form-control input-lg" name="editarCantidad2"  id="editarCantidad2" placeholder="Cantidad">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA UNIDAD -->
                           <span style="font-weight: bold">Unidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <select class="form-control" name="editarUnidad2" id="editarUnidad2">
                                <option value="" id="editarUnidad2">Elegir unidad</option>

                                <option value="PZ">PZ</option>

                                <option value="LITRO">LITRO</option>

                                <option value="GALON">GALON</option>

                                <option value="CUBETA">CUBETA</option>

                              </select>
                              
                            </div>

                        </div>
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA EL CODIGO-->
                           <span style="font-weight: bold">Codigo</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCodigo2" id="editarCodigo2" placeholder="Código">
                              
                            </div>

                        </div>
                       
                      </div>
                      <br>
                      <div class="row">
                        
                        <div class="col-lg-12">

                          <!-- ENTRADA PARA LA DESCRIPCION DEL PRODUCTO-->
                           <span style="font-weight: bold">Descripción</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescripcion2" id="editarDescripcion2" placeholder="Descripción">
                              
                            </div>

                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO UNITARIO -->
                           <span style="font-weight: bold">Precio Unitario Venta S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioUnitario2" id="editarPrecioUnitario2" placeholder="Precio de Venta">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO DE COMPRA-->
                           <span style="font-weight: bold">Precio de Compra Unitario S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioCompra2" placeholder="Precio de Compra" id="editarPrecioCompra2">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA DESCUENTO DEL PROVEEDOR-->
                           <span style="font-weight: bold">Descuento del Proveedor</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescuentoProveedor2" id="editarDescuentoProveedor2" placeholder="Descuento">
                              
                            </div>

                        </div>
                      </div>

                    </div>
                    <div class="row" id="3" style="display: none;">
                      
                      <div class="row">
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA CANTIDAD -->
                           <span style="font-weight: bold">Cantidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="number" class="form-control input-lg" name="editarCantidad3"  id="editarCantidad3" placeholder="Cantidad">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA UNIDAD -->
                           <span style="font-weight: bold">Unidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <select class="form-control" name="editarUnidad3" id="editarUnidad3">
                                <option value="" id="editarUnidad3">Elegir unidad</option>

                                <option value="PZ">PZ</option>

                                <option value="LITRO">LITRO</option>

                                <option value="GALON">GALON</option>

                                <option value="CUBETA">CUBETA</option>

                              </select>
                              
                            </div>

                        </div>
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA EL CODIGO-->
                           <span style="font-weight: bold">Codigo</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCodigo3" id="editarCodigo3" placeholder="Código">
                              
                            </div>

                        </div>
                       
                      </div>
                      <br>
                      <div class="row">
                        
                        <div class="col-lg-12">

                          <!-- ENTRADA PARA LA DESCRIPCION DEL PRODUCTO-->
                           <span style="font-weight: bold">Descripción</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescripcion3" id="editarDescripcion3" placeholder="Descripción">
                              
                            </div>

                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO UNITARIO -->
                           <span style="font-weight: bold">Precio Unitario Venta S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioUnitario3" id="editarPrecioUnitario3" placeholder="Precio de Venta">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO DE COMPRA-->
                           <span style="font-weight: bold">Precio de Compra Unitario S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioCompra3" placeholder="Precio de Compra" id="editarPrecioCompra3">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA DESCUENTO DEL PROVEEDOR-->
                           <span style="font-weight: bold">Descuento del Proveedor</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescuentoProveedor3" id="editarDescuentoProveedor3" placeholder="Descuento">
                              
                            </div>

                        </div>
                      </div>

                    </div>
                    <div class="row" id="4" style="display: none">
                      
                     <div class="row">
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA CANTIDAD -->
                           <span style="font-weight: bold">Cantidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="number" class="form-control input-lg" name="editarCantidad4"  id="editarCantidad4" placeholder="Cantidad">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA UNIDAD -->
                           <span style="font-weight: bold">Unidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <select class="form-control" name="editarUnidad4" id="editarUnidad4">
                                <option value="" id="editarUnidad4">Elegir unidad</option>

                                <option value="PZ">PZ</option>

                                <option value="LITRO">LITRO</option>

                                <option value="GALON">GALON</option>

                                <option value="CUBETA">CUBETA</option>

                              </select>
                              
                            </div>

                        </div>
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA EL CODIGO-->
                           <span style="font-weight: bold">Codigo</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCodigo4" id="editarCodigo4" placeholder="Código">
                              
                            </div>

                        </div>
                       
                      </div>
                      <br>
                      <div class="row">
                        
                        <div class="col-lg-12">

                          <!-- ENTRADA PARA LA DESCRIPCION DEL PRODUCTO-->
                           <span style="font-weight: bold">Descripción</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescripcion4" id="editarDescripcion4" placeholder="Descripción">
                              
                            </div>

                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO UNITARIO -->
                           <span style="font-weight: bold">Precio Unitario Venta S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioUnitario4" id="editarPrecioUnitario4" placeholder="Precio de Venta">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO DE COMPRA-->
                           <span style="font-weight: bold">Precio de Compra Unitario S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioCompra4" placeholder="Precio de Compra" id="editarPrecioCompra4">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA DESCUENTO DEL PROVEEDOR-->
                           <span style="font-weight: bold">Descuento del Proveedor</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescuentoProveedor4" id="editarDescuentoProveedor4" placeholder="Descuento">
                              
                            </div>

                        </div>
                      </div>

                    </div>
                    <div class="row" id="5" style="display: none;">
                      
                        <div class="row">
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA CANTIDAD -->
                           <span style="font-weight: bold">Cantidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="number" class="form-control input-lg" name="editarCantidad5"  id="editarCantidad5" placeholder="Cantidad">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA UNIDAD -->
                           <span style="font-weight: bold">Unidad</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <select class="form-control" name="editarUnidad5" id="editarUnidad5">
                                <option value="" id="editarUnidad5">Elegir unidad</option>

                                <option value="PZ">PZ</option>

                                <option value="LITRO">LITRO</option>

                                <option value="GALON">GALON</option>

                                <option value="CUBETA">CUBETA</option>

                              </select>
                              
                            </div>

                        </div>
                         <div class="col-lg-4">

                          <!-- ENTRADA PARA EL CODIGO-->
                           <span style="font-weight: bold">Codigo</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCodigo5" id="editarCodigo5" placeholder="Código">
                              
                            </div>

                        </div>
                       
                      </div>
                      <br>
                      <div class="row">
                        
                        <div class="col-lg-12">

                          <!-- ENTRADA PARA LA DESCRIPCION DEL PRODUCTO-->
                           <span style="font-weight: bold">Descripción</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescripcion5" id="editarDescripcion5" placeholder="Descripción">
                              
                            </div>

                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO UNITARIO -->
                           <span style="font-weight: bold">Precio Unitario Venta S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioUnitario5" id="editarPrecioUnitario5" placeholder="Precio de Venta">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA PRECIO DE COMPRA-->
                           <span style="font-weight: bold">Precio de Compra Unitario S/IVA</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarPrecioCompra5" placeholder="Precio de Compra" id="editarPrecioCompra5">
                              
                            </div>

                        </div>
                        <div class="col-lg-4">

                          <!-- ENTRADA PARA DESCUENTO DEL PROVEEDOR-->
                           <span style="font-weight: bold">Descuento del Proveedor</span>
                            <div class="input-group">
                    
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescuentoProveedor5" id="editarDescuentoProveedor5" placeholder="Descuento">
                              
                            </div>

                        </div>
                      </div>

                    </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-12">

                    <!-- ENTRADA PARA  TIEMPO DE ENTREGA -->
                     <span style="font-weight: bold">Tiempo de Entrega</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarTiempoEntrega" required id="editarTiempoEntrega">
                        
                      </div>

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA RECEPCION -->
                     <span style="font-weight: bold">Fecha Recepción</span>
                      <div class="input-group datepick1" id="datepick1">
                          <input type="text" class="form-control input-lg datepick1" name="editarFechaRecepcion" id="editarFechaRecepcion" required>
                          <div class="input-group-addon add-on datepick1">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                   <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA ELABORACIÓN -->
                     <span style="font-weight: bold">Fecha Elaboración</span>
                      <div class="input-group datepick2" id="datepick2">
                          <input type="text" class="form-control input-lg datepick2" name="editarFechaElaboracion" id="editarFechaElaboracion">
                          <div class="input-group-addon add-on datepick2">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                </div>
                <br>
                <div class="row">
                   <div class="col-lg-12">
                    <!-- ENTRADA PARA FECHA Y HORA TERMINO-->
                     <span style="font-weight: bold">Fecha Término</span>
                      <div class="input-group datepick3" id="datepick3">
                          <input type="text" class="form-control input-lg datepick3" name="editarFechaTermino" id="editarFechaTermino">
                          <div class="input-group-addon add-on datepick3">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                </div>
                <br>
                <div class="row">
                   <div class="col-lg-12">
                     <!-- ENTRADA PARA ESTADO DE LA COMPRA -->
                      <span style="font-weight: bold">Elegir Status</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarStatus" id="editarStatus" required="true">
                          <option value="" id="editarStatus">Elegir status</option>

                          <option value="0">Cotizando</option>

                          <option value="1">En Recolección</option>

                          <option value="2">Proceso de Pago</option>

                          <option value="3">Autorización Pendiente</option>

                          <option value="4">Concluido</option>

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
                
              </div>
             

            </div>


          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Compra</button>

        </div>
           <?php

          $editarCompra = new ControladorCompras();
          $editarCompra -> ctrEditarCompras();

          $registroBitacora =  new ControladorCompras();
          $registroBitacora -> ctrRegistroBitacora();

          $mostrarTiempoEdicion = new ControladorCompras();
          $mostrarTiempoEdicion -> ctrMostrarTiempoProcesoEdicion();

          $actualizarEstado = new ControladorCompras();
          $actualizarEstado -> ctrActualizarEstadoComprasProveedores();

          $actualizarStatusComprasEdicion = new ControladorCompras();
          $actualizarStatusComprasEdicion -> ctrActualizarStatusComprasEdicion();

          $actualizarEstadoPedido = new ControladorCompras();
          $actualizarEstadoPedido -> ctrActualizarEstadoPedido();

          $actualizarStatusPedido = new ControladorCompras();
          $actualizarStatusPedido -> ctrActualizarStatusPedido();


          $actualizarAdquisicionCompra = new ControladorCompras();
          $actualizarAdquisicionCompra -> ctrActualizarAdquisicion();


        ?>
  
      </form>

    </div>

  </div>

</div>



<?php 
  $item = null;
  $valor = null;

  $comprasProveedores = ControladorCompras::ctrMostrarComprasProveedores($item, $valor);
  $comprasInter = ControladorCompras::ctrMostrarComprasInter($item, $valor);

?>
<!--====================================
  MODAL PARA VER CUALES SON LAS COMPRAS INTERNAS
======================================-->

<!-- Modal -->
<div class="modal fade" id="comprasInternas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: tomato">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size:18px; color: white; font-weight: bold">COMPRAS INTERNAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
           <?php foreach ($comprasInter as $key => $value){

              echo '<span style="font-size:14px; font-weight:bold">Folio:</span> '.$value["idPedido"].' <span style="font-size:14px; font-weight:bold">Serie:</span> '.$value["serie"].'';
              echo '<br>';
              
           }

            
         ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>

<!--====================================
======================================-->
<!--====================================
  MODAL PARA VER CUALES SON LAS COMPRAS EXTERNAS
======================================-->
<!-- Modal -->
<div class="modal fade" id="comprasExternas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: tomato">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size:18px; color: white; font-weight: bold">COMPRAS CON PROVEEDORES EXTERNOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
           <?php foreach ($comprasProveedores as $key => $value2){

              echo '<span style="font-size:14px; font-weight:bold">Folio:</span> '.$value2["folio"].' <span style="font-size:14px; font-weight:bold">Serie:</span> '.$value2["serie"].'';
              echo '<br>';
              
           }

            
         ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

<!--====================================
======================================-->

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick').datetimepicker({
    format: 'YYYY-MM-DD',
    ignoreReadonly: true
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick1').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick2').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick3').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick4').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick5').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick6').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
});
</script>

<script>
   $(document).ready(function(){
        
        $("#serie").click(function(e){
          ;
          var url = "atencionCompras.php";
          $.getJSON(url, { _num1 : $("#serie").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#idPedido").append('<option value="' + cliente.folio + '">' + cliente.folio + '</option>');

              if(cliente.resultado == "1"){
                $("#resultado1").hide();
                $("#resultado0").show();
                $("#resultado").css("color","white");
                $("#resultado").text("Hay folios en esta serie");
              }else{
                $("#resultado1").show();
                $("#resultado0").hide();
                $("#resultados").css("color","white");
                $("#resultados").text("Folios no disponibles");
              }
            });
          });
        });
        $("#serie").click(function(){
          $('#idPedido').html('');
          $("#cliente").val('');
    });
          
    });
</script>
<script>
   $(document).ready(function(){
        
        $("#serieGeneral").click(function(e){
          ;
          var url = "atencionCompras.php";
          $.getJSON(url, { _num1 : $("#serieGeneral").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#idPedidoGeneral").append('<option value="' + cliente.folio + '">' + cliente.folio + '</option>');

              if(cliente.resultado == "1"){
                $("#resultado3").hide();
                $("#resultado2").show();
                $("#resultados2").css("color","white");
                $("#resultados2").text("Hay folios en esta serie");
              }else{
                $("#resultado3").show();
                $("#resultado2").hide();
                $("#resultados3").css("color","white");
                $("#resultados3").text("Folios no disponibles");
              }
            });
          });
        });
        $("#serieGeneral").click(function(){
          $('#idPedidoGeneral').html('');
          $("#clienteGeneral").val('');
    });
          
    });
</script>
 <script type="text/javascript">
      $(document).ready(function(){

        $("#idPedido").click(function(e){
          ;
          var url = "compras.php";
          $.getJSON(url, { _num1 : $("#idPedido").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#cliente").val(cliente.nombreCliente);
             
            });
          });
        });
    });
      
    </script> 
    <script type="text/javascript">
      $(document).ready(function(){

        $("#idPedidoGeneral").click(function(e){
          ;
          var url = "compras.php";
          $.getJSON(url, { _num1 : $("#idPedidoGeneral").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#clienteGeneral").val(cliente.nombreCliente);
             
            });
          });
        });
    });
      
    </script>
    <script type="text/javascript">

      function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion12"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }

    </script>
    <script type="text/javascript">
      jQuery(function($){
           $("#fechaRecepcionGeneral").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#fechaElaboracionGeneral").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#fechaTerminoGeneral").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
       jQuery(function($){
           $("#editarFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaElaboracion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaTermino").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     
    </script>
