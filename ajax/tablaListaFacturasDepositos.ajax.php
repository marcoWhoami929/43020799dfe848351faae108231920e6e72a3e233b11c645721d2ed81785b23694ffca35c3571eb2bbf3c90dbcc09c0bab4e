<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaListaFacturasDepositos{

	public function mostrarTablas(){	
   
	
    $item = "concepto";
    $usuario = $_SESSION["nombre"];
    
    switch ($usuario) {
      case 'Sucursal San Manuel':

        $valor = "FACTURA SAN MANUEL V 3.3";

        break;
      case 'Sucursal Capu':

        $valor = "FACTURA CAPU V 3.3";

        break;
      case 'Sucursal Reforma':

        $valor = "FACTURA REFORMA V 3.3";

        break;
      case 'Sucursal Las Torres':

        $valor = "FACTURA TORRES";

        break;
      case 'Sucursal Santiago':

        $valor = "FACTURA SANTIAGO V 3.3";

        break;
    }
    $item2 = 'idMovimientoBanco';
    $idMovimientoBanco = $_GET["idMovimientoBanco"];
    $valor2 = $idMovimientoBanco;
 		$listaFacturasDepositos = ControladorFacturasTiendas::ctrMostrarListaFacturasDepositos($item, $valor,$item2,$valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($listaFacturasDepositos); $i++){
            switch ($usuario) {
                case 'Sucursal San Manuel':

                  $serieFactura = "FASM";

                  break;
                case 'Sucursal Capu':

                  $serieFactura = "FACP";

                  break;
                case 'Sucursal Reforma':

                  $serieFactura = "FARF";

                  break;
                case 'Sucursal Las Torres':

                  $serieFactura = "FATR";

                  break;
                case 'Sucursal Santiago':

                  $serieFactura = "FASG";

                  break;
              }
              
              if ($listaFacturasDepositos[$i]["serie"] != $serieFactura) {
                
              }else{

                  if ($listaFacturasDepositos[$i]["idMovimientoBanco"] == "Cancelada") {
              


                    }else{

                      if ($listaFacturasDepositos[$i]["depositada"] != 0 ) {
                        if (number_format(str_replace(',','',$listaFacturasDepositos[$i]["abono"]),2, '.', '') != 0) {
                         

                          if (number_format(str_replace(',','',$listaFacturasDepositos[$i]["abono"]),2, '.', '') < number_format(str_replace(',','',$listaFacturasDepositos[$i]["total"]),2, '.', '')) {
                          $acciones = "<div class='btn-group'><button class='btn btn-info btnVincularFacturaDepositada' idFacturaDepositada='".$listaFacturasDepositos[$i]["id"]."' nombreSucursal = '".$usuario."' montoFactura = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."' serieFactura = '".$listaFacturasDepositos[$i]["serie"]."' folioFactura = '".$listaFacturasDepositos[$i]["folio"]."' nombreCliente = '".$listaFacturasDepositos[$i]["nombreCliente"]."' identificador = '$i' valorDocumento = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."'><i class='fa fa-plus'></i></button><button class='btn btn-warning btnQuitarFacturaDepositada' idFacturaDepositadaRemove='".$listaFacturasDepositos[$i]["id"]."' montoFacturaRemove = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."' nombreSucursal = '".$usuario."' serieFactura = '".$listaFacturasDepositos[$i]["serie"]."' folioFactura = '".$listaFacturasDepositos[$i]["folio"]."' nombreCliente = '".$listaFacturasDepositos[$i]["nombreCliente"]."' identificadorRemove = '$i' valorDocumentoRemove = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."' title='La factura ha sido vinculada'><i class='fa fa-minus'></i></button></div>";
                            }else{

                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnQuitarFacturaDepositada' idFacturaDepositadaRemove='".$listaFacturasDepositos[$i]["id"]."' montoFacturaRemove = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."' nombreSucursal = '".$usuario."' serieFactura = '".$listaFacturasDepositos[$i]["serie"]."' folioFactura = '".$listaFacturasDepositos[$i]["folio"]."' nombreCliente = '".$listaFacturasDepositos[$i]["nombreCliente"]."' identificadorRemove = '$i' valorDocumentoRemove = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."' title='La factura ha sido vinculada'><i class='fa fa-minus'></i></button></div>";

                            }
                        }else{

                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnQuitarFacturaDepositada' idFacturaDepositadaRemove='".$listaFacturasDepositos[$i]["id"]."' montoFacturaRemove = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."' nombreSucursal = '".$usuario."' serieFactura = '".$listaFacturasDepositos[$i]["serie"]."' folioFactura = '".$listaFacturasDepositos[$i]["folio"]."' nombreCliente = '".$listaFacturasDepositos[$i]["nombreCliente"]."' identificadorRemove = '$i' valorDocumentoRemove = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."' title='La factura ha sido vinculada'><i class='fa fa-minus'></i></button></div>";

                            }
                        
                        

                        
                        
                    }else{



                        $acciones = "<div class='btn-group'><button class='btn btn-info btnVincularFacturaDepositada' idFacturaDepositada='".$listaFacturasDepositos[$i]["id"]."' nombreSucursal = '".$usuario."' montoFactura = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."' serieFactura = '".$listaFacturasDepositos[$i]["serie"]."' folioFactura = '".$listaFacturasDepositos[$i]["folio"]."' nombreCliente = '".$listaFacturasDepositos[$i]["nombreCliente"]."' identificador = '$i' valorDocumento = '".str_replace(',','',$listaFacturasDepositos[$i]["total"])."'><i class='fa fa-plus'></i></button></div>";

                        
                    }

                    if($listaFacturasDepositos[$i]["abono"] != 0){

                        $total = str_replace(',','',$listaFacturasDepositos[$i]["total"]) - $listaFacturasDepositos[$i]["abono"];

                    }else{

                        $total = str_replace(',','',$listaFacturasDepositos[$i]["total"]);

                    }
                        $importeDeposito = "<input type='text' class='form-control importeSobreDeposito' id='importeDeposito$i' value='".number_format($total,2, '.', '')."'>";
                    

                    
                    /*=============================================
                    DEVOLVER DATOS JSON
                    =============================================*/
                    
                    $datosJson   .= '[              
                                "'.$listaFacturasDepositos[$i]["serie"].'",
                                "'.$listaFacturasDepositos[$i]["folio"].'",
                                "'.$listaFacturasDepositos[$i]["fechaFactura"].'",
                                "'.rtrim($listaFacturasDepositos[$i]["nombreCliente"]).'",
                                "$ '.number_format(str_replace(',','',$listaFacturasDepositos[$i]["total"]),2, '.', '').'",
                                "'.$importeDeposito.'",
                                "'.$acciones.'"],';



                    }

              }
            /*********/

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE facturacion
=============================================*/ 
$activar = new TablaListaFacturasDepositos();
$activar -> mostrarTablas();



