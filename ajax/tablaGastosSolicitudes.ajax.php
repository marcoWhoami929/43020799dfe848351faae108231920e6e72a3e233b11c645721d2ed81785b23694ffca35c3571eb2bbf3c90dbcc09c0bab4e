<?php
session_start();
error_reporting(E_ALL);
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaGastosSolicitudes{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
		
 		$valor = null;

 		$gastosSolicitudes = ControladorFacturasTiendas::ctrMostrarGastosSolicitudes($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($gastosSolicitudes); $i++){


                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($gastosSolicitudes[$i]["tieneIva"] == "Si" && $gastosSolicitudes[$i]["parciales"] == 0 && $gastosSolicitudes[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($gastosSolicitudes[$i]["importeGasto"]/1.16),2).'';

                          }else if ($gastosSolicitudes[$i]["tieneIva"] == "Si" && $gastosSolicitudes[$i]["parciales"] > 0 && $gastosSolicitudes[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($gastosSolicitudes[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($gastosSolicitudes[$i]["tieneIva"] == "Si" && $gastosSolicitudes[$i]["parciales"] > 0 && $gastosSolicitudes[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($gastosSolicitudes[$i]["tieneIva"] == "Si" && $gastosSolicitudes[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($gastosSolicitudes[$i]["importeRetenciones"]/1.16),2).'';
                          }
                          else if($gastosSolicitudes[$i]["tieneIva"] == "No" && $gastosSolicitudes[$i]["parciales"] == 0 && $gastosSolicitudes[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($gastosSolicitudes[$i]["importeGasto"],2).'';

                          }else if($gastosSolicitudes[$i]["tieneIva"] == "No" && $gastosSolicitudes[$i]["parciales"] > 0 && $gastosSolicitudes[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($gastosSolicitudes[$i]["tieneIva"] == "No" && $gastosSolicitudes[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($gastosSolicitudes[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($gastosSolicitudes[$i]["tieneIva"] == "Si" && $gastosSolicitudes[$i]["parciales"] == 0 && $gastosSolicitudes[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($gastosSolicitudes[$i]["iva"],2).'';

                          }else if ($gastosSolicitudes[$i]["tieneIva"] == "Si" && $gastosSolicitudes[$i]["parciales"] > 0 && $gastosSolicitudes[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($gastosSolicitudes[$i]["tieneIva"] == "Si" && $gastosSolicitudes[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($gastosSolicitudes[$i]["importeRetenciones"]/1.16)*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($gastosSolicitudes[$i]["tieneRetenciones"] == 1 || $gastosSolicitudes[$i]["tieneRetenciones"] == 01 ) {

                            if ($gastosSolicitudes[$i]["tipoRetencion"] == "Arrendamiento" && $gastosSolicitudes[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($gastosSolicitudes[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($gastosSolicitudes[$i]["retIsr"],2).'';

                            }else if ($gastosSolicitudes[$i]["tipoRetencion"] == "Arrendamiento" && $gastosSolicitudes[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($gastosSolicitudes[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($gastosSolicitudes[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($gastosSolicitudes[$i]["tipoRetencion"] == "Flete" && $gastosSolicitudes[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($gastosSolicitudes[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($gastosSolicitudes[$i]["retIsr2"],2).'';

                            }else if ($gastosSolicitudes[$i]["tipoRetencion"] == "Flete" && $gastosSolicitudes[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($gastosSolicitudes[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($gastosSolicitudes[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($gastosSolicitudes[$i]["tipoRetencion"] == "Honorarios" && $gastosSolicitudes[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($gastosSolicitudes[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($gastosSolicitudes[$i]["retIsr3"],2).'';

	                          }else if($gastosSolicitudes[$i]["tipoRetencion"] == "Honorarios" && $gastosSolicitudes[$i]["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($gastosSolicitudes[$i]["importeRetenciones"]*10)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($gastosSolicitudes[$i]["importeRetenciones"]*10)/100,2).'';

	                          }
	                          else{

	                          $retIva3 = '$ 0.00';
	                          $retIsr3 = '$ 0.00';

	                          }
	      
	                          }else {

	                           $retIva = '$ 0.00';
	                           $retIsr = '$ 0.00';
	                           $retIva2 = '$ 0.00';
	                           $retIsr2 = '$ 0.00';
	                           $retIva3 = '$ 0.00';
	                           $retIsr3 = '$ 0.00';

	                          }
			
             					
             					if ($gastosSolicitudes[$i]["aprobada"] == 0 and $gastosSolicitudes[$i]["solicitada"] == 1) {

             						$estatus = "<button type='button' class='btn btn-warning btnAprobarSolicitudGasto' idAprobarSolicitud='".$gastosSolicitudes[$i]["id"]."' aprobado='0'><i class='fa fa-flag fa-1x' aria-hidden='true' style='color:white'></i></button>";
             						
             					}else if ($gastosSolicitudes[$i]["aprobada"] == 1 and $gastosSolicitudes[$i]["solicitada"] == 1) {

             						$estatus = "<button type='button' class='btn btn-success' aprobado='1' disabled><i class='fa fa-flag fa-1x' aria-hidden='true' style='color:white'></i></button>";
             						
             					}

             					if ($gastosSolicitudes[$i]["numeroDocumento"] == "") {

             						$factura = "".$gastosSolicitudes[$i]["numeroDocumento"]."";
             						
             					}else{

             						$factura = "".$gastosSolicitudes[$i]["numeroDocumento"]."<br><a href='".$gastosSolicitudes[$i]["rutaFactura"]."'  target='_blank'><i class='fa fa-file-pdf-o fa-1x' aria-hidden='true'></i></a>";

             					}
             					
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$gastosSolicitudes[$i]["id"].'",
				      "<strong>'.$gastosSolicitudes[$i]["serieGasto"].'</strong>",
				      "<strong>'.$gastosSolicitudes[$i]["folioGasto"].'</strong>",
				      "'.$estatus.'",
				      "'.$gastosSolicitudes[$i]["departamento"].'",
				      "'.$gastosSolicitudes[$i]["grupo"].'",
				      "'.$gastosSolicitudes[$i]["subgrupo"].'",
				      "'.$gastosSolicitudes[$i]["mes"].'",
				      "'.$gastosSolicitudes[$i]["fecha"].'",
				      "'.$gastosSolicitudes[$i]["descripcion"].'",
				      "$ '.number_format($gastosSolicitudes[$i]["importeGasto"],2).'",
				      "'.$gastosSolicitudes[$i]["acreedor"].'",
				      "'.$factura.'",
				      "'.$iva.'",
				      "'.$importe.'",
				      "'.$gastosSolicitudes[$i]["solicitante"].'",
				      "'.$retIva.'",
				      "'.$retIsr.'",
				      "'.$retIva2.'",
				      "'.$retIsr2.'",
				      "'.$retIva3.'",
				      "'.$retIsr3.'"
					  
					],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE GASTOS
=============================================*/ 
$activar = new TablaGastosSolicitudes();
$activar -> mostrarTablas();



