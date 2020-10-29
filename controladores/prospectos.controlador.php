<?php

class ControladorProspectos{

	
	/*=============================================
	MOSTRAR PROSPECTOS
	=============================================*/

	static public function ctrMostrarProspectos($item, $valor){

		$tabla = "prospectos";

		$respuesta = ModeloProspectos::mdlMostrarProspectos($tabla, $item, $valor);

		return $respuesta;
	
	}

	
	

}