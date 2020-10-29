<?php
error_reporting(0);
require_once "../controladores/controlMuestras.controlador.php";
require_once "../modelos/controlMuestras.modelo.php";

class TablaControlMuestras{

 	/*=============================================
  	MOSTRAR LA TABLA DE CONTROL DE MUESTRAS
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

 		$controlMuestras = ControladorControlMuestras::ctrMostrarMuestras($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($controlMuestras); $i++){

	 		
	 		if ($controlMuestras[$i]["tiempoProceso"] == "") {


	 			
	 		}else{
	 			$hora = $controlMuestras[$i]["tiempoProceso"];
	 			list($horas, $minutos, $segundos) = explode(':', $hora);
            	$hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;


	 		}
           

	 		if ($controlMuestras[$i]["solicitudEnviada"] != 0) {
	 			$solicitudEnviada = "<div class='btn-group'><button class='btn btn-success btnHabilitar1' idStado1='".$controlMuestras[$i]["id"]."' estado1='0' disabled><i class='fa fa-power-off'></i></button></div>";
	 		}else{
	 			$solicitudEnviada = "<div class='btn-group'><button class='btn btn-danger btnHabilitar1' idStado1='".$controlMuestras[$i]["id"]."' estado1='1' disabled><i class='fa fa-power-off'></i></button></div>";
	 		}


	 		if ($controlMuestras[$i]["motoEnCamino"] != 0) {
	 			$motoEnCamino = "<div class='btn-group'><button class='btn btn-success btnHabilitar3' idStado3='".$controlMuestras[$i]["id"]."' estado3='0' disabled><i class='fa fa-power-off'></i></button></div>";
	 		}else{
	 			$motoEnCamino = "<div class='btn-group'><button class='btn btn-danger btnHabilitar3' idStado3='".$controlMuestras[$i]["id"]."' estado3='1'><i class='fa fa-power-off'></i></button></div>";
	 		}


	 		if ($controlMuestras[$i]["enProceso"] != 0) {
	 			$enProceso = "<div class='btn-group'><button class='btn btn-success btnHabilitar5' idStado5='".$controlMuestras[$i]["id"]."' estado5='0' disabled><i class='fa fa-power-off'></i></button></div>";
	 		}else{
	 			$enProceso = "<div class='btn-group'><button class='btn btn-danger btnHabilitar5' idStado5='".$controlMuestras[$i]["id"]."' estado5='1'><i class='fa fa-power-off'></i></button></div>";
	 		}


	 		if ($controlMuestras[$i]["motoEnCaminoRegreso"] != 0) {
	 			$motoEnCaminoRegreso = "<div class='btn-group'><button class='btn btn-success btnHabilitar7' idStado7='".$controlMuestras[$i]["id"]."' estado7='0' disabled><i class='fa fa-power-off'></i></button></div>";
	 		}else{
	 			$motoEnCaminoRegreso = "<div class='btn-group'><button class='btn btn-danger btnHabilitar7' idStado7='".$controlMuestras[$i]["id"]."' estado7='1'><i class='fa fa-power-off'></i></button></div>";
	 		}

	 		if ($controlMuestras[$i]["concluido"] != 0) {
	 			
	 			if ($controlMuestras[$i]["motoEnCamino"] == 1 and $controlMuestras[$i]["enProceso"] == 1 and  $controlMuestras[$i]["motoEnCaminoRegreso"] == 1 and $controlMuestras[$i]["concluido"] == 0) {
	 				$concluido = "<div class='btn-group'><button class='btn btn-success btnHabilitar8' idStado8='".$controlMuestras[$i]["id"]."' estado8='0'><i class='fa fa-power-off'></i></button></div>";
	 			}else {
	 				$concluido = "<div class='btn-group'><button class='btn btn-success btnHabilitar8' idStado8='".$controlMuestras[$i]["id"]."' estado8='0' disabled><i class='fa fa-power-off'></i></button></div>";
	 			}

	 		}else{
	 			if ($controlMuestras[$i]["motoEnCamino"] == 1 and $controlMuestras[$i]["enProceso"] == 1 and  $controlMuestras[$i]["motoEnCaminoRegreso"] == 1 and $controlMuestras[$i]["concluido"] == 0) {
	 				$concluido = "<div class='btn-group'><button class='btn btn-danger btnHabilitar8' idStado8='".$controlMuestras[$i]["id"]."' estado8='1'><i class='fa fa-power-off'></i></button></div>";
	 			}else{
	 				$concluido = "<div class='btn-group'><button class='btn btn-danger btnHabilitar8' idStado8='".$controlMuestras[$i]["id"]."' estado8='1' disabled><i class='fa fa-power-off'></i></button></div>";
	 			}
	 			
	 		}
	 	
	 		if ($controlMuestras[$i]["tiempoProceso"] == "") {

	 			$tiempoProceso = "Sin datos";
	 			
	 		}else{

	 			$tiempoProceso = seg_a_dhms($hora_en_segundos);
	 		}
            
            if ($controlMuestras[$i]["solicitudEnviada"] == 1) {

            	$estatus = "Solicitud Enviada";
            	
            }if ($controlMuestras[$i]["solicitudEnviada"] == 1 and $controlMuestras[$i]["motoEnCamino"] == 1) {

            	$estatus = "Recolección en Camino";
            	
            }if ($controlMuestras[$i]["solicitudEnviada"] == 1 and $controlMuestras[$i]["motoEnCamino"] == 1 and $controlMuestras[$i]["enProceso"] == 1) {

            	$estatus = "En Proceso";
            	
            }if ($controlMuestras[$i]["solicitudEnviada"] == 1 and $controlMuestras[$i]["motoEnCamino"] == 1 and $controlMuestras[$i]["enProceso"] == 1 and $controlMuestras[$i]["motoEnCaminoRegreso"] == 1) {
            	
            	$estatus = "Entrega en Camino";

            }if ($controlMuestras[$i]["solicitudEnviada"] == 1 and $controlMuestras[$i]["motoEnCamino"] == 1 and $controlMuestras[$i]["enProceso"] == 1 and $controlMuestras[$i]["motoEnCaminoRegreso"] == 1 and $controlMuestras[$i]["concluido"] == 1) {

            	$estatus = "Concluido";
            	
            }
            if ($controlMuestras[$i]["listaProductos"] == "[{}]") {

            	$pdf  = "";
            	
            }else{

            	 $pdf = "<a class='btnDescargarSolicitud' idSolicitud='".$controlMuestras[$i]["id"]."'><i class='fa fa-file-pdf-o fa-2x' aria-hidden='true'></i></a>";

            }
           	/******VALIDAR SI LA SOLICITUD HA SIDO VISTA POR EL AGENTE DE VENTA ****/
           	if ($controlMuestras[$i]["visto"] != 0) {
	 				$visto = "<div class='btn-group'><button class='btn btn-info btnVisto' idVisto='".$controlMuestras[$i]["id"]."' visto='0' disabled><i class='fa fa-eye'></i></button></div>";
	 			}else{
	 				$visto = "<div class='btn-group'><button class='btn btn-warning btnVisto' idVisto='".$controlMuestras[$i]["id"]."' visto='1' ><i class='fa fa-eye'></i></button></div>";
	 		}
	 		/***********VALIDAR SI EL CLIENTE HA RECIBIDO UN REGALO POR SUS CANTIDAD DE SOLICITUDES******/
	 		if ($controlMuestras[$i]["ganadorRifa"] == 0) {
	 				
	 				$ganador = "";

	 		}else if ($controlMuestras[$i]["ganadorRifa"] == 1) {

	 				$ganador = "<i class='fa fa-gift fa-2x' aria-hidden='true'></i>";
	 				
	 		}else if ($controlMuestras[$i]["ganadorRifa"] == 2) {

	 				$ganador = "<i class='fa fa-gift fa-2x' aria-hidden='true'></i><i class='fa fa-gift fa-2x' aria-hidden='true'></i>";
	 			
	 		}else if ($controlMuestras[$i]["ganadorRifa"] == 3) {

	 				$ganador = "<i class='fa fa-gift fa-2x' aria-hidden='true'></i><i class='fa fa-gift fa-2x' aria-hidden='true'></i>";
	 			
	 		}

	 		$datos = "<div class='btn-group'><button class='btn btn-warning btnVerDatos' idDatosCliente='".$controlMuestras[$i]["idCliente"]."' nameSucursal='".$controlMuestras[$i]["sucursal"]."' data-toggle='modal' data-target='#modalVerDatos'><i class='fa fa-eye'></i></button></div>";	
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      
				      "'.$controlMuestras[$i]["id"].'",
				      "'.$controlMuestras[$i]["cliente"].'<br>'.$datos.'",
				      "'.$controlMuestras[$i]["sucursal"].'",
				      "'.$controlMuestras[$i]["horaSolicitud"].'",
				      "'.$solicitudEnviada.'",
				      "'.$visto.'",
				      "'.$motoEnCamino.'",
				      "'.$enProceso.'",
				      "'.$motoEnCaminoRegreso.'",
				      "'.$concluido.'",
				      "'.$controlMuestras[$i]["horaConcluido"].'",
				      "'.$pdf.'",
				      "'.$tiempoProceso.'",
				      "'.utf8_decode($controlMuestras[$i]["observaciones"]).'",
				      "'.$ganador.'",
				      "'.$estatus.'"
				     
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

 	/*=============================================
	  MOSTRAR CARTERA DE CLIENTES
	=============================================*/
 	public function mostrarCarteraClientes(){
		$item = null;
 		$valor = null;

 		$carteraClientes = ControladorControlMuestras::ctrMostrarCarteraClientes($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($carteraClientes); $i++){


	 		$acciones = "<div class='btn-group'><button class='btn btn-danger btnEliminarCliente' idCliente='".$carteraClientes[$i]["id"]."' ><i class='fa fa-times'></i></button>";

	 		$mapa = "<div class='btn-group'><button class='btn btn-info btnVerMapa' data-toggle='modal' data-target='#modalVerMapa' direccion='".$carteraClientes[$i]["direccion"]."'><i class='fa fa-map-marker' aria-hidden='true'></i></button>";

		
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$carteraClientes[$i]["nombreCompleto"].'",
				      "'.$carteraClientes[$i]["email"].'",
				      "'.$carteraClientes[$i]["taller"].'",
				      "'.$carteraClientes[$i]["telefono"].'",
				      "'.$carteraClientes[$i]["celular"].'",
				      "'.$carteraClientes[$i]["direccion"].'",
				      "'.$acciones.''.$mapa.'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

	}
 	

}

if (isset($_GET["Muestras"])) {
	$activar = new TablaControlMuestras();
	$activar -> mostrarTablas();

}else if (isset($_GET["Cartera"])) {
	$activar = new TablaControlMuestras();
	$activar -> mostrarCarteraClientes();

}



