<?php

require_once "../controladores/logistica.controlador.php";
require_once "../modelos/logistica.modelo.php";

class AjaxLogistica{

	/*=============================================
	VALIDAR NO REPETIR PEDIDO
	=============================================*/	

	public $validarPedido5;

	public function ajaxValidarPedido(){

		$item = "idPedido";
		$valor = $this->validarPedido5;

		$respuesta = ControladorLogistica::ctrMostrarLogistica($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR LOGISTICA
	=============================================*/	

	public $idLogis;

	public function ajaxEditarLogistica(){

		$item = "id";
		$valor = $this->idLogis;

		$respuesta = ControladorLogistica::ctrMostrarLogisticaEdicion($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER COMENTARIOS
	=============================================*/	

	public $idLogistica4;

	public function ajaxVerObservaciones(){

		$item = "id";
		$valor = $this->idLogistica4;

		$respuesta = ControladorLogistica::ctrMostrarLogisticaEdicion($item, $valor);

		echo json_encode($respuesta);

	}
	
	
	/*=============================================
	ACTUALIZAR STATUS RUTA
	=============================================*/
	

  	public $idLogistica;
  	public $etapa;

  	public function ajaxStatusRuta(){

  		$respuesta = ModeloLogistica::mdlActualizarRuta("logistica", "status", $this->etapa, "id", $this->idLogistica);

  		echo $respuesta;

	}


}

/*=============================================
ACTIVAR PERFIL
=============================================*/	

if(isset($_POST["activarPerfil"])){

	$activarPerfil = new AjaxAdministradores();
	$activarPerfil -> activarPerfil = $_POST["activarPerfil"];
	$activarPerfil -> activarId = $_POST["activarId"];
	$activarPerfil -> ajaxActivarPerfil();

}

/*=============================================
EDITAR PEDIDO
=============================================*/
if(isset($_POST["idLogis"])){

	$editarp = new AjaxLogistica();
	$editarp -> idLogis = $_POST["idLogis"];
	$editarp -> ajaxEditarLogistica();

}
/*=============================================
VER OBSERVACIONES
=============================================*/
if(isset($_POST["idLogistica4"])){

	$verObservaciones = new AjaxLogistica();
	$verObservaciones -> idLogistica4 = $_POST["idLogistica4"];
	$verObservaciones -> ajaxVerObservaciones();

}


/*=============================================
VALIDAR NO REPETIR PEDIDO
=============================================*/

if(isset($_POST["validarPedido5"])){

	$valPedido = new AjaxLogistica();
	$valPedido -> validarPedido5 = $_POST["validarPedido5"];
	$valPedido -> ajaxValidarPedido();

}

/*=============================================
ACTUALIZAR STATUS RUTA
=============================================*/


if(isset($_POST["idLogistica"])){

	$statusRuta = new AjaxLogistica();
	$statusRuta -> idLogistica = $_POST["idLogistica"];
	$statusRuta -> etapa = $_POST["etapa"];
	$statusRuta -> ajaxStatusRuta();

}
