<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "Laura Delgado" || $_SESSION["nombre"] == "Mauricio Anaya" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales"){



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

          <a href="vistas/modulos/reportes.php?reporteFacturacion=facturacion">

            <button class="report btn btn-warning" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte Detallado</button>

          </a>';
            }

          ?>
        </div>
        <br>
        <?php

                    if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "Laura Delgado" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales") {
                      
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

                    }
              
            ?>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaFacturacion" width="100%" id="facturacion" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border: none">Cliente</th>
             <th style="border:none">Serie de Pedido</th>
             <th style="border:none">Folio de Pedido</th>
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
MODAL VER FACTURAS
======================================-->


<!-- Modal -->
<div class="modal fade" id="modalVerFacturas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 110%">
    <div class="modal-header" style="background: #2667ce;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <center><h3 class="modal-title" style="color:white"><i class="fa fa-file-text"></i> LISTA DE FACTURAS</h3></center>       
    </div>
      <div class="modal-body" >
        <div class="container-fluid">
            <div class="row" style="width: 100%">

              <div class="col-md-2 col-sm-2" >
                <input type="text" class="titulosFacturas form-control" value="SERIE" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-md-2 col-sm-2" style="margin-left: 4%">
                <input type="text" class="titulosFacturas form-control" value="FOLIO" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-md-3 col-sm-3" style="margin-left: 3%">
                <input type="text" class="titulosFacturas form-control" value="PARTIDAS" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-md-3 col-sm-3" style="margin-left: -3%">
                <input type="text" class="titulosFacturas form-control" value="UNIDADES" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-md-3 col-sm-3" style="margin-left: -2%; margin-right: -15%">
                <input type="text" class="titulosFacturas form-control" value="IMPORTE" readonly style="background: transparent;
border: none;">
              </div>
                
            </div>
        </div>

        <div class=" col-lg-12 col-sm-12 col-md-12 container" style="margin-top:20px" id="datosConsulta">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 3%;border-top: #2667ce 2px double">
          
        </div>
        
        <div class="col-lg-12 col-sm-12 col-md-12" id="totales" style="margin-top: 2%; margin:5px;">
          
        </div>
      </div>
      <div class="modal-footer" style="margin-top:100px">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

                          <option value="Gerardo Morales">Gerardo Morales</option>
                          <option value="Miguel Gutierrez Angeles">Miguel Gutierrez Angeles</option>
                          <option value="Laura Delgado">Laura Delgado</option>
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

          
          /*=============================*/

          //$editarCompra = new ControladorFacturacion();
          //$editarCompra -> ctrEditarPedido();

          //$actualizarFormatoPedido = new ControladorFacturacion();
          //$actualizarFormatoPedido -> ctrActualizarFormatoPedido();

          //$actualizarTipoRuta = new ControladorFacturacion();
          //$actualizarTipoRuta -> ctrActualizarTipoRuta();

          //$actualizarNiveles = new ControladorFacturacion();
          //$actualizarNiveles -> ctrActualizarNiveles();

          //$actualizarEstatusFacturaAlmacen = new ControladorFacturacion();
          //$actualizarEstatusFacturaAlmacen -> ctrActualizarEstatusFacturaAlmacen();

          //$actualizarFormatoPedidoAtencion = new ControladorFacturacion();
          //$actualizarFormatoPedidoAtencion -> ctrActualizarFormatoPedidoAtencion();

          //$actualizarNombreCliente = new ControladorFacturacion();
          //$actualizarNombreCliente -> ctrActualizarNombreCliente();

          //$actualizarNombreCliente2 = new ControladorFacturacion();
          //$actualizarNombreCliente2 -> ctrActualizarNombreCliente2();

          
          //$actualizarFechaRecepcionAlmacen = new ControladorFacturacion();
          //$actualizarFechaRecepcionAlmacen -> ctrMostrarFechaRecepcionAlmacen();

          //$actualizarFechaTerminoAlmacen = new ControladorFacturacion();
          //$actualizarFechaTerminoAlmacen -> ctrMostrarFechaTerminoAlmacen();

          //$actualizarTiempoProcesoLogistica = new ControladorFacturacion();
          //$actualizarTiempoProcesoLogistica -> ctrActualizarTiempoLogistica();

          //$actualizarFolioFacturaLogistica = new ControladorFacturacion();
          //$actualizarFolioFacturaLogistica -> ctrActualizarFolioFacturaLogistica();

          //$actualizarSerieFacturaLogistica = new ControladorFacturacion();
          //$actualizarSerieFacturaLogistica -> ctrActualizarSerieFacturaLogistica();
          
          $registroBitacora =  new ControladorFacturacion();
          $registroBitacora -> ctrRegistroBitacora(); 

          //$mostrarTiempoEdicion = new ControladorFacturacion();
          //$mostrarTiempoEdicion -> ctrMostrarTiempoProcesoEdicion();

          //$actualizarStatusFacturacionEdicion = new ControladorFacturacion();
          //$actualizarStatusFacturacionEdicion -> ctrActualizarStatusFacturacionEdicion();

          //$actualizarEstado = new ControladorFacturacion();
          //$actualizarEstado -> ctrActualizarEstadoFacturacion();

          //$actualizarEstadoPedido = new ControladorFacturacion();
          //$actualizarEstadoPedido -> ctrActualizarEstadoPedido();

          //$actualizarStatusPedido = new ControladorFacturacion();
          //$actualizarStatusPedido -> ctrActualizarStatusPedido();

          //$actualizarFolioFactura = new ControladorFacturacion();
          //$actualizarFolioFactura -> ctrActualizarFolioFactura();

          //$actualizarSerieFactura = new ControladorFacturacion();
          //$actualizarSerieFactura -> ctrActualizarSerieFactura();

          //$actualizarSaldoFacturado = new ControladorFacturacion();
          //$actualizarSaldoFacturado -> ctrActualizarSaldoFacturado();

          //$actualizarTiempoAlmacen = new ControladorFacturacion();
          //$actualizarTiempoAlmacen -> ctrMostrarTiempoProcesoAlmacen();

          //$actualizarTiempoProcesoAlmacen = new ControladorFacturacion();
          //$actualizarTiempoProcesoAlmacen -> ctrActualizarTiempoAlmacen();

          //$actualizarFechaRecepcionLogistica = new ControladorFacturacion();
          //$actualizarFechaRecepcionLogistica -> ctrMostrarFechaRecepcionLogistica();

          //$actualizarFechaTerminoLogistica = new ControladorFacturacion();
          //$actualizarFechaTerminoLogistica -> ctrMostrarFechaTerminoLogistica();

          //$actualizarTiempoLogistica = new ControladorFacturacion();
          //$actualizarTiempoLogistica -> ctrMostrarTiempoProcesoLogistica();

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
</script>


<script>
  $(document).ready(function(){
        
        $("#serie").click(function(e){
          ;
          var url = "atencionFacturacion.php";
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
          $("#importeInicial").val('');
          $("#statusCliente").val('');
          $("#ordenCompra").val('');
    });
          
    });

  $(document).ready(function(){

        $("#idPedido").click(function(e){
          ;
          var url = "facturacion.php";
          $.getJSON(url, { _num1 : $("#idPedido").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#importeInicial").val(cliente.importeInicial);
              $("#statusCliente").val(cliente.statusCliente);
              $("#ordenCompra").val(cliente.ordenCompra);
            });
          });
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
                        
                        window.location = "facturacion";

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
                        
                          window.location = "facturacion";

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
                        
                          window.location = "facturacion";

                        }

                      });
                }
            }
        }else{
            
        }
    }
    </script>
    <script type="text/javascript">
       jQuery(function($){
           $("#editarFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaEntrega").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
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