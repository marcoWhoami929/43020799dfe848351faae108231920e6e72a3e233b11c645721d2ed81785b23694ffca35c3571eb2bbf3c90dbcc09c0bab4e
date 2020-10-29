<?php

class ControladorBitacora{

	
	/*=============================================
	MOSTRAR BITACORA
	=============================================*/

	static public function ctrMostrarBitacora($item, $valor){

		$tabla = "bitacora";

		$respuesta = ModeloBitacora::mdlMostrarBitacora($tabla, $item, $valor);

		return $respuesta;
	
	}
	
	

}