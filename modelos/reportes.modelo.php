<?php

require_once "conexion.php";

class ModeloReportes{
		
	/*=============================================
	DESCARGAR REPORTE
	=============================================*/

	static public function mdlDescargarReporte($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}
	/*============================================
	DESCARGAR REPORTE ESTATUS PEDIDO
	===========================================*/
	static public function  mdlDescargarReporteEstatusPedido($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*============================================
	DESCARGAR REPORTE COMPRAS
	===========================================*/
	static public function  mdlDescargarReporteCompras($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where sinAdquisicion = 0 ORDER BY id ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*============================================
	DESCARGAR REPORTE LABORATORIO
	===========================================*/
	static public function  mdlDescargarReporteLaboratorio($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where tieneIgualado = 1 and pendiente = 0 ORDER BY id ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*============================================
	DESCARGAR REPORTE BANCOS
	===========================================*/
	static public function  mdlDescargarReporteBancos($tabla){

		if ($tabla == "banco0198") {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 7000");
			
		}else {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
		}
		

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*============================================
	DESCARGAR REPORTE BANCOS CREDITO
	===========================================*/
	static public function  mdlDescargarReporteBancosCredito($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE abono > 0 ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*============================================
	DESCARGAR REPORTE COTIZACIONES
	===========================================*/
	static public function  mdlDescargarReporteCotizaciones($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * , SUM(cantidad) as cantidad_productos , SUM(neto) as neto_productos, SUM(iva) as iva_productos, SUM(total) as total_cotizacion, SUM(descuento) as total_descuento  FROM $tabla GROUP BY folio desc");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*============================================
	DESCARGAR REPORTE COTIZACIONES PLANTILLA
	===========================================*/
	static public function  mdlDescargarReporteCotizacionesPlantilla($tabla,$folio){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where folio = $folio");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	DESCARGAR REPORTE FACTURACION
	=============================================*/

	static public function mdlDescargarReporteFacturacion($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}
	/*============================================
	DESCARGAR REPORTE COTIZACIONES FILTRO
	===========================================*/
	static public function  mdlDescargarReporteCotizacionesFiltro($tabla,$codigo){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where codigoProducto = :codigo");

		$stmt -> bindParam(":codigo", $codigo, PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	static public function  mdlDescargarReporteCotizacionesFiltroCodigo($tabla,$codigoCliente){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where codigoCliente = :codigoCliente");

		$stmt -> bindParam(":codigoCliente", $codigoCliente, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

	static public function  mdlDescargarReporteCotizacionesFiltroFecha($tabla,$fechaInicio,$fechaFinal){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where fechaCotizacion BETWEEN :fechaInicio and :fechaFinal");

		$stmt -> bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
		$stmt -> bindParam(":fechaFinal", $fechaFinal, PDO::PARAM_STR);


		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	DESCARGAR REPORTE RUTAS
	=============================================*/

	static public function mdlDescargarReporteRutas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT *,if(observaciones=1,'Facturar Y Resurtir','Facturar') as observacionesOrden FROM $tabla ORDER BY id ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}
	/*=============================================
	DESCARGAR REPORTE ESTATUS RUTAS
	=============================================*/

	static public function mdlDescargarReporteEstatusRutas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT ordenesdetrabajo.fechaOrden,facturasordenes.serieFactura, facturasordenes.folioFactura,ordenesdetrabajo.nombreCliente,estatusordenes.* FROM ordenesdetrabajo  LEFT OUTER JOIN  estatusordenes ON ordenesdetrabajo.folio = estatusordenes.folio  LEFT OUTER JOIN  facturasordenes ON ordenesdetrabajo.folio = facturasordenes.folio WHERE ordenesdetrabajo.folio = estatusordenes.folio GROUP BY folio");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}
	/*=============================================
	DESCARGAR REPORTE CORTES
	=============================================*/

	static public function mdlDescargarReporteCortes($tabla,$item,$valor,$item2,$valor2){

		if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT ad.nombre as nombreSucursal,cc.* FROM $tabla cc INNER JOIN administradores ad ON ad.id = cc.idSucursal  WHERE $item = :$item  and substr($item2,1,10) = :$item2");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_INT);
				$stmt -> bindParam(":".$item2,$valor2, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();
			
		}else{

				$stmt = Conexion::conectar()->prepare("SELECT ad.nombre as nombreSucursal,cc.* FROM $tabla cc INNER JOIN administradores ad ON ad.id = cc.idSucursal WHERE substr($item2,1,10) = :$item2");

				$stmt -> bindParam(":".$item2,$valor2, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();


		}

		$stmt -> close();
		
		$stmt = null;
	
	}
	static public function mdlDescargarReporteFacturasTiendas($tabla,$item,$valor,$item2,$valor2,$item3,$valor3){

		if ($valor != null) {

				$fecha = strtotime($valor2);

				$fechaInicio = date('Y-m-d',$fecha);
				$fecha2 = strtotime($valor3);

				$fechaFinal = date('Y-m-d',$fecha2);

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE fechaFactura BETWEEN '$fechaInicio' AND '$fechaFinal'and $item = :$item and cancelado != 1");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();
			
		}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and cancelado != 1");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();


		}

		$stmt -> close();
		
		$stmt = null;
	
	}
	static public function mdlDescargarReporteFacturasCanceladas($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT fechaCancelacion,serie,folio,fechaFactura,nombreCliente,neto,descuento,impuesto,total,motivoCancelacion,idSolicitud FROM $tabla WHERE $item = :$item and estatus = 'Cancelada' and cancelado = 1");

		$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}
	static public function mdlDescargarReporteVentasTiendas($tabla,$item,$valor,$item2,$valor2){

		if ($valor != null) {

				$stmt = Conexion::conectar()->prepare("SELECT nombreCliente,fechaFactura,sum(neto) as importe,sum(impuesto) as impuesto, sum(total) as totalDocumento FROM $tabla WHERE $item = :$item and $item2 = :$item2 and cancelado != 1 GROUP by nombreCliente");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
				$stmt -> bindParam(":".$item2,$valor2, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();
			
		}else{

				$stmt = Conexion::conectar()->prepare("SELECT nombreCliente,fechaFactura,sum(neto) as importe,sum(impuesto) as impuesto, sum(total) as totalDocumento FROM $tabla WHERE $item2 = :$item2 and cancelado != 1 GROUP by nombreCliente");

				$stmt -> bindParam(":".$item2,$valor2, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();


		}

		$stmt -> close();
		
		$stmt = null;
	
	}
	static public function mdlDescargarReporteCobrosTiendas($tabla,$item,$valor,$item2,$valor2){

		if ($valor != null) {

				$stmt = Conexion::conectar()->prepare("SELECT nombreCliente,serie,folio,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and cancelado != 1 GROUP by serie,folio UNION ALL SELECT nombreCliente,serie,folio,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and nuevaFechaFactura = :$item2 and cancelado != 1 GROUP by serie,folio ORDER BY nombreCliente");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
				$stmt -> bindParam(":".$item2,$valor2, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();
			
		}else{

				$stmt = Conexion::conectar()->prepare("SELECT nombreCliente,serie,folio,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item2 = :$item2 and cancelado != 1 GROUP by serie,folio ORDER by nombreCliente");

				$stmt -> bindParam(":".$item2,$valor2, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();


		}

		$stmt -> close();
		
		$stmt = null;
	
	}
	static public function mdlDescargarReporteGastos($tabla,$item,$valor){

		if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT gt.*,ad.nombre from $tabla gt INNER JOIN administradores ad ON gt.idCreador = ad.id where $item = :$item");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
	
				$stmt -> execute();

				return $stmt -> fetchAll();
			
		}else{

				$stmt = Conexion::conectar()->prepare("SELECT gt.*,ad.nombre from $tabla gt INNER JOIN administradores ad ON gt.idCreador = ad.id");


				$stmt -> execute();

				return $stmt -> fetchAll();


		}

		$stmt -> close();
		
		$stmt = null;
	
	}
	static public function mdlDescargarReporteDepositosBancarios($tabla,$item,$valor){

		if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT ad.nombre as sucursal,dep.id as folioDeposito,banc.fecha,banc.descripcion,banc.abono,IF(ISNULL(dep.estatus),'POR IDENTIFICAR',dep.estatus) as estatus,IF(ISNULL(dep.saldoPendiente),banc.abono,dep.saldoPendiente) as saldoPendiente,IF(ISNULL(dep.idMovimientoBanco),'',dep.idMovimientoBanco) as idMovimientoBanco,IF(ISNULL(dep.abonadoDeposito),'',dep.abonadoDeposito) as abonadoDeposito from banco0198 banc INNER JOIN $tabla dep ON banc.id = dep.idMovimientoBanco INNER JOIN administradores ad ON dep.sucursal = ad.id WHERE dep.$item = :$item");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
	
				$stmt -> execute();

				return $stmt -> fetchAll();
			
		}else{

				$stmt = Conexion::conectar()->prepare("SELECT ad.nombre as sucursal,dep.id as folioDeposito,banc.fecha,banc.descripcion,banc.abono,IF(ISNULL(dep.estatus),'POR IDENTIFICAR',dep.estatus) as estatus,IF(ISNULL(dep.saldoPendiente),banc.abono,dep.saldoPendiente) as saldoPendiente,IF(ISNULL(dep.idMovimientoBanco),'',dep.idMovimientoBanco) as idMovimientoBanco,IF(ISNULL(dep.abonadoDeposito),'',dep.abonadoDeposito) as abonadoDeposito from banco0198 banc INNER JOIN $tabla dep ON banc.id = dep.idMovimientoBanco INNER JOIN administradores ad ON dep.sucursal = ad.id");


				$stmt -> execute();

				return $stmt -> fetchAll();


		}

		$stmt -> close();
		
		$stmt = null;
	
	}
	static public function mdlDescargarReporteAjustesSaldos($tabla,$item,$valor){

		if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT ajs.*,ad.nombre as creadorAjuste from $tabla ajs INNER JOIN administradores ad ON ajs.idAjustador = ad.id where $item = :$item");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
	
				$stmt -> execute();

				return $stmt -> fetchAll();
			
		}else{

				$stmt = Conexion::conectar()->prepare("SELECT ajs.*,ad.nombre as creadorAjuste from $tabla ajs INNER JOIN administradores ad ON ajs.idAjustador = ad.id");


				$stmt -> execute();

				return $stmt -> fetchAll();


		}

		$stmt -> close();
		
		$stmt = null;
	
	}
	static public function mdlDescargarReporteAbonosDocumentos($tabla,$item,$valor){

		if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT a.*, ad.nombre as creadorAbono from $tabla a INNER JOIN administradores ad ON a.creadorAbono = ad.id where $item = :$item");

				$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
	
				$stmt -> execute();

				return $stmt -> fetchAll();
			
		}else{

				$stmt = Conexion::conectar()->prepare("SELECT a.*, ad.nombre as creadorAbono from $tabla a INNER JOIN administradores ad ON a.creadorAbono = ad.id");


				$stmt -> execute();

				return $stmt -> fetchAll();


		}

		$stmt -> close();
		
		$stmt = null;
	
	}
	/*============================================
	DESCARGAR REPORTE BANCOS GENERAL
	===========================================*/
	static public function  mdlDescargarReporteBancosGeneral($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

	
}