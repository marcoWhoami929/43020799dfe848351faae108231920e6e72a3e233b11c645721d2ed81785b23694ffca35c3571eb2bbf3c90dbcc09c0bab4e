<?php
session_start();
require_once "../controladores/acumulado.controlador.php";
require_once "../modelos/acumulado.modelo.php";

class TablareportAcumulado{

	public function mostrarTablas(){	
     /*=============================================
    MOSTRAR LA TABLA DE facturacion
    =============================================*/ 

		$item = null;
 		$valor = null;

 		$acumulado = ControladorreportAcumulado::ctrMostrarAcumulado($item, $valor);
 	
/* ROCIO*/

		$sumaUnid1 = $acumulado[7][1];
		$sumaImport1 = $acumulado[7][2];
		$sumaUnidSurt1 = $acumulado[7][3];
		$sumaImportSurt1 = $acumulado[7][4];
		$sumaMesUnid1 = $sumaUnid1 - $sumaUnidSurt1;
		$sumaMesImport1 = $sumaImport1 - $sumaImportSurt1;

		/*BUSTOS*/

		$sumaUnid2 = $acumulado[5][1];
		$sumaImport2 = $acumulado[5][2];
		$sumaUnidSurt2 = $acumulado[5][3];
		$sumaImportSurt2 = $acumulado[5][4];
		$sumaMesUnid2 = $sumaUnid2 - $sumaUnidSurt2;
		$sumaMesImport2 = $sumaImport2 - $sumaImportSurt2;

		/*ERICK*/

		$sumaUnid3 = $acumulado[2][1]+$acumulado[3][1];
		$sumaImport3 = $acumulado[2][2]+$acumulado[3][2];
		$sumaUnidSurt3 = $acumulado[2][3]+$acumulado[3][3];
		$sumaImportSurt3 = $acumulado[2][4]+$acumulado[3][4];
		$sumaMesUnid3 = $sumaUnid3 - $sumaUnidSurt3;
		$sumaMesImport3 = $sumaImport3 - $sumaImportSurt3;


 		/*CEDIS*/
 		

		$sumaUnidAcum= $sumaUnid1 + $sumaUnid2 + $sumaUnid3;
 		$sumaImportAcum = $sumaImport1 + $sumaImport2 + $sumaImport3 ;
		$sumaUnidSurtAcum= $sumaUnidSurt1 + $sumaUnidSurt2 + $sumaUnidSurt3;
		$sumaImportSurtAcum = $sumaImportSurt1 + $sumaImport2 + $sumaImportSurt3;
		$sumaMesUnidAcum = $sumaUnidAcum - $sumaUnidSurtAcum;
		$sumaMesImportAcum = $sumaImportAcum - $sumaImportSurtAcum;

		/*ORLANDO*/

		$sumaUnid4 = $acumulado[6][1];
		$sumaImport4 = $acumulado[6][2];
		$sumaUnidSurt4 = $acumulado[6][3];
		$sumaImportSurt4 = $acumulado[6][4];
		$sumaMesUnid4 = $sumaUnid4 - $sumaUnidSurt4;
		$sumaMesImport4 = $sumaImport4 - $sumaImportSurt4;

		/*JONATHAN*/

		$sumaUnid5 = $acumulado[4][1];
		$sumaImport5 = $acumulado[4][2];
		$sumaUnidSurt5 = $acumulado[4][3];
		$sumaImportSurt5 = $acumulado[4][4];
		$sumaMesUnid5 = $sumaUnid5 - $sumaUnidSurt5;
		$sumaMesImport5 = $sumaImport5 - $sumaImportSurt5;

		/*ALFREDO*/

		$sumaUnid6 = $acumulado[0][1];
		$sumaImport6 = $acumulado[0][2];
		$sumaUnidSurt6 = $acumulado[0][3];
		$sumaImportSurt6 = $acumulado[0][4];
		$sumaMesUnid6 = $sumaUnid6 - $sumaUnidSurt6;
		$sumaMesImport6 = $sumaImport6 - $sumaImportSurt6;

		/*CASTOLO*/

		$sumaUnid7 = $acumulado[1][1];
		$sumaImport7 = $acumulado[1][2];
		$sumaUnidSurt7 = $acumulado[1][3];
		$sumaImportSurt7 = $acumulado[1][4];
		$sumaMesUnid7 = $sumaUnid7 - $sumaUnidSurt7;
		$sumaMesImport7 = $sumaImport7 - $sumaImportSurt7;


		/*CUENTAS CORP*/


		$sumaUnidAcumCorp= $sumaUnid4 + $sumaUnid5 + $sumaUnid6 + $sumaUnid7;
 		$sumaImportAcumCorp = $sumaImport4 + $sumaImport5 + $sumaImport6 + $sumaImport7;
 		$sumaImportSurtAcumCorp = $sumaImportSurt4 + $sumaImportSurt5 + $sumaImportSurt6 + $sumaImportSurt7;
		$sumaUnidSurtAcumCorp= $sumaUnidSurt4 + $sumaUnidSurt5 + $sumaUnidSurt6 + $sumaUnidSurt7;
		$sumaMesUnidAcumCorp = $sumaUnidAcumCorp - $sumaUnidSurtAcumCorp;
		$sumaMesImportAcumCorp = $sumaImportAcumCorp - $sumaImportSurtAcumCorp;

		
		/*TOTALES*/

		$sumaUnidTotal = $sumaUnid1 + $sumaUnid2 + $sumaUnid3 + $sumaUnid4 + $sumaUnid5 + $sumaUnid6 + $sumaUnid7;
		$sumaImportTotal = $sumaImport1 + $sumaImport2 + $sumaImport3 + $sumaImport4 + $sumaImport5 + $sumaImport6 + $sumaImport7;
		$sumaUnidSurtTotal = $sumaUnidSurt1 + $sumaUnidSurt2 + $sumaUnidSurt3 + $sumaUnidSurt4 + $sumaUnidSurt5 + $sumaUnidSurt6 + $sumaUnidSurt7;
		$sumaImportSurtTotal = $sumaImportSurt1 + $sumaImportSurt2 + $sumaImportSurt3 + $sumaImportSurt4 + $sumaImportSurt5 + $sumaImportSurt6 + $sumaImportSurt7;
		$sumaMesUnidTotal = $sumaUnidTotal - $sumaUnidSurtTotal;
		$sumaMesImportTotal = $sumaImportTotal - $sumaImportSurtTotal;

		/*PORCENTAJES*/

if ($sumaImportSurtAcum == 0) {
			 			$porcentajeCedis = "0.00";
			 		}else{
			 			$porcentajeCedis = ($sumaImportSurtAcum * 100 )/ $sumaImportAcum;
			 		}

if ($sumaImportSurt1 == 0) {
			 			$porcentaje1 = "0.00";
			 		}else{
			 			$porcentaje1 = ($sumaImportSurt1 * 100 )/ $sumaImport1;
			 		}
if ($sumaImportSurt2 == 0) {
			 			$porcentaje2 = "0.00";
			 		}else{
			 			$porcentaje2 = ($sumaImportSurt2 * 100 )/ $sumaImport2;
			 		}
if ($sumaImportSurt3 == 0) {
			 			$porcentaje3 = "0.00";
			 		}else{
			 			$porcentaje3 = ($sumaImportSurt3 * 100 )/ $sumaImport3;
			 		}
if ($sumaImportSurtAcumCorp == 0) {
			 			$porcentajeCorp = "0.00";
			 		}else{
			 			$porcentajeCorp = ($sumaImportSurtAcumCorp * 100 )/ $sumaImportAcumCorp;
			 		}
if ($sumaImportSurt4 == 0) {
			 			$porcentaje4 = "0.00";
			 		}else{
			 			$porcentaje4 = ($sumaImportSurt4 * 100 )/ $sumaImport4;
			 		}
if ($sumaImportSurt5 == 0) {
			 			$porcentaje5 = "0.00";
			 		}else{
			 			$porcentaje5 = ($sumaImportSurt5 * 100 )/ $sumaImport5;
			 		}

if ($sumaImportSurt6 == 0) {
			 			$porcentaje6 = "0.00";
			 		}else{
			 			$porcentaje6 = ($sumaImportSurt6 * 100 )/ $sumaImport6;
			 		}

if ($sumaImportSurt7 == 0) {
			 			$porcentaje7 = "0.00";
			 		}else{
			 			$porcentaje7 = ($sumaImportSurt7 * 100 )/ $sumaImport7;
			 		}

if ($sumaImportTotal == 0) {
			 			$porcentajeTotal = "0.00";
			 		}else{
			 			$porcentajeTotal = ($sumaImportSurtTotal * 100 )/ $sumaImportTotal;
			 		}
/*INDICADORES*/

			if ($porcentajeCedis>95) {
			 			$indicadorCedis = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajeCedis<95 and $porcentajeCedis>90) {
			 			$indicadorCedis = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicadorCedis = "<button type='button' class='btn btn-danger'></button>";
			 		}

			if ($porcentaje1>95) {
			 			$indicador1 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentaje1<95 and $porcentaje1>90) {
			 			$indicador1 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador1 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			if ($porcentaje2>95) {
			 			$indicador2 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentaje2<95 and $porcentaje2>90) {
			 			$indicador2 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador2 = "<button type='button' class='btn btn-danger'></button>";
			 		}
			 if ($porcentaje3>95) {
			 			$indicador3 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentaje3<95 and $porcentaje3>90) {
			 			$indicador3 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador3 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 if ($porcentajeCorp>95) {
			 			$indicadorCorp = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajeCorp<95 and $porcentajeCorp>90) {
			 			$indicadorCorp = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicadorCorp = "<button type='button' class='btn btn-danger'></button>";
			 		}

			if ($porcentaje4>95) {
			 			$indicador4 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentaje4<95 and $porcentaje4>90) {
			 			$indicador4 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador4 = "<button type='button' class='btn btn-danger'></button>";
			 		}
			 if ($porcentaje5>95) {
			 			$indicador5 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentaje5<95 and $porcentaje5>90) {
			 			$indicador5 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador5 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			if ($porcentaje6>95) {
			 			$indicador6 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentaje6<95 and $porcentaje6>90) {
			 			$indicador6 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador6 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			 if ($porcentaje7>95) {
			 			$indicador7 = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentaje7<95 and $porcentaje7>90) {
			 			$indicador7 = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicador7 = "<button type='button' class='btn btn-danger'></button>";
			 		}

			if ($porcentajeTotal>95) {
			 			$indicadorTotal = "<button type='button' class='btn btn-success'></button>";
			 		}elseif ($porcentajeTotal<95 and $porcentajeTotal>90) {
			 			$indicadorTotal = "<button type='button' class='btn btn-warning'></button>";
			 		}else{
			 			$indicadorTotal = "<button type='button' class='btn btn-danger'></button>";
			 		}
 		$datosJson = '{
		 
	 	"data": [ ';

	

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
				$agenteVentas = array(
			 			'agente1' => 'ROCIO MARTINEZ MORALES', 
			 			'agente2' => 'LUIS ENRIQUE BUSTOS MONTERD', 
			 			'agente3' => 'GOMEZ RODRIGUEZ ERICK',
			 			'agente4' => 'ORLANDO BRIONES AGUIRRE',
			 			'agente5' => 'JONATHAN GONZALEZ SANCHEZ',
			 			'agente6' => 'ALFREDO MENDOZA SEGURA',
			 			'agente7' => 'CASTOLO GALINDO ARTURO');
		$datosJson	 .= '
						[
						
		             	"CEDIS",
		             	"'.$sumaUnidAcum.'",
					 	"'.number_format($sumaImportAcum,2).'",
					 	"'.$sumaUnidSurtAcum.'",
					 	"'.number_format($sumaImportSurtAcum,2).'",
					 	"'.$sumaMesUnidAcum.'",
					 	"'.number_format($sumaMesImportAcum,2).'",		      
		             	"'.number_format($porcentajeCedis,2).' %",
		             	"'.$indicadorCedis.'"],
		             	
						[
						
		             	"'.$agenteVentas['agente1'].'",
		             	"'.$sumaUnid1.'",
					 	"'.number_format($sumaImport1,2).'",
					 	"'.$sumaUnidSurt1.'",
					 	"'.number_format($sumaImportSurt1,2).'",
					 	"'.$sumaMesUnid1.'",
					 	"'.number_format($sumaMesImport1,2).'",
		             	"'.number_format($porcentaje1,2).'%",
		             	"'.$indicador1.'"],
		             	[
						
		             	"'.$agenteVentas['agente2'].'",
		             	"'.$sumaUnid2.'",
					 	"'.number_format($sumaImport2,2).'",
					 	"'.$sumaUnidSurt2.'",
					 	"'.number_format($sumaImportSurt2,2).'",
					 	"'.$sumaMesUnid2.'",
					 	"'.number_format($sumaMesImport2,2).'",
		             	"'.number_format($porcentaje2,2).'%",
		             	"'.$indicador2.'"],
		             	[
						
		             	"'.$agenteVentas['agente3'].'",
		             	"'.$sumaUnid3.'",
					 	"'.number_format($sumaImport3,2).'",
					 	"'.$sumaUnidSurt3.'",
					 	"'.number_format($sumaImportSurt3,2).'",
					 	"'.$sumaMesUnid3.'",
					 	"'.number_format($sumaMesImport3,2).'",
		             	"'.number_format($porcentaje3,2).'%",
		             	"'.$indicador3.'"],
		             

						[

		             	"CUENTAS CORPORATIVAS",
		             	"'.$sumaUnidAcumCorp.'",
					 	"'.number_format($sumaImportAcumCorp,2).'",
					 	"'.$sumaUnidSurtAcumCorp.'",
					 	"'.number_format($sumaImportSurtAcumCorp,2).'",
					 	"'.$sumaMesUnidAcumCorp.'",
					 	"'.number_format($sumaMesImportAcumCorp,2).'",		      
		             	"'.number_format($porcentajeCorp,2).' %",
		             	"'.$indicadorCorp.'"],

		             	[
						
		             	"'.$agenteVentas['agente4'].'",
		             	"'.$sumaUnid4.'",
					 	"'.number_format($sumaImport4,2).'",
					 	"'.$sumaUnidSurt4.'",
					 	"'.number_format($sumaImportSurt4,2).'",
					 	"'.$sumaMesUnid4.'",
					 	"'.number_format($sumaMesImport4,2).'",
		             	"'.number_format($porcentaje4,2).'%",
		             	"'.$indicador4.'"],


		             	[
						
		             	"'.$agenteVentas['agente5'].'",
		             	"'.$sumaUnid5.'",
					 	"'.number_format($sumaImport5,2).'",
					 	"'.$sumaUnidSurt5.'",
					 	"'.number_format($sumaImportSurt5,2).'",
					 	"'.$sumaMesUnid5.'",
					 	"'.number_format($sumaMesImport5,2).'",
		             	"'.number_format($porcentaje5,2).'%",
		             	"'.$indicador5.'"],

		             	[
						
		             	"'.$agenteVentas['agente6'].'",
		             	"'.$sumaUnid6.'",
					 	"'.number_format($sumaImport6,2).'",
					 	"'.$sumaUnidSurt6.'",
					 	"'.number_format($sumaImportSurt6,2).'",
					 	"'.$sumaMesUnid6.'",
					 	"'.number_format($sumaMesImport6,2).'",
		             	"'.number_format($porcentaje6,2).'%",
		             	"'.$indicador6.'"],


		             	[
						
		             	"'.$agenteVentas['agente7'].'",
		             	"'.$sumaUnid7.'",
					 	"'.number_format($sumaImport7,2).'",
					 	"'.$sumaUnidSurt7.'",
					 	"'.number_format($sumaImportSurt7,2).'",
					 	"'.$sumaMesUnid7.'",
					 	"'.number_format($sumaMesImport7,2).'",
		             	"'.number_format($porcentaje7,2).'%",
		             	"'.$indicador7.'"],

		            	 [

		             	"TOTALES",
		             	"'.$sumaUnidTotal.'",
					 	"'.number_format($sumaImportTotal,2).'",
					 	"'.$sumaUnidSurtTotal.'",
					 	"'.number_format($sumaImportSurtTotal,2).'",
					 	"'.$sumaMesUnidTotal.'",
					 	"'.number_format($sumaMesImportTotal,2).'",
		             	"'.number_format($porcentajeTotal,2).'%",
		             	"'.$indicadorTotal.'"],';


	 					/***************************************/
             
        

	 	

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;
		

 	}

}

/*=============================================
ACTIVAR TABLA DE facturacion
=============================================*/ 
$activar = new TablareportAcumulado();
$activar -> mostrarTablas();



