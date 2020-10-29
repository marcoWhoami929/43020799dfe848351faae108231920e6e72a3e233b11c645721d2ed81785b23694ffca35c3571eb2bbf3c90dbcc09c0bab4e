<?php

require_once "../controladores/ordenTrabajo.controlador.php";
require_once "../modelos/ordenTrabajo.modelo.php";

class AjaxOrdenes{


	/*=============================================
	EDITAR ORDEN DE TRABAJO
	=============================================*/	

	public $idOrden;

	public function ajaxEditarOrden(){

		$item = "id";
		$valor = $this->idOrden;

		$respuesta = ControladorOrdenes::ctrMostrarOrdenesDeTrabajo($item, $valor);

		echo json_encode($respuesta);

    }
    /*=============================================
	HABILITAR ORDEN
	=============================================*/	

	public $activarOrden;
	public $activarId;

	public function ajaxActivarOrden(){

		$tabla = "ordenesdetrabajo";

		$item1 = "habilitado";
		$valor1 = $this->activarOrden;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloOrdenes::mdlHabilitarOrden($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}
	/*=============================================
	VER MOTIVOS DE CANCELACION
	=============================================*/	
	public $idOrden2;

	public function ajaxVerCancelacion(){

		$item = "id";
		$valor = $this->idOrden2;

		$respuesta =  ControladorOrdenes::ctrMostrarOrdenesDeTrabajo($item, $valor);

		echo json_encode($respuesta);
	}


}
/*=============================================
HABILITAR ORDEN DE TRABAJO
=============================================*/	

if(isset($_POST["activarOrden"])){

	$activarPedido = new AjaxOrdenes();
	$activarPedido -> activarOrden = $_POST["activarOrden"];
	$activarPedido -> activarId = $_POST["activarId"];
	$activarPedido -> ajaxActivarOrden();

}

/*=============================================
EDITAR ORDEN
=============================================*/
if(isset($_POST["idOrden"])){

	$editar = new AjaxOrdenes();
	$editar -> idOrden = $_POST["idOrden"];
	$editar -> ajaxEditarOrden();

}
/*=============================================
VER MOTIVOS DE CANCELACIÓN
=============================================*/
if (isset($_POST["idOrden2"])) {
	
	$visualizar = new AjaxOrdenes();
	$visualizar -> idOrden2 = $_POST["idOrden2"];
	$visualizar -> ajaxVerCancelacion();
}