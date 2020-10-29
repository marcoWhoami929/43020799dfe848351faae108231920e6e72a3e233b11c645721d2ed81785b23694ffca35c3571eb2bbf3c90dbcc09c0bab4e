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

      $usuario = $_SESSION["nombre"];


    }
    
    switch ($usuario) {
      case 'Sucursal San Manuel':

        $valor2 = "FACTURA SAN MANUEL V 3.3";

        break;
      case 'Sucursal Capu':

        $valor2 = "FACTURA CAPU V 3.3";

        break;
      case 'Sucursal Reforma':

        $valor2 = "FACTURA REFORMA V 3.3";

        break;
      case 'Sucursal Las Torres':

        $valor2 = "FACTURA TORRES";

        break;
      case 'Sucursal Santiago':

        $valor2 = "FACTURA SANTIAGO V 3.3";

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

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturacionTiendas[$i]["id"].'",
                  "'.$facturacionTiendas[$i]["fechaFactura"].'",
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
                  "'.$facturacionTiendas[$i]["observaciones"].'",
                  "'.$facturacionTiendas[$i]["agente"].'",
                  "'.$estatus." ".$acciones.'"],';

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



