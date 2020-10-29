<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "José Martinez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        SALDADO DE REMANENTES
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">SALDADO DE REMANENTES</li>
    
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
     
        
        <div class="box-tools">

        <?php 

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["nombre"] == "José Martinez") {
              
              echo '<a href="vistas/modulos/reportes.php?reporteAjustes=ajustesaldos">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteAjustes=ajustesaldos">

                <button class="report btn btn-info" id="report" name="report" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
          <br>
          <br>
          <div class="container"  id="contenedorAjuste">
                    <h5 style="font-weight: bold;font-size: 25px">Rango de Ajuste</h5>
                    <br>
                    <div class="row">
                     <form  method="POST" id="formAjuste">
                      <div class="container">
                        
                        <div class="col-lg-3 col-md-3 col-sm-3">
                           
                          <span>Fecha Inicial</span>
                          <input type="date" id="fechaInicioAjuste" name="fechaInicioAjuste" class="form-control input-lg" required>

                          <span>Saldar documentos con remanentes menores o iguales a:</span>
                          <input type="number" id="valorAjuste" name="valorAjuste" value="" class="form-control input-lg"  placeholder="Valor de ajuste" required step = "0.01" min = "0" max = "1" value="0.99">

                          

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                          
                            <span>Fecha Final</span>
                            <input type="date" id="fechaFinAjuste" name="fechaFinAjuste" class="form-control input-lg" required>
                            <br>
                            <span>Sucursal</span>
                            <select class="form-control" id="sucursalAjuste">
                                <option value="Sucursal San Manuel">Sucursal San Manuel</option>
                                <option value="Sucursal Santiago">Sucursal Santiago</option>
                                <option value="Sucursal Capu">Sucursal Capu</option>
                                <option value="Sucursal Reforma">Sucursal Reforma</option>
                                <option value="Sucursal Las Torres">Sucursal Las Torres</option>
                          </select>

                        </div>

                        <br>
                        <div class="col-lg-2 col-md-3 col-sm-3">
                          <input type="submit" class="btn btn-warning" value="Generar Ajuste">
                        </div>
                         
                      </div>
                    </form>
                    </div>
                    
            </div>
  
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGenerarAjusteRemanentes" id="btnClicMostrarModalAjuste" style="display: none;"></button>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaAjusteSaldos" width="100%" id="ajusteSaldos" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="border:none">Serie Ajuste</th>
             <th style="border:none">Folio Ajuste</th>
             <th style="border:none">Saldo Ajustado</th>
             <th style="border:none">Creador Ajuste</th>
             <th style="border:none">Fecha Ajuste</th>
             <th style="border:none">Documento</th>

           </tr> 

          </thead>
        </table>
        <!-- Modal Generar nuevo ajuste de saldos -->
        <div class="modal fade" id="modalGenerarAjusteRemanentes" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background:#001f3f;color: white">
                <h3 class="modal-title" id="exampleModalLabel">SALDAR DOCUMENTOS CON REMANENTES</h3>

                <button type="button" class="close btnCerrarSaldadoRemanentes" data-dismiss="modal" aria-label="Close">
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
                        <div class="alert alert" role="alert" id="exitoLoader" style="display: none;opacity:1;background: white;height: 250px">
                           <center><span id="textLoader" style="font-weight: bold;font-size: 17px;color:#001f3f"></span></center>
                           <center><img src="vistas/img/plantilla/loader.gif" alt="img-responsive" style="width: 60%;"></center>

                        </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <h3>Fecha Inicial &nbsp;&nbsp;&nbsp;<span id="spanFechaInicioAjuste" style="color: blue;font-weight: bold;font-size: 18px;"></span></h3>
                          <input type="hidden" name="abonoBancoTotal" id="abonoBancoTotal">
                          <input type="hidden" name="idMovimientoBanco" id="idMovimientoBanco">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <h3>Fecha Final: &nbsp;&nbsp;&nbsp;<span id="spanFechaFinAjuste" style="color: blue;font-weight: bold;font-size: 18px;"></span></h3> 
                        </div>
                       
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <h3>Saldar documentos con remanentes menores o iguales a: &nbsp;&nbsp;&nbsp;<span id="spanValorAjuste" style="color: blue;font-weight: bold;font-size: 18px;"></span></h3> 
                        </div>
                       
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <button type="button" class="btn btn-info" id="btnGenerarAjusteRemanentes">Saldar</button>
                        </div>
                  </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <small>Nota: Antes de generar el ajuste verificar que documentos serán afectados con el proceso.</small>
                      
                       <table class="table-bordered table-striped dt-responsive tablaListaFacturasSaldosRemanentes" width="100%" id="facturasSaldosRemanentes" style="border: 2px solid #001f3f">
                 
                        <thead style="background:#001f3f;color: white">
                         
                         <tr style="">
                           <th style="border:none">Serie</th>
                           <th style="border:none">Folio</th>
                           <th style="border:none">Fecha Factura</th>
                           <th style="border:none">Cliente</th>
                           <th style="border:none">Pendiente</th>
                           <th style="border:none">Movimiento Bancario</th>
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
                        <button type="button" class="btn btn-primary btnCerrarSaldadoRemanentes" data-dismiss="modal">Cerrar</button>
                      </div>
                  </div>   
                   
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

      </div>

    </div>

  
  </section>

</div>
<style type="text/css">
  #contenedorAjuste{
    border-radius: 29px 0px 29px 0px;
-moz-border-radius: 29px 0px 29px 0px;
-webkit-border-radius: 29px 0px 29px 0px;
border: 2px solid #2b5c8c;background: #cee9f2
  }

</style>
