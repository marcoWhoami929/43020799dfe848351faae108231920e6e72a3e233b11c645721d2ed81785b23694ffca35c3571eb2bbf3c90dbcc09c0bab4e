<?php
session_start();
error_reporting(0);
ini_set('memory_limit', '-1');
require_once "../controladores/banco3450.controlador.php";
require_once "../modelos/banco3450.modelo.php";

class TablaBanco3450{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablas(){
		if ($_GET["elegirMes"] != '') {

				$mes = $_GET["elegirMes"];

			}else {

				$mes = null;

			}	
		


		$item = 'mes';
 		$valor = $mes;

 		$banco3450 = ControladorBanco3450::ctrMostrarBanco($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco3450); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco3450[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco3450[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/
			  			   if ($banco3450[$i]["tipoRetencion"] == "Flete" and $banco3450[$i]["subgrupo"] == "03. Gastos Operativos con Retenciones  Fletes y Acarreos") {

			  			    		$retIva =  number_format(($banco3450[$i]["importeRetenciones"]*4)/100,2,'.', '');
				  					$importe = number_format(($banco3450[$i]["cargo"] + $retIva)/1.16,2,'.', '');
				  					$iva = number_format(($importe*16)/100,2);
			  					
			  				}else{

			  						if ($banco3450[$i]["tieneIva"] == "Si" && $banco3450[$i]["parciales"] == 0 && $banco3450[$i]["tieneRetenciones"] == 0) {
                            
			                             $importe = '$ '.number_format(($banco3450[$i]["importe"]/1.16),2).'';

			                          }else if ($banco3450[$i]["tieneIva"] == "Si" && $banco3450[$i]["parciales"] > 0 && $banco3450[$i]["tieneRetenciones"] == 0) {

			                            //echo '$ '.number_format(($banco3450[$i]2["importeParciales"]/1.16),2).'';
			                            $importe = '$ 0.00';
			                            
			                          }else if ($banco3450[$i]["tieneIva"] == "Si" && $banco3450[$i]["parciales"] > 0 && $banco3450[$i]["tieneRetenciones"] == 01) {

			                           $importe = '$ 0.00';
			                          
			                          }else if ($banco3450[$i]["tieneIva"] == "Si" && $banco3450[$i]["tieneRetenciones"] == 01) {
			                            $importe = '$ '.number_format(($banco3450[$i]["importeRetenciones"]),2).'';
			                          }
			                          else if($banco3450[$i]["tieneIva"] == "No" && $banco3450[$i]["parciales"] == 0 && $banco3450[$i]["tieneRetenciones"] == 0){ 

			                               $importe = '$ '.number_format($banco3450[$i]["importe"],2).'';

			                          }else if($banco3450[$i]["tieneIva"] == "No" && $banco3450[$i]["parciales"] > 0 && $banco3450[$i]["tieneRetenciones"] == 0){

			                              $importe = '$ 0.00';

			                          }else if ($banco3450[$i]["tieneIva"] == "No" && $banco3450[$i]["tieneRetenciones"] == 01) {
			                             $importe ='$ '.number_format($banco3450[$i]["importeRetenciones"],2).'';
			                          }
			                          

			                          if ($banco3450[$i]["tieneIva"] == "Si" && $banco3450[$i]["parciales"] == 0 && $banco3450[$i]["tieneRetenciones"] == 0 ) {

			                            $iva = '$'.number_format($banco3450[$i]["iva"],2).'';

			                          }else if ($banco3450[$i]["tieneIva"] == "Si" && $banco3450[$i]["parciales"] > 0 && $banco3450[$i]["tieneRetenciones"] == 01) {

			                           $iva = '$ 0.00';
			                            
			                          }else if ($banco3450[$i]["tieneIva"] == "Si" && $banco3450[$i]["tieneRetenciones"] == 01) {
			                            $iva = '$'.number_format(($banco3450[$i]["importeRetenciones"])*0.16,2).'';
			                          }
			                          else{

			                           $iva = '$ 0.00';

			                          }

			  				}

                           

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($banco3450[$i]["tieneRetenciones"] == 1 || $banco3450[$i]["tieneRetenciones"] == 01 ) {

                            if ($banco3450[$i]["tipoRetencion"] == "Arrendamiento" && $banco3450[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($banco3450[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($banco3450[$i]["retIsr"],2).'';

                            }else if ($banco3450[$i]["tipoRetencion"] == "Arrendamiento" && $banco3450[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($banco3450[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($banco3450[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($banco3450[$i]["tipoRetencion"] == "Flete" && $banco3450[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($banco3450[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($banco3450[$i]["retIsr2"],2).'';

                            }else if ($banco3450[$i]["tipoRetencion"] == "Flete" && $banco3450[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($banco3450[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($banco3450[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($banco3450[$i]["tipoRetencion"] == "Honorarios" && $banco3450[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($banco3450[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($banco3450[$i]["retIsr3"],2).'';

	                          }else if($banco3450[$i]["tipoRetencion"] == "Honorarios" && $banco3450[$i]["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($banco3450[$i]["importeRetenciones"]*10.6667)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($banco3450[$i]["importeRetenciones"]*10)/100,2).'';

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
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Contabilidad") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco3450[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco3450[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    

                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$banco3450[$i]["departamento"].'",
				      "'.$banco3450[$i]["grupo"].'",
				      "'.$banco3450[$i]["subgrupo"].'",
				      "'.$banco3450[$i]["mes"].'",
				      "'.$banco3450[$i]["fecha"].'",
				      "'.$banco3450[$i]["descripcion"].'",
				      "'.number_format($banco3450[$i]["cargo"],2).'",
				      "'.number_format($banco3450[$i]["abono"],2).'",
				      "'.number_format($banco3450[$i]["saldo"],2).'",
				      "'.number_format($banco3450[$i]["comprobacion"],2).'",
				      "'.number_format($banco3450[$i]["diferencia"],2).'",
				      "'.$verParcial.'",
				      "'.$banco3450[$i]["serie"].'",
				      "'.$banco3450[$i]["folio"].'",
				      "'.$banco3450[$i]["numeroMovimiento"].'",
				      "'.$banco3450[$i]["acreedor"].'",
				      "'.$banco3450[$i]["concepto"].'",
				      "'.$banco3450[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco3450();
$activar -> mostrarTablas();




