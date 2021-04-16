<?php
require_once "conexion.php";

/**
 * 
 */
class ModeloValidador 
{
	
	static public function mdlObtenerMovimiento($tabla,$idMovimiento){

		$stmt = Conexion::conectar()->prepare("SELECT id,conceptoFacturas FROM $tabla where idMovimientoBanco = $idMovimiento");

		if($stmt -> execute()){

			$cuenta = $stmt->rowCount();

			if ($cuenta > 0) {

				return $stmt -> fetchAll();
				
			}else{

				return $cuenta;

			}

			
		
		}else{

			$cuenta = $stmt->rowCount();

			return $cuenta;

		}

		

		$stmt-> close();

		$stmt = null;

	}	

	static public function mdlBuscarAbonoBancario($tabla,$idMovimiento,$serie,$folio){

		$stmt = Conexion::conectar()->prepare("SELECT id,totalAbono FROM $tabla WHERE idMovimientoBanco = $idMovimiento and serieFactura = '$serie' and folioFactura = $folio");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	static public function mdlEliminarDeposito($tabla,$idDeposito,$idMovimiento){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id = $idDeposito and idMovimientoBanco = $idMovimiento");

		if($stmt -> execute()){

			$cuenta = $stmt->rowCount();

			return $cuenta;
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlEliminarAbonoBancario($tabla,$idMovimiento,$idAbono){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id = $idAbono and idMovimientoBanco = $idMovimiento");

		if($stmt -> execute()){

			$cuenta = $stmt->rowCount();

			return $cuenta;
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlActualizarFacturas($tabla,$serie,$folio,$abono,$total){

		if ($total == $abono) {
			$pendiente = $total;
			$pagado = 0;
			$depositada = 0;
		}else{
			$pendiente = $total-$abono;
			$pagado = $total-$pendiente;
			$depositada = 1;
		}
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pendiente = $pendiente,pagado = $pagado,depositada = $depositada,abono = total-pendiente,observacionesComercial = 'ACTUALIZACION BANCOS CUARTA PARTE' where serie = '$serie' and folio = $folio");

		if($stmt -> execute()){

			$cuenta = $stmt->rowCount();

			return $cuenta;
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlActualizarMovimientoBancario($tabla,$idMovimiento){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET departamento = NULL,parciales = 0,acreedor = '',concepto = '',numeroDocumento = '',importeParciales = 0 where id = $idMovimiento");

		if($stmt -> execute()){

			$cuenta = $stmt->rowCount();

			return $cuenta;
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlActualizarParciales($tabla,$idMovimiento){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET parcial = 0, departamentoParcial1 = '',parcial2 = 0, departamentoParcial2 = '',parcial3 = 0, departamentoParcial3 = '',parcial4 = 0, departamentoParcial4 = '',parcial5 = 0, departamentoParcial5 = '',parcial6 = 0, departamentoParcial6 = '',parcial7 = 0, departamentoParcial7 = '',parcial8 = 0, departamentoParcial8 = '',parcial9 = 0, departamentoParcial9 = '',parcial10 = 0, departamentoParcial10 = '',parcial11 = 0, departamentoParcial11 = '',parcial12 = 0, departamentoParcial12 = '',parcial13 = 0, departamentoParcial13 = '',parcial14 = 0, departamentoParcial14 = '',parcial15 = 0, departamentoParcial15 = '',parcial16 = 0, departamentoParcial16 = '',parcial17 = 0, departamentoParcial17 = '',parcial18 = 0, departamentoParcial18 = '',parcial19 = 0, departamentoParcial19 = '',parcial20 = 0, departamentoParcial20 = '',parcial21 = 0, departamentoParcial21 = '',parcial22 = 0, departamentoParcial22 = '',parcial23 = 0, departamentoParcial23 = '',parcial24 = 0, departamentoParcial24 = '',parcial25 = 0, departamentoParcial25 = '',parcial26 = 0, departamentoParcial26 = '',parcial27 = 0, departamentoParcial27 = '',parcial28 = 0, departamentoParcial28 = '',parcial29 = 0, departamentoParcial29 = '',parcial30 = 0, departamentoParcial30 = ''  where id = $idMovimiento");

		if($stmt -> execute()){

			$cuenta = $stmt->rowCount();

			return $cuenta;
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlBuscarAbonoPorDocumento($tabla,$serie,$folio){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as existentes FROM $tabla where serieFactura = '$serie' and folioFactura = $folio");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlBuscarPendienteFactura($tabla,$serie,$folio){

		$stmt = Conexion::conectar()->prepare("SELECT pendiente,total FROM $tabla where serie = '$serie' and folio = $folio");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
	static public function mdlBuscarDetalleAbono($tabla,$serie,$folio){

		$stmt = Conexion::conectar()->prepare("SELECT id,totalAbono,IF(MIN(pendienteFactura) IS NULL,0,MIN(pendienteFactura)) as pendienteFactura, IF(MAX(numeroParcial) IS NULL,1,MAX(numeroParcial)) maximo, MIN(numeroParcial) as minimo,numeroParcial from $tabla where serieFactura = '$serie' and folioFactura = $folio");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}		
	static public function mdlActualizarPendienteAbono($tabla,$idAbono,$total,$totalAbono){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pendienteFactura = $total-$totalAbono where id = $idAbono");

		if($stmt -> execute()){

			$cuenta = $stmt->rowCount();

			return $cuenta;
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}	
	static public function mdlActualizarParcialAbono($tabla,$idAbonoPendiente,$numeroParcial){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numeroParcial = $numeroParcial where id = $idAbonoPendiente");

		if($stmt -> execute()){

			$cuenta = $stmt->rowCount();

			return $cuenta;
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	
}

?>