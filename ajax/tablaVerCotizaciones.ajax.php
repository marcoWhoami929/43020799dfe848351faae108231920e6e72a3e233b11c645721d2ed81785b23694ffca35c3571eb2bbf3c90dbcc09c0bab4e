<?php
session_start();
require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";

class TablaVerCotizaciones{

	public function mostrarTablas(){	
    /*=============================================
    MOSTRAR LA TABLA DE verCotizaciones
    =============================================*/ 
    
		$item = null;
 		$valor = null;

 		$verCotizaciones = ControladorCotizaciones::ctrMostrarCotizacionesVista($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($verCotizaciones); $i++){

				        $fecha = $verCotizaciones[$i]["fechaCotizacion"];
				        $fechaNueva = date("d/m/Y", strtotime($fecha));



				        $pdf = "<a target='_blank' class='btn' href='vistas/modulos/mostrarCotizacion.php/?folio=".$verCotizaciones[$i]["folio"]."'><i class='fa fa-file-pdf-o fa-2x' aria-hidden='true'></i></a>";

				        if ($verCotizaciones[$i]["cancelada"] == 0 && $verCotizaciones[$i]["enviada"] == 0 && $verCotizaciones[$i]["descargada"] == 0 && $verCotizaciones[$i]["aprobada"] == 0) {

					            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button>";
					           
					         }else if($verCotizaciones[$i]["cancelada"] == 0 && $verCotizaciones[$i]["enviada"] == 0  && $verCotizaciones[$i]["descargada"] == 1 && $verCotizaciones[$i]["aprobada"] == 0) {

					            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button>";

					         }
					         else if($verCotizaciones[$i]["cancelada"] == 0 && $verCotizaciones[$i]["enviada"] ==1  && $verCotizaciones[$i]["descargada"] == 0 && $verCotizaciones[$i]["aprobada"] == 0) {

					            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-info btn-xs'>Enviada</button>";

					         }
					         else if($verCotizaciones[$i]["cancelada"] == 0 && $verCotizaciones[$i]["enviada"] ==0  && $verCotizaciones[$i]["descargada"] == 1 && $verCotizaciones[$i]["aprobada"] == 0) {

					            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button><button class='btn btn-danger btn-xs'>Esperando Aprobación</button>";

					         }else if($verCotizaciones[$i]["cancelada"] == 0 && $verCotizaciones[$i]["enviada"] ==1  && $verCotizaciones[$i]["descargada"] == 1 && $verCotizaciones[$i]["aprobada"] == 0) {

					            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button><button class='btn btn-info btn-xs'>Enviada</button><button class='btn btn-danger btn-xs'>Esperando Aprobación</button>";

					         }
					         else if($verCotizaciones[$i]["cancelada"] == 0 && $verCotizaciones[$i]["enviada"] == 0  && $verCotizaciones[$i]["descargada"] == 1 && $verCotizaciones[$i]["aprobada"] == 1) {

					            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button><button class='btn btn-danger btn-xs'>Aprobada</button>";

					         }
					         else if($verCotizaciones[$i]["cancelada"] == 0 && $verCotizaciones[$i]["enviada"] ==1  && $verCotizaciones[$i]["descargada"] == 1 && $verCotizaciones[$i]["aprobada"] == 1) {

					            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button><button class='btn btn-info btn-xs'>Enviada</button><button class='btn btn-danger btn-xs'>Aprobada</button>";

					         }
					         else if($verCotizaciones[$i]["cancelada"] == 1) {

					            $statusCotizacion = "<button class='btn btn-danger btn-xs Cancelado' idCotizacion2='".$verCotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalMotivo' data-toggle='tooltip' data-placement='top' title='Ver motivos de cancelación'>Cancelada</button>";

					         }

				        if ($verCotizaciones[$i]["cancelada"] == 1) {

				        	$plantilla = "<a class='btn' id='link' href='' onclick='notificacion();return false;'><i class='fa fa-file-excel-o fa-2x' aria-hidden='true'></i></a>";
				        	
				        }else {

				        	$plantilla = "<a class='btn' href='vistas/modulos/reportes.php?reporteCotizacionesPlantilla=cotizaciones&folio=".$verCotizaciones[$i]["folio"]."'><i class='fa fa-file-excel-o fa-2x' aria-hidden='true'></i></a>";

				        }

				        



				        if ($verCotizaciones[$i]["referencia"] == "") {
				        	
				        	$verReferencia = "Sin referencias";
				        }else {

				        	$verReferencia = $verCotizaciones[$i]["referencia"];
				        }

				        if ($verCotizaciones[$i]["observaciones"] == "") {
				        	
				        	$verObservaciones = "Sin observaciones";

				        }else {

				        	$verObservaciones = $verCotizaciones[$i]["observaciones"];

				        }
				        


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			
			$datosJson	 .= '[
              		  "'.$verCotizaciones[$i]["serie"].'",
				      "'.$verCotizaciones[$i]["folio"].'",
				      "'.$fechaNueva.'",
				      "'.$verCotizaciones[$i]["fechaVencimiento"].'",
		              "'.$verCotizaciones[$i]["fechaEntrega"].'",
		              "'.$verCotizaciones[$i]["cantidadProductos"].'",
		              "'.$verCotizaciones[$i]["cantidad_productos"].'",
		              "'.$verCotizaciones[$i]["nombreCliente"].'",
		              "'.$verCotizaciones[$i]["rfc"].'",
		              "'.$verReferencia.'",
		              "'.$verObservaciones.'",
		              "'.$verCotizaciones[$i]["agenteVenta"].'",
		              "'.$statusCotizacion.'",
		              "$ '.number_format($verCotizaciones[$i]["total_descuento"] + $verCotizaciones[$i]["total_descuento2"],2).'",
					  "$ '.number_format($verCotizaciones[$i]["total_cotizacion"],2).'",
					  "'.$pdf.'",
					  "'.$plantilla.'",
					  "'.$verCotizaciones[$i]["usuarioVendedor"].'"],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE verCotizaciones
=============================================*/ 
$activar = new TablaVerCotizaciones();
$activar -> mostrarTablas();
