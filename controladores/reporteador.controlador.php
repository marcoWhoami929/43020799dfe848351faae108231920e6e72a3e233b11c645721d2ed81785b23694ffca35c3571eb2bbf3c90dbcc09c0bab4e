<?php
error_reporting(E_ALL);
/**
 * 
 */
class ControladorReporteador
{
	/**
	 * REPORTES POR RANGO DE FECHAS
	 */
	public function ctrDescargarReporteRangoFechas()
	{

		if (isset($_GET["bancoRangoFechas"])) {
			session_start();

			$tabla = $_GET["bancoRangoFechas"];
			$sWhere = "";

			if (isset($_GET['filtro1']) && $_GET['filtro1'] != "") {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}
				$sWhere .= "departamento LIKE '%" . $_GET['filtro1'] . "%' ";
			}
			if (isset($_GET['fechaInicio'])) {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}

				if ($_GET['fechaInicio'] === '' && $_GET['fechaFinal'] === "") {

					$fecha1 = date('Y-m-d', strtotime("- 5 month"));
					$fInicio = str_replace('-', '/', $fecha1);
					$fechaInicio = date('d/m/Y', strtotime($fInicio));

					$fecha2 = date('Y-m-d', strtotime("- 0 days"));
					$fFin = str_replace('-', '/', $fecha2);
					$fechaFinal = date('d/m/Y', strtotime($fFin));
				} else {


					$fInicio = str_replace('-', '/', $_GET["fechaInicio"]);
					$fechaInicio = date('d/m/Y', strtotime($fInicio));

					$fFin = str_replace('-', '/', $_GET["fechaFinal"]);
					$fechaFinal = date('d/m/Y', strtotime($fFin));
				}

				$sWhere .= "STR_TO_DATE(fecha,'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $fechaInicio . "','%d/%m/%Y') AND STR_TO_DATE('" . $fechaFinal . "','%d/%m/%Y') ";
			}
			if (isset($_GET['filtro2']) && $_GET['filtro2'] != "") {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}
				switch ($_GET['filtro2']) {
					case 'CARGOS':
						$sWhere .= "cargo != 0";
						break;
					case 'ABONOS':
						$sWhere .= "abono != 0";
						break;
				}
			}
			if (isset($_GET['filtro3']) && $_GET['filtro3'] != "") {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}
				$sWhere .= "grupo = 'INGRESOS' and subgrupo = 'CLIENTES' and (importe-importeParciales) > 0 and STR_TO_DATE(fecha,'%d/%m/%Y') > STR_TO_DATE('01/01/2021','%d/%m/%Y') ";
			}

			$datos = "&nbsp; DEL &nbsp; DIA &nbsp;<br>" . $fechaInicio . " AL " . $fechaFinal;

			$reporteRangoFechas = ModeloReporteador::mdlDescargarReporteRangoFechas($tabla, $sWhere);
			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			$nombreArchivo = "REPORTE " . strtoupper($tabla);
			$nombre = $nombreArchivo . '.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel'); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate");
			header('Content-Description: File Transfer');
			header('Last-Modified: ' . date('D, d M Y H:i:s'));
			header("Pragma: public");
			header('Content-Disposition:; filename="' . $nombre . '"');
			header("Content-Transfer-Encoding: binary");

			/*=============================================
			REPORTE LISTA DE FACTURAS
			=============================================*/

			if ($_GET["bancoRangoFechas"] == "banco0198" || $_GET["bancoRangoFechas"] == "banco6278" || $_GET["bancoRangoFechas"] == "banco7338") {

				$arregloCamposBanco0198 = ['N°', 'Departamento', 'Grupo', 'Subgrupo', 'Mes', 'Fecha', 'Descripcion', 'Cargo', 'Abono', 'Saldo', 'Comprobacion', 'Diferencia', 'Parcial', 'Serie', 'Folio', 'N° de Movimiento', 'Cliente / Proveedor / Acreedor', 'Concepto', 'Número de Documento', 'Importe', 'Iva', 'RetIVA', 'RetISR', 'RetIVA', 'RetISR', 'RetIVA', 'RetISR', 'Diferencia'];

				echo utf8_decode("<table>");
				echo "<tr>
						<th colspan='28' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
						<th colspan='28' style='font-weight:bold; background:#17202A; color:white;'>&nbsp; R E P O R T E &nbsp; B A N C A R I O &nbsp; " . strtoupper($tabla) . "  &nbsp;&nbsp</th>
					</tr>

					<tr>
						<th colspan='28' style='font-weight:bold; background:#17202A; color:white;'>" . $datos . "</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i = 0; $i < count($arregloCamposBanco0198); $i++) {
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposBanco0198 as $key => $value) {

					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>" . $value . "</td>");
				}
				echo utf8_decode("</tr>");

				foreach ($reporteRangoFechas as $key => $value) {
					echo utf8_decode("
					<tr>
				 			
				 		<td style='color:black;'>" . $value["id"] . "</td>
				 		<td style='color:black;'>" . $value["departamento"] . "</td>
				 		<td style='color:black;'>" . $value["grupo"] . "</td>
				 		<td style='color:black;width:420px'>" . $value["subgrupo"] . "</td>
				 		<td style='color:black;'>" . $value["mes"] . "</td>
				 		<td style='color:black;'>" . $value["fecha"] . "</td>
				 		<td style='color:black;width:600px'>" . $value["descripcion"] . "</td>
				 		<td style='color:black;'>" . $value["cargo"] . "</td>");

					if ($value["parciales"] == 0) {

						echo "<td style='color:black;'>" . $value["abono"] . "</td>";
					} else {

						echo "<td style='color:black;'>" . $value["abono"] . "</td>";
					}
					echo utf8_decode("
				 	  		<td style='color:black;'>" . $value["saldo"] . "</td>
				 			<td style='color:black;'>" . $value["comprobacion"] . "</td>
				 			<td style='color:black;'>" . number_format($value["diferencia"], 2) . "</td>
				 			<td style='color:black;'>0</td>
				 			<td style='color:black;'>" . $value["serie"] . "</td>
				 			<td style='color:black;'>" . $value["folio"] . "</td>
				 			<td style='color:black;'>" . $value["numeroMovimiento"] . "</td>
				 			<td style='color:black;width:420px'>" . $value["acreedor"] . "</td>
				 			<td style='color:black;width:420px'>" . $value["concepto"] . "</td>
				 			<td style='color:black;text-align:left'>" . $value["numeroDocumento"] . "</td>");

					if ($value["tieneIva"] == "Si" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">' . number_format(($value["importe"] / 1.16), 2) . '</td>';
					} else if ($value["tieneIva"] == "Si" && $value["parciales"] == 1 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">' . number_format(($value["importe"] / 1.16), 2) . '</td>';
					} else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">0.00</td>';
					} else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 01) {

						echo '<td style="text-transform:uppercase">0.00</td>';
					} else if ($value["tieneIva"] == "Si" && $value["tieneRetenciones"] == 01) {

						echo '<td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"]), 2) . '</td>';
					} else if ($value["tieneIva"] == "No" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">' . number_format($value["importe"], 2) . '</td>';
					} else if ($value["tieneIva"] == "No" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">0.00</td>';
					} else if ($value["tieneIva"] == "No" && $value["tieneRetenciones"] == 01) {

						echo '<td style="text-transform:uppercase">' . number_format($value["importeRetenciones"], 2) . '</td>';
					}

					if ($value["tieneIva"] == "Si" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">' . number_format($value["iva"], 2) . '</td>';
					} else if ($value["tieneIva"] == "Si" && $value["parciales"] == 1 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">' . number_format($value["iva"], 2) . '</td>';
					} else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 01) {

						echo '<td style="text-transform:uppercase">0.00</td>';
					} else if ($value["tieneIva"] == "Si" && $value["tieneRetenciones"] == 01) {

						echo '<td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"]) * 0.16, 2) . '</td>';
					} else {

						echo '<td style="text-transform:uppercase">0.00</td>';
					}


					/***************************************************/
					if ($value["tieneRetenciones"] == 1 || $value["tieneRetenciones"] == 01) {

						if ($value["tipoRetencion"] == "Arrendamiento" && $value["tieneRetenciones"] == 0) {

							echo '<td style="text-transform:uppercase">' . number_format($value["retIva"], 2) . '</td>
			                        <td style="text-transform:uppercase">' . number_format($value["retIsr"], 2) . '</td>';
						} else if ($value["tipoRetencion"] == "Arrendamiento" && $value["tieneRetenciones"] == 01) {
							echo '<td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"] * 10.6667) / 100, 2) . '</td>
			                        <td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"] * 10) / 100, 2) . '</td>';
						} else {

							echo '<td style="text-transform:uppercase">0.00</td>
			                        <td style="text-transform:uppercase">0.00</td>';
						}

						if ($value["tipoRetencion"] == "Flete" && $value["tieneRetenciones"] == 0) {

							echo '<td style="text-transform:uppercase">' . number_format($value["retIva2"], 2) . '</td>
			                        <td style="text-transform:uppercase">' . number_format($value["retIsr2"], 2) . '</td>';
						} else if ($value["tipoRetencion"] == "Flete" && $value["tieneRetenciones"] == 01) {

							echo '<td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"] * 4) / 100, 2) . '</td>
			                        <td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"] * 0) / 100, 2) . '</td>';
						} else {

							echo '<td style="text-transform:uppercase">0.00</td>
			                        <td style="text-transform:uppercase">0.00</td>';
						}

						if ($value["tipoRetencion"] == "Honorarios" && $value["tieneRetenciones"] == 0) {

							echo '<td style="text-transform:uppercase">' . number_format($value["retIva3"], 2) . '</td>
			                        <td style="text-transform:uppercase">' . number_format($value["retIsr3"], 2) . '</td>';
						} else if ($value["tipoRetencion"] == "Honorarios" && $value["tieneRetenciones"] == 01) {

							echo '<td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"] * 10.6667) / 100, 2) . '</td>
			                        <td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"] * 10) / 100, 2) . '</td>';
						} else {

							echo '<td style="text-transform:uppercase">0.00</td>
			                        <td style="text-transform:uppercase">0.00</td>';
						}
					} else {

						echo '
			                   	<td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			               ';
					}
					$diferencia = $value["importe"] - $value["importeParciales"];
					if ($diferencia > 0 and $diferencia < 1) {
						$color = 'yellow';
						$texto = 'black';
					} else if ($diferencia > 1) {
						$color = 'red';
						$texto = 'white';
					} else {
						$texto = 'white';
						$color = 'blue';
					}
					echo '<td style="text-transform:uppercase;background:' . $color . ';color:' . $texto . '">' . number_format($diferencia, 2) . '</td></tr>';
					/*=========================================
			                =            MOSTRAR PARCIALES            =
			                =========================================*/

					if ($value["parciales"] == 0 || $value["parciales"] == 1) {
					} else {

						if ($value["departamento"] ==  "SANTIAGO" || $value["departamento"] ==  "REFORMA" || $value["departamento"] ==  "SAN MANUEL" || $value["departamento"] ==  "LAS TORRES" || $value["departamento"] ==  "CAPU" || $value["departamento"] ==  "ACATEPEC") {


							$tablaB = $tabla;
							$item = "idMovimientoBanco";
							$valor =  $value["id"];
							$bancoMov = $_GET["bancoRangoFechas"];
							$tipo = "cerrado";

							$mostrarParciales = ModeloReporteador::mdlMostrarListaParcialesMovimiento($tablaB, $item, $valor, $tipo,$bancoMov);

							if (count($mostrarParciales) > 0) {


								foreach ($mostrarParciales as $key => $values) {

									if ($value["tieneIva"] == "No") {

										$importeFinal = ($values["parcial"]);
										$ivaFinal = 0;
									} else {

										$importeFinal = ($values["parcial"] / 1.16);
										$ivaFinal = ($values["parcial"] / 1.16) * 0.16;
									}


									echo utf8_decode("<tr>
						 			
						 						<td style='color:black;'>" . $values["id"] . "</td>
						 						<td style='color:black;'>" . $values["departamento"] . "</td>
						 						<td style='color:black;'>" . $values["grupo"] . "</td>
						 						<td style='color:black;width:420px'>" . $values["subgrupo"] . "</td>
						 						<td style='color:black;'>" . $values["mes"] . "</td>
						 						<td style='color:black;'>" . $values["fecha"] . "</td>
						 						<td style='color:black;width:600px'>" . $values["descripcion"] . "</td>
						 						<td style='color:black;'>0</td>
						 						<td style='color:black;'>0</td>
						 						<td style='color:black;'>" . $values["saldo"] . "</td>
						 						<td style='color:black;'>" . $values["comprobacion"] . "</td>
						 						<td style='color:black;'>" . number_format($values["diferencia"], 2) . "</td>
						 						<td style='color:black;'>" . $values["parcial"] . "</td>
						 						<td style='color:black;'>" . $values["serie"] . "</td>
						 						<td style='color:black;'>" . $values["folio"] . "</td>
						 						<td style='color:black;'>" . $values["numeroMovimiento"] . "</td>
						 						<td style='color:black;width:420px'>" . $values["acreedor"] . "</td>
						 						<td style='color:black;width:420px'>" . $values["concepto"] . "</td>
						 						<td style='color:black;'>" . $values["numeroDocumento"] . "</td>
						 						<td style='color:black;'>" . $importeFinal . "</td>
						 						<td style='color:black;'>" . $ivaFinal . "</td>
						 						<td style='color:black;'>0</td>
						 						<td style='color:black;'>0</td>
						 						<td style='color:black;'>0</td>
						 						<td style='color:black;'>0</td>
						 						<td style='color:black;'>0</td>
						 						<td style='color:black;'>0</td></tr>");
								}
							} else {

								if ($value["departamento"] == 'DESGLOSE') {
									$abono = '0';
									$cargo = '0';
								} else {
									$abono = '0';
									$cargo = '0';
								}
								/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
								for ($i = 1; $i <= $value["parciales"]; $i++) {

									if ($i == 1) {
										$posicion = '';
									} else {
										$posicion = $i;
									}

									if ($value["tieneIva"] == "No") {

										$importeFinal = ($value["parcial" . $posicion . ""]);
										$ivaFinal = 0;
									} else {

										$importeFinal = ($value["parcial" . $posicion . ""] / 1.16);
										$ivaFinal = ($value["parcial" . $posicion . ""] / 1.16) * 0.16;
									}



									echo utf8_decode("<tr>
												 			
												 						<td style='color:black;'>" . $value["id"] . "</td>
												 						<td style='color:black;'>" . $value["departamentoParcial" . $i . ""] . "</td>
												 						<td style='color:black;'>" . $value["grupo"] . "</td>
												 						<td style='color:black;width:420px'>" . $value["subgrupo"] . "</td>
												 						<td style='color:black;'>" . $value["mes"] . "</td>
												 						<td style='color:black;'>" . $value["fecha"] . "</td>
												 						<td style='color:black;width:600px'>" . $value["descripcion"] . "</td>
												 						<td style='color:black;'>" . $cargo . "</td>
												 						<td style='color:black;'>" . $abono . "</td>
												 						<td style='color:black;'>" . $value["saldo"] . "</td>
												 						<td style='color:black;'>" . $value["comprobacion"] . "</td>
												 						<td style='color:black;'>" . number_format($value["diferencia"], 2) . "</td>
												 						<td style='color:black;'>" . $value["parcial" . $posicion . ""] . "</td>
												 						<td style='color:black;'>" . $value["serie"] . "</td>
												 						<td style='color:black;'>" . $value["folio"] . "</td>
												 						<td style='color:black;'>" . $value["numeroMovimiento"] . "</td>
												 						<td style='color:black;width:420px'>" . $value["acreedor"] . "</td>
												 						<td style='color:black;width:420px'>" . $value["concepto"] . "</td>
												 						<td style='color:black;'>" . $value["numeroDocumento"] . "</td>
												 						<td style='color:black;'>" . $importeFinal . "</td>
												 						<td style='color:black;'>" . $ivaFinal . "</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td></tr>");
								}
							}
						} else {
							/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
							if ($value["departamento"] == 'DESGLOSE') {
								$abono = '0';
								$cargo = '0';
							} else {
								$abono = '0';
								$cargo = '0';
							}
							/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
							for ($i = 1; $i <= $value["parciales"]; $i++) {

								if ($i == 1) {
									$posicion = '';
								} else {
									$posicion = $i;
								}

								if ($value["tieneIva"] == "No") {

									$importeFinal = ($value["parcial" . $posicion . ""]);
									$ivaFinal = 0;
								} else {

									$importeFinal = ($value["parcial" . $posicion . ""] / 1.16);
									$ivaFinal = ($value["parcial" . $posicion . ""] / 1.16) * 0.16;
								}


								echo utf8_decode("<tr>
												 			
												 						<td style='color:black;'>" . $value["id"] . "</td>
												 						<td style='color:black;'>" . $value["departamentoParcial" . $i . ""] . "</td>
												 						<td style='color:black;'>" . $value["grupo"] . "</td>
												 						<td style='color:black;width:420px'>" . $value["subgrupo"] . "</td>
												 						<td style='color:black;'>" . $value["mes"] . "</td>
												 						<td style='color:black;'>" . $value["fecha"] . "</td>
												 						<td style='color:black;width:600px'>" . $value["descripcion"] . "</td>
												 						<td style='color:black;'>" . $cargo . "</td>
												 						<td style='color:black;'>" . $abono . "</td>
												 						<td style='color:black;'>" . $value["saldo"] . "</td>
												 						<td style='color:black;'>" . $value["comprobacion"] . "</td>
												 						<td style='color:black;'>" . number_format($value["diferencia"], 2) . "</td>
												 						<td style='color:black;'>" . $value["parcial" . $posicion . ""] . "</td>
												 						<td style='color:black;'>" . $value["serie"] . "</td>
												 						<td style='color:black;'>" . $value["folio"] . "</td>
												 						<td style='color:black;'>" . $value["numeroMovimiento"] . "</td>
												 						<td style='color:black;width:420px'>" . $value["acreedor"] . "</td>
												 						<td style='color:black;width:420px'>" . $value["concepto"] . "</td>
												 						<td style='color:black;'>" . $value["numeroDocumento"] . "</td>
												 						<td style='color:black;'>" . $importeFinal . "</td>
												 						<td style='color:black;'>" . $ivaFinal . "</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td>
												 						<td style='color:black;'>0</td></tr>");
							}
							/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
						}
					}


					/*=====  End of MOSTRAR PARCIALES  ======*/
				}


				echo "</table>";
			}
			/****FIN DE TABLA***/
		}
	}

	/**
	 * REPORTES POR RANGO DE FECHAS CREDITO
	 */
	public function ctrDescargarReporteRangoFechasCredito()
	{

		if (isset($_GET["bancoRangoFechasCredito"])) {
			session_start();


			$tabla = $_GET["bancoRangoFechasCredito"];

			$sWhere = "";

			if (isset($_GET['filtro1']) && $_GET['filtro1'] != "") {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}
				$sWhere .= "departamento LIKE '%" . $_GET['filtro1'] . "%' ";
			}
			if (isset($_GET['fechaInicio'])) {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}

				if ($_GET['fechaInicio'] === '' && $_GET['fechaFinal'] === "") {

					$fecha1 = date('Y-m-d', strtotime("- 5 month"));
					$fInicio = str_replace('-', '/', $fecha1);
					$fechaInicio = date('d/m/Y', strtotime($fInicio));

					$fecha2 = date('Y-m-d', strtotime("- 0 days"));
					$fFin = str_replace('-', '/', $fecha2);
					$fechaFinal = date('d/m/Y', strtotime($fFin));
				} else {


					$fInicio = str_replace('-', '/', $_GET["fechaInicio"]);
					$fechaInicio = date('d/m/Y', strtotime($fInicio));

					$fFin = str_replace('-', '/', $_GET["fechaFinal"]);
					$fechaFinal = date('d/m/Y', strtotime($fFin));
				}

				$sWhere .= "STR_TO_DATE(fecha,'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $fechaInicio . "','%d/%m/%Y') AND STR_TO_DATE('" . $fechaFinal . "','%d/%m/%Y') ";
			}
			if (isset($_GET['filtro2']) && $_GET['filtro2'] != "") {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}
				switch ($_GET['filtro2']) {
					case 'CARGOS':
						$sWhere .= "cargo != 0";
						break;
					case 'ABONOS':
						$sWhere .= "abono != 0";
						break;
				}
			}
			if (isset($_GET['filtro3']) && $_GET['filtro3'] != "") {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}
				$sWhere .= "grupo = 'INGRESOS' and subgrupo = 'CLIENTES' and (importe-importeParciales) > 0 and STR_TO_DATE(fecha,'%d/%m/%Y') > STR_TO_DATE('01/01/2021','%d/%m/%Y') ";
			}


			$datos = "&nbsp; DEL &nbsp; DIA &nbsp;<br>" . $fechaInicio . " AL " . $fechaFinal;


			$reporteRangoFechasCredito = ModeloReporteador::mdlDescargarReporteRangoFechasCredito($tabla, $sWhere);
			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			$nombreArchivo = "REPORTE-CREDITO " . strtoupper($tabla);
			$nombre = $nombreArchivo . '.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel'); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate");
			header('Content-Description: File Transfer');
			header('Last-Modified: ' . date('D, d M Y H:i:s'));
			header("Pragma: public");
			header('Content-Disposition:; filename="' . $nombre . '"');
			header("Content-Transfer-Encoding: binary");

			/*=============================================
			REPORTE LISTA DE FACTURAS
			=============================================*/

			if ($_GET["bancoRangoFechasCredito"] == "banco0198" || $_GET["bancoRangoFechasCredito"] == "banco6278" || $_GET["bancoRangoFechasCredito"] == "banco7338") {

				$arregloCamposBanco0198Credito = ['N°', 'Departamento', 'Grupo', 'Subgrupo', 'Mes', 'Fecha', 'Descripción', 'Abono', 'Parcial', 'Serie', 'Folio', 'N° de Movimiento', 'Cliente / Proveedor / Acreedor', 'Concepto', 'Número de Documento', 'Importe', 'Iva', 'Diferencia'];

				echo utf8_decode("<table>");
				echo "<tr>
						<th colspan='18' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
						<th colspan='18' style='font-weight:bold; background:#17202A; color:white;'>&nbsp; R E P O R T E &nbsp; B A N C A R I O &nbsp; " . strtoupper($tabla) . "  &nbsp;&nbsp</th>
					</tr>

					<tr>
						<th colspan='18' style='font-weight:bold; background:#17202A; color:white;'>" . $datos . "</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i = 0; $i < count($arregloCamposBanco0198Credito); $i++) {
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposBanco0198Credito as $key => $value) {

					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>" . $value . "</td>");
				}
				echo utf8_decode("</tr>");


				foreach ($reporteRangoFechasCredito as $key => $value) {

				echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>" . $value["id"] . "</td>
				 						<td style='color:black;'>" . $value["departamento"] . "</td>
				 						<td style='color:black;'>" . $value["grupo"] . "</td>
				 						<td style='color:black;width:420px'>" . $value["subgrupo"] . "</td>
				 						<td style='color:black;'>" . $value["mes"] . "</td>
				 						<td style='color:black;'>" . $value["fecha"] . "</td>
				 						<td style='color:black;'>" . $value["descripcion"] . "</td>");

					if ($value["parciales"] == 0) {

						echo "<td style='color:black;'>" . $value["abono"] . "</td>";
					} else {

						echo "<td style='color:black;'>" . $value["abono"] . "</td>";
					}
					echo utf8_decode("
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>" . $value["serie"] . "</td>
				 						<td style='color:black;'>" . $value["folio"] . "</td>
				 						<td style='color:black;'>" . $value["numeroMovimiento"] . "</td>
				 						<td style='color:black;width:420px'>" . $value["acreedor"] . "</td>
				 						<td style='color:black;width:420px'>" . $value["concepto"] . "</td>
				 						<td style='color:black;text-align:left'>" . $value["numeroDocumento"] . "</td>");
					if ($value["tieneIva"] == "Si" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">' . number_format(($value["importe"] / 1.16), 2) . '</td>';
					} else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 0) {

						//echo '<td style="text-transform:uppercase">$ '.number_format(($value2["importeParciales"]/1.16),2).'</td>';
						echo '<td style="text-transform:uppercase">0.00</td>';
					} else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 01) {

						echo '<td style="text-transform:uppercase">0.00</td>';
					} else if ($value["tieneIva"] == "Si" && $value["tieneRetenciones"] == 01) {
						echo '<td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"]), 2) . '</td>';
					} else if ($value["tieneIva"] == "No" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">' . number_format($value["importe"], 2) . '</td>';
					} else if ($value["tieneIva"] == "No" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">0.00</td>';
					} else if ($value["tieneIva"] == "No" && $value["tieneRetenciones"] == 01) {
						echo '<td style="text-transform:uppercase">' . number_format($value["importeRetenciones"], 2) . '</td>';
					}


					if ($value["tieneIva"] == "Si" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0) {

						echo '<td style="text-transform:uppercase">' . number_format($value["iva"], 2) . '</td>';
					} else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 01) {

						echo '<td style="text-transform:uppercase">0.00</td>';
					} else if ($value["tieneIva"] == "Si" && $value["tieneRetenciones"] == 01) {
						echo '<td style="text-transform:uppercase">' . number_format(($value["importeRetenciones"]) * 0.16, 2) . '</td>';
					} else {

						echo '<td style="text-transform:uppercase">0.00</td>';
					}
					$diferencia = $value["importe"] - $value["importeParciales"];
					if ($diferencia > 0 and $diferencia < 1) {
						$color = 'yellow';
						$texto = 'black';
					} else if ($diferencia > 1) {
						$color = 'red';
						$texto = 'white';
					} else {
						$texto = 'white';
						$color = 'blue';
					}
					echo '<td style="text-transform:uppercase;background:' . $color . ';color:' . $texto . '">' . number_format($diferencia, 2) . '</td></tr>';
					/*=========================================
					 =            MOSTRAR PARCIALES            =
					=========================================*/

					if ($value["parciales"] == 0 || $value["parciales"] == 1) {
					} else {
						if ($value["departamento"] ==  "SANTIAGO" || $value["departamento"] ==  "REFORMA" || $value["departamento"] ==  "SAN MANUEL" || $value["departamento"] ==  "LAS TORRES"  || $value["departamento"] ==  "CAPU" || $value["departamento"] ==  "ACATEPEC") {

							$tablaB = $tabla;
							$item = "idMovimientoBanco";
							$valor =  $value["id"];
							$bancoMov = $_GET["bancoRangoFechasCredito"];
							$tipo = "cerrado";

							$mostrarParciales = ModeloReporteador::mdlMostrarListaParcialesMovimiento($tablaB, $item, $valor, $tipo,$bancoMov);

							if (count($mostrarParciales) > 0) {
								foreach ($mostrarParciales as $key => $values) {

									if ($value["tieneIva"] == "No") {

										$importeFinal = ($values["parcial"]);
										$ivaFinal = 0;
									} else {

										$importeFinal = ($values["parcial"] / 1.16);
										$ivaFinal = ($values["parcial"] / 1.16) * 0.16;
									}


									echo utf8_decode("<tr>
								 			
								 						<td style='color:black;'>" . $values["id"] . "</td>
								 						<td style='color:black;'>" . $values["departamento"] . "</td>
								 						<td style='color:black;'>" . $values["grupo"] . "</td>
								 						<td style='color:black;width:420px'>" . $values["subgrupo"] . "</td>
								 						<td style='color:black;'>" . $values["mes"] . "</td>
								 						<td style='color:black;'>" . $values["fecha"] . "</td>
								 						<td style='color:black;width:600px'>" . $values["descripcion"] . "</td>
								 						<td style='color:black;'>0</td>
								 					
								 						<td style='color:black;'>" . $values["parcial"] . "</td>
								 						<td style='color:black;'>" . $values["serie"] . "</td>
								 						<td style='color:black;'>" . $values["folio"] . "</td>
								 						<td style='color:black;'>" . $values["numeroMovimiento"] . "</td>
								 						<td style='color:black;width:420px'>" . $values["acreedor"] . "</td>
								 						<td style='color:black;width:420px'>" . $values["concepto"] . "</td>
								 						<td style='color:black;'>" . $values["numeroDocumento"] . "</td>
								 					
								 						<td style='color:black;'>" . $importeFinal . "</td>
						 								<td style='color:black;'>" . $ivaFinal . "</td></tr>");
								}
							} else {

								/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
								if ($value["departamento"] == 'DESGLOSE') {
									$abono = '0';
									$cargo = '0';
								} else {
									$abono = '0';
									$cargo = '0';
								}
								/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
								for ($i = 1; $i <= $value["parciales"]; $i++) {

									if ($i == 1) {
										$posicion = '';
									} else {
										$posicion = $i;
									}

									if ($value["tieneIva"] == "No") {

										$importeFinal = ($value["parcial" . $posicion . ""]);
										$ivaFinal = 0;
									} else {

										$importeFinal = ($value["parcial" . $posicion . ""] / 1.16);
										$ivaFinal = ($value["parcial" . $posicion . ""] / 1.16) * 0.16;
									}


									echo utf8_decode("<tr>
														 			
														 						<td style='color:black;'>" . $value["id"] . "</td>
														 						<td style='color:black;'>" . $value["departamentoParcial" . $i . ""] . "</td>
														 						<td style='color:black;'>" . $value["grupo"] . "</td>
														 						<td style='color:black;width:420px'>" . $value["subgrupo"] . "</td>
														 						<td style='color:black;'>" . $value["mes"] . "</td>
														 						<td style='color:black;'>" . $value["fecha"] . "</td>
														 						<td style='color:black;width:600px'>" . $value["descripcion"] . "</td>
														 		
														 						<td style='color:black;'>" . $abono . "</td>
														 					
														 						<td style='color:black;'>" . $value["parcial" . $posicion . ""] . "</td>
														 						<td style='color:black;'>" . $value["serie"] . "</td>
														 						<td style='color:black;'>" . $value["folio"] . "</td>
														 						<td style='color:black;'>" . $value["numeroMovimiento"] . "</td>
														 						<td style='color:black;width:420px'>" . $value["acreedor"] . "</td>
														 						<td style='color:black;width:420px'>" . $value["concepto"] . "</td>
														 						<td style='color:black;'>" . $value["numeroDocumento"] . "</td>
														 						<td style='color:black;'>" . $importeFinal . "</td>
														 						<td style='color:black;'>" . $ivaFinal . "</td>
														 					</tr>");
								}
							}
						} else {

							/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
							if ($value["departamento"] == 'DESGLOSE') {
								$abono = '0';
								$cargo = '0';
							} else {
								$abono = '0';
								$cargo = '0';
							}
							/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
							for ($i = 1; $i <= $value["parciales"]; $i++) {

								if ($i == 1) {
									$posicion = '';
								} else {
									$posicion = $i;
								}

								if ($value["tieneIva"] == "No") {

									$importeFinal = ($value["parcial" . $posicion . ""]);
									$ivaFinal = 0;
								} else {

									$importeFinal = ($value["parcial" . $posicion . ""] / 1.16);
									$ivaFinal = ($value["parcial" . $posicion . ""] / 1.16) * 0.16;
								}


								echo utf8_decode("<tr>
														 			
														 						<td style='color:black;'>" . $value["id"] . "</td>
														 						<td style='color:black;'>" . $value["departamentoParcial" . $i . ""] . "</td>
														 						<td style='color:black;'>" . $value["grupo"] . "</td>
														 						<td style='color:black;width:420px'>" . $value["subgrupo"] . "</td>
														 						<td style='color:black;'>" . $value["mes"] . "</td>
														 						<td style='color:black;'>" . $value["fecha"] . "</td>
														 						<td style='color:black;width:600px'>" . $value["descripcion"] . "</td>
														 		
														 						<td style='color:black;'>" . $abono . "</td>
														 					
														 						<td style='color:black;'>" . $value["parcial" . $posicion . ""] . "</td>
														 						<td style='color:black;'>" . $value["serie"] . "</td>
														 						<td style='color:black;'>" . $value["folio"] . "</td>
														 						<td style='color:black;'>" . $value["numeroMovimiento"] . "</td>
														 						<td style='color:black;width:420px'>" . $value["acreedor"] . "</td>
														 						<td style='color:black;width:420px'>" . $value["concepto"] . "</td>
														 						<td style='color:black;'>" . $value["numeroDocumento"] . "</td>
														 						<td style='color:black;'>" . $importeFinal . "</td>
														 						<td style='color:black;'>" . $ivaFinal . "</td>
														 					</tr>");
							}
						}
					}


					/*=====  End of MOSTRAR PARCIALES  ======*/
				}


				echo "</table>";
			}
			/****FIN DE TABLA***/
		}
	}
	/**
	 * REPORTEADOR NEW
	 */
	public function ctrDescargarReporteBackorder($search)
	{
		switch ($search["empresa"]) {
			case "dekkerlab":

				$database = new data();
				$nombreEmpresa = "P I N T U R A S";
				break;
			case "flex":

				$database = new data();
				$nombreEmpresa = "F L E X";
				break;
			case "":

				$database = new data();
				$nombreEmpresa = "T O D A S";
				break;
		}

		$reporte = $database->getListaProductosBackorder($search);

		/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

		$nombre = "backorder" . '.xls';

		header('Expires: 0');
		header('Cache-control: private');
		header('Content-type: application/vnd.ms-excel'); // Archivo de Excel
		header("Cache-Control: cache, must-revalidate");
		header('Content-Description: File Transfer');
		header('Last-Modified: ' . date('D, d M Y H:i:s'));
		header("Pragma: public");
		header('Content-Disposition:; filename="' . $nombre . '"');
		header("Content-Transfer-Encoding: binary");

		$arregloHeaders = ['ID', 'SERIE', 'FOLIO', 'CLIENTE', 'FECHA', 'CODIGO', 'PRODUCTO', 'UNIDAD', 'CLASIF', 'MARCA', 'ALMACEN', 'EXIST','DESC', 'PRECIO', 'UNIDADES', 'TOTAL SOLICITADO', 'PENDIENTES', 'TOTAL PENDIENTE'];


		echo utf8_decode("<table>");
		echo "<tr>
					<th colspan='18' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='18' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; D E &nbsp; B A C K O R D E R &nbsp; P E D I D O S &nbsp</th>
					</tr>

					<tr>
					<th colspan='18' style='font-weight:bold; background:#17202A; color:white;'>$nombreEmpresa</th>
					</tr>";
		echo utf8_decode("<tr>");
		for ($i = 0; $i < count($arregloHeaders); $i++) {
			echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
		}
		echo utf8_decode("</tr>");
		echo utf8_decode("<tr>");

		foreach ($arregloHeaders as $key => $value) {

			echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>" . $value . "</td>");
		}
		echo utf8_decode("</tr>");

		foreach ($reporte as $key => $value) {
			 if ($search['estatus'] === 'FALTANTE' AND $value["backorder"] == null AND $value["surtido"] == null) {

                            $pendientes = $value["CUNIDADESPENDIENTES"] - $value["backorder"];
                            $descuento = ($value["CPRECIOCAPTURADO"] * $pendientes)*$value["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $value["CPRECIOCAPTURADO"] * $pendientes - $descuento ;
                        
                        }else if ($search['estatus'] === 'FALTANTE' AND $value["surtido"] != 0) {

                            $pendientes = $value["CUNIDADESPENDIENTES"] - $value["surtido"];
                            $descuento = ($value["CPRECIOCAPTURADO"] * $pendientes)*$value["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $value["CPRECIOCAPTURADO"] * $pendientes - $descuento ;
                            
                        }else if ($search['estatus'] === 'BACKORDER' AND $value["surtido"] != 0 AND  $value["backorder"] != 0) {

                            $pendientes = $value["backorder"] ;
                           $descuento = ($value["CPRECIOCAPTURADO"] * $pendientes)*$value["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $value["CPRECIOCAPTURADO"] * $pendientes - $descuento ;
                       
                        }else if ($search['estatus'] === 'SURTIDOS') {

                            $pendientes = $value["surtido"] ;
                            $descuento = ($value["CPRECIOCAPTURADO"] * $pendientes)*$value["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $value["CPRECIOCAPTURADO"] * $pendientes - $descuento ;

                           
                        } else if ($search['estatus'] === 'MULTIPLE') {

                            $pendientes = $value["CUNIDADESPENDIENTES"] - $value["surtido"] -$value["backorder"];
                            $descuento = ($value["CPRECIOCAPTURADO"] * $pendientes)*$value["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $value["CPRECIOCAPTURADO"] * $pendientes - $descuento ;
                          
                        } else {

                            $pendientes =  $value["backorder"];
                            $descuento = ($value["CPRECIOCAPTURADO"] * $pendientes)*$value["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $value["CPRECIOCAPTURADO"] * $pendientes - $descuento ;
                          
                           
                        }
                      
                        $unidades = $value["CUNIDADESCAPTURADAS"];
 

			$codigoProducto = "=\"" . $value["CCODIGOPRODUCTO"] . "\"";
			$style = 'mso-number-format:"@";';
			echo utf8_decode("<tr>
										<td style='color:black;'>" . $value["CIDPRODUCTO"] . "</td>
										<td style='color:black;'>" . $value["CSERIEDOCUMENTO"] . "</td>
										<td style='color:black;'>" . bcdiv($value["CFOLIO"], '1', 0) . "</td>
										<td style='color:black;'>" . $value["CRAZONSOCIAL"] . "</td>
										<td style='color:black;'>" . $value["CFECHA"] . "</td>
									    <td style='" . $style . "'>" . $value["CCODIGOPRODUCTO"] . "</td>
				 						<td style='color:black;'>" . $value["CNOMBREPRODUCTO"] . "</td>
										 <td style='color:black;'>" . $value["UNIDAD"] . "</td>
										 <td style='color:black;'>" . $value["CLASIFICACION"] . "</td>
										 <td style='color:black;'>" . $value["MARCA"] . "</td>
										 <td style='color:black;'>" . $value["CNOMBREALMACEN"] . "</td>
										 <td style='color:black;'>" . bcdiv($value["EXISTENCIA"], '1', 2) . "</td>
										 <td style='color:black;'>" . number_format(bcdiv($value["CPORCENTAJEDESCUENTO1"] , '1', 2),2). "</td>
										 <td style='color:black;'>" .  number_format(bcdiv($value["CPRECIO"] , '1', 2),2) . "</td>
										 <td style='color:black;'>" .  bcdiv($unidades, '1', 5) . "</td>
										 <td style='color:black;'>" .  number_format(bcdiv($value["CNETO"]-$value["CDESCUENTO1"]-$value["CDESCUENTO2"], '1', 2),2) . "</td>
										 <td style='color:black;'>" . bcdiv($pendientes, '1', 2). "</td>
										 <td style='color:black;'>" .  number_format($total,2) . "</td>
										</tr>");
		}


		echo "</table>";
	}
		/**
	 * REPORTEADOR LISTADO PRODUCTOS
	 */
	public function ctrDescargarReporteListadoProductos($search)
	{
		$database = new data();

		$reporte = $database->getListadoProductos($search);

		/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

		$nombre = "listado/productos" . '.xls';

		header('Expires: 0');
		header('Cache-control: private');
		header('Content-type: application/vnd.ms-excel'); // Archivo de Excel
		header("Cache-Control: cache, must-revalidate");
		header('Content-Description: File Transfer');
		header('Last-Modified: ' . date('D, d M Y H:i:s'));
		header("Pragma: public");
		header('Content-Disposition:; filename="' . $nombre . '"');
		header("Content-Transfer-Encoding: binary");

		$arregloHeaders = ['ID', 'CODIGO', 'NOMBRE PRODUCTO', 'UNIDAD MEDIDA', 'MARCA', 'EXISTENCIAS', 'CLASIFICACION'];


		echo utf8_decode("<table>");
		echo "<tr>
					<th colspan='7' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='7' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; D E &nbsp; P R O D U C T O S&nbsp</th>
					</tr>

					<tr>
					<th colspan='18' style='font-weight:bold; background:#17202A; color:white;'>$nombreEmpresa</th>
					</tr>";
		echo utf8_decode("<tr>");
		for ($i = 0; $i < count($arregloHeaders); $i++) {
			echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
		}
		echo utf8_decode("</tr>");
		echo utf8_decode("<tr>");

		foreach ($arregloHeaders as $key => $value) {

			echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>" . $value . "</td>");
		}
		echo utf8_decode("</tr>");

		foreach ($reporte as $key => $value) {
			 
 

			$codigoProducto = "=\"" . $value["CCODIGOPRODUCTO"] . "\"";
			$style = 'mso-number-format:"@";';
			echo utf8_decode("<tr>
										<td style='color:black;'>" . $value["CIDPRODUCTO"] . "</td>
									    <td style='" . $style . "'>" . $value["CCODIGOPRODUCTO"] . "</td>
				 						<td style='color:black;'>" . $value["CNOMBREPRODUCTO"] . "</td>
										 <td style='color:black;'>" . $value["UNIDAD"] . "</td>
										 <td style='color:black;'>" . $value["MARCA"] . "</td>
										 <td style='color:black;'>" . bcdiv($value["EXISTENCIAS"], '1', 2) . "</td>
										 <td style='color:black;'>" . $value["CLASIFICACION"] . "</td>
										
										</tr>");
		}


		echo "</table>";
	}
}
