<?php

require_once "../controladores/laboratorio.controlador.php";
require_once "../modelos/laboratorio.modelo.php";

class AjaxLaboratorio{


	/*=============================================
	VALIDAR NO REPETIR PEDIDO
	=============================================*/	

	public $validarPedido2;

	public function ajaxValidarPedido(){

		$item = "idPedido";
		$valor = $this->validarPedido2;

		$respuesta = ControladorLaboratorio::ctrMostrarLaboratorio($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR PEDIDO LABORATORIO
	=============================================*/	

	public $idLaboratorio2;

	public function ajaxEditarLaboratorio(){

		$item = "id";
		$valor = $this->idLaboratorio2;

		$respuesta = ControladorLaboratorio::ctrMostrarLaboratorioEdicion($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER COMENTARIOS
	=============================================*/	

	public $idLaboratorio4;

	public function ajaxVerObservaciones(){

		$item = "id";
		$valor = $this->idLaboratorio4;

		$respuesta = ControladorLaboratorio::ctrMostrarLaboratorioEdicion($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER IGUALADOS 
	=============================================*/	

	public $idLab;

	public function ajaxVerIgualados(){

		$item = "id";
		$valor = $this->idLab;

		$respuesta = ControladorLaboratorio::ctrMostrarIgualados($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	HABILITAR PEDIDO
	=============================================*/	

	public $activarPedido;
	public $activarId;

	public function ajaxActivarPedido(){

		$tabla = "laboratoriocolor";

		$item1 = "habilitado";
		$valor1 = $this->activarPedido;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloLaboratorio::mdlHabilitarPedido($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	
	



}

/*=============================================
HABILITAR PEDIDO
=============================================*/	

if(isset($_POST["activarPedido"])){

	$activarPedido = new AjaxLaboratorio();
	$activarPedido -> activarPedido = $_POST["activarPedido"];
	$activarPedido -> activarId = $_POST["activarId"];
	$activarPedido -> ajaxActivarPedido();

}
/*=============================================
EDITAR PEDIDO LABORATORIO
=============================================*/
if(isset($_POST["idLaboratorio2"])){

	$editar = new AjaxLaboratorio();
	$editar -> idLaboratorio2 = $_POST["idLaboratorio2"];
	$editar -> ajaxEditarLaboratorio();

}
/*=============================================
VER OBSERVACIONES
=============================================*/
if(isset($_POST["idLaboratorio4"])){

	$verObservaciones = new AjaxLaboratorio();
	$verObservaciones -> idLaboratorio4 = $_POST["idLaboratorio4"];
	$verObservaciones -> ajaxVerObservaciones();

}

/*=============================================
VER IGUALADOS
=============================================*/
if (isset($_POST["idLab"])) {
	$verIgualados = new AjaxLaboratorio();
	$verIgualados -> idLab = $_POST["idLab"];
	$verIgualados -> ajaxVerIgualados();
}
/*=============================================
VALIDAR NO REPETIR PEDIDO
=============================================*/

if(isset($_POST["validarPedido2"])){

	$valPedido = new AjaxLaboratorio();
	$valPedido -> validarPedido2 = $_POST["validarPedido2"];
	$valPedido -> ajaxValidarPedido();

}
