<?php
error_reporting(0);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaCobrosTiendas{

  public function mostrarTablas(){  
   
    
    if($_GET["fechaCobro"] != "") {
        $item = "fechaFactura";
        $valor = $_GET["fechaCobro"];

    }else{

        $hoy = date("d/m/Y");
        $fecha = str_replace('/', '-', $hoy);
        $fechaFinal = date('Y-m-d', strtotime($fecha));
        $item = "fechaFactura";
        $valor = $fechaFinal;

    }

    $item2 = "concepto";
    if ($_GET["sucursalCobro"] != "") {
        $usuario = $_GET["sucursalCobro"];
    }else{
        $usuario = $_SESSION["nombre"];
    }
    
    
    switch ($usuario) {
      case 'Sucursal San Manuel':

        $valor2 = "FACTURA SAN MANUEL V 3.3";

        break;
      case 'Sucursal Capu':

        $valor2 = "FACTURA CAPU V 3.3";

        break;
      case 'Sucursal Reforma':

        $valor2 = "FACTURA REFORMA V 3.3";

        break;
      case 'Sucursal Las Torres':

        $valor2 = "FACTURA TORRES";

        break;
      case 'Sucursal Santiago':

        $valor2 = "FACTURA SANTIAGO V 3.3";

        break;
    }

    $cobrosTiendas = ControladorFacturasTiendas::ctrMostrarCobrosDiarioTiendas($item, $valor,$item2, $valor2);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($cobrosTiendas); $i++){
    
        $punteroSig = $i+1;
        $punteroAnt = $i-1;

        $nodoActual = $cobrosTiendas[$i]["nombreCliente"];
        $nodoSiguiente = $cobrosTiendas[$punteroSig]["nombreCliente"];
        $nodoAnterior = $cobrosTiendas[$punteroAnt]["nombreCliente"];
    

        if($nodoActual == $nodoSiguiente){
         
          $nombreCliente = $cobrosTiendas[$punteroSig]["nombreCliente"];
          $efectivo =  $cobrosTiendas[$punteroSig]["efectivo"] + $cobrosTiendas[$i]["efectivo"];
          $tarjetaDebito = $cobrosTiendas[$punteroSig]["tarjetaDebito"] + $cobrosTiendas[$i]["tarjetaDebito"];;
          $tarjetaCredito = $cobrosTiendas[$punteroSig]["tarjetaCredito"] + $cobrosTiendas[$i]["tarjetaCredito"];;
          $transferenciaElectronica = $cobrosTiendas[$punteroSig]["transferenciaElectronica"] + $cobrosTiendas[$i]["transferenciaElectronica"];
          $chequeNominativo = $cobrosTiendas[$punteroSig]["chequeNominativo"] + $cobrosTiendas[$i]["chequeNominativo"];
          $credito = $cobrosTiendas[$punteroSig]["credito"] + $cobrosTiendas[$i]["credito"];
          $porDefinir = $cobrosTiendas[$punteroSig]["porDefinir"] + $cobrosTiendas[$i]["porDefinir"];
          $totalGeneral= $cobrosTiendas[$punteroSig]["totalGeneral"] + $cobrosTiendas[$i]["totalGeneral"];

        }
        else if($nodoActual == $nodoAnterior){

          $nombreCliente = "";
          $efectivo = "";
          $tarjetaDebito = "";
          $tarjetaCredito = "";
          $transferenciaElectronica = "";
          $chequeNominativo = "";
          $credito = "";
          $porDefinir= "";
          $totalGeneral= "";

        }else{

          $nombreCliente = $cobrosTiendas[$i]["nombreCliente"];
          $efectivo = $cobrosTiendas[$i]["efectivo"];
          $tarjetaDebito = $cobrosTiendas[$i]["tarjetaDebito"];
          $tarjetaCredito = $cobrosTiendas[$i]["tarjetaCredito"];
          $transferenciaElectronica = $cobrosTiendas[$i]["transferenciaElectronica"];
          $chequeNominativo = $cobrosTiendas[$i]["chequeNominativo"];
          $credito = $cobrosTiendas[$i]["credito"];
          $porDefinir= $cobrosTiendas[$i]["porDefinir"];
          $totalGeneral= $cobrosTiendas[$i]["totalGeneral"];

        }

    
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      if ($nombreCliente == "") {
        

      }else{
        $datosJson   .= '[
            
                  "'.$nombreCliente.'",
                  "$ '.number_format($efectivo,2).'",
                  "$ '.number_format($tarjetaDebito,2).'",
                  "$ '.number_format($tarjetaCredito,2).'",
                  "$ '.number_format($transferenciaElectronica,2).'",
                  "$ '.number_format($chequeNominativo,2).'",
                  "$ '.number_format($credito,2).'",
                  "$ '.number_format($porDefinir,2).'",
                  "$ '.number_format($totalGeneral,2).'"],';
      }
      
      

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
$activar = new TablaCobrosTiendas();
$activar -> mostrarTablas();



