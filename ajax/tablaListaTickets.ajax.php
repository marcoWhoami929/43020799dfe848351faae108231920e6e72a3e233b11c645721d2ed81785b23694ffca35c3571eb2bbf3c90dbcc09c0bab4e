<?php
session_start();
require_once "../controladores/tickets.controlador.php";
require_once "../modelos/tickets.modelo.php";

class TablaTickets{

  public function mostrarTablas(){  
 
    $item = 'usuarioDepartamento';
    $idDepartamento = $_SESSION["id"];
    $valor = $idDepartamento;

    $ticket = ControladorTickets::ctrVerListaTickets($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($ticket); $i++){

      if ($ticket[$i]["prioridad"] == 1) {
        
          $prioridad = "<span class='label label-danger'>Alta</span>";

      }else if ($ticket[$i]["prioridad"] == 2) {

          $prioridad = "<span class='label label-warning'>Media</span>";
        
      }else if ($ticket[$i]["prioridad"] == 3) {

          $prioridad = "<span class='label label-success'>Baja</span>";

      }

      if ($ticket[$i]["cerrado"] == 1) {
        
          $estadoTicket = "<span class='label label-danger'>Cerrado</span>";

      }else if ($ticket[$i]["cerrado"] == 0) {

          $estadoTicket = "<span class='label label-success'>Abierto</span>";
        
      }


      $ver = "<button class='btn btnVerTicket' idTicket='".$ticket[$i]["idTicket"]."' data-toggle='modal' data-target='#modalVerTicket'><i class='fa fa-eye'></i></button>";
      $folioTicket = "<strong><button class='btn btn verDetalleTicketBtn' idB='".$ticket[$i]["id"]."' style='background:transparent;'><a href ='editarTicket?numeroTicket=".$ticket[$i]["numeroTicket"]."&idTicket=".$ticket[$i]["idTicket"]."' class='verDetalleTicket'>#000".$ticket[$i]["numeroTicket"]."</a></button></strong>";

       /******VALIDAR SI LA SOLICITUD HA SIDO VISTA POR EL AGENTE DE VENTA ****/
      if ($ticket[$i]["estatus"] != 0) {
          $visto = "<div class='btn-group'><button class='btn btn-info btnVistoTicket' idVisto='".$ticket[$i]["id"]."' visto='0' disabled><i class='fa fa-check'></i></button></div>";
      }else{
          $visto = "<div class='btn-group'><button class='btn btn-warning btnVisto' idVisto='".$ticket[$i]["id"]."' visto='1' folioTicket='".$ticket[$i]["numeroTicket"]."' autorTicket='".$ticket[$i]["idAutor"]."'><i class='fa fa-check'></i></button></div>";
      }

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
              "'.$visto.'",
              "'.$ver.'",
              "'.$folioTicket.'",
              "'.$estadoTicket.'",
              "'.$ticket[$i]["titulo"].'",
              "'.$prioridad.'",
              "'.$ticket[$i]["departamentoAutor"].'",
              "'.$ticket[$i]["autor"].'",
              "'.$ticket[$i]["fecha"].'"],';

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
$activar = new TablaTickets();
$activar -> mostrarTablas();