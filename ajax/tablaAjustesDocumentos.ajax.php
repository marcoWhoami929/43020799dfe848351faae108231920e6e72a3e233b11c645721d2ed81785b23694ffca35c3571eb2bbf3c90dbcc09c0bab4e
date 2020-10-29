<?php
error_reporting(0);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaDocumentosAjustados{

  public function mostrarTablas(){  

    switch ($_SESSION["nombre"]) {
      case 'Sucursal San Manuel':
        $serie = 'AJSM';
        break;
      case 'Sucursal Reforma':
        $serie = 'AJRF';
        break;
      case 'Sucursal Capu':
        $serie = 'AJCP';
        break;
      case 'Sucursal Santiago':
        $serie = 'AJSG';
        break;
      case 'Sucursal Las Torres':
        $serie = 'AJTR';
        break;
      
      default:
        # code...
        break;
    }
   
    $item = "serieAjuste";
    $valor = $serie;
    
    $documentosAjustados = ControladorFacturasTiendas::ctrMostrarListaAjustesRealizados($item, $valor);


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($documentosAjustados); $i++){

      $rutaArchivo = $documentosAjustados[$i]['rutaArchivo'];

      $pdf = "<button class='btn btn-success btnEmitirReciboAjuste' folioAjuste = '".$documentosAjustados[$i]["folioAjuste"]."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button>";
     
      $reporte = "<button type='button' class='btn btn-info btnDownloadAjuste' rutaArchivo = '".$rutaArchivo."'><i class='fa fa-file-text' aria-hidden='true'></i></button>&nbsp;&nbsp;".$pdf."";

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
                  "'.$documentosAjustados[$i]["id"].'",
                  "'.$documentosAjustados[$i]["serieAjuste"].'",
                  "'.$documentosAjustados[$i]["folioAjuste"].'",
                  "$ '.number_format($documentosAjustados[$i]["saldoAjustado"],2).'",
                  "'.$documentosAjustados[$i]["ajustador"].'",
                  "'.$documentosAjustados[$i]["fechaAjuste"].'",
                  "'.$reporte.'"],';

        }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE AJUSTE DE SALDOS
=============================================*/ 
$activar = new TablaDocumentosAjustados();
$activar -> mostrarTablas();



