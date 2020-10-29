<?php

class ControladorCajaDiario{

	/*=============================================
	MOSTRAR CAJA
	=============================================*/

	static public function ctrMostrarCaja($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMostrarCaja($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SALDO
	=============================================*/

	static public function ctrMostrarSaldo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMostrarSaldo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SALDO FEBRERO
	=============================================*/

	static public function ctrMostrarSaldoF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMostrarSaldoF($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESOS INDUSTRIAL
	=============================================*/

	static public function ctrIngresosIndustrial($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIngresosIndustrial($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESOS INDUSTRIAL FEBRERO
	=============================================*/

	static public function ctrIngresosIndustrialF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIngresosIndustrialF($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESOS MAYOREO
	=============================================*/

	static public function ctrIngresosMayoreo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIngresosMayoreo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	INGRESOS MAYOREO FEBERERO
	=============================================*/

	static public function ctrIngresosMayoreoF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIngresosMayoreoF($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	OTROS INGRESOS CAJA
	=============================================*/
	static public function ctrOtrosIngresosCaja(){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlOtrosIngresosCaja($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	OTROS INGRESOS CAJA FEBRERO
	=============================================*/
	static public function ctrOtrosIngresosCajaF(){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlOtrosIngresosCajaF($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	PAGOS A PROVEEDORES
	=============================================*/
	static public function ctrPagoAProveedores($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPagoAProveedores($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	PAGOS A PROVEEDORES FEBRERO
	=============================================*/
	static public function ctrPagoAProveedoresF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPagoAProveedoresF($tabla, $item, $valor);

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

		$respuesta = ModeloCajaDiario::mdlAcreedoresBancarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAcreedoresBancariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAcreedoresBancariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAcreedoresBancariosA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAcreedoresBancariosA($tabla, $item, $valor);

		return $respuesta;

	}
	/***********************************************/
	static public function ctrPrestamosBancarios($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrestamosBancarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrestamosBancariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrestamosBancariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrestamosBancariosA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrestamosBancariosA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditable($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIVAAcreditable($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIVAAcreditableF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIVAAcreditableM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIVAAcreditableA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIVAAcreditableA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAdquisiciondeActivos4A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAdquisiciondeActivos4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones4A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones5($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones5F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones5M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosConRetenciones5A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosConRetenciones5A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados4A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados5($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados5F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados5M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados5A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados5A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados6($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados6F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados6M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados6A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados6A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados7($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados7F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados7M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados7A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados7A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados8($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados8F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados8M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados8A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados8A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados9($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados9F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados9M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados9A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados9A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados10($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados10F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados10M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados10A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados10A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados11($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados11F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados11M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados11A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados11A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados12($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados12F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados12M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados12A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados12A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados13($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados13F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados13M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados13A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados13A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados14($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados14F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados14M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados14A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados14A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados15($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados15F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados15M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados15A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados15A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados16($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados16F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados16M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados16A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados16A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados17($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados17F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados17M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados17A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados17A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados18($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados18F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados18M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados18A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados18A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados19($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados19F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados19M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados19A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados19A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados20($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados20F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados20M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados20A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados20A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados21($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados21F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados21M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados21A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados21A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados22($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados22F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados22M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados22A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados22A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados23($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados23F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados23M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados23A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados23A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados24($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados24F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados24M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados24A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados24A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados25($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados25F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados25M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados25A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados25A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados26($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados26F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados26M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados26A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados26A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados27($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados27F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados27M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados27A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados27A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados28($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados28F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados28M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados28A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados28A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados29($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados29F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados29M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados29A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados29A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados30($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados30F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados30M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados30A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados30A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados31($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados31F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados31M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados31A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados31A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados32($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados32F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados32M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados32A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados32A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados33($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados33F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados33M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados33A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados33A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados34($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados34F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados34M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados34A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados34A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados35($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados35F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados35M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosGravados35A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosGravados35A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativosExentos3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativosExentos3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales4($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales4F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales4M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosImpuestosLocales4A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosImpuestosLocales4A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros3($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros3F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros3M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosFinancieros3A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosFinancieros3A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativos1($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativos1F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativos1M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos1A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativos1A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativos2($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2F($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativos2F($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2M($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativos2M($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrGastosOperativos2A($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlGastosOperativos2A($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalarios($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSueldosySalarios($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSueldosySalariosF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSueldosySalariosM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSueldosySalariosA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSueldosySalariosA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSAT($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlImpuestosFederalesSAT($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlImpuestosFederalesSATF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlImpuestosFederalesSATM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSATA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlImpuestosFederalesSATA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlImpuestosFederalesSUA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlImpuestosFederalesSUAF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlImpuestosFederalesSUAM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrImpuestosFederalesSUAA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlImpuestosFederalesSUAA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAguinaldo($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAguinaldoF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAguinaldoM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrAguinaldoA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlAguinaldoA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensa($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlDespensa($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlDespensaF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlDespensaM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrDespensaA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlDespensaA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacaciones($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlVacaciones($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlVacacionesF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlVacacionesM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrVacacionesA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlVacacionesA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacional($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrimaVacacional($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrimaVacacionalF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrimaVacacionalM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaVacacionalA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrimaVacacionalA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedad($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrimaAntiguedad($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrimaAntiguedadF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrimaAntiguedadM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPrimaAntiguedadA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPrimaAntiguedadA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDia($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSeptimoDia($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSeptimoDiaF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSeptimoDiaM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeptimoDiaA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSeptimoDiaA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacion($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSeparacion($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSeparacionF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSeparacionM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSeparacionA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSeparacionA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacion($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIndemnizacion($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIndemnizacionF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIndemnizacionM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrIndemnizacionA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlIndemnizacionA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSubsidioEmpleo($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSubsidioEmpleoF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSubsidioEmpleoM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrSubsidioEmpleoA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlSubsidioEmpleoA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTU($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPTU($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPTUF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPTUM($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrPTUA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlPTUA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMGA($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGAF($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMGAF($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMGAM($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMGAM($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMGAA($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMGAA($tabla, $item, $valor);

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

		$respuesta = ModeloCajaDiario::mdlMostrarCajaRetenciones($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR ULTIMO SALDO
	=============================================*/

	static public function ctrMostrarUltimoSaldo($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMostrarUltimoSaldo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PARCIALES
	=============================================*/

	static public function ctrMostrarParciales($item, $valor){

		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlMostrarParciales($tabla, $item, $valor);

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

				$respuesta = ModeloCajaDiario::mdlAgregarDatos($tabla, $datos);
				
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Los datos han sido ingresados correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "caja";

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

		$respuesta = ModeloCajaDiario::mdlCalcularIva($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR DIFERENCIA
	=============================================*/

	static public function ctrCalcularDiferencia(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularDiferencia($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR FOLIO
	=============================================*/

	static public function ctrCalcularFolio(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularFolio($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR IMPORTE
	=============================================*/

	static public function ctrCalcularImporte(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularImporte($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR IMPORTE PARCIALES
	=============================================*/

	static public function ctrCalcularImporteParciales(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularImporteParciales($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR COMPROBACION
	=============================================*/

	static public function ctrCalcularComprobacion(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularComprobacion($tabla);

		return $respuesta;
	}
	/*=============================================
	CALCULAR SALDO
	=============================================*/

	static public function ctrCalcularSaldo(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularSaldo($tabla);

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

		$respuesta = ModeloCajaDiario::mdlRegistroBitacora($tabla, $datos);

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

		$respuesta = ModeloCajaDiario::mdlRegistroBitacoraReporte($tabla, $datos);

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

			$respuesta = ModeloCajaDiario::mdlRegistroBitacoraAgregar($tabla, $datos);

			return $respuesta;

		}
		
		
		
	}
	/*=============================================
	CALCULAR IVA ARRENDAMIENTO
	=============================================*/

	static public function ctrCalcularIva1(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularIva1($tabla);

		return $respuesta;
	}

	/*=============================================
	CALCULAR ISR ARRENDAMIENTO
	=============================================*/

	static public function ctrCalcularIsr1(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularIsr1($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR IVA FLETE
	=============================================*/

	static public function ctrCalcularIva2(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularIva2($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR ISR FLETE
	=============================================*/

	static public function ctrCalcularIsr2(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularIsr2($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR IVA HONORARIOS
	=============================================*/

	static public function ctrCalcularIva3(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularIva3($tabla);

		return $respuesta;
	}
	
	/*=============================================
	CALCULAR ISR HONORARIOS
	=============================================*/

	static public function ctrCalcularIsr3(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlCalcularIsr3($tabla);

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

				$respuesta = ModeloCajaDiario::mdlEditarDatos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Los datos han sido modificados correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "caja";

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

		$respuesta = ModeloCajaDiario::mdlRecalcularUltimoSaldo($tabla);

		return $respuesta;
	}
	/*=============================================
	RECALCULAR SALDO
	=============================================*/

	static public function ctrRecalcularSaldo(){
		$tabla = "caja";

		$respuesta = ModeloCajaDiario::mdlRecalcularSaldo($tabla);

		return $respuesta;
	}


}