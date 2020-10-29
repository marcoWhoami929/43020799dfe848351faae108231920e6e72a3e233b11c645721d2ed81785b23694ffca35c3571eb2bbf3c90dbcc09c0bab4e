<?php

class ControladorBanco0840{

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
	MOSTRAR BANCO
	=============================================*/

	static public function ctrMostrarBanco($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMostrarBanco($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SALDO INICIAL
	=============================================*/

	static public function ctrMostrarSaldo($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMostrarSaldo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	EGRESOS SUBGRUPOS
	=============================================*/
	static public function ctrAcreedoresBancarios($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAcreedoresBancarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAcreedoresBancariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAcreedoresBancariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAcreedoresBancariosA($tabla, $item, $valor);

		return $respuesta;

	}
	/***********************************************/
	static public function ctrPrestamosBancarios($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrestamosBancarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrestamosBancariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrestamosBancariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrestamosBancariosA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditable($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlIVAAcreditable($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlIVAAcreditableF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlIVAAcreditableM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlIVAAcreditableA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAdquisiciondeActivos4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones5($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones5F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones5M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosConRetenciones5A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados5($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados5F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados5M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados5A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados6($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados6F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados6M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados6A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados7($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados7F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados7M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados7A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados8($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados8F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados8M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados8A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados9($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados9F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados9M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados9A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados10($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados10F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados10M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados10A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados11($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados11F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados11M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados11A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados12($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados12F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados12M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados12A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados13($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados13F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados13M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados13A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados14($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados14F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados14M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados14A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados15($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados15F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados15M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados15A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados16($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados16F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados16M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados16A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados17($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados17F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados17M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados17A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados18($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados18F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados18M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados18A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados19($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados19F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados19M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados19A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados20($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados20F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados20M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados20A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados21($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados21F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados21M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados21A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados22($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados22F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados22M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados22A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados23($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados23F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados23M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados23A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados24($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados24F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados24M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados24A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados25($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados25F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados25M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados25A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados26($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados26F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados26M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados26A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados27($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados27F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados27M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados27A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados28($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados28F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados28M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados28A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados29($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados29F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados29M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados29A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados30($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados30F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados30M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados30A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados31($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados31F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados31M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados31A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados32($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados32F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados32M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados32A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados33($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados33F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados33M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados33A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados34($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados34F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados34M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados34A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados35($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados35F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados35M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosGravados35A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativosExentos3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosImpuestosLocales4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosFinancieros3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2F($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2M($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2A($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlGastosOperativos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalarios($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSueldosySalarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSueldosySalariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSueldosySalariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSueldosySalariosA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSAT($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlImpuestosFederalesSAT($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlImpuestosFederalesSATF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlImpuestosFederalesSATM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlImpuestosFederalesSATA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlImpuestosFederalesSUA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlImpuestosFederalesSUAF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlImpuestosFederalesSUAM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlImpuestosFederalesSUAA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldo($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAguinaldo($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAguinaldoF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAguinaldoM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlAguinaldoA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensa($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlDespensa($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlDespensaF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlDespensaM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlDespensaA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacaciones($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlVacaciones($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlVacacionesF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlVacacionesM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlVacacionesA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacional($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrimaVacacional($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrimaVacacionalF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrimaVacacionalM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrimaVacacionalA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedad($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrimaAntiguedad($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrimaAntiguedadF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrimaAntiguedadM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPrimaAntiguedadA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDia($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSeptimoDia($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSeptimoDiaF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSeptimoDiaM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSeptimoDiaA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacion($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSeparacion($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSeparacionF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSeparacionM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSeparacionA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacion($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlIndemnizacion($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlIndemnizacionF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlIndemnizacionM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlIndemnizacionA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleo($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSubsidioEmpleo($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSubsidioEmpleoF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSubsidioEmpleoM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlSubsidioEmpleoA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTU($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPTU($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPTUF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPTUM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlPTUA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMGA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGAF($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMGAF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGAM($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMGAM($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMGAA($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMGAA($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	EGRESOS SUBGRUPOS
	=============================================*/
	/*=============================================
	MOSTRAR BANCO CREDITO
	=============================================*/

	static public function ctrMostrarBancoCredito($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMostrarBancoCredito($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR ULTIMO SALDO
	=============================================*/

	static public function ctrMostrarUltimoSaldo($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMostrarUltimoSaldo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PARCIALES
	=============================================*/

	static public function ctrMostrarParciales($item, $valor){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlMostrarParciales($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESAR DATOS
	=============================================*/

	static public function ctrAgregarDatos0840(){

		if(isset($_POST["departamento"])){

			if(isset($_POST["departamento"])){

				$tabla = "banco0840";

				$datos = array("departamento" => $_POST["departamento"],
					           "grupo" => $_POST["grupo"],
					           "subgrupo" => $_POST["subgrupo"],
					           "mes" => $_POST["mes"],
					           "fecha" => $_POST["fecha"],
					           "descripcion" => $_POST["descripcion"],
					           "cargo" => $_POST["cargo"],
					           "abono" => $_POST["abono"],
					           "saldo" => $_POST["saldo"],
					           "parciales" => $_POST["parciales"],
					           "parcial" => $_POST["parcial"],
					           "departamentoParcial1" => $_POST["departamentoParcial1"],
					           "parcial2" => $_POST["parcial2"],
					           "departamentoParcial2" => $_POST["departamentoParcial2"],
					           "parcial3" => $_POST["parcial3"],
					           "departamentoParcial3" => $_POST["departamentoParcial3"],
					           "parcial4" => $_POST["parcial4"],
					           "departamentoParcial4" => $_POST["departamentoParcial4"],
					           "parcial5" => $_POST["parcial5"],
					           "departamentoParcial5" => $_POST["departamentoParcial5"],
					           "parcial6" => $_POST["parcial6"],
					           "departamentoParcial6" => $_POST["departamentoParcial6"],
					           "parcial7" => $_POST["parcial7"],
					           "departamentoParcial7" => $_POST["departamentoParcial7"],
					           "serie" => $_POST["serie"],
					           "acreedor" => $_POST["acreedor"],
					           "concepto" => $_POST["concepto"],
					           "numeroDocumento" => $_POST["numeroDocumento"],
					           "tieneIva" => $_POST["tieneIva"],
					           "tieneRetenciones" => $_POST["tieneRetenciones"],
					           "tipoRetencion" => $_POST["tipoRetencion"],
					       	   "ultimoSaldo" => $_POST["ultimoSaldo"]); 

				$respuesta = ModeloBanco0840::mdlAgregarDatos0840($tabla, $datos);
				
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Los datos han sido ingresados correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "banco0840";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar la inserción de los datos",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "banco0840";

						}

					});
				

				</script>';

			}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡No se puede realizar la inserción de los datos",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "banco0840";

						}

					});
				

				</script>';

			}




		}


	}
	/*=============================================
	CALCULAR IVA
	=============================================*/

	static public function ctrCalcularIva(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIva($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR IVA IMPORTACION
	=============================================*/

	static public function ctrCalcularIvaImportacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIvaImportacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR DIFERENCIA
	=============================================*/

	static public function ctrCalcularDiferencia(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularDiferencia($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR DIFERENCIA IMPORTACION
	=============================================*/

	static public function ctrCalcularDiferenciaImportacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularDiferenciaImportacion($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR FOLIO
	=============================================*/

	static public function ctrCalcularFolio(){

		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularFolio($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR FOLIO IMPORTACION
	=============================================*/

	static public function ctrCalcularFolioImportacion(){
		
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularFolioImportacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR IMPORTE
	=============================================*/

	static public function ctrCalcularImporte(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularImporte($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR IMPORTE IMPORTACION
	=============================================*/

	static public function ctrCalcularImporteImportacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularImporteImportacion($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR IMPORTE PARCIALES
	=============================================*/

	static public function ctrCalcularImporteParciales(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularImporteParciales($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR COMPROBACION
	=============================================*/

	static public function ctrCalcularComprobacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularComprobacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR COMPROBACION IMPORTACION
	=============================================*/

	static public function ctrCalcularComprobacionImportacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularComprobacionImportacion($tabla);

		return $respuesta;
	}
	/*=============================================
	REGISTRO BITACORA
	=============================================*/

	static public function ctrRegistroBitacora(){

		if (isset($_POST["editarIdBanco"])) {

		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Edición Banco 0840',
							   "folio" => $_POST["editarIdBanco"]);

		$respuesta = ModeloBanco0840::mdlRegistroBitacora($tabla, $datos);

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
							   "accion" => 'Descarga Reporte Banco 0840',
							   "folio" => 'Sin folio');

		$respuesta = ModeloBanco0840::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){


		$tabla = "bitacora";

		$datos = array("usuario" => $_SESSION['nombre'],
							   "perfil" => $_SESSION['perfil'],
							   "accion" => 'Importación de Datos Banco 0840',
							   "folio" => 'Sin folio');

		$respuesta = ModeloBanco0840::mdlRegistroBitacoraAgregar($tabla, $datos);

		
		$tabla2 = "ultimaactualizacion";

		$datos2 = array("usuario" => $_SESSION['nombre'],
						"accion" => 'Importación de Datos Banco 0840',
							   "idBanco" => '2');


		$respuesta = ModeloUltimoSaldoBancos::mdlUltimaActualizacion($tabla2, $datos2);

		return $respuesta;
		
		
	}
	/*=============================================
	CALCULAR IVA ARRENDAMIENTO
	=============================================*/

	static public function ctrCalcularIva1(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIva1($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR IVA ARRENDAMIENTO IMPORTACION
	=============================================*/

	static public function ctrCalcularIva1Importacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIva1Importacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR ISR ARRENDAMIENTO
	=============================================*/

	static public function ctrCalcularIsr1(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIsr1($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR ISR ARRENDAMIENTO IMPORTACION
	=============================================*/

	static public function ctrCalcularIsr1Importacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIsr1Importacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR IVA FLETE
	=============================================*/

	static public function ctrCalcularIva2(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIva2($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR IVA FLETE IMPORTACION
	=============================================*/

	static public function ctrCalcularIva2Importacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIva2Importacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR ISR FLETE
	=============================================*/

	static public function ctrCalcularIsr2(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIsr2($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR ISR FLETE IMPORTACION
	=============================================*/

	static public function ctrCalcularIsr2Importacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIsr2Importacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR IVA HONORARIOS
	=============================================*/

	static public function ctrCalcularIva3(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIva3($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR IVA HONORARIOS IMPORTACION
	=============================================*/

	static public function ctrCalcularIva3Importacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIva3Importacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR ISR HONORARIOS
	=============================================*/

	static public function ctrCalcularIsr3(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIsr3($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR ISR HONORARIOS IMPORTACION
	=============================================*/

	static public function ctrCalcularIsr3Importacion(){
		$tabla = "banco0840";

		$respuesta = ModeloBanco0840::mdlCalcularIsr3Importacion($tabla);

		return $respuesta;
	}
	/*=============================================
	EDITAR DATOS
	=============================================*/

	static public function ctrEditarDatos0840(){

		if(isset($_POST["idBanco"])){

			if(isset($_POST["editarDepartamento"])){

				

				$tabla = "banco0840";


				$datos = array("id" => $_POST["idBanco"],
							   "departamento" => $_POST["editarDepartamento"],
					           "grupo" => $_POST["editarGrupo"],
					           "subgrupo" => $_POST["editarSubgrupo"],
					           "mes" => $_POST["editarMes"],
					           "fecha" => $_POST["editarFecha"],
					           "descripcion" => $_POST["editarDescripcion"],
					           "cargo" => $_POST["editarCargo"],
					           "abono" => $_POST["editarAbono"],
					           "saldo" => $_POST["editarSaldo"],
					           "serie" => $_POST["editarSerie"],
					           "folio" => $_POST["editarFolio"],
					           "parciales" => $_POST["editarParciales"],
					           "parcial" => $_POST["editarParcial"],
					           "departamentoParcial1" => $_POST["editarDepartamentoParcial1"],
					           "parcial2" => $_POST["editarParcial2"],
					           "departamentoParcial2" => $_POST["editarDepartamentoParcial2"],
					           "parcial3" => $_POST["editarParcial3"],
					           "departamentoParcial3" => $_POST["editarDepartamentoParcial3"],
					           "parcial4" => $_POST["editarParcial4"],
					           "departamentoParcial4" => $_POST["editarDepartamentoParcial4"],
					           "parcial5" => $_POST["editarParcial5"],
					           "departamentoParcial5" => $_POST["editarDepartamentoParcial5"],
					           "parcial6" => $_POST["editarParcial6"],
					           "departamentoParcial6" => $_POST["editarDepartamentoParcial6"],
					           "parcial7" => $_POST["editarParcial7"],
					           "departamentoParcial7" => $_POST["editarDepartamentoParcial7"],
					           "parcial8" => $_POST["editarParcial8"],
					           "departamentoParcial8" => $_POST["editarDepartamentoParcial8"],
					           "parcial9" => $_POST["editarParcial9"],
					           "departamentoParcial9" => $_POST["editarDepartamentoParcial9"],
					           "parcial10" => $_POST["editarParcial10"],
					           "departamentoParcial10" => $_POST["editarDepartamentoParcial10"],
					           "parcial11" => $_POST["editarParcial11"],
					           "departamentoParcial11" => $_POST["editarDepartamentoParcial11"],
					           "parcial12" => $_POST["editarParcial12"],
					           "departamentoParcial12" => $_POST["editarDepartamentoParcial12"],
					           "acreedor" => $_POST["editarAcreedor"],
					           "concepto" => $_POST["editarConcepto"],
					           "numeroDocumento" => $_POST["editarNumeroDocumento"],
					       	   "tieneIva" => $_POST["editarTieneIva"],
					           "tieneRetenciones" => $_POST["editarTieneRetenciones"],
					           "tipoRetencion" => $_POST["editarTipoRetencion"],
					       	   "importeRetenciones" => $_POST["editarImporteRetenciones"]);

				$respuesta = ModeloBanco0840::mdlEditarDatos0840($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Los datos han sido modificados correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puede realizar la modificación de los datos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "banco0840";

							}
						})

			  	</script>';

			}

		}

	}


}