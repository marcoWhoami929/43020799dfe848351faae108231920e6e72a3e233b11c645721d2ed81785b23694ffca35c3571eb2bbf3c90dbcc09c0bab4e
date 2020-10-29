

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      MIS TICKETS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tickets</li>
    
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

        <div class="container col-lg-12 col-md-12 col-sm-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              
              <div class="tab">
                <div class="color-panel">
                  <p>Panel de Control</p>
                  <i class="fa fa-dashboard"></i>
                </div>
                <button class="tablinks" onclick="openTicket(event, 'Tickets')" id="defaultOpen"><i class="fa fa-ticket"></i>Mis Tickets Asignados</button>
                <button class="tablinks" onclick="openTicket(event, 'CrearTicket')"><i class="fa fa-plus"></i>Crear Ticket</button>
                <button class="tablinks" onclick="openTicket(event, 'MisTicketsCreados')"><i class="fa fa-plus"></i>Tickets Creados</button>
                <button class="tablinks" onclick="openTicket(event, 'totalTickets')"><i class="fa fa-ticket" aria-hidden="true"></i><i class="fa fa-ticket" aria-hidden="true"></i>Lista de Tickets</button>
                <button class="tablinks" id="seguimientoEstatus"><i class="fa fa-hourglass-start" aria-hidden="true"></i>Estatus Tickets</button>
                 <button class="tablinks" id="dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Panel de Control</button>
              </div>

              <div id="Tickets" class="tabcontent">
             
                <h2>Mis Tickets</h2>
                <p>Aquí se encuentra la lista de tickets que han sido asignados.</p>
                
                <br>
                <table class="table-bordered table-striped dt-responsive tablaListaTickets" width="100%" id="tickets" style="border: 2px solid #00c0ef">
         
                  <thead style="background:#00c0ef;color: white">
                   
                   <tr>
                     
                     <th style="width:20px;height: 40px;border:none">#</th>
                     <th style="width:20px;height: 40px;border:none">Visto</th>
                     <th style="width:20px;height: 40px;border:none">Ver</th>
                     <th style="border: none">Número Ticket</th>
                     <th style="border: none">Estado</th>
                     <th style="border:none">Título</th>
                     <th style="border:none">Prioridad</th>
                     <th style="border:none">Departamento</th>
                     <th style="border:none">Autor</th>
                     <th style="border:none">Fecha</th>


        
                   </tr> 

                  </thead>

                </table>
              </div>
              <div id="MisTicketsCreados" class="tabcontent">
             
                <h2>Mis Tickets Creados</h2>
                <p>Aquí se encuentra la lista de tickets que han sido creados.</p>
                
                <br>
                <table class="table-bordered table-striped dt-responsive tablaListaTicketsCreados" width="100%" id="ticketsCreados" style="border: 2px solid #00c0ef">
         
                  <thead style="background:#00c0ef;color: white">
                   
                   <tr>
                     
                     <th style="width:20px;height: 40px;border:none">#</th>
             
                     <th style="width:20px;height: 40px;border:none">Ver</th>
                     <th style="border: none">Número Ticket</th>
                     <th style="border: none">Estado</th>
                     <th style="border:none">Título</th>
                     <th style="border:none">Prioridad</th>
                     <th style="border:none">Departamento</th>
                     <th style="border:none">Autor</th>
                     <th style="border:none">Fecha</th>
                     

        
                   </tr> 

                  </thead>

                </table>
              </div>
              <div id="totalTickets" class="tabcontent">
                <h2>Lista Tickets</h2>
                <p></p>
                
                <br>
                <table class="table-bordered table-striped dt-responsive tablaListaTicketsGenerales" width="100%" id="ticketsGenerales" style="border: 2px solid #00c0ef">
         
                  <thead style="background:#00c0ef;color: white">
                   
                   <tr>
                     
                     <th style="width:20px;height: 40px;border:none">#</th>
      
                     <th style="width:20px;height: 40px;border:none">Ver</th>
                     <th style="border: none">Número Ticket</th>
                     <th style="border: none">Estado</th>
                     <th style="border:none">Título</th>
                     <th style="border:none">Prioridad</th>
                     <th style="border:none">Departamento</th>
                     <th style="border:none">Autor</th>
                     <th style="border:none">Fecha</th>

        
                   </tr> 

                  </thead>

                </table>
              </div>

              <div id="CrearTicket" class="tabcontent">
                <h2>Crear Ticket</h2>
                <p>Este es un formulario para crear tickets.</p>
                <br>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <span style="font-weight: bold">Título</span>
                       <div class="input-group">
                
                          <span class="input-group-addon"><i class="fa fa-ticket"></i></span> 

                          <select class="form-control input-lg" name="crearTitulo" id="crearTitulo" required>
                              <option value="Devolución">Devolución</option>
                              <option value="Nota de Crédito">Nota de Crédito</option>
                              <option value="Cancelación">Cancelación</option>
                              <option value="Refacturación">Refacturación</option>
                              <option value="Recibo Electrónico de Pago">Recibo Electrónico de Pago</option>
                              <option value="Enviar PDF Y XML">Enviar PDF Y XML</option>
                              <option value="otro">Otro</option>

                          </select>
                          <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $longitud = strlen($url);
                           
          
                            if ($longitud == 71) {

                              $seriePedido = substr($url,-47,4);
                              $folioPedido = substr($url,-36,2);
                              $serieFactura = substr($url, -20, 4);
                              $folioFactura = substr($url, -2, 4);
                            }else if ($longitud == 75 ) {

                              $seriePedido = substr($url,-51,4);
                              $folioPedido = substr($url,-40,4);
                              $serieFactura = substr($url, -22, 4);
                              $folioFactura = substr($url, -4, 4);
                              
                            }
                            else if ($longitud< 71) {

                              $seriePedido = "";
                              $folioPedido = "";
                              $serieFactura = ""; 
                              $folioFactura = ""; 
                              
                            }
                        
                          ?>
                          <input type="hidden" class="form-control input-lg" name="seriePedido" id="seriePedido" value="<?php echo $seriePedido ?>">
                          <input type="hidden" class="form-control input-lg" name="folioPedido" id="folioPedido" value="<?php echo $folioPedido ?>">
                          <input type="hidden" class="form-control input-lg" name="serieFactura" id="serieFactura" value="<?php echo $serieFactura ?>">
                          <input type="hidden" class="form-control input-lg" name="folioFactura" id="folioFactura" value="<?php echo $folioFactura ?>">

                        </div>
                      </div>
                      
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <span style="font-weight: bold">Departamento</span>
                       <div class="input-group">
                
                          <span class="input-group-addon"><i class="fa fa-building"></i></span> 
                          <select class="form-control" id="crearDepartamento" name="crearDepartamento" required>
                            
                         
                           </select>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <span style="font-weight: bold">Usuario Departamento</span>
                       <div class="input-group">
                
                          <span class="input-group-addon"><i class="fa fa-building"></i></span> 
                          <select class="form-control" id="crearDepartamentoUsuario" name="crearDepartamentoUsuario" required>
                            <option value="">Elegir Usuario</option>
                           
                           </select>
      
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <span style="font-weight: bold">Prioridad</span>
                       <div class="input-group">
                
                          <span class="input-group-addon"><i class="fa fa-flag-o"></i></span> 
                          <select class="form-control" id="crearPrioridad" name="crearPrioridad" required>
                              <option value="">Elegir Prioridad</option>
                              <option value="1">Alta</option>
                              <option value="2">Media</option>
                              <option value="3">Baja</option>
                           </select>
                        </div>
                      </div>
                      
                    </div>
                    <br>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <span style="font-weight: bold">Cargar Pedido</span>
                        <div class="input-group">
                          <input id="archivoPedido" type="file" name="archivoPedido" onchange="return fileValidation()">
                        </div>
                      </div>
                      
                    </div>
                    <br>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <span style="font-weight: bold">Cargar Factura</span>
                        <div class="input-group">
                          <input id="archivoFactura" type="file" name="archivoFactura" onchange="return fileValidationFactura()">
                        </div>
                      </div>
                      
                    </div>
                    <br>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">

                       <textarea class="form-control" name="crearContenido" id="crearContenido" rows="10" cols="100" required ></textarea>
                       <br>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                          <button class="btn btn-danger" type="submit">Crear Ticket</button>
                        </div>
                    </div>
                    </div>
                    
  
                        <?php

                            $crearTicket = new ControladorTickets();
                            $crearTicket -> ctrCrearTicket();

                        ?>
                   </form>

              </div>

            </div>
            
          </div>
          
        </div>
        
      </div>

    </div>

  
  </section>

</div>
<!--============================================
  VENTANA MODAL DE TICKETS
=============================================-->
<div class="modal fade" id="modalVerTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container col-lg-12 col-md-12 col-sm-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" id="tituloTicket" readonly>
            </div>
            <br>
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" id="contenidoTicket" readonly>
            </div>
            <br>
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <strong>Autor:</strong> <input type="text" id="autorTicket" readonly>
            </div>
            <br>
            <br>
             <div class="col-lg-12 col-md-12 col-sm-12" id="divTicket">
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Estado:</strong>&nbsp;&nbsp;<span class='label label-danger' id="estadoTicket"></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Prioridad:</strong>&nbsp;&nbsp;<span class='label label-danger' id="prioridadTicket"></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Comentarios:</strong>&nbsp;&nbsp;<span class='label label-info' id="comentariosTicket"></span>
                </div>
            </div>


            
          </div>
          
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
     
      </div>
    </div>
  </div>
</div>
<!--============================================
  VENTANA MODAL DE TICKETS GENERALES
=============================================-->
<div class="modal fade" id="modalVerTicketGeneral" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container col-lg-12 col-md-12 col-sm-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" id="tituloTicketGeneral" readonly>
            </div>
            <br>
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" id="contenidoTicketGeneral" readonly>
            </div>
            <br>
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <strong>Autor:</strong> <input type="text" id="autorTicketGeneral" readonly>
            </div>
            <br>
            <br>
             <div class="col-lg-12 col-md-12 col-sm-12" id="divTicket">
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Estado:</strong>&nbsp;&nbsp;<span class='label label-danger' id="estadoTicketGeneral"></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Prioridad:</strong>&nbsp;&nbsp;<span class='label label-danger' id="prioridadTicketGeneral"></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Comentarios:</strong>&nbsp;&nbsp;<span class='label label-info' id="comentariosTicketGeneral"></span>
                </div>
            </div>


            
          </div>
          
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
     
      </div>
    </div>
  </div>
</div>
<!--============================================
  VENTANA MODAL DE TICKETS CREADOS
=============================================-->
<div class="modal fade" id="modalVerTicketCreado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container col-lg-12 col-md-12 col-sm-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" id="tituloTicketCreado" readonly>
            </div>
            <br>
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" id="contenidoTicketCreado" readonly>
            </div>
            <br>
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <strong>Autor:</strong> <input type="text" id="autorTicketCreado" readonly>
            </div>
            <br>
            <br>
             <div class="col-lg-12 col-md-12 col-sm-12" id="divTicket">
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Estado:</strong>&nbsp;&nbsp;<span class='label label-danger' id="estadoTicketCreado"></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Prioridad:</strong>&nbsp;&nbsp;<span class='label label-danger' id="prioridadTicketCreado"></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 estiloTicket">
                  <strong>Comentarios:</strong>&nbsp;&nbsp;<span class='label label-info' id="comentariosTicketCreado"></span>
                </div>
            </div>


            
          </div>
          
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
     
      </div>
    </div>
  </div>
</div>






<!--============================================
  VENTANA MODAL DE TICKETS
=============================================-->
<!--============================================
=============================================-->
<script type="text/javascript">
  //ACCIONES PARA TABS PILLS VERTICALES TICKETS SOPORTE
function openTicket(evt, ticketName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(ticketName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
$("#seguimientoEstatus").click(function(){
    window.location = "estatusTickets";
})
document.getElementById("defaultOpen").click();
$("#dashboard").click(function(){
    window.location = "dashboardTickets";
})
//
function fileValidation(){
    var fileInput = document.getElementById('archivoPedido');
    var filePath = fileInput.value;
    var allowedExtensions = /(.xml|.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
          swal({

            type: "error",
            title: "¡Solo se permiten archivos .PDF, .XML!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){
            
             

            }

          });

        fileInput.value = '';
        return false;
    }
}
function fileValidationFactura(){
    var fileInput = document.getElementById('archivoFactura');
    var filePath = fileInput.value;
    var allowedExtensions = /(.xml|.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
          swal({

            type: "error",
            title: "¡Solo se permiten archivos .!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){
            
             

            }

          });

        fileInput.value = '';
        return false;
    }
}
</script>
<style>
* {box-sizing: border-box}
/* Style the tab */
.tab {
  float: left;
  border-radius: 10px 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px 10px;
  border: 1px solid  #ccc;
  background-color: #f1f1f1;
  width: 20%;
  height: 500px;
}
.tab:hover{
  background: white;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

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
  width: 78%;
  height: auto;
  margin-left: 10px;
}
.color-panel{
  color: white;
  background: #94a4b9;
  height: 25%;
  padding-top: 20px;
  font-size: 25px;
  font-weight: bold;
}
#tituloTicket{
  border: none;
  background: transparent;
  font-weight: bold;
}
#contenidoTicket{
  border: none;
  background: transparent;
  font-weight: lighter;
  width: 100%;
}
#autorTicket{
  border: none;
  background: transparent;
  font-weight: bolder;
  margin-bottom: 10px;
}
#tituloTicketGeneral{
  border: none;
  background: transparent;
  font-weight: bold;
}
#contenidoTicketGeneral{
  border: none;
  background: transparent;
  font-weight: lighter;
  width: 100%;
}
#autorTicketGeneral{
  border: none;
  background: transparent;
  font-weight: bolder;
  margin-bottom: 10px;
}
#tituloTicketCreado{
  border: none;
  background: transparent;
  font-weight: bold;
}
#contenidoTicketCreado{
  border: none;
  background: transparent;
  font-weight: lighter;
  width: 100%;
}
#autorTicketCreado{
  border: none;
  background: transparent;
  font-weight: bolder;
  margin-bottom: 10px;
}
#divTicket{
  background: #cccccc;
  width: 100%;
  height: auto;
  margin-bottom: 20px;
}
.estiloTicket{
  padding-top: 20px;
  margin-bottom: 20px;
}
</style>