<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
//Conexión a la base de datos
$conn = mysqli_connect("localhost","mat","matriz") or die("could not connect server");
mysqli_set_charset($conn, 'utf8');
mysqli_select_db($conn,"matriz") or die("could not connect database");

if(isset($_POST['login']))
{
	$idAgente=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['agente'])));
	
	$datos = mysqli_query($conn,"select * from `operadores` where `id`='$idAgente'");
	$login=mysqli_num_rows(mysqli_query($conn,"select * from `operadores` where `id`='$idAgente'"));
	if($login!=0)
	{

		while($fila=mysqli_fetch_array($datos)) {
			    
			    $datosUsuario = array('idAgente'=> $fila["id"],'nombre' => $fila["nombre"]);
			    echo json_encode($datosUsuario);
			    
			}
		
	}
	else
	{
		echo "fail";
	}
}
//LISTAR ENTREGAS PENDIENTES
if(isset($_POST['listaEntregasPendientes']))
{
	$idAgente =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idAgente'])));

	$listaEtregasPendientes = mysqli_query($conn,"SELECT ent.id,ent.fecha,ent.montoTotal,ent.fechaCreada,unid.unidad as unidad,op.nombre as operador,rut.tipoRuta FROM entregas as ent INNER JOIN unidades as unid ON ent.idUnidad = unid.id INNER JOIN operadores as op ON ent.idOperador = op.id  INNER JOIN rutas as rut ON ent.entrega = rut.id WHERE idOperador = '$idAgente' and ent.concluida = 0");


	if(mysqli_num_rows($listaEtregasPendientes) != 0)
	{
			$data = array();
			while($r = $listaEtregasPendientes->fetch_assoc()){
				$data[] = $r;
			}
			echo json_encode($data);

			}
	else
	{
		echo 'failed';
	}
	echo mysqli_error($conn);
}
//LISTAR ENTREGAS PENDIENTES
////LISTAR ENTREGAS FINALIZADAS
if(isset($_POST['listaEntregasFinalizadas']))
{
	$idAgente =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idAgente'])));

	$listaEntregasFinalizadas = mysqli_query($conn,"SELECT ent.id,ent.fecha,ent.montoTotal,ent.fechaCreada,unid.unidad as unidad,op.nombre as operador,rut.tipoRuta FROM entregas as ent INNER JOIN unidades as unid ON ent.idUnidad = unid.id INNER JOIN operadores as op ON ent.idOperador = op.id  INNER JOIN rutas as rut ON ent.entrega = rut.id WHERE idOperador = '$idAgente' and ent.concluida = 1");


	if(mysqli_num_rows($listaEntregasFinalizadas) != 0)
	{
			$data = array();
			while($r = $listaEntregasFinalizadas->fetch_assoc()){
				$data[] = $r;
			}
			echo json_encode($data);

			}
	else
	{
		echo 'failed';
	}
	echo mysqli_error($conn);
}
//LISTAR ENTREGAS FINALIZADAS
//////DETALLE ENTREGA

if(isset($_POST['detalleEntregaVista']))
{
	$idEntrega =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idEntregaDetalle'])));

	//$detalleEntregaVista = mysqli_query($conn,"SELECT fac.id,fac.idEntrega,facg.serie,facg.folio,facg.seriePedido,facg.folioPedido,facg.nombreCliente,facg.total,fac.horaInicio,fac.horaTermino from facturasentregas as fac INNER JOIN facturasGenerales as facg on fac.idFactura = facg.id WHERE fac.idEntrega = '$idEntrega'");
	$detalleEntregaVista = mysqli_query($conn,"SELECT fac.id,fac.idEntrega,facg.seriePedido,facg.folioPedido,facg.nombreCliente,eng.montoTotal as total,fac.horaInicio,fac.horaTermino from facturasentregas as fac INNER JOIN facturasGenerales as facg on fac.idFactura = facg.id  INNER JOIN entregas as eng on fac.idEntrega = eng.idEntrega WHERE fac.idEntrega = '$idEntrega' GROUP by facg.nombreCliente");

	if(mysqli_num_rows($detalleEntregaVista) != 0)
	{
			$data = array();
			$dataFac = array();
			$i=1;
			while($r = $detalleEntregaVista->fetch_assoc()){
				$i +=1;
				$cliente = $r["nombreCliente"];
				$dataFac = array();
				$listaFacturas = mysqli_query($conn,"SELECT id,serie,folio,seriePedido,folioPedido FROM `facturasgenerales` WHERE idEntrega = '$idEntrega' and nombreCliente = '$cliente'");
				while($fac = $listaFacturas->fetch_assoc()){
					
					$dataFac[] = $fac;
	
				}

				$data[] = array("id"=>$r["id"],"idEntrega"=>$r["idEntrega"],"nombreCliente"=>$r["nombreCliente"],"seriePedido"=>$r["seriePedido"],"total"=>$r["total"],"folioPedido"=>$r["folioPedido"],"horaInicio"=>$r["horaInicio"],"horaTermino"=>$r["horaTermino"],"facturas"=>[$dataFac]);
		
			}
			echo json_encode($data);

			}
	else
	{
		echo 'failed';
	}
	echo mysqli_error($conn);
}

function tiempoDecimal($time) {
    $timeArr = explode(':', $time);
    $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);
 
    return $decTime;
}
//DETALLE ENTREGA
////////ACTUALIZAR HORARIO ENTREGA
if(isset($_POST['actualizarHorarioEntrega']))
{	
	require_once "modelos/conexion.php";
	$idMovimiento =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idMovimiento'])));
	$idFactura =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idFactura'])));
	$idEntregaFactura =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idEntregaFactura'])));
	$horaInicio =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['horaInicio'])));
	$horaFinal =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['horaFinal'])));
	$latitud =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['latitud'])));
	$longitud =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['longitud'])));
	$direccion =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['ubicacion'])));

	$hora1 = new DateTime($horaInicio);//fecha inicial
	$hora2 = new DateTime($horaFinal);//fecha de cierre

	$intervalo = $hora1->diff($hora2);
	$horas = $intervalo->format('%H:%i:%S');
	$tiempo =  tiempoDecimal($horas);
    $horas = ($tiempo)/60;
	$identificadorFacturas = explode(",",$idFactura);

	foreach ($identificadorFacturas as $key => $value) {
		$totalFactura = mysqli_query($conn,"SELECT total,seriePedido,folioPedido  FROM `facturasgenerales` WHERE  `id` = '$value' and `idEntrega` = '$idEntregaFactura'");
		
		$totalFacturaCosto = 0;
	
		$fila = mysqli_fetch_row($totalFactura);
		$totalFacturaCosto = $fila[0];
		$seriePedido = $fila[1];
		$folioPedido = $fila[2];
		
	
		$actualizacion = mysqli_query($conn,"UPDATE `facturasentregas` set `lat` = '$latitud',`long` = '$longitud',direccion = '$direccion',horaInicio = '".$horaInicio."', horaTermino = '".$horaFinal."', horas = '$horas',subtotal = costoHora * '$horas',porcGasto = (costoHora * '$horas')/'$totalFacturaCosto',utilidad = (costoHora * '$horas')/'$totalFacturaCosto' - promedio,estatusEntrega = 'Entregada'   WHERE `idFactura` = '$value'") or die (mysqli_error($conn));
	    	/*ACTUALIZAR PROCESOS LOGISTICA*/
		date_default_timezone_set('America/Mexico_City');
		$fechaEntrega = date("Y-m-d H:i:s");
		$actualizarLogistica = mysqli_query($conn,"UPDATE `logistica` set estado = 1,concluido = 1,pendiente = 0,fechaEntregaCliente = '$fechaEntrega',status = 2 where serie = '$seriePedido' and idPedido = '$folioPedido'");
		$actualizarTiempoProceso = mysqli_query($conn,"UPDATE `logistica` set tiempoProceso = TIMEDIFF(fechaEntregaCliente,fechaRecepcion) where serie = '$seriePedido' and idPedido = '$folioPedido'");
		$tiempoProcesoEdicion = mysqli_query($conn,"UPDATE atencionaclientes INNER JOIN logistica ON atencionaclientes.folio = logistica.idPedido and atencionaclientes.serie = logistica.serie SET atencionaclientes.tiempoLogistica = logistica.tiempoProceso WHERE atencionaclientes.serie = '$seriePedido' and atencionaclientes.folio = '$folioPedido'");
		$tiempoSegundosEdicion = mysqli_query($conn,"UPDATE atencionaclientes set tiempoSec = TIME_TO_SEC(tiempoProceso), tiempoAlmacenSec = TIME_TO_SEC(tiempoAlmacen),tiempoLaboratorioSec = TIME_TO_SEC(tiempoLaboratorio), tiempoFacturacionSec = TIME_TO_SEC(tiempoFacturacion), tiempoComprasSec = TIME_TO_SEC(tiempoCompras), tiempoLogisticaSec = TIME_TO_SEC(tiempoLogistica) where serie = '$seriePedido' and folio = '$folioPedido'");
		$estatusLogisticaEdicion = mysqli_query($conn,"UPDATE atencionaclientes INNER JOIN logistica ON atencionaclientes.folio = logistica.idPedido and atencionaclientes.serie = logistica.serie SET atencionaclientes.statusLogistica = logistica.status WHERE atencionaclientes.serie = '$seriePedido' and atencionaclientes.folio = '$folioPedido'");
		$tiempoFinalEdicion = mysqli_query($conn,"UPDATE atencionaclientes SET tiempoFinal = atencionaclientes.tiempoSec+atencionaclientes.tiempoAlmacenSec+atencionaclientes.tiempoLaboratorioSec+atencionaclientes.tiempoComprasSec+atencionaclientes.tiempoFacturacionSec+atencionaclientes.tiempoLogisticaSec where atencionaclientes.serie = '$seriePedido' and atencionaclientes.folio = '$folioPedido'");
		$actualizarConcluido = mysqli_query($conn,"UPDATE atencionaclientes INNER JOIN logistica ON atencionaclientes.folio = logistica.idPedido and atencionaclientes.serie = logistica.serie SET atencionaclientes.concluido = logistica.concluido,atencionaclientes.cancelado = logistica.pendiente,atencionaclientes.estadoLogistica = logistica.estado WHERE atencionaclientes.serie = '$seriePedido' and atencionaclientes.folio = '$folioPedido'");
		/*ACTUALIZAR PROCESOS LOGISTICA*/
		
		
	}

	
	$totalPendientes = mysqli_query($conn,"SELECT COUNT(id) as pendientes FROM `facturasentregas` WHERE horaInicio = '00:00:00' and `idEntrega` = '$idEntregaFactura'");

	while($pendientes = $totalPendientes->fetch_assoc()){
		
		$pend = $pendientes["pendientes"];
	}
	$pendientesT = $pend;
	if ($pendientesT == 0) {

			$concluir = mysqli_query($conn,"UPDATE `entregas` set concluida = 1 WHERE `id` = '$idEntregaFactura'");
			if($actualizacion){

			echo "success";

			}else{

				echo "failed";
			}

	}else{

		if($actualizacion){

			echo "success";

		}else{

			echo "failed";
		}

	
	}
	


	
	
}
//ACTUALIZAR HORARIO ENTREGA

?>