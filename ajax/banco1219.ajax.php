<?php

require_once "../controladores/banco1219.controlador.php";
require_once "../modelos/banco1219.modelo.php";

class AjaxBanco1219{

	/*=============================================
	EDITAR BANCO
	=============================================*/	

	public $idBanco;

	public function ajaxEditarBanco(){

		$item = "id";
		$valor = $this->idBanco;

		$respuesta = ControladorBanco1219::ctrMostrarBanco($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER PARCIALES
	=============================================*/	

	public $idPar;

	public function ajaxVerParciales(){

		$item = "id";
		$valor = $this->idPar;

		$respuesta = ControladorBanco1219::ctrMostrarParciales($item, $valor);

		echo json_encode($respuesta);

	}



}


/*=============================================
EDITAR BANCO
=============================================*/
if(isset($_POST["idBanco"])){

	$editar = new AjaxBanco1219();
	$editar -> idBanco = $_POST["idBanco"];
	$editar -> ajaxEditarBanco();

}
/*=============================================
VER PARCIALES
=============================================*/
if (isset($_POST["idPar"])) {
	$verParciales = new AjaxBanco1219();
	$verParciales -> idPar = $_POST["idPar"];
	$verParciales -> ajaxVerParciales();
}