<?php
session_start();
error_reporting(0);
ini_set('memory_limit', '-1');
require_once "../controladores/banco1219.controlador.php";
require_once "../modelos/banco1219.modelo.php";

class TablaBanco1219{

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

 		$banco1219 = ControladorBanco1219::ctrMostrarBanco($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco1219); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco1219[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco1219[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco1219[$i]["tieneIva"] == "Si" && $banco1219[$i]["parciales"] == 0 && $banco1219[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco1219[$i]["importe"]/1.16),2).'';

                          }else if ($banco1219[$i]["tieneIva"] == "Si" && $banco1219[$i]["parciales"] > 0 && $banco1219[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco1219[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco1219[$i]["tieneIva"] == "Si" && $banco1219[$i]["parciales"] > 0 && $banco1219[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco1219[$i]["tieneIva"] == "Si" && $banco1219[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco1219[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco1219[$i]["tieneIva"] == "No" && $banco1219[$i]["parciales"] == 0 && $banco1219[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco1219[$i]["importe"],2).'';

                          }else if($banco1219[$i]["tieneIva"] == "No" && $banco1219[$i]["parciales"] > 0 && $banco1219[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco1219[$i]["tieneIva"] == "No" && $banco1219[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco1219[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco1219[$i]["tieneIva"] == "Si" && $banco1219[$i]["parciales"] == 0 && $banco1219[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco1219[$i]["iva"],2).'';

                          }else if ($banco1219[$i]["tieneIva"] == "Si" && $banco1219[$i]["parciales"] > 0 && $banco1219[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco1219[$i]["tieneIva"] == "Si" && $banco1219[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco1219[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($banco1219[$i]["tieneRetenciones"] == 1 || $banco1219[$i]["tieneRetenciones"] == 01 ) {

                            if ($banco1219[$i]["tipoRetencion"] == "Arrendamiento" && $banco1219[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($banco1219[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($banco1219[$i]["retIsr"],2).'';

                            }else if ($banco1219[$i]["tipoRetencion"] == "Arrendamiento" && $banco1219[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($banco1219[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($banco1219[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($banco1219[$i]["tipoRetencion"] == "Flete" && $banco1219[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($banco1219[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($banco1219[$i]["retIsr2"],2).'';

                            }else if ($banco1219[$i]["tipoRetencion"] == "Flete" && $banco1219[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($banco1219[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($banco1219[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($banco1219[$i]["tipoRetencion"] == "Honorarios" && $banco1219[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($banco1219[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($banco1219[$i]["retIsr3"],2).'';

	                          }else if($banco1219[$i]["tipoRetencion"] == "Honorarios" && $banco1219[$i]["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($banco1219[$i]["importeRetenciones"]*10.6667)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($banco1219[$i]["importeRetenciones"]*10)/100,2).'';

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

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1219[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                    $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1219[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$banco1219[$i]["departamento"].'",
				      "'.$banco1219[$i]["grupo"].'",
				      "'.$banco1219[$i]["subgrupo"].'",
				      "'.$banco1219[$i]["mes"].'",
				      "'.$banco1219[$i]["fecha"].'",
				      "'.$banco1219[$i]["descripcion"].'",
				      "'.number_format($banco1219[$i]["cargo"],2).'",
				      "'.number_format($banco1219[$i]["abono"],2).'",
				      "'.number_format($banco1219[$i]["saldo"],2).'",
				      "'.number_format($banco1219[$i]["comprobacion"],2).'",
				      "'.number_format($banco1219[$i]["diferencia"],2).'",
				      "'.$verParcial.'",
				      "'.$banco1219[$i]["serie"].'",
				      "'.$banco1219[$i]["folio"].'",
				      "'.$banco1219[$i]["numeroMovimiento"].'",
				      "'.$banco1219[$i]["acreedor"].'",
				      "'.$banco1219[$i]["concepto"].'",
				      "'.$banco1219[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco1219();
$activar -> mostrarTablas();



