<?php 
	
	$cod = $_GET['_num1'];

	if (!empty($cod)) {
		 comprobar($cod);
	}

	function comprobar($cod){
		$con = mysqli_connect('127.0.0.1','mat','matriz');
		mysqli_select_db($con,'matriz');
		mysqli_set_charset($con, "utf8"); //formato de datos utf8

		$sql = mysqli_query($con,"SELECT * FROM productos WHERE codigo = '".$cod."'");
		$productos = array();
		$contar = mysqli_num_rows($sql);
		if ($contar == 0) {
			$productos[] = array('codigo'=> '', 'descripcion' => '', 'precio' => '', 'resultado' => 0);
		}else{
			while ($row = mysqli_fetch_row($sql)) {
			    $codigo = $row[3];
			    $descripcion = str_replace('pul', '"', $row[4]);
			    $precio = $row[13];
			    $unidadMedida = $row[16];
			    $valorMedida = $row[17];
			    $gramaje = $row[18];
			    $nombreAbrev = $row[19];
			

			    $productos[] = array('descripcion'=> $descripcion, 'precio' => $precio, 'unidadMedida' => $unidadMedida, 'valorMedida' => $valorMedida, 'gramaje' => $gramaje, 'nombre' => $nombreAbrev,  'resultado'=>1);
			}
		}
		$json_string = json_encode($productos);
		echo $json_string;
	}

?>