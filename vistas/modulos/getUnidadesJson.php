<?php
require_once "../../db_connectCot.php";

$sql = "SELECT id,codigo,unidadMedida,gramaje,distribuidor,nombre FROM productos WHERE codigo = '".$_GET['q']."' OR unidadMedida = '".$_GET['q']."' LIMIT 2"; 
$result = $conn->query($sql);
$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id'=>$row['unidadMedida'], 'text'=>$row['unidadMedida']];
     $json[] = ['id'=>$row['gramaje'], 'text'=>$row['gramaje']];
}
echo json_encode($json);