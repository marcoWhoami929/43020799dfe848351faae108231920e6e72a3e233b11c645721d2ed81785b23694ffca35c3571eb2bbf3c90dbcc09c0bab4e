<?php
class ControladorFacturacion{

	/*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

	public function ctrIngresoAdministrador(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
			   
			   $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						
				$tabla = "administradores";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

				if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar){

					if($respuesta["estado"] == 1){

						$_SESSION["validarSesionBackend"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["perfil"] = $respuesta["perfil"];

						echo '<script>

							window.location = "inicio";

						</script>';

					}else{

						echo '<br>
						<div class="alert alert-warning">Este usuario aún no está activado</div>';	

					}

				}else{

					echo '<br>
					<div class="alert alert-danger">Error al ingresar vuelva a intentarlo</div>';

				}


			}

		}

	}
	/*=============================================
	ACTUALIZAR ORDEN DE COMPRAS
	=============================================*/

	static public function ctrActualizarOrdenCompra(){

		if(isset($_POST["editarOrdenCompra"])){
			if($_POST["editarFolio"] != ""){

				$tabla = "atencionaclientes";
				$tabla2 = "facturacion";

				$datos = array("folio" => $_POST["editarFolio"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarOrdenCompra($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR FACTURACION
	=============================================*/

	static public function ctrMostrarFacturacion(){

		$tabla = "facturacion";

		$respuesta = ModeloFacturacion::mdlMostrarFacturacion($tabla);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR FACTURACION EDICION
	=============================================*/

	static public function ctrMostrarFacturacionEdicion($item, $valor){

		$tabla = "facturacion";

		$respuesta = ModeloFacturacion::mdlMostrarFacturacionEdicion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	PEDIDOS FACTURADOS
	=============================================*/

	static public function ctrMostrarPedidosFacturados($item, $valor){

		$tabla = "atencionaclientes";

		$respuesta = ModeloFacturacion::mdlMostrarPedidosFacturados($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	FACTURAS PENDIENTES
	=============================================*/

	static public function ctrMostrarFacturasPendientes($item, $valor){

		$tabla = "atencionaclientes";

		$respuesta = ModeloFacturacion::mdlMostrarFacturasPendientes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	FACTURAS POR FACTURAR
	=============================================*/

	static public function ctrMostrarPorFacturar($item, $valor){

		$tabla = "atencionaclientes";

		$respuesta = ModeloFacturacion::mdlMostrarPorFacturar($tabla, $item, $valor);

		return $respuesta;
	}
	
	/*======ALMACEN=======*/
	/*=============================================
	MOSTRAR FECHA RECEPCION
	=============================================*/
	/*static public function ctrMostrarFechaRecepcionAlmacen(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "almacen";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlMostrarFechaRecepcionAlmacen($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/
	/*=============================================
	MOSTRAR FECHA TERMINO
	=============================================*/
	/*static public function ctrMostrarFechaTerminoAlmacen(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "almacen";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlMostrarFechaTerminoAlmacen($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/
	/*=============================================
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	/*static public function ctrMostrarTiempoProcesoAlmacen(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "almacen";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlMostrarTiempoProcesoAlmacen($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/
	/*=============================================
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	/*static public function ctrActualizarTiempoAlmacen(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarTiempoAlmacen($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/

	/*======ALMACEN======*/
	/*======LOGISTICA=======*/
	/*=============================================
	MOSTRAR FECHA RECEPCION
	=============================================*/
	/*static public function ctrMostrarFechaRecepcionLogistica(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlMostrarFechaRecepcionLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/
	/*=============================================
	MOSTRAR FECHA TERMINO
	=============================================*/
	/*static public function ctrMostrarFechaTerminoLogistica(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlMostrarFechaTerminoLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/
	/*=============================================
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	/*static public function ctrMostrarTiempoProcesoLogistica(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlMostrarTiempoProcesoLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/
	/*=============================================
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	/*static public function ctrActualizarTiempoLogistica(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "logistica";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
						       "serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarTiempoLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/

	/*======LOGISTICA======*/
	/*=============================================
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	static public function ctrMostrarTiempoProceso(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloFacturacion::mdlMostrarTiempoProceso($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR TIEMPO PROCESO EDICION
	=============================================*/
	/*static public function ctrMostrarTiempoProcesoEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlMostrarTiempoProcesoEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/
	/*=============================================
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	static public function ctrActualizarTiempoProceso(){
		$tabla = "facturacion";

		$respuesta = ModeloFacturacion::mdlActualizarTiempoProceso($tabla);

		return $respuesta;
	}
	

	/*=============================================
	SEGUIR PEDIDOS FACTURACION
	=============================================*/

	static public function ctrSeguirPedidos(){

		if(isset($_POST["idPedido"])){

			if($_POST["idPedido"] != ""){

				$tabla = "facturacion";

				$datos = array("idPedido"  => $_POST["idPedido"],
							   "usuario" => $_POST["usuario"],
							   "serie" => $_POST["serie"],
							   "serieFactura" => $_POST["serieFactura"],
							   "folioFactura" => $_POST["folioFactura"],
							   "status" => $_POST["status"],
					           "ordenCompra" => $_POST["ordenCompra"],
					           "tipo" => $_POST["tipo"],
					           "cantidad" => $_POST["cantidad"],
					           "importeInicial" => $_POST["importeInicial"], 
					           "importe" => $_POST["importe"], 
					           "statusCliente" => $_POST["statusCliente"],
					           "fechaRecepcion" => $_POST["fechaRecepcion"],
					           "fechaEntrega" => $_POST["fechaEntrega"],
					           "observaciones" => trim($_POST["observaciones"]),
					           "estado" => 1);

				$respuesta = ModeloFacturacion::mdlSeguirPedidos($tabla, $datos);
				$respuesta2 = ModeloFacturacion::mdlActualizarTiempoProceso($tabla);
				$respuesta3 = ModeloFacturacion::mdlNivelSumCosto($tabla);
				$respuesta4 = ModeloFacturacion::mdlNivelPartidas($tabla);
				$respuesta5 = ModeloFacturacion::mdlUnidadesSurtidas($tabla);
				$respuesta6 = ModeloFacturacion::mdlNivelSum($tabla);
			

				
				if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok" && $respuesta4 == "ok" && $respuesta5 == "ok" && $respuesta6 == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Los datos de facturación han sido guardados!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "facturacion";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede seguir el pedido porque no hay un folio seleccionado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "facturacion";

						}

					});
				

				</script>';

			}


		}


	}
	/*=============================================
	ACTUALIZAR PARTIDAS FACTURACION
	=============================================*/

	static public function ctrActualizarPartidas(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "facturacion";

				$datos = array("idPedido"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"],
							   "partidas" => $_POST["editarNumeroPartidas"]);

				$respuestaC = ModeloFacturacion::mdlActualizarPartidas($tabla, $datos);
				 return $respuestaC;

			}

		}
		
	}
	/*=============================================
	ACTUALIZAR UNIDADES FACTURACION
	=============================================*/

	static public function ctrActualizarUnidades(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "facturacion";

				$datos = array("idPedido"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"],
							   "unidades" => $_POST["editarNumeroUnidades"]);

				$respuestaC = ModeloFacturacion::mdlActualizarUnidades($tabla, $datos);
				 return $respuestaC;

			}

		}
		
	}
	/*=============================================
	ACTUALIZAR IMPORTE FACTURACION
	=============================================*/

	static public function ctrActualizarImporte(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "facturacion";

				$datos = array("idPedido"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"],
							   "importeInicial" => $_POST["editarImporte"]);

				$respuestaC = ModeloFacturacion::mdlActualizarImporte($tabla, $datos);
				 return $respuestaC;

			}

		}
		
	}
	/*=============================================
	EDITAR PEDIDO FACTURACION
	=============================================*/

	static public function ctrEditarPedido($arregloDatos,$arregloGeneral){

		$tabla = "facturacion";
		$tabla2 = "facturasgenerales";
		$tabla3 = "clientes";

		$tablelogistica = "logistica";
		$tableAlmacen = "almacen";
		$tableAtencion = "atencionaclientes";

		$numeroFacturas = $arregloDatos["editarSecciones"];
		$editarUsuario = $arregloDatos["editarUsuario"];
		$editarSerie = $arregloDatos["editarSerie"];
		$editarIdPedido = $arregloDatos["editarIdPedido"];
		$editarStatus = $arregloDatos["editarStatus"];
		$editarOrdenCompra = $arregloDatos["editarOrdenCompra"];
		$editarTipo = $arregloDatos["editarTipo"];
		$editarStatusCliente = $arregloDatos["editarStatusCliente"];
		$editarTipoRuta = $arregloDatos["editarTipoRuta"];
		$editarFechaRecepcion = $arregloDatos["editarFechaRecepcion"];
		$editarFechaEntrega = $arregloDatos["editarFechaEntrega"];
		$editarObservaciones = $arregloDatos["editarObservaciones"];
		$editarNombreCliente = $arregloDatos["editarNombreCliente"];
		$editarFormatoPedido = $arregloDatos["editarFormatoPedido"];
		$cantidad = $arregloDatos["cantidad"];

		$arreglo = json_decode($arregloGeneral, true);

		$itemNombre = 'nombreCliente';
        $valorNombre = $editarNombreCliente;

		$datosCliente = ModeloFacturacion::mdlBuscarCliente($tabla3, $itemNombre, $valorNombre);

		if ($datosCliente[0]["nombreCliente"] == "") {

			$nombreCliente = "";
			$codigoCliente = "";
			$rfc = "";
			$statusClienteFg = "activado";
			$diasCredito = "0";
			
		}else{

			$nombreCliente = $datosCliente[0]["nombreCliente"];
			$codigoCliente = $datosCliente[0]["codigoCliente"];
			$rfc = $datosCliente[0]["rfc"];
			$statusClienteFg = $datosCliente[0]["statusCliente"];
			$diasCredito = $datosCliente[0]["diasCredito"];

		}
		
		$estatus = 'Vigente';

		$actualizar = false;
        $actualizarInsertar = false;
        $accion = false;

		if ($numeroFacturas != 0) {

			for ($i=0; $i < $numeroFacturas ; $i++) { 

				$serieFactura = $arreglo[0][$i]["serieFactura"];
				$folioFactura = $arreglo[0][$i]["folioFactura"];
				$importeFactura = $arreglo[0][$i]["editarImporte"];
				$partidasFactura = $arreglo[0][$i]["editarPartidasSurtidas"];
				$unidadesFactura = $arreglo[0][$i]["editarUnidadesSurtidas"];

				$item1 = 'serie';
	            $valor1 = $serieFactura;
	            $item2 = 'folio';
	            $valor2 = $folioFactura;
	            $item3 = 'folioPedido';
	            $valor3 = $editarIdPedido;
	            $item4 = 'seriePedido';
	            $valor4 = $editarSerie;
	            
	            $neto = $importeFactura/1.16;
	            $impuesto = $neto * 0.16;
	            $total = $neto + $impuesto;

	            if ($serieFactura == "FACD") {
	                $concepto = 'FACTURA MAYOREO V 3.3';
	                $agente = 'Mayoreo';
	            }else if($serieFactura == "FAND"){
	                $concepto = 'FACTURA INDUSTRIAL V 3.3';
	                $agente = 'Industrial';
	            }else if($serieFactura == "FAPB") {
	                $concepto = 'FACTURA FX PUEBLA V 3.3';
	                $agente = 'Flex';
	            }else if ($serieFactura == "DOPR") {
	                $concepto = 'PEDIDO PRUEBA V 3.3';
	                $agente = 'Documento de Prueba';
	            }

	            $formaPago = 'EFECTIVO';

	            $respuestValidar = ModeloFacturacion::mdlValidarFolioFacturaGeneral($item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4);

				if ($respuestValidar["folioValido"] == 1) {

					$datosActualizar = array("serie" => $serieFactura,
									  		 "folio" => $folioFactura,
									  		 "numeroPartidas" => $partidasFactura,
									  		 "numeroUnidades" => $unidadesFactura,
									  		 "importeFactura" => $importeFactura,
									  		 "usuario" => $editarUsuario,
									  		 "secciones" => $numeroFacturas,
									  		 "folioPedido" => $editarIdPedido,
									  		 "seriePedido" => $editarSerie,
									  		 "statusPedido" => $editarStatus,
									  		 "estado" => 1,
									  		 "facturaPendiente" => 0,
									  		 "ordenCompra" => $editarOrdenCompra,
									  		 "tipo" => $editarTipo,
									  		 "statusCliente" => $statusClienteFg,
									  		 "tipoRuta" => $editarTipoRuta,
									  		 "cantidad" => $cantidad,
									  		 "fechaRecepcion" => $editarFechaRecepcion,
									  		 "fechaEntrega" => $editarFechaEntrega,
									  		 "observaciones" => $editarObservaciones,
									  		 "formatoPedido" => $editarFormatoPedido,
									  		 "neto" => number_format($neto,4, '.', ''),
									  	   	 "impuesto" => number_format($impuesto,4, '.', ''),
									  	   	 "total" => $total,
									  	   	 "codigoCliente" => $codigoCliente,
									  	   	 "rfc" => $rfc,
									  	   	 "nombreCliente" => $nombreCliente,
									  	   	 "statusClienteFg" => $statusClienteFg,
									  	   	 "diasCredito" => $diasCredito,
									  	   	 "pendiente" => $total,
									  	   	 "estatus" => $estatus);

	            	$respuestaActualizacion = ModeloFacturacion::mdlEditarDatosFacturas($tabla2, $datosActualizar);

					if($respuestaActualizacion == 'ok'){

						$itemN = 'idPedido';
			            $valorN = $editarIdPedido;
			            $itemN2 = 'serie';
			            $valorN2 = $editarSerie;

			            $mostrarDatosFacturas = ModeloFacturacion::mdlMostrarDatosFacturas($tabla2, $itemN, $valorN, $itemN2, $valorN2);
			            $serieP = $mostrarDatosFacturas["serie"];
			            $folioP = $mostrarDatosFacturas["folio"];
			            $statusFactura = $mostrarDatosFacturas["estatusFactura"];

			            if ($mostrarDatosFacturas["serie"] != "") {


			      			$datosFacturas = array("idPedido" => $editarIdPedido,
			      									"serie" => $editarSerie,
			      									"serieFactura" => $serieP,
			      									"folioFactura" => $folioP,
			      									"estatusFactura" => $statusFactura);

			      			$actualizarDatosFacturas = ModeloFacturacion::mdlActualizarDatosFacturas($tabla, $datosFacturas);
			            }else{
			            	$datosFacturas = array("idPedido" => $valorN,
						    						"serie" => $valorN2,
						    						"serieFactura" => "",
						      						"folioFactura" => "",
						      						"estatusFactura" => 0);

							$actualizarDatosFacturas = ModeloFacturacion::mdlActualizarDatosFacturas($tabla, $datosFacturas);
			            }

		            	$mostrarTotales = ModeloFacturacion::mdlMostrarTotales($tabla2, $itemN, $valorN, $itemN2, $valorN2);

				        $datosTotalesFacturacion = array("importSurt" => $mostrarTotales["importeSurtido"],
				            							 "partSurt" => $mostrarTotales["partidasSurtidas"],
				            							 "unidSurt" => $mostrarTotales["unidadesSurtidas"]);

				        $actualizarFacturacion = ModeloFacturacion::mdlActualizarFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2, $datosTotalesFacturacion);

				        /*-----------ACTUALIZAR ESTATUS FORMATO PEDIDO---------*/

				        $datos = array("idPedido"  => $editarIdPedido,
										"serie" => $editarSerie);

						$actualizarFormatoPedido = ModeloFacturacion::mdlActualizarFormatoPedido($tabla, $datos);
						/*-----------ACTUALIZAR TIPO RUTA---------------*/
						$respuestaTipoRuta = ModeloFacturacion::mdlActualizarTipoRuta($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR NIVELES DE SURTIMIENTO---------------*/
						$respuestaNiveles = ModeloFacturacion::mdlActualizarNiveles($tabla, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR ESTATUS FACTURA ALMACEN---------------*/
						$respuestaEstatus = ModeloFacturacion::mdlActualizarEstatusFacturaAlmacen($tabla2, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR FORMATO PEDIDO ATENCION---------------*/
						$respuestaFormatoPedidoAlmacen = ModeloFacturacion::mdlActualizarFormatoPedidoAtencion($tabla, $tableAtencion, $datos);
						/*-----------ACTUALIZAR NOMBRE CLIENTE LOGISTICA---------------*/
						$respuestaNombreClienteLogistica = ModeloFacturacion::mdlActualizarNombreCliente($tabla2, $tablelogistica, $datos);
						/*-----------ACTUALIZAR NOMBRE CLIENTE LOGISTICA2---------------*/
						//$respuestaNombreClienteLogistica2 = ModeloFacturacion::mdlActualizarNombreCliente2($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR FECHA RECEPCION ALMACEN---------------*/
						$respuestaFechaRecepcionAlmacen = ModeloFacturacion::mdlMostrarFechaRecepcionAlmacen($tabla, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR FECHA TERMINO ALMACEN---------------*/
						$respuestaFechaTerminoAlmacen = ModeloFacturacion::mdlMostrarFechaTerminoAlmacen($tabla, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR TIEMPO PROCESO LOGISTICA---------------*/
						$respuestaProcesoAlmacen = ModeloFacturacion::mdlActualizarTiempoLogistica($tablelogistica, $tableAtencion, $datos);
						/*-----------ACTUALIZAR FOLIO FACTURA LOGISTICA---------------*/
						$respuestaFolioFacturaLogistica = ModeloFacturacion::mdlActualizarFolioFacturaLogistica($tabla2, $tablelogistica, $datos);
						/*-----------ACTUALIZAR SERIE FACTURA LOGISTICA---------------*/
						$respuestaSerieFacturaLogistica = ModeloFacturacion::mdlActualizarSerieFacturaLogistica($tabla2, $tablelogistica, $datos);
						/*-----------MOSTRAR TIEMPO EDICION---------------*/
						$respuestaTiempoEdicion = ModeloFacturacion::mdlMostrarTiempoProcesoEdicion($tabla, $tableAtencion, $datos);
						/*-----------ACTUALIZAR STATUS FACTURA EDICION---------------*/
						$respuestaActualizarEstatusFactura = ModeloFacturacion::mdlActualizarStatusFacturacionEdicion($tabla2, $tableAtencion, $datos);
						/*-----------ACTUALIZAR ESTADO DE LA FACTURA---------------*/
						$respuestaActualizarEstado = ModeloFacturacion::mdlActualizarEstadoFacturacion($tabla, $tableAtencion, $datos);
						/*-----------ACTUALIZAR ESTADO DEL PEDIDO---------------*/
						$respuestaEstadoPedido = ModeloFacturacion::mdlActualizarEstadoPedido($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR STATUS DEL PEDIDO---------------*/
						$respuestaStatusPedido = ModeloFacturacion::mdlActualizarStatusPedido($tabla2, $tablelogistica, $datos);
						/*-----------ACTUALIZAR FOLIO FACTURA ATENCION A CLIENTES---------------*/
						$respuestaActualizarFolio = ModeloFacturacion::mdlActualizarFolioFactura($tabla2, $tableAtencion, $datos);
						/*-----------ACTUALIZAR SERIE FACTURA ATENCION A CLIENTES---------------*/
						$respuestaActualizarSerie = ModeloFacturacion::mdlActualizarSerieFactura($tabla2, $tableAtencion, $datos);
						/*-----------ACTUALIZAR SALDO FACTURADO ATENCION A CLIENTES---------------*/
						$respuestaActualizarSaldo = ModeloFacturacion::mdlActualizarSaldoFacturado($tabla, $tableAtencion, $datos);
						/*-----------ACTUALIZAR TIEMPO PROCESO ALMACEN---------------*/
						$respuestaActualizarTiempoProceso = ModeloFacturacion::mdlMostrarTiempoProcesoAlmacen($tabla, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR TIEMPO PROCESO ALMACEN CON ATENCION---------------*/
						$actualizarTiempoProcesoAlmacen = ModeloFacturacion::mdlActualizarTiempoAlmacen($tableAlmacen, $tableAtencion, $datos);
						/*-----------ACTUALIZAR FECHA RECEPCION LOGISTICA---------------*/
						$actualizarFechaRecepcionLogistica = ModeloFacturacion::mdlMostrarFechaRecepcionLogistica($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR FECHA TERMINO LOGISTICA---------------*/
						$actualizarFechaTerminoLogistica = ModeloFacturacion::mdlMostrarFechaTerminoLogistica($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR TIEMPO LOGISTICA---------------*/
						$respuestaActualizarTiempoLogistica = ModeloFacturacion::mdlMostrarTiempoProcesoLogistica($tabla, $tablelogistica, $datos);

					}else{	

					}

					$actualizar = true;

				}else{
					$datosActualizar = array(

								  		 "usuario" => $editarUsuario,
								  		 "secciones" => $numeroFacturas,
								  		 "folioPedido" => $editarIdPedido,
								  		 "seriePedido" => $editarSerie,
								  		 "statusPedido" => $editarStatus,
								  		 "estado" => 1,
								  		 "facturaPendiente" => 0,
								  		 "ordenCompra" => $editarOrdenCompra,
								  		 "tipo" => $editarTipo,
								  		 "statusCliente" => $statusClienteFg,
								  		 "tipoRuta" => $editarTipoRuta,
								  		 "cantidad" => $cantidad,
								  		 "fechaRecepcion" => $editarFechaRecepcion,
								  		 "fechaEntrega" => $editarFechaEntrega,
								  		 "observaciones" => $editarObservaciones,
								  		 "formatoPedido" => $editarFormatoPedido);

            		$respuestaActualizacion = ModeloFacturacion::mdlEditarDatosFacturasNoExisteFolio($datosActualizar);

					$itemN = 'idPedido';
			        $valorN = $editarIdPedido;
			        $itemN2 = 'serie';
			        $valorN2 = $editarSerie;

	     			$seccionUl = $numeroFacturas;
	     				
	            	$respuestaUltimoN = ModeloFacturacion::mdlMostrarUltimoNumeroFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2);

	            	
	            	$ultimaSeccion = ModeloFacturacion::mdlUltimaSeccionFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2);

	            	if ($ultimaSeccion["ultimaSeccion"] == 0 || $ultimaSeccion["ultimaSeccion"] < $seccionUl) {

	            		$actualizarSeccionN = ModeloFacturacion::mdlInsertarSeccionFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2); 

	            	}else{
	            			
	            	}

	            	$datosInsertar = array("seriePedido" => $editarSerie,
	            						   "folioPedido" => $editarIdPedido,
	            						   "concepto" => $concepto,
	            						   "serie" => $serieFactura,
									  	   "folio" => $folioFactura,
									  	   "estatusFactura" => 1,
									  	   "numeroPartidas" => $partidasFactura,
									  	   "numeroUnidades" => $unidadesFactura,
									  	   "importeFactura" => $importeFactura,
									  	   "numFactura" => $respuestaUltimoN["ultimoNumero"],
									  	   "neto" => number_format($neto,4, '.', ''),
									  	   "impuesto" => number_format($impuesto,4, '.', ''),
									  	   "total" => $total,
									  	   "codigoCliente" => $codigoCliente,
									  	   "rfc" => $rfc,
									  	   "nombreCliente" => $nombreCliente,
									  	   "statusClienteFg" => $statusClienteFg,
									  	   "diasCredito" => $diasCredito,
									  	   "pendiente" => $total,
									  	   "estatus" => $estatus,
									  	   "formaPago" => $formaPago,
									  	   "agente" => $agente);
	            	
	            	$respuestaManual = ModeloFacturacion::mdlInsertarFacturasFacturacion($tabla2, $datosInsertar);

		            if ($respuestaManual == "ok" ) {

		            	$mostrarTotales = ModeloFacturacion::mdlMostrarTotales($tabla2, $itemN, $valorN, $itemN2, $valorN2);

			            $datosTotalesFacturacion = array("importSurt" => $mostrarTotales["importeSurtido"],
			            								 "partSurt" => $mostrarTotales["partidasSurtidas"],
			            								 "unidSurt" => $mostrarTotales["unidadesSurtidas"]);
			            $actualizarFacturacion = ModeloFacturacion::mdlActualizarFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2, $datosTotalesFacturacion);

			            $mostrarDatosFacturas = ModeloFacturacion::mdlMostrarDatosFacturas($tabla2, $itemN, $valorN, $itemN2, $valorN2);
			            $serieP = $mostrarDatosFacturas["serie"];
			            $folioP = $mostrarDatosFacturas["folio"];
			            $statusFactura = $mostrarDatosFacturas["estatusFactura"];

			            if ($mostrarDatosFacturas["serie"] != "") {


			      			$datosFacturas = array("idPedido" => $editarIdPedido,
			      									"serie" => $editarSerie,
			      									"serieFactura" => $serieP,
			      									"folioFactura" => $folioP,
			      									"estatusFactura" => $statusFactura);

			      			$actualizarDatosFacturas = ModeloFacturacion::mdlActualizarDatosFacturas($tabla, $datosFacturas);
			            }else{
			            	$datosFacturas = array("idPedido" => $valorN,
						    						"serie" => $valorN2,
						    						"serieFactura" => "",
						      						"folioFactura" => "",
						      						"estatusFactura" => 0);

							$actualizarDatosFacturas = ModeloFacturacion::mdlActualizarDatosFacturas($tabla, $datosFacturas);
			            }

			            /*-----------ACTUALIZAR ESTATUS FORMATO PEDIDO---------*/

				        $datos = array("idPedido"  => $editarIdPedido,
										"serie" => $editarSerie);

						$actualizarFormatoPedido = ModeloFacturacion::mdlActualizarFormatoPedido($tabla, $datos);
						/*-----------ACTUALIZAR TIPO RUTA---------------*/
						$respuestaTipoRuta = ModeloFacturacion::mdlActualizarTipoRuta($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR NIVELES DE SURTIMIENTO---------------*/
						$respuestaNiveles = ModeloFacturacion::mdlActualizarNiveles($tabla, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR ESTATUS FACTURA ALMACEN---------------*/
						$respuestaEstatus = ModeloFacturacion::mdlActualizarEstatusFacturaAlmacen($tabla2, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR FORMATO PEDIDO ATENCION---------------*/
						$respuestaFormatoPedidoAlmacen = ModeloFacturacion::mdlActualizarFormatoPedidoAtencion($tabla, $tableAtencion, $datos);
						/*-----------ACTUALIZAR NOMBRE CLIENTE LOGISTICA---------------*/
						$respuestaNombreClienteLogistica = ModeloFacturacion::mdlActualizarNombreCliente($tabla2, $tablelogistica, $datos);
						/*-----------ACTUALIZAR NOMBRE CLIENTE LOGISTICA2---------------*/
						//$respuestaNombreClienteLogistica2 = ModeloFacturacion::mdlActualizarNombreCliente2($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR FECHA RECEPCION ALMACEN---------------*/
						$respuestaFechaRecepcionAlmacen = ModeloFacturacion::mdlMostrarFechaRecepcionAlmacen($tabla, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR FECHA TERMINO ALMACEN---------------*/
						$respuestaFechaTerminoAlmacen = ModeloFacturacion::mdlMostrarFechaTerminoAlmacen($tabla, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR TIEMPO PROCESO LOGISTICA---------------*/
						$respuestaProcesoAlmacen = ModeloFacturacion::mdlActualizarTiempoLogistica($tablelogistica, $tableAtencion, $datos);
						/*-----------ACTUALIZAR FOLIO FACTURA LOGISTICA---------------*/
						$respuestaFolioFacturaLogistica = ModeloFacturacion::mdlActualizarFolioFacturaLogistica($tabla2, $tablelogistica, $datos);
						/*-----------ACTUALIZAR SERIE FACTURA LOGISTICA---------------*/
						$respuestaSerieFacturaLogistica = ModeloFacturacion::mdlActualizarSerieFacturaLogistica($tabla2, $tablelogistica, $datos);
						/*-----------MOSTRAR TIEMPO EDICION---------------*/
						$respuestaTiempoEdicion = ModeloFacturacion::mdlMostrarTiempoProcesoEdicion($tabla, $tableAtencion, $datos);
						/*-----------ACTUALIZAR STATUS FACTURA EDICION---------------*/
						$respuestaActualizarEstatusFactura = ModeloFacturacion::mdlActualizarStatusFacturacionEdicion($tabla2, $tableAtencion, $datos);
						/*-----------ACTUALIZAR ESTADO DE LA FACTURA---------------*/
						$respuestaActualizarEstado = ModeloFacturacion::mdlActualizarEstadoFacturacion($tabla, $tableAtencion, $datos);
						/*-----------ACTUALIZAR ESTADO DEL PEDIDO---------------*/
						$respuestaEstadoPedido = ModeloFacturacion::mdlActualizarEstadoPedido($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR STATUS DEL PEDIDO---------------*/
						$respuestaStatusPedido = ModeloFacturacion::mdlActualizarStatusPedido($tabla2, $tablelogistica, $datos);
						/*-----------ACTUALIZAR FOLIO FACTURA ATENCION A CLIENTES---------------*/
						$respuestaActualizarFolio = ModeloFacturacion::mdlActualizarFolioFactura($tabla2, $tableAtencion, $datos);
						/*-----------ACTUALIZAR SERIE FACTURA ATENCION A CLIENTES---------------*/
						$respuestaActualizarSerie = ModeloFacturacion::mdlActualizarSerieFactura($tabla2, $tableAtencion, $datos);
						/*-----------ACTUALIZAR SALDO FACTURADO ATENCION A CLIENTES---------------*/
						$respuestaActualizarSaldo = ModeloFacturacion::mdlActualizarSaldoFacturado($tabla, $tableAtencion, $datos);
						/*-----------ACTUALIZAR TIEMPO PROCESO ALMACEN---------------*/
						$respuestaActualizarTiempoProceso = ModeloFacturacion::mdlMostrarTiempoProcesoAlmacen($tabla, $tableAlmacen, $datos);
						/*-----------ACTUALIZAR TIEMPO PROCESO ALMACEN CON ATENCION---------------*/
						$actualizarTiempoProcesoAlmacen = ModeloFacturacion::mdlActualizarTiempoAlmacen($tableAlmacen, $tableAtencion, $datos);
						/*-----------ACTUALIZAR FECHA RECEPCION LOGISTICA---------------*/
						$actualizarFechaRecepcionLogistica = ModeloFacturacion::mdlMostrarFechaRecepcionLogistica($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR FECHA TERMINO LOGISTICA---------------*/
						$actualizarFechaTerminoLogistica = ModeloFacturacion::mdlMostrarFechaTerminoLogistica($tabla, $tablelogistica, $datos);
						/*-----------ACTUALIZAR TIEMPO LOGISTICA---------------*/
						$respuestaActualizarTiempoLogistica = ModeloFacturacion::mdlMostrarTiempoProcesoLogistica($tabla, $tablelogistica, $datos);
		            			
		            }

		            $actualizarInsertar = true;
		           
				}
			}
		}else{
			$itemN = 'idPedido';
			$valorN = $editarIdPedido;
			$itemN2 = 'serie';
			$valorN2 = $editarSerie;
			$datosActualizar = array(

								  		 "usuario" => $editarUsuario,
								  		 "secciones" => $numeroFacturas,
								  		 "folioPedido" => $editarIdPedido,
								  		 "seriePedido" => $editarSerie,
								  		 "statusPedido" => $editarStatus,
								  		 "estado" => 1,
								  		 "facturaPendiente" => 0,
								  		 "ordenCompra" => $editarOrdenCompra,
								  		 "tipo" => $editarTipo,
								  		 "statusCliente" => $statusClienteFg,
								  		 "tipoRuta" => $editarTipoRuta,
								  		 "cantidad" => $cantidad,
								  		 "fechaRecepcion" => $editarFechaRecepcion,
								  		 "fechaEntrega" => $editarFechaEntrega,
								  		 "observaciones" => $editarObservaciones,
								  		 "formatoPedido" => $editarFormatoPedido);

            	$respuestaActualizacion = ModeloFacturacion::mdlEditarDatosFacturasNoExisteFolio($datosActualizar);

            	$mostrarDatosFacturas = ModeloFacturacion::mdlMostrarDatosFacturas($tabla2, $itemN, $valorN, $itemN2, $valorN2);
			    $serieP = $mostrarDatosFacturas["serie"];
			    $folioP = $mostrarDatosFacturas["folio"];
			    $statusFactura = $mostrarDatosFacturas["estatusFactura"];

			    if ($mostrarDatosFacturas["serie"] != "") {


			     	$datosFacturas = array("idPedido" => $editarIdPedido,
			      							"serie" => $editarSerie,
			      							"serieFactura" => $serieP,
			      							"folioFactura" => $folioP,
			      							"estatusFactura" => $statusFactura);

			      	$actualizarDatosFacturas = ModeloFacturacion::mdlActualizarDatosFacturas($tabla, $datosFacturas);
			    }else{
			        $datosFacturas = array("idPedido" => $valorN,
						    				"serie" => $valorN2,
						    				"serieFactura" => "",
						      				"folioFactura" => "",
						      				"estatusFactura" => 0);

					$actualizarDatosFacturas = ModeloFacturacion::mdlActualizarDatosFacturas($tabla, $datosFacturas);
			    }

            	/*-----------ACTUALIZAR ESTATUS FORMATO PEDIDO---------*/

				$datos = array("idPedido"  => $editarIdPedido,
										"serie" => $editarSerie);

				$actualizarFormatoPedido = ModeloFacturacion::mdlActualizarFormatoPedido($tabla, $datos);
				/*-----------ACTUALIZAR TIPO RUTA---------------*/
				$respuestaTipoRuta = ModeloFacturacion::mdlActualizarTipoRuta($tabla, $tablelogistica, $datos);
				/*-----------ACTUALIZAR NIVELES DE SURTIMIENTO---------------*/
				$respuestaNiveles = ModeloFacturacion::mdlActualizarNiveles($tabla, $tableAlmacen, $datos);
				/*-----------ACTUALIZAR ESTATUS FACTURA ALMACEN---------------*/
				$respuestaEstatus = ModeloFacturacion::mdlActualizarEstatusFacturaAlmacen($tabla2, $tableAlmacen, $datos);
				/*-----------ACTUALIZAR FORMATO PEDIDO ATENCION---------------*/
				$respuestaFormatoPedidoAlmacen = ModeloFacturacion::mdlActualizarFormatoPedidoAtencion($tabla, $tableAtencion, $datos);
				/*-----------ACTUALIZAR NOMBRE CLIENTE LOGISTICA---------------*/
				$respuestaNombreClienteLogistica = ModeloFacturacion::mdlActualizarNombreCliente($tabla2, $tablelogistica, $datos);
				/*-----------ACTUALIZAR NOMBRE CLIENTE LOGISTICA2---------------*/
				//$respuestaNombreClienteLogistica2 = ModeloFacturacion::mdlActualizarNombreCliente2($tabla, $tablelogistica, $datos);
				/*-----------ACTUALIZAR FECHA RECEPCION ALMACEN---------------*/
				$respuestaFechaRecepcionAlmacen = ModeloFacturacion::mdlMostrarFechaRecepcionAlmacen($tabla, $tableAlmacen, $datos);
				/*-----------ACTUALIZAR FECHA TERMINO ALMACEN---------------*/
				$respuestaFechaTerminoAlmacen = ModeloFacturacion::mdlMostrarFechaTerminoAlmacen($tabla, $tableAlmacen, $datos);
				/*-----------ACTUALIZAR TIEMPO PROCESO LOGISTICA---------------*/
				$respuestaProcesoAlmacen = ModeloFacturacion::mdlActualizarTiempoLogistica($tablelogistica, $tableAtencion, $datos);
				/*-----------ACTUALIZAR FOLIO FACTURA LOGISTICA---------------*/
				$respuestaFolioFacturaLogistica = ModeloFacturacion::mdlActualizarFolioFacturaLogistica($tabla2, $tablelogistica, $datos);
				/*-----------ACTUALIZAR SERIE FACTURA LOGISTICA---------------*/
				$respuestaSerieFacturaLogistica = ModeloFacturacion::mdlActualizarSerieFacturaLogistica($tabla2, $tablelogistica, $datos);
				/*-----------MOSTRAR TIEMPO EDICION---------------*/
				$respuestaTiempoEdicion = ModeloFacturacion::mdlMostrarTiempoProcesoEdicion($tabla, $tableAtencion, $datos);
				/*-----------ACTUALIZAR STATUS FACTURA EDICION---------------*/
				$respuestaActualizarEstatusFactura = ModeloFacturacion::mdlActualizarStatusFacturacionEdicion($tabla2, $tableAtencion, $datos);
				/*-----------ACTUALIZAR ESTADO DE LA FACTURA---------------*/
				$respuestaActualizarEstado = ModeloFacturacion::mdlActualizarEstadoFacturacion($tabla, $tableAtencion, $datos);
				/*-----------ACTUALIZAR ESTADO DEL PEDIDO---------------*/
				$respuestaEstadoPedido = ModeloFacturacion::mdlActualizarEstadoPedido($tabla, $tablelogistica, $datos);
				/*-----------ACTUALIZAR STATUS DEL PEDIDO---------------*/
				$respuestaStatusPedido = ModeloFacturacion::mdlActualizarStatusPedido($tabla2, $tablelogistica, $datos);
				/*-----------ACTUALIZAR FOLIO FACTURA ATENCION A CLIENTES---------------*/
				$respuestaActualizarFolio = ModeloFacturacion::mdlActualizarFolioFactura($tabla2, $tableAtencion, $datos);
				/*-----------ACTUALIZAR SERIE FACTURA ATENCION A CLIENTES---------------*/
				$respuestaActualizarSerie = ModeloFacturacion::mdlActualizarSerieFactura($tabla2, $tableAtencion, $datos);
				/*-----------ACTUALIZAR SALDO FACTURADO ATENCION A CLIENTES---------------*/
				$respuestaActualizarSaldo = ModeloFacturacion::mdlActualizarSaldoFacturado($tabla, $tableAtencion, $datos);
				/*-----------ACTUALIZAR TIEMPO PROCESO ALMACEN---------------*/
				$respuestaActualizarTiempoProceso = ModeloFacturacion::mdlMostrarTiempoProcesoAlmacen($tabla, $tableAlmacen, $datos);
				/*-----------ACTUALIZAR TIEMPO PROCESO ALMACEN CON ATENCION---------------*/
				$actualizarTiempoProcesoAlmacen = ModeloFacturacion::mdlActualizarTiempoAlmacen($tableAlmacen, $tableAtencion, $datos);
				/*-----------ACTUALIZAR FECHA RECEPCION LOGISTICA---------------*/
				$actualizarFechaRecepcionLogistica = ModeloFacturacion::mdlMostrarFechaRecepcionLogistica($tabla, $tablelogistica, $datos);
				/*-----------ACTUALIZAR FECHA TERMINO LOGISTICA---------------*/
				$actualizarFechaTerminoLogistica = ModeloFacturacion::mdlMostrarFechaTerminoLogistica($tabla, $tablelogistica, $datos);
				/*-----------ACTUALIZAR TIEMPO LOGISTICA---------------*/
				$respuestaActualizarTiempoLogistica = ModeloFacturacion::mdlMostrarTiempoProcesoLogistica($tabla, $tablelogistica, $datos);

            	$actualizar = true;
		}

		if ($actualizar == true && $actualizarInsertar == true) {
			$accion = true;
		}else if ($actualizar == true && $actualizarInsertar == false) {
			$accion = true;
		} else if ($actualizar == false && $actualizarInsertar == true) {
			$accion = true;
		}else if ($actualizar == false && $actualizarInsertar == false) {
			$accion = false;
		}

		return $accion;

	}

	/*=============================================
	ACTUALIZAR ESTATUS FORMATO PEDIDO
	=============================================*/

	/*static public function ctrActualizarFormatoPedido(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla = "facturacion";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarFormatoPedido($tabla, $datos);

				 return $respuestaC;

			}

		}
		


	}*/
	/*=============================================
	ACTUALIZAR TIPO RUTA
	=============================================*/

	/*static public function ctrActualizarTipoRuta(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla = "facturacion";
				$tabla2 = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarTipoRuta($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
	}*/
	/*=============================================
	FACTURAS FORMATO PEDIDO
	=============================================*/

	static public function ctrMostrarFacturasPedido($item, $valor){

		$tabla = "atencionaclientes";

		$respuesta = ModeloFacturacion::mdlMostrarFacturasPedido($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR FORMATO PEDIDO ATENCION A CLIENTES DE FACTURACION
	=============================================*/

	/*static public function ctrActualizarFormatoPedidoAtencion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarFormatoPedidoAtencion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/
	/*=============================================
	ACTUALIZAR NOMBRE CLIENTE LOGISTICA
	=============================================*/

	/*static public function ctrActualizarNombreCliente(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarNombreCliente($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/
	/*=============================================
	ACTUALIZAR NOMBRE CLIENTE LOGISTICA
	=============================================*/

	/*static public function ctrActualizarNombreCliente2(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarNombreCliente2($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/
	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE FACTURACION
	=============================================*/

	/*static public function ctrActualizarEstadoFacturacion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarEstadoFacturacion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/
	/*=============================================
	MOSTRAR ESTADO PEDIDO
	=============================================*/
	/*static public function ctrActualizarEstadoPedido(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla = "facturacion";
				$tabla2  = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarEstadoPedido($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/
	/*=============================================
	MOSTRAR STATUS PEDIDO
	=============================================*/
	/*static public function ctrActualizarStatusPedido(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla = "facturacion";
				$tabla2  = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarStatusPedido($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/

	/*=============================================
	ACTUALIZAR STATUS FACTURACION
	=============================================*/

	static public function ctrActualizarStatusFacturacion(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloFacturacion::mdlActualizarStatusFacturacion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR FOLIO FACTURA
	=============================================*/

	/*static public function ctrActualizarFolioFactura(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarFolioFactura($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		
	}*/
	/*=============================================
	ACTUALIZAR SERIE FACTURA
	=============================================*/

	/*static public function ctrActualizarSerieFactura(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarSerieFactura($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/
	/*=============================================
	ACTUALIZAR FOLIO FACTURA LOGISTICA
	=============================================*/

	/*static public function ctrActualizarFolioFacturaLogistica(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarFolioFacturaLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		
	}*/
	/*=============================================
	ACTUALIZAR SALDO FACTURADO
	=============================================*/

	/*static public function ctrActualizarSaldoFacturado(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarSaldoFacturado($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		
	}*/
	/*=============================================
	ACTUALIZAR SERIE FACTURA LOGISTICA
	=============================================*/

	/*static public function ctrActualizarSerieFacturaLogistica(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
							   "serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarSerieFacturaLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}*/
	/*=============================================
	ACTUALIZAR NIVELES
	=============================================*/

	/*static public function ctrActualizarNiveles(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla = "facturacion";
				$tabla2 = "almacen";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarNiveles($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/

	/*=============================================
	ACTUALIZAR ESTATUS FACTURA
	=============================================*/

/*	static public function ctrActualizarEstatusFacturaAlmacen(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla = "facturacion";
				$tabla2 = "almacen";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarEstatusFacturaAlmacen($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/

	/*=============================================
	ACTUALIZAR STATUS FACTURACION EDICION
	=============================================*/

	/*static public function ctrActualizarStatusFacturacionEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "facturacion";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloFacturacion::mdlActualizarStatusFacturacionEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}*/

	/*=============================================
	CANCELAR FACTURA
	=============================================*/

	static public function ctrEliminarPedido(){

		if(isset($_GET["idFacturacion"])){

			$tabla ="facturacion";
			$datos = $_GET["idFacturacion"];

			$respuesta = ModeloFacturacion::mdlEliminarPedido($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Los datos de facturación han sido cancelados correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "facturacion";

								}
							})

				</script>';

			}		

		}

	}
	/*=============================================
	REGISTRO BITACORA
	=============================================*/

	static public function ctrRegistroBitacora(){

		if (isset($_POST["editarFolioFactura"])) {

		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Edición de Factura',
							   "folio" => $_POST["editarFolioFactura"]);

		$respuesta = ModeloFacturacion::mdlRegistroBitacora($tabla, $datos);

		return $respuesta;
			
		}
		
	}
	/*=============================================
	REGISTRO BITACORA REPORTE
	=============================================*/

	static public function ctrRegistroBitacoraReporte(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Descarga Reporte Facturación',
							   "folio" => 'Sin folio');

		$respuesta = ModeloFacturacion::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){

			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Inserción de Facturas',
								   "folio" => 'Sin Folio');

			$respuesta = ModeloFacturacion::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

		
	}
	/*=============================================
	MOSTRAR FACTURAS
	=============================================*/

	/*static public function ctrMostrarFacturas($item, $valor){

		$tabla = "facturacion";

		$respuesta = ModeloFacturacion::mdlMostrarFacturas($tabla, $item, $valor);

		return $respuesta;
	}*/

}