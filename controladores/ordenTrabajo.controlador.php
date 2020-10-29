<?php

class ControladorOrdenes{

	static public function ctrMostrarOrdenesDeTrabajo($item, $valor){

		$tabla = "ordenesdetrabajo";

		$respuesta = ModeloOrdenes::mdlMostrarOrdenesDeTrabajo($tabla, $item, $valor);

		return $respuesta;
	}

    static public function ctrGenerarOrden(){

        if(isset($_POST["otCreado"])){

            $tabla = "ordenesdetrabajo";
            $tabla2 = "bitacora";
            $tabla3 = "almacenot";
            $tabla4 = "facturacionot";
            $tabla5 = "estatusordenes";

            $consulta = ModeloOrdenes::mdlObtenerFolioOrden();

            $folio = $_POST["otFolio"];
            
            $datos = array("creado" => $_POST["otCreado"],
                           "codigoCliente" => $_POST["otCodigoCliente"],
                           "nombreCliente" => $_POST["otNombreCliente"],
                           "canal" => "CEDIS",
                           "rfc" => $_POST["otRfcCliente"],
                           "agenteVentas" => $_POST["otVendedor"],
                           "diasCredito" => $_POST["otDiasCredito"],
                           "statusCliente" => $_POST["otEstatusCliente"],
                           "serie" => "OTRT",
                           "folio" => $folio,
                           "tipoPago" => "Contado",
                           "metodoPago" => "Pago en una sola exhibición",
                           "formaPago" => "01",
                           "numeroPartidas" => $_POST["otPartidas"],
                           "numeroUnidades" => $_POST["otUnidades"],
                           "importe" => $_POST["otImporte"],
                           "fechaRecepcion" => $_POST["otFechaRecepcion"],
                           "fechaElaboracion" => $_POST["otFechaElaboracion"],
                           "tipoRuta" => $_POST["otTipoRuta"],
                           "observaciones" => $_POST["otMovimiento"],
                           "comentarios" => trim($_POST["otComentarios"]),
                           "estado" => 1);
            $respuesta = ModeloOrdenes::mdlGenerarOrden($tabla,$datos);
        
            $respuesta2 = ModeloOrdenes::mdlActualizarTiempoProceso($tabla,$datos); 

			$datos2 = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Nueva Orden Generada',
								   "folio" =>  $folio);

            $respuesta3 = ModeloOrdenes::mdlRegistroBitacoraAgregar($tabla2, $datos2);
            
            

            if($_POST["otMovimiento"] == 1){

                $estado = "0";
                $pendiente = "1";
                $activo = "1";

                $datos3 = array("serie" => "OTRT",
                                "folio" => $folio,
                                "serieTraspaso" => "TRGE",
                                "suministrado" => "Ulises Tuxpan",
                                "almacen" => 1,
                                "observaciones" => $_POST["otMovimiento"],
                                "numeroPartidas" => $_POST["otPartidas"],
                                "numeroUnidades" => $_POST["otUnidades"],
                                "importeTotal" => $_POST["otImporte"],
                                "estado" => $estado,
                                "status" => "0",
                                "habilitado" => "0",
                                "pendiente" => $pendiente,
                                "estatusFactura" => "0",
                                "activo" => $activo,
                                "cliente" => $_POST["otNombreCliente"]);

                $respuesta4 = ModeloAlmacenRuta::mdlGenerarOrdenAlmacen($tabla3,$datos3);
                
                $datos4 = array("serie" => "OTRT",
                                "folio" => $folio,
                                "observaciones" => $_POST["otMovimiento"],
                                "partidasTotales" => $_POST["otPartidas"],
                                "unidadesTotales" => $_POST["otUnidades"],
                                "importeTotal" => $_POST["otImporte"],
                                "estado" => $estado,
                                "secciones" => 0,
                                "almacen" => 1,
                                "usuario" => "Laura Delgado",
                                "status" => "0",
                                "habilitado" => "0",
                                "facturaPendiente" => $pendiente,
                                "agenteVentas" => $_POST["otVendedor"],
                                "activo" => $activo,
                                "cliente" => $_POST["otNombreCliente"]);

                $respuesta5 = ModeloFacturacionRuta::mdlGenerarOrdenFacturacion($tabla4,$datos4);

            }else if($_POST["otMovimiento"] == 2){

                $estado = "0";
                $pendiente = "0";
                $activo = "0";

                $datos3 = array("serie" => "OTRT",
                                "folio" => $folio,
                                "serieTraspaso" => "TRGE",
                                "suministrado" => "Ulises Tuxpan",
                                "almacen" => 1,
                                "observaciones" => $_POST["otMovimiento"],
                                "numeroPartidas" => $_POST["otPartidas"],
                                "numeroUnidades" => $_POST["otUnidades"],
                                "importeTotal" => $_POST["otImporte"],
                                "estado" => $estado,
                                "status" => "0",
                                "habilitado" => "0",
                                "pendiente" => $pendiente,
                                "estatusFactura" => "0",
                                "activo" => $activo,
                                "cliente" => $_POST["otNombreCliente"]);

                $respuesta4 = ModeloAlmacenRuta::mdlGenerarOrdenAlmacen($tabla3,$datos3);
                
                $datos4 = array("serie" => "OTRT",
                                "folio" => $folio,
                                "observaciones" => $_POST["otMovimiento"],
                                "partidasTotales" => $_POST["otPartidas"],
                                "unidadesTotales" => $_POST["otUnidades"],
                                "importeTotal" => $_POST["otImporte"],
                                "estado" => 0,
                                "secciones" => 0,
                                "almacen" => 1,
                                "usuario" => "Laura Delgado",
                                "status" => "0",
                                "habilitado" => "0",
                                "facturaPendiente" => 1,
                                "agenteVentas" => $_POST["otVendedor"],
                                "activo" => 1,
                                "cliente" => $_POST["otNombreCliente"]);

                $respuesta5 = ModeloFacturacionRuta::mdlGenerarOrdenFacturacion($tabla4,$datos4);
            }
                $datos5 = array("serie" => "OTRT",
                                "folio" => $folio,
                                "estadoOrden" => 1,
                                "estadoAlmacen" => 0,
                                "statusAlmacen" => 0,
                                "estadoFacturacion" => 0,
                                "statusFacturacion" => 0,
                                "observaciones" => $_POST["otMovimiento"]);
                $respuesta6 = ModeloOrdenes::mdlEstatusOrdenes($tabla5,$datos5);

				if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta6 == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La orden Ha Sido Generada Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "ordenTrabajo";

						}

					});
				

					</script>';


                }	
                $respuesta4 = ModeloOrdenes::mdlActualizarTiempoProcesoEstatus($datos);


        }else{
            
        }


    }
	static public function ctrEditarOrdenTrabajo(){

		if(isset($_POST["otIdOrdenEdit"])){

                $tabla = "ordenesdetrabajo";
                $tabla2 = "almacenot";
                $tabla3 = "facturacionot";
                $tabla4 = "bitacora";
                $tabla5 = "estatusordenes";

				$datos = array("id" => $_POST["otIdOrdenEdit"],
							   "creado" => $_POST["otCreadoEdit"],
                               "numeroPartidas" => $_POST["otPartidasEdit"],
                               "numeroUnidades" => $_POST["otUnidadesEdit"],
                               "importe" => $_POST["otImporteEdit"],
                               "fechaRecepcion" => $_POST["otFechaRecepcionEdit"],
                               "fechaElaboracion" => $_POST["otFechaElaboracionEdit"],
                               "tipoRuta" => $_POST["otTipoRutaEdit"],
                               "observaciones" => $_POST["otMovimientoEdit"],
                               "comentarios" => trim($_POST["otComentariosEdit"]));

                $datos2 = array("folio" => $_POST["otFolioEdit"],
                                "numeroPartidas" => $_POST["otPartidasEdit"],
                                "numeroUnidades" => $_POST["otUnidadesEdit"],
                                "importeTotal" => $_POST["otImporteEdit"]);

                $datos3 = array("folio" => $_POST["otFolioEdit"],
                                "partidasTotales" => $_POST["otPartidasEdit"],
                                "unidadesTotales" => $_POST["otUnidadesEdit"],
                                "importeTotal" => $_POST["otImporteEdit"]);

                $datos4 = array("usuario" => $_SESSION['nombre'],
                                "perfil" => $_SESSION['perfil'],
                                "accion" => 'La Orden Ha Sido Actualizada',
                                "folio" =>  $_POST["otFolioEdit"]);

                if($_POST["otMovimientoEdit"] == 1){

                $estado = "0";
                $pendiente = "1";
                $activo = "1";

                $datos5 = array("folio" => $_POST["otFolioEdit"],
                                "observaciones" => $_POST["otMovimientoEdit"],
                                "estado" => $estado,
                                "pendiente" => $pendiente,
                                "activo" => $activo); 

                $datos6 = array("folio" => $_POST["otFolioEdit"],
                                "observaciones" => $_POST["otMovimientoEdit"],
                                "estado" => $estado,
                                "facturaPendiente" => $pendiente,
                                "activo" => $activo);   

                $datos7 = array("folio" => $_POST["otFolioEdit"],
                                "observaciones" => $_POST["otMovimientoEdit"]);


                }else if($_POST["otMovimientoEdit"] == 2){

                $estado = "0";
                $pendiente = "0";
                $activo = "0";


                $datos5 = array("folio" => $_POST["otFolioEdit"],
                                "observaciones" => $_POST["otMovimientoEdit"],
                                "estado" => $estado,
                                "pendiente" => $pendiente,
                                "status" => 0,
                                "tiempoProceso" => "00:00:00",
                                "activo" => $activo); 

                $datos6 = array("folio" => $_POST["otFolioEdit"],
                                "observaciones" => $_POST["otMovimientoEdit"],
                                "estado" => $estado,
                                "facturaPendiente" => 1,
                                "activo" => 1);  

                $datos7 = array("folio" => $_POST["otFolioEdit"],
                                "estadoAlmacen" => 0,
                                "statusAlmacen" => 0,
                                "tiempoAlmacen" => "00:00:00",
                                "observaciones" => $_POST["otMovimientoEdit"]);
                
                }

                $respuesta = ModeloOrdenes::mdlEditarOrdenTrabajo($tabla, $datos);
                $respuesta2 = ModeloAlmacenRuta::mdlActualizarDatosAlmacen($tabla2,$datos2);
                $respuesta3 = ModeloFacturacionRuta::mdlActualizarDatosFacturacion($tabla3,$datos3);
                $respuesta4 = ModeloOrdenes::mdlRegistroBitacoraEditar($tabla4, $datos4);
                $respuesta5 = ModeloOrdenes::mdlActualizarObservacionesAlmacenOt($tabla,$tabla2,$datos5);
                $respuesta6 = ModeloOrdenes::mdlActualizarObservacionesFacturacionOt($tabla,$tabla3,$datos6);
                $respuesta7 = ModeloOrdenes::mdlActualizarObservacionesEstatusOt($tabla,$tabla5,$datos7);

				if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Orden Ha Sido Actualizada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "ordenTrabajo";

									}
								})

					</script>';

				}


		}

	}

	static public function ctrCancelarOrden(){

		if(isset($_GET["idOrden"])){

			$tabla = "ordenesdetrabajo";
			$datos = array("id" => $_GET["idOrden"],
						   "motivoCancelacion" => $_GET['motivo']);

            $tabla1 = "almacenot";
            $datos1 = array("folio" => $_GET["folio"],
                            "serie" => $_GET["serie"]);

            $tabla2 = "facturacionot";
            $datos2 = array("folio" => $_GET["folio"],
                            "serie" => $_GET["serie"]);

            $tabla3 = "estatusordenes";
            $datos3 = array("folio" => $_GET["folio"],
                            "serie" => $_GET["serie"]);
		
			$tabla6 = "bitacora";

			$datos6 = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Cancelación de Orden de Trabajo',
								   "folio" => $_GET["folio"]);

            $respuesta = ModeloOrdenes::mdlCancelarOrden($tabla, $datos);
            $respuesta2 = ModeloAlmacenRuta::mdlCancelarOrdenAlmacen($tabla1,$datos1);
            $respuesta3 = ModeloFacturacionRuta::mdlCancelarOrdenFacturacion($tabla2,$datos2);
            $respuesta4 = ModeloOrdenes::mdlCancelarEstatusGenerales($tabla3, $datos3); 
			$respuesta5 = ModeloOrdenes::mdlRegistroBitacoraEliminar($tabla6, $datos6);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Orden ha sido cancelada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "ordenTrabajo";

								}
							})

				</script>';

			}		

		}

    }
    
	static public function ctrMostrarEstatusOrdenes($item, $valor){

		$tabla = "estatusordenes";

		$respuesta = ModeloOrdenes::mdlMostrarEstatusOrdenes($tabla, $item, $valor);

		return $respuesta;
	}
    static public function ctrRegistroBitacoraReporte(){


        $tabla = "bitacora";

        $datos = array("usuario" => $_SESSION['nombre'],
                               "perfil" => $_SESSION['perfil'],
                               "accion" => 'Descarga Reporte Ordenes de Trabajo',
                               "folio" => 'Sin folio');

        $respuesta = ModeloOrdenes::mdlRegistroBitacoraReporte($tabla, $datos);

        return $respuesta;
        
        
    }
    static public function ctrRegistroBitacoraReporteEstatus(){


        $tabla = "bitacora";

        $datos = array("usuario" => $_SESSION['nombre'],
                               "perfil" => $_SESSION['perfil'],
                               "accion" => 'Descarga Reporte Estatus Ordenes',
                               "folio" => 'Sin folio');

        $respuesta = ModeloOrdenes::mdlRegistroBitacoraReporteEstatus($tabla, $datos);

        return $respuesta;
        
        
    }


}

?>