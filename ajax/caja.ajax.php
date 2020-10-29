<?php

require_once "../controladores/caja.controlador.php";
require_once "../modelos/caja.modelo.php";

class AjaxCaja{

	/*=============================================
	EDITAR Caja
	=============================================*/	

	public $idCaja;

	public function ajaxEditarCaja(){

		$item = "id";
		$valor = $this->idCaja;

		$respuesta = ControladorCaja::ctrMostrarCaja($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER PARCIALES
	=============================================*/	

	public $idPar;

	public function ajaxVerParciales(){

		$item = "id";
		$valor = $this->idPar;

		$respuesta = ControladorCaja::ctrMostrarParciales($item, $valor);

		echo json_encode($respuesta);

	}



}


/*=============================================
EDITAR Caja
=============================================*/
if(isset($_POST["idCaja"])){

	$editar = new AjaxCaja();
	$editar -> idCaja = $_POST["idCaja"];
	$editar -> ajaxEditarCaja();

}
/*=============================================
VER PARCIALES
=============================================*/
if (isset($_POST["idPar"])) {
	$verParciales = new AjaxCaja();
	$verParciales -> idPar = $_POST["idPar"];
	$verParciales -> ajaxVerParciales();
}