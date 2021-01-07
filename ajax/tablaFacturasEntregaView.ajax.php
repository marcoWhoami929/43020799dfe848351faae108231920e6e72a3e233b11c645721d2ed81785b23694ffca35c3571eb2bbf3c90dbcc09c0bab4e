<?php
error_reporting(0);

require_once "../controladores/entregas.controlador.php";
require_once "../modelos/entregas.modelo.php";

class TablaFacturasEntregaView{

  public function mostrarTablas(){  
    
    $item = "idEntrega";
    $valor = $_GET["idEntregaDetalle"];
    $facturas = ControladorEntregas::ctrMostrarFacturasEntrega($item,$valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($facturas); $i++){

       
          $inicio  = "<input type='time' value='".$facturas[$i]["horaInicio"]."'  class='form-control input-lg' name='horaInicio".$facturas[$i]["id"]."' id='horaInicio".$facturas[$i]["id"]."' readonly>";

            $final  = "<input type='time' value='".$facturas[$i]["horaTermino"]."' class='form-control input-lg' name='horaFinal".$facturas[$i]["id"]."' id='horaFinal".$facturas[$i]["id"]."' readonly>";
        
     
 
      $porcGasto =   $facturas[$i]["porcGasto"]*100;    
      $promedio =   $facturas[$i]["promedio"];
      $utilidad =    $facturas[$i]["utilidad"]; 
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$facturas[$i]["serie"].'",
              "'.$facturas[$i]["folio"].'",
              "'.$facturas[$i]["nombreCliente"].'",
              "$'.number_format($facturas[$i]["total"],2).'",
              "'.$inicio.'",
              "'.$final.'",
              "'.$facturas[$i]["horas"].'",
               "$'.number_format($facturas[$i]["costoHora"],2).'",
               "$'.number_format($facturas[$i]["subtotal"],2).'",
               "'.$porcGasto.'%",
               "'.$promedio.'%",
               "'.$utilidad.'%"],';

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
$activar = new TablaFacturasEntregaView();
$activar -> mostrarTablas();