<?php

require_once "../controladores/banco6278.controlador.php";
require_once "../modelos/banco6278.modelo.php";

class AjaxBanco6278{

	/*=============================================
	EDITAR BANCO
	=============================================*/	

	public $idBanco;

	public function ajaxEditarBanco(){

		$item = "id";
		$valor = $this->idBanco;

		$respuesta = ControladorBanco6278::ctrMostrarBanco($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER PARCIALES
	=============================================*/	

	public $idPar;

	public function ajaxVerParciales(){

		$item = "id";
		$valor = $this->idPar;

		$respuesta = ControladorBanco6278::ctrMostrarParciales($item, $valor);

		echo json_encode($respuesta);

	}



}


/*=============================================
EDITAR BANCO
=============================================*/
if(isset($_POST["idBanco"])){

	$editar = new AjaxBanco6278();
	$editar -> idBanco = $_POST["idBanco"];
	$editar -> ajaxEditarBanco();

}
/*=============================================
VER PARCIALES
=============================================*/
if (isset($_POST["idPar"])) {
	$verParciales = new AjaxBanco6278();
	$verParciales -> idPar = $_POST["idPar"];
	$verParciales -> ajaxVerParciales();
}