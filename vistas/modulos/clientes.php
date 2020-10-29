<?php

if($_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Administrador General"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    LISTA DE CLIENTES
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">CLIENTES</li>
    
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
     
        <div class="logi" id="logi">
          <CENTER><h2>GESTOR DE CLIENTES</h2></CENTER>
         
         <div class="box-tools">
          <a href="vistas/modulos/reportes.php?reporte=clientes">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>
          <?php

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Credito y Cobranza") {

                echo '<button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente">
                AGREGAR NUEVO CLIENTE
                     </button>';
              
            }else {

                      echo '<button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente" disabled>
                AGREGAR NUEVO CLIENTE
                     </button>';
            }

          ?>

        </div>
        <br>
        <br>
        <div class="">
          <div class="row">
            <form action="importClientes.php" method="post" enctype="multipart/form-data" id="import_form">
              <div class="col-md-4">
                <input type="file" name="file" />
              </div>
              <div class="col-md-2">
                <input type="submit" class="btn btn-success" name="import_data" onclick="agregar()" value="IMPORTAR DATOS">
              </div>
            
            </form>
          </div>
        </div>
        <br>
        <table class="table table-bordered table-striped dt-responsive tablaClientes" width="100%" id="clientes">
         
          <thead>
           
           <tr>
             
             <th>#</th>
             <th>Código Cliente</th>
             <th>Rfc</th>
             <th>Nombre del Cliente</th>
             <th>Agente de Ventas</th>
             <th>Agente de Cobro</th>
             <th>Límite de Crédito</th>
             <th>Días de Crédito</th>
             <th>Segmento</th>
             <th>Estatus</th>
             <th>Descuento Documento</th>
             <th>Descuento Movimiento</th>



           </tr> 

          </thead>

        </table>
        </div>
        

      </div>

    </div>

  
  </section>

</div>
<!--=====================================
MODAL AGREGAR PERFIL
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <div class="container col-lg-12">
                
                <!-- ENTRADA PARA EL CÓDIGO DEL CLIENTE-->
            <div class="row">
                  <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Código de Cliente</span>
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="codigoCliente" id="codigoCliente" placeholder="Ingresar código del cliente" required>

                  </div>

                </div>

                <!-- ENTRADA PARA EL RFC -->

                 <div class="form-group col-lg-6">
                  
                  <span style="font-weight: bold">Rfc</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="rfc" placeholder="Ingresar Rfc" id="rfc" required>

                  </div>

                </div>
            </div>
            
            <div class="row">
                  <!-- ENTRADA PARA EL NOMBRE DEL CLIENTE-->

                 <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Nombre Cliente</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="nombreCliente" id="nombreCliente" placeholder="Ingresar Nombre" required>

                  </div>

                </div>
                
                 <!-- ENTRADA PARA SELECCIONAR AGENTE DE VENTAS -->

                <div class="form-group  col-lg-6">
                  
                  <span style="font-weight: bold">Agente de Ventas</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                    <select class="form-control" name="agenteVentas" id="agenteVentas">
                      
                      <option value="">Selecionar Agente</option>

                      <option value="">SIN AGENTE DE VENTAS</option>

                      <option value="ERNESTO CUANALO PEREZ">ERNESTO CUANALO PEREZ</option>

                      <option value="ING. MIGUEL GUTIERREZ A">ING. MIGUEL GUTIERREZ A</option>
                      
                      <option value="JOSE LUIS TEXIS ROSAS">JOSE LUIS TEXIS ROSAS</option>

                      <option value="LUIS ENRIQUE BUSTOS MONTERD">LUIS ENRIQUE BUSTOS MONTERD</option>

                      <option value="ROCIO MARTÍNEZ MORALES">ROCIO MARTÍNEZ MORALES</option>

                    </select>

                  </div>

                </div>
            </div>
            

            <div class="row">
              <!-- ENTRADA PARA AGENTE DE CREDITO Y COBRANZA -->

                <div class="form-group  col-lg-6">
                  
                  <span style="font-weight: bold">Agente de Crédito y Cobranza</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                    <select class="form-control" name="agenteCobro" id="agenteCobro">
                      
                      <option value="">Selecionar Agente</option>
                      
                      <option value="">SIN AGENTE DE CREDITO</option>

                      <option value="KARIME LOPEZ CANO">KARIME LOPEZ CANO</option>

                      <option value="LUIS ALEJANDRO PEREZ GARCIA">LUIS ALEJANDRO PEREZ GARCIA</option>

                    </select>

                  </div>

                </div>

               <!-- ENTRADA PARA EL LÍMITE DE CRÉDITO-->

                 <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Límite de Crédito</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                    <input type="text" class="form-control input-lg" name="limiteCredito" id="limiteCredito" placeholder="0.00">

                  </div>

                </div>
            </div>

            <div class="row">
                
                <!-- ENTRADA PARA DÍAS DE CRÉDITO-->

                 <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Días de Crédito</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                    <input type="number" class="form-control input-lg" name="diasCredito" id="diasCredito" placeholder="Días de Crédito">

                  </div>

                </div>

                <!-- ENTRADA PARA SEGMENTO-->

                 <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Segmento</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <select class="form-control" name="segmento" id="segmento">
                      
                      <option value="">Selecionar Segmento</option>
                      
                      <option value="">SIN SEGMENTO</option>

                      <option value="ARQUITECTONICO">ARQUITECTONICO</option>

                      <option value="AUTOMOTRIZ">AUTOMOTRIZ</option>

                      <option value="INDUSTRIAL">INDUSTRIAL</option>

                      <option value="MAYOREO">MAYOREO</option>


                    </select>

                  </div>

                </div>

            </div>
            <div class="row">
                
                <!-- ENTRADA PARA ESTATUS CLIENTE-->

                 <div class="form-group col-lg-12">
                  
                   <span style="font-weight: bold">Estatus</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <select class="form-control" name="statusCliente" id="statusCliente">
                      
                      <option value="">Selecionar Estatus</option>

                      <option value="activado">ACTIVADO</option>

                      <option value="desactivado">DESACTIVADO</option>

                    </select>

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

          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

        <?php

          $crearCliente = new ControladorClientes();
          $crearCliente -> ctrCrearCliente();

          $registroBitacora =  new ControladorClientes();
          $registroBitacora -> ctrRegistroBitacora(); 

        ?>

      </form>

    </div>

  </div>

</div>
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
                        
                        window.location = "clientes";

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
                        
                          window.location = "clientes";

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
                        
                          window.location = "clientes";

                        }

                      });
                }
            }
        }else{
            
        }
    }
    </script>
     <script type="text/javascript">

      function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion14"},
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
          data: {funcion: "funcion15"},
          dataType: "json",
          success: function(respuesta){

          }
        })
      }

    </script>
