<?php
error_reporting(0);
require_once "../controladores/ordenTrabajo.controlador.php";
require_once "../modelos/ordenTrabajo.modelo.php";

class TablaEstatusOrdenes{

 	/*=============================================
  	MOSTRAR LA TABLA DE ORDENES DE TRABAJO
  	=============================================*/ 

	public function mostrarTablas(){	

		function seg_a_dhms($seg) {
                $dias = floor($seg / 86400);
                $horas = floor(($seg - ($dias * 86400)) / 3600);
                $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
                $segundos = $seg % 60;
                return "$dias dias, $horas horas, $minutos minutos, $segundos segundos";
                }


            $item = null;
            $valor = null;

            $ordenesTrabajo = ControladorOrdenes::ctrMostrarEstatusOrdenes($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($ordenesTrabajo); $i++){

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/


	  		            if ($ordenesTrabajo[$i]["estadoOrden"] == 0 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0 && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                               $estatusOrden =  "<td style='height:120px;'><h4><span class='label label-danger'>ORDEN CANCELADA POR EL CLIENTE</span></h4></td>";
                      
                        }else{
                            if($ordenesTrabajo[$i]["observaciones"] == 1){

                                if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                    $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class=''>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                           
                             }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                 $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                        
                             }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] < 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                 $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                        
                             }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] < 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                 $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class='paused'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                        
                             }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] < 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 1 ) {
                                 $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class='visited first'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                        
                             }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] == 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 1 ) {
                                 $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='visited first'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class='actives'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                        
                             }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] == 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                 $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='visited first'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class='paused'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                        
                             }
                             else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 1 ) {
                                 $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class='visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                        
                             }

                            }else if($ordenesTrabajo[$i]["observaciones"] == 2){

                             if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                    $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='visited first'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class='paused'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                           
                             }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 1 ) {
                                 $estatusOrden =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='previous visited'>Ruta<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoProceso']."</span></li><li class='visited first'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoAlmacen']."</span></li><li class='actives'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$ordenesTrabajo[$i]['tiempoFacturacion']."</span></li></ul></div></td>";
                        
                             }

                            }
                        }
                        
                       if ($ordenesTrabajo[$i]["estadoOrden"] == 0 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {

                               $estatusFinal = "<br><br><br><br><span class='label label-danger'>Cancelado</span></td>";
                      
                        }else{
                            if($ordenesTrabajo[$i]["observaciones"] == 1){

                                if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";
                           
                                }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-info'>En proceso</span></td>";
                            
                                }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] < 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-info'>En proceso</span></td>";
                            
                                }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] < 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-info'>En proceso</span></td>";
                            
                                }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] < 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 1 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";
                            
                                }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] == 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-info'>En proceso</span></td>";
                            
                                }
                                else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 1 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";
                            
                                }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 1 && $ordenesTrabajo[$i]["statusAlmacen"] == 2  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 1 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-success'>Concluido</span><br><span>Tiempo Proceso</span> <span>".$datos = seg_a_dhms($ordenesTrabajo[$i]['tiempoFinal'])."</span><br><button class='btn btn-success btnCrearTicket' serie='".$ordenesTrabajo[$i]["serie"]."' folio='".$ordenesTrabajo[$i]["folio"]."' serieFactura = '".$ordenesTrabajo[$i]["serieFactura"]."' folioFactura='".$ordenesTrabajo[$i]["folioFactura"]."'><i class='fa fa-ticket'></i></button></td>";
                            
                                }


                            }else if($ordenesTrabajo[$i]["observaciones"] == 2){

                                if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 0 && $ordenesTrabajo[$i]["statusFacturacion"] == 0 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";
                           
                                }else if ($ordenesTrabajo[$i]["estadoOrden"] == 1 && $ordenesTrabajo[$i]["estadoAlmacen"] == 0 && $ordenesTrabajo[$i]["statusAlmacen"] == 0  && $ordenesTrabajo[$i]["estadoFacturacion"] == 1 && $ordenesTrabajo[$i]["statusFacturacion"] == 1 ) {
                                    $estatusFinal = "<br><br><br><br><span class='label label-success'>Concluido</span><br><span>Tiempo Proceso</span> <span>".$datos = seg_a_dhms($ordenesTrabajo[$i]['tiempoFinal'])."</span><br><button class='btn btn-success btnCrearTicket' serie='".$ordenesTrabajo[$i]["serie"]."' folio='".$ordenesTrabajo[$i]["folio"]."' serieFactura = '".$ordenesTrabajo[$i]["serieFactura"]."' folioFactura='".$ordenesTrabajo[$i]["folioFactura"]."'><i class='fa fa-ticket'></i></button></td>";
                            
                                }

                            }

                            
         
                        }
                        $fecha = date('d/m/Y', strtotime($ordenesTrabajo[$i]["fechaOrden"]));
                       
        
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$fecha.'",
				      "'.$ordenesTrabajo[$i]["serie"].'",
				      "'.$ordenesTrabajo[$i]["folio"].'",
				      "'.$ordenesTrabajo[$i]["serieFactura"].'",
				      "'.$ordenesTrabajo[$i]["folioFactura"].'",
				      "'.$ordenesTrabajo[$i]["nombreCliente"].'",
				      "'.$estatusOrden.'",
				      "'.$estatusFinal.'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE ESTATUS DE ORDENES
=============================================*/ 
$activar = new TablaEstatusOrdenes();
$activar -> mostrarTablas();



