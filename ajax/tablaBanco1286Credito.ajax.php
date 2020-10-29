<?php
session_start();
ini_set('memory_limit', '-1');
require_once "../controladores/banco1286.controlador.php";
require_once "../modelos/banco1286.modelo.php";

class TablaBanco1286Credito{

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

 		$banco1286Credito = ControladorBanco1286::ctrMostrarBancoCredito($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco1286Credito); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco1286Credito[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco1286Credito[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/
			  			  if ($banco1286Credito[$i]["tipoRetencion"] == "Flete" and $banco1286Credito[$i]["subgrupo"] == "03. Gastos Operativos con Retenciones  Fletes y Acarreos") {

			  			    		$retIva =  number_format(($banco1286Credito[$i]["importeRetenciones"]*4)/100,2,'.', '');
				  					$importe = number_format(($banco1286Credito[$i]["cargo"] + $retIva)/1.16,2,'.', '');
				  					$iva = number_format(($importe*16)/100,2);
			  					
			  				}else{

			  						if ($banco1286Credito[$i]["tieneIva"] == "Si" && $banco1286Credito[$i]["parciales"] == 0 && $banco1286Credito[$i]["tieneRetenciones"] == 0) {
                            
			                             $importe = '$ '.number_format(($banco1286Credito[$i]["importe"]/1.16),2).'';

			                          }else if ($banco1286Credito[$i]["tieneIva"] == "Si" && $banco1286Credito[$i]["parciales"] > 0 && $banco1286Credito[$i]["tieneRetenciones"] == 0) {

			                            //echo '$ '.number_format(($banco1286[$i]2["importeParciales"]/1.16),2).'';
			                            $importe = '$ 0.00';
			                            
			                          }else if ($banco1286Credito[$i]["tieneIva"] == "Si" && $banco1286Credito[$i]["parciales"] > 0 && $banco1286Credito[$i]["tieneRetenciones"] == 01) {

			                           $importe = '$ 0.00';
			                          
			                          }else if ($banco1286Credito[$i]["tieneIva"] == "Si" && $banco1286Credito[$i]["tieneRetenciones"] == 01) {
			                            $importe = '$ '.number_format(($banco1286Credito[$i]["importeRetenciones"]),2).'';
			                          }
			                          else if($banco1286Credito[$i]["tieneIva"] == "No" && $banco1286Credito[$i]["parciales"] == 0 && $banco1286Credito[$i]["tieneRetenciones"] == 0){ 

			                               $importe = '$ '.number_format($banco1286Credito[$i]["importe"],2).'';

			                          }else if($banco1286Credito[$i]["tieneIva"] == "No" && $banco1286Credito[$i]["parciales"] > 0 && $banco1286Credito[$i]["tieneRetenciones"] == 0){

			                              $importe = '$ 0.00';

			                          }else if ($banco1286Credito[$i]["tieneIva"] == "No" && $banco1286Credito[$i]["tieneRetenciones"] == 01) {
			                             $importe ='$ '.number_format($banco1286Credito[$i]["importeRetenciones"],2).'';
			                          }
			                          

			                          if ($banco1286Credito[$i]["tieneIva"] == "Si" && $banco1286Credito[$i]["parciales"] == 0 && $banco1286Credito[$i]["tieneRetenciones"] == 0 ) {

			                            $iva = '$'.number_format($banco1286Credito[$i]["iva"],2).'';

			                          }else if ($banco1286Credito[$i]["tieneIva"] == "Si" && $banco1286Credito[$i]["parciales"] > 0 && $banco1286Credito[$i]["tieneRetenciones"] == 01) {

			                           $iva = '$ 0.00';
			                            
			                          }else if ($banco1286Credito[$i]["tieneIva"] == "Si" && $banco1286Credito[$i]["tieneRetenciones"] == 01) {
			                            $iva = '$'.number_format(($banco1286Credito[$i]["importeRetenciones"])*0.16,2).'';
			                          }
			                          else{

			                           $iva = '$ 0.00';

			                          }

			  				}

	                         	/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Compras") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1286Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1286Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$banco1286Credito[$i]["id"].'",
				      "'.$banco1286Credito[$i]["departamento"].'",
				      "'.$banco1286Credito[$i]["grupo"].'",
				      "'.$banco1286Credito[$i]["subgrupo"].'",
				      "'.$banco1286Credito[$i]["mes"].'",
				      "'.$banco1286Credito[$i]["fecha"].'",
				      "'.$banco1286Credito[$i]["descripcion"].'",
				      "'.number_format($banco1286Credito[$i]["abono"],2).'",
				      "'.$verParcial.'",
				      "'.$banco1286Credito[$i]["serie"].'",
				      "'.$banco1286Credito[$i]["folio"].'",
				      "'.$banco1286Credito[$i]["numeroMovimiento"].'",
				      "'.$banco1286Credito[$i]["acreedor"].'",
				      "'.$banco1286Credito[$i]["concepto"].'",
				      "'.$banco1286Credito[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco1286Credito();
$activar -> mostrarTablasCredito();



