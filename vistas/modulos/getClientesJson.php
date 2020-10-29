<?php
require_once "../../db_connectCot.php";

$sql = "SELECT id,codigoCliente,nombreCliente FROM clientes WHERE nombreCliente LIKE '%".$_GET['q']."%' OR codigoCliente LIKE '%".$_GET['q']."%'
		LIMIT 7000"; 
$result = $conn->query($sql);
$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id'=>$row['codigoCliente'], 'text'=>$row['nombreCliente']];
}
echo json_encode($json);