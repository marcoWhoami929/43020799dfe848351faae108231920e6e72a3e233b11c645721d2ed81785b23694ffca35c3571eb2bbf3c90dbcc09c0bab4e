<?php 
error_reporting(0);

require_once "../controladores/controlMuestras.controlador.php";
require_once "../modelos/controlMuestras.modelo.php";

class catProductosFunciones{

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/	

	public $idProducto;

	public function ajaxEditarProproducto(){

		$item = "id";
		$valor = $this->idProducto;

		$respuesta = ControladorControlMuestras::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR MARCA
	=============================================*/	

	public $idMarcas;

	public function ajaxEditarMarca(){

		$item = "idMarca";
		$valor = $this->idMarcas;

		$respuesta = ControladorControlMuestras::ctrMostrarMarcas($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR SUBCATEGORIA
	=============================================*/	

	public $idSubMarca;

	public function ajaxEditarSubcategoria(){

		$item = "idSubcategoria";
		$valor = $this->idSubMarca;

		$respuesta = ControladorControlMuestras::ctrMostrarSubcategoria($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	EDITAR SUBCATEGORIA DESGLOSE
	=============================================*/
	public $idDesglose;

	public function ajaxEditarSubcategoriaDesglose(){

		$item = "id";
		$valor = $this->idDesglose;

		$respuesta = ControladorControlMuestras::ctrMostrarSubcategoriaDesglose($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR SUBCATEGORIA DESGLOSE
	=============================================*/
	public $idSub;

	public function ajaxEditarSubDesglose(){

		$item = "id";
		$valor = $this->idSub;

		$respuesta = ControladorControlMuestras::ctrMostrarSubdesglose($item, $valor);

		echo json_encode($respuesta);

	}
}
/*=============================================
EDITAR PRODUCTO
=============================================*/
if(isset($_POST["idProducto"])){

	$editar = new catProductosFunciones();
	$editar -> idProducto = $_POST["idProducto"];
	$editar -> ajaxEditarProproducto();

}
/*=============================================
EDITAR MARCA
=============================================*/
if(isset($_POST["idMarcas"])){

	$editar = new catProductosFunciones();
	$editar -> idMarcas = $_POST["idMarcas"];
	$editar -> ajaxEditarMarca();

}

/*=============================================
EDITAR SUBCATEGORIA
=============================================*/
if(isset($_POST["idSubMarca"])){

	$editar = new catProductosFunciones();
	$editar -> idSubMarca = $_POST["idSubMarca"];
	$editar -> ajaxEditarSubcategoria();

}

/*=============================================
EDITAR SUBCATEGORIA DESGLOSE
=============================================*/
if(isset($_POST["idDesglose"])){

	$editar = new catProductosFunciones();
	$editar -> idDesglose = $_POST["idDesglose"];
	$editar -> ajaxEditarSubcategoriaDesglose();

}

/*=============================================
EDITAR SUBCATEGORIA SUBDESGLOSE
=============================================*/
if(isset($_POST["idSub"])){

	$editar = new catProductosFunciones();
	$editar -> idSub = $_POST["idSub"];
	$editar -> ajaxEditarSubDesglose();

}



 ?>