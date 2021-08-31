<?php
session_start();
error_reporting(E_ALL);
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class AjaxFacturacionTiendas{


	public $idFactura;
	public $idFacturaTienda;
	public $serieFacturaTienda;

	public function ajaxVincularFactura(){

		$item = "id";
		$valor = $this->idFacturaTienda;

		$item2 = "idNuevaFactura";
		$valor2 = $this->idFactura;

		$serie = $this->serieFacturaTienda;

		$respuesta = ControladorFacturasTiendas::ctrVincularNuevaFactura($item, $valor,$item2,$valor2,$serie);

		$respuesta2 = ControladorFacturasTiendas::ctrMarcarFacturaRefacturada($item,$valor,$item2,$valor2,$serie);

		echo json_encode($respuesta);
		

	}

	public $idFacturaVista;
	public $serieFacturaVista;

	public function ajaxVerFacturaVinculada(){

		$item = "id";
		$valor = $this->idFacturaVista;

		$serie = $this->serieFacturaVista;

		$respuesta = ControladorFacturasTiendas::ctrMostrarFacturaVinculada($item,$valor,$serie);

		echo json_encode($respuesta);
	}

	public $idCorte;
	public $idSucursal;

	public function ajaxVerEfectivoCaja(){

		$item = "id";
		$valor = $this->idCorte;

		$item2 = "idSucursal";
		$valor2 = $this->idSucursal;

		$respuesta = ControladorFacturasTiendas::ctrMostrarEfectivoCaja($item,$valor,$item2,$valor2);

		echo json_encode($respuesta);


	}
	
	public $serieFacturaDepositada;
	public $folioFacturaDepositada;
	public $abonoFactura;
	public function ajaxAgregarFacturaDepositada(){

		$item = "serie";
		$valor = $this->serieFacturaDepositada;

		$item2 = "folio";
		$valor2 = $this->folioFacturaDepositada;

		$item3 = "abono";
		$valor3 = $this->abonoFactura;

		$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura($item,$valor,$item2,$valor2);

		if(number_format(str_replace(',','',$verAbonoFactura[0]["abono"]),2, '.', '') == 0){


			$respuesta = ControladorFacturasTiendas::ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			echo json_encode($respuesta);

		}else if(number_format(str_replace(',','',$verAbonoFactura[0]["abono"]),2, '.', '') < number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

			$valor3 = $valor3 + $verAbonoFactura[0]["abono"];

			$respuesta = ControladorFacturasTiendas::ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			echo json_encode($respuesta);

		}else if(number_format(str_replace(',','',$valor3),2, '.', '') == number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

			$respuesta = ControladorFacturasTiendas::ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			echo json_encode($respuesta);

		}

		


	}
	public $serieFacturaDepositadaRemove;
	public $folioFacturaDepositadaRemove;
	public $abonoFacturaRemove;
	public $idMovimientoBancoRemove;
	public function ajaxQuitarFacturaDepositada(){

		$item = "serie";
		$valor = $this->serieFacturaDepositadaRemove;

		$item2 = "folio";
		$valor2 = $this->folioFacturaDepositadaRemove;

		$item3 = "abono";
		$valor3 = $this->abonoFacturaRemove;

		$item4 = "depositada";

		$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura($item,$valor,$item2,$valor2);

		if(number_format(str_replace(',','',$valor3),2, '.', '') < number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

			$valor3 = $verAbonoFactura[0]["abono"] - $valor3;

			$valor4 = "1";

			$respuesta = ControladorFacturasTiendas::ctrQuitarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4);

			$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura($item,$valor,$item2,$valor2);

			if ($verAbonoFactura[0]["abono"] == "0") {
				
				$item3 = 'depositada';
				$valor3 = "0";

				$respuesta2 = ControladorFacturasTiendas::ctrActualizarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			}

		}else if(number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '') == number_format(str_replace(',','',$valor3),2, '.', '')){


			$valor4 = "0";
			$valor3 = $verAbonoFactura[0]["abono"] - $valor3;

			$respuesta = ControladorFacturasTiendas::ctrQuitarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4);

			

		}

		$valoresAbono = array('idMovimientoBanco' => $this->idMovimientoBancoRemove,
							  'serieFactura' => $this->serieFacturaDepositadaRemove,
							  'folioFactura' => $this->folioFacturaDepositadaRemove,
							  'totalAbono' => $this->abonoFacturaRemove);

		$buscarAbono = ControladorFacturasTiendas::ctrBuscarAbonoConParametros($valoresAbono);

		$idAbono = $buscarAbono[0];
	

		$item = "id";
		$valor = $idAbono;
		$eliminarAbonoRealizado = ControladorFacturasTiendas::ctrEliminarAbonoRealizado($item,$valor);
		
		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoBancoRemove;

		$abonosPorMovimientoBancario = ControladorFacturasTiendas::ctrBuscarAbonosPorMovimientoBancario($item,$valor);

		foreach ($abonosPorMovimientoBancario as $key => $value) {
				
				$serieFactura = $value["serieFactura"];
				$folioFactura = $value["folioFactura"];
				$abono = $value["totalAbono"];

				$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura('serie',$serieFactura,'folio',$folioFactura);

				$abonoDetalleFactura = number_format(str_replace(',','',$verAbonoFactura[0]["abono"]),2, '.', '');
				$totalDetalleFactura = number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '');


				$indice = $key-1;
				$serieFacturaPrev = $abonosPorMovimientoBancario[$indice][0];
				$folioFacturaPrev = $abonosPorMovimientoBancario[$indice][1];
				$abonoFacturaPrev = $abonosPorMovimientoBancario[$indice][2];

				$verAbonoFacturaPrev = ControladorFacturasTiendas::ctrObtenerAbonadoFacturaPrev($serieFacturaPrev,$folioFacturaPrev);

				$abonoDetalleFacturaPrev = number_format(str_replace(',','',$verAbonoFacturaPrev[0]["abono"]),2, '.', '');
				$totalDetalleFacturaPrev = number_format(str_replace(',','',$verAbonoFacturaPrev[0]["total"]),2, '.', '');

				$item = 'serieFactura';
				$valor = $serieFactura;

				$item2 = 'folioFactura';
				$valor2 = $folioFactura;

				$item3 = 'totalAbono';
				$valor3 = $abono;

				$detalleAbonoFactura = ControladorFacturasTiendas::ctrDetalleAbonoFactura($serieFacturaPrev,$folioFacturaPrev,$abonoFacturaPrev);	

				/**************ESTRUCTURA LOGICA DE REAGRUPACION DE NUMERO DE PARCIALES Y PENDIENTES FACTURA****/

				if ($serieFacturaPrev == "") {

					$numeroParcial =  1;
					$pendienteFactura = $totalDetalleFactura-$abono;
				
					

				}
				else if ($serieFactura == $serieFacturaPrev and $folioFactura == $folioFacturaPrev and $totalDetalleFactura == $totalDetalleFacturaPrev ) {
					$numeroParcial = $detalleAbonoFactura[0]["numeroParcial"] + 1;

					$pendienteFactura = $detalleAbonoFactura[0]["pendienteFactura"]-$abono;
					
					
					
				}else{

					$numeroParcial =  1;
					$pendienteFactura = $totalDetalleFactura-$abono;
					
					
					
				}
				
				$item4 = 'numeroParcial';
				$valor4 = $numeroParcial;

				$item5 = 'pendienteFactura';
				$valor5 = $pendienteFactura;

				$actualizarNumeroParciales = ControladorFacturasTiendas::ctrActualizarParcialesAbonos($item,$valor,$item2,$valor2,$item3,$valor3,$item4, $valor4,$item5,$valor5);

				echo json_encode($actualizarNumeroParciales);
				
		}

	}
	public $idMovimientoBancario;
	public $conceptoAbono;
	public $clientesAbono;
	public $parcialesAbono;
	public $saldoPendiente;
	public $abono;
	public $nombreSucursal;
	public $numeroParciales;
	public $fechaAbono;
	public $totalDocumento;
	public $totalAbonado;
	public $listaSpan;

	public function ajaxGuardarDepositoBancario(){

		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoBancario;

		$item2 = "concepto";
		$valor2 = $this->conceptoAbono;

		$item3 = "acreedor";
		$valor3 = $this->clientesAbono;

		/***LISTA DE FACTURAS ***/
		$item4 = "parcialesAbono";
		$valor4 = $this->parcialesAbono;

		$montoFacturas = explode(',',$valor4);
		$conceptoFacturas = explode(',',$valor2);
		$totalValorDocumento = explode(',',$this->totalDocumento);
		$clientes = explode(',',$valor3);

		$arregloDocumentoFinal = new MultipleIterator();
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($clientes));
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($montoFacturas));
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($conceptoFacturas));
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($totalValorDocumento));

		$sumaParciales = "";

		$movimientoB = "id";
		$movimientoBanco = $this->idMovimientoBancario;
		$limpiarParciales = ControladorFacturasTiendas::ctrLimpiarParcialesAbonos($movimientoB,$movimientoBanco);


		foreach ($arregloDocumentoFinal as $key => $value) {
		    list($nombreCliente,$totalAbono, $datFactura, $totalDocumento) = $value;
		    list($keyT) = $key;

		    $datFact = explode(' ',$datFactura);
			$serieFac = $datFact[0];
			$folioFac = $datFact[1];

			$item = "serieFactura";
			$valor = $serieFac;
			$item2 = "folioFactura";
			$valor2 = $folioFac;

			$verAbonadoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFacturaAbonos($item,$valor,$item2,$valor2);
			
			if($verAbonadoFactura[0]["pendienteFactura"] == 0){

				$pendienteFactura = $totalDocumento-$totalAbono;
				$numeroParcial = $verAbonadoFactura[0]["numeroParcial"];

			}else{

				$pendienteFactura = $verAbonadoFactura[0]["pendienteFactura"]-$totalAbono;
				$numeroParcial = $verAbonadoFactura[0]["numeroParcial"]+1;

			}
			
			$datosAbono = array('idMovimientoBanco' => $movimientoBanco,
								'serieAbono' => 'ABGM',
								'serieFactura' => $serieFac,
								'folioFactura' => $folioFac,
								'totalAbono' => $totalAbono,
								'pendienteFactura' => number_format(str_replace(',','',$pendienteFactura),2, '.', ''),
								'creadorAbono' => $_SESSION["id"],
								'numeroParcial' => $numeroParcial,
								'conceptoAbono' => 'ABONO CLIENTE',
								'idAjusteSaldo' => '0');

			$buscarAbono =  ControladorFacturasTiendas::ctrBuscarAbonosRealizados($datosAbono);

			if ($buscarAbono[0] == 0) {

				$generarAbono = ControladorFacturasTiendas::ctrGenerarAbonoFactura($datosAbono);
				
			}else{



			}

			
		}
		$arregloTemporal = array();
		foreach ( $arregloDocumentoFinal as $elemento ) {
		    if ( array_key_exists($elemento[0],$arregloTemporal) ) {
		        $arregloTemporal[$elemento[0]] += $elemento[1];
		    } else {
		        $arregloTemporal[$elemento[0]] = $elemento[1];
		    }
		}
		$arregloFacturasFinal = array();
		foreach ($arregloTemporal as $key => $value) {
		    array_push($arregloFacturasFinal,array($key,$value));
		}
		foreach ($arregloFacturasFinal as $keyT => $value) {

			if($keyT == 0){

				$llave = $keyT+1;
				$campo = "parcial";
				$campo2 = "departamentoParcial$llave";


			}else if($keyT == 1){
				$llave = $keyT+1;

				$campo = "parcial$llave";
				$campo2 = "departamentoParcial$llave";

			}else{

				$llave = $keyT+1;

				$campo = "parcial$llave";
				$campo2 = "departamentoParcial$llave";


			}

			$parcial = $value[1];
	
			$valorSucursal = $this->nombreSucursal;


			switch ($valorSucursal) {
				case 'Sucursal San Manuel':

		        $departamento2 = "SAN MANUEL";

		        break;
		      case 'Sucursal Capu':

		        $departamento2 = "CAPU";

		        break;
		      case 'Sucursal Reforma':

		        $departamento2 = "REFORMA";

		        break;
		      case 'Sucursal Las Torres':

		        $departamento2 = "LAS TORRES";

		        break;
		      case 'Sucursal Santiago':

		        $departamento2 = "SANTIAGO";

		        break;
		      case 'Mayoreo':

		        $departamento2 = "CEDIS";

		        break;
		      case 'Rutas':

		        $departamento2 = "RUTAS";

		        break;
		      case 'Industrial':

		        $departamento2 = "INDUSTRIAL";

		        break;
			}
			$movimiento = 'id';
			$movimientoBanco  = $this->idMovimientoBancario;

			$itemParciales = 'importeParciales';
			$sumaParciales += $value[1];
			
			$insertarParciales = ControladorFacturasTiendas::ctrInsertarParcialesAbonos($campo,$parcial,$campo2,$departamento2,$movimiento,$movimientoBanco,$itemParciales,$sumaParciales);
			
		}
		
		/***LISTA DE FACTURAS ***/
		$saldo = "saldoPendiente";
		$valorSaldo = $this->saldoPendiente;

		$sucursal = "sucursal";
		$valorSucursal = $this->nombreSucursal;


		switch ($valorSucursal) {
			case 'Sucursal San Manuel':

	        $valorIdSucursal = "53";
	        $departamento = "SAN MANUEL";

	        break;
	      case 'Sucursal Capu':

	        $valorIdSucursal = "57";
	        $departamento = "CAPU";

	        break;
	      case 'Sucursal Reforma':

	        $valorIdSucursal = "56";
	        $departamento = "REFORMA";

	        break;
	      case 'Sucursal Las Torres':

	        $valorIdSucursal = "55";
	        $departamento = "LAS TORRES";

	        break;
	      case 'Sucursal Santiago':

	        $valorIdSucursal = "54";
	        $departamento = "SANTIAGO";

	        break;
	       case 'Mayoreo':
	      	$valorIdSucursal = "13";
		    $departamento = "CEDIS";

		    break;
		  case 'Rutas':
		  	$valorIdSucursal = "15";
		    $departamento = "RUTAS";

		    break;
		  case 'Industrial':
		  	$valorIdSucursal = "59";
		    $departamento = "INDUSTRIAL";

		    break;
		}


		$abonoBanco = $this->abono;
		if ($valorSaldo != 0 AND $valorSaldo < $abonoBanco) {
				
			$estatus = "SALDO PENDIENTE";

		}else if ($valorSaldo == 0) {

			$estatus = "COMPLETADO";
		}

		
		$item5 = "parciales";
		$valor5 = $this->numeroParciales;

		$item6 = "departamento";
		$valor6 = $departamento;

		$mesAbono = $this->fechaAbono;
		$mesActual = substr($mesAbono,3,2);
		
		switch ($mesActual) {
			case '01':
				$mes = 'ENERO';
				break;
			case '02':
				$mes = 'FEBRERO';
				break;
			case '03':
				$mes = 'MARZO';
				break;
			case '04':
				$mes = 'ABRIL';
				break;
			case '05':
				$mes = 'MAYO';
				break;
			case '06':
				$mes = 'JUNIO';
				break;
			case '07':
				$mes = 'JULIO';
				break;
			case '08':
				$mes = 'AGOSTO';
				break;
			case '09':
				$mes = 'SEPTIEMBRE';
				break;
			case '10':
				$mes = 'OCTUBRE';
				break;
			case '11':
				$mes = 'NOVIEMBRE';
				break;
			case '12':
				$mes = 'DICIEMBRE';
				break;
			
		}

		$item7 = "mes";
		$valor7 = $mes;

		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoBancario;

		$item2 = "concepto";
		$valor2 = $this->conceptoAbono;

		$item8 = "abonadoDeposito";
		$valor8 = $this->totalAbonado;

		$item9 = "concepto";
		date_default_timezone_set('America/Mexico_City');
		$fechaBanco = date('d-m-Y H:i:s');
		$valor9 = ControladorFacturasTiendas::conceptoBanco($fechaBanco);

		$montosFacturas = $this->parcialesAbono;
		$conceptosFacturas = $this->conceptoAbono;
		$clientesFacturas = $this->clientesAbono;
		/*SEGMENTAR SI HAY CLIENTES REPETIDOS*/
		$numeroDocumento = "numeroDocumento";
		$listaClientesAbono = explode(',',$this->clientesAbono);
		$listaClientesAbono = array_unique($listaClientesAbono);
		$listaClientesAbono = implode(',',$listaClientesAbono);

		$listaFacturasAbono = explode(',',$this->conceptoAbono);
	
		$resultado = array();
		for ($i=0; $i < count($listaFacturasAbono); $i++) { 

			if ($i == 0) {
				$resultado[] = $listaFacturasAbono[$i];
			}else{
				$resultado[] = trim(substr($listaFacturasAbono[$i], -5, 5));
			}
			

		}
		$listaFacturasAbono = implode(',',$resultado);
	
		/*SEGMENTAR SI HAY CLIENTES REPETIDOS*/
		$totalValorDocumentos = $this->totalDocumento;

		$span = $this->listaSpan;

		
		if ($_SESSION["nombre"] == "Sucursal Santiago") {

			$bancoElegidoMov = "banco6278";

		}else if($_SESSION["nombre"] == "Diego Ávila"){

			$bancoElegidoMov = "banco6278";

		}else if($_SESSION["nombre"] == "Aurora Fernandez"){

			$bancoElegidoMov = "banco6278";

		}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

			$bancoElegidoMov = "banco3450";

		}else{

			if($_SESSION["nombre"] == "Sucursal Reforma"){
                  
                $bancoElegidoMov = $_SESSION["bancoNuevoElegido"];

            }else{
                
                $bancoElegidoMov = "banco0198";

            }

		}
		

		$consultarDepositoBanco = ControladorFacturasTiendas::ctrBuscarDepositoBancario($bancoElegidoMov,$item,$valor);

		if ($consultarDepositoBanco[0] == 0) {
				
			$respuesta = ControladorFacturasTiendas::ctrGenerarNuevoDepositoBanco($item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span,$bancoElegidoMov);

		}else{

			$respuesta = ControladorFacturasTiendas::ctrActualizarNuevoDepositoBanco($item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span);

			echo json_encode($respuesta);

		}


		$respuesta2 = ControladorFacturasTiendas::ctrGuardarDatosDepositoBanco($item,$valor,$numeroDocumento,$listaFacturasAbono,$item3,$listaClientesAbono,$item5,$valor5,$item6,$valor6,$item7,$valor7,$item9,$valor9);

		echo json_encode($respuesta2);
		


	}
	public $idSolicitud;
	public function ajaxVerDetalleTicket(){

		$item = "numeroTicket";
		$valor = $this->idSolicitud;

		$respuesta = ControladorFacturasTiendas::ctrVerDetalleTicket($item,$valor);

		echo json_encode($respuesta);


	}
	public $idMovimientoBancoDesglose;
	public function ajaxDesgloseAbonosBanco(){

		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoBancoDesglose;

		$respuesta = ControladorFacturasTiendas::ctrDesgloseAbonosBancarios($item,$valor);

		echo json_encode($respuesta);


	}
	public $idMovimientoRecibo;
	public function ajaxGenerarReciboCaja(){

		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoRecibo;

		$respuesta = ControladorFacturasTiendas::ctrGenerarReciboCaja($item,$valor);

		echo json_encode($respuesta);


	}
	public $folioFiscal;
	public function ajaxValidarFolioFiscal(){

		$item = "folioFiscal";
		$valor = $this->folioFiscal;

		$respuesta = ControladorFacturasTiendas::ctrValidarFolioFiscal($item,$valor);
		echo json_encode($respuesta);

	}
	/***********GENERAR AJUSTE DE SALDOS DE REMANENTES *****/
	public $valorAjuste;
	public $fechaInicioAjuste;
	public $fechaFinAjuste;
	public $concepto;

	public function ajaxGenerarAjusteSaldoRemanentes(){

		 $datos =  array('valorAjuste' => $this->valorAjuste,
                    'fechaInicioAjuste' => $this->fechaInicioAjuste,
                    'fechaFinAjuste' => $this->fechaFinAjuste,
                    'concepto' => $this->concepto);
    

 		$respuesta = ControladorFacturasTiendas::ctrMostrarFacturasConRemanentes($datos);
 		$obtenerUltimoAjuste = ControladorFacturasTiendas::ctrObtenerUltimoAjuste();

 		/************/
 		
 		$folioAjuste = $obtenerUltimoAjuste["folioAjuste"];
 		$sumaPendientes = 0;
 		foreach ($respuesta as $key => $value) {

 				$serieFactura = $value["serie"];
 				$folioFactura = $value["folio"];
 				$pendienteAjuste = number_format($value["pendiente"],2);
 				$totalDocumento = $value["total"];
 				$movimientoBanco = $value["idMovimientoBanco"];

 				$sumaPendientes += $pendienteAjuste;


 				$item = "serieFactura";
				$valor = $serieFactura;
				$item2 = "folioFactura";
				$valor2 = $folioFactura;

				$verAbonadoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFacturaAbonos($item,$valor,$item2,$valor2);
				
				if($verAbonadoFactura[0]["pendienteFactura"] == 0){

					$pendienteFactura = $totalDocumento-$pendienteAjuste;
					$numeroParcial = $verAbonadoFactura[0]["numeroParcial"];

				}else{

					$pendienteFactura = $verAbonadoFactura[0]["pendienteFactura"]-$pendienteAjuste;
					$numeroParcial = $verAbonadoFactura[0]["numeroParcial"]+1;

				}
				/***************************************************/
				$item = 'conceptoFacturas';
				$valor = $serieFactura." ".$folioFactura;
				$verAbonoDepositoBancario = ControladorFacturasTiendas::ctrObtenerAbonoRealizadoDeposito($item,$valor);

				$idDeposito = $verAbonoDepositoBancario[0]["id"];
				$idMovimientoBancarioDeposito = $verAbonoDepositoBancario[0]["idMovimientoBanco"];
				$saldoPendienteDeposito = $verAbonoDepositoBancario[0]["saldoPendiente"];
				$totalDocumentosDeposito = $verAbonoDepositoBancario[0]["totalDocumentos"];
				$abonadoDepositoDeposito = $verAbonoDepositoBancario[0]["abonadoDeposito"];
				$estatusDeposito = $verAbonoDepositoBancario[0]["estatus"];

				$totalFactura = $verAbonoDepositoBancario[0]["total"];
				$pagadoFactura = number_format(str_replace(',','',$verAbonoDepositoBancario[0]["pagado"]),2, '.', '');


				$totalDocumento = explode(',',$totalDocumentosDeposito);
				$sumaTotal = 0;
	            foreach ($totalDocumento as $key => $value) {
	                
	                $sumaTotal += $value;
	            }


	            $montoFacturas =  $verAbonoDepositoBancario[0]["montoFacturas"];
	            $totalMontos = explode(',',$montoFacturas);
				$sumaTotalMontos = 0;

				$arregloMontosFacturas = [];

				 foreach ($totalMontos as $key => $value) {

	            	 if ($pagadoFactura == $value) {
		                  $nuevoValor = $value + $pendienteAjuste;
		                  $sumaTotalMontos += $value;
		                 
		              }else{
		                  $nuevoValor = $value;
		                  $sumaTotalMontos += $value;
		              }
		               array_push($arregloMontosFacturas, $nuevoValor);
	            }


	            $arregloFacturas = implode(",", $arregloMontosFacturas);
				$totalAbonado = $sumaTotalMontos + $pendienteAjuste;
				
				$saldoPendienteFinal = $verAbonoDepositoBancario[0]["abono"] - $totalAbonado;

				//$saldoPendienteFinal = $totalDocumentosDeposito - $totalAbonado;

				if ($saldoPendienteFinal == 0) {
					
					$estatusFinal = "COMPLETADO";
				}else{

					$estatusFinal = "SALDO PENDIENTE";
				}

				$datosDepositoFinal = array('id' => $idDeposito,
											'idMovimientoBanco' => $idMovimientoBancarioDeposito,
											'abonadoDeposito' => $totalAbonado,
											'saldoPendiente' => $saldoPendienteFinal,
											'montoFacturas' => $arregloFacturas,
											'estatus' => $estatusFinal);


				$saldarFacturaDeposito = ControladorFacturasTiendas::ctrSaldarFacturaDeposito($datosDepositoFinal);
				/***************************************************/

				$datosAbono = array('idMovimientoBanco' => $movimientoBanco,
									'serieAbono' => 'ABGM',
									'serieFactura' => $serieFactura,
									'folioFactura' => $folioFactura,
									'totalAbono' => $pendienteAjuste,
									'pendienteFactura' => number_format(str_replace(',','',$pendienteFactura),2, '.', ''),
									'creadorAbono' => $_SESSION["id"],
									'numeroParcial' => $numeroParcial,
									'conceptoAbono' => 'ABONO CLIENTE / AJUSTE SALDO',
									'idAjusteSaldo' => $folioAjuste);

				$buscarAbono =  ControladorFacturasTiendas::ctrBuscarAbonosRealizados($datosAbono);

				if ($buscarAbono[0] == 0) {

					$generarAbono = ControladorFacturasTiendas::ctrGenerarAbonoFactura($datosAbono);
					
				}else{



				}

				$item = "serie";
				$valor = $serieFactura;
				$item2 = "folio";
				$valor2 = $folioFactura;
				$obtenerSaldoFactura = ControladorFacturasTiendas::ctrObtenerDatosFactura($item,$valor,$item2,$valor2);

				$total = number_format(str_replace(',','',$obtenerSaldoFactura["total"]),2, '.', '');
				$pagado = number_format(str_replace(',','',$obtenerSaldoFactura["pagado"]),2, '.', '');
				$pendiente = number_format(str_replace(',','',$obtenerSaldoFactura["pendiente"]),2, '.', '');
				$abono = number_format(str_replace(',','',$obtenerSaldoFactura["abono"]),2, '.', '');

				$pagadoFactura = $pagado + $pendiente;
				$pendienteFactura = $total - $pagadoFactura;
				$abonoFactura = $abono + $pendiente;


				$datosSaldado = array('serie' => $serieFactura,
									  'folio' => $folioFactura,
									  'pendiente' => number_format(str_replace(',','',$pendienteFactura),2, '.', ''),
									  'pagado' => number_format(str_replace(',','',$pagadoFactura),2, '.', ''),
									  'abono' => number_format(str_replace(',','',$abonoFactura),2, '.', ''),
									  'ajustado' => '1');


				/************SALDAR DOCUMENTO FACTURA *****************/
				
				$saldarDocumento = ControladorFacturasTiendas::ctrSaldarDocumentoConSaldoPendiente($datosSaldado);
				


 		}


 		
 		switch ($this->concepto) {
 			case 'FACTURA SAN MANUEL V 3.3':
 				$serie = 'AJSM';
 				break;
 			case 'FACTURA REFORMA V 3.3':
 				$serie = 'AJRF';
 				break;
 			case 'FACTURA CAPU V 3.3':
 				$serie = 'AJCP';
 				break;
 			case 'FACTURA SANTIAGO V 3.3':
 				$serie = 'AJSG';
 				break;
 			case 'FACTURA TORRES':
 				$serie = 'AJTR';
 				break;
 			
 			case 'ALL':
 				$serie = 'AJRU';
 				break;
 			case 'FACTURA MAYOREO V 3.3':
 				$serie = 'AJCD';
 				break;
 			case 'FACTURA INDUSTRIAL V 3.3':
 				$serie = 'AJND';
 				break;
 			
 		}


 		$rutaArchivo = "ajustes/".$serie."-".$folioAjuste.".txt";

 		$datosAjuste = array('serieAjuste' => $serie,
 							 'folioAjuste' => $folioAjuste,
 							 'saldoAjustado' => $sumaPendientes,
 							 'pendiente' => '0',
 							 'idAjustador' => $_SESSION['id'],
 							 'rutaArchivo' => $rutaArchivo,
 							 'fechaInicioAjuste' => $this->fechaInicioAjuste,
 							 'fechaFinAjuste' => $this->fechaFinAjuste,
 							 'valorAjuste' => $this->valorAjuste);

 		$respuesta = ControladorFacturasTiendas::ctrGenerarAjusteSaldoRemanentes($datosAjuste);
 		
 		
 		
 		
 		$item = "folioAjuste";
 		$valor = $folioAjuste;
		$obtenerAbonosConAjuste =  ControladorFacturasTiendas::ctrObtenerAbonosConAjuste($item,$valor);
		$fechaAbono = $obtenerAbonosConAjuste[0]["fechaAbono"];

			  
			if($archivo = fopen("../ajustes/".$serie."-".$folioAjuste.".txt",  "a")) {

				
				fwrite($archivo, "*********************************************************************************************". "\n");
				fwrite($archivo, "PROCESO DE SALDADO DE REMANENTES". "\n");
				fwrite($archivo, "*********************************************************************************************". "\n");
				fwrite($archivo, "---------------------------------------------------------------------------------------------". "\n");
				fwrite($archivo, "Área Corregida". "           FACTURAS TIENDAS"."\n");
				fwrite($archivo, "Fecha y Hora de Inicio: "." ".$fechaAbono. "\n");
				fwrite($archivo, "---------------------------------------------------------------------------------------------". "\n");
				fwrite($archivo,"Comienza con Este proceso elimina pequeños saldos pendientes en documentos para que ya no"."\n");
				fwrite($archivo,"aparezcan como documentos con saldos pendientes, el proceso recupera los documentos en el"."\n");
				fwrite($archivo,"rango de fechas con un pendiente menor o igual al monto Termina con pendiente a eliminar"."\n");
				fwrite($archivo,"y los salda con documentos creados para este propósito."."\n");
				fwrite($archivo, "---------------------------------------------------------------------------------------------". "\n");
				fwrite($archivo, "Para la realización de este proceso el usuario eligió las siguientes opciones:". "\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "Fecha Inicial de la eliminación:".$this->fechaInicioAjuste."\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "Fecha Final de la eliminación:".$this->fechaFinAjuste."\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "Monto pendiente a eliminar:".$this->valorAjuste." PESO MEXICANO"."\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "". "\n");
				
				fwrite($archivo, "                                   				DOCUMENTOS CREADOS CON EL AJUSTE". "\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "SERIE AJUSTE"."    "."FOLIO AJUSTE"."    "."SALDO AJUSTADO"."    "."SERIE FACTURA"."    "."FOLIO FACTURA"."    "."ABONADO"."    "."PENDIENTE"."    "."FECHA ABONO"."         "."CONCEPTO ABONO"."\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "". "\n");
				
				foreach ($obtenerAbonosConAjuste as $key => $value) {
				
				fwrite($archivo, $value["serieAjuste"]."            ".$value["folioAjuste"]."               "." ".$value["saldoAjustado"]."             ".$value["serieFactura"]."             ".$value["folioFactura"]."            ".$value["totalAbono"]."       ".$value["pendienteFactura"]."            ".$value["fechaAbono"]."  ".$value["conceptoAbono"]."\n");
				fwrite($archivo, "". "\n");

				}
								  
				fclose($archivo);
	
			}
			echo json_encode($respuesta);

	}
	public $fondoCaja;
	public $folioCorteCajaInicial;
	public function ajaxGenerarCorteCaja(){

		if ($this->folioCorteCajaInicial == "") {

			$folioCorteCaja = ControladorFacturasTiendas::ctrMostrarFolioDisponibleCorteCaja();

			$folio = $folioCorteCaja["folioCorte"];

		}else{

			$folio = $this->folioCorteCajaInicial;
		}
		
		$fondoCaja = $this->fondoCaja;

		$datosCorte = array('serie'=>"CTC",
							 'folio'=>$folio,
							 'fondoCaja'=> $fondoCaja,
							 'idSucursal' => $_SESSION["id"]);

		if ($this->folioCorteCajaInicial == "") {
			
			$generarCorteCaja = ControladorFacturasTiendas::ctrGenerarNuevoCorteCaja($datosCorte);
			$generarDenominaciones = ControladorFacturasTiendas::ctrGenerarDenominacionesCorte($datosCorte);
			
			$item = 'folioCorteCaja';
			$valor = $folio;
			$obtenerDenominacionesCorte =  ControladorFacturasTiendas::ctrMostrarDenominacionesCorte($item,$valor);

			echo json_encode($obtenerDenominacionesCorte);


		}else{

			$item = 'folioCorteCaja';
			$valor = $folio;
			$obtenerDenominacionesCorte =  ControladorFacturasTiendas::ctrMostrarDenominacionesCorte($item,$valor);


			echo json_encode($obtenerDenominacionesCorte);

		}

	}
	public $folioCorteCaja;
	public $arregloDenominaciones;
	public $totalDenominaciones;

	public function ajaxCargarDenominacionesCorte(){

		$folioCorte = $this->folioCorteCaja;

		$totalDenominaciones = $this->totalDenominaciones;
		$arreglo = $this->arregloDenominaciones;
		$arregloDenom = explode(',',$arreglo);

		$datosDenominaciones = array('folioCorteCaja'=>$folioCorte,
									 'total' => $totalDenominaciones,
									 'idSucursal' => $_SESSION["id"],
									 'dn1'=>$arregloDenom[0],
									 'dn2'=>$arregloDenom[1],
									 'dn3'=>$arregloDenom[2],
									 'dn4'=>$arregloDenom[3],
									 'dn5'=>$arregloDenom[4],
									 'dn6'=>$arregloDenom[5],
									 'dn7'=>$arregloDenom[6],
									 'dn8'=>$arregloDenom[7],
									 'dn9'=>$arregloDenom[8],
									 'dn10'=>$arregloDenom[9],
									 'dn11'=>$arregloDenom[10],
									 'dn12'=>$arregloDenom[11],
									 'dn13'=>$arregloDenom[12],
									 'dn14'=>$arregloDenom[13]);

		$cargaDenominaciones = ControladorFacturasTiendas::ctrCargarDenominacionesCorte($datosDenominaciones);

		echo json_encode($cargaDenominaciones);

	}

	public $folioCorte;
	public function ajaxDetallesFormaPagoCorteCaja(){

		$fechaActual = date('Y-m-d', strtotime($fecha."- 0 days"));
		
		$item = "fechaFactura";
		$valor = $fechaActual;

		if ($_SESSION["nombre"] == "Diego Ávila") {
                                  
	        $usuario = "Mayoreo";

	      }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

	        $usuario = "Rutas";

	      }else if($_SESSION["nombre"] == "Aurora Fernandez"){

	        $usuario = "Industrial";

	      }else{

	        $usuario = $_SESSION["nombre"];

	      }
		switch ($usuario) {
			case 'Sucursal San Manuel':
				$concepto = "FACTURA SAN MANUEL V 3.3";
				break;
			case 'Sucursal Capu':
				$concepto = "FACTURA CAPU V 3.3";
				break;
			case 'Sucursal Santiago':
				$concepto = "FACTURA SANTIAGO V 3.3";
				break;
			case 'Sucursal Reforma':
				$concepto = "FACTURA REFORMA V 3.3";
				break;
			case 'Sucursal Las Torres':
				$concepto = "FACTURA TORRES";
				break;
			case 'Mayoreo':
                $concepto = "FACTURA MAYOREO V 3.3";
                break;
            case 'Industrial':
                $concepto = "FACTURA INDUSTRIAL V 3.3";
                break;
            case 'Rutas':
                $concepto = "ALL";
                break;
		
		}

		$item2 = "concepto";
		$valor2 = $concepto;

		$item3 = "folioCorteCaja";
		$valor3 = $this->folioCorte;

		$respuesta = ControladorFacturasTiendas::ctrDetallesFormaPagoCorteCaja($item,$valor,$item2,$valor2,$item3,$valor3);


		$resultado = array();
		$efectivo = 0;
		$chequeNominativo = 0;
		$transferenciaElectronica = 0;
		$tarjetaCredito = 0;
		$tarjetaDebito = 0;
		$credito = 0;
		$porDefinir = 0;

		for ($i=0; $i < count($respuesta); $i++) { 
				$efectivo +=  $respuesta[$i]["efectivo"];
				$chequeNominativo +=  $respuesta[$i]["chequeNominativo"];
				$transferenciaElectronica +=  $respuesta[$i]["transferenciaElectronica"];
				$tarjetaCredito +=  $respuesta[$i]["tarjetaCredito"];
				$tarjetaDebito +=  $respuesta[$i]["tarjetaDebito"];
				$credito +=  $respuesta[$i]["credito"];
				$porDefinir +=  $respuesta[$i]["porDefinir"];
				
		}
		$resultado[] = array('efectivo' => $efectivo,'chequeNominativo' => $chequeNominativo,'transferenciaElectronica' => $transferenciaElectronica,'tarjetaCredito' => $tarjetaCredito,'tarjetaDebito'=> $tarjetaDebito,'credito' => $credito,'porDefinir' => $porDefinir);
		
		echo json_encode($resultado);


	}

	public $folioCorteCajaDetalle;
	public $efectivoDetalle;
	public $transferenciaDetalle;
	public $tarjetaDebitoDetalle;
	public $tarjetaCreditoDetalle;
	public $porDefinirDetalle;
	public $creditoDetalle;
	public $importeVenta;
	public function ajaxCargarFormasPagoCorte(){

		$item = 'folioCorteCaja';
		$valor = $this->folioCorteCajaDetalle;

		$obtenerTotalDenominaciones = ControladorFacturasTiendas::ctrObtenerTotalDenominaciones($item,$valor);

		$arregloImporteGastos = array (); 
		$sumarGastos = 0;

		if(count($obtenerTotalDenominaciones) == 0){

			$obtenerTotalDenominacionesCaja = ControladorFacturasTiendas::ctrObtenerTotalDenominacionesCaja($item,$valor);
			
				$totalEfectivo = $obtenerTotalDenominacionesCaja[0]["totalEfectivo"];
				$importeGasto = 0;
				$sumarGastos = 0;
			
				$arregloImporteGastos[]="";

		}else{

			foreach ($obtenerTotalDenominaciones as $key => $value) {

				$totalEfectivo = $value["totalEfectivo"];
				$importeGasto = $value["importeGasto"];
				$sumarGastos += $importeGasto;
			
				$arregloImporteGastos[]=$value["folioGasto"];

			}

		}
		
		$importesGastos = $sumarGastos;
		$total = $totalEfectivo + $this->chequeDetalle + $this->transferenciaDetalle + $this->tarjetaDebitoDetalle + $this->tarjetaCreditoDetalle + $this->porDefinirDetalle + $this->creditoDetalle;

		if ($_SESSION["nombre"] != "Sucursal San Manuel") {
			
			$fondo = '1000';

		}else{

			$fondo = '1500';

		}

		//$fechaActual = date("Y-m-d");
		$fechaActual = date('Y-m-d', strtotime($fecha."- 0 days"));
		$fechaFactura = $fechaActual;
		//$fechaFactura = "2020-02-24";
		$fondoCaja = $fondo;

		$datosFormasPago = array('folioCorteCaja' => $this->folioCorteCajaDetalle,
								/*
								 'efectivo' => $this->efectivoDetalle,
								 */
								 'efectivo' => $totalEfectivo,
								 'cheque' => $this->chequeDetalle,
								 'transferencia' => $this->transferenciaDetalle,
								 'tarjetaDebito' => $this->tarjetaDebitoDetalle,
								 'tarjetaCredito' => $this->tarjetaCreditoDetalle,
								 'porDefinir' => $this->porDefinirDetalle,
								 'credito' => $this->creditoDetalle,
								 'gastos' => $importesGastos,
								 'folioGasto' => $arregloImporteGastos,
								 'importeVenta' => $this->importeVenta,
								 'total' => $total,
								 'fondoCaja' => $fondoCaja,
								 'fechaFactura' => $fechaFactura);


		$cargarFormasPagoCorte = ControladorFacturasTiendas::ctrCargarFormasPagoCorte($datosFormasPago);

		if ($cargarFormasPagoCorte == "ok") {

		$item = 'folio';
		$valor = $this->folioCorteCajaDetalle;
		$mostrarTiempoTranscurridoCorte = ControladorFacturasTiendas::ctrMostrarTiempoTranscurridoCorte($item,$valor);
		echo json_encode($mostrarTiempoTranscurridoCorte);
			
		}else{



		}



	}
	public $valorFinalizado;
	public $folioCorteCajaEdit;
	public $observacionesCorte;

	public function ajaxFinalizarCorteCaja(){

		$item = 'folio';
		$valor = $this->folioCorteCajaEdit;

		$item2 = 'observaciones';
		$valor2 = $this->observacionesCorte;

		$finalizarCorte = ControladorFacturasTiendas::ctrFinalizarCorteCaja($item,$valor,$item2,$valor2);

		$detalleCorte = ControladorFacturasTiendas::ctrDetalleCorteFinalizado($item,$valor);


		if($detalleCorte["diferencia"] > 10 || $detalleCorte["diferencia"]< 10){

			echo json_encode($detalleCorte);

		}else{

			$sinDiferencias = "false";
			echo json_encode($sinDiferencias);

		}


	}
	public $folioCorteCajaVistaDetalle;
	public function ajaxVistaDetalleCorte(){

		$item = 'folio';
		$valor = $this->folioCorteCajaVistaDetalle;

		$vistaDetalleCorte = ControladorFacturasTiendas::ctrMostrarTiempoTranscurridoCorte($item,$valor);
		echo json_encode($vistaDetalleCorte);


	}
	public $folioAjusteRecibo;
	public function ajaxGenerarReciboAjuste(){

		$item = "folioAjuste";
		$valor = $this->folioAjusteRecibo;

		$respuesta = ControladorFacturasTiendas::ctrGenerarReciboAjuste($item,$valor);

		echo json_encode($respuesta);


	}
	public $nombreCliente;
	public $fechaCobroCorte;
	public $sucursalCobroCorte;
	public function ajaxGenerarFacturasCobros(){

		$item = 'concepto';
		if ($this->sucursalCobroCorte != "") {
        $usuario = $this->sucursalCobroCorte;
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
				$concepto = "FACTURA SAN MANUEL V 3.3";
				break;
			case 'Sucursal Capu':
				$concepto = "FACTURA CAPU V 3.3";
				break;
			case 'Sucursal Santiago':
				$concepto = "FACTURA SANTIAGO V 3.3";
				break;
			case 'Sucursal Reforma':
				$concepto = "FACTURA REFORMA V 3.3";
				break;
			case 'Sucursal Las Torres':
				$concepto = "FACTURA TORRES";
				break;
			case 'Mayoreo':
                $concepto = "FACTURA MAYOREO V 3.3";
                break;
            case 'Industrial':
                $concepto = "FACTURA INDUSTRIAL V 3.3";
                break;
            case 'Rutas':
                $concepto = "ALL";
                break;
		
		}

		$valor = $concepto;

		$item2 = "fechaFactura";
		if($this->fechaCobroCorte != "") {
        
        $valor2 = $this->fechaCobroCorte;

	    }else{

	        $hoy = date("d/m/Y");
	        $fecha = str_replace('/', '-', $hoy);
	        $fechaFinal = date('Y-m-d', strtotime($fecha));
	        $valor2 = $fechaFinal;

	    }

		$item3 = 'nombreCliente';
		$valor3 = $this->nombreCliente;

		$respuesta= ControladorFacturasTiendas::ctrMostrarDesgloseCobros($item,$valor,$item2,$valor2,$item3,$valor3);
		echo json_encode($respuesta);


	}
	public $idFacturaPendiente;
	public $formaPagoPendiente;
	public $pendientePago;
	public $cobradoPendiente;
	public function ajaxActualizarFacturaPagoPendiente(){

		$item = 'id';
		$valor = $this->idFacturaPendiente;

		$item2 = 'formaPago';
		$valor2= $this->formaPagoPendiente;

		$item3 = 'pendientePago';
		$valor3 = $this->pendientePago;

		$item4 = 'nuevaFechaFactura';
		if ($valor3 == 1) {
			$valor4 = date('Y-m-d', strtotime($fecha."- 0 days"));
		}else{
			$valor4 = "0000-00-00";
		}
		
		$item5 = 'importePendiente';
		$valor5 = $this->cobradoPendiente;

		$respuesta =  ControladorFacturasTiendas::ctrActualizarFacturasPagoPendiente($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4,$item5,$valor5);

		echo json_encode($respuesta);

	}

	/**
	 *
	 * FUNCIONES PARA VINCULACION DE FACTURAS DESDE EL BANCO
	 *
	 */
	public $serieFacturaDepositadaMovimiento;
	public $folioFacturaDepositadaMovimiento;
	public $abonoFacturaMovimiento;
	public function ajaxInsertarFacturaDepositada(){

		$item = "serie";
		$valor = $this->serieFacturaDepositadaMovimiento;

		$item2 = "folio";
		$valor2 = $this->folioFacturaDepositadaMovimiento;

		$item3 = "abono";
		$valor3 = $this->abonoFacturaMovimiento;

		$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura($item,$valor,$item2,$valor2);

		if(number_format(str_replace(',','',$verAbonoFactura[0]["abono"]),2, '.', '') == 0){

			$respuesta = ControladorFacturasTiendas::ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			echo json_encode($respuesta);

		}else if(number_format(str_replace(',','',$verAbonoFactura[0]["abono"]),2, '.', '') < number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

			$valor3 = $valor3 + $verAbonoFactura[0]["abono"];

			$respuesta = ControladorFacturasTiendas::ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			echo json_encode($respuesta);

		}else if(number_format(str_replace(',','',$valor3),2, '.', '') == number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

			$respuesta = ControladorFacturasTiendas::ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			echo json_encode($respuesta);

		}

		


	}
	public $serieFacturaDepositadaMovimientoRemove;
	public $folioFacturaDepositadaMovimientoRemove;
	public $abonoFacturaMovimientoRemove;
	public $idMovimientoBancoMovimientoRemove;
	public function ajaxEliminarFacturaDepositada(){

		$item = "serie";
		$valor = $this->serieFacturaDepositadaMovimientoRemove;

		$item2 = "folio";
		$valor2 = $this->folioFacturaDepositadaMovimientoRemove;

		$item3 = "abono";
		$valor3 = $this->abonoFacturaMovimientoRemove;

		$item4 = "depositada";

		$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura($item,$valor,$item2,$valor2);

		if(number_format(str_replace(',','',$valor3),2, '.', '') < number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

			$valor3 = $verAbonoFactura[0]["abono"] - $valor3;

			$valor4 = "1";

			$respuesta = ControladorFacturasTiendas::ctrQuitarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4);

			$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura($item,$valor,$item2,$valor2);

			if ($verAbonoFactura[0]["abono"] == "0") {
				
				$item3 = 'depositada';
				$valor3 = "0";

				$respuesta2 = ControladorFacturasTiendas::ctrActualizarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			}

		}else if(number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '') == number_format(str_replace(',','',$valor3),2, '.', '')){


			$valor4 = "0";
			$valor3 = $verAbonoFactura[0]["abono"] - $valor3;

			$respuesta = ControladorFacturasTiendas::ctrQuitarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4);

			

		}

		$valoresAbono = array('idMovimientoBanco' => $this->idMovimientoBancoMovimientoRemove,
							  'serieFactura' => $this->serieFacturaDepositadaMovimientoRemove,
							  'folioFactura' => $this->folioFacturaDepositadaMovimientoRemove,
							  'totalAbono' => $this->abonoFacturaMovimientoRemove);

		$buscarAbono = ControladorFacturasTiendas::ctrBuscarAbonoConParametros($valoresAbono);

		$idAbono = $buscarAbono[0];
	

		$item = "id";
		$valor = $idAbono;
		$eliminarAbonoRealizado = ControladorFacturasTiendas::ctrEliminarAbonoRealizado($item,$valor);
		
		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoBancoRemove;

		$abonosPorMovimientoBancario = ControladorFacturasTiendas::ctrBuscarAbonosPorMovimientoBancario($item,$valor);

		foreach ($abonosPorMovimientoBancario as $key => $value) {
				
				$serieFactura = $value["serieFactura"];
				$folioFactura = $value["folioFactura"];
				$abono = $value["totalAbono"];

				$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura('serie',$serieFactura,'folio',$folioFactura);

				$abonoDetalleFactura = number_format(str_replace(',','',$verAbonoFactura[0]["abono"]),2, '.', '');
				$totalDetalleFactura = number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '');


				$indice = $key-1;
				$serieFacturaPrev = $abonosPorMovimientoBancario[$indice][0];
				$folioFacturaPrev = $abonosPorMovimientoBancario[$indice][1];
				$abonoFacturaPrev = $abonosPorMovimientoBancario[$indice][2];

				$verAbonoFacturaPrev = ControladorFacturasTiendas::ctrObtenerAbonadoFacturaPrev($serieFacturaPrev,$folioFacturaPrev);

				$abonoDetalleFacturaPrev = number_format(str_replace(',','',$verAbonoFacturaPrev[0]["abono"]),2, '.', '');
				$totalDetalleFacturaPrev = number_format(str_replace(',','',$verAbonoFacturaPrev[0]["total"]),2, '.', '');

				$item = 'serieFactura';
				$valor = $serieFactura;

				$item2 = 'folioFactura';
				$valor2 = $folioFactura;

				$item3 = 'totalAbono';
				$valor3 = $abono;

				$detalleAbonoFactura = ControladorFacturasTiendas::ctrDetalleAbonoFactura($serieFacturaPrev,$folioFacturaPrev,$abonoFacturaPrev);	

				/**************ESTRUCTURA LOGICA DE REAGRUPACION DE NUMERO DE PARCIALES Y PENDIENTES FACTURA****/

				if ($serieFacturaPrev == "") {

					$numeroParcial =  1;
					$pendienteFactura = $totalDetalleFactura-$abono;
				
					

				}
				else if ($serieFactura == $serieFacturaPrev and $folioFactura == $folioFacturaPrev and $totalDetalleFactura == $totalDetalleFacturaPrev ) {
					$numeroParcial = $detalleAbonoFactura[0]["numeroParcial"] + 1;

					$pendienteFactura = $detalleAbonoFactura[0]["pendienteFactura"]-$abono;
					
					
					
				}else{

					$numeroParcial =  1;
					$pendienteFactura = $totalDetalleFactura-$abono;
					
					
					
				}
				
				$item4 = 'numeroParcial';
				$valor4 = $numeroParcial;

				$item5 = 'pendienteFactura';
				$valor5 = $pendienteFactura;

				$actualizarNumeroParciales = ControladorFacturasTiendas::ctrActualizarParcialesAbonos($item,$valor,$item2,$valor2,$item3,$valor3,$item4, $valor4,$item5,$valor5);

				echo json_encode($actualizarNumeroParciales);
				
		}

	}

	public $idMovimientoBancarioMovimiento;
	public $conceptoAbonoMovimiento;
	public $clientesAbonoMovimiento;
	public $parcialesAbonoMovimiento;
	public $saldoPendienteMovimiento;
	public $abonoMovimiento;
	public $nombreSucursalMovimiento;
	public $numeroParcialesMovimiento;
	public $fechaAbonoMovimiento;
	public $totalDocumentoMovimiento;
	public $totalAbonadoMovimiento;
	public $listaSpanMovimiento;
	public $bancoMovimiento;

	public function ajaxGenerarDepositoBancario(){

		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoBancarioMovimiento;

		$item2 = "concepto";
		$valor2 = $this->conceptoAbonoMovimiento;

		$item3 = "acreedor";
		$valor3 = $this->clientesAbonoMovimiento;

		/***LISTA DE FACTURAS ***/
		$item4 = "parcialesAbonoMovimiento";
		$valor4 = $this->parcialesAbonoMovimiento;

		$montoFacturas = explode(',',$valor4);
		$conceptoFacturas = explode(',',$valor2);
		$totalValorDocumento = explode(',',$this->totalDocumentoMovimiento);
		$clientes = explode(',',$valor3);

		$arregloDocumentoFinal = new MultipleIterator();
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($clientes));
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($montoFacturas));
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($conceptoFacturas));
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($totalValorDocumento));

		$sumaParciales = "";

		$tabla = $this->bancoMovimiento;
		$movimientoB = "id";
		$movimientoBanco = $this->idMovimientoBancarioMovimiento;
		$limpiarParciales = ControladorFacturasTiendas::ctrLimpiarParcialesAbonosGenerales($tabla,$movimientoB,$movimientoBanco);


		foreach ($arregloDocumentoFinal as $key => $value) {
		    list($nombreCliente,$totalAbono, $datFactura, $totalDocumentoMovimiento) = $value;
		    list($keyT) = $key;

		    $datFact = explode(' ',$datFactura);
			$serieFac = $datFact[0];
			$folioFac = $datFact[1];

			$item = "serieFactura";
			$valor = $serieFac;
			$item2 = "folioFactura";
			$valor2 = $folioFac;

			$verAbonadoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFacturaAbonos($item,$valor,$item2,$valor2);
			
			if($verAbonadoFactura[0]["pendienteFactura"] == 0){

				$pendienteFactura = $totalDocumentoMovimiento-$totalAbono;
				$numeroParcial = $verAbonadoFactura[0]["numeroParcial"];

			}else{

				$pendienteFactura = $verAbonadoFactura[0]["pendienteFactura"]-$totalAbono;
				$numeroParcial = $verAbonadoFactura[0]["numeroParcial"]+1;

			}
			
			$datosAbono = array('idMovimientoBanco' => $movimientoBanco,
								'serieAbono' => 'ABGM',
								'serieFactura' => $serieFac,
								'folioFactura' => $folioFac,
								'totalAbono' => $totalAbono,
								'pendienteFactura' => number_format(str_replace(',','',$pendienteFactura),2, '.', ''),
								'creadorAbono' => $_SESSION["id"],
								'numeroParcial' => $numeroParcial,
								'conceptoAbono' => 'ABONO CLIENTE',
								'idAjusteSaldo' => '0');

			$buscarAbono =  ControladorFacturasTiendas::ctrBuscarAbonosRealizados($datosAbono);

			if ($buscarAbono[0] == 0) {

				$generarAbono = ControladorFacturasTiendas::ctrGenerarAbonoFactura($datosAbono);
				
			}else{



			}
			

		}
		$arregloTemporal = array();
		foreach ( $arregloDocumentoFinal as $elemento ) {
		    if ( array_key_exists($elemento[0],$arregloTemporal) ) {
		        $arregloTemporal[$elemento[0]] += $elemento[1];
		    } else {
		        $arregloTemporal[$elemento[0]] = $elemento[1];
		    }
		}
		$arregloFacturasFinal = array();
		foreach ($arregloTemporal as $key => $value) {
		    array_push($arregloFacturasFinal,array($key,$value));
		}
		
		foreach ($arregloFacturasFinal as $keyT => $value) {
			if($keyT == 0){

				$llave = $keyT+1;
				$campo = "parcial";
				$campo2 = "departamentoParcial$llave";


			}else if($keyT == 1){
				$llave = $keyT+1;

				$campo = "parcial$llave";
				$campo2 = "departamentoParcial$llave";

			}else{

				$llave = $keyT+1;

				$campo = "parcial$llave";
				$campo2 = "departamentoParcial$llave";


			}

			$parcial = $value[1];
	
			$valorSucursal = $this->nombreSucursalMovimiento;


			switch ($valorSucursal) {
				case 'Sucursal San Manuel':

		        $departamento2 = "SAN MANUEL";

		        break;
		      case 'Sucursal Capu':

		        $departamento2 = "CAPU";

		        break;
		      case 'Sucursal Reforma':

		        $departamento2 = "REFORMA";

		        break;
		      case 'Sucursal Las Torres':

		        $departamento2 = "LAS TORRES";

		        break;
		      case 'Sucursal Santiago':

		        $departamento2 = "SANTIAGO";

		        break;
		      case 'Mayoreo':

		        $departamento2 = "CEDIS";

		        break;
		      case 'Rutas':

		        $departamento2 = "RUTAS";

		        break;
		      case 'Industrial':

		        $departamento2 = "INDUSTRIAL";

		        break;
			}
			$tabla = $this->bancoMovimiento;
			$movimiento = 'id';
			$movimientoBanco  = $this->idMovimientoBancarioMovimiento;

			$itemParciales = 'importeParciales';
			$sumaParciales += $value[1];
			
			$insertarParciales = ControladorFacturasTiendas::ctrInsertarParcialesAbonosGenerales($tabla,$campo,$parcial,$campo2,$departamento2,$movimiento,$movimientoBanco,$itemParciales,$sumaParciales);
		}


		/***LISTA DE FACTURAS ***/
		$saldo = "saldoPendiente";
		$valorSaldo = $this->saldoPendienteMovimiento;

		$sucursal = "sucursal";
		$valorSucursal = $this->nombreSucursalMovimiento;

		switch ($valorSucursal) {
			case 'Sucursal San Manuel':

	        $valorIdSucursal = "53";
	        $departamento = "SAN MANUEL";

	        break;
	      case 'Sucursal Capu':

	        $valorIdSucursal = "57";
	        $departamento = "CAPU";

	        break;
	      case 'Sucursal Reforma':

	        $valorIdSucursal = "56";
	        $departamento = "REFORMA";

	        break;
	      case 'Sucursal Las Torres':

	        $valorIdSucursal = "55";
	        $departamento = "LAS TORRES";

	        break;
	      case 'Sucursal Santiago':

	        $valorIdSucursal = "54";
	        $departamento = "SANTIAGO";

	        break;
	      case 'Mayoreo':
	      	$valorIdSucursal = "13";
		    $departamento = "CEDIS";

		    break;
		  case 'Rutas':
		  	$valorIdSucursal = "15";
		    $departamento = "RUTAS";

		    break;
		  case 'Industrial':
		  	$valorIdSucursal = "59";
		    $departamento = "INDUSTRIAL";

		    break;
		}



		$abonoBanco = $this->abonoMovimiento;
		if ($valorSaldo != 0 AND $valorSaldo < $abonoBanco) {
				
			$estatus = "SALDO PENDIENTE";

		}else if ($valorSaldo == 0) {

			$estatus = "COMPLETADO";
		}

		
		$item5 = "parciales";
		$valor5 = $this->numeroParcialesMovimiento;

		$item6 = "departamento";
		$valor6 = $departamento;

		$mesAbono = $this->fechaAbonoMovimiento;
		$mesActual = substr($mesAbono,3,2);
		
		switch ($mesActual) {
			case '01':
				$mes = 'ENERO';
				break;
			case '02':
				$mes = 'FEBRERO';
				break;
			case '03':
				$mes = 'MARZO';
				break;
			case '04':
				$mes = 'ABRIL';
				break;
			case '05':
				$mes = 'MAYO';
				break;
			case '06':
				$mes = 'JUNIO';
				break;
			case '07':
				$mes = 'JULIO';
				break;
			case '08':
				$mes = 'AGOSTO';
				break;
			case '09':
				$mes = 'SEPTIEMBRE';
				break;
			case '10':
				$mes = 'OCTUBRE';
				break;
			case '11':
				$mes = 'NOVIEMBRE';
				break;
			case '12':
				$mes = 'DICIEMBRE';
				break;
			default:
				
				break;
		}

		$item7 = "mes";
		$valor7 = $mes;

		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoBancarioMovimiento;

		$item2 = "concepto";
		$valor2 = $this->conceptoAbonoMovimiento;

		$item8 = "abonadoDeposito";
		$valor8 = $this->totalAbonadoMovimiento;

		$item9 = "concepto";
		date_default_timezone_set('America/Mexico_City');
		$fechaBanco = date('d-m-Y H:i:s');
		$valor9 = ControladorFacturasTiendas::conceptoBanco($fechaBanco);

		$montosFacturas = $this->parcialesAbonoMovimiento;
		$conceptosFacturas = $this->conceptoAbonoMovimiento;
		$clientesFacturas = $this->clientesAbonoMovimiento;
		/*SEGMENTAR SI HAY CLIENTES REPETIDOS*/
		$numeroDocumento = "numeroDocumento";
		$listaclientesAbonoMovimiento = explode(',',$this->clientesAbonoMovimiento);
		$listaclientesAbonoMovimiento = array_unique($listaclientesAbonoMovimiento);
		$listaclientesAbonoMovimiento = implode(',',$listaclientesAbonoMovimiento);

		$listaFacturasAbono = explode(',',$this->conceptoAbonoMovimiento);
	
		$resultado = array();
		for ($i=0; $i < count($listaFacturasAbono); $i++) { 

			if ($i == 0) {
				$resultado[] = $listaFacturasAbono[$i];
			}else{
				$resultado[] = Trim(substr($listaFacturasAbono[$i], -5, 5));
			}
			

		}
		$listaFacturasAbono = implode(',',$resultado);
	
		/*SEGMENTAR SI HAY CLIENTES REPETIDOS*/
		$totalValorDocumentos = $this->totalDocumentoMovimiento;

		$span = $this->listaSpanMovimiento;
		$bancoElegidoMov = $this->bancoMovimiento;
		$tabla2 = $this->bancoMovimiento;

		$consultarDepositoBanco = ControladorFacturasTiendas::ctrBuscarDepositoBancario($tabla2,$item,$valor);

		if ($consultarDepositoBanco[0] == 0) {
				
			$respuesta = ControladorFacturasTiendas::ctrGenerarNuevoDepositoBanco($item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span,$bancoElegidoMov);

		}else{

			$respuesta = ControladorFacturasTiendas::ctrActualizarNuevoDepositoBanco($item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span);

			echo json_encode($respuesta);

		}

		$tabla = $this->bancoMovimiento;
		$respuesta2 = ControladorFacturasTiendas::ctrGuardarDatosDepositoBancoGenerales($tabla,$item,$valor,$numeroDocumento,$listaFacturasAbono,$item3,$listaclientesAbonoMovimiento,$item5,$valor5,$item6,$valor6,$item7,$valor7,$item9,$valor9);

		echo json_encode($respuesta2);
		


	}
	/*************OBTENER LOS DATOS DEL MOVIMIENTO BANCARIO***********/
	public $bancoElegido;
	public $idMovimientoBancoElegido;

	public function ajaxBuscarDetallesDeposito(){

		$tabla = $this->bancoElegido;

		$item = "idMovimientoBanco";
		$valor = $this->idMovimientoBancoElegido;

		$respuesta = ControladorFacturasTiendas::ctrMostrarDepositosTiendasGenerales($tabla,$item,$valor);

		echo json_encode($respuesta);

	}
	public $identificadorFactura;
	public $serieFacturaCred;
	public function ajaxActualizarEnviadoCredito(){

		$serie = $this->serieFacturaCred;

		if ($serie == 'FACD' || $serie == 'FAND' || $serie == 'FAPB' || $serie == 'DOPR' || $serie == 'DFPR') {
			$tabla = "facturasgenerales";
		}else{
			$tabla = "facturastiendas";
		}
		

		date_default_timezone_set('America/Mexico_City');
		$fechaEnviado = date('Y-m-d H:i:s');
	

		$arreglo = array("id" => $this->identificadorFactura,
			             "horaEnviado" => $fechaEnviado);

		$respuesta = ControladorFacturasTiendas::ctrActualizarEnviadoCredito($tabla,$arreglo);

		echo json_encode($respuesta);

	}
	public $identificadorFacturaConfirm;
	public $serieFacturaConfirm;
	public function ajaxActualizarRecibidoCredito(){

		$serie = $this->serieFacturaConfirm;

		if ($serie == 'FACD' || $serie == 'FAND' || $serie == 'FAPB' || $serie == 'DOPR' || $serie == 'DFPR') {
			$tabla = "facturasgenerales";
		}else{
			$tabla = "facturastiendas";
		}

		date_default_timezone_set('America/Mexico_City');
		$fechaRecibido = date('Y-m-d H:i:s');

		$arreglo = array("id" => $this->identificadorFacturaConfirm,
			             "horaRecibido" => $fechaRecibido);

		$respuesta = ControladorFacturasTiendas::ctrActualizarRecibidoCredito($tabla,$arreglo);

		echo json_encode($respuesta);

	}
	public $rutaArchivos;
	public function ajaxObtenerArchivosCargadosCreditos(){

		$archivo  = $this->rutaArchivos;

		if (file_exists($archivo)) {

			$archivos = scandir("../archivosCredito/".$this->rutaArchivos."/");
			
		}else{

			mkdir("../archivosCredito/".$archivo."", 0777, true);

			$archivos = scandir("../archivosCredito/".$this->rutaArchivos."/");

		}
		
		echo json_encode($archivos);

	}
	public $nombreArchivo;
	public function ajaxEliminarArchivoCredito(){

		
		$eliminar  = unlink("../archivosCredito/".$this->nombreArchivo."");

		if ($eliminar ===  true) {
			
			$exito = "true";
		}else{
			$exito = "false";
		}
		
		echo json_encode($exito);

	}
	public $identificadorFacturaUpload;
	public $serieFacturaUpload;

	public function ajaxActualizarDocumentosCredito(){

		$serie = $this->serieFacturaUpload;

		if ($serie == 'FACD' || $serie == 'FAND' || $serie == 'FAPB' || $serie == 'DOPR' || $serie == 'DFPR') {
			$tabla = "facturasgenerales";
		}else{
			$tabla = "facturastiendas";
		}

		date_default_timezone_set('America/Mexico_City');
		$fechaRecibido = date('Y-m-d H:i:s');

		$usuario = $_SESSION["id"];

		$arreglo = array("id" => $this->identificadorFacturaUpload,
			             "horaSubida" => $fechaRecibido,
			         	 "idUsuarioCarga" => $usuario);

		$respuesta = ControladorFacturasTiendas::ctrActualizarSubidaDocumentosCredito($tabla,$arreglo);

		echo json_encode($respuesta);

	}
	public $identificadorFacturaLoad;
	public $serieFacturaLoad;

	public function ajaxCargarDatosDocumentosCredito(){

		$serie = $this->serieFacturaLoad;

		if ($serie == 'FACD' || $serie == 'FAND' || $serie == 'FAPB' || $serie == 'DOPR' || $serie == 'DFPR') {
			$tabla = "facturasgenerales";
		}else{
			$tabla = "facturastiendas";
		}
	

		$item = "id";
		$valor = $this->identificadorFacturaLoad;

		$respuesta = ControladorFacturasTiendas::ctrMostrarDetallesDocumentosCredito($tabla,$item,$valor);

		echo json_encode($respuesta);

	}
	public $sucursalComercial;
	public function ajaxObtenerFacturasTiendasComercial(){

			if ($this->sucursalComercial != "Sucursal Las Torres") {
				include("../modelos/conexion-api-server-pinturas.modelo.php");
			}else{
				include("../modelos/conexion-api-server-torres.modelo.php");
			}
			
			$hoy = date("d/m/Y");
	        $fecha = str_replace('/', '-', $hoy);
	        $fechaFinal = date('Y-m-d', strtotime($fecha));
	    	//$fechaFinal = '2021-08-17';
	    	$usuario = $_SESSION["nombre"];
			    switch ($usuario) {
                    case 'Sucursal San Manuel':
                        $serie = "FASM";
                        break;
                    case 'Sucursal Reforma':
                        $serie = "FARF";
                        break;
                   	case 'Sucursal Capu':
                        $serie = "FACP";
                        break;
                    case 'Sucursal Las Torres':
                       	$serie = "FATR";
                        break;
                    case 'Sucursal Santiago':
                        $serie = "FASG";
                        break;
 
                }
			
		
			$mostrarFacturas =  "SELECT admDoc.CFECHA,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admCli.CCODIGOCLIENTE,admCli.CRFC,admDoc.CRAZONSOCIAL,admDoc.CFECHAVENCIMIENTO,admCli.CDIASCREDITOCLIENTE,admDoc.CNETO,admDoc.CDESCUENTODOC1,admDoc.CIMPUESTO1,admDoc.CTOTAL,admDoc.CMETODOPAG FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR where admDoc.CFECHA = '".$fechaFinal."' and admDoc.CSERIEDOCUMENTO = '".$serie."' GROUP BY admDoc.CFECHA,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admCli.CCODIGOCLIENTE,admCli.CRFC,admDoc.CRAZONSOCIAL,admDoc.CFECHAVENCIMIENTO,admCli.CDIASCREDITOCLIENTE,admDoc.CNETO,admDoc.CDESCUENTODOC1,admDoc.CIMPUESTO1,admDoc.CTOTAL,admDoc.CMETODOPAG";


            $ejecutar = sqlsrv_query($conne,$mostrarFacturas);
            $i = 0;
           		
           	if (sqlsrv_has_rows($ejecutar) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutar)) {
            	
            	$facturas[$i] = array(
            		 				 "fecha"=>$value["CFECHA"],
            						 "serie" => $value["CSERIEDOCUMENTO"],
            						 "folio" => $value["CFOLIO"],
            						 "codigoCliente" => $value["CCODIGOCLIENTE"],
            						 "rfc" => $value["CRFC"],
            						 "razonSocial" => $value["CRAZONSOCIAL"],
            						 "fechaVencimiento"=>$value["CFECHAVENCIMIENTO"],
            						 "diasCredito" => $value["CDIASCREDITOCLIENTE"],
            						 "neto" => $value["CNETO"],
            						 "descuento" => $value["CDESCUENTODOC1"],
            						 "impuesto" => $value["CIMPUESTO1"],
            						 "total" => $value["CTOTAL"],
            						 "formaPago"=> $value["CMETODOPAG"],
            						 "pendiente" => $value["CTOTAL"]);
            	$i++;
            }
            echo json_encode($facturas);
           	}
         
           
           
           

	}

	public $listadoFacturasComercial;
	
	public function ajaxCargarFacturasComercial(){

			include("../db_connect.php");
			
			
			$lista = $this->listadoFacturasComercial;

			$arregloFacturas = json_decode($lista,true);

			foreach ($arregloFacturas as  $value) {

				$consulta1 = "SELECT * FROM facturastiendas WHERE folio = '".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";

				$ejecutar = mysqli_query($conn, $consulta1) or die("database error:". mysqli_error($conn));
				$fecha = substr($value["fecha"]["date"],0,10);
				$fechaVencimiento  =substr($value["fechaVencimiento"]["date"],0,10);
			
				
				$row_count = mysqli_num_rows($ejecutar);

			
				if ($row_count != 0) {

						switch ($value["formaPago"]) {
                            	case '01':
                            		 $formaPagos = 'EFECTIVO';
                            		break;
                            	case '02':
                            		 $formaPagos = 'CHEQUE NOMINATIVO';
                            		break;
                            	case '03':
                            		 $formaPagos = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS';
                            		break;
                            	case '04':
                            		 $formaPagos = 'TARJETA DE CRÉDITO';
                            		break;
                            	case '05':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '06':
                            		 $formaPagos = 'DINERO ELECTRÓNICO';
                            		break;
                            	case '08':
                            		 $formaPagos = 'VALES DE DESPENSA';
                            		break;
                            	case '12':
                            		 $formaPagos = 'DACIÓN DE PAGO';
                            		break;
                            	case '13':
                            		 $formaPagos = 'PAGO POR SUBROGACIÓN';
                            		break;
                            	case '14':
                            		 $formaPagos = 'PAGO POR CONSIGNACIÓN';
                            		break;
                            	case '15':
                            		 $formaPagos = 'CONDONACIÓN';
                            		break;
                            	case '17':
                            		 $formaPagos = 'COMPENSACIÓN';
                            		break;
                            	case '23':
                            		 $formaPagos = 'NOVACIÓN';
                            		break;
                            	case '24':
                            		 $formaPagos = 'CONFUSIÓN';
                            		break;
                            	case '25':
                            		 $formaPagos = 'REMISIÓN DE DEDUDA';
                            		break;
                            	case '26':
                            		 $formaPagos = 'PRESCRIPCIÓN O CADUCIDAD';
                            		break;
                            	case '27':
                            		 $formaPagos = 'A SATISFACCIÓN DEL ACREEDOR';
                            		break;
                            	case '28':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '29':
                            		 $formaPagos = 'TARJETA DE SERVICIOS';
                            		break;
                            	case '30':
                            		 $formaPagos = 'APLICACIÓN DE ANTICIPOS';
                            		break;
                            	case '31':
                            		 $formaPagos = 'INTERMEDIARIO PAGOS';
                            		break;
                            	case '99':
                            		 $formaPagos = 'POR DEFINIR';
                            		break;
                            	default:
                            		$formaPagos = 'EFECTIVO';
                            		break;
                            }

                            if ($formaPagos == 'POR DEFINIR') {
                            	$formaPago = 'CREDITO';
                            }else{
                            	$formaPago = $formaPagos;
                            }

                        if (strtoupper($formaPago) == "CREDITO") {

							$creditoPendiente = "1";
								
						}else{

							$creditoPendiente = "0";

						}
					
						$actualizarFacturas = "UPDATE facturastiendas set  codigoCliente = '".$value["codigoCliente"]."', rfc = '".$value["rfc"]."', nombreCliente = '".$value["razonSocial"]."', fechaVencimiento = '".$fechaVencimiento."', diasCredito = '".$value["diasCredito"]."', neto = '".str_replace(',','',$value["neto"])."', descuento = '".str_replace(',','',$value["descuento"])."', impuesto = '".str_replace(',','',$value["impuesto"])."', total = '".str_replace(',','',$value["total"])."', creditoPendiente = '".$creditoPendiente."'  WHERE serie = '".$value["serie"]."' and folio = '".str_replace(',','',$value["folio"])."'";
						mysqli_query($conn, $actualizarFacturas) or die("database error:". mysqli_error($conn));


				}else{	

						switch ($value["serie"]) {
							case 'FASM':
								$concepto = "FACTURA SAN MANUEL V 3.3";
								break;
							case 'FARF':
								$concepto = "FACTURA REFORMA V 3.3";
								break;
							case 'FACP':
								$concepto = "FACTURA CAPU V 3.3";
								break;
							case 'FASG':
								$concepto = "FACTURA SANTIAGO V 3.3";
								break;
							case 'FATR':
								$concepto = "FACTURA TORRES";
								break;
						
						}

						switch ($value["formaPago"]) {
                            	case '01':
                            		 $formaPagos = 'EFECTIVO';
                            		break;
                            	case '02':
                            		 $formaPagos = 'CHEQUE NOMINATIVO';
                            		break;
                            	case '03':
                            		 $formaPagos = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS';
                            		break;
                            	case '04':
                            		 $formaPagos = 'TARJETA DE CRÉDITO';
                            		break;
                            	case '05':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '06':
                            		 $formaPagos = 'DINERO ELECTRÓNICO';
                            		break;
                            	case '08':
                            		 $formaPagos = 'VALES DE DESPENSA';
                            		break;
                            	case '12':
                            		 $formaPagos = 'DACIÓN DE PAGO';
                            		break;
                            	case '13':
                            		 $formaPagos = 'PAGO POR SUBROGACIÓN';
                            		break;
                            	case '14':
                            		 $formaPagos = 'PAGO POR CONSIGNACIÓN';
                            		break;
                            	case '15':
                            		 $formaPagos = 'CONDONACIÓN';
                            		break;
                            	case '17':
                            		 $formaPagos = 'COMPENSACIÓN';
                            		break;
                            	case '23':
                            		 $formaPagos = 'NOVACIÓN';
                            		break;
                            	case '24':
                            		 $formaPagos = 'CONFUSIÓN';
                            		break;
                            	case '25':
                            		 $formaPagos = 'REMISIÓN DE DEDUDA';
                            		break;
                            	case '26':
                            		 $formaPagos = 'PRESCRIPCIÓN O CADUCIDAD';
                            		break;
                            	case '27':
                            		 $formaPagos = 'A SATISFACCIÓN DEL ACREEDOR';
                            		break;
                            	case '28':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '29':
                            		 $formaPagos = 'TARJETA DE SERVICIOS';
                            		break;
                            	case '30':
                            		 $formaPagos = 'APLICACIÓN DE ANTICIPOS';
                            		break;
                            	case '31':
                            		 $formaPagos = 'INTERMEDIARIO PAGOS';
                            		break;
                            	case '99':
                            		 $formaPagos = 'POR DEFINIR';
                            		break;
                            	default:
                            		$formaPagos = 'EFECTIVO';
                            		break;
                            }

                            if ($formaPagos == 'POR DEFINIR') {
                            	$formaPago = 'CREDITO';
                            }else{
                            	$formaPago = $formaPagos;
                            }

                        $sucursal = str_replace('Sucursal ','',$_SESSION["nombre"]);

                        $estatus = 'Vigente';

                        if (strtoupper($formaPago) == "CREDITO") {

							$creditoPendiente = "1";
								
						}else{

							$creditoPendiente = "0";

						}
						$cliente = str_replace("'","",$value["razonSocial"]);
						$insertarFacturas = "INSERT INTO facturastiendas(concepto,fechaFactura,serie,folio,codigoCliente,rfc,nombreCliente,fechaVencimiento,diasCredito,cancelado,neto,descuento,impuesto,total,pendiente,pagado,fechaCobro,formaPago,agente,estatus,creditoPendiente) VALUES('".$concepto."','".$fecha."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".$value["codigoCliente"]."','".$value["rfc"]."','".$cliente."','".$fechaVencimiento."','".$value["diasCredito"]."','0','".str_replace(',','',$value["neto"])."','".str_replace(',','',$value["descuento"])."','".str_replace(',','',$value["impuesto"])."','".str_replace(',','',$value["total"])."','".str_replace(',','',$value["pendiente"])."','0','".$fecha."','".strtoupper($formaPago)."','".$sucursal."','".$estatus."','".$creditoPendiente."')";
							mysqli_query($conn, $insertarFacturas) or die("database error:". mysqli_error($conn));


				}
				
			}

			echo  json_encode("finalizado");

	}
	/*=============================================
	ACTUALIZAR FORMA DE PAGO FACTURA TIENDAS
	=============================================*/
	public $idFacturaTiendaPrev;
	public $formaPagoFactura;
	public function ajaxActualizarFormaPagoFactura(){

		$item = "id";
		$valor = $this->idFacturaTiendaPrev;

		$item2 = "formaPago";
		$valor2 = $this->formaPagoFactura;

		$respuesta = ControladorFacturasTiendas::ctrActualizarFormaPagoFactura($item,$valor,$item2,$valor2);

		echo json_encode($respuesta);

	}
	/*=============================================
	ACTUALIZAR ABONADO PARCIAL FACTURAS
	=============================================*/
	public $conceptoAbonoDelete;
	public $parcialesAbonoDelete;
	public $totalDocumentoDelete;
	public function ajaxLimpiarParcialesFacturas(){

			$valor1 = $this->conceptoAbonoDelete;
			$valor2 = $this->parcialesAbonoDelete;
			$valor3 = $this->totalDocumentoDelete;

			$montoFacturas = explode(',',$valor2);
			$conceptoFacturas = explode(',',$valor1);
			$totalFacturas = explode(',',$valor3);

			$arregloDocumentoFinal = new MultipleIterator();
			$arregloDocumentoFinal->attachIterator(new ArrayIterator($montoFacturas));
			$arregloDocumentoFinal->attachIterator(new ArrayIterator($conceptoFacturas));
			$arregloDocumentoFinal->attachIterator(new ArrayIterator($totalFacturas));


			foreach ($arregloDocumentoFinal as $key => $value) {
					$factura = explode(" ",$value[1]);
					$serie = $factura[0];
					$folio = $factura[1];
					$abono = number_format(str_replace(',','',$value[0]),2, '.', '');
					$total = number_format(str_replace(',','',$value[2]),2, '.', '');

					$actualizar = ControladorFacturasTiendas::ctrActualizarAbonoParcial($serie,$folio,$abono,$total);
					


				
			}
			
			$cerrar = "ok";
			echo json_encode($cerrar);

	}
	public $idFacturaCrm;
	public $serieFacturaCrm;
	public $accion;
	public function ajaxActualizarFacturaVinculadaCrm()
	{
		$idFactura = $this->idFacturaCrm;
		$serieFactura = $this->serieFacturaCrm;
		$valor = $this->accion;

		switch ($serieFactura) {
			case 'FASM':
				$tabla = "facturastiendas";
				break;
			case 'FATR':
				$tabla = "facturastiendas";
				break;
			case 'FARF':
				$tabla = "facturastiendas";
				break;
			case 'FASG':
				$tabla = "facturastiendas";
				break;
			case 'FACP':
				$tabla = "facturastiendas";
				break;
			default:
				$tabla = "facturasgenerales";
				break;
		}
		$actualizar = ControladorFacturasTiendas::ctrActualizarFacturaVinculadaCrm($tabla, $idFactura, $valor);
		echo json_encode($actualizar);
	}

	

}


if(isset($_POST["idFactura"])){

	$vincularFactura = new AjaxFacturacionTiendas();
	$vincularFactura -> idFactura = $_POST["idFactura"];
	$vincularFactura -> idFacturaTienda = $_POST["idFacturaTienda"];
	$vincularFactura -> serieFacturaTienda = $_POST["serieFacturaTienda"];
	$vincularFactura -> ajaxVincularFactura();

}

if(isset($_POST["idFacturaVista"])){

	$facturaVinculada = new AjaxFacturacionTiendas();
	$facturaVinculada -> idFacturaVista = $_POST["idFacturaVista"];
	$facturaVinculada -> serieFacturaVista = $_POST["serieFacturaVista"];
	$facturaVinculada -> ajaxVerFacturaVinculada();

}
if(isset($_POST["idCorte"])) {
		
	$efectivoCorte = new AjaxFacturacionTiendas();
	$efectivoCorte -> idCorte = $_POST["idCorte"];
	$efectivoCorte -> idSucursal = $_POST["idSucursal"];
	$efectivoCorte -> ajaxVerEfectivoCaja();
}

if(isset($_POST["serieFacturaDepositada"])) {
		 
	$facturaDepositada = new AjaxFacturacionTiendas();
	$facturaDepositada -> serieFacturaDepositada = $_POST["serieFacturaDepositada"];
	$facturaDepositada -> folioFacturaDepositada = $_POST["folioFacturaDepositada"];
	$facturaDepositada -> abonoFactura = $_POST["abonoFactura"];
	$facturaDepositada -> ajaxAgregarFacturaDepositada();
}
if(isset($_POST["serieFacturaDepositadaRemove"])) {
		
	$facturaDepositadaRemove = new AjaxFacturacionTiendas();
	$facturaDepositadaRemove -> serieFacturaDepositadaRemove = $_POST["serieFacturaDepositadaRemove"];
	$facturaDepositadaRemove -> folioFacturaDepositadaRemove = $_POST["folioFacturaDepositadaRemove"];
	$facturaDepositadaRemove -> abonoFacturaRemove = $_POST["abonoFacturaRemove"];
	$facturaDepositadaRemove -> idMovimientoBancoRemove = $_POST["idMovimientoBancoRemove"];
	$facturaDepositadaRemove -> ajaxQuitarFacturaDepositada();
}
if(isset($_POST["idMovimientoBancario"])) {
		
	$guardarMovimientoBancario = new AjaxFacturacionTiendas();
	$guardarMovimientoBancario -> idMovimientoBancario = $_POST["idMovimientoBancario"];
	$guardarMovimientoBancario -> conceptoAbono = $_POST["conceptoAbono"];
	$guardarMovimientoBancario -> clientesAbono = $_POST["clientesAbono"];
	$guardarMovimientoBancario -> parcialesAbono = $_POST["parcialesAbono"];
	$guardarMovimientoBancario -> saldoPendiente = $_POST["saldoPendiente"];
	$guardarMovimientoBancario -> abono = $_POST["abono"];
	$guardarMovimientoBancario -> nombreSucursal = $_POST["nombreSucursal"];
	$guardarMovimientoBancario -> numeroParciales = $_POST["numeroParciales"];
	$guardarMovimientoBancario -> fechaAbono = $_POST["fechaAbono"];
	$guardarMovimientoBancario -> totalDocumento = $_POST["totalDocumento"];
	$guardarMovimientoBancario -> totalAbonado = $_POST["totalAbonado"];
	$guardarMovimientoBancario -> listaSpan = $_POST["listaSpan"];
	$guardarMovimientoBancario -> ajaxGuardarDepositoBancario();
}
if (isset($_POST["idSolicitud"])) {
	
	$verDetalle =  new AjaxFacturacionTiendas();
	$verDetalle -> idSolicitud = $_POST["idSolicitud"];
	$verDetalle -> ajaxVerDetalleTicket();
}
if (isset($_POST["idMovimientoBancoDesglose"])) {
	
	$verDesgloseAbono =  new AjaxFacturacionTiendas();
	$verDesgloseAbono -> idMovimientoBancoDesglose = $_POST["idMovimientoBancoDesglose"];
	$verDesgloseAbono -> ajaxDesgloseAbonosBanco();
}
if (isset($_POST["idMovimientoRecibo"])) {
	
	$actualizarVistaRecibo =  new AjaxFacturacionTiendas();
	$actualizarVistaRecibo -> idMovimientoRecibo = $_POST["idMovimientoRecibo"];
	$actualizarVistaRecibo -> ajaxGenerarReciboCaja();
}
if(isset($_POST["folioFiscal"])){

	$validarFolioFiscal =  new AjaxFacturacionTiendas();
	$validarFolioFiscal -> folioFiscal = $_POST["folioFiscal"];
	$validarFolioFiscal -> ajaxValidarFolioFiscal();
}

/******RECOGER LOS VALORES DE LA SOLICITUD DE AJUSTE DE REMANENTES*******/
if (isset($_POST["valorAjuste"])) {

	$generarAjusteSaldo = new AjaxFacturacionTiendas();
	$generarAjusteSaldo -> valorAjuste = $_POST["valorAjuste"];
	$generarAjusteSaldo -> fechaInicioAjuste = $_POST["fechaInicioAjuste"];
	$generarAjusteSaldo -> fechaFinAjuste = $_POST["fechaFinAjuste"];
	$generarAjusteSaldo -> concepto = $_POST["concepto"];
	$generarAjusteSaldo -> ajaxGenerarAjusteSaldoRemanentes();
}
/*******************FONDO CAJA *************************************/
if(isset($_POST["fondoCaja"])){

	$generarCorteCaja =  new AjaxFacturacionTiendas();
	$generarCorteCaja -> fondoCaja = $_POST["fondoCaja"];
	$generarCorteCaja -> folioCorteCajaInicial = $_POST["folioCorteCajaInicial"];
	$generarCorteCaja -> ajaxGenerarCorteCaja();

}
if (isset($_POST["folioCorteCaja"])) {
	
	$denominaciones =  new AjaxFacturacionTiendas();
	$denominaciones -> folioCorteCaja = $_POST["folioCorteCaja"];
	$denominaciones -> arregloDenominaciones = $_POST["arregloDenominaciones"];
	$denominaciones -> totalDenominaciones = $_POST["totalDenominaciones"];
	$denominaciones -> ajaxCargarDenominacionesCorte();
}
if(isset($_POST["folioCorte"])) {
		
	$detalleCorte = new AjaxFacturacionTiendas();
	$detalleCorte -> folioCorte = $_POST["folioCorte"];
	$detalleCorte -> ajaxDetallesFormaPagoCorteCaja();
}
if(isset($_POST["folioCorteCajaDetalle"])){

	$cargarMetodosPago = new AjaxFacturacionTiendas();
	$cargarMetodosPago -> folioCorteCajaDetalle = $_POST["folioCorteCajaDetalle"];
	$cargarMetodosPago -> efectivoDetalle = $_POST["efectivoDetalle"];
	$cargarMetodosPago -> chequeDetalle = $_POST["chequeDetalle"];
	$cargarMetodosPago -> transferenciaDetalle = $_POST["transferenciaDetalle"];
	$cargarMetodosPago -> tarjetaDebitoDetalle = $_POST["tarjetaDebitoDetalle"];
	$cargarMetodosPago -> tarjetaCreditoDetalle = $_POST["tarjetaCreditoDetalle"];
	$cargarMetodosPago -> porDefinirDetalle = $_POST["porDefinirDetalle"];
	$cargarMetodosPago -> creditoDetalle = $_POST["creditoDetalle"];
	$cargarMetodosPago -> importeVenta = $_POST["importeVenta"];
	$cargarMetodosPago -> ajaxCargarFormasPagoCorte();

}
if(isset($_POST["valorFinalizado"])) {
		
	$finalizarCorte = new AjaxFacturacionTiendas();
	$finalizarCorte -> valorFinalizado = $_POST["valorFinalizado"];
	$finalizarCorte -> folioCorteCajaEdit = $_POST["folioCorteCajaEdit"];
	$finalizarCorte -> observacionesCorte = $_POST["observacionesCorte"];
	$finalizarCorte -> ajaxFinalizarCorteCaja();
}
if (isset($_POST["folioCorteCajaVistaDetalle"])) {

	$vistaDetalleCorte =  new AjaxFacturacionTiendas();
	$vistaDetalleCorte -> folioCorteCajaVistaDetalle = $_POST["folioCorteCajaVistaDetalle"];
	$vistaDetalleCorte -> ajaxVistaDetalleCorte();	
}
if (isset($_POST["folioAjusteRecibo"])) {
	
	$generarReciboAjuste =  new AjaxFacturacionTiendas();
	$generarReciboAjuste -> folioAjusteRecibo = $_POST["folioAjusteRecibo"];
	$generarReciboAjuste -> ajaxGenerarReciboAjuste();
}
if (isset($_POST["nombreCliente"])) {
	
	$generarFacturasCobros =  new AjaxFacturacionTiendas();
	$generarFacturasCobros -> nombreCliente = $_POST["nombreCliente"];
	$generarFacturasCobros -> fechaCobroCorte = $_POST["fechaCobroCorte"];
	$generarFacturasCobros -> sucursalCobroCorte = $_POST["sucursalCobroCorte"];
	$generarFacturasCobros -> ajaxGenerarFacturasCobros();
}
if (isset($_POST["idFacturaPendiente"])) {
	$actualizarPagoPendiente = new AjaxFacturacionTiendas();
	$actualizarPagoPendiente -> idFacturaPendiente = $_POST["idFacturaPendiente"];
	$actualizarPagoPendiente -> formaPagoPendiente = $_POST["formaPagoPendiente"];
	$actualizarPagoPendiente -> pendientePago = $_POST["pendientePago"];
	$actualizarPagoPendiente -> cobradoPendiente = $_POST["cobradoPendiente"];
	$actualizarPagoPendiente -> ajaxActualizarFacturaPagoPendiente();
}
/*====================================================================
=            FUNCIONES PARA DEPOSITOS FACTURAS CORTE CAJA            =
====================================================================*/
if(isset($_POST["serieFacturaDepositadaMovimiento"])) {
		 
	$facturaDepositada = new AjaxFacturacionTiendas();
	$facturaDepositada -> serieFacturaDepositadaMovimiento = $_POST["serieFacturaDepositadaMovimiento"];
	$facturaDepositada -> folioFacturaDepositadaMovimiento = $_POST["folioFacturaDepositadaMovimiento"];
	$facturaDepositada -> abonoFacturaMovimiento = $_POST["abonoFacturaMovimiento"];
	$facturaDepositada -> ajaxInsertarFacturaDepositada();
}
if(isset($_POST["serieFacturaDepositadaMovimientoRemove"])) {
		
	$facturaDepositadaRemove = new AjaxFacturacionTiendas();
	$facturaDepositadaRemove -> serieFacturaDepositadaMovimientoRemove = $_POST["serieFacturaDepositadaMovimientoRemove"];
	$facturaDepositadaRemove -> folioFacturaDepositadaMovimientoRemove = $_POST["folioFacturaDepositadaMovimientoRemove"];
	$facturaDepositadaRemove -> abonoFacturaMovimientoRemove = $_POST["abonoFacturaMovimientoRemove"];
	$facturaDepositadaRemove -> idMovimientoBancoMovimientoRemove = $_POST["idMovimientoBancoMovimientoRemove"];
	$facturaDepositadaRemove -> ajaxEliminarFacturaDepositada();
}
if(isset($_POST["idMovimientoBancarioMovimiento"])) {
		
	$guardarMovimientoBancario = new AjaxFacturacionTiendas();
	$guardarMovimientoBancario -> idMovimientoBancarioMovimiento = $_POST["idMovimientoBancarioMovimiento"];
	$guardarMovimientoBancario -> conceptoAbonoMovimiento = $_POST["conceptoAbonoMovimiento"];
	$guardarMovimientoBancario -> clientesAbonoMovimiento = $_POST["clientesAbonoMovimiento"];
	$guardarMovimientoBancario -> parcialesAbonoMovimiento = $_POST["parcialesAbonoMovimiento"];
	$guardarMovimientoBancario -> saldoPendienteMovimiento = $_POST["saldoPendienteMovimiento"];
	$guardarMovimientoBancario -> abonoMovimiento = $_POST["abonoMovimiento"];
	$guardarMovimientoBancario -> nombreSucursalMovimiento = $_POST["nombreSucursalMovimiento"];
	$guardarMovimientoBancario -> numeroParcialesMovimiento = $_POST["numeroParcialesMovimiento"];
	$guardarMovimientoBancario -> fechaAbonoMovimiento = $_POST["fechaAbonoMovimiento"];
	$guardarMovimientoBancario -> totalDocumentoMovimiento = $_POST["totalDocumentoMovimiento"];
	$guardarMovimientoBancario -> totalAbonadoMovimiento = $_POST["totalAbonadoMovimiento"];
	$guardarMovimientoBancario -> listaSpanMovimiento = $_POST["listaSpanMovimiento"];
	$guardarMovimientoBancario -> bancoMovimiento = $_POST["bancoMovimiento"];
	$guardarMovimientoBancario -> ajaxGenerarDepositoBancario();
}
if (isset($_POST["bancoElegido"])) {
	$buscarDatosDeposito = new AjaxFacturacionTiendas();
	$buscarDatosDeposito -> bancoElegido = $_POST["bancoElegido"];
	$buscarDatosDeposito -> idMovimientoBancoElegido = $_POST["idMovimientoBancoElegido"];
	$buscarDatosDeposito -> ajaxBuscarDetallesDeposito();
}
/*=====  End of FUNCIONES PARA DEPOSITOS FACTURAS CORTE CAJA  ======*/
if (isset($_POST["identificadorFactura"])) {
	
	$enviarCredito = new AjaxFacturacionTiendas();
	$enviarCredito -> identificadorFactura = $_POST["identificadorFactura"];
	$enviarCredito -> serieFacturaCred = $_POST["serieFacturaCred"];
	$enviarCredito -> ajaxActualizarEnviadoCredito();
}
if (isset($_POST["identificadorFacturaConfirm"])) {
	
	$confirmarCredito = new AjaxFacturacionTiendas();
	$confirmarCredito -> identificadorFacturaConfirm = $_POST["identificadorFacturaConfirm"];
	$confirmarCredito -> serieFacturaConfirm = $_POST["serieFacturaConfirm"];
	$confirmarCredito -> ajaxActualizarRecibidoCredito();
}
if (isset($_POST["rutaArchivos"])) {
	
	$obtenerArchivos = new AjaxFacturacionTiendas();
	$obtenerArchivos -> rutaArchivos = $_POST["rutaArchivos"];
	$obtenerArchivos -> ajaxObtenerArchivosCargadosCreditos();
}
if (isset($_POST["nombreArchivo"])) {
	
	$eliminarArchivo = new AjaxFacturacionTiendas();
	$eliminarArchivo -> nombreArchivo = $_POST["nombreArchivo"];
	$eliminarArchivo -> ajaxEliminarArchivoCredito();
}
if (isset($_POST["identificadorFacturaUpload"])) {
	
	$documentosCredito = new AjaxFacturacionTiendas();
	$documentosCredito -> identificadorFacturaUpload = $_POST["identificadorFacturaUpload"];
	$documentosCredito -> serieFacturaUpload = $_POST["serieFacturaUpload"];
	$documentosCredito -> ajaxActualizarDocumentosCredito();
}
if (isset($_POST["identificadorFacturaLoad"])) {
	
	$detalleDocumentos = new AjaxFacturacionTiendas();
	$detalleDocumentos -> identificadorFacturaLoad = $_POST["identificadorFacturaLoad"];
	$detalleDocumentos -> serieFacturaLoad = $_POST["serieFacturaLoad"];
	$detalleDocumentos -> ajaxCargarDatosDocumentosCredito();
}
if (isset($_POST["sucursalComercial"])) {
	
	$obtenerFacturasTiendas = new AjaxFacturacionTiendas();
	$obtenerFacturasTiendas -> sucursalComercial = $_POST["sucursalComercial"];
	$obtenerFacturasTiendas -> ajaxObtenerFacturasTiendasComercial();
}
/*=============================================
CARGAR FACTURAS COMERCIAL
=============================================*/
if (isset($_POST["listadoFacturasComercial"])) {
	
	$cargarFacturasComercial = new AjaxFacturacionTiendas();
	$cargarFacturasComercial -> listadoFacturasComercial = $_POST["listadoFacturasComercial"];
	$cargarFacturasComercial -> ajaxCargarFacturasComercial();
}
/*=============================================
ACTUALIZAR FORMA DE PAGO FACTURA TIENDAS
=============================================*/
if(isset($_POST["idFacturaTiendaPrev"])){

	$actualizarFormaPago = new AjaxFacturacionTiendas();
	$actualizarFormaPago -> idFacturaTiendaPrev = $_POST["idFacturaTiendaPrev"];
	$actualizarFormaPago -> formaPagoFactura = $_POST["formaPagoFactura"];
	$actualizarFormaPago -> ajaxActualizarFormaPagoFactura();

}
/*=============================================
ACTUALIZAR ABONADO PARCIAL FACTURAS
=============================================*/
if (isset($_POST["conceptoAbonoDelete"])) {
	$limpiarAbonos = new AjaxFacturacionTiendas();
	$limpiarAbonos -> conceptoAbonoDelete = $_POST["conceptoAbonoDelete"];
	$limpiarAbonos -> parcialesAbonoDelete = $_POST["parcialesAbonoDelete"];
	$limpiarAbonos -> totalDocumentoDelete = $_POST["totalDocumentoDelete"];
	$limpiarAbonos -> ajaxLimpiarParcialesFacturas();
}
/*==============================
ACTUALIZAR FACTURA VINCULADA CRM
===============================*/
if (isset($_POST["idFacturaCrm"])) {
	$vincularFacturaCrm =  new AjaxFacturacionTiendas();
	$vincularFacturaCrm->idFacturaCrm = $_POST["idFacturaCrm"];
	$vincularFacturaCrm->serieFacturaCrm = $_POST["serieFacturaCrm"];
	$vincularFacturaCrm->accion = $_POST["accion"];
	$vincularFacturaCrm->ajaxActualizarFacturaVinculadaCrm();
}
