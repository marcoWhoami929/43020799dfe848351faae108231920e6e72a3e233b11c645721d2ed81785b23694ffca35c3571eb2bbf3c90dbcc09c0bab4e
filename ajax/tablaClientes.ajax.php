<?php
error_reporting(0);
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class TablaClientes{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
 		$valor = null;

 		$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($clientes); $i++){

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/


	  			if($clientes[$i]["statusCliente"] == "activado"){
	  					  $estadoCliente = "desactivado";

                          $estado = "<button class='btn btn-success btn-xs btnActivar' idCliente='".$clientes[$i]["id"]."' estadoCliente='".$estadoCliente."'>Activado</button>";

                        }else{

                          $estadoCliente = "activado";	

                          $estado = "<button class='btn btn-danger btn-xs btnActivar' idCliente='".$clientes[$i]["id"]."' estadoCliente='".$estadoCliente."'>Desactivado</button>";

                        } 

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$clientes[$i]["codigoCliente"].'",
				      "'.$clientes[$i]["rfc"].'",
				      "'.$clientes[$i]["nombreCliente"].'",
				      "'.$clientes[$i]["agenteVentas"].'",
				      "'.$clientes[$i]["agenteCobro"].'",
				      "'.number_format($clientes[$i]["limiteCredito"],2).'",
				      "'.$clientes[$i]["diasCredito"].'",
				      "'.$clientes[$i]["segmento"].'",
				      "'.$estado.'",
				      "'.$clientes[$i]["descuentoDocumento"].'",
				      "'.$clientes[$i]["descuentoMovimiento"].'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE CLIENTES
=============================================*/ 
$activar = new TablaClientes();
$activar -> mostrarTablas();



