<?php

require_once "conexion.php";
class ModeloFacturacionRuta{
		/*==================================================
	MODELO PARA MOSTRAR LOS DATOS DE LAS FACTURAS
	==================================================*/
static public function mdlMostrarDatosFacturasOT($tabla, $item, $valor){

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT f.partidasTotales AS totalPart,f.unidadesTotales AS totalUnid,f.importeTotal AS totalImport,m.serie,m.folio, m.numeroPartidas,  m.numeroUnidades, m.importeFactura  FROM $tabla m INNER JOIN facturacionot AS f ON f.folio = m.folioPedido WHERE m.folioPedido = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
		$stmt -> execute();

		return $stmt -> fetchAll();

	}

}
	/*==================================================
	MODELO PARA MOSTRAR EL ULTIMO NUMERO DE LAS SECCIONES MAS 1
	==================================================*/
public static function mdlMostrarUltimoNumeroFactura($itemN, $valorN){
	if($itemN != null){

		$stmt = Conexion::conectar()->prepare("SELECT IF(MAX(f.numFactura + 1) IS NULL,1,MAX(f.numFactura + 1)) as ultimoNumero FROM facturasordenes f WHERE f.folioPedido = :$itemN");

		$stmt -> bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
		$stmt -> execute();

		return $stmt -> fetch();

	}
}
	/*==================================================
	MODELO PARA ELIMINAR UNA FACTURA DE LA TABLA FACTURASORDENES
	==================================================*/
public static function mdlEliminarFacturaOrden($tabla1, $item1, $valor1, $item2, $valor2){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE serie = :$item1 AND folio = :$item2");

		$stmt -> bindParam(":serieFactura", $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":folioFactura", $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
}
/*==================================================
OBTENER EL ULTIMO NUMERO DE SECCIONES
==================================================*/
public static function mdlUltimaSeccion($tabla, $itemN2, $valorN2, $itemN, $valorN){

	$stmt = Conexion::conectar()->prepare("SELECT MAX(secciones) as ultimaSeccion from $tabla WHERE serie = :$itemN2 AND folio = :$itemN");

	$stmt->bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);
	$stmt->bindParam(":".$itemN, $valorN, PDO::PARAM_INT);

	$stmt-> execute();

	return $stmt -> fetch();

}
/*==================================================
MODELO PARA RESTAR UN 1 AL CAMPO SECCIONES DE LA TABLA FACTURACIONOT
==================================================*/
public static function mdlEliminarSeccion($tabla, $itemN2, $valorN2, $itemN, $valorN){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET secciones = secciones - 1 WHERE serie = :$itemN2 AND folio = :$itemN");
	$stmt->bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);
	$stmt->bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
	if($stmt -> execute()){
		return "ok";
	}else{
		return "error";	
	}
	$stmt -> close();
	$stmt = null;

}
/*==================================================
MODELO PARA SUMAR UN 1 AL CAMPO SECCIONES DE LA TABLA FACTURACIONOT
==================================================*/
public static function mdlInsertarSeccion($tabla, $itemN2, $valorN2, $itemN, $valorN){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET secciones = secciones + 1 WHERE serie = :$itemN2 AND folio = :$itemN");
	$stmt->bindParam(":".$itemN2, $valorN2, PDO::PARAM_STR);
	$stmt->bindParam(":".$itemN, $valorN, PDO::PARAM_INT);
	if($stmt -> execute()){
		return "ok";
	}else{
		return "error";	
	}
	$stmt -> close();
	$stmt = null;

}

public static function mdlActualizarNumeroFactura($tabla, $item, $valor){
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

static public function mdlInsertarFacturasOrdenes($tabla3, $datosManuales){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla3(seriePedido,folioPedido,serie,folio,estatusFactura,numeroPartidas,numeroUnidades,importeFactura, numFactura) VALUES (:seriePedido,:folioPedido,:serie,:folio,:estatusFactura,:numeroPartidas,:numeroUnidades,:importeFactura,:numFactura)");

    $stmt->bindParam(":seriePedido", $datosManuales["seriePedido"], PDO::PARAM_STR);
    $stmt->bindParam(":folioPedido", $datosManuales["folioPedido"], PDO::PARAM_STR); 
	$stmt->bindParam(":serie", $datosManuales["serie"], PDO::PARAM_STR);
    $stmt->bindParam(":folio", $datosManuales["folio"], PDO::PARAM_INT);
    $stmt->bindParam(":estatusFactura", $datosManuales["estatusFactura"], PDO::PARAM_INT);        
	$stmt->bindParam(":numeroPartidas", $datosManuales["numeroPartidas"], PDO::PARAM_STR);
	$stmt->bindParam(":numeroUnidades", $datosManuales["numeroUnidades"], PDO::PARAM_STR);
	$stmt->bindParam(":importeFactura", $datosManuales["importeFactura"], PDO::PARAM_STR);
	$stmt->bindParam(":numFactura", $datosManuales["numFactura"], PDO::PARAM_INT);

	if($stmt->execute()){

		return "ok";	

	}else{

		return "error";
	
	}

	$stmt->close();
	
	$stmt = null;

}

static public function mdlMostrarSumaTotal($tabla1, $item3, $valor3){
	$stmt = Conexion::conectar()->prepare("SELECT IF(SUM(importeFactura) IS NULL,0,SUM(importeFactura)) AS sumImporte,IF(SUM(numeroUnidades) IS NULL,0,SUM(numeroUnidades)) AS sumUnidades,IF(SUM(numeroPartidas) IS NULL,0,SUM(numeroPartidas)) AS sumPartidas FROM $tabla1 WHERE folioPedido = :$item3");

	$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_INT);
	$stmt -> execute();

	return $stmt -> fetch();

}

static public function mdlActualizarImprtes($tabla, $datosAr, $item3, $valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET partidasSurtidas = :partidasSurtidas, unidadesSurtidas = :unidadesSurtidas, importeSurtido = :importeSurtido WHERE folio = :$item3");

		$stmt -> bindParam(":partidasSurtidas", $datosAr["partidasSurtidas"], PDO::PARAM_STR);
		$stmt -> bindParam(":unidadesSurtidas", $datosAr["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt -> bindParam(":importeSurtido", $datosAr["importeSurtido"], PDO::PARAM_STR);

		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_INT);
		
		if($stmt->execute()){

		return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

}

static public function mdlValidarFolioFacturasOdenes($item1, $valor1, $item2, $valor2){
	if($item1 != null){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(folio) as folioValido FROM facturasordenes WHERE $item1 = :$item1 and $item2  = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);
		$stmt -> execute();

		return $stmt -> fetch();

	}else{
		
	}
}

    static public function mdlMostrarOrdenesDeTrabajo($tabla, $item, $valor,$item2, $valor2){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(folio) as facturas from facturasordenes  WHERE folioPedido = :$item2");

			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

			$stmt -> execute();
			
			$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($arr as $row) {
				if($row['facturas'] != 0){

					$stmt = Conexion::conectar()->prepare("SELECT facturacionot.*,facturasordenes.serie as serieFactura,facturasordenes.folio as folioFactura,facturasordenes.estatusFactura,facturasordenes.numeroPartidas,facturasordenes.numeroUnidades,facturasordenes.unidadesPendientes,facturasordenes.importeFactura,facturasordenes.pendiente,facturasordenes.fecha,facturasordenes.fechaVencimiento,facturasordenes.numFactura,facturasordenes.nombreCliente,facturasordenes.fechaImportacion from $tabla INNER JOIN facturasordenes ON facturacionot.folio = facturasordenes.folioPedido  WHERE facturacionot.$item = :$item group by facturacionot.folio");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

					$stmt -> execute();

					return $stmt -> fetch();

				}else{

					$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

					$stmt -> execute();

					return $stmt -> fetch();

				}
				
			}

			

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT facturacionot.*, facturasordenes.serie as serieFactura,facturasordenes.folio as folioFactura,facturasordenes.importeFactura as importeFactura FROM facturacionot LEFT OUTER JOIN facturasordenes  ON facturacionot.folio = facturasordenes.folioPedido GROUP by folio");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlMostrarDatosFactura($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT serie,folio,numeroPartidas,numeroUnidades,importeFactura FROM $tabla WHERE $item = :$item and numFactura = 2");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

	}
	static public function mdlMostrarDatosFactura3($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT serie,folio,numeroPartidas,numeroUnidades,importeFactura FROM $tabla WHERE $item = :$item and numFactura = 3");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

	}	
	static public function mdlMostrarDatosFactura4($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT serie,folio,numeroPartidas,numeroUnidades,importeFactura FROM $tabla WHERE $item = :$item and numFactura = 4");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

	}	
	static public function mdlMostrarDatosFactura5($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT serie,folio,numeroPartidas,numeroUnidades,importeFactura FROM $tabla WHERE $item = :$item and numFactura = 5");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

	}
	static public function mdlMostrarDatosFactura6($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT serie,folio,numeroPartidas,numeroUnidades,importeFactura FROM $tabla WHERE $item = :$item and numFactura = 6");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

	}
	static public function mdlMostrarDatosFactura7($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT serie,folio,numeroPartidas,numeroUnidades,importeFactura FROM $tabla WHERE $item = :$item and numFactura = 7");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

	}			
    static public function mdlGenerarOrdenFacturacion($tabla4, $datos4){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla4(serie,folio,observaciones,partidasTotales,unidadesTotales,importeTotal,estado,status,secciones,almacen,usuario,habilitado,facturaPendiente,agenteVentas,activo,cliente) VALUES (:serie,:folio,:observaciones,:partidasTotales,:unidadesTotales,:importeTotal,:estado,:status,:secciones,:almacen,:usuario,:habilitado,:facturaPendiente,:agenteVentas,:activo,:cliente)");
        
		$stmt->bindParam(":serie", $datos4["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":folio", $datos4["folio"], PDO::PARAM_STR);
        $stmt->bindParam(":observaciones", $datos4["observaciones"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasTotales", $datos4["partidasTotales"], PDO::PARAM_STR);
        $stmt->bindParam(":unidadesTotales", $datos4["unidadesTotales"], PDO::PARAM_STR);
        $stmt->bindParam(":importeTotal", $datos4["importeTotal"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos4["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":status", $datos4["status"], PDO::PARAM_INT);
		$stmt->bindParam(":secciones", $datos4["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":almacen", $datos4["almacen"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $datos4["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":habilitado", $datos4["habilitado"], PDO::PARAM_INT);
        $stmt->bindParam(":facturaPendiente", $datos4["facturaPendiente"], PDO::PARAM_INT);
        $stmt->bindParam(":agenteVentas", $datos4["agenteVentas"], PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datos4["activo"], PDO::PARAM_INT);
        $stmt->bindParam(":cliente", $datos4["cliente"], PDO::PARAM_STR);
        

		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	static public function mdlEditarOrdenFacturacion($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, secciones = :secciones, almacen = :almacen, fechaRecepcion = :fechaRecepcion, fechaEntrega = :fechaEntrega, estado = :estado, status = :status, facturaPendiente = :pendiente, comentarios = :comentarios WHERE id = :id");

		
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":secciones", $datos["secciones"], PDO::PARAM_INT);
		$stmt->bindParam(":almacen", $datos["almacen"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaRecepcion", $datos["fechaRecepcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaEntrega", $datos["fechaEntrega"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);
		$stmt->bindParam(":pendiente", $datos["pendiente"], PDO::PARAM_INT);
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
	static public function mdlEditarDatosFactura1($tabla3, $factura1){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET numeroPartidas = :partidasSurtidas, numeroUnidades = :unidadesSurtidas, importeFactura = :importeFactura WHERE serie = :serie and folio = :folio");

		
		$stmt->bindParam(":serie", $factura1["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $factura1["folio"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasSurtidas", $factura1["partidasSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesSurtidas", $factura1["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $factura1["importeFactura"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlEditarDatosFactura2($tabla3, $factura2){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET numeroPartidas = :partidasSurtidas, numeroUnidades = :unidadesSurtidas, importeFactura = :importeFactura WHERE serieFactura = :serieFactura and folioFactura = :folioFactura");

		
		$stmt->bindParam(":serieFactura", $factura2["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $factura2["folioFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasSurtidas", $factura2["partidasSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesSurtidas", $factura2["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $factura2["importeFactura"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlEditarDatosFactura3($tabla3, $factura3){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET numeroPartidas = :partidasSurtidas, numeroUnidades = :unidadesSurtidas, importeFactura = :importeFactura WHERE serieFactura = :serieFactura and folioFactura = :folioFactura");

		
		$stmt->bindParam(":serieFactura", $factura3["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $factura3["folioFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasSurtidas", $factura3["partidasSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesSurtidas", $factura3["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $factura3["importeFactura"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlEditarDatosFactura4($tabla3, $factura4){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET numeroPartidas = :partidasSurtidas, numeroUnidades = :unidadesSurtidas, importeFactura = :importeFactura WHERE serieFactura = :serieFactura and folioFactura = :folioFactura");

		
		$stmt->bindParam(":serieFactura", $factura4["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $factura4["folioFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasSurtidas", $factura4["partidasSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesSurtidas", $factura4["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $factura4["importeFactura"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlEditarDatosFactura5($tabla3, $factura5){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET numeroUnidades = :partidasSurtidas, numeroUnidades = :unidadesSurtidas, importeFactura = :importeFactura WHERE serieFactura = :serieFactura and folioFactura = :folioFactura");

		
		$stmt->bindParam(":serieFactura", $factura5["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $factura5["folioFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasSurtidas", $factura5["partidasSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesSurtidas", $factura5["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $factura5["importeFactura"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlEditarDatosFactura6($tabla3, $factura6){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET numeroUnidades = :partidasSurtidas, numeroUnidades = :unidadesSurtidas, importeFactura = :importeFactura WHERE serieFactura = :serieFactura and folioFactura = :folioFactura");

		
		$stmt->bindParam(":serieFactura", $factura6["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $factura6["folioFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasSurtidas", $factura6["partidasSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesSurtidas", $factura6["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $factura6["importeFactura"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlEditarDatosFactura7($tabla3, $factura7){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET numeroUnidades = :partidasSurtidas, numeroUnidades = :unidadesSurtidas, importeFactura = :importeFactura WHERE serieFactura = :serieFactura and folioFactura = :folioFactura");

		
		$stmt->bindParam(":serieFactura", $factura7["serieFactura"], PDO::PARAM_STR);
		$stmt->bindParam(":folioFactura", $factura7["folioFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":partidasSurtidas", $factura7["partidasSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesSurtidas", $factura7["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt->bindParam(":importeFactura", $factura7["importeFactura"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlActualizarDatosFacturacion($tabla3, $datos3){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET partidasTotales = :partidasTotales, unidadesTotales = :unidadesTotales, importeTotal = :importeTotal WHERE folio = :folio");

		
		
		$stmt->bindParam(":partidasTotales", $datos3["partidasTotales"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadesTotales", $datos3["unidadesTotales"], PDO::PARAM_STR);
		$stmt->bindParam(":importeTotal", $datos3["importeTotal"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos3["folio"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
    static public function mdlCancelarOrdenFacturacion($tabla2, $datos2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 set status = 0, estado = 0, estatusFactura = 2, facturaPendiente = 0 WHERE folio = :folio and serie = :serie");

		$stmt -> bindParam(":folio", $datos2["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos2["serie"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
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

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoProceso = TIMEDIFF(fechaEntrega, fechaRecepcion) where folio = :folio AND serie = :serie");

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
	static public function mdlActualizarEstatusTiemposFacturacion($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE estatusordenes INNER JOIN facturacionot ON estatusordenes.folio = facturacionot.folio  SET estatusordenes.tiempoFacturacion = facturacionot.tiempoProceso,estatusordenes.estadoFacturacion = facturacionot.estado,estatusordenes.statusFacturacion = facturacionot.status  WHERE estatusordenes.folio = :folio");

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
	static public function mdlCalcularNivelesFactura($tabla, $folio){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas,SUM(numeroPartidas) as partidasSurtidas FROM $tabla WHERE folio = :folio ");

		$stmt -> bindParam(":folio",$folio, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

	}
	static public function mdlActualizarNivelesFacturacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE facturacionot set importeSurtido = :importeSurtido, unidadesSurtidas = :unidadesSurtidas, partidasSurtidas = :partidasSurtidas, nivelDeImporte = (:importeSurtido*100/importeTotal), nivelDeUnidades = (:unidadesSurtidas*100/unidadesTotales),nivelDePartidas = (:partidasSurtidas*100/partidasTotales)  where folio = :folio");

		$stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
		$stmt -> bindParam(":importeSurtido", $datos["importeSurtido"], PDO::PARAM_STR);
		$stmt -> bindParam(":unidadesSurtidas", $datos["unidadesSurtidas"], PDO::PARAM_STR);
		$stmt -> bindParam(":partidasSurtidas", $datos["partidasSurtidas"], PDO::PARAM_STR);

		if ($stmt -> execute()) {

			return "ok";

		}else {

			return "error";
		}

		$stmt -> close();

		$stmt = null;


	}
	static public function mdlActualizarNivelesAlmacen($tabla,$tabla2, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 INNER JOIN $tabla ON $tabla2.folio = $tabla.folio SET $tabla2.sumPartidas = $tabla.partidasSurtidas,$tabla2.nivelPartidas = $tabla.nivelDePartidas,$tabla2.sumUnidades = $tabla.unidadesSurtidas,$tabla2.nivelUnidades = $tabla.nivelDeUnidades,$tabla2.importeSurtido = $tabla.importeSurtido,$tabla2.nivelImportes = $tabla.nivelDeImporte where $tabla2.folio = :folio");

		$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlActualizarTiempoSegundos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set tiempoSec = TIME_TO_SEC(tiempoProceso), tiempoAlmacenSec = TIME_TO_SEC(tiempoAlmacen), tiempoFacturacionSec = TIME_TO_SEC(tiempoFacturacion) where folio = :folio");

		$stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_INT);

		if ($stmt -> execute()) {

			return "ok";

		}else{

			return "error";
		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlActualizarTiempoFinal($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tiempoFinal = $tabla.tiempoSec+$tabla.tiempoAlmacenSec+$tabla.tiempoFacturacionSec where folio = :folio");

		$stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_INT);

		if ($stmt -> execute()) {

			return "ok";

		}else{

			return "error";
		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlActualizarConcluido($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET concluido = '1' where folio = :folio");

		$stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_INT);

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