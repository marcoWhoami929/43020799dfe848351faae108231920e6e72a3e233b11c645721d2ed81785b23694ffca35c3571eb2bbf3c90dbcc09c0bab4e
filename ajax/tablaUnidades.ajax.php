<?php
session_start();
error_reporting(E_ALL);
require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";

class TablaUnidades{

	public function mostrarTablas(){	
    /*=============================================
    MOSTRAR LA TABLA DE PRODUCTOS
    =============================================*/ 
    $codigoProducto = $_GET["codigo"];
		$item = 'codigo';
 		$valor = $codigoProducto;

 		$unidades = ControladorCotizaciones::ctrMostrarProductos($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($unidades); $i++){
      $precioDistribuidor = $unidades[$i]["distribuidor"];
      $precioUnidad = $unidades[$i]["distribuidor"] / $unidades[$i]["valorMedida"];

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			

			$datosJson	 .= '[
              "'.$unidades[$i]["unidadMedida"].'",
              "'.$unidades[$i]["nombre"].'",
              "'.$precioDistribuidor.'"],
              [
              "'.$unidades[$i]["gramaje"].'",
              "'.$unidades[$i]["gramaje"].'",
              "'.$precioDistribuidor.'"],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE cotizaciones
=============================================*/ 
$activar = new TablaUnidades();
$activar -> mostrarTablas();
