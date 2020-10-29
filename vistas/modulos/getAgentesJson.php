<?php
require_once "../../db_connectCot.php";

$sql = "SELECT id,codigo,nombre FROM agentes WHERE codigo LIKE '%".$_GET['q']."%' OR nombre LIKE '%".$_GET['q']."%'"; 
$result = $conn->query($sql);
$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id'=>$row['codigo'], 'text'=>$row['nombre']];
}
echo json_encode($json);