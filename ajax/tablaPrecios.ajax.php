<?php
session_start();
error_reporting(E_ALL);
require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";

class TablaPrecios{

	public function mostrarTablas(){	
    /*=============================================
    MOSTRAR LA TABLA DE PRODUCTOS
    =============================================*/ 
    $codigoProducto = $_GET["codigo"];
		$item = 'codigo';
 		$valor = $codigoProducto;

 		$precios = ControladorCotizaciones::ctrMostrarProductos($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($precios); $i++){

       

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			

			$datosJson	 .= '[
              "Base",
              "'.$precios[$i]["base"].'"],
              [
              "Cubeta",
              "'.$precios[$i]["cubeta"].'"],
              [
              "Galón",
              "'.$precios[$i]["galon"].'"],
              [
              "Litro",
              "'.$precios[$i]["litro"].'"],
              [
              "500ml",
              "'.$precios[$i]["quiml"].'"],
              [
              "250ml",
              "'.$precios[$i]["dosml"].'"],
              [
              "125ml",
              "'.$precios[$i]["unoml"].'"],
              [
              "Distribuidor",
              "'.$precios[$i]["distribuidor"].'"],';

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
$activar = new TablaPrecios();
$activar -> mostrarTablas();
