<?php

class ControladorProveedores{

	
	/*=============================================
	MOSTRAR Proveedores
	=============================================*/

	static public function ctrMostrarProveedores($item, $valor){

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	CREAR PROVEEDOR
	=============================================*/

	static public function ctrCrearProveedor(){

		if(isset($_POST["razonSocial"])){

			if($_POST["razonSocial"] != ""){

				$tabla = "proveedores";

				$datos = array("codigoProveedor"  => $_POST["codigoProveedor"],
							   "rfc" => $_POST["rfc"],
							   "razonSocial" => $_POST["razonSocial"],
							   "fechaAlta" => $_POST["fechaAlta"],
					           "limiteCredito" => $_POST["limiteCredito"],
					           "diasCredito" => $_POST["diasCredito"],
					           "rfc2" => $_POST["rfc2"],
					           "curp" => $_POST["curp"]);

				$respuesta = ModeloProveedores::mdlCrearProveedor($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Proveedor Agregado Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "proveedores";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede agregar al Proveedor porque el nombre está vacío!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "proveedores";

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

		if (isset($_POST["codigoProveedor"])) {

		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Inserción de Proveedor',
							   "folio" => $_POST["codigoProveedor"]);

		$respuesta = ModeloProveedores::mdlRegistroBitacora($tabla, $datos);

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
							   "accion" => 'Descarga Reporte Proveedores',
							   "folio" => 'Sin folio');

		$respuesta = ModeloProveedores::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){

			
			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Importación de Lista de Proveedores',
								   "folio" => 'Sin folio');

			$respuesta = ModeloProveedores::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

	}

	

}