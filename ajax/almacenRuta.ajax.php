<?php

require_once "../controladores/almacenRuta.controlador.php";
require_once "../modelos/almacenRuta.modelo.php";

class AjaxAlmacenRuta{


	/*=============================================
	EDITAR ORDEN DE TRABAJO
	=============================================*/	

	public $idOrden;

	public function ajaxEditarOrden(){

		$item = "id";
		$valor = $this->idOrden;

		$respuesta = ControladorAlmacenRuta::ctrMostrarOrdenesDeTrabajo($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER TRASPASOS
	=============================================*/	

	public $serieOrden;
	public $folioOrden;

	public function ajaxVerTraspasos(){

		$item = "serieOrden";
		$valor = $this->serieOrden;

		$item2 = "folioOrden";
		$valor2 = $this->folioOrden;

		$respuesta = ControladorAlmacenRuta::ctrMostrarListaTraspasos($item, $valor,$item2,$valor2);

		echo json_encode($respuesta);

	}
	/*=============================================
	HABILITAR ORDEN
	=============================================*/	

	public $activarOrden;
	public $activarId;

	public function ajaxActivarOrden(){

		$tabla = "almacen";

		$item1 = "habilitado";
		$valor1 = $this->activarOrden;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloAlmacenRuta::mdlHabilitarOrden($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


}
/*=============================================
HABILITAR ORDEN DE TRABAJO
=============================================*/	

if(isset($_POST["activarOrden"])){

	$activarPedido = new AjaxAlmacenRuta();
	$activarPedido -> activarOrden = $_POST["activarOrden"];
	$activarPedido -> activarId = $_POST["activarId"];
	$activarPedido -> ajaxActivarOrden();

}

/*=============================================
EDITAR ORDEN ALMACEN
=============================================*/
if(isset($_POST["idOrden"])){

	$editar = new AjaxAlmacenRuta();
	$editar -> idOrden = $_POST["idOrden"];
	$editar -> ajaxEditarOrden();

}
/*=============================================
VER LISTA DE TRASPASOS
=============================================*/
if(isset($_POST["serieOrden"])){

	$verTraspaso = new AjaxAlmacenRuta();
	$verTraspaso -> serieOrden = $_POST["serieOrden"];
	$verTraspaso -> folioOrden = $_POST["folioOrden"];
	$verTraspaso -> ajaxVerTraspasos();

}	