<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaImportesVenta{

	public function mostrarTablas(){	
    
		$item = "fechaFactura";
	    if($_GET["fechaFactura"] != "") {

	        $valor = $_GET["fechaFactura"];

	    }
	    $item2 = "concepto";
	    $usuario = $_SESSION["nombre"];
 
	    switch ($usuario) {
	      case 'Sucursal San Manuel':

	        $valor2 = "FACTURA SAN MANUEL V 3.3";

	        break;
	      case 'Sucursal Capu':

	        $valor2 = "FACTURA CAPU V 3.3";

	        break;
	      case 'Sucursal Reforma':

	        $valor2 = "FACTURA REFORMA V 3.3";

	        break;
	      case 'Sucursal Las Torres':

	        $valor2 = "FACTURA TORRES";

	        break;
	      case 'Sucursal Santiago':

	        $valor2 = "FACTURA SANTIAGO V 3.3";

	        break;
	    }

 		$importesVenta = ControladorFacturasTiendas::ctrMostrarFacturasImporteVenta($item, $valor,$item2, $valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($importesVenta); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
                  "'.$importesVenta[$i]["fechaFactura"].'",
                  "'.$importesVenta[$i]["serie"].'",
                  "'.$importesVenta[$i]["folio"].'",
                  "'.rtrim($importesVenta[$i]["nombreCliente"]).'",
                  "$ '.number_format($importesVenta[$i]["total"],2).'",
                  "'.$importesVenta[$i]["formaPago"].'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE IMPORTES DE VENTA
=============================================*/ 
$activar = new TablaImportesVenta();
$activar -> mostrarTablas();
