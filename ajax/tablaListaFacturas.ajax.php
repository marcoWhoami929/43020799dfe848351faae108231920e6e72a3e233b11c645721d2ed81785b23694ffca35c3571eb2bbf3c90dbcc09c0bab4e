<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaListaFacturasTiendas{

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
    }

 		$listaFacturas = ControladorFacturasTiendas::ctrMostrarListaFacturasTiendas($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($listaFacturas); $i++){

      if ($listaFacturas[$i]["refacturada"] != 0) {

          $item = "id";
          $valor = $listaFacturas[$i]["idNuevaFactura"];

          $serie = $listaFacturas[$i]["serie"];
          $listarDetalleFactura = ControladorFacturasTiendas::ctrMostrarDetalleFacturaVinculada($item,$valor,$serie);

          $acciones = "<div class='btn-group'><button class='btn btn-success btnVincularFactura' idFactura='".$listaFacturas[$i]["id"]."' disabled title='La factura ha sido vinculada con la factura ".$listarDetalleFactura["serie"]." ".$listarDetalleFactura["folio"]."'><i class='fa fa-plus'></i></button></div>";
          
      }else{

          $acciones = "<div class='btn-group'><button class='btn btn-info btnVincularFactura' idFactura='".$listaFacturas[$i]["id"]."'><i class='fa fa-plus'></i></button></div>";

          
      }
      

      
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[              
                  "'.$listaFacturas[$i]["serie"].'",
                  "'.$listaFacturas[$i]["folio"].'",
                  "'.$listaFacturas[$i]["fechaFactura"].'",
                  "'.rtrim($listaFacturas[$i]["nombreCliente"]).'",
                  "$ '.number_format($listaFacturas[$i]["total"],2).'",
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
$activar = new TablaListaFacturasTiendas();
$activar -> mostrarTablas();



