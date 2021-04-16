<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaFacturasCrm{

	public function mostrarTablas(){	
    
		$item = "fechaFactura";
    if($_GET["fecha"] != "") {

        $valor = $_GET["fecha"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        $valor = $fechaFinal;



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
        default:

        $valor2 = "ALL";
        break;
    }

    $item3 = "fechaFactura";
    if($_GET["fechaFin"] != "") {

        $valor3 = $_GET["fechaFin"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        $valor3 = $fechaFinal;

    }
 		$facturasCrm = ControladorFacturasTiendas::ctrMostrarFacturasCrm($item, $valor,$item2,$valor2,$item3,$valor3);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturasCrm); $i++){

      $acciones = "<button type='button' class='btn btn-warning btnGenerarVentaDirecta' idFactura = '".$facturasCrm[$i]["id"]."' fechaFactura = '".$facturasCrm[$i]["fechaFactura"]."' serie = '".$facturasCrm[$i]["serie"]."' folio = '".$facturasCrm[$i]["folio"]."' total = '".$facturasCrm[$i]["total"]."' observacionesComercial = '".$facturasCrm[$i]["observacionesComercial"]."' cliente = '".rtrim($facturasCrm[$i]["nombreCliente"])."'><i class='fa fa-ticket'></i>Venta Directa</button>";

 

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturasCrm[$i]["id"].'",
                  "'.$facturasCrm[$i]["serie"].'",
                  "'.$facturasCrm[$i]["folio"].'",
                  "'.$facturasCrm[$i]["observacionesComercial"].'",
                  "'.$facturasCrm[$i]["fechaFactura"].'",
                  "'.$acciones.'",
                
                  "'.$facturasCrm[$i]["codigoCliente"].'",
                  "'.rtrim($facturasCrm[$i]["nombreCliente"]).'",

                  "$ '.number_format($facturasCrm[$i]["neto"],2).'",
                  "$ '.number_format($facturasCrm[$i]["impuesto"],2).'",
                  "$ '.number_format($facturasCrm[$i]["total"],2).'",
                  "'.$facturasCrm[$i]["formaPago"].'",
                  "'.$facturasCrm[$i]["agente"].'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE FACTURAS CRM
=============================================*/ 
$activar = new TablaFacturasCrm();
$activar -> mostrarTablas();



