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
