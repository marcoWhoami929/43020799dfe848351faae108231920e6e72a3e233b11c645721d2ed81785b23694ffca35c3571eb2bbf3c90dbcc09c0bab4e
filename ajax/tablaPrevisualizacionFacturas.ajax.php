<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaPrevisualizacionFacturasTiendas{

	public function mostrarTablas(){	
    
		$item = "fechaFactura";
    if($_GET["fecha"] != "") {

        $valor = $_GET["fecha"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        $valor = '2021-01-22';



    }
    $item2 = "concepto";
    
    if($_GET["sucursal"] != ""){

      $usuario = $_GET["sucursal"];

    }else{

        $usuario = $_SESSION["nombre"];
    }
    
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
    $item3 = "fechaFactura";
    if($_GET["fechaFin"] != "") {

        $valor3 = $_GET["fechaFin"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        $valor3 = '2021-01-22';

    }
 		$facturacionTiendas = ControladorFacturasTiendas::ctrMostrarFacturasCorte($item, $valor,$item2,$valor2,$item3,$valor3);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturacionTiendas); $i++){

  


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturacionTiendas[$i]["id"].'",
                  "'.$facturacionTiendas[$i]["fechaFactura"].'",
                  "'.$facturacionTiendas[$i]["serie"].'",
                  "'.$facturacionTiendas[$i]["folio"].'",
                  "'.$facturacionTiendas[$i]["formaPago"].'",
                  "'.$facturacionTiendas[$i]["codigoCliente"].'",
                  "'.$facturacionTiendas[$i]["rfc"].'",
                  "'.rtrim($facturacionTiendas[$i]["nombreCliente"]).'",
                  "'.$facturacionTiendas[$i]["fechaVencimiento"].'",
				          "'.$facturacionTiendas[$i]["diasCredito"].'",
                  "$ '.number_format($facturacionTiendas[$i]["neto"],2).'",
                  "$ '.number_format($facturacionTiendas[$i]["descuento"],2).'",
                  "$ '.number_format($facturacionTiendas[$i]["impuesto"],2).'",
                  "$ '.number_format($facturacionTiendas[$i]["total"],2).'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE PREVISUALIZACION
=============================================*/ 
$activar = new TablaPrevisualizacionFacturasTiendas();
$activar -> mostrarTablas();



