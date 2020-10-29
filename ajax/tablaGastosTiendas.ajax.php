<?php
session_start();
error_reporting(E_ALL);
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaGastos{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = 'idCreador';
		$idCreador = $_SESSION["id"];
 		$valor = $idCreador;

 		$gastos = ControladorFacturasTiendas::ctrMostrarGastos($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($gastos); $i++){


                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($gastos[$i]["tieneIva"] == "Si" && $gastos[$i]["parciales"] == 0 && $gastos[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($gastos[$i]["importeGasto"]/1.16),2).'';

                          }else if ($gastos[$i]["tieneIva"] == "Si" && $gastos[$i]["parciales"] > 0 && $gastos[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($gastos[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($gastos[$i]["tieneIva"] == "Si" && $gastos[$i]["parciales"] > 0 && $gastos[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($gastos[$i]["tieneIva"] == "Si" && $gastos[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($gastos[$i]["importeRetenciones"]/1.16),2).'';
                          }
                          else if($gastos[$i]["tieneIva"] == "No" && $gastos[$i]["parciales"] == 0 && $gastos[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($gastos[$i]["importeGasto"],2).'';

                          }else if($gastos[$i]["tieneIva"] == "No" && $gastos[$i]["parciales"] > 0 && $gastos[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($gastos[$i]["tieneIva"] == "No" && $gastos[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($gastos[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($gastos[$i]["tieneIva"] == "Si" && $gastos[$i]["parciales"] == 0 && $gastos[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($gastos[$i]["iva"],2).'';

                          }else if ($gastos[$i]["tieneIva"] == "Si" && $gastos[$i]["parciales"] > 0 && $gastos[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($gastos[$i]["tieneIva"] == "Si" && $gastos[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($gastos[$i]["importeRetenciones"]/1.16)*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($gastos[$i]["tieneRetenciones"] == 1 || $gastos[$i]["tieneRetenciones"] == 01 ) {

                            if ($gastos[$i]["tipoRetencion"] == "Arrendamiento" && $gastos[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($gastos[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($gastos[$i]["retIsr"],2).'';

                            }else if ($gastos[$i]["tipoRetencion"] == "Arrendamiento" && $gastos[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($gastos[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($gastos[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($gastos[$i]["tipoRetencion"] == "Flete" && $gastos[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($gastos[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($gastos[$i]["retIsr2"],2).'';

                            }else if ($gastos[$i]["tipoRetencion"] == "Flete" && $gastos[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($gastos[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($gastos[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($gastos[$i]["tipoRetencion"] == "Honorarios" && $gastos[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($gastos[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($gastos[$i]["retIsr3"],2).'';

	                          }else if($gastos[$i]["tipoRetencion"] == "Honorarios" && $gastos[$i]["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($gastos[$i]["importeRetenciones"]*10)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($gastos[$i]["importeRetenciones"]*10)/100,2).'';

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
					  			if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma") {

							  				if ($gastos[$i]["solicitada"] == 0 && $gastos[$i]["aprobada"] == 0) {

							  					if ($gastos[$i]["rutaFactura"] == "") {
							  							
							  						$solicitud = "<button class='btn btn-info btnSolicitarAprobacionGasto' idSolicitudGasto='".$gastos[$i]["id"]."' disabled ><i class='fa fa-send'></i>Autorización De Gasto</button>";

							  					}else{

							  						$solicitud = "<button class='btn btn-info btnSolicitarAprobacionGasto' idSolicitudGasto='".$gastos[$i]["id"]."' ><i class='fa fa-send'></i>Autorización De Gasto</button>";

							  					}


							  					$acciones = "<button class='btn btn-warning btnEditarDatosGastos' idGasto='".$gastos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatosGasto'><i class='fa fa-pencil'></i>Editar</button>&nbsp;".$solicitud.""; 
							  				}else{
							  					$acciones = "<button class='btn btn-warning btnEditarDatosGastos' idGasto='".$gastos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatosGasto' disabled title='El gasto aun no ha sido aprobado'><i class='fa fa-pencil'></i>Editar</button>";

							  				}

				                      }  
				                if ($gastos[$i]["aprobada"] == 1 and $gastos[$i]["reembolsado"] == 0) {

				                	$solicitud = "<input type='checkbox' class='checkSolicitud' name='checkReembolso$i' id = 'checkReembolso$i' gastoId = '".$gastos[$i]["id"]."' value=''>";
				                	
				                }else{

				                	$solicitud = "";
				                }
             					
             					if ($gastos[$i]["aprobada"] == 0 and $gastos[$i]["solicitada"] == 0 and $gastos[$i]["reembolsado"] == 0) {

             						$estatus = "<i class='fa fa-flag fa-2x' aria-hidden='true' style='color:red'></i>";

             					}else if ($gastos[$i]["aprobada"] == 0 and $gastos[$i]["solicitada"] == 1 and $gastos[$i]["reembolsado"] == 0) {

             						$estatus = "<i class='fa fa-flag fa-2x' aria-hidden='true' style='color:orange'></i>";
             						
             					}else if ($gastos[$i]["aprobada"] == 1 and $gastos[$i]["solicitada"] == 1 and $gastos[$i]["reembolsado"] == 0) {

             						$estatus = "<i class='fa fa-flag fa-2x' aria-hidden='true' style='color:green'></i>";
             						
             					}else if ($gastos[$i]["aprobada"] == 1 and $gastos[$i]["solicitada"] == 1 and $gastos[$i]["reembolsado"] == 1) {

             						$estatus = "<i class='fa fa-flag fa-2x' aria-hidden='true' style='color:#1a2c75'></i>";
             						
             					}
             					if ($gastos[$i]["rutaFactura"] == "") {

             						$factura = "".$gastos[$i]["numeroDocumento"]."";
             						
             					}else{

             						$factura = "".$gastos[$i]["numeroDocumento"]."<br><a href='".$gastos[$i]["rutaFactura"]."'  target='_blank'><i class='fa fa-file-pdf-o fa-1x' aria-hidden='true'></i></a>";

             					}
             					
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$gastos[$i]["id"].'",
				      "'.$solicitud.'",
				      "<strong>'.$gastos[$i]["serieGasto"].'</strong>",
				      "<strong>'.$gastos[$i]["folioGasto"].'</strong>",
				      "'.$estatus.'",
				      "'.$gastos[$i]["departamento"].'",
				      "'.$gastos[$i]["grupo"].'",
				      "'.$gastos[$i]["subgrupo"].'",
				      "'.$gastos[$i]["mes"].'",
				      "'.$gastos[$i]["fecha"].'",
				      "'.$gastos[$i]["descripcion"].'",
				      "$ '.number_format($gastos[$i]["importeGasto"],2).'",
				      "'.$gastos[$i]["acreedor"].'",
				      "'.$factura.'",
				      "'.$iva.'",
				      "'.$importe.'",
				      "'.$acciones.'",
				      "'.$retIva.'",
				      "'.$retIsr.'",
				      "'.$retIva2.'",
				      "'.$retIsr2.'",
				      "'.$retIva3.'",
				      "'.$retIsr3.'"
					  
					],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE GASTOS
=============================================*/ 
$activar = new TablaGastos();
$activar -> mostrarTablas();



