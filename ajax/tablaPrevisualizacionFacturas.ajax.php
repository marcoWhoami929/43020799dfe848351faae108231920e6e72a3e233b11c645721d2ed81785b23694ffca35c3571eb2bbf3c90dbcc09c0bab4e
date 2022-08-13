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
        //$fechaFinal = '2021-05-25';
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

        $valor2 =  "'FACTURA SAN MANUEL V 3.3','Factura San Manuel'";

        break;
      case 'Sucursal Capu':

        $valor2 = "'FACTURA CAPU V 3.3','Factura Capu'";

        break;
      case 'Sucursal Reforma':

        $valor2 = "'FACTURA REFORMA V 3.3','Factura Reforma'";

        break;
      case 'Sucursal Las Torres':

        $valor2 = "'FACTURA TORRES','Factura Torres'";

        break;
      case 'Sucursal Santiago':

        $valor2 = "'FACTURA SANTIAGO V 3.3','Factura Santiago'";

        break;
      case 'Sucursal Acatepec':

        $valor2 = "'FACTURA ACATEPEC V 3.3','Factura Acatepec'";

        break;
    
    }
    $item3 = "fechaFactura";
    if($_GET["fechaFin"] != "") {

        $valor3 = $_GET["fechaFin"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        //$fechaFinal = '2021-05-25';
        $valor3 = $fechaFinal;

    }
 		$facturacionTiendas = ControladorFacturasTiendas::ctrMostrarFacturasCorte($item, $valor,$item2,$valor2,$item3,$valor3);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturacionTiendas); $i++){

  
      $formaPago = "<select class='form-control formasPagoFacturas' style='width:200px' name='pay' id='pay".$facturacionTiendas[$i]["id"]."'><option value='".$facturacionTiendas[$i]["formaPago"]."'>".$facturacionTiendas[$i]["formaPago"]."</option><option value='CHEQUE NOMINATIVO'>CHEQUE NOMINATIVO</option><option value='CREDITO'>CREDITO</option><option value='EFECTIVO'>EFECTIVO</option><option value='POR DEFINIR'>POR DEFINIR</option><option value='TARJETA DE CRÉDITO'>TARJETA DE CRÉDITO</option><option value='TARJETA DE DÉBITO'>TARJETA DE DÉBITO</option><option value='TRANSFERENCIA ELECTRÓNICA DE FONDOS'>TRANSFERENCIA ELECTRÓNICA DE FONDOS</option></select><button type='button' class='btn btn-success btnActualizarFormaPago' idFactura = '".$facturacionTiendas[$i]["id"]."'><i class='fa fa-send'></i></button>";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturacionTiendas[$i]["id"].'",
                  "'.$facturacionTiendas[$i]["fechaFactura"].'",
                  "'.$facturacionTiendas[$i]["serie"].'",
                  "'.$facturacionTiendas[$i]["folio"].'",
                  "'.$formaPago.'",
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



