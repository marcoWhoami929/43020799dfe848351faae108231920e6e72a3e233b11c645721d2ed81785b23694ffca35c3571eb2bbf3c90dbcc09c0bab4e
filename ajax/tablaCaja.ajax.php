<?php
session_start();
error_reporting(0);
require_once "../controladores/caja.controlador.php";
require_once "../modelos/caja.modelo.php";

class TablaCaja{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
 		$valor = null;

 		$caja = ControladorCaja::ctrMostrarCaja($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($caja); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($caja[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$caja[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($caja[$i]["tieneIva"] == "Si" && $caja[$i]["parciales"] == 0 && $caja[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($caja[$i]["importe"]/1.16),2).'';

                          }else if ($caja[$i]["tieneIva"] == "Si" && $caja[$i]["parciales"] > 0 && $caja[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($caja[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($caja[$i]["tieneIva"] == "Si" && $caja[$i]["parciales"] > 0 && $caja[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($caja[$i]["tieneIva"] == "Si" && $caja[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($caja[$i]["importeRetenciones"]/1.16),2).'';
                          }
                          else if($caja[$i]["tieneIva"] == "No" && $caja[$i]["parciales"] == 0 && $caja[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($caja[$i]["importe"],2).'';

                          }else if($caja[$i]["tieneIva"] == "No" && $caja[$i]["parciales"] > 0 && $caja[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($caja[$i]["tieneIva"] == "No" && $caja[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($caja[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($caja[$i]["tieneIva"] == "Si" && $caja[$i]["parciales"] == 0 && $caja[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($caja[$i]["iva"],2).'';

                          }else if ($caja[$i]["tieneIva"] == "Si" && $caja[$i]["parciales"] > 0 && $caja[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($caja[$i]["tieneIva"] == "Si" && $caja[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($caja[$i]["importeRetenciones"]/1.16)*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($caja[$i]["tieneRetenciones"] == 1 || $caja[$i]["tieneRetenciones"] == 01 ) {

                            if ($caja[$i]["tipoRetencion"] == "Arrendamiento" && $caja[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($caja[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($caja[$i]["retIsr"],2).'';

                            }else if ($caja[$i]["tipoRetencion"] == "Arrendamiento" && $caja[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($caja[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($caja[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($caja[$i]["tipoRetencion"] == "Flete" && $caja[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($caja[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($caja[$i]["retIsr2"],2).'';

                            }else if ($caja[$i]["tipoRetencion"] == "Flete" && $caja[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($caja[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($caja[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($caja[$i]["tipoRetencion"] == "Honorarios" && $caja[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($caja[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($caja[$i]["retIsr3"],2).'';

	                          }else if($caja[$i]["tipoRetencion"] == "Honorarios" && $caja[$i]["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($caja[$i]["importeRetenciones"]*10)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($caja[$i]["importeRetenciones"]*10)/100,2).'';

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
					  			/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idCaja='".$caja[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>&nbsp;<button class='btn btn-danger btnEliminarCaja' idCaja2='".$caja[$i]["id"]."'><i class='fa fa-times'></i>Eliminar Registro</button>"; 
                       

				                      }else{

				                          $acciones = "<button class='btn btn-warning btnEditarDatos' idCaja='".$caja[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>&nbsp;<button class='btn btn-danger btnEliminarCaja' idCaja2='".$caja[$i]["id"]."' disabled><i class='fa fa-times'></i>Eliminar registro</button>";
				                      }    

				                
             						


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$caja[$i]["id"].'",
				      "'.$caja[$i]["departamento"].'",
				      "'.$caja[$i]["grupo"].'",
				      "'.$caja[$i]["subgrupo"].'",
				      "'.$caja[$i]["mes"].'",
				      "'.$caja[$i]["fecha"].'",
				      "'.$caja[$i]["descripcion"].'",
				      "'.number_format($caja[$i]["cargo"],2).'",
				      "'.number_format($caja[$i]["abono"],2).'",
				      "'.number_format($caja[$i]["saldo"],2).'",
				      "'.number_format($caja[$i]["comprobacion"],2).'",
				      "'.number_format($caja[$i]["diferencia"],2).'",
				      "'.$verParcial.'",
				      "'.$caja[$i]["serie"].'",
				      "'.$caja[$i]["folio"].'",
				      "'.$caja[$i]["numeroMovimiento"].'",
				      "'.$caja[$i]["acreedor"].'",
				      "'.$caja[$i]["concepto"].'",
				      "'.$caja[$i]["numeroDocumento"].'",
				      "'.$importe.'",
				      "'.$iva.'",
				      "'.$retIva.'",
				      "'.$retIsr.'",
				      "'.$retIva2.'",
				      "'.$retIsr2.'",
				      "'.$retIva3.'",
				      "'.$retIsr3.'",
					  "'.$acciones.'"
					],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE CLIENTES
=============================================*/ 
$activar = new TablaCaja();
$activar -> mostrarTablas();



