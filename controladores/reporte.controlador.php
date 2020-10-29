<?php
error_reporting(0);

use phpoffice\phpspreadsheet\src\PhpSpreadsheet\Spreadsheet;
use phpoffice\phpspreadsheet\src\PhpSpreadsheet\Writer\Xlsx;
//require_once('extensiones/vendor/phpoffice/PhpSpreadsheet/src/PhpSpreadsheet/Writer/Xlsx');
//require_once('extensiones/vendor/phpoffice/PhpSpreadsheet/src/PhpSpreadsheet/Spreadsheet');

class ControladorReporte{

	/*=============================================
	MOSTRAR CABECERAS
	=============================================*/

	static public function ctrReporteExcelPedido($id_pedido){

		require __DIR__ . '/../extensiones/vendor/autoload.php';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="gasto-'. $id_pedido . '.xlsx"');
		header('Cache-Control: max-age=0');

		$spreadsheet = new Spreadsheet();
	
		$arregloNombres = ['Partida','Fecha','Proveedor','N° de Factura','Importe','IVA','Total','Concepto']; 
		$filas = ['A','B','C','D','E','F','G','H'];
		$arregloCampos = ['id','fecha','acreedor','numeroDocumento','importeGasto','iva','importeGasto','descripcion'];

		$spreadsheet->setActiveSheetIndex(0)->mergeCells('A3:H3');
		$spreadsheet->setActiveSheetIndex(0)->mergeCells('A4:H4');
		$spreadsheet->setActiveSheetIndex(0)->mergeCells('A5:H5');
		$spreadsheet->setActiveSheetIndex(0)->mergeCells('A6:H6');

		setlocale(LC_TIME,"es_MX");
		$fecha = date('d-m-Y H:i:s');

		$item = 'id';
		$idGastos = str_replace('-',',',$id_pedido);
		$valor = $idGastos;
		$listaGastos = ModeloFacturasTiendas::mdlGenerarReembolso($item,$valor);


		foreach ($arregloNombres as $key => $value) {
			$sheet = $spreadsheet->getActiveSheet();

			$sheet->setCellValue(''.$filas[$key].'7', $value);
			$spreadsheet->getActiveSheet()->getStyle(''.$filas[$key].'7')->getFont()->setBold(true);
			$spreadsheet->getActiveSheet()->getStyle(''.$filas[$key].'7')->getFont()->setSize(12);

			$sheet->setCellValue('A3', 'Pinturas y Complementos de Puebla, S.A. de C.V.');
			$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
			$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(20);
			$sheet->getStyle('A3')->getAlignment()->setHorizontal('center');
			$sheet->getStyle('A4')->getAlignment()->setHorizontal('left');
			$sheet->getStyle('A5')->getAlignment()->setHorizontal('left');
			$sheet->setCellValue('A4', 'Reembolso Caja');
			$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
			$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(16);
			$sheet->setCellValue('A5', $fecha);
			$spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setBold(false);
			$spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setSize(12);

			$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A4:H5')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A7:H7')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			
			$spreadsheet->getActiveSheet()->getStyle('A1:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('141518');
			$spreadsheet->getActiveSheet()->getStyle('A4:H5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('979797');
			$spreadsheet->getActiveSheet()->getStyle('A6:H7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('398792');
			/*LLENAR DATOS DE LAS FILAS DE LAS TABLAS*/
			
		}
		foreach ($filas as $key => $value) {
			$spreadsheet->getActiveSheet()->getColumnDimension(''.$value.'')->setAutoSize(true);

			//$spreadsheet->getActiveSheet()->getColumnDimension(''.$filas[$key].'2')->setHeight(67.44);
		}

		foreach ($listaGastos as $key => $value) {

			$acum = $key+8;
			$sum = $key+1;
			$sheet->setCellValue('A'.$acum.'', $sum);
			$sheet->setCellValue('B'.$acum.'', $value["fecha"]);
			$sheet->setCellValue('C'.$acum.'', $value["acreedor"]);
			$sheet->setCellValue('D'.$acum.'', $value["numeroDocumento"]);
			$sheet->setCellValue('E'.$acum.'', number_format((float)$value["importeGasto"]-$value["iva"], 2, '.',''));
			$sheet->setCellValue('F'.$acum.'', number_format((float)$value["iva"], 2, '.',''));
			$sheet->setCellValue('G'.$acum.'', number_format((float)$value["importeGasto"], 2, '.',''));
			$sheet->setCellValue('H'.$acum.'', $value["descripcion"]);
			
		}


		$styleArray = array(
		    'borders' => array(
		        'allBorders' => array(
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => array('argb' => '646464'),
			        ),
			    ),
			);
		$inicio = 8;
		$sumador = $acum+1;
		$sheet = $sheet ->getStyle('A'.$inicio.':H'.$acum)->applyFromArray($styleArray);

		$spreadsheet->getActiveSheet()
		    ->setCellValue('E'.$sumador, '=SUM(E'.$inicio.':E'.$acum.')');
		$spreadsheet->getActiveSheet()
		    ->setCellValue('F'.$sumador, '=SUM(F'.$inicio.':F'.$acum.')');
		$spreadsheet->getActiveSheet()
		    ->setCellValue('G'.$sumador, '=SUM(G'.$inicio.':G'.$acum.')');
		$spreadsheet->getActiveSheet()->getProtection()->setSheet(true); 

		$spreadsheet->getActiveSheet()->getStyle('E'.$sumador.':G'.$sumador)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('398792');

		$spreadsheet->getActiveSheet()->getStyle('E'.$sumador.':G'.$sumador)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

		$spreadsheet->getActiveSheet()->getStyle('E'.$sumador.':G'.$sumador)->applyFromArray($styleArray);


		//$sheet = $sheet ->getStyle('E'.$sumador.':G'.$sumador)->applyFromArray($styleArray);
		$finLista = $sumador+5;
		$spreadsheet->setActiveSheetIndex(0)->mergeCells('A'.$finLista.':B'.$finLista);
		$finLista = $sumador+5;
		$spreadsheet->setActiveSheetIndex(0)->mergeCells('E'.$finLista.':G'.$finLista);

		$spreadsheet->getActiveSheet()
		    ->setCellValue('A'.$finLista, 'Nombre y Firma de Recibido');
		$spreadsheet->getActiveSheet()
		    ->setCellValue('E'.$finLista, 'Nombre y Firma de Entregado');
		$spreadsheet->getActiveSheet()->getStyle('A'.$finLista)->getFont()->setBold(true);
		$spreadsheet->getActiveSheet()->getStyle('A'.$finLista)->getFont()->setSize(9);
		$spreadsheet->getActiveSheet()->getStyle('E'.$finLista)->getFont()->setBold(true);
		$spreadsheet->getActiveSheet()->getStyle('E'.$finLista)->getFont()->setSize(9);

		$styleArray1 = array(
		    'borders' => array(
		        'bottom' => array(
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => array('argb' => '000000'),
			        ),
			    ),
			);
		$bordes = $finLista-1;
		$spreadsheet->getActiveSheet()->getStyle('A'.$bordes.':B'.$bordes)->applyFromArray($styleArray1);
		$spreadsheet->getActiveSheet()->getStyle('E'.$bordes.':G'.$bordes)->applyFromArray($styleArray1);
	
		/*
		$spreadsheet->getActiveSheet()
		    ->setCellValue('B'.$finLista.':C'.$finLista, 'Nombre y Firma de Recibido');
		
		*/

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
		
	}

}
