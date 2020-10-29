<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaGastosCorteCaja{

	public function mostrarTablas(){	
    
	$item = "folioGasto";
    if($_GET["folioGasto"] != "") {

        $valor = $_GET["folioGasto"];

    }

 		$gastosCorte = ControladorFacturasTiendas::ctrMostrarListaGastosCorte($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($gastosCorte); $i++){

	 					/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($gastosCorte[$i]["tieneIva"] == "Si" && $gastosCorte[$i]["parciales"] == 0 && $gastosCorte[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($gastosCorte[$i]["importeGasto"]/1.16),2).'';

                          }else if ($gastosCorte[$i]["tieneIva"] == "Si" && $gastosCorte[$i]["parciales"] > 0 && $gastosCorte[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($gastosCorte[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($gastosCorte[$i]["tieneIva"] == "Si" && $gastosCorte[$i]["parciales"] > 0 && $gastosCorte[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($gastosCorte[$i]["tieneIva"] == "Si" && $gastosCorte[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($gastosCorte[$i]["importeRetenciones"]/1.16),2).'';
                          }
                          else if($gastosCorte[$i]["tieneIva"] == "No" && $gastosCorte[$i]["parciales"] == 0 && $gastosCorte[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($gastosCorte[$i]["importeGasto"],2).'';

                          }else if($gastosCorte[$i]["tieneIva"] == "No" && $gastosCorte[$i]["parciales"] > 0 && $gastosCorte[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($gastosCorte[$i]["tieneIva"] == "No" && $gastosCorte[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($gastosCorte[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($gastosCorte[$i]["tieneIva"] == "Si" && $gastosCorte[$i]["parciales"] == 0 && $gastosCorte[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($gastosCorte[$i]["iva"],2).'';

                          }else if ($gastosCorte[$i]["tieneIva"] == "Si" && $gastosCorte[$i]["parciales"] > 0 && $gastosCorte[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($gastosCorte[$i]["tieneIva"] == "Si" && $gastosCorte[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($gastosCorte[$i]["importeRetenciones"]/1.16)*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	if ($gastosCorte[$i]["aprobada"] == 0 and $gastosCorte[$i]["solicitada"] == 1) {

             					$estatus = "<button type='button' class='btn btn-warning'>Esperando Aprobación</button>";
             						
             				}else if ($gastosCorte[$i]["aprobada"] == 1 and $gastosCorte[$i]["solicitada"] == 1) {

             					$estatus = "<button type='button' class='btn btn-success'>Gasto Aprobado</button>";
             						
             				}

             				if ($gastosCorte[$i]["numeroDocumento"] == "") {

             					$factura = "".$gastosCorte[$i]["numeroDocumento"]."";
             						
             				}else{

             					$factura = "".$gastosCorte[$i]["numeroDocumento"]."<br><a href='".$gastosCorte[$i]["rutaFactura"]."'  target='_blank'><i class='fa fa-file-pdf-o fa-1x' aria-hidden='true'></i></a>";

             				}

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
                  "<strong>'.$gastosCorte[$i]["serieGasto"].'</strong>",
				  "<strong>'.$gastosCorte[$i]["folioGasto"].'</strong>",
				  "'.$estatus.'",
				  "'.$gastosCorte[$i]["departamento"].'",
				  "'.$gastosCorte[$i]["grupo"].'",
				  "'.$gastosCorte[$i]["subgrupo"].'",
				  "'.$gastosCorte[$i]["mes"].'",
				  "'.$gastosCorte[$i]["fecha"].'",
				  "'.$gastosCorte[$i]["descripcion"].'",
				  "$ '.number_format($gastosCorte[$i]["importeGasto"],2).'",
				  "'.$gastosCorte[$i]["acreedor"].'",
				  "'.$factura.'",
				  "'.$iva.'",
				  "'.$importe.'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE GASTOS DE CORTE DE CAJA
=============================================*/ 
$activar = new TablaGastosCorteCaja();
$activar -> mostrarTablas();
