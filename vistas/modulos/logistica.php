<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Logistica" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["nombre"] == "Nataly Fuentes" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Diego Ávila"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
     LOGISTICA
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">LOGISTICA</li>
    
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
          <CENTER><h2>CONTROL LOGÍSTICA</h2></CENTER>
         
         <div class="box-tools">
           
          
          <?php 

            if ($_SESSION["grupo"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez") {
              

          if ($_SESSION["grupo"] == "Generador" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
            echo ' <a href="vistas/modulos/reportes.php?reporte=logistica">

               <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

            </a>';
          }else{

              echo ' <a href="vistas/modulos/reportes.php?reporte=logistica">

              <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

            </a>';

          }
              
            }else{
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="vistas/modulos/reportes.php?reporte=logistica">

              <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

            </a>';
            }

          ?>
        </div>
        <br>
        <br>
         
        <br>
        <table class="table-bordered table-striped dt-responsive tablaLogistica" width="100%" id="logistica" style="border: 2px solid #f39c12">
         
          <thead style="background:#f39c12;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border: none;">#</th>
             <th style="border: none">Cliente</th>
             <th style="border:none">Serie de Pedido</th>
             <th style="border:none">Folio de Pedido</th>
             <th style="border:none">Serie de Factura</th>
             <th style="border:none">Folio de Factura</th>
             <th style="border:none">Nombre de Usuario</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha Programada</th>
             <th style="border:none">Última Liberación</th>
             <th style="border:none">Estatus de Pedido</th>
             <th style="border:none">Tipo de Ruta</th>
             <th style="border:none">Operador</th>
             <th style="border:none">Fecha de Entrega al Cliente</th>
             <th style="border:none">Importante</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Tiempo de Proceso</th>
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
                  <div class="col-lg-4">
                     <!-- ENTRADA PARA SELECCIONAR EL USUARIO -->
                      <span style="font-weight: bold">Usuario</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                       
                        <select class="form-control" name="editarUsuario" id="editarUsuario" required="true">
                          
                          <option value="" id="editarUsuario">Seleccionar usuario</option>

                          <option value="Mauricio Anaya">Mauricio Anaya</option>

                          <option value="Nataly Fuentes">Nataly Fuentes</option>

                          <option value="Aurora Fernandez">Aurora Fernandez</option>


                        </select>
                        <input type="hidden" name="idLogis" id="idLogis">

                      </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- ENTRADA PARA FOLIO PEDIDO -->
                      <span style="font-weight: bold">Serie de pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                          <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" required readonly>

                      </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- ENTRADA PARA SELECCIONAR EL PEDIDO-->
                      <span style="font-weight: bold">Folio de pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarIdPedido" id="editarIdPedido" required readonly>

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FOLIO PEDIDO -->
                      <span style="font-weight: bold">Serie de factura</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                          <input type="text" class="form-control input-lg" name="editarSerieFactura" id="editarSerieFactura" required readonly>

                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SELECCIONAR EL PEDIDO-->
                      <span style="font-weight: bold">Folio de factura</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarFolioFactura" id="editarFolioFactura" required readonly>

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA RECEPCION -->
                     <span style="font-weight: bold">Fecha y Hora Recepción</span>
                      <div class="input-group datepick" id="datepick">
                          <input type="text" class="form-control input-lg datepick" name="editarFechaRecepcion" id="editarFechaRecepcion">
                          
                          <div class="input-group-addon add-on datepick">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                   <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA PROGRAMADA -->
                     <span style="font-weight: bold">Fecha y Hora Programada</span>
                      <div class="input-group datepick1" id="datepick1">
                          <input type="text" class="form-control input-lg datepick1" name="editarFechaProgramada" id="editarFechaProgramada">
                          <div class="input-group-addon add-on datepick1">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                       <!-- ENTRADA PARA ESTATUS-->
                    <span style="font-weight: bold">Estatus</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarStatus" id="editarStatus" required="true">
                          
                          <option value="" id="editarStatus">Seleccionar estatus</option>

                          <option value="0">Detenido</option>

                          <option value="1">Ruta</option>

                          <option value="2">Entregado</option>

                        </select>


                      </div>
                  </div>
                  <div class="col-lg-6">
                      <!-- ENTRADA PARA TIPO RUTA-->
                    <span style="font-weight: bold">Tipo Ruta</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarTipoRuta" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar la ruta" id="editarTipoRuta" required="true">
                          
                          <option value="" id="editarTipoRuta">Seleccionar estatus</option>

                          <option value="Mostrador">Mostrador</option>

                          <option value="Local">Local</option>

                          <option value="Foraneo">Foraneo</option>

                        </select>


                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                      <!-- ENTRADA PARA TIPO RUTA-->
                    <span style="font-weight: bold">Operador</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarOperador" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar operador" id="editarOperador" required="true">
                          
                          <option value="" id="editarOperador">Seleccionar</option>

                          <option value="Sin Operador">Sin Operador</option>


                          <option value="Roció Martínez Morales">Roció Martínez Morales</option>

                          <option value="Jonathan Gonzalez Sanchez">Jonathan Gonzalez Sanchez</option>

                          <option value="Orlando Raúl Briones Aguirre">Orlando Raúl Briones Aguirre</option>

                          <option value="Ernesto Cuanalo">Ernesto Cuanalo</option>

                          <option value="Jesus Totolhua">Jesus Totolhua</option>

                          <option value="Angel De La Cruz">Angel De La Cruz</option>


                        </select>


                      </div>
                  </div>
                   <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA RECEPCION -->
                     <span style="font-weight: bold">Fecha y Hora Entrega al Cliente</span>
                      <div class="input-group datepick2" id="datepick2">
                          <input type="text" class="form-control input-lg datepick2" name="editarFechaEntregaCliente" id="editarFechaEntregaCliente">
                          <div class="input-group-addon add-on datepick2">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                </div>
                  <div class="row">
                  <div class="col-lg-12">
                    <!-- ENTRADA PARA OBSERVACIONES-->
                     <span style="font-weight: bold">Observaciones</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-comment"></i></span> 

                        <textarea type="text" class="form-control input-lg" name="editarObservaciones" placeholder="Observaciones" id="editarObservaciones"></textarea>
                        
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

          <button type="submit" class="btn btn-primary">Modificar Pedido</button>

        </div>
           <?php

          $editarPedido = new ControladorLogistica();
          $editarPedido -> ctrEditarPedidos();

          $registroBitacora =  new ControladorLogistica();
          $registroBitacora -> ctrRegistroBitacora(); 

          $mostrarTiempoEdicion = new ControladorLogistica();
          $mostrarTiempoEdicion -> ctrMostrarTiempoProcesoEdicion();

          $mostrarTiempoSegundosEdicion = new ControladorLogistica();
          $mostrarTiempoSegundosEdicion -> ctrMostrarTiempoSegundosEdicion();

          $actualizarStatusLogisticaEdicion = new ControladorLogistica();
          $actualizarStatusLogisticaEdicion -> ctrActualizarStatusLogisticaEdicion();

          $tiempoFinalEdicion = new ControladorLogistica();
          $tiempoFinalEdicion -> ctrMostrarTiempoFinalEdicion();

          $actualizarEstado = new ControladorLogistica();
          $actualizarEstado -> ctrActualizarEstadoLogistica();

          $actualizarConcluido = new ControladorLogistica();
          $actualizarConcluido -> ctrActualizarConcluido();

          $actualizarCancelado = new ControladorLogistica();
          $actualizarCancelado -> ctrActualizarCancelado();
       
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
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick2').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });
});
</script>


<script>
   $(document).ready(function(){
        
        $("#serie").click(function(e){
          ;
          var url = "atencionLogistica.php";
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
    });
          
    });
</script>
<script type="text/javascript">
 function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion13"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }


</script>
<script type="text/javascript">
       jQuery(function($){
           $("#editarFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaProgramada").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaEntregaCliente").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     
     
    </script>
