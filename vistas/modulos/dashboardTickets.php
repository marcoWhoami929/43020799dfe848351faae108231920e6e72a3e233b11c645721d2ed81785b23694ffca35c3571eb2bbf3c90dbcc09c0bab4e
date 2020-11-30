<?php

require_once "controladores/tickets.controlador.php";
require_once "modelos/tickets.modelo.php";

$item = null;
$valor = null;
$totalTickets = ControladorTickets::ctrMostrarTotalTickets($item,$valor);
$ticketsCerrados = ControladorTickets::ctrMostrarTicketsCerrados($item,$valor);
$ticketsAbiertos = ControladorTickets::ctrMostrarTicketsAbiertos($item,$valor);
$totalDepartamentos  = ControladorTickets::ctrMostrarTotalDepartamentos($item,$valor);
$totalUsuarios = ControladorTickets::ctrMostrarTotalUsuarios($item,$valor);

$item = "usuarioDepartamento";
$valor = $_SESSION["id"];
$totalMisTickets = ControladorTickets::ctrMostrarTotalMisTickets($item,$valor);



?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de Control
        <small>Tickets de soporte</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de Control</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <div class="row">
        <a href="generadorTickets"><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-ticket" aria-hidden="true"></i><i class="fa fa-ticket" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Tickets</span>
              <span class="info-box-number"><?php echo $totalTickets["totalTickets"] ?></span>
            </div>
      
          </div>
 
        </div></a>
    
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-ticket" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mis Asignaciones</span>
              <span class="info-box-number"><?php echo $totalMisTickets["totalMisTickets"]; ?></span>
            </div>
  
          </div>
    
        </div>
   
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-ticket" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tickets Cerrados</span>
              <span class="info-box-number"><?php echo $ticketsCerrados["totalCerrados"]; ?></span>
            </div>
           
          </div>
     
        </div>
     
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-ticket" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tickets Abiertos</span>
              <span class="info-box-number"><?php echo $ticketsAbiertos["totalAbiertos"]; ?></span>
            </div>

          </div>

        </div>
     
      </div>
 
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
     
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Departamentos</span>
              <span class="info-box-number"><?php echo $totalDepartamentos["totalDepartamentos"]; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width:50%"></div>
              </div>
               <span class="progress-description">
                    Departamentos para soporte.
                  </span>
            </div>

          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
       
          <div class="info-box bg-orange">
            <span class="info-box-icon"><i class="fa fa-calendar-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Eventos de Tickets</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    Lista de eventos.
                  </span>
            </div>
            
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
   
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-clipboard"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bitácora</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    Acciones realizadas.
                  </span>
            </div>
            
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
        
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuarios</span>
              <span class="info-box-number"><?php echo $totalUsuarios["totalUsuarios"] ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                   Lista de usuarios.
                  </span>
            </div>
 
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Estadísticas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Tickets por departamento</strong>
                  </p>

                    <div id="contenedorTickets" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                  
                </div>
              
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Departamento</strong>
                  </p>
                   <?php
                        $item = null;
                        $valor = null;
                        $obtenerDepartamentos = ControladorTickets::ctrMostrarTicketsPorDpto($item, $valor);

                        $colores = ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#AFEEEE','#FF9966','#3399FF','#33CC66','#6666CC','#CC6633','#993333',' #006600','#CC0033'];

                        $contador = 0;
                        foreach ($obtenerDepartamentos as $key => $value) {

                                $contador = $contador+1;
                              
                                echo "<div class='progress-group'><a class='btnVerTicketsPendientes' data-toggle='modal' data-target='#myModal' style='color: ".$colores[$contador-1]."' idDepartamento = '".$value["id"]."'><span class='progress-text'>".$value["departamento"]."</span></a><span class='progress-number'><b>".$value["total"]."</b> Tickets</span><div class='progress sm'><div class='progress-bar progress-bar-blue' style='width: 50%;background: ".$colores[$contador-1]."'></div></div></div>";

                                
                              }
 
                   ?>

                </div>
              
              </div>
        
            </div>
  
            
          </div>
  
        </div>
    
      </div>
       <!-- Modal -->

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background: #1853C3;color: white">
              <button type="button" class="close btnCerrarListaTicketsPendientes" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">USUARIOS CON TICKETS PENDIENTES</h4>
            </div>
            <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div id="detalleTicketsPendientes" name="detalleTicketsPendientes">

                              <div class="table-responsive">
                                  <table class="table" id="tablaTicketsPendientes">
                                    
                                  </table>
                                </div>
                          
                           </div>
                        </div>
            </div>
            <div class="modal-footer">
     
              <button type="button" class="btn btn-success btnCerrarListaTicketsPendientes" data-dismiss="modal">Salir</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-12">

          <div class="row">
            <div class="col-md-4">
        
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Mis Actividades</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                   
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
            
                <div class="box-body">
       
                  <div class="direct-chat-messages">

                    <?php

                        $item = 'idAutorUser';
                        $idAutorUser = $_SESSION["id"];
                        $valor = $idAutorUser;

                        $mostrarMisActividades = ControladorTickets::ctrMostrarMisActividades($item, $valor);

                        foreach ($mostrarMisActividades as $key => $value) {

                            if ($value["tipo"] == "COMMENT") {

                                $comentario = "<i class='fa fa-comment-o'></i>".$value["nombre"]." Comentó el ticket"."#000".$value["numeroTicket"];
                              
                            }else if ($value["tipo"] == "CLOSE") {

                                $comentario = "<i class='fa fa-lock'></i>".$value["nombre"]." Cerró el ticket"."#000".$value["numeroTicket"];

                            }else if ($value["tipo"] == "APROBED") {

                                $comentario = "<i class='fa fa-check-circle-o'></i>".$value["nombre"]." Aprobó el ticket"."#000".$value["numeroTicket"];
                              
                            }else if ($value["tipo"] == "CREATE TICKET") {

                                $comentario = "<i class='fa fa-ticket'></i>".$value["nombre"]." Creó el ticket"."#000".$value["numeroTicket"];
                              
                            }else if ($value["tipo"] == "LOAD") {

                                $comentario = "<i class='fa fa-ticket'></i>".$value["nombre"]." cargó archivos para el ticket"."#000".$value["numeroTicket"];
                              
                            }
                            
                            
                            echo "<div class='direct-chat-msg'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'></span><span class='direct-chat-timestamp pull-right'>".$value["fecha"]."</span></div><img class='direct-chat-img' src='vistas/dist/img/user.png' alt='message user image'><div class='direct-chat-text'>".$comentario."</div></div>";

                        }


                    ?>

                  </div>  
                </div>
             
                <div class="box-footer">
                  
                </div>
               
              </div>

            </div>
            <div class="col-md-4">
        
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Todas las Actividades</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                   
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
            
                <div class="box-body">
       
                  <div class="direct-chat-messages">
             
                     <?php

                        $item = null;
                        $valor = null;

                        $mostrarMisActividades = ControladorTickets::ctrMostrarMisActividades($item, $valor);

                        foreach ($mostrarMisActividades as $key => $value) {

                            if ($value["tipo"] == "COMMENT") {

                                $comentario = "<i class='fa fa-comment-o'></i>".$value["nombre"]." Comentó el ticket"."#000".$value["numeroTicket"];
                              
                            }else if ($value["tipo"] == "CLOSE") {

                                $comentario = "<i class='fa fa-lock'></i>".$value["nombre"]." Cerró el ticket"."#000".$value["numeroTicket"];

                            }else if ($value["tipo"] == "APROBED") {

                                $comentario = "<i class='fa fa-check-circle-o'></i>".$value["nombre"]." Aprobó el ticket"."#000".$value["numeroTicket"];
                              
                            }else if ($value["tipo"] == "CREATE TICKET") {

                                $comentario = "<i class='fa fa-ticket'></i>".$value["nombre"]." Creó el ticket"."#000".$value["numeroTicket"];
                              
                            }else if ($value["tipo"] == "LOAD") {

                                $comentario = "<i class='fa fa-ticket'></i>".$value["nombre"]." cargó archivos para el ticket"."#000".$value["numeroTicket"];
                              
                            }
                            
                            
                            echo "<div class='direct-chat-msg'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'></span><span class='direct-chat-timestamp pull-right'>".$value["fecha"]."</span></div><img class='direct-chat-img' src='vistas/dist/img/user.png' alt='message user image'><div class='direct-chat-text'>".$comentario."</div></div>";

                        }


                    ?>
  

                  </div>  
                </div>
             
                <div class="box-footer">
                  
                </div>
               
              </div>

            </div>

            <div class="col-md-4">
        
              <div class="box box-danger direct-chat direct-chat-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">últimas Conexiones</h3>

                  <div class="box-tools pull-right">
            
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                   
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
            
                <div class="box-body">
       
                  <div class="direct-chat-messages">
             
                 
                    <?php

                        $item = null;
                        $valor = null;

                        $mostrarUltimasConexiones = ControladorTickets::ctrMostrarUltimasConexiones($item, $valor);

                        foreach ($mostrarUltimasConexiones as $key => $value) {

                            if ($value["tipo"] == "LOGIN") {

                                $comentario = $value["nombre"]." Accedió al sistema";
                              
                            }
                            
                            echo "<div class='direct-chat-msg'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-right'></span><span class='direct-chat-timestamp pull-left'>Último Acesso ".$value["fecha"]."</span></div><div class=''>".$comentario."</div></div>";

                        }


                    ?>
          
                  </div>  
                </div>
             
                <div class="box-footer">
                  
                </div>
               
              </div>

            </div>
          </div>

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Tickets</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <table class="table-bordered table-striped dt-responsive tablaListaTickets" width="100%" id="tickets" style="border: 2px solid #00c0ef">
         
                  <thead style="background:#00c0ef;color: white">
                   
                   <tr>
                     
                     <th style="width:20px;height: 40px;border:none">#</th>
                     <th style="width:20px;height: 40px;border:none">Visto</th>
                     <th style="width:20px;height: 40px;border:none">Ver</th>
                     <th style="border: none">Número Ticket</th>
                     <th style="width:20px;height: 40px;border:none">Estado</th>
                     <th style="border:none">Título</th>
                     <th style="border:none">Prioridad</th>
                     <th style="border:none">Departamento</th>
                     <th style="border:none">Autor</th>
                     <th style="border:none">Fecha</th>

        
                   </tr> 

                  </thead>

                </table>
            
      
            </div>
    
          </div>
       
        </div>
   
      </div>
    
    </section>

  </div>
  <script type="text/javascript">
    Highcharts.setOptions({
    colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#AFEEEE','#FF9966','#3399FF','#33CC66','#6666CC','#CC6633','#993333',' #006600','#CC0033']
});

    Highcharts.chart('contenedorTickets', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'DEPARTAMENTO CON TICKETS ASIGNADOS'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Porcentaje',
        colorByPoint: true,
        data: [

            <?php 

              require_once "controladores/tickets.controlador.php";
              require_once "modelos/tickets.modelo.php";


              $item = null;
              $valor = null;
              $obtenerDepartamentos = ControladorTickets::ctrMostrarTicketsPorDpto($item,$valor);
              foreach ($obtenerDepartamentos as $key => $value) {

                    
                        echo "{name: '".$value["departamento"]."',
                              y: ".$value["total"]."},";  
  
                }


              ?>
            
          
        ]
    }]
});
  </script>