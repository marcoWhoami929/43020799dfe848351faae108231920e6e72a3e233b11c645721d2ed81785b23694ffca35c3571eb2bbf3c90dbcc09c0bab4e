<?php
error_reporting(0);

require_once "../controladores/entregas.controlador.php";
require_once "../modelos/entregas.modelo.php";

class TablaListaFacturasEntregas{

  public function mostrarTablas(){  
    

    $facturas = ControladorEntregas::ctrMostrarListaFacturas();


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($facturas); $i++){

       
        if ($facturas[$i]["procesoEntrega"] != 1) {
          $acciones = "<button type='button' class='btn btn-info btnAddFacturaEntrega' idFactura='".$facturas[$i]["id"]."' seriePedido = '".$facturas[$i]["seriePedido"]."' folioPedido = '".$facturas[$i]["folioPedido"]."' ><i class='fa fa-plus'></i></button>";
        }else{
          $acciones = "<button type='button' class='btn btn-warning btnDelFacturaEntrega' idFactura='".$facturas[$i]["id"]."'  seriePedido = '".$facturas[$i]["seriePedido"]."' folioPedido = '".$facturas[$i]["folioPedido"]."' ><i class='fa fa-minus'></i></button>";
        }
        

        $tipoCliente = "<select class='form-control' name='tipoEntrega' id='tipoEntrega'><option value='".$facturas[$i]["tipoCliente"]."'>".$facturas[$i]["tipoCliente"]."</option><option value='Mayoreo'>Mayoreo</option><option value='Industrial'>Industrial</option><option value='Tiendas'>Tiendas</option></select>";
            
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$facturas[$i]["seriePedido"].'",
              "'.$facturas[$i]["folioPedido"].'",
              "'.$facturas[$i]["serie"].'",
              "'.$facturas[$i]["folio"].'",
              "'.$facturas[$i]["nombreCliente"].'",
              "'.number_format($facturas[$i]["total"],2).'",
             "'.$tipoCliente.'",
              "'.$acciones.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE ENTREGAS
=============================================*/ 
$activar = new TablaListaFacturasEntregas();
$activar -> mostrarTablas();