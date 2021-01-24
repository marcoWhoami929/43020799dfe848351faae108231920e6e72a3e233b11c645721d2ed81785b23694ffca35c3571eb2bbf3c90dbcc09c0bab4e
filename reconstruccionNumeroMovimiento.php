<?php
/*************************************************************
RECONSTRUCCION DE INDICE DE NUMERO DE MOVIMIENTO
**************************************************************
ALGORITMO
***************************************************************
1.-> Reordenar numero de movimiento
2.-> Obtener el ultimo numero de movimiento del deposito
***************************************************************/
ini_set('max_execution_time', 0);
set_time_limit(1800);
ini_set('memory_limit', '-1');
error_reporting(E_ALL);
require_once('db_connect.php');

if (isset($_POST["reconstruccion"])) {

				$bancoElegido = $_POST["banco"];

				$consulta = "SELECT id,descripcion,numeroMovimiento FROM $bancoElegido";
                $banco = mysqli_query($conn, $consulta) or die("database_error:".mysqli_error($conn));
	               
                function mysql_fetch_all($banco) {
				   while($row=mysqli_fetch_array($banco)) {
				       $return[] = $row;
				   }
				   return $return;
				}

				$filasBanco = mysql_fetch_all($banco);

	              
                	for ($i=0;$i < count($filasBanco);$i++) {


                		$punteroActual = $i;
                		$punteroSiguiente = $i+1;
                		$punteroAnterior = $i-1;
          
						 $descripcion = $filasBanco[$i]["descripcion"];

						 $searchDeposito = strpos($descripcion,"DEPOSITO EN EFECTIVO/0");
						 $searchDepositoError = strpos($descripcion,"00000PAGO");

						 //var_dump($searchDeposito);
						 $identificador = $filasBanco[$punteroActual]["id"];
						 if ($searchDeposito === false) {

						 		if (isset($filasBanco[$punteroAnterior]["id"])) {

						 			$identificadorAnterior = $filasBanco[$punteroAnterior]["id"];
						 			
						 			
						 			$consulta = mysqli_query($conn,"SELECT numeroMovimiento FROM $bancoElegido WHERE id = $identificadorAnterior");
			 			 			$consulta = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
			 			 			
		                			
		                			$movimiento = $consulta['numeroMovimiento']+=1;
		                			

		                		}else{

		                			$movimiento = 100103;
		                		
		                		}

		                	

		                		
						 }else{

						 		if ($searchDepositoError === false) {

						 			if (isset($filasBanco[$punteroAnterior]["id"])) {
                			
		                		
		                			$descripcion = explode('/',$filasBanco[$punteroActual]["descripcion"]);
		                			
		                			$movimiento = substr($descripcion[1],1, -1);

		                		}else{

		                			$movimiento = 100103;
		                		}

		                		

						 			
						 		}else{


						 			if (isset($filasBanco[$punteroAnterior]["id"])) {

						 			$identificadorAnterior = $filasBanco[$punteroAnterior]["id"];
						 			
						 			
						 			$consulta = mysqli_query($conn,"SELECT numeroMovimiento FROM $bancoElegido WHERE id = $identificadorAnterior");
			 			 			$consulta = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
			 			 			
		                			
		                			$movimiento = $consulta['numeroMovimiento']+=1;
		                			

		                		}else{

		                			$movimiento = 100103;
		                		
		                		}



						 		}
						 		
						 		
		                		

						 }
						
						 $actualizarFila = "UPDATE $bancoElegido set numeroMovimiento = '".$movimiento."' where id = '".$identificador."'";
					      mysqli_query($conn, $actualizarFila);
						
						 //$codigo = (empty($consulta['numeroMovimiento']) ? 100103 : $consulta['numeroMovimiento']+=1);


                		
		                	
                	}
                				
                			

	
}else {

echo 'No existe';

}
header("Location:$bancoElegido");

?>