<?php
error_reporting(0);
session_start();
require_once "../controladores/logistica.controlador.php";
require_once "../modelos/logistica.modelo.php";

class TablaLogistica{

  public function mostrarTablas(){  
     /*=============================================
    MOSTRAR LA TABLA DE LOGISTICA
    =============================================*/ 
    function seg_a_dhms($seg) {
                $dias = floor($seg / 86400);
                $horas = floor(($seg - ($dias * 86400)) / 3600);
                $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
                $segundos = $seg % 60;
                return "$dias dias, $horas horas, $minutos minutos, $segundos segundos";
    }
    $item = null;
    $valor = null;

     $usuario = $_SESSION['nombre'];

    if ( $usuario == "Nataly Fuentes" || $usuario == "Aurora Fernandez") {
      
      $idUsuario = "2";
   

    }else if($usuario == "Mauricio Anaya"){

      $idUsuario = "1";
    

    }else{

      $idUsuario = null;
   
    }

    $logistica = ControladorLogistica::ctrMostrarLogistica($item, $valor,$idUsuario);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($logistica); $i++){



                        $hora = $logistica[$i]["tiempoProceso"];
                        list($horas, $minutos, $segundos) = explode(':', $hora);
                        $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;


                        if ($logistica[$i]["status"] == 0 && $logistica[$i]["estado"] == 0 && $logistica[$i]["pendiente"] == 1) {

                             $estatusPedido =  "<button class='btn btn-info btn-xs'>Pedido Pendiente</button>";
                             
                           } 
                         else if($logistica[$i]["status"] == 0 && $logistica[$i]["estado"] == 1){

                              $estatusPedido = "<button class='btn btn-danger btn-xs' idLogistica='".$logistica[$i]["id"]."' etapa='1'>Detenido</button>";
                          
                          }else if($logistica[$i]["status"] == 1 && $logistica[$i]["estado"] == 1){

                              $estatusPedido = "<button class='btn btn-warning btn-xs' idLogistica='".$logistica[$i]["id"]."' etapa='2'>Ruta</button>";

                          }else if($logistica[$i]["status"] == 2 && $logistica[$i]["estado"] == 1 ){

                              $estatusPedido = "<button class='btn btn-success btn-xs'>Entregado</button>";

                          }else if ($logistica[$i]["status"] == 0 && $logistica[$i]["estado"] == 0 && $logistica[$i]["pendiente"] == 2) {

                              $estatusPedido = "<button class='btn btn-danger btn-xs'>Pedido Cancelado</button>";
                             
                           }

                             if($logistica[$i]["tipoRuta"] == ""){

                                $tipoRuta = "Sin ruta asignada";

                              }else if($logistica[$i]["tipoRuta"] == "Mostrador"){

                                $tipoRuta = "Mostrador";

                              }else if($logistica[$i]["tipoRuta"] == "Foraneo"){

                                $tipoRuta = "Foraneo";

                              }else if ($logistica[$i]["tipoRuta"] == "Local") {

                                $tipoRuta = "Local";

                              }



                              if ($logistica[$i]["estadoPedido"] == 0 && $logistica[$i]["estadoAlmacen"] == 0 && $logistica[$i]["statusAlmacen"] == 0 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4) {

                                $ubicacion = "<div><i class='fa fa-opencart'></i><span>Atención a clientes</span></div>";
                                
                              }else  if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 0 && $logistica[$i]["statusAlmacen"] == 0 && $logistica[$i]["estadoCompras"] == 0 && $logistica[$i]["statusCompras"] == 0) {

                                $ubicacion = "<div><i class='fa fa-opencart'></i><span>Atención a clientes</span></div>";
                                
                              }
                              else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 0 && $logistica[$i]["statusAlmacen"] == 0 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4 && $logistica[$i]["estadoFacturacion"] == 0 && $logistica[$i]["statusFacturacion"] == 0 ) {

                                $ubicacion = "<div><i class='fa fa-opencart'></i><span>Atención a clientes</span></div>";
                                
                              }
                              else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] <= 3 && $logistica[$i]["estadoCompras"] == 0 && $logistica[$i]["statusCompras"] == 0) {

                                $ubicacion = "<div><i class='fa fa-bank'></i><span>Almacén</span></div>";
                                
                              }else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] < 3 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4 && $logistica[$i]["estadoFacturacion"] == 0 && $logistica[$i]["statusFacturacion"] == 0 ) {

                                $ubicacion = "<div><i class='fa fa-bank'></i><span>Almacén</span></div>";
                                
                              }else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] < 3 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4 && $logistica[$i]["estadoFacturacion"] == 1 && $logistica[$i]["statusFacturacion"] == 1 ) {

                                $ubicacion = "<div><i class='fa fa-bank'></i><span>Almacén</span></div>";
                                
                              }
                              else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 0 && $logistica[$i]["statusAlmacen"] == 0 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4 && $logistica[$i]["estadoFacturacion"] == 1 && $logistica[$i]["statusFacturacion"] == 1 ) {

                                $ubicacion = "<div><i class='fa fa-bank'></i><span>Almacén</span></div>";
                                
                              }
                              else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] <= 3 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4 && $logistica[$i]["estadoFacturacion"] == 1 && $logistica[$i]["statusFacturacion"] == 1) {

                                $ubicacion = "<div><i class='fa fa-file-text-o'></i><span>Facturación</span></div>";
                                
                              }
                               else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] <= 3 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4 && $logistica[$i]["estadoFacturacion"] == 1 && $logistica[$i]["statusFacturacion"] == 0) {

                                $ubicacion = "<div><i class='fa fa-shopping-cart'></i><span>Compras</span></div>";
                                
                              }
                              else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] == 3 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4 && $logistica[$i]["estadoFacturacion"] == 0 && $logistica[$i]["statusFacturacion"] == 0) {

                                $ubicacion = "<div><i class='fa fa-shopping-cart'></i><span>Compras</span></div>";
                                
                              }else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] == 3 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] < 4 && $logistica[$i]["estadoFacturacion"] == 0 && $logistica[$i]["statusFacturacion"] == 0) {

                                $ubicacion = "<div><i class='fa fa-shopping-cart'></i><span>Compras</span></div>";
                                
                              }else if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] <  3 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] < 4 && $logistica[$i]["estadoFacturacion"] == 0 && $logistica[$i]["statusFacturacion"] == 0) {

                                $ubicacion = "<div><i class='fa fa-bank'></i><span>Almacén</span></div>";
                                
                              }



                           /*DOS NUEVAS LINEAS*/
                            
                        if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"]=="Logistica" || $_SESSION["nombre"] == "Nataly Fuentes" || $_SESSION["nombre"] == "Aurora Fernandez") {

                                if ($logistica[$i]["status"] != 3 || $logistica[$i]["habilitado"] == 1) {
                                 
                                  if ($logistica[$i]["estado"] == 0 && $logistica[$i]["status"] == 0 && $logistica[$i]["pendiente"] == 1) {

                                    if ($logistica[$i]["estadoPedido"] == 1 && $logistica[$i]["estadoAlmacen"] == 1 && $logistica[$i]["statusAlmacen"] == 3 && $logistica[$i]["estadoFacturacion"] == 1 && $logistica[$i]["statusFacturacion"] == 1 && $logistica[$i]["estadoCompras"] == 1 && $logistica[$i]["statusCompras"] >= 4) {

                                      $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLogis='".$logistica[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar</button></div>";  

                                    }else {

                                      $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar</button></div>";

                                    }


                                  }else  if ($logistica[$i]["estado"] == 0 && $logistica[$i]["status"] == 0 && $logistica[$i]["pendiente"] == 0 || $logistica[$i]["pendiente"] == 2) {

                                      $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLogis='".$logistica[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar</button></div>";  

                                  }

                                  else{

                                     $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLogis='".$logistica[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar</button></div>"; 

                                  }


                                }else{

                                    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLogis='".$logistica[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar</button></div>"; 
                                }


                          
                         
                      }else{

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar</button></div>";

                      } 
                      $tiempoProceso = seg_a_dhms($hora_en_segundos);

                      /*========HABILITAR FOLIO============*/
                        if ($logistica[$i]["observacionesExtras"] == "") {

                              $importante = "<div class=''><span class='label label-success'>SIN OBSERVACIONES</span></div>"; 
                          
                        }else {

                              $importante = "<div class='btn-group'><button class='animated wobble infinite btn btn-danger btnVerObservaciones' idLogistica4='".$logistica[$i]["id"]."' data-toggle='modal' data-target='#verObservaciones'><i class='fa fa-eye'></i> Ver</button></div>";
                        }

             
                     

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
              "'.rtrim($logistica[$i]["nombreCliente"]).'",
              "'.$logistica[$i]["serie"].'",
              "'.$logistica[$i]["idPedido"].'",
              "'.$logistica[$i]["serieFactura"].'",
              "'.$logistica[$i]["folioFactura"].'",
              "'.$logistica[$i]["usuario"].'",
              "'.$logistica[$i]["fechaRecepcion"].'",
              "'.$logistica[$i]["fechaProgramada"].'",
              "'.$ubicacion.'",
              "'.$estatusPedido.'",
              "'.$tipoRuta.'",
              "'.$logistica[$i]["operador"].'",
              "'.$logistica[$i]["fechaEntregaCliente"].'",
              "'.$importante.'",
              "'.$logistica[$i]["observaciones"].'",
              "'.$tiempoProceso.'",
              "'.$acciones.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE logistica
=============================================*/ 
$activar = new TablaLogistica();
$activar -> mostrarTablas();