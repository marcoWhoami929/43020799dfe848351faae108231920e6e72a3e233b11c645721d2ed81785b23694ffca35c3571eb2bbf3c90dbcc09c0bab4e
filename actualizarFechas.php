<?php
	ini_set('max_execution_time', 0);
	set_time_limit(1800);
	ini_set('memory_limit', '-1');
	require_once('db_connect.php');

	if (isset($_POST["actualizar"])) {

				$sql_query = "SELECT iden, fecha FROM banco1340";
                $resultado = mysqli_query($conn, $sql_query) or die("database_error:".mysqli_error($conn));
                $contador = 1;
                foreach ($resultado as $value) {
                			
                			$fecha = $value['fecha'];
		                	setlocale(LC_TIME, 'spanish');
					        $numero = substr($fecha,-7,2);

					        $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 
					        $count = $contador++;
					        $actualizarFecha = "UPDATE banco1340 set mes = '".strtoupper($mes)."' where iden = '".$count."'";
							mysqli_query($conn, $actualizarFecha) or die("database error:". mysqli_error($conn));

                }
   
		
	}else {

		echo 'No existe';
	}
			
	
header("Location: banco1340");

?>