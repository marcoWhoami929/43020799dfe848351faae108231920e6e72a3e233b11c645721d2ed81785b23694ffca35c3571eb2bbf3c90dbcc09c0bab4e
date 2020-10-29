<?php

require_once "../controladores/atencion.controlador.php";
require_once "../modelos/atencion.modelo.php";

class AjaxAtencion{

	/*=============================================
	VALIDAR NO REPETIR PEDIDO
	=============================================*/	

	public $validarFolio;

	public function ajaxValidarFolio(){

		$item = "folio";
		$valor = $this->validarFolio;

		$respuesta = ControladorAtencion::ctrMostrarAtencionAClientes($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	EDITAR PEDIDO
	=============================================*/	

	public $idPedido;

	public function ajaxEditarPedido(){

		$item = "id";
		$valor = $this->idPedido;

		$respuesta = ControladorAtencion::ctrMostrarAtencion($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER MOTIVOS DE CANCELACION
	=============================================*/	
	public $idPedido2;

	public function ajaxVerCancelacion(){

		$item = "id";
		$valor = $this->idPedido2;

		$respuesta =  ControladorAtencion::ctrMostrarAtencion($item, $valor);

		echo json_encode($respuesta);
	}
	/*=============================================
	HABILITAR PEDIDO
	=============================================*/	

	public $activarPedido;
	public $activarId;

	public function ajaxActivarPedido(){

		$tabla = "atencionaclientes";

		$item1 = "habilitado";
		$valor1 = $this->activarPedido;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloAtencion::mdlHabilitarPedido($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


}
/*=============================================
HABILITAR PEDIDO
=============================================*/	

if(isset($_POST["activarPedido"])){

	$activarPedido = new AjaxAtencion();
	$activarPedido -> activarPedido = $_POST["activarPedido"];
	$activarPedido -> activarId = $_POST["activarId"];
	$activarPedido -> ajaxActivarPedido();

}

/*=============================================
VALIDAR NO REPETIR PEDIDO
=============================================*/

if(isset($_POST["validarFolio"])){

	$valFolio = new AjaxAtencion();
	$valFolio -> validarFolio = $_POST["validarFolio"];
	$valFolio -> ajaxValidarFolio();

}
/*=============================================
EDITAR PEDIDO
=============================================*/
if(isset($_POST["idPedido"])){

	$editar = new AjaxAtencion();
	$editar -> idPedido = $_POST["idPedido"];
	$editar -> ajaxEditarPedido();

}
/*=============================================
VER MOTIVOS DE CANCELACIÓN
=============================================*/
if (isset($_POST["idPedido2"])) {
	
	$visualizar = new AjaxAtencion();
	$visualizar -> idPedido2 = $_POST["idPedido2"];
	$visualizar -> ajaxVerCancelacion();
}