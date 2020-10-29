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
      
    <i class="fa fa-truck" aria-hidden="true"></i> FACTURACIÓN RUTA
  
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">FACTURACIÓN RUTA</li>
    
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
          
          if ($_SESSION["grupo"] == "Generador" ||  $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
              
            echo '<a href="vistas/modulos/reportes.php?reporteRuta=facturacionot">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

             </a>';
          echo '<a href="vistas/modulos/reportes.php?reporteRuta=facturasordenes">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte De Facturas</button>

            </a>';
          }else{

              echo '<a href="vistas/modulos/reportes.php?reporteRuta=facturacionot">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button></a>';

            echo '<a href="vistas/modulos/reportes.php?reporteRuta=facturasordenes">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte De Facturas</button></a>';

          }
              
            }else{
                
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="vistas/modulos/reportes.php?reporteRuta=facturacionot">

                <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

            </a>';
          echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="vistas/modulos/reportes.php?reporteRuta=facturasordenes">

                <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte De Facturas</button>

            </a>';
            }

          ?>
          <br>
          <br>
         
           <?php

                if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "Laura Delgado") {
                
                    echo '<div class="">
                        <div class="row">
                            <form action="importFacturacionRutas.php" method="post" enctype="multipart/form-data" id="import_form">
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
                        

        </div> 
         <br>
        <table class="table-bordered table-striped dt-responsive tablaFacturacionRuta" width="100%" id="facturacionRuta" style="border: 2px solid #2667ce">
         
          <thead style="background:#2667ce;color: white">
           
           <tr>
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border: none">Cliente</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Usuario</th>
             <th style="border:none">Serie de Factura</th>
             <th style="border:none">Folio de Factura</th>
             <th style="border:none">Datos de Orden</th>
             <th style="border:none">Estatus de Orden</th>
             <th style="border:none">Importe Surtido</th>
             <th style="border:none">Nivel de Surtimiento</th>
             <th style="border:none">Almacén</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Facturas</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Entrega</th>
             <th style="border:none">Comentarios</th>
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

<!--=====================================
MODAL VER FACTURAS 
======================================-->
<div class="modal fade" id="modalFacturas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
            <!--<div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="serieFactura[]" name="serieFactura[]" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="folioFactura[]" name="folioFactura[]" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="partidasFactura" name="partidasFactura" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="unidadesFactura" name="unidadesFactura" readonly style="background: transparent;
border: none;">
              </div>
                
            </div>-->
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

                                    <option value="Laura Delgado">Laura Delgado</option>

                                    <option value="Miguel Gutierrez">Miguel Gutierrez</option>

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

                                <span style="font-weight: bold">Importe Orden</span>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                                    <select class="form-control" name="otAlmacenEdit" id="otAlmacenEdit">

                                        <option value="1">ALMACÉN GENERAL</option>

                                        <option value="10">OBSOLETOS</option>

                                        <option value="101">LABORATORIO</option>
                                        
                                        <option value="1011">ALMACÉN GENERAL CONSIGNACIÓN</option>

                                        <option value="102">SAN MANUEL IGUALADO</option>

                                        <option value="104">REFORMA IGUALADO</option>
                                        
                                        <option value="108">SANTIAGO IGUALADO</option>

                                        <option value="109">CAPU IGUALADO</option>

                                        <option value="12">RUTA 2</option>

                                        <option value="13">RUTA 3</option>

                                        <option value="14">RUTA 1</option>

                                        <option value="2">SAN MANUEL</option>

                                        <option value="4">REFORMA</option>

                                        <option value="8">SANTIAGO</option>

                                        <option value="9">CAPU</option>

                                        <option value="C1">CONSIGNACION 1</option>

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
        data: {funcion: "funcion33"},
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
          data: {funcion: "funcion34"},
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
                        
                        window.location = "facturacionRuta";

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
                        
                          window.location = "facturacionRuta";

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
                        
                          window.location = "facturacionRuta";

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
           $("#otFechaRecepcionEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#otFechaEntregaEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     
    </script>
    

