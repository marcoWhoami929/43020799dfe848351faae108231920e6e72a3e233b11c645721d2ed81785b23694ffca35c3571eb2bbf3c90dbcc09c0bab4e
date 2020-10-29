<?php
session_start();
require_once "../controladores/tickets.controlador.php";
require_once "../modelos/tickets.modelo.php";

class TablaTicketsCreados{

  public function mostrarTablas(){  
 
    $item = 'idAutor';
    $idAutor = $_SESSION["id"];
    $valor = $idAutor;

    $ticketsCreados = ControladorTickets::ctrVerListaTicketsCreados($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($ticketsCreados); $i++){

      if ($ticketsCreados[$i]["prioridad"] == 1) {
        
          $prioridad = "<span class='label label-danger'>Alta</span>";

      }else if ($ticketsCreados[$i]["prioridad"] == 2) {

          $prioridad = "<span class='label label-warning'>Media</span>";
        
      }else if ($ticketsCreados[$i]["prioridad"] == 3) {

          $prioridad = "<span class='label label-success'>Baja</span>";

      }

      if ($ticketsCreados[$i]["cerrado"] == 1) {
        
          $estadoTicket = "<span class='label label-danger'>Cerrado</span>";

      }else if ($ticketsCreados[$i]["cerrado"] == 0) {

          $estadoTicket = "<span class='label label-success'>Abierto</span>";
        
      }


      $ver = "<button class='btn btnVerTicketCreado' idTicket3='".$ticketsCreados[$i]["idTicket"]."' data-toggle='modal' data-target='#modalVerTicketCreado'><i class='fa fa-eye'></i></button>";
      $folioTicket = "<strong><a href ='editarTicket?numeroTicket=".$ticketsCreados[$i]["numeroTicket"]."&idTicket=".$ticketsCreados[$i]["idTicket"]."' class='verDetalleTicket'>#000".$ticketsCreados[$i]["numeroTicket"]."</a></strong>";

      if ($ticketsCreados[$i]["estatus"] == 1) {

        $estatusTicket = "<div id='circleYellow'></div>";
        
      }else if ($ticketsCreados[$i]["estatus"] == 2) {

        $estatusTicket = "<div id='circleGreen'></div>";
        
      }else {

        $estatusTicket = "<div id='circleRed'></div>";
        
      }

      

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
            
              "'.$ver.'",
              "'.$folioTicket.'",
              "'.$estadoTicket.'",
              "'.$ticketsCreados[$i]["titulo"].'",
              "'.$prioridad.'",
              "'.$ticketsCreados[$i]["departamentoAutor"].'",
              "'.$ticketsCreados[$i]["autor"].'",
              "'.$ticketsCreados[$i]["fecha"].'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE TICKETS
=============================================*/ 
$activar = new TablaTicketsCreados();
$activar -> mostrarTablas();