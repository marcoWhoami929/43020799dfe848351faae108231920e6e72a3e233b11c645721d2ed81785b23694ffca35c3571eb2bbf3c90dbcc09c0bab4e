<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaAjusteSaldosRemanentes{

	public function mostrarTablas(){	
		 switch ($_GET["concepto"]) {
      case 'Sucursal San Manuel':

        $concepto = "'FACTURA SAN MANUEL V 3.3','Factura San Manuel'";

        break;
      case 'Sucursal Capu':

        $concepto = "'FACTURA CAPU V 3.3','Factura Capu'";


        break;
      case 'Sucursal Reforma':

        $concepto = "'FACTURA REFORMA V 3.3','Factura Reforma'";

        break;
      case 'Sucursal Las Torres':

        $concepto = "'FACTURA TORRES','Factura Torres'";

        break;
      case 'Sucursal Santiago':

        $concepto = "'FACTURA SANTIAGO V 3.3','Factura Santiago'";

        break;
      case 'Mayoreo':

        $concepto = "'FACTURA MAYOREO V 3.3','Factura Mayoreo'";


        break;
      case 'Industrial':

        $concepto = "'FACTURA INDUSTRIAL V 3.3','Factura Industrial'";
      
        break;
      case 'Rutas':

        $concepto = "ALL";
        
        break;
      case 'Sucursal Acatepec':

        $concepto = "'FACTURA ACATEPEC V 3.3','Factura Acatepec'";

        break;
    }
   
    $datos =  array('valorAjuste' => $_GET["valorAjuste"],
                    'fechaInicioAjuste' => $_GET["fechaInicioAjuste"],
                    'fechaFinAjuste' => $_GET["fechaFinAjuste"],
                    'concepto' => $concepto);
    

 		$facturasAjusteRemanentes = ControladorFacturasTiendas::ctrMostrarFacturasConRemanentes($datos);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturasAjusteRemanentes); $i++){


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
                  "'.$facturasAjusteRemanentes[$i]["serie"].'",
                  "'.$facturasAjusteRemanentes[$i]["folio"].'",
                  "'.$facturasAjusteRemanentes[$i]["fechaFactura"].'",
                  "'.$facturasAjusteRemanentes[$i]["nombreCliente"].'",
                  "$ '.number_format($facturasAjusteRemanentes[$i]["pendiente"],2).'",
                  "'.$facturasAjusteRemanentes[$i]["idMovimientoBanco"].'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE AJUSTE DE SALDOS DE REMANENTES
=============================================*/ 
$activar = new TablaAjusteSaldosRemanentes();
$activar -> mostrarTablas();



