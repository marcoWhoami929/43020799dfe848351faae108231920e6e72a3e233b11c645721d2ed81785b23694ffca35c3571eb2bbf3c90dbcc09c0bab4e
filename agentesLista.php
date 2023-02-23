<?php 
	
	$cod = $_GET['_num1'];

	if (!empty($cod)) {
		 comprobar($cod);
	}

	function comprobar($cod){
		include("modelos/conexion-api-server-pinturas.modelo.php");


	$agente =  "SELECT CIDAGENTE,CCODIGOAGENTE,CNOMBREAGENTE FROM [adDEKKERLAB].[dbo].[admAgentes] WHERE CIDAGENTE != 0 and CTIPOAGENTE = 1 and CCODIGOAGENTE = '".$cod."'";


	$ejecutar = sqlsrv_query($conne, $agente);
	$i = 0;

	if (sqlsrv_has_rows($ejecutar) === false) {
		echo null;
	} else {
		while ($value = sqlsrv_fetch_array($ejecutar)) {

			$agentes[$i] = array(
				"nombreAgente" => $value["CNOMBREAGENTE"],
				"resultado" => 1
			);
			$i++;
		}
		echo json_encode($agentes);
	}


	
	}
