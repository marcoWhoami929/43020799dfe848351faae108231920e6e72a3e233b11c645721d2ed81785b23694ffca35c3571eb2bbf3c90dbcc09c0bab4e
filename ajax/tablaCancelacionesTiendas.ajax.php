<?php
error_reporting(0);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaCancelacionesTiendas{

	public function mostrarTablas(){	
  
    $item = "concepto";

    if ($_GET["sucursalElegida"] != "") {

      $usuario = $_GET["sucursalElegida"];

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

        $valor = "'FACTURA SAN MANUEL V 3.3','Factura San Manuel'";

        break;
      case 'Sucursal Capu':

        $valor = "'FACTURA CAPU V 3.3','Factura Capu'";

        break;
      case 'Sucursal Reforma':

        $valor = "'FACTURA REFORMA V 3.3','Factura Reforma'";

        break;
      case 'Sucursal Las Torres':

        $valor = "'FACTURA TORRES','Factura Torres'";

        break;
      case 'Sucursal Santiago':

        $valor = "'FACTURA SANTIAGO V 3.3','Factura Santiago'";

        break;
      case 'Mayoreo':

        $valor = "'FACTURA MAYOREO V 3.3','Factura Mayoreo'";

        break;
      case 'Industrial':

        $valor = "'FACTURA INDUSTRIAL V 3.3','Factura Industrial'";

        break;
      case 'Rutas':

        $valor = "ALL";
        
        break;
      case 'Sucursal Acatepec':

        $valor = "'FACTURA ACATEPEC V 3.3','Factura Acatepec'";

        break;
    }

 		$cancelacionesTiendas = ControladorFacturasTiendas::ctrMostrarCancelacionesTiendas($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($cancelacionesTiendas); $i++){

      if ($cancelacionesTiendas[$i]["cancelado"] == 1) {
          
          $motivoCancelacion = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cancelacionesTiendas[$i]["motivoCancelacion"]);

      }else{

          $motivoCancelacion = "";
      }

      if($cancelacionesTiendas[$i]["idNuevaFactura"] != "0"){

         $agregarNuevaFactura = "<div class='btn-group'><button class='btn btn-info btnVerFacturaVinculada' idFacturaTiendaVista='".$cancelacionesTiendas[$i]["idNuevaFactura"]."' serieFacturaVista='".$cancelacionesTiendas[$i]["serie"]."' data-toggle='modal' data-target='#modalVistaFacturaVinculada'><i class='fa fa-eye' aria-hidden='true'></i></button></div>";  

      }else{

         $agregarNuevaFactura = "<div class='btn-group'><button class='btn btn-warning btnRefacturar' idFacturaTienda='".$cancelacionesTiendas[$i]["id"]."' serieFacturaTienda='".$cancelacionesTiendas[$i]["serie"]."' data-toggle='modal' data-target='#modalRefacturacion'><i class='fa fa-files-o' aria-hidden='true'></i></button></div>";  

      }
      $acciones = "<button type='button' class='btn btn-warning btnVerDetallesTicketCancelado' data-toggle='modal' data-target='#modalVistaDetalleTicket' idFacturaSolicitud = '".$cancelacionesTiendas[$i]["id"]."' idSolicitudTicket = '".$cancelacionesTiendas[$i]["idSolicitud"]."'><i class='fa fa-ticket'></i>Ver Ticket</button>";
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.($i+1).'",
                  "'.$agregarNuevaFactura.'",
                  "'.$cancelacionesTiendas[$i]["fechaCancelacion"].'",
                  "'.$cancelacionesTiendas[$i]["serie"].'",
                  "'.$cancelacionesTiendas[$i]["folio"].'",
                  "'.$cancelacionesTiendas[$i]["fechaFactura"].'",
                  "'.rtrim($cancelacionesTiendas[$i]["nombreCliente"]).'",
                  "$ '.number_format($cancelacionesTiendas[$i]["total"],2).'",
                  "'.$motivoCancelacion.'",
                  "'.$acciones.'"],';

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
$activar = new TablaCancelacionesTiendas();
$activar -> mostrarTablas();



