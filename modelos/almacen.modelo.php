<?php

require_once "conexion.php";

class ModeloAlmacen{

	/*=============================================
	MOSTRAR ALMACEN
	=============================================*/

	static public function mdlMostrarAlmacen($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idPedido asc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR ALMACEN EDICIÓN
	=============================================*/

	static public function mdlMostrarAlmacenEdicion($tabla, $item, $valor){

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
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	static public function mdlMostrarTiempoProceso($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.tiempoAlmacen = $tabla.tiempoProceso WHERE $tabla2.folio = $tabla.idPedido;
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
	ACTUALIZAR COMPRA
	=============================================*/
	static public function mdlActualizarCompra($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido
SET $tabla2.tipoCompra = $tabla.tipoCompra WHERE $tabla2.idPedido = $tabla.idPedido;");

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR COMPRA EDICION
	=============================================*/
	static public function mdlActualizarCompraEdicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.tipoCompra = $tabla.tipoCompra WHERE $tabla2.idPedido = :idPedido and $tabla2.serie = :serie");

			$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

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

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.tiempoAlmacen = $tabla.tiempoProceso WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

			$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR PARTIDAS
	=============================================*/
	static public function mdlActualizarPartidas($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set numeroPartidas = :numeroPartidas WHERE idPedido = :idPedido and serie = :serie");

			$stmt->bindParam(":numeroPartidas", $datos["numeroPartidas"], PDO::PARAM_INT);
			$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR UNIDADES
	=============================================*/
	static public function mdlActualizarUnidades($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set numeroUnidades = :numeroUnidades WHERE idPedido = :idPedido and serie = :serie");

			$stmt->bindParam(":numeroUnidades", $datos["numeroUnidades"], PDO::PARAM_STR);
			$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR IMPORTE
	=============================================*/
	static public function mdlActualizarImporte($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set importeTotal = :importeTotal WHERE idPedido = :idPedido and serie = :serie");

			$stmt->bindParam(":importeTotal", $datos["importeTotal"], PDO::PARAM_STR);
			$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
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

					$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusAlmacen) as pedidosDetenidos from $tabla WHERE statusAlmacen=0 && estadoAlmacen = 1 and estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

					$stmt -> execute();

					return $stmt -> fetch();

				}else{

					$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusAlmacen) as pedidosDetenidos from $tabla WHERE statusAlmacen=0 && estadoAlmacen = 1 and estado = 1");

					$stmt -> execute();

					return $stmt -> fetch();

				}

				$stmt -> close();

				$stmt = null;


	}
	/*=============================================
	MOSTRAR PEDIDOS EN LABORATORIO
	=============================================*/
	static public function mdlMostrarPedidosEnLaboratorio($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusAlmacen) as pedidosLaboratorio from  $tabla WHERE statusAlmacen = 2 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusAlmacen) as pedidosLaboratorio from  $tabla WHERE statusAlmacen = 2");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS PENDIENTES
	=============================================*/
	static public function mdlMostrarPedidosPendientes($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(estadoAlmacen) as pedidosPendientes from  $tabla WHERE estadoAlmacen = 0 and estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(estadoAlmacen) as pedidosPendientes from  $tabla WHERE estadoAlmacen = 0 and estado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS PENDIENTES
	=============================================*/
	static public function mdlMostrarPedidosSuministrados($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusAlmacen) as pedidosSuministrados from  $tabla WHERE statusAlmacen = 3 and estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusAlmacen) as pedidosSuministrados from  $tabla WHERE statusAlmacen = 3 and estado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR STATUS PEDIDO
	=============================================*/

	static public function mdlActualizarPedido($tabla, $item1, $valor1, $item2, $valor2){

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
    HABILITAR PEDIDO
	=============================================*/

	static public function mdlHabilitarPedido($tabla, $item1, $valor1, $item2, $valor2){

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
	SEGUIR PEDIDO ALMACEN
	=============================================*/

	static public function mdlSeguirPedido($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idPedido, suministrado, serie, fechaRecepcion, fechaSuministro, fechaTermino, status, observaciones, tipoCompra, numeroPartidas, sumPartidas, numeroUnidades, sumUnidades, importeTotal, importeSurtido, estado) VALUES (:idPedido, :suministrado, :serie, :fechaRecepcion, :fechaSuministro, :fechaTermino, :status, :observaciones, :tipoCompra, :numeroPartidas, :sumPartidas,:numeroUnidades, :sumUnidades, :importeTotal, :importeSurtido, :estado)");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":suministrado", $datos["suministrado"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaSuministro", $datos["fechaSuministro"],PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino", $datos["fechaTermino"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoCompra", $datos["tipoCompra"], PDO::PARAM_INT);
		$stmt->bindParam(":numeroPartidas", $datos["numeroPartidas"], PDO::PARAM_INT);
		$stmt->bindParam(":sumPartidas", $datos["sumPartidas"], PDO::PARAM_INT);
		$stmt->bindParam(":numeroUnidades", $datos["numeroUnidades"], PDO::PARAM_INT);
		$stmt->bindParam(":sumUnidades", $datos["sumUnidades"], PDO::PARAM_INT);
		$stmt->bindParam(":importeTotal", $datos["importeTotal"], PDO::PARAM_STR);
		$stmt->bindParam(":importeSurtido", $datos["importeSurtido"], PDO::PARAM_STR);
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

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaTermino, fechaRecepcion) where idPedido = :idPedido and serie = :serie");

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
	ACTUALIZAR ESTADO
	=============================================*/
	static public function mdlActualizarEstadoAlmacen($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.estadoAlmacen = $tabla.estado WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR ESTADO PEDIDO
	=============================================*/
	static public function mdlActualizarEstadoPedido($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido AND $tabla2.serie = $tabla.serie SET $tabla2.estadoAlmacen = $tabla.estado WHERE $tabla2.idPedido = :idPedido AND $tabla2.serie = :serie");

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
	ACTUALIZAR STATUS PEDIDO
	=============================================*/
	static public function mdlActualizarStatusPedido($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido AND $tabla2.serie = $tabla.serie SET $tabla2.statusAlmacen = $tabla.status WHERE $tabla2.idPedido = :idPedido AND $tabla2.serie = :serie");

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
	ACTUALIZAR STATUS ALMACEN
	=============================================*/
	static public function mdlActualizarStatusAlmacen($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.statusAlmacen = $tabla.status WHERE $tabla2.folio = $tabla.idPedido");

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR TIPO COMPRA
	=============================================*/
	static public function mdlActualizarTipoCompra($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.tipoCompra = $tabla.tipoCompra WHERE $tabla2.folio = $tabla.idPedido");

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR STATUS ALMACEN EDICION
	=============================================*/
	static public function mdlActualizarStatusAlmacenEdicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.statusAlmacen = $tabla.status WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR TIPO COMPRA EDICION
	=============================================*/
	static public function mdlActualizarTipoCompraEdicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.tipoCompra = $tabla.tipoCompra WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	EDITAR PEDIDO
	=============================================*/

	static public function mdlEditarPedido($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET suministrado = :suministrado, serie = :serie, idPedido = :idPedido, fechaRecepcion = :fechaRecepcion, fechaSuministro = :fechaSuministro, fechaTermino = :fechaTermino, status = :status, observaciones = :observaciones, tipoCompra = :tipoCompra, numeroPartidas = :numeroPartidas, numeroUnidades = :numeroUnidades, importeTotal = :importeTotal, estado = :estado, habilitado = :habilitado, pendiente = :pendiente WHERE idPedido = :idPedido and serie = :serie");

		
		$stmt->bindParam(":suministrado", $datos["suministrado"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaSuministro", $datos["fechaSuministro"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino", $datos["fechaTermino"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":tipoCompra", $datos["tipoCompra"], PDO::PARAM_INT);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroPartidas", $datos["numeroPartidas"], PDO::PARAM_INT);
		$stmt->bindParam(":numeroUnidades", $datos["numeroUnidades"], PDO::PARAM_INT);
		$stmt->bindParam(":importeTotal", $datos["importeTotal"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":habilitado", $datos["habilitado"], PDO::PARAM_INT);
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
	CANCELAR PEDIDO ALMACEN
	=============================================*/

	static public function mdlEliminarPedidoAlmacen($tabla1, $datos1){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla1 set status = 0, estado = 0, pendiente = 2 WHERE idPedido = :idPedido and serie = :serie");

		$stmt -> bindParam(":idPedido", $datos1["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos1["serie"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	ELIMINAR PERFIL
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
	REGISTRO BITACORA AGREGAR
	=============================================*/
	static public function mdlRegistroBitacoraAgregar($tabla, $datos){

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