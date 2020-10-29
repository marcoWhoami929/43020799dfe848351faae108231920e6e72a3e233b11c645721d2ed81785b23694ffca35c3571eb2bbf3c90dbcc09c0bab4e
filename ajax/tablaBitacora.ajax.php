<?php
error_reporting(0);
require_once "../controladores/bitacora.controlador.php";
require_once "../modelos/bitacora.modelo.php";

class TablaBitacora{

 	/*=============================================
  	MOSTRAR LA TABLA DE BITACORA
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
 		$valor = null;

 		$bitacora = ControladorBitacora::ctrMostrarBitacora($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($bitacora); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$bitacora[$i]["usuario"].'",
				      "'.$bitacora[$i]["perfil"].'",
				      "'.$bitacora[$i]["accion"].'",
				      "'.$bitacora[$i]["folio"].'",
				      "'.$bitacora[$i]["fecha"].'"],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE BITACORA
=============================================*/ 
$activar = new Tablabitacora();
$activar -> mostrarTablas();



