<?php

Class ControladorNotificaciones{

	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function ctrMostrarNotificaciones(){

		$tabla = "notificaciones";

		$respuesta = ModeloNotificaciones::mdlMostrarNotificaciones($tabla);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR NOTIFICACIONES APP
	=============================================*/

	static public function ctrMostrarNotificacionesApp(){

		$tabla = "notificacionesapp";

		$respuesta = ModeloNotificaciones::mdlMostrarNotificacionesApp($tabla);

		return $respuesta;

	}

}