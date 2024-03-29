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
        case 'Sucursal Acatepec':

        $valor2 = "Factura Acatepec";

        break;
          case 'Adrian Aguilera Rosete':

        $valor2 = "Factura San Manuel";

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

       if ($facturasCrm[$i]["vinculadoCrm"] == 1) {
        $acciones = "<button type='button' class='btn btn-success btnActivarVentaDirecta' idFactura = '" . $facturasCrm[$i]["id"] . "' serie = '" . $facturasCrm[$i]["serie"] . "' data-toggle='tooltip' data-placement='top' title='Volver a dar click si no realizó la vinculación en crm,para poder volver a elegirla'><i class='fa fa-ticket'></i>Vinculada</button>";
      } else {
        $acciones = "<button type='button' class='btn btn-warning btnGenerarVentaDirecta' idFactura = '" . $facturasCrm[$i]["id"] . "' fechaFactura = '" . $facturasCrm[$i]["fechaFactura"] . "' serie = '" . $facturasCrm[$i]["serie"] . "' folio = '" . $facturasCrm[$i]["folio"] . "' total = '" . $facturasCrm[$i]["total"] . "' observacionesComercial = '" . $facturasCrm[$i]["observacionesComercial"] . "' cliente = '" . rtrim($facturasCrm[$i]["nombreCliente"]) . "'><i class='fa fa-ticket'></i>Venta Directa</button>";
      }


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



