<?php
session_start();
require_once "../controladores/ordenTrabajo.controlador.php";
require_once "../modelos/ordenTrabajo.modelo.php";

class TablaOrdenesTrabajo{

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

    $ordenes = ControladorOrdenes::ctrMostrarOrdenesDeTrabajo($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($ordenes); $i++){

                $hora = $ordenes[$i]["tiempoProceso"];
                list($horas, $minutos, $segundos) = explode(':', $hora);
                $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;


                if($ordenes[$i]["statusCliente"] == "activado" || $ordenes[$i]["statusCliente"] == 1){

                        $statusCliente = "<button class='btn btn-success btn-xs'>Activado</button>";

                }else{

                        $statusCliente = "<button class='btn btn-danger btn-xs'>Desactivado</button>";

                } 

                if($ordenes[$i]["estado"] == "1"){

                    $estado = "<button class='btn btn-success btn-xs'>Orden Activa</button>";

                }else{

                    $estado = "<button class='btn btn-danger btn-xs Cancelado' idOrden2='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalMotivo' data-toggle='tooltip' data-placement='top' title='Ver motivos de cancelación'>Orden Cancelada</button>";

                }

                if($ordenes[$i]["tipoRuta"] == "Mostrador"){

                        $tipoRuta = 'Mostrador';

                }else if($ordenes[$i]["tipoRuta"] == "Foraneo"){

                        $tipoRuta = 'Foraneo';

                }else if ($ordenes[$i]["tipoRuta"] == "Local") {
                        $tipoRuta = 'Local';

                }else if ($ordenes[$i]["tipoRuta"] == "") {

                        $tipoRuta = 'Sin ruta asignada';
                }
                /*DOS NUEVAS LINEAS*/
                if ($ordenes[$i]["observaciones"] == "") {

                        $observaciones =  'Sin Observaciones';

                }else if ($ordenes[$i]["observaciones"] == "1"){

                        $observaciones= "Facturar Y Resurtir";

                }else if ($ordenes[$i]["observaciones"] == "2"){

                        $observaciones = "Facturar";

                }

                if ($ordenes[$i]["tiempoProceso"] == "00:00:00") {

                        $tiempoProceso = '00:00:00';

                }else {

                        $tiempoProceso = seg_a_dhms($hora_en_segundos);

                }
                /*DOS NUEVAS LINEAS*/
                if ($_SESSION["perfil"] =="Administrador General" || $_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Laura Delgado" || $_SESSION["nombre"] == "Jesus Serrano" || $_SESSION["nombre"] == "Ulises Tuxpan" || $_SESSION["nombre"] == "Luis Gerardo Morales" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "José Enrique Flores" && $ordenes[$i]["estado"] == 1) {

                        if($ordenes[$i]["concluido"] == 1 &&  $ordenes[$i]["habilitado"] == 0){

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden' disabled><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$ordenes[$i]["id"]."' folio='".$ordenes[$i]["folio"]."' serie='".$ordenes[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar Orden</button></div>"; 
                            
                        }else if($ordenes[$i]["concluido"] == 1 && $ordenes[$i]["habilitado"] == 1){

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden'><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$ordenes[$i]["id"]."' folio='".$ordenes[$i]["folio"]."' serie='".$ordenes[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar Orden</button></div>"; 
                            
                        }else if($ordenes[$i]["concluido"] == 0 && $ordenes[$i]["habilitado"] == 0){

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden'><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$ordenes[$i]["id"]."' folio='".$ordenes[$i]["folio"]."' serie='".$ordenes[$i]["serie"]."'><i class='fa fa-times'></i>Cancelar Orden</button></div>"; 
                            
                        }
   
                }else{

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' idOrden='".$ordenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarOrden' id='editarOrden' disabled><i class='fa fa-pencil'></i>Editar Orden</button><button class='btn btn-danger btnCancelarOrden' idOrden='".$ordenes[$i]["id"]."' folio='".$ordenes[$i]["folio"]."' serie='".$ordenes[$i]["serie"]."' disabled><i class='fa fa-times'></i>Cancelar Orden</button></div>";
                        
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


      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
              "'.$ordenes[$i]["creado"].'",
              "'.$ordenes[$i]["codigoCliente"].'",
              "'.rtrim($ordenes[$i]["nombreCliente"]).'",
              "'.$ordenes[$i]["canal"].'",
              "'.$ordenes[$i]["rfc"].'",
              "'.$ordenes[$i]["agenteVentas"].'",
              "'.$ordenes[$i]["diasCredito"].'",
              "'.$statusCliente.'",
              "'.$estado.'",
              "<strong>'.$ordenes[$i]["serie"].'</strong>",
              "'.$ordenes[$i]["folio"].'",
              "'.$ordenes[$i]["tipoPago"].'",
              "'.$ordenes[$i]["metodoPago"].'",
              "'.$ordenes[$i]["formaPago"].'",
              "'.$ordenes[$i]["numeroPartidas"].'",
              "'.$ordenes[$i]["numeroUnidades"].'",
              "$ '.number_format($ordenes[$i]["importe"],2).'",
              "'.$ordenes[$i]["fechaRecepcion"].'",
              "'.$ordenes[$i]["fechaElaboracion"].'",
              "'.$tipoRuta.'",
              "'.$observaciones.'",
              "'.$ordenes[$i]["comentarios"].'",
              "'.$tiempoProceso.'",
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
$activar = new TablaOrdenesTrabajo();
$activar -> mostrarTablas();



