<?php
require_once "conexion.php";
class ModeloAcumulado{
	/*=============================================
	MOSTRAR Acumulado
	=============================================*/

	static public function mdlMostrarReportAcumulado($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id asc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
	}
static public function mdlMostrarAcumulado($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) AS unidades, SUM(importeInicial) AS importeInicial, SUM(unidSurt) AS unidSurt, SUM(importSurt) AS importSurt, fechaPedido FROM facturacion WHERE estado = 1 AND agenteVentas != 'ING. MIGUEL GUTIERREZ A.' AND agenteVentas !='JOSÉ LUIS TEXIS ROSAS' AND agenteVentas !='(Ninguno)' and agenteVentas != '' GROUP BY agenteVentas ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) AS unidades, SUM(importeInicial) AS importeInicial, SUM(unidSurt) AS unidSurt, SUM(importSurt) AS importSurt, fechaPedido FROM facturacion WHERE estado = 1 AND agenteVentas != 'ING. MIGUEL GUTIERREZ A.' AND agenteVentas !='JOSÉ LUIS TEXIS ROSAS' AND agenteVentas !='(Ninguno)' and agenteVentas != '' GROUP BY  agenteVentas ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
	}
} 
 ?>