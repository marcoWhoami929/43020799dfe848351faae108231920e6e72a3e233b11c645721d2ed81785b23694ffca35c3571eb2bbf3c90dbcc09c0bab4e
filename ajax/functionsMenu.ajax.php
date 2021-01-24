<?php

require_once "../controladores/administradores.controlador.php";
require_once "../modelos/administradores.modelo.php";

class AjaxMenuDinamico{

	public $idUsuario;

	public function ajaxMostrarPermisos(){
		$idUsuario = $this->idUsuario;

		$tabla = "accesos as ac INNER JOIN menu AS m ON ac.idMenu = m.id LEFT OUTER JOIN submenu AS sm ON ac.idMenu = m.id AND ac.idSubmenu = sm.id";
		$campos = "m.id, m.nombreVista As nameM, m.ruta AS rutaMenu, m.nivel, m.icono, sm.nombreVistaSub AS nameSub, sm.ruta AS rutaSub";
		$parametros = "WHERE ac.idUsuario = ".$idUsuario." order by m.id";

		$respuesta = ModeloAdministradores::mdlMostrarPermisos($tabla, $campos, $parametros);

		echo json_encode($respuesta);

	}

}

if (isset($_POST["idUsuario"])) {

	$mostrarPermisos = new AjaxMenuDinamico();
	$mostrarPermisos -> idUsuario = $_POST["idUsuario"];
	$mostrarPermisos -> ajaxMostrarPermisos();
}