<?php

class ControladorCaja{

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
	MOSTRAR CAJA
	=============================================*/

	static public function ctrMostrarCaja($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMostrarCaja($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SALDO
	=============================================*/

	static public function ctrMostrarSaldo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMostrarSaldo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SALDO FEBRERO
	=============================================*/

	static public function ctrMostrarSaldoF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMostrarSaldoF($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESOS INDUSTRIAL
	=============================================*/

	static public function ctrIngresosIndustrial($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIngresosIndustrial($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESOS INDUSTRIAL FEBRERO
	=============================================*/

	static public function ctrIngresosIndustrialF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIngresosIndustrialF($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESOS MAYOREO
	=============================================*/

	static public function ctrIngresosMayoreo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIngresosMayoreo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESOS MAYOREO FEBERERO
	=============================================*/

	static public function ctrIngresosMayoreoF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIngresosMayoreoF($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	OTROS INGRESOS CAJA
	=============================================*/
	static public function ctrOtrosIngresosCaja(){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlOtrosIngresosCaja($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	OTROS INGRESOS CAJA FEBRERO
	=============================================*/
	static public function ctrOtrosIngresosCajaF(){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlOtrosIngresosCajaF($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	PAGOS A PROVEEDORES
	=============================================*/
	static public function ctrPagoAProveedores($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPagoAProveedores($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	PAGOS A PROVEEDORES FEBRERO
	=============================================*/
	static public function ctrPagoAProveedoresF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPagoAProveedoresF($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	PAGOS A PROVEEDORES
	=============================================*/
	/*=============================================
	EGRESOS SUBGRUPOS
	=============================================*/
	static public function ctrAcreedoresBancarios($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAcreedoresBancarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAcreedoresBancariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAcreedoresBancariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAcreedoresBancariosA($tabla, $item, $valor);

		return $respuesta;

	}
	/***********************************************/
	static public function ctrPrestamosBancarios($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrestamosBancarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrestamosBancariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrestamosBancariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrestamosBancariosA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditable($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIVAAcreditable($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIVAAcreditableF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIVAAcreditableM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIVAAcreditableA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAdquisiciondeActivos4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones5($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones5F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones5M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosConRetenciones5A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados5($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados5F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados5M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados5A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados6($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados6F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados6M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados6A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados7($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados7F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados7M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados7A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados8($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados8F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados8M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados8A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados9($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados9F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados9M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados9A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados10($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados10F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados10M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados10A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados11($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados11F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados11M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados11A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados12($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados12F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados12M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados12A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados13($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados13F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados13M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados13A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados14($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados14F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados14M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados14A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados15($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados15F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados15M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados15A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados16($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados16F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados16M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados16A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados17($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados17F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados17M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados17A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados18($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados18F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados18M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados18A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados19($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados19F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados19M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados19A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados20($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados20F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados20M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados20A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados21($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados21F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados21M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados21A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados22($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados22F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados22M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados22A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados23($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados23F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados23M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados23A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados24($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados24F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados24M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados24A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados25($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados25F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados25M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados25A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados26($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados26F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados26M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados26A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados27($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados27F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados27M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados27A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados28($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados28F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados28M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados28A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados29($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados29F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados29M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados29A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados30($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados30F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados30M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados30A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados31($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados31F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados31M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados31A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados32($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados32F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados32M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados32A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados33($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados33F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados33M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados33A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados34($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados34F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados34M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados34A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados35($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados35F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados35M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosGravados35A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativosExentos3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosImpuestosLocales4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosFinancieros3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlGastosOperativos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalarios($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSueldosySalarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSueldosySalariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSueldosySalariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSueldosySalariosA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSAT($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlImpuestosFederalesSAT($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlImpuestosFederalesSATF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlImpuestosFederalesSATM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlImpuestosFederalesSATA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlImpuestosFederalesSUA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlImpuestosFederalesSUAF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlImpuestosFederalesSUAM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlImpuestosFederalesSUAA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAguinaldo($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAguinaldoF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAguinaldoM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlAguinaldoA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensa($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlDespensa($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlDespensaF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlDespensaM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlDespensaA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacaciones($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlVacaciones($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlVacacionesF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlVacacionesM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlVacacionesA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacional($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrimaVacacional($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrimaVacacionalF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrimaVacacionalM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrimaVacacionalA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedad($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrimaAntiguedad($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrimaAntiguedadF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrimaAntiguedadM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPrimaAntiguedadA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDia($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSeptimoDia($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSeptimoDiaF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSeptimoDiaM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSeptimoDiaA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacion($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSeparacion($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSeparacionF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSeparacionM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSeparacionA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacion($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIndemnizacion($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIndemnizacionF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIndemnizacionM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlIndemnizacionA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSubsidioEmpleo($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSubsidioEmpleoF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSubsidioEmpleoM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlSubsidioEmpleoA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTU($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPTU($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPTUF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPTUM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlPTUA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMGA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGAF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMGAF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGAM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMGAM($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMGAA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMGAA($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	EGRESOS SUBGRUPOS
	=============================================*/
	/*=============================================
	MOSTRAR CAJA RETENCIONES
	=============================================*/

	static public function ctrMostrarCajaRetenciones($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMostrarCajaRetenciones($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR ULTIMO SALDO
	=============================================*/

	static public function ctrMostrarUltimoSaldo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMostrarUltimoSaldo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PARCIALES
	=============================================*/

	static public function ctrMostrarParciales($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCaja::mdlMostrarParciales($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESAR DATOS
	=============================================*/

	static public function ctrAgregarDatos(){

		if(isset($_POST["departamento"])){

			if(isset($_POST["departamento"])){

				$tabla = "caja";

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
					           "parcial8" => $_POST["parcial8"],
					           "departamentoParcial8" => $_POST["departamentoParcial8"],
					           "parcial9" => $_POST["parcial9"],
					           "departamentoParcial9" => $_POST["departamentoParcial9"],
					           "parcial10" => $_POST["parcial10"],
					           "departamentoParcial10" => $_POST["departamentoParcial10"],
					           "parcial11" => $_POST["parcial11"],
					           "departamentoParcial11" => $_POST["departamentoParcial11"],
					           "parcial12" => $_POST["parcial12"],
					           "departamentoParcial12" => $_POST["departamentoParcial12"],
					           "serie" => $_POST["serie"],
					           "folio" => $_POST["folio"],
					           "acreedor" => $_POST["acreedor"],
					           "concepto" => $_POST["concepto"],
					           "numeroDocumento" => $_POST["numeroDocumento"],
					           "tieneIva" => $_POST["tieneIva"],
					           "tieneRetenciones" => $_POST["tieneRetenciones"],
					           "tipoRetencion" => $_POST["tipoRetencion"],
					           "importeRetenciones" => $_POST["importeRetenciones"],
					       	   "ultimoSaldo" => $_POST["ultimoSaldo"]); 

				$respuesta = ModeloCaja::mdlAgregarDatos($tabla, $datos);
				
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Los datos han sido ingresados correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							

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
						
							window.location = "caja";

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
						
							window.location = "caja";

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
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularIva($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR DIFERENCIA
	=============================================*/

	static public function ctrCalcularDiferencia(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularDiferencia($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR FOLIO
	=============================================*/

	static public function ctrCalcularFolio(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularFolio($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR IMPORTE
	=============================================*/

	static public function ctrCalcularImporte(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularImporte($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR IMPORTE PARCIALES
	=============================================*/

	static public function ctrCalcularImporteParciales(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularImporteParciales($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR COMPROBACION
	=============================================*/

	static public function ctrCalcularComprobacion(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularComprobacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR SALDO
	=============================================*/

	static public function ctrCalcularSaldo(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularSaldo($tabla);

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
							   "accion" => 'Edición Caja',
							   "folio" => $_POST["editarIdBanco"]);

		$respuesta = ModeloCaja::mdlRegistroBitacora($tabla, $datos);

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
							   "accion" => 'Descarga Reporte Caja',
							   "folio" => 'Sin folio');

		$respuesta = ModeloCaja::mdlRegistroBitacoraReporte($tabla, $datos);

		return $respuesta;
		
		
	}
	/*=============================================
	REGISTRO BITACORA  AGREGAR
	=============================================*/

	static public function ctrRegistroBitacoraAgregar(){

		if (isset($_POST["folio"])) {
			
			$tabla = "bitacora";

			$datos = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Inserción de Datos Caja',
								   "folio" => $_POST["folio"]);

			$respuesta = ModeloCaja::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

		}
		
		
		
	}
	/*=============================================
	CALCULAR IVA ARRENDAMIENTO
	=============================================*/

	static public function ctrCalcularIva1(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularIva1($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR ISR ARRENDAMIENTO
	=============================================*/

	static public function ctrCalcularIsr1(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularIsr1($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR IVA FLETE
	=============================================*/

	static public function ctrCalcularIva2(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularIva2($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR ISR FLETE
	=============================================*/

	static public function ctrCalcularIsr2(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularIsr2($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR IVA HONORARIOS
	=============================================*/

	static public function ctrCalcularIva3(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularIva3($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR ISR HONORARIOS
	=============================================*/

	static public function ctrCalcularIsr3(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlCalcularIsr3($tabla);

		return $respuesta;
	}
	
	/*=============================================
	EDITAR DATOS
	=============================================*/

	static public function ctrEditarDatos(){

		if(isset($_POST["idCaja"])){

			if(isset($_POST["editarDepartamento"])){

				

				$tabla = "caja";


				$datos = array("id" => $_POST["idCaja"],
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

				$respuesta = ModeloCaja::mdlEditarDatos($tabla, $datos);

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

							window.location = "caja";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	RECALCULAR ULTIMO SALDO
	=============================================*/

	static public function ctrRecalcularUltimoSaldo(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlRecalcularUltimoSaldo($tabla);

		return $respuesta;
	}
	/*=============================================
	RECALCULAR SALDO
	=============================================*/

	static public function ctrRecalcularSaldo(){
		$tabla = "caja";

		$respuesta = ModeloCaja::mdlRecalcularSaldo($tabla);

		return $respuesta;
	}
	/*=============================================
	CANCELAR REGISTRO CAJA
	=============================================*/

	static public function ctrEliminarRegistroCaja(){

		if(isset($_GET["idCaja2"])){

			$tabla = "caja";
			$datos = array("id" => $_GET["idCaja2"]);

		
			$tabla2 = "bitacora";

			$datos2 = array("usuario" => $_SESSION['nombre'],
								   "perfil" => $_SESSION['perfil'],
								   "accion" => 'Eliminación datos caja',
								   "folio" => $_GET["idCaja2"]);

			


			$respuesta = ModeloCaja::mdlEliminarRegistroCaja($tabla, $datos);
			$respuesta1 = ModeloCaja::mdlRegistroBitacoraEliminar($tabla2, $datos2);

			if($respuesta == "ok" && $respuesta1 == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El registro ha sido eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "caja";

								}
							})

				</script>';

			}		

		}

	}


}