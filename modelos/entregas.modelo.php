<?php

require_once "conexion.php";

class ModeloEntregas{


	static public function mdlMostrarEntregas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT ent.*,unid.unidad as unidad,op.nombre as operador,rut.tipoRuta FROM $tabla as ent INNER JOIN unidades as unid ON ent.idUnidad = unid.id INNER JOIN operadores as op ON ent.idOperador = op.id  INNER JOIN rutas as rut ON ent.entrega = rut.id");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlMostrarListaOperadores($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlMostrarListaRutas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla GROUP by tipoRuta");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlMostrarListaFacturas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id,serie,folio,nombreCliente,total,tipoCliente,procesoEntrega FROM $tabla where idEntrega = 0");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlMostrarUnidadesRuta($tabla,$item,$valor){

		$ruta = $valor;
		$stmt = Conexion::conectar()->prepare("SELECT un.id,un.unidad FROM $tabla as un INNER JOIN rutas as rt ON rt.idUnidades = un.id  where rt.$item like '%$ruta%'");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();



	}
	static public function mdlActualizarEntregaFactura($tabla, $item,$valor){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set procesoEntrega = 1 WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlActualizarEntregaFacturaRemove($tabla, $item,$valor){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set procesoEntrega = 0 WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlObtenerMontoEntrega($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT  total FROM $tabla where $item = :$item ");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlObtenerFolioEntrega($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT IF(MAX(id) is null,1,MAX(id)+1) as folio FROM $tabla ");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlGenerarNuevaEntrega($tabla,$datosEntrega){

		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id,fecha,idOperador,entrega,idUnidad,montoTotal,tipoEntrega) VALUES (:id,:fechaEntrega,:operador,:entrega,:unidad,:montoTotal,:tipoEntrega)");

		$stmt->bindParam(":id", $datosEntrega["id"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaEntrega", $datosEntrega["fechaEntrega"], PDO::PARAM_STR);
		$stmt->bindParam(":operador", $datosEntrega["operador"], PDO::PARAM_STR);
		$stmt->bindParam(":entrega", $datosEntrega["entrega"], PDO::PARAM_STR);
		$stmt->bindParam(":unidad", $datosEntrega["unidad"], PDO::PARAM_STR);
		$stmt->bindParam(":montoTotal", $datosEntrega["montoTotal"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoEntrega", $datosEntrega["tipoEntrega"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;


	}
	static public function mdlActualizarFacturaEntrega($tabla,$item,$valor,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item2 = :$item2 WHERE $item = :$item ");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarDatosFactura($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT nombreCliente,tipoCliente FROM $tabla where $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlObtenerUtilidadCliente($tabla,$cliente){

		$stmt = Conexion::conectar()->prepare("SELECT porcUtilidad *100 as utilidad,utilidad as monto FROM $tabla where cliente = '".$cliente."'");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlObtenerCostoHoraEntrega($tabla,$nombreRuta,$unidad){

		$stmt = Conexion::conectar()->prepare("SELECT costoHora as costo FROM $tabla where tipoRuta like '%$nombreRuta%' and idUnidades = $unidad");
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlInsertarFacturaEntrega($tabla,$datosFactura){

		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idEntrega,idFactura,tipoCliente,costoHora,promedio) VALUES (:idEntrega,:idFactura,:tipoCliente,:costoHora,:promedio)");

		$stmt->bindParam(":idEntrega", $datosFactura["idEntrega"], PDO::PARAM_INT);
		$stmt->bindParam(":idFactura", $datosFactura["idFactura"], PDO::PARAM_INT);
		$stmt->bindParam(":tipoCliente", $datosFactura["tipoCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":costoHora", $datosFactura["costoHora"], PDO::PARAM_STR);
		$stmt->bindParam(":promedio", $datosFactura["promedio"], PDO::PARAM_STR);
	
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;


	}
	static public function mdlMostrarFacturasEntrega($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT fac.*,facg.serie,facg.folio,facg.nombreCliente,facg.total,fac.horaInicio,fac.horaTermino from $tabla as fac INNER JOIN facturasGenerales as facg on fac.idFactura = facg.id where fac.$item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlDetalleEntrega($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT ent.*,unid.unidad as unidad,op.nombre as operador,rut.tipoRuta FROM $tabla as ent INNER JOIN unidades as unid ON ent.idUnidad = unid.id INNER JOIN operadores as op ON ent.idOperador = op.id  INNER JOIN rutas as rut ON ent.entrega = rut.id where $item = :$item");


		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;


	}
	static public function mdlActualizarHorariosFactura($tabla,$item,$valor,$inicio,$termino,$horas,$total){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set horaInicio = '".$inicio."', horaTermino = '".$termino."', horas = $horas,subtotal = costoHora * $horas,porcGasto = (costoHora * $horas)/$total,utilidad = (costoHora * $horas)/$total - promedio   WHERE $item = :$item ");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();

		$stmt = null;

	}
	static public function mdlFinalizarEntrega($tabla,$idEntrega){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set concluida = 1 WHERE id = $idEntrega ");

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();

		$stmt = null;

	}
	static public function mdlPendientesFinalizar($tabla,$idEntrega){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as pendientes FROM $tabla WHERE horaInicio = '00:00:00' and idEntrega = $idEntrega");
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlObtenerTotalFactura($tabla,$idFacturaEntrega){

		$stmt = Conexion::conectar()->prepare("SELECT total as total FROM $tabla WHERE id = $idFacturaEntrega");
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}


	

}

?>