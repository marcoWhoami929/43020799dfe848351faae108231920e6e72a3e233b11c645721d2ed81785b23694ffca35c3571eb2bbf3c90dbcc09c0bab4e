<?php
session_start();
error_reporting(E_ALL);
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


                if($atencion[$i]["statusCliente"] == "activado" || $atencion[$i]["statusCliente"] == 1){

                          $statusCliente = "<button class='btn btn-success btn-xs'>Activado</button>";

                        }else{

                          $statusCliente = "<button class='btn btn-danger btn-xs'>Desactivado</button>";

                        } 

                        if($atencion[$i]["estado"] == "1" and $atencion[$i]["formatoPedido"] == "0"){

                          $estado = "<button class='btn btn-success btn-xs'>Pedido Activo</button>";

                        }else if($atencion[$i]["estado"] == "1" and $atencion[$i]["formatoPedido"] == "1"){

                          $estado = "<button class='btn btn-info btn-xs'>Entrega Con Pedido</button>";

                        }else{

                          $estado = "<button class='btn btn-danger btn-xs Cancelado' idPedido2='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalMotivo' data-toggle='tooltip' data-placement='top' title='Ver motivos de cancelación'>Pedido Cancelado</button>";

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
                          if ($atencion[$i]["observaciones"] == "") {

                            $comentarios =  'Sin comentarios';

                          }else{

                            $comentarios = $atencion[$i]["observaciones"];

                          }

                          if ($atencion[$i]["tiempoProceso"] == "00:00:00") {

                           $tiempoProceso = '00:00:00';

                          }else {

                           $tiempoProceso = seg_a_dhms($hora_en_segundos);

                          }
                           /*DOS NUEVAS LINEAS*/
                           if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["nombre"] == "Diego Ávila") {
                          
                        if ($atencion[$i]["estado"] == 0 && $atencion[$i]["estadoAlmacen"] == 0 && $atencion[$i]["estadoFacturacion"] == 0 && $atencion[$i]["estadoCompras"] == 0 && $atencion[$i]["estadoLogistica"] == 0) {

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar pedido</button><button class='btn btn-danger btnEliminarPedidos' idPedido='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."'><i class='fa fa-times'></i>Cancelar pedido</button></div>"; 

                    }else if ($atencion[$i]["estado"] == 1 && $atencion[$i]["estadoAlmacen"] == 1 && $atencion[$i]["estadoFacturacion"] == 1 && $atencion[$i]["statusFacturacion"] == 1 && $atencion[$i]["estadoCompras"] == 1 && $atencion[$i]["estadoLogistica"] == 1 && $atencion[$i]["habilitado"] == 0) {

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar pedido</button><button class='btn btn-danger btnEliminarPedidos' idPedido='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."'><i class='fa fa-times'></i>Cancelar pedido</button></div>"; 

                    }else if ($atencion[$i]["estado"] == 1 && $atencion[$i]["estadoAlmacen"] == 1 && $atencion[$i]["estadoFacturacion"] == 1 && $atencion[$i]["statusFacturacion"] == 1 && $atencion[$i]["estadoCompras"] == 1 && $atencion[$i]["estadoLogistica"] == 1 && $atencion[$i]["habilitado"] == 1) {

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar pedido</button><button class='btn btn-danger btnEliminarPedidos' idPedido='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."'><i class='fa fa-times'></i>Cancelar pedido</button></div>"; 

                    }
                    else if ($atencion[$i]["estado"] == 1 && $atencion[$i]["estadoAlmacen"] == 1 && $atencion[$i]["estadoFacturacion"] == 1
                    && $atencion[$i]["statusFacturacion"] == 0  && $atencion[$i]["estadoCompras"] == 1 && $atencion[$i]["estadoLogistica"] == 1) {

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar pedido</button><button class='btn btn-danger btnEliminarPedidos' idPedido='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."'><i class='fa fa-times'></i>Cancelar pedido</button></div>"; 

                    }
                    else{

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' id='editarPed'><i class='fa fa-pencil'></i>Editar pedido</button><button class='btn btn-danger btnEliminarPedidos' idPedido='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."'><i class='fa fa-times'></i>Cancelar pedido</button></div>"; 

                         }

                      }else{
                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idPedido='".$atencion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar pedido</button><button class='btn btn-danger btnEliminarPedidos' idPedido='".$atencion[$i]["id"]."' folio='".$atencion[$i]["folio"]."' serie='".$atencion[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar pedido</button></div>";
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


      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
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
              "'.$atencion[$i]["formaPago"].'",
              "'.$atencion[$i]["ordenCompra"].'",
              "'.$atencion[$i]["numeroPartidas"].'",
              "'.$atencion[$i]["numeroUnidades"].'",
              "'.number_format($atencion[$i]["importe"],2).'",
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



