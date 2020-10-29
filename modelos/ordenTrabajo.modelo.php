<?php
error_reporting(E_ALL);
require_once "conexion.php";
class ModeloOrdenes{

	static public function mdlMostrarOrdenesDeTrabajo($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY folio asc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
    static public function mdlObtenerFolioOrden(){

        $stmt =  Conexion::conectar()->prepare("SELECT CASE WHEN MAX(folio) IS NULL THEN '1' ELSE MAX(folio) + 1 END AS folio FROM `ordenesdetrabajo`");
        
        $stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
    }

    static public function mdlGenerarOrden($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(creado,codigoCliente,nombreCliente,canal,rfc,agenteVentas,diasCredito,statusCliente,serie,folio,tipoPago,metodoPago,formaPago,numeroPartidas,numeroUnidades,importe,fechaRecepcion,fechaElaboracion,tipoRuta,observaciones,comentarios,estado) VALUES (:creado,:codigoCliente,:nombreCliente,:canal,:rfc,:agenteVentas,:diasCredito,:statusCliente,:serie,:folio,:tipoPago,:metodoPago,:formaPago,:numeroPartidas,:numeroUnidades,:importe,:fechaRecepcion,:fechaElaboracion,:tipoRuta,:observaciones,:comentarios,:estado)");
        
		$stmt->bindParam(":creado", $datos["creado"], PDO::PARAM_STR);
		$stmt->bindParam(":codigoCliente", $datos["codigoCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":canal", $datos["canal"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":agenteVentas", $datos["agenteVentas"], PDO::PARAM_STR);
		$stmt->bindParam(":diasCredito", $datos["diasCredito"], PDO::PARAM_INT);
		$stmt->bindParam(":statusCliente", $datos["statusCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoPago", $datos["tipoPago"], PDO::PARAM_STR);
		$stmt->bindParam(":metodoPago", $datos["metodoPago"], PDO::PARAM_STR);
		$stmt->bindParam(":formaPago", $datos["formaPago"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroPartidas", $datos["numeroPartidas"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroUnidades", $datos["numeroUnidades"], PDO::PARAM_STR);
		$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaElaboracion", $datos["fechaElaboracion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRuta", $datos["tipoRuta"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":comentarios", $datos["comentarios"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	static public function mdlActualizarTiempoProceso($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaElaboracion, fechaRecepcion) where folio = :folio AND serie = :serie");

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
	static public function mdlRegistroBitacoraAgregar($tabla2, $datos2){

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
	static public function mdlRegistroBitacoraEliminar($tabla6, $datos6){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla6(usuario, perfil, accion, folio) VALUES(:usuario, :perfil, :accion, :folio)");

		$stmt->bindParam(":usuario", $datos6["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos6["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":accion", $datos6["accion"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos6["folio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlRegistroBitacoraEditar($tabla4, $datos4){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla4(usuario, perfil, accion, folio) VALUES(:usuario, :perfil, :accion, :folio)");

		$stmt->bindParam(":usuario", $datos4["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos4["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":accion", $datos4["accion"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos4["folio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlCancelarOrden($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set estado = 0,cancelado = 1, tiempoProceso = '00:00:00', motivoCancelacion = :motivoCancelacion WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":motivoCancelacion", $datos["motivoCancelacion"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	static public function mdlCancelarEstatusGenerales($tabla3, $datos3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 set estadoOrden = 0, tiempoProceso = '00:00:00', estadoAlmacen = 0,tiempoAlmacen = '00:00:00', statusAlmacen = 0, estadoFacturacion = 0, tiempoFacturacion = '00:00:00', statusFacturacion = 0, tiempoFinal = 0, fechaFin = ''  WHERE folio = :folio");

		$stmt -> bindParam(":folio", $datos3["folio"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	static public function mdlEstatusOrdenes($tabla5, $datos5){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla5(serie,folio,estadoOrden,estadoAlmacen,statusAlmacen,estadoFacturacion,statusFacturacion,observaciones) VALUES(:serie,:folio,:estadoOrden,:estadoAlmacen,:statusAlmacen,:estadoFacturacion,:statusFacturacion,:observaciones)");

		$stmt->bindParam(":serie", $datos5["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos5["folio"], PDO::PARAM_STR);
		$stmt->bindParam(":estadoOrden", $datos5["estadoOrden"],PDO::PARAM_INT);
		$stmt->bindParam(":estadoAlmacen", $datos5["estadoAlmacen"],PDO::PARAM_INT);
		$stmt->bindParam(":statusAlmacen", $datos5["statusAlmacen"],PDO::PARAM_INT);
		$stmt->bindParam(":estadoFacturacion", $datos5["estadoFacturacion"],PDO::PARAM_INT);
		$stmt->bindParam(":statusFacturacion", $datos5["statusFacturacion"],PDO::PARAM_INT);
		$stmt->bindParam(":observaciones", $datos5["observaciones"],PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
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
	static public function mdlEditarOrdenTrabajo($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET creado = :creado, numeroPartidas = :numeroPartidas, numeroUnidades = :numeroUnidades, importe = :importe, fechaRecepcion = :fechaRecepcion, fechaElaboracion = :fechaElaboracion, tipoRuta = :tipoRuta, observaciones = :observaciones, comentarios = :comentarios WHERE id = :id");

		
		$stmt->bindParam(":creado", $datos["creado"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroPartidas", $datos["numeroPartidas"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroUnidades", $datos["numeroUnidades"], PDO::PARAM_STR);
		$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaElaboracion", $datos["fechaElaboracion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRuta", $datos["tipoRuta"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_INT);
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
	static public function mdlActualizarTiempoProcesoEstatus($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE estatusordenes INNER JOIN ordenesdetrabajo ON estatusordenes.folio = ordenesdetrabajo.folio  SET estatusordenes.tiempoProceso = ordenesdetrabajo.tiempoProceso  WHERE estatusordenes.folio = :folio");

		$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarEstatusOrdenes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT ordenesdetrabajo.fechaOrden,facturasordenes.serieFactura, facturasordenes.folioFactura,ordenesdetrabajo.nombreCliente,estatusordenes.* FROM ordenesdetrabajo  LEFT OUTER JOIN  estatusordenes ON ordenesdetrabajo.folio = estatusordenes.folio  LEFT OUTER JOIN  facturasordenes ON ordenesdetrabajo.folio = facturasordenes.folio WHERE ordenesdetrabajo.folio = estatusordenes.folio GROUP BY folio");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

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
	static public function mdlRegistroBitacoraReporteEstatus($tabla, $datos){

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
	static public function mdlActualizarObservacionesAlmacenOt($tabla,$tabla2,$datos5){


			if($datos5["observaciones"] == 1){

				$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.folio SET $tabla2.observaciones = $tabla.observaciones, $tabla2.estado = :estado, $tabla2.pendiente = :pendiente, $tabla2.activo = :activo WHERE $tabla2.folio = :folio");

				$stmt->bindParam(":folio", $datos5["folio"], PDO::PARAM_INT);
				$stmt->bindParam(":estado", $datos5["estado"], PDO::PARAM_INT);
				$stmt->bindParam(":pendiente", $datos5["pendiente"], PDO::PARAM_INT);
				$stmt->bindParam(":activo", $datos5["activo"], PDO::PARAM_INT);

			}else {

				$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.folio SET $tabla2.observaciones = $tabla.observaciones, $tabla2.estado = :estado, $tabla2.pendiente = :pendiente, $tabla2.status = :status, $tabla2.tiempoProceso = :tiempoProceso, $tabla2.activo = :activo WHERE $tabla2.folio = :folio");

				$stmt->bindParam(":folio", $datos5["folio"], PDO::PARAM_INT);
				$stmt->bindParam(":estado", $datos5["estado"], PDO::PARAM_INT);
				$stmt->bindParam(":pendiente", $datos5["pendiente"], PDO::PARAM_INT);
				$stmt->bindParam(":status", $datos5["status"], PDO::PARAM_INT);
				$stmt->bindParam(":tiempoProceso", $datos5["tiempoProceso"], PDO::PARAM_STR);
				$stmt->bindParam(":activo", $datos5["activo"], PDO::PARAM_INT);
				

			}


			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlActualizarObservacionesFacturacionOt($tabla,$tabla3,$datos6){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 INNER JOIN $tabla ON $tabla3.folio = $tabla.folio SET $tabla3.observaciones = $tabla.observaciones, $tabla3.estado = :estado, $tabla3.facturaPendiente = :facturaPendiente, $tabla3.activo = :activo WHERE $tabla3.folio = :folio");

			$stmt->bindParam(":folio", $datos6["folio"], PDO::PARAM_INT);
			$stmt->bindParam(":estado", $datos6["estado"], PDO::PARAM_INT);
			$stmt->bindParam(":facturaPendiente", $datos6["facturaPendiente"], PDO::PARAM_INT);
			$stmt->bindParam(":activo", $datos6["activo"], PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlActualizarObservacionesEstatusOt($tabla, $tabla5, $datos7){

			if ($datos7["observaciones"] == 1) {

				$stmt = Conexion::conectar()->prepare("UPDATE $tabla5 INNER JOIN $tabla ON $tabla5.folio = $tabla.folio SET $tabla5.observaciones = :observaciones WHERE $tabla5.folio = :folio");

				$stmt->bindParam(":folio", $datos7["folio"], PDO::PARAM_INT);
				$stmt->bindParam(":observaciones", $datos7["observaciones"], PDO::PARAM_INT);

				
			}else{

				$stmt = Conexion::conectar()->prepare("UPDATE $tabla5 INNER JOIN $tabla ON $tabla5.folio = $tabla.folio SET $tabla5.estadoAlmacen = :estadoAlmacen, $tabla5.statusAlmacen = :statusAlmacen,$tabla5.tiempoAlmacen = :tiempoAlmacen,$tabla5.observaciones = :observaciones WHERE $tabla5.folio = :folio");

				$stmt->bindParam(":folio", $datos7["folio"], PDO::PARAM_INT);
				$stmt->bindParam(":estadoAlmacen", $datos7["estadoAlmacen"], PDO::PARAM_INT);
				$stmt->bindParam(":statusAlmacen", $datos7["statusAlmacen"], PDO::PARAM_INT);
				$stmt->bindParam(":tiempoAlmacen", $datos7["tiempoAlmacen"], PDO::PARAM_STR);
				$stmt->bindParam(":observaciones", $datos7["observaciones"], PDO::PARAM_INT);



			}

			
	

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}


    
}

?>