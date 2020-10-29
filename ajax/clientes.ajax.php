<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	  ACTIVAR CLIENTE
	  =============================================*/	

	  public $activarCliente;
	  public $activarId;

	  public function ajaxActivarCliente(){

	  	$tabla = "clientes";

		$item1 = "statusCliente";
		$valor1 = $this->activarCliente;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	  }

	}



/*=============================================
ACTIVAR CLIENTE
=============================================*/

if(isset($_POST["activarCliente"])){

	$activarCliente = new AjaxClientes();
	$activarCliente -> activarCliente = $_POST["activarCliente"];
	$activarCliente -> activarId = $_POST["activarId"];
	$activarCliente -> ajaxActivarCliente();

}


