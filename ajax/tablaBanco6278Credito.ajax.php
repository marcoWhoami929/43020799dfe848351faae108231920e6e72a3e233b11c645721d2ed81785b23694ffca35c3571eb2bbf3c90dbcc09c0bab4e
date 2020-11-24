<?php
session_start();
error_reporting(0);
ini_set('memory_limit', '-1');
require_once "../controladores/banco6278.controlador.php";
require_once "../modelos/banco6278.modelo.php";

class TablaBanco6278Credito{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablasCredito(){	

		$item1 = "fecha";
    	if($_GET["fechaIni"] != '') {
       		$fechaIni = $_GET["fechaIni"];
	        $valor1 = $fechaIni;


    	}else{
	      
	        $valor1 =  date('Y-m-d', strtotime($fecha."- 1 month"));
    	}

	    if($_GET["fechaFin"] != '') {

	        $fechaFin = $_GET["fechaFin"];
	        $valor2 = $fechaFin;

	    }else{
	       
	        $valor2 = date('Y-m-d', strtotime($fecha."- 0 days"));

	    }

 		$banco6278Credito = ControladorBanco6278::ctrMostrarRangoFechasCredito($item1, $valor1,$valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco6278Credito); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco6278Credito[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco6278Credito[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco6278Credito[$i]["tieneIva"] == "Si" && $banco6278Credito[$i]["parciales"] == 0 && $banco6278Credito[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco6278Credito[$i]["importe"]/1.16),2).'';

                          }else if ($banco6278Credito[$i]["tieneIva"] == "Si" && $banco6278Credito[$i]["parciales"] > 0 && $banco6278Credito[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco6278[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco6278Credito[$i]["tieneIva"] == "Si" && $banco6278Credito[$i]["parciales"] > 0 && $banco6278Credito[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco6278Credito[$i]["tieneIva"] == "Si" && $banco6278Credito[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco6278Credito[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco6278Credito[$i]["tieneIva"] == "No" && $banco6278Credito[$i]["parciales"] == 0 && $banco6278Credito[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco6278Credito[$i]["importe"],2).'';

                          }else if($banco6278Credito[$i]["tieneIva"] == "No" && $banco6278Credito[$i]["parciales"] > 0 && $banco6278Credito[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco6278Credito[$i]["tieneIva"] == "No" && $banco6278Credito[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco6278Credito[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco6278Credito[$i]["tieneIva"] == "Si" && $banco6278Credito[$i]["parciales"] == 0 && $banco6278Credito[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco6278Credito[$i]["iva"],2).'';

                          }else if ($banco6278Credito[$i]["tieneIva"] == "Si" && $banco6278Credito[$i]["parciales"] > 0 && $banco6278Credito[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco6278Credito[$i]["tieneIva"] == "Si" && $banco6278Credito[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco6278Credito[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }


	                         	/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Compras") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco6278Credito[$i]["id"]."' abono = '".$banco6278Credito[$i]["abono"]."' fechaAbono = '".$banco6278Credito[$i]["fecha"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco6278Credito[$i]["id"]."' abono = '".$banco6278Credito[$i]["abono"]."' fechaAbono = '".$banco6278Credito[$i]["fecha"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$banco6278Credito[$i]["id"].'",
				      "'.$banco6278Credito[$i]["departamento"].'",
				      "'.$banco6278Credito[$i]["grupo"].'",
				      "'.$banco6278Credito[$i]["subgrupo"].'",
				      "'.$banco6278Credito[$i]["mes"].'",
				      "'.$banco6278Credito[$i]["fecha"].'",
				      "'.$banco6278Credito[$i]["descripcion"].'",
				      "'.number_format($banco6278Credito[$i]["abono"],2).'",
				      "'.$verParcial.'",
				      "'.$banco6278Credito[$i]["serie"].'",
				      "'.$banco6278Credito[$i]["folio"].'",
				      "'.$banco6278Credito[$i]["numeroMovimiento"].'",
				      "'.$banco6278Credito[$i]["acreedor"].'",
				      "'.$banco6278Credito[$i]["concepto"].'",
				      "'.$banco6278Credito[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco6278Credito();
$activar -> mostrarTablasCredito();



