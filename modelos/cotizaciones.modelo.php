<?php
require_once "conexion.php";

class ModeloCotizaciones{

	/*=============================================
	MOSTRAR COTIZACIONES
	=============================================*/

	static public function mdlMostrarCotizaciones($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * , SUM(cantidad) as cantidad_productos , SUM(total) as total_cotizacion  FROM $tabla WHERE $item = :$item GROUP BY folio desc");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * , SUM(cantidad) as cantidad_productos , SUM(total) as total_cotizacion  FROM $tabla  GROUP BY folio desc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR COTIZACIONES
	=============================================*/

	static public function mdlMostrarCotizacionesPdf($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item limit 1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * , SUM(cantidad) as cantidad_productos , SUM(total) as total_cotizacion  FROM $tabla GROUP BY folio");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR COTIZACIONES VISTA
	=============================================*/

	static public function mdlMostrarCotizacionesVista($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * , SUM(cantidad) as cantidad_productos , SUM(total) as total_cotizacion, SUM(descuento) as total_descuento,SUM(descuento2) as total_descuento2  FROM $tabla GROUP BY folio desc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR COTIZACIONES CANCELADAS
	=============================================*/

	static public function mdlMostrarCotizacionesVistaCanceladas($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

			$stmt-> close();

			$stmt = null;


	}
	
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla GROUP BY id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR PRODUCTOS COTIZACION
	=============================================*/

	static public function mdlProductosCotizacion($tabla2, $item2, $valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla2 WHERE $item2 = :$item2");

			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla2 GROUP BY id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR PRODUCTOS COTIZACION TOTALES
	=============================================*/

	static public function mdlProductosCotizacionTotales($tabla2, $item2, $valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT *, SUM(neto) as neto_productos , SUM(descuento) as descuento_productos, SUM(descuento2) as descuento_productos2, SUM(iva) as iva_productos, SUM(total) as total_productos FROM $tabla2 WHERE $item2 = :$item2");

			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla2 GROUP BY id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	CANCELAR COTIZACION
	=============================================*/

	static public function mdlCancelarCotizacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set cancelada = 1, motivoCancelacion = :motivoCancelacion WHERE folio = :folio");

		$stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
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
	CANCELAR COTIZACION
	=============================================*/

	static public function mdlDescargarCotizacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set descargada = 1 WHERE folio = :folio");

		$stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	REGISTRO BITACORA ELIMINAR
	=============================================*/
	static public function mdlRegistroBitacoraCancelar($tabla1, $datos1){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(usuario, perfil, accion, folio) VALUES(:usuario, :perfil, :accion, :folio)");

		$stmt->bindParam(":usuario", $datos1["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos1["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":accion", $datos1["accion"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos1["folio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla GROUP BY folio desc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR COTIZACIONES APROBADAS
	=============================================*/

	static public function mdlMostrarCotizacionesAprobadas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(folio) as cotizacionesAprobadas FROM  $tabla WHERE aprobada = 1  GROUP by folio");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR COTIZACIONES TOTALES
	=============================================*/

	static public function mdlMostrarCotizacionesTotales($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(folio) as cotizacionesEnviadas FROM $tabla  GROUP by folio");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR COTIZACIONES POR APROBAR
	=============================================*/

	static public function mdlMostrarCotizacionesPorAprobar($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(folio) as cotizacionesPorAprobar FROM $tabla WHERE aprobada = 0 and cancelada = 0 GROUP by folio");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR COTIZACIONES CANCELADAS
	=============================================*/

	static public function mdlMostrarCotizacionesCanceladas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(folio) as cotizacionesCanceladas FROM $tabla WHERE cancelada = 1 GROUP by folio");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR APROBADA 
	=============================================*/

	static public function mdlActualizarCotizador($tabla, $item1, $valor1, $item2, $valor2){

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
	MOSTRAR REPORTE DE COTIZACIONES
	=============================================*/
	static public function mdlMostrarReporteCotizacion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}
	/*=============================================
	MOSTRAR REPORTE DE COTIZACIONES POR FECHA
	=============================================*/
	static public function mdlMostrarReporteCotizacionFecha($tabla, $valor, $valor2){

		if($valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechaCotizacion BETWEEN :fechaInicio and :fechaFinal");

			$stmt -> bindParam(":fechaInicio", $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":fechaFinal",$valor2, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;


	}


}