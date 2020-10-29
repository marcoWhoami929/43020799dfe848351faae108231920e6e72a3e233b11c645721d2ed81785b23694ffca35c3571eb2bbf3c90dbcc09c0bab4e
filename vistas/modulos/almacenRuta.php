<?php
error_reporting(0);
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
      
    <i class="fa fa-truck" aria-hidden="true"></i> ALMACÉN RUTA
  
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">ALMACÉN RUTA</li>
    
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
              
            echo '<a href="vistas/modulos/reportes.php?reporteRuta=almacenot">

            <button class="report btn btn-info" id="report" name="report" onclick="reporteAlmacenRuta()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
          }else{

              echo '<a href="vistas/modulos/reportes.php?reporteRuta=almacenot">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button></a>';

          }
              
            }else{
                
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="vistas/modulos/reportes.php?reporteRuta=almacenot">

            <button class="report btn btn-info" id="report" name="report" onclick="reporteAlmacenRuta()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
            }
            
          ?>
          

        </div> 
         <br>
        <table class="table-bordered table-striped dt-responsive tablaAlmacenRuta" width="100%" id="almacenRuta" style="border: 2px solid #2667ce">
         
          <thead style="background:#2667ce;color: white">
           
           <tr>
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border: none">Cliente</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Suministrado por</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Suministro</th>
             <th style="border:none">Estatus de Orden</th>
             <th style="border:none">Fecha de Término</th>
             <th style="border:none">Almacén</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Órdenes</th>
             <th style="border:none">Comentarios</th>
             <th style="border:none">Tiempo de Proceso</th>
             <th style="border:none">Número de Sku´s</th>
             <th style="border:none">Sku´s Surtidos</th>
             <th style="border:none">Nivel de Partidas</th>
             <th style="border:none">Número de Unidades</th>
             <th style="border:none">Unidades Surtidas</th>
             <th style="border:none">Nivel de Unidades</th>
             <th style="border:none">Importe Total</th>
             <th style="border:none">Importe Surtido</th>
             <th style="border:none">Nivel de Surtimiento</th>
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
MODAL VER TRASPASOS
======================================-->
<div class="modal fade" id="modalVerTraspasos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header" style="background: #2667ce;">
    <center><h3 class="modal-title" style="color:white"><i class="fa fa-file-text"></i> LISTA DE TRASPASOS</h3></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class=" col-lg-12 col-sm-12 col-md-12 container">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="titulosTraspasos form-control" value="SERIE" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="titulosTraspasos form-control" value="FOLIO" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="titulosTraspasos form-control" value="PARTIDAS" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="titulosTraspasos form-control" value="UNIDADES" readonly style="background: transparent;
border: none;">
              </div>
                
            </div>
        </div>

        <div class=" col-lg-12 col-sm-12 col-md-12 container" style="margin-top:20px">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="serieTraspaso" name="serieTraspaso" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="folioTraspaso" name="folioTraspaso" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="partidasTraspaso" name="partidasTraspaso" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="unidadesTraspaso" name="unidadesTraspaso" readonly style="background: transparent;
border: none;">
              </div>
                
            </div>
        </div>
        <div class=" col-lg-12 col-sm-12 col-md-12 container" style="margin-top:0px">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="serieTraspaso2" name="serieTraspaso2" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="folioTraspaso2" name="folioTraspaso2" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="partidasTraspaso2" name="partidasTraspaso2" readonly style="background: transparent;
border: none;">
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <input type="text" class="form-control" id="unidadesTraspaso2" name="unidadesTraspaso2" readonly style="background: transparent;
border: none;">
              </div>
                
            </div>
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
                                   
                                </div>

                            </div>
                          

                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Serie</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otSerieEdit" id="otSerieEdit" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Folio</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otFolioEdit" id="otFolioEdit" readonly>
                                   
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Serie Traspaso</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 

                                    <select class="form-control"  name="otSerieTraspasoEdit" id="otSerieTraspasoEdit" >
                                        
                                        <option value="TRGE">TRGE</option>
                                        <option value="TRCD">TRCD</option>
                                        <option value="TRCD">TRND</option>
                                        <option value="TRPU">TRPU</option>

                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Folio Traspaso</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 

                                    <input type="number" class="form-control input-lg" name="otFolioTraspasoEdit" id="otFolioTraspasoEdit">
                                    
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Partidas Traspaso</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otNumeroPartidasTraspasoEdit" id="otNumeroPartidasTraspasoEdit">
                                
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Unidades Traspaso</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otNumeroUnidadesTraspasoEdit" id="otNumeroUnidadesTraspasoEdit">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Serie Traspaso 2</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 

                                    <select class="form-control"  name="otSerieTraspaso2Edit" id="otSerieTraspaso2Edit" >
                                        
                                        <option value="TRGE">TRGE</option>
                                        <option value="TRCD">TRCD</option>
                                        <option value="TRCD">TRND</option>
                                        <option value="TRPU">TRPU</option>

                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Folio Traspaso 2</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 

                                    <input type="number" class="form-control input-lg" name="otFolioTraspaso2Edit" id="otFolioTraspaso2Edit">
                                    
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <span style="font-weight: bold">Partidas Traspaso</span>
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otNumeroPartidasTraspaso2Edit" id="otNumeroPartidasTraspaso2Edit">
                                
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                
                                <span style="font-weight: bold">Unidades Traspaso</span>
                                <div class="input-group">
                        
                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                    <input type="text" class="form-control input-lg" name="otNumeroUnidadesTraspaso2Edit" id="otNumeroUnidadesTraspaso2Edit">
                                   
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

            <button type="submit" class="btn btn-success" style="background: #2667ce;" id="modificarOrden">Editar Almacen</button>
        
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
$(document).ready(function() {
  $('.dtp3').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
 
});
</script>

<script type="text/javascript">

      function reporteAlmacenRuta(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion32"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }
    </script>
    <script type="text/javascript">
       jQuery(function($){
           $("#otFechaRecepcionEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#otFechaSuministroEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#otFechaTerminoEdit").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     
    </script>
    

