<?php


include("../../modelos/conexion-api-server-pinturas.modelo.php");
if (isset($_GET['q'])) {
     $sWhere = "and CNOMBREAGENTE LIKE '%" . $_GET['q'] . "%' ";
} else {
     $sWhere = "";
}

$mostrarAgentes =  "SELECT CIDAGENTE,CCODIGOAGENTE,CNOMBREAGENTE FROM [adDEKKERLAB].[dbo].[admAgentes] WHERE CIDAGENTE != 0 and CTIPOAGENTE = 1 $sWhere";

$ejecutar = sqlsrv_query($conne, $mostrarAgentes);
$i = 0;

if (sqlsrv_has_rows($ejecutar) === false) {
     echo null;
} else {
     while ($value = sqlsrv_fetch_array($ejecutar)) {

          $agentes[$i] = array(
               "id" => $value["CCODIGOAGENTE"],
               "text" => $value["CNOMBREAGENTE"]
          );
          $i++;
     }
     echo json_encode($agentes);
}
