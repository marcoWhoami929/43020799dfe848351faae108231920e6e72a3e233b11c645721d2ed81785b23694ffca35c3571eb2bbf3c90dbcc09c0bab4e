<?php

require_once "../controladores/banco3450.controlador.php";
require_once "../modelos/banco3450.modelo.php";

class AjaxBanco3450{

	/*=============================================
	EDITAR BANCO
	=============================================*/	

	public $idBanco;

	public function ajaxEditarBanco(){

		$item = "id";
		$valor = $this->idBanco;

		$respuesta = ControladorBanco3450::ctrMostrarBanco($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER PARCIALES
	=============================================*/	

	public $idPar;

	public function ajaxVerParciales(){

		$item = "id";
		$valor = $this->idPar;

		$respuesta = ControladorBanco3450::ctrMostrarParciales($item, $valor);

		echo json_encode($respuesta);

	}



}


/*=============================================
EDITAR BANCO
=============================================*/
if(isset($_POST["idBanco"])){

	$editar = new AjaxBanco3450();
	$editar -> idBanco = $_POST["idBanco"];
	$editar -> ajaxEditarBanco();

}
/*=============================================
VER PARCIALES
=============================================*/
if (isset($_POST["idPar"])) {
	$verParciales = new AjaxBanco3450();
	$verParciales -> idPar = $_POST["idPar"];
	$verParciales -> ajaxVerParciales();
}