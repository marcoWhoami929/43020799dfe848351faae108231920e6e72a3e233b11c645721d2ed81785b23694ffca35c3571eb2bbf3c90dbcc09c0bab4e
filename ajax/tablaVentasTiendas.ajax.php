<?php
error_reporting(E_ALL);
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
        if ($_SESSION["nombre"] == "Diego Ávila") {
                                  
            $usuario = "Mayoreo";

          }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

            $usuario = "Rutas";

          }else if($_SESSION["nombre"] == "Aurora Fernandez"){

            $usuario = "Industrial";

          }else{

            $usuario = $_SESSION["nombre"];

          }
    }

    switch ($usuario) {

      case 'Sucursal San Manuel':

        $valor2 = "Factura San Manuel";

        break;
      case 'Sucursal Capu':

        $valor2 = "Factura Capu";

        break;
      case 'Sucursal Reforma':

        $valor2 = "Factura Reforma";

        break;
      case 'Sucursal Las Torres':

        $valor2 = "Factura Torres";

        break;
      case 'Sucursal Santiago':

        $valor2 = "Factura Santiago";

        break;
      case 'Mayoreo':

        $valor2 = "Factura Mayoreo";

        break;
      case 'Industrial':

        $valor2 = "Factura Industrial";

        break;
      case 'Rutas':

        $valor2 = "ALL";
        
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



