<?php 
	
	$cod = $_GET['_num1'];

	if (!empty($cod)) {
		 comprobar($cod);
	}

	function comprobar($cod){
		$con = mysqli_connect('127.0.0.1','mat','matriz');
		mysqli_select_db($con,'matriz');
		mysqli_set_charset($con, "utf8"); //formato de datos utf8

		$sql = mysqli_query($con,"SELECT * FROM agentes WHERE codigo = '".$cod."'");
		$agentes = array();
		$contar = mysqli_num_rows($sql);
		if ($contar == 0) {
			$agentes[] = array('codigoCliente'=> 'y', 'nombreCliente' => 'El Agente no existe', 'resultado' => 0);
		}else{
			while ($row = mysqli_fetch_row($sql)) {
			    $codigoAgente = $row[1];
			    $nombreAgente = $row[2];
			   

			    $agentes[] = array('nombreAgente'=> $nombreAgente, 'resultado'=>1);
			}
		}
		$json_string = json_encode($agentes);
		echo $json_string;
	}

?>