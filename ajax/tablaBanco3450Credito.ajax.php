<?php
session_start();
ini_set('memory_limit', '-1');
require_once "../controladores/banco3450.controlador.php";
require_once "../modelos/banco3450.modelo.php";

class TablaBanco3450Credito{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablasCredito(){	

		if ($_GET["elegirMes"] != '') {

				$mes = $_GET["elegirMes"];

			}else {

				$mes = null;

			}	
		


		$item = 'mes';
 		$valor = $mes;

 		$banco3450Credito = ControladorBanco3450::ctrMostrarBancoCredito($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco3450Credito); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco3450Credito[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco3450Credito[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/
			  			   if ($banco3450Credito[$i]["tipoRetencion"] == "Flete" and $banco3450Credito[$i]["subgrupo"] == "03. Gastos Operativos con Retenciones  Fletes y Acarreos") {

			  			    		$retIva =  number_format(($banco3450Credito[$i]["importeRetenciones"]*4)/100,2,'.', '');
				  					$importe = number_format(($banco3450Credito[$i]["cargo"] + $retIva)/1.16,2,'.', '');
				  					$iva = number_format(($importe*16)/100,2);
			  					
			  				}else{

			  						if ($banco3450Credito[$i]["tieneIva"] == "Si" && $banco3450Credito[$i]["parciales"] == 0 && $banco3450Credito[$i]["tieneRetenciones"] == 0) {
                            
			                             $importe = '$ '.number_format(($banco3450Credito[$i]["importe"]/1.16),2).'';

			                          }else if ($banco3450Credito[$i]["tieneIva"] == "Si" && $banco3450Credito[$i]["parciales"] > 0 && $banco3450Credito[$i]["tieneRetenciones"] == 0) {

			                            //echo '$ '.number_format(($banco3450[$i]2["importeParciales"]/1.16),2).'';
			                            $importe = '$ 0.00';
			                            
			                          }else if ($banco3450Credito[$i]["tieneIva"] == "Si" && $banco3450Credito[$i]["parciales"] > 0 && $banco3450Credito[$i]["tieneRetenciones"] == 01) {

			                           $importe = '$ 0.00';
			                          
			                          }else if ($banco3450Credito[$i]["tieneIva"] == "Si" && $banco3450Credito[$i]["tieneRetenciones"] == 01) {
			                            $importe = '$ '.number_format(($banco3450Credito[$i]["importeRetenciones"]),2).'';
			                          }
			                          else if($banco3450Credito[$i]["tieneIva"] == "No" && $banco3450Credito[$i]["parciales"] == 0 && $banco3450Credito[$i]["tieneRetenciones"] == 0){ 

			                               $importe = '$ '.number_format($banco3450Credito[$i]["importe"],2).'';

			                          }else if($banco3450Credito[$i]["tieneIva"] == "No" && $banco3450Credito[$i]["parciales"] > 0 && $banco3450Credito[$i]["tieneRetenciones"] == 0){

			                              $importe = '$ 0.00';

			                          }else if ($banco3450Credito[$i]["tieneIva"] == "No" && $banco3450Credito[$i]["tieneRetenciones"] == 01) {
			                             $importe ='$ '.number_format($banco3450Credito[$i]["importeRetenciones"],2).'';
			                          }
			                          

			                          if ($banco3450Credito[$i]["tieneIva"] == "Si" && $banco3450Credito[$i]["parciales"] == 0 && $banco3450Credito[$i]["tieneRetenciones"] == 0 ) {

			                            $iva = '$'.number_format($banco3450Credito[$i]["iva"],2).'';

			                          }else if ($banco3450Credito[$i]["tieneIva"] == "Si" && $banco3450Credito[$i]["parciales"] > 0 && $banco3450Credito[$i]["tieneRetenciones"] == 01) {

			                           $iva = '$ 0.00';
			                            
			                          }else if ($banco3450Credito[$i]["tieneIva"] == "Si" && $banco3450Credito[$i]["tieneRetenciones"] == 01) {
			                            $iva = '$'.number_format(($banco3450Credito[$i]["importeRetenciones"])*0.16,2).'';
			                          }
			                          else{

			                           $iva = '$ 0.00';

			                          }

			  				}

                           


	                         	/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Compras") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco3450Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco3450Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$banco3450Credito[$i]["id"].'",
				      "'.$banco3450Credito[$i]["departamento"].'",
				      "'.$banco3450Credito[$i]["grupo"].'",
				      "'.$banco3450Credito[$i]["subgrupo"].'",
				      "'.$banco3450Credito[$i]["mes"].'",
				      "'.$banco3450Credito[$i]["fecha"].'",
				      "'.$banco3450Credito[$i]["descripcion"].'",
				      "'.number_format($banco3450Credito[$i]["abono"],2).'",
				      "'.$verParcial.'",
				      "'.$banco3450Credito[$i]["serie"].'",
				      "'.$banco3450Credito[$i]["folio"].'",
				      "'.$banco3450Credito[$i]["numeroMovimiento"].'",
				      "'.$banco3450Credito[$i]["acreedor"].'",
				      "'.$banco3450Credito[$i]["concepto"].'",
				      "'.$banco3450Credito[$i]["numeroDocumento"].'",
				      "'.$importe.'",
				      "'.$iva.'",
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
$activar = new TablaBanco3450Credito();
$activar -> mostrarTablasCredito();



