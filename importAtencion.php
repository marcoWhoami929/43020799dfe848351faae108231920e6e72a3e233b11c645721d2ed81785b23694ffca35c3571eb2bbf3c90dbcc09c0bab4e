<?php
	include_once("db_connect.php");
	if(isset($_POST['import_data'])){
	// validate to check uploaded file is a valid csv file
	
	$file_mimes = array(
		'text/x-comma-separated-values',
		'text/comma-separated-values', 
		'application/octet-stream', 
		'application/vnd.ms-excel', 
		'application/x-csv', 
		'text/x-csv', 
		'text/csv', 
		'application/csv', 
		'application/excel', 
		'application/vnd.msexcel'
	);
		if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
		if(is_uploaded_file($_FILES['file']['tmp_name'])){

			$csv_file = fopen($_FILES['file']['tmp_name'], 'r');
			//fgetcsv($csv_file);
			// get data records from csv file
				while(($emp_record = fgetcsv($csv_file,10000, ",")) !== FALSE){
				$serie = $emp_record[6];
				$sql_query = "SELECT codigoCliente, nombreCliente, canal, rfc, agenteVentas, diasCredito, statusCliente, serie, folio, numeroUnidades, importe, estado FROM atencionaclientes WHERE folio = '".str_replace(',','',$emp_record[7])."' and serie = '".$emp_record[6]."'";
				$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
				
					if(mysqli_num_rows($resultset)) {
					$sql_update = "UPDATE atencionaclientes set codigoCliente='".$emp_record[0]."', nombreCliente='".$emp_record[1]."', rfc='".$emp_record[2]."', agenteVentas='".$emp_record[3]."', diasCredito='".$emp_record[4]."' , statusCliente='".$emp_record[5]."', serie='".$emp_record[6]."', folio='".str_replace(',','',$emp_record[7])."', numeroUnidades='".str_replace(',','',$emp_record[8])."', importe='".str_replace(',','',$emp_record[9])."', fechaPedido = '".$emp_record[10]."', tipoRuta = 'Mostrador' WHERE folio = '".str_replace(',','',$emp_record[7])."' and serie = '".$emp_record[6]."'";
					mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));

					$sql_update2 = "UPDATE almacen set serie='".$emp_record[6]."', idPedido='".str_replace(',','',$emp_record[7])."', numeroUnidades='".str_replace(',','',$emp_record[8])."', importeTotal='".str_replace(',','',$emp_record[9])."', suministrado ='Ulises Tuxpan', nombreCliente='".$emp_record[1]."', fechaPedido = '".$emp_record[10]."' WHERE idPedido='".str_replace(',','',$emp_record[7])."' and serie = '".$emp_record[6]."'";
					mysqli_query($conn, $sql_update2) or die("database error:". mysqli_error($conn));

					$sql_update3 = "UPDATE laboratoriocolor set idPedido='".str_replace(',','',$emp_record[7])."', serie='".$emp_record[6]."', nombreCliente='".$emp_record[1]."', fechaPedido = '".$emp_record[10]."' WHERE idPedido='".str_replace(',','',$emp_record[7])."' and serie = '".$emp_record[6]."'";
					mysqli_query($conn, $sql_update3) or die("database error:". mysqli_error($conn));

					$sql_update4 = "UPDATE facturacion set idPedido='".str_replace(',','',$emp_record[7])."', serie='".$emp_record[6]."',statusCliente='".$emp_record[5]."', unidades='".str_replace(',','',$emp_record[8])."', importeInicial='".str_replace(',','',$emp_record[9])."', nombreCliente='".$emp_record[1]."', fechaPedido = '".$emp_record[10]."'  WHERE idPedido='".str_replace(',','',$emp_record[7])."' and serie = '".$emp_record[6]."'";
					mysqli_query($conn, $sql_update4) or die("database error:". mysqli_error($conn));

					$sql_update5 = "UPDATE logistica set idPedido='".str_replace(',','',$emp_record[7])."', serie='".$emp_record[6]."', nombreCliente='".$emp_record[1]."',fechaPedido = '".$emp_record[10]."' WHERE idPedido='".str_replace(',','',$emp_record[7])."' and serie = '".$emp_record[6]."'";
					mysqli_query($conn, $sql_update5) or die("database error:". mysqli_error($conn));


					} else{


					if ($emp_record[1] == "FLEX FINISHES MEXICO, S.A. DE C.V." || $emp_record[1] == "PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V." ) {
						
							
							$mysql_insert = "INSERT INTO atencionaclientes (codigoCliente, nombreCliente, canal, rfc, agenteVentas, diasCredito, statusCliente, serie, folio, numeroUnidades, importe, fechaPedido,tipoRuta,tipoCompra,observaciones,estadoAlmacen,statusAlmacen,estadoFacturacion,statusFacturacion,estadoCompras,statusCompras,sinAdquisicion,estadoLogistica,statusLogistica,concluido)VALUES('".$emp_record[0]."','".$emp_record[1]."','Cedis','".$emp_record[2]."','".$emp_record[3]."','".$emp_record[4]."','".$emp_record[5]."','".$emp_record[6]."','".str_replace(',','',$emp_record[7])."','".str_replace(',','',$emp_record[8])."','".str_replace(',','',$emp_record[9])."','".$emp_record[10]."','Mostrador','2','Compra Interna','1','3','1','0','1','6','0','1','2','1')";
							mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));

							$mysql_insert2 = "INSERT INTO almacen (serie, idPedido, numeroUnidades, importeTotal,observacionesExtras,tipoCompra,status,estado,pendiente,suministrado,nombreCliente,fechaPedido)VALUES('".$emp_record[6]."','".str_replace(',','',$emp_record[7])."','".str_replace(',','',$emp_record[8])."','".str_replace(',','',$emp_record[9])."','Compra Interna','2','3','1','0','Ulises Tuxpan','".$emp_record[1]."','".$emp_record[10]."')";
							mysqli_query($conn, $mysql_insert2) or die("database error:". mysqli_error($conn));

							$mysql_insert3 = "INSERT INTO laboratoriocolor (idPedido, serie, nombreCliente, fechaPedido) VALUES ('".str_replace(',','',$emp_record[7])."','".$emp_record[6]."','".$emp_record[1]."','".$emp_record[10]."')";
							mysqli_query($conn, $mysql_insert3) or die("database error:". mysqli_error($conn));

							$mysql_insert4 = "INSERT INTO facturacion (idPedido, serie, statusCliente, unidades, importeInicial,observacionesExtras,estado,status,usuario,cliente,fechaPedido,nombreCliente,agenteVentas) VALUES('".str_replace(',','',$emp_record[7])."','".$emp_record[6]."','".$emp_record[5]."','".str_replace(',','',$emp_record[8])."','".str_replace(',','',$emp_record[9])."','Compra Interna','1','0','Gerardo Morales','".$emp_record[1]."','".$emp_record[10]."','".$emp_record[1]."','".$emp_record[3]."')";
							mysqli_query($conn, $mysql_insert4) or die("database error:". mysql_error($conn));

							$mysql_insert5 = "INSERT INTO logistica (idPedido, serie, usuario,estado,status,tipoRuta,concluido,pendiente,estadoPedido,estadoAlmacen,statusAlmacen,estadoFacturacion,statusFacturacion,estadoCompras,statusCompras,nombreCliente,observacionesExtras,fechaPedido) VALUES ('".str_replace(',','',$emp_record[7])."','".$emp_record[6]."','Mauricio Anaya','1','2','Mostrador','1','0','1','1','3','1','0','1','6','".$emp_record[1]."','Compra Interna','".$emp_record[10]."')";
							mysqli_query($conn, $mysql_insert5) or die("database error:". mysqli_error($conn));

							$mysql_insert6 = "INSERT INTO compras(idPedido,serie,cliente,status,sinAdquisicion,estado,pendiente,tipoCompra, fechaPedido) VALUES('".str_replace(',','',$emp_record[7])."','".$emp_record[6]."','".$emp_record[1]."','6','0','1','1','2','".$emp_record[10]."')";
							mysqli_query($conn, $mysql_insert6) or die("database error:". mysqli_error($conn));
							
						}else {

							$mysql_insert7 = "INSERT INTO atencionaclientes (codigoCliente, nombreCliente, canal, rfc, agenteVentas, diasCredito, statusCliente, serie, folio, numeroUnidades, importe, fechaPedido)VALUES('".$emp_record[0]."','".$emp_record[1]."','Cedis','".$emp_record[2]."','".$emp_record[3]."','".$emp_record[4]."','".$emp_record[5]."','".$emp_record[6]."','".str_replace(',','',$emp_record[7])."','".str_replace(',','',$emp_record[8])."','".str_replace(',','',$emp_record[9])."','".$emp_record[10]."')";
							mysqli_query($conn, $mysql_insert7) or die("database error:". mysqli_error($conn));

							$mysql_insert8 = "INSERT INTO almacen (serie, idPedido, numeroUnidades, importeTotal,nombreCliente,fechaPedido)VALUES('".$emp_record[6]."','".str_replace(',','',$emp_record[7])."','".str_replace(',','',$emp_record[8])."','".str_replace(',','',$emp_record[9])."','".$emp_record[1]."','".$emp_record[10]."')";
							mysqli_query($conn, $mysql_insert8) or die("database error:". mysqli_error($conn));

							$mysql_insert9 = "INSERT INTO laboratoriocolor (idPedido, serie, nombreCliente, fechaPedido) VALUES ('".str_replace(',','',$emp_record[7])."','".$emp_record[6]."','".$emp_record[1]."','".$emp_record[10]."')";
							mysqli_query($conn, $mysql_insert9) or die("database error:". mysqli_error($conn));

							$mysql_insert10 = "INSERT INTO facturacion (idPedido, serie, statusCliente, unidades, importeInicial,fechaPedido,nombreCliente,agenteVentas) VALUES('".str_replace(',','',$emp_record[7])."','".$emp_record[6]."','".$emp_record[5]."','".str_replace(',','',$emp_record[8])."','".str_replace(',','',$emp_record[9])."','".$emp_record[10]."','".$emp_record[1]."','".$emp_record[3]."')";
							mysqli_query($conn, $mysql_insert10) or die("database error:". mysql_error($conn));

							$mysql_insert11 = "INSERT INTO logistica (idPedido, serie, usuario,nombreCliente,fechaPedido) VALUES ('".str_replace(',','',$emp_record[7])."','".$emp_record[6]."','Mauricio Anaya','".$emp_record[1]."','".$emp_record[10]."')";
							mysqli_query($conn, $mysql_insert11) or die("database error:". mysqli_error($conn));

						}	

					
					}
				}
		fclose($csv_file);
		$import_status = '?import_status=success';
		} else {
		$import_status = '?import_status=error';
		}
		} else {
		$import_status = '?import_status=invalid_file';
		}
	}
	header("Location: atencionClientes".$import_status);
?>