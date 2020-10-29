<?php

require_once "conexion.php";

class ModeloLogistica{

	/*=============================================
	MOSTRAR LOGISTICA
	=============================================*/
	/*

	static public function mdlMostrarLogistica($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idPedido asc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	*/
	/*=============================================
	MOSTRAR LOGISTICA
	=============================================*/

	static public function mdlMostrarLogistica($tabla, $item, $valor, $idUsuario){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else if($idUsuario != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where ruta = :idUsuario  ORDER BY idPedido asc");

			$stmt -> bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

			
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idPedido asc");

			$stmt -> execute();

			return $stmt -> fetchAll();


		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR LOGISTICA EDICION
	=============================================*/

	static public function mdlMostrarLogisticaEdicion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR TIEMPO SEGUNDOS
	=============================================*/
	static public function mdlMostrarTiempoSegundos($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoSec = TIME_TO_SEC(tiempoProceso), tiempoAlmacenSec = TIME_TO_SEC(tiempoAlmacen),tiempoLaboratorioSec = TIME_TO_SEC(tiempoLaboratorio), tiempoFacturacionSec = TIME_TO_SEC(tiempoFacturacion), tiempoComprasSec = TIME_TO_SEC(tiempoCompras), tiempoLogisticaSec = TIME_TO_SEC(tiempoLogistica)");

			if ($stmt -> execute()) {

				return "ok";

			}else{

				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	MOSTRAR TIEMPO SEGUNDOS EDICION
	=============================================*/
	static public function mdlMostrarTiempoSegundosEdicion($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoSec = TIME_TO_SEC(tiempoProceso), tiempoAlmacenSec = TIME_TO_SEC(tiempoAlmacen),tiempoLaboratorioSec = TIME_TO_SEC(tiempoLaboratorio), tiempoFacturacionSec = TIME_TO_SEC(tiempoFacturacion), tiempoComprasSec = TIME_TO_SEC(tiempoCompras), tiempoLogisticaSec = TIME_TO_SEC(tiempoLogistica) where folio = :idPedido and serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {

				return "ok";

			}else{

				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	static public function mdlMostrarTiempoProceso($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.tiempoLogistica = $tabla.tiempoProceso WHERE $tabla2.folio = $tabla.idPedido;
");

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	MOSTRAR TIEMPO PROCESO EDICION
	=============================================*/
	static public function mdlMostrarTiempoProcesoEdicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.tiempoLogistica = $tabla.tiempoProceso WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}

	/*=============================================
	MOSTRAR TIEMPO FINAL EDICION
	=============================================*/
	static public function mdlMostrarTiempoFinalEdicion($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tiempoFinal = $tabla.tiempoSec+$tabla.tiempoAlmacenSec+$tabla.tiempoLaboratorioSec+$tabla.tiempoComprasSec+$tabla.tiempoFacturacionSec+$tabla.tiempoLogisticaSec where folio = :idPedido and serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);


			if ($stmt -> execute()) {

				return "ok";

			}else{

				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR TIPO RUTA
	=============================================*/
	static public function mdlActualizarTipoRuta($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio
SET $tabla2.tipoRuta = $tabla.tipoRuta WHERE $tabla2.idPedido = $tabla.folio;
");

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR STATUS RUTA
	=============================================*/

	static public function mdlActualizarRuta($tabla, $item1, $valor1, $item2, $valor2){

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
	/*=============================================
	MOSTRAR PEDIDOS DETENIDOS
	=============================================*/
	static public function mdlMostrarPedidosDetenidos($tabla, $item, $valor){
		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLogistica) as pedidosDetenidos from  $tabla WHERE statusLogistica = 0 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLogistica) as pedidosDetenidos from  $tabla WHERE statusLogistica = 0");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS DETENIDOS
	=============================================*/
	static public function mdlMostrarPedidosDetenidos2($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLogistica) as pedidosDetenidosLogistica from  $tabla WHERE statusLogistica = 0 and estadoLogistica = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLogistica) as pedidosDetenidosLogistica from  $tabla WHERE statusLogistica = 0 and estadoLogistica = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS RUTA
	=============================================*/
	static public function mdlMostrarPedidosRuta($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLogistica) as pedidosRuta from  $tabla WHERE statusLogistica = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLogistica) as pedidosRuta from  $tabla WHERE statusLogistica = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS ENTREGADOS
	=============================================*/
	static public function mdlMostrarPedidosEntregados($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLogistica) as pedidosEntregados from  $tabla WHERE statusLogistica = 2 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLogistica) as pedidosEntregados from  $tabla WHERE statusLogistica = 2");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	SEGUIR PEDIDO
	=============================================*/

	static public function mdlSeguirPedidos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idPedido, usuario, serie, fechaRecepcion, fechaProgramada, status, tipoRuta, fechaEntregaCliente, observaciones, estado, concluido) VALUES (:idPedido, :usuario, :serie, :fechaRecepcion, :fechaProgramada, :status, :tipoRuta, :fechaEntregaCliente, :observaciones, :estado, :concluido)");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaProgramada", $datos["fechaProgramada"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":tipoRuta", $datos["tipoRuta"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaEntregaCliente", $datos["fechaEntregaCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":concluido", $datos["concluido"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	static public function mdlActualizarTiempoProceso($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaEntregaCliente,fechaRecepcion) where idPedido = :idPedido and serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;


	}

	/*=============================================
	ACTUALIZAR ESTADO LOGISTICA
	=============================================*/
	static public function mdlActualizarEstadoLogistica($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.estadoLogistica = $tabla.estado WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR ESTADO CONCLUIDO
	=============================================*/

	static public function mdlActualizarConcluido($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.concluido = $tabla.concluido WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR CANCELADO
	=============================================*/

	static public function mdlActualizarCancelado($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.cancelado = $tabla.pendiente WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}

	/*=============================================
	ACTUALIZAR STATUS LOGISTICA
	=============================================*/
	static public function mdlActualizarStatusLogistica($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.statusLogistica = $tabla.status WHERE $tabla2.folio = $tabla.idPedido;
");

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR STATUS LOGISTICA EDICION
	=============================================*/
	static public function mdlActualizarStatusLogisticaEdicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.statusLogistica = $tabla.status WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}

	/*=============================================
	EDITAR LOGISTICA PEDIDO
	=============================================*/

	static public function mdlEditarPedidos($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, serie = :serie, idPedido = :idPedido, fechaRecepcion = :fechaRecepcion, fechaProgramada = :fechaProgramada, status = :status, tipoRuta = :tipoRuta, operador = :operador,  fechaEntregaCliente = :fechaEntregaCliente, observaciones = :observaciones, estado = :estado, concluido = :concluido, pendiente = :pendiente WHERE idPedido = :idPedido and serie = :serie");

		
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaProgramada", $datos["fechaProgramada"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":tipoRuta", $datos["tipoRuta"], PDO::PARAM_STR);
		$stmt->bindParam(":operador", $datos["operador"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaEntregaCliente", $datos["fechaEntregaCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":concluido", $datos["concluido"], PDO::PARAM_INT);
		$stmt->bindParam(":pendiente", $datos["pendiente"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CANCELAR PEDIDO LOGISTICA
	=============================================*/

	static public function mdlEliminarPedidoLogistica($tabla5, $datos5){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla5 set status = 0, estado = 0,pendiente = 2 WHERE idPedido = :idPedido and serie = :serie");

		$stmt -> bindParam(":idPedido", $datos5["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos5["serie"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	CANCELAR PEDIDO
	=============================================*/

	static public function mdlEliminarPedido($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	REGISTRO BITACORA
	=============================================*/
	static public function mdlRegistroBitacora($tabla, $datos){

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
	/*=============================================
	REGISTRO BITACORA REPORTE
	=============================================*/
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
	/*=============================================
	ACTUALIZAR ESTADO PEDIDO
	=============================================*/
	static public function mdlActualizarEstadoPedido($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio and $tabla2.serie = $tabla.serie SET $tabla2.estadoPedido = $tabla.estado WHERE $tabla2.idPedido = :folio and $tabla2.serie = :serie");

			$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	




}