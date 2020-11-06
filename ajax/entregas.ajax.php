<?php

require_once "../controladores/entregas.controlador.php";
require_once "../modelos/entregas.modelo.php";

class AjaxEntregas{

	public $idRuta;
	public $nombreRuta;

	public function listaUnidadesRuta(){

		$item = "tipoRuta";
		$valor = $this->nombreRuta;

		$respuesta = controladorEntregas::ctrMostrarUnidadesRuta($item, $valor);

		echo json_encode($respuesta);


	}
	public $idFactura;

	public function actualizarEstatusFactura(){

		$item = "id";
		$valor = $this->idFactura;

		$respuesta = controladorEntregas::ctrActualizarEntregaFactura($item, $valor);

		echo json_encode($respuesta);


	}	
	public $idFacturaRemove;

	public function actualizarEstatusFacturaRemove(){

		$item = "id";
		$valor = $this->idFacturaRemove;

		$respuesta = controladorEntregas::ctrActualizarEntregaFacturaRemove($item, $valor);

		echo json_encode($respuesta);


	}

	public $fechaEntrega;
	public $operador;
	public $entrega;
	public $nombreRutaEntrega;
	public $unidad;
	public $tipoEntrega;
	public $arregloFacturas;

	public function generarNuevaEntrega(){

		$fechaEntrega = $this->fechaEntrega;
		$operador = $this->operador;
		$entrega = $this->entrega;
		$unidad = $this->unidad;
		$tipoEntrega = $this->tipoEntrega;
		$nombreRuta = $this->nombreRutaEntrega;
		$arregloFacturas = $this->arregloFacturas;

		$facturas = explode(',',$arregloFacturas);

		$item = "id";
		$valor = $arregloFacturas;
			
		$array = array();

		$costo = ControladorEntregas::ctrObtenerCostoHoraEntrega($nombreRuta,$unidad);
		$costoHora = $costo["costo"];


		for ($i=0; $i < count($facturas); $i++) { 
			$item = "id";
			$valor = $facturas[$i];

			$folioEntrega = ControladorEntregas::ctrObtenerFolioEntrega();

			$item2 = "idEntrega";
			$valor2 = $folioEntrega["folio"];
			$obtenerMonto = ControladorEntregas::ctrObtenerMontoEntrega($item,$valor);
			array_push($array, $obtenerMonto["total"]);

			$actualizarEntrega = ControladorEntregas::ctrActualizarFacturaEntrega($item,$valor,$item2,$valor2);


			$datosFactura = ControladorEntregas::ctrMostrarDatosFactura($item,$valor);

			
			$cliente = $datosFactura["nombreCliente"];

			$obtenerUtilidad = ControladorEntregas::ctrObtenerUtilidadCliente($cliente);
			$utilidad = $obtenerUtilidad["utilidad"];

			$tipoCliente = $datosFactura["tipoCliente"];



			$datosFactura = array("idEntrega" =>$folioEntrega["folio"],
								  "idFactura" =>$valor,
								  "tipoCliente" => $tipoCliente,
								  "costoHora" => $costoHora,
								  "promedio" => $utilidad);


			 $añadirFactura = ControladorEntregas::ctrInsertarFacturaEntrega($datosFactura);

		}
		

		$monto = array_sum($array);


		$datosEntrega = array(	"id"=>$folioEntrega["folio"],
								"fechaEntrega"=>$fechaEntrega,
								  "operador"=>$operador,
								  "entrega"=>$entrega,
								  "unidad"=>$unidad,
								  "montoTotal"=>$monto,
								  "tipoEntrega"=>$tipoEntrega,);

		$crearEntrega = ControladorEntregas::ctrGenerarNuevaEntrega($datosEntrega);

		echo json_encode($crearEntrega);
		
		

	}
	public $idEntrega;

	public function obtenerDetalleEntrega(){

		$item = "idEntrega";
		$valor = $this->idEntrega;

		$respuesta = controladorEntregas::ctrDetalleEntrega($item, $valor);

		echo json_encode($respuesta);


	}

	public $idFacturaEntrega;
	public $horaInicio;
	public $horaTermino;
	public $idEntregaFinalizada;

	public function actualizarHorariosFactura(){

		$item = "id";
		$valor = $this->idFacturaEntrega;

		$idFacturaEntrega = $this->idFacturaEntrega;

		$inicio = $this->horaInicio;
		$termino = $this->horaTermino;

		$idEntrega = $this->idEntregaFinalizada;

		$hora1 = new DateTime($inicio);//fecha inicial
		$hora2 = new DateTime($termino);//fecha de cierre

		$intervalo = $hora1->diff($hora2);

		$horas = $intervalo->format('%H');

		$totalFactura = ControladorEntregas::ctrObtenerTotalFactura($idFacturaEntrega);

		$total = $totalFactura["total"];

		$respuesta = controladorEntregas::ctrActualizarHorariosFactura($item, $valor,$inicio,$termino,$horas,$total);

		$pendientes = ControladorEntregas::ctrPendientesFinalizar($idEntrega);

		if ($pendientes["pendientes"] == 0) {

			$finalizarEntrega = ControladorEntregas::ctrFinalizarEntrega($idEntrega);

		}else{

		}
		
		echo json_encode($respuesta);
		


	}



}

if(isset($_POST["idRuta"])){

	$obtenerUnidad = new AjaxEntregas();
	$obtenerUnidad -> nombreRuta = $_POST["nombreRuta"];
	$obtenerUnidad -> idRuta = $_POST["idRuta"];
	$obtenerUnidad -> listaUnidadesRuta();

}
if(isset($_POST["idFactura"])){

	$actualizarEntregaFactura = new AjaxEntregas();
	$actualizarEntregaFactura -> idFactura = $_POST["idFactura"];
	$actualizarEntregaFactura -> actualizarEstatusFactura();

}
if(isset($_POST["idFacturaRemove"])){

	$actualizarEntregaFacturaRemove = new AjaxEntregas();
	$actualizarEntregaFacturaRemove -> idFacturaRemove = $_POST["idFacturaRemove"];
	$actualizarEntregaFacturaRemove -> actualizarEstatusFacturaRemove();

}
if(isset($_POST["fechaEntrega"])){

	$nuevaEntrega = new AjaxEntregas();
	$nuevaEntrega -> fechaEntrega = $_POST["fechaEntrega"];
	$nuevaEntrega -> operador = $_POST["operador"];
	$nuevaEntrega -> entrega = $_POST["entrega"];
	$nuevaEntrega -> nombreRutaEntrega = $_POST["nombreEntregaRuta"];
	$nuevaEntrega -> unidad = $_POST["unidad"];
	$nuevaEntrega -> tipoEntrega = $_POST["tipoEntrega"];
	$nuevaEntrega -> arregloFacturas = $_POST["arregloFacturas"];
	$nuevaEntrega -> generarNuevaEntrega();

}
if(isset($_POST["idEntrega"])){

	$detalleEntrega = new AjaxEntregas();
	$detalleEntrega -> idEntrega = $_POST["idEntrega"];
	$detalleEntrega -> obtenerDetalleEntrega();

}
if(isset($_POST["idFacturaEntrega"])){

	$actualizarHorarios = new AjaxEntregas();
	$actualizarHorarios -> idFacturaEntrega = $_POST["idFacturaEntrega"];
	$actualizarHorarios -> idEntregaFinalizada = $_POST["idEntregaFinalizada"];
	$actualizarHorarios -> horaInicio = $_POST["horaInicio"];
	$actualizarHorarios -> horaTermino = $_POST["horaTermino"];
	$actualizarHorarios -> actualizarHorariosFactura();

}