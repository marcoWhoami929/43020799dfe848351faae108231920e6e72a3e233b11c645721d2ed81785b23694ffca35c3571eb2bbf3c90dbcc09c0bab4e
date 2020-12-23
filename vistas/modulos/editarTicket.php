
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

         
          $url = $_SERVER['REQUEST_URI'];
          $longitud = strlen($url);
 


          if ($longitud == 39) {

            $rest = substr($url, -1, 4);
            
            
          }else if ($longitud == 40) {
            
             $rest = substr($url, -1, 4); 
             //echo $rest;

          }else if ($longitud == 41) {
            
             $rest = substr($url, -2, 4);
             //echo $rest; 

          }else if ($longitud == 42) {
            
             $rest = substr($url, -2, 4);
             //echo $rest; 
           
          }else if ($longitud == 43) {
            
             $rest = substr($url, -3, 4);
             //echo $rest;
            
          }
          else if ($longitud == 56) {
            
             $rest = substr($url, -1, 4);
             //echo $rest;
            
          }else if ($longitud == 59) {
            
             $rest = substr($url, -2, 4);
             //echo $rest;
            
          }else if ($longitud == 62) {
            
             $rest = substr($url, -3, 4);
              //echo $rest;
            
          }

          /**
           *
           * OBTENER NUMERO DE TICKET
           *
           */
           if ($longitud == 39) {

            $numeroTicket = substr($url, -12, 1);
            
            
            
            
          }else if ($longitud == 40) {
            
             $numeroTicket = substr($url, -13, 2); 
            
         

          }else if ($longitud == 41) {
            
             $numeroTicket = substr($url, -14, 2);
             
          

          }else if ($longitud == 42) {
            
             $numeroTicket = substr($url, -15, 3);
             
            

          }else if ($longitud == 43) {
            
             $numeroTicket = substr($url, -16, 3);
             //echo $numeroTicket;
           

          }else if ($longitud == 56) {
            
             $rest = substr($url, -18, 1);
             //echo $rest;
            
          }else if ($longitud == 59) {
            
             $rest = substr($url, -20, 2);
             //echo $rest;
            
          }

          $fo = str_replace('=','',$rest);
          $idTicket = $fo;
          $_SESSION["idTicket"] = $idTicket;
          $_SESSION["numeroTicket"] = $numeroTicket;  
        
           $item = 'idTicket';
           $valor = $idTicket;
           $verDetallesTicket = ControladorTickets::ctrMostrarDetallesTicket($item, $valor);

          
           $titulo = $verDetallesTicket["titulo"];
           $departamento = $verDetallesTicket["departamentoAutor"];
           $autor = $verDetallesTicket["autor"];
           $idAutor = $verDetallesTicket["idAutor"];
           $prioridad = $verDetallesTicket["prioridad"];
           $estado = $verDetallesTicket["cerrado"];
           $seriePedido = $verDetallesTicket["seriePedido"];
           $folioPedido = $verDetallesTicket["folioPedido"];
           $serieFactura = $verDetallesTicket["serieFactura"];
           $folioFactura = $verDetallesTicket["folioFactura"];
           $contenidoTicket = $verDetallesTicket["contenido"];
           $fechaTicket = $verDetallesTicket["fecha"];
          
           $urlPedido = $verDetallesTicket["rutaPedido"];
           $urlFactura = $verDetallesTicket["rutaFactura"];

           $item = 'idTicket';
           $valor = $idTicket;
           $verDetallesTickets = ControladorTickets::ctrMostrarDetallesTicket2($item, $valor);
           $departamentoAsignado = $verDetallesTickets["idDepartamento"];

         ?>

          <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
        

      </div>

      <div class="box-body">

        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              
              <div class="tab">
                <div class="color-panel">
                  <p>Panel de Control</p>
                  <i class="fa fa-dashboard"></i>
                </div>
                <button class="tablinks" onclick="reedireccionar()"><i class="fa fa-ticket"></i>Tickets</button>
                
              </div>

              <div id="Tickets" class="tabcontent">
                <div class="col-lg-12 col-md-12 col-sm-12 cabeceraEdicion">
                  
                  <div class="col-lg-12 col-md-12 col-sm-12">
                 
                    <h2 class="estiloDatosTicket"><?php echo '#'.$numeroTicket.'&nbsp;&nbsp;&nbsp;'.$titulo?></h2>

                    
                    </div>
                  
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 contenidoEdicion">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3 class="estiloTicket">Departamento</h3>
                    <h4 class="estiloDatosTicket"><?php echo $departamento?></h4>

                    
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <h3 class="estiloTicket">Autor</h3>
                      <h4 class="estiloDatosTicket"><?php echo $autor?></h4>
                      
                      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <h3 class="estiloTicket">Prioridad</h3>
                      <h4 class="estiloDatosTicket">
                        <?php 

                          if ($prioridad == 1) {
                            
                            echo "<span class='label label-danger'>Alta</span>";

                          }else if ($prioridad == 2){

                            echo "<span class='label label-warning'>Media</span>";

                          }else if ($prioridad == 3){

                            echo "<span class='label label-success'>Baja</span>";

                          }


                        ?>
                          

                        </h4>
                      
                      
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-3">
                      <h3 class="estiloTicket2">Estado</h3>
                      <h4 class="estiloDatosTicket">
                        <?php 
                        
                          if ($estado == 0) {

                            echo "<span class='label label-success'>Abierto</span>";
                            
                          }else {

                            echo "<span class='label label-danger'>Cerrado</span>";

                          }


                        ?>
                        </h4>
                    </div>
                  </div>
                  <div class="row">
                   
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <h3 class="estiloTicket2">Serie Pedido</h3>
                       <h4 class="estiloDatosTicket"><?php echo $seriePedido?></h4>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <h3 class="estiloTicket2">Folio Pedido</h3>
                       <h4 class="estiloDatosTicket"><?php echo $folioPedido?></h4>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <h3 class="estiloTicket2">Serie Factura</h3>
                       <h4 class="estiloDatosTicket"><?php echo $serieFactura?></h4>
                       <input type="hidden" id="serieFacturaCancelacion" value="<?php echo $serieFactura?>">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <h3 class="estiloTicket2">Folio Factura</h3>
                       <h4 class="estiloDatosTicket"><?php echo $folioFactura?></h4>
                       <input type="hidden" id="folioFacturaCancelacion" value="<?php echo $folioFactura?>">
                    </div>
                  </div>
                  
                </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 conversacionEdicion">
                  <div class="direct-chat-messages">

             
                    <?php

                      echo '<div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">'.$autor.'</span>
                        <span class="direct-chat-timestamp pull-right">'.$fechaTicket.'</span>
                      </div>
              
                      <img class="direct-chat-img" src="vistas/dist/img/user.png" alt="message user image">
                  
                      <div class="direct-chat-text">
                        '.$contenidoTicket.'
                      </div>
        
                    </div>';


                      $item = 'idTicket';
                      $valor = $idTicket;
                      $verComentariosTicket = ControladorTickets::ctrMostrarComentariosTicket($item, $valor);
                      echo "<input type='hidden' id='motivoCancelacionFactura' value='".$contenidoTicket."'>";
                      foreach ($verComentariosTicket as $key => $value) {
                          

                          echo '<div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">'.$value["nombre"].'</span>
                        <span class="direct-chat-timestamp pull-right">'.$value["fecha"].'</span>
                      </div>
              
                      <img class="direct-chat-img" src="vistas/dist/img/user.png" alt="message user image">
                  
                      <div class="direct-chat-text">
                        '.$value["contenido"].'
                      </div>
        
                    </div>';


                      }

                    ?>
                   
  
                  </div>  
                </div>
                 <div class="col-lg-12 col-md-12 col-sm-12" style="background: #ccc">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>Archivos Adjuntos:</h3>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6"   style='padding-bottom:20px;'>
                     
                      <h4>Pedido:</h4>
                      <?php
                         if ($urlPedido != "") {

                                echo "<a href='".$urlPedido."' target='_blank'><span class='fa fa-file-pdf-o fa-3x'></span></a>";
                             
                           }else{


                           }
                      ?>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6"   style='padding-bottom:20px;'>
                      <h4>Factura:</h4>
                  <?php
                     if ($urlFactura != "") {

                            echo "<a href='".$urlFactura."'  target='_blank'><span class='fa fa-file-pdf-o fa-3x'></span></a>";
                         
                       }else{


                       }
                  ?>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>Otros Archivos Adjuntos:</h3>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">

                    <?php
                 
                      $directorio = opendir("tickets/pedidos/".$numeroTicket."/"); //ruta actual
                      while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                      {
                          if (is_dir($archivo))//verificamos si es o no un directorio
                          {
                             
                          }
                          else
                          {   
                            $nom = $archivo;
                            $tituloCreador = explode("-",$nom);
           
                            $titulo = $tituloCreador[0];
                            $fecha = str_replace(" ","/",$tituloCreador[1]);
                            $hora = str_replace(" ",":",$tituloCreador[2]);
              
                            $rutaDirectorio = "tickets/pedidos/".$numeroTicket."/".$archivo."/";
                            $directorio2 = opendir("tickets/pedidos/".$numeroTicket."/".$archivo."/"); //ruta actual
                            while ($archivo2 = readdir($directorio2)) //obtenemos un archivo y luego otro sucesivamente
                            {

                              if (is_dir($archivo2))//verificamos si es o no un directorio
                              {
                                 
                              }
                              else
                              {   

                                  $rutaFinal = $rutaDirectorio.$archivo2;
                                  echo "<div class='col-lg-4 col-md-4 col-sm-4'><strong style=''>".$titulo." ".$fecha." ".$hora."</strong><a href='".$rutaFinal."' target='_blank'><span class='fa fa-file-pdf-o fa-3x'><small style='font-size:15px'>".$archivo2."</small></span></a></div>";
                                  

                              }

                            }

                          }
                      }

                  ?>
                   
                  </div>
 
                </div>
                <br>
            
            
                <div class="col-lg-12 col-md-12 col-sm-12 respondewhiteicion">
                  <h3>Responder</h3>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 contenidoRespuestaEdicion">
                  <form name="form1" id="form1" method="post" action="ajax/cargaArchivosTicket.ajax.php" enctype="multipart/form-data">
                          
                          <h4 class="text-center">Adjuntar Multiples Archivos</h4>
                          
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Archivos</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="" onchange="return filesValidation()" required>
                              <input type="hidden" name="numTicket" id="numTicket" value="<?php echo $numeroTicket ?>">
                              <input type="hidden" name="rutaTicket" id="rutaTicket" value="<?php echo $url ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Cargar</button>
                          </div>
                          
                    </form>
                
                  <br>
                   <form role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                       <textarea class="form-control" name="respuestaTicket" id="respuestaTicket" rows="10" cols="100"></textarea>
                       <br>

                        <div class="col-lg-4 col-md-4 col-sm-4">

                          <?php

                            if ($estado == 1) {
                              
                                echo "<button class='btn btn-success' type='submit' disabled>Responder Ticket</button>";

                            }else {

                                echo "<button class='btn btn-success btnRespuestaTicket' type='submit' urlTicket = '".str_replace('dkmatrizz.ddns.net/','',$url)."'>Responder Ticket</button>";

                            }

                          ?>
                          
                        </div>
                       
                    </div>
  
                        <?php

                            $comentarTicket = new ControladorTickets();
                            $comentarTicket -> ctrRespuestaTicket();

                        ?>
                   </form>
                  <br>
                   <form role="form" method="post" enctype="multipart/form-data">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                       <div class="form-group">
                         <input type="hidden" name="idTicketElegido" id="idTicketElegido">
                      <?php

                         if ($departamentoAsignado == $_SESSION["departamento"]) {
                          echo ' <span style="font-weight: bold">Reasignar ticket a:</span>';
                          echo '<select class="form-control" id="reasignarDepartamento" name="reasignarDepartamento" required>
                            <option value="">Elegir Departamento</option>';     
                          echo'</select>';

                         }

                      ?>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                       <div class="form-group">
                      <?php

                         if ($departamentoAsignado == $_SESSION["departamento"]) {
                          echo ' <span style="font-weight: bold">Elegir Usuario:</span>';
                          echo '<select class="form-control" id="reasignarDepartamentoUsuario" name="reasignarDepartamentoUsuario" required>
                            <option value="">Elegir Usuario</option>';     
                          echo'</select>';

                         }

                      ?>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <?php
                        if ($departamentoAsignado == $_SESSION["departamento"]) {


                          if ($estado == 0) {

                              echo "<button class='btn btn-info btnAprobarTicket'  idTicket = '".$idTicket."' urlTicket = '".str_replace('dkmatrizz.ddns.net/','',$url)."'>Aprobar Ticket</button>";

                              $aprobarTicket = new ControladorTickets();
                              $aprobarTicket -> ctrAprobarTicket();


                            
                          }else{

                              echo "<button class='btn btn-info btnAprobarTicket'  idTicket = '".$idTicket."' disabled>Aprobar Ticket</button>";

                            

                          }
                          
                            
                        }else{

                            echo "";

                        }
                      ?>
                      
                    </div>

                   </form>
                 
                  <br>
                  <div class="botoneraTicket">
                   
                      <div class="col-lg-4 col-md-4 col-sm-4">
                      <?php
                        if ($departamentoAsignado == $_SESSION["departamento"] || $idAutor == $_SESSION["id"]) {


                          if ($estado == 0) {

                              
                              echo "<button class='btn btn-warning btnCerrarTicket' urlTicket = '".str_replace('dkmatrizz.ddns.net/','',$url)."' idNumeroTicket = '".$idTicket."'>Cerrar Ticket</button>";

                              $cerrarTicket = new ControladorTickets();
                              $cerrarTicket -> ctrCerrarTicket();

                            
                          }else{

               
                              echo "<button class='btn btn-warning btnCerrarTicket' urlTicket = '".str_replace('dkmatrizz.ddns.net/','',$url)."' idNumeroTicket = '".$idTicket."' disabled>Cerrar Ticket</button>";

                          }
                          
                            
                        }else{

                            echo "";

                        }
                      ?>
                      
                    </div>
                    
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




<!--============================================
  VENTANA MODAL DE TICKETS
=============================================-->
<!--============================================
=============================================-->
<script>
  window.onload = function() {
  var idUltimoTicket = localStorage.getItem('idTicketE');
  
  $("#idTicketElegido").val(idUltimoTicket);
};
</script>
<script type="text/javascript">
  //ACCIONES PARA TABS PILLS VERTICALES TICKETS SOPORTE
  function reedireccionar(){

    location.href = "generadorTickets";

  }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

function filesValidation(){
    var fileInput = document.getElementById('archivo[]');
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


//

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