<?php
session_start();
error_reporting(E_ALL);

require_once "../controladores/facturacion.controlador.php";
require_once "../modelos/facturacion.modelo.php";

class TablaListaFacturasVista{

	public function mostrarTablas(){	
    
    $tabla = "facturasgenerales";

    $item = "idPedido";
    $valor = $_GET["folio"];
    $item2 = "serie";
    $valor2 = $_GET["serie"];
		
 		$facturasGenerales = ModeloFacturacion::mdlMostrarFacturasGenerales($tabla, $item, $valor, $item2, $valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($facturasGenerales); $i++){

      if ($facturasGenerales[$i]["cancelado"] != 1) {

          $estatus = "<button type='button' class='btn btn-success'>Vigente</button>";

      }else{

          $estatus = "<button type='button' class='btn btn-danger'>Cancelada</button>";

      }

      switch ($facturasGenerales[$i]["estatusEntrega"]) {
        case 'En Ruta':
          $estatusEntrega = "<button type='button' class='btn btn-warning'>En Ruta</button>";
          break;
         case 'Entregada':
          $estatusEntrega = "<button type='button' class='btn btn-success'>Entregada</button>";
          break;
        
        default:
          $estatusEntrega = "<button type='button' class='btn btn-danger'>Sin Ruta</button>";
          break;
      }


   

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				          "'.$facturasGenerales[$i]["serie"].'",
                  "'.$facturasGenerales[$i]["folio"].'",
                  "'.$facturasGenerales[$i]["numeroPartidas"].'",
                  "'.$facturasGenerales[$i]["numeroUnidades"].'",
                  "$ '.number_format($facturasGenerales[$i]["importeFactura"],2).'",
                  "'.$estatus.'",
                  "'.$facturasGenerales[$i]["fechaFactura"].'",
                  "'.$estatusEntrega.'"],';

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
$activar = new TablaListaFacturasVista();
$activar -> mostrarTablas();



