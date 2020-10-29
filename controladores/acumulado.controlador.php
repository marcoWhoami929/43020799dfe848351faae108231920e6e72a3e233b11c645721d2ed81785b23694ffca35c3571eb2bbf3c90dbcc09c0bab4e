<?php
class ControladorreportAcumulado{

		static public function ctrMostrarReportAcumulado($item, $valor){

			$tabla = "atencionaclientes";

			$respuesta = ModeloAcumulado::mdlMostrarReportAcumulado($tabla, $item, $valor);

			return $respuesta;
		}
		static public function ctrMostrarAcumulado($item, $valor){

			$tabla = "facturacion";

			$respuesta = ModeloAcumulado::mdlMostrarAcumulado($tabla, $item, $valor);

			return $respuesta;
		}
	
}
?>