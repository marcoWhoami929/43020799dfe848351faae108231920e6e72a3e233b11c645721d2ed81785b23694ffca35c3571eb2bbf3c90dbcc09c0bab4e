<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <ol class="breadcrumb">
      
      <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">GENERAR CORTE DE CAJA</li>
    
    </ol>
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

  </section>

  <section class="content">

      <div class="box box-warning">

      <div class="box-header with-border">

      </div>

      <div class="box-body">
        <br>
        
        
        <br>
        <CENTER><h2></h2></CENTER>
        
          <section class="multi_step_form">  
            <form id="msform"> 
              <!-- Tittle -->
              <div class="tittle">
                <h2>NUEVO CORTE DE CAJA</h2>
                <p>A continuación se generará el nuevo corte de caja del día.</p>
                <strong><?php echo "La fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y"); ?></strong>
              </div>
              <!-- progressbar -->
              <ul id="progressbar">
                <li class="active">FONDO DE CAJA</li>  
                <li>PENDIENTES DE PAGO</li> 
                <li>DINERO EN CAJA</li> 
                <li>INGRESO POR FORMA DE PAGO</li>
                <li>DETALLE CORTE</li>
              </ul>
              <!-- fieldsets -->
              <fieldset>
                <?php
                if ($_SESSION["nombre"] != "Sucursal San Manuel") {
                  $fondoCaja = 1000;
                }else{
                  $fondoCaja = 1500;
                }

                ?>
                <h3>¿TU FONDO DE CAJA ES DE <strong class="colorGeneral"><?php echo "$".number_format($fondoCaja,2); ?></strong>?</h3>
                
                <div class="form-row"> 
                  <br>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12">  
                    <input type="text" id="fondoCaja" class="form-control input-lg" placeholder="" value="<?php echo number_format($fondoCaja,2) ?>" readonly> 
                  </div>  
                  
                </div> 
                <div class="done_text"> 
                  <i class="fa fa-exclamation-triangle fa-2x colorGeneral" aria-hidden="true"></i>
                  <h6><strong>Indicaciones:</strong><br>Si el fondo de caja es mejor a la cantidad indicada, comunicate con el administrador.</h6> 
                </div>  
              
                <button type="button" class="action-button previous_button" id="notificacionCorteCaja">No</button>
                <button type="button" class="next action-button" id="generarCorteCaja" sucursal="<?php echo $_SESSION["nombre"]?>">Si</button>  
              </fieldset>
              <fieldset>
              
                <h3>Facturas Pendientes de Pago</h3>
                  <span class="colorGeneral" style="font-size: 17px;color: #001f3f;font-weight: bold" id="totalPendientesPago"></span>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <table class="table-bordered table-striped dt-responsive tablaPendientesPago" width="100%" id="pendientesPago" style="border: 2px solid #001f3f">
                 
                        <thead style="background:#001f3f;color: white">
                         
                         <tr style="">
                           <th style="border:none;"></th>
                           <th style="border:none">Serie</th>
                           <th style="border:none">Folio</th>
                           <th style="border:none">Cliente</th>
                           <th style="border:none">Fecha Factura</th>
                           <th style="border:none">Importe Factura</th>
                           <th style="border:none;width: 100px;color:red">Importe Cobrado <i class="fa fa-arrow-down" style="color:red"></i></th>
                           <th style="border:none;width: 150px">Forma De Pago</th>
                         </tr> 

                        </thead>
                      </table>
                    </div>
                  </div>
   
        
                <button type="button" class="next action-button" id="vincularPendientesPago">Continuar</button>  
              </fieldset>
              <fieldset>
                <h3>INGRESA LAS DENOMINACIONES DEL DINERO EN CAJA</h3>
                <div class="row">
                      <div class="col-lg-2 col-md-2 col-sm-2">
                        
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-8">
                         <div class="table-responsive">
                              <table  class="table" id="tablaDenominaciones" cellpadding="0" cellspacing="0">
                                    
                              </table>
                          </div>
                          <span id="totalDenominaciones"></span>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2">
                        
                      </div>
                </div>
                <button type="button" class="next action-button" id="procesarSiguiente" style="display: none">Continuar</button>  
                <button type="button" class="action-button" id="procesarDenominaciones">Continuar</button>  
              </fieldset>  
              <fieldset>
                <h3>DESGLOSE DE INGRESO POR FORMA DE PAGO</h3>
                <div class="row">
                   <div class="col-lg-2 col-md-2 col-sm-2">
                  
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                         <div class="table-responsive">
                            <table  class="table" id="tablaFormasDePago" cellspacing="0" cellpadding="0">
                             
                                <thead style="background: #2667ce;color: white">
                                  <tr>
                                    <th>Forma Pago</th>
                                    <th>Monto</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><input type="text" readonly value="Efectivo" class="denominaciones"></td>
                                    <td><input type="text" class="valorDenominaciones" name="efectivoDetalle" id="efectivoDetalle" readonly></td>
                                    
                                  </tr>
                                   <tr>
                                    <td><input type="text" readonly value="Cheque Nominativo" class="denominaciones"></td>
                                    <td><input type="text" class="valorDenominaciones" name="chequeNominativoDetalle" id="chequeNominativoDetalle" readonly></td>
                                  </tr>
                                  <tr>
                                    <td><input type="text" readonly value="Transferencia Electrónica" class="denominaciones"></td>
                                    <td><input type="text" class="valorDenominaciones" name="transferenciaElectronicaDetalle" id="transferenciaElectronicaDetalle" readonly></td>
                                    
                                  </tr>
                                   <tr>
                                    <td><input type="text" readonly value="Tarjeta De Crédito" class="denominaciones"></td>
                                    <td><input type="text" class="valorDenominaciones" name="tarjetaCreditoDetalle" id="tarjetaCreditoDetalle" readonly></td>
                                  </tr>
                                   <tr>
                                    <td><input type="text" readonly value="Tarjeta De Débito" class="denominaciones"></td>
                                    <td><input type="text" class="valorDenominaciones" name="tarjetaDebitoDetalle" id="tarjetaDebitoDetalle" readonly></td>
                                  </tr>
                                   <tr>
                                    <td><input type="text" readonly value="Por Definir" class="denominaciones"></td>
                                    <td><input type="text" class="valorDenominaciones" name="porDefinirDetalle" id="porDefinirDetalle" readonly></td>
                                  </tr>
                                   <tr>
                                    <td><input type="text" readonly value="Crédito" class="denominaciones"></td>
                                    <td><input type="text" class="valorDenominaciones" name="creditoDetalle" id="creditoDetalle" readonly></td>
                                  </tr>
                                   <tr>
                                    <td><input type="text" readonly value="Total" style="font-weight: bold;font-size: 18px"></td>
                                    <td><input type="text" name="totalDetalle" id="totalDetalle" style="font-weight: bold;font-size: 16px" readonly></td>
                                  </tr>
                                </tbody>
                            </table>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2">
                  
                      </div>
                </div>
               
                <button type="button" class="next action-button" id="procesarFormaPago" style="display: none">Continuar</button> 
                <button type="button" class="action-button" id="procesarFormasPago">Continuar</button>  
              </fieldset>  
              <fieldset>
                <h3>DETALLE CORTE DE CAJA</h3>
                <h6>A continuación se detalla el corte de caja con los datos procesados anteriormente.</h6>
                <h4>----------------------------------------------------------------------------------------------------------</h4>
                <br>

                <h3>Corte de Caja <span class="nombreUsuario"><?php  echo $_SESSION["nombre"]?></span> del <span class="nombreUsuario"><?php echo date("d") . " del " . date("m") . " de " . date("Y") ?></span></h3>
                <!--
                <h4>Iniciado <span id="fechaCorteIniciado" class="nombreUsuario"></span> a <span id="fechaCorteProceso" class="nombreUsuario"></span></h4>
                <h4><span id="tiempoProcesoCorte" class="nombreUsuario"></span></h4>
              -->
                <br>
                <h4>----------------------------------------------------------------------------------------------------------</h4>
  
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="table-responsive">
                              <table class="table" id="tablaFormasPago" cellspacing="0" cellpadding="0">
                                    
                              </table>
                        </div>
                        <br>
                        
                        <div class="col-lg-4 col-md-4 col-sm-4">
                           <strong><i class="fa fa-dollar" style="float: left"></i> Importe Venta</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                           <input type="text" id="importeVentaTotal" class="form-group input-sm" readonly>
                        </div>
                        <div class="co-lg-2 col-md-2 col-sm-2">
                          <?php 
                          if ($_SESSION["perfil"] == "Administrador General") {
                            echo "<button type='button' class='btn btn-success' id='btnVerImporteVenta'><i class='fa fa-eye'></i></button>";
                          }else{

                             echo "<button type='button' class='btn btn-success' id='btnVerImporteVenta' style='display:none'><i class='fa fa-eye'></i></button>";
                          }

                          ?>
                            
                        </div>
                        <br>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                           <strong><i class="fa fa-money" style="float: left"></i> Gastos</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                           <input type="text" id="gastosTotal" class="form-group input-sm" readonly>
                        </div>
                        <div class="co-lg-2 col-md-2 col-sm-2">
                           <?php 
                          if ($_SESSION["perfil"] == "Administrador General") {
                            echo "<button type='button' class='btn btn-success' id='btnVerGastosSucursal'><i class='fa fa-eye'></i></button>";
                          }else{

                             echo "<button type='button' class='btn btn-success' id='btnVerGastosSucursal' style='display:none'><i class='fa fa-eye'></i></button>";
                          }

                          ?>
                           
                        </div>
                        <br>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                           <strong><i class="fa fa-calculator" style="float: left"></i> Fondo Caja</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                           <input type="text" id="fondoCajaTotal" class="form-group input-sm" readonly>
                        </div>
                        <div class="co-lg-2 col-md-2 col-sm-2">
                            
                        </div>
                        <br>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                           <strong><i class="fa fa-minus-square" style="float: left"></i> Diferencia</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="text" id="diferenciaTotal" class="form-group input-sm" readonly>
                        </div> 
                        <div class="co-lg-2 col-md-2 col-sm-2">
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <textarea id="observacionesCorte" rows="4" cols="50" placeholder="Ingresa las observaciones sobre el corte de caja"></textarea>
                        </div>
                      
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="table-responsive">
                              <table class="table" id="tablaEfectivoDenominaciones" cellspacing="0" cellpadding="0"></table>
                      </div>
                          
                      
                    </div>
                    
                  </div>
           
                <button type="button" class="action-button" id="finalizarCorteCaja">Cerrar Corte</button>  
              </fieldset>  
            
            </form>  
          </section> 
          <div class="modal" id="modalCargarDatosCorte" data-backdrop="static" data-keyboard="false" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 80px">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#001f3f;color: white">
                  <center><h4>Procesando solicitud espere porfavor.</h4></center>
                </div>
                <div class="modal-body">

                  <center><i class="fa fa-spin fa-spinner fa-5x" aria-hidden="true" style="color: blue"></i></center>
                </div>

              </div>
            </div>
          </div>

      </div>

    </div>

  
  </section>

</div>

<script type="text/javascript">

              ;(function($) {
            "use strict";  
            
            //* Form js
            function verificationForm(){
                //jQuery time
                var current_fs, next_fs, previous_fs; //fieldsets
                var left, opacity, scale; //fieldset properties which we will animate
                var animating; //flag to prevent quick multi-click glitches

                $(".next").click(function () {
                    if (animating) return false;
                    animating = true;

                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                    //activate next step on progressbar using the index of next_fs
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function (now, mx) {
                            //as the opacity of current_fs reduces to 0 - stored in "now"
                            //1. scale current_fs down to 80%
                            scale = 1 - (1 - now) * 0.2;
                            //2. bring next_fs from the right(50%)
                            left = (now * 50) + "%";
                            //3. increase opacity of next_fs to 1 as it moves in
                            opacity = 1 - now;
                            current_fs.css({
                                'transform': 'scale(' + scale + ')',
                                'position': 'absolute'
                            });
                            next_fs.css({
                                'left': left,
                                'opacity': opacity
                            });
                        },
                        duration: 800,
                        complete: function () {
                            current_fs.hide();
                            animating = false;
                        },
                        //this comes from the custom easing plugin
                        easing: 'easeInOutBack'
                    });
                });

                $(".previous").click(function () {
                    if (animating) return false;
                    animating = true;

                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();

                    //de-activate current step on progressbar
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                    //show the previous fieldset
                    previous_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function (now, mx) {

                            //as the opacity of current_fs reduces to 0 - stored in "now"
                            //1. scale previous_fs from 80% to 100%
                            scale = 0.8 + (1 - now) * 0.2;
                            //2. take current_fs to the right(50%) - from 0%
                            left = ((1 - now) * 50) + "%";
                            //3. increase opacity of previous_fs to 1 as it moves in
                            opacity = 1 - now;
                            current_fs.css({
                                'left': left
                            });
                            previous_fs.css({
                                'transform': 'scale(' + scale + ')',
                                'opacity': opacity
                            });
                        },
                        duration: 800,
                        complete: function () {
                          
                        },
                        //this comes from the custom easing plugin
                        easing: 'easeInOutBack'
                    });
                });

                $(".submit").click(function () {
                    return false;
                })
            };  
            verificationForm ();
        
        })(jQuery); 
    </script>
    <style type="text/css">
      /*font Variables*/
      /*Color Variables*/
      @import url("https://fonts.googleapis.com/css?family=Roboto:300i,400,400i,500,700,900");
      .colorGeneral{
        color: #2667ce;
      }
      .multi_step_form {
        background: #f6f9fb;
        background: url("vistas/img/plantilla/hoja.png");;
        display: block;
        overflow: hidden;
      }
      .multi_step_form #msform {
        text-align: center;
        position: relative;
        background: white;
        min-height: 85%;
        max-width: 85%;
        margin: 0 auto;
        
        z-index: 1;
      }
      .multi_step_form #msform .tittle {
        text-align: center;
        padding-bottom: 55px;
      }
      .multi_step_form #msform .tittle h2 {
        font: 500 24px/35px "Roboto", sans-serif;
        color: #3f4553;
        padding-bottom: 5px;
      }
      .multi_step_form #msform .tittle p {
        font: 400 16px/28px "Roboto", sans-serif;
        color: #5f6771;
      }
      .multi_step_form #msform fieldset {
        border: 0;
        padding: 20px 105px 0;
        position: relative;
        width: 100%;
        left: 0;
        right: 0;
      }
      .multi_step_form #msform fieldset:not(:first-of-type) {
        display: none;
      }
      .multi_step_form #msform fieldset h3 {
        font: 500 18px/35px "Roboto", sans-serif;
        color: #3f4553;
      }
      .multi_step_form #msform fieldset h6 {
        font: 400 15px/28px "Roboto", sans-serif;
        color: #5f6771;
        padding-bottom: 30px;
      }
      .multi_step_form #msform fieldset .form-group {
        padding: 0 10px;
      }
      
      .multi_step_form #msform #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
      }
      .multi_step_form #msform #progressbar li {
        list-style-type: none;
        color: #414141;
        font-size: 9px;
        width: calc(100%/5);
        float: left;
        position: relative;
        font: 500 13px/1 "Roboto", sans-serif;
      }
      .multi_step_form #msform #progressbar li:nth-child(2):before {
        content: "\f2fd";
      }
      .multi_step_form #msform #progressbar li:nth-child(3):before {
        content: "\f316";
      }
      .multi_step_form #msform #progressbar li:nth-child(4):before {
        content: "\f119";
      }
      .multi_step_form #msform #progressbar li:nth-child(5):before {
        content: "\f127";
        
      }
      .multi_step_form #msform #progressbar li:before {
        content: "\f26d";
        font: normal normal normal 30px/50px Ionicons;
        width: 50px;
        height: 50px;
        line-height: 50px;
        display: block;
        background: #eaf0f4;
        border-radius: 50%;
        margin: 0 auto 10px auto;
      }
      .multi_step_form #msform #progressbar li:after {
        content: '';
        width: 100%;
        height: 10px;
        background: #2667ce;
        position: absolute;
        left: -50%;
        top: 21px;
        z-index: -1;
      }
      .multi_step_form #msform #progressbar li:last-child:after {
        width: 150%;
      }
      .multi_step_form #msform #progressbar li.active {
        color: #2667ce;
      }
      .multi_step_form #msform #progressbar li.active:before, .multi_step_form #msform #progressbar li.active:after {
        background: #2667ce;
        color: white;
      }
      .multi_step_form #msform .action-button {
        background: #2667ce;
        color: white;
        border: 0 none;
        border-radius: 5px;
        cursor: pointer;
        min-width: 130px;
        font: 700 14px/40px "Roboto", sans-serif;
        border: 1px solid #405867;
        margin: 0 5px;
        text-transform: uppercase;
        display: inline-block;
      }
      .multi_step_form #msform .action-button:hover, .multi_step_form #msform .action-button:focus {
        background: #405867;
        border-color: #405867;
      }
      .multi_step_form #msform .previous_button {
        background: transparent;
        color: #99a2a8;
        border-color: #99a2a8;
      }
      .multi_step_form #msform .previous_button:hover, .multi_step_form #msform .previous_button:focus {
        background: #405867;
        border-color: #405867;
        color: #fff;
      }
      .denominaciones {

        font-weight: bold;
        color: black;
        font-size: 14px;
        margin:0px 0 0px 0;


      }
      .valorDenominaciones {

        font-weight: bold;
        color: #2667ce;
        font-size: 14px;
        margin:0px 0 0px 0;
        

      }
      .nombreUsuario{

        font-weight: bold;
        color: #2667ce;
        font-size: 18px;

      }
      
      table {     
    
        width: 500px; 
        text-align: left;   
        border-spacing: 0 !important;
        border-collapse: collapse !important;

      }

      td {    
       
        background: #e8edff;     
        color: #669;    

      }

      tr:hover td { 
        background: #d0dafd; 
        color: #339; 
      }
      #observacionesCorte {
        width:100%;
        height:100%;
        border: 2px dotted #000099;
      }

 
    </style>
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
                      title: "¡Se ha notificado al administrador ponte en contacto con el!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                      if(result.value){
                        
                        window.location = "nuevoCorteCaja";

                      }

                    });
                }else if (valores[index] == "error") {
                  swal({

                        type: "error",
                        title: "¡UPPS! Hubo un error durante el envio del correo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                      }).then(function(result){

                        if(result.value){
                        
                          window.location = "nuevoCorteCaja";

                        }

                      });
                }
            }
        }else{
            
        }
    }
    </script>
