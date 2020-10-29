<?php
/*************************************************************
RECALCULO DE CAJA
**************************************************************
ALGORITMO
***************************************************************
1.-> Reordenar por fechas la tabla de forma ascendente
2.-> Calcular saldos, ultimo saldo y comprobacion
3.-> Reasignar identificadores a los items
***************************************************************/
ini_set('max_execution_time', 0);
set_time_limit(1800);
ini_set('memory_limit', '-1');
error_reporting(E_ALL);
require_once('db_connect.php');

if (isset($_POST["actualizar"])) {

				
				$consulta = "SELECT * FROM caja";
                $lista = mysqli_query($conn, $consulta) or die("database_error:".mysqli_error($conn));
                
                $contador = 2;
                $contador2 = 1;
                $ultimoSaldo = '';


                	foreach ($lista as $value) {

                			
                			$fecha = $value['fecha'];
                			
							$fechaActual = str_replace('/', '-', $fecha);
							$fechaFinal = date('Y-m-d', strtotime($fechaActual));
		                	
		                	$count = $contador++;
		                	$count2 = $contador2++;

		                	$consulta2 = "SELECT cargo,abono FROM caja WHERE id < '".$count."' ORDER BY id DESC LIMIT 1";
                			$lista2 = mysqli_query($conn, $consulta2) or die("database_error:".mysqli_error($conn));

                			$consulta3 = "SELECT SUM(abono) FROM caja as abonos WHERE id < '".$count."' ";
                			$lista3 = mysqli_query($conn, $consulta3) or die("database_error:".mysqli_error($conn));

                			$abonos = mysqli_fetch_array($lista3);

                			$consulta4 = "SELECT SUM(cargo) FROM caja as cargos WHERE id < '".$count."' ";
                			$lista4 = mysqli_query($conn, $consulta4) or die("database_error:".mysqli_error($conn));

                			$cargos = mysqli_fetch_array($lista4);
                			


                			$saldoInicial = 19629.79;
			                
                			foreach ($lista2 as $value2) {
                				
                						
		                				$saldo = $saldoInicial + $abonos[0] - $cargos[0];
		                				
		                				
					                	$ultimoSaldo = $saldo - $value["abono"] + $value["cargo"];
					                	
					                	$comprobacion = $ultimoSaldo + $value["abono"] - $value["cargo"];
					                	
					                	$diferencia = $comprobacion - $saldo;
					                	


                					
                				
                			

                			}	
                			

                			$actualizarFila = "UPDATE caja set saldo = '".$saldo."', ultimoSaldo = '".$ultimoSaldo."', comprobacion = '".$comprobacion."', diferencia = '".$diferencia."' where id = '".$count2."'";
					                	mysqli_query($conn, $actualizarFila);

		                	$actualizarFecha = "UPDATE caja set fechaOriginal = '".$fechaFinal."' where id = '".$count2."'";
		                	mysqli_query($conn, $actualizarFecha) or die("database_error:".mysqli_error($conn));

		                	/*ACTUALIZACIÓN DEL NOMBRE DEL MES */
                			$fechaActualizada = $value['fecha'];
		                	setlocale(LC_TIME, 'es_MX.UTF-8');
					        $numero = substr($fechaActualizada,-7,2);

					        $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 

					        $actualizarMes = "UPDATE caja set mes = '".strtoupper($mes)."' where id = '".$count2."'";
							mysqli_query($conn, $actualizarMes) or die("database error:". mysqli_error($conn));

					        /*ACTUALIZACIÓN DEL NOMBRE DEL MES */
		                	
		                	
                			}
                			
                			
                			$permitirOrden = "ALTER TABLE caja ENGINE = myisam";
                			mysqli_query($conn, $permitirOrden) or die("database_error:".mysqli_error($conn));
                			$ordenarCaja = "ALTER TABLE caja ORDER BY fechaOriginal ASC";
		        			mysqli_query($conn, $ordenarCaja) or die("database_error:".mysqli_error($conn));
		        			$borrarIdentificador = "ALTER TABLE caja DROP id";
		        			mysqli_query($conn, $borrarIdentificador);
		        			$reiniciarId = "ALTER TABLE  caja ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
		        			mysqli_query($conn, $reiniciarId);


	
}else {

echo 'No existe';

}
header("Location:caja");

?>