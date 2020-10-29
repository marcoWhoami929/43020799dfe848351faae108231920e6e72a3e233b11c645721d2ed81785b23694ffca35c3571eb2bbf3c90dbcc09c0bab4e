<?php
session_start();

require_once "../controladores/facturacion.controlador.php";
require_once "../modelos/facturacion.modelo.php";

class TablaFacturacion{

  public function mostrarTablas(){  
     /*=============================================
    MOSTRAR LA TABLA DE facturacion
    =============================================*/ 
    function seg_a_dhms($seg) {
                $dias = floor($seg / 86400);
                $horas = floor(($seg - ($dias * 86400)) / 3600);
                $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
                $segundos = $seg % 60;
                return "$dias dias, $horas horas, $minutos minutos, $segundos segundos";
    }

    $facturacion = ControladorFacturacion::ctrMostrarFacturacion();

    $datosJson = '{
     
      "data": [ ';

    for($i = 0; $i < count($facturacion); $i++){

      $hora = $facturacion[$i]["tiempoProceso"];
      list($horas, $minutos, $segundos) = explode(':', $hora);
      $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;

      if ($facturacion[$i]["status"] == 0 && $facturacion[$i]["estado"] == 0 && $facturacion[$i]["facturaPendiente"] == 1 and $facturacion[$i]["formatoPedido"] == 0) {
                          
        $datosPendientes = "<button class='btn btn-info btn-xs'>Datos pendientes</button>";

      }else if ($facturacion[$i]["status"] == 0 && $facturacion[$i]["estado"] == 1 && $facturacion[$i]["facturaPendiente"] == 1 and $facturacion[$i]["formatoPedido"] == 0) {
                          
        $datosPendientes = "<button class='btn btn-warning btn-xs'>Datos pendientes</button>";

      }else if ($facturacion[$i]["status"] == 0 && $facturacion[$i]["estado"] == 1 && $facturacion[$i]["facturaPendiente"] == 0 and $facturacion[$i]["formatoPedido"] == 0) {
                          
        $datosPendientes = "<button class='btn btn-warning btn-xs'>Datos pendientes</button>";

      }else if ($facturacion[$i]["status"] == 1 && $facturacion[$i]["estado"] == 1 && $facturacion[$i]["facturaPendiente"] == 0 and $facturacion[$i]["formatoPedido"] == 0) {
                          
        $datosPendientes = "<button class='btn btn-success btn-xs'>Datos Completados</button>";

      }else if ($facturacion[$i]["status"] == 1 && $facturacion[$i]["estado"] == 1 && $facturacion[$i]["facturaPendiente"] == 0 and $facturacion[$i]["formatoPedido"] == 1) {
                          
        $datosPendientes = "<button class='btn btn-info btn-xs'>Entrega Con Pedido</button>";

      }else if ($facturacion[$i]["status"] == 0 && $facturacion[$i]["estado"] == 0 && $facturacion[$i]["facturaPendiente"] == 0 and $facturacion[$i]["formatoPedido"] == 0) {
                          
        $datosPendientes = "<button class='btn btn-danger btn-xs'>Pedido Cancelado</button>";

      }

      /*=====================ESTATUS DE PEDIDO==========*/
      if ($facturacion[$i]["estatusFactura"] == 1 && $facturacion[$i]["status"] == 1 and $facturacion[$i]["formatoPedido"] == 0) {

        $estatusFactura = "<button class='btn btn-success btn-xs'>Pedido Facturado</button>";                          
                          
      }else if ($facturacion[$i]["estatusFactura"] == 1 && $facturacion[$i]["status"] == 0 and $facturacion[$i]["formatoPedido"] == 0) {

        $estatusFactura = "<button class='btn btn-success btn-xs'>Pedido Facturado</button>";                          
                          
      }else if($facturacion[$i]["estatusFactura"] == 0 && $facturacion[$i]["status"] == 0 and $facturacion[$i]["formatoPedido"] == 0) {

        $estatusFactura = "<button class='btn btn-warning btn-xs'>Pedido Sin Facturar</button>";

      }else if($facturacion[$i]["estatusFactura"] == 1 && $facturacion[$i]["status"] == 1 and $facturacion[$i]["formatoPedido"] == 1) {

        $estatusFactura = "<button class='btn btn-info btn-xs'>Entrega Con Pedido</button>";

      }else if($facturacion[$i]["estatusFactura"] == 2 && $facturacion[$i]["status"] == 0 and $facturacion[$i]["formatoPedido"] == 0){

        $estatusFactura = "<button class='btn btn-danger btn-xs'>Factura Cancelada</button>";

      }
      /*=====================ESTATUS DE PEDIDO==========*/
      if ($facturacion[$i]["tipo"] == 0) {
                            
        $tipo = "Sin tipo";

      }else if ($facturacion[$i]["tipo"] == 1){

        $tipo = "Igualado";

      }else {
        
        $tipo = "Linea";

      }

      if($facturacion[$i]["statusCliente"] == "desactivado" || $facturacion[$i]["statusCliente"] == "0" ){

        $estatusCliente = "<button class='btn btn-danger btn-xs'>Inactivo</button>";

      }else if($facturacion[$i]["statusCliente"] == "activado" || $facturacion[$i]["statusCliente"] == "1"){

        $estatusCliente = "<button class='btn btn-info btn-xs'>Activo</button>";

      }
                            
      if ($facturacion[$i]["nivelSumCosto"] == "") {
                                
        $nivelSumCosto = "0 %";

      }else {

        $nivelSumCosto = "".number_format($facturacion[$i]["nivelSumCosto"],2)." %";

      }

      if ($facturacion[$i]["observaciones"] == "") {

        $observaciones = "Sin comentarios";
                                
      }else {

        $observaciones = "'".$facturacion[$i]["observaciones"]."'";

      }
      /*=====================OTROS DATOS================*/

                           /*DOS NUEVAS LINEAS*/
                            
      if ($_SESSION["perfil"]=="Administrador General" || $_SESSION["perfil"]=="Facturacion" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "Laura Delgado" || $_SESSION["nombre"] == "Mauricio Anaya" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Diego Ávila") {
                          
        if ($facturacion[$i]["status"] != 1 || $facturacion[$i]["habilitado"] != 2) {

          if ($facturacion[$i]["estado"] == 0 && $facturacion[$i]["status"] == 0 && $facturacion[$i]["facturaPendiente"] == 1) {

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarFactura' idFacturacion='".$facturacion[$i]["id"]."' idPedido='".$facturacion[$i]["idPedido"]."' seriePedido='".$facturacion[$i]["serie"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar</button></div>";  

          }else if ($facturacion[$i]["estado"] == 0 && $facturacion[$i]["status"] == 0 && $facturacion[$i]["facturaPendiente"] == 0) {

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarFactura' idFacturacion='".$facturacion[$i]["id"]."' idPedido='".$facturacion[$i]["idPedido"]."' seriePedido='".$facturacion[$i]["serie"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar</button></div>";

          }else{

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarFactura' idFacturacion='".$facturacion[$i]["id"]."' idPedido='".$facturacion[$i]["idPedido"]."' seriePedido='".$facturacion[$i]["serie"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar</button></div>";

          }
                          
        }else{

          $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarFactura' idFacturacion='".$facturacion[$i]["id"]."' idPedido='".$facturacion[$i]["idPedido"]."' seriePedido='".$facturacion[$i]["serie"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar</button></div>";

        }
                         
      }else{

        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarFactura' idFacturacion='".$facturacion[$i]["id"]."' idPedido='".$facturacion[$i]["idPedido"]."' seriePedido='".$facturacion[$i]["serie"]."' data-toggle='modal' data-target='#modalEditarPedido'><i class='fa fa-pencil'></i>Editar</button></div>";
      }
      
      $tiempoProceso = seg_a_dhms($hora_en_segundos);
                      /*=================VER FACTURAS ============*/
                      /*=================VER FACTURAS ============*/
      if ($facturacion[$i]["secciones"] != 0) {
                            
        $verFacturas = "<div class='btn-group'><button class='btn btn-info btnVerFacturas' idFacturacion2='".$facturacion[$i]["idPedido"]."' serieFacturacion='".$facturacion[$i]["serie"]."' data-toggle='modal' data-target='#modalVerFacturas'><i class='fa fa-eye'></i></button></div>"; 

      }else {

          $verFacturas = "<button class='btn btn-danger btn-xs'>Sin Facturas</button>";
          
      }
        /*=================VER FACTURAS ============*/
                      /*=================VER FACTURAS ============*/
                      /*========HABILITAR FOLIO============*/

      if ($_SESSION["nombre"] == "Marco Lopez" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["nombre"] == "Elsa Martinez" || $_SESSION["nombre"] == "Roberto Gutierrez") {

        if ($facturacion[$i]["habilitado"] != 0) {

          $habilitado = "<div class='btn-group'><button class='btn btn-success btnHabilitarFolio' idFacturacion3='".$facturacion[$i]["id"]."' estadoFactura='0'><i class='fa fa-power-off'></i>Habilitada</button></div>";
                                
        }else {

          $habilitado = "<div class='btn-group'><button class='btn btn-danger btnHabilitarFolio' idFacturacion3='".$facturacion[$i]["id"]."' estadoFactura='1'><i class='fa fa-power-off'></i>Deshabilitada</button></div>";

        }
                         
      }else {

        $habilitado = "<div class='btn-group'></div>";

      }
                               
      if ($facturacion[$i]["observacionesExtras"] == "") {

        $importante = "<div class=''><span class='label label-success'>SIN OBSERVACIONES</span></div>"; 
                          
      }else {

        $importante = "<div class='btn-group'><button class='animated wobble infinite btn btn-danger btnVerObservaciones' idFacturacion4='".$facturacion[$i]["id"]."' data-toggle='modal' data-target='#verObservaciones'><i class='fa fa-eye'></i> Ver</button></div>";
      
      }

      if ($facturacion[$i]["cliente"] == "" ) {

        $nombreCliente = $facturacion[$i]["nombreCliente"];
                                
      }else {

        $nombreCliente = $facturacion[$i]["nombreCliente"];

      }

      if ($facturacion[$i]["serieFactura"] == "") {
        
        $serieFactura = "<button class='btn btn-primary btn-xs'>Sin Datos</button>";
      
      }else{
        
        $serieFactura = $facturacion[$i]["serieFactura"];
      
      }

      if ($facturacion[$i]["folioFactura"] == "") {

        $folioFactura = "<button class='btn btn-primary btn-xs'>Sin Datos</button>";
      
      }else{
        
        $folioFactura = $facturacion[$i]["folioFactura"];
      
      }

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
              "'.rtrim($nombreCliente).'",
              "'.$facturacion[$i]["serie"].'",
              "'.$facturacion[$i]["idPedido"].'",
              "'.$facturacion[$i]["usuario"].'",
              "'.$serieFactura.'",
              "'.$folioFactura.'",
              "'.$datosPendientes.'",
              "'.$estatusFactura.'",
              "'.$facturacion[$i]["ordenCompra"].'",
              "'.$tipo.'",
              "'.$facturacion[$i]["cantidad"].'",
              "'.number_format($facturacion[$i]["importSurt"],2).'",
              "'.$estatusCliente.'",
              "'.$nivelSumCosto.'",
              "'.$importante.'",
              "'.$verFacturas.'",
              "'.$facturacion[$i]["fechaRecepcion"].'",
              "'.$facturacion[$i]["fechaEntrega"].'",
              "'.$observaciones.'",
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
ACTIVAR TABLA DE facturacion
=============================================*/ 
$activar = new TablaFacturacion();
$activar -> mostrarTablas();



