<?php

require_once "../controladores/compras.controlador.php";
require_once "../modelos/compras.modelo.php";

class AjaxCompras{


	/*=============================================
	VALIDAR NO REPETIR PEDIDO
	=============================================*/	

	public $validarPedido4;

	public function ajaxValidarPedido(){

		$item = "idPedido";
		$valor = $this->validarPedido4;

		$respuesta = ControladorCompras::ctrMostrarCompras($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VALIDAR NO REPETIR PEDIDO
	=============================================*/	

	public $validarPedidos4;

	public function ajaxValidarPedidos(){

		$item = "idPedido";
		$valor = $this->validarPedidos4;

		$respuesta = ControladorCompras::ctrMostrarComprasAdquisicion($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR COMPRAS GENERALES
	=============================================*/	

	public $idCompra;

	public function ajaxEditarCompras(){

		$item = "id";
		$valor = $this->idCompra;

		$respuesta = ControladorCompras::ctrMostrarComprasEdicion($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR COMPRAS INTERNAS
	=============================================*/	

	public $idCompra1;

	public function ajaxEditarComprasInternas(){

		$item = "id";
		$valor = $this->idCompra1;

		$respuesta = ControladorCompras::ctrMostrarComprasEdicion($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VER COMENTARIOS
	=============================================*/	

	public $idCompras4;

	public function ajaxVerObservaciones(){

		$item = "id";
		$valor = $this->idCompras4;

		$respuesta = ControladorCompras::ctrMostrarComprasEdicion($item, $valor);

		echo json_encode($respuesta);

	}
	

	/*=============================================
	MOSTRAR COMPRAS PEDIDOS
	=============================================*/	

	public $idCom;

	public function ajaxMostrarCompras(){

		$item = "id";
		$valor = $this->idCom;

		$respuesta = ControladorCompras::ctrMostrarComprasPedidos($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	HABILITAR PEDIDO
	=============================================*/	

	public $activarCompra;
	public $activarId;

	public function ajaxActivarCompra(){

		$tabla = "compras";

		$item1 = "habilitado";
		$valor1 = $this->activarCompra;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloCompras::mdlHabilitarCompra($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	

}
/*=============================================
HABILITAR COMPRA
=============================================*/	

if(isset($_POST["activarCompra"])){

	$activarCompra = new AjaxCompras();
	$activarCompra -> activarCompra = $_POST["activarCompra"];
	$activarCompra -> activarId = $_POST["activarId"];
	$activarCompra -> ajaxActivarCompra();

}

/*=============================================
EDITAR COMPRA
=============================================*/
if(isset($_POST["idCompra"])){

	$editarCompra = new AjaxCompras();
	$editarCompra -> idCompra = $_POST["idCompra"];
	$editarCompra -> ajaxEditarCompras();

}
/*=============================================
EDITAR COMPRAS INTERNAS
=============================================*/
if(isset($_POST["idCompra1"])){

	$editarCompra1 = new AjaxCompras();
	$editarCompra1 -> idCompra1 = $_POST["idCompra1"];
	$editarCompra1 -> ajaxEditarComprasInternas();

}
/*=============================================
VER OBSERVACIONES
=============================================*/
if(isset($_POST["idCompras4"])){

	$verObservaciones = new AjaxCompras();
	$verObservaciones -> idCompras4 = $_POST["idCompras4"];
	$verObservaciones -> ajaxVerObservaciones();

}

/*=============================================
MOSTRAR COMPRAS PEDIDOS
=============================================*/
if(isset($_POST["idCom"])){

	$verCompras = new AjaxCompras();
	$verCompras -> idCom = $_POST["idCom"];
	$verCompras -> ajaxMostrarCompras();

}

/*=============================================
VALIDAR NO REPETIR PEDIDO
=============================================*/

if(isset($_POST["validarPedido4"])){

	$valPedido = new AjaxCompras();
	$valPedido -> validarPedido4 = $_POST["validarPedido4"];
	$valPedido -> ajaxValidarPedido();

}
/*=============================================
VALIDAR NO REPETIR PEDIDO
=============================================*/

if(isset($_POST["validarPedidos4"])){

	$valPedido = new AjaxCompras();
	$valPedido -> validarPedidos4 = $_POST["validarPedidos4"];
	$valPedido -> ajaxValidarPedidos();

}



