<?php
class ControladorreportAcumuladoMensual{

	static public function ctrMostrarAcumuladoMensual($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarReportAcumuladoMensual($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumRocio($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumRocio($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumLuis($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumLuis($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumErik($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumErik($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumOrlando($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumOrlando($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumJonathan($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumJonathan($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumAlfredo($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumAlfredo($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumArturo($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumArturo($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumuladoAgenteImporteInicial($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumuladoAgenteImporteInicial($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumuladoAgenteImporteSurtido($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumuladoAgenteImporteSurtido($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarAcumuladoAgenteMeses($item, $valor){
		$tabla = "facturacion";
		$respuesta = ModeloAcumuladoMensual::mdlMostrarAcumuladoAgenteMeses($tabla, $item, $valor);
		return $respuesta;
	}
}
?>