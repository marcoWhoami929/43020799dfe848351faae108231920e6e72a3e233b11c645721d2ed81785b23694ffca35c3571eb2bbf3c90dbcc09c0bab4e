<?php

class ControladorUsuarios{

	
	/*=============================================
	MOSTRAR YSUARIOS BANCOS
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "tbl_users";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}
	
	/*=============================================
	EDITAR PERFIL
	=============================================*/

	static public function ctrEditarPerfil(){

		if(isset($_POST["idPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "tbl_users";

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

										window.location = "usuarios";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("user_id" => $_POST["idPerfil"],
							   "profile_name" => $_POST["editarNombre"],
							   "email" => $_POST["editarEmail"],
							   "password" => $encriptar);

				$respuesta = ModeloUsuarios::mdlEditarPerfil($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El perfil ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "usuarios";

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

							window.location = "usuarios";

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

			$tabla ="tbl_users";
			$datos = $_GET["idPerfil"];
			$tabla2 = "bitacora";
			$datos2 = array("usuario" => $_SESSION['nombre'],
											   "perfil" => $_SESSION['perfil'],
											   "accion" => 'Eliminación de Usuario Bancos',
											   "folio" => $_GET["nombre"]);

			$respuesta = ModeloUsuarios::mdlEliminarPerfil($tabla, $datos);
			$respuesta2 = ModeloUsuarios::mdlRegistroBitacoraEliminar($tabla2, $datos2);

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

								window.location = "usuarios";

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

		$respuesta = ModeloUsuarios::mdlRegistroBitacoraReporte($tabla, $datos);

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

			$respuesta = ModeloUsuarios::mdlRegistroBitacoraAgregar($tabla, $datos);

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
								   "accion" => 'Edición de Usuario Bancos',
								   "folio" => $_POST["editarNombre"]);

			$respuesta = ModeloUsuarios::mdlRegistroBitacoraAgregar($tabla, $datos);

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