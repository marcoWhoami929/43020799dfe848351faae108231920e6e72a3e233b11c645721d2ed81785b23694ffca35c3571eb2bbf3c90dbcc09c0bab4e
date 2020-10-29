<?php
require_once "../../db_connectCot.php";

$sql = "SELECT id,base,cubeta,galon,litro,quiml,dosml,unoml,distribuidor FROM productos WHERE codigo = '".$_GET['q']."' LIMIT 10"; 
$result = $conn->query($sql);
$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id'=>$row['base'], 'text'=> 'Base' ."  |   ".$row['base']];
     $json[] = ['id'=>$row['cubeta'], 'text'=> 'Cubeta'."  |   ".$row['cubeta']];
     $json[] = ['id'=>$row['galon'], 'text'=> 'Galón' ."  |   ".$row['galon']];
     $json[] = ['id'=>$row['litro'], 'text'=> 'Litro'."  |   ".$row['litro']];
     $json[] = ['id'=>$row['quiml'], 'text'=> '500ml' ."  |   ".$row['quiml']];
     $json[] = ['id'=>$row['dosml'], 'text'=> '250ml'."  |   ".$row['dosml']];
     $json[] = ['id'=>$row['unoml'], 'text'=> '125ml' ."  |   ".$row['unoml']];
     $json[] = ['id'=>$row['distribuidor'], 'text'=> 'Distribuidor'."  |   ".$row['distribuidor']];
}
echo json_encode($json);