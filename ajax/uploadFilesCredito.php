<?php
	
	$ruta = $_POST["ficheroRuta"];
	$fichero = $_FILES["archivoCargado"];


	$carga = move_uploaded_file($fichero["tmp_name"], "../archivosCredito/".$ruta."/".$fichero["name"]);

		if ($carga ===  true) {
			
			$exito = "true";
		}else{
			$exito = "false";
		}
		
		echo json_encode($exito);

?>