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
    
    <h1>
      MIS DEPÓSITOS BANCARIOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">MIS DEPOSITOS</li>
    
    </ol>

  </section>

  <section class="content">

      <div class="box">

      <div class="box-header with-border">
        
         <?php 

         error_reporting(E_ALL);
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
        <CENTER><h2></h2></CENTER>
        
        <div class="box-tools">

        <?php 

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma") {
              
              echo '<a href="vistas/modulos/reportes.php?reporteDepositosBancarios=depositostiendas">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteDepositosBancarios=depositostiendas">

                <button class="report btn btn-info" id="report" name="report" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
          
        </div>
        <br>
        <div class="col-lg-12 col-md-6 col-sm-6">
           <form class="form-wrapper">
            <input  id='movimientoBancario' type='movimientoBancario' placeholder='Buscar Movimiento Bancario' />
            
            <button  id="btnBuscarMovimientoBancario">Buscar</button><button  id="btnLimpiarMovimiento">Mis Depósitos</button></form>
        </div>
      
        <br>
        <table class="table-bordered table-striped dt-responsive tablaDepositosTiendas" width="100%" id="DepositosTiendas" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border:none">Fecha Deposito</th>
             <th style="border:none">Movimiento</th>
             <th style="border:none">Importe Boucher</th>
             <th style="border:none">Estatus</th>
             <th style="border:none">Saldo Pendiente</th>
             <th style="border:none">Acciones</th>

           </tr> 

          </thead>
        </table>
        
        <!-- Modal Refacturacion de factura cancelada -->
        <div class="modal fade" id="modalIdentificarDeposito" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background:#001f3f;color: white">
                <h3 class="modal-title" id="exampleModalLabel">Vincular Factura</h3>

                <button type="button" class="close btnActualizarDepositos" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="row">
                       <div class="alert alert-danger" role="alert" id="fracaso" style="display: none;opacity: 0.7">
                          Elegir Una Factura A Vincular!!!!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert" role="alert" id="exito" style="display: none;opacity:1;background: white">
                          <center><span id='statusProceso'></span></center>
                          <center><i class="fa fa-spin fa-spinner fa-5x" aria-hidden="true" style="color: blue"></i></center>
                           
                        </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <h3>Total Abono: &nbsp;&nbsp;&nbsp;<span id="abonoBanco" style="color: blue;font-weight: bold;font-size: 18px;"></span></h3>
                          <input type="hidden" name="abonoBancoTotal" id="abonoBancoTotal">
                          <input type="hidden" name="idMovimientoBanco" id="idMovimientoBanco">
                        </div>
                       
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <h3>Total Depósito: &nbsp;&nbsp;&nbsp;<span id="abonoFacturas" style="color: blue;font-weight: bold;font-size: 18px;"></span></h3> 
                        </div>
                       
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <button type="button" class="btn btn-success" id="btnVincularFacturas">Guardar</button>
                        </div>
                  </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <small>Nota: Elegir que factura se vincula con el depósito.</small>
                      <div id="listaFacturas"></div>
                       <table class="table-bordered table-striped dt-responsive tablaListaFacturasDepositos" width="100%" id="listaFacturasDepositos" style="border: 2px solid #001f3f">
                 
                        <thead style="background:#001f3f;color: white">
                         
                         <tr style="">
                           <th style="border:none">Serie</th>
                           <th style="border:none">Folio</th>
                           <th style="border:none">Fecha Factura</th>
                           <th style="border:none">Cliente</th>
                           <th style="border:none">Total</th>
                           <th style="border:none;color:red">Modificar <i class="fa fa-arrow-down" style="color:red"></i></th>
                           <th style="border:none"></th>
                         </tr> 

                        </thead>
                      </table>
                    </div>
                  </div>
                  
                      
                </div>
     
              </div>
              <br>
              <div class="modal-footer">
          
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn btn-primary btnActualizarDepositos" data-dismiss="modal">Cerrar</button>
                      </div>
                  </div>   
                   
              </div>
            </div>
          </div>
        </div>

          <div class="modal fade" id="modalProcesoCargaDatos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#001f3f;color: white">
                  <center><h4>Procesando Datos</h4></center>
                </div>
                <div class="modal-body">

                  <center><i class="fa fa-spin fa-spinner fa-5x" aria-hidden="true" style="color: blue"></i></center>
                </div>

              </div>
            </div>
          </div>
          <div class="modal" id="modalProcesoCargaDatosRecibo" data-backdrop="static" data-keyboard="false" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 80px">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#001f3f;color: white">
                  <center><h4>Generando Recibo</h4></center>
                </div>
                <div class="modal-body">

                  <center><i class="fa fa-spin fa-spinner fa-5x" aria-hidden="true" style="color: blue"></i></center>
                </div>

              </div>
            </div>
          </div>

          <!-- Modal Refacturacion de factura cancelada -->
        <div class="modal fade" id="modalVerDesglosAbonos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background:#001f3f;color: white">
                <h3 class="modal-title" id="exampleModalLabel">Desglose De Abonos</h3>

                <button type="button" class="close btnCerrarDesgloseAbonos" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">

                  <div class="col-lg-12 col-md-12 col-sm-12">
                 
                        <small>Nota: A continuación se detallan los abonos realizados por factura.</small>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="col-lg-4 col-md-4 col-sm-4">
                             <h3>Total Abonado</h3>
                             <span id="detalleAbonado"></span>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4">
                             <h3>Movimiento Bancario:</h3>
                             <span id="numeroMovimientoAbono"></span>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4">
                             <h3>Terminación Bancaria:</h3>
                             <span style="font-weight:bold;color:#2667ce;font-size:22px"><?php if($_SESSION["nombre"] != "Sucursal Santiago"){echo "**** **** **** 0198";}else{echo "**** **** **** 6278";} ?></span>
                          </div>
                          
                        </div>
                       
                        
                        <br>
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div id="detalleAbonos" name="detalleAbonos">

                              <div class="table-responsive">
                                  <table class="table" id="tablaDetalleAbono">
                                    <caption>Detalles Abonos</caption>
                                  </table>
                                </div>
                          
                           </div>
                        </div>
                    </div>
                  
                </div>
              </div>
              <br>
              <div class="modal-footer">
          
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn btn-primary btnCerrarDesgloseAbonos" data-dismiss="modal">Cerrar</button>
                      </div>
                  </div>   
                   
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  
  </section>

</div>


 <style>
    .form-wrapper {
        width:auto;
        padding: 8px;
        
        overflow: hidden;
        border-width: 1px;
        border-style: solid;
        border-color: #dedede #bababa #aaa #bababa;
        -moz-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
        -webkit-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
        box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;   
        background-color: #f6f6f6;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#f6f6f6), to(#eae8e8)); 
        background-image: -webkit-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: -moz-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: -ms-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: -o-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: linear-gradient(top, #f6f6f6, #eae8e8);
    }
   
    .form-wrapper #movimientoBancario {
        width: 80%;
        height: 40px;
        padding: 10px 5px;
        float: left;   
        font: bold 16px 'lucida sans', 'trebuchet MS', 'Tahoma';
        border: 1px solid #ccc;
        -moz-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
        -webkit-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
        box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;     
    }
   
    .form-wrapper #movimientoBancario:focus {
        outline: 0; 
        border-color: #aaa;
        -moz-box-shadow: 0 1px 1px #bbb inset;
        -webkit-box-shadow: 0 1px 1px #bbb inset;
        box-shadow: 0 1px 1px #bbb inset; 
    }
   
    .form-wrapper #movimientoBancario::-webkit-input-placeholder {
       color: #999;
       font-weight: normal;
    }
   
    .form-wrapper #movimientoBancario:-moz-placeholder {
        color: #999;
        font-weight: normal;
    }
   
    .form-wrapper #movimientoBancario:-ms-input-placeholder {
        color: #999;
        font-weight: normal;
    }   
   
    .form-wrapper #btnBuscarMovimientoBancario {
        float: center;   
        border: 1px solid #00748f;
        height: 42px;
        width: 100px;
        cursor: pointer;
        font: bold 15px Arial, Helvetica;
        color: #fafafa;
        margin-left: 10px;
        text-transform: uppercase;   
        background-color: #0483a0;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#31b2c3), to(#0483a0));
        background-image: -webkit-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -moz-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -ms-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -o-linear-gradient(top, #31b2c3, #0483a0);
        background-image: linear-gradient(top, #31b2c3, #0483a0);
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;     
        text-shadow: 0 1px 0 rgba(0, 0 ,0, .3);
        -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
        -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
    }
    .form-wrapper #btnLimpiarMovimiento {
        float: right;   
        border: 1px solid #00748f;
        height: 42px;
        width: 100px;
     
        cursor: pointer;
        font: bold 15px Arial, Helvetica;
        color: #fafafa;
        text-transform: uppercase;   
        background-color: #0483a0;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#31b2c3), to(#0483a0));
        background-image: -webkit-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -moz-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -ms-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -o-linear-gradient(top, #31b2c3, #0483a0);
        background-image: linear-gradient(top, #31b2c3, #0483a0);
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;     
        text-shadow: 0 1px 0 rgba(0, 0 ,0, .3);
        -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
        -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
    }
     
    .form-wrapper #btnBuscarMovimientoBancario:hover,
    .form-wrapper #btnBuscarMovimientoBancario:focus {       
        background-color: #31b2c3;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#0483a0), to(#31b2c3));
        background-image: -webkit-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -moz-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -ms-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -o-linear-gradient(top, #0483a0, #31b2c3);
        background-image: linear-gradient(top, #0483a0, #31b2c3);
    }   
     
    .form-wrapper #btnBuscarMovimientoBancario:active {
        outline: 0;   
        -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;   
    }
     
    .form-wrapper #btnBuscarMovimientoBancario::-moz-focus-inner {
        border: 0;
    }
    .form-wrapper #btnLimpiarMovimiento:hover,
    .form-wrapper #btnLimpiarMovimiento:focus {       
        background-color: #31b2c3;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#0483a0), to(#31b2c3));
        background-image: -webkit-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -moz-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -ms-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -o-linear-gradient(top, #0483a0, #31b2c3);
        background-image: linear-gradient(top, #0483a0, #31b2c3);
    }   
     
    .form-wrapper #btnLimpiarMovimiento:active {
        outline: 0;   
        -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;   
    }
     
    .form-wrapper #btnLimpiarMovimiento::-moz-focus-inner {
        border: 0;
    }
   
</style>
    