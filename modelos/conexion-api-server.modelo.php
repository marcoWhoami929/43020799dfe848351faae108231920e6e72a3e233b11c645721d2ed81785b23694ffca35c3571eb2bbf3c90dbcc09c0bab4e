<?php
	
	/*
	$serverName = "192.168.1.250";
	$connectionInfo = array("Database"=>"adPINTURAS2020SADEC", "UID"=>"sa", "PWD"=>"M78o03e09p56*","CharacterSet"=>"UTF-8");
	*/
	$serverName = "192.168.1.222";
	//$serverName = "192.168.1.123";
	//$serverName = "192.168.100.22";
	$connectionInfo = array("Database"=>"adNEURAL_CODE", "UID"=>"sa", "PWD"=>"Whoami92","CharacterSet"=>"UTF-8");

	$conne = sqlsrv_connect($serverName,$connectionInfo);

	if ($conne) {
		
		//echo "<p style='color:white'>CONEXION EXITOSA CON EL SERVIDOR CONTPAQ i&#174; COMERCIAL</p>";

	}else{

		//echo "<p style='color:white'>FALLO LA CONEXIÓN CON EL SERVIDOR CONTPAQ i&#174; COMERCIAL</p>";
		die(print_r(sqlsrv_errors(),true));

	}



?>