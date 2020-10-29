<?php

 class ControladorAlmacenRuta{

    static public function ctrMostrarOrdenesDeTrabajo($item, $valor){

		$tabla = "almacenot";

		$respuesta = ModeloAlmacenRuta::mdlMostrarOrdenesDeTrabajo($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrEditarOrdenAlmacen(){

		if(isset($_POST["otIdOrdenAlmacenEdit"])){

                $tabla = "almacenot";
                $tabla2 = "bitacora";

				$datos = array("id" => $_POST["otIdOrdenAlmacenEdit"],
							   "serie" => $_POST["otSerieEdit"],
							   "folio" => $_POST["otFolioEdit"],
							   "serieTraspaso" => $_POST["otSerieTraspasoEdit"],
							   "folioTraspaso" => $_POST["otFolioTraspasoEdit"],
							   "partidasTraspaso" => $_POST["otNumeroPartidasTraspasoEdit"],
							   "unidadesTraspaso" => $_POST["otNumeroUnidadesTraspasoEdit"],
							   "serieTraspaso2" => $_POST["otSerieTraspaso2Edit"],
                               "folioTraspaso2" => $_POST["otFolioTraspaso2Edit"],
							   "partidasTraspaso2" => $_POST["otNumeroPartidasTraspaso2Edit"],
							   "unidadesTraspaso2" => $_POST["otNumeroUnidadesTraspaso2Edit"],
							   "fechaRecepcion" => $_POST["otFechaRecepcionEdit"],
							   "fechaSuministro" => $_POST["otFechaSuministroEdit"],
                               "fechaTermino" => $_POST["otFechaTerminoEdit"],
							   "almacen" => $_POST["otAlmacenEdit"],
							   "estado" => 1,
							   "pendiente" => 0,
							   "status" => $_POST["otEstatusEdit"],
							   "suministrado" => $_POST["otSuministradoEdit"],
                               "comentarios" => trim($_POST["otComentariosEdit"]));

                $datos2 = array("usuario" => $_SESSION['nombre'],
                                "perfil" => $_SESSION['perfil'],
                                "accion" => 'La Orden de Almacen Ha Sido Actualizada',
                                "folio" =>  $_POST["otFolioEdit"]);

                                

				$respuesta = ModeloAlmacenRuta::mdlEditarOrdenAlmacen($tabla, $datos);
				$respuesta2 = ModeloAlmacenRuta::mdlActualizarTiempoProceso($tabla,$datos);
                $respuesta3 = ModeloAlmacenRuta::mdlActualizarEstatusTiemposAlmacen($datos);
				$respuesta4 = ModeloAlmacenRuta::mdlRegistroBitacoraEditar($tabla2, $datos2);
				

				if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Orden Ha Sido Actualizada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "almacenRuta";

									}
								})

					</script>';

				}


		}

	}
	static public function ctrRegistroBitacoraReporte(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Descarga Reporte Almacén Ruta',
							   "folio" => 'Sin folio');

		$respuesta = ModeloAlmacenRuta::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}


 }

?>