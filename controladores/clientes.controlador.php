<?php

class ControladorClientes{

	
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nombreCliente"])){

			if($_POST["nombreCliente"] != ""){

				$tabla = "clientes";

				$datos = array("codigoCliente"  => $_POST["codigoCliente"],
							   "rfc" => $_POST["rfc"],
							   "nombreCliente" => $_POST["nombreCliente"],
					           "agenteVentas" => $_POST["agenteVentas"],
					           "agenteCobro" => $_POST["agenteCobro"],
					           "limiteCredito" => $_POST["limiteCredito"],
					           "diasCredito" => $_POST["diasCredito"],
					           "segmento" => $_POST["segmento"],
					           "statusCliente" => $_POST["statusCliente"],
					           "modo" => "cliente");

				$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Cliente Agregado Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "clientes";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede agregar al cliente porque el nombre está vacío!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "clientes";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	REGISTRO BITACORA
	=============================================*/

	static public function ctrRegistroBitacora(){

		if (isset($_POST["codigoCliente"])) {

		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Inserción de Cliente',
							   "folio" => $_POST["codigoCliente"]);

		$respuesta = ModeloClientes::mdlRegistroBitacora($tabla, $datos);

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
							   "accion" => 'Descarga Reporte Clientes',
							   "folio" => 'Sin folio');

		$respuesta = ModeloClientes::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){

			
			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Importación de Lista de Clientes',
								   "folio" => 'Sin folio');

			$respuesta = ModeloClientes::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

	}

	

}