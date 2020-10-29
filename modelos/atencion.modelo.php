<?php

require_once "conexion.php";

class ModeloAtencion{

	/*=============================================
	MOSTRAR ATENCION
	=============================================*/

	static public function mdlMostrarAtencion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

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
	/*=============================================
	MOSTRAR ATENCION
	=============================================*/

	static public function mdlMostrarAtencionEstatus($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY folio DESC ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR ATENCION A CLIENTES
	=============================================*/

	static public function mdlMostrarAtencionAClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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
	MOSTRAR PEDIDOS LABORATORIO
	=============================================*/
	static public function mdlMostrarPedidosLaboratorio($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT count(tieneIgualado) as tieneIgualado from  $tabla where tieneIgualado = 1 && pendiente = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS CON IGUALADOS
	=============================================*/
	static public function mdlMostrarPedidosConIgualado($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where tieneIgualado = 1 && pendiente =1");
		
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR PEDIDOS TOTALES
	=============================================*/
	static public function mdlMostrarPedidosTotales($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosTotales from  $tabla where SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosTotales from  $tabla ");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS TERMINADOS
	=============================================*/
	static public function mdlMostrarPedidosTerminados($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosTerminados  from  $tabla where concluido = 1 and estado = 1 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosTerminados  from  $tabla where concluido = 1 and estado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS CANCELADOS
	=============================================*/
	static public function mdlMostrarPedidosCancelados($tabla, $item, $valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosCancelados from  $tabla where estado = 0  and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosCancelados from  $tabla where estado = 0");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS EN PROCESO
	=============================================*/
	static public function mdlMostrarPedidosEnProceso($tabla, $item, $valor){
		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosEnProceso from  $tabla where estado = 1 && concluido = 0 and SUBSTRING(fechaPedido, 4, 2) = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosEnProceso from  $tabla where estado = 1 && concluido = 0");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR PEDIDOS SIN FACTURAR
	=============================================*/
	static public function mdlMostrarPedidosSinFacturar($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT count(id) as pedidosSinFacturar from  $tabla where estado = 1 && estadoAlmacen = 1 && statusAlmacen = 3 && estadoFacturacion = 0");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR COMPRAS EXTERNAS
	=============================================*/
	static public function mdlMostrarComprasExternas($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasExternas from  $tabla where tipoCompra = 1 and sinAdquisicion = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR COMPRAS INTERNAS
	=============================================*/
	static public function mdlMostrarComprasInternas($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT count(tipoCompra) as comprasInternas from  $tabla where tipoCompra = 2 and sinAdquisicion = 2");

		$stmt -> execute();

		return $stmt -> fetch();

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
	REGISTRO DE PEDIDOS
	=============================================*/

	static public function mdlIngresarPedido($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(creado, codigoCliente, nombreCliente, canal, rfc, agenteVentas, diasCredito, statusCliente, serie, folio, tipoPago, metodoPago, formaPago, ordenCompra, numeroPartidas, numeroUnidades, importe, sinAdquisicion, fechaRecepcion, fechaElaboracion, tipoRuta, tieneIgualado, /*tipoCompra,*/ observaciones, estado) VALUES (:creado, :codigoCliente, :nombreCliente, :canal, :rfc, :agenteVentas, :diasCredito, :statusCliente, :serie, :folio, :tipoPago, :metodoPago, :formaPago, :ordenCompra, :numeroPartidas, :numeroUnidades, :importe, :sinAdquisicion, :fechaRecepcion, :fechaElaboracion, :tipoRuta, :tieneIgualado, /*:tipoCompra,*/ :observaciones, :estado)");

		$stmt->bindParam(":creado", $datos["creado"], PDO::PARAM_STR);
		$stmt->bindParam(":codigoCliente", $datos["codigoCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":canal", $datos["canal"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":agenteVentas", $datos["agenteVentas"], PDO::PARAM_STR);
		$stmt->bindParam(":diasCredito", $datos["diasCredito"], PDO::PARAM_INT);
		$stmt->bindParam(":statusCliente", $datos["statusCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
		$stmt->bindParam(":tipoPago", $datos["tipoPago"], PDO::PARAM_STR);
		$stmt->bindParam(":metodoPago", $datos["metodoPago"], PDO::PARAM_STR);
		$stmt->bindParam(":formaPago", $datos["formaPago"], PDO::PARAM_STR);
		$stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroPartidas", $datos["numeroPartidas"], PDO::PARAM_INT);
		$stmt->bindParam(":numeroUnidades", $datos["numeroUnidades"], PDO::PARAM_INT);
		$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
		$stmt->bindParam(":sinAdquisicion", $datos["sinAdquisicion"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaElaboracion", $datos["fechaElaboracion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRuta", $datos["tipoRuta"], PDO::PARAM_STR);
		$stmt->bindParam(":tieneIgualado", $datos["tieneIgualado"], PDO::PARAM_INT);
		//$stmt->bindParam(":tipoCompra", $datos["tipoCompra"], PDO::PARAM_INT);
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

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaElaboracion, fechaRecepcion) where id = :id AND serie = :serie");

			$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
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
	EDITAR PEDIDO
	=============================================*/

	static public function mdlEditarPedido($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET creado = :creado, codigoCliente = :codigoCliente, nombreCliente = :nombreCliente, canal = :canal, rfc = :rfc, agenteVentas = :agenteVentas, diasCredito = :diasCredito, statusCliente = :statusCliente, serie = :serie, folio = :folio, tipoPago = :tipoPago, metodoPago = :metodoPago, formaPago = :formaPago,
		ordenCompra = :ordenCompra, numeroPartidas = :numeroPartidas, numeroUnidades = :numeroUnidades, importe = :importe, fechaRecepcion = :fechaRecepcion, fechaElaboracion = :fechaElaboracion, tipoRuta = :tipoRuta, tieneIgualado = :tieneIgualado, /*tipoCompra = :tipoCompra,*/ observaciones = :observaciones, observaciones2 = :observaciones2, estado = :estado WHERE id = :id");

		
		$stmt->bindParam(":creado", $datos["creado"], PDO::PARAM_STR);
		$stmt->bindParam(":codigoCliente", $datos["codigoCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":canal", $datos["canal"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":agenteVentas", $datos["agenteVentas"], PDO::PARAM_STR);
		$stmt->bindParam(":diasCredito", $datos["diasCredito"], PDO::PARAM_INT);
		$stmt->bindParam(":statusCliente", $datos["statusCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
		$stmt->bindParam(":tipoPago", $datos["tipoPago"], PDO::PARAM_STR);
		$stmt->bindParam(":metodoPago", $datos["metodoPago"], PDO::PARAM_STR);
		$stmt->bindParam(":formaPago", $datos["formaPago"], PDO::PARAM_STR);
		$stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroPartidas", $datos["numeroPartidas"], PDO::PARAM_INT);
		$stmt->bindParam(":numeroUnidades", $datos["numeroUnidades"], PDO::PARAM_STR);
		$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaElaboracion", $datos["fechaElaboracion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRuta", $datos["tipoRuta"], PDO::PARAM_STR);
		$stmt->bindParam(":tieneIgualado", $datos["tieneIgualado"], PDO::PARAM_STR);
		//$stmt->bindParam(":tipoCompra", $datos["tipoCompra"], PDO::PARAM_INT);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones2", $datos["observaciones2"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
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
	CANCELAR PEDIDO
	=============================================*/

	static public function mdlEliminarPedido($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set estado = 0, tiempoProceso = '00:00:00', estadoAlmacen = 0, tiempoAlmacen = '00:00:00', statusAlmacen = 0, estadoLaboratorio = 0, tiempoLaboratorio = '00:00:00', statusLaboratorio = 0, estadoFacturacion = 0, tiempoFacturacion = '00:00:00', statusFacturacion = 0, estadoCompras = 0, tiempoCompras = '00:00:00', statusCompras = 5, estadoLogistica = 0, tiempoLogistica = '00:00:00', statusLogistica= 0, tiempoFinal = '00:00:00', motivoCancelacion = :motivoCancelacion WHERE id = :id");

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
	REGISTRO BITACORA REPORTE ESTATUS
	=============================================*/
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
	/*=============================================
	AGREGAR OBSERVACIONES EXTRA
	=============================================*/
	static public function mdlAgregarObservacionesExtra($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set observacionesExtras = :observacionesExtras WHERE idPedido = :idPedido AND serie = :serie");

		$stmt->bindParam(":observacionesExtras", $datos["observacionesExtras"], PDO::PARAM_STR);
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
	AGREGAR OBSERVACIONES EXTRA
	=============================================*/
	static public function mdlAgregarObservacionesExtra2($tabla2, $datos2){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 set observacionesExtras = :observacionesExtras WHERE idPedido = :idPedido AND serie = :serie");

		$stmt->bindParam(":observacionesExtras", $datos2["observacionesExtras"], PDO::PARAM_STR);
		$stmt->bindParam(":idPedido", $datos2["idPedido"], PDO::PARAM_INT);
		$stmt->bindParam(":serie", $datos2["serie"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR NOMBRE CLIENTE
	=============================================*/
	static public function mdlActualizarClienteAlmacen($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio and $tabla2.serie = $tabla.serie SET $tabla2.nombreCliente = $tabla.nombreCliente WHERE  $tabla2.serie = :serie and $tabla2.idPedido = :folio");

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
	ACTUALIZAR NOMBRE CLIENTE
	=============================================*/
	static public function mdlActualizarClienteFacturacion($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio and $tabla2.serie = $tabla.serie SET $tabla2.nombreCliente = $tabla.nombreCliente WHERE  $tabla2.serie = :serie and $tabla2.idPedido = :folio");

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
	ACTUALIZAR NOMBRE CLIENTE
	=============================================*/
	static public function mdlActualizarClienteLogistica($tabla, $tabla2, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.idPedido = $tabla.folio and $tabla2.serie = $tabla.serie SET $tabla2.nombreCliente = $tabla.nombreCliente WHERE $tabla2.serie = :serie and $tabla2.idPedido = :folio");

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
	ACTUALIZAR FECHA PEDIDO COMPRAS
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