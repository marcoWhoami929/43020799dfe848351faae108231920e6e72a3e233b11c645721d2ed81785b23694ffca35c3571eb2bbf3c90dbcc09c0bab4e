<?php

if($_SESSION["perfil"] == "Administrador General"  || $_SESSION["nombre"] == "Ivan Herrera Perez" ){



}else if($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma"){

  echo '<script>

  window.location = "tableroCortes";

  </script>';

}else {
   echo '<script>

  window.location = "dashboardTickets";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      CONTROL DE MUESTRAS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Control de Muestras</li>
    
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

    </div>
    <div class="box box-info collapsed-box">

            <!-- box-header -->
              <div class="box-header with-border">
            
                <h3 class="box-title">Estatus de Mis Solicitudes</h3>

                <div class="box-tools pull-right">
                  
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
              
                </div>

              </div>
              <!-- /.box-header -->

              <!-- box-body -->
              <div class="box-body no-padding">
                    <div class="box-tools">
                      
                      <a href="vistas/modulos/reportes.php?reporte=solicitudes">

                        <button class="report btn btn-info" id="report" name="report" ><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

                      </a>
                    

                    </div>
                    <!-- row -->
                    <div class="row">
                                    
                      <div class="notificacionesSolicitud" id="notificacionesSolicitud">
                                      
                      </div>

                    </div>
                                  <!-- row -->
                    <br>

              </div>
              <!-- /.box-body -->

              <!-- box-footer -->
              <div class="box-footer text-center">
                
              </div>
              <!-- /.box-footer -->

          </div>

    <div class="box box-success">

          <!-- box-header -->
            <div class="box-header with-border">
          
              <h3 class="box-title">Mis Solicitudes</h3>

              <div class="box-tools pull-right">
                
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            
              </div>

            </div>
            <!-- /.box-header -->

            <!-- box-body -->
            <div class="box-body padding">
                  <div>
                    <br>
                    <table class="table table-bordered table-striped dt-responsive tablaControlMuestras" width="100%" id="controlMuestras">
                     
                      <thead>
                       
                       <tr>
                        
                         
                          <th>Folio</th>
                         <th>Cliente</th>
                         <th>Sucursal</th>
                         <th>Hora Solicitud</th>
                         <th>Solicitud Enviada</th>
                         <th>Solicitud Vista</th>
                         <th>Recolección en Camino</th>
                         <th>En Proceso</th>
                         <th>Entrega en Camino</th>
                         <th>Concluido</th>
                         <th>Hora Concluido</th>
                         <th>Pdf</th>
                         <th>Tiempo Proceso</th>
                         <th>Observaciones</th>
                         <th>Ganador</th>
                         <th>Estatus</th>

                       </tr> 

                      </thead>
              

                    </table>
                      <?php 
                        $descargarSolicitud = new ControladorControlMuestras();
                        $descargarSolicitud -> ctrDescargarSolicitud();
                      ?>
                    </div>
                      

            </div>
            <!-- /.box-body -->

            <!-- box-footer -->
            <div class="box-footer text-center">
          
            </div>
            <!-- /.box-footer -->

        </div>
        <div class="container-fluid">
        
            <div class="col-lg-3 col-md-3 col-sm-12">

                <div class="box box-info collapsed-box">

                    <!-- box-header -->
                      <div class="box-header with-border">
                    
                        <h3 class="box-title">Agregar Promociones</h3>

                        <div class="box-tools pull-right">
                          
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                      
                        </div>

                      </div>
                      <!-- /.box-header -->

                      <!-- box-body -->
                      <div class="box-body no-padding">
                            
                             <div class="col-lg-12 col-md-12 col-sm-12">

                                    <form  method="post" enctype="multipart/form-data" action="vistas/modulos/subirImagenPromociones.php">
                                      <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código Imagen" required>
                                          <strong><p class="help-block">Código 1 : Promoción principal</p></strong>
                                          <strong><p class="help-block">Código 2: Promoción Secundaria.</p></strong>
                                      </div>
                                      <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción Imagen" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" id="file" name="foto" required>
                                        <p class="help-block">Elegir imagen que se desea cargar en la sección de promociones de la aplicación.</p>
                                      </div>
                                    
                                      <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>

                                </div>

                      </div>
                      <!-- /.box-body -->

                      <!-- box-footer -->
                      <div class="box-footer text-center">
                        
                      </div>
                      <!-- /.box-footer -->

                  </div>
              
            </div>
             <div class="col-lg-9 col-md-9 col-sm-12">
              
                  <div class="box box-danger collapsed-box">

                      <!-- box-header -->
                        <div class="box-header with-border">
                      
                          <h3 class="box-title">Mis Promociones</h3>

                          <div class="box-tools pull-right">
                            
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        
                          </div>

                        </div>
                        <!-- /.box-header -->

                        <!-- box-body -->
                        <div class="box-body padding">
                              <div class="container col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                 
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                    <table class="table table-bordered table-striped dt-responsive tablaPromociones" width="100%" id="promociones">
                     
                                        <thead>
                                         
                                         <tr>
                                          
                                           
                                           <th>Id</th>
                                           <th>Descripción</th>
                                           <th>Foto</th>
                                           <th>Acciones</th>
                                           

                                         </tr> 

                                        </thead>
                                

                                      </table>
                                      
                                    
                                  </div>
                                  
                                </div>
                                
                              </div>
                      

                        </div>
                        <!-- /.box-body -->

                        <!-- box-footer -->
                        <div class="box-footer text-center">
                          
                         
                        

                      
                        </div>
                        <!-- /.box-footer -->

                    </div>

            </div>
         
        </div>
        
  </section>
  <!--=====================================
MODAL EDITAR PROMOCION
======================================-->

<div id="modalEditarPromociones" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Promoción</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
               <span style="font-weight: bold">Descripción Promoción</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-image"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" value="" required>

                <input type="hidden" id="idPromocion" name="idPromocion">

              </div>

            </div>

            
              <!-- ENTRADA PARA EL ESTADO -->

            <div class="form-group">
              
              <span style="font-weight: bold">Estado Promoción</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                <select class="form-control input-lg" name="editarEstado" id="editarEstado">
                  
                  <option value="" id="editarEstado">Selecionar grupo</option>

                  <option value="1">Promoción Activa</option>

                  <option value="0">Promoción Pausada</option>
                  
                </select>

              </div>

            </div>


            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Promoción</button>

        </div>

     <?php
          
          $editarPromocion = new ControladorControlMuestras();
          $editarPromocion -> ctrEditarPromocion();
          

        ?> 

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL MOSTRAR DATOS DEL CLIENTE
======================================-->
<style>
  #datosMapa{
    display: none;
  }
  #map { 

    width: 64%;
    height: 480px;
    box-shadow: 5px 5px 5px #888;
 }

      #right-panel {
        width: 100%;
        height: 50%;
      }

</style> 

<!-- Modal -->
<div class="modal fade" id="modalVerDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header" style="background:tomato; color:white">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">DATOS DEL CLIENTE</h5>
        
      </div>
      <div class="modal-body">
              
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;">Nombre:</span> 
          <input type="text" class="form-control input-lg" id="nombre" name="nombre" readonly style="border:none; background: white;">
        </div>

        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;">Taller:</span> 
          <input type="text" class="form-control input-lg" id="taller" name="taller" readonly style="border: none;background: white;">
        </div>

        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;">Telefono:</span> 
          <input type="text" class="form-control input-lg" id="telefono" name="telefono" readonly style="border: none;background: white;">
        </div>

        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;">Celular:</span> 
          <input type="text" class="form-control input-lg" id="celular" name="celular" readonly style="border: none;background: white;">
        </div>

        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;">Dirección:</span> 
          <input type="text" class="form-control input-lg" id="direccion" name="direccion" readonly style="border: none;background: white;">

        </div>

        <div class="input-group">
          <input type="hidden" class="form-control input-lg" id="nameSucursal" name="nameSucursal" readonly style="border: none;background: white;">

        </div>

        <div class="input-group">
          <input type="hidden" class="form-control input-lg" id="latitudCliente" name="latitudCliente" readonly style="border: none;background: white;">
          <input type="hidden" class="form-control input-lg" id="longitudCliente" name="longitudCliente" readonly style="border: none;background: white;">
          
        </div>

        <div class="input-group">
          <input type="hidden" class="form-control input-lg" id="latitudSucursal" name="latitudSucursal" readonly style="border: none;background: white;">
          <input type="hidden" class="form-control input-lg" id="longitudSucursal" name="longitudSucursal" readonly style="border: none;background: white;">
          
        </div>

        <div id="datosMapa">
          <div  id="map" class="col-lg-8 col-md-12 col-sm-12"></div>

          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="box box-info collapsed-box">
              <div class="box-header with-border">
                <h4>Ver Indicaciones</h4>
                <p>Distancia Total: <span id="total"></span></p>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
              <div class="box-body no-padding">
                <div id="right-panel">
                </div>
              </div>
            </div>
          </div>

        </div>
        <br>
        

      </div>

     
      <div class="modal-footer">
        <button id="mostrarMapa" class="btn btn-success"><i class="fa fa-map-marker" aria-hidden="true"></i> Ver Ruta</button>
        <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>


</div>
<script> 
  function actualiza(){
                    $("#notificacionesSolicitud").load("vistas/modulos/inicio/notificacionesSolicitud.php");
                  }
                  setInterval( "actualiza()", 1000 );
              </script>
 </script>
 <script language="javascript" type="text/javascript">
                           function getQueryVariable(variable) {
                                //Estoy asumiendo que query es window.location.search.substring(1);
                            var urlSolicitud = location.search;
                                var query = urlSolicitud;
                                var vars = query.split("&");
                                for (var i=0; i < vars.length; i++) {
                                    var pair = vars[i].split("="); 
                                    if (pair[0] == variable) {
                                        return pair[1];
                                    }
                                }
                                return false;
                            }

                            var URLactual = window.location;

                            if (URLactual == "http://dkmatrizz.ddns.net/controlMuestras" || URLactual == "http://dkmatrizz.ddns.net/realizarCotizacion"  || URLactual == "http://dkmatrizz.ddns.net/enviarCotizaciones" || URLactual == "http://dkmatrizz.ddns.net/editarCotizacion" || URLactual == "http://dkmatrizz.ddns.net/vistas/modulos/mostrarCotizacion.php/?folio=false&opcion=false" || URLactual == "http://dkmatrizz.ddns.net/controlMuestras" || URLactual == "http://dkmatrizz.ddns.net/realizarCotizacion"  || URLactual == "http://dkmatrizz.ddns.net/enviarCotizaciones" || URLactual == "http://dkmatrizz.ddns.net/editarCotizacion" || URLactual == "http://dkmatrizz.ddns.net/vistas/modulos/mostrarCotizacion.php/?folio=false&opcion=false") {
                              //http://dkmatrizz.ddns.net/controlMuestras reemplazar por http://dkmatrizz.ddns.net/controlMuestras
                            }else{
                              var folio = getQueryVariable("folio");
                              var opcion = getQueryVariable("opcion");
                              if (folio == "false" && opcion == "false") {
                                
                              }else{

                                window.location.href ="vistas/modulos/pdf.php/?folio="+folio+"&opcion="+opcion;

                              } 

                            }

</script>

<script>
function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          scrollwheel: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: {lat: 19.012329, lng: -98.202981}
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer({
          draggable: false,
          map: map,
          panel: document.getElementById('right-panel')
        });

        directionsRenderer.addListener('directions_changed', function() {
          computeTotalDistance(directionsRenderer.getDirections());


        });
        var latitudCliente = $("#latitudCliente").val();
        var longitudCliente = $("#longitudCliente").val();
        var direccionesCliente = ''+latitudCliente+','+longitudCliente+'';

        

        var latitudSucursal = $("#latitudSucursal").val();
        var longitudSucursal = $("#longitudSucursal").val();
        var coordenadaSucursal = ''+latitudSucursal+','+longitudSucursal+'';

        displayRoute(''+coordenadaSucursal+'', ''+direccionesCliente+'', directionsService,
            directionsRenderer);
      }

      function displayRoute(origin, destination, service, display) {
        document.getElementById('right-panel').innerHTML="";
        service.route({
          origin: origin,
          destination: destination,
          
          travelMode: 'DRIVING',
          avoidTolls: true
        }, function(response, status) {
          if (status === 'OK') {
            display.setDirections(response);
          } else {
            console.log('Could not display directions due to: ' + status);
          }
        });
      }

      function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
      }

$('#mostrarMapa').click(function(){
  initMap();
  $('#datosMapa').toggle(1000);

});

$('#close').click(function(){
  initMap();
  $('#datosMapa').toggle(1000);

});
$('#salir').click(function(){
  initMap();
  $('#datosMapa').toggle(1000);

});

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_dlGznsov-uJDQUmmsHIR_vsA103iiLc&callback=initMap"></script>