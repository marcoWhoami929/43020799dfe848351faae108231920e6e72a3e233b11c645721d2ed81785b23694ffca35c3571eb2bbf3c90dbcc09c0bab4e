<?php
session_start();
error_reporting(E_ALL);
require_once "../controladores/acumuladoMensual.controlador.php";
require_once "../modelos/acumuladoMensual.modelo.php";

class TablareportAcumuladoMensual{

	public function mostrarTablas(){	
     /*=============================================
    MOSTRAR LA TABLA DE facturacion
    =============================================*/ 

    	if ($_GET["fechaInicio"] == "00") {

    		$item = 'fechaPedido';
    		$valor = '06';
    	}else{
    		$item = 'fechaPedido';
 			$valor = $_GET["fechaInicio"];
    	}
		


 		$acumRocio = ControladorreportAcumuladoMensual::ctrMostrarAcumRocio($item, $valor);
 		$acumLuis = ControladorreportAcumuladoMensual::ctrMostrarAcumLuis($item, $valor);
 		$acumErik = ControladorreportAcumuladoMensual::ctrMostrarAcumErik($item, $valor);
 		$acumOrlando = ControladorreportAcumuladoMensual::ctrMostrarAcumOrlando($item, $valor);
 		$acumJonathan = ControladorreportAcumuladoMensual::ctrMostrarAcumJonathan($item, $valor);
 		$acumAlfredo = ControladorreportAcumuladoMensual::ctrMostrarAcumAlfredo($item, $valor);
 		$acumArturo = ControladorreportAcumuladoMensual::ctrMostrarAcumArturo($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';
	 	foreach ($acumRocio as $key => $value) {
	 		foreach ($acumLuis as $key => $value2) {
	 			foreach ($acumErik as $key => $value3) {
	 				foreach ($acumOrlando as $key => $value4) {
	 					foreach ($acumJonathan as $key => $value5) {
	 						foreach ($acumAlfredo as $key => $value6) {
	 							foreach ($acumArturo as $key => $value7) {

	 					/***************************************/
	 					$agenteVentas = array(
			 			'agente1' => 'ROCIO MARTINEZ MORALES', 
			 			'agente2' => 'LUIS ENRIQUE BUSTOS MONTERD', 
			 			'agente3' => 'GOMEZ RODRIGUEZ ERICK',
			 			'agente4' => 'ORLANDO BRIONES AGUIRRE',
			 			'agente5' => 'JONATHAN GONZALEZ SANCHEZ',
			 			'agente6' => 'ALFREDO MENDOZA SEGURA',
			 			'agente7' => 'CASTOLO GALINDO ARTURO');
			 		$unidades = array(
			 			'agente1' => $value['unidades'],
			 			'agente2' => $value2['unidades'],
			 			'agente3' => $value3['unidades'],
			 			'agente4' => $value4['unidades'],
			 			'agente5' => $value5['unidades'],
			 			'agente6' => $value6['unidades'],
			 			'agente7' => $value7['unidades']);
			 		$importeInicial =  array(
			 			'agente1' => $value['importeInicial'],
			 			'agente2' => $value2['importeInicial'],
			 			'agente3' => $value3['importeInicial'], 
			 			'agente4' => $value4['importeInicial'],
			 			'agente5' => $value5['importeInicial'],
			 			'agente6' => $value6['importeInicial'],
			 			'agente7' => $value7['importeInicial']); 
			 		$unidSurt = array(
			 			'agente1' => $value['unidSurt'],
			 			'agente2' => $value2['unidSurt'],
			 			'agente3' => $value3['unidSurt'],
			 			'agente4' => $value4['unidSurt'],
			 			'agente5' => $value5['unidSurt'],
			 			'agente6' => $value6['unidSurt'],
			 			'agente7' => $value7['unidSurt']);
			 		$importSurt = array(
			 			'agente1' => $value['importSurt'],
			 			'agente2' => $value2['importSurt'],
			 			'agente3' => $value3['importSurt'],
			 			'agente4' => $value4['importSurt'],
			 			'agente5' => $value5['importSurt'],
			 			'agente6' => $value6['importSurt'],
			 			'agente7' => $value7['importSurt']);

			 		

			 		$partidasSurtidasMes = $unidades["agente1"] - $unidSurt["agente1"];
			 		$montosSurtidosMes = $importeInicial["agente1"] - $importSurt["agente1"];
					$partidasSurtidasMes2 = $unidades["agente2"] - $unidSurt["agente2"];
			 		$montosSurtidosMes2 = $importeInicial["agente2"] - $importSurt["agente2"];
			 		$partidasSurtidasMes3 = $unidades["agente3"] - $unidSurt["agente3"];
			 		$montosSurtidosMes3 = $importeInicial["agente3"] - $importSurt["agente3"];
			 		$partidasSurtidasMes4 = $unidades["agente4"] - $unidSurt["agente4"];
			 		$montosSurtidosMes4 = $importeInicial["agente4"] - $importSurt["agente4"];
			 		$partidasSurtidasMes5 = $unidades["agente5"] - $unidSurt["agente5"];
			 		$montosSurtidosMes5 = $importeInicial["agente5"] - $importSurt["agente5"];
			 		$partidasSurtidasMes6 = $unidades["agente6"] - $unidSurt["agente6"];
			 		$montosSurtidosMes6 = $importeInicial["agente6"] - $importSurt["agente6"];
			 		$partidasSurtidasMes7 = $unidades["agente7"] - $unidSurt["agente7"];
			 		$montosSurtidosMes7 = $importeInicial["agente7"] - $importSurt["agente7"];

			 		/*AQUI SE CALCULAN LOS PORCENTAJES */
			 		

					if ($importSurt["agente1"] == 0) {
			 			$porcentajes = "0.00";
			 		}else{
			 			$porcentajes = ($importSurt["agente1"] * 100 )/ $importeInicial["agente1"];
			 		}

			 		if ($importSurt["agente2"] == 0) {
			 			$porcentajes2 = "0.00";
			 		}else{
			 			$porcentajes2 = ($importSurt["agente2"] * 100 )/ $importeInicial["agente2"];
			 		}

			 		if ($importSurt["agente3"] == 0) {
			 			$porcentajes3 = "0.00";
			 		}else{
			 			$porcentajes3 = ($importSurt["agente3"] * 100 )/ $importeInicial["agente3"];
			 		}
			 		
			 		if ($importSurt["agente4"] == 0) {
			 			$porcentajes4 = "0.00";
			 		}else{
			 			$porcentajes4 = ($importSurt["agente4"] * 100 )/ $importeInicial["agente4"];
			 		}
			 		
			 		if ($importSurt["agente5"] == 0) {
			 			$porcentajes5 = "0.00";
			 		}else{
			 			$porcentajes5 = ($importSurt["agente5"] * 100 )/ $importeInicial["agente5"];
			 		}

			 		if ($importSurt["agente6"] == 0) {
			 			$porcentajes6 = "0.00";
			 		}else{
			 			$porcentajes6 = ($importSurt["agente6"] * 100 )/ $importeInicial["agente6"];
			 		}

			 		if ($importSurt["agente7"] == 0) {
			 			$porcentajes7 = "0.00";
			 		}else{
			 			$porcentajes7 = ($importSurt["agente7"] * 100 )/ $importeInicial["agente7"];
			 		}


			 		
			 		/* SUMAS DE ACUMULADOS*/

			 		$sumaUnidades = $unidades["agente1"] + $unidades["agente2"] + $unidades["agente3"];
			 		$sumaImportes = $importeInicial["agente1"] + $importeInicial["agente2"] + $importeInicial["agente3"];
			 		$sumaUnidSurt = $unidSurt["agente1"] + $unidSurt["agente2"] + $unidSurt["agente3"];
			 		$sumaImportSurt = $importSurt["agente1"] + $importSurt["agente2"] + $importSurt["agente3"];
			 		$sumaPartidasSurtidasMes = $partidasSurtidasMes + $partidasSurtidasMes2 + $partidasSurtidasMes3;
			 		$sumaMontosSurtidosMes = $montosSurtidosMes + $montosSurtidosMes2 + $montosSurtidosMes3;

					$sumaUnidadesCorp = $unidades["agente4"] + $unidades["agente5"] + $unidades["agente6"] + $unidades["agente7"];
			 		$sumaImportesCorp = $importeInicial["agente4"] + $importeInicial["agente5"] + $importeInicial["agente6"] + $importeInicial["agente7"];
			 		$sumaUnidSurtCorp = $unidSurt["agente4"] + $unidSurt["agente5"] + $unidSurt["agente6"] + $unidSurt["agente7"];
			 		$sumaImportSurtCorp = $importSurt["agente4"] + $importSurt["agente5"] + $importSurt["agente6"] + $importSurt["agente7"];
			 		$sumaPartidasSurtidasMesCorp = $partidasSurtidasMes4 + $partidasSurtidasMes5 + $partidasSurtidasMes6 + $partidasSurtidasMes7;
			 		$sumaMontosSurtidosMesCorp = $montosSurtidosMes4 + $montosSurtidosMes5 + $montosSurtidosMes6 + $montosSurtidosMes7;



			 		$sumaUnidadesTotal = $sumaUnidades + $sumaUnidadesCorp;
			 		$sumaImportesTotal = $sumaImportes + $sumaImportesCorp;
			 		$sumaUnidSurtTotal = $sumaUnidSurt + $sumaUnidSurtCorp;
			 		$sumaImportSurtTotal = $sumaImportSurt + $sumaImportSurtCorp;
			 		$sumaPartidasSurtidasMesTotal = $sumaPartidasSurtidasMes + $sumaPartidasSurtidasMesCorp;
			 		$sumaMontosSurtidosMesTotal = $sumaMontosSurtidosMes + $sumaMontosSurtidosMesCorp;


					if ($sumaImportSurtTotal == 0) {
			 			$porcentajesTotal = "0.00";
			 		}else{
			 			$porcentajesTotal = ($sumaImportSurtTotal * 100 )/ $sumaImportesTotal;
			 		}
			 		
			 		if ($sumaImportSurt == 0) {
			 			$porcentajesCedis = "0.00";
			 		}else{
			 			$porcentajesCedis = ($sumaImportSurt * 100 )/ $sumaImportes;
			 		}

			 		if ($sumaImportSurtCorp == 0) {
			 			$porcentajesCorp = "0.00";
			 		}else{
			 			$porcentajesCorp = ($sumaImportSurtCorp * 100 )/ $sumaImportesCorp;
			 		}

					/*INDICADORES*/
			 		if ($porcentajesCedis>95) {
			 			$indicadorCedis = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajesCedis<95 and $porcentajesCedis>90) {
			 			$indicadorCedis = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicadorCedis = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 		if ($porcentajes>95) {
			 			$indicador1 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajes<95 and $porcentajes>90) {
			 			$indicador1 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador1 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 		if ($porcentajes2>95) {
			 			$indicador2 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajes2<95 and $porcentajes2>90) {
			 			$indicador2 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador2 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 		if ($porcentajes3>95) {
			 			$indicador3 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajes3<95 and $porcentajes3>90) {
			 			$indicador3 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador3 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 		if ($porcentajesCorp>95) {
			 			$indicadorCorp = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajesCorp<95 and $porcentajesCorp>90) {
			 			$indicadorCorp = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicadorCorp = "<button type='button' class='btn btn-danger'></button>";
			 		}

					if ($porcentajes4>95) {
			 			$indicador4 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajes4<95 and $porcentajes4>90) {
			 			$indicador4 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador4 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 		if ($porcentajes5>95) {
			 			$indicador5 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajes5<95 and $porcentajes5>90) {
			 			$indicador5 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador5 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 		if ($porcentajes6>95) {
			 			$indicador6 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajes6<95 and $porcentajes6>90) {
			 			$indicador6 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador6 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 		if ($porcentajes7>95) {
			 			$indicador7 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajes7<95 and $porcentajes7>90) {
			 			$indicador7 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador7 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 		if ($porcentajesTotal>95) {
			 			$indicadorTotal = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajesTotal<95 and $porcentajesTotal>90) {
			 			$indicadorTotal = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicadorTotal = "<button type='button' class='btn btn-danger'></button>";
			 		}
			 		//echo '<button type="button" class="btn btn-success">Success</button>';
			 		/*=============================================
					DEVOLVER DATOS JSON
					=============================================*/
			
					$datosJson	 .= '
						[
						
		             	"CEDIS",
		             	"'.$sumaUnidades.'",
					 	"$ '.number_format($sumaImportes,2).'",
					 	"'.$sumaUnidSurt.'",
					 	"$ '.number_format($sumaImportSurt,2).'",
					 	"'.$sumaPartidasSurtidasMes.'",
					 	"$'.number_format($sumaMontosSurtidosMes,2).'",		      
		             	"'.number_format($porcentajesCedis,2).' %",
		             	"'.$indicadorCedis.'"],
		             	
						[
						
		             	"'.$agenteVentas['agente1'].'",
		             	"'.$unidades['agente1'].'",
					 	"$ '.number_format($importeInicial['agente1'],2).'",
					 	"'.$unidSurt['agente1'].'",
					 	"$ '.number_format($importSurt['agente1'],2).'",
					 	"'.$partidasSurtidasMes.'",
					 	"$'.number_format($montosSurtidosMes,2).'",
		             	"'.number_format($porcentajes,2).' %",
		             	"'.$indicador1.'"],
		             	[
						
		             	"'.$agenteVentas['agente2'].'",
		             	"'.$unidades['agente2'].'",
					 	"$ '.number_format($importeInicial['agente2'],2).'",
					 	"'.$unidSurt['agente2'].'",
					 	"$ '.number_format($importSurt['agente2'],2).'",
					 	"'.$partidasSurtidasMes2.'",
					 	"$ '.number_format($montosSurtidosMes2,2).'",
		             	"'.number_format($porcentajes2,2).' %",
		             	"'.$indicador2.'"],
		             	[
						
		             	"'.$agenteVentas['agente3'].'",
		             	"'.$unidades['agente3'].'",
					 	"$ '.number_format($importeInicial['agente3'],2).'",
					 	"'.$unidSurt['agente3'].'",
					 	"$ '.number_format($importSurt['agente3'],2).'",
					 	"'.$partidasSurtidasMes3.'",
					 	"$ '.number_format($montosSurtidosMes3,2).'",
		             	"'.number_format($porcentajes3,2).' %",
		             	"'.$indicador3.'"], 	

						[

		             	"CUENTAS CORPORATIVAS",
		             	"'.$sumaUnidadesCorp.'",
					 	"$ '.number_format($sumaImportesCorp,2).'",
					 	"'.$sumaUnidSurt.'",
					 	"$ '.number_format($sumaImportSurtCorp,2).'",
					 	"'.$sumaPartidasSurtidasMesCorp.'",
					 	"$'.number_format($sumaMontosSurtidosMesCorp,2).'",		      
		             	"'.number_format($porcentajesCorp,2).' %",
		             	"'.$indicadorCorp.'"], 

		             	[
						
		             	"'.$agenteVentas['agente4'].'",
		             	"'.$unidades['agente4'].'",
					 	"$ '.number_format($importeInicial['agente4'],2).'",
					 	" '.number_format($unidSurt['agente4'],2).'",
					 	"$ '.number_format($importSurt['agente4'],2).'",
					 	"'.$partidasSurtidasMes4.'",
					 	"$ '.number_format($montosSurtidosMes4,2).'",
		             	"'.number_format($porcentajes4,2).' %",
		             	"'.$indicador4.'"], 	


		             	[
						
		             	"'.$agenteVentas['agente5'].'",
		             	"'.$unidades['agente5'].'",
					 	"$ '.number_format($importeInicial['agente5'],2).'",
					 	" '.number_format($unidSurt['agente5'],2).'",
					 	"$ '.number_format($importSurt['agente5'],2).'",
					 	"'.$partidasSurtidasMes5.'",
					 	"$ '.number_format($montosSurtidosMes5,2).'",
		             	"'.number_format($porcentajes5,2).' %",
		             	"'.$indicador5.'"], 

		             	[
						
		             	"'.$agenteVentas['agente6'].'",
		             	"'.$unidades['agente6'].'",
					 	"$ '.number_format($importeInicial['agente6'],2).'",
					 	"'.$unidSurt['agente6'].'",
					 	"$ '.number_format($importSurt['agente6'],2).'",
					 	"'.$partidasSurtidasMes6.'",
					 	"$ '.number_format($montosSurtidosMes6,2).'",
		             	"'.number_format($porcentajes6,2).' %",
		             	"'.$indicador6.'"], 


		             	[
						
		             	"'.$agenteVentas['agente7'].'",
		             	"'.$unidades['agente7'].'",
					 	"$ '.number_format($importeInicial['agente7'],2).'",
					 	"'.$unidSurt['agente7'].'",
					 	"$ '.number_format($importSurt['agente7'],2).'",
					 	"'.$partidasSurtidasMes7.'",
					 	"$ '.number_format($montosSurtidosMes7,2).'",
		             	"'.number_format($porcentajes7,2).' %",
		            	 "'.$indicador7.'"],

		            	 [

		             	"TOTALES",
		             	"'.$sumaUnidadesTotal.'",
					 	"$ '.number_format($sumaImportesTotal,2).'",
					 	"'.$sumaUnidSurtTotal.'",
					 	"$ '.number_format($sumaImportSurtTotal,2).'",
					 	"'.$sumaPartidasSurtidasMesTotal.'",
					 	"$'.number_format($sumaMontosSurtidosMesTotal,2).'",		      
		             	"'.number_format($porcentajesTotal,2).' %",
		             	"'.$indicadorTotal.'"],';


	 					/***************************************/
	 							}
	 						}

	 					}
	 				}

			 				
	 			}

	 		}

	 	}
	 	

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;
		$file = 'acumulado.json';
		file_put_contents($file, $datosJson);

 	}

}

/*=============================================
ACTIVAR TABLA DE facturacion
=============================================*/ 
$activar = new TablareportAcumuladoMensual();
$activar -> mostrarTablas();
