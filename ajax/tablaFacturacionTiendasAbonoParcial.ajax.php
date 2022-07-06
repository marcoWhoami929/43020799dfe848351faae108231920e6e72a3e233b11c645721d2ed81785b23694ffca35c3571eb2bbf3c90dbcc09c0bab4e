<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaFacturacionTiendasAbonoParcial{

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
 		$facturacionTiendasAbonoParcial = ControladorFacturasTiendas::ctrMostrarFacturasAbonoParcial($item, $valor,$item2, $valor2,$item3,$valor3);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturacionTiendasAbonoParcial); $i++){

      if ($facturacionTiendasAbonoParcial[$i]["estatus"] == "Vigente") {

          $estatus = "<button type='button' class='btn btn-success'>Vigente</button>";

      }else{

          $estatus = "<button type='button' class='btn btn-danger'>Cancelado</button>";

      }

      if ($facturacionTiendasAbonoParcial[$i]["idSolicitud"] != "0") {
                
            $acciones = "<button type='button' class='btn btn-warning btnVerDetallesTicket' data-toggle='modal' data-target='#modalVistaDetalleTicket' idFacturaSolicitud = '".$facturacionTiendasAbonoParcial[$i]["id"]."' idSolicitud = '".$facturacionTiendasAbonoParcial[$i]["idSolicitud"]."'><i class='fa fa-ticket'></i>Ver Ticket</button>";

      }else{

             $acciones = "<button type='button' class='btn btn-info btnGenerarSolicitudCancelacion' data-toggle='modal' data-target='#modalGenerarTicket' serieFac ='".$facturacionTiendasAbonoParcial[$i]["serie"]."' folioFac ='".$facturacionTiendasAbonoParcial[$i]["folio"]."' clienteFac ='".$facturacionTiendasAbonoParcial[$i]["nombreCliente"]."' idFacturaSolic = '".$facturacionTiendasAbonoParcial[$i]["id"]."'><i class='fa fa-ticket'></i> Solicitar Cancelación</button>";

      }
    
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturacionTiendasAbonoParcial[$i]["id"].'",
                  "'.$facturacionTiendasAbonoParcial[$i]["fechaFactura"].'",
                  "'.$facturacionTiendasAbonoParcial[$i]["serie"].'",
                  "'.$facturacionTiendasAbonoParcial[$i]["folio"].'",
                  "'.$facturacionTiendasAbonoParcial[$i]["codigoCliente"].'",
                  "'.$facturacionTiendasAbonoParcial[$i]["rfc"].'",
                  "'.rtrim($facturacionTiendasAbonoParcial[$i]["nombreCliente"]).'",

                  "$ '.number_format($facturacionTiendasAbonoParcial[$i]["neto"],2).'",
                  "$ '.number_format($facturacionTiendasAbonoParcial[$i]["descuento"],2).'",
                  "$ '.number_format($facturacionTiendasAbonoParcial[$i]["impuesto"],2).'",
                  "$ '.number_format($facturacionTiendasAbonoParcial[$i]["total"],2).'",
                  "$ '.number_format($facturacionTiendasAbonoParcial[$i]["pendiente"],2).'",
                  "$ '.number_format($facturacionTiendasAbonoParcial[$i]["pagado"],2).'",
                  "'.$facturacionTiendasAbonoParcial[$i]["fechaCobro"].'",
                  "'.$facturacionTiendasAbonoParcial[$i]["formaPago"].'",
                  "'.$facturacionTiendasAbonoParcial[$i]["agente"].'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE FACTURACION TIENDAS ABONOS PARCIALES
=============================================*/ 
$activar = new TablaFacturacionTiendasAbonoParcial();
$activar -> mostrarTablas();



