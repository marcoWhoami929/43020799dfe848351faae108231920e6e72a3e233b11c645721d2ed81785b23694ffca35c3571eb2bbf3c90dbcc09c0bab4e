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
				
				$sql_query = "SELECT * FROM productos WHERE codigo = '".$emp_record[0]."'";
				$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
				
					if(mysqli_num_rows($resultset)) {
					
					$sql_update = "UPDATE productos set base='".$emp_record[1]."', cubeta='".$emp_record[2]."', galon='".$emp_record[3]."',litro='".$emp_record[4]."',quiml='".$emp_record[5]."', dosml='".$emp_record[6]."', unoml='".$emp_record[7]."',distribuidor='".$emp_record[8]."', estatus ='".$emp_record[9]."'  WHERE codigo = '".$emp_record[0]."'";
					mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));


					} else{

							$nombre_archivo = "logs.txt"; 
 
						    if(file_exists($nombre_archivo))
						    {
						        $mensaje = "El siguiente codigo no existe";
						    }
						 
						    else
						    {
						        $mensaje = "El siguiente codigo no existe";
						    }
						 
						    if($archivo = fopen($nombre_archivo, "a"))
						    {
						        if(fwrite($archivo, date("d m Y H:m:s"). " ". $mensaje. " ". $emp_record[0]. "\r\n"))
						        {
						            echo "Se ha ejecutado correctamente";
						        }
						        else
						        {
						            echo "Ha habido un problema al crear el archivo";
						        }
						 
						        fclose($archivo);
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
	header("Location: productos".$import_status);
?>