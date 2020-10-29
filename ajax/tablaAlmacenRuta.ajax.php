<?php
session_start();
require_once "../controladores/almacenRuta.controlador.php";
require_once "../modelos/almacenRuta.modelo.php";

class TablaAlmacenRuta{

  public function mostrarTablas(){  
     /*=============================================
    MOSTRAR LA TABLA DE ORDENES DE TRABAJO
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

    $ordenes = ControladorAlmacenRuta::ctrMostrarOrdenesDeTrabajo($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($ordenes); $i++){

                $hora = $ordenes[$i]["tiempoProceso"];
                list($horas, $minutos, $segundos) = explode(':', $hora);
                $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;

                if ($ordenes[$i]["status"] == 0 && $ordenes[$i]["estado"] == 0 && $ordenes[$i]["pendiente"] == 1) {

                    $estatusOrden = "<button class='btn btn-primary btn-xs'>Orden Pendiente</button>";
                }

                else if($ordenes[$i]["status"] == 0 && $ordenes[$i]["estado"] == 1){
                      
                    $estatusOrden = "<button class='btn btn-info btn-x' idAlmacen='".$ordenes[$i]["id"]."' etapa='1'>Colocación de Material</button>";
                    
                }else if($ordenes[$i]["status"] == 1 && $ordenes[$i]["estado"] == 1){

                    $estatusOrden = "<button class='btn btn-warning btn-xs' idAlmacen='".$ordenes[$i]["id"]."' etapa='2'>Traspaso</button>";

                }else if($ordenes[$i]["status"] == 2 && $ordenes[$i]["estado"] == 1){

                    $estatusOrden = "<button class='btn btn-success btn-xs' idAlmacen='".$ordenes[$i]["id"]."' etapa='3'>Entrega de Material</button>";

                }else if($ordenes[$i]["status"] == 0 && $ordenes[$i]["estado"] == 0 && $ordenes[$i]["pendiente"] == 2){

                    $estatusOrden = "<button class='btn btn-danger btn-xs'>Orden Cancelada</button>";

                }

                /*DOS NUEVAS LINEAS*/
                if ($ordenes[$i]["observaciones"] == "") {

                        $observaciones =  'Sin Observaciones';

                }else if ($ordenes[$i]["observaciones"] == "1"){

                        $observaciones = "Facturar Y Resurtir";

                }else if ($ordenes[$i]["observaciones"] == "2"){

                        $observaciones = "Facturar";

                }
                if ($ordenes[$i]["comentarios"] == "") {

                        $comentarios =  'Sin Comentarios';

                }else {

                        $comentarios = $ordenes[$i]["comentarios"];

                }

                if ($ordenes[$i]["tiempoProceso"] == "00:00:00") {

                        $tiempoProceso = '00:00:00';

                }else {

                        $tiempoProceso = seg_a_dhms($hora_en_segundos);

                }
                /*DOS NUEVAS LINEAS*/
                if ($_SESSION["perfil"] =="Administrador General" || $_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Laura Delgado" || $_SESSION["nombre"] == "Jesus Serrano" || $_SESSION["nombre"] == "Ulises Tuxpan" || $_SESSION["nombre"] == "Luis Gerardo Morales" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "José Enrique Flores") {
                          
                        if($ordenes[$i]["status"] == 0 && $ordenes[$i]["estado"] == 0 && $ordenes[$i]["pendiente"] == 2){

                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenAlmacen' idOrdenAlmacen='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrdenAlmacen' id='editarOrdenAlmacen' disabled><i class='fa fa-pencil'></i>Editar Orden</button></div>"; 

                        }else if($ordenes[$i]["status"] == 2 && $ordenes[$i]["estado"] == 1 && $ordenes[$i]["pendiente"] == 0 && $ordenes[$i]["habilitado"] == 0){
                                
                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenAlmacen' idOrdenAlmacen='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrdenAlmacen' id='editarOrdenAlmacen' disabled><i class='fa fa-pencil'></i>Editar Orden</button></div>"; 
                        
                        }else if($ordenes[$i]["status"] < 2 && $ordenes[$i]["pendiente"] == 1){
                                
                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenAlmacen' idOrdenAlmacen='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrdenAlmacen' id='editarOrdenAlmacen'><i class='fa fa-pencil'></i>Editar Orden</button></div>"; 
                        
                        }else if($ordenes[$i]["status"] < 2 && $ordenes[$i]["pendiente"] == 0){
                                
                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenAlmacen' idOrdenAlmacen='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrdenAlmacen' id='editarOrdenAlmacen'><i class='fa fa-pencil'></i>Editar Orden</button></div>"; 
                        
                        }else if($ordenes[$i]["status"] == 2 && $ordenes[$i]["estado"] == 1 && $ordenes[$i]["pendiente"] == 0 && $ordenes[$i]["habilitado"] == 1){
                                
                                $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenAlmacen' idOrdenAlmacen='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrdenAlmacen' id='editarOrdenAlmacen'><i class='fa fa-pencil'></i>Editar Orden</button></div>"; 
                        
                        }
                       
                        

                }else{

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenAlmacen' idOrdenAlmacen='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrdenAlmacen' id='editarOrdenAlmacen' disabled><i class='fa fa-pencil'></i>Editar Orden</button></div>";
                        
                }   

                /*========HABILITAR FOLIO============*/

                if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Jesus Serrano" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez") {

                if ($ordenes[$i]["habilitado"]  != 0) {

                        $habilitado = "<div class='btn-group'><button class='btn btn-success btnHabilitarFolio' idOrden3='".$ordenes[$i]["id"]."' estadoOrden='0'><i class='fa fa-power-off'></i>Habilitado</button></div>";
                        
                }else {

                        $habilitado = "<div class='btn-group'><button class='btn btn-danger btnHabilitarFolio' idOrden3='".$ordenes[$i]["id"]."' estadoOrden='1'><i class='fa fa-power-off'></i>Deshabilitado</button></div>";

                }
                 
                        
                }else {

                        $habilitado = "<div class='btn-group'></div>";

                }
                if ($ordenes[$i]["nivelPartidas"] == "") {
                        
                        $nivelSumPartidas = "0.00%";
    
                }else {
    
                        $nivelSumPartidas = "".number_format($ordenes[$i]["nivelPartidas"],2)." %";
    
                }
                if ($ordenes[$i]["nivelUnidades"] == "") {
                        
                        $nivelSumUnidades = "0.00%";
    
                }else {
    
                        $nivelSumUnidades = "".number_format($ordenes[$i]["nivelUnidades"],2)." %";
    
                }
                if ($ordenes[$i]["nivelImportes"] == "") {
                        
                    $nivelSumCosto = "0.00%";

                }else {

                    $nivelSumCosto = "".number_format($ordenes[$i]["nivelImportes"],2)." %";

                }
                if($ordenes[$i]["folioTraspaso"] != ""){

                    $ordenTrabajo = "<div class='btn-group'><button class='btn btn-warning btnVerOrdenes' idOrden4='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalVerTraspasos'><i class='fa fa-eye'></i></button></div>";

                }else{

                    $ordenTrabajo = "Sin Órdenes";
                }
                switch ($ordenes[$i]["almacen"]) {
                        case 1:
                            $almacen = "ALMACÉN GENERAL";
                            break;
                        case 10:
                            $almacen = "OBSOLETOS";
                            break;
                        case 101:
                            $almacen = "LABORATORIO";
                            break;
                        case 1011:
                            $almacen = "ALMACÉN GENERAL CONSIGNACIÓN";
                            break;
                        case 102:
                            $almacen = "SAN MANUEL IGUALADO";
                            break;
                        case 104:
                            $almacen = "REFORMA IGUALADO";
                            break;
                        case 108:
                            $almacen = "SANTIAGO IGUALADO";
                            break;
                        case 109:
                            $almacen = "CAPU IGUALADO";
                            break;
                        case 12:
                            $almacen = "RUTA 2";
                            break;
                        case 13:
                            $almacen = "RUTA 3";
                            break;
                        case 14:
                            $almacen = "RUTA 1";
                            break;
                        case 2:
                            $almacen = "SAN MANUEL";
                            break;
                        case 4:
                            $almacen = "REFORMA";
                            break;
                        case 8:
                            $almacen = "SANTIAGO";
                            break;
                        case 9:
                            $almacen = "CAPU";
                            break;
                        case C1:
                            $almacen = "CONSIGNACIÓN 1";
                            break;
                    }

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
              "'.rtrim($ordenes[$i]["cliente"]).'",
              "<strong>'.$ordenes[$i]["serie"].'</strong>",
              "'.$ordenes[$i]["folio"].'",
              "'.$ordenes[$i]["suministrado"].'",
              "'.$ordenes[$i]["fechaRecepcion"].'",
              "'.$ordenes[$i]["fechaSuministro"].'",
              "'.$estatusOrden.'",
              "'.$ordenes[$i]["fechaTermino"].'",
              "'.$almacen.'",
              "'.$observaciones.'",
              "'.$ordenTrabajo.'",
              "'.$comentarios.'",
              "'.$ordenes[$i]["tiempoProceso"].'",
              "'.$ordenes[$i]["numeroPartidas"].'",
              "'.$ordenes[$i]["sumPartidas"].'",
              "'.$nivelSumPartidas.'",
              "'.$ordenes[$i]["numeroUnidades"].'",
              "'.$ordenes[$i]["sumUnidades"].'",
              "'.$nivelSumUnidades.'",
              "$ '.number_format($ordenes[$i]["importeTotal"],2).'",
              "$ '.number_format($ordenes[$i]["importeSurtido"],2).'",
              "'.$nivelSumCosto.'",
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
ACTIVAR TABLA DE ORDENES DE TRABAJO
=============================================*/ 
$activar = new TablaAlmacenRuta();
$activar -> mostrarTablas();
