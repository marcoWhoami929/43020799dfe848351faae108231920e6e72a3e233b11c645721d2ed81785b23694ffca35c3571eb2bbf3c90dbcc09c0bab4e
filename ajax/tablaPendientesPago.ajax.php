<?php

session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaFacturasPendientesPago{

	public function mostrarTablas(){	
   
	
    $item = "concepto";
    $concepto = $_GET["concepto"];
    $valor = $concepto;
   
 		$pendientesPago = ControladorFacturasTiendas::ctrMostrarFacturasPendientesPago($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($pendientesPago); $i++){

                     if($pendientesPago[$i]["abono"] != 0){

                        $total = str_replace(',','',$pendientesPago[$i]["total"]) - $pendientesPago[$i]["abono"];

                    }else{

                        $total = str_replace(',','',$pendientesPago[$i]["total"]);

                    }


                     if ($pendientesPago[$i]["importePendiente"] != 0) {

                        $importeCobradoFactura = "<input type='text' class='form-control importeCobradoFactura' id='importeCobradoFactura$i' name='importeCobradoFactura[]' value='".number_format($pendientesPago[$i]["importePendiente"],2, '.', '')."'>";

                    }else{

                        $importeCobradoFactura = "<input type='text' class='form-control importeCobradoFactura' id='importeCobradoFactura$i' name='importeCobradoFactura[]' value='".number_format($total,2, '.', '')."'>";
                    }
                    
                    
                    if ($pendientesPago[$i]["pendientePago"] == 1) {

                        $selector = "<input type='checkbox' class='selectorPendiente' name='selectorPendiente$i' id = 'selectorPendiente$i' facturaPendiente = '".$pendientesPago[$i]["id"]."' value='' puntero = '".$i."' checked>";
                    }else{

                        $selector = "<input type='checkbox' class='selectorPendiente' name='selectorPendiente$i' id = 'selectorPendiente$i' facturaPendiente = '".$pendientesPago[$i]["id"]."' value='' puntero = '".$i."'>";

                    }
                  

                    $formaPago = "<select class='form-control formaPagoPendiente' name='formaPagoPendiente$i' id='formaPagoPendiente$i'><option value='".$pendientesPago[$i]["formaPago"]."'>".$pendientesPago[$i]["formaPago"]."</option><option value='EFECTIVO'>EFECTIVO</option><option value='TARJETA DE DéBITO'>TARJETA DE DÉBITO</option><option value='TARJETA DE CRéDITO'>TARJETA DE CRÉDITO</option><option value='TRANSFERENCIA ELECTRóNICA DE FONDOS'>TRANSFERENCIA ELECTRÓNICA DE FONDOS</option><option value='CHEQUE NOMINATIVO'>CHEQUE NOMINATIVO</option><option value='CREDITO'>CREDITO</option><option value='POR DEFINIR'>POR DEFINIR</option></select>";
                    /*=============================================
                    DEVOLVER DATOS JSON
                    =============================================*/
                    
                    $datosJson   .= '[   
                                "'.$selector.'",           
                                "'.$pendientesPago[$i]["serie"].'",
                                "'.$pendientesPago[$i]["folio"].'",
                                "'.rtrim($pendientesPago[$i]["nombreCliente"]).'",
                                "'.$pendientesPago[$i]["fechaFactura"].'",
                                "$ '.number_format(str_replace(',','',$pendientesPago[$i]["total"]),2, '.', '').'",
                                "'.$importeCobradoFactura.'",
                                "'.$formaPago.'"],';

              }
            /*********/

	     	

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE FACTURAS PENDIENTES DE PAGO
=============================================*/ 
$activar = new TablaFacturasPendientesPago();
$activar -> mostrarTablas();



