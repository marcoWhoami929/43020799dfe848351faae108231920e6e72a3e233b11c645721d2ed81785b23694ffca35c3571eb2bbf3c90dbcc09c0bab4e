<?php

require_once "conexion.php";
class ModeloAlmacenRuta{

    static public function mdlMostrarOrdenesDeTrabajo($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where activo = 1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


    }
    static public function mdlGenerarOrdenAlmacen($tabla3, $datos3){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla3(serie,folio,serieTraspaso,suministrado,almacen,observaciones,numeroPartidas,numeroUnidades,importeTotal,estado,status,habilitado,pendiente,estatusFactura,activo,cliente) VALUES (:serie,:folio,:serieTraspaso,:suministrado,:almacen,:observaciones,:numeroPartidas,:numeroUnidades,:importeTotal,:estado,:status,:habilitado,:pendiente,:estatusFactura,:activo,:cliente)");
        
		$stmt->bindParam(":serie", $datos3["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":folio", $datos3["folio"], PDO::PARAM_STR);
        $stmt->bindParam(":serieTraspaso", $datos3["serieTraspaso"], PDO::PARAM_STR);
        $stmt->bindParam(":suministrado", $datos3["suministrado"], PDO::PARAM_STR);
        $stmt->bindParam(":almacen", $datos3["almacen"], PDO::PARAM_INT);
        $stmt->bindParam(":observaciones", $datos3["observaciones"], PDO::PARAM_INT);
		$stmt->bindParam(":numeroPartidas", $datos3["numeroPartidas"], PDO::PARAM_STR);
        $stmt->bindParam(":numeroUnidades", $datos3["numeroUnidades"], PDO::PARAM_STR);
        $stmt->bindParam(":importeTotal", $datos3["importeTotal"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos3["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":status", $datos3["status"], PDO::PARAM_INT);
        $stmt->bindParam(":habilitado", $datos3["habilitado"], PDO::PARAM_INT);
        $stmt->bindParam(":pendiente", $datos3["pendiente"], PDO::PARAM_INT);
        $stmt->bindParam(":estatusFactura", $datos3["estatusFactura"], PDO::PARAM_INT);
        $stmt->bindParam(":activo", $datos3["activo"], PDO::PARAM_INT);
        $stmt->bindParam(":cliente", $datos3["cliente"], PDO::PARAM_STR);

		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	static public function mdlEditarOrdenAlmacen($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET serieTraspaso = :serieTraspaso, folioTraspaso = :folioTraspaso, partidasTraspaso = :partidasTraspaso, unidadesTraspaso = :unidadesTraspaso,partidasTraspaso2 = :partidasTraspaso2, unidadesTraspaso2 = :unidadesTraspaso2, serieTraspaso2 = :serieTraspaso2, folioTraspaso2 = :folioTraspaso2, fechaRecepcion = :fechaRecepcion, fechaSuministro = :fechaSuministro,fechaTermino = :fechaTermino, almacen = :almacen, estado = :estado, status = :status, pendiente = :pendiente, suministrado = :suministrado, comentarios = :comentarios WHERE id = :id");

		
		$stmt->bindParam(":serieTraspaso", $datos["serieTraspaso"], PDO::PARAM_STR);
		$stmt->bindParam(":folioTraspaso", $datos["folioTraspaso"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasTraspaso", $datos["partidasTraspaso"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesTraspaso", $datos["unidadesTraspaso"], PDO::PARAM_STR);
		$stmt->bindParam(":serieTraspaso2", $datos["serieTraspaso2"], PDO::PARAM_STR);
		$stmt->bindParam(":folioTraspaso2", $datos["folioTraspaso2"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasTraspaso2", $datos["partidasTraspaso2"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesTraspaso2", $datos["unidadesTraspaso2"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaSuministro", $datos["fechaSuministro"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino", $datos["fechaTermino"], PDO::PARAM_STR);
		$stmt->bindParam(":almacen", $datos["almacen"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":pendiente", $datos["pendiente"], PDO::PARAM_INT);
		$stmt->bindParam(":suministrado", $datos["suministrado"], PDO::PARAM_STR);
		$stmt->bindParam(":comentarios", $datos["comentarios"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
    static public function mdlActualizarDatosAlmacen($tabla2, $datos2){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET numeroPartidas = :numeroPartidas, numeroUnidades = :numeroUnidades, importeTotal = :importe WHERE folio = :folio");

		
		
		$stmt->bindParam(":numeroPartidas", $datos2["numeroPartidas"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroUnidades", $datos2["numeroUnidades"], PDO::PARAM_STR);
		$stmt->bindParam(":importe", $datos2["importeTotal"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos2["folio"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlCancelarOrdenAlmacen($tabla1, $datos1){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla1 set status = 0, estado = 0, pendiente = 2 WHERE folio = :folio and serie = :serie");

		$stmt -> bindParam(":folio", $datos1["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos1["serie"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	static public function mdlRegistroBitacoraEditar($tabla2, $datos2){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(usuario, perfil, accion, folio) VALUES(:usuario, :perfil, :accion, :folio)");

		$stmt->bindParam(":usuario", $datos2["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos2["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":accion", $datos2["accion"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos2["folio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlActualizarTiempoProceso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaTermino, fechaRecepcion) where folio = :folio AND serie = :serie");

		$stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if ($stmt -> execute()) {

			return "ok";

		}else {

			return "error";
		}

		$stmt -> close();

		$stmt = null;


	}
	static public function mdlActualizarEstatusTiemposAlmacen($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE estatusordenes INNER JOIN almacenot ON estatusordenes.folio = almacenot.folio  SET estatusordenes.tiempoAlmacen = almacenot.tiempoProceso,estatusordenes.estadoAlmacen = almacenot.estado,estatusordenes.statusAlmacen = almacenot.status  WHERE estatusordenes.folio = :folio");

		$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlHabilitarOrden($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlRegistroBitacoraReporte($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, perfil, accion, folio) VALUES(:usuario, :perfil, :accion, :folio)");

	$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
	$stmt->bindParam(":accion", $datos["accion"], PDO::PARAM_STR);
	$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_STR);

	if($stmt->execute()){

		return "ok";	

	}else{

		return "error";
	
	}

	$stmt->close();
	
	$stmt = null;
	}
}
?>