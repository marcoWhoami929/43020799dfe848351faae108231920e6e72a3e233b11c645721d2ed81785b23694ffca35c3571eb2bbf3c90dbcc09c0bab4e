<?php
	error_reporting(0);

	include_once("db_connect.php");

	if(isset($_POST['import_data'])){
	
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

				while(($emp_record = fgetcsv($csv_file,10000, ",")) !== FALSE){

					$serie = $emp_record[0];
					$folio = $emp_record[1];
 
					$existe=  "SELECT * FROM facturastiendas WHERE serie = '".$serie."' AND folio = ".$folio;
        			$existencia = mysqli_query($conn, $existe) or die("database error:". mysqli_error($conn));

        			if(mysqli_num_rows($existencia)){

        				if ($emp_record[3] == $emp_record[2]) {

        					$actualizar = "UPDATE facturastiendas SET pendiente = 0, pagado = total, depositada = 1,observaciones = 'PAGADA AUTOMATICAMENTE EN SISTEMA', abono = total WHERE serie = '".$serie."' AND folio = ".$folio;

        					mysqli_query($conn, $actualizar) or die("database error:". mysqli_error($conn));

        				}else{

        					$name_archivo = "logsFactuasTiendas.txt";

        					if (file_exists($name_archivo)) {

        						$texto = "No se Pudo actualizar el pendiente es diferente al total";
        					}else {
        						$texto = "No se Pudo actualizar el pendiente es diferente al total";
        					}

        					if ($archive = fopen($name_archivo, "a")) {

        						if (fwrite($archive, date("d m Y H:m:s")." ".$texto."-- Factura ".$emp_record[0]." ".$emp_record[1]. "\r\n")) {
        							
        							echo "Success...";
        						
        						}else{

        							echo "Error...";
        						}

        						fclose($archivo);
        					}

        				}


        			}else{
        				$nombre_archivo = "logsFactuasTiendas.txt"; 
 
						if(file_exists($nombre_archivo)){

						    $mensaje = "El siguiente codigo no fue encontrado";

						}else{

						    $mensaje = "El siguiente codigo no fue encontrado";

						}
						 
						if($archivo = fopen($nombre_archivo, "a")){

						    if(fwrite($archivo, date("d m Y H:m:s"). " ". $mensaje. " ". $emp_record[0]." ".$emp_record[1]. "\r\n")){
						            
						            echo "Se ha ejecutado correctamente";

						    }else{

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
	header("Location: actualizarFacturasTiendas".$import_status);
?>