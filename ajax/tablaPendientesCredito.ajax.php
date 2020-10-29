<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaPendientesCredito{

	public function mostrarTablas(){	

    $item = 'idMovimientoBanco';
    $idMovimientoBanco = $_GET["idMovimientoBanco"];
    $valor = $idMovimientoBanco;
    $pendientesCredito = ControladorFacturasTiendas::ctrMostrarFacturasPendientesCredito($item, $valor);


    $datosJson = '{

     "data": [ ';

     for($i = 0; $i < count($pendientesCredito); $i++){

      $serieDocumento = $pendientesCredito[$i]["serie"];
      switch ($serieDocumento) {
        case 'FASM':
          $usuario = "Sucursal San Manuel";
          break;
        case 'FATR':
          $usuario = "Sucursal Las Torres";
          break;
        case 'FASG':
          $usuario = "Sucursal Santiago";
          break;
        case 'FACP':
          $usuario = "Sucursal Capu";
          break;
        case 'FARF':
          $usuario = "Sucursal Reforma";
          break;
 
      }

      if ($pendientesCredito[$i]["depositada"] != 0 ) {
        if (number_format($pendientesCredito[$i]["abono"],2) != 0) {


          if (number_format($pendientesCredito[$i]["abono"],2) < number_format(str_replace(',','',$pendientesCredito[$i]["total"]),2, '.', '')) {
            $acciones = "<div class='btn-group'><button class='btn btn-info btnLigarFacturaPendiente' idFacturaDepositada='".$pendientesCredito[$i]["id"]."' nombreSucursal = '".$usuario."'  montoFactura = '".str_replace(',','',$pendientesCredito[$i]["total"])."' serieFactura = '".$pendientesCredito[$i]["serie"]."' folioFactura = '".$pendientesCredito[$i]["folio"]."' nombreCliente = '".$pendientesCredito[$i]["nombreCliente"]."' identificador = '$i' valorDocumento = '".str_replace(',','',$pendientesCredito[$i]["total"])."'><i class='fa fa-plus'></i></button><button class='btn btn-warning btnQuitarFacturaPendiente' idFacturaDepositadaRemove='".$pendientesCredito[$i]["id"]."' montoFacturaRemove = '".str_replace(',','',$pendientesCredito[$i]["total"])."' nombreSucursal = '".$usuario."' serieFactura = '".$pendientesCredito[$i]["serie"]."' folioFactura = '".$pendientesCredito[$i]["folio"]."' nombreCliente = '".$pendientesCredito[$i]["nombreCliente"]."' identificadorRemove = '$i' valorDocumentoRemove = '".str_replace(',','',$pendientesCredito[$i]["total"])."' title='La factura ha sido vinculada'><i class='fa fa-minus'></i></button></div>";
          }else{

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnQuitarFacturaPendiente' idFacturaDepositadaRemove='".$pendientesCredito[$i]["id"]."' montoFacturaRemove = '".str_replace(',','',$pendientesCredito[$i]["total"])."' nombreSucursal = '".$usuario."' serieFactura = '".$pendientesCredito[$i]["serie"]."' folioFactura = '".$pendientesCredito[$i]["folio"]."' nombreCliente = '".$pendientesCredito[$i]["nombreCliente"]."' identificadorRemove = '$i' valorDocumentoRemove = '".str_replace(',','',$pendientesCredito[$i]["total"])."' title='La factura ha sido vinculada'><i class='fa fa-minus'></i></button></div>";

          }
        }else{

          $acciones = "<div class='btn-group'><button class='btn btn-warning btnQuitarFacturaPendiente' idFacturaDepositadaRemove='".$pendientesCredito[$i]["id"]."' montoFacturaRemove = '".str_replace(',','',$pendientesCredito[$i]["total"])."' nombreSucursal = '".$usuario."' serieFactura = '".$pendientesCredito[$i]["serie"]."' folioFactura = '".$pendientesCredito[$i]["folio"]."' nombreCliente = '".$pendientesCredito[$i]["nombreCliente"]."' identificadorRemove = '$i' valorDocumentoRemove = '".str_replace(',','',$pendientesCredito[$i]["total"])."' title='La factura ha sido vinculada'><i class='fa fa-minus'></i></button></div>";

        }

      }else{



        $acciones = "<div class='btn-group'><button class='btn btn-info btnLigarFacturaPendiente' idFacturaDepositada='".$pendientesCredito[$i]["id"]."' nombreSucursal = '".$usuario."' montoFactura = '".str_replace(',','',$pendientesCredito[$i]["total"])."' serieFactura = '".$pendientesCredito[$i]["serie"]."' folioFactura = '".$pendientesCredito[$i]["folio"]."' nombreCliente = '".$pendientesCredito[$i]["nombreCliente"]."' identificador = '$i' valorDocumento = '".str_replace(',','',$pendientesCredito[$i]["total"])."'><i class='fa fa-plus'></i></button></div>";


      }

      if($pendientesCredito[$i]["abono"] != 0){

        $total = str_replace(',','',$pendientesCredito[$i]["total"]) - $pendientesCredito[$i]["abono"];

      }else{

        $total = str_replace(',','',$pendientesCredito[$i]["total"]);

      }
      $importeDeposito = "<input type='text' class='form-control importeSobreDeposito' id='importeDeposito$i' value='".number_format($total,2, '.', '')."'>";



                    /*=============================================
                    DEVOLVER DATOS JSON
                    =============================================*/
                    
                    $datosJson   .= '[              
                    "'.$pendientesCredito[$i]["serie"].'",
                    "'.$pendientesCredito[$i]["folio"].'",
                    "'.$pendientesCredito[$i]["fechaFactura"].'",
                    "'.rtrim($pendientesCredito[$i]["nombreCliente"]).'",
                    "$ '.number_format(str_replace(',','',$pendientesCredito[$i]["total"]),2, '.', '').'",
                    "'.$importeDeposito.'",
                    "'.$acciones.'"],';


                  }

                  $datosJson = substr($datosJson, 0, -1);

                  $datosJson.=  ']

                }'; 

                echo $datosJson;

              }

            }

/*=============================================
ACTIVAR TABLA
=============================================*/ 
$activar = new TablaPendientesCredito();
$activar -> mostrarTablas();



