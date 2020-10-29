<?php
session_start();
error_reporting(0);
ini_set('memory_limit', '-1');
require_once "../controladores/banco1340.controlador.php";
require_once "../modelos/banco1340.modelo.php";

class TablaBanco1340{

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

 		$banco1340 = ControladorBanco1340::ctrMostrarBanco($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco1340); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco1340[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco1340[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco1340[$i]["tieneIva"] == "Si" && $banco1340[$i]["parciales"] == 0 && $banco1340[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco1340[$i]["importe"]/1.16),2).'';

                          }else if ($banco1340[$i]["tieneIva"] == "Si" && $banco1340[$i]["parciales"] > 0 && $banco1340[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco1340[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco1340[$i]["tieneIva"] == "Si" && $banco1340[$i]["parciales"] > 0 && $banco1340[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco1340[$i]["tieneIva"] == "Si" && $banco1340[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco1340[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco1340[$i]["tieneIva"] == "No" && $banco1340[$i]["parciales"] == 0 && $banco1340[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco1340[$i]["importe"],2).'';

                          }else if($banco1340[$i]["tieneIva"] == "No" && $banco1340[$i]["parciales"] > 0 && $banco1340[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco1340[$i]["tieneIva"] == "No" && $banco1340[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco1340[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco1340[$i]["tieneIva"] == "Si" && $banco1340[$i]["parciales"] == 0 && $banco1340[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco1340[$i]["iva"],2).'';

                          }else if ($banco1340[$i]["tieneIva"] == "Si" && $banco1340[$i]["parciales"] > 0 && $banco1340[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco1340[$i]["tieneIva"] == "Si" && $banco1340[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco1340[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($banco1340[$i]["tieneRetenciones"] == 1 || $banco1340[$i]["tieneRetenciones"] == 01 ) {

                            if ($banco1340[$i]["tipoRetencion"] == "Arrendamiento" && $banco1340[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($banco1340[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($banco1340[$i]["retIsr"],2).'';

                            }else if ($banco1340[$i]["tipoRetencion"] == "Arrendamiento" && $banco1340[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($banco1340[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($banco1340[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($banco1340[$i]["tipoRetencion"] == "Flete" && $banco1340[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($banco1340[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($banco1340[$i]["retIsr2"],2).'';

                            }else if ($banco1340[$i]["tipoRetencion"] == "Flete" && $banco1340[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($banco1340[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($banco1340[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($banco1340[$i]["tipoRetencion"] == "Honorarios" && $banco1340[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($banco1340[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($banco1340[$i]["retIsr3"],2).'';

	                          }else if($banco1340[$i]["tipoRetencion"] == "Honorarios" && $banco1340[$i]["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($banco1340[$i]["importeRetenciones"]*10.6667)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($banco1340[$i]["importeRetenciones"]*10)/100,2).'';

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
					  			if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1340[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                    $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1340[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$banco1340[$i]["departamento"].'",
				      "'.$banco1340[$i]["grupo"].'",
				      "'.$banco1340[$i]["subgrupo"].'",
				      "'.$banco1340[$i]["mes"].'",
				      "'.$banco1340[$i]["fecha"].'",
				      "'.$banco1340[$i]["descripcion"].'",
				      "'.number_format($banco1340[$i]["cargo"],2).'",
				      "'.number_format($banco1340[$i]["abono"],2).'",
				      "'.number_format($banco1340[$i]["saldo"],2).'",
				      "'.number_format($banco1340[$i]["comprobacion"],2).'",
				      "'.number_format($banco1340[$i]["diferencia"],2).'",
				      "'.$verParcial.'",
				      "'.$banco1340[$i]["serie"].'",
				      "'.$banco1340[$i]["folio"].'",
				      "'.$banco1340[$i]["numeroMovimiento"].'",
				      "'.$banco1340[$i]["acreedor"].'",
				      "'.$banco1340[$i]["concepto"].'",
				      "'.$banco1340[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco1340();
$activar -> mostrarTablas();



