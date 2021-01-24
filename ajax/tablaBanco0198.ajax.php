<?php
session_start();
error_reporting(0);
ini_set('memory_limit', '-1');
require_once "../controladores/banco0198.controlador.php";
require_once "../modelos/banco0198.modelo.php";

class TablaBanco0198{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablas(){	
		$item1 = "fecha";
    	if($_GET["fechaIni"] != '') {

       		$fechaIni = $_GET["fechaIni"];
	        $valor1 = $fechaIni;

    	}else{

	     
	        $valor1 = date('Y-m-d', strtotime($fecha."- 5 month"));
    	}

	    if($_GET["fechaFin"] != '') {

	        $fechaFin = $_GET["fechaFin"];
	        $valor2 = $fechaFin;

	    }else{
	    
	        $valor2 = date('Y-m-d', strtotime($fecha."-0 days"));

	    }
 		$banco0198 = ControladorBanco0198::ctrMostrarRangoFechas($item1, $valor1,$valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco0198); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco0198[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco0198[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco0198[$i]["tieneIva"] == "Si" && $banco0198[$i]["parciales"] == 0 && $banco0198[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco0198[$i]["importe"]/1.16),2).'';

                          }else if ($banco0198[$i]["tieneIva"] == "Si" && $banco0198[$i]["parciales"] > 0 && $banco0198[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco0198[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco0198[$i]["tieneIva"] == "Si" && $banco0198[$i]["parciales"] > 0 && $banco0198[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco0198[$i]["tieneIva"] == "Si" && $banco0198[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco0198[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco0198[$i]["tieneIva"] == "No" && $banco0198[$i]["parciales"] == 0 && $banco0198[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco0198[$i]["importe"],2).'';

                          }else if($banco0198[$i]["tieneIva"] == "No" && $banco0198[$i]["parciales"] > 0 && $banco0198[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco0198[$i]["tieneIva"] == "No" && $banco0198[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco0198[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco0198[$i]["tieneIva"] == "Si" && $banco0198[$i]["parciales"] == 0 && $banco0198[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco0198[$i]["iva"],2).'';

                          }else if ($banco0198[$i]["tieneIva"] == "Si" && $banco0198[$i]["parciales"] > 0 && $banco0198[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco0198[$i]["tieneIva"] == "Si" && $banco0198[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco0198[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($banco0198[$i]["tieneRetenciones"] == 1 || $banco0198[$i]["tieneRetenciones"] == 01 ) {

                            if ($banco0198[$i]["tipoRetencion"] == "Arrendamiento" && $banco0198[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($banco0198[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($banco0198[$i]["retIsr"],2).'';

                            }else if ($banco0198[$i]["tipoRetencion"] == "Arrendamiento" && $banco0198[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($banco0198[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($banco0198[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($banco0198[$i]["tipoRetencion"] == "Flete" && $banco0198[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($banco0198[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($banco0198[$i]["retIsr2"],2).'';

                            }else if ($banco0198[$i]["tipoRetencion"] == "Flete" && $banco0198[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($banco0198[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($banco0198[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($banco0198[$i]["tipoRetencion"] == "Honorarios" && $banco0198[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($banco0198[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($banco0198[$i]["retIsr3"],2).'';

	                          }else if($banco0198[$i]["tipoRetencion"] == "Honorarios" && $banco0198[$i]["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($banco0198[$i]["importeRetenciones"]*10.6667)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($banco0198[$i]["importeRetenciones"]*10)/100,2).'';

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
					  			if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco0198[$i]["id"]."' abono = '".$banco0198[$i]["abono"]."' fechaAbono = '".$banco0198[$i]["fecha"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                    $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco0198[$i]["id"]."' abono = '".$banco0198[$i]["abono"]."' fechaAbono = '".$banco0198[$i]["fecha"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$banco0198[$i]["id"].'",
				      "'.$banco0198[$i]["departamento"].'",
				      "'.$banco0198[$i]["grupo"].'",
				      "'.$banco0198[$i]["subgrupo"].'",
				      "'.$banco0198[$i]["mes"].'",
				      "'.$banco0198[$i]["fecha"].'",
				      "'.$banco0198[$i]["descripcion"].'",
				      "'.number_format($banco0198[$i]["cargo"],2).'",
				      "'.number_format($banco0198[$i]["abono"],2).'",
				      "'.number_format($banco0198[$i]["saldo"],2).'",
				      "'.number_format($banco0198[$i]["comprobacion"],2).'",
				      "'.number_format($banco0198[$i]["diferencia"],2).'",
				      "'.$verParcial.'",
				      "'.$banco0198[$i]["serie"].'",
				      "'.$banco0198[$i]["folio"].'",
				      "'.$banco0198[$i]["numeroMovimiento"].'",
				      "'.$banco0198[$i]["acreedor"].'",
				      "'.$banco0198[$i]["concepto"].'",
				      "'.$banco0198[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco0198();
$activar -> mostrarTablas();



