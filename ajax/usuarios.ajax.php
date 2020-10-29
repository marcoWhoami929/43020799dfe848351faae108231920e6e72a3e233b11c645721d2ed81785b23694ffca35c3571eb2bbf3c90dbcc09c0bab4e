<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	ACTIVAR PERFIL
	=============================================*/	

	public $activarPerfil;
	public $activarId;

	public function ajaxActivarPerfil(){

		$tabla = "tbl_users";

		$item1 = "estado";
		$valor1 = $this->activarPerfil;

		$item2 = "user_id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	/*=============================================
	EDITAR PERFIL
	=============================================*/	

	public $idPerfil;

	public function ajaxEditarPerfil(){

		$item = "user_id";
		$valor = $this->idPerfil;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}



}

/*=============================================
ACTIVAR PERFIL
=============================================*/	

if(isset($_POST["activarPerfil"])){

	$activarPerfil = new AjaxUsuarios();
	$activarPerfil -> activarPerfil = $_POST["activarPerfil"];
	$activarPerfil -> activarId = $_POST["activarId"];
	$activarPerfil -> ajaxActivarPerfil();

}

/*=============================================
EDITAR PERFIL
=============================================*/
if(isset($_POST["idPerfil"])){

	$editar = new AjaxUsuarios();
	$editar -> idPerfil = $_POST["idPerfil"];
	$editar -> ajaxEditarPerfil();

}