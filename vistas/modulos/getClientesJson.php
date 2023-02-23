<?php


include("../../modelos/conexion-api-server-pinturas.modelo.php");
if (isset($_GET['q'])) {
     $sWhere = "and clien.CRAZONSOCIAL LIKE '%" . $_GET['q'] . "%' OR clien.CCODIGOCLIENTE LIKE '%" . $_GET['q'] . "%'";
} else {
     $sWhere = "";
}

$mostrarClientes =  "SELECT TOP(100) clien.CIDCLIENTEPROVEEDOR,clien.CCODIGOCLIENTE,clien.CIDCLIENTEPROVEEDOR,clien.CRFC,clien.CRAZONSOCIAL,agen.CNOMBREAGENTE
	FROM [adDEKKERLAB].[dbo].[admClientes] as clien LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen on clien.CIDAGENTEVENTA = agen.CIDAGENTE WHERE clien.CIDCLIENTEPROVEEDOR !=0 $sWhere";


$ejecutar = sqlsrv_query($conne, $mostrarClientes);
$i = 0;

if (sqlsrv_has_rows($ejecutar) === false) {
     echo null;
} else {
     while ($value = sqlsrv_fetch_array($ejecutar)) {

          $clientes[$i] = array(
               "id" => $value["CCODIGOCLIENTE"],
               "text" => $value["CRAZONSOCIAL"]
          );
          $i++;
     }
     echo json_encode($clientes);
}
