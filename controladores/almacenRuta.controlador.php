<?php

 class ControladorAlmacenRuta{

    static public function ctrMostrarOrdenesDeTrabajo($item, $valor){

		$tabla = "almacen";

		$respuesta = ModeloAlmacenRuta::mdlMostrarOrdenesDeTrabajo($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrEditarOrdenAlmacen(){

		if(isset($_POST["otIdOrdenAlmacenEdit"])){

                $tabla = "almacen";
                $tabla2 = "bitacora";

				$datos = array("id" => $_POST["otIdOrdenAlmacenEdit"],
							   "serie" => $_POST["otSerieEdit"],
							   "folio" => $_POST["otFolioEdit"],
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

	static public function ctrMostrarListaTraspasos($item,$valor,$item2,$valor2){

		$tabla = "traspasos";

		$respuesta = ModeloAlmacenRuta::mdlMostrarListaTraspasos($tabla,$item,$valor,$item2,$valor2);

		return $respuesta;
	}


 }

?>