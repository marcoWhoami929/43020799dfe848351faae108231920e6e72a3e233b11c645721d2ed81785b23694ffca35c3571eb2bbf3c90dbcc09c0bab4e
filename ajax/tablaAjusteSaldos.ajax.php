<?php
error_reporting(0);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaAjusteSaldos{

	public function mostrarTablas(){	
   
    $item = null;
    $valor = null;

 		$facturasSaldosPendientes = ControladorFacturasTiendas::ctrMostrarListaAjustesRealizados($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturasSaldosPendientes); $i++){

      $rutaArchivo = $facturasSaldosPendientes[$i]['rutaArchivo'];

      $pdf = "<button class='btn btn-success btnEmitirReciboAjuste' folioAjuste = '".$facturasSaldosPendientes[$i]["folioAjuste"]."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button>";
     
      $reporte = "<button type='button' class='btn btn-info btnDownloadAjuste' rutaArchivo = '".$rutaArchivo."'><i class='fa fa-file-text' aria-hidden='true'></i></button>&nbsp;&nbsp;".$pdf."";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturasSaldosPendientes[$i]["id"].'",
                  "'.$facturasSaldosPendientes[$i]["serieAjuste"].'",
                  "'.$facturasSaldosPendientes[$i]["folioAjuste"].'",
                  "$ '.number_format($facturasSaldosPendientes[$i]["saldoAjustado"],2).'",
                  "'.$facturasSaldosPendientes[$i]["ajustador"].'",
                  "'.$facturasSaldosPendientes[$i]["fechaAjuste"].'",
                  "'.$reporte.'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE AJUSTE DE SALDOS
=============================================*/ 
$activar = new TablaAjusteSaldos();
$activar -> mostrarTablas();



