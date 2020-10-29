<?php
session_start();
require_once '../controladores/acumuladoMensual.controlador.php';
require_once '../modelos/acumuladoMensual.modelo.php';
extract($_GET);
switch ($case) {
    case 'grafica':
    if (!($cn = mysqli_connect("127.0.0.1", "mat", "matriz"))) {
            echo "Error conectando a la base de datos.";
            exit();
        }
        if (!mysqli_select_db($cn,"matriz")) {
            echo "Error seleccionando la base de datos.";
            exit();
        }
        mysqli_query($cn,"SET NAMES 'utf8'");

        $sql = "SELECT agenteVentas,estado, SUM(importeInicial) as importeInicial, SUM(importSurt) as importSurt, CASE WHEN SUBSTRING(fechaPedido, 4, 2) = 01 THEN 'ENERO'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 02 THEN 'FEBRERO'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 03 THEN 'MARZO'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 04 THEN 'ABRIL'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 05 THEN 'MAYO'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 06 THEN 'JUNIO'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 07 THEN 'JUNIO'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 08 THEN 'AGOSTO'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 09 THEN 'SEPTIEMBRE'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 10 THEN 'OCTUBRE'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 11 THEN 'NOVIEMBRE'
WHEN  SUBSTRING(fechaPedido, 4, 2) = 12 THEN 'DICIEMBRE'
ELSE '' END as fechaPedido FROM facturacion WHERE estado = 1 and agenteVentas = '".$nombreAgente."' GROUP by SUBSTRING(fechaPedido, 4, 2)";
        $res = mysqli_query($cn,$sql) or die(mysqli_error($cn));
        
        $arrayX = array();

        while ($dep_rows = mysqli_fetch_array($res)) {
            $arrayX[$dep_rows["fechaPedido"]][] = (int) ($dep_rows["importeInicial"]);
            $arrayX[$dep_rows["fechaPedido"]][] = (int) ($dep_rows["importSurt"]);
          
        }
        echo json_encode($arrayX);

        break;
    }
/*
        if (isset($_POST["agenteVentas"])) {
           
            $nombreAgente = $_GET["nombreAgente"];
            $item = "agenteVentas";
            $valor = $nombreAgente;

        $consulta = ControladorreportAcumuladoMensual::ctrMostrarAcumuladoAgenteImporteInicial($item, $valor);

            $mes1 = substr($consulta[0], 3,2);
            $mes2 = substr($consulta[1], 3,2);
            $mes3 = substr($consulta[2], 3,2);
            $arreglo = array($mes1 , $mes2 , $mes3);
   
            foreach ($arreglo as $key => $value) {
                $valor = $value;
                if ($valor == "01") {
                      $valor = "ENERO";
                }else if($valor == "02"){
                      $valor = "FEBRERO";
                }else if ($valor == "03") {
                      $valor = "MARZO";
                }else if ($valor == "04") {
                      $valor = "ABRIL";
                }else if ($valor == "05") {
                      $valor = "MAYO";
                }else if ($valor == "06") {
                      $valor = "JUNIO";
                }else if ($valor == "07") {
                      $valor = "JULIO";
                }else if ($valor == "08") {
                      $valor = "AGOSTO";
                }else if ($valor == "09") {
                      $valor = "SEPTIEMBRE";
                }else if ($valor == "10") {
                      $valor = "OCTUBRE";
                }else if ($valor == "11") {
                      $valor = "NOVIEMBRE";
                }else if ($valor == "12") {
                      $valor = "DICIEMBRE";
                }
                $resultado = "'".$valor."'".',';
                //echo $resultado;
                

            }
            

          }else if (isset($_GET["nombreAgente"])) {

            $nombreAgente = $_GET["nombreAgente"];
            $item = "agenteVentas";
            $valor = $nombreAgente;

            $consulta = ControladorreportAcumuladoMensual::ctrMostrarAcumuladoAgenteImporteSurtido($item, $valor);
            
            $valor1 = $consulta[0];
            $valor2 = $consulta[1];
            $valor3 = $consulta[2];
            $valor4 = $consulta[3];
            $valor5 = $consulta[4];
            
            //$arreglo = array('0' => $consulta[0] , '1' => $consulta[1] , '2' => $consulta[2]);

            echo $valor1.','.$valor2.','.$valor3.','.$valor4.','.$valor5;
            

          }else if (isset($_GET["nombreAgente"])) {

            $item = "agenteVentas";
            $valor = $nombreAgente;

            $consulta = ControladorreportAcumuladoMensual::ctrMostrarAcumuladoAgenteImporteInicial($item, $valor);
            
            $valor1 = $consulta[0];
            $valor2 = $consulta[1];
            $valor3 = $consulta[2];
            $valor4 = $consulta[3];
            $valor5 = $consulta[4];
            
            //$arreglo = array('0' => $consulta[0] , '1' => $consulta[1] , '2' => $consulta[2]);

            echo $valor1.','.$valor2.','.$valor3.','.$valor4.','.$valor5;
            
            

          }else {

            echo 0;


          }
       
}*/
?>