<?php
error_reporting(0);
require_once "../controladores/controlMuestras.controlador.php";
require_once "../modelos/controlMuestras.modelo.php";

class TablaPromociones{

 	/*=============================================
  	MOSTRAR LA TABLA DE PROMOCIONES
  	=============================================*/ 

	public function mostrarTablas(){	
		
		$item = null;
 		$valor = null;

 		$Promociones = ControladorControlMuestras::ctrMostrarPromociones($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($Promociones); $i++){

	 		$img = "<img class='img-thumbnail imgPortadaCategorias' src='".$Promociones[$i]["imagen"]."' width='100px'>";
	 		$editar = "<button class='btn btn-warning btnEditarPromociones' idPromocion='".$Promociones[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPromociones'><i class='fa fa-pencil'></i></button>";
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      
				      "'.$Promociones[$i]["id"].'",
				      "'.$Promociones[$i]["descripcion"].'",
				      "'.$img.'",
				      "'.$editar.'"
				       ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}



}

/*=============================================
ACTIVAR TABLA DE PROMOCIONES
=============================================*/ 
$activar = new TablaPromociones();
$activar -> mostrarTablas();



