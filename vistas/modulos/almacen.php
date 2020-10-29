<?php
// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Almacen" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["nombre"] == "Diego Ávila"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      ALMACÉN
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">ALMACÉN</li>
    
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
        <CENTER><h2>CONTROL DE ALMACÉN</h2></CENTER>
      
       <div class="box-tools">

          <?php 

            if ($_SESSION["grupo"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez") {
        

          if ($_SESSION["grupo"] == "Generador" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
            echo ' <a href="vistas/modulos/reportes.php?reporte=almacen">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
          }else{

              echo ' <a href="vistas/modulos/reportes.php?reporte=almacen">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';

          }
              
            }else{
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="vistas/modulos/reportes.php?reporte=almacen">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
            }

          ?>
        </div>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaAlmacen" width="100%" id="almacen" style="border: 2px solid #00c0ef">
         
          <thead style="background:#00c0ef;color: white">
           
           <tr>
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border: none">Cliente</th>
             <th style="border:none">Folio de Pedido</th>
             <th style="border:none">Número de Serie</th>
             <th style="border:none">Suministrado por</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Suministro</th>
             <th style="border:none">Estatus de Pedido</th>
             <th style="border:none">Fecha de Término</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Importante</th>
             <th style="border:none">Tiempo de Proceso</th>
             <th style="border:none">Número de Sku´s</th>
             <th style="border:none">Sum Sku´s</th>
             <th style="border:none">Nivel de Partidas</th>
             <th style="border:none">Número de Unidades</th>
             <th style="border:none">Sum Unidades</th>
             <th style="border:none">Nivel de Sum</th>
             <th style="border:none">Importe Total</th>
             <th style="border:none">Importe Surtido</th>
             <th style="border:none">Nivel de Sum Costo</th>
             <th style="border:none">Habilitar</th>
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
                     <!-- ENTRADA PARA SELECCIONAR EL SUMINISTRADOR -->
                      <span style="font-weight: bold">Suministrado Por</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarSuministrado" id="editarSuministrado" required>
                          
                          <option value="" id="editarSuministrado">Suministrado por</option>

                          <option value="Ulises Tuxpan">Ulises Tuxpan</option>

                          <option value="Vidal Villarreal">Vidal Villarreal</option>

                          <option value="Carlos Aguilar">Carlos Aguilar</option>

                          <option value="Enrique Flores">Enrique Flores</option>
                          

                        </select>
                        

                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FOLIO PEDIDO -->
                      <span style="font-weight: bold">Serie de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" required readonly>

                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FOLIO PEDIDO -->
                      <span style="font-weight: bold">Folio de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarIdPedido" id="editarIdPedido" required readonly>
                        
                      </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FECHA Y HORA RECEPCION -->
                     <span style="font-weight: bold">Fecha Recepción</span>
                      <div class="input-group datepick" id="datepick">
                          <input type="text" class="form-control input-lg datepick" name="editarFechaRecepcion" id="editarFechaRecepcion" required>
                          <div class="input-group-addon add-on datepick">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FECHA SUMINISTRO -->
                     <span style="font-weight: bold">Fecha Suministro</span>
                        <div class="input-group datepick1" id="datepick1">
                          <input type="text" class="form-control input-lg datepick1" name="editarFechaSuministro" id="editarFechaSuministro" required>
                          <div class="input-group-addon add-on datepick1">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FECHA TÉRMINO -->
                     <span style="font-weight: bold">Fecha Término</span>
                        <div class="input-group datepick2" id="datepick2">
                          <input type="text" class="form-control input-lg datepick2" name="editarFechaTermino" id="editarFechaTermino" required>
                          <div class="input-group-addon add-on datepick2">
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

                        <select class="form-control" name="editarStatus" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar el estatus" id="editarStatus" required>
                          
                          <option value="" id="editarStatus">Seleccionar estatus</option>

                          <option value="0">BackOrder</option>

                          <option value="1">Laboratorio</option>

                          <option value="2">Pendiente</option>

                          <option value="3">Suministrado</option>

                        </select>


                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA TIPO DE COMPRA -->
                    
                    <span style="font-weight: bold">Se Requiere Compra</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarTipoCompra" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar tipo de compra que realizará el área de compras" id="editarTipoCompra" required>
                          
                          <option value="" id="editarTipoCompra">Seleccionar tipo</option>

                          <option value="0">Sin compra</option>

                          <option value="1">Compra Con Proveedores Externos</option>

                          <option value="2">Compra Interna</option>

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
                <br>
                <div class="row">
                  <div class="col-lg-4">
                    <!-- ENTRADA PARA NUMERO PARTIDAS -->
                     <span style="font-weight: bold">Sku's</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="number" class="form-control input-lg" name="editarNumeroPartidas" id="editarNumeroPartidas"readonly>

                      </div>
                  </div>
                   <div class="col-lg-4">
                    <!-- ENTRADA PARA NUMERO DE UNIDADES -->
                     <span style="font-weight: bold"># Unidades</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="number" class="form-control input-lg" name="editarNumeroUnidades" id="editarNumeroUnidades"readonly>

                      </div>
                  </div>
                  <div class="col-lg-4">
                    <!-- ENTRADA PARA IMPORTE TOTAL -->
                     <span style="font-weight: bold">Importe Total</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarImporteTotal" id="editarImporteTotal" readonly>

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
          

          $editarPedido = new ControladorAlmacen();
          $editarPedido -> ctrEditarPedido();

          $registroBitacora =  new ControladorAlmacen();
          $registroBitacora -> ctrRegistroBitacora(); 

          $mostrarTiempoEdicion = new ControladorAlmacen();
          $mostrarTiempoEdicion -> ctrMostrarTiempoProcesoEdicion();

          $actualizarStatusAlmacenEdicion = new ControladorAlmacen();
          $actualizarStatusAlmacenEdicion -> ctrActualizarStatusAlmacenEdicion();

          $actualizarTipoCompraEdicion = new ControladorAlmacen();
          $actualizarTipoCompraEdicion -> ctrActualizarTipoCompraEdicion();

          $actualizarCompraEdicion = new ControladorAlmacen();
          $actualizarCompraEdicion -> ctrActualizarCompraEdicion();

          $actualizarEstado = new ControladorAlmacen();
          $actualizarEstado -> ctrActualizarEstadoAlmacen();

          $actualizarEstadoPedido = new ControladorAlmacen();
          $actualizarEstadoPedido -> ctrActualizarEstadoPedido();

          $actualizarStatusPedido = new ControladorAlmacen();
          $actualizarStatusPedido -> ctrActualizarStatusPedido();

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
<script type="text/javascript">
      $(document).ready(function(){
        
        $("#serie").click(function(e){
          ;
          var url = "atencion.php";
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
          $("#numeroPartidas").val('');
          $("#numeroUnidades").val('');
          $("#importeTotal").val('');
    });
          
    });

      /*
       $("#horaRecepcion").click(function(){
          document.getElementById("fechaRecepcion").readOnly = true;
      });
        $("#fechaSuministro").click(function(){
          document.getElementById("horaRecepcion").readOnly = true;
      });
      $("#horaSuministro").click(function(){
          document.getElementById("fechaSuministro").readOnly = true;
      });
      $("#fechaSuministro").click(function(){
            document.getElementById("horaRecepcion").readOnly = true;
      });
      $("#horaSuministro").click(function(){
            document.getElementById("fechaSuministro").readOnly = true;
      });
      $("#fechaTermino").click(function(){
            document.getElementById("horaSuministro").readOnly = true;
      });
      $("#horaTermino").click(function(){
            document.getElementById("fechaTermino").readOnly = true;
      });
      $("#status").click(function(){
            document.getElementById("horaTermino").readOnly = true;
      });
    */
    </script>
    <script type="text/javascript">
      $(document).ready(function(){

        $("#idPedido").click(function(e){
          ;
          var url = "almacen2.php";
          $.getJSON(url, { _num1 : $("#idPedido").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#numeroPartidas").val(cliente.numeroPartidas);
              $("#numeroUnidades").val(cliente.numeroUnidades);
              $("#importeTotal").val(cliente.importeTotal);
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
        data: {funcion: "funcion9"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }

    </script>
    <!--ATAJOS DE TECLAS EN SISTEMA-->
    <script type="text/javascript">
           
            shortcut.add("Ctrl+A",function() {
                 document.getElementById("editarPed").click();
            });
            shortcut.add("Esc",function() {
                 document.getElementById("minimizar").click();
            });
            shortcut.add("Ctrl+B", function() {
                document.getElementsByTagName("input")[0].focus();
            });
            shortcut.add("Ctrl+M", function() {
                document.getElementById("modificar").click();
            });

    </script>
    <script type="text/javascript">
       jQuery(function($){
           $("#editarFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaSuministro").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaTermino").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     
    </script>