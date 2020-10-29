<?php
require_once "conexion.php";
class ModeloAcumuladoMensual{
	/*=============================================
	MOSTRAR Acumulado
	=============================================*/
	static public function mdlMostrarReportAcumuladoMensual($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) as unidades, SUM(importeInicial) as importeInicial, SUM(unidSurt) as unidSurt, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item and agenteVentas = 'ROCIO MARTINEZ MORALES'");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll();
					$stmt-> close();

					$stmt = null;

	}
	static public function mdlMostrarAcumRocio($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) as unidades, SUM(importeInicial) as importeInicial, SUM(unidSurt) as unidSurt, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item and agenteVentas = 'ROCIO MARTINEZ MORALES'");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll();
					$stmt-> close();

					$stmt = null;

	}
	static public function mdlMostrarAcumLuis($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) as unidades, SUM(importeInicial) as importeInicial, SUM(unidSurt) as unidSurt, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item and agenteVentas = 'LUIS ENRIQUE BUSTOS MONTERD'");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll();
					$stmt-> close();

					$stmt = null;

	}
	static public function mdlMostrarAcumErik($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) as unidades, SUM(importeInicial) as importeInicial, SUM(unidSurt) as unidSurt, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item and agenteVentas = 'GOMEZ RODRIGUEZ ERICK'");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll();
					$stmt-> close();

					$stmt = null;

	}
	static public function mdlMostrarAcumOrlando($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) as unidades, SUM(importeInicial) as importeInicial, SUM(unidSurt) as unidSurt, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item and agenteVentas = 'ORLANDO BRIONES AGUIRRE'");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll();
					$stmt-> close();

					$stmt = null;

	}
	static public function mdlMostrarAcumJonathan($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) as unidades, SUM(importeInicial) as importeInicial, SUM(unidSurt) as unidSurt, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item and agenteVentas = 'JONATHAN GONZALEZ SANCHEZ'");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll();
					$stmt-> close();

					$stmt = null;

	}

	static public function mdlMostrarAcumAlfredo($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) as unidades, SUM(importeInicial) as importeInicial, SUM(unidSurt) as unidSurt, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item and agenteVentas = 'ALFREDO MENDOZA SEGURA'");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll();
					$stmt-> close();

					$stmt = null;

	}

	static public function mdlMostrarAcumArturo($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT agenteVentas, SUM(unidades) as unidades, SUM(importeInicial) as importeInicial, SUM(unidSurt) as unidSurt, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item and agenteVentas = 'CASTOLO GALINDO ARTURO'");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll();
					$stmt-> close();

					$stmt = null;

	}
	static public function mdlMostrarAcumuladoAgenteImporteInicial($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT SUM(importeInicial) as importeInicial, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1  and $item = :$item GROUP by SUBSTRING(fechaPedido, 4, 2)");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll(PDO::FETCH_COLUMN, 0);
					$stmt-> close();

					$stmt = null;

	}
	static public function mdlMostrarAcumuladoAgenteImporteSurtido($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT SUM(importeInicial) as importeInicial, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1  and $item = :$item GROUP by SUBSTRING(fechaPedido, 4, 2)");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll(PDO::FETCH_COLUMN, 1);
					$stmt-> close();

					$stmt = null;

	}
	static public function mdlMostrarAcumuladoAgenteMeses($tabla, $item, $valor){

				$stmt = Conexion::conectar()->prepare("SELECT SUM(importeInicial) as importeInicial, SUM(importSurt) as importSurt, fechaPedido  FROM $tabla WHERE estado = 1  and $item = :$item GROUP by SUBSTRING(fechaPedido, 4, 2)");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				    $stmt -> execute();

					return $stmt -> fetchAll(PDO::FETCH_COLUMN, 2);
					$stmt-> close();

					$stmt = null;

	}
} 
 ?>