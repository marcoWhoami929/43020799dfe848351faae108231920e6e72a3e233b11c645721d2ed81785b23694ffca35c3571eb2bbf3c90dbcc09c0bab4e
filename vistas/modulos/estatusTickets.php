

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
     ESTATUS TICKETS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Estatus Tickets</li>
    
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
       <div class="col-lg-12 col-md-12 col-sm-12">
        
        <a href="generadorTickets"><button class="btn btn-warning"><i class="fa fa-home">Tickets</i></button></a>
        <a href="dashboardTickets"><button class="btn btn-success"><i class="fa fa-dashboard">Panel de Control</i></button></a>
        
      </div>
      <div class="box-body">
        <h4>Indicadores:</h4>
        <br>

        <span id="circleReds"></span><p>Ticket Sin Leer.</p><br><br><span id="circleYellows"></span><p>Ticket Leido y en Proceso.</p><br><br><span id="circleGreens"></span><p>Proceso Concluido.</p>
        <br>
        <table class="display nowrap tablaEstatusTickets" width="100%" id="estatusTickets" style="">
         
                  <thead style="background:#00c0ef;color: white">
                   
                   <tr>
                     
                     <th style="width:3%;height: 40px;border:none">#</th>
                     <th style="width:5%;height: 40px;border:none">N° Ticket</th>
                     <th style="width:5%;height: 40px;border:none">Autor</th>
                     <th style="width:5%;height: 40px;border:none">Prioridad</th>
                     <th style="width:5%;height: 40px;border:none">Estado Ticket</th>
                     <th style="width:auto;height: 40px;border: none">Estatus</th>
        
                   </tr> 

                  </thead>

        </table>
       

      </div>

    </div>

  
  </section>

</div>

<!--============================================
=============================================-->
