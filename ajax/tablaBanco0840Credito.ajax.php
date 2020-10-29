<?php
session_start();
ini_set('memory_limit', '-1');
require_once "../controladores/banco0840.controlador.php";
require_once "../modelos/banco0840.modelo.php";

class TablaBanco0840Credito{

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

 		$banco0840Credito = ControladorBanco0840::ctrMostrarBancoCredito($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco0840Credito); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco0840Credito[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco0840Credito[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco0840Credito[$i]["tieneIva"] == "Si" && $banco0840Credito[$i]["parciales"] == 0 && $banco0840Credito[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco0840Credito[$i]["importe"]/1.16),2).'';

                          }else if ($banco0840Credito[$i]["tieneIva"] == "Si" && $banco0840Credito[$i]["parciales"] > 0 && $banco0840Credito[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco0840[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco0840Credito[$i]["tieneIva"] == "Si" && $banco0840Credito[$i]["parciales"] > 0 && $banco0840Credito[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco0840Credito[$i]["tieneIva"] == "Si" && $banco0840Credito[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco0840Credito[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco0840Credito[$i]["tieneIva"] == "No" && $banco0840Credito[$i]["parciales"] == 0 && $banco0840Credito[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco0840Credito[$i]["importe"],2).'';

                          }else if($banco0840Credito[$i]["tieneIva"] == "No" && $banco0840Credito[$i]["parciales"] > 0 && $banco0840Credito[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco0840Credito[$i]["tieneIva"] == "No" && $banco0840Credito[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco0840Credito[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco0840Credito[$i]["tieneIva"] == "Si" && $banco0840Credito[$i]["parciales"] == 0 && $banco0840Credito[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco0840Credito[$i]["iva"],2).'';

                          }else if ($banco0840Credito[$i]["tieneIva"] == "Si" && $banco0840Credito[$i]["parciales"] > 0 && $banco0840Credito[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco0840Credito[$i]["tieneIva"] == "Si" && $banco0840Credito[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco0840Credito[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }


	                         	/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Compras") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco0840Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco0840Credito[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$banco0840Credito[$i]["id"].'",
				      "'.$banco0840Credito[$i]["departamento"].'",
				      "'.$banco0840Credito[$i]["grupo"].'",
				      "'.$banco0840Credito[$i]["subgrupo"].'",
				      "'.$banco0840Credito[$i]["mes"].'",
				      "'.$banco0840Credito[$i]["fecha"].'",
				      "'.$banco0840Credito[$i]["descripcion"].'",
				      "'.number_format($banco0840Credito[$i]["abono"],2).'",
				      "'.$verParcial.'",
				      "'.$banco0840Credito[$i]["serie"].'",
				      "'.$banco0840Credito[$i]["folio"].'",
				      "'.$banco0840Credito[$i]["numeroMovimiento"].'",
				      "'.$banco0840Credito[$i]["acreedor"].'",
				      "'.$banco0840Credito[$i]["concepto"].'",
				      "'.$banco0840Credito[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco0840Credito();
$activar -> mostrarTablasCredito();



