<?php

require_once "../controladores/facturacion.controlador.php";
require_once "../modelos/facturacion.modelo.php";

class AjaxFacturacion{

	/*=============================================
	VALIDAR NO REPETIR PEDIDO
	=============================================*/	

	public $validarPedido7;

	public function ajaxValidarPedido(){

		$item = "idPedido";
		$valor = $this->validarPedido7;

		$respuesta = ControladorFacturacion::ctrMostrarFacturacion($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR ALMACEN
	=============================================*/	

	public $idPedido;
    public $seriePedido;

    public function ajaxEditarFacturacion(){

        $item = "folioPedido";
        $valor = $this->idPedido;
        $item2 = "seriePedido";
        $valor2 = $this->seriePedido;
        
        $respuesta = ModeloFacturacion::mdlSeleccionarDatosFacturacion($item, $valor, $item2, $valor2);
        echo json_encode($respuesta);
         
    }

	/*=============================================
	VER COMENTARIOS
	=============================================*/	

	public $idFacturacion4;

	public function ajaxVerObservaciones(){

		$item = "id";
		$valor = $this->idFacturacion4;

		$respuesta = ControladorFacturacion::ctrMostrarFacturacionEdicion($item, $valor);

		echo json_encode($respuesta);

	}
	
	/*=============================================
	HABILITAR FACTURA
	=============================================*/	

	public $activarFactura;
	public $activarId;

	public function ajaxActivarFactura(){

		$tabla = "facturacion";

		$item1 = "habilitado";
		$valor1 = $this->activarFactura;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloFacturacion::mdlHabilitarFactura($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}
	/*=============================================
	MOSTRAR FACTURAS
	=============================================*/	

	public $idFacturacion2;
	public $serieFacturacion;

	public function ajaxMostrarFacturas(){
		$tabla = "facturasgenerales";

		$item = "idPedido";
		$valor = $this->idFacturacion2;
		$item2 = "serie";
		$valor2 = $this->serieFacturacion;

		$respuesta = ModeloFacturacion::mdlMostrarFacturasGenerales($tabla, $item, $valor, $item2, $valor2);

		echo json_encode($respuesta);

	}
	/*=============================================
	EDITAR DATOS FACTURA
	=============================================*/	
	public $arregloGeneral;
    public $editarSecciones;
    public $editarUsuario;
    public $editarSerie;
    public $editarIdPedido;
    public $editarStatus;
    public $editarOrdenCompra;
    public $editarTipo;
    public $editarStatusCliente;
    public $editarTipoRuta;
    public $editarFechaRecepcion;
    public $editarFechaEntrega;
    public $editarObservaciones;
    public $editarNombreCliente;
    public $editarFormatoPedido;
    public $cantidad;

    public function ajaxEditarDatosFactura(){
    	
    	$arregloDatos = array('editarSecciones' => $this->editarSecciones, 
    						  'editarUsuario' => $this->editarUsuario, 
    						  'editarSerie' => $this->editarSerie, 
    						  'editarIdPedido' => $this->editarIdPedido,
    						  'editarStatus' => $this->editarStatus,
    						  'editarOrdenCompra' => $this->editarOrdenCompra,
    						  'editarTipo' => $this->editarTipo,
    						  'editarStatusCliente' => $this->editarStatusCliente, 
    						  'editarTipoRuta' => $this->editarTipoRuta,
    						  'editarFechaRecepcion' => $this->editarFechaRecepcion,
    						  'editarFechaEntrega' => $this->editarFechaEntrega,
    						  'editarObservaciones' => $this->editarObservaciones,
    						  'editarNombreCliente' => $this->editarNombreCliente,
    						  'editarFormatoPedido' => $this->editarFormatoPedido,
    						  'cantidad' => $this->cantidad);

    	$arregloGeneral = $this->arregloGeneral;

    	$respuesta = ControladorFacturacion::ctrEditarPedido($arregloDatos,$arregloGeneral);

    	echo json_encode($respuesta);
    	
    }
    /*=============================================
	ACTUALIZAR SECCIONES EN FACTURACION
	=============================================*/	
	public $seriePedidoF;
	public $folioPedido;

	public function ajaxActualizarSeccion(){
		$tabla = "facturacion";

		$item = "idPedido";
		$valor = $this->folioPedido;
		$item2 = "serie";
		$valor2 = $this->seriePedidoF;

		$ultimaSeccion = ModeloFacturacion::mdlVerUltimaSeccion($tabla, $item, $valor, $item2, $valor2);

		if ($ultimaSeccion["ultimaSeccion"] >= 1) {
			$respuesta = ModeloFacturacion::mdlActualizarSeccion($tabla, $item, $valor, $item2, $valor2);
		}else if($ultimaSeccion["ultimaSeccion"] == 0){
			print("No podemos restar 1 al 0");
		}
	}
    /**
     * ELIMINAR FACTURA
     */

	public $serieFacturaEliminar;
	public $folioFacturaEliminar;
	public $seriePedidoFEliminar;
	public $folioPedidoEliminar;

	public function ajaxEliminarFactura(){
		$tabla1 = "facturasgenerales";
		$tabla = "facturacion";
		$tabla2 = "almacen";

		$item = "serie";
		$valor = $this->serieFacturaEliminar;
		$item2 = "folio";
		$valor2 = $this->folioFacturaEliminar;

		$respuesta = ModeloFacturacion::mdlEliminarFacturaGeneral($tabla1, $item, $valor, $item2, $valor2);

		$item3 = "folioPedido";
		$valor3 = $this->folioPedidoEliminar;
		$item4 = "seriePedido";
		$valor4 = $this->seriePedidoFEliminar;

		if ($respuesta == "ok") {

			$countGr = ModeloFacturacion::mdlContarFacturasGr($tabla1,$item3, $valor3, $item4, $valor4);
			//var_dump("Respuesta: ",$countGr);
			
			if ($countGr["nFacturasGr"] > 0) {
				$datosCount = array("secciones" => $countGr["nFacturasGr"] );
				$actualizarSeccion = ModeloFacturacion::mdlActualizarSeccionGr($tabla, $item3, $valor3, $item4, $valor4,$datosCount);
				
			}else{
				$datosCount = array("secciones" => 0 );
				$actualizarSeccion = ModeloFacturacion::mdlActualizarSeccionGr($tabla, $item3, $valor3, $item4, $valor4,$datosCount);
			}

			/*-------------ACTUALIZAR FOLIO FACTURA Y SERIE FACTURA EN FACTURACON*/
			$itemN = "folioPedido";
			$valorN = $this->folioPedidoEliminar;
			$itemN2 = "seriePedido";
			$valorN2 = $this->seriePedidoFEliminar;
			$mostrarDatosFacturas = ModeloFacturacion::mdlMostrarDatosFacturas($tabla1, $itemN, $valorN, $itemN2, $valorN2);
			$serieP = $mostrarDatosFacturas["serie"];
			$folioP = $mostrarDatosFacturas["folio"];

			if ($mostrarDatosFacturas["serie"] != "") {


				$datosFacturas = array("idPedido" => $valorN,
			    						"serie" => $valorN2,
			    						"serieFactura" => $serieP,
			      						"folioFactura" => $folioP);

				$actualizarDatosFacturas = ModeloFacturacion::mdlActualizarDatosFacturas($tabla, $datosFacturas);
			}else{
			   $datosFacturas = array("idPedido" => $valorN,
			    						"serie" => $valorN2,
			    						"serieFactura" => "",
			      						"folioFactura" => "");

				$actualizarDatosFacturas = ModeloFacturacion::mdlActualizarDatosFacturas($tabla, $datosFacturas);
			}
		}
		
		$respuesta2 = ModeloFacturacion::mdlMostrarSumaTotalFacturacion($tabla1, $item3, $valor3);
		$sumPartidas = $respuesta2["sumPartidas"];
		$sumUnidades = $respuesta2["sumUnidades"];
		$sumImporte =$respuesta2["sumImporte"];

		if ($sumImporte != null) {
			
			$datosAr = array("partSurt" => $sumPartidas,
							 "unidSurt" => $sumUnidades,
							 "importSurt" => $sumImporte);

			$respuestaActualizar = ModeloFacturacion::mdlActualizarImprtesFacturacion($tabla, $datosAr, $item3, $valor3);
			
		}else{

			print("No se Pudo ejecutar");
		}

			
			$datos = array("idPedido" => $valor3);

			$respuesta3 = ModeloFacturacion::mdlActualizarNivelesAlmacenFacturacion($tabla,$tabla2,$datos);

		echo json_encode($respuesta);
	}
	/**
	 * ACTUALIZAR NUMERO DE FACTURA EN FACTURAS GENERALES
	 */

	public function ajaxActualizarNumeroFacturaFacturasGenerales(){
		$tabla = "facturasgenerales";
		$item = "folioPedido";
		$valor = $this->folioPedido;

		$respuesta = ModeloFacturacion::mdlActualizarNumeroFacturaFacturasGenerales($tabla, $item, $valor);

	}

}

/*=============================================
HABILITAR FACTURA
=============================================*/	

if(isset($_POST["activarFactura"])){

	$activarFactura = new AjaxFacturacion();
	$activarFactura -> activarFactura = $_POST["activarFactura"];
	$activarFactura -> activarId = $_POST["activarId"];
	$activarFactura -> ajaxActivarFactura();

}
/*=============================================
EDITAR FACTURACION
=============================================*/
if(isset($_POST["idPedido"])){

    $editar2 = new AjaxFacturacion();
    $editar2 -> idPedido = $_POST["idPedido"];
    $editar2 -> seriePedido = $_POST["seriePedido"];
    $editar2 -> ajaxEditarFacturacion();

}
/*=============================================
VER OBSERVACIONES
=============================================*/
if(isset($_POST["idFacturacion4"])){

	$verObservaciones = new AjaxFacturacion();
	$verObservaciones -> idFacturacion4 = $_POST["idFacturacion4"];
	$verObservaciones -> ajaxVerObservaciones();

}

/*=============================================
VALIDAR NO REPETIR PEDIDO
=============================================*/

if(isset($_POST["validarPedido7"])){

	$valPedido = new AjaxFacturacion();
	$valPedido -> validarPedido7 = $_POST["validarPedido7"];
	$valPedido -> ajaxValidarPedido();

}
/*=============================================
MOSTRAR FACTURAS
=============================================*/
if(isset($_POST["idFacturacion2"])){

	$verFacturas = new AjaxFacturacion();
	$verFacturas -> idFacturacion2 = $_POST["idFacturacion2"];
	$verFacturas -> serieFacturacion = $_POST["serieFacturacion"];
	$verFacturas -> ajaxMostrarFacturas();

}
/*=============================================
OBTENER DATOS FACTURAS
=============================================*/
if (isset($_POST["arregloGeneral"])) {
	$editarFacturas = new AjaxFacturacion();
	$editarFacturas -> arregloGeneral = $_POST["arregloGeneral"];
	$editarFacturas -> editarSecciones = $_POST["editarSecciones"];
	$editarFacturas -> editarUsuario = $_POST["editarUsuario"];
	$editarFacturas -> editarSerie = $_POST["editarSerie"];
	$editarFacturas -> editarIdPedido = $_POST["editarIdPedido"];
	$editarFacturas -> editarStatus = $_POST["editarStatus"];
	$editarFacturas -> editarOrdenCompra = $_POST["editarOrdenCompra"];
	$editarFacturas -> editarTipo = $_POST["editarTipo"];
	$editarFacturas -> editarStatusCliente = $_POST["editarStatusCliente"];
	$editarFacturas -> editarTipoRuta = $_POST["editarTipoRuta"];
	$editarFacturas -> editarFechaRecepcion = $_POST["editarFechaRecepcion"];
	$editarFacturas -> editarFechaEntrega = $_POST["editarFechaEntrega"];
	$editarFacturas -> editarObservaciones = $_POST["editarObservaciones"];
	$editarFacturas -> editarNombreCliente = $_POST["editarNombreCliente"];
	$editarFacturas -> editarFormatoPedido = $_POST["editarFormatoPedido"];
	$editarFacturas -> cantidad = $_POST["cantidad"];
	$editarFacturas -> ajaxEditarDatosFactura();
}

if(isset($_POST["seriePedidoF"])){

	$verFacturas = new AjaxFacturacion();
	$verFacturas -> seriePedidoF = $_POST["seriePedidoF"];
	$verFacturas -> folioPedido = $_POST["folioPedido"];
	$verFacturas -> ajaxActualizarSeccion();

}

if (isset($_POST["serieFactura"])) {

	$eliminarFactura = new AjaxFacturacion();
	$eliminarFactura -> serieFacturaEliminar = $_POST["serieFactura"];
	$eliminarFactura -> folioFacturaEliminar = $_POST["folioFactura"];
	$eliminarFactura -> folioPedidoEliminar = $_POST["folioPedido"];
	$eliminarFactura -> seriePedidoFEliminar = $_POST["seriePedidoF"];
	$eliminarFactura -> ajaxEliminarFactura();
}

if (isset($_POST["folioPedido"])) {

	$eliminarFactura = new AjaxFacturacion();
	$eliminarFactura -> folioPedido = $_POST["folioPedido"];
	$eliminarFactura -> ajaxActualizarNumeroFacturaFacturasGenerales();
}