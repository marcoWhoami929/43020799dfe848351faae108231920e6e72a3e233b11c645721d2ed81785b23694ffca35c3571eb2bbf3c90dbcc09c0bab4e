<?php

require_once "../controladores/banco1286.controlador.php";
require_once "../modelos/banco1286.modelo.php";

class AjaxBanco1286{

	/*=============================================
	EDITAR BANCO
	=============================================*/	

	public $idBanco;

	public function ajaxEditarBanco(){

		$item = "id";
		$valor = $this->idBanco;

		$respuesta = ControladorBanco1286::ctrMostrarBanco($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER PARCIALES
	=============================================*/	

	public $idPar;

	public function ajaxVerParciales(){

		$item = "id";
		$valor = $this->idPar;

		$respuesta = ControladorBanco1286::ctrMostrarParciales($item, $valor);

		echo json_encode($respuesta);

	}



}


/*=============================================
EDITAR BANCO
=============================================*/
if(isset($_POST["idBanco"])){

	$editar = new AjaxBanco1286();
	$editar -> idBanco = $_POST["idBanco"];
	$editar -> ajaxEditarBanco();

}
/*=============================================
VER PARCIALES
=============================================*/
if (isset($_POST["idPar"])) {
	$verParciales = new AjaxBanco1286();
	$verParciales -> idPar = $_POST["idPar"];
	$verParciales -> ajaxVerParciales();
}