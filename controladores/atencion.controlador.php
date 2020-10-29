<?php

class ControladorAtencion{

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
	MOSTRAR ATENCION A CLIENTES
	=============================================*/

	static public function ctrMostrarAtencionAClientes($item, $valor){

		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarAtencionAClientes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR ATENCION
	=============================================*/

	static public function ctrMostrarAtencion($item, $valor){

		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarAtencion($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR ATENCION ESTATUS
	=============================================*/

	static public function ctrMostrarAtencionEstatus($item, $valor){

		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarAtencionEstatus($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS EN LABORATORIO
	=============================================*/
	static public function ctrMostrarPedidosLaboratorio(){

		$tabla = "laboratoriocolor";

		$respuesta = ModeloAtencion::mdlMostrarPedidosLaboratorio($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS CON IGUALADOS
	=============================================*/
	static public function ctrMostrarPedidosConIgualado($item, $valor){

		$tabla = "laboratoriocolor";

		$respuesta = ModeloAtencion::mdlMostrarPedidosConIgualado($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR PEDIDOS TOTALES
	=============================================*/

	static public function ctrMostrarPedidosTotales($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarPedidosTotales($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS TERMINADOS
	=============================================*/

	static public function ctrMostrarPedidosTerminados($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarPedidosTerminados($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR PEDIDOS CANCELADOS
	=============================================*/

	static public function ctrMostrarPedidosCancelados($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarPedidosCancelados($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS EN PROCESO
	=============================================*/

	static public function ctrMostrarPedidosEnProceso($item, $valor){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarPedidosEnProceso($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PEDIDOS SIN FACTURAR
	=============================================*/

	static public function ctrMostrarPedidosSinFacturar(){
		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarPedidosSinFacturar($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS EXTERNAS
	=============================================*/
	static public function ctrMostrarComprasExternas(){

		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarComprasExternas($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS
	=============================================*/
	static public function ctrMostrarComprasInternas(){

		$tabla = "atencionaclientes";

		$respuesta = ModeloAtencion::mdlMostrarComprasInternas($tabla);

		return $respuesta;
	}
	/*=============================================
	REGISTRO DE PEDIDO
	=============================================*/

	static public function ctrCrearPedido(){

		if(isset($_POST["creado"])){


			if($_POST["statusCliente"] == "activado"){

			   
				$tabla = "atencionaclientes";

				$datos = array("creado" => $_POST["creado"],
					           "codigoCliente" => $_POST["codigoCliente"],
					           "nombreCliente" => $_POST["nombreCliente"],
					           "canal" => $_POST["canal"],
					           "rfc" => $_POST["rfc"],
					           "agenteVentas" => $_POST["agenteVentas"],
					           "diasCredito" => $_POST["diasCredito"],
					           "statusCliente" => $_POST["statusCliente"],
					           "serie" => $_POST["serie"],
					           "folio" => $_POST["folio"],
					           "tipoPago" => $_POST["tipoPago"],
					           "metodoPago" => $_POST["metodoPago"],
					           "formaPago" => $_POST["formaPago"],
					           "ordenCompra" => $_POST["ordenCompra"],
					           "numeroPartidas" => $_POST["numeroPartidas"],
					           "numeroUnidades" => $_POST["numeroUnidades"],
					           "importe" => $_POST["importe"],
					           "sinAdquisicion" => 1,
					           "fechaRecepcion" => $_POST["fechaRecepcion"],
					           "fechaElaboracion" => $_POST["fechaElaboracion"],
					           "tipoRuta" => $_POST["tipoRuta"],
					           "tieneIgualado" => $_POST["tieneIgualado"],
					           //"tipoCompra" => $_POST["tipoCompra"],
					           "observaciones" => trim($_POST["observaciones"]),
					           "estado" => 1);

				$respuesta = ModeloAtencion::mdlIngresarPedido($tabla, $datos);
				$respuesta2 = ModeloAtencion::mdlActualizarTiempoProceso($tabla); 
			
				if($respuesta == "ok" && $respuesta2 == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El pedido ha sido creado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "atencionClientes";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar el pedido porque el cliente se encuentra desactivado",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "atencionClientes";

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

		if(isset($_POST["editarFolio"])){

			if(isset($_POST["editarNombreCliente"])){

				

				$tabla = "atencionaclientes";

				$obs1 = $_POST["editarObservaciones"];
        		$textoObservaciones1 = preg_replace('/\s+/', ' ', $obs1);
        		$obs2 = $_POST["editarObservaciones2"];
        		$textoObservaciones2 = preg_replace('/\s+/', ' ', $obs2);

				$datos = array("id" => $_POST["idPedido"],
							   "creado" => $_POST["editarCreado"],
					           "codigoCliente" => $_POST["editarCodigoCliente"],
					           "nombreCliente" => $_POST["editarNombreCliente"],
					           "canal" => $_POST["editarCanal"],
					           "rfc" => $_POST["editarRfc"],
					           "agenteVentas" => $_POST["editarAgenteVentas"],
					           "diasCredito" => $_POST["editarDiasCredito"],
					           "statusCliente" => $_POST["editarStatusCliente"],
					           "serie" => $_POST["editarSerie"],
					           "folio" => $_POST["editarFolio"],
					           "tipoPago" => $_POST["editarTipoPago"],
					           "metodoPago" => $_POST["editarMetodoPago"],
					           "formaPago" => $_POST["editarFormaPago"],
					           "ordenCompra" => $_POST["editarOrdenCompra"],
					           "numeroPartidas" => $_POST["editarNumeroPartidas"],
					           "numeroUnidades" => $_POST["editarNumeroUnidades"],
					           "importe" => $_POST["editarImporte"],
					           "fechaRecepcion" => $_POST["editarFechaRecepcion"],
					           "fechaElaboracion" => $_POST["editarFechaElaboracion"],
					           "tipoRuta" => $_POST["editarTipoRuta"],
					           "tieneIgualado" => $_POST["tieneIgualado"],
					           //"tipoCompra" => $_POST["editarTipoCompra"],
					           "observaciones" => rtrim($textoObservaciones1),
					           "observaciones2" => rtrim($textoObservaciones2),
					           "estado" => 1);

				$respuesta = ModeloAtencion::mdlEditarPedido($tabla, $datos);
				$respuesta2 = ModeloAtencion::mdlActualizarTiempoProceso($tabla, $datos); 

				if($respuesta == "ok" && $respuesta2 == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El pedido ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "atencionClientes";

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

							window.location = "atencionClientes";

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

		if(isset($_GET["idPedido"])){

			$tabla = "atencionaclientes";
			$datos = array("id" => $_GET["idPedido"],
						   "motivoCancelacion" => $_GET['motivo']);

			$tabla1 = "almacen";
			$datos1 = array("folio" => $_GET["folio"],
						   "serie" => $_GET["serie"]);

			$tabla2 = "laboratoriocolor";
			$datos2 = array("folio" => $_GET["folio"],
						   "serie" => $_GET["serie"]);

			$tabla3 = "facturacion";
			$datos3 = array("folio" => $_GET["folio"],
						   "serie" => $_GET["serie"]);

			$tabla4 = "compras";
			$datos4 = array("folio" => $_GET["folio"],
						   "serie" => $_GET["serie"]);

			$tabla5 = "logistica";
			$datos5 = array("folio" => $_GET["folio"],
						   "serie" => $_GET["serie"]);

			$tabla6 = "bitacora";

			$datos6 = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Cancelación de Pedido',
								   "folio" => $_GET["folio"]);

			


			$respuesta = ModeloAtencion::mdlEliminarPedido($tabla, $datos);
			$respuesta1 = ModeloAlmacen::mdlEliminarPedidoAlmacen($tabla1, $datos1);
			$respuesta2 = ModeloLaboratorio::mdlEliminarPedidoLaboratorio($tabla2, $datos2);
			$respuesta3 = ModeloFacturacion::mdlEliminarPedidoFacturacion($tabla3, $datos3);
			$respuesta4 = ModeloCompras::mdlEliminarPedidoCompras($tabla4, $datos4);
			$respuesta5 = ModeloLogistica::mdlEliminarPedidoLogistica($tabla5, $datos5);
			$respuesta6 = ModeloAtencion::mdlRegistroBitacoraEliminar($tabla6, $datos6);

			if($respuesta == "ok" && $respuesta1 == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok" && $respuesta4 == "ok" && $respuesta5 == "ok" && $respuesta6 == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El pedido ha sido cancelado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "atencionClientes";

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

		if (isset($_POST["editarFolio"])) {

		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Edición de Pedido',
							   "folio" => $_POST["editarFolio"]);

		$respuesta = ModeloAtencion::mdlRegistroBitacora($tabla, $datos);

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
							   "accion" => 'Descarga Reporte Atención a Clientes',
							   "folio" => 'Sin folio');

		$respuesta = ModeloAtencion::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA REPORTE ESTATUS
	=============================================*/

	static public function ctrRegistroBitacoraReporteEstatus(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Descarga Reporte Estatus Pedidos',
							   "folio" => 'Sin folio');

		$respuesta = ModeloAtencion::mdlRegistroBitacoraReporteEstatus($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){
			
			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Importacion de Pedidos',
								   "folio" =>  'Sin Folio');

			$respuesta = ModeloAtencion::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;
		
	}
	/*=============================================
	AGREGAR OBSERVACIONES EXTRA
	=============================================*/

	static public function ctrAgregarObservacionesExtra(){

			if ($_POST["editarAsignacion"] != "") {
				
				$tabla = $_POST["editarAsignacion"];

				$obs1 = $_POST["editarObservaciones"];
        		$textoObservaciones1 = preg_replace('/\s+/', ' ', $obs1);
        	

				$datos = array("observacionesExtras" => rtrim($textoObservaciones1),
							   "idPedido" => $_POST["editarFolio"],
								"serie" => $_POST["editarSerie"]);

				$respuesta = ModeloAtencion::mdlAgregarObservacionesExtra($tabla, $datos);

				return $respuesta;
		
			}
			
			
	}
	/*=============================================
	AGREGAR OBSERVACIONES EXTRA
	=============================================*/

	static public function ctrAgregarObservacionesExtra2(){

			if ($_POST["editarAsignacion2"] != "") {
				
				$tabla2 = $_POST["editarAsignacion2"];

				$obs2 = $_POST["editarObservaciones2"];
        		$textoObservaciones2 = preg_replace('/\s+/', ' ', $obs2);

				$datos2 = array("observacionesExtras" => rtrim($textoObservaciones2),
							   "idPedido" => $_POST["editarFolio"],
								"serie" => $_POST["editarSerie"]);

				$respuesta = ModeloAtencion::mdlAgregarObservacionesExtra2($tabla2, $datos2);

				return $respuesta;
		
			}
			
			
	}
	/*=============================================
	ACTUALIZAR NOMBRE CLIENTE
	=============================================*/

	static public function ctrActualizarClienteAlmacen(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

				$tabla = "atencionaclientes";
				$tabla2 = "almacen";

				$datos = array("folio" => $_POST["editarFolio"],
								"serie" => $_POST["editarSerie"]);


				$respuestaC = ModeloAtencion::mdlActualizarClienteAlmacen($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR NOMBRE CLIENTE
	=============================================*/

	static public function ctrActualizarClienteFacturacion(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

				$tabla = "atencionaclientes";
				$tabla2 = "facturacion";

				$datos = array("folio" => $_POST["editarFolio"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloAtencion::mdlActualizarClienteFacturacion($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
	/*=============================================
	ACTUALIZAR NOMBRE CLIENTE
	=============================================*/

	static public function ctrActualizarClienteLogistica(){

		if(isset($_POST["editarFolio"])){
			if($_POST["editarFolio"] != ""){

				$tabla = "atencionaclientes";
				$tabla2 = "logistica";

				$datos = array("folio" => $_POST["editarFolio"],
								"serie" => $_POST["editarSerie"]);

				$respuestaC = ModeloAtencion::mdlActualizarClienteLogistica($tabla, $tabla2, $datos);
				 return $respuestaC;

			}

		}
		


	}
		/*=============================================
		ACTUALIZAR FECHA PEDIDO COMPRAS
		=============================================*/

		static public function ctrActualizarFechaPedido(){

			if(isset($_POST["editarFolio"])){
				if($_POST["editarFolio"] != ""){

					$tabla = "atencionaclientes";
					$tabla2 = "compras";

					$datos = array("folio" => $_POST["editarFolio"],
									"serie" => $_POST["editarSerie"]);

					$respuestaC = ModeloAtencion::mdlActualizarFechaPedido($tabla, $tabla2, $datos);
					 return $respuestaC;

				}

			}
		

	}
}