<?php
session_start();
error_reporting(0);
ini_set('memory_limit', '-1');
require_once "../controladores/banco6278.controlador.php";
require_once "../modelos/banco6278.modelo.php";

class TablaBanco6278{

    /*=============================================
    MOSTRAR LA TABLA DE CLIENTES
    =============================================*/ 

    public function mostrarTablas(){    

        $item1 = "fecha";
        if($_GET["fechaIni"] != '') {

            $fechaIni = $_GET["fechaIni"];
            $valor1 = $fechaIni;

        }else{

         
            $valor1 = date('Y-m-d', strtotime($fecha."- 3 month"));
        }

        if($_GET["fechaFin"] != '') {

            $fechaFin = $_GET["fechaFin"];
            $valor2 = $fechaFin;

        }else{
        
            $valor2 = date('Y-m-d', strtotime($fecha."-0 days"));

        }
        $banco6278 = ControladorBanco6278::ctrMostrarRangoFechas($item1, $valor1,$valor2);


        $datosJson = '{
         
        "data": [ ';

        for($i = 0; $i < count($banco6278); $i++){

                        /*=============================================
                        VALIDAR PARCIALES
                        =============================================*/

                        if ($banco6278[$i]["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$banco6278[$i]["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                        /*=============================================
                                VALIDAR IVA 
                                =============================================*/

                           if ($banco6278[$i]["tieneIva"] == "Si" && $banco6278[$i]["parciales"] == 0 && $banco6278[$i]["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($banco6278[$i]["importe"]/1.16),2).'';

                          }else if ($banco6278[$i]["tieneIva"] == "Si" && $banco6278[$i]["parciales"] > 0 && $banco6278[$i]["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($banco6278[$i]2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($banco6278[$i]["tieneIva"] == "Si" && $banco6278[$i]["parciales"] > 0 && $banco6278[$i]["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($banco6278[$i]["tieneIva"] == "Si" && $banco6278[$i]["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($banco6278[$i]["importeRetenciones"]),2).'';
                          }
                          else if($banco6278[$i]["tieneIva"] == "No" && $banco6278[$i]["parciales"] == 0 && $banco6278[$i]["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($banco6278[$i]["importe"],2).'';

                          }else if($banco6278[$i]["tieneIva"] == "No" && $banco6278[$i]["parciales"] > 0 && $banco6278[$i]["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($banco6278[$i]["tieneIva"] == "No" && $banco6278[$i]["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($banco6278[$i]["importeRetenciones"],2).'';
                          }
                          

                          if ($banco6278[$i]["tieneIva"] == "Si" && $banco6278[$i]["parciales"] == 0 && $banco6278[$i]["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($banco6278[$i]["iva"],2).'';

                          }else if ($banco6278[$i]["tieneIva"] == "Si" && $banco6278[$i]["parciales"] > 0 && $banco6278[$i]["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($banco6278[$i]["tieneIva"] == "Si" && $banco6278[$i]["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($banco6278[$i]["importeRetenciones"])*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                            /*=============================================
                            VALIDAR RETENCIONES
                            =============================================*/

                          /***************************************************/
                          if ($banco6278[$i]["tieneRetenciones"] == 1 || $banco6278[$i]["tieneRetenciones"] == 01 ) {

                            if ($banco6278[$i]["tipoRetencion"] == "Arrendamiento" && $banco6278[$i]["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($banco6278[$i]["retIva"],2).'';
                              $retIsr = '$ '.number_format($banco6278[$i]["retIsr"],2).'';

                            }else if ($banco6278[$i]["tipoRetencion"] == "Arrendamiento" && $banco6278[$i]["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($banco6278[$i]["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($banco6278[$i]["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($banco6278[$i]["tipoRetencion"] == "Flete" && $banco6278[$i]["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($banco6278[$i]["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($banco6278[$i]["retIsr2"],2).'';

                            }else if ($banco6278[$i]["tipoRetencion"] == "Flete" && $banco6278[$i]["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($banco6278[$i]["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($banco6278[$i]["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($banco6278[$i]["tipoRetencion"] == "Honorarios" && $banco6278[$i]["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($banco6278[$i]["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($banco6278[$i]["retIsr3"],2).'';

                              }else if($banco6278[$i]["tipoRetencion"] == "Honorarios" && $banco6278[$i]["tieneRetenciones"] == 01){

                              $retIva3 = '$ '.number_format(($banco6278[$i]["importeRetenciones"]*10.6667)/100,2).'';
                              $retIsr3 = '$ '.number_format(($banco6278[$i]["importeRetenciones"]*10)/100,2).'';

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
                                if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Contabilidad") {

                                    $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco6278[$i]["id"]." '  abono = '".$banco6278[$i]["abono"]."' fechaAbono = '".$banco6278[$i]["fecha"]."' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

                                      }else{

                                         $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$banco6278[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
                                      }    

                                           
             


            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson   .= '[
                      "'.$banco6278[$i]["id"].'",
                      "'.$banco6278[$i]["departamento"].'",
                      "'.$banco6278[$i]["grupo"].'",
                      "'.$banco6278[$i]["subgrupo"].'",
                      "'.$banco6278[$i]["mes"].'",
                      "'.$banco6278[$i]["fecha"].'",
                      "'.$banco6278[$i]["descripcion"].'",
                      "'.number_format($banco6278[$i]["cargo"],2).'",
                      "'.number_format($banco6278[$i]["abono"],2).'",
                      "'.number_format($banco6278[$i]["saldo"],2).'",
                      "'.number_format($banco6278[$i]["comprobacion"],2).'",
                      "'.number_format($banco6278[$i]["diferencia"],2).'",
                      "'.$verParcial.'",
                      "'.$banco6278[$i]["serie"].'",
                      "'.$banco6278[$i]["folio"].'",
                      "'.$banco6278[$i]["numeroMovimiento"].'",
                      "'.$banco6278[$i]["acreedor"].'",
                      "'.$banco6278[$i]["concepto"].'",
                      "'.$banco6278[$i]["numeroDocumento"].'",
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
$activar = new TablaBanco6278();
$activar -> mostrarTablas();