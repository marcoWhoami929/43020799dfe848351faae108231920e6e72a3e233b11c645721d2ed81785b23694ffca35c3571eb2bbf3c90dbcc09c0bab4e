<?php
error_reporting(E_ALL);
require_once "../controladores/prospectos.controlador.php";
require_once "../modelos/prospectos.modelo.php";

class TablaProspectos{

 	/*=============================================
  	MOSTRAR LA TABLA DE prospectos
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
 		$valor = null;

 		$prospectos = ControladorProspectos::ctrMostrarProspectos($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($prospectos); $i++){

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/


	  			
                      $fase = "Nuevo Prospecto";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "P000-'.$prospectos[$i]["codigoProspecto"].'",
				      "'.$prospectos[$i]["rfc"].'",
				      "'.$prospectos[$i]["nombreProspecto"].'",
				      "'.$fase.'",
				      "'.$prospectos[$i]["agenteContactado"].'",
				      "'.$prospectos[$i]["fechaIngreso"].'"
				     
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE prospectos
=============================================*/ 
$activar = new TablaProspectos();
$activar -> mostrarTablas();



