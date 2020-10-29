<?php
session_start();
ini_set('memory_limit', '-1');
require_once "../controladores/banco1219.controlador.php";
require_once "../modelos/banco1219.modelo.php";

class TablaBanco1219Credito{

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

 		$banco1219Credito = ControladorBanco1219::ctrMostrarBancoCredito($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco1219Credito); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco1219Credito[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco1219Credito[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco1219Credito[$i]["tieneIva"] == "Si" && $banco1219Credito[$i]["parciales"] == 0 && $banco1219Credito[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco1219Credito[$i]["importe"]/1.16),2).'';

                          }else if ($banco1219Credito[$i]["tieneIva"] == "Si" && $banco1219Credito[$i]["parciales"] > 0 && $banco1219Credito[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco1219[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco1219Credito[$i]["tieneIva"] == "Si" && $banco1219Credito[$i]["parciales"] > 0 && $banco1219Credito[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco1219Credito[$i]["tieneIva"] == "Si" && $banco1219Credito[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco1219Credito[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco1219Credito[$i]["tieneIva"] == "No" && $banco1219Credito[$i]["parciales"] == 0 && $banco1219Credito[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco1219Credito[$i]["importe"],2).'';

                          }else if($banco1219Credito[$i]["tieneIva"] == "No" && $banco1219Credito[$i]["parciales"] > 0 && $banco1219Credito[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco1219Credito[$i]["tieneIva"] == "No" && $banco1219Credito[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco1219Credito[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco1219Credito[$i]["tieneIva"] == "Si" && $banco1219Credito[$i]["parciales"] == 0 && $banco1219Credito[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco1219Credito[$i]["iva"],2).'';

                          }else if ($banco1219Credito[$i]["tieneIva"] == "Si" && $banco1219Credito[$i]["parciales"] > 0 && $banco1219Credito[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco1219Credito[$i]["tieneIva"] == "Si" && $banco1219Credito[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco1219Credito[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }


	                         	/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Compras") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1219Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco1219Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$banco1219Credito[$i]["id"].'",
				      "'.$banco1219Credito[$i]["departamento"].'",
				      "'.$banco1219Credito[$i]["grupo"].'",
				      "'.$banco1219Credito[$i]["subgrupo"].'",
				      "'.$banco1219Credito[$i]["mes"].'",
				      "'.$banco1219Credito[$i]["fecha"].'",
				      "'.$banco1219Credito[$i]["descripcion"].'",
				      "'.number_format($banco1219Credito[$i]["abono"],2).'",
				      "'.$verParcial.'",
				      "'.$banco1219Credito[$i]["serie"].'",
				      "'.$banco1219Credito[$i]["folio"].'",
				      "'.$banco1219Credito[$i]["numeroMovimiento"].'",
				      "'.$banco1219Credito[$i]["acreedor"].'",
				      "'.$banco1219Credito[$i]["concepto"].'",
				      "'.$banco1219Credito[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco1219Credito();
$activar -> mostrarTablasCredito();



