<?php
error_reporting(E_ALL);
require_once "conexion.php";


class ModeloTickets{

	static public function mdlVerListaTickets($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT  et.*,a.nombre as autor,d.nombreDepartamento departamentoAutor,de.nombreDepartamento departamentoAsignado,t.idTicket,t.seriePedido,t.folioPedido,t.serieFactura,t.folioFactura,t.titulo,t.contenido,t.prioridad,t.cerrado,t.fecha,t.comentarios FROM estatustickets as et INNER JOIN administradores as a ON a.id = et.idAutor INNER JOIN departamento as d ON d.id = et.idDepartamentoAutor  INNER JOIN departamento as de ON de.id = et.idDepartamento INNER JOIN ticket as t ON t.numeroTicket = et.numeroTicket WHERE  et.usuarioDepartamento = :$item GROUP by numeroTicket");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  t.*,a.nombre as autor,d.nombreDepartamento as departamentoAutor,de.nombreDepartamento as departamento FROM $tabla as t LEFT OUTER JOIN administradores as a ON a.id = t.idAutor LEFT OUTER JOIN departamento as d ON d.id = t.idDepartamento  LEFT OUTER JOIN departamento as de ON t.departamentoAsignado = de.id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlVerListaTicketsCreados($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT  et.*,a.nombre as autor,d.nombreDepartamento departamentoAutor,de.nombreDepartamento departamentoAsignado,t.idTicket,t.seriePedido,t.folioPedido,t.serieFactura,t.folioFactura,t.titulo,t.contenido,t.prioridad,t.cerrado,t.fecha,t.comentarios,t.estatus FROM estatustickets as et INNER JOIN administradores as a ON a.id = et.idAutor INNER JOIN departamento as d ON d.id = et.idDepartamentoAutor  INNER JOIN departamento as de ON de.id = et.idDepartamento INNER JOIN ticket as t ON t.numeroTicket = et.numeroTicket WHERE  et.idAutor = :$item GROUP by numeroTicket");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  t.*,a.nombre as autor,d.nombreDepartamento as departamentoAutor,de.nombreDepartamento as departamento FROM $tabla as t INNER JOIN administradores as a ON a.id = t.idAutor INNER JOIN departamento as d ON d.id = t.idDepartamento  INNER JOIN departamento as de ON t.departamentoAsignado = de.id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}


	static public function mdlMostrarDetallesTicket($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT  et.*,a.nombre as autor,d.nombreDepartamento departamentoAutor,de.nombreDepartamento departamentoAsignado,t.idTicket,t.seriePedido,t.folioPedido,t.serieFactura,t.folioFactura,t.titulo,t.contenido,t.prioridad,t.cerrado,t.fecha,t.comentarios, at.rutaPedido, at.rutaFactura FROM estatustickets as et INNER JOIN administradores as a ON a.id = et.idAutor INNER JOIN departamento as d ON d.id = et.idDepartamentoAutor  INNER JOIN departamento as de ON de.id = et.idDepartamento INNER JOIN ticket as t ON t.numeroTicket = et.numeroTicket INNER JOIN archivostickets as at ON at.numeroTicket = et.numeroTicket  WHERE t.$item = :$item order by id asc LIMIT 1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  et.*,a.nombre as autor,d.nombreDepartamento departamentoAutor,de.nombreDepartamento departamentoAsignado,t.idTicket,t.seriePedido,t.folioPedido,t.serieFactura,t.folioFactura,t.titulo,t.contenido,t.prioridad,t.cerrado,t.fecha,t.comentarios, at.rutaPedido, at.rutaFactura FROM estatustickets as et INNER JOIN administradores as a ON a.id = et.idAutor INNER JOIN departamento as d ON d.id = et.idDepartamentoAutor  INNER JOIN departamento as de ON de.id = et.idDepartamento INNER JOIN ticket as t ON t.numeroTicket = et.numeroTicket INNER JOIN archivostickets as at ON at.numeroTicket = et.numeroTicket");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlMostrarDetallesTicket2($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT  et.*,a.nombre as autor,d.nombreDepartamento departamentoAutor,de.nombreDepartamento departamentoAsignado,t.idTicket,t.seriePedido,t.folioPedido,t.serieFactura,t.folioFactura,t.titulo,t.contenido,t.prioridad,t.cerrado,t.fecha,t.comentarios, at.rutaPedido, at.rutaFactura FROM estatustickets as et INNER JOIN administradores as a ON a.id = et.idAutor INNER JOIN departamento as d ON d.id = et.idDepartamentoAutor  INNER JOIN departamento as de ON de.id = et.idDepartamento INNER JOIN ticket as t ON t.numeroTicket = et.numeroTicket INNER JOIN archivostickets as at ON at.numeroTicket = et.numeroTicket  WHERE t.$item = :$item order by id desc LIMIT 1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  et.*,a.nombre as autor,d.nombreDepartamento departamentoAutor,de.nombreDepartamento departamentoAsignado,t.idTicket,t.seriePedido,t.folioPedido,t.serieFactura,t.folioFactura,t.titulo,t.contenido,t.prioridad,t.cerrado,t.fecha,t.comentarios, at.rutaPedido, at.rutaFactura FROM estatustickets as et INNER JOIN administradores as a ON a.id = et.idAutor INNER JOIN departamento as d ON d.id = et.idDepartamentoAutor  INNER JOIN departamento as de ON de.id = et.idDepartamento INNER JOIN ticket as t ON t.numeroTicket = et.numeroTicket INNER JOIN archivostickets as at ON at.numeroTicket = et.numeroTicket");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}


	static public function mdlMostrarComentariosTicket($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT e.*,a.nombre,d.nombreDepartamento FROM $tabla as e INNER JOIN administradores as a ON e.idAutorUser = a.id INNER JOIN departamento as d ON e.idAutorDepartamento = d.id WHERE $item = :$item AND tipo = 'COMMENT'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT e.*,a.nombre,d.nombreDepartamento FROM $tabla as e INNER JOIN administradores as a ON e.idAutorUser = a.id INNER JOIN departamento as d ON e.idAutorDepartamento = d.id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO LOGS TICKETS
	=============================================*/
	static public function mdlRegistroLogs($tabla2, $datos2){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(tipo, numeroTicket, idAutorDepartamento, idAutorUser) VALUES(:tipo, :numeroTicket, :idAutorDepartamento, :idAutorUser)");

		$stmt->bindParam(":tipo", $datos2["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroTicket", $datos2["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutorDepartamento", $datos2["idAutorDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutorUser", $datos2["idAutorUser"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	/*=============================================
	REGISTRO LOGS TICKETS
	=============================================*/
	static public function mdlRegistroLogsEvento($tabla5, $datos5){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla5(tipo, idTicket, idAutorDepartamento, idAutorUser) VALUES(:tipo, :idTicket, :idAutorDepartamento, :idAutorUser)");

		$stmt->bindParam(":tipo", $datos5["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":idTicket", $datos5["idTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutorDepartamento", $datos5["idAutorDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutorUser", $datos5["idAutorUser"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	/*=============================================
	RESPUESTA TICKET
	=============================================*/

	static public function mdlRespuestaTicket($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo,contenido, idTicket,idAutorDepartamento,idAutorUser) VALUES (:tipo,:contenido,:idTicket,:idAutorDepartamento,:idAutorUser)");

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
		$stmt->bindParam(":idTicket", $datos["idTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutorDepartamento", $datos["idAutorDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutorUser", $datos["idAutorUser"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	static public function mdlMostrarDepartamentos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}
	/* 	OBTENER EL ULTIMO ID DE TICKETS */
	
	static public function mdlObtenerUltimoId(){

		$stmt = Conexion::conectar()->prepare("SELECT CASE WHEN MAX(numeroTicket) +1 IS NULL THEN 1 ELSE MAX(numeroTicket) +1 END AS ultimoId from ticket");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	CREAR TICKET
	=============================================*/

	static public function mdlCrearTicket($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numeroTicket,seriePedido, folioPedido, serieFactura, folioFactura, titulo,contenido,prioridad,idAutor,idDepartamento,departamentoAsignado,usuarioAsignado) VALUES (:numeroTicket,:seriePedido, :folioPedido, :serieFactura, :folioFactura, :titulo,:contenido,:prioridad,:idAutor,:idDepartamento,:departamentoAsignado,:usuarioAsignado)");

		$stmt->bindParam(":numeroTicket", $datos["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":seriePedido", $datos["seriePedido"], PDO::PARAM_STR);
		$stmt->bindParam(":folioPedido", $datos["folioPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serieFactura", $datos["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $datos["folioFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutor", $datos["idAutor"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamento", $datos["idDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":departamentoAsignado", $datos["departamentoAsignado"], PDO::PARAM_INT);
		$stmt->bindParam(":usuarioAsignado", $datos["usuarioAsignado"], PDO::PARAM_INT);

		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlObtenerTotalComentarios($tabla,$item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT($item) + 1 as totalComentarios FROM $tabla  WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}
	/*=============================================
	ACTUALIZAR CANTIDAD DE COMENTARIOS
	=============================================*/
	static public function mdlContarComentarios($tabla3, $datos3){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET comentarios = :comentarios WHERE idTicket = :idTicket");

			$stmt->bindParam(":idTicket", $datos3["idTicket"], PDO::PARAM_INT);
			$stmt->bindParam(":comentarios", $datos3["comentarios"], PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	CREAR REGISTRO DEPARTAMENTO
	=============================================*/

	static public function mdlRegistroDepartamento($tabla3, $datos3){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla3(numeroTicket,idDepartamento,usuarioDepartamento) VALUES (:numeroTicket,:idDepartamento,:usuarioDepartamento)");

		$stmt->bindParam(":numeroTicket", $datos3["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamento", $datos3["idDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":usuarioDepartamento", $datos3["usuarioDepartamento"], PDO::PARAM_INT);

		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	CREAR REGISTRO DEPARTAMENTO
	=============================================*/

	static public function mdlRegistroDepartamento2($tabla5, $datos5){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla5(numeroTicket,idDepartamento,usuarioDepartamento) VALUES (:numeroTicket,:idDepartamento,:usuarioDepartamento)");

		$stmt->bindParam(":numeroTicket", $datos5["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamento", $datos5["idDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":usuarioDepartamento", $datos5["usuarioDepartamento"], PDO::PARAM_INT);


		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	CERRAR TICKET
	=============================================*/

	static public function mdlCerrarTicket($tabla3, $datos3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 set cerrado = 1 WHERE idTicket = :idTicket");

		$stmt -> bindParam(":idTicket", $datos3["idNumeroTicket"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	ARMADO DE ESTATUS TICKETS
	=============================================*/

	static public function mdlRegistrarProgreso($tabla4, $datos4){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla4(numeroTicket,idDepartamento) VALUES (:numeroTicket,:idDepartamento)");

		$stmt->bindParam(":numeroTicket", $datos4["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamento", $datos4["idDepartamento"], PDO::PARAM_INT);
		

		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	static public function mdlVerEstatusTickets($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT  et.*,d.nombreDepartamento as departamentoAsignado,t.idTicket,t.prioridad,t.cerrado, a.nombre as autor,ad.nombre as usuarioDepartamento,t.fecha FROM estatustickets as et INNER JOIN ticket as t ON t.numeroTicket = et.numeroTicket INNER JOIN departamento as d ON d.id = et.idDepartamento  INNER JOIN administradores as a ON a.id = t.idAutor INNER JOIN administradores as ad ON ad.id = IF (et.usuarioDepartamento = 0,t.idAutor,et.usuarioDepartamento) WHERE  et.$item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt-> close();

			$stmt = null;

	}
	static public function mdlVerEstatusTicketsG($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT  et.*,d.nombreDepartamento as departamentoAsignado,t.idTicket,t.prioridad,t.cerrado, a.nombre as autor,t.fecha FROM $tabla as et INNER JOIN ticket as t ON t.numeroTicket = et.numeroTicket INNER JOIN departamento as d ON d.id = et.idDepartamento INNER JOIN administradores as a ON a.id = t.idAutor GROUP BY numeroTicket");

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt-> close();

			$stmt = null;

	}
	/*=============================================
	CREAR REGISTRO ESTATUS
	=============================================*/

	static public function mdlReasignarDepartamento($tabla4, $datos4){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla4(numeroTicket,idDepartamento,usuarioDepartamento,idAutor,idDepartamentoAutor,clase,aprobado) VALUES (:numeroTicket,:idDepartamento,:usuarioDepartamento,:idAutor,:idDepartamentoAutor,:clase,:aprobado)");

		$stmt->bindParam(":numeroTicket", $datos4["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamento", $datos4["idDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":usuarioDepartamento", $datos4["usuarioDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutor", $datos4["idAutor"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamentoAutor", $datos4["idDepartamentoAutor"], PDO::PARAM_INT);
		$stmt->bindParam(":clase", $datos4["clase"], PDO::PARAM_STR);
		$stmt->bindParam(":aprobado", $datos4["aprobado"], PDO::PARAM_INT);

		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	CREAR REGISTRO ESTATUS PRIMER TICKET
	=============================================*/

	static public function mdlRegistroTicket($datos6){

		$stmt = Conexion::conectar()->prepare("INSERT INTO estatustickets(numeroTicket,idDepartamento,idAutor,idDepartamentoAutor,clase,aprobado) VALUES (:numeroTicket,:idDepartamento,:idAutor,:idDepartamentoAutor,:clase,:aprobado)");

		$stmt->bindParam(":numeroTicket", $datos6["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamento", $datos6["idDepartamento"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutor", $datos6["idAutor"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamentoAutor", $datos6["idDepartamentoAutor"], PDO::PARAM_INT);
		$stmt->bindParam(":clase", $datos6["clase"], PDO::PARAM_STR);
		$stmt->bindParam(":aprobado", $datos6["aprobado"], PDO::PARAM_INT);

		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	APROBAR TICKETS
	=============================================*/

	static public function mdlAprobarTicket($tabla4, $datos6){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla4 set clase = :clase , aprobado = :aprobado, fechaAprobado = NOW() WHERE numeroTicket = :numeroTicket and usuarioDepartamento = :usuarioDepartamento");

		$stmt -> bindParam(":numeroTicket", $datos6["numeroTicket"], PDO::PARAM_INT);
		$stmt -> bindParam(":usuarioDepartamento", $datos6["usuarioDepartamento"], PDO::PARAM_INT);
		$stmt -> bindParam(":clase", $datos6["clase"], PDO::PARAM_STR);
		$stmt -> bindParam(":aprobado", $datos6["aprobado"], PDO::PARAM_INT);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	static public function mdlActualizarTiempoProceso($tabla4, $datos6){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla4 set tiempoSecond = TIMEDIFF(fechaAprobado, tiempoProceso), seconds = TIME_TO_SEC(tiempoSecond) where numeroTicket = :numeroTicket and usuarioDepartamento = :usuarioDepartamento");

			$stmt -> bindParam(":numeroTicket", $datos6["numeroTicket"], PDO::PARAM_INT);
			$stmt -> bindParam(":usuarioDepartamento", $datos6["usuarioDepartamento"], PDO::PARAM_INT);


			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";

			}
			$stmt -> close();

			$stmt = null;


	}
	static public function mdlObtenerTotalDepartamentos($tabla4,$item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(seconds) as totalDepartamentos FROM $tabla4  WHERE numeroTicket = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlCerrarEstatus($tabla4, $datos4){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla4 set tiempoFinal = :tiempoFinal, cerrado = :cerrado where numeroTicket = :numeroTicket");

			$stmt -> bindParam(":numeroTicket", $datos4["numeroTicket"], PDO::PARAM_INT);
			$stmt -> bindParam(":tiempoFinal", $datos4["tiempoFinal"], PDO::PARAM_INT);
			$stmt -> bindParam(":cerrado", $datos4["cerrado"], PDO::PARAM_INT);

			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";

			}
			$stmt -> close();

			$stmt = null;


	}
	/*INICIAN LOS MODELOS PARA LOS INDICADORES */

	static public function mdlMostrarTotalTickets($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(idTicket) as totalTickets from $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlMostrarTotalMisTickets($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(numeroTicket) as totalMisTickets from $tabla  where usuarioDepartamento = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlMostrarTicketsCerrados($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(numeroTicket) as totalCerrados from $tabla where cerrado = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlMostrarTicketsAbiertos($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(numeroTicket) as totalAbiertos from $tabla where cerrado = 0");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlMostrarTotalDepartamentos($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as totalDepartamentos from $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlMostrarTotalUsuarios($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as totalUsuarios from $tabla where departamento != 0");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlMostrarTicketsPorDpto($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT d.id,d.nombreDepartamento as departamento, COUNT(numeroTicket) as total FROM $tabla AS dt INNER JOIN departamento AS d ON d.id = dt.idDepartamento GROUP by idDepartamento");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlMostrarMisActividades($tabla, $item, $valor){

			if ($item != NULL) {

				$stmt = Conexion::conectar()->prepare("SELECT et.*,adm.nombre,t.numeroTicket FROM $tabla as et INNER JOIN administradores as adm ON et.idAutorUser = adm.id INNER JOIN ticket as t ON et.idTicket = t.idTicket where $item = :$item ORDER BY fecha desc");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

				$stmt -> execute();

				return $stmt -> fetchAll();

				
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT et.*,adm.nombre,t.numeroTicket FROM $tabla as et INNER JOIN administradores as adm ON et.idAutorUser = adm.id INNER JOIN ticket as t ON et.idTicket = t.idTicket ORDER BY fecha desc limit 100");

				$stmt -> execute();

				return $stmt -> fetchAll();


			}
				$stmt-> close();

				$stmt = null;
		
	}
	static public function mdlMostrarUltimasConexiones($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT et.*,adm.nombre FROM $tabla as et INNER JOIN administradores as adm ON et.idAutorUser = adm.id where tipo = 'LOGIN' ORDER BY fecha desc limit 100");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}
	/*=============================================
	ADJUNTAR ARCHIVOS
	=============================================*/
	static public function mdlAdjuntarPedidoTickets($tabla6, $datos6){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla6(numeroTicket, idAutor, idDepartamentoAutor,rutaPedido) VALUES(:numeroTicket, :idAutor, :idDepartamentoAutor, :rutaPedido)");

		
		$stmt->bindParam(":numeroTicket", $datos6["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":idAutor", $datos6["idAutor"], PDO::PARAM_INT);
		$stmt->bindParam(":idDepartamentoAutor", $datos6["idDepartamentoAutor"], PDO::PARAM_INT);
		$stmt->bindParam(":rutaPedido", $datos6["rutaPedido"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlAdjuntarFacturaTickets($tabla6, $datos6){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla6 set rutaFactura = :rutaFactura where numeroTicket = :numeroTicket");

		
		$stmt->bindParam(":numeroTicket", $datos6["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":rutaFactura", $datos6["rutaFactura"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlMostrarListaDepartamentos($tabla, $item, $valor){

			if ($item != NULL) {

				$stmt = Conexion::conectar()->prepare("SELECT ad.id, ad.nombre,dpto.id as idDepartamento FROM administradores as ad INNER JOIN departamento as dpto ON dpto.id = ad.departamento where dpto.$item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

				$stmt -> execute();

				return $stmt -> fetchAll();

				
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * from $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();


			}
				$stmt-> close();

				$stmt = null;
		
	}
	/*=============================================
	TICKET VISTO
	=============================================*/
	static public function mdlActualizarVisto($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	GUARDAR NOTIFICACION DE TICKET
	=============================================*/
	static public function mdlGuardarNotificacion($tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(titulo, folioTicket,autorTicket, autorComentario) VALUES(:titulo, :folioTicket,:autorTicket, :autorComentario)");

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":folioTicket", $datos["folioTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":autorTicket", $datos["autorTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":autorComentario", $datos["autorComentario"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	/*=============================================
	GUARDAR NOTIFICACION DE TICKET
	=============================================*/
	static public function mdlGuardarNotificacionTicket($tabla7, $datosTicket){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla7(titulo, folioTicket,autorTicket, autorComentario) VALUES(:titulo, :folioTicket,:autorTicket, :autorComentario)");

		$stmt->bindParam(":titulo", $datosTicket["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":folioTicket", $datosTicket["folioTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":autorTicket", $datosTicket["autorTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":autorComentario", $datosTicket["autorComentario"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR NUMERO DE SOLICITUD
	=============================================*/
	static public function mdlActualizarSolicitudTicket($datosSolicitud){

			$stmt = Conexion::conectar()->prepare("UPDATE facturastiendas set idSolicitud = :idSolicitud, motivoCancelacion = :motivoCancelacion where id = :id");

		$stmt->bindParam(":id", $datosSolicitud["idFacturaSolicitud"], PDO::PARAM_INT);
		$stmt->bindParam(":idSolicitud", $datosSolicitud["numeroTicket"], PDO::PARAM_INT);
		$stmt->bindParam(":motivoCancelacion", $datosSolicitud["motivoCancelacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	/*=============================================
	TICKET VISTO
	=============================================*/
	static public function mdlActualizarVistoAprobado($item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE estatustickets SET estatus = 2 WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarTicketsPendientesPorDepartamento($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT ad.nombre as usuario,count(numeroTicket) as total FROM estatustickets as est INNER JOIN administradores  as ad ON est.usuarioDepartamento = ad.id where $item = :$item and clase = 'PAUSED' and aprobado = 0 and cerrado = 0 GROUP by usuarioDepartamento");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	



}

?>