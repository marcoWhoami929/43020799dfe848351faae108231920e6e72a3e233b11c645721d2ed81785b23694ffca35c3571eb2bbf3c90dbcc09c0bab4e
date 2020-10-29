<?php

class ControladorCompras{

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
	MOSTRAR COMPRAS
	=============================================*/

	static public function ctrMostrarCompras($item, $valor){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarCompras($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS
	=============================================*/

	static public function ctrMostrarComprasAdquisicion($item, $valor){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasAdquisicion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS POR PEDIDOS
	=============================================*/

	static public function ctrMostrarComprasPedidos($item, $valor){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasPedidos($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS EDICION
	=============================================*/

	static public function ctrMostrarComprasEdicion($item, $valor){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasEdicion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS CON PROVEEDORES EXTERNOS
	=============================================*/
	static public function ctrMostrarComprasProveedores($item, $valor){

		$tabla = "atencionaclientes";

		$respuesta = ModeloCompras::mdlMostrarComprasProveedores($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS
	=============================================*/
	static public function ctrMostrarComprasInter($item, $valor){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasInter($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR TIEMPO PROCESO GENERALES
	=============================================*/
	static public function ctrMostrarTiempoProcesoGenerales(){

		if(isset($_POST["idPedidoGeneral"])){
			if($_POST["idPedidoGeneral"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedidoGeneral"],
								"serie"  => $_POST["serieGeneral"]);

				$respuestaC = ModeloCompras::mdlMostrarTiempoProcesoGenerales($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	/*=============================================
	MOSTRAR TIEMPO PROCESO EDICION
	=============================================*/
	static public function ctrMostrarTiempoProcesoEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlMostrarTiempoProcesoEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR TIEMPO PROCESO ADQUISICION
	=============================================*/
	static public function ctrMostrarTiempoProcesoAdquisicion(){

		if(isset($_POST["idPedidoAdquisicion"])){
			if($_POST["idPedidoAdquisicion"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedidoAdquisicion"]);

				$respuestaC = ModeloCompras::mdlMostrarTiempoProcesoAdquisicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS
	=============================================*/

	static public function ctrMostrarComprasInternas($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasInternas($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS INDICADOR
	=============================================*/

	static public function ctrMostrarComprasInternasIndicador(){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasInternasIndicador($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS
	=============================================*/

	static public function ctrMostrarComprasInternasPendientes($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasInternasPendientes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS EXTERNAS
	=============================================*/

	static public function ctrMostrarComprasExternas($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasExternas($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS EXTERNAS INDICADOR
	=============================================*/

	static public function ctrMostrarComprasExternasIndicador(){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasExternasIndicador($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS EXTERNAS PENDIENTES
	=============================================*/

	static public function ctrMostrarComprasExternasPendientes($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasExternasPendientes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS TOTALES
	=============================================*/

	static public function ctrMostrarComprasTotales($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarComprasTotales($tabla,$item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR EN RECOLECCION
	=============================================*/

	static public function ctrMostrarEnRecoleccion($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarEnRecoleccion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PROCESO PAGO
	=============================================*/

	static public function ctrMostrarProcesoPago($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarProcesoPago($tabla,$item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR AUTORIZACION PENDIENTE
	=============================================*/

	static public function ctrMostrarAutorizacionPendiente($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarAutorizacionPendiente($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR CONCLUIDO
	=============================================*/

	static public function ctrMostrarConcluido($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarConcluido($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SIN ADQUISICION
	=============================================*/

	static public function ctrMostrarSinAdquisicion($item, $valor){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarSinAdquisicion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	static public function ctrActualizarTiempoProceso(){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlActualizarTiempoProceso($tabla);

		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR TIEMPO PROCESO GENERALES
	=============================================*/
	static public function ctrActualizarTiempoProcesoGenerales(){
		$tabla = "compras";

		$respuesta = ModeloCompras::mdlActualizarTiempoProcesoGenerales($tabla);

		return $respuesta;
	}
	/*=============================================
	REALIZAR COMPRA
	=============================================*/

	static public function ctrRealizarCompras(){

		if(isset($_POST["idPedido"])){

			if($_POST["idPedido"] != ""){

				$tabla = "compras";

				$datos = array("idPedido"  => $_POST["idPedido"],
							   "vendedor" => $_POST["vendedor"],
							   "usuario" => $_POST["usuario"],
							   "serie" => $_POST["serie"],
							   "folioCompra" => $_POST["folioCompra"],
							   "fechaCotizacion" => $_POST["fechaCotizacion"],
							   "cliente" => $_POST["cliente"],
							   "secciones" => $_POST["secciones"],
							   "cantidad" => $_POST["cantidad"],
							   "unidad" => $_POST["unidad"],
							   "codigo" => $_POST["codigo"],
							   "descripcion" => $_POST["descripcion"],
							   "precioUnitario" => $_POST["precioUnitario"],
							   "precioCompra" => $_POST["precioCompra"],
							   "descuentoProveedor" => $_POST["descuentoProveedor"],
							   "cantidad2" => $_POST["cantidad2"],
							   "unidad2" => $_POST["unidad2"],
							   "codigo2" => $_POST["codigo2"],
							   "descripcion2" => $_POST["descripcion2"],
							   "precioUnitario2" => $_POST["precioUnitario2"],
							   "precioCompra2" => $_POST["precioCompra2"],
							   "descuentoProveedor2" => $_POST["descuentoProveedor2"],
							   "cantidad3" => $_POST["cantidad3"],
							   "unidad3" => $_POST["unidad3"],
							   "codigo3" => $_POST["codigo3"],
							   "descripcion3" => $_POST["descripcion3"],
							   "precioUnitario3" => $_POST["precioUnitario3"],
							   "precioCompra3" => $_POST["precioCompra3"],
							   "descuentoProveedor3" => $_POST["descuentoProveedor3"],
							   "cantidad4" => $_POST["cantidad4"],
							   "unidad4" => $_POST["unidad4"],
							   "codigo4" => $_POST["codigo4"],
							   "descripcion4" => $_POST["descripcion4"],
							   "precioUnitario4" => $_POST["precioUnitario4"],
							   "precioCompra4" => $_POST["precioCompra4"],
							   "descuentoProveedor4" => $_POST["descuentoProveedor4"],
							   "cantidad5" => $_POST["cantidad5"],
							   "unidad5" => $_POST["unidad5"],
							   "codigo5" => $_POST["codigo5"],
							   "descripcion5" => $_POST["descripcion5"],
							   "precioUnitario5" => $_POST["precioUnitario5"],
							   "precioCompra5" => $_POST["precioCompra5"],
							   "descuentoProveedor5" => $_POST["descuentoProveedor5"],
							   "status" => $_POST["status"],
							   "sinAdquisicion" => 0,
							   "tiempoEntrega" => $_POST["tiempoEntrega"],
					           "fechaRecepcion" => $_POST["fechaRecepcion"],
					           "fechaElaboracion" => $_POST["fechaElaboracion"],
					           "fechaTermino" => $_POST["fechaTermino"],
					           "observaciones" => trim($_POST["observaciones"]),
					           "estado" => 1);

				$respuesta = ModeloCompras::mdlRealizarCompras($tabla, $datos);
				$respuesta2 = ModeloCompras::mdlActualizarTiempoProceso($tabla);
				$respuesta3 = ModeloCompras::mdlCalcularUtilidad($tabla);
				$respuesta4 = ModeloCompras::mdlCalcularUtilidad2($tabla);
				$respuesta5 = ModeloCompras::mdlCalcularUtilidad3($tabla);
				$respuesta6 = ModeloCompras::mdlCalcularUtilidad4($tabla);
				$respuesta7 = ModeloCompras::mdlCalcularUtilidad5($tabla);

			

				
				if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok" && $respuesta4 == "ok" && $respuesta5 == "ok" && $respuesta6 == "ok" && $respuesta7 == "ok" ){

					echo '<script>

					swal({

						type: "success",
						title: "¡La compra ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "compras";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar la compra porque hay algún campo vacio",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "compras";

						}

					});
				

				</script>';

			}


		}


	}
	/*=============================================
	REALIZAR COMPRA GENERAL
	=============================================*/

	static public function ctrRealizarComprasGenerales(){

		if(isset($_POST["idPedidoGeneral"])){

			if($_POST["idPedidoGeneral"] != ""){

				$tabla = "compras";

				$datos = array("id" => $_POST["idCompra1"],
							   "idPedido"  => $_POST["idPedidoGeneral"],
							   "usuario" => $_POST["usuarioGeneral"],
							   "serie" => $_POST["serieGeneral"],
							   "folioCompra" => $_POST["folioCompraGeneral"],
							   "cliente" => $_POST["clienteGeneral"],
							   "cantidad" => $_POST["cantidadGeneral"],
							   "importeCompra" => $_POST["importeCompra"],
							   "status" => 4,
							   "sinAdquisicion" => 0,
					           "fechaRecepcion" => $_POST["fechaRecepcionGeneral"],
					           "fechaElaboracion" => $_POST["fechaElaboracionGeneral"],
					           "fechaTermino" => $_POST["fechaTerminoGeneral"],
					           "observaciones" => trim($_POST["observacionesGeneral"]),
					           "estado" => 1,
					       	   "pendiente" => 0);

				$respuesta = ModeloCompras::mdlRealizarComprasGenerales($tabla, $datos);
				$respuesta2 = ModeloCompras::mdlActualizarTiempoProcesoGenerales($tabla, $datos);

			

				
				if($respuesta == "ok" && $respuesta2 == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La compra ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "compras";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar la compra porque hay algún campo vacio",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "compras";

						}

					});
				

				</script>';

			}


		}


	}
	/*=============================================
	PEDIDOS SIN ADQUISICION
	=============================================*/

	static public function ctrSinAdquisicion(){

		if(isset($_POST["editarFolio"])){

			if($_POST["editarFolio"] != ""){

				$tabla = "compras";

				$datos = array("idPedido"  => $_POST["editarFolio"],
							   "cliente" => $_POST["editarNombreCliente"],
							   "status" =>6,
							   "sinAdquisicion" => 1,
							   "serie" => $_POST["editarSerie"],
					           "estado" => 1,
					       	   "pendiente" => 1);

				$respuesta = ModeloCompras::mdlSinAdquisicion($tabla, $datos);


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar porque hay algún campo vacio",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "compras";

						}

					});
				

				</script>';

			}


		}


	}
	/*=============================================
	PEDIDOS SIN ADQUISICION
	=============================================*/

	static public function ctrSinAdquisicionLogistica(){

		if(isset($_POST["editarFolio"])){

			if($_POST["editarFolio"] != ""){

				$tabla = "logistica";

				$datos = array("idPedido"  => $_POST["editarFolio"],
							   "statusCompras" => 4,
							   "serie" => $_POST["editarSerie"],
					           "estadoCompras" => 1);

				$respuesta = ModeloCompras::mdlSinAdquisicionLogistica($tabla, $datos);


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar porque hay algún campo vacio",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "compras";

						}

					});
				

				</script>';

			}


		}


	}
	/*=============================================
	ACTUALIZAR STATUS SIN ADQUISICION
	=============================================*/

	static public function ctrActualizarSinAdquisicion(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("folio"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlActualizarSinAdquisicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS
	=============================================*/

	static public function ctrActualizarEstadoCompras(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloCompras::mdlActualizarEstadoCompras($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS GENERALES
	=============================================*/

	static public function ctrActualizarEstadoComprasGenerales(){

		if(isset($_POST["idPedidoGeneral"])){
			if($_POST["idPedidoGeneral"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedidoGeneral"],
								"serie"  => $_POST["serieGeneral"]);

				$respuestaC = ModeloCompras::mdlActualizarEstadoComprasGenerales($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS PROVEEDORES
	=============================================*/

	static public function ctrActualizarEstadoComprasProveedores(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlActualizarEstadoComprasProveedores($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR ESTADO PEDIDO
	=============================================*/
	static public function ctrActualizarEstadoPedido(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla = "compras";
				$tabla2  = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlActualizarEstadoPedido($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR ESTADO PEDIDO GENERALES
	=============================================*/
	static public function ctrActualizarEstadoPedidoGenerales(){

		if(isset($_POST["idPedidoGeneral"])){
			if($_POST["idPedidoGeneral"] != ""){

				$tabla = "compras";
				$tabla2  = "logistica";

				$datos = array("idPedido"  => $_POST["idPedidoGeneral"],
								"serie"  => $_POST["serieGeneral"]);

				$respuestaC = ModeloCompras::mdlActualizarEstadoPedidoGenerales($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR STATUS PEDIDO
	=============================================*/
	static public function ctrActualizarStatusPedido(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla = "compras";
				$tabla2  = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlActualizarStatusPedido($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR STATUS PEDIDO GENERALES
	=============================================*/
	static public function ctrActualizarStatusPedidoGenerales(){

		if(isset($_POST["idPedidoGeneral"])){
			if($_POST["idPedidoGeneral"] != ""){

				$tabla = "compras";
				$tabla2  = "logistica";

				$datos = array("idPedido"  => $_POST["idPedidoGeneral"],
								"serie"  => $_POST["serieGeneral"]);

				$respuestaC = ModeloCompras::mdlActualizarStatusPedidoGenerales($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS ATENCION
	=============================================*/

	static public function ctrActualizarEstadoComprasAtencion(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("folio"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlActualizarEstadoComprasAtencion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	/*=============================================
	ACTUALIZAR STATUS COMPRAS
	=============================================*/

	static public function ctrActualizarStatusCompras(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloCompras::mdlActualizarStatusCompras($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	/*=============================================
	ACTUALIZAR SIN ADQUISICION
	=============================================*/

	static public function ctrActualizarAdquisicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlActualizarAdquisicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR SIN ADQUISICION GENERALES
	=============================================*/

	static public function ctrActualizarAdquisicionGenerales(){

		if(isset($_POST["idPedidoGeneral"])){
			if($_POST["idPedidoGeneral"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedidoGeneral"],
								"serie"  => $_POST["serieGeneral"]);

				$respuestaC = ModeloCompras::mdlActualizarAdquisicionGenerales($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR STATUS COMPRAS ATENCION
	=============================================*/

	static public function ctrActualizarStatusComprasAtencion(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("folio"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlActualizarStatusComprasAtencion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR STATUS COMPRAS EDICION
	=============================================*/

	static public function ctrActualizarStatusComprasEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloCompras::mdlActualizarStatusComprasEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR STATUS COMPRAS GENERALES
	=============================================*/

	static public function ctrActualizarStatusComprasGenerales(){

		if(isset($_POST["idPedidoGeneral"])){
			if($_POST["idPedidoGeneral"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedidoGeneral"],
								"serie"  => $_POST["serieGeneral"]);

				$respuestaC = ModeloCompras::mdlActualizarStatusComprasGenerales($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR STATUS COMPRAS ADQUISICION
	=============================================*/

	static public function ctrActualizarStatusComprasAdquisicion(){

		if(isset($_POST["idPedidoAdquisicion"])){
			if($_POST["idPedidoAdquisicion"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedidoAdquisicion"]);

				$respuestaC = ModeloCompras::mdlActualizarStatusComprasAdquisicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS SIN ADQUISICION
	=============================================*/

	static public function ctrActualizarEstadoComprasAdquisicion(){

		if(isset($_POST["idPedidoAdquisicion"])){
			if($_POST["idPedidoAdquisicion"] != ""){

			   
				$tabla = "compras";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedidoAdquisicion"]);

				$respuestaC = ModeloCompras::mdlActualizarEstadoComprasAdquisicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	EDITAR COMPRAS
	=============================================*/

	static public function ctrEditarCompras(){

		if(isset($_POST["editarIdPedido"])){

			if(isset($_POST["editarUsuario"])){		

				$tabla = "compras";

				$datos = array("id" => $_POST["idCompra"],
							   "vendedor" => $_POST["editarVendedor"],
							   "usuario" => $_POST["editarUsuario"],
					           "serie" => $_POST["editarSerie"],
					           "idPedido" => $_POST["editarIdPedido"],
					           "folioCompra" => $_POST["editarFolioCompra"],
					           "fechaCotizacion" => $_POST["editarFechaCotizacion"],
					           "cliente" => $_POST["editarCliente"],
					           "secciones" => $_POST["editarSecciones"],
					           "cantidad" => $_POST["editarCantidad"],
					           "unidad" => $_POST["editarUnidad"],
					           "codigo" => $_POST["editarCodigo"],
					           "descripcion" => $_POST["editarDescripcion"],
					           "precioUnitario" => $_POST["editarPrecioUnitario"],
					           "precioCompra" => $_POST["editarPrecioCompra"],
					           "descuentoProveedor" => $_POST["editarDescuentoProveedor"],
					           "cantidad2" => $_POST["editarCantidad2"],
					           "unidad2" => $_POST["editarUnidad2"],
					           "codigo2" => $_POST["editarCodigo2"],
					           "descripcion2" => $_POST["editarDescripcion2"],
					           "precioUnitario2" => $_POST["editarPrecioUnitario2"],
					           "precioCompra2" => $_POST["editarPrecioCompra2"],
					           "descuentoProveedor2" => $_POST["editarDescuentoProveedor2"],
					           "cantidad3" => $_POST["editarCantidad3"],
					           "unidad3" => $_POST["editarUnidad3"],
					           "codigo3" => $_POST["editarCodigo3"],
					           "descripcion3" => $_POST["editarDescripcion3"],
					           "precioUnitario3" => $_POST["editarPrecioUnitario3"],
					           "precioCompra3" => $_POST["editarPrecioCompra3"],
					           "descuentoProveedor3" => $_POST["editarDescuentoProveedor3"],
					           "cantidad4" => $_POST["editarCantidad4"],
					           "unidad4" => $_POST["editarUnidad4"],
					           "codigo4" => $_POST["editarCodigo4"],
					           "descripcion4" => $_POST["editarDescripcion4"],
					           "precioUnitario4" => $_POST["editarPrecioUnitario4"],
					           "precioCompra4" => $_POST["editarPrecioCompra4"],
					           "descuentoProveedor4" => $_POST["editarDescuentoProveedor4"],
					           "cantidad5" => $_POST["editarCantidad5"],
					           "unidad5" => $_POST["editarUnidad5"],
					           "codigo5" => $_POST["editarCodigo5"],
					           "descripcion5" => $_POST["editarDescripcion5"],
					           "precioUnitario5" => $_POST["editarPrecioUnitario5"],
					           "precioCompra5" => $_POST["editarPrecioCompra5"],
					           "descuentoProveedor5" => $_POST["editarDescuentoProveedor5"],
					           "tiempoEntrega" => $_POST["editarTiempoEntrega"],
 					           "fechaRecepcion" => $_POST["editarFechaRecepcion"],
					           "fechaElaboracion" => $_POST["editarFechaElaboracion"],
					           "fechaTermino" => $_POST["editarFechaTermino"],
					           "status" => $_POST["editarStatus"],
					           "sinAdquisicion" => 0,
					           "observaciones" => trim($_POST["editarObservaciones"]),
					           "estado" => 1,
					       	   "pendiente" => 0);

				$respuesta = ModeloCompras::mdlEditarCompra($tabla, $datos);
				$respuesta3 = ModeloCompras::mdlCalcularUtilidad($tabla, $datos);
				$respuesta4 = ModeloCompras::mdlCalcularUtilidad2($tabla, $datos);
				$respuesta5 = ModeloCompras::mdlCalcularUtilidad3($tabla, $datos);
				$respuesta6 = ModeloCompras::mdlCalcularUtilidad4($tabla, $datos);
				$respuesta7 = ModeloCompras::mdlCalcularUtilidad5($tabla, $datos);
				$respuesta8 = ModeloCompras::mdlActualizarTiempoProceso($tabla, $datos);

				if($respuesta == "ok" && $respuesta3 == "ok" && $respuesta4 == "ok" && $respuesta5 == "ok" && $respuesta6 == "ok" && $respuesta7 == "ok" && $respuesta8 == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La compra ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "compras";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "compras";

							}
						})

			  	</script>';

			}

		}

	}
	/*=============================================
	ELIMINAR COMPRA
	=============================================*/

	static public function ctrEliminarCompra(){

		if(isset($_GET["idCompra"])){

			$tabla ="compras";
			$datos = $_GET["idCompra"];

			$tabla2 = "bitacora";
			$datos2 = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Eliminación de Compra',
								   "folio" => $_GET["folioCompra"]);

			$respuesta = ModeloCompras::mdlEliminarCompra($tabla, $datos);
			$respuesta2 = ModeloCompras::mdlRegistroBitacoraEliminar($tabla2, $datos2);

			if($respuesta == "ok" && $respuesta2 == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La compra ha sido eliminada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "compras";

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

		if (isset($_POST["editarFolioCompra"])) {

		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Edición de Compra Proveedores Externos',
							   "folio" => $_POST["editarFolioCompra"]);

		$respuesta = ModeloCompras::mdlRegistroBitacora($tabla, $datos);

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
							   "accion" => 'Descarga Reporte Compras',
							   "folio" => 'Sin folio');

		$respuesta = ModeloCompras::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){

		if (isset($_POST["folioCompraGeneral"])) {
			
			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Edición de Compra Interna',
								   "folio" => $_POST["folioCompraGeneral"]);

			$respuesta = ModeloCompras::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

		}
		
		
		
	}
	

}