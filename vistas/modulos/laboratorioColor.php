<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Laboratorio de Color" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["nombre"] == "Diego Ávila"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      LABORATORIO DE COLOR
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">LABORATORIO DE COLOR</li>
    
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
        <CENTER><h2>CONTROL DE LABORATORIO DE COLOR</h2></CENTER>
        <br>
        <br>
        <div id="pedidosIgualado">
            
             <?php
              $pedidosLaboratorio = ControladorAtencion::ctrMostrarPedidosLaboratorio();
              ?>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mostrarIgualados">Pedidos con Igualado  <span class="badge"><?php echo $pedidosLaboratorio["tieneIgualado"]; ?></span></button>
              
              <br>

        </div>
       
        <br>
        
        <div class="box-tools">
  
        <?php 

            if ($_SESSION["grupo"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez") {
            

          if ($_SESSION["grupo"] == "Generador" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Jonathan Gonzalez" || $_SESSION["nombre"] == "Jesús Serrano") {
            echo ' <a href="vistas/modulos/reportes.php?reporteLaboratorio=laboratoriocolor">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
          }else{

              echo '<a href="vistas/modulos/reportes.php?reporteLaboratorio=laboratoriocolor">

            <button class="btn btn-info" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';

          }
              
            }else{
              echo '
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="vistas/modulos/reportes.php?reporteLaboratorio=laboratoriocolor">

           <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';
            }

          ?>
        </div>
        <br>
        <table class="table-bordered table-striped dt-responsive tablaLaboratorio" width="100%" id="laboratorio" style="border: 2px solid #dd4b39">
         
          <thead style="background:#dd4b39;color: white">
           
           <tr style="">
             
             <th style="width:20px;height: 40px;border:none;">#</th>
             <th style="border:none">Folio de Pedido</th>
             <th style="border:none">Nombre de Igualador</th>
             <th style="border:none">Número de Serie</th>
             <th style="border:none">Nombre del Cliente</th>
             <th style="border:none">Número de Órden</th>
             <th style="border:none">Código de Color</th>
             <th style="border:none">Descripción Color</th>
             <th style="border:none">Cantidad</th>
             <th style="border:none">Importante</th>
             <th style="border:none">Fecha de Recepción</th>
             <th style="border:none">Fecha de Inicio</th>
             <th style="border:none">Fecha de Término</th>
             <th style="border:none">Estatus</th>
             <th style="border:none">Observaciones</th>
             <th style="border:none">Tiempo de Proceso</th>
             <th style="border:none">Igualados</th>
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
MODAL VER IGUALADOS
======================================-->

<!-- Modal -->
<div class="modal fade" id="modalVerIgualados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: tomato">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white">LISTA DE IGUALADOS</h4>
      </div>
      <div class="modal-body">
        
        <div class="container col-lg-12">
          <div class="row" >
            <div class="col-lg-12" style="display: none">
              
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguSecciones" name="iguSecciones" readonly style="border: none;background: white">
                </div>
            </div>
           </div>
           <div class="row" id="1Co">
            <hr style="background: black">
            <div class="col-lg-3">
              <span style="font-weight: bold">Código</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCodigo" name="iguCodigo" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-6">
              <span style="font-weight: bold">Descripción</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguDescripcion" name="iguDescripcion" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-3">
              <span style="font-weight: bold">Cantidad Litros</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCantidad" name="iguCantidad" readonly style="border: none;background: white">
                </div>
            </div>
           </div>
           <!--COLOR 2-->
           <div class="row" id="2Co" style="display: none">
            <hr style="background: black">
            <div class="col-lg-3">
                <span style="font-weight: bold">Código</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCodigo2" name="iguCodigo2" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-6">
                <span style="font-weight: bold">Descripción</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguDescripcion2" name="iguDescripcion2" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-3">
                <span style="font-weight: bold">Cantidad Litros</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCantidad2" name="iguCantidad2" readonly style="border: none;background: white">
                </div>
            </div>
           </div>
           
           <!-- COLOR 3-->
           <div class="row" id="3Co" style="display: none">
            <hr style="background: black">
            <div class="col-lg-3">
                <span style="font-weight: bold">Código</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCodigo3" name="iguCodigo3" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-6">
                <span style="font-weight: bold">Descripción</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguDescripcion3" name="iguDescripcion3" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-3">
                <span style="font-weight: bold">Cantidad Litros</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCantidad3" name="iguCantidad3" readonly style="border: none;background: white">
                </div>
            </div>
           </div>
           
           <!--COLOR 4-->
           <div class="row" id="4Co" style="display: none">
            <hr style="background: black">
            <div class="col-lg-3">
                <span style="font-weight: bold">Código</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCodigo4" name="iguCodigo4" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-6">
                <span style="font-weight: bold">Descripción</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguDescripcion4" name="iguDescripcion4" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-3">
                <span style="font-weight: bold">Cantidad Litros</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCantidad4" name="iguCantidad4" readonly style="border: none;background: white">
                </div>
            </div>
           </div>
            
           <!--COLOR 5-->
           <div class="row" id="5Co" style="display: none">
            <hr style="background: black">
            <div class="col-lg-3">
                <span style="font-weight: bold">Código</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCodigo5" name="iguCodigo5" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-6">
                <span style="font-weight: bold">Descripción</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguDescripcion5" name="iguDescripcion5" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-3">
                <span style="font-weight: bold">Cantidad Litros</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="iguCantidad5" name="iguCantidad5" readonly style="border: none;background: white">
                </div>
            </div>
           </div>
           
           <!--FIN DE COLORES-->
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        
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
                     <!-- ENTRADA PARA SELECCIONAR EL IGUALADOR -->
                      <span style="font-weight: bold">Igualador</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control"  name="editarUsuario" id="editarUsuario" required="true">
                          
                          <option value="" id="editarUsuario">Seleccionar Igualador</option>

                          <option value="Miguel">Miguel</option>

                          <option value="Rafael">Rafael</option>

                        </select>
                        

                      </div>
                      <input type="hidden" name="idLaboratorio2" id="idLaboratorio2">
                  </div>
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA FOLIO PEDIDO -->
                      <span style="font-weight: bold">Serie de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" readonly>
                        
                      </div>
                  </div>
                  
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA SELECCIONAR EL PEDIDO-->
                      <span style="font-weight: bold">Folio de Pedido</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                         <input type="text" class="form-control input-lg" name="editarIdPedido" id="editarIdPedido" readonly>
                        
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA EL CLIENTE -->
                     <span style="font-weight: bold">Nombre del Cliente</span>
                    <div class="input-group">
              
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <input type="text" class="form-control input-lg" name="editarNombreCliente" id="editarNombreCliente" readonly>
                       
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA NUMERO NUMERO ORDEN-->
                     <span style="font-weight: bold"># Orden</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarNumeroOrden" placeholder="Numero de orden" id="editarNumeroOrden" readonly>

                      </div>
                  </div>
                  
                  <div class="col-lg-6">
                     <!-- ENTRADA PARA CODIGO -->
                     <span style="font-weight: bold">Elegir cantidad de colores</span>
                      <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 
                        <select class="form-control" onchange="coloresOnChange(this)" name="editarSecciones" id="editarSecciones" required>
                          <option value="0">Elegir</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>

                      </div>
                  </div>
                  
                </div>
                <br>
                <div class="container col-lg-12">
                  <div class="row" id="1E">
                    <div class="row">
                       <div class="col-lg-4">
                     <!-- ENTRADA PARA CODIGO -->
                     <span style="font-weight: bold">Código 1</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarCodigo1" placeholder="Codigo" id="editarCodigo1" >

                      </div>
                  </div>
                  <div class="col-lg-4">
                    <!-- ENTRADA PARA DESCRIPCION DE COLOR-->
                     <span style="font-weight: bold">Descripción de Color</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarDescripcionColor" placeholder="Descripcion Color" id="editarDescripcionColor">

                      </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- ENTRADA PARA CANTIDAD EN LITROS -->
                     <span style="font-weight: bold">Cantidad en Litros</span>
                      <div class="input-group">
                
                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarCantidad" placeholder="Cantidad en litros" id="editarCantidad">

                      </div>
                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA INICIO -->
                     <span style="font-weight: bold">Fecha Inicio</span>
                      <div class="input-group datepick" id="datepick">
                          <input type="text" class="form-control input-lg datepick" name="editarFechaInicio" id="editarFechaInicio" placeholder="Fecha Inicio">
                          <div class="input-group-addon add-on datepick">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA TERMINO -->
                     <span style="font-weight: bold">Fecha Término</span>
                      <div class="input-group datepick1" id="datepick1">
                          <input type="text" class="form-control input-lg datepick1" name="editarFechaTermino" id="editarFechaTermino" placeholder="Fecha Término">
                          <div class="input-group-addon add-on datepick1">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                  </div>

                    </div>
                      
                  </div>
                   
                  <div class="row" id="2E"  style="display: none">
                    <div class="row">
                        <div class="col-lg-4">
                           <!-- ENTRADA PARA CODIGO -->
                           <span style="font-weight: bold">Código 2</span>
                            <div class="input-group">
                      
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCodigo2" placeholder="Codigo" id="editarCodigo2">

                            </div>
                        </div>
                        <div class="col-lg-4">
                          <!-- ENTRADA PARA DESCRIPCION DE COLOR-->
                           <span style="font-weight: bold">Descripción de Color</span>
                            <div class="input-group">
                      
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescripcionColor2" placeholder="Descripcion Color" id="editarDescripcionColor2">

                            </div>
                        </div>
                        <div class="col-lg-4">
                           <!-- ENTRADA PARA CANTIDAD EN LITROS -->
                           <span style="font-weight: bold">Cantidad en Litros</span>
                            <div class="input-group">
                      
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCantidad2" placeholder="Cantidad en litros" id="editarCantidad2">

                            </div>
                        </div>
                        <div class="col-lg-6">
                          <!-- ENTRADA PARA FECHA INICIO -->
                           <span style="font-weight: bold">Fecha Inicio</span>
                            <div class="input-group datepick3" id="datepick3">
                                <input type="text" class="form-control input-lg datepick3" name="editarFechaInicio2" id="editarFechaInicio2" placeholder="Fecha Inicio">
                                <div class="input-group-addon add-on datepick3">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                              </div>
                              

                        </div>
                        <div class="col-lg-6">
                          <!-- ENTRADA PARA FECHA TERMINO -->
                           <span style="font-weight: bold">Fecha Término</span>
                            <div class="input-group datepick4" id="datepick4">
                                <input type="text" class="form-control input-lg datepick4" name="editarFechaTermino2" id="editarFechaTermino2" placeholder="Fecha Término">
                                <div class="input-group-addon add-on datepick44">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                              </div>
                        </div>
                    </div>
                  </div>
                  
                  <div class="row" id="3E"  style="display: none">
                     <div class="row">
                        <div class="col-lg-4">
                           <!-- ENTRADA PARA CODIGO -->
                           <span style="font-weight: bold">Código 3</span>
                            <div class="input-group">
                      
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCodigo3" placeholder="Codigo" id="editarCodigo3">

                            </div>
                        </div>
                        <div class="col-lg-4">
                          <!-- ENTRADA PARA DESCRIPCION DE COLOR-->
                           <span style="font-weight: bold">Descripción de Color</span>
                            <div class="input-group">
                      
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarDescripcionColor3" placeholder="Descripcion Color" id="editarDescripcionColor3">

                            </div>
                        </div>
                        <div class="col-lg-4">
                           <!-- ENTRADA PARA CANTIDAD EN LITROS -->
                           <span style="font-weight: bold">Cantidad en Litros</span>
                            <div class="input-group">
                      
                              <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                              <input type="text" class="form-control input-lg" name="editarCantidad3" placeholder="Cantidad en litros" id="editarCantidad3">

                            </div>
                        </div>
                        <div class="col-lg-6">
                          <!-- ENTRADA PARA FECHA INICIO -->
                           <span style="font-weight: bold">Fecha Inicio</span>
                            <div class="input-group datepick5" id="datepick5">
                                <input type="text" class="form-control input-lg datepick5" name="editarFechaInicio3" id="editarFechaInicio3" placeholder="Fecha Inicio">
                                <div class="input-group-addon add-on datepick5">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                              </div>
                              

                        </div>
                        <div class="col-lg-6">
                          <!-- ENTRADA PARA FECHA TERMINO -->
                           <span style="font-weight: bold">Fecha Término</span>
                            <div class="input-group datepick6" id="datepick6">
                                <input type="text" class="form-control input-lg datepick6" name="editarFechaTermino3" id="editarFechaTermino3" placeholder="Fecha Término">
                                <div class="input-group-addon add-on datepick6">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                              </div>
                              

                        </div>
                     </div>
                  </div>
                  
                  <div class="row" id="4E"  style="display: none">
                        <div class="row">
                          <div class="col-lg-4">
                             <!-- ENTRADA PARA CODIGO -->
                             <span style="font-weight: bold">Código 4</span>
                              <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarCodigo4" placeholder="Codigo" id="editarCodigo4">

                              </div>
                          </div>
                          <div class="col-lg-4">
                            <!-- ENTRADA PARA DESCRIPCION DE COLOR-->
                             <span style="font-weight: bold">Descripción de Color</span>
                              <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarDescripcionColor4" placeholder="Descripcion Color" id="editarDescripcionColor4">

                              </div>
                          </div>
                          <div class="col-lg-4">
                             <!-- ENTRADA PARA CANTIDAD EN LITROS -->
                             <span style="font-weight: bold">Cantidad en Litros</span>
                              <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarCantidad4" placeholder="Cantidad en litros" id="editarCantidad4">

                              </div>
                          </div>
                          <div class="col-lg-6">
                            <!-- ENTRADA PARA FECHA INICIO -->
                             <span style="font-weight: bold">Fecha Inicio</span>
                              <div class="input-group datepick7" id="datepick7">
                                  <input type="text" class="form-control input-lg datepick7" name="editarFechaInicio4" id="editarFechaInicio4" placeholder="Fecha Inicio">
                                  <div class="input-group-addon add-on datepick7">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </div>
                                </div>
                                

                          </div>
                          <div class="col-lg-6">
                            <!-- ENTRADA PARA FECHA TERMINO -->
                             <span style="font-weight: bold">Fecha Término</span>
                              <div class="input-group datepick8" id="datepick8">
                                  <input type="text" class="form-control input-lg datepick8" name="editarFechaTermino4" id="editarFechaTermino4" placeholder="Fecha Término">
                                  <div class="input-group-addon add-on datepick8">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </div>
                                </div>
                          </div>

                        </div>
                  </div>
                   
                  <div class="row" id="5E" style="display: none">
                        <div class="row">
                          <div class="col-lg-4">
                             <!-- ENTRADA PARA CODIGO -->
                             <span style="font-weight: bold">Código 5</span>
                              <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarCodigo5" placeholder="Codigo" id="editarCodigo5">

                              </div>
                          </div>
                          <div class="col-lg-4">
                            <!-- ENTRADA PARA DESCRIPCION DE COLOR-->
                             <span style="font-weight: bold">Descripción de Color</span>
                              <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarDescripcionColor5" placeholder="Descripcion Color" id="editarDescripcionColor5">

                              </div>
                          </div>
                          <div class="col-lg-4">
                             <!-- ENTRADA PARA CANTIDAD EN LITROS -->
                             <span style="font-weight: bold">Cantidad en Litros</span>
                              <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarCantidad5" placeholder="Cantidad en litros" id="editarCantidad5">

                              </div>
                          </div>
                          <div class="col-lg-6">
                            <!-- ENTRADA PARA FECHA INICIO -->
                             <span style="font-weight: bold">Fecha Inicio</span>
                              <div class="input-group datepick9" id="datepick9">
                                  <input type="text" class="form-control input-lg datepick9" name="editarFechaInicio5" id="editarFechaInicio5" placeholder="Fecha Inicio">
                                  <div class="input-group-addon add-on datepick9">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </div>
                                </div>
                                

                          </div>
                          <div class="col-lg-6">
                            <!-- ENTRADA PARA FECHA TERMINO -->
                             <span style="font-weight: bold">Fecha Término</span>
                              <div class="input-group datepick10" id="datepick10">
                                  <input type="text" class="form-control input-lg datepick10" name="editarFechaTermino5" id="editarFechaTermino5" data-toggle="tooltip" data-placement="left" title="Ingresar fecha en que se concluyó" placeholder="Fecha Término">
                                  <div class="input-group-addon add-on datepick10">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </div>
                                </div>
                                

                          </div>
                        </div>
                  </div>
                </div>
                <br>
                <div class="row">

                   <div class="col-lg-6">
                    <!-- ENTRADA PARA FECHA Y HORA RECEPCION -->
                     <span style="font-weight: bold">Fecha Recepción</span>
                      <div class="input-group datepick11" id="datepick11">
                          <input type="text" class="form-control input-lg datepick11" name="editarFechaRecepcion" id="editarFechaRecepcion" required data-toggle="tooltip" data-placement="left" title="" placeholder="Fecha Recepción">
                          <div class="input-group-addon add-on datepick11">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                        </div>
                        

                  </div>
                  <div class="col-lg-6">
                    <!-- ENTRADA PARA ESTATUS-->
                    <span style="font-weight: bold">Estatus</span>
                      <div class="input-group">
                          
                        <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span> 

                        <select class="form-control" name="editarStatus" data-toggle="tooltip" data-placement="right" title="Desplegar el listado y seleccionar el estatus" id="editarStatus" required="true">
                          
                          <option value="" id="editarStatus">Seleccionar estatus</option>

                          <option value="0">Detenido</option>

                          <option value="1">En Producción</option>

                          <option value="2">Concluido</option>

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

          $editarPedido = new ControladorLaboratorio();
          $editarPedido -> ctrEditarPedido();

          $registroBitacora =  new ControladorLaboratorio();
          $registroBitacora -> ctrRegistroBitacora(); 

         $mostrarTiempoEdicion = new ControladorLaboratorio();
         $mostrarTiempoEdicion -> ctrMostrarTiempoProcesoEdicion();

         $actualizarStatusLaboratorioEdicion = new ControladorLaboratorio();
         $actualizarStatusLaboratorioEdicion -> ctrActualizarStatusLaboratorioEdicion();

         $actualizarEstadoLaboratorio = new ControladorLaboratorio();
         $actualizarEstadoLaboratorio -> ctrActualizarEstadoLaboratorio();

         $actualizarFechaPedido = new ControladorLaboratorio();
          $actualizarFechaPedido -> ctrActualizarFechaPedido();

        ?> 
        
      </form>

    </div>

  </div>

</div>


<?php 
  $item = null;
  $valor = null;

  $igualados = controladorAtencion::ctrMostrarPedidosConIgualado($item, $valor);

?>
<!--====================================
  MODAL PARA VER PEDIDOS CON IGUALADO
======================================-->

<!-- Modal -->
<div class="modal fade" id="mostrarIgualados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: tomato">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size:18px; color: white; font-weight: bold">PEDIDOS QUE TIENEN IGUALADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
           <?php foreach ($igualados as $key => $value){

              echo '<span style="font-size:14px; font-weight:bold">Folio:</span> '.$value["idPedido"].' <span style="font-size:14px; font-weight:bold">Serie:</span> '.$value["serie"].'';
              echo '<br>';
              
           }

            
         ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!--====================================
======================================-->

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
  $(document).ready(function() {
  $('.datepick3').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick4').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick5').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick6').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick7').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick8').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick9').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick10').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick11').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick12').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick13').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick14').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick15').datetimepicker({
     format: 'YYYY-MM-DD HH:mm:ss',
  });

});
</script>
<script>
  $(document).ready(function(){
        
        $("#serie").click(function(e){
          ;
          var url = "atencionLaboratorio.php";
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
          $("#nombreCliente").val('');
          $("#numeroOrden").val('');
    });
          
    });

</script>
<script type="text/javascript">
      $(document).ready(function(){

        $("#idPedido").click(function(e){
          ;
          var url = "laboratorioc.php";
          $.getJSON(url, { _num1 : $("#idPedido").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#nombreCliente").val(cliente.nombreCliente);
              $("#numeroOrden").val(cliente.ordenCompra);
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
        data: {funcion: "funcion10"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }
     
    </script>
    <!--ATAJOS DE TECLAS EN SISTEMA-->
    <script type="text/javascript">
           shortcut.add("Ctrl+X",function() {
                 document.getElementById("inputFile").click();
            });
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
           $("#editarFechaInicio").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaTermino").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaRecepcion").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaInicio2").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaTermino2").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
      jQuery(function($){
           $("#editarFechaInicio3").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaTermino3").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
      jQuery(function($){
           $("#editarFechaInicio4").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaTermino4").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
      jQuery(function($){
           $("#editarFechaInicio5").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
     jQuery(function($){
           $("#editarFechaTermino5").mask("9999-99-99 99:99:99",{placeholder:"yyyy-mm-dd hh:mm:ss"});
        });
    </script>