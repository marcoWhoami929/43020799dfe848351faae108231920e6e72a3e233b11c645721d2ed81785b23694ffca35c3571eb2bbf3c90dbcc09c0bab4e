<?php

require_once "../controladores/banco0840.controlador.php";
require_once "../modelos/banco0840.modelo.php";

class AjaxBanco0840{

	/*=============================================
	EDITAR BANCO
	=============================================*/	

	public $idBanco;

	public function ajaxEditarBanco(){

		$item = "id";
		$valor = $this->idBanco;

		$respuesta = ControladorBanco0840::ctrMostrarBanco($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER PARCIALES
	=============================================*/	

	public $idPar;

	public function ajaxVerParciales(){

		$item = "id";
		$valor = $this->idPar;

		$respuesta = ControladorBanco0840::ctrMostrarParciales($item, $valor);

		echo json_encode($respuesta);

	}



}


/*=============================================
EDITAR BANCO
=============================================*/
if(isset($_POST["idBanco"])){

	$editar = new AjaxBanco0840();
	$editar -> idBanco = $_POST["idBanco"];
	$editar -> ajaxEditarBanco();

}
/*=============================================
VER PARCIALES
=============================================*/
if (isset($_POST["idPar"])) {
	$verParciales = new AjaxBanco0840();
	$verParciales -> idPar = $_POST["idPar"];
	$verParciales -> ajaxVerParciales();
}