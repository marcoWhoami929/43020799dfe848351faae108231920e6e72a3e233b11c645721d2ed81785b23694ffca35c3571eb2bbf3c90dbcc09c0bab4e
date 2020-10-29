<?php

require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";
require_once "../controladores/notificaciones.controlador.php";
require_once "../modelos/notificaciones.modelo.php";

class AjaxCotizacion{


	/*=============================================
	VER MOTIVOS DE CANCELACION
	=============================================*/	
	public $idCotizacion2;

	public function ajaxVerCancelacion(){

		$item = "folio";
		$valor = $this->idCotizacion2;

		$respuesta =  ControladorCotizaciones::ctrMostrarCotizacionesVistaCanceladas($item, $valor);

		echo json_encode($respuesta);
	}
	/*=============================================
	ACTIVAR APROBADA COTIZACION
	=============================================*/	

	public $activarCotizadorApro;
	public $activarIdCotiApro;

	public function ajaxActivarCotizadorAprobada(){

		$tabla = "cotizaciones";

		$item1 = "aprobada";
		$valor1 = $this->activarCotizadorApro;

		$item2 = "folio";
		$valor2 = $this->activarIdCotiApro;

		$respuesta = ModeloCotizaciones::mdlActualizarCotizador($tabla, $item1, $valor1, $item2, $valor2);
		/*============================================= 
        ACTUALIZAR NOTIFICACIONES NUEVAS COTIZACIONES
        =============================================*/

        $traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

        $cotizacionAprobada = $traerNotificaciones["cotizacionesAprobadas"] +1;

        $respuesta2 = ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "cotizacionesAprobadas", $cotizacionAprobada);

		echo $respuesta;
		echo $respuesta2;

	}
	/*=============================================
	EDITAR COTIZACION
	=============================================*/	

	public $idCotizacion;

	public function ajaxEditarCotizacion(){

		$item = "folio";
		$valor = $this->idCotizacion;

		$respuesta = ControladorCotizaciones::ctrMostrarCotizacionesVista($item, $valor);

		echo json_encode($respuesta);
		

	}


}
/*=============================================
VER MOTIVOS DE CANCELACIÓN
=============================================*/
if (isset($_POST["idCotizacion2"])) {
	
	$visualizar = new AjaxCotizacion();
	$visualizar -> idCotizacion2 = $_POST["idCotizacion2"];
	$visualizar -> ajaxVerCancelacion();
}
/*=============================================
EDITAR COTIZACION
=============================================*/
if(isset($_POST["idCotizacion"])){

	$editar = new AjaxCotizacion();
	$editar -> idCotizacion = $_POST["idCotizacion"];
	$editar -> ajaxEditarCotizacion();

}
/*=============================================
ACTIVAR APROBADA COTIZACION
=============================================*/	

if(isset($_POST["activarCotizadorApro"])){

	$activarCotizadorAprobada = new AjaxCotizacion();
	$activarCotizadorAprobada -> activarCotizadorApro = $_POST["activarCotizadorApro"];
	$activarCotizadorAprobada -> activarIdCotiApro = $_POST["activarIdCotiApro"];
	$activarCotizadorAprobada -> ajaxActivarCotizadorAprobada();

}
/*=============================================
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
=============================================*/