<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "José Martinez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        CANCELACIONES
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Facturas Canceladas</li>
    
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
        <CENTER><h2></h2></CENTER>
        
        <div class="box-tools">

        <?php 

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "José Martinez") {
              
              if ($_POST["sucursalElegida"] != "") {

                 echo '<a href="vistas/modulos/reportes.php?reporteFacturasTiendasCanceladas=facturastiendas&sucursalElegida='.$_POST["sucursalElegida"].'">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

                </a>';


              }else{
                 echo '<a href="vistas/modulos/reportes.php?reporteFacturasTiendasCanceladas=facturastiendas">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

                </a>';
              }
             
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporte=facturastiendas">

                <button class="report btn btn-info" id="report" name="report" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
          <?php

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "José Martinez") {

              echo '<div class="container">
              <h5 style="font-weight: bold;font-size: 25px">Búsqueda por sucursal</h5>
              <div class="row">
               <form action="facturasCanceladas" method="POST">
                <div class="container">
                  
                  <div class="col-lg-3">';
                    
                    if (isset($_POST["sucursalElegida"])) {
                       echo '<select class="form-control" name="sucursalElegida" id="sucursalElegida"><option value="'.$_POST["sucursalElegida"].'">'.$_POST["sucursalElegida"].'</option><option value="Sucursal San Manuel">Sucursal San Manuel</option><option value="Sucursal Capu">Sucursal Capu</option><option value="Sucursal Reforma">Sucursal Reforma</option><option value="Sucursal Santiago">Sucursal Santiago</option><option value="Sucursal Las Torres">Sucursal Las Torres</option></select>';
                      

                    }else {

                         echo '<select class="form-control" name="sucursalElegida" id="sucursalElegida"><option value="Sucursal San Manuel">Sucursal San Manuel</option><option value="Sucursal Capu">Sucursal Capu</option><option value="Sucursal Reforma">Sucursal Reforma</option><option value="Sucursal Santiago">Sucursal Santiago</option><option value="Sucursal Las Torres">Sucursal Las Torres</option></select>';

                     }
                  


                   echo '</div>
                  <div class="col-lg-2">
                    <input type="submit" class="btn btn-info" value="BUSCAR">
                  </div>
                   
                </div>
              </form>
              </div>
              
             </div>';
             
            }else{

                echo '<select class="form-control" name="sucursalElegida" id="sucursalElegida" style="display:none"><option value=""></option></select>';

            }

          ?>
         
        </div>
        <br>
       
        <br>
        <table class="table-bordered table-striped dt-responsive tablaCancelacionesTiendas" width="100%" id="cancelacionesTiendas" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none">#</th>
             <th style="width:20px;height: 40px;border:none"></th>
             <th style="border:none">Fecha Cancelación</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Fecha Factura</th>
             <th style="border:none">Cliente</th>
             <th style="border:none">Total</th>
             <th style="border:none">Motivo de Cancelación</th>
             <th style="border:none">Ticket De Cancelación</th>
           </tr> 

          </thead>
        </table>

      </div>

    </div>
    <!-- Modal Refacturacion de factura cancelada -->
    <div class="modal fade" id="modalRefacturacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background:#001f3f;color: white">
            <h3 class="modal-title" id="exampleModalLabel">Vincular Factura</h3>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="row">

                <div class="alert alert-success" role="alert" id="vinculacionExitosa" style="display: none;opacity: 0.7">
                    Genial Proceso Realizado Exitosamente!!!.
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger" role="alert" id="vinculacionFracasada" style="display: none;opacity: 0.7">
                  No ha sido posible vincular la factura seleccionada.
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="idFacturaTienda" id="idFacturaTienda">
                
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <small>Nota: Elegir que factura se vincula con la factura cancelada.</small>
                   <table class="table-bordered table-striped dt-responsive tablaListaFacturasTiendas" width="100%" id="listaFacturasTiendas" style="border: 2px solid #001f3f">
             
                    <thead style="background:#001f3f;color: white">
                     
                     <tr style="">
                       <th style="border:none">Serie</th>
                       <th style="border:none">Folio</th>
                       <th style="border:none">Fecha Factura</th>
                       <th style="border:none">Cliente</th>
                       <th style="border:none">Total</th>
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
                    <button type="button" class="btn btn-primary btnActualizarCanceladas" data-dismiss="modal">Cerrar</button>
                  </div>
              </div>   
               
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Factura Vinculada-->
    <div class="modal fade" id="modalVistaFacturaVinculada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background:#001f3f;color: white">
            <h3 class="modal-title" id="exampleModalLabel">Nueva Factura</h3>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-lg-12 col-md-12 col-sm-12">
          
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="table-responsive">
                      <table class="table">
                        <caption>Datos Factura</caption>
                          <thead style="background: #2667ce;color: white">
                            <tr>
                              <th scope="col">Serie</th>
                              <th scope="col">Folio</th>
                              <th scope="col">Fecha Factura</th>
                              <th scope="col">Cliente</th>
                              <th scope="col">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row"><input type="text" name="serieVinculado" id="serieVinculado"></th>
                              <td><input type="text" name="folioVinculado" id="folioVinculado" readonly></td>
                              <td><input type="text" name="fechaFacturaVinculado" id="fechaFacturaVinculado" readonly></td>
                              <td width="auto"><input type="text" name="nombreClienteVinculado" id="nombreClienteVinculado"></td>
                              <td><input type="text" name="totalVinculado" id="totalVinculado" readonly></td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                </div>
              </div>

            </div>
 
          </div>
          <br>
          <div class="modal-footer">
      
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
              </div>   
               
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Para Ve el detalle del ticket de cancelacion generado-->
        <div class="modal fade" id="modalVistaDetalleTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background:#001f3f;color: white">
                <h3 class="modal-title" id="exampleModalLabel">Detalle Ticket</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="Tickets" class="tabcontent">
                  <div class="col-lg-12 col-md-12 col-sm-12 cabeceraEdicion">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                   
                      <h2 class="estiloDatosTicket"><span id="numeroTicket"></span></h2>

                      
                      </div>
                    
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 contenidoEdicion">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4">
                      <h3 class="estiloTicket">Departamento</h3>
                      <h4 class="estiloDatosTicket"><span id="dptoTicket"></span></h4>

                      
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket">Autor</h3>
                        <h4 class="estiloDatosTicket"><span id="autorTicket"></span></h4>
                        
                        
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket">Prioridad</h3>
                        <h4 class="estiloDatosTicket">
                          <span class='label' id="prioridadTicket"></span>
                  
                          </h4>
                        
                        
                      </div>
                      
                    </div>
                    <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket">Estado</h3>
                        <h4 class="estiloDatosTicket">
                          
                          <span class='label' id="estadoTicket"></span>

                          </h4>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket2">Serie Factura</h3>
                         <h4 class="estiloDatosTicket"><span id="serieFacturaTicket"></span></h4>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="estiloTicket2">Folio Factura</h3>
                         <h4 class="estiloDatosTicket"><span id="folioFacturaTicket"></span></h4>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 conversacionEdicion">
                  <div class="direct-chat-messages">

                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right" id="fechaTicket"></span>
                      </div>
              
                      <img class="direct-chat-img" src="vistas/dist/img/user.png" alt="message user image">
                  
                      <div class="direct-chat-text">
                        <span id="motivoCancelacionTicket"></span>
                      </div>
        
                    </div>

                  </div>  
                </div>
                 <div class="col-lg-12 col-md-12 col-sm-12" style="background: #ccc">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    
                  </div>
          
                  <div class="col-lg-6 col-md-6 col-sm-6"   style='padding-bottom:20px;'>
                      <h4>Factura:</h4>
                      <a href='' target='_blank' id='spanFacturaTicket'><span class='fa fa-file-pdf-o fa-3x'></span></a>
                  </div>
                </div>
              </div>
              </div>
              <br>
              <br>
              <br>
              <div class="modal-footer"> 
                   <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
    
  
  </section>

</div>

<style type="text/css">
      /* Style the tab content */
		.tabcontent {
		  float: left;
		  padding: 10px 12px;
		  border-radius: 10px 10px 10px 10px;
		  -moz-border-radius: 10px 10px 10px 10px;
		  -webkit-border-radius: 10px 10px 10px 10px;
		  border: 1px solid  #ccc;
		  -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
		  -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
		  box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
		  width: 100%;
		  height: auto;
		  margin-left: 0px;
		}
		.color-panel{
		  color: white;
		  background: #94a4b9;
		  height: 25%;
		  padding-top: 20px;
		  font-size: 25px;
		  font-weight: bold;
		}
		.cabeceraEdicion{
		background: #94a4b9;
		height: auto;
		border-radius: 10px 10px 0px 0px;
		-moz-border-radius: 10px 10px 0px 0px;
		-webkit-border-radius: 10px 10px 0px 0px;
		border: 0px solid #000000;
		}
		.contenidoEdicion{
		background: #cccccc;
		height: 20%;
		border-radius: 0px 0px 0px 0px;
		-moz-border-radius: 0px 0px 0px 0px;
		-webkit-border-radius: 0px 0px 0px 0px;
		border: 0px solid #000000;
		}
		.conversacionEdicion{
		background:#f1f1f1;
		height: auto;
		border-radius: 0px 0px 0px 0px;
		-moz-border-radius: 0px 0px 0px 0px;
		-webkit-border-radius: 0px 0px 0px 0px;
		border: 0px solid #000000;
		}
		.respondewhiteicion{
		background: #94a4b9;
		height: 5%;
		border-radius: 10px 10px 0px 0px;
		-moz-border-radius: 10px 10px 0px 0px;
		-webkit-border-radius: 10px 10px 0px 0px;
		border: 0px solid #000000;
		}
		.respondewhiteicion h3{
		  color: white;
		}
		.contenidoRespuestaEdicion{
		background: #cccccc;
		height: auto;
		border-radius: 0px 0px 0px 0px;
		-moz-border-radius: 0px 0px 0px 0px;
		-webkit-border-radius: 0px 0px 0px 0px;
		border: 0px solid #000000;
		}
		#editor{
		  width: 100%;
		}
		.botoneraTicket{
		  margin-top: 20px;
		  margin-bottom: 100px;
		}
		.estiloTicket{
		  padding-top: 20px;
		  margin-bottom: 20px;
		  text-align: center;
		}
		.estiloTicket2{
		  padding-top: 10px;
		  margin-bottom: 20px;
		  text-align: center;
		}
		.estiloDatosTicket{
		  font-weight: bold;
		  text-align: center;
		  color: #2489c5;
		  margin-top: -10px;
		}
</style>