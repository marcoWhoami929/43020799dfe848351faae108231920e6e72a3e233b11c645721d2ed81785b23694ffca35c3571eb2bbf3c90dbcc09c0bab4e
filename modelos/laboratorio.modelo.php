<?php

require_once "conexion.php";

class ModeloLaboratorio{

	/*=============================================
	MOSTRAR LABORATORIO
	=============================================*/

	static public function mdlMostrarLaboratorio($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tieneIgualado = 1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}

	/*=============================================
	ACTUALIZAR ORDEN DE COMPRA
	=============================================*/
	static public function mdlActualizarOrdenCompra($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio and $tabla2.serie = $tabla.serie SET $tabla2.numeroOrden = $tabla.ordenCompra WHERE $tabla2.idPedido = :folio and $tabla2.serie = :serie");

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
	/*=============================================
	ACTUALIZAR TIENE IGUALADO
	=============================================*/
	static public function mdlActualizarTieneIgualado($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio and $tabla2.serie = $tabla.serie SET $tabla2.tieneIgualado = $tabla.tieneIgualado WHERE $tabla2.idPedido = :folio and $tabla2.serie = :serie");

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
	
	/*=============================================
	MOSTRAR LABORATORIO EDICIÓN
	=============================================*/

	static public function mdlMostrarLaboratorioEdicion($tabla, $item, $valor){

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
	MOSTRAR IGUALADOS
	=============================================*/

	static public function mdlMostrarIgualados($tabla, $item, $valor){

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
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	static public function mdlMostrarTiempoProceso($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.tiempoLaboratorio = $tabla.tiempoProceso WHERE $tabla2.folio = $tabla.idPedido;
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

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.tiempoLaboratorio = $tabla.tiempoProceso WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	MOSTRAR PEDIDOS DETENIDOS
	=============================================*/
	static public function mdlMostrarPedidosDetenidos($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(tieneIgualado) as pedidosDetenidos from  $tabla WHERE tieneIgualado = 1 and estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(tieneIgualado) as pedidosDetenidos from  $tabla WHERE tieneIgualado = 1 and estado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS PRODUCCION
	=============================================*/
	static public function mdlMostrarPedidosProduccion($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(tieneIgualado) as pedidosProduccion from  $tabla WHERE tieneIgualado = 0 and estado  = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(tieneIgualado) as pedidosProduccion from  $tabla WHERE tieneIgualado = 0 and estado  = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS PRODUCCION
	=============================================*/
	static public function mdlMostrarPedidosEnProduccion($tabla,$item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(tieneIgualado) as igualadosEnProduccion from  $tabla WHERE tieneIgualado = 1 and statusLaboratorio = 1 and estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(tieneIgualado) as igualadosEnProduccion from  $tabla WHERE tieneIgualado = 1 and statusLaboratorio = 1 and estado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}


		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS CONCLUIDOS
	=============================================*/
	static public function mdlMostrarPedidosConcluidos($tabla, $item, $valor){
		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLaboratorio) as pedidosConcluidos from  $tabla WHERE statusLaboratorio = 2 and estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLaboratorio) as pedidosConcluidos from  $tabla WHERE statusLaboratorio = 2 and estado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS CANCELADOS
	=============================================*/
	static public function mdlMostrarIgualadosCancelados($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLaboratorio) as igualadosCancelados from $tabla WHERE statusLaboratorio = 0 && estadoLaboratorio = 0 and estado = 0 and tieneIgualado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(statusLaboratorio) as igualadosCancelados from $tabla WHERE statusLaboratorio = 0 && estadoLaboratorio = 0 and estado = 0 and tieneIgualado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR IGUALADOS PENDIENTES
	=============================================*/
	static public function mdlMostrarIgualadosPendientes($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as igualadosPendientes from  $tabla where tieneIgualado = 1 && pendiente = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as igualadosPendientes from  $tabla where tieneIgualado = 1 && pendiente = 1");

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
	SEGUIR PEDIDO
	=============================================*/

	static public function mdlSeguirPedidos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idPedido, usuario, serie, nombreCliente, numeroOrden, secciones, codigo, descripcionColor, cantidad, fechaInicio, fechaTermino, codigo2, descripcionColor2, cantidad2, fechaInicio2, fechaTermino2, codigo3, descripcionColor3, cantidad3, fechaInicio3, fechaTermino3, codigo4, descripcionColor4, cantidad4, fechaInicio4, fechaTermino4, codigo5, descripcionColor5, cantidad5, fechaInicio5, fechaTermino5, fechaRecepcion, status, observaciones, estado) VALUES (:idPedido, :usuario, :serie, :nombreCliente, :numeroOrden, :secciones, :codigo, :descripcionColor, :cantidad, :fechaInicio, :fechaTermino, :codigo2, :descripcionColor2, :cantidad2, :fechaInicio2, :fechaTermino2, :codigo3, :descripcionColor3, :cantidad3, :fechaInicio3, :fechaTermino3, :codigo4, :descripcionColor4, :cantidad4, :fechaInicio4, :fechaTermino4, :codigo5, :descripcionColor5, :cantidad5, :fechaInicio5, :fechaTermino5, :fechaRecepcion, :status, :observaciones, :estado)");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroOrden", $datos["numeroOrden"], PDO::PARAM_STR);
		$stmt->bindParam(":secciones", $datos["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor", $datos["descripcionColor"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio", $datos["fechaInicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino", $datos["fechaTermino"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo2", $datos["codigo2"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor2", $datos["descripcionColor2"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad2", $datos["cantidad2"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio2", $datos["fechaInicio2"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino2", $datos["fechaTermino2"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo3", $datos["codigo3"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor3", $datos["descripcionColor3"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad3", $datos["cantidad3"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio3", $datos["fechaInicio3"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino3", $datos["fechaTermino3"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo4", $datos["codigo4"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor4", $datos["descripcionColor4"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad4", $datos["cantidad4"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio4", $datos["fechaInicio4"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino4", $datos["fechaTermino4"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo5", $datos["codigo5"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor5", $datos["descripcionColor5"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad5", $datos["cantidad5"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio5", $datos["fechaInicio5"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino5", $datos["fechaTermino5"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlActualizarEstadoLaboratorio($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.estadoLaboratorio = $tabla.estado WHERE $tabla2.folio = :idPedido AND $tabla2.serie = :serie");

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
	ACTUALIZAR STATUS LABORATORIO
	=============================================*/
	static public function mdlActualizarStatusLaboratorio($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.statusLaboratorio = $tabla.status WHERE $tabla2.folio = $tabla.idPedido;
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
	ACTUALIZAR STATUS LABORATORIO EDICION
	=============================================*/
	static public function mdlActualizarStatusLaboratorioEdicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.statusLaboratorio = $tabla.status WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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

	static public function mdlActualizarTiempoProceso($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaTermino, fechaRecepcion) where idPedido = :idPedido  and serie = :serie");

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
	EDITAR PEDIDO LABORATORIO
	=============================================*/

	static public function mdlEditarPedido($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, serie = :serie, idPedido = :idPedido, nombreCliente = :nombreCliente, numeroOrden = :numeroOrden, secciones = :secciones, codigo = :codigo, descripcionColor = :descripcionColor, cantidad = :cantidad, fechaInicio = :fechaInicio, fechaTermino = :fechaTermino, codigo2 = :codigo2, descripcionColor2 = :descripcionColor2, cantidad2 = :cantidad2, fechaInicio2 = :fechaInicio2, fechaTermino2 = :fechaTermino2, codigo3 = :codigo3, descripcionColor3= :descripcionColor3, cantidad3 = :cantidad3, fechaInicio3 = :fechaInicio3, fechaTermino3 = :fechaTermino3, codigo4 = :codigo4, descripcionColor4 = :descripcionColor4, cantidad4 = :cantidad4, fechaInicio4 = :fechaInicio4, fechaTermino4 = :fechaTermino4, codigo5 = :codigo5, descripcionColor5 = :descripcionColor5, cantidad5 = :cantidad5, fechaInicio5 = :fechaInicio5, fechaTermino5 = :fechaTermino5, fechaRecepcion = :fechaRecepcion, status = :status, observaciones = :observaciones, estado = :estado, pendiente = :pendiente, habilitado = :habilitado WHERE idPedido = :idPedido and serie = :serie");

		
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":idPedido", $datos["idPedido"],PDO::PARAM_INT);
		$stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroOrden", $datos["numeroOrden"], PDO::PARAM_STR);
		$stmt->bindParam(":secciones", $datos["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor", $datos["descripcionColor"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio", $datos["fechaInicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino", $datos["fechaTermino"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo2", $datos["codigo2"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor2", $datos["descripcionColor2"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad2", $datos["cantidad2"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio2", $datos["fechaInicio2"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino2", $datos["fechaTermino2"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo3", $datos["codigo3"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor3", $datos["descripcionColor3"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad3", $datos["cantidad3"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio3", $datos["fechaInicio3"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino3", $datos["fechaTermino3"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo4", $datos["codigo4"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor4", $datos["descripcionColor4"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad4", $datos["cantidad4"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio4", $datos["fechaInicio4"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino4", $datos["fechaTermino4"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo5", $datos["codigo5"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionColor5", $datos["descripcionColor5"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad5", $datos["cantidad5"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio5", $datos["fechaInicio5"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino5", $datos["fechaTermino5"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":pendiente", $datos["pendiente"], PDO::PARAM_INT);
		$stmt->bindParam(":habilitado", $datos["habilitado"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

		
	/*=============================================
	CANCELAR PEDIDO LABORATORIO DE COLOR
	=============================================*/

	static public function mdlEliminarPedidoLaboratorio($tabla2, $datos2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 set status = 0, estado = 0, pendiente = 0 WHERE idPedido = :idPedido AND serie = :serie");

		$stmt -> bindParam(":idPedido", $datos2["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos2["serie"], PDO::PARAM_STR);

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
	REGISTRAR TIEMPOS
	=============================================*/
	static public function mdlRegistrarTiempos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set diff1 = TIMEDIFF(fechaTermino, fechaInicio) where idPedido = :idPedido  AND serie = :serie");

		$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}else {

			return "error";
		}
		$stmt->close();
		$stmt = null;


	}
	/*=============================================
	REGISTRAR TIEMPOS
	=============================================*/
	static public function mdlRegistrarTiempos2($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set diff2 = TIMEDIFF(fechaTermino2, fechaInicio2) where idPedido = :idPedido  AND serie = :serie");

		$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}else {

			return "error";
		}
		$stmt->close();
		$stmt = null;


	}
	/*=============================================
	REGISTRAR TIEMPOS
	=============================================*/
	static public function mdlRegistrarTiempos3($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set diff3 = TIMEDIFF(fechaTermino3, fechaInicio3) where idPedido = :idPedido  AND serie = :serie");

		$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}else {

			return "error";
		}
		$stmt->close();
		$stmt = null;


	}
	/*=============================================
	REGISTRAR TIEMPOS
	=============================================*/
	static public function mdlRegistrarTiempos4($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set diff4 = TIMEDIFF(fechaTermino4, fechaInicio4) where idPedido = :idPedido  AND serie = :serie");

		$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}else {

			return "error";
		}
		$stmt->close();
		$stmt = null;


	}
	/*=============================================
	REGISTRAR TIEMPOS
	=============================================*/
	static public function mdlRegistrarTiempos5($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set diff5 = TIMEDIFF(fechaTermino5, fechaInicio5) where idPedido = :idPedido  AND serie = :serie");

		$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}else {

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
	/*=============================================
	ACTUALIZAR FECHA PEDIDO LABORATORIO DE COLOR
	=============================================*/
	static public function mdlActualizarFechaPedido($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio and $tabla2.serie = $tabla.serie SET $tabla2.fechaPedido = $tabla.fechaPedido WHERE $tabla2.idPedido = :folio AND  $tabla2.serie = :serie");

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