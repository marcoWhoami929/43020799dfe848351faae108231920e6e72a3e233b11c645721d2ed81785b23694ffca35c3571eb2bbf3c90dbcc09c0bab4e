<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaCortesDeCaja{

	public function mostrarTablas(){	
   
	 if ($_SESSION["perfil"] == "Administrador General"  || $_SESSION["nombre"] == "José Martinez") {
      
      $item = null;
      $valor = null;
   }else{

    $item = "idSucursal";
   
    $usuario = $_SESSION["id"];
    
    $valor = $usuario;
   }
    
    $item2 = 'fechaCorte';
    if ($_GET["fechaCorte"] != "") {

      $fechaCorte = $_GET["fechaCorte"];
      $valor2 = $fechaCorte;

    }else{

      $hoy = date("d/m/Y");
      $fecha = str_replace('/', '-', $hoy);
      $fechaFinal = date('Y-m-d', strtotime($fecha));
      $valor2 = $fechaFinal;

    }
    

 		$listaCortesCaja = ControladorFacturasTiendas::ctrMostrarListaCortesCaja($item, $valor,$item2,$valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($listaCortesCaja); $i++){

      $pdf = "<button class='btn btn-success btnEmitirReciboCorteCaja' folioReciboCorte = '".$listaCortesCaja[$i]["folio"]."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button>";

      $verDetalleCorte = "<div class='btn-group'><button class='btn btn-info btnVerDetalleCorteCaja' folioCorteCajaVistaDetalle = '".$listaCortesCaja[$i]["folio"]."' data-toggle='modal' data-target='#modalDetalleCorte'><i class='fa fa-info-circle'></i></button></div>";


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[       
                  "<strong>'.($i+1).'</strong>",       
                  "'.$listaCortesCaja[$i]["fechaCorte"].'",
                  "$ '.number_format($listaCortesCaja[$i]["importeVenta"],2).'",
                  "$ '.number_format($listaCortesCaja[$i]["gastos"],2).'",
                  "$ '.number_format($listaCortesCaja[$i]["fondoCaja"]+$listaCortesCaja[$i]["gastos"],2).'",
                  "$ '.number_format($listaCortesCaja[$i]["diferencia"],2).'",
                  "<strong>$ '.number_format($listaCortesCaja[$i]["total"],2).'</strong>",
                  "'.$listaCortesCaja[$i]["observaciones"].'",
                  "'.$listaCortesCaja[$i]["nombre"].'",
                  "'.$verDetalleCorte.'",
                  "'.$pdf.'"],';

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
$activar = new TablaCortesDeCaja();
$activar -> mostrarTablas();



