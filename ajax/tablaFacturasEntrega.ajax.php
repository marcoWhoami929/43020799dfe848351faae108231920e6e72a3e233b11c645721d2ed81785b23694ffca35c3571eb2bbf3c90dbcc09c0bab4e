<?php
error_reporting(0);

require_once "../controladores/entregas.controlador.php";
require_once "../modelos/entregas.modelo.php";

class TablaFacturasEntrega{

  public function mostrarTablas(){  
    
    $item = "idEntrega";
    $valor = $_GET["idEntrega"];
    $facturas = ControladorEntregas::ctrMostrarFacturasEntrega($item,$valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($facturas); $i++){

       
        if ($facturas[$i]["horaInicio"] == "00:00:00" and $facturas[$i]["horaTermino"] == "00:00:00") {
          $acciones = "<button type='button' class='btn btn-info btnActualizarFechaEntrega' idFactura='".$facturas[$i]["id"]."' idEntrega = '".$facturas[$i]["idEntrega"]."'><i class='fa fa-send'></i></button>";


          $inicio  = "<input type='time' value='08:00:00' max='23:59:00' min='07:00:00' step='1' class='form-control input-lg' name='horaInicio".$facturas[$i]["id"]."' id='horaInicio".$facturas[$i]["id"]."'>";

          $final  = "<input type='time' value='08:00:00' max='23:59:00' min='07:00:00' step='1' class='form-control input-lg' name='horaFinal".$facturas[$i]["id"]."' id='horaFinal".$facturas[$i]["id"]."'>";

        }else{
          $acciones = "<button type='button' class='btn btn-warning btnActualizarFechaEntrega' idFactura='".$facturas[$i]["id"]."' disabled ><i class='fa fa-send'></i></button>";


             $inicio  = "<input type='time' value='".$facturas[$i]["horaInicio"]."'  class='form-control input-lg' name='horaInicio".$facturas[$i]["id"]."' id='horaInicio".$facturas[$i]["id"]."' readonly>";

            $final  = "<input type='time' value='".$facturas[$i]["horaTermino"]."' class='form-control input-lg' name='horaFinal".$facturas[$i]["id"]."' id='horaFinal".$facturas[$i]["id"]."' readonly>";

        }
        
     
 
            
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$facturas[$i]["serie"].'",
              "'.$facturas[$i]["folio"].'",
              "'.$facturas[$i]["nombreCliente"].'",
              "'.$inicio.'",
             "'.$final.'",
              "'.$acciones.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE ENTREGAS
=============================================*/ 
$activar = new TablaFacturasEntrega();
$activar -> mostrarTablas();