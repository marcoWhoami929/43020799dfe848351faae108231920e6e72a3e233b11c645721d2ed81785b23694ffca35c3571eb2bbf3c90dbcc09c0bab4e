<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaFacturacionTiendasSaldosPendientes{

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
 		$facturacionTiendasSaldosPendientes = ControladorFacturasTiendas::ctrMostrarFacturasSaldosPendientes($item, $valor,$item2, $valor2,$item3,$valor3);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturacionTiendasSaldosPendientes); $i++){

      if ($facturacionTiendasSaldosPendientes[$i]["estatus"] == "Vigente") {

          $estatus = "<button type='button' class='btn btn-success'>Vigente</button>";

      }else{

          $estatus = "<button type='button' class='btn btn-danger'>Cancelado</button>";

      }

      if ($facturacionTiendasSaldosPendientes[$i]["idSolicitud"] != "0") {
                
            $acciones = "<button type='button' class='btn btn-warning btnVerDetallesTicket' data-toggle='modal' data-target='#modalVistaDetalleTicket' idFacturaSolicitud = '".$facturacionTiendasSaldosPendientes[$i]["id"]."' idSolicitud = '".$facturacionTiendasSaldosPendientes[$i]["idSolicitud"]."'><i class='fa fa-ticket'></i>Ver Ticket</button>";

      }else{

             $acciones = "<button type='button' class='btn btn-info btnGenerarSolicitudCancelacion' data-toggle='modal' data-target='#modalGenerarTicket' serieFac ='".$facturacionTiendasSaldosPendientes[$i]["serie"]."' folioFac ='".$facturacionTiendasSaldosPendientes[$i]["folio"]."' clienteFac ='".$facturacionTiendasSaldosPendientes[$i]["nombreCliente"]."' idFacturaSolic = '".$facturacionTiendasSaldosPendientes[$i]["id"]."'><i class='fa fa-ticket'></i> Solicitar Cancelación</button>";

      }
    
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturacionTiendasSaldosPendientes[$i]["id"].'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["fechaFactura"].'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["serie"].'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["folio"].'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["codigoCliente"].'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["rfc"].'",
                  "'.rtrim($facturacionTiendasSaldosPendientes[$i]["nombreCliente"]).'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["fechaVencimiento"].'",
				          "'.$facturacionTiendasSaldosPendientes[$i]["diasCredito"].'",
                  "$ '.number_format($facturacionTiendasSaldosPendientes[$i]["neto"],2).'",
                  "$ '.number_format($facturacionTiendasSaldosPendientes[$i]["descuento"],2).'",
                  "$ '.number_format($facturacionTiendasSaldosPendientes[$i]["impuesto"],2).'",
                  "$ '.number_format($facturacionTiendasSaldosPendientes[$i]["total"],2).'",
                  "$ '.number_format($facturacionTiendasSaldosPendientes[$i]["pendiente"],2).'",
                  "$ '.number_format($facturacionTiendasSaldosPendientes[$i]["pagado"],2).'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["fechaCobro"].'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["formaPago"].'",
                  "'.$facturacionTiendasSaldosPendientes[$i]["agente"].'",
                  "'.$estatus." ".$acciones.'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE FACTURACION TIENDAS SALDOS PENDIENTES
=============================================*/ 
$activar = new TablaFacturacionTiendasSaldosPendientes();
$activar -> mostrarTablas();



