<?php
error_reporting(0);
session_start();
require_once "../controladores/compras.controlador.php";
require_once "../modelos/compras.modelo.php";

class TablaCompras{

  public function mostrarTablas(){  
     /*=============================================
    MOSTRAR LA TABLA DE compras
    =============================================*/ 
    function seg_a_dhms2($seg) {
                $dias = floor($seg / 86400);
                $horas = floor(($seg - ($dias * 86400)) / 3600);
                $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
                $segundos = $seg % 60;
                return "$dias dias, $horas horas, $minutos minutos, $segundos segundos";
    }
    $item = null;
    $valor = null;

    $compras = ControladorCompras::ctrMostrarCompras($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($compras); $i++){



                        $hora = $compras[$i]["tiempoProceso"];
                        list($horas, $minutos, $segundos) = explode(':', $hora);
                        $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;

                         $tiempoProceso = seg_a_dhms2($hora_en_segundos);
                        
                          if ($compras[$i]["status"] == 5 && $compras[$i]["estado"] == 0 ) {

                           
                          }
                          else if($compras[$i]["status"] == 0 && $compras[$i]["estado"] == 1){
                            //se removio la clase btnStatus
                            $estatusCompra = "<button class='btn btn-danger btn-xs' idCompras='".$compras[$i]["id"]."' etapa='1'>Cotizando</button>";
                          
                          }else if($compras[$i]["status"] == 1 && $compras[$i]["estado"] == 1){

                            $estatusCompra = "<button class='btn btn-warning btn-xs' idCompras='".$compras[$i]["id"]."' etapa='2'>En Recolección</button>";

                          }else if($compras[$i]["status"] == 2 && $compras[$i]["estado"] == 1){

                            $estatusCompra = "<button class='btn btn-info btn-xs' idCompras='".$compras[$i]["id"]."' etapa='3'>Proceso de Pago</button>";

                          }else if($compras[$i]["status"] == 3 && $compras[$i]["estado"] == 1) {
                              
                            $estatusCompra = "<button class='btn btn-warning btn-xs' idCompras='".$compras[$i]["id"]."' etapa='4'>Autorizacion Pendiente</button>";


                          }else if($compras[$i]["status"] == 4 && $compras[$i]["estado"] == 1){

                            $estatusCompra = "<button class='btn btn-success btn-xs'>Concluido</button>";

                          }else if($compras[$i]["sinAdquisicion"] == 1 && $compras[$i]["estado"] == 0){

                            $estatusCompra = "<button class='btn btn-warning btn-xs'>Sin Adquisición</button>";

                          }else if ($compras[$i]["status"] == 6 && $compras[$i]["estado"] == 1) {

                               $estatusCompra = "<button class='btn btn-info btn-xs'>Compra Pendiente</button>";

                          }

                           /*DOS NUEVAS LINEAS*/
                            
                           if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"]=="Compras") {
                          
                        if ($compras[$i]["status"] != 4 || $compras[$i]["habilitado"] == 1) {
                            
                            if ($compras[$i]["estado"] == 0 && $compras[$i]["status"] == 0 && $compras[$i]["pendiente"] == 1) {

                              if ($compras[$i]["tipoCompra"] == 1) {
                                
                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraGeneral'><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 

                              }else if ($compras[$i]["tipoCompra"] == 2) {

                                 $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra1' idCompra1='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraInterna'><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 
                                
                              }
                            
                            }else if ($compras[$i]["estado"] == 0 && $compras[$i]["status"] == 0 && $compras[$i]["pendiente"] == 0) {

                              if ($compras[$i]["tipoCompra"] == 1) {
                                
                                 $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraGeneral' disabled><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 

                              }else if ($compras[$i]["tipoCompra"] == 2) {

                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra1' idCompra1='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraInterna' disabled><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 
                                
                              }
                            
                            }else{

                              if ($compras[$i]["tipoCompra"] == 1) {
                                
                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraGeneral'><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 

                              }else if ($compras[$i]["tipoCompra"] == 2) {

                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra1' idCompra1='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraInterna'><i class='fa fa-pencil'></i>Editar Compra</button</div>"; 
                                
                              }
                            }
                            
                            
                        }else{

                             if ($compras[$i]["tipoCompra"] == 1) {
                                
                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraGeneral' disabled><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 

                              }else if ($compras[$i]["tipoCompra"] == 2) {

                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra1' idCompra1='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraInterna' disabled><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 
                                
                              }
                        }
                         
                      }else{
                        if ($compras[$i]["tipoCompra"] == 1) {
                                
                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraGeneral' disabled><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 

                              }else if ($compras[$i]["tipoCompra"] == 2) {

                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCompra1' idCompra1='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompraInterna' disabled><i class='fa fa-pencil'></i>Editar Compra</button></div>"; 
                                
                              }
                      } 
                     


                      $verCompras = "<div class='btn-group'><button class='btn btn-info btnVerCompras' idCom='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalVerCompras'>Ver</button></div>";

                      /*========HABILITAR FOLIO============*/

                      if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez") {

                         if ($compras[$i]["habilitado"]  != 0) {

                            $habilitado = "<div class='btn-group'><button class='btn btn-success btnHabilitarFolio' idCompras3='".$compras[$i]["id"]."' estadoCompra='0'><i class='fa fa-power-off'></i>Habilitado</button></div>";
                        
                          }else {


                             $habilitado = "<div class='btn-group'><button class='btn btn-danger btnHabilitarFolio' idCompras3='".$compras[$i]["id"]."' estadoCompra='1'><i class='fa fa-power-off'></i>Deshabilitado</button></div>";

                          }
                 
                        
                      }else {

                              $habilitado = "<div class='btn-group'></div>";

                          }
                        if ($compras[$i]["observacionesExtras"] == "") {

                              $importante = "<div class=''><span class='label label-success'>SIN OBSERVACIONES</span></div>"; 
                          
                        }else {

                              $importante = "<div class='btn-group'><button class='animated wobble infinite btn btn-danger btnVerObservaciones' idCompras4='".$compras[$i]["id"]."' data-toggle='modal' data-target='#verObservaciones'><i class='fa fa-eye'></i> Ver</button></div>";
                        }
             
                     

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
              "'.$compras[$i]["idPedido"].'",
              "'.$compras[$i]["vendedor"].'",
              "'.$compras[$i]["usuario"].'",
              "'.$compras[$i]["serie"].'",
              "'.$compras[$i]["folioCompra"].'",
              "'.$compras[$i]["fechaCotizacion"].'",
              "'.$compras[$i]["cliente"].'",
              "'.$estatusCompra.'",
              "'.$compras[$i]["tiempoEntrega"].'",
              "'.$compras[$i]["fechaRecepcion"].'",
              "'.$compras[$i]["fechaElaboracion"].'",
              "'.$compras[$i]["fechaTermino"].'",
              "'.$importante.'",
              "'.$compras[$i]["observaciones"].'",
              "'.$tiempoProceso.'",
              "'.number_format($compras[$i]["utilidad"],2).'%",
              "'.$verCompras.'",
              "'.$habilitado.'",
              "'.$acciones.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE compras
=============================================*/ 
$activar = new TablaCompras();
$activar -> mostrarTablas();



