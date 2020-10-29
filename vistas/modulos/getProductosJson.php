<?php
require_once "../../db_connectCot.php";

$sql = "SELECT id,codigo,descripcion,nombre FROM productos WHERE codigo LIKE '%".$_GET['q']."%' OR descripcion LIKE '%".$_GET['q']."%'
		LIMIT 7000"; 
$result = $conn->query($sql);
$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id'=>$row['codigo'], 'text'=>str_replace('pul', '"', $row['descripcion'])."  |   ".$row['codigo']];
}
echo json_encode($json);