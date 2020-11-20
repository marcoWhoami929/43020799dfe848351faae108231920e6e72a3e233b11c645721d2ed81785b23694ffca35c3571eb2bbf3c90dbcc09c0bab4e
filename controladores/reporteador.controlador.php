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
	public function ctrDescargarReporteRangoFechas(){

		if(isset($_GET["bancoRangoFechas"])){
			session_start();

			$tabla = $_GET["bancoRangoFechas"];

			$item = "fecha";
	    	if (isset($_GET["fechaInicioF"])) {

		        $valor1 = $_GET["fechaInicioF"];

		        $hoy = date("Y-m-d");


		        if ($hoy === $valor1) {

		        	  $fecha = str_replace('-', '/', $valor1);
	        		  $fechaInicio = date('d/m/Y', strtotime($fecha."- 5 month"));

		        }else{

		        	  $fecha = str_replace('-', '/', $valor1);
	        		  $fechaInicio = date('d/m/Y', strtotime($fecha));

		        }

	    	}else{
		        $hoy = date("Y-m-d");

		        $fecha = str_replace('-', '/', $hoy);
	        	$fechaInicio = date('d/m/Y', strtotime($fecha."- 5 month"));
	        
	        	$valor1 = $hoy;

	    	}

		    if (isset($_GET["fechaFinalF"])) {

		        $valor2 = $_GET["fechaFinalF"];

		        $fecha = str_replace('-', '/', $valor2);
	        	$fechaFinal = date('d/m/Y', strtotime($fecha));

		    }else{
		        $hoy = date("Y-m-d");

		        $fecha = str_replace('-', '/', $hoy);
	        	$fechaFinal = date('d/m/Y', strtotime($fecha));
	        	$valor2 = $hoy;

		    }

			$datos = "&nbsp; DEL &nbsp; DIA &nbsp;<br>".$fechaInicio." AL ".$fechaFinal;


			$reporteRangoFechas = ModeloReporteador::mdlDescargarReporteRangoFechas($tabla,$item,$valor1,$valor2);
			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			$nombreArchivo = "REPORTE ".strtoupper($tabla);
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");

			/*=============================================
			REPORTE LISTA DE FACTURAS
			=============================================*/

			if($_GET["bancoRangoFechas"] == "banco0198" || $_GET["bancoRangoFechas"] == "banco6278"){

				$arregloCamposBanco0198 = ['N°','Departamento','Grupo','Subgrupo','Mes','Fecha','Descripcion','Cargo','Abono','Saldo','Comprobacion','Diferencia','Parcial','Serie','Folio','N° de Movimiento','Cliente / Proveedor / Acreedor','Concepto','Número de Documento','Importe','Iva','RetIVA','RetISR','RetIVA','RetISR','RetIVA','RetISR'];

				echo utf8_decode("<table>");
				echo "<tr>
						<th colspan='27' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
						<th colspan='27' style='font-weight:bold; background:#17202A; color:white;'>&nbsp; R E P O R T E &nbsp; B A N C A R I O &nbsp; ".strtoupper($tabla)."  &nbsp;&nbsp</th>
					</tr>

					<tr>
						<th colspan='27' style='font-weight:bold; background:#17202A; color:white;'>".$datos."</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($arregloCamposBanco0198); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposBanco0198 as $key => $value) {
						
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");
	
				foreach ($reporteRangoFechas as $key => $value) {
					echo utf8_decode("
					<tr>
				 			
				 		<td style='color:black;'>".$value["id"]."</td>
				 		<td style='color:black;'>".$value["departamento"]."</td>
				 		<td style='color:black;'>".$value["grupo"]."</td>
				 		<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 		<td style='color:black;'>".$value["mes"]."</td>
				 		<td style='color:black;'>".$value["fecha"]."</td>
				 		<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 		<td style='color:black;'>".$value["cargo"]."</td>");

				 	  	if ($value["parciales"] == 0) {

				 	  		echo "<td style='color:black;'>".$value["abono"]."</td>";
				 	  						
				 	  	}else {

				 	  		echo "<td style='color:black;'>".$value["abono"]."</td>";		

				 	  	}
				 	  	echo utf8_decode("
				 	  		<td style='color:black;'>".$value["saldo"]."</td>
				 			<td style='color:black;'>".$value["comprobacion"]."</td>
				 			<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 			<td style='color:black;'>0</td>
				 			<td style='color:black;'>".$value["serie"]."</td>
				 			<td style='color:black;'>".$value["folio"]."</td>
				 			<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 			<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 			<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 			<td style='color:black;text-align:left'>".$value["numeroDocumento"]."</td>");

							if ($value["tieneIva"] == "Si" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0) {
			                            
			                    echo '<td style="text-transform:uppercase">'.number_format(($value["importe"]/1.16),2).'</td>';

			                }else if ($value["tieneIva"] == "Si" && $value["parciales"] == 1 && $value["tieneRetenciones"] == 0) {
			                            
			                    echo '<td style="text-transform:uppercase">'.number_format(($value["importe"]/1.16),2).'</td>';

			                }
			                else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 0) {

			                    echo '<td style="text-transform:uppercase">0.00</td>';
			                            
			                }else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 01) {

			                    echo '<td style="text-transform:uppercase">0.00</td>';
			                          
			                }else if ($value["tieneIva"] == "Si" && $value["tieneRetenciones"] == 01) {
			                    
			                    echo '<td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"]),2).'</td>';
			                
			                }else if($value["tieneIva"] == "No" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0){ 

			                    echo '<td style="text-transform:uppercase">'.number_format($value["importe"],2).'</td>';

			                }else if($value["tieneIva"] == "No" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 0){

			                    echo '<td style="text-transform:uppercase">0.00</td>';

			               	}else if ($value["tieneIva"] == "No" && $value["tieneRetenciones"] == 01) {
			                             
			                    echo '<td style="text-transform:uppercase">'.number_format($value["importeRetenciones"],2).'</td>';
			                
			                }

			                if ($value["tieneIva"] == "Si" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0 ) {

			                    echo '<td style="text-transform:uppercase">'.number_format($value["iva"],2).'</td>';

			                }else if ($value["tieneIva"] == "Si" && $value["parciales"] == 1 && $value["tieneRetenciones"] == 0 ) {

			                    echo '<td style="text-transform:uppercase">'.number_format($value["iva"],2).'</td>';

			                }
			                else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 01) {

			                    echo '<td style="text-transform:uppercase">0.00</td>';
			                            
			                }else if ($value["tieneIva"] == "Si" && $value["tieneRetenciones"] == 01) {
			                    
			                   	echo '<td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"])*0.16,2).'</td>';
			                
			                }else{

			                    echo '<td style="text-transform:uppercase">0.00</td>';

			                }


			                          /***************************************************/
			                if ($value["tieneRetenciones"] == 1 || $value["tieneRetenciones"] == 01 ) {

			                   	if ($value["tipoRetencion"] == "Arrendamiento" && $value["tieneRetenciones"] == 0) {

			                        echo '<td style="text-transform:uppercase">'.number_format($value["retIva"],2).'</td>
			                        <td style="text-transform:uppercase">'.number_format($value["retIsr"],2).'</td>';

			                    }else if ($value["tipoRetencion"] == "Arrendamiento" && $value["tieneRetenciones"] == 01) {
			                    	echo '<td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"]* 10.6667)/100,2).'</td>
			                        <td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"]*10)/100,2).'</td>';
			                    
			                    }else {

			                        echo '<td style="text-transform:uppercase">0.00</td>
			                        <td style="text-transform:uppercase">0.00</td>';

			                    }
			                    
			                    if ($value["tipoRetencion"] == "Flete" && $value["tieneRetenciones"] == 0) {

			                        echo '<td style="text-transform:uppercase">'.number_format($value["retIva2"],2).'</td>
			                        <td style="text-transform:uppercase">'.number_format($value["retIsr2"],2).'</td>';

			                    }else if ($value["tipoRetencion"] == "Flete" && $value["tieneRetenciones"] == 01) {
			                                
			                        echo '<td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"]*4)/100,2).'</td>
			                        <td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"]*0)/100,2).'</td>';

			                    }else {

			                        echo '<td style="text-transform:uppercase">0.00</td>
			                        <td style="text-transform:uppercase">0.00</td>';

			                    }

			                    if ($value["tipoRetencion"] == "Honorarios" && $value["tieneRetenciones"] == 0) {
			                            
			                        echo '<td style="text-transform:uppercase">'.number_format($value["retIva3"],2).'</td>
			                        <td style="text-transform:uppercase">'.number_format($value["retIsr3"],2).'</td>';

			                    }else if($value["tipoRetencion"] == "Honorarios" && $value["tieneRetenciones"] == 01){

			                        echo '<td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"]*10.6667)/100,2).'</td>
			                        <td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"]*10)/100,2).'</td>';
			                    
			                    }else{

			                        echo '<td style="text-transform:uppercase">0.00</td>
			                        <td style="text-transform:uppercase">0.00</td>';

			                    }
			      
			                }else {

			                   	echo '
			                   	<td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                    <td style="text-transform:uppercase">0.00</td>
			                </tr>';

			                }
			                  /*=========================================
			                =            MOSTRAR PARCIALES            =
			                =========================================*/
			                if ($value["tieneIva"] == "No") {

											$importe1 = $value["parcial"];
											$importe2 = $value["parcial2"];
											$importe3 = $value["parcial3"];
											$importe4 = $value["parcial4"];
											$importe5 = $value["parcial5"];
											$importe6 = $value["parcial6"];
											$importe7 = $value["parcial7"];
											$importe8 = $value["parcial8"];
											$importe9 = $value["parcial9"];
											$importe10 = $value["parcial10"];
											$importe11 = $value["parcial11"];
											$importe12 = $value["parcial12"];
											
											$iva1 = 0;
											$iva2 = 0;
											$iva3 = 0;
											$iva4 = 0;
											$iva5 = 0;
											$iva6 = 0;
											$iva7 = 0;
											$iva8 = 0;
											$iva9 = 0;
											$iva10 =  0;
											$iva11 =  0;
											$iva12 =  0;
											
										}else {

											
											$importe1 = ($value["parcial"]/1.16);
											$importe2 = ($value["parcial2"]/1.16);
											$importe3 = ($value["parcial3"]/1.16);
											$importe4 = ($value["parcial4"]/1.16);
											$importe5 = ($value["parcial5"]/1.16);
											$importe6 = ($value["parcial6"]/1.16);
											$importe7 = ($value["parcial7"]/1.16);
											$importe8 = ($value["parcial8"]/1.16);
											$importe9 = ($value["parcial9"]/1.16);
											$importe10 = ($value["parcial10"]/1.16);
											$importe11 = ($value["parcial11"]/1.16);
											$importe12 = ($value["parcial12"]/1.16);

											$iva1 = ($value["parcial"]/1.16)*0.16;
											$iva2 = ($value["parcial2"]/1.16)*0.16;
											$iva3 = ($value["parcial3"]/1.16)*0.16;
											$iva4 = ($value["parcial4"]/1.16)*0.16;
											$iva5 = ($value["parcial5"]/1.16)*0.16;
											$iva6 = ($value["parcial6"]/1.16)*0.16;
											$iva7 = ($value["parcial7"]/1.16)*0.16;
											$iva8 = ($value["parcial8"]/1.16)*0.16;
											$iva9 = ($value["parcial9"]/1.16)*0.16;
											$iva10 = ($value["parcial10"]/1.16)*0.16;
											$iva11 = ($value["parcial11"]/1.16)*0.16;
											$iva12 = ($value["parcial12"]/1.16)*0.16;


										}
			                if ($value["parciales"] == 0 || $value["parciales"] == 1) {

				 	  		
				 	  						
				 	  		}else{

				 	  			if ($value["departamento"] ==  "SANTIAGO" || $value["departamento"] ==  "REFORMA" || $value["departamento"] ==  "SAN MANUEL" || $value["departamento"] ==  "VERGEL" || $value["departamento"] ==  "XONACA" || $value["departamento"] ==  "MAYOREO"  || $value["departamento"] ==  "MAYORAZGO" || $value["departamento"] ==  "LAS TORRES" || $value["departamento"] ==  "INDUSTRIAL"  || $value["departamento"] ==  "DIAGONAL" || $value["departamento"] ==  "CAPU" || $value["departamento"] ==  "CEDIS" ) {


				 	  				$tablaB = $tabla;
				                $item = "idMovimientoBanco";
				                $valor =  $value["id"];
				                $tipo = "cerrado";

				                $mostrarParciales = ModeloReporteador::mdlMostrarListaParcialesMovimiento($tablaB,$item,$valor,$tipo);

				                foreach ($mostrarParciales as $key => $value) {
				                	

				                	echo utf8_decode("<tr>
					 			
					 						<td style='color:black;'>".$value["id"]."</td>
					 						<td style='color:black;'>".$value["departamento"]."</td>
					 						<td style='color:black;'>".$value["grupo"]."</td>
					 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
					 						<td style='color:black;'>".$value["mes"]."</td>
					 						<td style='color:black;'>".$value["fecha"]."</td>
					 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
					 						<td style='color:black;'>0</td>
					 						<td style='color:black;'>0</td>
					 						<td style='color:black;'>".$value["saldo"]."</td>
					 						<td style='color:black;'>".$value["comprobacion"]."</td>
					 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
					 						<td style='color:black;'>".$value["parcial"]."</td>
					 						<td style='color:black;'>".$value["serie"]."</td>
					 						<td style='color:black;'>".$value["folio"]."</td>
					 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
					 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
					 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
					 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
					 						<td style='color:black;'>".$value["parcial"]/1.16."</td>
					 						<td style='color:black;'>".($value["parcial"]/1.16)*0.16."</td>
					 						<td style='color:black;'>0</td>
					 						<td style='color:black;'>0</td>
					 						<td style='color:black;'>0</td>
					 						<td style='color:black;'>0</td>
					 						<td style='color:black;'>0</td>
					 						<td style='color:black;'>0</td></tr>");



				                }
			                

				 	  		
					 	  						
					 	  		}else{
					 	  											/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
								if ($value["parciales"] == 1) {
										
									
										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 					

										}
								else if ($value["parciales"] == 2) {

									
											echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");


				 					

										}
								else if ($value["parciales"] == 3) {

									echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");


				 					

										}
								else if ($value["parciales"] == 4) {

									
										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");
				 					

										}

								else if ($value["parciales"] == 5) {


										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
								else if ($value["parciales"] == 6) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");
										
										}
								else if ($value["parciales"] == 7) {

									
										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
							else if ($value["parciales"] == 8) {

										
										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
							else if ($value["parciales"] == 9) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial9"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial9"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe9."</td>
				 						<td style='color:black;'>".$iva9."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");
										

										}
							else if ($value["parciales"] == 10) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial9"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial9"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe9."</td>
				 						<td style='color:black;'>".$iva9."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial10"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial10"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe10."</td>
				 						<td style='color:black;'>".$iva10."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
						else if ($value["parciales"] == 11) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial9"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial9"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe9."</td>
				 						<td style='color:black;'>".$iva9."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial10"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial10"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe10."</td>
				 						<td style='color:black;'>".$iva10."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial11"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial11"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe11."</td>
				 						<td style='color:black;'>".$iva11."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
							else if ($value["parciales"] == 12) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial9"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial9"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe9."</td>
				 						<td style='color:black;'>".$iva9."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial10"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial10"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe10."</td>
				 						<td style='color:black;'>".$iva10."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial11"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial11"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe11."</td>
				 						<td style='color:black;'>".$iva11."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial12"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial12"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe12."</td>
				 						<td style='color:black;'>".$iva12."</td>
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
	public function ctrDescargarReporteRangoFechasCredito(){

		if(isset($_GET["bancoRangoFechasCredito"])){
			session_start();


			$tabla = $_GET["bancoRangoFechasCredito"];

			$item = "fecha";
	    	if (isset($_GET["fechaInicioF"])) {

		        $valor1 = $_GET["fechaInicioF"];

		        $hoy = date("Y-m-d");


		        if ($hoy === $valor1) {

		        	  $fecha = str_replace('-', '/', $valor1);
	        		  $fechaInicio = date('d/m/Y', strtotime($fecha."- 7 days"));

		        }else{

		        	  $fecha = str_replace('-', '/', $valor1);
	        		  $fechaInicio = date('d/m/Y', strtotime($fecha));

		        }

	    	}else{
		        $hoy = date("Y-m-d");

		        $fecha = str_replace('-', '/', $hoy);
	        	$fechaInicio = date('d/m/Y', strtotime($fecha."- 7 days"));
	        	$valor1 = $hoy;
	    	}

		    if (isset($_GET["fechaFinalF"])) {

		        $valor2 = $_GET["fechaFinalF"];

		        $fecha = str_replace('-', '/', $valor2);
	        	$fechaFinal = date('d/m/Y', strtotime($fecha));


		    }else{
		        $hoy = date("Y-m-d");

		        $fecha = str_replace('-', '/', $hoy);
	        	$fechaFinal = date('d/m/Y', strtotime($fecha));
	        	$valor2 = $hoy;
		    }

			$datos = "&nbsp; DEL &nbsp; DIA &nbsp;<br>".$fechaInicio." AL ".$fechaFinal;


			$reporteRangoFechasCredito = ModeloReporteador::mdlDescargarReporteRangoFechasCredito($tabla,$item,$valor1,$valor2);
			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			$nombreArchivo = "REPORTE-CREDITO ".strtoupper($tabla);
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");

			/*=============================================
			REPORTE LISTA DE FACTURAS
			=============================================*/

			if($_GET["bancoRangoFechasCredito"] == "banco0198" || $_GET["bancoRangoFechasCredito"] == "banco6278"){

				$arregloCamposBanco0198Credito = ['N°','Departamento','Grupo','Subgrupo','Mes','Fecha','Descripción','Abono','Parcial','Serie','Folio','N° de Movimiento','Cliente / Proveedor / Acreedor','Concepto','Número de Documento','Importe','Iva'];

				echo utf8_decode("<table>");
				echo "<tr>
						<th colspan='17' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
						<th colspan='17' style='font-weight:bold; background:#17202A; color:white;'>&nbsp; R E P O R T E &nbsp; B A N C A R I O &nbsp; ".strtoupper($tabla)."  &nbsp;&nbsp</th>
					</tr>

					<tr>
						<th colspan='17' style='font-weight:bold; background:#17202A; color:white;'>".$datos."</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($arregloCamposBanco0198Credito); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposBanco0198Credito as $key => $value) {
						
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");

	
				foreach ($reporteRangoFechasCredito as $key => $value) {

					echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamento"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;'>".$value["descripcion"]."</td>");

								 	  	if ($value["parciales"] == 0) {

								 	  		echo "<td style='color:black;'>".$value["abono"]."</td>";
								 	  						
								 	  	}else {

								 	  		echo "<td style='color:black;'>".$value["abono"]."</td>";		

								 	  	}
				 	  					echo utf8_decode("
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;text-align:left'>".$value["numeroDocumento"]."</td>");
				 						if ($value["tieneIva"] == "Si" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0) {
                            
			                              echo '<td style="text-transform:uppercase">'.number_format(($value["importe"]/1.16),2).'</td>';

			                          }else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 0) {

			                            //echo '<td style="text-transform:uppercase">$ '.number_format(($value2["importeParciales"]/1.16),2).'</td>';
			                            echo '<td style="text-transform:uppercase">0.00</td>';
			                            
			                          }else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 01) {

			                            echo '<td style="text-transform:uppercase">0.00</td>';
			                          
			                          }else if ($value["tieneIva"] == "Si" && $value["tieneRetenciones"] == 01) {
			                            echo '<td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"]),2).'</td>';
			                          }
			                          else if($value["tieneIva"] == "No" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0){ 

			                                echo '<td style="text-transform:uppercase">'.number_format($value["importe"],2).'</td>';

			                          }else if($value["tieneIva"] == "No" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 0){

			                              echo '<td style="text-transform:uppercase">0.00</td>';

			                          }else if ($value["tieneIva"] == "No" && $value["tieneRetenciones"] == 01) {
			                             echo '<td style="text-transform:uppercase">'.number_format($value["importeRetenciones"],2).'</td>';
			                          }
			                          

			                          if ($value["tieneIva"] == "Si" && $value["parciales"] == 0 && $value["tieneRetenciones"] == 0 ) {

			                            echo '<td style="text-transform:uppercase">'.number_format($value["iva"],2).'</td>';

			                          }else if ($value["tieneIva"] == "Si" && $value["parciales"] > 0 && $value["tieneRetenciones"] == 01) {

			                            echo '<td style="text-transform:uppercase">0.00</td>';
			                            
			                          }else if ($value["tieneIva"] == "Si" && $value["tieneRetenciones"] == 01) {
			                             echo '<td style="text-transform:uppercase">'.number_format(($value["importeRetenciones"])*0.16,2).'</td>';
			                          }
			                          else{

			                            echo '<td style="text-transform:uppercase">0.00</td></tr>';

			                          }
			                            /*=========================================
					                =            MOSTRAR PARCIALES            =
					                =========================================*/
					                  if ($value["tieneIva"] == "No") {

											$importe1 = $value["parcial"];
											$importe2 = $value["parcial2"];
											$importe3 = $value["parcial3"];
											$importe4 = $value["parcial4"];
											$importe5 = $value["parcial5"];
											$importe6 = $value["parcial6"];
											$importe7 = $value["parcial7"];
											$importe8 = $value["parcial8"];
											$importe9 = $value["parcial9"];
											$importe10 = $value["parcial10"];
											$importe11 = $value["parcial11"];
											$importe12 = $value["parcial12"];
											
											$iva1 = 0;
											$iva2 = 0;
											$iva3 = 0;
											$iva4 = 0;
											$iva5 = 0;
											$iva6 = 0;
											$iva7 = 0;
											$iva8 = 0;
											$iva9 = 0;
											$iva10 =  0;
											$iva11 =  0;
											$iva12 =  0;
											
										}else {

											
											$importe1 = ($value["parcial"]/1.16);
											$importe2 = ($value["parcial2"]/1.16);
											$importe3 = ($value["parcial3"]/1.16);
											$importe4 = ($value["parcial4"]/1.16);
											$importe5 = ($value["parcial5"]/1.16);
											$importe6 = ($value["parcial6"]/1.16);
											$importe7 = ($value["parcial7"]/1.16);
											$importe8 = ($value["parcial8"]/1.16);
											$importe9 = ($value["parcial9"]/1.16);
											$importe10 = ($value["parcial10"]/1.16);
											$importe11 = ($value["parcial11"]/1.16);
											$importe12 = ($value["parcial12"]/1.16);

											$iva1 = ($value["parcial"]/1.16)*0.16;
											$iva2 = ($value["parcial2"]/1.16)*0.16;
											$iva3 = ($value["parcial3"]/1.16)*0.16;
											$iva4 = ($value["parcial4"]/1.16)*0.16;
											$iva5 = ($value["parcial5"]/1.16)*0.16;
											$iva6 = ($value["parcial6"]/1.16)*0.16;
											$iva7 = ($value["parcial7"]/1.16)*0.16;
											$iva8 = ($value["parcial8"]/1.16)*0.16;
											$iva9 = ($value["parcial9"]/1.16)*0.16;
											$iva10 = ($value["parcial10"]/1.16)*0.16;
											$iva11 = ($value["parcial11"]/1.16)*0.16;
											$iva12 = ($value["parcial12"]/1.16)*0.16;


										}
					                if ($value["parciales"] == 0 || $value["parciales"] == 1) {

						 	  		
						 	  						
						 	  		}else{
						 	  			if ($value["departamento"] ==  "SANTIAGO" || $value["departamento"] ==  "REFORMA" || $value["departamento"] ==  "SAN MANUEL" || $value["departamento"] ==  "VERGEL" || $value["departamento"] ==  "XONACA" || $value["departamento"] ==  "MAYOREO"  || $value["departamento"] ==  "MAYORAZGO" || $value["departamento"] ==  "LAS TORRES" || $value["departamento"] ==  "INDUSTRIAL"  || $value["departamento"] ==  "DIAGONAL" || $value["departamento"] ==  "CAPU" || $value["departamento"] ==  "CEDIS" ) {

						 	  				$tablaB = $tabla;
						                $item = "idMovimientoBanco";
						                $valor =  $value["id"];
						                $tipo = "cerrado";

						                $mostrarParciales = ModeloReporteador::mdlMostrarListaParcialesMovimiento($tablaB,$item,$valor,$tipo);

						                foreach ($mostrarParciales as $key => $value) {
						                	

						                	echo utf8_decode("<tr>
							 			
							 						<td style='color:black;'>".$value["id"]."</td>
							 						<td style='color:black;'>".$value["departamento"]."</td>
							 						<td style='color:black;'>".$value["grupo"]."</td>
							 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
							 						<td style='color:black;'>".$value["mes"]."</td>
							 						<td style='color:black;'>".$value["fecha"]."</td>
							 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
							 						<td style='color:black;'>0</td>
							 					
							 						<td style='color:black;'>".$value["parcial"]."</td>
							 						<td style='color:black;'>".$value["serie"]."</td>
							 						<td style='color:black;'>".$value["folio"]."</td>
							 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
							 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
							 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
							 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
							 					
							 						<td style='color:black;'>".$value["parcial"]/1.16."</td>
					 								<td style='color:black;'>".($value["parcial"]/1.16)*0.16."</td></tr>");



						                }

						 	  			}else{

						 	  												/* AQUI INICIAN LAS MUESTRAS DE LOS PARCIALES */
								if ($value["parciales"] == 1) {
										
									
										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 					

										}
								else if ($value["parciales"] == 2) {

									
											echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");


				 					

										}
								else if ($value["parciales"] == 3) {

									echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");


				 					

										}
								else if ($value["parciales"] == 4) {

									
										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");
				 					

										}

								else if ($value["parciales"] == 5) {


										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
								else if ($value["parciales"] == 6) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");
										
										}
								else if ($value["parciales"] == 7) {

									
										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
							else if ($value["parciales"] == 8) {

										
										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
							else if ($value["parciales"] == 9) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial9"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial9"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe9."</td>
				 						<td style='color:black;'>".$iva9."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");
										

										}
							else if ($value["parciales"] == 10) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial9"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial9"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe9."</td>
				 						<td style='color:black;'>".$iva9."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial10"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>".$value["abono"]."</td>
				 						<td style='color:black;'>".$value["saldo"]."</td>
				 						<td style='color:black;'>".$value["comprobacion"]."</td>
				 						<td style='color:black;'>".number_format($value["diferencia"],2)."</td>
				 						<td style='color:black;'>".$value["parcial10"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe10."</td>
				 						<td style='color:black;'>".$iva10."</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td>
				 						<td style='color:black;'>0</td></tr>");

										}
						else if ($value["parciales"] == 11) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial9"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial9"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe9."</td>
				 						<td style='color:black;'>".$iva9."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial10"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial10"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe10."</td>
				 						<td style='color:black;'>".$iva10."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial11"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial11"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe11."</td>
				 						<td style='color:black;'>".$iva11."</td></tr>");

										}
							else if ($value["parciales"] == 12) {

										echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial1"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe1."</td>
				 						<td style='color:black;'>".$iva1."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial2"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial2"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe2."</td>
				 						<td style='color:black;'>".$iva2."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial3"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial3"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe3."</td>
				 						<td style='color:black;'>".$iva3."</td></tr>");

				 							echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial4"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial4"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe4."</td>
				 						<td style='color:black;'>".$iva4."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial5"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial5"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe5."</td>
				 						<td style='color:black;'>".$iva5."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial6"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial6"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe6."</td>
				 						<td style='color:black;'>".$iva6."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial7"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial7"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe7."</td>
				 						<td style='color:black;'>".$iva7."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial8"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial8"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe8."</td>
				 						<td style='color:black;'>".$iva8."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial9"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial9"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe9."</td>
				 						<td style='color:black;'>".$iva9."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial10"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial10"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe10."</td>
				 						<td style='color:black;'>".$iva10."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial11"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial11"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe11."</td>
				 						<td style='color:black;'>".$iva11."</td></tr>");

				 						echo utf8_decode("<tr>
				 			
				 						<td style='color:black;'>".$value["id"]."</td>
				 						<td style='color:black;'>".$value["departamentoParcial12"]."</td>
				 						<td style='color:black;'>".$value["grupo"]."</td>
				 						<td style='color:black;width:420px'>".$value["subgrupo"]."</td>
				 						<td style='color:black;'>".$value["mes"]."</td>
				 						<td style='color:black;'>".$value["fecha"]."</td>
				 						<td style='color:black;width:600px'>".$value["descripcion"]."</td>
				 						<td style='color:black;'>0</td>
				 						
				 						<td style='color:black;'>".$value["parcial12"]."</td>
				 						<td style='color:black;'>".$value["serie"]."</td>
				 						<td style='color:black;'>".$value["folio"]."</td>
				 						<td style='color:black;'>".$value["numeroMovimiento"]."</td>
				 						<td style='color:black;width:420px'>".$value["acreedor"]."</td>
				 						<td style='color:black;width:420px'>".$value["concepto"]."</td>
				 						<td style='color:black;'>".$value["numeroDocumento"]."</td>
				 						<td style='color:black;'>".$importe12."</td>
				 						<td style='color:black;'>".$iva12."</td></tr>");

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

	
}

?>