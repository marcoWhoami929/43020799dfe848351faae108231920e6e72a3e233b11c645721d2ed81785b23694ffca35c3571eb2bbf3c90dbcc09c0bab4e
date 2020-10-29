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
					$pedido = explode(" ", $emp_record[0]);
					$serie = $pedido[0];
					$folio = $pedido[1];
				$sql_query = "SELECT * FROM atencionaclientes WHERE folio = '".$folio."' and serie = '".$serie."'";
				$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
				
					if(mysqli_num_rows($resultset)) {
					$pedido = explode(" ", $emp_record[0]);
					$serie = $pedido[0];
					$folio = $pedido[1];
				
					$sql_update = "UPDATE atencionaclientes set numeroPartidas='".$emp_record[1]."' WHERE folio = '".$folio."' and serie = '".$serie."'";
					mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));

					$sql_update2 = "UPDATE almacen set numeroPartidas='".$emp_record[1]."' WHERE idPedido = '".$folio."' and serie = '".$serie."'";
					mysqli_query($conn, $sql_update2) or die("database error:". mysqli_error($conn));

					$sql_update3 = "UPDATE facturacion set partidas='".$emp_record[1]."' WHERE idPedido = '".$folio."' and serie = '".$serie."'";
					mysqli_query($conn, $sql_update3) or die("database error:". mysqli_error($conn));


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