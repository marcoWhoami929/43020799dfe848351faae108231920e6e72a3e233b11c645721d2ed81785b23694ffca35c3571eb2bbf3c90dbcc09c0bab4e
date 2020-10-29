<?php
session_start();
error_reporting(E_ALL);
require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";

class TablaReporteCotizaciones{

	public function mostrarTablas(){	
    /*=============================================
    MOSTRAR LA TABLA DE cotizaciones
    =============================================*/
    if ($_GET["codigoProd"] == "" and $_GET["codigoCli"] == "" and $_GET["fechaInicio"] =="" and $_GET["fechaFinal"] == "") {


      $item = null;
      $valor = null;

      $cotizaciones = ControladorCotizaciones::ctrMostrarReporteCotizacion($item, $valor);
     //var_dump($cotizaciones);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($cotizaciones); $i++){

      $serieFolio = $cotizaciones[$i]["serie"].$cotizaciones[$i]["folio"];
      $importe = $cotizaciones[$i]["total"] - $cotizaciones[$i]["iva"];

      $plantilla = "";

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$cotizaciones[$i]["codigoProducto"].'",
              "'.str_replace('"', '', $cotizaciones[$i]["nombreProducto"]).'",
              "'.$cotizaciones[$i]["codigoCliente"].'",
              "'.$cotizaciones[$i]["nombreCliente"].'",
              "'.$cotizaciones[$i]["fechaCotizacion"].'",
              "'.$serieFolio.'",
              "'.$cotizaciones[$i]["diasCredito"].'",
              "Cotización Matriz",
              "'.$cotizaciones[$i]["moneda"].'",
              "'.$cotizaciones[$i]["precio"].'",
              "'.$cotizaciones[$i]["cantidad"].'",
              "'.$cotizaciones[$i]["porcentajeDescuento"].'",
              "'.$cotizaciones[$i]["descuento"].'",
              "'.$cotizaciones[$i]["porcentajeDescuento2"].'",
              "'.$cotizaciones[$i]["descuento2"].'",
              "'.$importe.'",
              "'.$cotizaciones[$i]["iva"].'",
              "'.$cotizaciones[$i]["total"].'",
              "'.$plantilla.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 
    echo $datosJson;
        
    }else{
       if ($_GET['codigoProd'] == "") {
    
      $item = null;
      $valor = null;

      $cotizaciones = ControladorCotizaciones::ctrMostrarReporteCotizacion($item, $valor);
     //var_dump($cotizaciones);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($cotizaciones); $i++){

      $serieFolio = $cotizaciones[$i]["serie"].$cotizaciones[$i]["folio"];
      $importe = $cotizaciones[$i]["total"] - $cotizaciones[$i]["iva"];

      $plantilla = "";

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$cotizaciones[$i]["codigoProducto"].'",
              "'.str_replace('"', '', $cotizaciones[$i]["nombreProducto"]).'",
              "'.$cotizaciones[$i]["codigoCliente"].'",
              "'.$cotizaciones[$i]["nombreCliente"].'",
              "'.$cotizaciones[$i]["fechaCotizacion"].'",
              "'.$serieFolio.'",
              "'.$cotizaciones[$i]["diasCredito"].'",
              "Cotización Matriz",
              "'.$cotizaciones[$i]["moneda"].'",
              "'.$cotizaciones[$i]["precio"].'",
              "'.$cotizaciones[$i]["cantidad"].'",
              "'.$cotizaciones[$i]["porcentajeDescuento"].'",
              "'.$cotizaciones[$i]["descuento"].'",
              "'.$cotizaciones[$i]["porcentajeDescuento2"].'",
              "'.$cotizaciones[$i]["descuento2"].'",
              "'.$importe.'",
              "'.$cotizaciones[$i]["iva"].'",
              "'.$cotizaciones[$i]["total"].'",
              "'.$plantilla.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 
    

   
    }else {

      $codigoProd = $_GET['codigoProd'];
      $item = 'codigoProducto';
      $valor = $codigoProd;

      $cotizaciones = ControladorCotizaciones::ctrMostrarReporteCotizacion($item, $valor);
     //var_dump($cotizaciones);

      $datosJson = '{
       
      "data": [ ';

      for($i = 0; $i < count($cotizaciones); $i++){

        $serieFolio = $cotizaciones[$i]["serie"].$cotizaciones[$i]["folio"];
        $importe = $cotizaciones[$i]["total"] - $cotizaciones[$i]["iva"];

        $plantilla = "<a class='btn' href='vistas/modulos/reportes.php?reporteCotizacionesFiltro=cotizaciones&codigoProducto=".$cotizaciones[$i]["codigoProducto"]."'><i class='fa fa-file-excel-o fa-2x' aria-hidden='true'></i></a>";
        /*=============================================
        DEVOLVER DATOS JSON
        =============================================*/
        
        $datosJson   .= '[
                "'.$cotizaciones[$i]["codigoProducto"].'",
                "'.str_replace('"', '', $cotizaciones[$i]["nombreProducto"]).'",
                "'.$cotizaciones[$i]["codigoCliente"].'",
                "'.$cotizaciones[$i]["nombreCliente"].'",
                "'.$cotizaciones[$i]["fechaCotizacion"].'",
                "'.$serieFolio.'",
                "'.$cotizaciones[$i]["diasCredito"].'",
                "Cotización Matriz",
                "'.$cotizaciones[$i]["moneda"].'",
                "'.$cotizaciones[$i]["precio"].'",
                "'.$cotizaciones[$i]["cantidad"].'",
                "'.$cotizaciones[$i]["porcentajeDescuento"].'",
                "'.$cotizaciones[$i]["descuento"].'",
                "'.$cotizaciones[$i]["porcentajeDescuento2"].'",
                "'.$cotizaciones[$i]["descuento2"].'",
                "'.$importe.'",
                "'.$cotizaciones[$i]["iva"].'",
                "'.$cotizaciones[$i]["total"].'",
                "'.$plantilla.'"],';

      }

      $datosJson = substr($datosJson, 0, -1);

      $datosJson.=  ']
          
      }'; 

      echo $datosJson;

     

    }if ($_GET['codigoCli'] == "") {


            $item = null;
            $valor = null;

            $cotizaciones = ControladorCotizaciones::ctrMostrarReporteCotizacion($item, $valor);
          //var_dump($cotizaciones);

          $datosJson = '{
           
          "data": [ ';

          for($i = 0; $i < count($cotizaciones); $i++){

            $serieFolio = $cotizaciones[$i]["serie"].$cotizaciones[$i]["folio"];
            $importe = $cotizaciones[$i]["total"] - $cotizaciones[$i]["iva"];

            $plantilla = "";
            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/
            
            $datosJson   .= '[
                    "'.$cotizaciones[$i]["codigoProducto"].'",
                    "'.str_replace('"', '', $cotizaciones[$i]["nombreProducto"]).'",
                    "'.$cotizaciones[$i]["codigoCliente"].'",
                    "'.$cotizaciones[$i]["nombreCliente"].'",
                    "'.$cotizaciones[$i]["fechaCotizacion"].'",
                    "'.$serieFolio.'",
                    "'.$cotizaciones[$i]["diasCredito"].'",
                    "Cotización Matriz",
                    "'.$cotizaciones[$i]["moneda"].'",
                    "'.$cotizaciones[$i]["precio"].'",
                    "'.$cotizaciones[$i]["cantidad"].'",
                    "'.$cotizaciones[$i]["porcentajeDescuento"].'",
                    "'.$cotizaciones[$i]["descuento"].'",
                    "'.$cotizaciones[$i]["porcentajeDescuento2"].'",
                    "'.$cotizaciones[$i]["descuento2"].'",
                    "'.$importe.'",
                    "'.$cotizaciones[$i]["iva"].'",
                    "'.$cotizaciones[$i]["total"].'",
                    "'.$plantilla.'"],';

          }

          $datosJson = substr($datosJson, 0, -1);

          $datosJson.=  ']
              
          }'; 

     

    }else{

      $codigoCli = $_GET['codigoCli'];
      $item = 'codigoCliente';
      $valor = $codigoCli;

            $cotizaciones = ControladorCotizaciones::ctrMostrarReporteCotizacion($item, $valor);
          //var_dump($cotizaciones);

          $datosJson = '{
           
          "data": [ ';

          for($i = 0; $i < count($cotizaciones); $i++){

            $serieFolio = $cotizaciones[$i]["serie"].$cotizaciones[$i]["folio"];
            $importe = $cotizaciones[$i]["total"] - $cotizaciones[$i]["iva"];

            $plantilla = "<a class='btn' href='vistas/modulos/reportes.php?reporteCotizacionesFiltro=cotizaciones&codigoCliente=".$cotizaciones[$i]["codigoCliente"]."'><i class='fa fa-file-excel-o fa-2x' aria-hidden='true'></i></a>";
            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/
            
            $datosJson   .= '[
                    "'.$cotizaciones[$i]["codigoProducto"].'",
                    "'.str_replace('"', '', $cotizaciones[$i]["nombreProducto"]).'",
                    "'.$cotizaciones[$i]["codigoCliente"].'",
                    "'.$cotizaciones[$i]["nombreCliente"].'",
                    "'.$cotizaciones[$i]["fechaCotizacion"].'",
                    "'.$serieFolio.'",
                    "'.$cotizaciones[$i]["diasCredito"].'",
                    "Cotización Matriz",
                    "'.$cotizaciones[$i]["moneda"].'",
                    "'.$cotizaciones[$i]["precio"].'",
                    "'.$cotizaciones[$i]["cantidad"].'",
                    "'.$cotizaciones[$i]["porcentajeDescuento"].'",
                    "'.$cotizaciones[$i]["descuento"].'",
                    "'.$cotizaciones[$i]["porcentajeDescuento2"].'",
                    "'.$cotizaciones[$i]["descuento2"].'",
                    "'.$importe.'",
                    "'.$cotizaciones[$i]["iva"].'",
                    "'.$cotizaciones[$i]["total"].'",
                    "'.$plantilla.'"],';

          }

          $datosJson = substr($datosJson, 0, -1);

          $datosJson.=  ']
              
          }'; 

          echo $datosJson;
     
    }if ($_GET['fechaInicio'] == "" and $_GET['fechaFinal'] == "") {
    
      $item = null;
      $valor = null;
      $item2 = null;
      $valor2 = null;


      $cotizaciones = ControladorCotizaciones::ctrMostrarReporteCotizacionFecha($item, $valor, $item2, $valor2);
     //var_dump($cotizaciones);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($cotizaciones); $i++){

      $serieFolio = $cotizaciones[$i]["serie"].$cotizaciones[$i]["folio"];
      $importe = $cotizaciones[$i]["total"] - $cotizaciones[$i]["iva"];

      $plantilla = "";

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$cotizaciones[$i]["codigoProducto"].'",
              "'.str_replace('"', '', $cotizaciones[$i]["nombreProducto"]).'",
              "'.$cotizaciones[$i]["codigoCliente"].'",
              "'.$cotizaciones[$i]["nombreCliente"].'",
              "'.$cotizaciones[$i]["fechaCotizacion"].'",
              "'.$serieFolio.'",
              "'.$cotizaciones[$i]["diasCredito"].'",
              "Cotización Matriz",
              "'.$cotizaciones[$i]["moneda"].'",
              "'.$cotizaciones[$i]["precio"].'",
              "'.$cotizaciones[$i]["cantidad"].'",
              "'.$cotizaciones[$i]["porcentajeDescuento"].'",
              "'.$cotizaciones[$i]["descuento"].'",
              "'.$cotizaciones[$i]["porcentajeDescuento2"].'",
              "'.$cotizaciones[$i]["descuento2"].'",
              "'.$importe.'",
              "'.$cotizaciones[$i]["iva"].'",
              "'.$cotizaciones[$i]["total"].'",
              "'.$plantilla.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 
    
    }else{
        $fechaInicio =  $_GET['fechaInicio'];

        $fechaInicioSeg = 0;
        $fechaInicioSeg = explode("/", $fechaInicio);
        $diaIni =   $fechaInicioSeg[0];
        $mesIni =   $fechaInicioSeg[1];
        $anioIni =  $fechaInicioSeg[2];
        $fechaInicioSep = $anioIni."-".$mesIni."-".$diaIni;


        $fechaFinal =   $_GET['fechaFinal'];

        $fechaFinall = 0;

        $fechaFinall =  explode("/", $fechaFinal);
        $dia =  $fechaFinall[0];
        $mes =  $fechaFinall[1];
        $anio =  $fechaFinall[2];

        $fechaFinalSep = $anio."-".$mes."-".$dia;
        //var_dump($fechaFinalSep);
        //var_dump($fechaInicioSep);

        //var_dump($fechaInicio);
        //var_dump($fechaFinal);
        $valor = $fechaInicioSep;
        $valor2 = $fechaFinalSep;

          $cotizaciones = ControladorCotizaciones::ctrMostrarReporteCotizacionFecha($valor, $valor2);
          //var_dump($cotizaciones);

          $datosJson = '{
           
          "data": [ ';

          for($i = 0; $i < count($cotizaciones); $i++){

            $serieFolio = $cotizaciones[$i]["serie"].$cotizaciones[$i]["folio"];
            $importe = $cotizaciones[$i]["total"] - $cotizaciones[$i]["iva"];

            $plantilla = "<a class='btn' href='vistas/modulos/reportes.php?reporteCotizacionesFiltro=cotizaciones&fechaInicio=".$fechaInicioSep."&fechaFinal=".$fechaFinalSep."'><i class='fa fa-file-excel-o fa-2x' aria-hidden='true'></i></a>";
            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/
            
            $datosJson   .= '[
                    "'.$cotizaciones[$i]["codigoProducto"].'",
                    "'.str_replace('"', '', $cotizaciones[$i]["nombreProducto"]).'",
                    "'.$cotizaciones[$i]["codigoCliente"].'",
                    "'.$cotizaciones[$i]["nombreCliente"].'",
                    "'.$cotizaciones[$i]["fechaCotizacion"].'",
                    "'.$serieFolio.'",
                    "'.$cotizaciones[$i]["diasCredito"].'",
                    "Cotización Matriz",  
                    "'.$cotizaciones[$i]["moneda"].'",
                    "'.$cotizaciones[$i]["precio"].'",
                    "'.$cotizaciones[$i]["cantidad"].'",
                    "'.$cotizaciones[$i]["porcentajeDescuento"].'",
                    "'.$cotizaciones[$i]["descuento"].'",
                    "'.$cotizaciones[$i]["porcentajeDescuento2"].'",
                    "'.$cotizaciones[$i]["descuento2"].'",
                    "'.$importe.'",
                    "'.$cotizaciones[$i]["iva"].'",
                    "'.$cotizaciones[$i]["total"].'",
                    "'.$plantilla.'"],';

          }

          $datosJson = substr($datosJson, 0, -1);

          $datosJson.=  ']
              
          }'; 

          echo $datosJson;
     

    }

    }
  }
}
/*=============================================
ACTIVAR TABLA DE cotizaciones
=============================================*/ 
$activar = new TablaReporteCotizaciones();
$activar -> mostrarTablas();