<?php
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class AjaxGastos{

	/*=============================================
	EDITAR GASTO
	=============================================*/	

	public $idGasto;

	public function ajaxEditarGasto(){

		$item = "id";
		$valor = $this->idGasto;

		$respuesta = ControladorFacturasTiendas::ctrMostrarDatosGasto($item, $valor);

		echo json_encode($respuesta);

	}

	public $idSolicitudAprobacion;
	public function ajaxGenerarSolicitudGasto(){

		$item = "id";
		$valor = $this->idSolicitudAprobacion;

		$tabla2 = "notificacionesgastos";

		$autorComentario = $_SESSION["id"];
		$tituloNotificacion = "".$_SESSION["nombre"]." ha solicitado la aprobación del gasto SGM ".$valor."";
		$datosGasto = array("titulo" => $tituloNotificacion,
						"folioGasto" => $valor,
						"autorGasto" => '51',
						"autorComentario" => $autorComentario);
		$respuesta2 = ModeloFacturasTiendas::mdlGuardarNotificacionGasto($tabla2, $datosGasto);


		$respuesta = ControladorFacturasTiendas::ctrGenerarSolicitudGasto($item,$valor);
		 echo json_encode($respuesta);

	}
	public $idAprobarSolicitud;
	public function ajaxAprobarSolicitudGasto(){

		$item = "id";
		$valor = $this->idAprobarSolicitud;

		$respuesta = ControladorFacturasTiendas::ctrAprobarSolicitudGasto($item,$valor);
		 echo json_encode($respuesta);

	}
	public $idGastoReembolsado;
	public function ajaxReembolsarSolicitudGasto(){

		$item = "id";
		$valor = $this->idGastoReembolsado;

		$obtenerUltimoSaldoCaja = ControladorFacturasTiendas::ctrMostrarUltimoSaldoCaja($item,$valor);

		$ultimoSaldoCaja = $obtenerUltimoSaldoCaja[0]["ultimoSaldo"];

		$idGastos = explode(',',$valor);

		foreach ($idGastos as $key => $value) {


			$obtenerUltimoSaldoCaja = ControladorFacturasTiendas::ctrMostrarUltimoSaldoCaja($item,$valor);

			$ultimoSaldoCaja = $obtenerUltimoSaldoCaja[0]["ultimoSaldo"];

			$idCaja = $obtenerUltimoSaldoCaja[0]["id"];
			$idCaja = $idCaja +1;

			$tabla = "caja";

			$item = 'id';
			$valor = $value;

			$obtenerDatosGasto = ControladorFacturasTiendas::ctrObtenerDatosGasto($item,$valor);

			$saldo = $ultimoSaldoCaja - $obtenerDatosGasto[0]["importeGasto"];

			$comprobacion = $ultimoSaldoCaja - $obtenerDatosGasto[0]["importeGasto"];

			$fecha = $obtenerDatosGasto[0]["fecha"];
			$nuevaFecha = new DateTime();
			$nuevaFecha = $nuevaFecha->createFromFormat('d/m/Y', $fecha);

			// aplico el nuevo formato
			$fechaOriginal= $nuevaFecha->format('Y-m-d');

			$diferencia = $saldo- $comprobacion;

				$datos = array("departamento" => $obtenerDatosGasto[0]["departamento"],
					           "grupo" => $obtenerDatosGasto[0]["grupo"],
					           "subgrupo" =>$obtenerDatosGasto[0]["subgrupo"],
					           "mes" => $obtenerDatosGasto[0]["mes"],
					           "fecha" => $obtenerDatosGasto[0]["fecha"],
					           "descripcion" => $obtenerDatosGasto[0]["descripcion"],
					           "cargo" => $obtenerDatosGasto[0]["importeGasto"],
					           "abono" => '0',
					           "saldo" => $saldo,
					           "ultimoSaldo" => $ultimoSaldoCaja,
					           "comprobacion" => $comprobacion,
					           "diferencia" => $diferencia,
					           "parciales" => "0",
					           "serie" => $obtenerDatosGasto[0]["serieGasto"],
					           "folio" => $obtenerDatosGasto[0]["folioGasto"],
					           "numeroMovimiento" => $idCaja,
					           "acreedor" => $obtenerDatosGasto[0]["acreedor"],
					           "concepto" => $obtenerDatosGasto[0]["descripcion"],
					           "numeroDocumento" => str_replace('-', ' ', $obtenerDatosGasto[0]["numeroDocumento"]),
					           "importe" => $obtenerDatosGasto[0]["importeGasto"],
					           "importeRetenciones" => $obtenerDatosGasto[0]["importeRetenciones"],
					           "importeParciales" => "0",
					           "tieneIva" => $obtenerDatosGasto[0]["tieneIva"],
					           "tieneRetenciones" => $obtenerDatosGasto[0]["tieneRetenciones"],
					           "tipoRetencion" => $obtenerDatosGasto[0]["tipoRetencion"],
					       	   "iva" => $obtenerDatosGasto[0]["iva"],
					       	   "retIva" => $obtenerDatosGasto[0]["retIva"],
					       	   "retIsr" => $obtenerDatosGasto[0]["retIsr"],
					       	   "retIva2" => $obtenerDatosGasto[0]["retIva2"],
					       	   "retIsr2" => $obtenerDatosGasto[0]["retIsr2"],
					       	   "retIva3" => $obtenerDatosGasto[0]["retIva3"],
					       	   "retIsr3" => $obtenerDatosGasto[0]["retIsr3"],
					       	   "fechaOriginal" => $fechaOriginal); 

			$generarDatosCaja = ModeloFacturasTiendas::mdlGenerarNuevoGastoCaja($tabla,$datos);

		}

		$item = "id";
		$valor = $this->idGastoReembolsado;
		$respuesta = ControladorFacturasTiendas::ctrReembolsarSolicitudGasto($item,$valor);
		echo json_encode($respuesta);
		

	}

}


/*=============================================
EDITAR GASTO
=============================================*/
if(isset($_POST["idGasto"])){

	$editar = new AjaxGastos();
	$editar -> idGasto = $_POST["idGasto"];
	$editar -> ajaxEditarGasto();

}
if (isset($_POST["idSolicitudAprobacion"])) {
	
	$solicitud = new AjaxGastos();
	$solicitud -> idSolicitudAprobacion = $_POST["idSolicitudAprobacion"];
	$solicitud -> ajaxGenerarSolicitudGasto();

}
if (isset($_POST["idAprobarSolicitud"])) {
	
	$solicitud = new AjaxGastos();
	$solicitud -> idAprobarSolicitud = $_POST["idAprobarSolicitud"];
	$solicitud -> ajaxAprobarSolicitudGasto();

}
if (isset($_POST["idGastoReembolsado"])) {
	
	$solicitud = new AjaxGastos();
	$solicitud -> idGastoReembolsado = $_POST["idGastoReembolsado"];
	$solicitud -> ajaxReembolsarSolicitudGasto();

}
