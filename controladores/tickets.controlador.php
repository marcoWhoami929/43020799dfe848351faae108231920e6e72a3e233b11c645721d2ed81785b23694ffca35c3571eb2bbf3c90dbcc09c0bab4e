<?php
error_reporting(E_ALL);
class ControladorTickets{

	static public function ctrVerListaTickets($item,$valor){

		$tabla = "ticket";

		$respuesta = ModeloTickets::mdlVerListaTickets($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrVerListaTicketsCreados($item,$valor){

		$tabla = "ticket";

		$respuesta = ModeloTickets::mdlVerListaTicketsCreados($tabla, $item, $valor);

		return $respuesta;


	}
	
	static public function ctrMostrarDetallesTicket($item,$valor){

		$tabla = "ticket";

		$respuesta = ModeloTickets::mdlMostrarDetallesTicket($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarDetallesTicket2($item,$valor){

		$tabla = "ticket";

		$respuesta = ModeloTickets::mdlMostrarDetallesTicket2($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarComentariosTicket($item,$valor){

		$tabla = "eventosticket";

		$respuesta = ModeloTickets::mdlMostrarComentariosTicket($tabla, $item, $valor);

		return $respuesta;


	}

	/*=============================================
	RESPONDER TICKET
	=============================================*/

	static public function ctrRespuestaTicket(){

		if(isset($_POST["respuestaTicket"])){

			if($_POST["respuestaTicket"] != ""){

			   
				$tabla = "eventosticket";
				$tabla2 = "logstickets";
				$tabla3 = "ticket";
				$tabla4 = "estatustickets";

				$datos = array("tipo"  => 'COMMENT',
							   "contenido" => $_POST['respuestaTicket'],
							   "idTicket"  => $_SESSION['idTicket'],
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);


				$datos2 = array("numeroTicket" => $_SESSION['numeroTicket'],
								"tipo"  => 'COMMENT',
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);

				$item = 'idTicket';
				$valor = $datos["idTicket"];
				$obtenerComentarios = ModeloTickets::mdlObtenerTotalComentarios($tabla,$item,$valor);

				$totalComentarios = $obtenerComentarios["totalComentarios"];

				$datos3 = array("idTicket" => $datos["idTicket"],
								"comentarios" => $totalComentarios);

				$respuesta = ModeloTickets::mdlRespuestaTicket($tabla, $datos);
				$respuesta2 = ModeloTickets::mdlRegistroLogs($tabla2, $datos2);
				$respuesta3 = ModeloTickets::mdlContarComentarios($tabla3, $datos3);
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Ticket Comentado Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = localStorage.rutaEdicionTicket;

						}

					});
				

					</script>';


				}else {


					echo '<script>

					swal({

						type: "error",
						title: "¡No se puede crear el comentario!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "generadorTickets";

						}

					});
				

				</script>';
				}


			}


		}


	}

	static public function ctrMostrarDepartamentos($item,$valor){

		$tabla = "departamento";

		$respuesta = ModeloTickets::mdlMostrarDepartamentos($tabla, $item, $valor);

		return $respuesta;


	}

	/*=============================================
	 CREAR TICKET
	=============================================*/

	static public function ctrCrearTicket(){

		if(isset($_POST["crearTitulo"])){

			if($_POST["crearTitulo"] != ""){

			   	$tabla = "ticket";
				$tabla2 = "logstickets";
				$tabla3 = "departamentotickets";
				$tabla4 = "estatustickets";
				$tabla5 = "eventosticket";
				$tabla6 = "archivostickets";
				$tabla7 = "notificacionestickets";


				$ultimoId = 0;
				$idInicial = 1;
				$consulta = ModeloTickets::mdlObtenerUltimoId();

				if ($consulta == 0) {
					
					$ultimoId = $idInicial;

				}else{

					$ultimoId = $consulta["ultimoId"];

					
				}


				$datos = array("numeroTicket" => $ultimoId,
								"seriePedido" => $_POST['seriePedido'],
								"folioPedido" => $_POST['folioPedido'],
								"serieFactura" => $_POST['serieFactura'],
								"folioFactura" => $_POST['folioFactura'],
								"titulo" => $_POST['crearTitulo'],
								"contenido" => $_POST['crearContenido'],
								"prioridad" => $_POST['crearPrioridad'],
								"idAutor" => $_SESSION['id'],
								"idDepartamento" => $_SESSION['departamento'],
								"departamentoAsignado" => $_POST["crearDepartamento"],
								"usuarioAsignado" => $_POST["crearDepartamentoUsuario"]);

				$numeroTicket = $datos["numeroTicket"];
				$datos2 = array("numeroTicket" => $numeroTicket,
								"tipo"  => 'CREATE TICKET',
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);

				$datos3 = array("numeroTicket" => $numeroTicket,
							   "idDepartamento" => $_POST["crearDepartamento"],
								"usuarioDepartamento" => $_POST["crearDepartamentoUsuario"]);

				$fecha = new DateTime();
				
				$datos4 = array("numeroTicket" => $numeroTicket,
								"idDepartamento" => $_POST["crearDepartamento"],
								"usuarioDepartamento" => $_POST["crearDepartamentoUsuario"],
								"clase" => "paused",
								"idAutor" => $_SESSION["id"],
								"idDepartamentoAutor" => $_SESSION["departamento"],
								"aprobado" => "0");

				$datos5 = array("idTicket" => $numeroTicket,
								"tipo"  => 'CREATE TICKET',
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);

				if ($_FILES['archivoPedido']['name'] != null) {

					$folioDocumento = "000".$datos4["numeroTicket"];

					$directorioDestinoPedido = 'tickets/pedidos/'.$datos4["numeroTicket"].'/';
					if (!file_exists($directorioDestinoPedido)) {
					    mkdir($directorioDestinoPedido, 0777, true);
					
					}else {

						echo 'No se puedo crear la carpeta';
					}
					
					$archivoPedido = $directorioDestinoPedido . ''.$folioDocumento.'.pdf';

					if(!is_writable($directorioDestinoPedido)){
							echo "no tiene permisos";
						}else{
							if(is_uploaded_file($_FILES['archivoPedido']['tmp_name'])){
								
								if (move_uploaded_file($_FILES['archivoPedido']['tmp_name'], $archivoPedido)) {
									
									
									$datos6 = array("numeroTicket" => $datos4["numeroTicket"],
													"idAutor" => $_SESSION["id"],
													"idDepartamentoAutor" => $_SESSION["departamento"],
													"rutaPedido" => $archivoPedido);
									$adjuntarPedido = ModeloTickets::mdlAdjuntarPedidoTickets($tabla6,$datos6);
								
								} else {
									echo "Error al subir el archivo";
							}
						}
				}

				}else{
					$folioDocumento = "000".$datos4["numeroTicket"];

					$directorioDestinoPedido = 'tickets/pedidos/'.$datos4["numeroTicket"].'/';
					if (!file_exists($directorioDestinoPedido)) {
					    mkdir($directorioDestinoPedido, 0777, true);
					
					}else {

						echo 'No se puedo crear la carpeta';
					}



					$datos6 = array("numeroTicket" => $datos4["numeroTicket"],
													"idAutor" => $_SESSION["id"],
													"idDepartamentoAutor" => $_SESSION["departamento"],
													"rutaPedido" => "");
					$adjuntarPedido = ModeloTickets::mdlAdjuntarPedidoTickets($tabla6,$datos6);

				}

				if ($_FILES['archivoFactura']['name'] != null) {

					$directorioDestinoFactura = 'tickets/facturas/'.$datos4["numeroTicket"].'/';
					if (!file_exists($directorioDestinoFactura)) {
					    mkdir($directorioDestinoFactura, 0777, true);
					
					}else {

						echo 'No se puedo crear la carpeta';
					}
					
					$archivoFactura = $directorioDestinoFactura . ''.$folioDocumento.'.pdf';

					if(!is_writable($directorioDestinoFactura)){
					echo "no tiene permisos";
					}else{
						if(is_uploaded_file($_FILES['archivoFactura']['tmp_name'])){
							
							if (move_uploaded_file($_FILES['archivoFactura']['tmp_name'], $archivoFactura)) {
								
								
								$datos6 = array("numeroTicket" => $datos4["numeroTicket"],
												"idAutor" => $_SESSION["id"],
												"idDepartamentoAutor" => $_SESSION["departamento"],
												"rutaFactura" => $archivoFactura);
								$adjuntarPedido = ModeloTickets::mdlAdjuntarFacturaTickets($tabla6,$datos6);
								
							} else {
								echo "Error al subir el archivo";
							}
						} else{
							echo "Error al subir el archivo: ";
							
						}
					}
	
				}else{

					$directorioDestinoFactura = 'tickets/facturas/'.$datos4["numeroTicket"].'/';
					if (!file_exists($directorioDestinoFactura)) {
					    mkdir($directorioDestinoFactura, 0777, true);
					
					}else {

						echo 'No se puedo crear la carpeta';
					}

					$datos6 = array("numeroTicket" => $datos4["numeroTicket"],
												"idAutor" => $_SESSION["id"],
												"idDepartamentoAutor" => $_SESSION["departamento"],
												"rutaFactura" => "");
					$adjuntarPedido = ModeloTickets::mdlAdjuntarFacturaTickets($tabla6,$datos6);

				}

				$datos6 = array("numeroTicket" => $numeroTicket,
								"idDepartamento" => $_SESSION["departamento"],
								"clase" => "visited",
								"idAutor" => $_SESSION["id"],
								"idDepartamentoAutor" => $_SESSION["departamento"],
								"aprobado" => "0");

				$autorComentario = $_SESSION["id"];
				$autorTicket = $datos4["usuarioDepartamento"];
				$folioTicket = $numeroTicket;
				$tituloNotificacion = "".$_SESSION["nombre"]." te ha asignado el ticket #000".$numeroTicket."";
				$datosTicket = array("titulo" => $tituloNotificacion,
						"folioTicket" => $folioTicket,
						"autorTicket" => $autorTicket,
						"autorComentario" => $autorComentario);

				$respuesta = ModeloTickets::mdlCrearTicket($tabla, $datos);
				$respuesta2 = ModeloTickets::mdlRegistroLogs($tabla2, $datos2);
				$respuesta3 = ModeloTickets::mdlRegistroDepartamento($tabla3, $datos3);
				$respuesta4 = ModeloTickets::mdlRegistroTicket($datos6);
				$respuesta5 = ModeloTickets::mdlRegistroLogsEvento($tabla5, $datos5);
				$respuesta6 = ModeloTickets::mdlReasignarDepartamento($tabla4, $datos4);
				$respuesta7 = ModeloTickets::mdlGuardarNotificacionTicket($tabla7, $datosTicket);
				
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Ticket Creado Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "generadorTickets";

						}

					});
				

					</script>';


				}else {


					echo '<script>

					swal({

						type: "error",
						title: "¡No se puede crear el ticket!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "generadorTickets";

						}

					});
				

				</script>';
				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede crear el ticket!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "generadorTickets";

						}

					});
				

				</script>';

			}


		}


	}
	/*=============================================
	 CREAR TICKET DESDE CANCELACION DE FACTURA
	=============================================*/

	static public function ctrCrearTicketSolicitud(){

		if(isset($_POST["crearTituloT"])){

			if($_POST["crearTituloT"] != ""){

			   	$tabla = "ticket";
				$tabla2 = "logstickets";
				$tabla3 = "departamentotickets";
				$tabla4 = "estatustickets";
				$tabla5 = "eventosticket";
				$tabla6 = "archivostickets";
				$tabla7 = "notificacionestickets";


				$ultimoId = 0;
				$idInicial = 1;
				$consulta = ModeloTickets::mdlObtenerUltimoId();

				if ($consulta == 0) {
					
					$ultimoId = $idInicial;

				}else{

					$ultimoId = $consulta["ultimoId"];

					
				}


				$datos = array("numeroTicket" => $ultimoId,
								"seriePedido" => $_POST['seriePedidoT'],
								"folioPedido" => $_POST['folioPedidoT'],
								"serieFactura" => $_POST['serieFacturaT'],
								"folioFactura" => $_POST['folioFacturaT'],
								"titulo" => $_POST['crearTituloT'],
								"contenido" => $_POST['crearContenidoT'],
								"prioridad" => $_POST['crearPrioridadT'],
								"idAutor" => $_SESSION['id'],
								"idDepartamento" => $_SESSION['departamento'],
								"departamentoAsignado" => $_POST["crearDepartamentoT"],
								"usuarioAsignado" => $_POST["crearDepartamentoUsuarioT"]);

				$numeroTicket = $datos["numeroTicket"];
				$datos2 = array("numeroTicket" => $numeroTicket,
								"tipo"  => 'CREATE TICKET',
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);

				$datos3 = array("numeroTicket" => $numeroTicket,
							   "idDepartamento" => $_POST["crearDepartamentoT"],
								"usuarioDepartamento" => $_POST["crearDepartamentoUsuarioT"]);

				$fecha = new DateTime();
				
				$datos4 = array("numeroTicket" => $numeroTicket,
								"idDepartamento" => $_POST["crearDepartamentoT"],
								"usuarioDepartamento" => $_POST["crearDepartamentoUsuarioT"],
								"clase" => "paused",
								"idAutor" => $_SESSION["id"],
								"idDepartamentoAutor" => $_SESSION["departamento"],
								"aprobado" => "0");

				$datos5 = array("idTicket" => $numeroTicket,
								"tipo"  => 'CREATE TICKET',
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);

				if ($_FILES['archivoPedidoT']['name'] != null) {

					$folioDocumento = "000".$datos4["numeroTicket"];

					$directorioDestinoPedido = 'tickets/pedidos/'.$datos4["numeroTicket"].'/';
					if (!file_exists($directorioDestinoPedido)) {
					    mkdir($directorioDestinoPedido, 0777, true);
					
					}else {

						echo 'No se puedo crear la carpeta';
					}
					
					$archivoPedido = $directorioDestinoPedido . ''.$folioDocumento.'.pdf';

					if(!is_writable($directorioDestinoPedido)){
							echo "no tiene permisos";
						}else{
							if(is_uploaded_file($_FILES['archivoPedidoT']['tmp_name'])){
								
								if (move_uploaded_file($_FILES['archivoPedidoT']['tmp_name'], $archivoPedido)) {
									
									
									$datos6 = array("numeroTicket" => $datos4["numeroTicket"],
													"idAutor" => $_SESSION["id"],
													"idDepartamentoAutor" => $_SESSION["departamento"],
													"rutaPedido" => $archivoPedido);
									$adjuntarPedido = ModeloTickets::mdlAdjuntarPedidoTickets($tabla6,$datos6);
								
								} else {
									echo "Error al subir el archivo";
							}
						}
				}

				}else{
					$folioDocumento = "000".$datos4["numeroTicket"];

					$directorioDestinoPedido = 'tickets/pedidos/'.$datos4["numeroTicket"].'/';
					if (!file_exists($directorioDestinoPedido)) {
					    mkdir($directorioDestinoPedido, 0777, true);
					
					}else {

						echo 'No se puedo crear la carpeta';
					}

					$datos6 = array("numeroTicket" => $datos4["numeroTicket"],
													"idAutor" => $_SESSION["id"],
													"idDepartamentoAutor" => $_SESSION["departamento"],
													"rutaPedido" => "");
					$adjuntarPedido = ModeloTickets::mdlAdjuntarPedidoTickets($tabla6,$datos6);

				}

				if ($_FILES['archivoFacturaT']['name'] != null) {

					$directorioDestinoFactura = 'tickets/facturas/'.$datos4["numeroTicket"].'/';
					if (!file_exists($directorioDestinoFactura)) {
					    mkdir($directorioDestinoFactura, 0777, true);
					
					}else {

						echo 'No se puedo crear la carpeta';
					}
					
					$archivoFactura = $directorioDestinoFactura . ''.$folioDocumento.'.pdf';

					if(!is_writable($directorioDestinoFactura)){
					echo "no tiene permisos";
					}else{
						if(is_uploaded_file($_FILES['archivoFacturaT']['tmp_name'])){
							
							if (move_uploaded_file($_FILES['archivoFacturaT']['tmp_name'], $archivoFactura)) {
								
								
								$datos6 = array("numeroTicket" => $datos4["numeroTicket"],
												"idAutor" => $_SESSION["id"],
												"idDepartamentoAutor" => $_SESSION["departamento"],
												"rutaFactura" => $archivoFactura);
								$adjuntarPedido = ModeloTickets::mdlAdjuntarFacturaTickets($tabla6,$datos6);
								
							} else {
								echo "Error al subir el archivo";
							}
						} else{
							echo "Error al subir el archivo: ";
							
						}
					}
	
				}else{

					$directorioDestinoFactura = 'tickets/facturas/'.$datos4["numeroTicket"].'/';
					if (!file_exists($directorioDestinoFactura)) {
					    mkdir($directorioDestinoFactura, 0777, true);
					
					}else {

						echo 'No se puedo crear la carpeta';
					}

					$datos6 = array("numeroTicket" => $datos4["numeroTicket"],
												"idAutor" => $_SESSION["id"],
												"idDepartamentoAutor" => $_SESSION["departamento"],
												"rutaFactura" => "");
					$adjuntarPedido = ModeloTickets::mdlAdjuntarFacturaTickets($tabla6,$datos6);

				}

				$datos6 = array("numeroTicket" => $numeroTicket,
								"idDepartamento" => $_SESSION["departamento"],
								"clase" => "visited",
								"idAutor" => $_SESSION["id"],
								"idDepartamentoAutor" => $_SESSION["departamento"],
								"aprobado" => "0");

				$autorComentario = $_SESSION["id"];
				$autorTicket = $datos4["usuarioDepartamento"];
				$folioTicket = $numeroTicket;
				$tituloNotificacion = "".$_SESSION["nombre"]." te ha asignado el ticket #000".$numeroTicket."";
				$datosTicket = array("titulo" => $tituloNotificacion,
						"folioTicket" => $folioTicket,
						"autorTicket" => $autorTicket,
						"autorComentario" => $autorComentario);


				$datosSolicitud = array("idFacturaSolicitud" => $_POST["idFacturaSolicitud"],
										"numeroTicket" => $datos["numeroTicket"],
										"motivoCancelacion" => $_POST["crearContenidoT"]);

				$respuesta = ModeloTickets::mdlCrearTicket($tabla, $datos);
				$respuesta2 = ModeloTickets::mdlRegistroLogs($tabla2, $datos2);
				$respuesta3 = ModeloTickets::mdlRegistroDepartamento($tabla3, $datos3);
				$respuesta4 = ModeloTickets::mdlRegistroTicket($datos6);
				$respuesta5 = ModeloTickets::mdlRegistroLogsEvento($tabla5, $datos5);
				$respuesta6 = ModeloTickets::mdlReasignarDepartamento($tabla4, $datos4);
				$respuesta7 = ModeloTickets::mdlGuardarNotificacionTicket($tabla7, $datosTicket);
				$respuesta8 = ModeloTickets::mdlActualizarSolicitudTicket($datosSolicitud);
				
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Ticket Creado Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "facturasTiendas";

						}

					});
				

					</script>';


				}else {


					echo '<script>

					swal({

						type: "error",
						title: "¡No se puede crear el ticket!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "facturasTiendas";

						}

					});
				

				</script>';
				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede crear el ticket!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "facturasTiendas";

						}

					});
				

				</script>';

			}


		}


	}
	/*=============================================
	CERRAR TICKET
	=============================================*/

	static public function ctrCerrarTicket(){

		$url = $_SERVER['REQUEST_URI'];
        $longitud = strlen($url);
        
          

		  if ($longitud == 56) {
            
             $idNumeroTicket = substr($url, -1, 4);
            
            
          }else if ($longitud == 59) {
            
             $idNumeroTicket = substr($url, -2, 4);


          }else if ($longitud == 62) {
            
             $idNumeroTicket = substr($url, -3, 4);
              //echo $rest;
            
          }else if ($longitud < 56) {

          	$idNumeroTicket = "";
          }

		if($idNumeroTicket != ""){

			$tabla = "eventosticket";
			$tabla2 = "logstickets";
			$tabla3 = "ticket";
			$tabla4 = "estatustickets";

			$datos = array("tipo"  => 'CLOSE',
							   "contenido" => "",
							   "idTicket"  => $_SESSION['idTicket'],
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);


			$datos2 = array("numeroTicket" => $_SESSION['idTicket'],
								"tipo"  => 'CLOSE',
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);

			$item = 'idTicket';
			$valor = $datos["idTicket"];
			$obtenerComentarios = ModeloTickets::mdlObtenerTotalComentarios($tabla,$item,$valor);

			$totalComentarios = $obtenerComentarios["totalComentarios"];

			$datos3 = array("idNumeroTicket" => $idNumeroTicket);

			
			$datos6 = array("numeroTicket" => $datos2["numeroTicket"],
								"usuarioDepartamento" => $_SESSION["id"],
								"clase" => "actives",
								"aprobado" => "1");

			$respuesta = ModeloTickets::mdlRespuestaTicket($tabla, $datos);
			$respuesta2 = ModeloTickets::mdlRegistroLogs($tabla2, $datos2);
			$respuesta3 = ModeloTickets::mdlCerrarTicket($tabla3, $datos3);
			$respuesta6 = ModeloTickets::mdlAprobarTicket($tabla4, $datos6);
			$respuesta7 = ModeloTickets::mdlActualizarTiempoProceso($tabla4, $datos6);

			$item = 'numeroTicket';
			$valor = $datos["idTicket"];
			$obtenerTotalDepartamentos = ModeloTickets::mdlObtenerTotalDepartamentos($tabla4,$item,$valor);

			$totalSegundos = $obtenerTotalDepartamentos["totalDepartamentos"];

			$datos4 = array("numeroTicket" => $datos["idTicket"],
							"tiempoFinal" => $totalSegundos,
							"cerrado" => "1");

			$item = "id";
			$idEstatusTicket = $_POST["idTicketElegido"];
			$valor = $idEstatusTicket;

			$respuesta4 = ModeloTickets::mdlCerrarEstatus($tabla4, $datos4);
			$respuesta5 = ModeloTickets::mdlActualizarVistoAprobado($item,$valor);

			$item = "idSolicitud";
			$valor = $datos2["numeroTicket"];
			$respuesta6 = ModeloFacturasTiendas::mdlVerificarCancelacionSolicitud($item,$valor);

			if($respuesta6["idFacturaCancelacion"] != ""){

			$idFacturaCancelacion = $respuesta6["idFacturaCancelacion"];
			$item = "id";
			$valor = $idFacturaCancelacion;

			$fechaActual = date("Y-m-d"); 

			$datosCancelacion = array("fechaCancelacion" => $fechaActual,
									  "estatus" => "Cancelada",
									  "cancelado" => "1");
			$respuesta7 = ModeloFacturasTiendas::mdlGenerarCancelacionFactura($item,$valor,$datosCancelacion);

			}else{



			}
			

			if($respuesta3 == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El ticket ha sido cerrado",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = localStorage.rutaEdicionTicket;

								}
							})

				</script>';

			}		

		}

	}
	
	static public function ctrVerEstatusTickets($item,$valor){

		$tabla = "estatustickets";

		$respuesta = ModeloTickets::mdlVerEstatusTickets($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrVerEstatusTicketsG($item,$valor){

		$tabla = "estatustickets";

		$respuesta = ModeloTickets::mdlVerEstatusTicketsG($tabla, $item, $valor);

		return $respuesta;


	}

	/*=============================================
	APROBAR TICKET
	=============================================*/

	static public function ctrAprobarTicket(){

		if(isset($_POST["reasignarDepartamento"])){

			if($_POST["reasignarDepartamento"] != ""){

			   
				$tabla = "eventosticket";
				$tabla2 = "logstickets";
				$tabla3 = "ticket";
				$tabla4 = "estatustickets";
				$tabla5 = "departamentotickets";
				$tabla7 = "notificacionestickets";
				

				$datos = array("tipo"  => 'APROBED',
							   "contenido" => "",
							   "idTicket"  => $_SESSION['idTicket'],
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);


				$datos2 = array("numeroTicket" => $_SESSION['numeroTicket'],
								"tipo"  => 'APROBED',
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);

			

				$datos4 = array("numeroTicket" => $datos2["numeroTicket"],
								"idDepartamento" => $_POST["reasignarDepartamento"],
								"usuarioDepartamento" => $_POST["reasignarDepartamentoUsuario"],
								"idAutor" => $_SESSION["id"],
								"idDepartamentoAutor" => $_SESSION["departamento"],
								"clase" => "paused",
								"aprobado" => "0");

				$datos5 = array("numeroTicket" => $datos2["numeroTicket"],
								"idDepartamento" => $_POST["reasignarDepartamento"],
								"usuarioDepartamento" => $_POST["reasignarDepartamentoUsuario"]);

				$datos6 = array("numeroTicket" => $datos2["numeroTicket"],
								"usuarioDepartamento" => $_SESSION["id"],
								"clase" => "visited",
								"aprobado" => "1");
				$autorComentario = $_SESSION["id"];
				$autorTicket = $datos4["usuarioDepartamento"];
				$folioTicket = $datos4["numeroTicket"];
				$tituloNotificacion = "".$_SESSION["nombre"]." te ha asignado el ticket #000".$folioTicket."";
				$datosTicket = array("titulo" => $tituloNotificacion,
						"folioTicket" => $folioTicket,
						"autorTicket" => $autorTicket,
						"autorComentario" => $autorComentario);

				$item = "id";
				$idEstatusTicket = $_POST["idTicketElegido"];
				$valor = $idEstatusTicket;

				$respuesta = ModeloTickets::mdlRespuestaTicket($tabla, $datos);
				//var_dump($respuesta);
				$respuesta2 = ModeloTickets::mdlRegistroLogs($tabla2, $datos2);
				//var_dump($respuesta2);
				$respuesta4 = ModeloTickets::mdlReasignarDepartamento($tabla4, $datos4);
				//var_dump($respuesta4);
				$respuesta5 = ModeloTickets::mdlRegistroDepartamento2($tabla5, $datos5);
				//var_dump($respuesta5);
				$respuesta6 = ModeloTickets::mdlAprobarTicket($tabla4, $datos6);
				//var_dump($respuesta6);
				$respuesta7 = ModeloTickets::mdlActualizarTiempoProceso($tabla4, $datos6);
				//var_dump($respuesta7);
				$respuesta8 = ModeloTickets::mdlGuardarNotificacionTicket($tabla7, $datosTicket);
				$respuesta9 = ModeloTickets::mdlActualizarVistoAprobado($item,$valor);

				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Ticket Aprobado Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = localStorage.rutaEdicionTicket;

						}

					});
				

					</script>';


				}else {


					echo '<script>

					swal({

						type: "error",
						title: "¡No se puede aprobar el ticket!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "generadorTickets";

						}

					});
				

				</script>';
				}


			}else{

				$tabla = "eventosticket";
				$tabla2 = "logstickets";
				$tabla3 = "ticket";
				$tabla4 = "estatustickets";
				

				$datos = array("tipo"  => 'APROBED',
							   "contenido" => "",
							   "idTicket"  => $_SESSION['idTicket'],
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);


				$datos2 = array("numeroTicket" => $_SESSION['numeroTicket'],
								"tipo"  => 'APROBED',
							   "idAutorDepartamento" => $_SESSION['departamento'],
							   "idAutorUser" => $_SESSION['id']);

				

				$datos6 = array("numeroTicket" => $datos2["numeroTicket"],
								"usuarioDepartamento" => $_SESSION["id"],
								"clase" => "visited",
								"aprobado" => "1");

				$respuesta = ModeloTickets::mdlRespuestaTicket($tabla, $datos);
				$respuesta2 = ModeloTickets::mdlRegistroLogs($tabla2, $datos2);
				$respuesta4 = ModeloTickets::mdlAprobarTicket($tabla4, $datos6);
				$respuesta5 = ModeloTickets::mdlActualizarTiempoProceso($tabla4, $datos6);

				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Ticket Aprobado Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = localStorage.rutaEdicionTicket;

						}

					});
				

					</script>';


				}else {


					echo '<script>

					swal({

						type: "error",
						title: "¡No se puede aprobar el ticket!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "generadorTickets";

						}

					});
				

				</script>';
				}



			}


		}


	}
	/*INICIAN LOS CONTROLADORES PARA INDICADORES */
	static public function ctrMostrarTotalTickets($item,$valor){

		$tabla = "ticket";

		$respuesta = ModeloTickets::mdlMostrarTotalTickets($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarTotalMisTickets($item,$valor){

		$tabla = "estatustickets";

		$respuesta = ModeloTickets::mdlMostrarTotalMisTickets($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarTicketsCerrados($item,$valor){

		$tabla = "ticket";

		$respuesta = ModeloTickets::mdlMostrarTicketsCerrados($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarTicketsAbiertos($item,$valor){

		$tabla = "ticket";

		$respuesta = ModeloTickets::mdlMostrarTicketsAbiertos($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarTotalDepartamentos($item,$valor){

		$tabla = "departamento";

		$respuesta = ModeloTickets::mdlMostrarTotalDepartamentos($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarTotalUsuarios($item,$valor){

		$tabla = "administradores";

		$respuesta = ModeloTickets::mdlMostrarTotalUsuarios($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarTicketsPorDpto($item,$valor){

		$tabla = "departamentotickets";

		$respuesta = ModeloTickets::mdlMostrarTicketsPorDpto($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarMisActividades($item,$valor){

		$tabla = "eventosticket";

		$respuesta = ModeloTickets::mdlMostrarMisActividades($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarUltimasConexiones($item,$valor){

		$tabla = "logstickets";

		$respuesta = ModeloTickets::mdlMostrarUltimasConexiones($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarListaDepartamentos($item,$valor){

		$tabla = "departamento";

		$respuesta = ModeloTickets::mdlMostrarListaDepartamentos($tabla, $item, $valor);

		return $respuesta;


	}
	static public function ctrMostrarTicketsPendientesPorDepartamento($item,$valor){

		$tabla = "estatustickets";

		$respuesta = ModeloTickets::mdlMostrarTicketsPendientesPorDepartamento($tabla, $item, $valor);

		return $respuesta;


	}
	




}


?>