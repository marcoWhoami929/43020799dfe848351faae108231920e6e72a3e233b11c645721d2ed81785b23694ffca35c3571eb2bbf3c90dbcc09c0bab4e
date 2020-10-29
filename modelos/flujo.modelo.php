<?php 
require_once("conexion.php");
class ModeloFlujo{

	static public function mdlDiasMes($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT fecha FROM $tabla WHERE $item = :$item  LIMIT 25");

			$stmt -> bindParam(":".$item,  $valor, PDO::PARAM_STR);


			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT DISTINCT fecha FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}

}
 ?>
