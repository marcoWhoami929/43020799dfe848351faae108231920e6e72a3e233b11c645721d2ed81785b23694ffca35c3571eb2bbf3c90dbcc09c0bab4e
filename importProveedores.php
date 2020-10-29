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

			/*
			$mysql = new mysqli($servername, $username, $password, $dbname);

			$ultimoMovimiento = $mysql->query('SELECT * FROM banco0198 ORDER BY id DESC LIMIT 1');

			$numeroMovimiento = 2500;
			if ($ultimoMovimiento->num_rows === 0) {
				
				$numeroMovimiento .= '-1';

			}else {

				$ultimoMovimiento = $ultimoMovimiento->fetch_assoc();

				$ultimoIdMovimiento = $ultimoMovimiento['numeroMovimiento'];

				$ultimoIdMovimiento = (int) $ultimoIdMovimiento[1] ++;

				$numeroMovimiento .= '-' . $ultimoIdMovimiento;

			}
			*/
		
			$csv_file = fopen($_FILES['file']['tmp_name'], 'r');
			//fgetcsv($csv_file);
			// get data records from csv file
				while(($emp_record = fgetcsv($csv_file,1000, ",")) !== FALSE){
				
				$sql_query = "SELECT codigo, rfc, razonSocial, fechaAlta, limiteCredito, diasCredito, rfc2, curp FROM proveedores WHERE codigo = '".$emp_record[0]."'";
				$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
				
					if(mysqli_num_rows($resultset)) {
					$sql_update = "UPDATE proveedores set codigo='".$emp_record[0]."', rfc='".$emp_record[1]."', razonSocial='".$emp_record[2]."', fechaAlta='".$emp_record[3]."', limiteCredito='".$emp_record[4]."', diasCredito='".$emp_record[5]."', rfc2='".$emp_record[6]."', curp='".$emp_record[7]."' WHERE codigo='".$emp_record[0]."'";
					mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));
					} else{

					$mysql_insert = "INSERT INTO proveedores (codigo, rfc, razonSocial, fechaAlta, limiteCredito, diasCredito, rfc2, curp)VALUES('".$emp_record[0]."','".$emp_record[1]."','".$emp_record[2]."','".$emp_record[3]."','".$emp_record[4]."','".$emp_record[5]."','".$emp_record[6]."','".$emp_record[7]."')";
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
	header("Location: proveedores".$import_status);
?>