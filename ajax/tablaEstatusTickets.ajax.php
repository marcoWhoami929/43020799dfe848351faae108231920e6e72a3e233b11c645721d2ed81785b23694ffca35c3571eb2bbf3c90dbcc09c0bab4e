<?php
session_start();

require_once "../controladores/tickets.controlador.php";
require_once "../modelos/tickets.modelo.php";

class TablaEstatusTickets{

  public function mostrarTablas(){  

    function seg_a_dhms($seg) {
                $dias = floor($seg / 86400);
                $horas = floor(($seg - ($dias * 86400)) / 3600);
                $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
                $segundos = $seg % 60;
                return "$dias dias,<br> $horas horas,<br> $minutos minutos,<br> $segundos segundos";
                }
 
    $item = null;
    $valor = null;

    $estatusTicket = ControladorTickets::ctrVerEstatusTicketsG($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($estatusTicket); $i++){

       if ($estatusTicket[$i]["prioridad"] == 1) {
        
          $prioridad = "<span class='label label-danger'>Alta</span>";

      }else if ($estatusTicket[$i]["prioridad"] == 2) {

          $prioridad = "<span class='label label-warning'>Media</span>";
        
      }else if ($estatusTicket[$i]["prioridad"] == 3) {

          $prioridad = "<span class='label label-success'>Baja</span>";

      }

      if ($estatusTicket[$i]["cerrado"] == 1) {
        
          $estadoTicket = "<span class='label label-danger'>Cerrado</span><br><span>Tiempo Proceso</span><br><span>".$datos = seg_a_dhms($estatusTicket[$i]['tiempoFinal'])."</span>";

      }else if ($estatusTicket[$i]["cerrado"] == 0) {

          $estadoTicket = "<span class='label label-success'>Abierto</span>";

        
      }
      $autor = $estatusTicket[$i]["autor"];

      /*OBTENER LA FECHA DE LA CREACION DE TICKET*/
      $fechaContacto = $estatusTicket[$i]["tiempoProceso"]; 

      $date = new DateTime($fechaContacto);
      $now = new DateTime();

      $fecha = $date->diff($now)->format("Hace %d dias,<br> %h horas<br> y %i minutos");
      /*OBTENER LA FECHA DE LA CREACION DE TICKET*/


      $numeroTicket = "<strong><a href ='editarTicket?numeroTicket=".$estatusTicket[$i]["numeroTicket"]."&idTicket=".$estatusTicket[$i]["idTicket"]."' class='verDetalleTicket'>#000".$estatusTicket[$i]["numeroTicket"]."</a></strong><br><div class='crono_wrapper'><h5>Creado Hace:</h5><p style='margin-top:-20px;font-size:12px'>".$fecha."</p></div>";

       $item = 'numeroTicket';
       $numeroTickets = $estatusTicket[$i]["numeroTicket"];
       $valor = $numeroTickets;

       $estatusTickets = ControladorTickets::ctrVerEstatusTickets($item, $valor);
       $final = "";
       $estatus = "";
       foreach ($estatusTickets as $key => $value) {
        if ($value["estatus"] == 0) {

          $estatusVisto = "<span id='circleReds'></span>";
          
        }else if ($value["estatus"] == 1) {
          
          $estatusVisto = "<span id='circleYellows'></span>";

        }else {

          $estatusVisto = "<span id='circleGreens'></span>";

        }
        

        $estatus .= "<li class='".$value['clase']."'>".$estatusVisto."".$value['departamentoAsignado']."<br><span style='font-weight: lighter;color: black;font-size: 10px;margin-top:-10px;'>".$value['usuarioDepartamento']."</span><br><span style='font-weight: lighter;color: black;font-size: 10px'>".$value['tiempoSecond']."</span><br></li>";

        $final = "<td style='height:120px'><div class='checkout-wrapp' style='margin-top:10px;margin-bottom:110px;'><ul class='checkout-bar'>".$estatus."</ul></div></td>";

        
       }


      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
              "'.$numeroTicket.'",
              "'.$autor.'",
              "'.$prioridad.'",
              "'.$estadoTicket.'",
              "'.$final.'"],';

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
$activar = new TablaEstatusTickets();
$activar -> mostrarTablas();