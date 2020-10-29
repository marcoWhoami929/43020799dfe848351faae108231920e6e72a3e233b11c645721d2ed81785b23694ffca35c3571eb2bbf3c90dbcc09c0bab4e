<?php
error_reporting(E_ALL);
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class TablaProductos{

 	/*=============================================
  	MOSTRAR LA TABLA DE productos
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
 		$valor = null;

 		$productos = ControladorProductos::ctrMostrarProductos($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($productos); $i++){

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/


	  			if($productos[$i]["estatus"] == "1"){
	  					  

                          $estado = "<button class='btn btn-success btn-xs' idProducto='".$productos[$i]["id"]."'>Activado</button>";

                        }else{

                          

                          $estado = "<button class='btn btn-danger btn-xs' idProducto='".$productos[$i]["id"]."'>Desactivado</button>";

                        } 
                      

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.rtrim($productos[$i]["codigo"]).'",
				      "'.rtrim($productos[$i]["descripcion"]).'",
				      "'.$productos[$i]["catalogo"].'",
				      "'.$productos[$i]["base"].'",
				      "'.$productos[$i]["cubeta"].'",
				      "'.$productos[$i]["galon"].'",
				      "'.$productos[$i]["litro"].'",
				      "'.$productos[$i]["quiml"].'",
				      "'.$productos[$i]["dosml"].'",
				      "'.$productos[$i]["unoml"].'",
				      "'.$productos[$i]["distribuidor"].'",
				      "'.$estado.'",
				      "'.$productos[$i]["claveSat"].'",
				      "'.$productos[$i]["nombre"].'"
				     
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE productos
=============================================*/ 
$activar = new TablaProductos();
$activar -> mostrarTablas();



