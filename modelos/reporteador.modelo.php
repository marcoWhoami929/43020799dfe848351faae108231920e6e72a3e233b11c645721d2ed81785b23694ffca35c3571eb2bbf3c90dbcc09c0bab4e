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
	static public function mdlDescargarReporteRangoFechas($tabla,$item,$valor1,$valor2){

	       	$hoy = date("Y-m-d");

			if ($hoy === $valor1) {

				$fInicio = str_replace('-', '/', $valor1);
				$fechaInicio = date('d/m/Y',strtotime($fInicio."- 7 days"));

			}else{

				$fInicio = str_replace('-', '/', $valor1);
				$fechaInicio = date('d/m/Y',strtotime($fInicio));

			}


			$fFin = str_replace('-', '/', $valor2);
			$fechaFinal = date('d/m/Y',strtotime($fFin));

			//var_dump("FEcha 1: ", $fechaInicio," Fecha 2: ",$fechaFinal);

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where STR_TO_DATE($item,'%d/%m/%Y') BETWEEN STR_TO_DATE('$fechaInicio','%d/%m/%Y') AND STR_TO_DATE('$fechaFinal','%d/%m/%Y ') ORDER BY id DESC");
			
			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt -> close();

		$stmt = null;

	}
	static public function mdlDescargarReporteRangoFechasCredito($tabla,$item,$valor1,$valor2){

	       
			$hoy = date("Y-m-d");

			if ($hoy === $valor1) {

				$fInicio = str_replace('-', '/', $valor1);
				$fechaInicio = date('d/m/Y',strtotime($fInicio."- 7 days"));

			}else{

				$fInicio = str_replace('-', '/', $valor1);
				$fechaInicio = date('d/m/Y',strtotime($fInicio));

			}

			$fFin = str_replace('-', '/', $valor2);
			$fechaFinal = date('d/m/Y',strtotime($fFin));

			

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where STR_TO_DATE($item,'%d/%m/%Y') BETWEEN STR_TO_DATE('$fechaInicio','%d/%m/%Y') AND STR_TO_DATE('$fechaFinal','%d/%m/%Y') AND abono > 0 ORDER BY id DESC");
			
			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarListaParcialesMovimiento($tablaB,$item,$valor,$tipo){


			/*$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaB WHERE $item = :$item");*/

			/*
			$stmt = Conexion::conectar()->prepare("SELECT banc.id,IF(ab.serieFactura = 'FASM','SAN MANUEL',IF(ab.serieFactura = 'FASG','SANTIAGO',IF(ab.serieFactura = 'FACP','CAPU',IF(ab.serieFactura = 'FARF','REFORMA',IF(ab.serieFactura = 'FATR','LAS TORRES',IF(ab.serieFactura = 'FACD','CEDIS',IF(ab.serieFactura = 'FAND','INDUSTRIAL',''))))))) as departamento,banc.grupo,banc.subgrupo,banc.mes,banc.fecha,banc.descripcion,banc.cargo,banc.abono,banc.saldo,banc.ultimoSaldo,banc.comprobacion,banc.comprobacion,banc.diferencia,ab.totalAbono as parcial,ab.serieFactura as serie,ab.folioFactura as folio,banc.numeroMovimiento,ft.nombreCliente as acreedor,ab.conceptoAbono as concepto,ab.id as numeroDocumento,ab.totalAbono as importe FROM `abonos` as ab LEFT OUTER JOIN $tablaB banc ON banc.id = ab.idMovimientoBanco LEFT OUTER JOIN facturastiendas as ft ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio WHERE $item = :$item");
			*/
			$stmt = Conexion::conectar()->prepare("SELECT banc.id,IF(ab.serieFactura = 'FASM','SAN MANUEL',IF(ab.serieFactura = 'FASG','SANTIAGO',IF(ab.serieFactura = 'FACP','CAPU',IF(ab.serieFactura = 'FARF','REFORMA',IF(ab.serieFactura = 'FATR','LAS TORRES',IF(ab.serieFactura = 'FACD','CEDIS',IF(ab.serieFactura = 'FAND','INDUSTRIAL',''))))))) as departamento,banc.grupo,banc.subgrupo,banc.mes,banc.fecha,banc.descripcion,banc.cargo,banc.abono,banc.saldo,banc.ultimoSaldo,banc.comprobacion,banc.comprobacion,banc.diferencia,sum(ab.totalAbono) as parcial,banc.serie as serie,banc.folio as folio,banc.numeroMovimiento,ft.nombreCliente as acreedor,ab.conceptoAbono as concepto,banc.numeroDocumento as numeroDocumento,ab.totalAbono as importe FROM `abonos` as ab LEFT OUTER JOIN $tablaB banc ON banc.id = ab.idMovimientoBanco LEFT OUTER JOIN facturastiendas as ft ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio WHERE $item = :$item GROUP by nombreCliente");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;


	}
	
}

?>