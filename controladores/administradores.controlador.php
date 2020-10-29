<?php

class ControladorAdministradores{

	/*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

	public function ctrIngresoAdministrador(){

		if(isset($_POST["optRadio"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
			   
			   $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						
				$tabla = "administradores";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

				if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar && $_POST["optRadio"] == 0){

					if($respuesta["estado"] == 1 and $respuesta["perfil"] != "Tiendas"){

						$_SESSION["validarSesionBackend"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["grupo"] = $respuesta["grupo"]; 
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["departamento"] = $respuesta["departamento"];

						$tabla = "bitacora";

						$datos = array("usuario" => $_SESSION['nombre'],
											   "perfil" => $_SESSION['perfil'],
											   "accion" => 'Acceso al Sistema',
											   "folio" => 'Sin folio');

						$respuesta = ModeloAdministradores::mdlRegistroBitacora($tabla, $datos);

						$tabla2 = "logstickets";

						$datos2 = array("tipo" => 'LOGIN',
											   "numeroTicket" => '',
											   "idAutorDepartamento" => $_SESSION['departamento'],
											   "idAutorUser" => $_SESSION['id']);

						$respuesta = ModeloTickets::mdlRegistroLogs($tabla2, $datos2);

						echo '<script>

							window.location = "inicio";

						</script>';

					}else if($respuesta["estado"] == 1 and $respuesta["perfil"] == "Tiendas"){

						$_SESSION["validarSesionBackend"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["grupo"] = $respuesta["grupo"]; 
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["departamento"] = $respuesta["departamento"];

						$tabla = "bitacora";

						$datos = array("usuario" => $_SESSION['nombre'],
											   "perfil" => $_SESSION['perfil'],
											   "accion" => 'Acceso al Sistema',
											   "folio" => 'Sin folio');

						$respuesta = ModeloAdministradores::mdlRegistroBitacora($tabla, $datos);

						echo '<script>

							window.location = "controlMuestras";

						</script>';

					}
					else{

						echo '<script>

					swal({

						type: "error",
						title: "¡Este usuario aún no está activado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "ingreso";

						}

					});
				

				</script>';	

					}

				}else if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar && $_POST["optRadio"] == 1){

					if($respuesta["estado"] == 1 && $respuesta["cotizador"] == 1){

						$_SESSION["validarSesionBackend"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["grupo"] = $respuesta["grupo"]; 
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["cotizador"] = $respuesta["cotizador"];
						$_SESSION["departamento"] = $respuesta["departamento"];

						$tabla = "bitacora";

						$datos = array("usuario" => $_SESSION['nombre'],
											   "perfil" => $_SESSION['perfil'],
											   "accion" => 'Acceso al Sistema',
											   "folio" => 'Sin folio');

						$respuesta = ModeloAdministradores::mdlRegistroBitacora($tabla, $datos);

						echo '<script>

							window.location = "cotizador";

						</script>';

					}else if($respuesta["estado"] == 1 && $respuesta["cotizador"] == 0){ 

						echo '<script>

							swal({

								type: "error",
								title: "¡No tiene los privilegios para realizar esta acción!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "ingreso";

								}

							});
						

						</script>';	

					}else{

						echo '<script>

					swal({

						type: "error",
						title: "¡Este usuario aún no está activado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "ingreso";

						}

					});
				

				</script>';	

					}

				}else{

					echo '<script>

					swal({

						type: "error",
						title: "¡Datos de acceso incorrectos, vuelve a intentarlo...!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "ingreso";

						}

					});
				

				</script>';

				}


			}

		}

	}

	/*=============================================
	MOSTRAR ADMINISTRADORES
	=============================================*/

	static public function ctrMostrarAdministradores($item, $valor){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::MdlMostrarAdministradores($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR TOTAL USUARIOS
	=============================================*/

	static public function ctrMostrarTotalUsuarios(){
		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarTotalUsuarios($tabla);

		return $respuesta;
	}
	/*=============================================
	REGISTRO DE PERFIL
	=============================================*/

	static public function ctrCrearPerfil(){

		if(isset($_POST["nuevoPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/perfiles/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/perfiles/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "administradores";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("nombre" => $_POST["nuevoNombre"],
					           "email" => $_POST["nuevoEmail"],
					           "password" => $encriptar,
					           "grupo" => $_POST["nuevoGrupo"],
					           "perfil" => $_POST["nuevoPerfil"],			       
					           "foto"=>$ruta,
					           "estado" => 1);

				$respuesta = ModeloAdministradores::mdlIngresarPerfil($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El perfil ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfiles";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El perfil no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfiles";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	EDITAR PERFIL
	=============================================*/

	static public function ctrEditarPerfil(){

		if(isset($_POST["idPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/perfiles/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/perfiles/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "administradores";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "perfiles";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("id" => $_POST["idPerfil"],
							   "nombre" => $_POST["editarNombre"],
							   "email" => $_POST["editarEmail"],
							   "password" => $encriptar,
							   "grupo" => $_POST["editarGrupo"],
							   "perfil" => $_POST["editarPerfil"],
							   "foto" => $ruta);

				$respuesta = ModeloAdministradores::mdlEditarPerfil($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El perfil ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "perfiles";

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

							window.location = "perfiles";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	ELIMINAR PERFIL
	=============================================*/

	static public function ctrEliminarPerfil(){

		if(isset($_GET["idPerfil"])){

			$tabla ="administradores";
			$datos = $_GET["idPerfil"];

			if($_GET["fotoPerfil"] != ""){

				unlink($_GET["fotoPerfil"]);
			
			}
			$tabla2 = "bitacora";
			$datos2 = array("usuario" => $_SESSION['nombre'],
											   "perfil" => $_SESSION['perfil'],
											   "accion" => 'Eliminación de Usuario',
											   "folio" => $_GET["nombre"]);

			$respuesta = ModeloAdministradores::mdlEliminarPerfil($tabla, $datos);
			$respuesta2 = ModeloAdministradores::mdlRegistroBitacoraEliminar($tabla2, $datos2);

			if($respuesta == "ok" && $respuesta2 == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El perfil ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "perfiles";

								}
							})

				</script>';

			}		

		}

	}
	/*=============================================
	REGISTRO BITACORA REPORTE
	=============================================*/

	static public function ctrRegistroBitacoraReporte(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Descarga Reporte Usuarios',
							   "folio" => 'Sin folio');

		$respuesta = ModeloAdministradores::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){

		if (isset($_POST["nuevoNombre"])) {
			
			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Alta de Nuevo Usuario',
								   "folio" => $_POST["nuevoNombre"]);

			$respuesta = ModeloAdministradores::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

		}
		
		
		
	}
	/*=============================================
	REGISTRO BITACORA  EDICION
	=============================================*/

	static public function ctrRegistroBitacoraEdicion(){

		if (isset($_POST["editarNombre"])) {
			
			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Edición de Usuario',
								   "folio" => $_POST["editarNombre"]);

			$respuesta = ModeloAdministradores::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

		}
		
		
		
	}
	/*=============================================
	REGISTRO BITACORA ACTIVAR
	=============================================*/

	static public function ctrRegistroBitacoraActivar(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Usuario Activado',
							   "folio" => 'Sin folio');

		$respuesta = ModeloAdministradores::mdlRegistroBitacoraActivar($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA DESACTIVAR
	=============================================*/

	static public function ctrRegistroBitacoraDesactivar(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Usuario Desactivado',
							   "folio" => 'Sin folio');

		$respuesta = ModeloAdministradores::mdlRegistroBitacoraDesactivar($tabla, $datos);

		return $respuesta;
		
		
	}

}