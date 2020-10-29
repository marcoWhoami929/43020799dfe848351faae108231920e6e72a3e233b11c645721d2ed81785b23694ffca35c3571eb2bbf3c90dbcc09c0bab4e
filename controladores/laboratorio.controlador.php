<?php

class ControladorLaboratorio{

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
				$tabla2 = "laboratoriocolor";

				$datos = array("folio" => $_POST["editarFolio"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloLaboratorio::mdlActualizarOrdenCompra($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR TIENE IGUALADO
	=============================================*/

	static public function ctrActualizarTieneIgualado(){

		if(isset($_POST["tieneIgualado"])){
			if($_POST["editarFolio"] != ""){

				$tabla = "atencionaclientes";
				$tabla2 = "laboratoriocolor";

				$datos = array("folio" => $_POST["editarFolio"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloLaboratorio::mdlActualizarTieneIgualado($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}


	/*=============================================
	MOSTRAR LABORATORIO
	=============================================*/

	static public function ctrMostrarLaboratorio($item, $valor){

		$tabla = "laboratoriocolor";

		$respuesta = ModeloLaboratorio::mdlMostrarLaboratorio($tabla, $item, $valor);

		return $respuesta;
	}
	
	/*=============================================
	MOSTRAR LABORATORIO EDICIÓN
	=============================================*/

	static public function ctrMostrarLaboratorioEdicion($item, $valor){

		$tabla = "laboratoriocolor";

		$respuesta = ModeloLaboratorio::mdlMostrarLaboratorioEdicion($tabla, $item, $valor);

		return $respuesta;
	}
	
	/*=============================================
	MOSTRAR IGUALADOS
	=============================================*/

	static public function ctrMostrarIgualados($item, $valor){

		$tabla = "laboratoriocolor";

		$respuesta = ModeloLaboratorio::mdlMostrarIgualados($tabla, $item, $valor);

		return $respuesta;
	}
	

	/*=============================================
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	static public function ctrMostrarTiempoProceso(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "laboratoriocolor";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloLaboratorio::mdlMostrarTiempoProceso($tabla, $tabla2, $datos);
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

			   
				$tabla = "laboratoriocolor";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLaboratorio::mdlMostrarTiempoProcesoEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	MOSTRAR PEDIDOS DETENIDOS
	=============================================*/

	static public function ctrMostrarPedidosDetenidos($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLaboratorio::mdlMostrarPedidosDetenidos($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS PRODUCCION
	=============================================*/

	static public function ctrMostrarPedidosProduccion($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLaboratorio::mdlMostrarPedidosProduccion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS PRODUCCION
	=============================================*/

	static public function ctrMostrarPedidosEnProduccion($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLaboratorio::mdlMostrarPedidosEnProduccion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS CONCLUIDOS
	=============================================*/

	static public function ctrMostrarPedidosConcluidos($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLaboratorio::mdlMostrarPedidosConcluidos($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS CANCELADOS
	=============================================*/

	static public function ctrMostrarIgualadosCancelados($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloLaboratorio::mdlMostrarIgualadosCancelados($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR IGUALADOS PENDIENTES
	=============================================*/

	static public function ctrMostrarIgualadosPendientes($item, $valor){
		$tabla = "laboratoriocolor";

		$respuesta = ModeloLaboratorio::mdlMostrarIgualadosPendientes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	static public function ctrActualizarTiempoProceso(){
		$tabla = "laboratoriocolor";

		$respuesta = ModeloLaboratorio::mdlActualizarTiempoProceso($tabla);

		return $respuesta;
	}
	/*=============================================
	SEGUIR PEDIDOS LABORATORIO COLOR
	=============================================*/

	static public function ctrSeguirPedidos(){

		if(isset($_POST["idPedido"])){

			if($_POST["idPedido"] != ""){

			   
				$tabla = "laboratoriocolor";

				$datos = array("idPedido"  => $_POST["idPedido"],
							   "usuario" => $_POST["usuario"],
							   "serie" => $_POST["serie"],
							   "nombreCliente" => $_POST["nombreCliente"],
							   "numeroOrden" => $_POST["numeroOrden"],
							   "secciones" => $_POST["secciones"],
					           "codigo" => $_POST["codigo"],
					           "descripcionColor" => $_POST["descripcionColor"], 
					           "cantidad" => $_POST["cantidad"],
					           "fechaInicio" => $_POST["fechaInicio"],
					           "fechaTermino" => $_POST["fechaTermino"],
					           "codigo2" => $_POST["codigo2"],
					           "descripcionColor2" => $_POST["descripcionColor2"], 
					           "cantidad2" => $_POST["cantidad2"],
					           "fechaInicio2" => $_POST["fechaInicio2"],
					           "fechaTermino2" => $_POST["fechaTermino2"],
					           "codigo3" => $_POST["codigo3"],
					           "descripcionColor3" => $_POST["descripcionColor3"], 
					           "cantidad3" => $_POST["cantidad3"],
					           "fechaInicio3" => $_POST["fechaInicio3"],
					           "fechaTermino3" => $_POST["fechaTermino3"],
					           "codigo4" => $_POST["codigo4"],
					           "descripcionColor4" => $_POST["descripcionColor4"], 
					           "cantidad4" => $_POST["cantidad4"],
					           "fechaInicio4" => $_POST["fechaInicio4"],
					           "fechaTermino4" => $_POST["fechaTermino4"],
					           "codigo5" => $_POST["codigo5"],
					           "descripcionColor5" => $_POST["descripcionColor5"], 
					           "cantidad5" => $_POST["cantidad5"],
					           "fechaInicio5" => $_POST["fechaInicio5"],
					           "fechaTermino5" => $_POST["fechaTermino5"],
					           "fechaRecepcion" => $_POST["fechaRecepcion"],
					           "status" => $_POST["status"],
					           "observaciones" => trim($_POST["observaciones"]),
					           "estado" => 1);

				$respuesta = ModeloLaboratorio::mdlSeguirPedidos($tabla, $datos);
				$respuesta2 = ModeloLaboratorio::mdlActualizarTiempoProceso($tabla);
			

				
				if($respuesta == "ok" && $respuesta2 == "ok" ){

					echo '<script>

					swal({

						type: "success",
						title: "¡El pedido ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "laboratoriocolor";

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
						
							window.location = "laboratoriocolor";

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

		if(isset($_POST["idLaboratorio2"])){

			if(isset($_POST["editarUsuario"])){

				

				$tabla = "laboratoriocolor";


				$datos = array("id" => $_POST["idLaboratorio2"],
							   "usuario" => $_POST["editarUsuario"],
					           "serie" => $_POST["editarSerie"],
					           "idPedido" => $_POST["editarIdPedido"],
					           "nombreCliente" => $_POST["editarNombreCliente"],
					           "numeroOrden" => $_POST["editarNumeroOrden"],
					           "secciones" => $_POST["editarSecciones"],
					           "codigo" => $_POST["editarCodigo1"],
					           "descripcionColor" => $_POST["editarDescripcionColor"],
					           "cantidad" => $_POST["editarCantidad"],
					           "fechaInicio" => $_POST["editarFechaInicio"],
					           "fechaTermino" => $_POST["editarFechaTermino"],
					           "codigo2" => $_POST["editarCodigo2"],
					           "descripcionColor2" => $_POST["editarDescripcionColor2"],
					           "cantidad2" => $_POST["editarCantidad2"],
					           "fechaInicio2" => $_POST["editarFechaInicio2"],
					           "fechaTermino2" => $_POST["editarFechaTermino2"],
					           "codigo3" => $_POST["editarCodigo3"],
					           "descripcionColor3" => $_POST["editarDescripcionColor3"],
					           "cantidad3" => $_POST["editarCantidad3"],
					           "fechaInicio3" => $_POST["editarFechaInicio3"],
					           "fechaTermino3" => $_POST["editarFechaTermino3"],
					           "codigo4" => $_POST["editarCodigo4"],
					           "descripcionColor4" => $_POST["editarDescripcionColor4"],
					           "cantidad4" => $_POST["editarCantidad4"],
					           "fechaInicio4" => $_POST["editarFechaInicio4"],
					           "fechaTermino4" => $_POST["editarFechaTermino4"],
					           "codigo5" => $_POST["editarCodigo5"],
					           "descripcionColor5" => $_POST["editarDescripcionColor5"],
					           "cantidad5" => $_POST["editarCantidad5"],
					           "fechaInicio5" => $_POST["editarFechaInicio5"],
					           "fechaTermino5" => $_POST["editarFechaTermino5"],
					           "fechaRecepcion" => $_POST["editarFechaRecepcion"],
					           "status" => $_POST["editarStatus"],
					           "observaciones" => trim($_POST["editarObservaciones"]),
					           "estado" => 1,
					       	   "pendiente" => 0,
					       		"habilitado" => 0);


				$respuesta = ModeloLaboratorio::mdlEditarPedido($tabla, $datos);
				$respuesta2 = ModeloLaboratorio::mdlActualizarTiempoProceso($tabla, $datos);
				$respuesta3 = ModeloLaboratorio::mdlRegistrarTiempos($tabla, $datos);
				$respuesta4 = ModeloLaboratorio::mdlRegistrarTiempos2($tabla, $datos);
				$respuesta5 = ModeloLaboratorio::mdlRegistrarTiempos3($tabla, $datos);
				$respuesta6 = ModeloLaboratorio::mdlRegistrarTiempos4($tabla, $datos);
				$respuesta7 = ModeloLaboratorio::mdlRegistrarTiempos5($tabla, $datos);

				if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok" && $respuesta4 == "ok" && $respuesta5 == "ok" && $respuesta6 == "ok" && $respuesta7 == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El pedido ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "laboratorioColor";

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

							window.location = "laboratorioColor";

							}
						})

			  	</script>';

			}

		}

	}
	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE LABORATORIO
	=============================================*/

	static public function ctrActualizarEstadoLaboratorio(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "laboratoriocolor";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLaboratorio::mdlActualizarEstadoLaboratorio($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	/*=============================================
	ACTUALIZAR STATUS LABORATORIO
	=============================================*/

	static public function ctrActualizarStatusLaboratorio(){

		if(isset($_POST["idPedido"])){
			if($_POST["idPedido"] != ""){

			   
				$tabla = "laboratoriocolor";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["idPedido"]);

				$respuestaC = ModeloLaboratorio::mdlActualizarStatusLaboratorio($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR STATUS LABORATORIO EDICION
	=============================================*/

	static public function ctrActualizarStatusLaboratorioEdicion(){

		if(isset($_POST["editarIdPedido"])){
			if($_POST["editarIdPedido"] != ""){

			   
				$tabla = "laboratoriocolor";
				$tabla2 = "atencionaclientes";

				$datos = array("idPedido"  => $_POST["editarIdPedido"],
								"serie"  => $_POST["editarSerie"]);

				$respuestaC = ModeloLaboratorio::mdlActualizarStatusLaboratorioEdicion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}

	
	/*=============================================
	CANCELAR PEDIDO
	=============================================*/

	static public function ctrEliminarPedido(){

		if(isset($_GET["idLaboratorio2"])){

			$tabla ="laboratoriocolor";
			$datos = $_GET["idLaboratorio2"];

			$respuesta = ModeloLaboratorio::mdlEliminarPedido($tabla, $datos);

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

								window.location = "laboratoriocolor";

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
							   "accion" => 'Edición de Pedido Laboratorio',
							   "folio" => $_POST["editarIdPedido"]);

		$respuesta = ModeloLaboratorio::mdlRegistroBitacora($tabla, $datos);

		return $respuesta;
			
		}
		
	}
	/*=============================================
	REGISTRO TIEMPOS IGUALADOS
	=============================================*/
	static public function ctrRegistrarTiempos(){

		$tabla = "laboratoriocolor";

		$respuesta = ModeloLaboratorio::mdlRegistrarTiempos($tabla);

		return $respuesta;

	}
	/*=============================================
	REGISTRO TIEMPOS IGUALADOS
	=============================================*/
	static public function ctrRegistrarTiempos2(){

		$tabla = "laboratoriocolor";
		
		$respuesta = ModeloLaboratorio::mdlRegistrarTiempos2($tabla);

		return $respuesta;

	}
	/*=============================================
	REGISTRO TIEMPOS IGUALADOS
	=============================================*/
	static public function ctrRegistrarTiempos3(){

		$tabla = "laboratoriocolor";
		
		$respuesta = ModeloLaboratorio::mdlRegistrarTiempos3($tabla);

		return $respuesta;

	}
	/*=============================================
	REGISTRO TIEMPOS IGUALADOS
	=============================================*/
	static public function ctrRegistrarTiempos4(){

		$tabla = "laboratoriocolor";
		
		$respuesta = ModeloLaboratorio::mdlRegistrarTiempos4($tabla);

		return $respuesta;

	}
	/*=============================================
	REGISTRO TIEMPOS IGUALADOS
	=============================================*/
	static public function ctrRegistrarTiempos5(){

		$tabla = "laboratoriocolor";
		
		$respuesta = ModeloLaboratorio::mdlRegistrarTiempos5($tabla);

		return $respuesta;

	}
	/*=============================================
	REGISTRO BITACORA REPORTE
	=============================================*/

	static public function ctrRegistroBitacoraReporte(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Descarga Reporte Laboratorio',
							   "folio" => 'Sin folio');

		$respuesta = ModeloLaboratorio::mdlRegistroBitacoraReporte($tabla, $datos);

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
								   "accion" => 'Seguimiento de Pedido Laboratorio',
								   "folio" => $_POST["idPedido"]);

			$respuesta = ModeloLaboratorio::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

		}
		
		
		
	}
		/*=============================================
		ACTUALIZAR FECHA PEDIDO LABORATORIO DE COLOR
		=============================================*/

		static public function ctrActualizarFechaPedido(){

			if(isset($_POST["editarFolio"])){
				if($_POST["editarFolio"] != ""){

					$tabla = "atencionaclientes";
					$tabla2 = "laboratoriocolor";

					$datos = array("folio" => $_POST["editarFolio"],
									"serie" => $_POST["editarSerie"]);

					$respuestaC = ModeloAtencion::mdlActualizarFechaPedido($tabla, $tabla2, $datos);
					 return $respuestaC;

				}

			}
		

	}


}