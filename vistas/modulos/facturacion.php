<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["perfil"] == "Logistica" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        FACTURACIÓN
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">FACTURACIÓN</li>
    
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
        <CENTER><h2>CONTROL DE FACTURACIÓN</h2></CENTER>
        
        <div class="box-tools">

        <?php 

            if ($_SESSION["grupo"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez") {
             

          if ($_SESSION["grupo"] == "Generador" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
            echo '<a href="vistas/modulos/reportes.php?reporte=facturacion">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>

          <a href="vistas/modulos/reportes.php?reporteFacturacion=facturacion">

            <button class="report btn btn-warning" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte Detallado</button>

          </a>';
           echo '<button class="report btn btn-success" id="updateFacturas"><i class="fa fa-spinner"></i>Actualizar</button>';
          }else{

              echo '<a href="vistas/modulos/reportes.php?reporte=facturacion">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';

          }
              
            }else{
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="vistas/modulos/reportes.php?reporte=facturacion">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>

          <a href="vistas/modulos/reportes.php?reporteFacturacion=facturasgenerales">

            <button class="report btn btn-warning" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte Detallado</button>

          </a>';
          echo '<button class="report btn btn-success" id="updateFacturas"><i class="fa fa-spinner"></i>Actualizar</button>';
            }

          ?>
        </div>
        <br>
        <?php

                    if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles"  || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

                      /*
                      
                        echo '<div class="">
                      <div class="row">
                        <form action="importFacturacion.php" method="post" enctype="multipart/form-data" id="import_form">
                          <div class="col-md-4">
                            <input type="file" name="file" id="inputFile" />
                          </div>
                          <div class="col-md-2">
                            <input type="submit" class="btn btn-success" name="import_data" onclick="agregar()" value="IMPORTAR FACTURAS">
                          </div>';

                          ?>
                         <?php 


                           

                       echo '</form>
                      </div>
                    </div>';
                    */

                    }
              
            ?>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaFacturacion estilosBordesTablas" width="100%" id="facturacion" >
         
          <thead class="estilosTablas">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border: none">Cliente</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Nombre de Usuario</th>
             <th style="border:none">Serie de Factura</th>
             <th style="border:none">Folio de Factura</th>
             <th style="border:none">Datos de Factura</th>
             <th style="border:none">Estatus de Pedido</th>
             <th style="border:none">Orden de Compra</th>
             <th style="border:none">Tipo</th>
             <th style="border:none">Cantidad</th>
             <th style="border:none">Importe</th>
             <th style="border:none">Estatus de Cliente</th>
             <th style="border:none">Nivel de Surtimiento</th>
             <th style="border:none">Importante</th>
             <th style="border:none">Facturas</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Entrega</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Tiempo de Proceso</th>
             <th style="border:none">Habilitada</th>
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
MODAL VER FACTURAS
======================================-->


<!-- Modal -->
<div class="modal fade" id="modalVerFacturas" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header" style="background: #2667ce;">
      <button type="button" class="close btnDismissFactura" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <center><h3 class="modal-title" style="color:white"><i class="fa fa-file-text"></i> LISTA DE FACTURAS</h3></center>       
    </div>
      <div class="modal-body">
        <div class="container col-lg-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
               <table class="table-bordered table-striped dt-responsive tablaListaFacturasVista estilosBordesTablas" width="100%" >
         
                <thead class="estilosTablas">
                 
                 <tr>
                   
                   <th style="width:20px;height: 40px;border:none">Serie</th>
                   <th style="border: none">Folio</th>
                   <th style="border:none">Partidas</th>
                   <th style="border:none">Unidades</th>
                   <th style="border:none">Importe</th>
                   <th style="border:none">Estatus</th>
                   <th style="border:none">Fecha</th>
                   <th style="border:none">Estatus Entrega</th>
                  
                 </tr> 

                </thead>
               

              </table>
            </div>
            
          </div>
          
        </div>
        
      </div>
      <div class="modal-footer" style="margin-top:100px">
        <button type="button" class="btn btn-info btnDismissFactura" data-dismiss="modal" style="margin-top: 30px">Cerrar</button>
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

          <button type="button" class="close" data-dismiss="modal" id="xEditar" name="xEditar">&times;</button>

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
                     <!-- ENTRADA PARA SELECCIONAR EL USUARIO -->
                      <span style="font-weight: bold">Usuario</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarUsuario"  id="editarUsuario" required="true">
                          
                          <option value="" id="editarUsuario">Seleccionar Usuario</option>

                         
                          <option value="Miguel Gutierrez Angeles">Miguel Gutierrez Angeles</option>
                          <option value="Rocio Martínez">Rocio Martínez</option>
                          <option value="Diego Avila">Diego Avila</option>
                          <option value="Aurora Fernandez">Aurora Fernandez</option>
                          
                        </select>
                        <input type="hidden" name="idFacturacion" id="idFacturacion">
                        

                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SERIE PEDIDO -->
                      <span style="font-weight: bold">Serie Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" required readonly>
                        

                      </div>
                  </div>
                  
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SELECCIONAR EL PEDIDO-->
                      <span style="font-weight: bold">Folio de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                        
                        <input type="text" class="form-control input-lg" name="editarIdPedido" id="editarIdPedido" required readonly>

                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SERIE FACTURA -->
                      <span style="font-weight: bold">Serie Factura</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                        <input type="hidden" class="form-control input-lg" id="serieFacturaGral" name="serieFacturaGral">
                        <select class="form-control" name="editarSerieFactura0" id="editarSerieFactura0" required="true">
                          <option value="" id="">Elegir serie</option>

                          <option value="FACD">FACD</option>

                          <option value="FAND">FAND</option>

                          <option value="FAPB">FAPB</option>

                          <option value="FAMY">FAMY</option>

                          <option value="DOPR">DOPR</option>

                          <option value="DFPR">DFPR</option>

                          <option value="PECD">PECD</option>

                          <option value="PEBB">PEBB</option>

                          <option value="PEND">PEND</option>

                          <option value="PEPB">PEPB</option>



                        </select>
                        

                      </div>
                  </div>
                  
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA ESTATUS FACTURA -->
                      <span style="font-weight: bold">Estatus de la Factura</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarStatus" id="editarStatus" required="true">
                          <option value="" >Elegir estatus</option>

                          <option value="0">Pendiente</option>

                          <option value="1">Completada</option>

                        </select>

                         <input type="hidden" class="form-control input-lg" name="editarFormatoPedido" id="editarFormatoPedido" readonly>
                        

                      </div>
                     
                     
                  </div>

                  <div class="col-lg-6">
                     <!-- ENTRADA PARA  FOLIO DE FACTURA -->
                     <span style="font-weight: bold">Folio de Factura</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 
                        <input type="hidden" class="form-control input-lg" id="folioFacturaGral" name="folioFacturaGral">
                        <input type="text" class="form-control input-lg" placeholder="Folio de Factura" name="editarFolioFactura0" id="editarFolioFactura0" onblur="validarCamposFolio()" required>

                      </div>
                  </div>
                 
                  
                </div>
                <br>
                 <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA ORDEN DE COMPRA -->
                     <span style="font-weight: bold">Orden de Compra</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarOrdenCompra" id="editarOrdenCompra" readonly>

                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SERIE PEDIDO -->
                      <span style="font-weight: bold">Tipo</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarTipo" id="editarTipo" required="true">
                          <option value="">Elegir tipo</option>

                          <option value="0">Sin tipo</option>

                          <option value="1">Igualado</option>

                          <option value="2">Linea</option>

                        </select>
                        

                      </div>
                  </div>
                </div>
                <br>
                 <div class="row">
                  <div class="col-lg-12 contenido"  style="display: none;" id="div_1" name="div_1">
                     <!-- ENTRADA PARA CANTIDAD -->
                     <span style="font-weight: bold">Cantidad</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="cantidad" placeholder="Cantidad" id="cantidad">

                      </div>
                  </div>
                  
                </div>
                <br>
                <div class="row">
                   <div class="col-lg-6">
                    <!-- ENTRADA PARA IMPORTE-->
                     <span style="font-weight: bold">Importe Inicial</span>
                      <div class="input-group" >
                
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarImporteInicial"  id="editarImporteInicial" readonly>

                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA NUMERO NUMERO DE FACTURAS-->
                     <span style="font-weight: bold">Número de Facturas</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <select name="editarSecciones" id="editarSecciones" class="form-control" onchange="facturasOnChange(this)" required>
                          <option value="0">Seleccione Numero de Facturas</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                         

                        </select>
                      </div>
                  </div>
                  
                </div>
                <br>
                <br>
                <div class="container col-lg-12" id="1F" style="border-bottom: #fff 10px solid;">

                  <div class="row">
                 <div class="col-lg-4">
                    <!-- ENTRADA PARA IMPORTE-->
                     <span style="font-weight: bold">Importe</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarImporte0" id="editarImporte0" required placeholder="Importe">

                      </div>
                  </div>
                  <div class="col-lg-4">
                    <!-- ENTRADA PARA PARTIDAS SURTIDAS-->
                     <span style="font-weight: bold">Partidas Surtidas</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarPartidasSurtidas0" id="editarPartidasSurtidas0" placeholder="Partidas Surtidas" required>

                      </div>
                  </div>
                  <div class="col-lg-4">
                    <!-- ENTRADA PARA UNIDADES SURTIDAS-->
                     <span style="font-weight: bold">Unidades Surtidas</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarUnidadesSurtidas0" id="editarUnidadesSurtidas0" placeholder="Unidades Surtidas">

                      </div>
                  </div>
                  <div class="col-lg-1">
                                <div class="input-group">
                                  <button type="button" class="btn btn-danger" id="eliminarFactura0" name="eliminarFactura0"><i class="fa fa-trash" aria-hidden="true" 
                                    ></i></button>
                                </div>
                                
                            </div>

                 
                </div>
                </div>
                <!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
            INPUTS DINAMICOS
    ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
                
                <div class="container col-lg-12 col-md-12 col-sm-12" id="datosFacturas">
               
                  <div class="row" id="inputsDi" class="col-lg-12 col-md-12 col-sm-12">
                      
                  </div> 
                </div>
                <div class="container col-lg-12 col-md-12 col-sm-12" id="nnuevos_inputs">
                  <div class="row" id="inputsDinamicos" class="col-lg-12 col-md-12 col-sm-12">
                                  
                  </div>
                </div>

                <div class="row">
                  <div  class="col-lg-6 col-md-6 col-sm-6">
                    <!-- ENTRADA PARA ESTATUS CLIENTE -->
                    <span style="font-weight: bold">Estatus cliente</span>
                 
                    <div class="input-group">
              
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <input type="text" class="form-control input-lg" name="editarStatusCliente" id="editarStatusCliente" readonly>
                      <input type="hidden" class="form-control input-lg" name="editarNombreCliente" id="editarNombreCliente" readonly>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!-- TIPO DE RUTA -->
                    <span style="font-weight: bold">Tipo de Ruta</span>
                 
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-truck"></i></span> 
                      <select name="editarTipoRuta" id="editarTipoRuta" class="form-control input-lg">
                        <option value="1">Logística</option>
                        <option value="2">Atención A Clientes</option>
                      
                      </select>
                  </div>
                </div>
                </div>
                <br>
                <div class="row">

                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA RECEPCION -->
                     <span style="font-weight: bold">Fecha y Hora Recepción</span>
                      <div class="input-group datepick" id="datepick">
                          <input type="text" class="form-control input-lg datepick" name="editarFechaRecepcion" id="editarFechaRecepcion" >
                          <div class="input-group-addon add-on datepick">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA ENTREGA-->
                     <span style="font-weight: bold">Fecha y Hora Entrega</span>
                      <div class="input-group datepick1" id="datepick1">
                          <input type="text" class="form-control input-lg datepick1" name="editarFechaEntrega" id="editarFechaEntrega">
                          <div class="input-group-addon add-on datepick1">
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

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="salirEditar" name="salirEditar">Salir</button>

          <button type="button" class="btn btn-primary" id="modificarP" name="modificarP">Modificar Pedido</button>

        </div>
           <?php

          $registroBitacora =  new ControladorFacturacion();
          $registroBitacora -> ctrRegistroBitacora(); 

        
          ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ORDEN DE TRABAJO
======================================-->

<div id="modalEditarOrdenFacturacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
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

                            <span style="font-weight: bold">Usuario</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" required="true" name="otUsuarioEdit" id="otUsuarioEdit">

                                      <option value="Miguel Gutierrez Angeles">Miguel Gutierrez Angeles</option>
                                      <option value="Rocio Martínez">Rocio Martínez</option>
                                      <option value="Diego Avila">Diego Avila</option>
                                      <option value="Aurora Fernandez">Aurora Fernandez</option>

                                    </select>

                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <span style="font-weight: bold">Serie Orden</span>
                       
                                <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <input type="text" class="form-control input-lg" name="otSerieEdit" id="otSerieEdit" readonly>
                                <input type="hidden" class="form-control input-lg" name="otIdOrdenFacturacionEdit" id="otIdOrdenFacturacionEdit" readonly>
                                
                                   
                                </div>

                            </div>
                          

                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Folio Orden</span>
                                <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" placeholder="Folio" name="otFolioEdit" id="otFolioEdit" readonly>
                                   
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <span style="font-weight: bold">Serie Factura</span>
                       
                                <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control" name="otSerieFacturaEdit1" id="otSerieFacturaEdit1">
                                    
                                   <option value="FACD">FACD</option>

                                    <option value="FAND">FAND</option>

                                    <option value="FAPB">FAPB</option>

                                    <option value="FAMY">FAMY</option>

                                    <option value="DOPR">DOPR</option>

                                    <option value="DFPR">DFPR</option>

                                    <option value="PECD">PECD</option>

                                    <option value="PEBB">PEBB</option>

                                    <option value="PEND">PEND</option>

                                    <option value="PEPB">PEPB</option>


                                </select>
                                   
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Folio de Factura</span>
                                <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" placeholder="Folio" name="otFolioFacturaEdit1" id="otFolioFacturaEdit1">
                                
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Estatus de la Factura</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                                    <select class="form-control" name="otEstatusEdit" id="otEstatusEdit">

                                        <option value="0">Pendiente</option>

                                        <option value="1">Completada</option>

                                    </select>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Importe Orden</span>
                                <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg"  name="otImporteInicialEdit" id="otImporteInicialEdit" readonly>
                                
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <!-- ENTRADA PARA NUMERO NUMERO DE FACTURAS-->
                                <span style="font-weight: bold">Número de Facturas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>

                                    <input class="form-control input-lg" type="hidden" id="nFacturas" name="nFacturas" readonly enabled> 

                                    <select name="otSeccionesEdit" id="otSeccionesEdit" class="form-control" onchange="facturasOnChange(this)" required>
                                    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <span style="font-weight: bold">Almacén</span>
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
                        <div class="container col-lg-12" id="1F">

                            <div class="row">
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA IMPORTE-->
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteFacturaEdit1" id="otImporteFacturaEdit1" required>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA PARTIDAS SURTIDAS-->
                                <span style="font-weight: bold">Partidas Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidasSurtidasEdit1" id="otPartidasSurtidasEdit1" placeholder="Partidas Surtidas" required>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA UNIDADES SURTIDAS-->
                                <span style="font-weight: bold">Unidades Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidadesSurtidasEdit1" id="otUnidadesSurtidasEdit1" placeholder="Unidades Surtidas">

                                </div>
                            </div>

                            <div class="col-lg-1">
                                <div class="input-group">
                                  <button type="button" class="btn btn-danger" id="btnDeleteFactura1" name="btnDeleteFactura1"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                                
                            </div>
                            
                            </div>
                        </div>
                        <div class="container col-lg-12" id="2F" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- ENTRADA PARA SERIE FACTURA 2 -->
                                <span style="font-weight: bold">Serie Factura</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" name="otSerieFacturaEdit2" id="otSerieFacturaEdit2">
                                    <option value="" id="otSerieFacturaEdit2">Elegir serie</option>

                                    <option value="FACD">FACD</option>

                                    <option value="FAND">FAND</option>

                                    <option value="FAPB">FAPB</option>

                                    <option value="FAMY">FAMY</option>

                                    <option value="DOPR">DOPR</option>

                                    <option value="DFPR">DFPR</option>

                                    <option value="PECD">PECD</option>

                                    <option value="PEBB">PEBB</option>

                                    <option value="PEND">PEND</option>

                                    <option value="PEPB">PEPB</option>

                                    </select>
                                    

                                </div>
                                
                                </div>
                                <div class="col-lg-6">
                                    <!-- ENTRADA PARA  FOLIO DE FACTURA -->
                                    <span style="font-weight: bold">Folio de Factura</span>
                                        <div class="input-group">
                                
                                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                        <input type="text" class="form-control input-lg" placeholder="Folio de Factura" name="otFolioFacturaEdit2" id="otFolioFacturaEdit2">

                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA IMPORTE-->
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteFacturaEdit2" id="otImporteFacturaEdit2" placeholder="Importe Surtido">

                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA PARTIDAS SURTIDAS-->
                                <span style="font-weight: bold">Partidas Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidasSurtidasEdit2" id="otPartidasSurtidasEdit2" placeholder="Partidas Surtidas">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA UNIDADES SURTIDAS-->
                                <span style="font-weight: bold">Unidades Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidadesSurtidasEdit2" id="otUnidadesSurtidasEdit2" placeholder="Unidades Surtidas">

                                </div>
                            </div>

                            <div class="col-lg-1">
                                <div class="input-group">
                                  <button type="button" class="btn btn-danger" id="btnDeleteFactura2" name="btnDeleteFactura2"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                                
                            </div>
                            
                            </div>
                        </div>
                        <div class="container col-lg-12" id="3F" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- ENTRADA PARA SERIE FACTURA 2 -->
                                <span style="font-weight: bold">Serie Factura</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" name="otSerieFacturaEdit3" id="otSerieFacturaEdit3">
                                    <option value="" id="otSerieFacturaEdit3">Elegir serie</option>

                                    <option value="FACD">FACD</option>

                                    <option value="FAND">FAND</option>

                                    <option value="FAPB">FAPB</option>

                                    <option value="FAMY">FAMY</option>

                                    <option value="DOPR">DOPR</option>

                                    <option value="DFPR">DFPR</option>

                                    <option value="PECD">PECD</option>

                                    <option value="PEBB">PEBB</option>

                                    <option value="PEND">PEND</option>

                                    <option value="PEPB">PEPB</option>

                                    </select>
                                    

                                </div>
                                
                                </div>
                                <div class="col-lg-6">
                                    <!-- ENTRADA PARA  FOLIO DE FACTURA -->
                                    <span style="font-weight: bold">Folio de Factura</span>
                                        <div class="input-group">
                                
                                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                        <input type="text" class="form-control input-lg" placeholder="Folio de Factura" name="otFolioFacturaEdit3" id="otFolioFacturaEdit3">

                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA IMPORTE-->
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteFacturaEdit3" id="otImporteFacturaEdit3" placeholder="Importe Surtido">

                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA PARTIDAS SURTIDAS-->
                                <span style="font-weight: bold">Partidas Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidasSurtidasEdit3" id="otPartidasSurtidasEdit3" placeholder="Partidas Surtidas">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA UNIDADES SURTIDAS-->
                                <span style="font-weight: bold">Unidades Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidadesSurtidasEdit3" id="otUnidadesSurtidasEdit3" placeholder="Unidades Surtidas">

                                </div>
                            </div>

                            <div class="col-lg-1">
                                <div class="input-group">
                                  <button type="button" class="btn btn-danger" id="btnDeleteFactura3" name="btnDeleteFactura3"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                                
                            </div>
                            
                            </div>
                        </div>
                        <div class="container col-lg-12" id="4F" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- ENTRADA PARA SERIE FACTURA 2 -->
                                <span style="font-weight: bold">Serie Factura</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" name="otSerieFacturaEdit4" id="otSerieFacturaEdit4">
                                    <option value="" id="otSerieFacturaEdit4">Elegir serie</option>

                                    <option value="FACD">FACD</option>

                                    <option value="FAND">FAND</option>

                                    <option value="FAPB">FAPB</option>

                                    <option value="FAMY">FAMY</option>

                                    <option value="DOPR">DOPR</option>

                                    <option value="DFPR">DFPR</option>

                                    <option value="PECD">PECD</option>

                                    <option value="PEBB">PEBB</option>

                                    <option value="PEND">PEND</option>

                                    <option value="PEPB">PEPB</option>

                                    </select>
                                    

                                </div>
                                
                                </div>
                                <div class="col-lg-6">
                                    <!-- ENTRADA PARA  FOLIO DE FACTURA -->
                                    <span style="font-weight: bold">Folio de Factura</span>
                                        <div class="input-group">
                                
                                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                        <input type="text" class="form-control input-lg" placeholder="Folio de Factura" name="otFolioFacturaEdit4" id="otFolioFacturaEdit4">

                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA IMPORTE-->
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteFacturaEdit4" id="otImporteFacturaEdit4" placeholder="Importe Surtido">

                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA PARTIDAS SURTIDAS-->
                                <span style="font-weight: bold">Partidas Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidasSurtidasEdit4" id="otPartidasSurtidasEdit4" placeholder="Partidas Surtidas">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA UNIDADES SURTIDAS-->
                                <span style="font-weight: bold">Unidades Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidadesSurtidasEdit4" id="otUnidadesSurtidasEdit4" placeholder="Unidades Surtidas">

                                </div>
                            </div>

                            <div class="col-lg-1">
                                <div class="input-group">
                                  <button type="button" class="btn btn-danger" id="btnDeleteFactura4" name="btnDeleteFactura4"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                                
                            </div>
                            
                            </div>
                        </div>
                        <div class="container col-lg-12" id="5F" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- ENTRADA PARA SERIE FACTURA 2 -->
                                <span style="font-weight: bold">Serie Factura</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" name="otSerieFacturaEdit5" id="otSerieFacturaEdit5">
                                    <option value="" id="otSerieFacturaEdit5">Elegir serie</option>

                                    <option value="FACD">FACD</option>

                                    <option value="FAND">FAND</option>

                                    <option value="FAPB">FAPB</option>

                                    <option value="FAMY">FAMY</option>

                                    <option value="DOPR">DOPR</option>

                                    <option value="DFPR">DFPR</option>

                                    <option value="PECD">PECD</option>

                                    <option value="PEBB">PEBB</option>

                                    <option value="PEND">PEND</option>

                                    <option value="PEPB">PEPB</option>

                                    </select>
                                    

                                </div>
                                
                                </div>
                                <div class="col-lg-6">
                                    <!-- ENTRADA PARA  FOLIO DE FACTURA -->
                                    <span style="font-weight: bold">Folio de Factura</span>
                                        <div class="input-group">
                                
                                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                        <input type="text" class="form-control input-lg" placeholder="Folio de Factura" name="otFolioFacturaEdit5" id="otFolioFacturaEdit5">

                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA IMPORTE-->
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteFacturaEdit5" id="otImporteFacturaEdit5" placeholder="Importe Surtido">

                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA PARTIDAS SURTIDAS-->
                                <span style="font-weight: bold">Partidas Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidasSurtidasEdit5" id="otPartidasSurtidasEdit5" placeholder="Partidas Surtidas">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA UNIDADES SURTIDAS-->
                                <span style="font-weight: bold">Unidades Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidadesSurtidasEdit5" id="otUnidadesSurtidasEdit5" placeholder="Unidades Surtidas">

                                </div>
                            </div>

                            <div class="col-lg-1">
                                <div class="input-group">
                                  <button type="button" class="btn btn-danger" id="btnDeleteFactura5" name="btnDeleteFactura5"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                                
                            </div>
                            
                            </div>
                        </div>
                        <div class="container col-lg-12" id="6F" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- ENTRADA PARA SERIE FACTURA 2 -->
                                <span style="font-weight: bold">Serie Factura</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" name="otSerieFacturaEdit6" id="otSerieFacturaEdit6">
                                    <option value="" id="otSerieFacturaEdit6">Elegir serie</option>

                                   <option value="FACD">FACD</option>

                                    <option value="FAND">FAND</option>

                                    <option value="FAPB">FAPB</option>

                                    <option value="FAMY">FAMY</option>

                                    <option value="DOPR">DOPR</option>

                                    <option value="DFPR">DFPR</option>

                                    <option value="PECD">PECD</option>

                                    <option value="PEBB">PEBB</option>

                                    <option value="PEND">PEND</option>

                                    <option value="PEPB">PEPB</option>

                                    </select>
                                    

                                </div>
                                
                                </div>
                                <div class="col-lg-6">
                                    <!-- ENTRADA PARA  FOLIO DE FACTURA -->
                                    <span style="font-weight: bold">Folio de Factura</span>
                                        <div class="input-group">
                                
                                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                        <input type="text" class="form-control input-lg" placeholder="Folio de Factura" name="otFolioFacturaEdit6" id="otFolioFacturaEdit6">

                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA IMPORTE-->
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteFacturaEdit6" id="otImporteFacturaEdit6" placeholder="Importe Surtido">

                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA PARTIDAS SURTIDAS-->
                                <span style="font-weight: bold">Partidas Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidasSurtidasEdit6" id="otPartidasSurtidasEdit6" placeholder="Partidas Surtidas">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA UNIDADES SURTIDAS-->
                                <span style="font-weight: bold">Unidades Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidadesSurtidasEdit6" id="otUnidadesSurtidasEdit6" placeholder="Unidades Surtidas">

                                </div>
                            </div>

                            <div class="col-lg-1">
                                <div class="input-group">
                                  <button type="button" class="btn btn-danger" id="btnDeleteFactura6" name="btnDeleteFactura6"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                                
                            </div>
                            
                            </div>
                        </div>
                        <div class="container col-lg-12" id="7F" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- ENTRADA PARA SERIE FACTURA 2 -->
                                <span style="font-weight: bold">Serie Factura</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                    <select class="form-control" name="otSerieFacturaEdit7" id="otSerieFacturaEdit7">
                                    <option value="" id="otSerieFacturaEdit7">Elegir serie</option>

                                    <option value="FACD">FACD</option>

                                    <option value="FAND">FAND</option>

                                    <option value="FAPB">FAPB</option>

                                    <option value="FAMY">FAMY</option>

                                    <option value="DOPR">DOPR</option>

                                    <option value="DFPR">DFPR</option>

                                    <option value="PECD">PECD</option>

                                    <option value="PEBB">PEBB</option>

                                    <option value="PEND">PEND</option>

                                    <option value="PEPB">PEPB</option>

                                    </select>
                                    

                                </div>
                                
                                </div>
                                <div class="col-lg-6">
                                    <!-- ENTRADA PARA  FOLIO DE FACTURA -->
                                    <span style="font-weight: bold">Folio de Factura</span>
                                        <div class="input-group">
                                
                                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                        <input type="text" class="form-control input-lg" placeholder="Folio de Factura" name="otFolioFacturaEdit7" id="otFolioFacturaEdit7">

                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA IMPORTE-->
                                <span style="font-weight: bold">Importe</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otImporteFacturaEdit7" id="otImporteFacturaEdit7" placeholder="Importe Surtido">

                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA PARTIDAS SURTIDAS-->
                                <span style="font-weight: bold">Partidas Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otPartidasSurtidasEdit7" id="otPartidasSurtidasEdit7" placeholder="Partidas Surtidas">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- ENTRADA PARA UNIDADES SURTIDAS-->
                                <span style="font-weight: bold">Unidades Surtidas</span>
                                <div class="input-group">
                            
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otUnidadesSurtidasEdit7" id="otUnidadesSurtidasEdit7" placeholder="Unidades Surtidas">

                                </div>
                            </div>

                            <div class="col-lg-1">
                                <div class="input-group">
                                  <button type="button" class="btn btn-danger" id="btnDeleteFactura7" name="btnDeleteFactura7"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                                
                            </div>
                            
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Recepción</span>
                                <div class="input-group dtp1" id="dtp1">
                                    <input type="text" class="form-control input-lg dtp1" name="otFechaRecepcionEdit" id="otFechaRecepcionEdit" required >
                                    <div class="input-group-addon add-on dtp1">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    </div>
                                    

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <span style="font-weight: bold">Fecha Entrega</span>
                                    <div class="input-group dtp2" id="dtp2">
                                    <input type="text" class="form-control input-lg dtp2" name="otFechaEntregaEdit" id="otFechaEntregaEdit" required >
                                    <div class="input-group-addon add-on dtp2">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
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

            <button type="submit" class="btn btn-success" style="background: #2667ce;" id="modificarOrden">Editar Orden</button>
        
        </div>

        <?php

        $editarFacturacionRuta = new ControladorFacturacionRuta();
        $editarFacturacionRuta -> ctrEditarOrdenFacturacion();

        $actualizarNiveles =  new ControladorFacturacionRuta();
        $actualizarNiveles -> ctrActualizarNivelesFacturacion();

        $actualizarNivelesAlmacen =  new ControladorFacturacionRuta();
        $actualizarNivelesAlmacen -> ctrActualizarNivelesAlmacen();

        $actualizarTiempoSegundos = new ControladorFacturacionRuta();
        $actualizarTiempoSegundos -> ctrActualizarTiempoSegundos();

        $actualizarTiempoFinal = new ControladorFacturacionRuta();
        $actualizarTiempoFinal -> ctrActualizarTiempoFinal();

        $actualizarConcluido = new ControladorFacturacionRuta();
        $actualizarConcluido -> ctrActualizarConcluido();

        ?> 

      </form>

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
  $('.datepick').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
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

<script>
  $(document).ready(function(){
                $(".contenido").hide();
                $("#editarTipo").change(function(){
                $(".contenido").hide();
                    $("#div_" + $(this).val()).show();
                });
            });
  
   $("#fechaEntrega").click(function(){
          document.getElementById("fechaRecepcion").readOnly = true;
      });
        $("#observaciones").click(function(){
          document.getElementById("fechaEntrega").readOnly = true;
      });
</script>
<script type="text/javascript">

      function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion11"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      };

      function agregar(){
        $.ajax({
          url: "bitacora.php",
          method: "GET",
          async: false,
          data: {funcion: "funcion22"},
          dataType: "json",
          success: function(respuesta){

          }
        })
      };

    </script>
   
    <script type="text/javascript">
       jQuery(function($){
           $("#editarFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaEntrega").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });

    jQuery(function($){
           $("#otFechaRecepcionEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#otFechaEntregaEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     

     function validarCamposFolio(){

        var folioFacturaVal = document.getElementById('editarFolioFactura0').value;
        var serieFacturaVal = document.getElementById('editarSerieFactura0').value;
        
        var folioPedidoVal = document.getElementById('editarIdPedido').value;
        var seriePedidoVal = document.getElementById('editarSerie').value;
       
        if (folioFacturaVal == folioPedidoVal && serieFacturaVal == seriePedidoVal) {

         $("#editarFormatoPedido").val('1');  

        }else{

          $("#editarFormatoPedido").val('0');  

        }



    }
     
    </script>
      <script type="text/javascript">
        $(document).ready(function() {
          $.timer(60000, function(temporizador){
                if (localStorage.getItem("pausadoFacturas") === null) {

                        localStorage.setItem("pausadoFacturas",0);
                    }else{

                         if (localStorage.getItem("pausadoFacturas") == 1) {
                       
                          }else{
                           

                             obtenerFacturasNuevas('Pinturas').then(
                              function () {
                                obtenerFacturasNuevas('Flex');
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