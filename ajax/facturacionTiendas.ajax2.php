<?php
session_start();
error_reporting(E_ALL);
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class AjaxFacturacionTiendas{


	public $idFactura;
	public $idFacturaTienda;

	public function ajaxVincularFactura(){

		$item = "id";
		$valor = $this->idFacturaTienda;

		$item2 = "idNuevaFactura";
		$valor2 = $this->idFactura;

		$respuesta = ControladorFacturasTiendas::ctrVincularNuevaFactura($item, $valor,$item2,$valor2);

		$respuesta2 = ControladorFacturasTiendas::ctrMarcarFacturaRefacturada($item,$valor,$item2,$valor2);

		echo json_encode($respuesta);
		

	}

	public $idFacturaVista;

	public function ajaxVerFacturaVinculada(){

		$item = "id";
		$valor = $this->idFacturaVista;

		$respuesta = ControladorFacturasTiendas::ctrMostrarFacturaVinculada($item,$valor);

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

		if(number_format($verAbonoFactura[0]["abono"],2) == 0){

			$respuesta = ControladorFacturasTiendas::ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			echo json_encode($respuesta);

		}else if(number_format($verAbonoFactura[0]["abono"],2) < number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

			$valor3 = $valor3 + $verAbonoFactura[0]["abono"];

			$respuesta = ControladorFacturasTiendas::ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			echo json_encode($respuesta);

		}else if(number_format($valor3,2) == number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

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

		if(number_format($valor3,2) < number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '')){

			$valor3 = $verAbonoFactura[0]["abono"] - $valor3;

			$valor4 = "1";

			$respuesta = ControladorFacturasTiendas::ctrQuitarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4);

			$verAbonoFactura = ControladorFacturasTiendas::ctrObtenerAbonadoFactura($item,$valor,$item2,$valor2);

			if ($verAbonoFactura[0]["abono"] == "0") {
				
				$item3 = 'depositada';
				$valor3 = "0";

				$respuesta2 = ControladorFacturasTiendas::ctrActualizarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3);

			}

		}else if(number_format(str_replace(',','',$verAbonoFactura[0]["total"]),2, '.', '') == number_format($valor3,2)){


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

		$arregloDocumentoFinal = new MultipleIterator();
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($montoFacturas));
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($conceptoFacturas));
		$arregloDocumentoFinal->attachIterator(new ArrayIterator($totalValorDocumento));

		$sumaParciales = "";

		$movimientoB = "id";
		$movimientoBanco = $this->idMovimientoBancario;
		$limpiarParciales = ControladorFacturasTiendas::ctrLimpiarParcialesAbonos($movimientoB,$movimientoBanco);


		foreach ($arregloDocumentoFinal as $key => $value) {
		    list($totalAbono, $datFactura, $totalDocumento) = $value;
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
								'pendienteFactura' => number_format($pendienteFactura,2),
								'creadorAbono' => $_SESSION["id"],
								'numeroParcial' => $numeroParcial,
								'conceptoAbono' => 'ABONO CLIENTE',
								'idAjusteSaldo' => '0');

			$buscarAbono =  ControladorFacturasTiendas::ctrBuscarAbonosRealizados($datosAbono);

			if ($buscarAbono[0] == 0) {

				$generarAbono = ControladorFacturasTiendas::ctrGenerarAbonoFactura($datosAbono);
				
			}else{



			}
			
			
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

			$parcial = $totalAbono;

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
			}
			$movimiento = 'id';
			$movimientoBanco  = $this->idMovimientoBancario;

			$itemParciales = 'importeParciales';
			$sumaParciales += $totalAbono;
			
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
			default:
				
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

		$montosFacturas = $this->parcialesAbono;
		$conceptosFacturas = $this->conceptoAbono;
		$clientesFacturas = $this->clientesAbono;
		$totalValorDocumentos = $this->totalDocumento;

		$span = $this->listaSpan;

		$consultarDepositoBanco = ControladorFacturasTiendas::ctrBuscarDepositoBancario($item,$valor);

		if ($consultarDepositoBanco[0] == 0) {
				
			$respuesta = ControladorFacturasTiendas::ctrGenerarNuevoDepositoBanco($item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span);

		}else{

			$respuesta = ControladorFacturasTiendas::ctrActualizarNuevoDepositoBanco($item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span);

			echo json_encode($respuesta);

		}


		$respuesta2 = ControladorFacturasTiendas::ctrGuardarDatosDepositoBanco($item,$valor,$item2,$valor2,$item3,$valor3,$item5,$valor5,$item6,$valor6,$item7,$valor7);

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

				$totalAbonado = $abonadoDepositoDeposito + $pendienteAjuste;

				$saldoPendienteFinal = $totalDocumentosDeposito - $totalAbonado;

				if ($saldoPendienteFinal == 0) {
					
					$estatusFinal = "COMPLETADO";
				}else{

					$estatusFinal = "SALDO PENDIENTE";
				}

				$datosDepositoFinal = array('id' => $idDeposito,
											'idMovimientoBanco' => $idMovimientoBancarioDeposito,
											'abonadoDeposito' => $totalAbonado,
											'saldoPendiente' => $saldoPendienteFinal,
											'estatus' => $estatusFinal);


				$saldarFacturaDeposito = ControladorFacturasTiendas::ctrSaldarFacturaDeposito($datosDepositoFinal);
				/***************************************************/

				$datosAbono = array('idMovimientoBanco' => $movimientoBanco,
									'serieAbono' => 'ABGM',
									'serieFactura' => $serieFactura,
									'folioFactura' => $folioFactura,
									'totalAbono' => $pendienteAjuste,
									'pendienteFactura' => number_format($pendienteFactura,2),
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

				$total = number_format($obtenerSaldoFactura["total"],2, '.', '');
				$pagado = number_format($obtenerSaldoFactura["pagado"],2, '.', '');
				$pendiente = number_format($obtenerSaldoFactura["pendiente"],2, '.', '');
				$abono = number_format($obtenerSaldoFactura["abono"],2, '.', '');

				$pagadoFactura = $pagado + $pendiente;
				$pendienteFactura = $total - $pagadoFactura;
				$abonoFactura = $abono + $pendiente;


				$datosSaldado = array('serie' => $serieFactura,
									  'folio' => $folioFactura,
									  'pendiente' => $pendienteFactura,
									  'pagado' => $pagadoFactura,
									  'abono' => $abonoFactura,
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
 			default:
 				
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

		$usuario = $_SESSION["nombre"];
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
			default:
				
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
			default:
				
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
		

		$respuesta =  ControladorFacturasTiendas::ctrActualizarFacturasPagoPendiente($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4);

		echo json_encode($respuesta);

	}
	

}


if(isset($_POST["idFactura"])){

	$vincularFactura = new AjaxFacturacionTiendas();
	$vincularFactura -> idFactura = $_POST["idFactura"];
	$vincularFactura -> idFacturaTienda = $_POST["idFacturaTienda"];
	$vincularFactura -> ajaxVincularFactura();

}

if(isset($_POST["idFacturaVista"])){

	$facturaVinculada = new AjaxFacturacionTiendas();
	$facturaVinculada -> idFacturaVista = $_POST["idFacturaVista"];
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
	$actualizarPagoPendiente -> ajaxActualizarFacturaPagoPendiente();
}
