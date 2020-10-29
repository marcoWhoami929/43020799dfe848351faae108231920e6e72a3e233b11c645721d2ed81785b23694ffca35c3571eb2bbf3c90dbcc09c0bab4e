<?php

require_once "../controladores/facturacionRuta.controlador.php";
require_once "../modelos/facturacionRuta.modelo.php";

class AjaxFacturacionRuta{

	/*=============================================
	VER FATURAS
	=============================================*/	
	public $idFacturasSec;

	public function ajaxVerFacturas(){
		$item = "folio";
		$valor = $this->idFacturasSec;

		$respuesta = ControladorFacturacionRuta::ctrMostrarDatosFacturasOT($item, $valor);
		echo json_encode($respuesta);
	}
	/*=============================================
	ELIMINAR FACTURA ORDEN
	=============================================*/	
	public $editSerie;
	public $editFolio;

	public function ajaxEliminarFactura(){
		$tabla1 = "facturasordenes";
		$tabla = "facturacionot";
		$tabla2 = "almacenot";

		$item1 = "serieFactura";
		$valor1 = $this->editSerie;
		$item2 = "folioFactura";
		$valor2 = $this->editFolio;

		$respuesta = ModeloFacturacionRuta::mdlEliminarFacturaOrden($tabla1, $item1, $valor1, $item2, $valor2);

		$item3 = "folio";
		$valor3 = $this->actualizarNuFactura;
		$respuesta2 = ModeloFacturacionRuta::mdlMostrarSumaTotal($tabla1, $item3, $valor3);
		$sumPartidas = $respuesta2["sumPartidas"];
		$sumUnidades = $respuesta2["sumUnidades"];
		$sumImporte =$respuesta2["sumImporte"];

		if ($sumImporte != null) {
			
			$datosAr = array("partidasSurtidas" => $sumPartidas,
							 "unidadesSurtidas" => $sumUnidades,
							 "importeSurtido" => $sumImporte);

			$respuestaActualizar = ModeloFacturacionRuta::mdlActualizarImprtes($tabla, $datosAr, $item3, $valor3);
			
		}else{

			print("No se Pudo ejecutar");
		}

			
			$datos = array("folio" => $valor3);

			$respuesta3 = ModeloFacturacionRuta::mdlActualizarNivelesAlmacen($tabla,$tabla2,$datos);

		echo json_encode($respuesta);
	}
	public $eliminarSeccion;
	public $eliminarSeccionS;
	public function ajaxEliminarSeccion(){
		$tabla = "facturacionot";
		$itemN = "folio";
		$valorN = $this->eliminarSeccion;

		$itemN2 = "serie";
		$valorN2 = $this->eliminarSeccionS;

		$mdlUltimaSeccion = ModeloFacturacionRuta::mdlUltimaSeccion($tabla, $itemN2, $valorN2, $itemN, $valorN);
		

		if ($mdlUltimaSeccion["ultimaSeccion"] >= 1) {
			$respuesta = ModeloFacturacionRuta::mdlEliminarSeccion($tabla, $itemN2, $valorN2, $itemN, $valorN);
		}else if($mdlUltimaSeccion["ultimaSeccion"] == 0){
			print("No se puede Hacer un menos 1");
		}

		

	}
	public $actualizarNuFactura;

	public function ajaxActualizarNumeroFactura(){
		$tabla = "facturasordenes";
		$item = "folioPedido";
		$valor = $this->actualizarNuFactura;

		$respuesta = ModeloFacturacionRuta::mdlActualizarNumeroFactura($tabla, $item, $valor);

	}

	/*=============================================
	EDITAR ORDEN DE TRABAJO
	=============================================*/	

	public $idOrden;
	public $folioOrd;

	public function ajaxEditarOrden(){

		$item = "id";
		$valor = $this->idOrden;

		$item2 = "folio";
		$valor2 = $this->folioOrd;

		$respuesta = ControladorFacturacionRuta::ctrMostrarOrdenesDeTrabajo($item, $valor,$item2, $valor2);

		echo json_encode($respuesta);

	}
	
	public $folioOrden;

	public function ajaxObtenerDatosFactura2(){

		$item = "folioPedido";
		$valor = $this->folioOrden;

		$respuesta = ControladorFacturacionRuta::ctrMostrarDatosFactura($item, $valor);

		echo json_encode($respuesta);
		

	}
	public function ajaxObtenerDatosFactura3(){

		$item = "folioPedido";
		$valor = $this->folioOrden3;

		$respuesta = ControladorFacturacionRuta::ctrMostrarDatosFactura3($item, $valor);

		echo json_encode($respuesta);
		

	}
	public function ajaxObtenerDatosFactura4(){

		$item = "folioPedido";
		$valor = $this->folioOrden4;

		$respuesta = ControladorFacturacionRuta::ctrMostrarDatosFactura4($item, $valor);

		echo json_encode($respuesta);
		

	}
	public function ajaxObtenerDatosFactura5(){

		$item = "folioPedido";
		$valor = $this->folioOrden5;

		$respuesta = ControladorFacturacionRuta::ctrMostrarDatosFactura5($item, $valor);

		echo json_encode($respuesta);
		

	}
	public function ajaxObtenerDatosFactura6(){

		$item = "folioPedido";
		$valor = $this->folioOrden6;

		$respuesta = ControladorFacturacionRuta::ctrMostrarDatosFactura6($item, $valor);

		echo json_encode($respuesta);
		

	}
	public function ajaxObtenerDatosFactura7(){

		$item = "folioPedido";
		$valor = $this->folioOrden7;

		$respuesta = ControladorFacturacionRuta::ctrMostrarDatosFactura7($item, $valor);

		echo json_encode($respuesta);
		

	}
	/*=============================================
	HABILITAR ORDEN
	=============================================*/	

	public $activarOrden;
	public $activarId;

	public function ajaxActivarOrden(){

		$tabla = "facturacionot";

		$item1 = "habilitado";
		$valor1 = $this->activarOrden;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloFacturacionRuta::mdlHabilitarOrden($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


}


/*=============================================
HABILITAR ORDEN DE TRABAJO
=============================================*/	

if(isset($_POST["activarOrden"])){

	$activarPedido = new AjaxFacturacionRuta();
	$activarPedido -> activarOrden = $_POST["activarOrden"];
	$activarPedido -> activarId = $_POST["activarId"];
	$activarPedido -> ajaxActivarOrden();

}
/*=============================================
EDITAR ORDEN FACTURACION
=============================================*/
if(isset($_POST["idOrden"])){

	$editar = new AjaxFacturacionRuta();
	$editar -> idOrden = $_POST["idOrden"];
	$editar -> folioOrd = $_POST["folioOrd"];
	$editar -> ajaxEditarOrden();

}
/*=============================================
OBTENER DATOS DE FACTURA
=============================================*/
if(isset($_POST["folioOrden"])){

	$editar = new AjaxFacturacionRuta();
	$editar -> folioOrden = $_POST["folioOrden"];
	$editar -> ajaxObtenerDatosFactura2();


}
if(isset($_POST["folioOrden3"])){

	$editar = new AjaxFacturacionRuta();
	$editar -> folioOrden3 = $_POST["folioOrden3"];
	$editar -> ajaxObtenerDatosFactura3();


}
if(isset($_POST["folioOrden4"])){

	$editar = new AjaxFacturacionRuta();
	$editar -> folioOrden4 = $_POST["folioOrden4"];
	$editar -> ajaxObtenerDatosFactura4();


}
if(isset($_POST["folioOrden5"])){

	$editar = new AjaxFacturacionRuta();
	$editar -> folioOrden5 = $_POST["folioOrden5"];
	$editar -> ajaxObtenerDatosFactura5();


}
if(isset($_POST["folioOrden6"])){

	$editar = new AjaxFacturacionRuta();
	$editar -> folioOrden6 = $_POST["folioOrden6"];
	$editar -> ajaxObtenerDatosFactura6();


}
if(isset($_POST["folioOrden7"])){

	$editar = new AjaxFacturacionRuta();
	$editar -> folioOrden7 = $_POST["folioOrden7"];
	$editar -> ajaxObtenerDatosFactura7();
}

if(isset($_POST["idFacturasSec"])){

	$editar = new AjaxFacturacionRuta();
	$editar -> idFacturasSec = $_POST["idFacturasSec"];
	$editar -> ajaxVerFacturas();
}

/*=============================================
ELIMINAR FACTURAS
=============================================*/
if (isset($_POST["editSerie"])) {

	$eliminarFactura = new AjaxFacturacionRuta();
	$eliminarFactura -> editSerie = $_POST["editSerie"];
	$eliminarFactura -> editFolio = $_POST["editFolio"];
	$eliminarFactura -> actualizarNuFactura = $_POST["actualizarNuFactura"];
	$eliminarFactura -> ajaxEliminarFactura();
}

if (isset($_POST["eliminarSeccion"])) {

	$eliminarFactura = new AjaxFacturacionRuta();
	$eliminarFactura -> eliminarSeccion = $_POST["eliminarSeccion"];
	$eliminarFactura -> eliminarSeccionS = $_POST["eliminarSeccionS"];
	$eliminarFactura -> ajaxEliminarSeccion();
}
if (isset($_POST["actualizarNuFactura"])) {

	$eliminarFactura = new AjaxFacturacionRuta();
	$eliminarFactura -> actualizarNuFactura = $_POST["actualizarNuFactura"];
	$eliminarFactura -> ajaxActualizarNumeroFactura();
}