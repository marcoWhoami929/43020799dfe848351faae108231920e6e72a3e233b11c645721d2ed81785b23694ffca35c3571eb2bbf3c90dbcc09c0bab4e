<?php

require_once "../controladores/almacen.controlador.php";
require_once "../modelos/almacen.modelo.php";

class AjaxAlmacen{

	
	/*=============================================
	VALIDAR NO REPETIR PEDIDO
	=============================================*/	

	public $validarPedido;

	public function ajaxValidarPedido(){

		$item = "idPedido";
		$valor = $this->validarPedido;

		$respuesta = ControladorAlmacen::ctrMostrarAlmacen($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	EDITAR ALMACEN
	=============================================*/	

	public $idAlmacen2;

	public function ajaxEditarPedido(){

		$item = "id";
		$valor = $this->idAlmacen2;

		$respuesta = ControladorAlmacen::ctrMostrarAlmacenEdicion($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VER COMENTARIOS
	=============================================*/	

	public $idAlmacen4;

	public function ajaxVerObservaciones(){

		$item = "id";
		$valor = $this->idAlmacen4;

		$respuesta = ControladorAlmacen::ctrMostrarAlmacenEdicion($item, $valor);

		echo json_encode($respuesta);

	}
	
	
	/*=============================================
	HABILITAR PEDIDO
	=============================================*/	

	public $activarPedido;
	public $activarId;

	public function ajaxActivarPedido(){

		$tabla = "almacen";

		$item1 = "habilitado";
		$valor1 = $this->activarPedido;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloAlmacen::mdlHabilitarPedido($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}



}

/*=============================================
HABILITAR PEDIDO
=============================================*/	

if(isset($_POST["activarPedido"])){

	$activarPedido = new AjaxAlmacen();
	$activarPedido -> activarPedido = $_POST["activarPedido"];
	$activarPedido -> activarId = $_POST["activarId"];
	$activarPedido -> ajaxActivarPedido();

}

/*=============================================
EDITAR PEDIDO
=============================================*/
if(isset($_POST["idAlmacen2"])){

	$editar = new AjaxAlmacen();
	$editar -> idAlmacen2 = $_POST["idAlmacen2"];
	$editar -> ajaxEditarPedido();

}
/*=============================================
VER OBSERVACIONES
=============================================*/
if(isset($_POST["idAlmacen4"])){

	$verObservaciones = new AjaxAlmacen();
	$verObservaciones -> idAlmacen4 = $_POST["idAlmacen4"];
	$verObservaciones -> ajaxVerObservaciones();

}

/*=============================================
VALIDAR NO REPETIR PEDIDO
=============================================*/

if(isset($_POST["validarPedido"])){

	$valPedido = new AjaxAlmacen();
	$valPedido -> validarPedido = $_POST["validarPedido"];
	$valPedido -> ajaxValidarPedido();

}
