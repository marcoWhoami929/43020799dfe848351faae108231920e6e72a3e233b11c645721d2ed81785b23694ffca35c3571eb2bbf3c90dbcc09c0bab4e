<?php
error_reporting(E_ALL);
session_start();

require_once "../controladores/almacen.controlador.php";
require_once "../modelos/almacen.modelo.php";

class TablaAlmacen{

	public function mostrarTablas(){	
     /*=============================================
    MOSTRAR LA TABLA DE almacen
    =============================================*/ 
    function seg_a_dhms($seg) {
                $dias = floor($seg / 86400);
                $horas = floor(($seg - ($dias * 86400)) / 3600);
                $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
                $segundos = $seg % 60;
                return "$dias dias, $horas horas, $minutos minutos, $segundos segundos";
    }
		$item = null;
 		$valor = null;

 		$almacen = ControladorAlmacen::ctrMostrarAlmacen($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($almacen); $i++){



        	 		 	        $hora = $almacen[$i]["tiempoProceso"];
                        list($horas, $minutos, $segundos) = explode(':', $hora);
                        $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;


                        if ($almacen[$i]["status"] == 0 && $almacen[$i]["estado"] == 0 && $almacen[$i]["pendiente"] == 1) {

                          $estatusPedido = "<button class='btn btn-primary btn-xs'>Pedido Pendiente</button>";
                          }

                         else if($almacen[$i]["status"] == 0 && $almacen[$i]["estado"] == 1){
                            
                          $estatusPedido = "<button class='btn btn-info btn-x' idAlmacen='".$almacen[$i]["id"]."' etapa='1'>BackOrder</button>";
                          
                          }else if($almacen[$i]["status"] == 1 && $almacen[$i]["estado"] == 1){

                          $estatusPedido = "<button class='btn btn-danger btn-xs' idAlmacen='".$almacen[$i]["id"]."' etapa='2'>Laboratorio</button>";

                          }else if($almacen[$i]["status"] == 2 && $almacen[$i]["estado"] == 1){

                          $estatusPedido = "<button class='btn btn-warning btn-xs' idAlmacen='".$almacen[$i]["id"]."' etapa='3'>Pendiente</button>";

                          }else if($almacen[$i]["status"] == 3 && $almacen[$i]["estado"] == 1){

                          $estatusPedido = "<button class='btn btn-success btn-xs'>Suministrado</button>";

                          }else if($almacen[$i]["status"] == 0 && $almacen[$i]["estado"] == 0 && $almacen[$i]["pendiente"] == 2){

                          $estatusPedido = "<button class='btn btn-danger btn-xs'>Pedido Cancelado</button>";

                         }



                           /*DOS NUEVAS LINEAS*/
                            
                        if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"]=="Almacen" || $_SESSION["perfil"] == "Facturacion") {
                          
                        if ($almacen[$i]["status"] !=3 || $almacen[$i]["habilitado"] == 1) {

                          if ($almacen[$i]["estado"] == 0 && $almacen[$i]["status"] == 0 && $almacen[$i]["pendiente"] == 1) {
                              
                              $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idAlmacen2='".$almacen[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' id='editarPed'><i class='fa fa-pencil'></i>Editar Pedido</button></div>";  

                          }else if ($almacen[$i]["estado"] == 0 && $almacen[$i]["status"] == 0 && $almacen[$i]["pendiente"] == 0) {
                            
                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idAlmacen2='".$almacen[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar Pedido</button></div>";   

                          }else{

                              $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idAlmacen2='".$almacen[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' id='editarPed'><i class='fa fa-pencil'></i>Editar Pedido</button></div>";

                          }

                        }else {

                              $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idAlmacen2='".$almacen[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar Pedido</button></div>";
                          
                        }
                      }else{
                              $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idAlmacen2='".$almacen[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar Pedido</button></div>";
                      } 
                      $tiempoProceso = seg_a_dhms($hora_en_segundos);

                      /*========HABILITAR FOLIO============*/

                      if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez") {

                         if ($almacen[$i]["habilitado"]  != 0) {

                            $habilitado = "<div class='btn-group'><button class='btn btn-success btnHabilitarFolio' idAlmacen3='".$almacen[$i]["id"]."' estadoPedido='0'><i class='fa fa-power-off'></i>Habilitado</button></div>";
                        
                          }else {


                             $habilitado = "<div class='btn-group'><button class='btn btn-danger btnHabilitarFolio' idAlmacen3='".$almacen[$i]["id"]."' estadoPedido='1'><i class='fa fa-power-off'></i>Deshabilitado</button></div>";

                          }
                 
                        
                      }else {

                              $habilitado = "<div class='btn-group'></div>";

                          }

                        if ($almacen[$i]["observacionesExtras"] == "") {

                              $importante = "<div class=''><span class='label label-success'>SIN OBSERVACIONES</span></div>"; 
                          
                        }else {

                              $importante = "<div class='btn-group'><button class='animated wobble infinite btn btn-danger btnVerObservaciones' idAlmacen4='".$almacen[$i]["id"]."' data-toggle='modal' data-target='#verObservaciones'><i class='fa fa-eye'></i> Ver</button></div>";
                        }
             
                     

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				      "'.($i+1).'",
              "'.rtrim($almacen[$i]["nombreCliente"]).'",
				      "'.$almacen[$i]["idPedido"].'",
				      "'.$almacen[$i]["serie"].'",
				      "'.$almacen[$i]["suministrado"].'",
				      "'.$almacen[$i]["fechaRecepcion"].'",
				      "'.$almacen[$i]["fechaSuministro"].'",
				      "'.$estatusPedido.'",
				      "'.$almacen[$i]["fechaTermino"].'",
				      "'.$almacen[$i]["observaciones"].'",
              "'.$importante.'",
				      "'.$tiempoProceso.'",
				      "'.$almacen[$i]["numeroPartidas"].'",
				      "'.$almacen[$i]["sumPartidas"].'",
				      "'.round($almacen[$i]["nivelPartidas"],2).'%",
				      "'.$almacen[$i]["numeroUnidades"].'",
				      "'.$almacen[$i]["sumUnidades"].'",
				      "'.round($almacen[$i]["nivelDeSum"],2).'%",
				      "'.number_format($almacen[$i]["importeTotal"],2).'",
				      "'.number_format($almacen[$i]["importeSurtido"],2).'",
				      "'.round($almacen[$i]["nivelSumCosto"],2).'%",
              "'.$habilitado.'",
				      "'.$acciones.'"],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE almacen
=============================================*/ 
$activar = new TablaAlmacen();
$activar -> mostrarTablas();



