<?php
require_once "conexion.php";
error_reporting(0);
class ModeloFacturasTiendas{

	static public function mdlMostrarFacturas($tabla,$item,$valor,$item2,$valor2){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item = :$item and $item2 = :$item2 and cancelado != 1");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	static public function mdlMostrarFacturasCorte($tabla,$item,$valor,$item2,$valor2,$item3,$valor3){

		if ($valor2 == 'ALL') {


			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item BETWEEN '$fechaInicio' AND '$fechaFinal' and  $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1");

		
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			

			$stmt -> execute();

			return $stmt->fetchAll();
			
		}else{


			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);

			$concepto = $valor2;

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item BETWEEN '$fechaInicio' AND '$fechaFinal' and  $item2 in ($concepto) and seriePedido != 'OTRT' and cancelado != 1");

		
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			

			$stmt -> execute();

			return $stmt->fetchAll();

		}

	}
	static public function mdlMostrarFacturasSaldosPendientes($tabla,$item,$valor,$item2,$valor2,$item3, $valor3){

		if($valor2 == 'ALL'){

			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item BETWEEN '$fechaInicio' AND '$fechaFinal' and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and pendiente != 0 and cancelado != 1");


			$stmt -> execute();

			return $stmt->fetchAll();

		}else{


			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);
			$concepto = $valor2;

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item BETWEEN '$fechaInicio' AND '$fechaFinal' and $item2 in ($concepto)  and seriePedido != 'OTRT' and pendiente != 0 and cancelado != 1");

			
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();
		}

	}
static public function mdlMostrarFacturasAbonoParcial($tabla,$item,$valor,$item2,$valor2,$item3, $valor3){

		if($valor2 == 'ALL'){

			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item BETWEEN '$fechaInicio' AND '$fechaFinal' and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and pendiente != 0 and cancelado != 1");


			$stmt -> execute();

			return $stmt->fetchAll();

		}else{


			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);
			$concepto = $valor2;

			$stmt = Conexion::conectar()->prepare("SELECT  fc.*,ab.id from $tabla  as fc  left outer join abonos as ab ON fc.serie = ab.serieFactura and fc.folio = ab.folioFactura where fc.$item BETWEEN '$fechaInicio' AND '$fechaFinal' and fc.$item2 in ($concepto)  and fc.seriePedido != 'OTRT' and fc.pendiente = 0 and fc.cancelado != 1 and ab.id IS NULL ORDER BY fc.folio asc");

			
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();
		}

	}
	static public function mdlMostrarVentasDiarioTiendas($tabla,$item,$valor,$item2,$valor2){

		if($valor2 == 'ALL'){

			$stmt =  Conexion::conectar()->prepare("SELECT nombreCliente,sum(neto) as importe,sum(impuesto) as impuesto, sum(total) as totalDocumento FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 GROUP by nombreCliente");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
		

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$concepto = $valor2;

			$stmt =  Conexion::conectar()->prepare("SELECT nombreCliente,sum(neto) as importe,sum(impuesto) as impuesto, sum(total) as totalDocumento FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 GROUP by nombreCliente");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

			$stmt -> close();

			$stmt = null;
	}
	static public function mdlMostrarVentasDiarioTiendasTotal($tabla,$item,$valor,$item2,$valor2){

		if($valor2 == 'ALL'){

			$stmt =  Conexion::conectar()->prepare("SELECT sum(neto) as totalImporte,sum(impuesto) as totalImpuesto, sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
	

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$concepto = $valor2;
			$stmt =  Conexion::conectar()->prepare("SELECT sum(neto) as totalImporte,sum(impuesto) as totalImpuesto, sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

			$stmt -> close();

			$stmt = null;
	}
	static public function mdlMostrarCobrosDiarioTiendas($tabla,$item,$valor,$item2,$valor2){

			if ($valor2 == 'ALL') {
				
				$stmt =  Conexion::conectar()->prepare("SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 and formaPago = 'EFECTIVO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 and formaPago = 'TARJETA DE DÉBITO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 and formaPago = 'TARJETA DE CRÉDITO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 and formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 and formaPago = 'CHEQUE NOMINATIVO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 and formaPago = 'CREDITO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 and formaPago = 'POR DEFINIR' GROUP by nombreCliente order by nombreCliente asc");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else{

				$concepto = $valor2;

				$stmt =  Conexion::conectar()->prepare("SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 and formaPago = 'EFECTIVO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 and formaPago = 'TARJETA DE DÉBITO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 and formaPago = 'TARJETA DE CRÉDITO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 and formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 and formaPago = 'CHEQUE NOMINATIVO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 and formaPago = 'CREDITO' GROUP by nombreCliente UNION ALL SELECT nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 and formaPago = 'POR DEFINIR' GROUP by nombreCliente order by nombreCliente asc");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;
	}
	
	static public function mdlMostrarCobrosDiarioTiendasTotal($tabla,$item,$valor,$item2,$valor2){

			if ($valor2 == 'ALL') {
				
				$stmt =  Conexion::conectar()->prepare("SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='EFECTIVO' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='TARJETA DE DÉBITO' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='TARJETA DE CRÉDITO' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='TRANSFERENCIA ELECTRÓNICA DE FONDOS' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='CHEQUE NOMINATIVO' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='CREDITO' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='POR DEFINIR' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else{

				$concepto = $valor2;

				$stmt =  Conexion::conectar()->prepare("SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='EFECTIVO' and $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='TARJETA DE DÉBITO' and $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='TARJETA DE CRÉDITO' and $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='TRANSFERENCIA ELECTRÓNICA DE FONDOS' and $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='CHEQUE NOMINATIVO' and $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='CREDITO' and $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE formaPago='POR DEFINIR' and $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 UNION ALL SELECT IF(sum(total) IS NULL,'0', sum(total)) FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();


			}
			

			$stmt -> close();

			$stmt = null;
	}

	static public function mdlMostrarTotalCobrosDiarios($tabla,$item,$valor,$item2,$valor2){

			if($valor2 == 'ALL'){

				$stmt =  Conexion::conectar()->prepare("SELECT IF(formaPago = 'EFECTIVO',sum(total),'') as efectivo FROM $tabla WHERE formaPago = 'EFECTIVO' AND $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1  and seriePedido = 'OTRT' UNION ALL SELECT IF(formaPago = 'EFECTIVO',sum(total),'') as efectivo FROM $tabla WHERE formaPago = 'EFECTIVO' AND nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1  and seriePedido = 'OTRT'");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else{
				$stmt =  Conexion::conectar()->prepare("SELECT IF(formaPago = 'EFECTIVO',sum(total),'') as efectivo FROM $tabla WHERE formaPago = 'EFECTIVO' AND $item = :$item and $item2 in($valor2) and cancelado != 1 and seriePedido != 'OTRT' UNION ALL SELECT IF(formaPago = 'EFECTIVO',sum(total),'') as efectivo FROM $tabla WHERE formaPago = 'EFECTIVO' AND nuevaFechaFactura = :$item and $item2 in($valor2) and cancelado != 1 and seriePedido != 'OTRT'");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}
			$stmt -> close();

			$stmt = null;
	}
	
	static public function mdlMostrarCancelacionesTiendas($tabla,$item,$valor){

			if ($valor == 'ALL') {

				$stmt =  Conexion::conectar()->prepare("SELECT id,fechaCancelacion,serie,folio,fechaFactura,nombreCliente,total,motivoCancelacion,cancelado,idNuevaFactura,idSolicitud FROM $tabla WHERE $item IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado = 1");

				

				$stmt -> execute();

				return $stmt -> fetchAll();
			
			}else{

				$concepto = $valor;
				$stmt =  Conexion::conectar()->prepare("SELECT id,fechaCancelacion,serie,folio,fechaFactura,nombreCliente,total,motivoCancelacion,cancelado,idNuevaFactura,idSolicitud FROM $tabla WHERE $item IN($concepto) and seriePedido != 'OTRT' and cancelado = 1");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}
			

			$stmt -> close();

			$stmt = null;
	}
	static public function mdlMostrarListaFacturasTiendas($tabla,$item,$valor){

		if($valor == 'ALL'){

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where  $item IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1");

			

			$stmt -> execute();

			return $stmt->fetchAll();

		}else{

			$concepto = $valor;
			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item IN($concepto) and seriePedido != 'OTRT' and cancelado != 1");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


		}

			
		$stmt-> close();

		$stmt = null;


	}
	static public function mdlVincularNuevaFactura($tabla,$item,$valor,$item2,$valor2,$serie){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item2 = :$item2, refacturada = 1 where $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_INT);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;
		


	}
	static public function mdlMarcarFacturaRefacturada($tabla,$item,$valor,$item2,$valor2,$serie){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set idNuevaFactura = :$item, refacturada = 1 where id = :$item2");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_INT);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlMostrarDetalleFacturaVinculada($tabla,$item,$valor,$serie){


			$stmt = Conexion::conectar()->prepare("SELECT serie,folio from $tabla where id = :$item");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

			$stmt -> close();

			$stmt = null;


	}
	static public function mdlMostrarFacturaVinculada($tabla,$item,$valor,$serie){

			$stmt = Conexion::conectar()->prepare("SELECT serie,folio,fechaFactura,nombreCliente,total from $tabla where $item = :$item");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

			$stmt -> close();

			$stmt = null;


	}
	static public function mdlMostrarListaCortesCaja($tabla,$item,$valor,$item2,$valor2){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT cc.*,ad.nombre from $tabla cc INNER JOIN administradores ad ON ad.id = cc.idSucursal where $item = :$item and substr($item2,1,10) = :$item2");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt -> close();

			$stmt = null;

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT cc.*,ad.nombre from $tabla cc INNER JOIN administradores ad ON ad.id = cc.idSucursal where substr($item2,1,10) = :$item2");

			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt ->execute();

			return $stmt->fetchAll();
		}
		


	}
	static public function mdlMostrarEfectivoCaja($tabla,$item,$valor,$item2,$valor2){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item = :$item and $item2 = :$item2");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

			$stmt -> close();

			$stmt = null;

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
		


	}
	
	static public function mdlMostrarDepositosTiendas($tabla,$item,$valor,$item2,$valor2){

		if($item != null){

			$movimiento = $valor;
			

			$stmt = Conexion::conectar()->prepare("SELECT banc.id,banc.mes,banc.fecha,banc.descripcion,banc.abono,IF(ISNULL(dep.estatus),'POR IDENTIFICAR',dep.estatus) as estatus,IF(ISNULL(dep.saldoPendiente),banc.abono,dep.saldoPendiente) as saldoPendiente,IF(ISNULL(dep.idMovimientoBanco),'',dep.idMovimientoBanco) as idMovimientoBanco,IF(ISNULL(dep.conceptoFacturas),'',dep.conceptoFacturas) as conceptoFacturas,IF(ISNULL(dep.montoFacturas),'',dep.montoFacturas) as montoFacturas,IF(ISNULL(dep.clientesFacturas),'',dep.clientesFacturas) as clientesFacturas,IF(ISNULL(dep.abonadoDeposito),'',dep.abonadoDeposito) as abonadoDeposito,IF(ISNULL(dep.parciales),'',dep.parciales) as parciales,IF(ISNULL(dep.totalDocumentos),'',dep.totalDocumentos) as totalDocumentos,IF(ISNULL(dep.span),'',dep.span) as span, dep.reciboGenerado as reciboGenerado from $tabla banc LEFT OUTER JOIN depositostiendas dep ON banc.id = dep.idMovimientoBanco and banc.banco = dep.banco WHERE banc.$item LIKE '%$movimiento%' and dep.estatus IS NULL and YEAR(STR_TO_DATE(banc.fecha, '%d/%m/%Y')) = '2022' and banc.cargo = 0  order by banc.id desc");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt -> close();

			$stmt = null;

		}else if($item2 != null){

			if ($_SESSION["nombre"] == "Sucursal Santiago") {

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Diego Ávila"){

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Aurora Fernandez"){

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

				$banco = "banco3450";

			}else{

				if($_SESSION["nombre"] == "Sucursal Reforma"){
                  
	              
	                $banco =  $_SESSION["bancoNuevoElegido"];

	            }else{
	                
	                $banco = "banco0198";

	            }

			}

			$stmt = Conexion::conectar()->prepare("SELECT banc.id,banc.mes,banc.fecha,banc.descripcion,banc.abono,IF(ISNULL(dep.estatus),'POR IDENTIFICAR',dep.estatus) as estatus,IF(ISNULL(dep.saldoPendiente),banc.abono,dep.saldoPendiente) as saldoPendiente,IF(ISNULL(dep.idMovimientoBanco),'',dep.idMovimientoBanco) as idMovimientoBanco,IF(ISNULL(dep.conceptoFacturas),'',dep.conceptoFacturas) as conceptoFacturas,IF(ISNULL(dep.montoFacturas),'',dep.montoFacturas) as montoFacturas,IF(ISNULL(dep.clientesFacturas),'',dep.clientesFacturas) as clientesFacturas,IF(ISNULL(dep.abonadoDeposito),'',dep.abonadoDeposito) as abonadoDeposito,IF(ISNULL(dep.parciales),'',dep.parciales) as parciales,IF(ISNULL(dep.totalDocumentos),'',dep.totalDocumentos) as totalDocumentos,IF(ISNULL(dep.span),'',dep.span) as span,dep.reciboGenerado as reciboGenerado from ".$banco." banc INNER JOIN depositostiendas dep ON banc.id = dep.idMovimientoBanco and banc.banco = dep.banco WHERE dep.$item2 = :$item2");

			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt ->execute();

			return $stmt->fetchAll();

			$stmt -> close();

			$stmt = null;

		}else{

			if ($_SESSION["nombre"] == "Sucursal Santiago") {

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Diego Ávila"){

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Aurora Fernandez"){

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

				$banco = "banco3450";

			}else{

				if($_SESSION["nombre"] == "Sucursal Reforma"){
                  
	              
	                $banco =  $_SESSION["bancoNuevoElegido"];

	            }else{
	                
	                $banco = "banco0198";

	            }

			}

			$stmt = Conexion::conectar()->prepare("SELECT banc.id,banc.mes,banc.fecha,banc.descripcion,banc.abono,IF(ISNULL(dep.estatus),'POR IDENTIFICAR',dep.estatus) as estatus,IF(ISNULL(dep.saldoPendiente),banc.abono,dep.saldoPendiente) as saldoPendiente,IF(ISNULL(dep.idMovimientoBanco),'',dep.idMovimientoBanco) as idMovimientoBanco,IF(ISNULL(dep.conceptoFacturas),'',dep.conceptoFacturas) as conceptoFacturas,IF(ISNULL(dep.montoFacturas),'',dep.montoFacturas) as montoFacturas,IF(ISNULL(dep.clientesFacturas),'',dep.clientesFacturas) as clientesFacturas,IF(ISNULL(dep.abonadoDeposito),'',dep.abonadoDeposito) as abonadoDeposito,IF(ISNULL(dep.parciales),'',dep.parciales) as parciales,IF(ISNULL(dep.totalDocumentos),'',dep.totalDocumentos) as totalDocumentos,IF(ISNULL(dep.span),'',dep.span) as span,dep.reciboGenerado as reciboGenerado from ".$banco." banc INNER JOIN depositostiendas dep ON banc.id = dep.idMovimientoBanco and banc.banco = dep.banco");


			$stmt ->execute();

			return $stmt->fetchAll();

			$stmt -> close();

			$stmt = null;

			
		}
		


	}
	static public function mdlMostrarListaFacturasDepositos($tabla,$item,$valor,$item2,$valor2){

		
			/*
			$stmt = Conexion::conectar()->prepare("SELECT ft.id,ft.serie,ft.folio,ft.fechaFactura,ft.nombreCliente,ft.total,ft.abono,ft.depositada,IF(ab.idMovimientoBanco IS NULL AND ft.estatus = 'Cancelada','Cancelada',ab.idMovimientoBanco) as idMovimientoBanco,ft.estatus from $tabla ft LEFT OUTER JOIN abonos ab ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio where ft.$item = :$item  and ft.cancelado = 0  GROUP by ft.folio");
			 
			
			$stmt = Conexion::conectar()->prepare("SELECT ft.id,ft.serie,ft.folio,ft.fechaFactura,ft.nombreCliente,ft.total,ft.abono,ft.depositada,IF(ab.idMovimientoBanco IS NULL AND ft.estatus = 'Cancelada','Cancelada',ab.idMovimientoBanco) as idMovimientoBanco,ft.estatus FROM $tabla ft LEFT OUTER JOIN abonos ab ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio where ft.$item = :$item  and ft.cancelado = 0 and ab.idMovimientoBanco IS NULL and ft.abono = 0");

			*/
			if ($valor == 'ALL') {
				
				$stmt = Conexion::conectar()->prepare("SELECT ft.id,ft.serie,ft.folio,ft.formaPago,ft.fechaFactura,ft.nombreCliente,ft.total,ft.abono,ft.depositada,IF(ab.idMovimientoBanco IS NULL AND ft.estatus = 'Cancelada','Cancelada',ab.idMovimientoBanco) as idMovimientoBanco,ft.estatus FROM $tabla ft LEFT OUTER JOIN abonos ab ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio where ft.$item IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and ft.seriePedido = 'OTRT' and ft.cancelado = 0  and pendiente != 0");


				$stmt -> execute();

				return $stmt->fetchAll();

			}else{

				$concepto = $valor;
				$stmt = Conexion::conectar()->prepare("SELECT ft.id,ft.serie,ft.folio,ft.formaPago,ft.fechaFactura,ft.nombreCliente,ft.total,ft.abono,ft.depositada,IF(ab.idMovimientoBanco IS NULL AND ft.estatus = 'Cancelada','Cancelada',ab.idMovimientoBanco) as idMovimientoBanco,ft.estatus FROM $tabla ft LEFT OUTER JOIN abonos ab ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio where ft.$item IN($concepto) and ft.seriePedido != 'OTRT'  and ft.cancelado = 0  and pendiente != 0");


				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				
				

				$stmt -> execute();

				return $stmt->fetchAll();

			}

			$stmt-> close();

			$stmt = null;


	}
	static public function mdlAgregarFacturaDepositada($tabla,$item,$valor,$item2,$valor2,$item3,$valor3){


			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set depositada = 1, $item3 = :$item3,pendiente = total-abono, pagado = :$item3 where $item = :$item and $item2 = :$item2");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		
	}
	static public function mdlQuitarFacturaDepositada($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4){


			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item4 = :$item4 , $item3 = :$item3,pendiente = total-abono, pagado = :$item3 where $item = :$item and $item2 = :$item2");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item4,$valor4,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		


	}
	static public function mdlBuscarAbonoConParametros($tabla,$valoresAbono){

			$stmt = Conexion::conectar()->prepare("SELECT id as idAbono FROM $tabla where idMovimientoBanco = :idMovimientoBanco and serieFactura = :serieFactura and folioFactura = :folioFactura and totalAbono = :totalAbono");

			$stmt -> bindParam(":idMovimientoBanco",$valoresAbono["idMovimientoBanco"],PDO::PARAM_INT);
			$stmt -> bindParam(":serieFactura",$valoresAbono["serieFactura"],PDO::PARAM_STR);
			$stmt -> bindParam(":folioFactura",$valoresAbono["folioFactura"],PDO::PARAM_STR);
			$stmt -> bindParam(":totalAbono",$valoresAbono["totalAbono"],PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();


	}
	static public function mdlEliminarAbonoRealizado($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
	

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;


	}
	static public function mdlBuscarAbonosPorMovimientoBancario($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT serieFactura,folioFactura,totalAbono,numeroParcial FROM $tabla where $item = :$item ORDER BY fechaAbono, folioFactura asc");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);


			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlActualizarFacturaDepositada($tabla,$item,$valor,$item2,$valor2,$item3,$valor3){


			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item3 = :$item3 where $item = :$item and $item2 = :$item2");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;


	}
	static public function mdlGenerarNuevoDepositoBanco($tabla,$item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span,$bancoElegidoMov){


			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ($item,$saldo,estatus,$sucursal,montoFacturas,conceptoFacturas,clientesFacturas,totalDocumentos,$item5,$item8,span,banco) VALUES(:$item,:$saldo,:estatus,:$sucursal,:montoFacturas,:conceptoFacturas,:clientesFacturas,:totalDocumentos,:$item5,:$item8,:span,:bancoElegidoMov)");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":".$saldo,$valorSaldo,PDO::PARAM_STR);
			$stmt -> bindParam(":".$sucursal,$valorIdSucursal,PDO::PARAM_INT);
			$stmt -> bindParam(":estatus",$estatus,PDO::PARAM_STR);
			$stmt -> bindParam(":montoFacturas",$montosFacturas,PDO::PARAM_STR);
			$stmt -> bindParam(":conceptoFacturas",$conceptosFacturas,PDO::PARAM_STR);
			$stmt -> bindParam(":clientesFacturas",$clientesFacturas,PDO::PARAM_STR);
			$stmt -> bindParam(":totalDocumentos",$totalValorDocumentos,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item5,$valor5,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item8,$valor8,PDO::PARAM_STR);
			$stmt -> bindParam(":span",$span,PDO::PARAM_STR);
			$stmt -> bindParam(":bancoElegidoMov",$bancoElegidoMov,PDO::PARAM_STR);


			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;


	}
	static public function mdlActualizarNuevoDepositoBanco($tabla,$item,$valor,$saldo,$valorSaldo,$sucursal,$valorIdSucursal,$estatus,$montosFacturas,$conceptosFacturas,$clientesFacturas,$totalValorDocumentos,$item5,$valor5,$item8,$valor8,$span){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $saldo = :$saldo,estatus = :estatus,$sucursal = :$sucursal,montoFacturas = :montoFacturas,conceptoFacturas = :conceptoFacturas,clientesFacturas = :clientesFacturas,totalDocumentos = :totalDocumentos,$item5 = :$item5,$item8 = :$item8,span = :span WHERE $item = :$item");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$saldo,$valorSaldo,PDO::PARAM_STR);
			$stmt -> bindParam(":".$sucursal,$valorIdSucursal,PDO::PARAM_INT);
			$stmt -> bindParam(":estatus",$estatus,PDO::PARAM_STR);
			$stmt -> bindParam(":montoFacturas",$montosFacturas,PDO::PARAM_STR);
			$stmt -> bindParam(":conceptoFacturas",$conceptosFacturas,PDO::PARAM_STR);
			$stmt -> bindParam(":clientesFacturas",$clientesFacturas,PDO::PARAM_STR);
			$stmt -> bindParam(":totalDocumentos",$totalValorDocumentos,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item5,$valor5,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item8,$valor8,PDO::PARAM_STR);
			$stmt -> bindParam(":span",$span,PDO::PARAM_STR);


			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlGuardarDatosDepositoBanco($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item5,$valor5,$item6,$valor6,$item7,$valor7,$item9,$valor9){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item2 = :$item2, $item3 = :$item3, $item5 = :$item5, $item6 = :$item6, $item7 = :$item7, $item9 = :$item9, grupo = 'INGRESOS',subgrupo = 'Clientes', tieneIva = 'Si' where id = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item5,$valor5,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item6,$valor6,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item7,$valor7,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item9,$valor9,PDO::PARAM_STR);
			

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}else{

			
		}
		


	}
	static public function mdlBuscarDepositoBancario($tabla,$tabla2,$item,$valor){


			$stmt = Conexion::conectar()->prepare("SELECT COUNT(idMovimientoBanco) from $tabla where $item = :$item and banco = '".$tabla2."'");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

	}
	static public function mdlMostrarDatosClienteFacturas($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT codigoCliente,rfc,diasCredito from $tabla where $item = :$item and catalogo = 'PINTURAS'");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	static public function mdlVerDetalleTicket($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT dpto.nombreDepartamento as departamento,adm.nombre as autor,tk.idTicket,tk.numeroTicket,tk.serieFactura,tk.folioFactura,tk.titulo,tk.cerrado,tk.idAutor,tk.prioridad,tk.fecha,tk.contenido,act.rutaFactura from ticket tk INNER JOIN departamento dpto ON tk.idDepartamento = dpto.id INNER JOIN administradores adm ON tk.idAutor = adm.id INNER JOIN archivostickets act ON tk.numeroTicket = act.numeroTicket  where tk.$item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	static public function mdlVerDetalleTicketCancelacion($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT dpto.nombreDepartamento as departamento,adm.nombre as autor,tk.idTicket,tk.numeroTicket,tk.serieFactura,tk.folioFactura,tk.titulo,tk.cerrado,tk.idAutor,tk.prioridad,tk.fecha,tk.contenido from ticket tk INNER JOIN departamento dpto ON tk.idDepartamento = dpto.id INNER JOIN administradores adm ON tk.idAutor = adm.id  where $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	static public function mdlVerificarCancelacionSolicitud($tabla,$item,$valor){

		if($item != null){

			if ($tabla == "facturasgenerales") {

				$stmt = Conexion::conectar()->prepare("SELECT ft.id as idFacturaCancelacion,ft.seriePedido,ft.folioPedido from $tabla as ft INNER JOIN ticket tk ON ft.idSolicitud = tk.numeroTicket where ft.$item = :$item");
				
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT ft.id as idFacturaCancelacion from $tabla as ft INNER JOIN ticket tk ON ft.idSolicitud = tk.numeroTicket where ft.$item = :$item");

			}

			

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	static public function mdlGenerarCancelacionFactura($tabla,$item,$valor,$datosCancelacion){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fechaCancelacion = :fechaCancelacion,estatus = :estatus, cancelado = :cancelado where $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":fechaCancelacion",$datosCancelacion["fechaCancelacion"],PDO::PARAM_STR);
			$stmt -> bindParam(":estatus",$datosCancelacion["estatus"],PDO::PARAM_STR);
			$stmt -> bindParam(":cancelado",$datosCancelacion["cancelado"],PDO::PARAM_INT);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}else{


		}
			

	}
	static public function mdlGenerarAbonoFactura($tabla,$datosAbono){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idMovimientoBanco,serieAbono,serieFactura,folioFactura,totalAbono,pendienteFactura,creadorAbono,numeroParcial,conceptoAbono,idAjusteSaldo,banco) VALUES(:idMovimientoBanco,:serieAbono,:serieFactura,:folioFactura,:totalAbono,:pendienteFactura,:creadorAbono,:numeroParcial,:conceptoAbono,:idAjusteSaldo,:banco)");

			$stmt -> bindParam(":idMovimientoBanco",$datosAbono["idMovimientoBanco"],PDO::PARAM_STR);
			$stmt -> bindParam(":serieAbono",$datosAbono["serieAbono"],PDO::PARAM_STR);
			$stmt -> bindParam(":serieFactura",$datosAbono["serieFactura"],PDO::PARAM_STR);
			$stmt -> bindParam(":folioFactura",$datosAbono["folioFactura"],PDO::PARAM_STR);
			$stmt -> bindParam(":totalAbono",$datosAbono["totalAbono"],PDO::PARAM_STR);
			$stmt -> bindParam(":pendienteFactura",$datosAbono["pendienteFactura"],PDO::PARAM_STR);
			$stmt -> bindParam(":creadorAbono",$datosAbono["creadorAbono"],PDO::PARAM_STR);
			$stmt -> bindParam(":numeroParcial",$datosAbono["numeroParcial"],PDO::PARAM_INT);
			$stmt -> bindParam(":conceptoAbono",$datosAbono["conceptoAbono"],PDO::PARAM_STR);
			$stmt -> bindParam(":idAjusteSaldo",$datosAbono["idAjusteSaldo"],PDO::PARAM_STR);
			$stmt -> bindParam(":banco",$datosAbono["banco"],PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlBuscarAbonosRealizados($tabla,$datosAbono){

			$stmt = Conexion::conectar()->prepare("SELECT count(id) from $tabla where serieFactura = :serieFactura and folioFactura = :folioFactura and totalAbono = :totalAbono and idMovimientoBanco = :idMovimientoBanco and banco = :banco");


			$stmt -> bindParam(":idMovimientoBanco",$datosAbono["idMovimientoBanco"],PDO::PARAM_STR);
			$stmt -> bindParam(":serieFactura",$datosAbono["serieFactura"],PDO::PARAM_STR);
			$stmt -> bindParam(":folioFactura",$datosAbono["folioFactura"],PDO::PARAM_STR);
			$stmt -> bindParam(":totalAbono",$datosAbono["totalAbono"],PDO::PARAM_STR);
			$stmt -> bindParam(":banco",$datosAbono["banco"],PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();

	}
	static public function mdlObtenerAbonadoFactura($tabla,$item,$valor,$item2,$valor2){

			$stmt = Conexion::conectar()->prepare("SELECT abono,total from $tabla where $item = :$item and $item2 = :$item2");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlObtenerAbonadoFacturaPrev($tabla,$serieFacturaPrev,$folioFacturaPrev){

			$stmt = Conexion::conectar()->prepare("SELECT abono,total from $tabla where serie = :serie and folio = :folio");

			$stmt -> bindParam(":serie",$serieFacturaPrev,PDO::PARAM_STR);
			$stmt -> bindParam(":folio",$folioFacturaPrev,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlObtenerAbonadoFacturaAbonos($tabla,$item,$valor,$item2,$valor2){

			$stmt = Conexion::conectar()->prepare("SELECT IF(MIN(pendienteFactura) IS NULL,0,MIN(pendienteFactura)) as pendienteFactura, IF(MAX(numeroParcial) IS NULL,1,MAX(numeroParcial)) numeroParcial from $tabla where $item = :$item and $item2 = :$item2");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	
	static public function mdlDetalleAbonoFactura($tabla,$serieFacturaPrev,$folioFacturaPrev,$abonoFacturaPrev){

			$stmt = Conexion::conectar()->prepare("SELECT serieFactura,folioFactura,totalAbono,pendienteFactura,numeroParcial from $tabla where serieFactura = :serieFactura and folioFactura = :folioFactura and totalAbono = :totalAbono");

			$stmt -> bindParam(":serieFactura",$serieFacturaPrev,PDO::PARAM_STR);
			$stmt -> bindParam(":folioFactura",$folioFacturaPrev,PDO::PARAM_STR);
			$stmt -> bindParam(":totalAbono",$abonoFacturaPrev,PDO::PARAM_STR);


			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlActualizarParcialesAbonos($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item4, $valor4,$item5,$valor5){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item4 = :$item4, $item5 = :$item5  where $item = :$item and $item2 = :$item2 and $item3 = :$item3");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item4,$valor4,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item5,$valor5,PDO::PARAM_STR);

			
			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";
			}

			$stmt -> close();

			$stmt = null;



	}
	static public function mdlObtenerAbonoRealizadoDeposito($tabla,$item,$valor){

			$datosFactura = $valor;

			$separacionDatos = explode(" ",$datosFactura);

			$serie = $separacionDatos[0];
			$folio = $separacionDatos[1];

			//$stmt = Conexion::conectar()->prepare("SELECT id,idMovimientoBanco,saldoPendiente,totalDocumentos,abonadoDeposito,estatus,montoFacturas from $tabla where $item LIKE '%$datosFactura%'");

			 if ($serie != "FASG" && $serie != "FAND" && $serie != "FACD" && $serie != "FAPB" && $serie != "FCST") {
        
		        if($_SESSION["nombre"] == "Sucursal Reforma"){
                  
	              
	                $banco =  $_SESSION["bancoNuevoElegido"];

	            }else{
	                
	                $banco = "banco0198";

	            }
		      }else if($serie == "FAPB"){

		        $banco = "banco3450";
		      }else{

		        $banco = "banco6278";
		      }

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$facturas = "facturasgenerales";

			}else{

				$facturas = "facturastiendas";

			}

			$stmt = Conexion::conectar()->prepare("SELECT dp.id,dp.idMovimientoBanco,dp.saldoPendiente,dp.totalDocumentos,dp.abonadoDeposito,dp.estatus,dp.montoFacturas,ft.total,ft.pagado,bn.abono,dp.banco from depositostiendas as dp LEFT OUTER JOIN ".$facturas." as ft ON ft.serie = '$serie' and ft.folio = $folio  INNER JOIN $banco as bn ON bn.id = dp.idMovimientoBanco where dp.conceptoFacturas LIKE '%$datosFactura%'");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlSaldarFacturaDeposito($tabla,$datosDepositoFinal){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set abonadoDeposito = :abonadoDeposito, saldoPendiente = :saldoPendiente, estatus = :estatus,montoFacturas = :montoFacturas where id = :id and idMovimientoBanco = :idMovimientoBanco");

			$stmt->bindParam(":id", $datosDepositoFinal["id"], PDO::PARAM_INT);
			$stmt->bindParam(":idMovimientoBanco", $datosDepositoFinal["idMovimientoBanco"], PDO::PARAM_STR);
			$stmt->bindParam(":abonadoDeposito", $datosDepositoFinal["abonadoDeposito"], PDO::PARAM_STR);
			$stmt->bindParam(":saldoPendiente", $datosDepositoFinal["saldoPendiente"], PDO::PARAM_STR);
			$stmt->bindParam(":estatus", $datosDepositoFinal["estatus"], PDO::PARAM_STR);
			$stmt->bindParam(":montoFacturas", $datosDepositoFinal["montoFacturas"], PDO::PARAM_STR);
			

			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";
			}

			$stmt -> close();

			$stmt = null;


	}
	static public function mdlInsertarParcialesAbonos($tabla,$campo,$parcial,$campo2,$departamento2,$movimiento,$movimientoBanco,$itemParciales,$sumaParciales){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $campo = :$campo, $campo2 = :$campo2,$itemParciales = :$itemParciales WHERE $movimiento = :$movimiento");

			$stmt -> bindParam(":".$campo,$parcial,PDO::PARAM_STR);
			$stmt -> bindParam(":".$campo2,$departamento2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$movimiento,$movimientoBanco,PDO::PARAM_STR);
			$stmt -> bindParam(":".$itemParciales,$sumaParciales,PDO::PARAM_STR);
			

			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlLimpiarParcialesAbonos($tabla,$movimientoB,$movimientoBanco){

			if ($tabla == 'banco3450'  || $tabla == 'banco7338') {

				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET parcial = 0, departamentoParcial1 = '',parcial2 = 0, departamentoParcial2 = '',parcial3 = 0, departamentoParcial3 = '',parcial4 = 0, departamentoParcial4 = '',parcial5 = 0, departamentoParcial5 = '',parcial6 = 0, departamentoParcial6 = '',parcial7 = 0, departamentoParcial7 = '',parcial8 = 0, departamentoParcial8 = '',parcial9 = 0, departamentoParcial9 = '',parcial10 = 0, departamentoParcial10 = '',parcial11 = 0, departamentoParcial11 = '',parcial12 = 0, departamentoParcial12 = '',importeParciales = 0 WHERE $movimientoB = :$movimientoB");

				$stmt -> bindParam(":".$movimientoB,$movimientoBanco,PDO::PARAM_STR);
				

				if($stmt -> execute()){

					return "ok";
				
				}else{

					return "error";	

				}
			
			}else{

				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET parcial = 0, departamentoParcial1 = '',parcial2 = 0, departamentoParcial2 = '',parcial3 = 0, departamentoParcial3 = '',parcial4 = 0, departamentoParcial4 = '',parcial5 = 0, departamentoParcial5 = '',parcial6 = 0, departamentoParcial6 = '',parcial7 = 0, departamentoParcial7 = '',parcial8 = 0, departamentoParcial8 = '',parcial9 = 0, departamentoParcial9 = '',parcial10 = 0, departamentoParcial10 = '',parcial11 = 0, departamentoParcial11 = '',parcial12 = 0, departamentoParcial12 = '',parcial13 = 0, departamentoParcial13 = '',parcial14 = 0, departamentoParcial14 = '',parcial15 = 0, departamentoParcial15 = '',parcial16 = 0, departamentoParcial16 = '',parcial17 = 0, departamentoParcial17 = '',parcial18 = 0, departamentoParcial18 = '',parcial19 = 0, departamentoParcial19 = '',parcial20 = 0, departamentoParcial20 = '',parcial21 = 0, departamentoParcial21 = '',parcial22 = 0, departamentoParcial22 = '',parcial23 = 0, departamentoParcial23 = '',parcial24 = 0, departamentoParcial24 = '',parcial25 = 0, departamentoParcial25 = '',parcial26 = 0, departamentoParcial26 = '',parcial27 = 0, departamentoParcial27 = '',parcial28 = 0, departamentoParcial28 = '',parcial29 = 0, departamentoParcial29 = '',parcial30 = 0, departamentoParcial30 = '',importeParciales = 0 WHERE $movimientoB = :$movimientoB");

				$stmt -> bindParam(":".$movimientoB,$movimientoBanco,PDO::PARAM_STR);
				

				if($stmt -> execute()){

					return "ok";
				
				}else{

					return "error";	

				}

			}
			

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlMostrarGastos($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item = :$item ORDER BY id desc");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}

	/*=============================================
	CREAR NUEVO GASTO
	=============================================*/
	static public function mdlMostrarFolioDisponibleGasto(){

			$stmt = Conexion::conectar()->prepare("SELECT IF(MAX(folioGasto)+1 IS NULL,1,MAX(folioGasto)+1) as folioGasto from gastos");

			$stmt -> execute();

			return $stmt->fetch();
	}

	static public function mdlCrearNuevoGasto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(serieGasto,folioGasto,departamento, grupo, subgrupo, mes, fecha, descripcion, importeGasto, acreedor, numeroDocumento, tieneIva, tieneRetenciones, tipoRetencion, importeRetenciones,idCreador) VALUES(:serieGasto,:folioGasto,:departamento, :grupo, :subgrupo, :mes, :fecha, :descripcion, :importeGasto, :acreedor, :numeroDocumento, :tieneIva, :tieneRetenciones, :tipoRetencion, :importeRetenciones, :idCreador)");

		$stmt->bindParam(":serieGasto", $datos["serieGasto"], PDO::PARAM_STR);
		$stmt->bindParam(":folioGasto", $datos["folioGasto"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":subgrupo", $datos["subgrupo"], PDO::PARAM_STR);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":importeGasto", $datos["importeGasto"], PDO::PARAM_STR);
		$stmt->bindParam(":acreedor", $datos["acreedor"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroDocumento", $datos["numeroDocumento"], PDO::PARAM_STR);
		$stmt->bindParam(":tieneIva", $datos["tieneIva"], PDO::PARAM_STR);
		$stmt->bindParam(":tieneRetenciones", $datos["tieneRetenciones"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRetencion", $datos["tipoRetencion"], PDO::PARAM_STR);
		$stmt->bindParam(":importeRetenciones", $datos["importeRetenciones"], PDO::PARAM_STR);
		$stmt->bindParam(":idCreador", $datos["idCreador"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	static public function mdlCrearDesgloseGasto($folioGasto)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO desglosegastos(serie,folio) VALUES('SGM','" . $folioGasto . "')");


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	CALCULAR IMPUESTOS
	=============================================*/
	static public function mdlCalcularImpuestos($tabla,$folioGasto){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set iva = (importeGasto/1.16) * 0.16,retIva = (importeGasto * 10.6667)/100,retIsr = (importeGasto * 10)/100,retIva2 = (importeGasto * 4)/100,retIsr2 = (importeGasto * 0)/100,retIsr2 = (importeGasto * 0)/100,retIva3 = (importeGasto * 10.6667)/100,retIsr3 = (importeGasto * 10)/100 where folioGasto = :folioGasto");

			$stmt->bindParam(":folioGasto", $folioGasto, PDO::PARAM_INT);

			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";
			}

			$stmt -> close();

			$stmt = null;


	}
	/*=============================================
	REGISTRO BITACORA AGREGAR
	=============================================*/
	static public function mdlRegistroBitacoraAgregar($tabla2, $datos2){

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
	static public function mdlMostrarDatosGasto($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT des.par1,des.dpto1,des.par2,des.dpto2,des.par3,des.dpto3,des.par4,des.dpto4,des.par5,des.dpto5,des.par6,des.dpto6,des.par7,des.dpto7,des.par8,des.dpto8,des.par9,des.dpto9,des.par10,des.dpto10,des.par11,des.dpto11,des.par12,des.dpto12,gas.* FROM $tabla as gas INNER JOIN desglosegastos as des ON gas.serieGasto = des.serie and gas.folioGasto = des.folio WHERE  gas.$item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);


			$stmt -> execute();

			return $stmt->fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	/*=============================================
	EDITAR GASTO
	=============================================*/
	static public function mdlEditarGasto($tabla,$datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set departamento = :departamento, grupo = :grupo,subgrupo = :subgrupo, mes = :mes, fecha = :fecha, descripcion = :descripcion, importeGasto = :importeGasto, acreedor = :acreedor, numeroDocumento = :numeroDocumento, folioFiscal = :folioFiscal, tieneIva = :tieneIva, tieneRetenciones = :tieneRetenciones, tipoRetencion = :tipoRetencion, importeRetenciones = :importeRetenciones, rutaFactura = :rutaFactura, rutaXml = :rutaXml,parciales = :parciales where id = :id");

			$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
			$stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
			$stmt->bindParam(":subgrupo", $datos["subgrupo"], PDO::PARAM_STR);
			$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":importeGasto", $datos["importeGasto"], PDO::PARAM_STR);
			$stmt->bindParam(":acreedor", $datos["acreedor"], PDO::PARAM_STR);
			$stmt->bindParam(":numeroDocumento", $datos["numeroDocumento"], PDO::PARAM_STR);
			$stmt->bindParam(":folioFiscal", $datos["folioFiscal"], PDO::PARAM_STR);
			$stmt->bindParam(":tieneIva", $datos["tieneIva"], PDO::PARAM_STR);
			$stmt->bindParam(":tieneRetenciones", $datos["tieneRetenciones"], PDO::PARAM_STR);
			$stmt->bindParam(":tipoRetencion", $datos["tipoRetencion"], PDO::PARAM_STR);
			$stmt->bindParam(":importeRetenciones", $datos["importeRetenciones"], PDO::PARAM_STR);
			$stmt->bindParam(":rutaFactura", $datos["rutaFactura"], PDO::PARAM_STR);
			$stmt->bindParam(":rutaXml", $datos["rutaXml"], PDO::PARAM_STR);
			$stmt->bindParam(":parciales", $datos["parciales"], PDO::PARAM_STR);
			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);


			if ($stmt -> execute()) {

				return "ok";

			}else {

				return "error";
			}

			$stmt -> close();

			$stmt = null;


	}
	/*=============================================
	EDITAR DESGLOSE GASTOS
	=============================================*/
	static public function mdlEditarDesgloseGasto($datos2)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE desglosegastos set par1 = :par1,dpto1 = :dpto1,par2 = :par2,dpto2 = :dpto2,par3 = :par3,dpto3 = :dpto3,par4 = :par4,dpto4 = :dpto4,par5 = :par5,dpto5 = :dpto5,par6 = :par6,dpto6 = :dpto6,par7 = :par7,dpto7 = :dpto7,par8 = :par8,dpto8 = :dpto8,par9 = :par9,dpto9 = :dpto9,par10 = :par10,dpto10 = :dpto10,par11 = :par11,dpto11 = :dpto11,par12 = :par12,dpto12 = :dpto12 where folio = :folio");

		$stmt->bindParam(":folio", $datos2["folio"], PDO::PARAM_STR);
		$stmt->bindParam(":par1", $datos2["par1"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto1", $datos2["dpto1"], PDO::PARAM_STR);
		$stmt->bindParam(":par2", $datos2["par2"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto2", $datos2["dpto2"], PDO::PARAM_STR);
		$stmt->bindParam(":par3", $datos2["par3"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto3", $datos2["dpto3"], PDO::PARAM_STR);
		$stmt->bindParam(":par4", $datos2["par4"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto4", $datos2["dpto4"], PDO::PARAM_STR);
		$stmt->bindParam(":par5", $datos2["par5"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto5", $datos2["dpto5"], PDO::PARAM_STR);
		$stmt->bindParam(":par6", $datos2["par6"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto6", $datos2["dpto6"], PDO::PARAM_STR);
		$stmt->bindParam(":par7", $datos2["par7"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto7", $datos2["dpto7"], PDO::PARAM_STR);
		$stmt->bindParam(":par8", $datos2["par8"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto8", $datos2["dpto8"], PDO::PARAM_STR);
		$stmt->bindParam(":par9", $datos2["par9"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto9", $datos2["dpto9"], PDO::PARAM_STR);
		$stmt->bindParam(":par10", $datos2["par10"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto10", $datos2["dpto10"], PDO::PARAM_STR);
		$stmt->bindParam(":par11", $datos2["par11"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto11", $datos2["dpto11"], PDO::PARAM_STR);
		$stmt->bindParam(":par12", $datos2["par12"], PDO::PARAM_STR);
		$stmt->bindParam(":dpto12", $datos2["dpto12"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
	static public function mdlDesgloseAbonosBancarios($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT ab.serieAbono,ab.id,ab.serieFactura,ab.folioFactura,ab.totalAbono,ab.pendienteFactura,ad.nombre,ab.fechaAbono,dt.abonadoDeposito,dt.idMovimientoBanco from $tabla dt INNER JOIN abonos ab ON ab.idMovimientoBanco = dt.idMovimientoBanco INNER JOIN administradores ad ON ab.creadorAbono = ad.id where dt.$item = :$item ORDER BY ab.idMovimientoBanco");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlMostrarAbonosDeFactura($tabla,$factura){

			$stmt = Conexion::conectar()->prepare("SELECT serieFactura,folioFactura,totalAbono from $tabla where concat_ws(' ', serieFactura, folioFactura) = :factura");

			$stmt -> bindParam(":factura",$factura,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();


	}
	static public function mdlGenerarSolicitudGasto($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET solicitada = 1 WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	/*=============================================
	GUARDAR NOTIFICACION DEL GASTO
	=============================================*/
	static public function mdlGuardarNotificacionGasto($tabla2, $datosGasto){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(titulo, folioGasto,autorGasto, autorComentario) VALUES(:titulo, :folioGasto,:autorGasto, :autorComentario)");

		$stmt->bindParam(":titulo", $datosGasto["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":folioGasto", $datosGasto["folioGasto"], PDO::PARAM_INT);
		$stmt->bindParam(":autorGasto", $datosGasto["autorGasto"], PDO::PARAM_INT);
		$stmt->bindParam(":autorComentario", $datosGasto["autorComentario"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlMostrarGastosSolicitudes($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT gt.*, ad.nombre as solicitante FROM $tabla gt INNER JOIN administradores ad ON gt.idCreador = ad.id where solicitada = 1 ORDER BY gt.aprobada = 0 desc ");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	static public function mdlAprobarSolicitudGasto($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET aprobada = 1 WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlGenerarReembolso($item,$valor){

		if($item != null){

			$gastos = explode(",",$valor);

			$array = implode("','",$gastos);

			$stmt = Conexion::conectar()->prepare("SELECT * from gastos where $item IN ('".$array."')");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from gastos where aprobada = 1 and solicitada = 1");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	static public function mdlReembolsarSolicitudGasto($tabla,$item,$valor){


			$gastos = explode(",",$valor);

			$array = implode("','",$gastos);

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET reembolsado = 1 where $item IN ('".$array."')");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}


	}
	static public function mdlMostrarUltimoSaldoCaja($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT id, ultimoSaldo FROM $tabla ORDER BY id desc LIMIT 1");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

	}
	static public function mdlObtenerDatosGasto($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT des.par1,des.dpto1,des.par2,des.dpto2,des.par3,des.dpto3,des.par4,des.dpto4,des.par5,des.dpto5,des.par6,des.dpto6,des.par7,des.dpto7,des.par8,des.dpto8,des.par9,des.dpto9,des.par10,des.dpto10,des.par11,des.dpto11,des.par12,des.dpto12,gas.* FROM $tabla as gas INNER JOIN desglosegastos as des ON gas.serieGasto = des.serie and gas.folioGasto = des.folio WHERE  gas.$item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

	}
	/*=============================================
	NUEVO GASTO CAJA
	=============================================*/

	static public function mdlGenerarNuevoGastoCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(departamento, grupo, subgrupo, mes, fecha, descripcion, cargo, abono, saldo, ultimoSaldo, comprobacion, diferencia, parciales,parcial,departamentoParcial1,parcial2,departamentoParcial2,parcial3,departamentoParcial3,parcial4,departamentoParcial4,parcial5,departamentoParcial5,parcial6,departamentoParcial6,parcial7,departamentoParcial7,parcial8,departamentoParcial8,parcial9,departamentoParcial9,parcial10,departamentoParcial10,parcial11,departamentoParcial11,parcial12,departamentoParcial12,serie, folio, numeroMovimiento, acreedor, concepto, numeroDocumento, importe, importeRetenciones, importeParciales, tieneIva, tieneRetenciones, tipoRetencion, iva, retIva, retIsr, retIva2, retIsr2, retIva3, retIsr3, fechaOriginal) VALUES(:departamento, :grupo, :subgrupo, :mes, :fecha, :descripcion, :cargo, :abono, :saldo, :ultimoSaldo, :comprobacion, :diferencia, :parciales, :parcial1,:departamentoParcial1,:parcial2,:departamentoParcial2,:parcial3,:departamentoParcial3,:parcial4,:departamentoParcial4,:parcial5,:departamentoParcial5,:parcial6,:departamentoParcial6,:parcial7,:departamentoParcial7,:parcial8,:departamentoParcial8,:parcial9,:departamentoParcial9,:parcial10,:departamentoParcial10,:parcial11,:departamentoParcial11,:parcial12,:departamentoParcial12,:serie, :folio, :numeroMovimiento, :acreedor, :concepto, :numeroDocumento, :importe, :importeRetenciones, :importeParciales, :tieneIva, :tieneRetenciones, :tipoRetencion, :iva, :retIva, :retIsr, :retIva2, :retIsr2, :retIva3, :retIsr3, :fechaOriginal)");

		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":subgrupo", $datos["subgrupo"], PDO::PARAM_STR);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":abono", $datos["abono"], PDO::PARAM_STR);
		$stmt->bindParam(":saldo", $datos["saldo"], PDO::PARAM_STR);
		$stmt->bindParam(":ultimoSaldo", $datos["ultimoSaldo"], PDO::PARAM_STR);
		$stmt->bindParam(":comprobacion", $datos["comprobacion"], PDO::PARAM_STR);
		$stmt->bindParam(":diferencia", $datos["diferencia"], PDO::PARAM_STR);
		$stmt->bindParam(":parciales", $datos["parciales"], PDO::PARAM_INT);
		$stmt->bindParam(":parcial1", $datos["parcial1"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial1", $datos["departamentoParcial1"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial2", $datos["parcial2"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial2", $datos["departamentoParcial2"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial3", $datos["parcial3"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial3", $datos["departamentoParcial3"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial4", $datos["parcial4"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial4", $datos["departamentoParcial4"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial5", $datos["parcial5"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial5", $datos["departamentoParcial5"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial6", $datos["parcial6"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial6", $datos["departamentoParcial6"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial7", $datos["parcial7"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial7", $datos["departamentoParcial7"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial8", $datos["parcial8"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial8", $datos["departamentoParcial8"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial9", $datos["parcial9"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial9", $datos["departamentoParcial9"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial10", $datos["parcial10"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial10", $datos["departamentoParcial10"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial11", $datos["parcial11"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial11", $datos["departamentoParcial11"], PDO::PARAM_STR);
		$stmt->bindParam(":parcial12", $datos["parcial12"], PDO::PARAM_STR);
		$stmt->bindParam(":departamentoParcial12", $datos["departamentoParcial12"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroMovimiento", $datos["numeroMovimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":acreedor", $datos["acreedor"], PDO::PARAM_STR);
		$stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroDocumento", $datos["numeroDocumento"], PDO::PARAM_STR);
		$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
		$stmt->bindParam(":importeRetenciones", $datos["importeRetenciones"], PDO::PARAM_STR);
		$stmt->bindParam(":importeParciales", $datos["importeParciales"], PDO::PARAM_STR);
		$stmt->bindParam(":tieneIva", $datos["tieneIva"], PDO::PARAM_STR);
		$stmt->bindParam(":tieneRetenciones", $datos["tieneRetenciones"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoRetencion", $datos["tipoRetencion"], PDO::PARAM_STR);
		$stmt->bindParam(":iva", $datos["iva"], PDO::PARAM_STR);
		$stmt->bindParam(":retIva", $datos["retIva"], PDO::PARAM_STR);
		$stmt->bindParam(":retIsr", $datos["retIsr"], PDO::PARAM_STR);
		$stmt->bindParam(":retIva2", $datos["retIva2"], PDO::PARAM_STR);
		$stmt->bindParam(":retIsr2", $datos["retIsr2"], PDO::PARAM_STR);
		$stmt->bindParam(":retIva3", $datos["retIva3"], PDO::PARAM_STR);
		$stmt->bindParam(":retIsr3", $datos["retIsr3"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaOriginal", $datos["fechaOriginal"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	static public function mdlMostrarListaAjustesRealizados($tabla,$item,$valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT ajs.*,ad.nombre as ajustador from $tabla ajs INNER JOIN administradores ad ON ajs.idAjustador = ad.id where $item = :$item");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt->fetchAll();
				
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT ajs.*,ad.nombre as ajustador from $tabla ajs INNER JOIN administradores ad ON ajs.idAjustador = ad.id");

				$stmt -> execute();

				return $stmt->fetchAll();


			}

			$stmt-> close();

			$stmt = null;


	}
	static public function mdlMostrarDocumentosSaldados($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT a.*, ad.nombre as usuario from $tabla a INNER JOIN administradores ad ON a.idAjustador = ad.id WHERE a.idAjustador = ad.id");

			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt-> close();

			$stmt = null;


	}
	static public function mdlMostrarAbonos($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT a.*, ad.nombre as creadorAbono from $tabla a INNER JOIN administradores ad ON a.creadorAbono = ad.id WHERE a.creadorAbono = ad.id");

			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt-> close();

			$stmt = null;


	}
	static public function mdlMostrarDetallesDepositosBancarios($tabla,$item,$valor){

			if ($_SESSION["nombre"] == "Sucursal Santiago") {

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Diego Ávila"){

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Aurora Fernandez"){

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

				$banco = "banco3450";

			}else{

				if($_SESSION["nombre"] == "Sucursal Reforma"){
                  
	              
	                $banco =  $_SESSION["bancoNuevoElegido"];

	            }else{
	                
	                $banco = "banco0198";

	            }

			}

			$stmt = Conexion::conectar()->prepare("SELECT ad.nombre,dp.id,b.abono,b.fecha,dp.clientesFacturas as clienteDeposito FROM $tabla dp INNER JOIN ".$banco." b ON b.id = dp.$item INNER JOIN administradores ad ON dp.sucursal = ad.id WHERE dp.$item = :$item");
			

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt-> close();

			$stmt = null;


	}
	static public function mdlBuscarDatosCliente($tabla,$item,$valor){

			$nombreCliente = $valor;

			$stmt = Conexion::conectar()->prepare("SELECT  nombreCliente,rfc,domicilioFiscal  FROM $tabla  WHERE $item LIKE '%$nombreCliente%'");
			

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();

			$stmt-> close();

			$stmt = null;


	}
	static public function mdlListarAbonosDepositos($tabla,$item,$valor){

			if ($_SESSION["nombre"] == "Sucursal Santiago") {

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Diego Ávila"){

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Aurora Fernandez"){

				$banco = "banco6278";

			}else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

				$banco = "banco3450";

			}else{

				if($_SESSION["nombre"] == "Sucursal Reforma"){
                  
	              
	                $banco =  $_SESSION["bancoNuevoElegido"];

	            }else{
	                
	                $banco = "banco0198";

	            }

			}

			if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Rocio Martínez Morales") {

				$facturas = "facturasgenerales";

			}else{

				$facturas = "facturastiendas";

			}
			$stmt = Conexion::conectar()->prepare("SELECT ab.id,ab.serieFactura,ab.folioFactura,IF(ft.formaPago = 'EFECTIVO','PUE','PPD') as metodoPago,ab.numeroParcial,ft.total,ab.totalAbono,ab.pendienteFactura FROM $tabla ab INNER JOIN ".$banco." b ON b.id = ab.idMovimientoBanco INNER JOIN ".$facturas." ft ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio WHERE ab.$item = :$item and ab.banco = '".$banco."'");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt-> close();

			$stmt = null;


	}
	static public function mdlGenerarReciboCaja($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET reciboGenerado = 1 WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlValidarFolioFiscal($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT($item) as folio,folioGasto,folioFiscal from $tabla where $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();



	}
	static public function mdlMostrarFacturasConRemanentes($tabla,$datos){

			if($datos["concepto"] == 'ALL'){


				$fechaInicial = $datos["fechaInicioAjuste"];
				$fechaFinal = $datos["fechaFinAjuste"];


				$stmt = Conexion::conectar()->prepare("SELECT ft.id,ft.serie,ft.folio,ft.fechaFactura,ft.nombreCliente,ft.pendiente,ft.total,ab.idMovimientoBanco FROM $tabla ft INNER JOIN abonos ab ON ft.serie = ab.serieFactura and ft.folio = ab.folioFactura WHERE fechaFactura BETWEEN '$fechaInicial' and '$fechaFinal' and FORMAT(pendiente,2) <= :valorAjuste and pendiente != 0 and concepto IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') AND ft.seriePedido = 'OTRT'  GROUP by ft.folio");


				$stmt -> bindParam(":valorAjuste",$datos["valorAjuste"],PDO::PARAM_STR);
				

				$stmt -> execute();

				return $stmt->fetchAll();

			}else{


				$fechaInicial = $datos["fechaInicioAjuste"];
				$fechaFinal = $datos["fechaFinAjuste"];

				$concepto = $datos["concepto"];
				$valorAjuste = $datos["valorAjuste"];

				$stmt = Conexion::conectar()->prepare("SELECT ft.id,ft.serie,ft.folio,ft.fechaFactura,ft.nombreCliente,ft.pendiente,ft.total,ab.idMovimientoBanco FROM $tabla ft INNER JOIN abonos ab ON ft.serie = ab.serieFactura and ft.folio = ab.folioFactura WHERE ft.fechaFactura BETWEEN '$fechaInicial' and '$fechaFinal' and FORMAT(ft.pendiente,2) <= $valorAjuste  and ft.pendiente != 0 and ft.concepto in($concepto) AND ft.seriePedido != 'OTRT'  GROUP by ft.folio");



				$stmt -> execute();

				return $stmt->fetchAll();

			}


	}
	static public function mdlObtenerUltimoAjuste($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT IF(MAX(folioAjuste)+1 IS NULL,1,MAX(folioAjuste)+1) as folioAjuste from $tabla");

			$stmt -> execute();

			return $stmt->fetch();
	}
	static public function mdlGenerarAjusteSaldoRemanentes($tabla, $datosAjuste){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(serieAjuste, folioAjuste, saldoAjustado, pendiente, idAjustador, rutaArchivo, fechaInicioAjuste, fechaFinAjuste, valorAjuste) VALUES(:serieAjuste, :folioAjuste, :saldoAjustado, :pendiente, :idAjustador, :rutaArchivo, :fechaInicioAjuste, :fechaFinAjuste, :valorAjuste)");

		$stmt->bindParam(":serieAjuste", $datosAjuste["serieAjuste"], PDO::PARAM_STR);
		$stmt->bindParam(":folioAjuste", $datosAjuste["folioAjuste"], PDO::PARAM_INT);
		$stmt->bindParam(":saldoAjustado", $datosAjuste["saldoAjustado"], PDO::PARAM_STR);
		$stmt->bindParam(":pendiente", $datosAjuste["pendiente"], PDO::PARAM_STR);
		$stmt->bindParam(":idAjustador", $datosAjuste["idAjustador"], PDO::PARAM_INT);
		$stmt->bindParam(":rutaArchivo", $datosAjuste["rutaArchivo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicioAjuste", $datosAjuste["fechaInicioAjuste"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaFinAjuste", $datosAjuste["fechaFinAjuste"], PDO::PARAM_STR);
		$stmt->bindParam(":valorAjuste", $datosAjuste["valorAjuste"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlSaldarDocumentoConSaldoPendiente($tabla,$datosSaldado){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pendiente = :pendiente, pagado = :pagado, abono = :abono, ajustado = :ajustado  where serie = :serie and folio = :folio");

			$stmt -> bindParam(":serie",$datosSaldado["serie"],PDO::PARAM_STR);
			$stmt -> bindParam(":folio",$datosSaldado["folio"],PDO::PARAM_STR);
			$stmt -> bindParam(":pendiente",$datosSaldado["pendiente"],PDO::PARAM_STR);
			$stmt -> bindParam(":pagado",$datosSaldado["pagado"],PDO::PARAM_STR);
			$stmt -> bindParam(":abono",$datosSaldado["abono"],PDO::PARAM_STR);
			$stmt -> bindParam(":ajustado",$datosSaldado["ajustado"],PDO::PARAM_INT);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;
	

	}
	static public function mdlObtenerDatosFactura($tabla,$item,$valor,$item2,$valor2){

			$stmt = Conexion::conectar()->prepare("SELECT abono,total,pendiente,pagado from $tabla where $item = :$item and $item2 = :$item2");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();


	}
	static public function mdlObtenerAbonosConAjuste($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT ajs.serieAjuste,ajs.folioAjuste,ajs.saldoAjustado,ajs.pendiente,ajs.fechaInicioAjuste,ajs.fechaFinAjuste,ajs.valorAjuste,ad.nombre as ajustador,ab.serieFactura,ab.folioFactura,ab.totalAbono,ab.pendienteFactura,ab.fechaAbono,ab.conceptoAbono FROM $tabla ajs INNER JOIN abonos ab ON ajs.folioAjuste = ab.idAjusteSaldo INNER JOIN administradores ad ON ajs.idAjustador = ad.id WHERE ajs.$item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	/***********CORTE DE CAJA********************/
	static public function mdlMostrarFolioDisponibleCorteCaja($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT IF(MAX(folio)+1 IS NULL,1,MAX(folio)+1) as folioCorte from $tabla");

			$stmt -> execute();

			return $stmt->fetch();
	}
	static public function mdlGenerarNuevoCorteCaja($tabla, $datosCorte){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(serie, folio, fondoCaja,idSucursal) VALUES(:serie, :folio, :fondoCaja, :idSucursal)");

		$stmt->bindParam(":serie", $datosCorte["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datosCorte["folio"], PDO::PARAM_INT);
		$stmt->bindParam(":fondoCaja", $datosCorte["fondoCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":idSucursal", $datosCorte["idSucursal"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlGenerarDenominacionesCorte($tabla, $datosCorte){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(folioCorteCaja,idSucursal) VALUES(:folioCorteCaja, :idSucursal)");

		$stmt->bindParam(":folioCorteCaja", $datosCorte["folio"], PDO::PARAM_INT);
		$stmt->bindParam(":idSucursal", $datosCorte["idSucursal"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlCargarDenominacionesCorte($tabla, $datosDenominaciones){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set total = :total, idSucursal = :idSucursal, dn1 = :dn1, dn2 = :dn2, dn3 = :dn3, dn4 = :dn4, dn5 = :dn5, dn6 = :dn6, dn7 = :dn7, dn8 = :dn8, dn9 = :dn9, dn10 = :dn10, dn11 = :dn11, dn12 = :dn12, dn13 = :dn13, dn14 = :dn14 where folioCorteCaja = :folioCorteCaja");

		$stmt->bindParam(":folioCorteCaja", $datosDenominaciones["folioCorteCaja"], PDO::PARAM_INT);
		$stmt->bindParam(":total", $datosDenominaciones["total"], PDO::PARAM_STR);
		$stmt->bindParam(":idSucursal", $datosDenominaciones["idSucursal"], PDO::PARAM_INT);
		$stmt->bindParam(":dn1", $datosDenominaciones["dn1"], PDO::PARAM_STR);
		$stmt->bindParam(":dn2", $datosDenominaciones["dn2"], PDO::PARAM_STR);
		$stmt->bindParam(":dn3", $datosDenominaciones["dn3"], PDO::PARAM_STR);
		$stmt->bindParam(":dn4", $datosDenominaciones["dn4"], PDO::PARAM_STR);
		$stmt->bindParam(":dn5", $datosDenominaciones["dn5"], PDO::PARAM_STR);
		$stmt->bindParam(":dn6", $datosDenominaciones["dn6"], PDO::PARAM_STR);
		$stmt->bindParam(":dn7", $datosDenominaciones["dn7"], PDO::PARAM_STR);
		$stmt->bindParam(":dn8", $datosDenominaciones["dn8"], PDO::PARAM_STR);
		$stmt->bindParam(":dn9", $datosDenominaciones["dn9"], PDO::PARAM_STR);
		$stmt->bindParam(":dn10", $datosDenominaciones["dn10"], PDO::PARAM_STR);
		$stmt->bindParam(":dn11", $datosDenominaciones["dn11"], PDO::PARAM_STR);
		$stmt->bindParam(":dn12", $datosDenominaciones["dn12"], PDO::PARAM_STR);
		$stmt->bindParam(":dn13", $datosDenominaciones["dn13"], PDO::PARAM_STR);
		$stmt->bindParam(":dn14", $datosDenominaciones["dn14"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}
	static public function mdlDetallesFormaPagoCorteCaja($tabla,$item,$valor,$item2,$valor2,$item3,$valor3){

		if ($valor2 == 'ALL') {

			$stmt = Conexion::conectar()->prepare("SELECT (SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido = 'OTRT' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'EFECTIVO') as efectivo,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido = 'OTRT' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'CHEQUE NOMINATIVO') as chequeNominativo,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido = 'OTRT' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'TRANSFERENCIA ELECTRONICA DE FONDOS') as transferenciaElectronica,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido = 'OTRT' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'TARJETA DE CRÉDITO') as tarjetaCredito,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido = 'OTRT' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'TARJETA DE DÉBITO') as tarjetaDebito,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido = 'OTRT' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'CREDITO') as credito,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido = 'OTRT' and $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo')  and cancelado != 1 and formaPago = 'POR DEFINIR') as porDefinir UNION ALL SELECT (SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido = 'OTRT' and nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'EFECTIVO') as efectivo,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido = 'OTRT' and nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'CHEQUE NOMINATIVO') as chequeNominativo,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido = 'OTRT' and nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'TRANSFERENCIA ELECTRONICA DE FONDOS') as transferenciaElectronica,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido = 'OTRT' and nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'TARJETA DE CRÉDITO') as tarjetaCredito,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido = 'OTRT' and nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'TARJETA DE DÉBITO') as tarjetaDebito,(SELECT IF(sum(total) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido = 'OTRT' and nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and formaPago = 'CREDITO') as credito,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido = 'OTRT' and nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo')  and cancelado != 1 and formaPago = 'POR DEFINIR') as porDefinir");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetchAll();
			
		}else{

			$concepto = $valor2;

			$stmt = Conexion::conectar()->prepare("SELECT (SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido != 'OTRT' and $item = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'EFECTIVO') as efectivo,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido != 'OTRT' and $item = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'CHEQUE NOMINATIVO') as chequeNominativo,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido != 'OTRT' and $item = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'TRANSFERENCIA ELECTRONICA DE FONDOS') as transferenciaElectronica,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido != 'OTRT' and $item = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'TARJETA DE CRÉDITO') as tarjetaCredito,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido != 'OTRT' and $item = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'TARJETA DE DÉBITO') as tarjetaDebito,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido != 'OTRT' and $item = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'CREDITO') as credito,(SELECT IF(sum(total) IS NULL,0,sum(total)) FROM $tabla WHERE seriePedido != 'OTRT' and $item = :$item and $item2 in ($concepto)  and cancelado != 1 and formaPago = 'POR DEFINIR') as porDefinir UNION ALL SELECT (SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido != 'OTRT' and nuevaFechaFactura = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'EFECTIVO') as efectivo,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido != 'OTRT' and nuevaFechaFactura = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'CHEQUE NOMINATIVO') as chequeNominativo,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido != 'OTRT' and nuevaFechaFactura = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'TRANSFERENCIA ELECTRONICA DE FONDOS') as transferenciaElectronica,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido != 'OTRT' and nuevaFechaFactura = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'TARJETA DE CRÉDITO') as tarjetaCredito,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido != 'OTRT' and nuevaFechaFactura = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'TARJETA DE DÉBITO') as tarjetaDebito,(SELECT IF(sum(total) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido != 'OTRT' and nuevaFechaFactura = :$item and $item2 in ($concepto) and cancelado != 1 and formaPago = 'CREDITO') as credito,(SELECT IF(sum(importePendiente) IS NULL,0,sum(importePendiente)) FROM $tabla WHERE seriePedido != 'OTRT' and nuevaFechaFactura = :$item and $item2 in ($concepto)  and cancelado != 1 and formaPago = 'POR DEFINIR') as porDefinir");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetchAll();


		}

			$stmt -> close();

			$stmt = null;



	}
	static public function mdlCargarFormasPagoCorte($tabla,$datosFormasPago){

			$array = implode(',',$datosFormasPago["folioGasto"]);

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET efectivo = :efectivo, cheque = :cheque, transferencia = :transferencia, tarjetaDebito = :tarjetaDebito, tarjetaCredito = :tarjetaCredito, porDefinir = :porDefinir, credito = :credito, gastos = :gastos, importeVenta = :importeVenta, total = :total, fondoCaja = IF(fondoCaja < :fondoCaja,fondoCaja,fondoCaja - :gastos), diferencia = total - importeVenta - fondoCaja,folioGasto = '".$array."' ,fechaFactura = :fechaFactura  where folio = :folio");

			$stmt -> bindParam(":folio",$datosFormasPago["folioCorteCaja"],PDO::PARAM_STR);
			$stmt -> bindParam(":efectivo",$datosFormasPago["efectivo"],PDO::PARAM_STR);
			$stmt -> bindParam(":cheque",$datosFormasPago["cheque"],PDO::PARAM_STR);
			$stmt -> bindParam(":transferencia",$datosFormasPago["transferencia"],PDO::PARAM_STR);
			$stmt -> bindParam(":tarjetaDebito",$datosFormasPago["tarjetaDebito"],PDO::PARAM_STR);
			$stmt -> bindParam(":tarjetaCredito",$datosFormasPago["tarjetaCredito"],PDO::PARAM_STR);
			$stmt -> bindParam(":porDefinir",$datosFormasPago["porDefinir"],PDO::PARAM_STR);
			$stmt -> bindParam(":credito",$datosFormasPago["credito"],PDO::PARAM_STR);
			$stmt -> bindParam(":gastos",$datosFormasPago["gastos"],PDO::PARAM_STR);
			$stmt -> bindParam(":importeVenta",$datosFormasPago["importeVenta"],PDO::PARAM_STR);
			$stmt -> bindParam(":total",$datosFormasPago["total"],PDO::PARAM_STR);
			$stmt -> bindParam(":fondoCaja",$datosFormasPago["fondoCaja"],PDO::PARAM_STR);
			$stmt -> bindParam(":fechaFactura",$datosFormasPago["fechaFactura"],PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

			return "error";	

			}

			$stmt -> close();

			$stmt = null;
	

	}
	static public function mdlObtenerTotalDenominaciones($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT IF((gt.importeGasto) IS NULL,0,gt.importeGasto) AS importeGasto,IF((efec.total) IS NULL,0,efec.total) as totalEfectivo,gt.folioGasto FROM $tabla efec LEFT OUTER JOIN gastos gt ON  efec.idSucursal = gt.idCreador WHERE $item = :$item and gt.aprobada = 1 and gt.reembolsado = 0");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

	}
	static public function mdlObtenerTotalDenominacionesCaja($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT  IF((total) IS NULL,0,total) as totalEfectivo FROM $tabla  WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetchAll();

	}
	static public function mdlMostrarDenominacionesCorte($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

	}
	static public function mdlMostrarTiempoTranscurridoCorte($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT TIMESTAMPDIFF(SECOND, fechaCorte, fechaTerminoCorte) as tiempoTranscurrido,cc.serie,cc.folio,cc.fechaCorte, cc.fechaTerminoCorte,cc.efectivo,cc.cheque,cc.transferencia,cc.tarjetaCredito,cc.tarjetaDebito,cc.porDefinir,cc.credito,cc.total as totalGeneral,cc.importeVenta,cc.gastos,cc.fondoCaja,cc.diferencia,ec.*,cc.fechaFactura,cc.folioGasto,cc.observaciones,ad.nombre from $tabla cc LEFT OUTER JOIN efectivocaja ec ON ec.folioCorteCaja = cc.folio LEFT OUTER JOIN administradores ad ON ad.id = cc.idSucursal WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

	}
	static public function mdlFinalizarCorteCaja($tabla,$item,$valor,$item2,$valor2){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET concluido = 1, $item2 = :$item2  WHERE $item = :$item");

		   $stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
		   $stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

			return "error";	

			}

			$stmt -> close();

			$stmt = null;
	

	}
	static public function mdlMostrarFacturasImporteVenta($tabla,$item,$valor,$item2, $valor2){


			if ($valor2 == 'ALL') {
				
				$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and seriePedido = 'OTRT' UNION ALL SELECT * from $tabla where nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 and seriePedido = 'OTRT'");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				

				$stmt -> execute();

				return $stmt->fetchAll();

			}else{

				$concepto = $valor2;
				$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item = :$item and $item2 IN($valor2) and cancelado != 1 and seriePedido != 'OTRT' UNION ALL SELECT * from $tabla where nuevaFechaFactura = :$item and $item2 IN($valor2) and cancelado != 1 and seriePedido != 'OTRT'");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt->fetchAll();

			}

			$stmt-> close();

			$stmt = null;


	}
	static public function mdlMostrarListaGastosCorte($tabla,$item,$valor){

			if ($valor == null) {

				$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item = 0");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt->fetchAll();
				
			}else{

				$folioGasto = str_replace('-', ',', $valor);

				$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where $item IN(".$folioGasto.")");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt->fetchAll();

			}


			$stmt-> close();

			$stmt = null;


	}
	static public function mdlGenerarReciboAjuste($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET reciboGenerado = 1 WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlDetalleCorteFinalizado($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT cc.serie,cc.folio,cc.fechaCorte,cc.total,cc.importeVenta,cc.diferencia,cc.gastos,cc.fondoCaja,ad.nombre as sucursal from $tabla cc INNER JOIN administradores ad ON cc.idSucursal = ad.id where $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();

			$stmt-> close();

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
	static public function mdlRegistroBitacoraAgregarFacturas($tabla, $datos){

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
	/*=================================================
	MOSTRAR VENTAS TIENDA
	=================================================*/
	static public function mdlObtenerVentasTienda($tabla,$item,$valor,$item2,$valor2){

			$stmt = Conexion::conectar()->prepare("SELECT (SELECT IF(SUM(total)is null,0,SUM(total)) FROM $tabla WHERE $item = :$item and $item2 = :$item2 and cancelado = 0) as ventaDiaria,(SELECT SUM(total) FROM $tabla WHERE $item = :$item and cancelado = 0) as ventaAcumulada");
			

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();

			$stmt-> close();

			$stmt = null;


	}
	/*=======================================================
	MOSTRAR DESGLOSE COBROS
	=======================================================*/
	static public function mdlMostrarDesgloseCobros($tabla,$item,$valor,$item2,$valor2,$item3,$valor3){

			if($valor == 'ALL'){

				$stmt = Conexion::conectar()->prepare("SELECT nombreCliente,serie,folio,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and $item2 = :$item2 and seriePedido = 'OTRT' and cancelado != 1 and $item3 = :$item3 GROUP by serie,folio");
			

		
				$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
				$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt->fetchAll();


			}else{

				$stmt = Conexion::conectar()->prepare("SELECT nombreCliente,serie,folio,IF(formaPago = 'EFECTIVO',sum(total),'0') as efectivo,IF(formaPago = 'TARJETA DE DÉBITO',sum(total),'0') as tarjetaDebito,IF(formaPago = 'TARJETA DE CRÉDITO',sum(total),'0') as tarjetaCredito,IF(formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS',sum(total),'0') as transferenciaElectronica,IF(formaPago = 'CHEQUE NOMINATIVO',sum(total),'0') as chequeNominativo,IF(formaPago = 'CREDITO',sum(total),'0') as credito,IF(formaPago = 'POR DEFINIR',sum(total),'0') as porDefinir,sum(total) as totalGeneral FROM $tabla WHERE $item = :$item and $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1 and $item3 = :$item3 GROUP by serie,folio");
				

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
				$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt->fetchAll();

			}

			$stmt-> close();

			$stmt = null;


	}
	/*=======================================================
	MOSTRAR DINERO EN  EFECTIVO A DEPOSITAR
	=======================================================*/
	static public function mdlMostrarEfectivoADepositarBanco($tabla,$item,$valor,$item2,$valor2){

			if ($valor2 == 'ALL') {
				
				$stmt = Conexion::conectar()->prepare("SELECT IF(formaPago = 'EFECTIVO',nombreCliente,'') AS nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'') as efectivo FROM $tabla WHERE formaPago = 'EFECTIVO' AND $item = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 GROUP by nombreCliente UNION ALL SELECT IF(formaPago = 'EFECTIVO',nombreCliente,'') AS nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'') as efectivo FROM $tabla WHERE formaPago = 'EFECTIVO' AND nuevaFechaFactura = :$item and $item2 IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and seriePedido = 'OTRT' and cancelado != 1 GROUP by nombreCliente ORDER BY nombreCliente");
			

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt->fetchAll();


			}else{

				$concepto = $valor2;
				$stmt = Conexion::conectar()->prepare("SELECT IF(formaPago = 'EFECTIVO',nombreCliente,'') AS nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'') as efectivo FROM $tabla WHERE formaPago = 'EFECTIVO' AND $item = :$item and $item2 in ($concepto) and seriePedido != 'OTRT' and cancelado != 1 GROUP by nombreCliente UNION ALL SELECT IF(formaPago = 'EFECTIVO',nombreCliente,'') AS nombreCliente,IF(formaPago = 'EFECTIVO',sum(total),'') as efectivo FROM $tabla WHERE formaPago = 'EFECTIVO' AND nuevaFechaFactura = :$item and $item2 in ($concepto) and seriePedido != 'OTRT' and cancelado != 1 GROUP by nombreCliente ORDER BY nombreCliente");
			

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt->fetchAll();


			}

			$stmt-> close();

			$stmt = null;


	}
	/*=======================================================
	MOSTRAR FACTURAS PENDIENTES DE PAGO
	=======================================================*/
	static public function mdlMostrarFacturasPendientesPago($tabla,$item,$valor){

		if ($valor == "ALL") {

			$stmt = Conexion::conectar()->prepare("SELECT id,serie,folio,nombreCliente,fechaFactura,total,abono,pendiente,formaPago,pendientePago,importePendiente FROM $tabla WHERE formaPago IN('CREDITO','POR DEFINIR') AND $item IN('FACTURA MAYOREO V 3.3','FACTURA FX PUEBLA V 3.3','Factura Mayoreo') and cancelado != 1 AND pendiente != 0 and seriePedido = 'OTRT'");
			

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();
			
		}else{
			$concepto = $valor;
			$stmt = Conexion::conectar()->prepare("SELECT id,serie,folio,nombreCliente,fechaFactura,total,abono,pendiente,formaPago,pendientePago,importePendiente FROM $tabla WHERE formaPago IN('CREDITO','POR DEFINIR') AND $item IN($valor) and cancelado != 1 AND pendiente != 0 and seriePedido != 'OTRT'");
			

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

		}
			$stmt-> close();

			$stmt = null;

	}
	static public function mdlActualizarFacturasPagoPendiente($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item4,$valor4,$item5,$valor5){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2, $item3 = :$item3,$item4 = :$item4,$item5 = :$item5 WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item4,$valor4,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item5,$valor5,PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	/*====================================================================
	=            MODELOS NUEVAS FUNCIONES FACTURAS PENDIENTES            =
	====================================================================*/
	static public function mdlMostrarFacturasPendientesCredito($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT ft.id,ft.serie,ft.folio,ft.fechaFactura,ft.nombreCliente,ft.total,ft.abono,ft.depositada,IF(ab.idMovimientoBanco IS NULL AND ft.estatus = 'Cancelada','Cancelada',ab.idMovimientoBanco) as idMovimientoBanco,ft.estatus from $tabla ft LEFT OUTER JOIN abonos ab ON ab.serieFactura = ft.serie and ab.folioFactura = ft.folio where ft.formaPago = 'CREDITO' and ft.cancelado = 0 and ft.total != ft.abono GROUP by ft.folio, ft.serie");


			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt ->execute();

			return $stmt->fetchAll();
		}
			$stmt-> close();

			$stmt = null;


	}
	
	static public function mdlGuardarDatosDepositoBancoGenerales($tabla,$item,$valor,$item2,$valor2,$item3,$valor3,$item5,$valor5,$item6,$valor6,$item7,$valor7,$item9,$valor9){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item2 = :$item2, $item3 = :$item3, $item5 = :$item5, $item6 = :$item6, $item7 = :$item7,$item9 = :$item9 where id = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item3,$valor3,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item5,$valor5,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item6,$valor6,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item7,$valor7,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item9,$valor9,PDO::PARAM_STR);
			

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}else{

			
		}
		


	}
	static public function mdlInsertarParcialesAbonosGenerales($tabla,$campo,$parcial,$campo2,$departamento2,$movimiento,$movimientoBanco,$itemParciales,$sumaParciales){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $campo = :$campo, $campo2 = :$campo2,$itemParciales = :$itemParciales WHERE $movimiento = :$movimiento");

			$stmt -> bindParam(":".$campo,$parcial,PDO::PARAM_STR);
			$stmt -> bindParam(":".$campo2,$departamento2,PDO::PARAM_STR);
			$stmt -> bindParam(":".$movimiento,$movimientoBanco,PDO::PARAM_STR);
			$stmt -> bindParam(":".$itemParciales,$sumaParciales,PDO::PARAM_STR);
			

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlLimpiarParcialesAbonosGenerales($tabla,$movimientoB,$movimientoBanco){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET parcial = 0, departamentoParcial1 = '',parcial2 = 0, departamentoParcial2 = '',parcial3 = 0, departamentoParcial3 = '',parcial4 = 0, departamentoParcial4 = '',parcial5 = 0, departamentoParcial5 = '',parcial6 = 0, departamentoParcial6 = '',parcial7 = 0, departamentoParcial7 = '',parcial8 = 0, departamentoParcial8 = '',parcial9 = 0, departamentoParcial9 = '',parcial10 = 0, departamentoParcial10 = '',parcial11 = 0, departamentoParcial11 = '',parcial12 = 0, departamentoParcial12 = '',parcial13 = 0, departamentoParcial13 = '',parcial14 = 0, departamentoParcial14 = '',parcial15 = 0, departamentoParcial15 = '',parcial16 = 0, departamentoParcial16 = '',parcial17 = 0, departamentoParcial17 = '',parcial18 = 0, departamentoParcial18 = '',parcial19 = 0, departamentoParcial19 = '',parcial20 = 0, departamentoParcial20 = '',parcial21 = 0, departamentoParcial21 = '',parcial22 = 0, departamentoParcial22 = '',parcial23 = 0, departamentoParcial23 = '',parcial24 = 0, departamentoParcial24 = '',parcial25 = 0, departamentoParcial25 = '',parcial26 = 0, departamentoParcial26 = '',parcial27 = 0, departamentoParcial27 = '',parcial28 = 0, departamentoParcial28 = '',parcial29 = 0, departamentoParcial29 = '',parcial30 = 0, departamentoParcial30 = '',importeParciales = 0 WHERE $movimientoB = :$movimientoB");

			$stmt -> bindParam(":".$movimientoB,$movimientoBanco,PDO::PARAM_STR);
			

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlMostrarDepositosTiendasGenerales($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT banc.id,banc.mes,banc.fecha,banc.descripcion,banc.abono,IF(ISNULL(dep.estatus),'POR IDENTIFICAR',dep.estatus) as estatus,IF(ISNULL(dep.saldoPendiente),banc.abono,dep.saldoPendiente) as saldoPendiente,IF(ISNULL(dep.idMovimientoBanco),'',dep.idMovimientoBanco) as idMovimientoBanco,IF(ISNULL(dep.conceptoFacturas),'',dep.conceptoFacturas) as conceptoFacturas,IF(ISNULL(dep.montoFacturas),'',dep.montoFacturas) as montoFacturas,IF(ISNULL(dep.clientesFacturas),'',dep.clientesFacturas) as clientesFacturas,IF(ISNULL(dep.abonadoDeposito),'',dep.abonadoDeposito) as abonadoDeposito,IF(ISNULL(dep.parciales),'',dep.parciales) as parciales,IF(ISNULL(dep.totalDocumentos),'',dep.totalDocumentos) as totalDocumentos,IF(ISNULL(dep.span),'',dep.span) as span,dep.reciboGenerado as reciboGenerado from $tabla banc INNER JOIN depositosgenerales dep ON banc.id = dep.idMovimientoBanco and banc.banco = dep.banco WHERE dep.$item = :$item and dep.banco = '".$tabla."'");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt ->execute();

			return $stmt->fetch();

			$stmt -> close();

			$stmt = null;


	}
	/*=====  End of MODELOS NUEVAS FUNCIONES FACTURAS PENDIENTES  ======*/
	static public function mdlActualizarEnviadoCredito($tabla,$arreglo){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set creditoPendiente = 0 ,enviadoCredito = 1, horaEnviado = :horaEnviado  where id = :id");

			$stmt -> bindParam(":id",$arreglo["id"],PDO::PARAM_INT);
			$stmt -> bindParam(":horaEnviado",$arreglo["horaEnviado"],PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlActualizarRecibidoCredito($tabla,$arreglo){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set recibidoCredito = 1, horaRecibido = :horaRecibido  where id = :id");

			$stmt -> bindParam(":id",$arreglo["id"],PDO::PARAM_INT);
			$stmt -> bindParam(":horaRecibido",$arreglo["horaRecibido"],PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlActualizarSubidaDocumentosCredito($tabla,$arreglo){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set documentosCredito = 1, horaSubidaDocumentos = :horaSubidaDocumentos, idUsuarioCarga = :idUsuarioCarga  where id = :id");

			$stmt -> bindParam(":id",$arreglo["id"],PDO::PARAM_INT);
			$stmt -> bindParam(":horaSubidaDocumentos",$arreglo["horaSubida"],PDO::PARAM_STR);
			$stmt -> bindParam(":idUsuarioCarga",$arreglo["idUsuarioCarga"],PDO::PARAM_STR);

			if($stmt -> execute()){

			return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlMostrarDetallesDocumentosCredito($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT ad.nombre,ft.horaSubidaDocumentos from $tabla as ft  INNER JOIN administradores as ad ON ft.idUsuarioCarga = ad.id WHERE ft.$item = :$item");
			

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt->fetch();

			$stmt-> close();

			$stmt = null;


	}
	/*=============================================
	ACTUALIZAR FORMA DE PAGO FACTURA TIENDAS
	=============================================*/
	static public function mdlActualizarFormaPagoFactura($tabla,$item,$valor,$item2,$valor2){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item2 = :$item2 where $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}


	}
	static public function mdlMostrarFacturasCrm($tabla,$item,$valor,$item2,$valor2,$item3,$valor3){

		if ($valor2 == 'ALL') {


			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item BETWEEN '$fechaInicio' AND '$fechaFinal' and cancelado != 1");

			$stmt -> execute();

			return $stmt->fetchAll();
			
		}else{


			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item BETWEEN '$fechaInicio' AND '$fechaFinal' and  $item2 = :$item2 and seriePedido != 'OTRT' and cancelado != 1");

		
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			

			$stmt -> execute();

			return $stmt->fetchAll();

		}

	}
	static public function mdlMostrarCotizacionesComercial($item,$valor,$item2,$valor2,$item3,$valor3,$empresa){
		switch ($empresa) {
			case 'Pinturas':
				
				require_once "conexion-api-server-pinturas.modelo.php";

				break;
			case 'Flex':
			
				require_once "conexion-api-server-flex.modelo.php";
				break;
			case 'Torres':
				
				require_once "conexion-api-server-torres.modelo.php";
				break;

		}


		if ($valor2 == 'ALL') {


			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);

			if ($empresa == 'Pinturas') {
				
				
            		if ($_SESSION['nombre'] == 'Ivan Herrera Perez') {

						$mostrarFacturas =  "SELECT admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CTOTALUNIDADES as UNIDADES,admDoc.CRAZONSOCIAL as NOMBRECLIENTE,admAge.CNOMBREAGENTE,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CREFERENCIA,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)) AS COBSERVACIONES FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO  LEFT JOIN dbo.admAgentes as admAge ON admAge.CIDAGENTE = admDoc.CIDAGENTE where admDoc.CFECHA >= '".$fechaInicio."' AND admDoc.CFECHA <= '".$fechaFinal."' and admDoc.CSERIEDOCUMENTO IN('COSM','COCP','CORF','ZCTR','COSG') and admDoc.CIDDOCUMENTODE = 1 GROUP BY admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CTOTALUNIDADES,admDoc.CRAZONSOCIAL,admAge.CNOMBREAGENTE,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CREFERENCIA,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000))";


            			$ejecutar = sqlsrv_query($conne,$mostrarFacturas);
				
						
					}else{
						$mostrarFacturas =  "SELECT admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CTOTALUNIDADES as UNIDADES,admDoc.CRAZONSOCIAL as NOMBRECLIENTE,admAge.CNOMBREAGENTE,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CREFERENCIA,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)) AS COBSERVACIONES FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO  LEFT JOIN dbo.admAgentes as admAge ON admAge.CIDAGENTE = admDoc.CIDAGENTE where admDoc.CFECHA >= '".$fechaInicio."' AND admDoc.CFECHA <= '".$fechaFinal."' and admDoc.CSERIEDOCUMENTO IN('COND','COCD') and admDoc.CIDDOCUMENTODE = 1 GROUP BY admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CTOTALUNIDADES,admDoc.CRAZONSOCIAL,admAge.CNOMBREAGENTE,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CREFERENCIA,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000))";


            			$ejecutar = sqlsrv_query($conne,$mostrarFacturas);
				
					}

				
			}else{

				$mostrarFacturas =  "SELECT admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CTOTALUNIDADES as UNIDADES,admDoc.CRAZONSOCIAL as NOMBRECLIENTE,admAge.CNOMBREAGENTE,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CREFERENCIA,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)) AS COBSERVACIONES FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO  LEFT JOIN dbo.admAgentes as admAge ON admAge.CIDAGENTE = admDoc.CIDAGENTE where admDoc.CFECHA >= '".$fechaInicio."' AND admDoc.CFECHA <= '".$fechaFinal."' and admDoc.CSERIEDOCUMENTO IN('COT') and admDoc.CIDDOCUMENTODE = 1 GROUP BY admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CTOTALUNIDADES,admDoc.CRAZONSOCIAL,admAge.CNOMBREAGENTE,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CREFERENCIA,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000))";

            	$ejecutar = sqlsrv_query($conne,$mostrarFacturas);
			}
			


            $i = 0;
    
           	if (sqlsrv_has_rows($ejecutar) === false) {
           		echo  null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutar)) {
            	
            	$facturas[$i] = array(
            						 "idComercial"=>$value["CIDDOCUMENTO"],
            						 "serie" => $value["CSERIEDOCUMENTO"],
            						 "folio" => $value["CFOLIO"],
            						 "fecha" => $value["CFECHA"],
            						 "fechaVencimiento" => $value["CFECHAVENCIMIENTO"],
            						 "fechaEntrega" => $value["CFECHA"],
            						 "partidas" => $value["PARTIDAS"],
            						 "unidades" => $value["UNIDADES"],
            						 "nombreCliente" => $value["NOMBRECLIENTE"],
            						 "agenteVenta"=>$value["CNOMBREAGENTE"],
            						 "total" => $value["CTOTAL"],
            						 "estatus" => $value["CCANCELADO"],
            						 "referencia" => $value["CREFERENCIA"],
            						 "observaciones" => $value["COBSERVACIONES"]);
            	$i++;
            }
            header("Content-type:application/json"); 
            return json_encode($facturas)."\n";;
           	}
			
		}else{


			$fecha = strtotime($valor);

			$fechaInicio = date('Y-m-d',$fecha);
			$fecha2 = strtotime($valor3);

			$fechaFinal = date('Y-m-d',$fecha2);

			$mostrarFacturas =  "SELECT admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CTOTALUNIDADES as UNIDADES,admDoc.CRAZONSOCIAL as NOMBRECLIENTE,admAge.CNOMBREAGENTE,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CREFERENCIA,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)) AS COBSERVACIONES FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO  LEFT JOIN dbo.admAgentes as admAge ON admAge.CIDAGENTE = admDoc.CIDAGENTE where admDoc.CFECHA >= '".$fechaInicio."' AND admDoc.CFECHA <= '".$fechaFinal."' and admDoc.CSERIEDOCUMENTO = '".$valor2."' and admDoc.CIDDOCUMENTODE = 1 GROUP BY admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CTOTALUNIDADES,admDoc.CRAZONSOCIAL,admAge.CNOMBREAGENTE,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CREFERENCIA,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000))";


            $ejecutar = sqlsrv_query($conne,$mostrarFacturas);
            $i = 0;
           		
           	if (sqlsrv_has_rows($ejecutar) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutar)) {
            	
            	$facturas[$i] = array(
            						 "idComercial"=>$value["CIDDOCUMENTO"],
            						 "serie" => $value["CSERIEDOCUMENTO"],
            						 "folio" => $value["CFOLIO"],
            						 "fecha" => $value["CFECHA"],
            						 "fechaVencimiento" => $value["CFECHAVENCIMIENTO"],
            						 "fechaEntrega" => $value["CFECHA"],
            						 "partidas" => $value["PARTIDAS"],
            						 "unidades" => $value["UNIDADES"],
            						 "nombreCliente" => $value["NOMBRECLIENTE"],
            						 "agenteVenta"=>$value["CNOMBREAGENTE"],
            						 "total" => $value["CTOTAL"],
            						 "estatus" => $value["CCANCELADO"],
            						 "referencia" => $value["CREFERENCIA"],
            						 "observaciones" => $value["COBSERVACIONES"]);
            	$i++;
            }
            header("Content-type:application/json"); 
		
            return json_encode($facturas)."\n";;
           	}

		}

	}
	/*=============================================
	ACTUALIZAR ABONADO PARCIAL FACTURAS
	=============================================*/
	static public function mdlActualizarAbonoParcial($tabla,$serie,$folio,$abono,$total){
			if ($total === $abono) {
				
				$pendiente = $abono;
				$pagado = 0;
				$depositada = 0;
				$abono = 0;
			}else{
				$consulta = Conexion::conectar()->prepare("SELECT totalAbono,pendienteFactura FROM abonos WHERE serieFactura = '$serie' and folioFactura = $folio");
				$consulta -> execute();

				if($consulta -> rowCount() > 0){
					$results = $consulta -> fetch();
					$pendiente = $results["pendienteFactura"];
					$pagado = $results["totalAbono"];
					$depositada = 1;
					$abono = $results["totalAbono"];

				}else{

					$pendiente = $total;
					$pagado = 0;
					$depositada = 0;
					$abono = 0;

				}

				
			}

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set pagado = $pagado,depositada = $depositada,abono = $abono,pendiente = $pendiente where serie = '$serie' and folio = $folio");

			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}


	}
	/*=============================================
	ACTUALIZAR VINCULADO CRM
	=============================================*/
	static public function mdlActualizarFacturaVinculadaCrm($tabla, $idFactura, $valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set vinculadoCrm = $valor  where id = $idFactura");

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR OBSERVACIONES FACTURA TIENDAS
	=============================================*/
	static public function mdlActualizarObservacionesFactura($tabla, $item, $valor, $item2, $valor2)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set $item2 = :$item2 where $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
	}

}


?>