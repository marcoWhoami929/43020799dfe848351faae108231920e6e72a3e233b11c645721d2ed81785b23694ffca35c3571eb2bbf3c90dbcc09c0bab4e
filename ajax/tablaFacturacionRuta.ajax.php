<?php
session_start();
require_once "../controladores/facturacionRuta.controlador.php";
require_once "../modelos/facturacionRuta.modelo.php";

class TablaFacturacionRuta{

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

    $item2 = null;
    $valor2 = null;

    $ordenes = ControladorFacturacionRuta::ctrMostrarOrdenesDeTrabajo($item, $valor,$item2, $valor2);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($ordenes); $i++){

                $hora = $ordenes[$i]["tiempoProceso"];
                list($horas, $minutos, $segundos) = explode(':', $hora);
                $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;


                if ($ordenes[$i]["status"] == 0 && $ordenes[$i]["estado"] == 0 && $ordenes[$i]["facturaPendiente"] == 1) {
                          
                    $datosPendientes = "<button class='btn btn-info btn-xs'>Datos pendientes</button>";

                }else if ($ordenes[$i]["status"] == 0 && $ordenes[$i]["estado"] == 1 && $ordenes[$i]["facturaPendiente"] == 1) {
                  
                    $datosPendientes = "<button class='btn btn-warning btn-xs'>Datos pendientes</button>";

                }
                else if ($ordenes[$i]["status"] == 1 && $ordenes[$i]["estado"] == 1 && $ordenes[$i]["facturaPendiente"] == 0) {
                  
                    $datosPendientes = "<button class='btn btn-success btn-xs'>Datos Completados</button>";

                }
                else if ($ordenes[$i]["status"] == 0 && $ordenes[$i]["estado"] == 0 && $ordenes[$i]["facturaPendiente"] == 0) {
                  
                    $datosPendientes = "<button class='btn btn-danger btn-xs'>Factura Cancelada</button>";

                }

                /*=====================ESTATUS DE ORDEN==========*/
                if ($ordenes[$i]["estatusFactura"] == 1 && $ordenes[$i]["status"] == 1) {

                    $estatusFactura = "<button class='btn btn-success btn-xs'>Orden Facturada</button>";                          
                  
                }else if ($ordenes[$i]["estatusFactura"] == 1 && $ordenes[$i]["status"] == 0) {

                    $estatusFactura = "<button class='btn btn-success btn-xs'>Orden Facturada</button>";                          
                  
                }
                else if($ordenes[$i]["estatusFactura"] == 0 && $ordenes[$i]["status"] == 0) {

                    $estatusFactura = "<button class='btn btn-warning btn-xs'>Orden Sin Facturar</button>";

                }
                else if($ordenes[$i]["estatusFactura"] == 2 && $ordenes[$i]["status"] == 0){

                    $estatusFactura = "<button class='btn btn-danger btn-xs'>Factura Cancelada</button>";

                }

                if ($ordenes[$i]["nivelDeImporte"] == "") {
                        
                        $nivelSumCosto = "0.00 %";

                }else {

                        $nivelSumCosto = "".number_format($ordenes[$i]["nivelDeImporte"],2)." %";

                }

                if ($ordenes[$i]["comentarios"] == "") {

                        $comentarios = "Sin comentarios";
                        
                }else {

                        $comentarios = "".$ordenes[$i]["comentarios"]."";

                }
                if ($ordenes[$i]["observaciones"] == "") {

                        $observaciones = "Sin comentarios";
                    
                }else if ($ordenes[$i]["observaciones"] == "1"){

                        $observaciones = "Facturar y Resurtir";

                }else if ($ordenes[$i]["observaciones"] == "2"){

                    $observaciones = "Facturar";

                }
                /*=====================OTROS DATOS================*/

                if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"]=="Facturacion" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "Laura Delgado") {
                  
                    if ($ordenes[$i]["status"] != 1 || $ordenes[$i]["habilitado"] != 2) {

                        if ($ordenes[$i]["estado"] == 0 && $ordenes[$i]["status"] == 0 && $ordenes[$i]["facturaPendiente"] == 1 ) {

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenFacturacion' idOrdenFacturacion='".$ordenes[$i]["id"]."' folioOrdenFacturacion = '".$ordenes[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarOrdenFacturacion'><i class='fa fa-pencil'></i>Editar Orden</button></div>";  

                    }else if ($ordenes[$i]["estado"] == 0 && $ordenes[$i]["status"] == 0 && $ordenes[$i]["facturaPendiente"] == 0) {

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenFacturacion' idOrdenFacturacion='".$ordenes[$i]["id"]."' folioOrdenFacturacion = '".$ordenes[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarOrdenFacturacion' disabled><i class='fa fa-pencil'></i>Editar Orden</button></div>";  

                    }else if ($ordenes[$i]["estado"] == 1 && $ordenes[$i]["status"] == 1 && $ordenes[$i]["facturaPendiente"] == 0 && $ordenes[$i]["habilitado"] == 0) {

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenFacturacion' idOrdenFacturacion='".$ordenes[$i]["id"]."' folioOrdenFacturacion = '".$ordenes[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarOrdenFacturacion' disabled><i class='fa fa-pencil'></i>Editar Orden</button></div>";  

                    }else if ($ordenes[$i]["estado"] == 1 && $ordenes[$i]["status"] == 1 && $ordenes[$i]["facturaPendiente"] == 0 && $ordenes[$i]["habilitado"] == 1) {

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenFacturacion' idOrdenFacturacion='".$ordenes[$i]["id"]."' folioOrdenFacturacion = '".$ordenes[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarOrdenFacturacion'><i class='fa fa-pencil'></i>Editar Orden</button></div>";  

                    }else{

                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenFacturacion' idOrdenFacturacion='".$ordenes[$i]["id"]."' folioOrdenFacturacion = '".$ordenes[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarOrdenFacturacion'><i class='fa fa-pencil'></i>Editar Orden</button></div>"; 

                    }
                  
                }else{

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenFacturacion' idOrdenFacturacion='".$ordenes[$i]["id"]."' folioOrdenFacturacion = '".$ordenes[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarOrdenFacturacion' disabled><i class='fa fa-pencil'></i>Editar Orden</button></div>"; 

                }
                 
                }else{

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOrdenFacturacion' idOrdenFacturacion='".$ordenes[$i]["id"]."' folioOrdenFacturacion = '".$ordenes[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarOrdenFacturacion' disabled><i class='fa fa-pencil'></i>Editar Orden</button></div>";

                } 
                $tiempoProceso = seg_a_dhms($hora_en_segundos);
                /*========HABILITAR FOLIO============*/

                if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez") {

                    if ($ordenes[$i]["habilitado"] != 0) {

                        $habilitado = "<div class='btn-group'><button class='btn btn-success btnHabilitarFolio' idOrdenFacturacion3='".$ordenes[$i]["id"]."' estadoOrden='0'><i class='fa fa-power-off'></i>Habilitada</button></div>";
                        
                    }else {


                        $habilitado = "<div class='btn-group'><button class='btn btn-danger btnHabilitarFolio' idOrdenFacturacion3='".$ordenes[$i]["id"]."' estadoOrden='1'><i class='fa fa-power-off'></i>Deshabilitada</button></div>";

                }
       
                }else {

                        $habilitado = "<div class='btn-group'></div>";

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
                    case "C1":
                        $almacen = "CONSIGNACIÓN 1";
                        break;
                }

                if ($ordenes[$i]["secciones"] != "0" && $ordenes[$i]["secciones"] != "") {
                   $facturas = "<div class='btn-group'><button class='btn btn-warning btnVerFacturas' idFacturasSec='".$ordenes[$i]["folio"]."' data-toggle='modal' data-target='#modalFacturas'><i class='fa fa-eye'></i></button></div>";
                }else{
                    $facturas = "<button class='btn btn-info btn-xs'>Sin Facturas</button>";
                }

                if($ordenes[$i]["serieFactura"] == ""){

                    $serie = "FACD";

                }else{
                    $serie = $ordenes[$i]["serieFactura"];
                }
                $serie = $ordenes[$i]["serieFactura"];
                $importeFactura = $ordenes[$i]["importeSurtido"];
                $folio = $ordenes[$i]["folioFactura"];;
               

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson     .= '[
        "'.$ordenes[$i]["id"].'",
        "'.rtrim($ordenes[$i]["cliente"]).'",
        "<strong>'.$ordenes[$i]["serie"].'</strong>",
        "'.$ordenes[$i]["folio"].'",
        "'.$ordenes[$i]["usuario"].'",
        "'.$serie.'",
        "'.$folio.'",
        "'.$datosPendientes.'",
        "'.$estatusFactura.'",
        "$ '.number_format($importeFactura,2).'",
        "'.$nivelSumCosto.'",
        "'.$almacen.'",
        "'.$observaciones.'",
        "'.$facturas.'",
        "'.$ordenes[$i]["fechaRecepcion"].'",
        "'.$ordenes[$i]["fechaEntrega"].'",
        "'.$comentarios.'",
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
$activar = new TablaFacturacionRuta();
$activar -> mostrarTablas();
