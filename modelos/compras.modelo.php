<?php

require_once "conexion.php";

class ModeloCompras{

	/*=============================================
	MOSTRAR COMPRAS
	=============================================*/

	static public function mdlMostrarCompras($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where tipoCompra != 0");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR COMPRAS ADQUISICION
	=============================================*/

	static public function mdlMostrarComprasAdquisicion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
    HABILITAR COMPRA
	=============================================*/

	static public function mdlHabilitarCompra($tabla, $item1, $valor1, $item2, $valor2){

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
	MOSTRAR COMPRAS ADQUISICION
	=============================================*/

	static public function mdlMostrarComprasPedidos($tabla, $item, $valor){

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
	MOSTRAR COMPRAS EDICION
	=============================================*/

	static public function mdlMostrarComprasEdicion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1");

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
	MOSTRAR COMPRAS CON PROVEEDORES EXTERNOS
	=============================================*/
	static public function mdlMostrarComprasProveedores($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where tipoCompra = 1 and sinAdquisicion = 1");
		
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS
	=============================================*/
	static public function mdlMostrarComprasInter($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where tipoCompra = 2 and status = 6");
		
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR TIEMPO PROCESO
	=============================================*/
	static public function mdlMostrarTiempoProcesoGenerales($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.tiempoCompras = $tabla.tiempoProceso WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	MOSTRAR TIEMPO PROCESO EDICION
	=============================================*/
	static public function mdlMostrarTiempoProcesoEdicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido AND $tabla2.serie = $tabla.serie SET $tabla2.tiempoCompras = $tabla.tiempoProceso WHERE $tabla2.folio = :idPedido AND $tabla2.serie = :serie");

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
	MOSTRAR TIEMPO PROCESO ADQUISICION
	=============================================*/
	static public function mdlMostrarTiempoProcesoAdquisicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.tiempoCompras = $tabla.tiempoProceso WHERE $tabla2.folio = $tabla.idPedido;
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
	MOSTRAR COMPRAS INTERNAS
	=============================================*/
	static public function mdlMostrarComprasInternas($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasInternas from  $tabla where tipoCompra = 2 and estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasInternas from  $tabla where tipoCompra = 2 and estado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS INDICADOR
	=============================================*/
	static public function mdlMostrarComprasInternasIndicador($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasInternas from  $tabla where tipoCompra = 2 and status = 6");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS PENDIENTES
	=============================================*/
	static public function mdlMostrarComprasInternasPendientes($tabla,$item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasInternasPendientes from  $tabla where tipoCompra = 2 && status = 6 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasInternasPendientes from  $tabla where tipoCompra = 2 && status = 6");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR COMPRAS EXTERNAS
	=============================================*/
	static public function mdlMostrarComprasExternas($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasExternas from  $tabla where tipoCompra = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasExternas from  $tabla where tipoCompra = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR COMPRAS EXTERNAS INDICADOR
	=============================================*/
	static public function mdlMostrarComprasExternasIndicador($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasExternas from  $tabla where tipoCompra = 1 && sinAdquisicion = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR COMPRAS EXTERNAS PENDIENTES
	=============================================*/
	static public function mdlMostrarComprasExternasPendientes($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasExternasPendientes from  $tabla where tipoCompra = 1 && sinAdquisicion = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasExternasPendientes from  $tabla where tipoCompra = 1 && sinAdquisicion = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR COMPRAS TOTALES
	=============================================*/
	static public function mdlMostrarComprasTotales($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(sinAdquisicion) as comprasTotales from $tabla where  sinAdquisicion = 0 and estado = 1 and tipoCompra != 0 and pendiente = 0 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(sinAdquisicion) as comprasTotales from $tabla where  sinAdquisicion = 0 and estado = 1 and tipoCompra != 0 and pendiente = 0");

			$stmt -> execute();

			return $stmt -> fetch();

		}


		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR EN RECOLECCION
	=============================================*/
	static public function mdlMostrarEnRecoleccion($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasEnRecoleccion from  $tabla where status = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasEnRecoleccion from  $tabla where status = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PROCESO PAGO
	=============================================*/
	static public function mdlMostrarProcesoPago($tabla, $item, $valor){
		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasProcesoPago from  $tabla where status = 2 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasProcesoPago from  $tabla where status = 2");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR AUTORIZACION PENDIENTE
	=============================================*/
	static public function mdlMostrarAutorizacionPendiente($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasAutorizacionPendiente from  $tabla where status = 3 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasAutorizacionPendiente from  $tabla where status = 3");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR CONCLUIDO
	=============================================*/
	static public function mdlMostrarConcluido($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasConcluido from  $tabla where status = 4 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasConcluido from  $tabla where status = 4");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR CONCLUIDO
	=============================================*/
	static public function mdlMostrarSinAdquisicion($tabla, $item, $valor){
		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasSinAdquisicion from  $tabla where sinAdquisicion = 1 and tipoCompra = 0 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as comprasSinAdquisicion from  $tabla where sinAdquisicion = 1 and tipoCompra = 0");

			$stmt -> execute();

			return $stmt -> fetch();

		}


		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	REALIZAR COMPRAS
	=============================================*/

	static public function mdlRealizarCompras($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET vendedor = :vendedor, usuario = :usuario, serie = :serie, folioCompra = :folioCompra, fechaCotizacion = :fechaCotizacion, cliente = :cliente, secciones = :secciones, cantidad = :cantidad, unidad = :unidad, codigo = :codigo, descripcion = :descripcion, precioUnitario = :precioUnitario, precioCompra = :precioCompra, descuentoProveedor = :descuentoProveedor, cantidad2 = :cantidad2, unidad2 = :unidad2, codigo2 = :codigo2, descripcion2 = :descripcion2, precioUnitario2 = :precioUnitario2, precioCompra2 = :precioCompra2, descuentoProveedor2 = :descuentoProveedor2, cantidad3 = :cantidad3, unidad3 = :unidad3, codigo3 = :codigo3, descripcion3 = :descripcion3, precioUnitario3 = :precioUnitario3, precioCompra3 = :precioCompra3, descuentoProveedor3 = :descuentoProveedor3, cantidad4 = :cantidad4, unidad4 = :unidad4, codigo4 = :codigo4, descripcion4 = :descripcion4, precioUnitario4 = :precioUnitario4, precioCompra4 = :precioCompra4, descuentoProveedor4 = :descuentoProveedor4, cantidad5 = :cantidad5, unidad5 = :unidad5, codigo5 = :codigo5, descripcion5 = :descripcion5, precioUnitario5 = :precioUnitario5, precioCompra5 = :precioCompra5, descuentoProveedor5 = :descuentoProveedor5, status = :status, sinAdquisicion = :sinAdquisicion, tiempoEntrega = :tiempoEntrega, fechaRecepcion = :fechaRecepcion, fechaElaboracion = :fechaElaboracion, fechaTermino = :fechaTermino, observaciones = :observaciones, estado = :estado WHERE idPedido = :idPedido");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":vendedor", $datos["vendedor"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folioCompra", $datos["folioCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaCotizacion", $datos["fechaCotizacion"], PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":secciones", $datos["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad", $datos["unidad"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario", $datos["precioUnitario"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra", $datos["precioCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor", $datos["descuentoProveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad2", $datos["cantidad2"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad2", $datos["unidad2"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo2", $datos["codigo2"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion2", $datos["descripcion2"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario2", $datos["precioUnitario2"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra2", $datos["precioCompra2"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor2", $datos["descuentoProveedor2"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad3", $datos["cantidad3"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad3", $datos["unidad3"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo3", $datos["codigo3"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion3", $datos["descripcion3"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario3", $datos["precioUnitario3"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra3", $datos["precioCompra3"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor3", $datos["descuentoProveedor3"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad4", $datos["cantidad4"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad4", $datos["unidad4"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo4", $datos["codigo4"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion4", $datos["descripcion4"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario4", $datos["precioUnitario4"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra4", $datos["precioCompra4"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor4", $datos["descuentoProveedor4"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad5", $datos["cantidad5"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad5", $datos["unidad5"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo5", $datos["codigo5"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion5", $datos["descripcion5"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario5", $datos["precioUnitario5"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra5", $datos["precioCompra5"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor5", $datos["descuentoProveedor5"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":sinAdquisicion", $datos["sinAdquisicion"], PDO::PARAM_INT);
		$stmt->bindParam(":tiempoEntrega", $datos["tiempoEntrega"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaElaboracion", $datos["fechaElaboracion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino", $datos["fechaTermino"], PDO::PARAM_STR);
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
	/*=============================================
	REALIZAR COMPRAS GENERALES
	=============================================*/

	static public function mdlRealizarComprasGenerales($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, serie = :serie, idPedido = :idPedido, folioCompra = :folioCompra, cliente = :cliente, cantidad = :cantidad, importeCompra = :importeCompra, status = :status, sinAdquisicion = :sinAdquisicion, fechaRecepcion = :fechaRecepcion, fechaElaboracion = :fechaElaboracion, fechaTermino = :fechaTermino, observaciones = :observaciones, estado = :estado, pendiente = :pendiente WHERE idPedido = :idPedido and serie = :serie");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folioCompra", $datos["folioCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":importeCompra", $datos["importeCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":sinAdquisicion", $datos["sinAdquisicion"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaElaboracion", $datos["fechaElaboracion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino", $datos["fechaTermino"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":pendiente", $datos["pendiente"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	PEDIDOS SIN ADQUISICION
	=============================================*/

	static public function mdlSinAdquisicion($tabla, $datos){
		$idPedido = $datos["idPedido"];
		$serie = $datos["serie"];

		$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idPedido='".$idPedido."' and serie = '".$serie."'");
		$consulta->execute();
		$num_rows= $consulta->fetchAll(PDO::FETCH_ASSOC);

		if ($num_rows) {
			
		}else {

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idPedido, serie, cliente, status, sinAdquisicion, estado, pendiente) VALUES (:idPedido,:serie, :cliente, :status, :sinAdquisicion, :estado, :pendiente)");

		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":sinAdquisicion", $datos["sinAdquisicion"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":pendiente", $datos["pendiente"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
		}

		

	}
	/*=============================================
	PEDIDOS SIN ADQUISICION
	=============================================*/

	static public function mdlSinAdquisicionLogistica($tabla, $datos){
	

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set statusCompras = :statusCompras,estadoCompras = :estadoCompras where idPedido = :idPedido AND serie = :serie");

		$stmt->bindParam(":statusCompras", $datos["statusCompras"], PDO::PARAM_INT);
		$stmt->bindParam(":estadoCompras", $datos["estadoCompras"], PDO::PARAM_INT);
		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
		

		

	}
	/*=============================================
	ACTUALIZAR SIN ADQUISICION
	=============================================*/
	static public function mdlActualizarSinAdquisicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.sinAdquisicion = $tabla.sinAdquisicion WHERE $tabla2.folio = :folio and $tabla2.serie = :serie");

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
	CALCULAR UTILIDAD
	=============================================*/
	static public function mdlCalcularUtilidad($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set utilidad = ((precioUnitario-precioCompra)/precioUnitario)*100 where idPedido = :idPedido and serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";

			}
			$stmt -> close();

			$stmt = null;


	}
	/*=============================================
	CALCULAR UTILIDAD
	=============================================*/
	static public function mdlCalcularUtilidad2($tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set utilidad2 = ((precioUnitario2-precioCompra2)/precioUnitario2)*100 where idPedido = :idPedido and serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";

			}
			$stmt -> close();

			$stmt = null;


	}
	/*=============================================
	CALCULAR UTILIDAD
	=============================================*/
	static public function mdlCalcularUtilidad3($tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set utilidad3 = ((precioUnitario3-precioCompra3)/precioUnitario3)*100 where idPedido = :idPedido and serie = :serie");

			$stmt -> bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
			$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);

			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";

			}
			$stmt -> close();

			$stmt = null;


	}
	/*=============================================
	CALCULAR UTILIDAD
	=============================================*/
	static public function mdlCalcularUtilidad4($tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set utilidad4 = ((precioUnitario4-precioCompra4)/precioUnitario4)*100 where idPedido = :idPedido and serie = :serie");

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
	CALCULAR UTILIDAD
	=============================================*/
	static public function mdlCalcularUtilidad5($tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set utilidad5 = ((precioUnitario5-precioCompra5)/precioUnitario5)*100 where idPedido = :idPedido and serie = :serie");

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
	ACTUALIZAR TIEMPO PROCESO
	=============================================*/
	static public function mdlActualizarTiempoProceso($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaTermino,fechaRecepcion) where idPedido = :idPedido and serie = :serie");

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
	ACTUALIZAR TIEMPO PROCESO GENERAL
	=============================================*/
	static public function mdlActualizarTiempoProcesoGenerales($tabla, $datos){

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
	ACTUALIZAR TIEMPO PROCESO ADQUISICION
	=============================================*/
	static public function mdlActualizarTiempoProcesoAdquisicion($tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaTermino,fechaRecepcion)");

			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";

			}
			$stmt -> close();

			$stmt = null;


	}
	/*=============================================
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS GENERALES
	=============================================*/
	static public function mdlActualizarEstadoComprasGenerales($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.estadoCompras = $tabla.estado WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS PROVEEDORES
	=============================================*/
	static public function mdlActualizarEstadoComprasProveedores($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.estadoCompras = $tabla.estado WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.estadoCompras = $tabla.estado WHERE $tabla2.idPedido = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR ESTADO PEDIDO GENERALES
	=============================================*/
	static public function mdlActualizarEstadoPedidoGenerales($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.estadoCompras = $tabla.estado WHERE $tabla2.idPedido = :idPedido and $tabla2.serie = :serie");

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

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.statusCompras = $tabla.status WHERE $tabla2.idPedido = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR STATUS PEDIDO GENERALES
	=============================================*/
	static public function mdlActualizarStatusPedidoGenerales($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.statusCompras = $tabla.status WHERE $tabla2.idPedido = :idPedido  and $tabla2.serie = :serie");

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
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS
	=============================================*/
	static public function mdlActualizarEstadoComprasAtencion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.estadoCompras = $tabla.estado WHERE $tabla2.serie = :serie AND $tabla2.folio = :folio");

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
	ACTUALIZAR STATUS COMPRAS
	=============================================*/
	static public function mdlActualizarStatusCompras($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.statusCompras = $tabla.status WHERE  $tabla.idPedido = :folio");
			$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	
	/*=============================================
	ACTUALIZAR ADQUISICION
	=============================================*/
	static public function mdlActualizarAdquisicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.sinAdquisicion = $tabla.sinAdquisicion WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR ADQUISICION GENERALES
	=============================================*/
	static public function mdlActualizarAdquisicionGenerales($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and  $tabla2.serie = $tabla.serie SET $tabla2.sinAdquisicion = $tabla.sinAdquisicion WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR STATUS COMPRAS ATENCION
	=============================================*/
	static public function mdlActualizarStatusComprasAtencion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and  $tabla2.serie = $tabla.serie SET $tabla2.statusCompras = $tabla.status WHERE $tabla2.folio = :folio and $tabla2.serie = :serie");

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
	ACTUALIZAR STATUS COMPRAS EDICION
	=============================================*/
	static public function mdlActualizarStatusComprasEdicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.statusCompras = $tabla.status WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR STATUS COMPRAS GENERALES
	=============================================*/
	static public function mdlActualizarStatusComprasGenerales($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido and $tabla2.serie = $tabla.serie SET $tabla2.statusCompras = $tabla.status WHERE $tabla2.folio = :idPedido and $tabla2.serie = :serie");

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
	ACTUALIZAR STATUS COMPRAS ADQUISICION
	=============================================*/
	static public function mdlActualizarStatusComprasAdquisicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.statusCompras = $tabla.status WHERE $tabla2.folio = $tabla.idPedido;
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
	ACTUALIZAR ESTADO ATENCION A CLIENTES DE COMPRAS SIN ADQUISICION
	=============================================*/
	static public function mdlActualizarEstadoComprasAdquisicion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.idPedido
SET $tabla2.estadoCompras = $tabla.estado WHERE $tabla2.folio = $tabla.idPedido;
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
	EDITAR COMPRA
	=============================================*/

	static public function mdlEditarCompra($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET vendedor = :vendedor, usuario = :usuario, serie = :serie, idPedido = :idPedido, folioCompra = :folioCompra, fechaCotizacion = :fechaCotizacion, cliente = :cliente, secciones = :secciones, cantidad = :cantidad, unidad = :unidad, codigo = :codigo, descripcion = :descripcion, precioUnitario = :precioUnitario, precioCompra = :precioCompra, descuentoProveedor = :descuentoProveedor, cantidad2 = :cantidad2, unidad2 = :unidad2, codigo2 = :codigo2, descripcion2 = :descripcion2, precioUnitario2 = :precioUnitario2, precioCompra2 = :precioCompra2, descuentoProveedor2 = :descuentoProveedor2, cantidad3 = :cantidad3, unidad3 = :unidad3, codigo3 = :codigo3, descripcion3 = :descripcion3, precioUnitario3 = :precioUnitario3, precioCompra3 = :precioCompra3, descuentoProveedor3 = :descuentoProveedor3, cantidad4 = :cantidad4, unidad4 = :unidad4, codigo4 = :codigo4, descripcion4 = :descripcion4, precioUnitario4 = :precioUnitario4, precioCompra4 = :precioCompra4, descuentoProveedor4 = :descuentoProveedor4, cantidad5 = :cantidad5, unidad5 = :unidad5, codigo5 = :codigo5, descripcion5 = :descripcion5, precioUnitario5 = :precioUnitario5, precioCompra5 = :precioCompra5, descuentoProveedor5 = :descuentoProveedor5, tiempoEntrega = :tiempoEntrega, fechaRecepcion = :fechaRecepcion, fechaElaboracion = :fechaElaboracion, fechaTermino = :fechaTermino, status = :status, sinAdquisicion = :sinAdquisicion, observaciones = :observaciones, estado = :estado, pendiente = :pendiente WHERE idPedido = :idPedido and serie = :serie");

		$stmt->bindParam(":vendedor", $datos["vendedor"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":idPedido", $datos["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":folioCompra", $datos["folioCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaCotizacion", $datos["fechaCotizacion"], PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":secciones", $datos["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad", $datos["unidad"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario", $datos["precioUnitario"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra", $datos["precioCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor", $datos["descuentoProveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad2", $datos["cantidad2"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad2", $datos["unidad2"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo2", $datos["codigo2"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion2", $datos["descripcion2"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario2", $datos["precioUnitario2"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra2", $datos["precioCompra2"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor2", $datos["descuentoProveedor2"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad3", $datos["cantidad3"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad3", $datos["unidad3"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo3", $datos["codigo3"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion3", $datos["descripcion3"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario3", $datos["precioUnitario3"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra3", $datos["precioCompra3"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor3", $datos["descuentoProveedor3"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad4", $datos["cantidad4"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad4", $datos["unidad4"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo4", $datos["codigo4"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion4", $datos["descripcion4"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario4", $datos["precioUnitario4"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra4", $datos["precioCompra4"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor4", $datos["descuentoProveedor4"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad5", $datos["cantidad5"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad5", $datos["unidad5"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo5", $datos["codigo5"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion5", $datos["descripcion5"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario5", $datos["precioUnitario5"], PDO::PARAM_STR);
		$stmt->bindParam(":precioCompra5", $datos["precioCompra5"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoProveedor5", $datos["descuentoProveedor5"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempoEntrega", $datos["tiempoEntrega"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaElaboracion", $datos["fechaElaboracion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaTermino", $datos["fechaTermino"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":sinAdquisicion", $datos["sinAdquisicion"], PDO::PARAM_INT);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
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
	CANCELAR PEDIDO COMPRAS
	=============================================*/

	static public function mdlEliminarPedidoCompras($tabla4, $datos4){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla4 set status = 5, estado = 0 WHERE idPedido = :idPedido AND serie = :serie");

		$stmt -> bindParam(":idPedido", $datos4["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos4["serie"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	ELIMINAR COMPRA
	=============================================*/

	static public function mdlEliminarCompra($tabla, $datos){

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
	REGISTRO BITACORA ELIMINAR
	=============================================*/
	static public function mdlRegistroBitacoraEliminar($tabla2, $datos2){

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



}