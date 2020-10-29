<?php
error_reporting(0);
require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class TablaProveedores{

 	/*=============================================
  	MOSTRAR LA TABLA DE proveedores
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
 		$valor = null;

 		$proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($proveedores); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$proveedores[$i]["codigo"].'",
				      "'.$proveedores[$i]["rfc"].'",
				      "'.$proveedores[$i]["razonSocial"].'",
				      "'.$proveedores[$i]["fechaAlta"].'",
				      "'.$proveedores[$i]["limiteCredito"].'",
				      "'.$proveedores[$i]["diasCredito"].'",
				      "'.$proveedores[$i]["rfc2"].'",
				      "'.$proveedores[$i]["curp"].'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE PROVEEDORES
=============================================*/ 
$activar = new TablaProveedores();
$activar -> mostrarTablas();



