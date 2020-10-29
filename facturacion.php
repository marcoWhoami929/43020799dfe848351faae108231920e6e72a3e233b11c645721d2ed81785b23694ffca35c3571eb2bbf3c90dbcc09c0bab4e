<?php 
	
	$cod = $_GET['_num1'];

	if (!empty($cod)) {
		 comprobar($cod);
	}

	function comprobar($cod){
		$con = mysqli_connect('localhost','root','');
		mysqli_select_db($con,'matriz');

		$sql = mysqli_query($con,"SELECT * FROM atencionaclientes WHERE folio = '".$cod."'");
		$clientes = array();
		$contar = mysqli_num_rows($sql);
		if ($contar == 0) {
			$clientes[] = array('folio'=> '', 'importe' => '', 'ordenCompra' => '', 'statusCliente' => '','resultado' => 0);
		}else{
			while ($row = mysqli_fetch_row($sql)) {
			    $folio = $row[10];
			    $importe= $row[19];
			    $statusCliente = $row[8];
			    $ordenCompra = $row[16];
			    

			    $clientes[] = array('folio' => $folio, 'importeInicial' => $importe, 'statusCliente'=> $statusCliente, 'ordenCompra' => $ordenCompra, 'resultado'=>1);
			}
		}
		$json_string = json_encode($clientes);
		echo $json_string;
	}

?>