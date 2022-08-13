<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaCotizacionesComercial{

	public function mostrarTablas(){	
    
		$item = "fechaFactura";
    if($_GET["fechaCotizacion"] != "") {

        $valor = $_GET["fechaCotizacion"];

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

        $valor2 = "COSM";

        break;
      case 'Sucursal Capu':

        $valor2 = "COCP";

        break;
      case 'Sucursal Reforma':

        $valor2 = "CORF";

        break;
      case 'Sucursal Las Torres':

        $valor2 = "ZCTR";

        break;
      case 'Sucursal Santiago':

        $valor2 = "COSG";

        break;
       case 'Sucursal Acatepec':

        $valor2 = "ZNCT";

        break;
        default:

        $valor2 = "ALL";
        break;
    }

    $item3 = "fechaFactura";
    if($_GET["fechaFinCotizacion"] != "") {

        $valor3 = $_GET["fechaFinCotizacion"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        $valor3 = $fechaFinal;

    }

    $empresa = $_GET["empresa"];
 		$cotizacionesComercial = ControladorFacturasTiendas::ctrMostrarCotizacionesComercial($item, $valor,$item2,$valor2,$item3,$valor3,$empresa);


 		$datosJson = '{
		 
	 	"data": [ ';
   
    $cotizaciones = json_decode($cotizacionesComercial,true);
    
	 	for($i = 0; $i < count($cotizaciones); $i++){
   
      $serieFolio = $cotizaciones[$i]["serie"]." ".$cotizaciones[$i]["folio"];
      $oportunidad = "<div class='btn-group'><button class='btn btn-info btnGenerarOportunidad' folioCotizacion='".$serieFolio."' fecha = '".substr($cotizaciones[$i]["fecha"]["date"],0,10)."' concepto ='".preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cotizaciones[$i]["referencia"])."' observaciones ='".preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cotizaciones[$i]["observaciones"])."'  monto='".number_format($cotizaciones[$i]["total"],2, ".", "")."'><i class='fa fa-handshake-o' aria-hidden='true'></i>Oportunidad</button></button></div>";
      
      if ($cotizaciones[$i]["estatus"] == 0) {

        $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button>";
        
      }else{
        $statusCotizacion = "<button class='btn btn-danger btn-xs'>Cancelada</button>";
      }
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[

                  "'.$cotizaciones[$i]["idComercial"].'",
                  "'.$cotizaciones[$i]["serie"].'",
                  "'.$cotizaciones[$i]["folio"].'",
                  "'.substr($cotizaciones[$i]["fecha"]["date"],0,10).'",
                  "'.substr($cotizaciones[$i]["fechaVencimiento"]["date"],0,10).'",
                  "'.substr($cotizaciones[$i]["fecha"]["date"],0,10).'",
                  "'.$cotizaciones[$i]["partidas"].'",
                  "'.$cotizaciones[$i]["unidades"].'",
                  "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cotizaciones[$i]["nombreCliente"]).'</strong>",
                  "'.$cotizaciones[$i]["agenteVenta"].'",
                  "$ '.number_format($cotizaciones[$i]["total"],2).'",
                  "'.$statusCotizacion.'",
                  "'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cotizaciones[$i]["referencia"]).'",
                  "'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cotizaciones[$i]["observaciones"]).'",
                  "'.$oportunidad.'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE COTIZACIONES COMERCIAL
=============================================*/ 
$activar = new TablaCotizacionesComercial();
$activar -> mostrarTablas();



