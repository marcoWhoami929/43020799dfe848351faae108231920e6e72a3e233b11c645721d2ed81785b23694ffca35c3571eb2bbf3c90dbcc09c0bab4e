<?php
error_reporting(0);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaAbonosDocumentos{

	public function mostrarTablas(){	
   
    	$item = null;
    	$valor = null;

 		$abonos = ControladorFacturasTiendas::ctrMostrarAbonos($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($abonos); $i++){

    
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.($i+1).'",
                  		  "<strong>'.$abonos[$i]["serieAbono"].'</strong>",
                  		  "<strong>'.$abonos[$i]["id"].'</strong>",
                  		  "'.$abonos[$i]["idMovimientoBanco"].'",
                  		  "'.$abonos[$i]["serieFactura"].'",
                  		  "'.$abonos[$i]["folioFactura"].'",
                  		  "$ '.number_format($abonos[$i]["totalAbono"],2).'",
                  		  "$ '.number_format($abonos[$i]["pendienteFactura"],2).'",
                  		  "'.$abonos[$i]["fechaAbono"].'",
                  		  "'.$abonos[$i]["conceptoAbono"].'",
                  		  "'.$abonos[$i]["creadorAbono"].'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE ABONOS DE DOCUMENTOS
=============================================*/ 
$activar = new TablaAbonosDocumentos();
$activar -> mostrarTablas();



