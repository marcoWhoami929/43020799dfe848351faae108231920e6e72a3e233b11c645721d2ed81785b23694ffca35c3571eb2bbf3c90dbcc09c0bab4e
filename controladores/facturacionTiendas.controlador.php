<?php

class ControladorFacturasTiendas{

	static public function ctrMostrarFacturas($item,$valor,$item2,$valor2){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				$tabla = "facturastiendas";

			}

			$respuesta = ModeloFacturasTiendas::mdlMostrarFacturas($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;


	}
	static public function ctrMostrarFacturasCorte($item,$valor,$item2,$valor2,$item3,$valor3){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{
				if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}
				

			}

			$respuesta = ModeloFacturasTiendas::mdlMostrarFacturasCorte($tabla,$item,$valor,$item2,$valor2,$item3,$valor3);

			return $respuesta;


	}
	static public function ctrMostrarFacturasSaldosPendientes($item,$valor,$item2,$valor2,$item3,$valor3){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}

			$respuesta = ModeloFacturasTiendas::mdlMostrarFacturasSaldosPendientes($tabla,$item,$valor,$item2,$valor2,$item3,$valor3);

			return $respuesta;


	}

	static public function ctrMostrarVentasDiarioTiendas($item,$valor,$item2,$valor2){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

			$tabla = "facturasgenerales";

		}else{

			if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}


		}


		$respuesta = ModeloFacturasTiendas::mdlMostrarVentasDiarioTiendas($tabla,$item,$valor,$item2,$valor2);

		return $respuesta;
	}
	static public function ctrMostrarVentasDiarioTiendasTotal($item,$valor,$item2,$valor2){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

			$tabla = "facturasgenerales";

		}else{

				if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}


		}


		$respuesta = ModeloFacturasTiendas::mdlMostrarVentasDiarioTiendasTotal($tabla,$item,$valor,$item2,$valor2);

		return $respuesta;
	}
	static public function ctrMostrarCobrosDiarioTiendas($item,$valor,$item2,$valor2){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

			$tabla = "facturasgenerales";

		}else{

			if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

				$tabla = "facturasgenerales";

			}else{

				$tabla = "facturastiendas";

			}

		}


		$respuesta = ModeloFacturasTiendas::mdlMostrarCobrosDiarioTiendas($tabla,$item,$valor,$item2,$valor2);

		return $respuesta;
	}
	static public function ctrMostrarCobrosDiarioTiendasTotal($item,$valor,$item2,$valor2){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

			$tabla = "facturasgenerales";

		}else{

			if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

		}


		$respuesta = ModeloFacturasTiendas::mdlMostrarCobrosDiarioTiendasTotal($tabla,$item,$valor,$item2,$valor2);

		return $respuesta;
	}
	static public function ctrMostrarTotalCobrosDiarios($item,$valor,$item2,$valor2){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

			$tabla = "facturasgenerales";

		}else{

			if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

		}


		$respuesta = ModeloFacturasTiendas::mdlMostrarTotalCobrosDiarios($tabla,$item,$valor,$item2,$valor2);

		return $respuesta;
	}
	static public function ctrMostrarCancelacionesTiendas($item,$valor){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

			$tabla = "facturasgenerales";

		}else{

			if ($valor === "FACTURA MAYOREO V 3.3" || $valor === "FACTURA INDUSTRIAL V 3.3" || $valor === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}


		}


		$respuesta = ModeloFacturasTiendas::mdlMostrarCancelacionesTiendas($tabla,$item,$valor);

		return $respuesta;

	}
	static public function ctrMostrarListaFacturasTiendas($item,$valor){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor === "FACTURA MAYOREO V 3.3" || $valor === "FACTURA INDUSTRIAL V 3.3" || $valor === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}


			}


			$respuesta = ModeloFacturasTiendas::mdlMostrarListaFacturasTiendas($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrVincularNuevaFactura($item,$valor,$item2,$valor2,$serie){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{
			  	if ($serie === "FACD" || $serie === "FAND" || $serie === "FAPB" || $serie === "DOPR" || $serie === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}
				

			}


			$respuesta = ModeloFacturasTiendas::mdlVincularNuevaFactura($tabla,$item,$valor,$item2,$valor2,$serie);

			return $respuesta;
	}
	static public function ctrMarcarFacturaRefacturada($item,$valor,$item2,$valor2,$serie){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($serie === "FACD" || $serie === "FAND" || $serie === "FAPB" || $serie === "DOPR" || $serie === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}


			$respuesta = ModeloFacturasTiendas::mdlMarcarFacturaRefacturada($tabla,$item,$valor,$item2,$valor2,$serie);

			return $respuesta;
	}
	static public function ctrMostrarDetalleFacturaVinculada($item,$valor,$serie){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($serie === "FACD" || $serie === "FAND" || $serie === "FAPB" || $serie === "DOPR" || $serie === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}


			$respuesta = ModeloFacturasTiendas::mdlMostrarDetalleFacturaVinculada($tabla,$item,$valor,$serie);

			return $respuesta;

	}
	static public function ctrMostrarFacturaVinculada($item,$valor,$serie){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{
				if ($serie === "FACD" || $serie === "FAND" || $serie === "FAPB" || $serie === "DOPR" || $serie === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}
				

			}


			$respuesta = ModeloFacturasTiendas::mdlMostrarFacturaVinculada($tabla,$item,$valor,$serie);

			return $respuesta;

	}
	static public function ctrMostrarListaCortesCaja($item,$valor,$item2,$valor2){

			$tabla = "cortecaja";

			$respuesta = ModeloFacturasTiendas::mdlMostrarListaCortesCaja($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;

	}
	static public function ctrMostrarEfectivoCaja($item,$valor,$item2,$valor2){

			$tabla = "efectivocaja";

			$respuesta = ModeloFacturasTiendas::mdlMostrarEfectivoCaja($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;

	}
	static public function ctrDetallesFormaPagoCorteCaja($item,$valor,$item2,$valor2,$item3,$valor3){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}
				

			}


			$respuesta = ModeloFacturasTiendas::mdlDetallesFormaPagoCorteCaja($tabla,$item,$valor,$item2,$valor2,$item3,$valor3);

			return $respuesta;

	}
	static public function ctrMostrarDepositosTiendas($item,$valor,$item2,$valor2){
			
			if ($_SESSION["nombre"] == "Sucursal Santiago") {

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Diego Ávila"){

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Aurora Fernandez"){

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

				$tabla = "banco3450";

			}else{

				$tabla = "banco0198";

			}

			$respuesta = ModeloFacturasTiendas::mdlMostrarDepositosTiendas($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;

	}
	static public function ctrMostrarListaFacturasDepositos($item,$valor,$item2,$valor2){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor === "FACTURA MAYOREO V 3.3" || $valor === "FACTURA INDUSTRIAL V 3.3" || $valor === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}


			$respuesta = ModeloFacturasTiendas::mdlMostrarListaFacturasDepositos($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;


	}
	static public function ctrAgregarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor === "FACD" || $valor === "FAND" || $valor === "FAPB" || $valor === "DOPR" || $valor === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}


			$respuesta = ModeloFacturasTiendas::mdlAgregarFacturaDepositada($tabla,$item,$valor,$item2,$valor2,$item3,$valor3);

			return $respuesta;


	}
	static public function ctrQuitarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor === "FACD" || $valor === "FAND" || $valor === "FAPB" || $valor === "DOPR" || $valor === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}


			}


			$respuesta = ModeloFacturasTiendas::mdlQuitarFacturaDepositada($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4);

			return $respuesta;


	}
	static public function ctrBuscarAbonoConParametros($valoresAbono){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlBuscarAbonoConParametros($tabla,$valoresAbono);

			return $respuesta;


	}
	static public function ctrEliminarAbonoRealizado($item,$valor){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlEliminarAbonoRealizado($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrBuscarAbonosPorMovimientoBancario($item,$valor){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlBuscarAbonosPorMovimientoBancario($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrActualizarFacturaDepositada($item,$valor,$item2,$valor2,$item3,$valor3){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor === "FACD" || $valor === "FAND" || $valor === "FAPB" || $valor === "DOPR" || $valor === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}


			$respuesta = ModeloFacturasTiendas::mdlActualizarFacturaDepositada($tabla,$item,$valor,$item2,$valor2,$item3,$valor3);

			return $respuesta;


	}
	static public function ctrGenerarNuevoDepositoBanco($item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span,$bancoElegidoMov){

			if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Administrador General") {

				$tabla = "depositosgenerales";

			}else{

				$tabla = "depositostiendas";

			}

			$respuesta = ModeloFacturasTiendas::mdlGenerarNuevoDepositoBanco($tabla,$item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span,$bancoElegidoMov);

			return $respuesta;


	}
	static public function ctrActualizarNuevoDepositoBanco($item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span){

			if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Administrador General") {

				$tabla = "depositosgenerales";

			}else{

				$tabla = "depositostiendas";

			}

			$respuesta = ModeloFacturasTiendas::mdlActualizarNuevoDepositoBanco($tabla,$item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span);

			return $respuesta;


	}
	static public function ctrBuscarDepositoBancario($item,$valor){

			if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Administrador General") {

				$tabla = "depositosgenerales";

			}else{

				$tabla = "depositostiendas";

			}


			$respuesta = ModeloFacturasTiendas::mdlBuscarDepositoBancario($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrGuardarDatosDepositoBanco($item,$valor,$item2,$valor2,$item3,$valor3,$item5,$valor5,$item6,$valor6,$item7,$valor7,$item9,$valor9){

			if ($_SESSION["nombre"] == "Sucursal Santiago") {

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Diego Ávila"){

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Aurora Fernandez"){

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

				$tabla = "banco3450";

			}else{

				$tabla = "banco0198";

			}

			$respuesta = ModeloFacturasTiendas::mdlGuardarDatosDepositoBanco($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item5,$valor5,$item6,$valor6,$item7,$valor7,$item9,$valor9);

			return $respuesta;


	}
	static public function ctrMostrarDatosClienteFacturas($item,$valor){

			$tabla = "clientes";

			$respuesta = ModeloFacturasTiendas::mdlMostrarDatosClienteFacturas($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrVerDetalleTicket($item,$valor){

			$tabla = "ticket";

			$respuesta = ModeloFacturasTiendas::mdlVerDetalleTicket($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrVerDetalleTicketCancelacion($item,$valor){

			$tabla = "ticket";

			$respuesta = ModeloFacturasTiendas::mdlVerDetalleTicketCancelacion($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrGenerarAbonoFactura($datosAbono){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlGenerarAbonoFactura($tabla,$datosAbono);

			return $respuesta;


	}
	static public function ctrBuscarAbonosRealizados($datosAbono){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlBuscarAbonosRealizados($tabla,$datosAbono);

			return $respuesta;


	}
	static public function ctrObtenerAbonadoFactura($item,$valor,$item2,$valor2){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor === "FACD" || $valor === "FAND" || $valor === "FAPB" || $valor === "DOPR" || $valor === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}

			$respuesta = ModeloFacturasTiendas::mdlObtenerAbonadoFactura($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;


	}
	static public function ctrObtenerAbonadoFacturaPrev($serieFacturaPrev,$folioFacturaPrev){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($serieFacturaPrev === "FACD" || $serieFacturaPrev === "FAND" || $serieFacturaPrev === "FAPB" || $serieFacturaPrev === "DOPR" || $serieFacturaPrev === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}

			$respuesta = ModeloFacturasTiendas::mdlObtenerAbonadoFacturaPrev($tabla,$serieFacturaPrev,$folioFacturaPrev);

			return $respuesta;


	}

	static public function ctrObtenerAbonadoFacturaAbonos($item,$valor,$item2,$valor2){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlObtenerAbonadoFacturaAbonos($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;


	}

	static public function ctrDetalleAbonoFactura($serieFacturaPrev,$folioFacturaPrev,$abonoFacturaPrev){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlDetalleAbonoFactura($tabla,$serieFacturaPrev,$folioFacturaPrev,$abonoFacturaPrev);

			return $respuesta;


	}
	static public function ctrActualizarParcialesAbonos($item,$valor,$item2,$valor2,$item3,$valor3,$item4, $valor4,$item5,$valor5){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlActualizarParcialesAbonos($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item4, $valor4,$item5,$valor5);

			return $respuesta;


	}
	static public function ctrObtenerAbonoRealizadoDeposito($item,$valor){

			$tabla = "depositostiendas";

			$respuesta = ModeloFacturasTiendas::mdlObtenerAbonoRealizadoDeposito($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrSaldarFacturaDeposito($datosDepositoFinal){

			$tabla = "depositostiendas";

			$respuesta = ModeloFacturasTiendas::mdlSaldarFacturaDeposito($tabla,$datosDepositoFinal);

			return $respuesta;


	}
	static public function ctrInsertarParcialesAbonos($campo,$parcial,$campo2,$departamento2,$movimiento,$movimientoBanco,$itemParciales,$sumaParciales){

			if ($_SESSION["nombre"] == "Sucursal Santiago") {

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Diego Ávila"){

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Aurora Fernandez"){

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

				$tabla = "banco3450";

			}else{

				$tabla = "banco0198";

			}

			$respuesta = ModeloFacturasTiendas::mdlInsertarParcialesAbonos($tabla,$campo,$parcial,$campo2,$departamento2,$movimiento,$movimientoBanco,$itemParciales,$sumaParciales);

			return $respuesta;

	}
	static public function ctrLimpiarParcialesAbonos($movimientoB,$movimientoBanco){

			if ($_SESSION["nombre"] == "Sucursal Santiago") {

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Diego Ávila"){

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Aurora Fernandez"){

				$tabla = "banco6278";

			}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

				$tabla = "banco3450";

			}else{

				$tabla = "banco0198";

			}

			$respuesta = ModeloFacturasTiendas::mdlLimpiarParcialesAbonos($tabla,$movimientoB,$movimientoBanco);

			return $respuesta;

	}
	static public function ctrMostrarGastos($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlMostrarGastos($tabla,$item,$valor);

			return $respuesta;


	}
	/*=============================================
	CREAR NUEVO GASTO
	=============================================*/

	static public function ctrCrearNuevoGasto(){

		if(isset($_POST["departamento"])){

			if(isset($_POST["departamento"])){

				$tabla = "gastos";
				$tabla2 = "bitacora";
				$usuario = $_SESSION["id"];

				$consultarFolioGasto = ModeloFacturasTiendas::mdlMostrarFolioDisponibleGasto();

				$folioGasto = $consultarFolioGasto["folioGasto"];

				$datos = array("serieGasto" => "SGM",
							   "folioGasto" => $folioGasto,
							   "departamento" => $_POST["departamento"],
					           "grupo" => $_POST["grupo"],
					           "subgrupo" => $_POST["subgrupo"],
					           "mes" => $_POST["mes"],
					           "fecha" => $_POST["fecha"],
					           "descripcion" => trim($_POST["descripcion"]),
					           "importeGasto" => trim($_POST["importeGasto"]),
					           "acreedor" => trim($_POST["acreedor"]),
					           "numeroDocumento" => trim($_POST["numeroDocumento"]),
					           "tieneIva" => $_POST["tieneIva"],
					           "tieneRetenciones" => $_POST["tieneRetenciones"],
					           "tipoRetencion" => $_POST["tipoRetencion"],
					           "importeRetenciones" => $_POST["importeRetenciones"],
					       	   "idCreador" => $usuario); 



				$datos2 = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Creación de Nuevo Gasto',
								   "folio" => $folioGasto);

			
				$respuesta = ModeloFacturasTiendas::mdlCrearNuevoGasto($tabla, $datos);
				$respuesta = ModeloFacturasTiendas::mdlRegistroBitacoraAgregar($tabla2, $datos2);
				$respuesta = ModeloFacturasTiendas::mdlCalcularImpuestos($tabla,$folioGasto);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Gasto Generado Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
								gastosTiendas.ajax.reload();
							
						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar el gasto",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							gastosTiendas.ajax.reload();

						}

					});
				

				</script>';

			}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar el proceso",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							gastosTiendas.ajax.reload();

						}

					});
				

				</script>';

			}




		}


	}
	static public function ctrMostrarDatosGasto($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlMostrarDatosGasto($tabla,$item,$valor);

			return $respuesta;


	}
	/*=============================================
	EDITAR GASTO
	=============================================*/

	static public function ctrEditarGasto(){

		if(isset($_POST["idGasto"])){

				

					$tabla = "gastos";
					$tabla2 = "bitacora";
					$folioGasto = $_POST["editarFolioGasto"];

					if($_POST["editarTieneRetenciones"] == '01'){

						$tipoRetencion =  $_POST["editarTipoRetencion"];
						$importeRetenciones = $_POST["editarImporteRetenciones"];

					}else{

						$tipoRetencion =  "";
						$importeRetenciones = "0";

					}

					if ($_FILES['facturaGasto']['name'] != null && $_POST["editarRutaFactura"] == "") {

						$directorioDestinoFactura = 'gastos/facturas/SGM-'.$folioGasto.'/';
						if (!file_exists($directorioDestinoFactura)) {
						    mkdir($directorioDestinoFactura, 0777, true);
						
						}else {

							echo 'No se puedo crear la carpeta';
						}
						
						$archivoFactura = 'SGM-'.$folioGasto.'.pdf';

						if(!is_writable($directorioDestinoFactura)){
						echo "no tiene permisos";
						}else{
							if(is_uploaded_file($_FILES['facturaGasto']['tmp_name'])){
								
								if (move_uploaded_file($_FILES['facturaGasto']['tmp_name'], $directorioDestinoFactura.$archivoFactura)) {
									
									
									$rutaFactura = $directorioDestinoFactura.$archivoFactura;
									
								} else {
									echo "Error al subir el archivo";
								}
							} else{
								echo "Error al subir el archivo: ";
								
							}
						}
		
						}else if ($_FILES['facturaGasto']['name'] == null && $_POST["editarRutaFactura"] != ""){

							$directorioDestinoFactura = 'gastos/facturas/SGM-'.$folioGasto.'/';
							if (!file_exists($directorioDestinoFactura)) {
							    mkdir($directorioDestinoFactura, 0777, true);
							
							}else {

								echo 'No se puedo crear la carpeta';
							}

							$rutaFactura = $_POST["editarRutaFactura"];

						}

						if ($_FILES['xmlGasto']['name'] != null && $_POST["editarRutaXml"] == "") {

						$directorioDestinoXml = 'gastos/xml/SGM-'.$folioGasto.'/';
						if (!file_exists($directorioDestinoXml)) {
						    mkdir($directorioDestinoXml, 0777, true);
						
						}else {

							echo 'No se pudo crear la carpeta';
						}
						
						$archivoXml = 'SGM-'.$folioGasto.'.xml';

						if(!is_writable($directorioDestinoXml)){
						echo "no tiene permisos";
						}else{
							if(is_uploaded_file($_FILES['xmlGasto']['tmp_name'])){
								
								if (move_uploaded_file($_FILES['xmlGasto']['tmp_name'], $directorioDestinoXml.$archivoXml)) {
									
									
									$rutaXml = $directorioDestinoXml.$archivoXml;
									
								} else {
									echo "Error al subir el archivo";
								}
							} else{
								echo "Error al subir el archivo: ";
								
							}
						}
		
						}else if ($_FILES['xmlGasto']['name'] == null && $_POST["editarRutaXml"] != ""){

							$directorioDestinoXml = 'gastos/xml/SGM-'.$folioGasto.'/';
							if (!file_exists($directorioDestinoXml)) {
							    mkdir($directorioDestinoXml, 0777, true);
							
							}else {

								echo 'No se pudo crear la carpeta';
							}

							$rutaXml = $_POST["editarRutaXml"];

						}

					if ($_POST["editarSubgrupo"] == "99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales") {

						 $numeroDocumento = trim($_POST["editarNumeroDocumento"]);
						 $numeroDocumento = strtoupper($numeroDocumento);

						 $folioFiscal = $_POST["editarFolioFiscal"];
						 $acreedor = $_POST["editarAcreedor"];
						 $total = $_POST["editarImporteGasto"];
						 $response = 0;
						
					}else{

							$xml = simplexml_load_file($rutaXml);
							$ns = $xml->getNamespaces(true);
							$xml->registerXPathNamespace('c', $ns['cfdi']);
							$xml->registerXPathNamespace('t', $ns['tfd']);

							foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
							   
							      $total = $cfdiComprobante['Total']; 
							      $serie = $cfdiComprobante['Serie'];
							      $folio = $cfdiComprobante['Folio'];  
							      $numeroDocumento = $serie." ".$folio;
							     
							} 
							foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
							   
							   $acreedor = $Emisor['Nombre']; 

							} 
							foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
							  
							   $folioFiscal = $tfd['UUID']; 
							   
							} 

							$item = 'folioFiscal';
							$valor = $folioFiscal;
							$respuesta = ControladorFacturasTiendas::ctrValidarFolioFiscal($item,$valor);

							$response = $respuesta["folio"];


					}
							

					$datos = array("departamento" => $_POST["editarDepartamento"],
						           "grupo" => $_POST["editarGrupo"],
						           "subgrupo" => $_POST["editarSubgrupo"],
						           "mes" => $_POST["editarMes"],
						           "fecha" => $_POST["editarFecha"],
						           "descripcion" => trim($_POST["editarDescripcion"]),
						           "importeGasto" => trim($total),
						           "acreedor" => trim($acreedor),
						           "numeroDocumento" => $numeroDocumento,
						           "folioFiscal" => $folioFiscal,
						           "tieneIva" => $_POST["editarTieneIva"],
						           "tieneRetenciones" => $_POST["editarTieneRetenciones"],
						           "tipoRetencion" => $tipoRetencion,
						           "importeRetenciones" => $importeRetenciones,
						           "rutaFactura" => $rutaFactura,
						           "rutaXml" => $rutaXml,
						       	   "id" => $_POST["idGasto"]); 
					
					if ($response == 2) {

						echo '<script>

							swal({

								type: "error",
								title: "¡El folio fiscal existe en el gasto '.$respuesta["folioGasto"].'",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									

								}

							});
						

						</script>';


						if (file_exists($rutaXml)) {
						    $success = unlink($rutaXml);
						    
						    if (!$success) {
						         throw new Exception("Cannot delete $filename");
						    }
						}
						if (file_exists($rutaFactura)) {
						    $success = unlink($rutaFactura);
						    
						    if (!$success) {
						         throw new Exception("Cannot delete $filename");
						    }
						}
						$path = $directorioDestinoFactura;
						if(!rmdir($path)) {
						  echo ("Could not remove $path");
						}
						$path2 = $directorioDestinoXml;
						if(!rmdir($path2)) {
						  echo ("Could not remove $path");
						}

						
					}else{


					$datos2 = array("usuario" => $_SESSION['nombre'],
									   "perfil" => $_SESSION['perfil'],
									   "accion" => 'Edición de Gasto',
									   "folio" => $folioGasto);

					$respuesta = ModeloFacturasTiendas::mdlEditarGasto($tabla, $datos);
					$respuesta2 = ModeloFacturasTiendas::mdlRegistroBitacoraAgregar($tabla2, $datos2);
					$respuesta3 = ModeloFacturasTiendas::mdlCalcularImpuestos($tabla,$folioGasto);
				
					if($respuesta == "ok"){

						echo '<script>

						swal({

							type: "success",
							title: "¡Gasto Editado Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								gastosTiendas.ajax.reload();

							}

						});
					

						</script>';


					}else{

						echo '<script>

							swal({

								type: "error",
								title: "¡No se puede editar el gasto",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									gastosTiendas.ajax.reload();

								}

							});
						

						</script>';

					}	

					}
					


			}

	}
	static public function ctrDesgloseAbonosBancarios($item,$valor){

			$tabla = "depositostiendas";

			$respuesta = ModeloFacturasTiendas::mdlDesgloseAbonosBancarios($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrMostrarAbonosDeFactura($factura){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlMostrarAbonosDeFactura($tabla,$factura);

			return $respuesta;


	}
	static public function ctrGenerarSolicitudGasto($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlGenerarSolicitudGasto($tabla,$item,$valor);
			

			return $respuesta;


	}
	static public function ctrMostrarGastosSolicitudes($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlMostrarGastosSolicitudes($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrAprobarSolicitudGasto($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlAprobarSolicitudGasto($tabla,$item,$valor);
			

			return $respuesta;


	}
	static public function ctrReembolsarSolicitudGasto($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlReembolsarSolicitudGasto($tabla,$item,$valor);
			

			return $respuesta;


	}
	static public function ctrMostrarUltimoSaldoCaja($item,$valor){

			$tabla = "caja";

			$respuesta = ModeloFacturasTiendas::mdlMostrarUltimoSaldoCaja($tabla,$item,$valor);
			

			return $respuesta;


	}
	static public function ctrObtenerDatosGasto($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlObtenerDatosGasto($tabla,$item,$valor);
			

			return $respuesta;


	}
	static public function ctrMostrarListaAjustesRealizados($item,$valor){

			$tabla = "ajustesaldos";

			$respuesta = ModeloFacturasTiendas::mdlMostrarListaAjustesRealizados($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrMostrarDocumentosSaldados($item,$valor){

			$tabla = "ajustesaldos";

			$respuesta = ModeloFacturasTiendas::mdlMostrarDocumentosSaldados($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrMostrarAbonos($item,$valor){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlMostrarAbonos($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrMostrarDetallesDepositosBancarios($item,$valor){

			$tabla = "depositostiendas";

			$respuesta = ModeloFacturasTiendas::mdlMostrarDetallesDepositosBancarios($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrBuscarDatosCliente($item,$valor){

			$tabla = "clientes";

			$respuesta = ModeloFacturasTiendas::mdlBuscarDatosCliente($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrListarAbonosDepositos($item,$valor){

			$tabla = "abonos";

			$respuesta = ModeloFacturasTiendas::mdlListarAbonosDepositos($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrGenerarReciboCaja($item,$valor){

			$tabla = "depositostiendas";

			$respuesta = ModeloFacturasTiendas::mdlGenerarReciboCaja($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrValidarFolioFiscal($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlValidarFolioFiscal($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrMostrarFacturasConRemanentes($datos){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($datos["concepto"] === "FACTURA MAYOREO V 3.3" || $datos["concepto"] === "FACTURA INDUSTRIAL V 3.3" || $datos["concepto"] === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}


			}

			$respuesta = ModeloFacturasTiendas::mdlMostrarFacturasConRemanentes($tabla,$datos);

			return $respuesta;


	}
	static public function ctrObtenerUltimoAjuste(){

			$tabla = "ajustesaldos";

			$respuesta = ModeloFacturasTiendas::mdlObtenerUltimoAjuste($tabla);
			
			return $respuesta;


	}
	static public function ctrGenerarAjusteSaldoRemanentes($datosAjuste){

			$tabla = "ajustesaldos";

			$respuesta = ModeloFacturasTiendas::mdlGenerarAjusteSaldoRemanentes($tabla,$datosAjuste);
			
			return $respuesta;


	}
	static public function ctrSaldarDocumentoConSaldoPendiente($datosSaldado){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($datosSaldado["serie"] === "FACD" || $datosSaldado["serie"] === "FAND" || $datosSaldado["serie"] === "FAPB" || $datosSaldado["serie"] === "DOPR" || $datosSaldado["serie"] === "DFPR" ) {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}

			$respuesta = ModeloFacturasTiendas::mdlSaldarDocumentoConSaldoPendiente($tabla,$datosSaldado);
			
			return $respuesta;


	}
	static public function ctrObtenerDatosFactura($item,$valor,$item2,$valor2){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor === "FACD" || $valor === "FAND" || $valor === "FAPB" || $valor === "DOPR" || $valor === "DFPR") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}

			$respuesta = ModeloFacturasTiendas::mdlObtenerDatosFactura($tabla,$item,$valor,$item2,$valor2);
			
			return $respuesta;


	}
	static public function ctrObtenerAbonosConAjuste($item,$valor){

			$tabla = "ajustesaldos";

			$respuesta = ModeloFacturasTiendas::mdlObtenerAbonosConAjuste($tabla,$item,$valor);
			
			return $respuesta;


	}
	/***********CORTE DE CAJA********************/
	static public function ctrMostrarFolioDisponibleCorteCaja(){

			$tabla = "cortecaja";

			$respuesta = ModeloFacturasTiendas::mdlMostrarFolioDisponibleCorteCaja($tabla);

			return $respuesta;

	}
	static public function ctrGenerarNuevoCorteCaja($datosCorte){

			$tabla = "cortecaja";

			$respuesta = ModeloFacturasTiendas::mdlGenerarNuevoCorteCaja($tabla,$datosCorte);

			return $respuesta;

	}
	static public function ctrGenerarDenominacionesCorte($datosCorte){

			$tabla = "efectivocaja";

			$respuesta = ModeloFacturasTiendas::mdlGenerarDenominacionesCorte($tabla,$datosCorte);

			return $respuesta;

	}
	static public function ctrCargarDenominacionesCorte($datosDenominaciones){

			$tabla = "efectivocaja";

			$respuesta = ModeloFacturasTiendas::mdlCargarDenominacionesCorte($tabla,$datosDenominaciones);

			return $respuesta;

	}
	static public function ctrCargarFormasPagoCorte($datosFormasPago){

			$tabla = "cortecaja";

			$respuesta = ModeloFacturasTiendas::mdlCargarFormasPagoCorte($tabla,$datosFormasPago);

			return $respuesta;

	}
	static public function ctrObtenerTotalDenominaciones($item,$valor){

			$tabla = "efectivocaja";

			$respuesta = ModeloFacturasTiendas::mdlObtenerTotalDenominaciones($tabla,$item,$valor);

			return $respuesta;

	}
	static public function ctrObtenerTotalDenominacionesCaja($item,$valor){

			$tabla = "efectivocaja";

			$respuesta = ModeloFacturasTiendas::mdlObtenerTotalDenominacionesCaja($tabla,$item,$valor);

			return $respuesta;

	}
	static public function ctrMostrarDenominacionesCorte($item,$valor){

			$tabla = "efectivocaja";

			$respuesta = ModeloFacturasTiendas::mdlMostrarDenominacionesCorte($tabla,$item,$valor);

			return $respuesta;

	}
	static public function ctrMostrarTiempoTranscurridoCorte($item,$valor){

			$tabla = "cortecaja";

			$respuesta = ModeloFacturasTiendas::mdlMostrarTiempoTranscurridoCorte($tabla,$item,$valor);

			return $respuesta;

	}
	static public function ctrFinalizarCorteCaja($item,$valor,$item2,$valor2){

			$tabla = "cortecaja";

			$respuesta = ModeloFacturasTiendas::mdlFinalizarCorteCaja($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;

	}
	static public function ctrMostrarFacturasImporteVenta($item,$valor,$item2, $valor2){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}

			$respuesta = ModeloFacturasTiendas::mdlMostrarFacturasImporteVenta($tabla,$item,$valor,$item2, $valor2);

			return $respuesta;


	}
	static public function ctrMostrarListaGastosCorte($item,$valor){

			$tabla = "gastos";

			$respuesta = ModeloFacturasTiendas::mdlMostrarListaGastosCorte($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrGenerarReciboAjuste($item,$valor){

			$tabla = "ajustesaldos";

			$respuesta = ModeloFacturasTiendas::mdlGenerarReciboAjuste($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrDetalleCorteFinalizado($item,$valor){

			$tabla = "cortecaja";

			$respuesta = ModeloFacturasTiendas::mdlDetalleCorteFinalizado($tabla,$item,$valor);

			return $respuesta;

	}
	/*=============================================
	REGISTRO BITACORA REPORTE
	=============================================*/

	static public function ctrRegistroBitacoraReporte(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Descarga Reporte Facturación',
							   "folio" => 'Sin folio');

		$respuesta = ModeloFacturasTiendas::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregarFacturas(){

			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Inserción de Facturas Tiendas',
								   "folio" => 'Sin Folio');

			$respuesta = ModeloFacturasTiendas::mdlRegistroBitacoraAgregarFacturas($tabla, $datos);

			return $respuesta;

		
	}
	/*=======================================================
	MOSTRAR VENTAS TIENDA
	=======================================================*/
	static public function ctrObtenerVentasTienda($item,$valor,$item2,$valor2){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				$tabla = "facturastiendas";

			}

			$respuesta = ModeloFacturasTiendas::mdlObtenerVentasTienda($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;


	}
	/*=======================================================
	MOSTRAR DESGLOSE COBROS
	=======================================================*/
	static public function ctrMostrarDesgloseCobros($item,$valor,$item2,$valor2,$item3,$valor3){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor === "FACTURA MAYOREO V 3.3" || $valor === "FACTURA INDUSTRIAL V 3.3" || $valor === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}

			}

		$respuesta = ModeloFacturasTiendas::mdlMostrarDesgloseCobros($tabla,$item,$valor,$item2,$valor2,$item3,$valor3);

		return $respuesta;
	}
	/*=======================================================
	MOSTRAR DINERO EN  EFECTIVO A DEPOSITAR
	=======================================================*/
	static public function ctrMostrarEfectivoADepositarBanco($item,$valor,$item2,$valor2){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				if ($valor2 === "FACTURA MAYOREO V 3.3" || $valor2 === "FACTURA INDUSTRIAL V 3.3" || $valor2 === "ALL") {

					$tabla = "facturasgenerales";

				}else{

					$tabla = "facturastiendas";

				}
				

			}

		$respuesta = ModeloFacturasTiendas::mdlMostrarEfectivoADepositarBanco($tabla,$item,$valor,$item2,$valor2);

		return $respuesta;
	}
	/*=======================================================
	MOSTRAR FACTURAS PENDIENTES DE PAGO
	=======================================================*/
	static public function ctrMostrarFacturasPendientesPago($item,$valor){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

			$tabla = "facturasgenerales";

		}else{

			$tabla = "facturastiendas";

		}
		$respuesta = ModeloFacturasTiendas::mdlMostrarFacturasPendientesPago($tabla,$item,$valor);

		return $respuesta;
	}
	/*=======================================================
	ACTUALIZAR FACTURAS PENDIENTES DE PAGO
	=======================================================*/
	static public function ctrActualizarFacturasPagoPendiente($item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4,$item5,$valor5){

		if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

			$tabla = "facturasgenerales";

		}else{

			$tabla = "facturastiendas";

		}

		$respuesta = ModeloFacturasTiendas::mdlActualizarFacturasPagoPendiente($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4,$item5,$valor5);

		return $respuesta;
	}
	static public function conceptoBanco($fecha) {
		  $fecha = substr($fecha, 0, 10);
		  $numeroDia = date('d', strtotime($fecha));
		  $dia = date('l', strtotime($fecha));
		  $mes = date('F', strtotime($fecha));
		  $anio = date('Y', strtotime($fecha));
		  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		  return $numeroDia." de ".$nombreMes." de ".$anio;
	}
	/*==========================================================================
	=            CONTROLADORES NUEVAS FUNCIONES FACTURAS PENDIENTES            =
	==========================================================================*/
	static public function ctrMostrarFacturasPendientesCredito($item,$valor){

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$tabla = "facturasgenerales";

			}else{

				$tabla = "facturastiendas";

			}

			$respuesta = ModeloFacturasTiendas::mdlMostrarFacturasPendientesCredito($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrGuardarDatosDepositoBancoGenerales($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item5,$valor5,$item6,$valor6,$item7,$valor7,$item9,$valor9){

			$respuesta = ModeloFacturasTiendas::mdlGuardarDatosDepositoBancoGenerales($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item5,$valor5,$item6,$valor6,$item7,$valor7,$item9,$valor9);

			return $respuesta;


	}
	static public function ctrInsertarParcialesAbonosGenerales($tabla,$campo,$parcial,$campo2,$departamento2,$movimiento,$movimientoBanco,$itemParciales,$sumaParciales){


			$respuesta = ModeloFacturasTiendas::mdlInsertarParcialesAbonosGenerales($tabla,$campo,$parcial,$campo2,$departamento2,$movimiento,$movimientoBanco,$itemParciales,$sumaParciales);

			return $respuesta;

	}
	static public function ctrLimpiarParcialesAbonosGenerales($tabla,$movimientoB,$movimientoBanco){


			$respuesta = ModeloFacturasTiendas::mdlLimpiarParcialesAbonosGenerales($tabla,$movimientoB,$movimientoBanco);

			return $respuesta;

	}
	static public function ctrMostrarDepositosTiendasGenerales($tabla,$item,$valor){

			$respuesta = ModeloFacturasTiendas::mdlMostrarDepositosTiendasGenerales($tabla,$item,$valor);

			return $respuesta;

	}
	
	/*=====  End of CONTROLADORES NUEVAS FUNCIONES FACTURAS PENDIENTES  ======*/
	static public function ctrActualizarEnviadoCredito($tabla,$arreglo){

			$respuesta = ModeloFacturasTiendas::mdlActualizarEnviadoCredito($tabla,$arreglo);

			return $respuesta;

	}	
	static public function ctrActualizarRecibidoCredito($tabla,$arreglo){

			$respuesta = ModeloFacturasTiendas::mdlActualizarRecibidoCredito($tabla,$arreglo);

			return $respuesta;

	}	
	static public function ctrActualizarSubidaDocumentosCredito($tabla,$arreglo){

			$respuesta = ModeloFacturasTiendas::mdlActualizarSubidaDocumentosCredito($tabla,$arreglo);

			return $respuesta;

	}
	static public function ctrMostrarDetallesDocumentosCredito($tabla,$item,$valor){

			$respuesta = ModeloFacturasTiendas::mdlMostrarDetallesDocumentosCredito($tabla,$item,$valor);

			return $respuesta;

	}
	/*=============================================
	ACTUALIZAR FORMA DE PAGO FACTURA TIENDAS
	=============================================*/
	static public function ctrActualizarFormaPagoFactura($item,$valor,$item2,$valor2){

			$tabla = "facturastiendas";
			
			$respuesta = ModeloFacturasTiendas::mdlActualizarFormaPagoFactura($tabla,$item,$valor,$item2,$valor2);

			return $respuesta;

	}
	static public function ctrMostrarFacturasCrm($item,$valor,$item2,$valor2,$item3,$valor3){

			if ( $valor2 === "ALL") {

					if ($_SESSION['nombre'] == 'Ivan Herrera Perez') {

						$tabla = "facturastiendas";
						
					}else{
						$tabla = "facturasgenerales";
					}


				}else{

					$tabla = "facturastiendas";

				}
				
			$respuesta = ModeloFacturasTiendas::mdlMostrarFacturasCrm($tabla,$item,$valor,$item2,$valor2,$item3,$valor3);

			return $respuesta;


	}
	static public function ctrMostrarCotizacionesComercial($item,$valor,$item2,$valor2,$item3,$valor3,$empresa){

				
			$respuesta = ModeloFacturasTiendas::mdlMostrarCotizacionesComercial($item,$valor,$item2,$valor2,$item3,$valor3,$empresa);

			return $respuesta;


	}
	/*=============================================
	ACTUALIZAR ABONADO PARCIAL FACTURAS
	=============================================*/
	static public function ctrActualizarAbonoParcial($serie,$folio,$abono,$total){

			$tabla = "facturastiendas";
			
			$respuesta = ModeloFacturasTiendas::mdlActualizarAbonoParcial($tabla,$serie,$folio,$abono,$total);

			return $respuesta;

	}
	/*=============================================
	ACTUALIZAR VINCULADO CRM
	=============================================*/
	static public function ctrActualizarFacturaVinculadaCrm($tabla, $idFactura, $valor)
	{

		$respuesta = ModeloFacturasTiendas::mdlActualizarFacturaVinculadaCrm($tabla, $idFactura, $valor);

		return $respuesta;
	}



}

?>