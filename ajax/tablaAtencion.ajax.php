<?php
session_start();
require_once "../controladores/atencion.controlador.php";
require_once "../modelos/atencion.modelo.php";

class TablaAtencion{

   

  public function mostrarTablas(){  
     /*=============================================
    MOSTRAR LA TABLA DE ATENCION
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

    $atencion = ControladorAtencion::ctrMostrarAtencion($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($atencion); $i++){



        $hora = $atencion[$i]["tiempoProceso"];
                list($horas, $minutos, $segundos) = explode(':', $hora);
                $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;

                  $item = 'codigoCliente';
                  $valor = $atencion[$i]["codigoCliente"];

                  if ($atencion[$i]["serie"] != "PEPB" || $atencion[$i]["serie"] != "PDPR") {
                    $catalogo = 'PINTURAS';

                  }else{

                    $catalogo = 'FLEX';
                  }
                  /*
                  $estadoCliente = ControladorAtencion::ctrMostrarEstadoCliente($item, $valor,$catalogo);

                  $limiteCredito  = $estadoCliente["limiteCredito"];
                  $excederCredito  = $estadoCliente["excederCredito"];
                  $limiteDoctos  = $estadoCliente["limDoctosVenc"];
                  $saldoVencido  = $estadoCliente["saldoVencido"];
                  $doctosVenc  = $estadoCliente["doctosVenc"];
                  $idClienteComercial = $estadoCliente["idClienteComercial"];
                  $statusCliente = $estadoCliente["statusCliente"];

                  if ($statusCliente == "activado" || $statusCliente == 1) {

                      if ($limiteCredito < $saldoVencido and $excederCredito == 1 and $limiteDoctos < $doctosVenc) {
                    
                        $estadoCredito  = "<button class='btn btn-info btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";
                      }else if ($limiteCredito < $saldoVencido and $excederCredito == 0 and $limiteDoctos < $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-warning btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }else if ($limiteCredito > $saldoVencido and $excederCredito == 1 and $limiteDoctos > $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-success btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }else if ($limiteCredito > $saldoVencido and $excederCredito == 0 and $limiteDoctos > $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-success btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }else if ($limiteCredito > $saldoVencido and $excederCredito == 1 and $limiteDoctos < $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-warning btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }else if ($limiteCredito > $saldoVencido and $excederCredito == 0 and $limiteDoctos < $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-warning btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }
                      else if ($limiteCredito < $saldoVencido and $excederCredito == 1 and $limiteDoctos > $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-info btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }else if ($limiteCredito < $saldoVencido and $excederCredito == 0 and $limiteDoctos > $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-warning btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }else if ($limiteCredito < $saldoVencido and $excederCredito == 1 and $limiteDoctos == $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-warning btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }else if ($limiteCredito < $saldoVencido and $excederCredito == 0 and $limiteDoctos == $doctosVenc){

                         $estadoCredito  = "<button class='btn btn-warning btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                      }
                      else{

                        $estadoCredito  = "<button class='btn btn-secondary btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient' ><i class='fa fa-money'></i></button>";
                      }
                    
                  }else{

                      $estadoCredito  = "<button class='btn btn-danger btnDetailClient' codigoCliente='".$atencion[$i]["codigoCliente"]."' catalogo='".$catalogo."' idClienteComercial = '".$idClienteComercial."' data-toggle='modal' data-target='#modalDetailClient'><i class='fa fa-money'></i></button>";

                  }
                  
                */

                if($statusCliente == "activado" || $statusCliente == 1){

                          $statusCliente = "<button class='btn btn-success btn-xs'>Activado</button>";

                        }else{
                          $statusCliente = "<button class='btn btn-success btn-xs'>Activado</button>";
                          //$statusCliente = "<button class='btn btn-danger btn-xs'>Desactivado</button>";

                        } 

                        if ($atencion[$i]["orden"] == 1) {

                            if($atencion[$i]["estado"] == "1" and $atencion[$i]["orden"] == "1"){

                                $estado = "<button class='btn btn-success btn-xs'>Orden Activa</button>";

                              }else{

                                $estado = "<button class='btn btn-danger btn-xs Cancelado' idPedido2='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalMotivo' data-toggle='tooltip' data-placement='top' title='Ver motivos de cancelación'>Orden Cancelada</button>";

                              }
                         
                        }else{

                            if($atencion[$i]["estado"] == "1" and $atencion[$i]["formatoPedido"] == "0"){

                              $estado = "<button class='btn btn-success btn-xs'>Pedido Activo</button>";

                            }else if($atencion[$i]["estado"] == "1" and $atencion[$i]["formatoPedido"] == "1"){

                              $estado = "<button class='btn btn-info btn-xs'>Entrega Con Pedido</button>";

                            }else{

                              $estado = "<button class='btn btn-danger btn-xs Cancelado' idPedido2='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalMotivo' data-toggle='tooltip' data-placement='top' title='Ver motivos de cancelación'>Pedido Cancelado</button>";

                            }

                        }

                      

                        if($atencion[$i]["tipoRuta"] == "Mostrador"){

                          $tipoRuta = 'Mostrador';

                        }else if($atencion[$i]["tipoRuta"] == "Foraneo"){

                          $tipoRuta = 'Foraneo';

                        }else if ($atencion[$i]["tipoRuta"] == "Local") {
                          $tipoRuta = 'Local';

                        }else if ($atencion[$i]["tipoRuta"] == "") {

                          $tipoRuta = 'Sin ruta asignada';
                        }

                        if ($atencion[$i]["tipoCompra"] == 0 || $atencion[$i]["tipoCompra"] == "") {

                          $tipoCompra = 'Sin compra';
                          
                        }else if ($atencion[$i]["tipoCompra"] == 1) {

                          $tipoCompra = 'Compra Con Proveedores Externos';

                        }else if($atencion[$i]["tipoCompra"] == 2) {

                          $tipoCompra = 'Compra Interna';

                        }

                        /*DOS NUEVAS LINEAS*/
                        if ($atencion[$i]["orden"] == 1) {

                            if ($atencion[$i]["observacionesOrden"] == 1) {

                               $comentarios = "Facturar y Resurtir";

                            }else{

                               $comentarios =  'Facturar';

                            }

                           
                         
                        }else{

                          if ($atencion[$i]["observaciones"] == "") {

                            $comentarios =  'Sin comentarios';

                          }else{

                            $comentarios = $atencion[$i]["observaciones"];

                          }

                        }
                          

                          if ($atencion[$i]["tiempoProceso"] == "00:00:00") {

                           $tiempoProceso = '00:00:00';

                          }else {

                           $tiempoProceso = seg_a_dhms($hora_en_segundos);

                          }
                          if ($atencion[$i]["orden"] == 1) {
                            if ($_SESSION["perfil"] =="Administrador General" || $_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Jesus Serrano" || $_SESSION["nombre"] == "Ulises Tuxpan" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "José Enrique Flores" && $atencion[$i]["estado"] == 1) {

                                    if($atencion[$i]["cancelado"] == 0 && $atencion[$i]["concluido"] == 1 &&  $atencion[$i]["habilitado"] == 0){

                                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden' disabled><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar Orden</button></div>"; 
                                        
                                    }else if($atencion[$i]["cancelado"] == 0 && $atencion[$i]["concluido"] == 1 && $atencion[$i]["habilitado"] == 1){

                                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden'><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar Orden</button></div>"; 
                                        
                                    }else if($atencion[$i]["cancelado"] == 0 && $atencion[$i]["concluido"] == 0 && $atencion[$i]["habilitado"] == 0){

                                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden'><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."'><i class='fa fa-times'></i>Cancelar Orden</button></div>"; 
                                        
                                    }else if($atencion[$i]["cancelado"] == 1 && $atencion[$i]["concluido"] == 0 && $atencion[$i]["habilitado"] == 0){

                                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden' disabled><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar Orden</button></div>"; 
                                        
                                    }else{

                                      $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden' disabled><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar Orden</button></div>"; 
                                        

                                    }
               
                            }else{

                                    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden' disabled><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar Orden</button></div>";
                                    
                            } 
                          }else{

                            /*DOS NUEVAS LINEAS*/
                           if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["nombre"] == "Diego Ávila") {
                          
                                  if ($atencion[$i]["estado"] == 0 && $atencion[$i]["estadoAlmacen"] == 0 && $atencion[$i]["estadoFacturacion"] == 0 && $atencion[$i]["estadoCompras"] == 0 && $atencion[$i]["estadoLogistica"] == 0) {

                                      $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar pedido</button></div>"; 

                              }else if ($atencion[$i]["estado"] == 1 && $atencion[$i]["estadoAlmacen"] == 1 && $atencion[$i]["estadoFacturacion"] == 1 && $atencion[$i]["statusFacturacion"] == 1 && $atencion[$i]["estadoCompras"] == 1 && $atencion[$i]["estadoLogistica"] == 1 && $atencion[$i]["habilitado"] == 0) {

                                      $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar pedido</button></div>"; 

                              }else if ($atencion[$i]["estado"] == 1 && $atencion[$i]["estadoAlmacen"] == 1 && $atencion[$i]["estadoFacturacion"] == 1 && $atencion[$i]["statusFacturacion"] == 1 && $atencion[$i]["estadoCompras"] == 1 && $atencion[$i]["estadoLogistica"] == 1 && $atencion[$i]["habilitado"] == 1) {

                                      $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar pedido</button></div>"; 

                              }
                              else if ($atencion[$i]["estado"] == 1 && $atencion[$i]["estadoAlmacen"] == 1 && $atencion[$i]["estadoFacturacion"] == 1
                              && $atencion[$i]["statusFacturacion"] == 0  && $atencion[$i]["estadoCompras"] == 1 && $atencion[$i]["estadoLogistica"] == 1) {

                                      $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar pedido</button></div>"; 

                              }
                              else{

                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' id='editarPed'><i class='fa fa-pencil'></i>Editar pedido</button></div>"; 

                                   }

                                }else{
                                  $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar pedido</button></div>";
                                }    

                          }
                           

                       /*========HABILITAR FOLIO============*/

                      if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Manuel Acevo" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez") {

                         if ($atencion[$i]["habilitado"]  != 0) {

                            $habilitado = "<div class='btn-group'><button class='btn btn-success btnHabilitarFolio' idPedido3='".$atencion[$i]["id"]."' estadoPedido='0'><i class='fa fa-power-off'></i>Habilitado</button></div>";
                        
                          }else {


                             $habilitado = "<div class='btn-group'><button class='btn btn-danger btnHabilitarFolio' idPedido3='".$atencion[$i]["id"]."' estadoPedido='1'><i class='fa fa-power-off'></i>Deshabilitado</button></div>";

                          }
                 
                        
                      }else {

                              $habilitado = "<div class='btn-group'></div>";

                      }

                      switch ($atencion[$i]["formaPago"]) {
                              case '01':
                                 $formaPago = 'EFECTIVO';
                                break;
                              case '02':
                                 $formaPago = 'CHEQUE NOMINATIVO';
                                break;
                              case '03':
                                 $formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS';
                                break;
                              case '04':
                                 $formaPago = 'TARJETA DE CRÉDITO';
                                break;
                              case '05':
                                 $formaPago = 'TARJETA DE DÉBITO';
                                break;
                              case '06':
                                 $formaPago = 'DINERO ELECTRÓNICO';
                                break;
                              case '08':
                                 $formaPago = 'VALES DE DESPENSA';
                                break;
                              case '12':
                                 $formaPago = 'DACIÓN DE PAGO';
                                break;
                              case '13':
                                 $formaPago = 'PAGO POR SUBROGACIÓN';
                                break;
                              case '14':
                                 $formaPago = 'PAGO POR CONSIGNACIÓN';
                                break;
                              case '15':
                                 $formaPago = 'CONDONACIÓN';
                                break;
                              case '17':
                                 $formaPago = 'COMPENSACIÓN';
                                break;
                              case '23':
                                 $formaPago = 'NOVACIÓN';
                                break;
                              case '24':
                                 $formaPago = 'CONFUSIÓN';
                                break;
                              case '25':
                                 $formaPago = 'REMISIÓN DE DEDUDA';
                                break;
                              case '26':
                                 $formaPago = 'PRESCRIPCIÓN O CADUCIDAD';
                                break;
                              case '27':
                                 $formaPago = 'A SATISFACCIÓN DEL ACREEDOR';
                                break;
                              case '28':
                                 $formaPago = 'TARJETA DE DÉBITO';
                                break;
                              case '29':
                                 $formaPago = 'TARJETA DE SERVICIOS';
                                break;
                              case '30':
                                 $formaPago = 'APLICACIÓN DE ANTICIPOS';
                                break;
                              case '31':
                                 $formaPago = 'INTERMEDIARIO PAGOS';
                                break;
                              case '99':
                                 $formaPago = 'POR DEFINIR';
                                break;
                              default:
                                $formaPago = 'EFECTIVO';
                                break;
                            }


      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      /*"'.$estadoCredito.'",*/
      $datosJson   .= '[
              "'.$atencion[$i]["id"].'",
              "'.$atencion[$i]["creado"].'",
              "'.$atencion[$i]["codigoCliente"].'",
              "'.rtrim($atencion[$i]["nombreCliente"]).'",
              "'.$atencion[$i]["canal"].'",
              "'.$atencion[$i]["rfc"].'",
              "'.$atencion[$i]["agenteVentas"].'",
              "'.$atencion[$i]["diasCredito"].'",
              "'.$statusCliente.'",
              
              "'.$estado.'",
              "'.$atencion[$i]["serie"].'",
              "'.$atencion[$i]["folio"].'",
              "'.$atencion[$i]["tipoPago"].'",
              "'.$atencion[$i]["metodoPago"].'",
              "'.$formaPago.'",
              "'.$atencion[$i]["ordenCompra"].'",
              "'.$atencion[$i]["numeroPartidas"].'",
              "'.$atencion[$i]["numeroUnidades"].'",
              "$ '.number_format($atencion[$i]["importe"],2).'",
              "'.$atencion[$i]["fechaRecepcion"].'",
              "'.$atencion[$i]["fechaElaboracion"].'",
              "'.$tipoRuta.'",
              "'.$tipoCompra.'",
              "'.$comentarios.'",
              "'.$tiempoProceso.'",
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
ACTIVAR TABLA DE atencion
=============================================*/ 
$activar = new TablaAtencion();
$activar -> mostrarTablas();



