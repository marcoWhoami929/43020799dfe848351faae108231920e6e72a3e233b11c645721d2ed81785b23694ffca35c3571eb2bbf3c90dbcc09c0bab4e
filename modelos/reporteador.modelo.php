<?php
require_once "conexion.php";
/**
 * 
 */
class ModeloReporteador
{

	/*============================================
	FILTRO POR RANGO DE FECHAS
	===========================================*/
	static public function mdlDescargarReporteRangoFechas($tabla, $sWhere)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla $sWhere order by id desc");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}
	static public function mdlDescargarReporteRangoFechasCredito($tabla, $sWhere)
	{


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  $sWhere and abono > 0  ORDER BY id DESC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}
	static public function mdlMostrarListaParcialesMovimiento($tablaB, $item, $valor, $tipo,$bancoMov)
	{


		/*$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaB WHERE $item = :$item");*/

		/*
			$stmt = Conexion::conectar()->prepare("SELECT banc.id,IF(ab.serieFactura = 'FASM','SAN MANUEL',IF(ab.serieFactura = 'FASG','SANTIAGO',IF(ab.serieFactura = 'FACP','CAPU',IF(ab.serieFactura = 'FARF','REFORMA',IF(ab.serieFactura = 'FATR','LAS TORRES',IF(ab.serieFactura = 'FACD','CEDIS',IF(ab.serieFactura = 'FAND','INDUSTRIAL',''))))))) as departamento,banc.grupo,banc.subgrupo,banc.mes,banc.fecha,banc.descripcion,banc.cargo,banc.abono,banc.saldo,banc.ultimoSaldo,banc.comprobacion,banc.comprobacion,banc.diferencia,ab.totalAbono as parcial,ab.serieFactura as serie,ab.folioFactura as folio,banc.numeroMovimiento,ft.nombreCliente as acreedor,ab.conceptoAbono as concepto,ab.id as numeroDocumento,ab.totalAbono as importe FROM `abonos` as ab LEFT OUTER JOIN $tablaB banc ON banc.id = ab.idMovimientoBanco LEFT OUTER JOIN facturastiendas as ft ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio WHERE $item = :$item");
			
		$stmt = Conexion::conectar()->prepare("SELECT banc.id,IF(ab.serieFactura = 'FASM','SAN MANUEL',IF(ab.serieFactura = 'FASG','SANTIAGO',IF(ab.serieFactura = 'FACP','CAPU',IF(ab.serieFactura = 'FARF','REFORMA',IF(ab.serieFactura = 'FATR','LAS TORRES',IF(ab.serieFactura = 'FACD','CEDIS',IF(ab.serieFactura = 'FAND','INDUSTRIAL',IF(ab.serieFactura = 'FCCA','CAPU',IF(ab.serieFactura = 'FCST','SANTIAGO',IF(ab.serieFactura = 'FCRM','REFORMA',IF(ab.serieFactura = 'FCSN','SAN MANUEL',IF(ab.serieFactura = 'FCTO','LAS TORRES',IF(ab.serieFactura = 'FCMY','CEDIS',IF(ab.serieFactura = 'FCIN','INDUSTRIAL',IF(ab.serieFactura = 'FCEC','ECOMMERCE',''))))))))))))))) as departamento,banc.grupo,banc.subgrupo,banc.mes,banc.fecha,banc.descripcion,banc.cargo,banc.abono,banc.saldo,banc.ultimoSaldo,banc.comprobacion,banc.comprobacion,banc.diferencia,sum(ab.totalAbono) as parcial,banc.serie as serie,banc.folio as folio,banc.numeroMovimiento,ft.nombreCliente as acreedor,ab.conceptoAbono as concepto,banc.numeroDocumento as numeroDocumento,ab.totalAbono as importe FROM `abonos` as ab LEFT OUTER JOIN $tablaB banc ON banc.id = ab.idMovimientoBanco LEFT OUTER JOIN facturastiendas as ft ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio WHERE $item = :$item and ab.banco = '".$bancoMov."' GROUP by nombreCliente");
*/
		$stmt = Conexion::conectar()->prepare("SELECT banc.id,IF(ab.serieFactura = 'FASM','SAN MANUEL',IF(ab.serieFactura = 'FASG','SANTIAGO',IF(ab.serieFactura = 'FACP','CAPU',IF(ab.serieFactura = 'FARF','REFORMA',IF(ab.serieFactura = 'FATR','LAS TORRES',IF(ab.serieFactura = 'FACD','CEDIS',IF(ab.serieFactura = 'FAND','INDUSTRIAL',IF(ab.serieFactura = 'FCCA','CAPU',IF(ab.serieFactura = 'FCST','SANTIAGO',IF(ab.serieFactura = 'FCRM','REFORMA',IF(ab.serieFactura = 'FCSN','SAN MANUEL',IF(ab.serieFactura = 'FCTO','LAS TORRES',IF(ab.serieFactura = 'FCMY','CEDIS',IF(ab.serieFactura = 'FCIN','INDUSTRIAL',IF(ab.serieFactura = 'FCEC','ECOMMERCE',IF(ab.serieFactura = 'FCCT','ACATEPEC','')))))))))))))))) as departamento,banc.grupo,banc.subgrupo,banc.mes,banc.fecha,banc.descripcion,banc.cargo,banc.abono,banc.saldo,banc.ultimoSaldo,banc.comprobacion,banc.comprobacion,banc.diferencia,sum(ab.totalAbono) as parcial,banc.serie as serie,banc.folio as folio,banc.numeroMovimiento,ft.nombreCliente as acreedor,ab.conceptoAbono as concepto,banc.numeroDocumento as numeroDocumento,ab.totalAbono as importe FROM `abonos` as ab LEFT OUTER JOIN $tablaB banc ON banc.id = ab.idMovimientoBanco LEFT OUTER JOIN facturastiendas as ft ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio WHERE $item = :$item and ab.banco = '".$bancoMov."' GROUP by nombreCliente");


		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}
}
