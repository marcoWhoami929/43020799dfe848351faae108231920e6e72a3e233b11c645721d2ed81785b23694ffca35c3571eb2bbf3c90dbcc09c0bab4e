<?php 
	
	$cod = $_GET['_num1'];

	if (!empty($cod)) {
		 comprobar($cod);
	}

	function comprobar($cod){
		$con = mysqli_connect('localhost','root','');
		mysqli_select_db($con,'matriz');

		$sql = mysqli_query($con,"SELECT * FROM atencionaclientes WHERE serie = '".$cod."' and estado = 1 and estadoAlmacen = 1");
		$clientes = array();
		$contar = mysqli_num_rows($sql);
		if ($contar == 0) {
			$clientes[] = array('serie'=> '', 'folio' => '', 'resultado' => 0);
		}else{
			while ($row = mysqli_fetch_row($sql)) {
			    $serie = $row[9];
			    $folio = $row[10];

			    $clientes[] = array('serie' => $serie, 'folio'=> $folio,'resultado'=>1);
			}
		}
		$json_string = json_encode($clientes);
		echo $json_string;
		
	}

?>