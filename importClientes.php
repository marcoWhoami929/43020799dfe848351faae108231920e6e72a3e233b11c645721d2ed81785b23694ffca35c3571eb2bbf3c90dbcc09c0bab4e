<?php
	ini_set('max_execution_time', 0);
	set_time_limit(1800);
	ini_set('memory_limit', '-1');
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
				
				$sql_query = "SELECT codigoCliente, rfc, nombreCliente, agenteVentas, agenteCobro, limiteCredito, diasCredito, segmento, statusCliente, descuentoMovimiento, descuentoDocumento, modo, catalogo, domicilioFiscal,telefono,cp FROM clientes WHERE codigoCliente = '".$emp_record[0]."' and catalogo = '".$emp_record[12]."'";
				$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
				
					if(mysqli_num_rows($resultset)) {

					$direccionFiscal = $emp_record[13].", ".$emp_record[14].", ".$emp_record[15].", ".$emp_record[16].", ".$emp_record[17].", ".$emp_record[18].", ".$emp_record[19].", ".$emp_record[20];

					$codigoCliente = $emp_record[0];
					$nombreCliente = $emp_record[2];

					$sql_update = "UPDATE clientes set codigoCliente='".trim($codigoCliente)."', rfc='".$emp_record[1]."', nombreCliente='".trim($nombreCliente)."', agenteVentas='".$emp_record[3]."', agenteCobro='".$emp_record[4]."' , limiteCredito='".$emp_record[5]."', diasCredito='".$emp_record[6]."', segmento='".$emp_record[7]."', statusCliente='".$emp_record[8]."', descuentoDocumento = '".$emp_record[9]."', descuentoMovimiento = '".$emp_record[10]."',  telefono = '".$emp_record[21]."', cp = '".$emp_record[22]."', listaPrecios = '".$emp_record[23]."' WHERE codigoCliente='".$emp_record[0]."' and catalogo = '".$emp_record[12]."'";
					mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));
					} else{

					$direccionFiscal = $emp_record[13].", ".$emp_record[14].", ".$emp_record[15].", ".$emp_record[16].", ".$emp_record[17].", ".$emp_record[18].", ".$emp_record[19].", ".$emp_record[20];
					
					$codigoCliente = $emp_record[0];
					$nombreCliente = $emp_record[2];


					$mysql_insert = "INSERT INTO clientes (codigoCliente, rfc, nombreCliente, agenteVentas, agenteCobro, limiteCredito, diasCredito, segmento, statusCliente,descuentoDocumento, descuentoMovimiento,modo,catalogo, domicilioFiscal, telefono, cp,listaPrecios)VALUES('".trim($codigoCliente)."','".$emp_record[1]."','".trim($nombreCliente)."','".$emp_record[3]."','".$emp_record[4]."','".$emp_record[5]."','".$emp_record[6]."','".$emp_record[7]."','".$emp_record[8]."','".$emp_record[9]."','".$emp_record[10]."','".$emp_record[11]."','".$emp_record[12]."','".strtoupper($direccionFiscal)."', '".$emp_record[21]."', '".$emp_record[22]."','".$emp_record[23]."')";
					mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
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
	header("Location: clientes".$import_status);
?>