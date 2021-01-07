<?php
error_reporting(0);

require_once "../controladores/entregas.controlador.php";
require_once "../modelos/entregas.modelo.php";

class TablaEntregas{

  public function mostrarTablas(){  
    

    $entregas = ControladorEntregas::ctrMostrarEntregas();


    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($entregas); $i++){

      if ($entregas[$i]["concluida"] == 0) {
            
             $acciones = "<div class='btn-group'><button class='btn btn-warning btnEdicionEntrega' idEntrega='".$entregas[$i]["id"]."' data-toggle='modal' data-target='#modalEdicionEntrega'><i class='fa fa-pencil'></i>Editar</button></div>";  
      }else{

             $acciones = "<div class='btn-group'><button class='btn btn-info btnVisualizarEntrega' idEntrega='".$entregas[$i]["id"]."' data-toggle='modal' data-target='#modalDetalleEntrega'><i class='fa fa-pencil'></i>Ver</button></div>";  
      }
     

            
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$entregas[$i]["id"].'",
              "<strong>'.$entregas[$i]["fecha"].'</strong>",
              "'.$entregas[$i]["operador"].'",
              "'.$entregas[$i]["unidad"].'",
              "<strong>$'.number_format($entregas[$i]["montoTotal"],2).'</strong>",
              "'.$entregas[$i]["tipoRuta"].'",
              "'.$entregas[$i]["tipoEntrega"].'",
              "'.$entregas[$i]["fechaCreada"].'",
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
$activar = new TablaEntregas();
$activar -> mostrarTablas();