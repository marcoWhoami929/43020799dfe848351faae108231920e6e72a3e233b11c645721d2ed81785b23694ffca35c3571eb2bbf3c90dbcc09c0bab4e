<?php
session_start();
require_once "../controladores/laboratorio.controlador.php";
require_once "../modelos/laboratorio.modelo.php";

class TablaLaboratorio{

	public function mostrarTablas(){	
     /*=============================================
    MOSTRAR LA TABLA DE laboratorio
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

 		$laboratorio = ControladorLaboratorio::ctrMostrarLaboratorio($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($laboratorio); $i++){



        	 		 	        $hora = $laboratorio[$i]["tiempoProceso"];
                        list($horas, $minutos, $segundos) = explode(':', $hora);
                        $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;


                        if ($laboratorio[$i]["status"] == 0 && $laboratorio[$i]["estado"] == 0 && $laboratorio[$i]["pendiente"] == 1) {
                              $estatusPedido = "<button class='btn btn-info btn-xs'>Pedido Pendiente</button>";
                            }

                            else if($laboratorio[$i]["status"] == 0 && $laboratorio[$i]["estado"] == 1){

                              $estatusPedido = "<button class='btn btn-danger btn-xs' idLaboratorio='".$laboratorio[$i]["id"]."' etapa='1'>Detenido</button>";

                            }else if($laboratorio[$i]["status"] == 1 && $laboratorio[$i]["estado"] == 1){

                               $estatusPedido =  "<button class='btn btn-warning btn-xs' idLaboratorio='".$laboratorio[$i]["id"]."' etapa='2'>En Producción</button>";

                            }else if($laboratorio[$i]["status"] == 2 && $laboratorio[$i]["estado"] == 1){

                               $estatusPedido = "<button class='btn btn-success btn-xs'>Concluido</button>";


                            }else if ($laboratorio[$i]["status"] == 0 && $laboratorio[$i]["estado"] == 0) {

                               $estatusPedido = "<button class='btn btn-danger btn-xs'>Pedido Cancelado</button>";

                            }

                            $verIgualados = "<div class='btn-group'><button class='btn btn-info btnVerIgualados' idLab='".$laboratorio[$i]["id"]."' data-toggle='modal' data-target='#modalVerIgualados'>Ver</button></div>";

                           /*DOS NUEVAS LINEAS*/
                            
                            if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"]=="Laboratorio de Color") {
                          
                              if ($laboratorio[$i]["status"] !=2 || $laboratorio[$i]["habilitado"] == 1) {

                                if ($laboratorio[$i]["estado"] == 0 && $laboratorio[$i]["status"] == 0 && $laboratorio[$i]["pendiente"] == 1) {

                                    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLaboratorio2='".$laboratorio[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' id='editarPed'><i class='fa fa-pencil'></i>Editar Pedido</button></div>";

                                } else if ($laboratorio[$i]["estado"] == 0 && $laboratorio[$i]["status"] == 0 && $laboratorio[$i]["pendiente"] == 0) {

                                    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLaboratorio2='".$laboratorio[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar Pedido</button></div>";  
                                  
                                }else{

                                    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLaboratorio2='".$laboratorio[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' id='editarPed'><i class='fa fa-pencil'></i>Editar Pedido</button></div>"; 

                                }  

                              }else {

                                    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLaboratorio2='".$laboratorio[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar Pedido</button></div>";
                                
                              }
                            }else{

                                    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPedido' idLaboratorio2='".$laboratorio[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPedido' disabled><i class='fa fa-pencil'></i>Editar Pedido</button></div>";
                            }  


                              $tiempoProceso = seg_a_dhms($hora_en_segundos);
                              /*========HABILITAR FOLIO============*/

                              if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez") {

                                 if ($laboratorio[$i]["habilitado"]  != 0) {

                                    $habilitado = "<div class='btn-group'><button class='btn btn-success btnHabilitarFolio' idLaboratorio3='".$laboratorio[$i]["id"]."' estadoPedido='0'><i class='fa fa-power-off'></i>Habilitado</button></div>";
                                
                                  }else {


                                     $habilitado = "<div class='btn-group'><button class='btn btn-danger btnHabilitarFolio' idLaboratorio3='".$laboratorio[$i]["id"]."' estadoPedido='1'><i class='fa fa-power-off'></i>Deshabilitado</button></div>";

                                  }
                         
                                
                              }else {

                                  $habilitado = "<div class='btn-group'></div>";

                              }
                              if ($laboratorio[$i]["observacionesExtras"] == "") {

                              $importante = "<div class=''><span class='label label-success'>SIN OBSERVACIONES</span></div>"; 
                          
                              }else {

                                     $importante = "<div class='btn-group'><button class='animated wobble infinite btn btn-danger btnVerObservaciones' idLaboratorio4='".$laboratorio[$i]["id"]."' data-toggle='modal' data-target='#verObservaciones'><i class='fa fa-eye'></i> Ver</button></div>";
                              }
             
             

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$laboratorio[$i]["idPedido"].'",
				      "'.$laboratorio[$i]["usuario"].'",
				      "'.$laboratorio[$i]["serie"].'",
				      "'.rtrim($laboratorio[$i]["nombreCliente"]).'",
				      "'.$laboratorio[$i]["numeroOrden"].'",
				      "'.$laboratorio[$i]["codigo"].'",
				      "'.$laboratorio[$i]["descripcionColor"].'",
				      "'.$laboratorio[$i]["cantidad"].'",
              "'.$importante.'",
              "'.$laboratorio[$i]["fechaRecepcion"].'",
				      "'.$laboratorio[$i]["fechaInicio"].'",
              "'.$laboratorio[$i]["fechaTermino"].'",
				      "'.$estatusPedido.'",
				      "'.$laboratorio[$i]["observaciones"].'",
				      "'.$tiempoProceso.'",
				      "'.$verIgualados.'",
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
ACTIVAR TABLA DE laboratorio
=============================================*/ 
$activar = new TablaLaboratorio();
$activar -> mostrarTablas();



