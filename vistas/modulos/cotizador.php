<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["perfil"] == "Atencion a Clientes" && $_SESSION["cotizador"] == "1" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Sucursal Capu" ){



}else {
  echo '<script>

              swal({

                type: "error",
                title: "¡No tiene los privilegios para realizar esta acción!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

              }).then(function(result){

                if(result.value){
                
                  window.location = "inicio";

                }

              });
            

            </script>'; 

}

?>
<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Tablero
    <small>COTIZADOR</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="cotizador"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Cotizador</li>

    </ol>
   

  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content" >
    <div class="box" >

      <div class="box-header with-border">
        
         <?php 


         $dia = date("l");
         $mes = date("l"); 
         $dianumero = date("d");
         $año = date("Y");

         setlocale(LC_ALL, "es_MX.UTF-8");
         $fecha = strftime('%B', strtotime($mes));
         $diaLetra = strftime('%A', strtotime($dia));

         echo "<div class='col-lg-6'><h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3></div>";

         ?>

                 <div class="col-lg-12">
                         <center><h2 style="font-weight: bold;color:tomato;">COTIZADOR</h2></center>
                       </div>
                       <div class="col-lg-6">
                          <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
                       </div>

                  </div>
                    <!-- row -->
                      <div class="row">
                        
                        <div class="cabeceras-cotizaciones" id="cabeceras-cotizaciones">
                          
                        </div>

                      </div>
                      <!-- row -->
       
                  <!-- col -->
                  <input type="hidden" name="idCotizacion" id="idCotizacion" readonly>

                  <table class="table-bordered table-striped dt-responsive listaCotizaciones" id="listaCotizaciones" class="display" style="width:90%;border: 2px solid #00c0ef">
                    <thead style="background:#00c0ef;color: white">
                        <tr>
                            <th>Serie Cotización</th>
                            <th>Folio Cotización</th>
                            <th>Fecha Cotización</th>
                            <th>Fecha Vencimiento</th>
                            <th>Fecha Entrega</th>
                            <th>Partidas</th>
                            <th>Unidades</th>
                            <th>Nombre Cliente</th>
                            <th>Agente de Venta</th>
                            <th>Total de Cotización</th>
                            <th>Ver cotización</th>
                            <th>Estatus</th>
                            <th>Aprobada</th>
                            <th>Referencias</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
                <?php

                  $cancelarCotizacion = new ControladorCotizaciones();
                  $cancelarCotizacion -> ctrCancelarCotizacion();
                  $descargarCotizacion = new ControladorCotizaciones();
                  $descargarCotizacion -> ctrDescargarCotizacion();
                ?>
      </div>
  
    </div>
      <!-- row -->
      
    <!-- row -->
 </section>
  <!-- content -->
              

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

<!-- content-wrapper -->
<script type="text/javascript">
    function actualiza(){
    $("#cabeceras").load("vistas/modulos/inicio/cajas-superiores.php");
  }
  setInterval( "actualiza()", 1000 );
</script>
<script language="javascript" type="text/javascript">
                           function getQueryVariable(variable) {
                                //Estoy asumiendo que query es window.location.search.substring(1);
                            var urlCotizacion = location.search;
                                var query = urlCotizacion;
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

                            if (URLactual == "http://dkmatrizz.ddns.net/cotizador" || URLactual == "http://dkmatrizz.ddns.net/realizarCotizacion"  || URLactual == "http://dkmatrizz.ddns.net/enviarCotizaciones" || URLactual == "http://dkmatrizz.ddns.net/editarCotizacion" || URLactual == "http://dkmatrizz.ddns.net/vistas/modulos/mostrarCotizacion.php/?folio3=false&opcion=false" || URLactual == "http://192.168.1.246/cotizador" || URLactual == "http://192.168.1.246/realizarCotizacion"  || URLactual == "http://192.168.1.246/enviarCotizaciones" || URLactual == "http://192.168.1.246/editarCotizacion" || URLactual == "http://192.168.1.246/vistas/modulos/mostrarCotizacion.php/?folio3=false&opcion=false") {
                              //http://192.168.1.246/cotizador reemplazar por http://dkmatrizz.ddns.net/cotizador
                            }else{
                              var folio3 = getQueryVariable("folio3");
                              var opcion = getQueryVariable("opcion");
                              if (folio3 == "false" && opcion == "false") {
                                
                              }else{

                                window.location.href ="vistas/modulos/mostrarCotizacion.php/?folio3="+folio3+"&opcion="+opcion;

                              } 

                            }

                            

              </script>
              <script type="text/javascript">
                function actualiza(){
                    $("#cabeceras-cotizaciones").load("vistas/modulos/inicio/cajas-cotizaciones.php");
                  }
                  setInterval( "actualiza()", 1000 );
              </script>
              <style>
                .switch {
                  position: relative;
                  display: inline-block;
                  width: 60px;
                  height: 34px;
                }

                .switch input { 
                  opacity: 0;
                  width: 0;
                  height: 0;
                }

                .slider {
                  position: absolute;
                  cursor: pointer;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background-color: #ccc;
                  -webkit-transition: .4s;
                  transition: .4s;
                }

                .slider:before {
                  position: absolute;
                  content: "";
                  height: 26px;
                  width: 26px;
                  left: 4px;
                  bottom: 4px;
                  background-color: white;
                  -webkit-transition: .4s;
                  transition: .4s;
                }

                input:checked + .slider {
                  background-color: #2196F3;

                }

                input:focus + .slider {
                  box-shadow: 0 0 1px #2196F3;
                }

                input:checked + .slider:before {
                  -webkit-transform: translateX(26px);
                  -ms-transform: translateX(26px);
                  transform: translateX(26px);
                }

                /* Rounded sliders */
                .slider.round {
                  border-radius: 34px;
                }

                .slider.round:before {
                  border-radius: 50%;
                }
                </style>
