<?php
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>


<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      ATENCIÓN A CLIENTES
  
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">ATENCIÓN A CLIENTES</li>
    
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
          
          if ($_SESSION["grupo"] == "Generador" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
            echo '<a href="vistas/modulos/reportes.php?reporte=atencionaclientes">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
          }else{

              echo '<a href="vistas/modulos/reportes.php?reporte=atencionaclientes">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button></a>';

          }
              
            }else{
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="vistas/modulos/reportes.php?reporte=atencionaclientes">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
            }

          ?>
          

        </div> 
         <br>
            <?php

                    if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["perfil"] == "Generador de Reportes") {
                      
                      
                        echo '<div class="">
                      <div class="row">
                        <form action="importAtencion.php" method="post" enctype="multipart/form-data" id="import_form">
                          <div class="col-md-4">
                            <input type="file" name="file" id="inputFile" />
                          </div>
                          <div class="col-md-2">
                            <input type="submit" class="btn btn-success" name="import_data" onclick="agregar()" value="IMPORTAR PEDIDOS">
                          </div>';

                          ?>
                         <?php 


                           

                       echo '</form>
                      </div>
                    </div>';

                    }
                     if ($_SESSION["perfil"] == "Administrador General") {
             

                        echo '<div class="">
                      <div class="row">
                        <form action="importAtencionPartidas.php" method="post" enctype="multipart/form-data" id="import_form">
                          <div class="col-md-4">
                            <input type="file" name="file" id="inputFile" />
                          </div>
                          <div class="col-md-2">
                            <input type="submit" class="btn btn-success" name="import_data" value="ACTUALIZAR PARTIDAS">
                          </div>';

                          ?>
                         <?php 


                           

                       echo '</form>
                      </div>
                    </div>';

                    }
              
            ?>
        

         <br>
        <table class="table-bordered table-striped dt-responsive tablaAtencion" width="100%" id="atencion" style="border: 2px solid #F3826A ">
         
          <thead style="background:#F3826A;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none;">#</th>
             <th style="border:none">Creado Por</th>
             <th style="border:none">Código de Cliente</th>
             <th style="border:none">Nombre del Cliente</th>
             <th style="border:none">Canal</th>
             <th style="border:none">Rfc</th>
             <th style="border:none">Agente de Ventas</th>
             <th style="border:none">Días de Crédito</th>
             <th style="border:none">Estatus del Cliente</th>
             <th style="border:none">Estatus del Pedido</th>
             <th style="border:none">Número de Serie</th>
             <th style="border:none">Folio de Pedido</th>
             <th style="border:none">Tipo de Pago</th>
             <th style="border:none">Metodo de Pago</th>
             <th style="border:none">Forma de Pago</th>
             <th style="border:none">Orden de Compra</th>
             <th style="border:none">Número de Partidas</th>
             <th style="border:none">Número de Unidades</th>
             <th style="border:none">Importe</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Elaboración</th>
             <th style="border:none">Tipo de Ruta</th>
             <th style="border:none">Tipo de Compra</th>
             <th style="border:none">Observaciones</th>
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
MODAL EDITAR PEDIDO
======================================-->

<div id="modalEditarPedido" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:tomato; color:white">

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
                     <!-- ENTRADA PARA SELECCIONAR EL CREADOR -->
                      <span style="font-weight: bold">Creado Por</span>
                     <div class="input-group">
            
                         <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" data-toggle="tooltip" data-placement="left" title="Desplegar el listado y seleccionar el nombre de usuario que efectuó la captura del pedido" required="true" name="editarCreado" id="editarCreado">
                          
                          <option value="" id="editarCreado">Creado por</option>

                          <option value="Rocio Martínez">Rocio Martínez</option>
                         
                          <option value="Jose Luis Texis">Jose Luis Texis</option>

                          <option value="Miguel Gutierrez">Miguel Gutierrez</option>

                          <option value="Orlando Briones">Orlando Briones</option>

                          <option value="Diego Avila">Diego Avila</option>

                          <option value="Aurora Fernandez">Aurora Fernandez</option>


                        </select>

                        
                      </div>
                  </div>

                  <div class="col-lg-6">

                    <!-- ENTRADA PARA EL CODIGO DEL CLIENTE -->
                     <span style="font-weight: bold">Código Cliente</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarCodigoCliente" id="editarCodigoCliente" required readonly>
                        <input type="hidden" name="idPedido" id="idPedido" readonly>
                      </div>

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA EL CLIENTE -->
                     <span style="font-weight: bold">Nombre del Cliente</span>
                    <div class="input-group">
              
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <input type="text" class="form-control input-lg" name="editarNombreCliente" id="editarNombreCliente">
                       
                    </div>
                  </div>
                
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA SELECCIONAR EL CANAL -->
                     <span style="font-weight: bold">Canal</span>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                      <select class="form-control" name="editarCanal" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar el canal" id="editarCanal" required>
                        
                        <option value="" id="editarCanal">Seleccionar canal</option>

                        <option value="Cedis">CEDIS</option>

                        <option value="Mayorazgo">MAYORAZGO</option>

                      </select>

                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                    <!-- ENTRADA PARA EL RFC-->
                     <span style="font-weight: bold">Rfc</span>
                    <div class="input-group">
              
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <input type="text" class="form-control input-lg" name="editarRfc" id="editarRfc" readonly>

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA EL VENDEDOR -->
                     <span style="font-weight: bold">Vendedor</span>
                    <div class="input-group">
              
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <input type="text" class="form-control input-lg" name="editarAgenteVentas" placeholder="Ingresar Vendedor" id="editarAgenteVentas" readonly>

                    </div>
                  </div>
                 
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA DÍAS DE CREDITO -->
                     <span style="font-weight: bold">Días de Crédito</span>
                    <div class="input-group">
              
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                      <input type="text" class="form-control input-lg" name="editarDiasCredito" id="editarDiasCredito" readonly>

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA ESTATUS CLIENTE -->
                    <span style="font-weight: bold">Estatus Cliente</span>
                 
                    <div class="input-group">
              
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" style="text-transform: uppercase;" class="form-control input-lg" name="editarStatusCliente" id="editarStatusCliente" readonly>
                      
                  </div>
                </div>
              </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA SERIE -->
                     <span style="font-weight: bold">Serie</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 
                        <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" required readonly>

                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FOLIO-->
                     <span style="font-weight: bold">Folio</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                        <input type="number" class="form-control input-lg" name="editarFolio" placeholder="Folio del pedido" id="editarFolio" readonly>

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA TIPO DE PAGO-->
                     <span style="font-weight: bold">Tipo de Pago</span>
                      <div class="input-group">
                
                       <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                      <select class="form-control" name="editarTipoPago" data-toggle="tooltip" data-placement="left" title="Desplegar el listado y seleccionar el tipo de pago" id="editarTipoPago" >
                        
                        <option value="" id="editarTipoPago">Seleccionar tipo de pago</option>

                        <option value="Crédito">Crédito</option>

                        <option value="Contado">Contado</option>

                      </select>


                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA MÉTODO DE PAGO -->
                     <span style="font-weight: bold">Método de Pago</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                      <select class="form-control" name="editarMetodoPago" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar el método de pago" id="editarMetodoPago">
                        
                        <option value="" id="editarMetodoPago">Seleccionar método de pago</option>

                        <option value="Pago en una sola exhibición">Pago en una sola exhibición</option>

                        <option value="Pago en parcialidades">Pago en parcialidades</option>

                      </select>


                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FORMAS DE PAGO-->
                     <span style="font-weight: bold">Formas de Pago</span>
                      <div class="input-group">
                
                       <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                      <select class="form-control" name="editarFormaPago" data-toggle="tooltip" data-placement="left" title="Desplegar el listado y seleccionar la forma de pago" id="editarFormaPago">
                        
                        <option value="" id="editarFormaPago">Seleccionar forma de pago</option>

                        <option value="01">Efectivo</option>

                        <option value="02">Cheque nominativo</option>

                        <option value="03">Transferencia electrónica de fondos</option>

                        <option value="04">Tarjeta de crédito</option>

                        <option value="05">Monedero electrónico</option>

                        <option value="06">Dinero electrónico</option>

                        <option value="08">Vales de despensa</option>

                        <option value="12">Dación de pago</option>

                        <option value="13">Pago por subrogación</option>

                        <option value="14">Pago por consignación</option>

                        <option value="15">Condonación</option>

                        <option value="17">Compensación</option>

                        <option value="23">Novación</option>

                        <option value="24">Confusión</option>

                        <option value="25">Remisión de deuda</option>

                        <option value="26">Prescripción o caducidad</option>

                        <option value="27">A satisfacción del acreedor</option>

                        <option value="28">Tarjeta de débito</option>

                        <option value="29">Tarjeta de servicios</option>

                        <option value="30">Aplicación de anticipos</option>

                        <option value="31">Intermediario de pagos</option>

                        <option value="99">Por definir</option>

                      </select>


                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA NUMERO DE ORDEN -->
                     <span style="font-weight: bold">Orden de Compra</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarOrdenCompra" placeholder="Ingresar orden de compra" id="editarOrdenCompra">

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-4">
                    <!-- ENTRADA PARA NUMERO PARTIDAS -->
                     <span style="font-weight: bold">Número de Partidas</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="number" class="form-control input-lg" name="editarNumeroPartidas" placeholder="Partidas" id="editarNumeroPartidas" required >

                      </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- ENTRADA PARA NUMERO UNIDADES -->
                     <span style="font-weight: bold">Número de Unidades</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarNumeroUnidades" placeholder="Unidades" id="editarNumeroUnidades" required>

                      </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- ENTRADA PARA IMPORTE -->
                     <span style="font-weight: bold">Importe</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarImporte" placeholder="Importe" id="editarImporte" required>

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA RECEPCION -->
                     <span style="font-weight: bold">Fecha Recepción</span>
                      <div class="input-group datepick3" id="datepick3">
                          <input type="text" class="form-control input-lg datepick3" name="editarFechaRecepcion" id="editarFechaRecepcion" required data-toggle="tooltip" data-placement="left" title="Ingresar fecha en que se recibio el pedido por parte del cliente y/o proveedor" placeholder="Fecha Recepción">
                          <div class="input-group-addon add-on datepick3">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA ELABORACIÓN -->
                     <span style="font-weight: bold">Fecha Elaboración</span>
                        <div class="input-group datepick4" id="datepick4">
                          <input type="text" class="form-control input-lg datepick4" name="editarFechaElaboracion" id="editarFechaElaboracion" required data-toggle="tooltip" data-placement="left" title="Ingresar fecha en que se concluyó la captura del pedido en sistema AdminPaq" placeholder="Fecha Elaboración">
                          <div class="input-group-addon add-on datepick4">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                </div>
                <br>
                
                <div class="row">
                   <div class="col-lg-6">
                    <!-- ENTRADA PARA ELEGIR TIPO RUTA -->
                    <span style="font-weight: bold">Tipo de Ruta</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarTipoRuta" data-toggle="tooltip" data-placement="left" title="Desplegar el listado y seleccionar tipo de entrega que se le realizará al cliente" id="editarTipoRuta" required>
                          
                          <option value="" id="editarTipoRuta">Seleccionar ruta</option>

                          <option value="Mostrador">Mostrador</option>

                          <option value="Foraneo">Foraneo</option>

                          <option value="Local">Local</option>

                        </select>


                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA TIENE IGUALADO -->
                    <span style="font-weight: bold">Tiene Igualado</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="tieneIgualado" data-toggle="tooltip" data-placement="left" title="Desplegar el listado y seleccionar si el pedido tiene igualado" id="tieneIgualado" required>
                          
                          <option value="" id="tieneIgualado">Seleccionar</option>

                          <option value="1">Si</option>

                          <option value="0">No</option>


                        </select>


                      </div>
                  </div>
                  <!--
                   <div class="col-lg-6">-->
                    <!-- ENTRADA PARA TIPO DE COMPRA -->
                    <!--
                    <span style="font-weight: bold">Se Requiere Compra</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarTipoCompra" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar tipo de compra que realizará el área de compras" id="editarTipoCompra" required>
                          
                          <option value="" id="editarTipoCompra">Seleccionar tipo</option>

                          <option value="0">Sin compra</option>

                          <option value="1">Proveedores Externos</option>

                        </select>


                      </div>
                  </div>
                -->
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA OBSERVACIONES-->
                     <span style="font-weight: bold">Observaciones</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-comment"></i></span> 

                        <textarea type="text" class="form-control input-lg" name="editarObservaciones" placeholder="Colocar en este campo algún requerimiento y/o solicitud especial para el pedido" id="editarObservaciones" data-toggle="tooltip" data-placement="left" title="Colocar en este campo algún requerimiento y/o solicitud especial para el pedido"></textarea>

                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA OBSERVACIONES-->
                     <span style="font-weight: bold">Observaciones</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-comment"></i></span> 

                        <textarea type="text" class="form-control input-lg" name="editarObservaciones2" placeholder="Colocar en este campo algún requerimiento y/o solicitud especial para el pedido" id="editarObservaciones2" data-toggle="tooltip" data-placement="left" title="Colocar en este campo algún requerimiento y/o solicitud especial para el pedido"></textarea>

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA ASIGNACIÓN-->
                     <span style="font-weight: bold">Asignar Comentario a Área</span>
                      <div class="input-group">
                
                       <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarAsignacion" data-toggle="tooltip" data-placement="left" title="Desplegar el listado y seleccionar a que área desea asignar el comentario en específico" id="editarAsignacion" >
                          
                          <option value="" id="editarAsignacion">Seleccionar área</option>

                          <option value="almacen">Almacén</option>

                          <option value="laboratoriocolor">Laboratorio de color</option>

                          <option value="compras">Compras</option>

                          <option value="facturacion">Facturación</option>

                          <option value="logistica">Logística</option>

                        </select>

                      </div>
                  </div>
                   <div class="col-lg-6">
                    <!-- ENTRADA PARA ASIGNACIÓN-->
                     <span style="font-weight: bold">Asignar Comentario a Área</span>
                      <div class="input-group">
                
                       <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarAsignacion2" data-toggle="tooltip" data-placement="left" title="Desplegar el listado y seleccionar a que área desea asignar el comentario en específico" id="editarAsignacion2">
                          
                          <option value="" id="editarAsignacion2">Seleccionar área</option>

                          <option value="almacen">Almacén</option>

                          <option value="laboratoriocolor">Laboratorio de color</option>

                          <option value="compras">Compras</option>

                          <option value="facturacion">Facturación</option>

                          <option value="logistica">Logística</option>

                        </select>

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

          $editarPedido= new ControladorAtencion();
          $editarPedido -> ctrEditarPedido();

          $actualizarClienteAlmacen = new ControladorAtencion();
          $actualizarClienteAlmacen -> ctrActualizarClienteAlmacen();

          $actualizarClienteFacturacion = new ControladorAtencion();
          $actualizarClienteFacturacion -> ctrActualizarClienteFacturacion();

          $actualizarClienteLogistica = new ControladorAtencion();
          $actualizarClienteLogistica -> ctrActualizarClienteLogistica();

          $registroBitacora =  new ControladorAtencion();
          $registroBitacora -> ctrRegistroBitacora(); 

          $crearCompra = new ControladorCompras();
          $crearCompra -> ctrSinAdquisicion();

          $actualizarFechaPedido = new ControladorAtencion();
          $actualizarFechaPedido -> ctrActualizarFechaPedido();

          //$actualizarTipoRuta = new ControladorLogistica();
          //$actualizarTipoRuta -> ctrActualizarTipoRuta();

          $crearCompraLogistica = new ControladorCompras();
          $crearCompraLogistica -> ctrSinAdquisicionLogistica();

          $actualizarCompra = new ControladorCompras();
          $actualizarCompra -> ctrActualizarEstadoComprasAtencion();

          $actualizarStatusComprasAtencion = new ControladorCompras();
          $actualizarStatusComprasAtencion -> ctrActualizarStatusComprasAtencion();

          $actualizarSinAdquisicion = new ControladorCompras();
          $actualizarSinAdquisicion -> ctrActualizarSinAdquisicion();

          $actualizarPartidas = new ControladorAlmacen();
          $actualizarPartidas -> ctrActualizarPartidas();

          $actualizarUnidades = new ControladorAlmacen();
          $actualizarUnidades -> ctrActualizarUnidades();

          $actualizarImporte = new ControladorAlmacen();
          $actualizarImporte -> ctrActualizarImporte();

          $actualizarPartidasFacturacion =  new ControladorFacturacion();
          $actualizarPartidasFacturacion -> ctrActualizarPartidas();

          $actualizarUnidadesFacturacion =  new ControladorFacturacion();
          $actualizarUnidadesFacturacion -> ctrActualizarUnidades();

          $actualizarImporteFacturacion =  new ControladorFacturacion();
          $actualizarImporteFacturacion -> ctrActualizarImporte();

          $actualizarOrdenCompra = new ControladorLaboratorio();
          $actualizarOrdenCompra -> ctrActualizarOrdenCompra();

          $actualizarOrdenCompraFacturacion = new ControladorFacturacion();
          $actualizarOrdenCompraFacturacion -> ctrActualizarOrdenCompra();

          $actualizarTieneIgualado = new ControladorLaboratorio();
          $actualizarTieneIgualado ->ctrActualizarTieneIgualado();

          $actualizarEstadoPedido = new ControladorLogistica();
          $actualizarEstadoPedido -> ctrActualizarEstadoPedido();

          $agregarObservacionesExtra = new ControladorAtencion();
          $agregarObservacionesExtra -> ctrAgregarObservacionesExtra();

          $agregarObservacionesExtra2 = new ControladorAtencion();
          $agregarObservacionesExtra2 -> ctrAgregarObservacionesExtra2();
        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $eliminarPedido = new ControladorAtencion();
  $eliminarPedido -> ctrEliminarPedido();

?> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick').datetimepicker({
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
      $(document).ready(function(){
       
        $("#codigoCliente").focus();

        $("#codigoCliente").keyup(function(e){
          ;
          var url = "enter.php";
          $.getJSON(url, { _num1 : $("#codigoCliente").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#nombreCliente").val(cliente.nombreCliente);
              $("#rfc").val(cliente.rfc);
              $("#agenteVentas").val(cliente.agenteVentas);
              $("#diasCredito").val(cliente.diasCredito);
              $("#statusCliente").val(cliente.statusCliente);

              
              if(cliente.resultado == "1"){
                $("#resultado1").hide();
                $("#resultado0").show();
                $("#resultado").css("color","white");
                $("#resultado").text("Codigo disponible");
              }else{
                $("#resultado1").show();
                $("#resultado0").hide();
                $("#resultados").css("color","white");
                $("#resultados").text("Codigo no disponible");
              }

            });
          });
        });
    });
      
     
      $("#fechaElaboracion").click(function(){
          document.getElementById("fechaRecepcion").readOnly = true;
      });
      $("#tipoRuta").click(function(){
          document.getElementById("fechaElaboracion").readOnly = true;
      });

    </script> 
    <script type="text/javascript">

      function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion8"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }
    
      function agregar(){
        $.ajax({
          url: "bitacora.php",
          method: "GET",
          async: false,
          data: {funcion: "funcion20"},
          dataType: "json",
          success: function(respuesta){

          }
        })
      }

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
                      title: "¡Los datos han sido ingresados correctamente!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                      if(result.value){
                        
                        window.location = "atencionClientes";

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
                        
                          window.location = "atencionClientes";

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
                        
                          window.location = "atencionClientes";

                        }

                      });
                }
            }
        }else{
            
        }
    }
    </script>
  
    <script type="text/javascript">
              $("#modalEditarPedido").draggable({
              handle: ".modal-header"
               });

    </script>
    <!--ATAJOS DE TECLAS EN SISTEMA-->
    <script type="text/javascript">
           shortcut.add("Ctrl+X",function() {
                 document.getElementById("inputFile").click();
            });
            shortcut.add("Ctrl+A",function() {
                 document.getElementById("editarPed").click();
            });
            shortcut.add("Esc",function() {
                 document.getElementById("minimizar").click();
            });
            shortcut.add("Ctrl+B", function() {
                document.getElementsByTagName("input")[2].focus();
            });
            shortcut.add("Ctrl+M", function() {
                document.getElementById("modificar").click();
            });

    </script>
    <!--ATAJOS DE TECLAS EN SISTEMA-->
    <script type="text/javascript">
       jQuery(function($){
           $("#editarFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaElaboracion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     
    </script>
    

