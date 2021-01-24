<?php
session_start();
ini_set('memory_limit', '-1');
require_once "../controladores/banco0198.controlador.php";
require_once "../modelos/banco0198.modelo.php";

class TablaBanco0198Credito{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablasCredito(){	

		$item1 = "fecha";
    	if($_GET["fechaIni"] != '') {
       		$fechaIni = $_GET["fechaIni"];
	        $valor1 = $fechaIni;


    	}else{
	      
	        $valor1 =  date('Y-m-d', strtotime($fecha."- 7 days"));
    	}

	    if($_GET["fechaFin"] != '') {

	        $fechaFin = $_GET["fechaFin"];
	        $valor2 = $fechaFin;

	    }else{
	       
	        $valor2 = date('Y-m-d', strtotime($fecha."- 0 days"));

	    }

	    $banco0198Credito = ControladorBanco0198::ctrMostrarRangoFechasCredito($item1, $valor1,$valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($banco0198Credito); $i++){

						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($banco0198Credito[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco0198Credito[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($banco0198Credito[$i]["tieneIva"] == "Si" && $banco0198Credito[$i]["parciales"] == 0 && $banco0198Credito[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco0198Credito[$i]["importe"]/1.16),2).'';

                          }else if ($banco0198Credito[$i]["tieneIva"] == "Si" && $banco0198Credito[$i]["parciales"] > 0 && $banco0198Credito[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco0198[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco0198Credito[$i]["tieneIva"] == "Si" && $banco0198Credito[$i]["parciales"] > 0 && $banco0198Credito[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco0198Credito[$i]["tieneIva"] == "Si" && $banco0198Credito[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco0198Credito[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco0198Credito[$i]["tieneIva"] == "No" && $banco0198Credito[$i]["parciales"] == 0 && $banco0198Credito[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco0198Credito[$i]["importe"],2).'';

                          }else if($banco0198Credito[$i]["tieneIva"] == "No" && $banco0198Credito[$i]["parciales"] > 0 && $banco0198Credito[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco0198Credito[$i]["tieneIva"] == "No" && $banco0198Credito[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco0198Credito[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco0198Credito[$i]["tieneIva"] == "Si" && $banco0198Credito[$i]["parciales"] == 0 && $banco0198Credito[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco0198Credito[$i]["iva"],2).'';

                          }else if ($banco0198Credito[$i]["tieneIva"] == "Si" && $banco0198Credito[$i]["parciales"] > 0 && $banco0198Credito[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco0198Credito[$i]["tieneIva"] == "Si" && $banco0198Credito[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco0198Credito[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }


	                         	/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco0198Credito[$i]["id"]."'  abono = '".$banco0198Credito[$i]["abono"]."' fechaAbono = '".$banco0198Credito[$i]["fecha"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco0198Credito[$i]["id"]."'  abono = '".$banco0198Credito[$i]["abono"]."' fechaAbono = '".$banco0198Credito[$i]["fecha"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    
                      			           
             


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$banco0198Credito[$i]["id"].'",
				      "'.$banco0198Credito[$i]["departamento"].'",
				      "'.$banco0198Credito[$i]["grupo"].'",
				      "'.$banco0198Credito[$i]["subgrupo"].'",
				      "'.$banco0198Credito[$i]["mes"].'",
				      "'.$banco0198Credito[$i]["fecha"].'",
				      "'.$banco0198Credito[$i]["descripcion"].'",
				      "'.number_format($banco0198Credito[$i]["abono"],2).'",
				      "'.$verParcial.'",
				      "'.$banco0198Credito[$i]["serie"].'",
				      "'.$banco0198Credito[$i]["folio"].'",
				      "'.$banco0198Credito[$i]["numeroMovimiento"].'",
				      "'.$banco0198Credito[$i]["acreedor"].'",
				      "'.$banco0198Credito[$i]["concepto"].'",
				      "'.$banco0198Credito[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco0198Credito();
$activar -> mostrarTablasCredito();



