<?php
session_start();
ini_set('memory_limit', '-1');
require_once "../controladores/banco1340.controlador.php";
require_once "../modelos/banco1340.modelo.php";

class TablaBanco1340Credito{

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

 		$banco1340Credito = ControladorBanco1340::ctrMostrarBancoCredito($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco1340Credito); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco1340Credito[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco1340Credito[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco1340Credito[$i]["tieneIva"] == "Si" && $banco1340Credito[$i]["parciales"] == 0 && $banco1340Credito[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco1340Credito[$i]["importe"]/1.16),2).'';

                          }else if ($banco1340Credito[$i]["tieneIva"] == "Si" && $banco1340Credito[$i]["parciales"] > 0 && $banco1340Credito[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco1340[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco1340Credito[$i]["tieneIva"] == "Si" && $banco1340Credito[$i]["parciales"] > 0 && $banco1340Credito[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco1340Credito[$i]["tieneIva"] == "Si" && $banco1340Credito[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco1340Credito[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco1340Credito[$i]["tieneIva"] == "No" && $banco1340Credito[$i]["parciales"] == 0 && $banco1340Credito[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco1340Credito[$i]["importe"],2).'';

                          }else if($banco1340Credito[$i]["tieneIva"] == "No" && $banco1340Credito[$i]["parciales"] > 0 && $banco1340Credito[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco1340Credito[$i]["tieneIva"] == "No" && $banco1340Credito[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco1340Credito[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco1340Credito[$i]["tieneIva"] == "Si" && $banco1340Credito[$i]["parciales"] == 0 && $banco1340Credito[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco1340Credito[$i]["iva"],2).'';

                          }else if ($banco1340Credito[$i]["tieneIva"] == "Si" && $banco1340Credito[$i]["parciales"] > 0 && $banco1340Credito[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco1340Credito[$i]["tieneIva"] == "Si" && $banco1340Credito[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco1340Credito[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }


	                         	/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Compras") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1340Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1340Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$banco1340Credito[$i]["id"].'",
				      "'.$banco1340Credito[$i]["departamento"].'",
				      "'.$banco1340Credito[$i]["grupo"].'",
				      "'.$banco1340Credito[$i]["subgrupo"].'",
				      "'.$banco1340Credito[$i]["mes"].'",
				      "'.$banco1340Credito[$i]["fecha"].'",
				      "'.$banco1340Credito[$i]["descripcion"].'",
				      "'.number_format($banco1340Credito[$i]["abono"],2).'",
				      "'.$verParcial.'",
				      "'.$banco1340Credito[$i]["serie"].'",
				      "'.$banco1340Credito[$i]["folio"].'",
				      "'.$banco1340Credito[$i]["numeroMovimiento"].'",
				      "'.$banco1340Credito[$i]["acreedor"].'",
				      "'.$banco1340Credito[$i]["concepto"].'",
				      "'.$banco1340Credito[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco1340Credito();
$activar -> mostrarTablasCredito();



