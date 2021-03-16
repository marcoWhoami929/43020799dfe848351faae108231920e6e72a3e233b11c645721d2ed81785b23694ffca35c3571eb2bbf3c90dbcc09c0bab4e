<?php

include_once '../modelos/conexion2.php';
$objeto = new Conexion();
$conexion = $objeto->conectar();
header("Access-Control-Allow-Origin: *");


$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_GET["opcion"])) ? $_GET["opcion"] : '';

switch($opcion){
    case 1:

    	 $consulta = "SELECT * FROM cotizaciones where folio = 776";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                     
                    
        break;
   
}


print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;
