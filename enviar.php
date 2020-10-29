<?php 
	
	require("db_connect.php");
	if (isset($_GET["iden"])) {
		$departamento = $_GET["departamento"];
		$grupo = $_GET["grupo"];
		$subgrupo = $_GET["subgrupo"];
		$acreedor = $_GET["acreedor"];
		$concepto = $_GET["concepto"];
		$numeroDocumento = $_GET["numeroDocumento"];
		$iden = $_GET["iden"];
        $tieneIva = $_GET["tieneIva"];
		$banco = $_GET["banco"];
		
		switch ($banco) {
			case "banco6278":

				$consulta = "SELECT iden from banco6278 WHERE iden = '".$_GET["iden"]."'";
				$resultado = mysqli_query($conn,$consulta);
				if (mysqli_num_rows($resultado)) {

					$actualizar = "UPDATE banco6278 set departamento = '".$departamento."', grupo = '".$grupo."', subgrupo = '".$subgrupo."', acreedor = '".$acreedor."', concepto = '".$concepto."', numeroDocumento = '".$numeroDocumento."', tieneIva = '".$tieneIva."' where iden = '".$_GET["iden"]."'";
					mysqli_query($conn, $actualizar);
					
				}
				
			break;
			case "banco3450":

				$consulta = "SELECT iden from banco3450 WHERE iden = '".$_GET["iden"]."'";
				$resultado = mysqli_query($conn,$consulta);
				if (mysqli_num_rows($resultado)) {

					$actualizar = "UPDATE banco3450 set departamento = '".$departamento."', grupo = '".$grupo."', subgrupo = '".$subgrupo."', acreedor = '".$acreedor."', concepto = '".$concepto."', numeroDocumento = '".$numeroDocumento."', tieneIva = '".$tieneIva."' where iden = '".$_GET["iden"]."'";
					mysqli_query($conn, $actualizar);
					
				}
				
			break;
			case "banco0198":

				$consulta = "SELECT iden from banco0198 WHERE iden = '".$_GET["iden"]."'";
				$resultado = mysqli_query($conn,$consulta);
				if (mysqli_num_rows($resultado)) {

					$actualizar = "UPDATE banco0198 set departamento = '".$departamento."', grupo = '".$grupo."', subgrupo = '".$subgrupo."', acreedor = '".$acreedor."', concepto = '".$concepto."', numeroDocumento = '".$numeroDocumento."', tieneIva = '".$tieneIva."' where iden = '".$_GET["iden"]."'";
					mysqli_query($conn, $actualizar);
					
				}
				
			break;
			case "banco1286":

				$consulta = "SELECT iden from banco1286 WHERE iden = '".$_GET["iden"]."'";
				$resultado = mysqli_query($conn,$consulta);
				if (mysqli_num_rows($resultado)) {

					$actualizar = "UPDATE banco1286 set departamento = '".$departamento."', grupo = '".$grupo."', subgrupo = '".$subgrupo."', acreedor = '".$acreedor."', concepto = '".$concepto."', numeroDocumento = '".$numeroDocumento."', tieneIva = '".$tieneIva."' where iden = '".$_GET["iden"]."'";
					mysqli_query($conn, $actualizar);
					
				}
				
			break;
			case "banco1219":

				$consulta = "SELECT iden from banco1219 WHERE iden = '".$_GET["iden"]."'";
				$resultado = mysqli_query($conn,$consulta);
				if (mysqli_num_rows($resultado)) {

					$actualizar = "UPDATE banco1219 set departamento = '".$departamento."', grupo = '".$grupo."', subgrupo = '".$subgrupo."', acreedor = '".$acreedor."', concepto = '".$concepto."', numeroDocumento = '".$numeroDocumento."', tieneIva = '".$tieneIva."' where iden = '".$_GET["iden"]."'";
					mysqli_query($conn, $actualizar);
					
				}
				
			break;
			case "banco0840":

				$consulta = "SELECT iden from banco0840 WHERE iden = '".$_GET["iden"]."'";
				$resultado = mysqli_query($conn,$consulta);
				if (mysqli_num_rows($resultado)) {

					$actualizar = "UPDATE banco0840 set departamento = '".$departamento."', grupo = '".$grupo."', subgrupo = '".$subgrupo."', acreedor = '".$acreedor."', concepto = '".$concepto."', numeroDocumento = '".$numeroDocumento."', tieneIva = '".$tieneIva."' where iden = '".$_GET["iden"]."'";
					mysqli_query($conn, $actualizar);
					
				}
				
			break;
			case "banco1340":

				$consulta = "SELECT iden from banco1340 WHERE iden = '".$_GET["iden"]."'";
				$resultado = mysqli_query($conn,$consulta);
				if (mysqli_num_rows($resultado)) {

					$actualizar = "UPDATE banco1340 set departamento = '".$departamento."', grupo = '".$grupo."', subgrupo = '".$subgrupo."', acreedor = '".$acreedor."', concepto = '".$concepto."', numeroDocumento = '".$numeroDocumento."', tieneIva = '".$tieneIva."' where iden = '".$_GET["iden"]."'";
					mysqli_query($conn, $actualizar);
					
				}
				
			break;
			default:
				// code...
				break;
		}

	}

?>