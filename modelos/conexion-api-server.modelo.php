<?php

	$serverName = "192.168.1.222";
	$connectionInfo = array("Database"=>"adNEURAL_CODE", "UID"=>"sa", "PWD"=>"Whoami92","CharacterSet"=>"UTF-8");

	$conn = sqlsrv_connect($serverName,$connectionInfo);

	if ($conn) {
		
		//echo "<p style='color:white'>CONEXION EXITOSA CON EL SERVIDOR CONTPAQ i&#174; COMERCIAL</p>";

	}else{

		//echo "<p style='color:white'>FALLO LA CONEXIÓN CON EL SERVIDOR CONTPAQ i&#174; COMERCIAL</p>";
		die(print_r(sqlsrv_errors(),true));

	}



?>