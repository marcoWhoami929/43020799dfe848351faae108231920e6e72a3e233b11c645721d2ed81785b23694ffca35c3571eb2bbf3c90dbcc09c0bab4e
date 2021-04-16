<?php

class ControladorValidador
{
	static public function ctrObtenerMovimiento($idMovimiento){

		$tabla = "depositostiendas";

		$respuesta = ModeloValidador::mdlObtenerMovimiento($tabla,$idMovimiento);

		return $respuesta;
	}
	static public function ctrBuscarAbonoBancario($idMovimiento,$serie,$folio){

		$tabla = "abonos";

		$respuesta = ModeloValidador::mdlBuscarAbonoBancario($tabla,$idMovimiento,$serie,$folio);

		return $respuesta;
	}
	static public function ctrEliminarDeposito($idDeposito,$idMovimiento){

		$tabla = "depositostiendas";

		$respuesta = ModeloValidador::mdlEliminarDeposito($tabla,$idDeposito,$idMovimiento);

		return $respuesta;
	}
	static public function ctrEliminarAbonoBancario($idMovimiento,$idAbono){

		$tabla = "abonos";

		$respuesta = ModeloValidador::mdlEliminarAbonoBancario($tabla,$idMovimiento,$idAbono);

		return $respuesta;
	}
	static public function ctrActualizarFacturas($serie,$folio,$abono,$total){

		$tabla = "facturastiendas";

		$respuesta = ModeloValidador::mdlActualizarFacturas($tabla,$serie,$folio,$abono,$total);

		return $respuesta;
	}
	static public function ctrActualizarMovimientoBancario($idMovimiento){

		$tabla = "banco0198";

		$respuesta = ModeloValidador::mdlActualizarMovimientoBancario($tabla,$idMovimiento);

		return $respuesta;
	}
	static public function ctrActualizarParciales($idMovimiento){

		$tabla = "banco0198";

		$respuesta = ModeloValidador::mdlActualizarParciales($tabla,$idMovimiento);

		return $respuesta;
	}
	static public function ctrBuscarAbonoPorDocumento($serie,$folio){

		$tabla = "abonos";

		$respuesta = ModeloValidador::mdlBuscarAbonoPorDocumento($tabla,$serie,$folio);

		return $respuesta;
	}
	static public function ctrBuscarPendienteFactura($serie,$folio){

		$tabla = "facturastiendas";

		$respuesta = ModeloValidador::mdlBuscarPendienteFactura($tabla,$serie,$folio);

		return $respuesta;
	}
	static public function ctrBuscarDetalleAbono($serie,$folio){

		$tabla = "abonos";

		$respuesta = ModeloValidador::mdlBuscarDetalleAbono($tabla,$serie,$folio);

		return $respuesta;
	}
	static public function ctrActualizarPendienteAbono($idAbono,$total,$totalAbono){

		$tabla = "abonos";

		$respuesta = ModeloValidador::mdlActualizarPendienteAbono($tabla,$idAbono,$total,$totalAbono);

		return $respuesta;
	}
	static public function ctrActualizarParcialAbono($idAbonoPendiente,$numeroParcial){

		$tabla = "abonos";

		$respuesta = ModeloValidador::mdlActualizarParcialAbono($tabla,$idAbonoPendiente,$numeroParcial);

		return $respuesta;
	}
}

?>