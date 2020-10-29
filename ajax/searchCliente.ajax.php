<?php
if (isset($_GET['term'])){
	# conectare la base de datos
 include('../controladores/registroController.controlador.php');
$db_handle = new DBController();

$return_arr = array();

$sqlc = "SELECT  * FROM clientes WHERE  codigoCliente like '%".$_GET['term']."%' || nombreCliente like '%".$_GET['term']."%' LIMIT 5";

$faq = $db_handle->runQuery($sqlc);

foreach($faq as $k=>$v) {
/* Recuperar y almacenar en conjunto los resultados de la consulta.*/		
	$row_array['value'] = $faq[$k]['nombreCliente'];
	$row_array['codigoCliente']=$faq[$k]['codigoCliente'];
	$row_array['rfc']=$faq[$k]['rfc'];
	$row_array['nombreCliente']=$faq[$k]['nombreCliente'];
	$row_array['agenteVentas']=$faq[$k]['agenteVentas'];
	$row_array['diasCredito']=$faq[$k]['diasCredito'];
	$row_array['statusCliente']=$faq[$k]['statusCliente'];
	
	array_push($return_arr,$row_array);
}
/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);
}
?>