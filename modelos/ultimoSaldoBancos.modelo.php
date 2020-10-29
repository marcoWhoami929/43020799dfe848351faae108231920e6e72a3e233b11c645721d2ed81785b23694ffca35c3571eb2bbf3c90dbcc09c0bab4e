<?php
require_once "conexion.php";

class ModeloUltimoSaldoBancos{

	static public function mdlMostrarBanco0198($tabla,$item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarBanco0840($tabla,$item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}
	static public function mdlMostrarBanco1219($tabla,$item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarBanco1286($tabla,$item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}
	static public function mdlMostrarBanco1340($tabla,$item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarBanco3450($tabla,$item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarBanco6278($tabla,$item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarCaja($tabla,$item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	

	/*=============================================
	ULTIMA ACTUALIZACION BANCO 0198
	=============================================*/
	static public function mdlUltimaActualizacion($tabla2, $datos2){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2 (usuario, accion, idBanco) VALUES(:usuario, :accion, :idBanco)");

		$stmt->bindParam(":usuario", $datos2["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":accion", $datos2["accion"], PDO::PARAM_STR);
		$stmt->bindParam(":idBanco", $datos2["idBanco"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}

	static public function mdlMostrarUltimaActualizacion0198($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idBanco = 1 ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarUltimaActualizacion0840($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idBanco = 2 ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarUltimaActualizacion1219($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idBanco = 3 ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}
	static public function mdlMostrarUltimaActualizacion1286($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idBanco = 4 ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}
	static public function mdlMostrarUltimaActualizacion1340($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idBanco = 5 ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}
	static public function mdlMostrarUltimaActualizacion3450($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idBanco = 6 ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}
	static public function mdlMostrarUltimaActualizacion6278($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idBanco = 7 ORDER BY id DESC limit 1");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}


}


?>