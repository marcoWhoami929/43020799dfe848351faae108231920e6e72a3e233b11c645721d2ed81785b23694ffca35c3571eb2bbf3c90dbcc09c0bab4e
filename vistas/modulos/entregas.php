<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Logistica" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Diego Ávila"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
     CONTROL DE ENTREGAS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Entregas</li>
    
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
          <CENTER><h2>LISTA DE ENTREGAS</h2></CENTER>
         
         <div class="box-tools">
           
          <div class='btn-group'><button class='btn btn-warning btnGenerarEntrega' data-toggle='modal' data-target='#modalGenerarEntrega' class="estilosTablas"><i class='fa fa-plus-square-o'></i>Nueva Entrega</button></div>
        </div>
        <br>
        <br>
         
        <br>
        <table class="table-bordered table-striped dt-responsive tablaEntregas estilosBordesTablas" width="100%" id="entregas">
         
          <thead class="estilosTablas">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border: none;">N°</th>
             <th style="border: none">Fecha</th>
             <th style="border:none">Operador</th>
             <th style="border:none">Unidad</th>
             <th style="border:none">Monto Entrega</th>
             <th style="border:none">Entrega</th>
             <th style="border:none">Tipo Entrega</th>
             <th style="border:none">Fecha Creada</th>
             <th style="border:none">Acciones</th>

           </tr> 

          </thead>

        </table>
        </div>
        

      </div>

    </div>

  
  </section>

</div>

<!--=====================================
MODAL GENERAR ENTREGA
======================================-->

<div id="modalGenerarEntrega" class="modal fade" role="dialog" width="100%" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-lg" >

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#001f3f; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">NUEVA ENTREGA</h4>

        </div>

          <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <div class="container col-lg-12">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Fecha</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                        
                          <input type="date" class="form-control input-lg" name="fechaEntrega" id="fechaEntrega">

                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Operador</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                       
                        <select class="form-control" name="operador" id="operador" required="true">

                          <?php 

                            $operadores = ControladorEntregas::ctrMostrarListaOperadores();

                            foreach ($operadores as $key => $value) {
                                echo "<option value='".$value["id"]."' nombre='".$value["nombre"]."'>".$value["nombre"]."</option>";
                            }



                          ?>
  

                        </select>
                    

                      </div>
                  </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                 
                    <span style="font-weight: bold">Entrega</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="entrega" id="entrega">
                            <option value="">Elegir</option>
                           
                           <?php 

                            $rutas = ControladorEntregas::ctrMostrarListaRutas();

                            foreach ($rutas as $key => $value) {
                                echo "<option value='".$value["id"]."'>".$value["tipoRuta"]."</option>";
                            }



                          ?>

                        </select>


                      </div>
                  </div>
                
              </div>
               
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Unidad</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                       
                        <select class="form-control" name="unidad" id="unidad" required="true">

                         

                        </select>
                     

                      </div>
                  </div>
                
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <span style="font-weight: bold">Tipo Entrega</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="tipoEntrega" id="tipoEntrega" required="true">
  
                          <option value="Normal">Normal</option>

                          <option value="Urgencia">Urgencia</option>

                        </select>


                      </div>
                  </div>
                </div>
                <div class="row">

                     <table class="table-bordered table-striped dt-responsive tablaListaFacturasEntregas estilosBordesTablas" width="100%" id="tablaListaFacturasEntregas">
                       
                        <thead class="estilosTablas">
                         
                         <tr style="">
                           <th style="border: none;">Serie Pedido</th>
                           <th style="border: none;">Folio Pedido</th>
                           <th style="width:20px;height: 40px;border: none;">Serie</th>
                           <th style="border: none">Folio</th>
                           <th style="border:none">Cliente</th>
                           <th style="border:none">Monto</th>
                           <th style="border:none">Tipo Cliente</th>
                           <th style="border:none">Acciones</th>
                           

                         </tr> 

                        </thead>

                      </table>
                    
                </div>
                
                
              </div>
             

            </div>


          </div>

        </div>
    

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left btnSalirEntrega" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary btnGenerarNuevaEntrega">Generar</button>

        </div>
      
  
      </form>

    </div>

  </div>

</div>

<!--=====================================
EDICION ENTREGA
======================================-->

<div id="modalEdicionEntrega" class="modal fade" role="dialog" width="100%" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-lg" >

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#001f3f; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">DETALLE ENTREGA</h4>

        </div>

          <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <div class="container col-lg-12">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Fecha</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                        
                          <input type="text" class="form-control input-lg" name="detalleFechaEntrega" id="detalleFechaEntrega" readonly>

                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Operador</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <input type="text" class="form-control input-lg" name="detalleOperador" id="detalleOperador" readonly>
                       

                      </div>
                  </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                 
                    <span style="font-weight: bold">Entrega</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                       <input type="text" class="form-control input-lg" name="detalleEntrega" id="detalleEntrega" readonly>


                      </div>
                  </div>
                
              </div>
               
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Unidad</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <input type="text" class="form-control input-lg" name="detalleUnidad" id="detalleUnidad" readonly>
                     

                      </div>
                  </div>
                
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <span style="font-weight: bold">Tipo Entrega</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <input type="text" class="form-control input-lg" name="detalleTipoEntrega" id="detalleTipoEntrega" readonly>

                      </div>
                  </div>
                </div>
                <div class="row">

                     <table class="table-bordered table-striped dt-responsive tablaFacturasEntrega estilosBordesTablas" width="100%" id="tablaFacturasEntrega">
                       
                        <thead class="estilosTablas">
                         
                         <tr style="">
                           
                           <th style="border: none;">Serie</th>
                           <th style="border: none">Folio</th>
                           <th style="border:none">Cliente</th>
                           <th style="border:none">Inicio</th>
                           <th style="border:none">Fin</th>
                           <th style="border:none">Acciones</th>
                           

                         </tr> 

                        </thead>

                      </table>
                    
                </div>
                
                
              </div>
             

            </div>


          </div>

        </div>
    

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left btnSalirEntregaEdicion" data-dismiss="modal">Salir</button>


        </div>
      
  
      </form>

    </div>

  </div>

</div>

<!--=====================================
DETALLE ENTREGA
======================================-->

<div id="modalDetalleEntrega" class="modal fade" role="dialog" width="100%" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-lg" >

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#001f3f; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">DETALLE ENTREGA</h4>

        </div>

          <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <div class="container col-lg-12">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Fecha</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                        
                          <input type="text" class="form-control input-lg" name="detalleFechaEntregaView" id="detalleFechaEntregaView" readonly>

                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Operador</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <input type="text" class="form-control input-lg" name="detalleOperadorView" id="detalleOperadorView" readonly>
                       

                      </div>
                  </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                 
                    <span style="font-weight: bold">Entrega</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                       <input type="text" class="form-control input-lg" name="detalleEntregaView" id="detalleEntregaView" readonly>


                      </div>
                  </div>
                
              </div>
               
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    
                      <span style="font-weight: bold">Unidad</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <input type="text" class="form-control input-lg" name="detalleUnidadView" id="detalleUnidadView" readonly>
                     

                      </div>
                  </div>
                
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <span style="font-weight: bold">Tipo Entrega</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <input type="text" class="form-control input-lg" name="detalleTipoEntregaView" id="detalleTipoEntregaView" readonly>

                      </div>
                  </div>
                </div>
                <table class="table-bordered   tablaFacturasEntregaView" width="100%" id="tablaFacturasEntregaView" style="border: 2px solid #001f3f">
                       
                        <thead style="background:#001f3f;color: white">
                         
                         <tr style="">
                           
                           <th style="width:20px;height: 40px;border: none;">Serie</th>
                           <th style="border: none">Folio</th>
                           <th style="border:none">Cliente</th>
                            <th style="border:none">Monto</th>
                           <th style="border:none">Inicio</th>
                           <th style="border:none">Fin</th>
                           <th style="border:none">Horas</th>
                           <th style="border:none">$ Hora</th>
                           <th style="border:none">Subtotal</th>
                           <th style="border:none">$ de gasto</th>
                           <th style="border:none">Promedio</th>
                           <th style="border:none">Utilidad</th>
                          
                         </tr> 

                        </thead>

                      </table>
                    
                
                
              </div>
             

            </div>


          </div>

        </div>
    

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left btnSalirEntrega" data-dismiss="modal">Salir</button>


        </div>
      
  
      </form>

    </div>

  </div>

</div>

