<?php
session_start();
require_once "../controladores/tickets.controlador.php";
require_once "../modelos/tickets.modelo.php";

class TablaTicketsGenerales{

  public function mostrarTablas(){  
 
    $item = null;
    $valor = null;

    $ticketGeneral = ControladorTickets::ctrVerListaTickets($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($ticketGeneral); $i++){

      if ($ticketGeneral[$i]["prioridad"] == 1) {
        
          $prioridad = "<span class='label label-danger'>Alta</span>";

      }else if ($ticketGeneral[$i]["prioridad"] == 2) {

          $prioridad = "<span class='label label-warning'>Media</span>";
        
      }else if ($ticketGeneral[$i]["prioridad"] == 3) {

          $prioridad = "<span class='label label-success'>Baja</span>";

      }

      if ($ticketGeneral[$i]["cerrado"] == 1) {
        
          $estadoTicket = "<span class='label label-danger'>Cerrado</span>";

      }else if ($ticketGeneral[$i]["cerrado"] == 0) {

          $estadoTicket = "<span class='label label-success'>Abierto</span>";
        
      }


      $ver = "<button class='btn btnVerTicketGeneral' idTicket2='".$ticketGeneral[$i]["idTicket"]."' data-toggle='modal' data-target='#modalVerTicketGeneral'><i class='fa fa-eye'></i></button>";
      $folioTicket = "<strong><a href ='editarTicket?numeroTicket=".$ticketGeneral[$i]["numeroTicket"]."&idTicket=".$ticketGeneral[$i]["idTicket"]."' class='verDetalleTicket'>#000".$ticketGeneral[$i]["numeroTicket"]."</a></strong>";

      if ($ticketGeneral[$i]["estatus"] == 1) {

        $estatusTicket = "<div id='circleYellow'></div>";
        
      }else if ($ticketGeneral[$i]["estatus"] == 2) {

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
              "'.$ticketGeneral[$i]["titulo"].'",
              "'.$prioridad.'",
              "'.$ticketGeneral[$i]["departamentoAutor"].'",
              "'.$ticketGeneral[$i]["autor"].'",
              "'.$ticketGeneral[$i]["fecha"].'"],';

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
$activar = new TablaTicketsGenerales();
$activar -> mostrarTablas();