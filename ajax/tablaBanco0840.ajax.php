<?php
session_start();
error_reporting(0);
ini_set('memory_limit', '-1');
require_once "../controladores/banco0840.controlador.php";
require_once "../modelos/banco0840.modelo.php";

class TablaBanco0840{

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

 		$banco0840 = ControladorBanco0840::ctrMostrarBanco($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco0840); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco0840[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco0840[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco0840[$i]["tieneIva"] == "Si" && $banco0840[$i]["parciales"] == 0 && $banco0840[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco0840[$i]["importe"]/1.16),2).'';

                          }else if ($banco0840[$i]["tieneIva"] == "Si" && $banco0840[$i]["parciales"] > 0 && $banco0840[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco0840[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco0840[$i]["tieneIva"] == "Si" && $banco0840[$i]["parciales"] > 0 && $banco0840[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco0840[$i]["tieneIva"] == "Si" && $banco0840[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco0840[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco0840[$i]["tieneIva"] == "No" && $banco0840[$i]["parciales"] == 0 && $banco0840[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco0840[$i]["importe"],2).'';

                          }else if($banco0840[$i]["tieneIva"] == "No" && $banco0840[$i]["parciales"] > 0 && $banco0840[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco0840[$i]["tieneIva"] == "No" && $banco0840[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco0840[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco0840[$i]["tieneIva"] == "Si" && $banco0840[$i]["parciales"] == 0 && $banco0840[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco0840[$i]["iva"],2).'';

                          }else if ($banco0840[$i]["tieneIva"] == "Si" && $banco0840[$i]["parciales"] > 0 && $banco0840[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco0840[$i]["tieneIva"] == "Si" && $banco0840[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco0840[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($banco0840[$i]["tieneRetenciones"] == 1 || $banco0840[$i]["tieneRetenciones"] == 01 ) {

                            if ($banco0840[$i]["tipoRetencion"] == "Arrendamiento" && $banco0840[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($banco0840[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($banco0840[$i]["retIsr"],2).'';

                            }else if ($banco0840[$i]["tipoRetencion"] == "Arrendamiento" && $banco0840[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($banco0840[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($banco0840[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($banco0840[$i]["tipoRetencion"] == "Flete" && $banco0840[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($banco0840[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($banco0840[$i]["retIsr2"],2).'';

                            }else if ($banco0840[$i]["tipoRetencion"] == "Flete" && $banco0840[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($banco0840[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($banco0840[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($banco0840[$i]["tipoRetencion"] == "Honorarios" && $banco0840[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($banco0840[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($banco0840[$i]["retIsr3"],2).'';

	                          }else if($banco0840[$i]["tipoRetencion"] == "Honorarios" && $banco0840[$i]["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($banco0840[$i]["importeRetenciones"]*10.6667)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($banco0840[$i]["importeRetenciones"]*10)/100,2).'';

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

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco0840[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                    $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco0840[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$banco0840[$i]["departamento"].'",
				      "'.$banco0840[$i]["grupo"].'",
				      "'.$banco0840[$i]["subgrupo"].'",
				      "'.$banco0840[$i]["mes"].'",
				      "'.$banco0840[$i]["fecha"].'",
				      "'.$banco0840[$i]["descripcion"].'",
				      "'.number_format($banco0840[$i]["cargo"],2).'",
				      "'.number_format($banco0840[$i]["abono"],2).'",
				      "'.number_format($banco0840[$i]["saldo"],2).'",
				      "'.number_format($banco0840[$i]["comprobacion"],2).'",
				      "'.number_format($banco0840[$i]["diferencia"],2).'",
				      "'.$verParcial.'",
				      "'.$banco0840[$i]["serie"].'",
				      "'.$banco0840[$i]["folio"].'",
				      "'.$banco0840[$i]["numeroMovimiento"].'",
				      "'.$banco0840[$i]["acreedor"].'",
				      "'.$banco0840[$i]["concepto"].'",
				      "'.$banco0840[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco0840();
$activar -> mostrarTablas();



