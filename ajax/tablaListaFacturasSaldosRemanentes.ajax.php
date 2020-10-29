<?php
error_reporting(0);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaAjusteSaldosRemanentes{

	public function mostrarTablas(){	
   
    $datos =  array('valorAjuste' => $_GET["valorAjuste"],
                    'fechaInicioAjuste' => $_GET["fechaInicioAjuste"],
                    'fechaFinAjuste' => $_GET["fechaFinAjuste"],
                    'concepto' => $_GET["concepto"]);
    

 		$facturasAjusteRemanentes = ControladorFacturasTiendas::ctrMostrarFacturasConRemanentes($datos);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturasAjusteRemanentes); $i++){


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
                  "'.$facturasAjusteRemanentes[$i]["serie"].'",
                  "'.$facturasAjusteRemanentes[$i]["folio"].'",
                  "'.$facturasAjusteRemanentes[$i]["fechaFactura"].'",
                  "'.$facturasAjusteRemanentes[$i]["nombreCliente"].'",
                  "$ '.number_format($facturasAjusteRemanentes[$i]["pendiente"],2).'",
                  "'.$facturasAjusteRemanentes[$i]["idMovimientoBanco"].'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE AJUSTE DE SALDOS DE REMANENTES
=============================================*/ 
$activar = new TablaAjusteSaldosRemanentes();
$activar -> mostrarTablas();



