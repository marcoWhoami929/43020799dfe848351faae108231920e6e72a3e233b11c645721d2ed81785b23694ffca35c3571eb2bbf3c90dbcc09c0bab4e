<?php

require_once "conexion.php";

class ModeloFacturacion{
	/*=============================================
	ACTUALIZAR ORDEN DE COMPRA
	=============================================*/
	static public function mdlActualizarOrdenCompra($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio and $tabla2.serie = $tabla.serie SET $tabla2.ordenCompra = $tabla.ordenCompra WHERE $tabla2.idPedido = :folio and $tabla2.serie = :serie");

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
	MOSTRAR FACTURACION
	=============================================*/

	/*static public function mdlMostrarFacturacion($tabla, $item, $valor){

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


	}*/
	static public function mdlMostrarFacturacion($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();

	}
	static public function mdlMostrarDatosFacturas($tabla2, $itemN, $valorN, $itemN2, $valorN2){

			$stmt = Conexion::conectar()->prepare("SELECT serie,folio,estatusFactura from $tabla2 WHERE folioPedido = :$itemN AND seriePedido = :$itemN2 order by folio DESC limit 1");

			$stmt -> bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
			$stmt -> bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

	}

	static public function mdlActualizarDatosFacturas($tabla, $datosFacturas){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET folioFactura = :folioFactura, serieFactura = :serieFactura, estatusFactura = :estatusFactura WHERE idPedido = :idPedido AND serie = :serie");

		$stmt -> bindParam(":folioFactura", $datosFacturas["folioFactura"], PDO::PARAM_STR);
		$stmt -> bindParam(":serieFactura", $datosFacturas["serieFactura"], PDO::PARAM_STR);
		$stmt -> bindParam(":estatusFactura", $datosFacturas["estatusFactura"], PDO::PARAM_INT);

		$stmt -> bindParam(":idPedido", $datosFacturas["idPedido"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datosFacturas["serie"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR FACTURACION EDICION
	=============================================*/

	static public function mdlMostrarFacturacionEdicion($tabla, $item, $valor){

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
    HABILITAR FACTURA
	=============================================*/

	static public function mdlHabilitarFactura($tabla, $item1, $valor1, $item2, $valor2){

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
	PEDIDOS FACTURADOS
	=============================================*/

	static public function mdlMostrarPedidosFacturados($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(estadoFacturacion) as pedidosFacturados from $tabla where estadoFacturacion = 1 && statusFacturacion = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(estadoFacturacion) as pedidosFacturados from $tabla where estadoFacturacion = 1 && statusFacturacion = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	PEDIDOS FACTURADOS
	=============================================*/

	static public function mdlMostrarFacturasPendientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(estadoFacturacion) as facturasPendientes from $tabla where estadoFacturacion = 1 && statusFacturacion = 0 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(estadoFacturacion) as facturasPendientes from $tabla where estadoFacturacion = 1 && statusFacturacion = 0");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	POR FACTURAR
	=============================================*/

	static public function mdlMostrarPorFacturar($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(estadoFacturacion) as porFacturar from $tabla where estadoFacturacion = 0 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(estadoFacturacion) as porFacturar from $tabla where estadoFacturacion = 0");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}
	/*======ALMACEN=======*/
	/*=============================================
	MOSTRAR FECHA RECEPCION
	=============================================*/
	static public function mdlMostrarFechaRecepcionAlmacen($tabla, $tableAlmacen, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAlmacen INNER JOIN $tabla ON $tableAlmacen.idPedido = $tabla.idPedido and $tableAlmacen.serie = $tabla.serie SET $tableAlmacen.fechaRecepcionInterna = $tabla.fechaRecepcion WHERE $tableAlmacen.idPedido = :idPedido and $tableAlmacen.serie = :serie");

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
	MOSTRAR FECHA TERMINO
	=============================================*/
	static public function mdlMostrarFechaTerminoAlmacen($tabla, $tableAlmacen, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAlmacen INNER JOIN $tabla ON $tableAlmacen.idPedido = $tabla.idPedido and $tableAlmacen.serie = $tabla.serie SET $tableAlmacen.fechaTerminoInterna = $tabla.fechaEntrega WHERE $tableAlmacen.idPedido = :idPedido and $tableAlmacen.serie = :serie");

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
	static public function mdlMostrarTiempoProcesoAlmacen($tabla, $tableAlmacen, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAlmacen INNER JOIN $tabla ON $tableAlmacen.idPedido = $tabla.idPedido and $tableAlmacen.serie = $tabla.serie SET $tableAlmacen.tiempoCompraInterna = $tabla.tiempoProceso WHERE $tableAlmacen.idPedido = :idPedido and $tableAlmacen.serie = :serie");

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
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	static public function mdlActualizarTiempoAlmacen($tableAlmacen, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tableAlmacen ON $tableAtencion.folio = $tableAlmacen.idPedido and $tableAtencion.serie = $tableAlmacen.serie SET $tableAtencion.tiempoInternaAlmacen = $tableAlmacen.tiempoCompraInterna WHERE $tableAtencion.folio = :idPedido and $tableAtencion.serie = :serie");

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


	/*======ALMACEN=======*/
	/*======LOGISTICA=======*/
	/*=============================================
	MOSTRAR FECHA RECEPCION
	=============================================*/
	static public function mdlMostrarFechaRecepcionLogistica($tabla, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla ON $tablelogistica.idPedido = $tabla.idPedido and $tablelogistica.serie = $tabla.serie SET $tablelogistica.fechaRecepcionInterna = $tabla.fechaRecepcion WHERE $tablelogistica.idPedido = :idPedido and $tablelogistica.serie = :serie");

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
	MOSTRAR FECHA TERMINO
	=============================================*/
	static public function mdlMostrarFechaTerminoLogistica($tabla, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla ON $tablelogistica.idPedido = $tabla.idPedido and $tablelogistica.serie = $tabla.serie SET $tablelogistica.fechaEntregaInterna = $tabla.fechaEntrega WHERE $tablelogistica.idPedido = :idPedido and $tablelogistica.serie = :serie");

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
	static public function mdlMostrarTiempoProcesoLogistica($tabla, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla ON $tablelogistica.idPedido = $tabla.idPedido and $tablelogistica.serie = $tabla.serie SET $tablelogistica.tiempoCompraInterna = $tabla.tiempoProceso WHERE $tablelogistica.idPedido = :idPedido and $tablelogistica.serie = :serie");

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
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	static public function mdlActualizarTiempoLogistica($tablelogistica, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tablelogistica ON $tableAtencion.folio = $tablelogistica.idPedido and $tableAtencion.serie = $tablelogistica.serie SET $tableAtencion.tiempoInternaLogistica = $tablelogistica.tiempoCompraInterna WHERE $tableAtencion.folio = :idPedido and $tableAtencion.serie = :serie");

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


	/*======LOGISTICA=======*/
	/*=============================================
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	static public function mdlMostrarTiempoProceso($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.tiempoFacturacion = $tabla.tiempoProceso WHERE $tabla2.folio = $tabla.idPedido;
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
	static public function mdlMostrarTiempoProcesoEdicion($tabla, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tabla ON $tableAtencion.folio = $tabla.idPedido and $tableAtencion.serie = $tabla.serie SET $tableAtencion.tiempoFacturacion = $tabla.tiempoProceso WHERE $tableAtencion.folio = :idPedido and $tableAtencion.serie = :serie");

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
	ACTUALIZAR PEDIDO
	=============================================*/

	static public function mdlActualizarPerfil($tabla, $item1, $valor1, $item2, $valor2){

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

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idPedido, usuario, serie, serieFactura, folioFactura, status, ordenCompra, tipo, cantidad, importeInicial, importe, statusCliente, fechaRecepcion, fechaEntrega, observaciones, estado) VALUES (:idPedido, :usuario, :serie, :serieFactura, :folioFactura, :status, :ordenCompra, :tipo, :cantidad, :importeInicial, :importe, :statusCliente, :fechaRecepcion, :fechaEntrega, :observaciones, :estado)");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":serieFactura", $datos["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $datos["folioFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":importeInicial", $datos["importeInicial"], PDO::PARAM_STR);
		$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
		$stmt->bindParam(":statusCliente", $datos["statusCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaEntrega", $datos["fechaEntrega"], PDO::PARAM_STR);
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
	static public function mdlActualizarTiempoProceso($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaEntrega, fechaRecepcion) where idPedido = :idPedido and serie = :serie");

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
	static public function mdlActualizarEstadoFacturacion($tabla, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tabla ON $tableAtencion.folio = $tabla.idPedido and $tableAtencion.serie = $tabla.serie SET $tableAtencion.estadoFacturacion = $tabla.estado WHERE $tableAtencion.folio = :idPedido and $tableAtencion.serie = :serie");

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
	static public function mdlActualizarEstadoPedido($tabla, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla ON $tablelogistica.idPedido = $tabla.idPedido and $tablelogistica.serie = $tabla.serie SET $tablelogistica.estadoFacturacion = $tabla.estado WHERE $tablelogistica.idPedido = :idPedido and $tablelogistica.serie = :serie");

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
	static public function mdlActualizarStatusPedido($tabla2, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla2 ON $tablelogistica.idPedido = $tabla2.folioPedido and $tablelogistica.serie = $tabla2.seriePedido SET $tablelogistica.statusFacturacion = $tabla2.estatusFactura WHERE $tablelogistica.idPedido = :idPedido and $tablelogistica.serie = :serie");

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
	ACTUALIZAR STATUS FACTURACION
	=============================================*/
	static public function mdlActualizarStatusFacturacion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.statusFacturacion = $tabla.status WHERE $tabla2.folio = $tabla.idPedido");

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	ACTUALIZAR FOLIO FACTURA
	=============================================*/
	static public function mdlActualizarFolioFactura($tabla2, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tabla2 ON $tableAtencion.folio = $tabla2.folioPedido and $tableAtencion.serie = $tabla2.seriePedido SET $tableAtencion.folioFactura = $tabla2.folio WHERE $tableAtencion.folio = :idPedido and $tableAtencion.serie = :serie");

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
	ACTUALIZAR SERIE FACTURA
	=============================================*/
	static public function mdlActualizarSerieFactura($tabla2, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tabla2 ON $tableAtencion.folio = $tabla2.folioPedido and $tableAtencion.serie = $tabla2.seriePedido SET $tableAtencion.serieFactura = $tabla2.serie WHERE $tableAtencion.folio = :idPedido and $tableAtencion.serie = :serie");

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
	ACTUALIZAR FOLIO FACTURA LOGISTICA
	=============================================*/
	static public function mdlActualizarFolioFacturaLogistica($tabla2, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla2 ON $tablelogistica.idPedido = $tabla2.folioPedido and $tablelogistica.serie = $tabla2.seriePedido SET $tablelogistica.folioFactura = $tabla2.folio WHERE $tablelogistica.idPedido = :idPedido and $tablelogistica.serie = :serie");

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
	ACTUALIZAR SALDO FACTURA
	=============================================*/
	static public function mdlActualizarSaldoFacturado($tabla, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tabla ON $tableAtencion.folio = $tabla.idPedido and $tableAtencion.serie = $tabla.serie SET $tableAtencion.saldoFacturado = $tabla.importSurt WHERE $tableAtencion.folio = :idPedido and $tableAtencion.serie = :serie");

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
	ACTUALIZAR SERIE FACTURA LOGISTICA
	=============================================*/
	static public function mdlActualizarSerieFacturaLogistica($tabla2, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla2 ON $tablelogistica.idPedido = $tabla2.folioPedido and $tablelogistica.serie = $tabla2.seriePedido SET $tablelogistica.serieFactura = $tabla2.serie WHERE $tablelogistica.idPedido = :idPedido and $tablelogistica.serie = :serie");

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
	ACTUALIZAR NIVELES
	=============================================*/
	static public function mdlActualizarNiveles($tabla, $tableAlmacen, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAlmacen INNER JOIN $tabla ON $tableAlmacen.idPedido = $tabla.idPedido and $tableAlmacen.serie = $tabla.serie SET $tableAlmacen.sumPartidas = $tabla.partSurt, $tableAlmacen.sumUnidades = $tabla.unidSurt, $tableAlmacen.importeSurtido = $tabla.importSurt, $tableAlmacen.nivelPartidas = $tabla.nivelPartidas, $tableAlmacen.nivelDeSum = $tabla.nivelDeSum, $tableAlmacen.nivelSumCosto = $tabla.nivelSumCosto WHERE $tableAlmacen.idPedido = :idPedido and $tableAlmacen.serie = :serie");

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
	ACTUALIZAR ESTATUS FACTURA ALMACEN
	=============================================*/
	static public function mdlActualizarEstatusFacturaAlmacen($tabla2, $tableAlmacen, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAlmacen INNER JOIN $tabla2 ON $tableAlmacen.idPedido = $tabla2.folioPedido and $tableAlmacen.serie = $tabla2.seriePedido SET $tableAlmacen.estatusFactura = $tabla2.estatusFactura WHERE $tableAlmacen.idPedido = :idPedido and $tableAlmacen.serie = :serie");

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
	ACTUALIZAR STATUS FACTURACION EDICION
	=============================================*/
	static public function mdlActualizarStatusFacturacionEdicion($tabla2, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tabla2 ON $tableAtencion.folio = $tabla2.folioPedido and $tableAtencion.serie = $tabla2.seriePedido SET $tableAtencion.statusFacturacion = $tabla2.estatusFactura WHERE $tableAtencion.folio = :idPedido and $tableAtencion.serie = :serie");

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

	
	static public function mdlNivelPartidas($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set nivelPartidas = (partidasSurtidas + partidasSurtidas2 + partidasSurtidas3 + partidasSurtidas4 + partidasSurtidas5) *100/partidas where idPedido = :idPedido and serie = :serie");

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
	static public function mdlUnidadesSurtidas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set unidadesSurtidas = unidades-(unidades-unidadesPendientes) where idPedido = :idPedido and serie = :serie");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			
			return "ok";

		}else {

			return "error";
		}
		$stmt -> close();
		$stmt = null;

	}
	static public function mdlNivelSum($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set nivelDeSum = (unidadesSurtidas + unidadesSurtidas2 + unidadesSurtidas3 + unidadesSurtidas4 + unidadesSurtidas5) * 100/unidades where idPedido = :idPedido and serie = :serie");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return  "error";
		}

		$stmt -> close();
		$stmt = null;
	}
	static public function mdlimportSurt($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set importSurt = (importe + importe2 + importe3 + importe4 + importe5) where idPedido = :idPedido and serie = :serie");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return  "error";
		}

		$stmt -> close();
		$stmt = null;
	}
	static public function mdlunidSurt($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set unidSurt = (unidadesSurtidas + unidadesSurtidas2 + unidadesSurtidas3 + unidadesSurtidas4 + unidadesSurtidas5) where idPedido = :idPedido and serie = :serie");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return  "error";
		}

		$stmt -> close();
		$stmt = null;
	}
	static public function mdlpartSurt($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set partSurt = (partidasSurtidas + partidasSurtidas2 + partidasSurtidas3 + partidasSurtidas4 + partidasSurtidas5) where idPedido = :idPedido and serie = :serie");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return  "error";
		}

		$stmt -> close();
		$stmt = null;
	}
	static public function mdlNivelSumCosto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set nivelSumCosto = (importe + importe2 + importe3 + importe4 + importe5) * 100/ importeInicial where idPedido = :idPedido and serie = :serie");

			$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return  "error";
		}

		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR PARTIDAS
	=============================================*/
	static public function mdlActualizarPartidas($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set partidas = :partidas WHERE idPedido = :idPedido and serie = :serie");

			$stmt->bindParam(":partidas", $datos["partidas"], PDO::PARAM_INT);
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

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set unidades = :unidades WHERE idPedido = :idPedido and serie = :serie");

			$stmt->bindParam(":unidades", $datos["unidades"], PDO::PARAM_STR);
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

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set importeInicial = :importeInicial WHERE idPedido = :idPedido and serie = :serie");

			$stmt->bindParam(":importeInicial", $datos["importeInicial"], PDO::PARAM_STR);
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
	EDITAR PEDIDO FACTURACION
	=============================================*/

	static public function mdlEditarPedido($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, serie = :serie, idPedido = :idPedido, serieFactura = :serieFactura, folioFactura = :folioFactura, status = :status, ordenCompra = :ordenCompra, tipo = :tipo, cantidad = :cantidad, importeInicial = :importeInicial, secciones = :secciones, importe = :importe, partidasSurtidas = :partidasSurtidas, unidadesPendientes = :unidadesPendientes, serieFactura2 = :serieFactura2, folioFactura2 = :folioFactura2, importe2 = :importe2, partidasSurtidas2 = :partidasSurtidas2, unidadesSurtidas2 = :unidadesSurtidas2, serieFactura3 = :serieFactura3, folioFactura3 = :folioFactura3, importe3 = :importe3, partidasSurtidas3 = :partidasSurtidas3, unidadesSurtidas3 = :unidadesSurtidas3, serieFactura4 = :serieFactura4, folioFactura4 = :folioFactura4, importe4 = :importe4, partidasSurtidas4 = :partidasSurtidas4, unidadesSurtidas4 = :unidadesSurtidas4, serieFactura5 = :serieFactura5, folioFactura5 = :folioFactura5, importe5 = :importe5, partidasSurtidas5 = :partidasSurtidas5, unidadesSurtidas5 = :unidadesSurtidas5, statusCliente = :statusCliente , tipoRuta = :tipoRuta, fechaRecepcion = :fechaRecepcion, fechaEntrega = :fechaEntrega, observaciones = :observaciones, estado = :estado, facturaPendiente = :facturaPendiente, formatoPedido = :formatoPedido, habilitado = :habilitado WHERE idPedido = :idPedido and serie = :serie");

		
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":idPedido", $datos["idPedido"],PDO::PARAM_INT);
		$stmt->bindParam(":serieFactura", $datos["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $datos["folioFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":importeInicial", $datos["importeInicial"], PDO::PARAM_STR);
		$stmt->bindParam(":secciones", $datos["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
		$stmt->bindParam(":partidasSurtidas", $datos["partidasSurtidas"], PDO::PARAM_INT);
		$stmt->bindParam(":unidadesPendientes", $datos["unidadesPendientes"], PDO::PARAM_STR);
		$stmt->bindParam(":serieFactura2", $datos["serieFactura2"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura2", $datos["folioFactura2"], PDO::PARAM_STR);
		$stmt->bindParam(":importe2", $datos["importe2"], PDO::PARAM_STR);
		$stmt->bindParam(":partidasSurtidas2", $datos["partidasSurtidas2"], PDO::PARAM_INT);
		$stmt->bindParam(":unidadesSurtidas2", $datos["unidadesSurtidas2"], PDO::PARAM_STR);
		$stmt->bindParam(":serieFactura3", $datos["serieFactura3"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura3", $datos["folioFactura3"], PDO::PARAM_STR);
		$stmt->bindParam(":importe3", $datos["importe3"], PDO::PARAM_STR);
		$stmt->bindParam(":partidasSurtidas3", $datos["partidasSurtidas3"], PDO::PARAM_INT);
		$stmt->bindParam(":unidadesSurtidas3", $datos["unidadesSurtidas3"], PDO::PARAM_STR);
		$stmt->bindParam(":serieFactura4", $datos["serieFactura4"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura4", $datos["folioFactura4"], PDO::PARAM_STR);
		$stmt->bindParam(":importe4", $datos["importe4"], PDO::PARAM_STR);
		$stmt->bindParam(":partidasSurtidas4", $datos["partidasSurtidas4"], PDO::PARAM_INT);
		$stmt->bindParam(":unidadesSurtidas4", $datos["unidadesSurtidas4"], PDO::PARAM_STR);
		$stmt->bindParam(":serieFactura5", $datos["serieFactura5"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura5", $datos["folioFactura5"], PDO::PARAM_STR);
		$stmt->bindParam(":importe5", $datos["importe5"], PDO::PARAM_STR);
		$stmt->bindParam(":partidasSurtidas5", $datos["partidasSurtidas5"], PDO::PARAM_INT);
		$stmt->bindParam(":unidadesSurtidas5", $datos["unidadesSurtidas5"], PDO::PARAM_STR);
		$stmt->bindParam(":statusCliente", $datos["statusCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRuta", $datos["tipoRuta"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaEntrega", $datos["fechaEntrega"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":facturaPendiente", $datos["facturaPendiente"], PDO::PARAM_INT);
		$stmt->bindParam(":formatoPedido", $datos["formatoPedido"], PDO::PARAM_INT);
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
	ACTUALIZAR FORMATO PEDIDO
	=============================================*/

	static public function mdlActualizarFormatoPedido($tabla, $datos){



			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set estatusFactura = 1 WHERE $tabla.idPedido = :idPedido AND $tabla.serie = :serie AND formatoPedido = 1");

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
	ACTUALIZAR TIPO RUTA LOGISTICA
	=============================================*/
	static public function mdlActualizarTipoRuta($tabla, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla ON $tablelogistica.idPedido = $tabla.idPedido and $tablelogistica.serie = $tabla.serie SET $tablelogistica.ruta = $tabla.tipoRuta WHERE $tablelogistica.idPedido = :idPedido and $tablelogistica.serie = :serie");

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
	FACTURAS FORMATO PEDIDO
	=============================================*/

	static public function mdlMostrarFacturasPedido($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(formatoPedido) as formatoPedido from $tabla where formatoPedido = 1 && statusFacturacion = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(formatoPedido) as formatoPedido from $tabla where formatoPedido = 1 && statusFacturacion = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	ACTUALIZAR FORMATO DE PEDIDO ATENCION A CLIENTES
	=============================================*/
	static public function mdlActualizarFormatoPedidoAtencion($tabla, $tableAtencion, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tableAtencion INNER JOIN $tabla ON $tableAtencion.folio = $tabla.idPedido and $tableAtencion.serie = $tabla.serie SET $tableAtencion.formatoPedido = $tabla.formatoPedido WHERE $tableAtencion.folio = :idPedido AND $tableAtencion.serie = :serie");

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
	ACTUALIZAR NOMBRE CLIENTE LOGISTICA
	=============================================*/
	static public function mdlActualizarNombreCliente($tabla2, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla2 ON $tablelogistica.idPedido = $tabla2.folioPedido and $tablelogistica.serie = $tabla2.seriePedido SET $tablelogistica.nombreCliente = $tabla2.nombreCliente WHERE $tablelogistica.idPedido = :idPedido AND $tablelogistica.serie = :serie");

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
	ACTUALIZAR NOMBRE CLIENTE LOGISTICA
	=============================================*/
	/*static public function mdlActualizarNombreCliente2($tabla, $tablelogistica, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablelogistica INNER JOIN $tabla ON $tablelogistica.idPedido = $tabla.idPedido and $tablelogistica.serie = $tabla.serie SET $tablelogistica.nombreCliente = $tabla.cliente WHERE $tablelogistica.idPedido = :idPedido AND $tablelogistica.serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}*/
	/*=============================================
	CANCELAR PEDIDO FACTURACION
	=============================================*/

	static public function mdlEliminarPedidoFacturacion($tabla3, $datos3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 set status = 0, estado = 0, estatusFactura = 2, facturaPendiente = 0 WHERE idPedido = :idPedido and serie = :serie");

		$stmt -> bindParam(":idPedido", $datos3["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos3["serie"], PDO::PARAM_STR);

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
	/*=============================================
	MOSTRAR FACTURAS
	=============================================*/
/*
	static public function mdlMostrarFacturas($tabla, $item, $valor){

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


	}*/

	/*==================================================
	MODELO PARA MOSTRAR LOS DATOS DE LAS FACTURAS
	==================================================*/
	static public function mdlMostrarFacturasGenerales($tabla, $item, $valor, $item2, $valor2){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT f.partSurt AS totalPart,f.unidSurt AS totalUnid,f.importSurt AS totalImport,m.serie,m.folio, m.numeroPartidas,  m.numeroUnidades, m.importeFactura FROM facturacion f INNER JOIN facturasgenerales  m ON f.idPedido = m.folioPedido and f.serie = m.seriePedido  WHERE f.idPedido = :$item and f.serie = :$item2");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	static public function mdlValidarFolioFacturaGeneral($item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4){
		if($item1 != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(folioPedido) as folioValido FROM facturasgenerales WHERE $item1 = :$item1 and $item2  = :$item2 and $item3 = :$item3 and $item4 = :$item4");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);
			$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_INT);
			$stmt -> bindParam(":".$item4, $valor4, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		}else{
			
		}
	}

	/*==========================================================================
	MODELO PARA EDITAR LAS FACTURAS
	==========================================================================*/
	static public function mdlEditarDatosFacturas($tabla2, $datosActualizar){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 as fg INNER JOIN facturacion as f ON fg.seriePedido = f.serie and fg.folioPedido = f.idPedido SET f.usuario = :usuario, f.secciones = :secciones, f.status = :statusPedido, f.estado = :estado, f.facturaPendiente = :facturaPendiente, f.ordenCompra = :ordenCompra, f.tipo = :tipo, f.statusCliente = :statusCliente, f.tipoRuta = :tipoRuta, f.cantidad = :cantidad, f.fechaRecepcion = :fechaRecepcion, f.fechaEntrega = :fechaEntrega, f.observaciones = :observaciones, f.formatoPedido = :formatoPedido, fg.numeroPartidas = :numeroPartidas, fg.numeroUnidades = :numeroUnidades, fg.importeFactura = :importeFactura, fg.neto = :neto, fg.impuesto = :impuesto, fg.total = :total, fg.codigoCliente = :codigoCliente, fg.rfc = :rfc, fg.nombreCliente = :nombreCliente, fg.statusCliente = :statusClienteFg, fg.diasCredito = :diasCredito, fg.pendiente = :pendiente, fg.estatus = :estatus WHERE f.serie = :seriePedido and f.idPedido = :folioPedido and fg.serie = :serie and fg.folio = :folio");

		$stmt->bindParam(":seriePedido", $datosActualizar["seriePedido"], PDO::PARAM_STR);
		$stmt->bindParam(":folioPedido", $datosActualizar["folioPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datosActualizar["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":secciones", $datosActualizar["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":statusPedido", $datosActualizar["statusPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosActualizar["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":facturaPendiente", $datosActualizar["facturaPendiente"], PDO::PARAM_INT);
		$stmt->bindParam(":ordenCompra", $datosActualizar["ordenCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosActualizar["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":statusCliente", $datosActualizar["statusCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRuta", $datosActualizar["tipoRuta"], PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $datosActualizar["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaRecepcion", $datosActualizar["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaEntrega", $datosActualizar["fechaEntrega"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datosActualizar["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":formatoPedido", $datosActualizar["formatoPedido"], PDO::PARAM_INT);

		$stmt->bindParam(":serie", $datosActualizar["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datosActualizar["folio"], PDO::PARAM_INT);
		$stmt->bindParam(":numeroPartidas", $datosActualizar["numeroPartidas"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroUnidades", $datosActualizar["numeroUnidades"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $datosActualizar["importeFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datosActualizar["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datosActualizar["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datosActualizar["total"], PDO::PARAM_STR);

		$stmt->bindParam(":codigoCliente", $datosActualizar["codigoCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datosActualizar["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreCliente", $datosActualizar["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":statusClienteFg", $datosActualizar["statusClienteFg"], PDO::PARAM_STR);
		$stmt->bindParam(":diasCredito", $datosActualizar["diasCredito"], PDO::PARAM_INT);
		$stmt->bindParam(":pendiente", $datosActualizar["pendiente"], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $datosActualizar["estatus"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;

	}

	/*==================================================
	MODELO PARA ACTUALIZAR LOS DATOS DE FACTURACION CUANDO NO TIENE FACTURAS
	==================================================*/
	static public function mdlEditarDatosFacturasNoExisteFolio($datosActualizar){

		$stmt = Conexion::conectar()->prepare("UPDATE facturacion as f SET f.usuario = :usuario, f.secciones = :secciones, f.status = :statusPedido, f.estado = :estado, f.facturaPendiente = :facturaPendiente, f.ordenCompra = :ordenCompra, f.tipo = :tipo, f.statusCliente = :statusCliente, f.tipoRuta = :tipoRuta, f.cantidad = :cantidad, f.fechaRecepcion = :fechaRecepcion, f.fechaEntrega = :fechaEntrega, f.observaciones = :observaciones, f.formatoPedido = :formatoPedido WHERE f.serie = :seriePedido and f.idPedido = :folioPedido");

		$stmt->bindParam(":seriePedido", $datosActualizar["seriePedido"], PDO::PARAM_STR);
		$stmt->bindParam(":folioPedido", $datosActualizar["folioPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datosActualizar["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":secciones", $datosActualizar["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":statusPedido", $datosActualizar["statusPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosActualizar["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":facturaPendiente", $datosActualizar["facturaPendiente"], PDO::PARAM_INT);
		$stmt->bindParam(":ordenCompra", $datosActualizar["ordenCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosActualizar["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":statusCliente", $datosActualizar["statusCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRuta", $datosActualizar["tipoRuta"], PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $datosActualizar["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaRecepcion", $datosActualizar["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaEntrega", $datosActualizar["fechaEntrega"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datosActualizar["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":formatoPedido", $datosActualizar["formatoPedido"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;

	}

	/*==================================================
	MODELO PARA MOSTRAR EL ULTIMO NUMERO DE LAS SECCIONES MAS 1
	==================================================*/
	public static function mdlMostrarUltimoNumeroFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2){
		if($itemN != null){

			$stmt = Conexion::conectar()->prepare("SELECT IF(MAX(f.secciones + 1) IS NULL,1,MAX(f.secciones+1)) as ultimoNumero FROM $tabla f WHERE f.idPedido = :$itemN and f.serie = :$itemN2");

			$stmt -> bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
			$stmt -> bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		}
	}

	/*==================================================
	OBTENER EL ULTIMO NUMERO DE SECCIONES
	==================================================*/
	public static function mdlUltimaSeccionFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2){

		$stmt = Conexion::conectar()->prepare("SELECT MAX(secciones) as ultimaSeccion from $tabla WHERE idPedido =:$itemN AND serie = :$itemN2");

		$stmt->bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
		$stmt->bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);

		$stmt-> execute();

		return $stmt -> fetch();

	}

	/*==================================================
	MODELO PARA SUMAR UN 1 AL CAMPO SECCIONES DE LA TABLA FACTURACIONOT
	==================================================*/
	public static function mdlInsertarSeccionFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET secciones = secciones + 1 WHERE idPedido =:$itemN AND serie = :$itemN2");
		$stmt->bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
		$stmt->bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;

	}

	static public function mdlInsertarFacturasFacturacion($tabla2, $datosInsertar){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(seriePedido,folioPedido,concepto,serie,folio,estatusFactura,numeroPartidas,numeroUnidades,importeFactura, numFactura, neto, impuesto, total, codigoCliente, rfc, nombreCliente, statusCliente, diasCredito, pendiente, estatus, formaPago, agente) VALUES (:seriePedido,:folioPedido,:concepto,:serie,:folio,:estatusFactura,:numeroPartidas,:numeroUnidades,:importeFactura,:numFactura,:neto,:impuesto,:total,:codigoCliente,:rfc,:nombreCliente,:statusClienteFg,:diasCredito, :pendiente,:estatus,:formaPago,:agente)");

	    $stmt->bindParam(":seriePedido", $datosInsertar["seriePedido"], PDO::PARAM_STR);
	    $stmt->bindParam(":folioPedido", $datosInsertar["folioPedido"], PDO::PARAM_STR); 
	    $stmt->bindParam(":concepto", $datosInsertar["concepto"], PDO::PARAM_STR); 
		$stmt->bindParam(":serie", $datosInsertar["serie"], PDO::PARAM_STR);
	    $stmt->bindParam(":folio", $datosInsertar["folio"], PDO::PARAM_INT);
	    $stmt->bindParam(":estatusFactura", $datosInsertar["estatusFactura"], PDO::PARAM_INT);        
		$stmt->bindParam(":numeroPartidas", $datosInsertar["numeroPartidas"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroUnidades", $datosInsertar["numeroUnidades"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $datosInsertar["importeFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":numFactura", $datosInsertar["numFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":neto", $datosInsertar["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datosInsertar["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datosInsertar["total"], PDO::PARAM_STR);

		$stmt->bindParam(":codigoCliente", $datosInsertar["codigoCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datosInsertar["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreCliente", $datosInsertar["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":statusClienteFg", $datosInsertar["statusClienteFg"], PDO::PARAM_STR);
		$stmt->bindParam(":diasCredito", $datosInsertar["diasCredito"], PDO::PARAM_INT);
		$stmt->bindParam(":pendiente", $datosInsertar["pendiente"], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $datosInsertar["estatus"], PDO::PARAM_STR);
		$stmt->bindParam(":formaPago", $datosInsertar["formaPago"], PDO::PARAM_STR);
		$stmt->bindParam(":agente", $datosInsertar["agente"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*==================================================
	MODELO PARA MOSTRAR TOTALES
	==================================================*/
	public static function mdlMostrarTotales($tabla2, $itemN, $valorN, $itemN2, $valorN2){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(numeroPartidas) as partidasSurtidas, SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas from $tabla2 WHERE folioPedido =:$itemN AND seriePedido = :$itemN2");

		$stmt->bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
		$stmt->bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);

		$stmt-> execute();

		return $stmt -> fetch();

	}

	/*==================================================
	MODELO PARA ACTUALIZAR IMPORTES TOTALES
	==================================================*/
	public static function mdlActualizarFacturacion($tabla, $itemN, $valorN, $itemN2, $valorN2, $datosTotalesFacturacion){

		$stmt = Conexion::conectar()->prepare("UPDATE facturacion set importSurt = :importSurt, partSurt = :partSurt, unidSurt = :unidSurt, nivelSumCosto = ((:importSurt/importeInicial)*100), nivelDeSum = ((:unidSurt/unidSurt)*100) WHERE idPedido =:$itemN AND serie = :$itemN2");

		$stmt->bindParam(":importSurt", $datosTotalesFacturacion["importSurt"], PDO::PARAM_STR);
		$stmt->bindParam(":partSurt", $datosTotalesFacturacion["partSurt"], PDO::PARAM_STR);
		$stmt->bindParam(":unidSurt", $datosTotalesFacturacion["unidSurt"], PDO::PARAM_STR);
		$stmt->bindParam(":nivelSumCosto", $datosTotalesFacturacion["nivelSumCosto"], PDO::PARAM_STR);
		$stmt->bindParam(":nivelDeSum", $datosTotalesFacturacion["nivelDeSum"], PDO::PARAM_STR);

		$stmt->bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
		$stmt->bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;

	}
	/*==================================================
	MODELO PARA MOSTRAR DATOS DE LAS FACTURAS PARA EDITAR
	==================================================*/
	public static function mdlSeleccionarDatosFacturacion($item, $valor, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("SELECT F.id,F.usuario,F.serie as seriePedido,F.idPedido,F.status,F.secciones,F.importeInicial,F.tipoRuta, F.cantidad, F.ordenCompra,F.status,F.tipo,F.fechaRecepcion,F.fechaEntrega,F.observaciones,Fg.serie,Fg.folio,Fg.estatusFactura,Fg.numeroPartidas,Fg.numeroUnidades,Fg.unidadesPendientes,Fg.importeFactura, Fg.statusCliente as estadoCliente,F.nombreCliente from facturacion F LEFT OUTER JOIN facturasgenerales Fg ON F.serie = Fg.seriePedido AND F.idPedido = Fg.folioPedido WHERE F.serie = :$item2 && F.idPedido = :$item");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		$stmt-> execute();

		return $stmt -> fetchAll();

	}

	public static function mdlBuscarCliente($tabla3, $itemNombre, $valorNombre){

		$stmt = Conexion::conectar()->prepare("SELECT codigoCliente AS codigoCliente, rfc AS rfc, nombreCliente, statusCliente AS statusCliente, diasCredito AS diasCredito FROM $tabla3 WHERE $itemNombre = :$itemNombre");

		$stmt->bindParam(":".$itemNombre, $valorNombre, PDO::PARAM_STR);

		$stmt-> execute();

		return $stmt -> fetchAll();

	}

	/*==================================================
	OBTENER EL ULTIMO NUMERO DE SECCIONES
	==================================================*/
	public static function mdlVerUltimaSeccion($tabla, $item, $valor, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("SELECT MAX(secciones) as ultimaSeccion from $tabla WHERE idPedido = :$item AND serie = :$item2");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		$stmt-> execute();

		return $stmt -> fetch();

	}
	/*==================================================
	OBTENER CUANTAS FACTURAS HAY EN FACTURASGENERALES CON EL MISMO FOLIO PEDIDO Y SERIE PEDIDO
	==================================================*/
	public static function mdlContarFacturasGr($tabla1, $item3, $valor3, $item4, $valor4){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as nFacturasGr from $tabla1 WHERE folioPedido = :$item3 AND seriePedido = :$item4");

		$stmt->bindParam(":".$item3, $valor3, PDO::PARAM_INT);
		$stmt->bindParam(":".$item4, $valor4, PDO::PARAM_STR);

		$stmt-> execute();

		return $stmt -> fetch();

	}
	/*==================================================
	MODELO PARA RESTAR UN 1 AL CAMPO SECCIONES DE LA TABLA FACTURACION
	==================================================*/
	public static function mdlActualizarSeccion($tabla, $item, $valor, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET secciones = secciones - 1 WHERE idPedido = :$item AND serie = :$item2");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}

		$stmt -> close();
		$stmt = null;

	}

	public static function mdlActualizarSeccionGr($tabla, $item3, $valor3, $item4, $valor4,$datosCount){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET secciones = :secciones WHERE idPedido = :$item3 AND serie = :$item4");

		$stmt -> bindParam(":secciones",$datosCount["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":".$item3, $valor3, PDO::PARAM_INT);
		$stmt->bindParam(":".$item4, $valor4, PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}

		$stmt -> close();
		$stmt = null;

	}

	/*==================================================
	MODELO PARA ELIMINAR UNA FACTURA DE LA TABLA FACTURASORDENES
	==================================================*/
	public static function mdlEliminarFacturaGeneral($tabla1, $item, $valor, $item2, $valor2){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE serie = :$item AND folio = :$item2");

		$stmt -> bindParam(":serie", $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":folio", $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
	}
	/**
	 * MOSTRAR SUMAS TOTALES PARA ACTUALIZAR EN TABLA FACTURACION DESPUES DE ELIMINAR 
	 */
	static public function mdlMostrarSumaTotalFacturacion($tabla1, $item3, $valor3){
		$stmt = Conexion::conectar()->prepare("SELECT IF(SUM(importeFactura) IS NULL,0,SUM(importeFactura)) AS sumImporte,IF(SUM(numeroUnidades) IS NULL,0,SUM(numeroUnidades)) AS sumUnidades,IF(SUM(numeroPartidas) IS NULL,0,SUM(numeroPartidas)) AS sumPartidas FROM $tabla1 WHERE folioPedido = :$item3");

		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_INT);
		$stmt -> execute();

		return $stmt -> fetch();

	}
	/**
	 * ACTUALIZAR IMPORTES O DATOS DE SURTIMIENTO EN TABLA FACTURACION 
	 */
	static public function mdlActualizarImprtesFacturacion($tabla, $datosAr, $item3, $valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET partSurt = :partSurt, unidSurt = :unidSurt, importSurt = :importSurt WHERE idPedido = :$item3");

		$stmt -> bindParam(":partSurt", $datosAr["partSurt"], PDO::PARAM_STR);
		$stmt -> bindParam(":unidSurt", $datosAr["unidSurt"], PDO::PARAM_STR);
		$stmt -> bindParam(":importSurt", $datosAr["importSurt"], PDO::PARAM_STR);

		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_INT);
		
		if($stmt->execute()){

		return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/**
	 * ACTUALIZAR IMPORTES O DATOS DE SURTIMIENTO EN FACTURACION Y ALMACEN
	 */
	static public function mdlActualizarNivelesAlmacenFacturacion($tabla,$tabla2, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido SET $tabla2.sumPartidas = $tabla.partSurt,$tabla2.nivelPartidas = $tabla.nivelPartidas,$tabla2.sumUnidades = $tabla.unidSurt,$tabla2.nivelDeSum = $tabla.nivelDeSum,$tabla2.importeSurtido = $tabla.importSurt,$tabla2.nivelSumCosto = $tabla.nivelSumCosto where $tabla2.idPedido = :idPedido");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/**
	 * ACTUALIZAR EL NUMERO DE LA FACTURA EN FACTURAS GENERALES
	 */
	
	public static function mdlActualizarNumeroFacturaFacturasGenerales($tabla, $item, $valor){
	$stmt = Conexion::conectar()->prepare("SET @num := 0; UPDATE $tabla SET numFactura = @num := (@num+1) WHERE folioPedido = :$item; ALTER TABLE $tabla AUTO_INCREMENT = 1;");
	$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);

	if($stmt -> execute()){

		return "ok";
	
	}else{

		return "error";	

	}

	$stmt -> close();

	$stmt = null;

}

}