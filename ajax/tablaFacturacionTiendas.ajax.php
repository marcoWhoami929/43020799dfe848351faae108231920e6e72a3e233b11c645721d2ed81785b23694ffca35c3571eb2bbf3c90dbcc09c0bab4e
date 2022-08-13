<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaFacturacionTiendas{

	public function mostrarTablas(){	
    
		$item = "fechaFactura";
    if($_GET["fecha"] != "") {

        $valor = $_GET["fecha"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        $valor = $fechaFinal;



    }
    $item2 = "concepto";
    
    if($_GET["sucursal"] != ""){

      $usuario = $_GET["sucursal"];

    }else{

       if ($_SESSION["nombre"] == "Diego Ávila") {
                                  
        $usuario = "Mayoreo";

      }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

        $usuario = "Rutas";

      }else if($_SESSION["nombre"] == "Aurora Fernandez"){

        $usuario = "Industrial";

      }else{

        $usuario = $_SESSION["nombre"];

      }



    }
    
    switch ($usuario) {
      case 'Sucursal San Manuel':

        $valor2 = "'FACTURA SAN MANUEL V 3.3','Factura San Manuel'";

        break;
      case 'Sucursal Capu':

        $valor2 = "'FACTURA CAPU V 3.3','Factura Capu'";


        break;
      case 'Sucursal Reforma':

        $valor2 = "'FACTURA REFORMA V 3.3','Factura Reforma'";

        break;
      case 'Sucursal Las Torres':

        $valor2 = "'FACTURA TORRES','Factura Torres'";

        break;
      case 'Sucursal Santiago':

        $valor2 = "'FACTURA SANTIAGO V 3.3','Factura Santiago'";

        break;
      case 'Mayoreo':

        $valor2 = "'FACTURA MAYOREO V 3.3','Factura Mayoreo'";


        break;
      case 'Industrial':

        $valor2 = "'FACTURA INDUSTRIAL V 3.3','Factura Industrial'";
      
        break;
      case 'Rutas':

        $valor2 = "ALL";
        
        break;
      case 'Sucursal Acatepec':

        $valor2 = "'FACTURA ACATEPEC V 3.3','Factura Acatepec'";

        break;
    }
    $item3 = "fechaFactura";
    if($_GET["fechaFin"] != "") {

        $valor3 = $_GET["fechaFin"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        $valor3 = $fechaFinal;

    }
 		$facturacionTiendas = ControladorFacturasTiendas::ctrMostrarFacturasCorte($item, $valor,$item2,$valor2,$item3,$valor3);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturacionTiendas); $i++){

      if ($facturacionTiendas[$i]["estatus"] == "Vigente") {

          $estatus = "<button type='button' class='btn btn-success'>Vigente</button>";

      }else{

          $estatus = "<button type='button' class='btn btn-danger'>Cancelado</button>";

      }

      if ($facturacionTiendas[$i]["idSolicitud"] != "0") {
                
            $acciones = "<button type='button' class='btn btn-warning btnVerDetallesTicket' data-toggle='modal' data-target='#modalVistaDetalleTicket' idFacturaSolicitud = '".$facturacionTiendas[$i]["id"]."' idSolicitud = '".$facturacionTiendas[$i]["idSolicitud"]."'><i class='fa fa-ticket'></i>Ver Ticket</button>";

      }else{

             $acciones = "<button type='button' class='btn btn-info btnGenerarSolicitudCancelacion' data-toggle='modal' data-target='#modalGenerarTicket' serieFac ='".$facturacionTiendas[$i]["serie"]."' folioFac ='".$facturacionTiendas[$i]["folio"]."' clienteFac ='".$facturacionTiendas[$i]["nombreCliente"]."' idFacturaSolic = '".$facturacionTiendas[$i]["id"]."'><i class='fa fa-ticket'></i> Solicitar Cancelación</button>";

      }

      $fechaEnviado = $facturacionTiendas[$i]["horaEnviado"];
      $fechaEnviado = explode(' ', $fechaEnviado);
      $diaEnviado = $fechaEnviado[0];
      $horaEnviado = $fechaEnviado[1];

      $fechaRecibido = $facturacionTiendas[$i]["horaRecibido"];
      $fechaRecibido = explode(' ', $fechaRecibido);
      $diaRecibido = $fechaRecibido[0];
      $horaRecibido = $fechaRecibido[1];
      
      if ($facturacionTiendas[$i]["formaPago"] == "CREDITO") {

          if ($facturacionTiendas[$i]["creditoPendiente"] == 1 and $facturacionTiendas[$i]["enviadoCredito"] == 0 and $facturacionTiendas[$i]["recibidoCredito"] == 0 and $facturacionTiendas[$i]["documentosCredito"] == 0) {

            if ($_SESSION["perfil"] != "Credito y Cobranza") {

              $accionCredito = "<button type='button' class='btn btn-danger btnSendCredito' idFactura = '".$facturacionTiendas[$i]["id"]."' serieFactura = '".$facturacionTiendas[$i]["serie"]."'>Enviar</button>";
              
            }else{

              $accionCredito = "<button type='button' class='btn btn-danger'>Por Recibir</button>";

            }

          }else if($facturacionTiendas[$i]["creditoPendiente"] == 0 and $facturacionTiendas[$i]["enviadoCredito"] == 1 and $facturacionTiendas[$i]["recibidoCredito"] == 0 and $facturacionTiendas[$i]["documentosCredito"] == 0){

             if ($_SESSION["perfil"] != "Credito y Cobranza") {

                $accionCredito = "<button type='button' class='btn btn-warning' data-toggle='tooltip' data-placement='left' title='Enviado el ".$diaEnviado." a las ".$horaEnviado."'>Enviado</button>";
             }else{

                $accionCredito = "<button type='button' class='btn btn-warning  btnConfirmCredito' idFactura = '".$facturacionTiendas[$i]["id"]."' serieFactura = '".$facturacionTiendas[$i]["serie"]."'>Confirmar Recibido</button>";

             }

      

          }else if($facturacionTiendas[$i]["creditoPendiente"] == 0 and $facturacionTiendas[$i]["enviadoCredito"] == 1 and $facturacionTiendas[$i]["recibidoCredito"] == 1 and $facturacionTiendas[$i]["documentosCredito"] == 0){

              if ($_SESSION["perfil"] != "Credito y Cobranza") {

                  $accionCredito = "<button type='button' class='btn btn-info' data-toggle='tooltip' data-placement='left' title='Enviado el ".$diaRecibido." a las ".$horaRecibido."'>Recibido</button>";

              }else{

                  $accionCredito = "<button type='button' class='btn btn-info btnLoadDocumentsCredito' data-toggle='modal' data-target='#modalDocumentosCredito' idFactura = '".$facturacionTiendas[$i]["id"]."' serieFactura = '".$facturacionTiendas[$i]["serie"]."' folioFactura = '".$facturacionTiendas[$i]["folio"]."'>Cargar Documentos</button>";

              }
            

          }else if($facturacionTiendas[$i]["creditoPendiente"] == 0 and $facturacionTiendas[$i]["enviadoCredito"] == 1 and $facturacionTiendas[$i]["recibidoCredito"] == 1 and $facturacionTiendas[$i]["documentosCredito"] == 1){

             if ($_SESSION["perfil"] != "Credito y Cobranza") {

                $accionCredito = "<button type='button' class='btn btn-success' data-toggle='tooltip' data-placement='left' title='Documentos cargados a las 05:20:10 el dia 16/12/2020'>Documentos Cargados</button>";

             }else{

                $accionCredito = "<button type='button' class='btn btn-success btnLoadDocumentsCreditoLoads' data-placement='left' title='Documentos cargados a las 05:20:10 el dia 16/12/2020' data-toggle='modal' data-target='#modalDocumentosCredito' idFactura = '".$facturacionTiendas[$i]["id"]."' serieFactura = '".$facturacionTiendas[$i]["serie"]."' folioFactura = '".$facturacionTiendas[$i]["folio"]."'>Documentos Cargados</button>";

             }

          }

          
        
      }else{

          $accionCredito = "";
      }

      if($_SESSION["perfil"] == "Credito y Cobranza" ){
        $formaPago = "<select class='form-control formaPagoFacturas' style='width:200px' name='pay' id='pays".$facturacionTiendas[$i]["id"]."'><option value='CREDITO'>CREDITO</option></select><button type='button' class='btn btn-success btnActualizarFormasPago' idFactura = '".$facturacionTiendas[$i]["id"]."' onclick='actualizarFormasPago(".$facturacionTiendas[$i]["id"].")'><i class='fa fa-send'></i></button>";
      }else{

          $formaPago ="";
      }
      $observaciones = "<textarea  class='form-control inputObservaciones' rows='4' cols='50' idFactura = '" . $facturacionTiendas[$i]["id"] . "'>" . $facturacionTiendas[$i]["observaciones"] . "</textarea><button type='button' class='btn btn-success' onclick='actualizarObservaciones(this)'><i class='fa fa-refresh'></i></button>";
      //$observaciones = "<input type='text' class='form-control inputObservaciones'  value='" . $facturacionTiendas[$i]["observaciones"] . "'  idFactura = '" . $facturacionTiendas[$i]["id"] . "'><button type='button' class='btn btn-success' onclick='actualizarObservaciones(this)'><i class='fa fa-refresh'></i></button>";
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturacionTiendas[$i]["id"].'",
                  "'.$facturacionTiendas[$i]["fechaFactura"].'",
                  "'.$accionCredito.'",
                  "'.$facturacionTiendas[$i]["serie"].'",
                  "'.$facturacionTiendas[$i]["folio"].'",
                  "'.$facturacionTiendas[$i]["codigoCliente"].'",
                  "'.$facturacionTiendas[$i]["rfc"].'",
                  "'.rtrim($facturacionTiendas[$i]["nombreCliente"]).'",
                  "'.$facturacionTiendas[$i]["fechaVencimiento"].'",
				          "'.$facturacionTiendas[$i]["diasCredito"].'",
                  "$ '.number_format($facturacionTiendas[$i]["neto"],2).'",
                  "$ '.number_format($facturacionTiendas[$i]["descuento"],2).'",
                  "$ '.number_format($facturacionTiendas[$i]["impuesto"],2).'",
                  "$ '.number_format($facturacionTiendas[$i]["total"],2).'",
                  "$ '.number_format($facturacionTiendas[$i]["pendiente"],2).'",
                  "$ '.number_format($facturacionTiendas[$i]["pagado"],2).'",
                  "'.$facturacionTiendas[$i]["fechaCobro"].'",
                  "'.$facturacionTiendas[$i]["formaPago"].'",
                  "'.$facturacionTiendas[$i]["agente"].'",
                  "'.$estatus." ".$acciones.'",
                  "'.$formaPago.'",
                  "' . $observaciones .  '"],';

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
$activar = new TablaFacturacionTiendas();
$activar -> mostrarTablas();



