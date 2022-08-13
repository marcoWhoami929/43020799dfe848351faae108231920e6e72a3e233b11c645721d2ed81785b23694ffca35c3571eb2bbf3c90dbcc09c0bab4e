<?php
session_start();
error_reporting(0);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaDepositosBanco{

	public function mostrarTablas(){	
    
	$item = "fechaFactura";
    if($_GET["fechaCobro"] != "") {

        $valor = $_GET["fechaCobro"];

    }

    $usuario = $_GET["sucursal"];
    $item2 = "concepto";
    switch ($usuario) {
      case 'Sucursal San Manuel':

        $valor2 = "'FACTURA SAN MANUEL V 3.3','Factura San Manuel'";

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
      case 'Mayoreo':

        $valor2 = "'FACTURA MAYOREO V 3.3','Factura Mayoreo'";

        break;
      case 'Industrial':

        $valor2 = "'FACTURA INDUSTRIAL V 3.3','Factura Industrial'";

        break;
      case 'Rutas':

        $valor2 = "ALL";
        
        break;
      case 'Sucursal Acatepec':

        $valor2 = "'FACTURA ACATEPEC V 3.3','Factura Acatepec'";

        break;
    }

 	$depositarBanco = ControladorFacturasTiendas::ctrMostrarEfectivoADepositarBanco($item, $valor,$item2,$valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($depositarBanco); $i++){

      $punteroAnterior = $i - 1;
      $punteroActual = $i;
      $punteroSiguiente = $i + 1;

      if ($depositarBanco[$punteroActual]["nombreCliente"] == $depositarBanco[$punteroSiguiente]["nombreCliente"]) {

        $nombreCliente = "";
        $efectivo = "";
        
      }else if ($depositarBanco[$punteroActual]["nombreCliente"] == $depositarBanco[$punteroAnterior]["nombreCliente"]) {

        $nombreCliente = $depositarBanco[$i]["nombreCliente"];
        $efectivo = $depositarBanco[$punteroAnterior]["efectivo"] + $depositarBanco[$i]["efectivo"];
        
      }else{

        $nombreCliente = $depositarBanco[$i]["nombreCliente"];
        $efectivo = $depositarBanco[$i]["efectivo"];

      }


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			if ($nombreCliente == "") {
        
      }else{

        $datosJson   .= '[
  
                  "'.rtrim($nombreCliente).'",
                  "$ '.number_format($efectivo,2).'"],';

      }
			

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE DEPOSITOS EN EFECTIVO EN BANCO
=============================================*/ 
$activar = new TablaDepositosBanco();
$activar -> mostrarTablas();
