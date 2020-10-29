<?php
error_reporting(0);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaVentasTiendas{

	public function mostrarTablas(){	
   
		
    if($_GET["fechaVenta"] != "") {
        $item = "fechaFactura";
        $valor = $_GET["fechaVenta"];

    }else{

        
        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        
        
        $item = "fechaFactura";
        $valor = $fechaFinal;

    }
    $item2 = "concepto";
    if ($_GET["sucursalVenta"] != "") {
        $usuario = $_GET["sucursalVenta"];
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

 		$ventasTiendas = ControladorFacturasTiendas::ctrMostrarVentasDiarioTiendas($item, $valor,$item2, $valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($ventasTiendas); $i++){
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				    
                  "<strong>'.$ventasTiendas[$i]["nombreCliente"].'</strong>",
                  "<strong>$</strong> '.number_format($ventasTiendas[$i]["importe"],2).'",
                  "<strong>$</strong> '.number_format($ventasTiendas[$i]["impuesto"],2).'",
                  "<strong>$</strong> '.number_format($ventasTiendas[$i]["totalDocumento"],2).'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE facturacion
=============================================*/ 
$activar = new TablaVentasTiendas();
$activar -> mostrarTablas();



