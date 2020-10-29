<?php

 class ControladorFacturacionRuta{

 	/*==================================================
	CONTROLADOR PARA MOSTRAR LOS DATOS DE LAS FACTURAS
	==================================================*/
 	static public function ctrMostrarDatosFacturasOT($item, $valor){
 		$tabla = "facturasordenes";
 		$respuesta = ModeloFacturacionRuta::mdlMostrarDatosFacturasOT($tabla, $item, $valor);
 		return $respuesta;

 	}

    static public function ctrMostrarOrdenesDeTrabajo($item, $valor,$item2, $valor2){

		$tabla = "facturacionot";

		$respuesta = ModeloFacturacionRuta::mdlMostrarOrdenesDeTrabajo($tabla, $item, $valor,$item2, $valor2);

		return $respuesta;
	}
	static public function ctrEditarOrdenFacturacion(){

		if(isset($_POST["otIdOrdenFacturacionEdit"])){

            $tabla = "facturacionot";
			$tabla2 = "bitacora";
			$tabla3 = "facturasordenes";

			$datos = array("id" => $_POST["otIdOrdenFacturacionEdit"],
							"usuario" => $_POST["otUsuarioEdit"],
							"serie" => $_POST["otSerieEdit"],
							"folio" => $_POST["otFolioEdit"],
							"secciones" => $_POST["otSeccionesEdit"],
							"nuevaSeccion" => $_POST["nFacturas"],
							"almacen" => $_POST["otAlmacenEdit"],
							"fechaRecepcion" => $_POST["otFechaRecepcionEdit"],
							"fechaEntrega" => $_POST["otFechaEntregaEdit"],
							"estado" => 1,
							"pendiente" => 0,
							"status" => $_POST["otEstatusEdit"],
                           	"comentarios" => trim($_POST["otComentariosEdit"])); 
			
            $datos2 = array("usuario" => $_SESSION['nombre'],
                            "perfil" => $_SESSION['perfil'],
                            "accion" => 'La Orden de Facturacion Ha Sido Actualizada',
							"folio" =>  $_POST["otFolioEdit"]);

            $nFacturasBD = $_POST["nFacturas"];
			$nFacturasInput = $_POST["otSeccionesEdit"];
			
			for ($i=1; $i <= $nFacturasInput; $i++) {

            	$serie = $_POST["otSerieFacturaEdit$i"];
            	$folio = $_POST["otFolioFacturaEdit$i"];
            	$partidas = $_POST["otPartidasSurtidasEdit$i"];
            	$unidades = $_POST["otUnidadesSurtidasEdit$i"];
            	$importe = $_POST["otImporteFacturaEdit$i"];

            	$item1 = 'serie';
            	$valor1 = $serie;
            	$item2 = 'folio';
            	$valor2 = $folio;

            	

            	$rValidacion = ModeloFacturacionRuta::mdlValidarFolioFacturasOdenes($item1, $valor1, $item2, $valor2);

            	if ($rValidacion["folioValido"] == 1) {

            		$factura1 = array("serie" => $serie,
								  "folio" => $folio,
								  "partidasSurtidas" => $partidas,
								  "unidadesSurtidas" => $unidades,
								  "importeFactura" => $importe);

					$respuesta = ModeloFacturacionRuta::mdlEditarOrdenFacturacion($tabla, $datos);
					$respuesta2 = ModeloFacturacionRuta::mdlActualizarTiempoProceso($tabla,$datos);
	            	$respuesta3 = ModeloFacturacionRuta::mdlActualizarEstatusTiemposFacturacion($datos);
					$respuesta4 = ModeloFacturacionRuta::mdlRegistroBitacoraEditar($tabla2, $datos2);
					$respuesta5 = ModeloFacturacionRuta::mdlEditarDatosFactura1($tabla3,$factura1);

					if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok"){

						echo'<script>
							swal({
								type: "success",
								title: "La Orden Ha Sido Actualizada Correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								}).then(function(result) {
									if (result.value) {
										window.location = "facturacionRuta";

									}
								})
						</script>';
					}

            	}else{

            		$itemN = 'folioPedido';
					$valorN = $_POST["otFolioEdit"];
					$itemN2 = 'seriePedido';
					$valorN2 = $_POST["otSerieEdit"]; 

            		$respuestaUltimoN = ModeloFacturacionRuta::mdlMostrarUltimoNumeroFactura($itemN, $valorN);
            		$ultimaSeccion = ModeloFacturacionRuta::mdlUltimaSeccion($tabla, $itemN2, $valorN2, $itemN, $valorN);
            		
            		if ($ultimaSeccion["ultimaSeccion"] == 0 || $ultimaSeccion["ultimaSeccion"] <= 0) {
            			$actualizarSeccionN = ModeloFacturacionRuta::mdlInsertarSeccion($tabla, $itemN2, $valorN2, $itemN, $valorN); 
            		}else{
            			
            		}

            		$datosManuales = array("seriePedido" => $_POST["otSerieEdit"],
								  "folioPedido" => $_POST["otFolioEdit"],
            					  "serie" => $serie,
            					  "folio" => $folio,
            					  "estatusFactura" => 1,
								  "numeroPartidas" => $partidas,
								  "numeroUnidades" => $unidades,
								  "importeFactura" => $importe,
								  "numFactura" => $respuestaUltimoN["ultimoNumero"]);	

            		$respuestaM = ModeloFacturacionRuta::mdlInsertarFacturasOrdenes($tabla3, $datosManuales);
            		$respuesta4 = ModeloFacturacionRuta::mdlRegistroBitacoraEditar($tabla2, $datos2);

            		if($respuestaM == "ok"){

						echo'<script>
							swal({
								type: "success",
								title: "Se Ha Insertado Una Factura en La Orden Correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								}).then(function(result) {
									if (result.value) {
										window.location = "facturacionRuta";

									}
								})
						</script>';
					}

            	}
            }

		}	

	}
	static public function ctrActualizarNivelesFacturacion(){

		if(isset($_POST["otFolioEdit"])){

				$tabla = "facturasordenes";
				$folio = $_POST["otFolioEdit"];

				$recalcularNiveles = ModeloFacturacionRuta::mdlCalcularNivelesFactura($tabla, $folio);

				$importeSurtido = $recalcularNiveles["importeSurtido"];
				$unidadesSurtidas = $recalcularNiveles["unidadesSurtidas"];
				$partidasSurtidas = $recalcularNiveles["partidasSurtidas"];


				$datos = array("folio" => $_POST["otFolioEdit"],
							   "importeSurtido" => $importeSurtido,
							   "unidadesSurtidas" => $unidadesSurtidas,
							   "partidasSurtidas" => $partidasSurtidas);
							   
				$respuesta = ModeloFacturacionRuta::mdlActualizarNivelesFacturacion($tabla, $datos);
				return $respuesta;

		}

	}
	static public function ctrActualizarNivelesAlmacen(){

	
		if(isset($_POST["otFolioEdit"])){
			$tabla = "facturacionot";
			$tabla2 = "almacenot";
			$datos = array("folio" => $_POST["otFolioEdit"]);

			$respuesta = ModeloFacturacionRuta::mdlActualizarNivelesAlmacen($tabla,$tabla2, $datos);

			return $respuesta;

		}

	}

	static public function ctrMostrarDatosFactura($item, $valor){

		$tabla = "facturasordenes";

		$respuesta = ModeloFacturacionRuta::mdlMostrarDatosFactura($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarDatosFactura3($item, $valor){

		$tabla = "facturasordenes";

		$respuesta = ModeloFacturacionRuta::mdlMostrarDatosFactura3($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarDatosFactura4($item, $valor){

		$tabla = "facturasordenes";

		$respuesta = ModeloFacturacionRuta::mdlMostrarDatosFactura4($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarDatosFactura5($item, $valor){

		$tabla = "facturasordenes";

		$respuesta = ModeloFacturacionRuta::mdlMostrarDatosFactura5($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarDatosFactura6($item, $valor){

		$tabla = "facturasordenes";

		$respuesta = ModeloFacturacionRuta::mdlMostrarDatosFactura6($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarDatosFactura7($item, $valor){

		$tabla = "facturasordenes";

		$respuesta = ModeloFacturacionRuta::mdlMostrarDatosFactura7($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrRegistroBitacoraAgregar(){

		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Inserción de Facturas de Ordenes de Trabajo',
							   "folio" => 'Sin Folio');

		$respuesta = ModeloFacturacionRuta::mdlRegistroBitacoraAgregar($tabla, $datos);

		return $respuesta;

	
	}
	static public function ctrRegistroBitacoraReporte(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Descarga Reporte Facturación Ruta',
							   "folio" => 'Sin folio');

		$respuesta = ModeloFacturacionRuta::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	static public function ctrActualizarTiempoSegundos(){

		if(isset($_POST["otFolioEdit"])){

			$tabla = "estatusordenes";

			$datos = array("folio" => $_POST["otFolioEdit"]);

			$respuesta = ModeloFacturacionRuta::mdlActualizarTiempoSegundos($tabla, $datos);

			return $respuesta;

		}

	}
	static public function ctrActualizarTiempoFinal(){

		if(isset($_POST["otFolioEdit"])){

			$tabla = "estatusordenes";

			$datos = array("folio" => $_POST["otFolioEdit"]);

			$respuesta = ModeloFacturacionRuta::mdlActualizarTiempoFinal($tabla, $datos);

			return $respuesta;

		}

	}
	static public function ctrActualizarConcluido(){

		if(isset($_POST["otFolioEdit"])){

			$tabla = "ordenesdetrabajo";

			$datos = array("folio" => $_POST["otFolioEdit"]);

			$respuesta = ModeloFacturacionRuta::mdlActualizarConcluido($tabla, $datos);

			return $respuesta;

		}

	}


 }

?>