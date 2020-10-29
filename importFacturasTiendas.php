<?php
error_reporting(0);
	session_start();
	include_once("db_connect.php");
	require_once "controladores/facturacionTiendas.controlador.php";
	require_once "modelos/facturacionTiendas.modelo.php";
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

			$csv_file = fopen($_FILES['file']['tmp_name'], 'r');
			//fgetcsv($csv_file);
			// get data records from csv file
				while(($emp_record = fgetcsv($csv_file,10000, ",")) !== FALSE){

					if ($emp_record[1] != "FATR") {
							
						$sql_query = "SELECT * FROM facturastiendas WHERE serie = '".$emp_record[1]."' and folio = '".str_replace(',','',$emp_record[2])."'";
						$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
						
							if(mysqli_num_rows($resultset)) {

							$concepto = $emp_record[3];
							
							$fecha = $emp_record[0];

						$fecha = str_replace('/','-',$fecha);

						$separacionFecha = explode('-',$fecha);

						$diaFecha = $separacionFecha[0];
					
						$mesFecha = $separacionFecha[1];
						

						switch (STRTOLOWER($mesFecha)) {
							case '01':
								$mes = '01';
								break;
							case '02':
								$mes = '02';
								break;
							case '03':
								$mes = '03';
								break;
							case '04':
								$mes = '04';
								break;
							case '05':
								$mes = '05';
								break;
							case '06':
								$mes = '06';
								break;
							case '07':
								$mes = '07';
								break;
							case '08':
								$mes = '08';
								break;
							case '09':
								$mes = '09';
								break;
							case '10':
								$mes = '10';
								break;
							case '11':
								$mes = '11';
								break;	
							case '12':
								$mes = '12';
								break;
							default:
								
								break;
						}
						$añoFecha = $separacionFecha[2];

						$fechaFactura = $añoFecha."/".$mes."/".$diaFecha;

						$fechaF = str_replace('/', '-', $fechaFactura);

						$fechaFacturaFinal = date('Y-m-d', strtotime($fechaF));

							$serie = $emp_record[1];

							$folio = str_replace(',','',$emp_record[2]);
			
							$item = 'nombreCliente';
							$valor = trim($emp_record[4]);
							$buscarCliente = ControladorFacturasTiendas::ctrMostrarDatosClienteFacturas($item,$valor);

							$rfc = $buscarCliente[0]["rfc"];

							$codigoCliente = $buscarCliente[0]["codigoCliente"];

							$diasCredito = $buscarCliente[0]["diasCredito"];

							if($diasCredito ==  NULL){

								$diasCredito = 0;

							}

							$nombreCliente = trim($emp_record[4]);

							$fechaVencimiento = date('Y-m-d', strtotime($fechaF."+ ".$diasCredito." days"));


							$neto = (str_replace(',','',$emp_record[7]) / 1.16);

							$descuento = '0';

							$impuesto = ($neto * 16/100);

							$total = str_replace(',','',$emp_record[7]);

							$pendiente =  str_replace(',','',$emp_record[7]);
							$pagado = 0;

							$fechaCobro = $fechaFacturaFinal;

							$formaPago = trim($emp_record[5]);

							$sucursal = str_replace('Sucursal ','',$_SESSION["nombre"]);

							$estatus = 'Vigente';

							$formaPago = trim($emp_record[5]);
								
							$actualizarFacturas = "UPDATE facturastiendas set  concepto = '".$concepto."',fechaFactura = '".$fechaFacturaFinal."', codigoCliente = '".$codigoCliente."', rfc = '".$rfc."', nombreCliente = '".$nombreCliente."', fechaVencimiento = '".$fechaFacturaFinal."', diasCredito = '".$diasCredito."', cancelado = '0', neto = '".str_replace(',','',$neto)."', descuento = '".str_replace(',','',$descuento)."', impuesto = '".str_replace(',','',$impuesto)."', total = '".str_replace(',','',$total)."', agente = '".$sucursal."', estatus = '".$estatus."', formaPago = '".strtoupper($formaPago)."'  WHERE serie = '".$serie."' and folio = '".$folio."'";
							mysqli_query($conn, $actualizarFacturas) or die("database error:". mysqli_error($conn));
							
							

							} else{

							$concepto = $emp_record[3];
							
							$fecha = $emp_record[0];

						$fecha = str_replace('/','-',$fecha);

						$separacionFecha = explode('-',$fecha);

						$diaFecha = $separacionFecha[0];
					
						$mesFecha = $separacionFecha[1];
						

						switch (STRTOLOWER($mesFecha)) {
							case '01':
								$mes = '01';
								break;
							case '02':
								$mes = '02';
								break;
							case '03':
								$mes = '03';
								break;
							case '04':
								$mes = '04';
								break;
							case '05':
								$mes = '05';
								break;
							case '06':
								$mes = '06';
								break;
							case '07':
								$mes = '07';
								break;
							case '08':
								$mes = '08';
								break;
							case '09':
								$mes = '09';
								break;
							case '10':
								$mes = '10';
								break;
							case '11':
								$mes = '11';
								break;	
							case '12':
								$mes = '12';
								break;
							default:
								
								break;
						}
						$añoFecha = $separacionFecha[2];

						$fechaFactura = $añoFecha."/".$mes."/".$diaFecha;

						$fechaF = str_replace('/', '-', $fechaFactura);

						$fechaFacturaFinal = date('Y-m-d', strtotime($fechaF));

							$serie = $emp_record[1];

							$folio = str_replace(',','',$emp_record[2]);
			
							$item = 'nombreCliente';
							$valor = trim($emp_record[4]);
							$buscarCliente = ControladorFacturasTiendas::ctrMostrarDatosClienteFacturas($item,$valor);

							$rfc = $buscarCliente[0]["rfc"];

							$codigoCliente = $buscarCliente[0]["codigoCliente"];

							$diasCredito = $buscarCliente[0]["diasCredito"];

							if($diasCredito ==  NULL){

								$diasCredito = 0;

							}

							$nombreCliente = trim($emp_record[4]);

							$fechaVencimiento = date('Y-m-d', strtotime($fechaF."+ ".$diasCredito." days"));

							$neto = (str_replace(',','',$emp_record[7]) / 1.16);

							$descuento = '0';

							$impuesto = ($neto * 16/100);

							$total = str_replace(',','',$emp_record[7]);

							$pendiente =  str_replace(',','',$emp_record[7]);

							$pagado = 0;

							$fechaCobro = $fechaFacturaFinal;

							$formaPago = trim($emp_record[5]);

							$sucursal = str_replace('Sucursal ','',$_SESSION["nombre"]);

							$estatus = 'Vigente';
							
							$insertarFacturas = "INSERT INTO facturastiendas(concepto,fechaFactura,serie,folio,codigoCliente,rfc,nombreCliente,fechaVencimiento,diasCredito,cancelado,neto,descuento,impuesto,total,pendiente,pagado,fechaCobro,formaPago,agente,estatus) VALUES('".$concepto."','".$fechaFacturaFinal."','".$serie."','".$folio."','".$codigoCliente."','".$rfc."','".$nombreCliente."','".$fechaVencimiento."','".$diasCredito."','0','".str_replace(',','',$neto)."','".str_replace(',','',$descuento)."','".str_replace(',','',$impuesto)."','".str_replace(',','',$total)."','".str_replace(',','',$pendiente)."','".str_replace(',','',$pagado)."','".$fechaCobro."','".strtoupper($formaPago)."','".$sucursal."','".$estatus."')";
							mysqli_query($conn, $insertarFacturas) or die("database error:". mysqli_error($conn));
							

							}


					}else{

					$sql_query = "SELECT * FROM facturastiendas WHERE serie = '".$emp_record[1]."' and folio = '".str_replace(',','',$emp_record[2])."'";
					$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
					
						if(mysqli_num_rows($resultset)) {

						$concepto = $emp_record[3];
						
						$fecha = $emp_record[0];

						$fecha = str_replace('/','-',$fecha);

						$separacionFecha = explode('-',$fecha);

						$diaFecha = $separacionFecha[0];
					
						$mesFecha = $separacionFecha[1];
						

						switch (STRTOLOWER($mesFecha)) {
							case '01':
								$mes = '01';
								break;
							case '02':
								$mes = '02';
								break;
							case '03':
								$mes = '03';
								break;
							case '04':
								$mes = '04';
								break;
							case '05':
								$mes = '05';
								break;
							case '06':
								$mes = '06';
								break;
							case '07':
								$mes = '07';
								break;
							case '08':
								$mes = '08';
								break;
							case '09':
								$mes = '09';
								break;
							case '10':
								$mes = '10';
								break;
							case '11':
								$mes = '11';
								break;	
							case '12':
								$mes = '12';
								break;
							default:
								
								break;
						}
						$añoFecha = $separacionFecha[2];

						$fechaFactura = $añoFecha."/".$mes."/".$diaFecha;

						$fechaF = str_replace('/', '-', $fechaFactura);

						$fechaFacturaFinal = date('Y-m-d', strtotime($fechaF));

						$serie = $emp_record[1];

						$folio = str_replace(',','',$emp_record[2]);
		
						$item = 'nombreCliente';
						$valor = trim($emp_record[4]);
						$buscarCliente = ControladorFacturasTiendas::ctrMostrarDatosClienteFacturas($item,$valor);

						$rfc = $buscarCliente[0]["rfc"];

						$codigoCliente = $buscarCliente[0]["codigoCliente"];

						$diasCredito = $buscarCliente[0]["diasCredito"];

						if($diasCredito ==  NULL){

							$diasCredito = 0;

						}

						$nombreCliente = trim($emp_record[4]);

						$fechaVencimiento = date('Y-m-d', strtotime($fechaF."+ ".$diasCredito." days"));


						$neto = (str_replace(',','',$emp_record[7]) / 1.16);

						$descuento = '0';

						$impuesto = ($neto * 16/100);

						$total = str_replace(',','',$emp_record[7]);

						$pendiente =  str_replace(',','',$emp_record[7]);
						$pagado = 0;

						$fechaCobro = $fechaFacturaFinal;

						$formaPago = trim($emp_record[5]);

						$sucursal = str_replace('Sucursal ','',$_SESSION["nombre"]);

						$estatus = 'Vigente';

						$formaPago = trim($emp_record[5]);
							
						$actualizarFacturas = "UPDATE facturastiendas set  concepto = '".$concepto."',fechaFactura = '".$fechaFacturaFinal."', codigoCliente = '".$codigoCliente."', rfc = '".$rfc."', nombreCliente = '".$nombreCliente."', fechaVencimiento = '".$fechaFacturaFinal."', diasCredito = '".$diasCredito."', cancelado = '0', neto = '".str_replace(',','',$neto)."', descuento = '".str_replace(',','',$descuento)."', impuesto = '".str_replace(',','',$impuesto)."', total = '".str_replace(',','',$total)."', pendiente = '".str_replace(',','',$pendiente)."', agente = '".$sucursal."', estatus = '".$estatus."', formaPago = '".strtoupper($formaPago)."'  WHERE serie = '".$serie."' and folio = '".$folio."'";
						mysqli_query($conn, $actualizarFacturas) or die("database error:". mysqli_error($conn));
						
						

						} else{

						$concepto = $emp_record[3];
						
						$fecha = $emp_record[0];

						$fecha = str_replace('/','-',$fecha);

						$separacionFecha = explode('-',$fecha);

						$diaFecha = $separacionFecha[0];
					
						$mesFecha = $separacionFecha[1];
						

						switch (STRTOLOWER($mesFecha)) {
							case '01':
								$mes = '01';
								break;
							case '02':
								$mes = '02';
								break;
							case '03':
								$mes = '03';
								break;
							case '04':
								$mes = '04';
								break;
							case '05':
								$mes = '05';
								break;
							case '06':
								$mes = '06';
								break;
							case '07':
								$mes = '07';
								break;
							case '08':
								$mes = '08';
								break;
							case '09':
								$mes = '09';
								break;
							case '10':
								$mes = '10';
								break;
							case '11':
								$mes = '11';
								break;	
							case '12':
								$mes = '12';
								break;
							default:
								
								break;
						}
						$añoFecha = $separacionFecha[2];

						$fechaFactura = $añoFecha."/".$mes."/".$diaFecha;

						$fechaF = str_replace('/', '-', $fechaFactura);

						$fechaFacturaFinal = date('Y-m-d', strtotime($fechaF));

						$serie = $emp_record[1];

						$folio = str_replace(',','',$emp_record[2]);
		
						$item = 'nombreCliente';
						$valor = trim($emp_record[4]);
						$buscarCliente = ControladorFacturasTiendas::ctrMostrarDatosClienteFacturas($item,$valor);

						$rfc = $buscarCliente[0]["rfc"];

						$codigoCliente = $buscarCliente[0]["codigoCliente"];

						$diasCredito = $buscarCliente[0]["diasCredito"];

						if($diasCredito ==  NULL){

							$diasCredito = 0;

						}

						$nombreCliente = trim($emp_record[4]);

						$fechaVencimiento = date('Y-m-d', strtotime($fechaF."+ ".$diasCredito." days"));

						$neto = (str_replace(',','',$emp_record[7]) / 1.16);

						$descuento = '0';

						$impuesto = ($neto * 16/100);

						$total = str_replace(',','',$emp_record[7]);

						$pendiente =  str_replace(',','',$emp_record[7]);

						$pagado = 0;

						$fechaCobro = $fechaFacturaFinal;

						$formaPago = trim($emp_record[5]);

						$sucursal = str_replace('Sucursal ','',$_SESSION["nombre"]);

						$estatus = 'Vigente';
						
						$insertarFacturas = "INSERT INTO facturastiendas(concepto,fechaFactura,serie,folio,codigoCliente,rfc,nombreCliente,fechaVencimiento,diasCredito,cancelado,neto,descuento,impuesto,total,pendiente,pagado,fechaCobro,formaPago,agente,estatus) VALUES('".$concepto."','".$fechaFacturaFinal."','".$serie."','".$folio."','".$codigoCliente."','".$rfc."','".$nombreCliente."','".$fechaVencimiento."','".$diasCredito."','0','".str_replace(',','',$neto)."','".str_replace(',','',$descuento)."','".str_replace(',','',$impuesto)."','".str_replace(',','',$total)."','".str_replace(',','',$pendiente)."','".str_replace(',','',$pagado)."','".$fechaCobro."','".strtoupper($formaPago)."','".$sucursal."','".$estatus."')";
						mysqli_query($conn, $insertarFacturas) or die("database error:". mysqli_error($conn));
						

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
	header("Location: facturasTiendas".$import_status);
?>