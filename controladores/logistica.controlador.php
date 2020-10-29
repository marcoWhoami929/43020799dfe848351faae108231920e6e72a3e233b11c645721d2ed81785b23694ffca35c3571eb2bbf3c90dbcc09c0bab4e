<?php

class ControladorLogistica{

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
	MOSTRAR LOGISTICA
	=============================================*/

	static public function ctrMostrarLogistica($item, $valor,$idUsuario){

		$tabla = "logistica";

		$respuesta = ModeloLogistica::mdlMostrarLogistica($tabla, $item, $valor,$idUsuario);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR LOGISTICA EDICION
	=============================================*/

	static public function ctrMostrarLogisticaEdicion($item, $valor){

		$tabla = "logistica";

		$respuesta = ModeloLogistica::mdlMostrarLogisticaEdicion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR TIEMPO SEGUNDOS
	=============================================*/

	static public function ctrMostrarTiempoSegundos(){

		if (isset($_POST["idPedido"])) {

			if ($_POST["idPedido"] != "") {

				$tabla = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloLogistica::mdlMostrarTiempoSegundos($tabla, $datos);

				return $respuestaC;
				
			}
			
		}
		
	}
	/*=============================================
	MOSTRAR TIEMPO SEGUNDOS EDICION
	=============================================*/

	static public function ctrMostrarTiempoSegundosEdicion(){

		if (isset($_POST["editarIdPedido"])) {

			if ($_POST["editarIdPedido"] != "") {

				$tabla = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLogistica::mdlMostrarTiempoSegundosEdicion($tabla, $datos);

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

			   
				$tabla = "logistica";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloLogistica::mdlMostrarTiempoProceso($tabla, $tabla2, $datos);
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

			   
				$tabla = "logistica";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLogistica::mdlMostrarTiempoProcesoEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	/*=============================================
	MOSTRAR TIEMPO FINAL EDICION
	=============================================*/
	static public function ctrMostrarTiempoFinalEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

				$tabla= "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLogistica::mdlMostrarTiempoFinalEdicion($tabla, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR ESTADO PEDIDO
	=============================================*/
	static public function ctrActualizarEstadoPedido(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

				$tabla = "atencionaclientes";
				$tabla2  = "logistica";

				$datos = array("folio"  => $_POST["editarFolio"],	
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLogistica::mdlActualizarEstadoPedido($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR TIPO RUTA
	=============================================*/
	static public function ctrActualizarTipoRuta(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

				$tabla = "atencionaclientes";
				$tabla2  = "logistica";

				$datos = array("folio"  => $_POST["editarFolio"]);

				$respuestaC = ModeloLogistica::mdlActualizarTipoRuta($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR PEDIDOS DETENIDOS
	=============================================*/

	static public function ctrMostrarPedidosDetenidos($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLogistica::mdlMostrarPedidosDetenidos($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS DETENIDOS
	=============================================*/

	static public function ctrMostrarPedidosDetenidos2($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLogistica::mdlMostrarPedidosDetenidos2($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS EN RUTA
	=============================================*/

	static public function ctrMostrarPedidosRuta($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLogistica::mdlMostrarPedidosRuta($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS ENTREGADOS
	=============================================*/

	static public function ctrMostrarPedidosEntregados($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLogistica::mdlMostrarPedidosEntregados($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	static public function ctrActualizarTiempoProceso(){
		$tabla = "logistica";

		$respuesta = ModeloLogistica::mdlActualizarTiempoProceso($tabla);

		return $respuesta;
	}
	/*=============================================
	REGISTRO DE LOGISTICA
	=============================================*/

	static public function ctrSeguirPedidos(){

		if(isset($_POST["idPedido"])){

			if($_POST["idPedido"] != ""){

				$tabla = "logistica";

				$datos = array("idPedido"  => $_POST["idPedido"],
							   "usuario" => $_POST["usuario"],
							   "serie" => $_POST["serie"],
					           "fechaRecepcion" => $_POST["fechaRecepcion"],
					           "fechaProgramada" => $_POST["fechaProgramada"],
					           "status" => $_POST["status"],
					           "tipoRuta" => $_POST["tipoRuta"],
					           "fechaEntregaCliente" => $_POST["fechaEntregaCliente"],
					           "observaciones" => trim($_POST["observaciones"]),
					           "estado" => 1,
					       	   "concluido" => 1);

				$respuesta = ModeloLogistica::mdlSeguirPedidos($tabla, $datos);
				$respuesta2 = ModeloLogistica::mdlActualizarTiempoProceso($tabla);
			

				
				if($respuesta == "ok" && $respuesta2 == "ok" ){

					echo '<script>

					swal({

						type: "success",
						title: "¡Pedido seguido correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "logistica";

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
						
							window.location = "logistica";

						}

					});
				

				</script>';

			}


		}


	}
	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE LOGISTICA
	=============================================*/

	static public function ctrActualizarEstadoLogistica(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "logistica";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLogistica::mdlActualizarEstadoLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR CONCLUIDO ATENCION A CLIENTES
	=============================================*/

	static public function ctrActualizarConcluido(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "logistica";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLogistica::mdlActualizarConcluido($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR CANCELADO ATENCION A CLIENTES
	=============================================*/

	static public function ctrActualizarCancelado(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "logistica";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLogistica::mdlActualizarCancelado($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	/*=============================================
	ACTUALIZAR STATUS LOGISTICA
	=============================================*/

	static public function ctrActualizarStatusLogistica(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "logistica";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloLogistica::mdlActualizarStatusLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
		/*=============================================
	ACTUALIZAR STATUS LOGISTICA EDICION
	=============================================*/

	static public function ctrActualizarStatusLogisticaEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "logistica";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLogistica::mdlActualizarStatusLogisticaEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	EDITAR LOGISTICA
	=============================================*/

	static public function ctrEditarPedidos(){

		if(isset($_POST["idLogis"])){

			if(isset($_POST["editarUsuario"])){

				

				$tabla = "logistica";


				$datos = array("id" => $_POST["idLogis"],
							   "usuario" => $_POST["editarUsuario"],
					           "serie" => $_POST["editarSerie"],
					           "idPedido" => $_POST["editarIdPedido"],
					           "fechaRecepcion" => $_POST["editarFechaRecepcion"],
					           "fechaProgramada" => $_POST["editarFechaProgramada"],
					           "status" => $_POST["editarStatus"],
					           "tipoRuta" => $_POST["editarTipoRuta"],
					           "operador" => $_POST["editarOperador"],
					           "fechaEntregaCliente" => $_POST["editarFechaEntregaCliente"],
					           "observaciones" => trim($_POST["editarObservaciones"]),
					           "estado" => 1,
					       	   "concluido" => 1,
					       		"pendiente" => 0);

				$respuesta = ModeloLogistica::mdlEditarPedidos($tabla, $datos);
				$respuesta2 = ModeloLogistica::mdlActualizarTiempoProceso($tabla, $datos);

				if($respuesta == "ok" && $respuesta2 == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El pedido ha sido modificado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "logistica";

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

							window.location = "logistica";

							}
						})

			  	</script>';

			}

		}

	}
	/*=============================================
	CANCELAR PEDIDO
	=============================================*/

	static public function ctrEliminarPedido(){

		if(isset($_GET["idLogis"])){

			$tabla ="logistica";
			$datos = $_GET["idLogis"];

			$respuesta = ModeloLogistica::mdlEliminarPedido($tabla, $datos);

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

								window.location = "logistica";

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
							   "accion" => 'Seguimiento de Pedido Logística',
							   "folio" => $_POST["editarIdPedido"]);

		$respuesta = ModeloLogistica::mdlRegistroBitacora($tabla, $datos);

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
							   "accion" => 'Descarga Reporte Logística',
							   "folio" => 'Sin folio');

		$respuesta = ModeloLogistica::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}


}