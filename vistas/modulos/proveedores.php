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
      
    LISTA DE PROVEEDORES
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">PROVEEDORES</li>
    
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
          <CENTER><h2>GESTOR DE PROVEEDORES</h2></CENTER>
         
         <div class="box-tools">
          <a href="vistas/modulos/reportes.php?reporte=proveedores">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>
          <?php

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Credito y Cobranza") {

                echo '<button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProveedor">
                AGREGAR NUEVO PROVEEDOR
                     </button>';
              
            }else {

                      echo '<button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProveedor" disabled>
                AGREGAR NUEVO PROVEEDOR
                     </button>';
            }

          ?>

        </div>
        <br>
        <br>
        <div class="">
          <div class="row">
            <form action="importProveedores.php" method="post" enctype="multipart/form-data" id="import_form">
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
        <table class="table table-bordered table-striped dt-responsive tablaProveedores" width="100%" id="proveedores">
         
          <thead>
           
           <tr>
             
             <th>#</th>
             <th>Código</th>
             <th>Rfc</th>
             <th>Razón Social</th>
             <th>Fecha Alta</th>
             <th>Límite de Crédito</th>
             <th>Días de Crédito</th>
             <th>Rfc</th>
             <th>C.U.R.P</th>

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

<div id="modalAgregarProveedor" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <div class="container col-lg-12">
                
                <!-- ENTRADA PARA EL CÓDIGO DEL PROVEEDOR-->
            <div class="row">
                  <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Código de Proveedor</span>
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="codigoProveedor" id="codigoProveedor" placeholder="Ingresar código del proveedor" required>

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
                  <!-- ENTRADA PARA LA RAZON SOCIAL-->

                 <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Razón Social</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="razonSocial" id="razonSocial" placeholder="Ingresar Razón Social" required>

                  </div>

                </div>
                <!-- ENTRADA PARA LA FECHA DE ALTA-->

                 <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Fecha Alta</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                    <input type="text" class="form-control input-lg" name="fechaAlta" id="fechaAlta" placeholder="00/00/0000" required>

                  </div>

                </div>
              
            </div>
            

            <div class="row">

               <!-- ENTRADA PARA EL LÍMITE DE CRÉDITO-->

                 <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Límite de Crédito</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                    <input type="text" class="form-control input-lg" name="limiteCredito" id="limiteCredito" placeholder="0.00">

                  </div>

                </div>
                <!-- ENTRADA PARA DÍAS DE CRÉDITO-->

                 <div class="form-group col-lg-6">
                  
                   <span style="font-weight: bold">Días de Crédito</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                    <input type="number" class="form-control input-lg" name="diasCredito" id="diasCredito" placeholder="Días de Crédito">

                  </div>

                </div>
            </div>

            <div class="row">
                
                

                <!-- ENTRADA PARA EL RFC -->

                 <div class="form-group col-lg-6">
                  
                  <span style="font-weight: bold">Rfc</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="rfc2" placeholder="Ingresar Rfc" id="rfc2" required>

                  </div>

                </div>
                <!-- ENTRADA PARA EL CURP -->

                 <div class="form-group col-lg-6">
                  
                  <span style="font-weight: bold">Curp</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="curp" placeholder="Ingresar Curp" id="curp" required>

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

          <button type="submit" class="btn btn-primary">Guardar Proveedor</button>

        </div>

        <?php

          $crearProveedor = new ControladorProveedores();
          $crearProveedor -> ctrCrearProveedor();

          $registroBitacora =  new ControladorProveedores();
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
                        
                        window.location = "proveedores";

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
                        
                          window.location = "proveedores";

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
                        
                          window.location = "proveedores";

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
        data: {funcion: "funcion18"},
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
          data: {funcion: "funcion19"},
          dataType: "json",
          success: function(respuesta){

          }
        })
      }

      $("#limiteCredito").on({
              "focus": function (event) {
                  $(event.target).select();
              },
              "keyup": function (event) {
                  $(event.target).val(function (index, value ) {
                      return value.replace(/\D/g, "")
                                  .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                  });
              }
          });
      jQuery(function($){
           $("#fechaAlta").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        });

    </script>
