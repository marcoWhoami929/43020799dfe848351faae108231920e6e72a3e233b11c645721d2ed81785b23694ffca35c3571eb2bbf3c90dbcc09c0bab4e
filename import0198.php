<?php
	ini_set('max_execution_time', 0);
	set_time_limit(1800);
	ini_set('memory_limit', '-1');
	include_once("db_connect.php");
	if(isset($_POST['import_data'])){
	// validate to check uploaded file is a valid csv file
	$file_mimes = array(
		'text/x-comma-separated-values',
		'text/comma-separated-values', 
		'application/octet-stream', 
		'application/vnd.ms-excel', 
		'application/x-csv', 
		'text/x-csv', 
		'text/csv', 
		'application/csv', 
		'application/excel', 
		'application/vnd.msexcel'
	);
		if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
		if(is_uploaded_file($_FILES['file']['tmp_name'])){

			/*
			$mysql = new mysqli($servername, $username, $password, $dbname);

			$ultimoMovimiento = $mysql->query('SELECT * FROM banco0198 ORDER BY id DESC LIMIT 1');

			$numeroMovimiento = 2500;
			if ($ultimoMovimiento->num_rows === 0) {
				
				$numeroMovimiento .= '-1';

			}else {

				$ultimoMovimiento = $ultimoMovimiento->fetch_assoc();

				$ultimoIdMovimiento = $ultimoMovimiento['numeroMovimiento'];

				$ultimoIdMovimiento = (int) $ultimoIdMovimiento[1] ++;

				$numeroMovimiento .= '-' . $ultimoIdMovimiento;

			}
			*/
		

			$csv_file = fopen($_FILES['file']['tmp_name'], 'r');
			//fgetcsv($csv_file);
			// get data records from csv file
				while(($emp_record = fgetcsv($csv_file,1000, ",")) !== FALSE){
				
				$sql_query = "SELECT id, fecha, descripcion, cargo, abono, saldo FROM banco0198 WHERE iden = '".$emp_record[6]."'";
				$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
				
					if(mysqli_num_rows($resultset)) {


						foreach ($resultset as $key => $value) {

							$busqueda = $value['descripcion'];
							
							$ivaTransaccion = preg_match("/IVA TRANSACCION EXITOSA/i", $busqueda);
							$cuotaTransaccion = preg_match("/CUOTA TRANSACCION EXITOSA/i", $busqueda);
							$comisionVentasDebito = preg_match("/COMISION VENTAS DEBITO/i", $busqueda);
							$comisionVentasCredito = preg_match("/COMISION VENTAS CREDITO/i", $busqueda);
							$ivaComVentas = preg_match("/IVA COM. VENTAS DEBITO/i", $busqueda);
							$ivaComVentasCredito = preg_match("/IVA COM. VENTAS CREDITO/i", $busqueda);

						if ($cuotaTransaccion == true || $comisionVentasDebito == true || $comisionVentasCredito == true) {

							 
							  $busquedaFecha = $value['fecha'];
							  setlocale(LC_TIME, 'es_MX.UTF-8');
			                  $numero = substr($busquedaFecha,-7,2);
							  $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 
			                  

							 	$sql_update = "UPDATE banco0198 set mes = '".strtoupper($mes)."', fecha='".$emp_record[0]."', descripcion='".$emp_record[1]."', cargo='".str_replace(',','',$emp_record[2])."', abono='".str_replace(',','',$emp_record[3])."', saldo = '".str_replace(',','',$emp_record[4])."', grupo = 'EGRESOS', subgrupo = '07. Gastos Financieros  Comisiones Bancarias', acreedor = 'BBVA BANCOMER SA', concepto = 'COMISIONES BANCARIAS' WHERE iden='".$emp_record[6]."'";
							mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));

						
							
						}else if ($ivaTransaccion == true || $ivaComVentas == true || $ivaComVentasCredito == true) {

							$busquedaFecha = $value['fecha'];
							  setlocale(LC_TIME, 'es_MX.UTF-8');
			                  $numero = substr($busquedaFecha,-7,2);
							  $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 

							$sql_update2 = "UPDATE banco0198 set mes = '".strtoupper($mes)."', fecha='".$emp_record[0]."', descripcion='".$emp_record[1]."', cargo='".str_replace(',','',$emp_record[2])."', abono='".str_replace(',','',$emp_record[3])."', saldo = '".str_replace(',','',$emp_record[4])."', grupo = 'EGRESOS', subgrupo = 'I.V.A Acreditable', acreedor = 'BBVA BANCOMER SA', concepto = 'COMISIONES BANCARIAS' WHERE iden='".$emp_record[6]."'";
							mysqli_query($conn, $sql_update2) or die("database error:". mysqli_error($conn));
							
						}else {
						
							$busquedaFecha = $value['fecha'];
							  setlocale(LC_TIME, 'es_MX.UTF-8');
			                  $numero = substr($busquedaFecha,-7,2);
							  $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 


							$sql_update3 = "UPDATE banco0198 set mes = '".strtoupper($mes)."', fecha='".$emp_record[0]."', descripcion='".$emp_record[1]."', cargo='".str_replace(',','',$emp_record[2])."', abono='".str_replace(',','',$emp_record[3])."', saldo = '".str_replace(',','',$emp_record[4])."' WHERE iden='".$emp_record[6]."'";
							mysqli_query($conn, $sql_update3) or die("database error:". mysqli_error($conn));

						}

					}


					} else{

						$ivaTransaccion = preg_match('/IVA TRANSACCION EXITOSA/i', $emp_record[1]);
						$cuotaTransaccion = preg_match('/CUOTA TRANSACCION EXITOSA/i', $emp_record[1]);
						$comisionVentasDebito = preg_match('/COMISION VENTAS DEBITO/i', $emp_record[1]);
						$comisionVentasCredito = preg_match('/COMISION VENTAS CREDITO/i', $emp_record[1]);
						$ivaComVentas = preg_match('/IVA COM. VENTAS DEBITO/i', $emp_record[1]);
						$ivaComVentasCredito = preg_match("/IVA COM. VENTAS CREDITO/i", $emp_record[1]);

						if ( $cuotaTransaccion == true || $comisionVentasDebito == true || $comisionVentasCredito == true) {

							 $consulta = mysqli_query($conn,'SELECT MAX(numeroMovimiento) as numeroMovimiento FROM banco0198 LIMIT 1');
				 			 $consulta = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
				 			
							 // Si el codigo actual esta vacio o es 0, se convierte en 1.
							 // En caso contrario se le suma +1.
							 $codigo = (empty($consulta['numeroMovimiento']) ? 180434 : $consulta['numeroMovimiento']+=1);

							  setlocale(LC_TIME, 'es_MX.UTF-8');
							  $busquedaFecha = $emp_record[0];
			                  $numero = substr($busquedaFecha,-7,2);
			                  $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 
			                  $mesFinal = strtoupper($mes);

							$mysql_insert = "INSERT INTO banco0198 (mes,fecha,descripcion,cargo,abono,saldo,ultimoSaldo,iden,tieneIva, tieneRetenciones, numeroMovimiento,grupo,subgrupo,acreedor,concepto)VALUES('".$mesFinal."','".$emp_record[0]."','".$emp_record[1]."','".str_replace(',','',$emp_record[2])."','".str_replace(',','',$emp_record[3])."','".str_replace(',','',$emp_record[4])."','".str_replace(',','',$emp_record[5])."','".$emp_record[6]."','No',0,'".$codigo."','EGRESOS','07. Gastos Financieros  Comisiones Bancarias','BBVA BANCOMER SA','COMISIONES BANCARIAS')";


							mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));

							
						}else if ($ivaTransaccion == true || $ivaComVentas == true || $ivaComVentasCredito == true) {

							 $consulta = mysqli_query($conn,'SELECT MAX(numeroMovimiento) as numeroMovimiento FROM banco0198 LIMIT 1');
				 			 $consulta = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
				 			
							 // Si el codigo actual esta vacio o es 0, se convierte en 1.
							 // En caso contrario se le suma +1.
							 $codigo = (empty($consulta['numeroMovimiento']) ? 180434 : $consulta['numeroMovimiento']+=1);

							 setlocale(LC_TIME, 'es_MX.UTF-8');
							  $busquedaFecha = $emp_record[0];
			                  $numero = substr($busquedaFecha,-7,2);
			                  $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 
			                  $mesFinal = strtoupper($mes);

							$mysql_insert2 = "INSERT INTO banco0198 (mes,fecha,descripcion,cargo,abono,saldo,ultimoSaldo,iden,tieneIva, tieneRetenciones, numeroMovimiento,grupo,subgrupo,acreedor,concepto)VALUES('".$mesFinal."','".$emp_record[0]."','".$emp_record[1]."','".str_replace(',','',$emp_record[2])."','".str_replace(',','',$emp_record[3])."','".str_replace(',','',$emp_record[4])."','".str_replace(',','',$emp_record[5])."','".$emp_record[6]."','No',0,'".$codigo."','EGRESOS','I.V.A Acreditable','BBVA BANCOMER SA','COMISIONES BANCARIAS')";


							mysqli_query($conn, $mysql_insert2) or die("database error:". mysqli_error($conn));
							
						}else {

						 $consulta = mysqli_query($conn,'SELECT MAX(numeroMovimiento) as numeroMovimiento FROM banco0198 LIMIT 1');
			 			 $consulta = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
			 			
						 // Si el codigo actual esta vacio o es 0, se convierte en 1.
						 // En caso contrario se le suma +1.
						 $codigo = (empty($consulta['numeroMovimiento']) ? 180434 : $consulta['numeroMovimiento']+=1);

						 setlocale(LC_TIME, 'es_MX.UTF-8');
						 $busquedaFecha = $emp_record[0];
			             $numero = substr($busquedaFecha,-7,2);
			             $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 
			             $mesFinal = strtoupper($mes);


						$mysql_insert3 = "INSERT INTO banco0198 (mes,fecha,descripcion,cargo,abono,saldo,ultimoSaldo,iden,tieneIva, tieneRetenciones, numeroMovimiento)VALUES('".$mesFinal."','".$emp_record[0]."','".$emp_record[1]."','".str_replace(',','',$emp_record[2])."','".str_replace(',','',$emp_record[3])."','".str_replace(',','',$emp_record[4])."','".str_replace(',','',$emp_record[5])."','".$emp_record[6]."','No',0,'".$codigo."')";


						mysqli_query($conn, $mysql_insert3) or die("database error:". mysqli_error($conn));

						

						}

					}
				}
		fclose($csv_file);
		$import_status = '?import_status=success';
		} else {
		$import_status = '?import_status=error';
		}
		} else {
		$import_status = '?import_status=invalid_file';
		}
	}
	header("Location: banco0198".$import_status);
?>