<?php 
require_once "../controladores/controlMuestras.controlador.php";
require_once "../modelos/controlMuestras.modelo.php";

class AjaxControlMuestras{

	/*=============================================
	VER DATOS DEL CLIENTE
	=============================================*/	

	public $idDatosCliente;

	public function ajaxVerDatosCliente(){

		$item2 = "idCliente";
		$valor2 = $this->idDatosCliente;

		$respuesta = ControladorControlMuestras::ctrMostrarDatosClienteMuestras($item2, $valor2);

		echo json_encode($respuesta);

	}

	public $nameSucursal;

	public function ajaxVerSucursal(){

		$item = "sucursal";
		$valor = $this->nameSucursal;

		$respuesta = ControladorControlMuestras::ctrMostrarSucursales($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
VER OBSERVACIONES
=============================================*/
if(isset($_POST["idDatosCliente"])){

	$verDatosCliente = new AjaxControlMuestras();
	$verDatosCliente -> idDatosCliente = $_POST["idDatosCliente"];
	$verDatosCliente -> ajaxVerDatosCliente();

}

/*=============================================
VER OBSERVACIONES
=============================================*/
if(isset($_POST["nameSucursal"])){

	$verDatosCliente = new AjaxControlMuestras();
	$verDatosCliente -> nameSucursal = $_POST["nameSucursal"];
	$verDatosCliente -> ajaxVerSucursal();

}

