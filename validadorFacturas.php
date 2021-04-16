<?php
ini_set('memory_limit', '-1');
include("controladores/validador.controlador.php");
include("modelos/validador.modelo.php");
echo "Iniciando Proceso porfavor espere.............";
$arregloMovimientos = array(
'35585',
'35593',
'35571',
'35574',
'35577',
'35582',
'35529',
'35551',
'35560',
'35476',
'35495',
'35424',
'35442',
'35447',
'35452',
'35453',
'35462',
'35369',
'35372',
'35401',
'35355',
'35277',
'35280',
'35305',
'35225',
'35261',
'35262',
'35263',
'35264',
'35265',
'35266',
'35212',
'35213',
'35214',
'35215',
'35216',
'35217',
'35218',
'35149',
'35152',
'35158',
'35159',
'35160',
'35161',
'35162',
'35185',
'35186',
'35189',
'35097',
'35100',
'35105',
'35112',
'35113',
'35114',
'35115',
'35116',
'35072',
'35073',
'35074',
'35083',
'35051',
'35054',
'35061',
'35062',
'35063',
'35019',
'35020',
'35021',
'35022',
'35024',
'35036',
'34960',
'34963',
'34973',
'34974',
'34975',
'34976',
'34982',
'34983',
'34984',
'34882',
'34885',
'34896',
'34897',
'34913',
'34845',
'34848',
'34855',
'34827',
'34791',
'34794',
'34803',
'34804',
'34805',
'34806',
'34807',
'34808',
'34812',
'34745',
'34753',
'34754',
'34755',
'34756',
'34757',
'34758',
'34766',
'34773',
'34687',
'34697',
'34700',
'34705',
'34706',
'34707',
'34708',
'34709',
'34710',
'34711',
'34725',
'34727',
'34652',
'34657',
'34661',
'34662',
'34663',
'34664',
'34665',
'34667',
'34634',
'34639',
'34640',
'34641',
'34642',
'34645',
'34582',
'34587',
'34589',
'34590',
'34591',
'34592',
'34593',
'34594',
'34604',
'34568',
'34539',
'34540',
'34541',
'34542',
'34543',
'34544',
'34545',
'34546',
'34547',
'34548',
'34549',
'34550',
'34551',
'34506',
'34513',
'34514',
'34515',
'34516'

);
/***GENERADOR DE BITACORA*******/
		$nombre_archivo = "logsCorreccion.txt"; 
		$time = time();
		if($archivo = fopen($nombre_archivo, "a"))
		{
			fwrite($archivo, "*********************************************************************************************". "\n");
				fwrite($archivo, "PROCESO DE INICIALIZACION DE MOVIMIENTOS". "\n");
				fwrite($archivo, "*********************************************************************************************". "\n");
				
				fwrite($archivo,"Comienza con este proceso afectando las tablas FACTURAS | ABONOS | DEPOSITOS BANCARIOS | BANCOS"."\n");
				fwrite($archivo,"elimina el abono aplicado,elimina el deposito aplicado,actualiza el estatus de la factura"."\n");
				fwrite($archivo,"y actualiza el movimiento bancario."."\n");
				fwrite($archivo, "---------------------------------------------------------------------------------------------". "\n");
				fwrite($archivo, "Para la realización de este proceso el usuario eligió las siguientes opciones:". "\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "Fecha Inicio:".date("d-m-Y (H:i:s)", $time)."\n");
				fwrite($archivo, "". "\n");
				fwrite($archivo, "**************DOCUMENTOS AFECTADOS CON EL PROCESO**************". "\n");
				fwrite($archivo, "". "\n");
				foreach ($arregloMovimientos as $key => $value) {
						$idMovimiento = $value;
						fwrite($archivo, "IDENTIFICADOR BANCARIO----------------------------------------------------------------------".$idMovimiento."". "\n");
						$obtenerMovimiento = ControladorValidador::ctrObtenerMovimiento($value);
						$facturas =  $obtenerMovimiento[0]["conceptoFacturas"];
						$idDeposito = $obtenerMovimiento[0]["id"];

						if ($idDeposito != 0) {
							/*
						ELIMINAR DEPOSITO
						 */

						$eliminarDeposito = ControladorValidador::ctrEliminarDeposito($idDeposito,$idMovimiento);
						if ($eliminarDeposito === 0) {
							fwrite($archivo, "No se pudo eliminar el depósito". "\n");
						}else{
							fwrite($archivo, "Depósito ".$idDeposito." eliminado correctamente". "\n");
						}
						

						$listaFactura  = explode(",",$facturas);

						for ($i=0; $i < count($listaFactura); $i++) { 
							$factura = explode(" ",$listaFactura[$i]);
							$serie = $factura[0];
							$folio = $factura[1];
							fwrite($archivo, "DOCUMENTOS AFECTADO----SERIE     ".$serie."     ".$folio."". "\n");
						
							/*
							BUSCAR DEPOSITO
							 */
							$obtenerAbono = ControladorValidador::ctrBuscarAbonoBancario($idMovimiento,$serie,$folio);
							$idAbono = $obtenerAbono[0]["id"];
							$totalAbono = $obtenerAbono[0]["totalAbono"];
							if ($idAbono != "") {

							/*
							ACTUALIZAR FACTURAS
							 */
							$buscarFactura = ControladorValidador::ctrBuscarPendienteFactura($serie,$folio);
							$total = $buscarFactura["total"];
							$abono = $totalAbono;
							$actualizarFacturas = ControladorValidador::ctrActualizarFacturas($serie,$folio,$abono,$total);
							if ($actualizarFacturas === 1) {
								
								fwrite($archivo, "Factura".$serie." ".$folio." actualizada correctamente.". "\n");
							}else{
								fwrite($archivo, "No se actualizaron los datos.". "\n");
							}


							/*
							ELIMINAR ABONO
							 */
							$eliminarAbono = ControladorValidador::ctrEliminarAbonoBancario($idMovimiento,$idAbono);
							if ($eliminarAbono === 0) {
							fwrite($archivo, "No se pudo eliminar el abono". "\n");
							}else{
								fwrite($archivo, "Abono ".$idAbono." eliminado correctamente". "\n");
							}
	
							}else{
								fwrite($archivo, "No existe el abono". "\n");

							}

							$buscarAbono = ControladorValidador::ctrBuscarAbonoPorDocumento($serie,$folio);
							if ($buscarAbono["existentes"] > 0) {
								fwrite($archivo, "La Factura".$serie." ".$folio." tiene ".$buscarAbono["existentes"]."". "\n");

								$buscarFactura = ControladorValidador::ctrBuscarPendienteFactura($serie,$folio);
								$pendiente = $buscarFactura["pendiente"];
								$total = $buscarFactura["total"];

								$buscarDetalleAbono = ControladorValidador::ctrBuscarDetalleAbono($serie,$folio);
								$totalAbono = $buscarDetalleAbono["totalAbono"];
								$idAbono = $buscarDetalleAbono["id"];

								$actualizarPendiente = ControladorValidador::ctrActualizarPendienteAbono($idAbono,$total,$totalAbono);

								$buscarDetalleAbono = ControladorValidador::ctrBuscarDetalleAbono($serie,$folio);

								$idAbonoPendiente = $buscarDetalleAbono["id"];

								if ($buscarDetalleAbono["maximo"] == $buscarDetalleAbono["numeroParcial"] && $buscarDetalleAbono["minimo"] == $buscarDetalleAbono["numeroParcial"] ) {
										
										switch ($buscarDetalleAbono["numeroParcial"]) {
											case '1':
												$numeroParcial = 1;
												break;
											case '2':
												$numeroParcial = 1;
												break;
											case '3':
												$numeroParcial = 2;
												break;
											case '4':
												$numeroParcial = 3;
												break;
											case '5':
												$numeroParcial = 4;
												break;
											case '6':
												$numeroParcial = 5;
												break;
											case '7':
												$numeroParcial = 6;
												break;
											case '8':
												$numeroParcial = 7;
												break;
											case '9':
												$numeroParcial = 8;
												break;
											case '10':
												$numeroParcial = 9;
												break;
											
										
										}

									}else{
										$numeroParcial = $buscarDetalleAbono["numeroParcial"]+1;
										
									}
									
									$actualizarNumeroParcial = ControladorValidador::ctrActualizarParcialAbono($idAbonoPendiente,$numeroParcial);
									if ($actualizarNumeroParcial === 1) {
											fwrite($archivo, "Abono ".$idAbonoPendiente." parcial actualizado.". "\n");
										
										}else{
											fwrite($archivo, "No se actualizó el Abono ".$idAbonoPendiente."". "\n");
										}
			
							}else{


							}
							
							
						}
						
						

						/*
						ACTUALIZAR MOVIMIENTO BANCARIO
						*/
						$actualizarMovimiento = ControladorValidador::ctrActualizarMovimientoBancario($idMovimiento);
						if ($actualizarMovimiento === 1) {
							fwrite($archivo, "Movimiento ".$idMovimiento." actualizado correctamente.". "\n");
							$actualizarParciales = ControladorValidador::ctrActualizarParciales($idMovimiento);
						}else{
							fwrite($archivo, "No se actualizaron los datos.". "\n");
						}
						}else{

							fwrite($archivo, "EL movimiento ".$idMovimiento." No se pudo analizar.". "\n");

						}

			
					}
				fwrite($archivo, "Fecha Fin:".date("d-m-Y (H:i:s)", $time)."\n");
				fwrite($archivo, "". "\n");
	
			fclose($archivo);
			echo "Proceso Finalizado";
		}

?>