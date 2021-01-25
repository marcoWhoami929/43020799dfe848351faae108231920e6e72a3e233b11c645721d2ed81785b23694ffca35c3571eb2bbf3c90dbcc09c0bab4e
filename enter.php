<?php 
	
	$cod = $_GET['_num1'];

	if (!empty($cod)) {
		 comprobar($cod);
	}

	function comprobar($cod){
		$con = mysqli_connect('127.0.0.1','mat','matriz');
		mysqli_select_db($con,'matriz');
		mysqli_set_charset($con, "utf8"); //formato de datos utf8

		$sql = mysqli_query($con,"SELECT * FROM clientes WHERE codigoCliente = '".$cod."'");
		$clientes = array();
		$contar = mysqli_num_rows($sql);
		if ($contar == 0) {
			$clientes[] = array('codigoCliente'=> 'y', 'nombreCliente' => 'El cliente no existe', 'rfc' => 'El cliente no existe','domicilioFiscal' => 'El cliente no existe', 'agenteVentas' => 'El cliente no existe', 'resultado' => 0);
		}else{
			while ($row = mysqli_fetch_row($sql)) {
			    $codigoCliente = $row[1];
			    $rfc = $row[3];
			    $nombreCliente = $row[4];
			    $domicilioFiscal = $row[19];
			    $agenteVentas = $row[5];
			    $diasCredito = $row[8];
			    $descuentoMovimiento = $row[16];
			    $codigoAgente = $row[22];

			    $clientes[] = array('nombreCliente'=> $nombreCliente,  'rfc'=>$rfc, 'domicilioFiscal' => $domicilioFiscal, 'agenteVentas' => $agenteVentas, 'diasCredito' => $diasCredito, 'descuentoMovimiento' => $descuentoMovimiento, 'codigoAgente' => $codigoAgente, 'resultado'=>1);
			}
		}
		$json_string = json_encode($clientes);
		echo $json_string;
	}

?>