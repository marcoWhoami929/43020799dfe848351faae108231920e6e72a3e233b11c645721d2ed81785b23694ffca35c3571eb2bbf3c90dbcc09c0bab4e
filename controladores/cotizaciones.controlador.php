<?php

class ControladorCotizaciones{

	/*=============================================
	MOSTRAR COTIZACIONES
	=============================================*/

	static public function ctrMostrarCotizaciones($item, $valor){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarCotizaciones($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COTIZACIONES PDF
	=============================================*/

	static public function ctrMostrarCotizacionesPdf($item, $valor){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarCotizacionesPdf($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COTIZACIONES VISTA
	=============================================*/

	static public function ctrMostrarCotizacionesVista($item, $valor){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarCotizacionesVista($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COTIZACIONES VISTA CANCELADAS
	=============================================*/

	static public function ctrMostrarCotizacionesVistaCanceladas($item, $valor){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarCotizacionesVistaCanceladas($tabla, $item, $valor);

		return $respuesta;
	}
	
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloCotizaciones::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrProductosCotizacion($item2, $valor2){

		$tabla2 = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlProductosCotizacion($tabla2, $item2, $valor2);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PRODUCTOS TOTALES
	=============================================*/

	static public function ctrProductosCotizacionTotales($item2, $valor2){

		$tabla2 = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlProductosCotizacionTotales($tabla2, $item2, $valor2);

		return $respuesta;
	}

	/*=============================================
	CANCELAR PEDIDO
	=============================================*/

	static public function ctrCancelarCotizacion(){

		if(isset($_GET["idCotizacion"])){

			$tabla = "cotizaciones";
			$datos = array("folio" => $_GET["idCotizacion"],
						   "motivoCancelacion" => $_GET['motivo']);

			$tabla1 = "bitacora";
			$datos1 = array("usuario" => $_SESSION["nombre"],
								   "perfil" => $_SESSION["perfil"],
								   "accion" => 'Cancelación de Cotizacion',
								   "folio" => $_GET["idCotizacion"]);

			


			$respuesta = ModeloCotizaciones::mdlCancelarCotizacion($tabla, $datos);
			$respuesta1 = ModeloCotizaciones::mdlRegistroBitacoraCancelar($tabla1, $datos1);

			if($respuesta == "ok" && $respuesta1 == "ok"){

				echo'<script>

				window.location = "cotizador";

				</script>';

			}		

		}

	}
	/*=============================================
	DESCARGAR PEDIDO
	=============================================*/

	static public function ctrDescargarCotizacion(){

		if(isset($_GET["idCotizacion3"]) && $_GET["opcion"] == 1){

			$tabla = "cotizaciones";
			$datos = array("folio" => $_GET["idCotizacion3"]);

			$tabla1 = "bitacora";
			$datos1 = array("usuario" => $_SESSION["nombre"],
								   "perfil" => $_SESSION["perfil"],
								   "accion" => 'Descarga de Cotizacion',
								   "folio" => $_GET["idCotizacion3"]);

			


			$respuesta = ModeloCotizaciones::mdlDescargarCotizacion($tabla, $datos);
			$respuesta1 = ModeloCotizaciones::mdlRegistroBitacoraCancelar($tabla1, $datos1);

			if($respuesta == "ok" && $respuesta1 == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La cotización ha sido descargada",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "cotizador";

								}
							})

				</script>';

			}		

		}

	}
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloCotizaciones::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COTIZACIONES APROBADAS
	=============================================*/

	static public function ctrMostrarCotizacionesAprobadas(){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarCotizacionesAprobadas($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COTIZACIONES TOTALES
	=============================================*/

	static public function ctrMostrarCotizacionesTotales(){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarCotizacionesTotales($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COTIZACIONES POR APROBAR
	=============================================*/

	static public function ctrMostrarCotizacionesPorAprobar(){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarCotizacionesPorAprobar($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COTIZACIONES CANCELADAS
	=============================================*/

	static public function ctrMostrarCotizacionesCanceladas(){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarCotizacionesCanceladas($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR REPORTE DE COTIZACIONES
	=============================================*/
	static public function ctrMostrarReporteCotizacion($item, $valor){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarReporteCotizacion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR REPORTE DE COTIZACIONES POR FECHA
	=============================================*/

	static public function ctrMostrarReporteCotizacionFecha($valor, $valor2){

		$tabla = "cotizaciones";

		$respuesta = ModeloCotizaciones::mdlMostrarReporteCotizacionFecha($tabla, $valor, $valor2);

		return $respuesta;
	}
	

}