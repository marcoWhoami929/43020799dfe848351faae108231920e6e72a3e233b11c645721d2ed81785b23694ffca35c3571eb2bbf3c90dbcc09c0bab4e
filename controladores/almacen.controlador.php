<?php

class ControladorAlmacen{

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
	MOSTRAR ALMACEN
	=============================================*/

	static public function ctrMostrarAlmacen($item, $valor){

		$tabla = "almacen";

		$respuesta = ModeloAlmacen::mdlMostrarAlmacen($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR ALMACEN PARA EDICIÓN
	=============================================*/

	static public function ctrMostrarAlmacenEdicion($item, $valor){

		$tabla = "almacen";

		$respuesta = ModeloAlmacen::mdlMostrarAlmacenEdicion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR COMPRA
	=============================================*/
	static public function ctrActualizarCompra(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "compras";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloAlmacen::mdlActualizarCompra($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}
	/*=============================================
	ACTUALIZAR COMPRA EDICION
	=============================================*/
	static public function ctrActualizarCompraEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "compras";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloAlmacen::mdlActualizarCompraEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}

	}
	/*=============================================
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	static public function ctrMostrarTiempoProceso(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloAlmacen::mdlMostrarTiempoProceso($tabla, $tabla2, $datos);
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

			   
				$tabla = "almacen";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloAlmacen::mdlMostrarTiempoProcesoEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR PARTIDAS ALMACEN
	=============================================*/

	static public function ctrActualizarPartidas(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "almacen";

				$datos = array("idPedido"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"],
							   "numeroPartidas" => $_POST["editarNumeroPartidas"]);

				$respuestaC = ModeloAlmacen::mdlActualizarPartidas($tabla, $datos);
				 return $respuestaC;

			}

		}
		
	}
	/*=============================================
	ACTUALIZAR UNIDADES ALMACEN
	=============================================*/

	static public function ctrActualizarUnidades(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "almacen";

				$datos = array("idPedido"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"],
							   "numeroUnidades" => $_POST["editarNumeroUnidades"]);

				$respuestaC = ModeloAlmacen::mdlActualizarUnidades($tabla, $datos);
				 return $respuestaC;

			}

		}
		
	}

	/*=============================================
	ACTUALIZAR IMPORTE ALMACEN
	=============================================*/

	static public function ctrActualizarImporte(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

			   
				$tabla = "almacen";

				$datos = array("idPedido"  => $_POST["editarFolio"],
								"serie"  => $_POST["editarSerie"],
							   "importeTotal" => $_POST["editarImporte"]);

				$respuestaC = ModeloAlmacen::mdlActualizarImporte($tabla, $datos);
				 return $respuestaC;

			}

		}
		
	}
	

	/*=============================================
	MOSTRAR PEDIDOS DETENIDOS
	=============================================*/

	static public function ctrMostrarPedidosDetenidos($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAlmacen::mdlMostrarPedidosDetenidos($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS EN LABORATORIO
	=============================================*/
	static public function ctrMostrarPedidosEnLaboratorio($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAlmacen::mdlMostrarPedidosEnLaboratorio($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS PENDIENTES
	=============================================*/
	static public function ctrMostrarPedidosPendientes($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAlmacen::mdlMostrarPedidosPendientes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS SUMINISTRADOS
	=============================================*/
	static public function ctrMostrarPedidosSuministrados($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAlmacen::mdlMostrarPedidosSuministrados($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	static public function ctrActualizarTiempoProceso(){
		$tabla = "almacen";

		$respuesta = ModeloAlmacen::mdlActualizarTiempoProceso($tabla);

		return $respuesta;
	}
	/*=============================================
	SEGUIR PEDIDO
	=============================================*/

	static public function ctrSeguirPedido(){

		if(isset($_POST["idPedido"])){

			if($_POST["idPedido"] != ""){

			   
				$tabla = "almacen";

				$datos = array("idPedido"  => $_POST["idPedido"],
							   "suministrado" => $_POST["suministrado"],
							   "serie" => $_POST["serie"],
					           "fechaRecepcion" => $_POST["fechaRecepcion"],
					           "fechaSuministro" => $_POST["fechaSuministro"],
					           "fechaTermino" => $_POST["fechaTermino"],
					           "status" => $_POST["status"],
					           "tipoCompra" => $_POST["tipoCompra"],
					           "observaciones" => trim($_POST["observaciones"]),
					           "numeroPartidas" => $_POST["numeroPartidas"],
					           "sumPartidas" => $_POST["sumPartidas"],
					           "numeroUnidades" => $_POST["numeroUnidades"],
					           "sumUnidades" => $_POST["sumUnidades"],
					           "importeTotal" => $_POST["importeTotal"],
					           "importeSurtido" => $_POST["importeSurtido"],
					           "estado" => 1);

				$respuesta = ModeloAlmacen::mdlSeguirPedido($tabla, $datos);
				$respuesta2 = ModeloAlmacen::mdlActualizarTiempoProceso($tabla); 
				$respuesta3 = ModeloAlmacen::mdlNivelPartidas($tabla);
				$respuesta4 = ModeloAlmacen::mdlNivelSum($tabla);
				$respuesta5 = ModeloAlmacen::mdlNivelSumCosto($tabla);

				
				if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok" && $respuesta4 == "ok" && $respuesta5 == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Pedido seguido correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "almacen";

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
						
							window.location = "almacen";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	EDITAR PEDIDO
	=============================================*/

	static public function ctrEditarPedido(){

		if(isset($_POST["editarIdPedido"])){

			if(isset($_POST["editarSuministrado"])){

				$tabla = "almacen";
				
				$datos = array("id" => $_POST["idAlmacen2"],
							   "suministrado" => $_POST["editarSuministrado"],
					           "serie" => $_POST["editarSerie"],
					           "idPedido" => $_POST["editarIdPedido"],
					           "fechaRecepcion" => $_POST["editarFechaRecepcion"],
					           "fechaSuministro" => $_POST["editarFechaSuministro"],
					           "fechaTermino" => $_POST["editarFechaTermino"],
					           "status" => $_POST["editarStatus"],
					           "tipoCompra" => $_POST["editarTipoCompra"],
					           "observaciones" => trim($_POST["editarObservaciones"]),
					           "numeroPartidas" => $_POST["editarNumeroPartidas"],
					           "numeroUnidades" => $_POST["editarNumeroUnidades"],
					           "importeTotal" => $_POST["editarImporteTotal"],
					           "estado" => 1,
					       	   "habilitado" => 0,
					       	   "pendiente" => 0);

				$respuesta = ModeloAlmacen::mdlEditarPedido($tabla, $datos);
				$respuesta2 = ModeloAlmacen::mdlActualizarTiempoProceso($tabla, $datos);


				if($respuesta == "ok" && $respuesta2 == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El pedido ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "almacen";

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

							window.location = "almacen";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE ALMACEN
	=============================================*/

	static public function ctrActualizarEstadoAlmacen(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloAlmacen::mdlActualizarEstadoAlmacen($tabla, $tabla2, $datos);
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

				$tabla = "almacen";
				$tabla2  = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloAlmacen::mdlActualizarEstadoPedido($tabla, $tabla2, $datos);
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

				$tabla = "almacen";
				$tabla2  = "logistica";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloAlmacen::mdlActualizarStatusPedido($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR STATUS ALMACEN
	=============================================*/

	static public function ctrActualizarStatusAlmacen(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido" => $_POST["idPedido"]);

				$respuestaC = ModeloAlmacen::mdlActualizarStatusAlmacen($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR TIPO COMPRA
	=============================================*/

	static public function ctrActualizarTipoCompra(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloAlmacen::mdlActualizarTipoCompra($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR STATUS ALMACEN EDICION
	=============================================*/

	static public function ctrActualizarStatusAlmacenEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
							  "serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloAlmacen::mdlActualizarStatusAlmacenEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	/*=============================================
	ACTUALIZAR TIPO COMPRA EDICION
	=============================================*/

	static public function ctrActualizarTipoCompraEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "almacen";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
							  "serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloAlmacen::mdlActualizarTipoCompraEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}


	
	/*=============================================
	CANCELAR PEDIDO
	=============================================*/

	static public function ctrEliminarPedido(){

		if(isset($_GET["idAlmacen2"])){

			$tabla ="almacen";
			$datos = $_GET["idAlmacen2"];

			$respuesta = ModeloAlmacen::mdlEliminarPedido($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El pedido ha sido cancelado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "almacen";

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

		if (isset($_POST["editarIdPedido"])) {

		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Edición de Pedido Almacén',
							   "folio" => $_POST["editarIdPedido"]);

		$respuesta = ModeloAlmacen::mdlRegistroBitacora($tabla, $datos);

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
							   "accion" => 'Descarga Reporte Almacén',
							   "folio" => 'Sin folio');

		$respuesta = ModeloAlmacen::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){

		if (isset($_POST["idPedido"])) {
			
			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Seguimiento de Pedido Almacén',
								   "folio" => $_POST["idPedido"]);

			$respuesta = ModeloAlmacen::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

		}
		
		
		
	}



}