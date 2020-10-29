<?php
ob_start();
require_once "../../../db_connect.php";

// establesco las variables q voy a utilizar de las fechas

	$fechaInicio = $_POST["fechaInicio"];
	$fechaFinal = $_POST["fechaFinal"];


$sql_query = "SELECT * FROM banco0198 WHERE fecha BETWEEN '$fechaInicio' AND ('$fechaFinal+1') ORDER BY id DESC";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));

$numeroRegistros = mysqli_num_rows($resultset);
//echo "cant reg:".$numeroRegistros;
if($numeroRegistros==0)
{
  $mensaje = '<SCRIPT name="accion"> alert("No se encontraron resultados")</SCRIPT>';
    echo $mensaje;
}
/**PHPExcel
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.2, 2010-01-11*/

ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Mexico_City');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once  '../../../phpExcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Marco Antonio López Pérez")
							 ->setLastModifiedBy("")
							 ->setTitle("Reporte Por Fechas")
							 ->setSubject("Reporte Por Fechas")
							 ->setDescription("Reporte Por Fechas.")
							 ->setKeywords("Reporte Por Fechas")
							 ->setCategory("Test result file");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'N°')
            ->setCellValue('B1', 'Departamento')
            ->setCellValue('C1', 'Grupo')
            ->setCellValue('D1', 'Subgrupo')
            ->setCellValue('E1', 'Mes')
            ->setCellValue('F1', 'Fecha')
            ->setCellValue('G1', 'Descripcion')
            ->setCellValue('H1', 'Cargo')
            ->setCellValue('I1', 'Abono')
            ->setCellValue('J1', 'Saldo')
            ->setCellValue('K1', 'Comprobacion')
            ->setCellValue('L1', 'Diferencia')
            ->setCellValue('M1', 'Parcial')
            ->setCellValue('N1', 'Serie')
            ->setCellValue('O1', 'Folio')
            ->setCellValue('P1', 'N° de Movimiento')
            ->setCellValue('Q1', 'Cliente / Proveedor / Acreedor')
            ->setCellValue('R1', 'Concepto')
            ->setCellValue('S1', 'Número de Documento')
            ->setCellValue('T1', 'Importe')
            ->setCellValue('U1', 'Iva')
            ->setCellValue('V1', 'RetIVA')
            ->setCellValue('W1', 'RetISR')
            ->setCellValue('X1', 'RetIVA')
            ->setCellValue('Y1', 'RetISR')
            ->setCellValue('Z1', 'RetIVA')
            ->setCellValue('AA1', 'RetISR');

            $estilo = array(
				    'font'  => array(
				        'bold'  => true,
				        'size'  => 8,
				        'color' => array('rgb' => 'FFFFFF'),
				        'name'  => 'Verdana'
				    ));
            $alineacion = array( 
			        'alignment' => array(
			            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
			        )
			    );
            $alineacion2 = array( 
			        'alignment' => array(
			            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
			        )
			    );

    
			function cellColor($cells,$color){
			    global $objPHPExcel;

			    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
			        'type' => PHPExcel_Style_Fill::FILL_SOLID,
			        'startcolor' => array(
			             'rgb' => $color
			        )
			    ));
			}

cellcolor('A1:AA1', '000000');

$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('K1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('L1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('M1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('N1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('O1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('P1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('Q1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('R1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('S1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('T1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('U1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('V1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('W1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('X1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('Y1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('Z1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('AA1')->applyFromArray($estilo);


$objPHPExcel->getActiveSheet()->getStyle('L')->getNumberFormat()->setFormatCode('#,##0'); 
$objPHPExcel->getActiveSheet()->getStyle("S")->applyFromArray($alineacion);
$objPHPExcel->getActiveSheet()->getStyle("T")->applyFromArray($alineacion2);           		

$reporte = "SELECT * FROM banco0198 WHERE fecha BETWEEN '$fechaInicio' AND ('$fechaFinal+1') ORDER BY id DESC";
$reporteResultado= mysqli_query($conn, $reporte) or die("database error:". mysqli_error($conn)); 


$i = 2;
while ($row = $reporteResultado->fetch_array(MYSQLI_ASSOC)) {
    								
				 	  	if ($row["parciales"] == 0) {

				 	  					$abono = $row['abono'];
				 	  						
				 	  					}else {

				 	  					$abono = '0';		

				 	  					}

				 	  	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($row["tieneIva"] == "Si" && $row["parciales"] == 0 && $row["tieneRetenciones"] == 0) {
                            
                             $importe = ''.number_format(($row["importe"]/1.16),2).'';

                          }else if ($row["tieneIva"] == "Si" && $row["parciales"] > 0 && $row["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($row2["importeParciales"]/1.16),2).'';
                            $importe = '0';
                            
                          }else if ($row["tieneIva"] == "Si" && $row["parciales"] > 0 && $row["tieneRetenciones"] == 01) {

                           $importe = '0';
                          
                          }else if ($row["tieneIva"] == "Si" && $row["tieneRetenciones"] == 01) {
                            $importe = ''.number_format(($row["importeRetenciones"]/1.16),2).'';
                          }
                          else if($row["tieneIva"] == "No" && $row["parciales"] == 0 && $row["tieneRetenciones"] == 0){ 

                               $importe = ''.number_format($row["importe"],2).'';

                          }else if($row["tieneIva"] == "No" && $row["parciales"] > 0 && $row["tieneRetenciones"] == 0){

                              $importe = '0';

                          }else if ($row["tieneIva"] == "No" && $row["tieneRetenciones"] == 01) {
                             $importe =''.number_format($row["importeRetenciones"],2).'';
                          }
                          

                          if ($row["tieneIva"] == "Si" && $row["parciales"] == 0 && $row["tieneRetenciones"] == 0 ) {

                            $iva = ''.number_format($row["iva"],2).'';

                          }else if ($row["tieneIva"] == "Si" && $row["parciales"] > 0 && $row["tieneRetenciones"] == 01) {

                           $iva = '0';
                            
                          }else if ($row["tieneIva"] == "Si" && $row["tieneRetenciones"] == 01) {
                            $iva = ''.number_format(($row["importeRetenciones"]/1.16)*0.16,2).'';
                          }
                          else{

                           $iva = '0';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($row["tieneRetenciones"] == 1 || $row["tieneRetenciones"] == 01 ) {

                            if ($row["tipoRetencion"] == "Arrendamiento" && $row["tieneRetenciones"] == 0) {

                              $retIva =  ''.number_format($row["retIva"],2).'';
                              $retIsr = ''.number_format($row["retIsr"],2).'';

                            }else if ($row["tipoRetencion"] == "Arrendamiento" && $row["tieneRetenciones"] == 01) {
                              $retIva = ''.number_format(($row["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = ''.number_format(($row["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '0';
                              $retIsr = '0';

                            }if ($row["tipoRetencion"] == "Flete" && $row["tieneRetenciones"] == 0) {

                              $retIva2 = ''.number_format($row["retIva2"],2).'';
                              $retIsr2 = ''.number_format($row["retIsr2"],2).'';

                            }else if ($row["tipoRetencion"] == "Flete" && $row["tieneRetenciones"] == 01) {
                                
                              $retIva2 = ''.number_format(($row["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = ''.number_format(($row["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '0';
                              $retIsr2 = '0';

                            }if ($row["tipoRetencion"] == "Honorarios" && $row["tieneRetenciones"] == 0) {
                            
                              $retIva3 = ''.number_format($row["retIva3"],2).'';
                              $retIsr3 = ''.number_format($row["retIsr3"],2).'';

	                          }else if($row["tipoRetencion"] == "Honorarios" && $row["tieneRetenciones"] == 01){

	                          $retIva3 = ''.number_format(($row["importeRetenciones"]*10)/100,2).'';
	                          $retIsr3 = ''.number_format(($row["importeRetenciones"]*10)/100,2).'';

	                          }
	                          else{

	                          $retIva3 = '0';
	                          $retIsr3 = '0';

	                          }
	      
	                          }else {

	                           $retIva = '0';
	                           $retIsr = '0';
	                           $retIva2 = '0';
	                           $retIsr2 = '0';
	                           $retIva3 = '0';
	                           $retIsr3 = '0';

	                          }
    $objPHPExcel->setActiveSheetIndex(0)
    			->setCellValue("A$i", $row['id'])
	            ->setCellValue("B$i", $row['departamento'])
	            ->setCellValue("C$i", $row['grupo'])
	            ->setCellValue("D$i", $row['subgrupo'])
	            ->setCellValue("E$i", $row['mes'])
	            ->setCellValue("F$i", $row['fecha'])
	            ->setCellValue("G$i", $row['descripcion'])
	            ->setCellValue("H$i", $row['cargo'])
	            ->setCellValue("I$i", $abono)
	            ->setCellValue("J$i", $row['saldo'])
	            ->setCellValue("K$i", $row['comprobacion'])
	            ->setCellValue("L$i", $row['diferencia'])
	            ->setCellValue("M$i", '0')
	            ->setCellValue("N$i", $row['serie'])
	            ->setCellValue("O$i", $row['folio'])
	            ->setCellValue("P$i", $row['numeroMovimiento'])
	            ->setCellValue("Q$i", $row['acreedor'])
	            ->setCellValue("R$i", $row['concepto'])
	            ->setCellValue("S$i", $row['numeroDocumento'])
	            ->setCellValue("T$i", $importe)
	            ->setCellValue("U$i", $iva)
	            ->setCellValue("V$i", $retIva)
	            ->setCellValue("W$i", $retIsr)
	            ->setCellValue("X$i", $retIva2)
	            ->setCellValue("Y$i", $retIsr2)
	            ->setCellValue("Z$i", $retIva3)
	            ->setCellValue("AA$i",$retIsr3);



	            // Auto size columns for each worksheet 
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) { 

    $objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet)); 

    $sheet = $objPHPExcel->getActiveSheet(); 
    $cellIterator = $sheet->getRowIterator()->current()->getCellIterator(); 
    $cellIterator->setIterateOnlyExistingCells(true); 
    /** @var PHPExcel_Cell $cell */ 
    foreach ($cellIterator as $cell) { 
     $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true); 
    } 
} 


$i++;
}




// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Reporte 0198');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="reporteBanco0198.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
$objWriter->save('php://output');
exit;
