<?php

require_once "../controladores/atencion.controlador.php";
require_once "../modelos/atencion.modelo.php";


class AjaxAtencion{


	/*=============================================
	EDITAR PEDIDO
	=============================================*/	

	public $idPedido;

	public function ajaxEditarPedido(){

		$item = "id";
		$valor = $this->idPedido;

		$respuesta = ControladorAtencion::ctrMostrarAtencion($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER MOTIVOS DE CANCELACION
	=============================================*/	
	public $idPedido2;

	public function ajaxVerCancelacion(){

		$item = "id";
		$valor = $this->idPedido2;

		$respuesta =  ControladorAtencion::ctrMostrarAtencion($item, $valor);

		echo json_encode($respuesta);
	}
	/*=============================================
	HABILITAR PEDIDO
	=============================================*/	

	public $activarPedido;
	public $activarId;

	public function ajaxActivarPedido(){

		$tabla = "atencionaclientes";

		$item1 = "habilitado";
		$valor1 = $this->activarPedido;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloAtencion::mdlHabilitarPedido($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}
	public $fechaActual;
	public $empresa;
	public function ajaxObtenerPedidosNuevos(){

			switch ($this->empresa) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				break;
				case 'Flex':
					include("../modelos/conexion-api-server-flex.modelo.php");
				break;
				
			}

			$item = "CFECHA";
			$valor = $this->fechaActual;
			//$valor = '2021-03-06';

			/*
			SELECT admDoc.CIDDOCUMENTO,admCli.CCODIGOCLIENTE,admDoc.CRAZONSOCIAL,admDoc.CRFC,admAge.CNOMBREAGENTE,admAge.CCODIGOAGENTE,admCli.CDIASCREDITOCLIENTE,admCli.CESTATUS,admCli.CLIMITECREDITOCLIENTE,admCli.CBANEXCEDERCREDITO,admCli.CLIMDOCTOS,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO, COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CTOTALUNIDADES,admDoc.CTOTAL,admDoc.CFECHA,admDoc.CTIMESTAMP,admDoc.CMETODOPAG,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)) AS COBSERVACIONES,admDoc.CCANCELADO,admDoc.CIDCLIENTEPROVEEDOR,admDoc.CUSUARIO FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR LEFT JOIN dbo.admAgentes as admAge ON admAge.CIDAGENTE = admDoc.CIDAGENTE  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO  where admDoc.CFECHA >= '2021-01-25' AND admDoc.CFECHA <= '2021-02-06' and admDoc.CSERIEDOCUMENTO IN ('PECD','PEND','PEPB','PEBB') GROUP BY admDoc.CIDDOCUMENTO,admCli.CCODIGOCLIENTE,admDoc.CRAZONSOCIAL,admDoc.CRFC,admAge.CNOMBREAGENTE,admAge.CCODIGOAGENTE,admCli.CDIASCREDITOCLIENTE,admCli.CESTATUS,admCli.CLIMITECREDITOCLIENTE,admCli.CBANEXCEDERCREDITO,admCli.CLIMDOCTOS,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTALUNIDADES,admDoc.CTOTAL,admDoc.CFECHA,admDoc.CTIMESTAMP,admDoc.CMETODOPAG,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)),admDoc.CCANCELADO,admDoc.CIDCLIENTEPROVEEDOR,admDoc.CUSUARIO
			
			admDoc.CFECHA = '".$valor."'

			*/
			$mostrarPedidos = "SELECT admDoc.CIDDOCUMENTO,admCli.CCODIGOCLIENTE,admDoc.CRAZONSOCIAL,admDoc.CRFC,admAge.CNOMBREAGENTE,admAge.CCODIGOAGENTE,admCli.CDIASCREDITOCLIENTE,admCli.CESTATUS,admCli.CLIMITECREDITOCLIENTE,admCli.CBANEXCEDERCREDITO,admCli.CLIMDOCTOS,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO, COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CTOTALUNIDADES,admDoc.CTOTAL,admDoc.CFECHA,admDoc.CTIMESTAMP,admDoc.CMETODOPAG,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)) AS COBSERVACIONES,admDoc.CCANCELADO,admDoc.CIDCLIENTEPROVEEDOR,admDoc.CUSUARIO FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR LEFT JOIN dbo.admAgentes as admAge ON admAge.CIDAGENTE = admDoc.CIDAGENTE  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO  where admDoc.CFECHA = '".$valor."' and admDoc.CSERIEDOCUMENTO IN ('PECD','PEND','PEPB','PEBB','PEEC','PDEC','PDIN','PDMY','PDPR') GROUP BY admDoc.CIDDOCUMENTO,admCli.CCODIGOCLIENTE,admDoc.CRAZONSOCIAL,admDoc.CRFC,admAge.CNOMBREAGENTE,admAge.CCODIGOAGENTE,admCli.CDIASCREDITOCLIENTE,admCli.CESTATUS,admCli.CLIMITECREDITOCLIENTE,admCli.CBANEXCEDERCREDITO,admCli.CLIMDOCTOS,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTALUNIDADES,admDoc.CTOTAL,admDoc.CFECHA,admDoc.CTIMESTAMP,admDoc.CMETODOPAG,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)),admDoc.CCANCELADO,admDoc.CIDCLIENTEPROVEEDOR,admDoc.CUSUARIO";

            $ejecutar = sqlsrv_query($conne,$mostrarPedidos);
            $i = 0;
           		
           	if (sqlsrv_has_rows($ejecutar) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutar)) {
            	
            	$pedidos[$i] = array("idCliente" => $value["CIDCLIENTEPROVEEDOR"],
            						 "codigoCliente" => $value["CCODIGOCLIENTE"],
            						 "razonSocial" => $value["CRAZONSOCIAL"],
            						 "rfc" => $value["CRFC"],
            						 "agente" => $value["CNOMBREAGENTE"],
            						 "codigoAgente" => $value["CCODIGOAGENTE"],
            						 "diasCredito" => $value["CDIASCREDITOCLIENTE"],
            						 "limiteCredito" => $value["CLIMITECREDITOCLIENTE"],
            						 "excederCredito" => $value["CBANEXCEDERCREDITO"],
            						 "limDoctosVenc" => $value["CLIMDOCTOS"],
            						 "estatus" => $value["CESTATUS"],
            						 "serie"=>$value["CSERIEDOCUMENTO"],
            						 "folio"=>$value["CFOLIO"],
            						 "idComercial"=>$value["CIDDOCUMENTO"],
            						 "partidas" => $value["PARTIDAS"],
            						 "unidades" => $value["CTOTALUNIDADES"],
            						 "total" => $value["CTOTAL"],
            						 "fechaElaboracion" => $value["CTIMESTAMP"],
            						 "formaPago" => $value["CMETODOPAG"],
            						 "observaciones" => preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $value["COBSERVACIONES"]),
            						 "cancelado" => $value["CCANCELADO"],
            						 "usuario" => $value["CUSUARIO"],
            						 "fecha" => $value["CFECHA"]);
            	$i++;
            }
            echo json_encode($pedidos);
           	}
         
           
           
           

	}
	public $fechaActualFacturas;
	public $empresaFacturas;
	public function ajaxObtenerFacturasNuevas(){

			switch ($this->empresaFacturas) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				break;
				case 'Flex':
					include("../modelos/conexion-api-server-flex.modelo.php");
				break;
				
			}

			$item = "CFECHA";
			$valor = $this->fechaActualFacturas;
			//$valor = '2021-01-21';
			/*
			SELECT admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CPENDIENTE,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CRAZONSOCIAL,admDoc.CREFERENCIA,admDoc.CMETODOPAG,admCli.CCODIGOCLIENTE,admCli.CRFC,admCli.CESTATUS,admCli.CDIASCREDITOCLIENTE,admDoc.CIDCLIENTEPROVEEDOR,admDoc.CTIMESTAMP,admDoc.CUSUARIO,admDoc.CIDDOCUMENTODE FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO   where  admDoc.CFECHA >= '2021-01-25' AND admDoc.CFECHA <= '2021-02-06' and admDoc.CSERIEDOCUMENTO IN ('FACD','FAND','FAPB','DFPR','DOPR') and admDoc.CIDDOCUMENTODE = 4 GROUP BY admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,admDoc.CPENDIENTE,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CRAZONSOCIAL,admDoc.CREFERENCIA,admDoc.CMETODOPAG,admCli.CCODIGOCLIENTE,admCli.CRFC,admCli.CESTATUS,admCli.CDIASCREDITOCLIENTE,admDoc.CIDCLIENTEPROVEEDOR,admDoc.CTIMESTAMP,admDoc.CUSUARIO,admDoc.CIDDOCUMENTODE
			*/
			 
			$mostrarFacturas = "SELECT admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CPENDIENTE,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CRAZONSOCIAL,admDoc.CREFERENCIA,admDoc.CMETODOPAG,admCli.CCODIGOCLIENTE,admCli.CRFC,admCli.CESTATUS,admCli.CDIASCREDITOCLIENTE,admDoc.CIDCLIENTEPROVEEDOR,admDoc.CTIMESTAMP,admDoc.CUSUARIO,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000)) AS COBSERVACIONES FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO   where admDoc.CFECHA = '".$valor."' and admDoc.CSERIEDOCUMENTO IN ('FACD','FAND','FAPB','DFPR','DOPR','FAEC','FCIN','FCMY','FCPR','FCEC') and admDoc.CIDDOCUMENTODE = 4 GROUP BY admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,admDoc.CPENDIENTE,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CRAZONSOCIAL,admDoc.CREFERENCIA,admDoc.CMETODOPAG,admCli.CCODIGOCLIENTE,admCli.CRFC,admCli.CESTATUS,admCli.CDIASCREDITOCLIENTE,admDoc.CIDCLIENTEPROVEEDOR,admDoc.CTIMESTAMP,admDoc.CUSUARIO,CAST(admDoc.COBSERVACIONES AS NVARCHAR(4000))";





            $ejecutarConsulta = sqlsrv_query($conne,$mostrarFacturas);
            $i = 0;
          
           	if (sqlsrv_has_rows($ejecutarConsulta) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutarConsulta)) {
            	
            	$facturas[$i] = array("serie" => $value["CSERIEDOCUMENTO"],
            						 "folio" => $value["CFOLIO"],
            						 "total" => $value["CTOTAL"],
            						 "cancelado" => $value["CCANCELADO"],
            						 "unidadesPendientes" => $value["CTOTALUNIDADES"],
            						 "partidas" => $value["PARTIDAS"],
            						 "pendiente" => $value["CTOTAL"],
            						 "fecha"=>$value["CFECHA"],
            						 "fechaVencimiento"=>$value["CFECHAVENCIMIENTO"],
            						 "fechaElaboracion" => $value["CTIMESTAMP"],
            						 "razonSocial" => $value["CRAZONSOCIAL"],
            						 "codigoCliente" => $value["CCODIGOCLIENTE"],
            						 "rfc" => $value["CRFC"],
            						 "estatus" => $value["CESTATUS"],
            						 "diasCredito" => $value["CDIASCREDITOCLIENTE"],
            						 "idCliente" => $value["CIDCLIENTEPROVEEDOR"],
            						 "formaPago"=> $value["CMETODOPAG"],
            						 "usuario" => $value["CUSUARIO"],
            						 "observaciones" => preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $value["COBSERVACIONES"]),
            						 "referencia" => $value["CREFERENCIA"]);
            	$i++;
            }
            echo json_encode($facturas);
           	}
         
           
           
           

	}
	public $listaPedidos;
	public $empresaPedidos;
	public function ajaxCargarPedidos(){

			include("../db_connect.php");
			switch ($this->empresaPedidos) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				break;
				case 'Flex':
					include("../modelos/conexion-api-server-flex.modelo.php");
				break;
				
			}

			
			$lista = $this->listaPedidos;

			$arregloPedidos = json_decode($lista,true);

			foreach ($arregloPedidos as  $value) {

				$consulta1 = "SELECT id,codigoCliente, nombreCliente, canal, rfc, agenteVentas, diasCredito, statusCliente, serie, folio, numeroUnidades, importe, estado FROM atencionaclientes WHERE folio = '".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";

				$ejecutar = mysqli_query($conn, $consulta1) or die("database error:". mysqli_error($conn));
				$fecha = substr($value["fecha"]["date"],0,10);
				$fechaElab  =substr($value["fechaElaboracion"], 0,19);
			
				$date = date_create($fechaElab);
				$date = date_format($date, 'Y-m-d H:i:s');
				
				$fechaElaboracion = $date;
				$row_count = mysqli_num_rows($ejecutar);

				if ($value["diasCredito"] != 0) {
					$tipoPago = "Crédito";
					$metodoPago = "Pago en parcialidades";
				}else{

					$tipoPago = "Contado";
					$metodoPago = "Pago en una sola exhibición";
				}

				

				if ($value["formaPago"] == "") {

					$formaPago = '99';

				}else{

					$formaPago = $value["formaPago"];
				}
				
				switch ($value["usuario"]) {
					case 'AURORACED':
						$usuario = "Aurora Fernandez";
						break;
					case 'DIEGOCED':
						$usuario = "Diego Avila";
						break;
					case 'ROCICED':
						$usuario = "Rocio Martínez";
						break;
					case 'GABRIEL':
						$usuario = "Gabriel Andrade";
						break;
					
					default:
						$usuario = "Diego Avila";
						break;
				}
				/***OBTENER SALDO VENCIDO DOCUMENTOS VENCIDOS*/
				$estatusCliente = "SELECT COUNT(admDoc.CIDDOCUMENTO) AS documentosVencidos,SUM(admDoc.CPENDIENTE) as saldoVencido FROM dbo.admDocumentos as admDoc  WHERE admDoc.CIDCLIENTEPROVEEDOR = '".$value["idCliente"]."' AND admDoc.CSERIEDOCUMENTO IN ('FACD','FAND','FAPB','DFPR','DOPR','FCMY','FCIN') AND admDoc.CPENDIENTE != 0 AND admDoc.CCANCELADO = 0";

				$ejecutarConsulta = sqlsrv_query($conne,$estatusCliente);

				 while ($valoresCliente = sqlsrv_fetch_array($ejecutarConsulta)) {

				 	$documentosVencidos = $valoresCliente["documentosVencidos"];
				 	$saldoVencido = $valoresCliente["saldoVencido"];

				 }

				 if ($value["serie"] != "PEPB" || $value["serie"] != "PDPR") {
				 	$catalogo = "PINTURAS";
				 }else{
				 	$catalogo = "FLEX";
				 }


				/***OBTENER SALDO VENCIDO DOCUMENTOS VENCIDOS*/
				if ($row_count) {

					if ($value["cancelado"] == 1) {

						$row = mysqli_fetch_array($ejecutar, MYSQLI_ASSOC);
						$idPedido = $row["id"];
						$serie = $value["serie"];
						$folio = $value["folio"];
						$motivo = "Pedido Cancelado Comercial";
						
						$eliminarPedido = new ControladorAtencion();
  						$eliminarPedido -> ctrEliminarPedido($idPedido,$serie,$folio,$motivo);

  						
						
					}else{

					}
					
					if ($value["estatus"] == 1) {
						
						$estadoSituacional = "activado";
					}else{
						$estadoSituacional = "desactivado";
					}

					$actualizarCliente = "UPDATE clientes set limiteCredito = '".$value["limiteCredito"]."',diasCredito = '".$value["diasCredito"]."',excederCredito = '".$value["excederCredito"]."',limDoctosVenc = '".$value["limDoctosVenc"]."',saldoVencido = '".$saldoVencido."',doctosVenc = '".$documentosVencidos."',statusCliente = '".$estadoSituacional."',idClienteComercial = '".$value["idCliente"]."' where codigoCliente = '".$value["codigoCliente"]."' and catalogo = '".$catalogo."'";
					mysqli_query($conn, $actualizarCliente) or die("database error:". mysqli_error($conn));
					
					
					$sql_update = "UPDATE atencionaclientes set codigoCliente='".$value["codigoCliente"]."', nombreCliente='".$value["razonSocial"]."', rfc='".$value["rfc"]."', agenteVentas='".$value["agente"]."',codigoAgente='".$value["codigoAgente"]."', diasCredito='".$value["diasCredito"]."',idClienteComercial='".$value["idCliente"]."', statusCliente='".$value["estatus"]."', serie='".$value["serie"]."', folio='".str_replace(',','',$value["folio"])."', numeroUnidades='".str_replace(',','',$value["unidades"])."',numeroPartidas = '".$value["partidas"]."', importe='".str_replace(',','',$value["total"])."', fechaPedido = '".$fecha."',fechaElaboracion = '".$fechaElaboracion."',formaPago = '".$formaPago."',metodoPago = '".$metodoPago."',tipoPago = '".$tipoPago."',fechaRecepcion = '".$fechaElaboracion."',ordenCompra = '".$value["observaciones"]."', estadoCompras = 1,creado = '".$usuario."',idComercial = '".$value["idComercial"]."'  WHERE folio = '".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));

					
					$sql_update2 = "UPDATE almacen set serie='".$value["serie"]."', idPedido='".str_replace(',','',$value["folio"])."', numeroUnidades='".str_replace(',','',$value["unidades"])."',numeroPartidas = '".$value["partidas"]."', importeTotal='".str_replace(',','',$value["total"])."', suministrado ='Ulises Tuxpan', nombreCliente='".$value["razonSocial"]."',codigoCliente='".$value["codigoCliente"]."', fechaPedido = '".$fecha."' WHERE idPedido='".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update2) or die("database error:". mysqli_error($conn));

					$sql_update3 = "UPDATE laboratoriocolor set idPedido='".str_replace(',','',$value["folio"])."', serie='".$value["serie"]."', nombreCliente='".$value["razonSocial"]."', fechaPedido = '".$fecha."' WHERE idPedido='".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update3) or die("database error:". mysqli_error($conn));

					$sql_update4 = "UPDATE facturacion set idPedido='".str_replace(',','',$value["folio"])."', serie='".$value["serie"]."',statusCliente='".$value["estatus"]."', unidades='".str_replace(',','',$value["unidades"])."',partidas='".str_replace(',','',$value["partidas"])."', importeInicial='".str_replace(',','',$value["total"])."', nombreCliente='".$value["razonSocial"]."', fechaPedido = '".$fecha."'  WHERE idPedido='".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update4) or die("database error:". mysqli_error($conn));

					$sql_update5 = "UPDATE logistica set idPedido='".str_replace(',','',$value["folio"])."', serie='".$value["serie"]."', nombreCliente='".$value["razonSocial"]."',fechaPedido = '".$fecha."' WHERE idPedido='".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update5) or die("database error:". mysqli_error($conn));
					
					



				}else{

					if ($value["razonSocial"] == "FLEX FINISHES MEXICO" || $value["razonSocial"] == "PINTURAS Y COMPLEMENTOS DE PUEBLA" ) {

						$mysql_insert = "INSERT INTO atencionaclientes (codigoCliente, nombreCliente, canal, rfc, agenteVentas,codigoAgente, diasCredito,idClienteComercial, statusCliente, serie, folio, numeroUnidades,numeroPartidas, importe, fechaPedido,tipoRuta,tipoCompra,observaciones,estadoAlmacen,statusAlmacen,estadoFacturacion,statusFacturacion,estadoCompras,statusCompras,sinAdquisicion,estadoLogistica,statusLogistica,concluido,fechaElaboracion,formaPago,creado,metodoPago,tipoPago,fechaRecepcion,ordenCompra,habilitado,idComercial)VALUES('".$value["codigoCliente"]."','".$value["razonSocial"]."','Cedis','".$value["rfc"]."','".$value["agente"]."','".$value["codigoAgente"]."','".$value["diasCredito"]."','".$value["idCliente"]."','".$value["estatus"]."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["unidades"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','".$fecha."','Mostrador','2','Compra Interna','1','3','1','0','1','6','0','1','2','1','".$fechaElaboracion."','".$formaPago."','".$usuario."','".$metodoPago."','".$tipoPago."','".$fechaElaboracion."','".$value["observaciones"]."',1,'".$value["idComercial"]."')";
							mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));

							
							$mysql_insert2 = "INSERT INTO almacen (serie, idPedido, numeroUnidades,numeroPartidas, importeTotal,observacionesExtras,tipoCompra,status,estado,pendiente,suministrado,nombreCliente,codigoCliente,fechaPedido,habilitado,fechaRecepcion,fechaSuministro,fechaTermino)VALUES('".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["unidades"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','Compra Interna','2','3','1','0','Ulises Tuxpan','".$value["razonSocial"]."','".$value["codigoCliente"]."','".$fecha."',1,'".$fechaElaboracion."','".$fechaElaboracion."','".$fechaElaboracion."')";
							mysqli_query($conn, $mysql_insert2) or die("database error:". mysqli_error($conn));

							$mysql_insert3 = "INSERT INTO laboratoriocolor (idPedido, serie, nombreCliente, fechaPedido) VALUES ('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["razonSocial"]."','".$fecha."')";
							mysqli_query($conn, $mysql_insert3) or die("database error:". mysqli_error($conn));

							$mysql_insert4 = "INSERT INTO facturacion (idPedido, serie, statusCliente, unidades,partidas, importeInicial,observacionesExtras,estado,status,usuario,cliente,fechaPedido,nombreCliente,agenteVentas,fechaRecepcion,fechaEntrega) VALUES('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["estatus"]."','".str_replace(',','',$value["unidades"])."','".str_replace(',','',$value["partidas"])."','".str_replace(',','',$value["total"])."','Compra Interna','1','0','Aurora Fernandez','".$value["razonSocial"]."','".$fecha."','".$value["razonSocial"]."','".$value["agente"]."','".$fechaElaboracion."','".$fechaElaboracion."')";
							mysqli_query($conn, $mysql_insert4) or die("database error:". mysql_error($conn));

							$mysql_insert5 = "INSERT INTO logistica (idPedido, serie, usuario,estado,status,tipoRuta,concluido,pendiente,estadoPedido,estadoAlmacen,statusAlmacen,estadoFacturacion,statusFacturacion,estadoCompras,statusCompras,nombreCliente,observacionesExtras,fechaPedido) VALUES ('".str_replace(',','',$value["folio"])."','".$value["serie"]."','Miguel Gutierrez Ángeles','1','2','Mostrador','1','0','1','1','3','1','0','1','6','".$value["razonSocial"]."','Compra Interna','".$fecha."')";
							mysqli_query($conn, $mysql_insert5) or die("database error:". mysqli_error($conn));

							$mysql_insert6 = "INSERT INTO compras(idPedido,serie,cliente,status,sinAdquisicion,estado,pendiente,tipoCompra, fechaPedido,habilitado) VALUES('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["razonSocial"]."','6','0','1','1','2','".$fecha."',1)";
							mysqli_query($conn, $mysql_insert6) or die("database error:". mysqli_error($conn));
							
							
						

					}else{

						if ($value["estatus"] == 1) {
						
						$estadoSituacional = "activado";

						}else{
							$estadoSituacional = "desactivado";
						}

						$actualizarCliente = "UPDATE clientes set limiteCredito = '".$value["limiteCredito"]."',diasCredito = '".$value["diasCredito"]."',excederCredito = '".$value["excederCredito"]."',limDoctosVenc = '".$value["limDoctosVenc"]."',saldoVencido = '".$saldoVencido."',doctosVenc = '".$documentosVencidos."',statusCliente = '".$estadoSituacional."',idClienteComercial = '".$value["idCliente"]."' where codigoCliente = '".$value["codigoCliente"]."'  and catalogo = '".$catalogo."'";
						mysqli_query($conn, $actualizarCliente) or die("database error:". mysqli_error($conn));

						$mysql_insert7 = "INSERT INTO atencionaclientes (codigoCliente, nombreCliente, canal, rfc, agenteVentas,codigoAgente, diasCredito,idClienteComercial,statusCliente, serie, folio, numeroUnidades,numeroPartidas, importe, fechaPedido,fechaElaboracion,formaPago,creado,tipoRuta,metodoPago,tipoPago,fechaRecepcion,ordenCompra,estadoCompras,idComercial)VALUES('".$value["codigoCliente"]."','".$value["razonSocial"]."','Cedis','".$value["rfc"]."','".$value["agente"]."','".$value["codigoAgente"]."','".$value["diasCredito"]."','".$value["idCliente"]."','".$value["estatus"]."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["unidades"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','".$fecha."','".$fechaElaboracion."','".$formaPago."','".$usuario."','Mostrador','".$metodoPago."','".$tipoPago."','".$fechaElaboracion."','".$value["observaciones"]."',1,'".$value["idComercial"]."')";
							mysqli_query($conn, $mysql_insert7) or die("database error:". mysqli_error($conn));


							$mysql_insert8 = "INSERT INTO almacen (serie, idPedido, numeroUnidades,numeroPartidas, importeTotal,nombreCliente,codigoCliente,fechaPedido,suministrado)VALUES('".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["unidades"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','".$value["razonSocial"]."','".$value["codigoCliente"]."','".$fecha."','Ulises Tuxpan')";
							mysqli_query($conn, $mysql_insert8) or die("database error:". mysqli_error($conn));

							$mysql_insert9 = "INSERT INTO laboratoriocolor (idPedido, serie, nombreCliente, fechaPedido) VALUES ('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["razonSocial"]."','".$fecha."')";
							mysqli_query($conn, $mysql_insert9) or die("database error:". mysqli_error($conn));

							$mysql_insert10 = "INSERT INTO facturacion (idPedido, serie, statusCliente, unidades, importeInicial,fechaPedido,nombreCliente,agenteVentas,partidas) VALUES('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["estatus"]."','".str_replace(',','',$value["unidades"])."','".str_replace(',','',$value["total"])."','".$fecha."','".$value["razonSocial"]."','".$value["agente"]."','".$value["partidas"]."')";
							mysqli_query($conn, $mysql_insert10) or die("database error:". mysqli_error($conn));

							$mysql_insert11 = "INSERT INTO logistica (idPedido, serie, usuario,nombreCliente,fechaPedido) VALUES ('".str_replace(',','',$value["folio"])."','".$value["serie"]."','Miguel Gutierrez Ángeles','".$value["razonSocial"]."','".$fecha."')";
							mysqli_query($conn, $mysql_insert11) or die("database error:". mysqli_error($conn));

							$mysql_insert6 = "INSERT INTO compras(idPedido,serie,cliente,status,sinAdquisicion,estado,pendiente,tipoCompra, fechaPedido) VALUES('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["razonSocial"]."','4','1','0','0','0','".$fecha."')";
							mysqli_query($conn, $mysql_insert6) or die("database error:". mysqli_error($conn));
							

					}



				}
				
			}

			echo  json_encode("finalizado");

	}
	public $listaFacturas;
	public $empresaListaFacturas;
	public function ajaxCargarFacturas(){

			include("../db_connect.php");
			switch ($this->empresaListaFacturas) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				break;
				case 'Flex':
					include("../modelos/conexion-api-server-flex.modelo.php");
				break;
				
			}
			

			$lista = $this->listaFacturas;

			$arregloFacturas = json_decode($lista,true);

			foreach ($arregloFacturas as  $value) {


					$validacion = str_replace(" ","",$value["referencia"]);
                  	
                  	//$serie1 = substr($validacion, 0,-5);
                    $serie1 = substr($validacion, 0,4);
                    $folio1 = substr($validacion, 4,5);

                    if (strlen($serie1) == 4 and strlen($folio1) == 4) {
                        $serie = substr($validacion, 0,-4);
                        $folio = substr($validacion, 4,4);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 2){                     
                        $serie =substr($validacion, 0,-2);
                        $folio =substr($validacion, 4,2);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 3){
                        $serie =substr($validacion, 0,-3);
                        $folio =substr($validacion, 4,3);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 5){
                        $serie =substr($validacion, 0,-5);
                        $folio =substr($validacion, 4,5);
                    }else if(strlen($serie1) == 3 and strlen($folio1) == 4){
                        $serie =substr($validacion, 0,-4);
                        $folio =substr($validacion, 4,4);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 1){
                        $serie =substr($validacion, 0,4);
                        $folio =substr($validacion, 4,5);
                    }



                  	if (isset($serie)) {
                  		
                  		  if ($serie != "OTRT") {

                    	$sql_query = "SELECT idPedido,serie FROM facturacion WHERE serie = '".$serie."' and idPedido = '".$folio."'";
                        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));

                        if(mysqli_num_rows($resultset)) {
                                                    
                            $importeFactura1 = str_replace(',', '', $value["total"]);
                            $neto = $importeFactura1/1.16;
                            $impuesto = $neto*0.16;
                            $total = $impuesto+$neto;
                             if ($value["cancelado"] == 1) {
                            	$estatus = 'Cancelada';
                            }else{
                            	$estatus = 'Vigente';
                            }

                            $estatusFactura = 1;
                            $serieFactura = $value["serie"];

                            if ($serieFactura == "FCMY") {
                                $concepto = 'Factura Mayoreo';
                                $agente = 'Mayoreo';
                            }else if($serieFactura == "FCIN"){
                                $concepto = 'Factura Industrial';
                                $agente = 'Industrial';
                            }else if($serieFactura == "FAPB") {
                                $concepto = 'FACTURA FX PUEBLA V 3.3';
                                $agente = 'Flex';
                            }else if ($serieFactura == "DOPR") {
                                $concepto = 'DOCUMENTO PRUEBA V 3.3';
                                $agente = 'Pinturas';
                            }else if ($serieFactura == "DFPR") {
                                $concepto = 'DOCUMENTO PRUEBA V 3.3';
                                $agente = 'Flex';
                            }
                            
                            $folioFc = str_replace(',','',$value["folio"]);
                            $folioFactura = $folioFc;
                           
                            $fechaFactura = substr($value["fecha"]["date"],0,10);
                            $fechaVencimiento = substr($value["fechaVencimiento"]["date"],0,10);


                            $fechaCobro = $fechaVencimiento;
                            	
                            switch ($value["formaPago"]) {
                            	case '01':
                            		 $formaPagos = 'EFECTIVO';
                            		break;
                            	case '02':
                            		 $formaPagos = 'CHEQUE NOMINATIVO';
                            		break;
                            	case '03':
                            		 $formaPagos = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS';
                            		break;
                            	case '04':
                            		 $formaPagos = 'TARJETA DE CRÉDITO';
                            		break;
                            	case '05':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '06':
                            		 $formaPagos = 'DINERO ELECTRÓNICO';
                            		break;
                            	case '08':
                            		 $formaPagos = 'VALES DE DESPENSA';
                            		break;
                            	case '12':
                            		 $formaPagos = 'DACIÓN DE PAGO';
                            		break;
                            	case '13':
                            		 $formaPagos = 'PAGO POR SUBROGACIÓN';
                            		break;
                            	case '14':
                            		 $formaPagos = 'PAGO POR CONSIGNACIÓN';
                            		break;
                            	case '15':
                            		 $formaPagos = 'CONDONACIÓN';
                            		break;
                            	case '17':
                            		 $formaPagos = 'COMPENSACIÓN';
                            		break;
                            	case '23':
                            		 $formaPagos = 'NOVACIÓN';
                            		break;
                            	case '24':
                            		 $formaPagos = 'CONFUSIÓN';
                            		break;
                            	case '25':
                            		 $formaPagos = 'REMISIÓN DE DEDUDA';
                            		break;
                            	case '26':
                            		 $formaPagos = 'PRESCRIPCIÓN O CADUCIDAD';
                            		break;
                            	case '27':
                            		 $formaPagos = 'A SATISFACCIÓN DEL ACREEDOR';
                            		break;
                            	case '28':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '29':
                            		 $formaPagos = 'TARJETA DE SERVICIOS';
                            		break;
                            	case '30':
                            		 $formaPagos = 'APLICACIÓN DE ANTICIPOS';
                            		break;
                            	case '31':
                            		 $formaPagos = 'INTERMEDIARIO PAGOS';
                            		break;
                            	case '99':
                            		 $formaPagos = 'POR DEFINIR';
                            		break;
                            	default:
                            		$formaPagos = 'EFECTIVO';
                            		break;
                            }

                            if ($formaPagos === 'POR DEFINIR') {
                            	$formaPago = 'CREDITO';
                            }else{
                            	$formaPago = $formaPagos;
                            }


                            $verificacionFactura = "SELECT serie,folio from facturasgenerales where serie = '".$serieFactura."' && folio = '".$folioFactura."' AND seriePedido = '".$serie."' and folioPedido = '".$folio."'";

                            $resultado = mysqli_query($conn, $verificacionFactura) or die("database error:". mysqli_error($conn));

                            $codigoCliente = $value["codigoCliente"];
                            $rfc = $value["rfc"];
                            $statusCliente =$value["estatus"];
                            $diasCredito = $value["diasCredito"];

                            switch ($value["usuario"]) {
								case 'AURORACED':
									$usuario = "Aurora Fernandez";
									break;
								case 'DIEGOCED':
									$usuario = "Diego Avila";
									break;
								case 'ROCICED':
									$usuario = "Rocio Martínez";
									break;
								case 'GABRIEL':
									$usuario = "Gabriel Andrade";
									break;
								
								default:
									$usuario = "Aurora Fernandez";
									break;
							}



                            if(mysqli_num_rows($resultado)){

                                $actualizacionFactura = "UPDATE facturasgenerales SET concepto = '".$concepto."', importeFactura = '".str_replace(',','',$value["total"])."',numeroUnidades = '".$value["unidadesPendientes"]."',unidadesPendientes = '".$value["unidadesPendientes"]."',fechaFactura = '".$fechaFactura."', fechaVencimiento = '".$fechaVencimiento."',fechaCobro = '".$fechaCobro."',codigoCliente = '".$codigoCliente."',rfc = '".$rfc."',statusCliente = '".$statusCliente."',diasCredito = '".$diasCredito."',nombreCliente = '".$value["razonSocial"]."', neto = '".number_format($neto,4,'.', '')."', impuesto = '".number_format($impuesto,4,'.', '')."', total ='".number_format($total,4,'.', '')."', formaPago = '".$formaPago."', agente = '".$agente."',numeroPartidas = '".$value["partidas"]."',observacionesComercial = '".$value["observaciones"]."' where serie = '".$serieFactura."' and folio = '".$folioFactura."' and seriePedido = '".$serie."' and folioPedido = '".$folio."'";
                                mysqli_query($conn,$actualizacionFactura) or die("database error:".mysqli_error($conn));

                                $obtenerUnidades = "SELECT unidSurt from facturacion where serie = '".$serie."' and idPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasgenerales set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));

                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(numeroPartidas) as partidasSurtidas, SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas from facturasgenerales where seriePedido = '".$serie."' and folioPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];
                                $partidasSurtidas = $datos["partidasSurtidas"];

                                $actualizarSurtimientoImportes = "UPDATE facturacion set secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100), usuario = '".$usuario."'  where serie = '".$serie."' and idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizacionFacturaAtencion = "UPDATE atencionaclientes set saldoFacturado = '".$importeSurtido."'  where serie = '".$serie."' and folio = '".$folio."'";
                                mysqli_query($conn, $actualizacionFacturaAtencion) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido and almacen.serie = facturacion.serie SET almacen.sumPartidas = facturacion.partSurt,almacen.nivelPartidas = facturacion.nivelPartidas,almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.serie = '".$serie."' and almacen.idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

                            }else{

                            	if ($value["referencia"] == "") {
                            		
                            	}else{

                            	$getNumFactura = "SELECT MAX(numFactura)+1 FROM facturasgenerales WHERE seriePedido = '".$serie."' and folioPedido = '".$folio."'";
                                $request = mysqli_query($conn, $getNumFactura) or die("database error:". mysqli_error($conn));

                                $getLastNumFactura = mysqli_fetch_array($request);
                                if($getLastNumFactura[0] == NULL){
                                    $numeroFactura = 1;
                                }
                                else if($getLastNumFactura[0] == 30){
                                    $numeroFactura = 1;
                                }else if($getLastNumFactura[0] < 30){
                                    $numeroFactura = $getLastNumFactura[0];
                                  
                                }

                                 if (strtoupper($formaPago) == "CREDITO") {

									$creditoPendiente = "1";
										
								}else{

									$creditoPendiente = "0";

								}
                           
                           			
                                $sql_update = "INSERT INTO facturasgenerales(seriePedido,folioPedido,concepto,serie,folio,importeFactura,estatusFactura,numeroUnidades,unidadesPendientes,pendiente,fechaFactura,fechaVencimiento,codigoCliente,rfc,statusCliente,diasCredito,nombreCliente,numFactura,neto,impuesto,total,estatus,formaPago, agente,numeroPartidas,tipoCliente,creditoPendiente,observacionesComercial) VALUES('".$serie."','".$folio."','".$concepto."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["total"])."',$estatusFactura,'".$value["unidadesPendientes"]."','".$value["unidadesPendientes"]."','".str_replace(',','',$value["total"])."','".$fechaFactura."','".$fechaVencimiento."','".$value["codigoCliente"]."','".$value["rfc"]."','".$value["estatus"]."','".$value["diasCredito"]."','".$value["razonSocial"]."','".$numeroFactura."','".number_format($neto,4,'.', '')."','".number_format($impuesto,4,'.', '')."','".number_format($total,4,'.', '')."','".$estatus."','".$formaPago."','".$agente."','".$value["partidas"]."','".$agente."','".$creditoPendiente."','".$value["observaciones"]."')";
                                mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));





                                $obtenerUnidades = "SELECT unidSurt from facturacion where serie = '".$serie."' and idPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasgenerales set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));
                                
                                if ($value["razonSocial"] == "FLEX FINISHES MEXICO" || $value["razonSocial"] == "PINTURAS Y COMPLEMENTOS DE PUEBLA") {

                                	
                                	$actualizarEstatusFactura = "UPDATE facturacion set estatusFactura = 1,status = 1,facturaPendiente = 0,habilitado = 1 where serie ='".$serie."' and idPedido = '".$folio."'";
                                	mysqli_query($conn, $actualizarEstatusFactura) or die("database error:".mysqli_error($conn));

                                }else{

                                	$actualizarEstatusFactura = "UPDATE facturacion set estatusFactura = 1 where serie ='".$serie."' and idPedido = '".$folio."'";
                                	mysqli_query($conn, $actualizarEstatusFactura) or die("database error:".mysqli_error($conn));

                                }

                                
                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(importeFactura) as importeSurtido,SUM(numeroPartidas) as partidasSurtidas, SUM(numeroUnidades) as unidadesSurtidas from facturasgenerales where seriePedido= '".$serie."' and folioPedido = '".$folio."' and cancelado = 0";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];
                                $partidasSurtidas = $datos["partidasSurtidas"];

                                if ($secciones == 1) {
                                	
                                $actualizarSurtimientoImportes = "UPDATE facturacion set serieFactura = '".$value["serie"]."',folioFactura = '".str_replace(',','',$value["folio"])."',secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100)  where serie = '".$serie."' and idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                if ($value["razonSocial"] == "FLEX FINISHES MEXICO" || $value["razonSocial"] == "PINTURAS Y COMPLEMENTOS DE PUEBLA") {

                                	 $actualizacionFacturaAtencion = "UPDATE atencionaclientes set serieFactura = '".$value["serie"]."',folioFactura = '".str_replace(',','',$value["folio"])."',saldoFacturado = '".$importeSurtido."',statusFacturacion = 1  where serie = '".$serie."' and folio = '".$folio."'";
                                	mysqli_query($conn, $actualizacionFacturaAtencion) or die("database error:".mysqli_error($conn));
                                	
                                }else{

                                	 $actualizacionFacturaAtencion = "UPDATE atencionaclientes set serieFactura = '".$value["serie"]."',folioFactura = '".str_replace(',','',$value["folio"])."',saldoFacturado = '".$importeSurtido."'  where serie = '".$serie."' and folio = '".$folio."'";
                               		 mysqli_query($conn, $actualizacionFacturaAtencion) or die("database error:".mysqli_error($conn));

                                }
                               

                                $actualizacionFacturaLogistica = "UPDATE logistica set serieFactura = '".$value["serie"]."',folioFactura = '".str_replace(',','',$value["folio"])."',estadoFacturacion = 1,statusFacturacion = 1  where serie = '".$serie."' and idPedido = '".$folio."'";

                                mysqli_query($conn, $actualizacionFacturaLogistica) or die("database error:".mysqli_error($conn));


                                }else{

                                	$actualizacionFacturaAtencion = "UPDATE atencionaclientes set serieFactura = '".$value["serie"]."',folioFactura = '".str_replace(',','',$value["folio"])."',saldoFacturado = '".$importeSurtido."'  where serie = '".$serie."' and folio = '".$folio."'";

                                	mysqli_query($conn, $actualizacionFacturaAtencion) or die("database error:".mysqli_error($conn));

                                	$actualizarSurtimientoImportes = "UPDATE facturacion set serieFactura = '".$value["serie"]."',folioFactura = '".str_replace(',','',$value["folio"])."',secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100)  where serie = '".$serie."' and idPedido = '".$folio."'";
                                	mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                	 $actualizacionFacturaLogistica = "UPDATE logistica set serieFactura = '".$value["serie"]."',folioFactura = '".str_replace(',','',$value["folio"])."',estadoFacturacion = 1,statusFacturacion = 1  where serie = '".$serie."' and idPedido = '".$folio."'";

                               		 mysqli_query($conn, $actualizacionFacturaLogistica) or die("database error:".mysqli_error($conn));


                                }



                                 $actualizarSurtimientoImportes = "UPDATE facturacion set secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100)  where serie = '".$serie."' and idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido and almacen.serie = facturacion.serie SET almacen.sumPartidas = facturacion.partSurt,almacen.nivelPartidas = facturacion.nivelPartidas,almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.serie = '".$serie."' and almacen.idPedido = '".$folio."'";


                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

                            	}
                                
                                

                            }

                        } else{

                        }

                    }else{

                    	$sql_query = "SELECT idPedido,serie FROM facturacion WHERE serie = '".$serie."' and idPedido = '".$folio."'";
                        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));

                        if(mysqli_num_rows($resultset)) {
                                                    
                            $importeFactura1 = str_replace(',', '', $value["total"]);
                            $neto = $importeFactura1/1.16;
                            $impuesto = $neto*0.16;
                            $total = $impuesto+$neto;
                             if ($value["cancelado"] == 1) {
                            	$estatus = 'Cancelada';
                            }else{
                            	$estatus = 'Vigente';
                            }


                            $estatusFactura = 1;
                            $serieFactura = $value["serie"];

                         
                            if ($serieFactura == "FCMY") {
                                $concepto = 'Factura Mayoreo';
                                $agente = 'Mayoreo';
                            }else if($serieFactura == "FCIN"){
                                $concepto = 'Factura Industrial';
                                $agente = 'Industrial';
                            }else if($serieFactura == "FAPB") {
                                $concepto = 'FACTURA FX PUEBLA V 3.3';
                                $agente = 'Flex';
                            }else if ($serieFactura == "DOPR") {
                                $concepto = 'DOCUMENTO PRUEBA V 3.3';
                                $agente = 'Pinturas';
                            }else if ($serieFactura == "DFPR") {
                                $concepto = 'DOCUMENTO PRUEBA V 3.3';
                                $agente = 'Flex';
                            }
                            
                            $folioFc = str_replace(',','',$value["folio"]);
                            $folioFactura = $folioFc;
                           
                            $fechaFactura = substr($value["fecha"]["date"],0,10);
                            $fechaVencimiento = substr($value["fechaVencimiento"]["date"],0,10);


                            $fechaCobro = $fechaVencimiento;
                            	
                            switch ($value["formaPago"]) {
                            	case '01':
                            		 $formaPagos = 'EFECTIVO';
                            		break;
                            	case '02':
                            		 $formaPagos = 'CHEQUE NOMINATIVO';
                            		break;
                            	case '03':
                            		 $formaPagos = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS';
                            		break;
                            	case '04':
                            		 $formaPagos = 'TARJETA DE CRÉDITO';
                            		break;
                            	case '05':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '06':
                            		 $formaPagos = 'DINERO ELECTRÓNICO';
                            		break;
                            	case '08':
                            		 $formaPagos = 'VALES DE DESPENSA';
                            		break;
                            	case '12':
                            		 $formaPagos = 'DACIÓN DE PAGO';
                            		break;
                            	case '13':
                            		 $formaPagos = 'PAGO POR SUBROGACIÓN';
                            		break;
                            	case '14':
                            		 $formaPagos = 'PAGO POR CONSIGNACIÓN';
                            		break;
                            	case '15':
                            		 $formaPagos = 'CONDONACIÓN';
                            		break;
                            	case '17':
                            		 $formaPagos = 'COMPENSACIÓN';
                            		break;
                            	case '23':
                            		 $formaPagos = 'NOVACIÓN';
                            		break;
                            	case '24':
                            		 $formaPagos = 'CONFUSIÓN';
                            		break;
                            	case '25':
                            		 $formaPagos = 'REMISIÓN DE DEDUDA';
                            		break;
                            	case '26':
                            		 $formaPagos = 'PRESCRIPCIÓN O CADUCIDAD';
                            		break;
                            	case '27':
                            		 $formaPagos = 'A SATISFACCIÓN DEL ACREEDOR';
                            		break;
                            	case '28':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '29':
                            		 $formaPagos = 'TARJETA DE SERVICIOS';
                            		break;
                            	case '30':
                            		 $formaPagos = 'APLICACIÓN DE ANTICIPOS';
                            		break;
                            	case '31':
                            		 $formaPagos = 'INTERMEDIARIO PAGOS';
                            		break;
                            	case '99':
                            		 $formaPagos = 'POR DEFINIR';
                            		break;
                            	default:
                            		$formaPagos = 'EFECTIVO';
                            		break;
                            }

                            if ($formaPagos === 'POR DEFINIR') {
                            	$formaPago = 'CREDITO';
                            }else{
                            	$formaPago = $formaPagos;
                            }


                            $verificacionFactura = "SELECT serie, folio from facturasgenerales where serie = '".$serieFactura."' && folio = '".$folioFactura."' AND seriePedido = '".$serie."' and folioPedido = '".$folio."'";
                            $resultado = mysqli_query($conn, $verificacionFactura) or die("database error:". mysqli_error($conn));

                            $codigoCliente = $value["codigoCliente"];
                            $rfc = $value["rfc"];
                            $statusCliente =$value["estatus"];
                            $diasCredito = $value["diasCredito"];

                            switch ($value["usuario"]) {
								case 'AURORACED':
									$usuario = "Aurora Fernandez";
									break;
								case 'DIEGOCED':
									$usuario = "Diego Avila";
									break;
								case 'ROCICED':
									$usuario = "Rocio Martínez";
									break;
								case 'GABRIEL':
									$usuario = "Gabriel Andrade";
									break;
								
								default:
									$usuario = "Aurora Fernandez";
									break;
							}

                            if(mysqli_num_rows($resultado)){
                            	
                            	
                                $actualizacionFactura = "UPDATE facturasgenerales SET concepto = '".$concepto."', importeFactura = '".str_replace(',','',$value["total"])."',numeroUnidades = '".$value["unidadesPendientes"]."',unidadesPendientes = '".$value["unidadesPendientes"]."',fechaFactura = '".$fechaFactura."', fechaVencimiento = '".$fechaVencimiento."',fechaCobro = '".$fechaCobro."',codigoCliente = '".$codigoCliente."',rfc = '".$rfc."',statusCliente = '".$statusCliente."',diasCredito = '".$diasCredito."',nombreCliente = '".$value["razonSocial"]."', neto = '".number_format($neto,4,'.', '')."', impuesto = '".number_format($impuesto,4,'.', '')."', total ='".number_format($total,4,'.', '')."', estatus = '".$estatus."', formaPago = '".$formaPago."', agente = '".$agente."',numeroPartidas = '".$value["partidas"]."',observacionesComercial = '".$value["observaciones"]."' where serie = '".$serieFactura."' and folio = '".$folioFactura."' and seriePedido = '".$serie."' and folioPedido = '".$folio."'";
                                mysqli_query($conn,$actualizacionFactura) or die("database error:".mysqli_error($conn));

                                if ($serie == "OTRT") {


	                                $obtenerFacturasActuales = "SELECT SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas,SUM(numeroPartidas) as partidasSurtidas FROM facturasgenerales WHERE seriePedido = 'OTRT' and folioPedido = '".$folio."'";
	                                $respuesta = mysqli_query($conn,$obtenerFacturasActuales ) or die("database error:".mysqli_error($conn));
	                                $datosFacturas = mysqli_fetch_array($respuesta);

	                                $totalUnidades = $datosFacturas["unidadesSurtidas"];
	                                $totalPartidas = $datosFacturas["partidasSurtidas"];
	                                $totalImporte = $datosFacturas["importeSurtido"];
	                                
	                             
                            		
									$actualizarAtencion = "UPDATE atencionaclientes set numeroUnidades = '".$totalUnidades."',numeroPartidas  = '".$totalPartidas."',importe = '".$totalImporte."'  where serie = '".$serie."' AND folio = '".$folio."'";
									mysqli_query($conn,$actualizarAtencion) or die("database error:". mysqli_error($conn));

					                $almacenOt = "UPDATE almacen set numeroUnidades = '".$totalUnidades."',numeroPartidas  = '".$totalPartidas."',importeTotal = '".$totalImporte."'  where serie = '".$serie."' AND idPedido = '".$folio."'";
									mysqli_query($conn,$almacenOt) or die("database error:". mysqli_error($conn));

									 $facturacionOt = "UPDATE facturacion set unidades = '".$totalUnidades."',partidas  = '".$totalPartidas."',importeInicial = '".$totalImporte."'  where serie = '".$serie."' AND idPedido = '".$folio."'";
									mysqli_query($conn,$facturacionOt) or die("database error:". mysqli_error($conn));

									
                            	}


                                $obtenerUnidades = "SELECT unidSurt from facturacion where serie = '".$serie."' and idPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasgenerales set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));

                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(numeroPartidas) as partidasSurtidas, SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas from facturasgenerales where seriePedido = '".$serie."' and folioPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];
                                $partidasSurtidas = $datos["partidasSurtidas"];

                                $actualizarSurtimientoImportes = "UPDATE facturacion set serieFactura = '".$serieFactura."',folioFactura = '".$folioFactura."', secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100), usuario = '".$usuario."'  where serie = '".$serie."' and idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido and almacen.serie = facturacion.serie SET almacen.sumPartidas = facturacion.partSurt,almacen.nivelPartidas = facturacion.nivelPartidas,almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.serie = '".$serie."' and almacen.idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

                            }else{
                                
                                
                            	if ($value["referencia"] == "") {
                            		
                            	}else{

                            	


                            	$getNumFactura = "SELECT MAX(numFactura)+1 FROM facturasgenerales WHERE seriePedido = '".$serie."' and folioPedido = '".$folio."'";
                                $request = mysqli_query($conn, $getNumFactura) or die("database error:". mysqli_error($conn));

                                $getLastNumFactura = mysqli_fetch_array($request);
                                if($getLastNumFactura[0] == NULL){
                                    $numeroFactura = 1;
                                }
                                else if($getLastNumFactura[0]==30){
                                    $numeroFactura = 1;
                                }else if($getLastNumFactura[0] < 30){
                                    $numeroFactura = $getLastNumFactura[0];
                                  
                                }
                           	
                           		if (strtoupper($formaPago) == "CREDITO") {

									$creditoPendiente = "1";
										
								}else{

									$creditoPendiente = "0";

								}
                           
                                $sql_update = "INSERT INTO facturasgenerales(seriePedido,folioPedido,concepto,serie,folio,importeFactura,estatusFactura,numeroUnidades,unidadesPendientes,pendiente,fechaFactura,fechaVencimiento,codigoCliente,rfc,statusCliente,diasCredito,nombreCliente,numFactura,neto,impuesto,total,estatus,formaPago, agente,numeroPartidas,tipoCliente,creditoPendiente,observacionesComercial) VALUES('".$serie."','".$folio."','".$concepto."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["total"])."',$estatusFactura,'".$value["unidadesPendientes"]."','".$value["unidadesPendientes"]."','".str_replace(',','',$value["total"])."','".$fechaFactura."','".$fechaVencimiento."','".$codigoCliente."','".$rfc."','".$statusCliente."','".$diasCredito."','".$value["razonSocial"]."','".$numeroFactura."','".number_format($neto,4,'.', '')."','".number_format($impuesto,4,'.', '')."','".number_format($total,4,'.', '')."','".$estatus."','".$formaPago."','".$agente."','".$value["partidas"]."','".$agente."','".$creditoPendiente."','".$value["observaciones"]."')";
                                mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));


                                 if ($serie == "OTRT") {


	                                $obtenerFacturasActuales = "SELECT SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas,SUM(numeroPartidas) as partidasSurtidas FROM facturasgenerales WHERE seriePedido = 'OTRT' and folioPedido = '".$folio."'";
	                                $respuesta = mysqli_query($conn,$obtenerFacturasActuales ) or die("database error:".mysqli_error($conn));
	                                $datosFacturas = mysqli_fetch_array($respuesta);

	                                $totalUnidades = $datosFacturas["unidadesSurtidas"];
	                                $totalPartidas = $datosFacturas["partidasSurtidas"];
	                                $totalImporte = $datosFacturas["importeSurtido"];
	                                
	                             
                            		
									$actualizarAtencion = "UPDATE atencionaclientes set numeroUnidades = '".$totalUnidades."',numeroPartidas  = '".$totalPartidas."',importe = '".$totalImporte."'  where serie = '".$serie."' AND folio = '".$folio."'";
									mysqli_query($conn,$actualizarAtencion) or die("database error:". mysqli_error($conn));

					                $almacenOt = "UPDATE almacen set numeroUnidades = '".$totalUnidades."',numeroPartidas  = '".$totalPartidas."',importeTotal = '".$totalImporte."'  where serie = '".$serie."' AND idPedido = '".$folio."'";
									mysqli_query($conn,$almacenOt) or die("database error:". mysqli_error($conn));

									 $facturacionOt = "UPDATE facturacion set unidades = '".$totalUnidades."',partidas  = '".$totalPartidas."',importeInicial = '".$totalImporte."'  where serie = '".$serie."' AND idPedido = '".$folio."'";
									mysqli_query($conn,$facturacionOt) or die("database error:". mysqli_error($conn));

									
                            	}


                                $obtenerUnidades = "SELECT unidSurt from facturacion where serie = '".$serie."' and idPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasgenerales set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));
                                
                                $actualizarEstatusFactura = "UPDATE facturacion set estatusFactura = 1 where serie ='".$serie."' and idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarEstatusFactura) or die("database error:".mysqli_error($conn));
                                
                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(importeFactura) as importeSurtido,SUM(numeroPartidas) as partidasSurtidas, SUM(numeroUnidades) as unidadesSurtidas from facturasgenerales where seriePedido= '".$serie."' and folioPedido = '".$folio."' and cancelado = 0";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];
                                $partidasSurtidas = $datos["partidasSurtidas"];

                                 $actualizarSurtimientoImportes = "UPDATE facturacion set secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100)  where serie = '".$serie."' and idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido and almacen.serie = facturacion.serie SET almacen.sumPartidas = facturacion.partSurt,almacen.nivelPartidas = facturacion.nivelPartidas,almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.serie = '".$serie."' and almacen.idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

                            	}
                            }

                        } else{

                        	/***COLOCAR LA ORDEN DE TRABAJO****/
                        	switch ($this->empresaListaFacturas) {
								case 'Pinturas':
									include("../modelos/conexion-api-server-pinturas.modelo.php");
								break;
								case 'Flex':
									include("../modelos/conexion-api-server-flex.modelo.php");
								break;
								
							}
		
						
							$serieOrden = $serie;
							$folioOrden = $folio;

							$importeFactura1 = str_replace(',', '', $value["total"]);
                            $neto = $importeFactura1/1.16;
                            $impuesto = $neto*0.16;
                            $total = $impuesto+$neto;
                            if ($value["cancelado"] == 1) {
                            	$estatus = 'Cancelada';
                            }else{
                            	$estatus = 'Vigente';
                            }
                            

                            $estatusFactura = 1;
                            $serieFactura = $value["serie"];

                            
                            if ($serieFactura == "FCMY") {
                                $concepto = 'Factura Mayoreo';
                                $agente = 'Mayoreo';
                            }else if($serieFactura == "FCIN"){
                                $concepto = 'Factura Industrial';
                                $agente = 'Industrial';
                            }else if($serieFactura == "FAPB") {
                                $concepto = 'FACTURA FX PUEBLA V 3.3';
                                $agente = 'Flex';
                            }else if ($serieFactura == "DOPR") {
                                $concepto = 'DOCUMENTO PRUEBA V 3.3';
                                $agente = 'Pinturas';
                            }else if ($serieFactura == "DFPR") {
                                $concepto = 'DOCUMENTO PRUEBA V 3.3';
                                $agente = 'Flex';
                            }
                            
                            $folioFc = str_replace(',','',$value["folio"]);
                            $folioFactura = $folioFc;
                           
                            $fechaFactura = substr($value["fecha"]["date"],0,10);
                            $fechaVencimiento = substr($value["fechaVencimiento"]["date"],0,10);


                            $fechaCobro = $fechaVencimiento;
                            	
                            switch ($value["formaPago"]) {
                            	case '01':
                            		 $formaPagos = 'EFECTIVO';
                            		break;
                            	case '02':
                            		 $formaPagos = 'CHEQUE NOMINATIVO';
                            		break;
                            	case '03':
                            		 $formaPagos = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS';
                            		break;
                            	case '04':
                            		 $formaPagos = 'TARJETA DE CRÉDITO';
                            		break;
                            	case '05':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '06':
                            		 $formaPagos = 'DINERO ELECTRÓNICO';
                            		break;
                            	case '08':
                            		 $formaPagos = 'VALES DE DESPENSA';
                            		break;
                            	case '12':
                            		 $formaPagos = 'DACIÓN DE PAGO';
                            		break;
                            	case '13':
                            		 $formaPagos = 'PAGO POR SUBROGACIÓN';
                            		break;
                            	case '14':
                            		 $formaPagos = 'PAGO POR CONSIGNACIÓN';
                            		break;
                            	case '15':
                            		 $formaPagos = 'CONDONACIÓN';
                            		break;
                            	case '17':
                            		 $formaPagos = 'COMPENSACIÓN';
                            		break;
                            	case '23':
                            		 $formaPagos = 'NOVACIÓN';
                            		break;
                            	case '24':
                            		 $formaPagos = 'CONFUSIÓN';
                            		break;
                            	case '25':
                            		 $formaPagos = 'REMISIÓN DE DEDUDA';
                            		break;
                            	case '26':
                            		 $formaPagos = 'PRESCRIPCIÓN O CADUCIDAD';
                            		break;
                            	case '27':
                            		 $formaPagos = 'A SATISFACCIÓN DEL ACREEDOR';
                            		break;
                            	case '28':
                            		 $formaPagos = 'TARJETA DE DÉBITO';
                            		break;
                            	case '29':
                            		 $formaPagos = 'TARJETA DE SERVICIOS';
                            		break;
                            	case '30':
                            		 $formaPagos = 'APLICACIÓN DE ANTICIPOS';
                            		break;
                            	case '31':
                            		 $formaPagos = 'INTERMEDIARIO PAGOS';
                            		break;
                            	case '99':
                            		 $formaPagos = 'POR DEFINIR';
                            		break;
                            	default:
                            		$formaPagos = 'EFECTIVO';
                            		break;
                            }

                            if ($formaPagos === 'POR DEFINIR') {
                            	$formaPago = 'CREDITO';
                            }else{
                            	$formaPago = $formaPagos;
                            }

                            $fecha = substr($value["fecha"]["date"],0,10);
							$fechaElab  =substr($value["fechaElaboracion"], 0,19);
			
							$date = date_create($fechaElab);
							$date = date_format($date, 'Y-m-d H:i:s');
							
							$fechaElaboracion = $date;

                            if ($value["diasCredito"] != 0) {
								$tipoPago = "Crédito";
								$metodoPago = "Pago en parcialidades";
							}else{

								$tipoPago = "Contado";
								$metodoPago = "Pago en una sola exhibición";
							}

							

							if ($value["formaPago"] == "") {

								$formaPagoOrden = '01';

							}else{

								$formaPagoOrden = $value["formaPago"];
							}
							
							switch ($value["usuario"]) {
								case 'AURORACED':
									$usuario = "Aurora Fernandez";
									break;
								case 'DIEGOCED':
									$usuario = "Diego Avila";
									break;
								case 'ROCICED':
									$usuario = "Rocio Martínez";
									break;
								default:
									$usuario = "Aurora Fernandez";
									break;
							}


							$datosAgente = "SELECT agent.CNOMBREAGENTE,agent.CCODIGOAGENTE FROM dbo.admDocumentos as docs INNER JOIN dbo.admAgentes as agent ON docs.CIDAGENTE = agent.CIDAGENTE  INNER JOIN dbo.admClientes as clients ON docs.CRAZONSOCIAL = clients.CRAZONSOCIAL  WHERE docs.CRFC  = '".$value["rfc"]."' and docs.CSERIEDOCUMENTO = '".$value["serie"]."' and docs.CFOLIO = '".$value["folio"]."'";

							$ejecutar = sqlsrv_query($conne,$datosAgente);

				               while ($valor = sqlsrv_fetch_array($ejecutar)) {
				                  $agenteV =  $valor["CNOMBREAGENTE"];
				                  $codigoV =  $valor["CCODIGOAGENTE"];
				                  
				               }
							
							$agenteVentas = $agenteV;
							$codigoAgente = $codigoV;
						

                        	$atencionClientesOt = "INSERT INTO atencionaclientes (codigoCliente, nombreCliente, canal, rfc, agenteVentas,codigoAgente,diasCredito,idClienteComercial,statusCliente, serie, folio,serieFactura,folioFactura, numeroUnidades,numeroPartidas, importe, fechaPedido,fechaElaboracion,formaPago,creado,tipoRuta,metodoPago,tipoPago,fechaRecepcion,estado,orden,observacionesOrden)VALUES('".$value["codigoCliente"]."','".$value["razonSocial"]."','Cedis','".$value["rfc"]."','".$agenteVentas."','".$codigoAgente."','".$value["diasCredito"]."','".$value["idCliente"]."','".$value["estatus"]."','".$serieOrden."','".$folioOrden."','".$value["serie"]."','".$value["folio"]."','".str_replace(',','',$value["unidadesPendientes"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','".$fecha."','".$fechaElaboracion."','".$formaPagoOrden."','Ulises Tuxpan','Foraneo','".$metodoPago."','".$tipoPago."','".$fechaElaboracion."',1,1,1)";

							mysqli_query($conn, $atencionClientesOt) or die("database error:". mysqli_error($conn));
							
							$actualizarTiempoProceso = "UPDATE atencionaclientes set tiempoProceso = TIMEDIFF(fechaElaboracion, fechaRecepcion) where serie = '".$serieOrden."' AND folio = '".$folioOrden."'";
							mysqli_query($conn,$actualizarTiempoProceso) or die("database error:". mysqli_error($conn));

							$estado = '1';
			                $pendiente = '0';
			                $activo = '1';

			                $almacenOt = "INSERT INTO almacen(suministrado,serie,idPedido,almacen,observacionesOrden,numeroPartidas,numeroUnidades,importeTotal,estado,status,habilitado,pendiente,estatusFactura,activo,nombreCliente,codigoCliente,orden) VALUES('Ulises Tuxpan','".$serieOrden."','".$folioOrden."',1,1,'".$value["partidas"]."','".$value["unidadesPendientes"]."','".$value["total"]."','".$estado."',1,1,'".$pendiente."',1,'".$activo."','".$value["razonSocial"]."','".$value["codigoCliente"]."',1)";
			                mysqli_query($conn,$almacenOt) or die("database error:". mysqli_error($conn));

			                if ($value["estatus"] == 1) {
			                	$estatusCliente = "activado";
			                }else{
			                	$estatusCliente = "desactivado";
			                }
			                $facturacionOt = "INSERT INTO facturacion(serie,idPedido,observacionesOrden,partidas,unidades,importeInicial,estado,secciones,almacen,usuario,status,habilitado,facturaPendiente,agenteVentas,activo,cliente,nombreCliente,statusCliente,orden,fechaRecepcion,fechaEntrega)VALUES('".$serieOrden."','".$folioOrden."',1,'".$value["partidas"]."','".$value["unidadesPendientes"]."','".str_replace(',','',$value["total"])."','".$estado."',0,1,'Aurora Fernandez',0,1,'".$pendiente."','".$agenteVentas."','".$activo."','".$value["razonSocial"]."','".$value["razonSocial"]."','".$estatusCliente."',1,'".$fechaElaboracion."','".$fechaElaboracion."')";

			                mysqli_query($conn,$facturacionOt) or die("database error:". mysqli_error($conn));

			                $estatusOrdenes = "INSERT INTO estatusordenes(serie,folio,estadoOrden,estadoAlmacen,statusAlmacen,estadoFacturacion,statusFacturacion,observaciones) VALUES('".$serieOrden."','".$folioOrden."',1,0,0,0,0,1)";
			                mysqli_query($conn,$estatusOrdenes) or die("database error:". mysqli_error($conn));

			                $tiempoProcesoEstatus = "UPDATE estatusordenes INNER JOIN atencionaclientes ON estatusordenes.serie = atencionaclientes.serie and estatusordenes.folio = atencionaclientes.folio  SET estatusordenes.tiempoProceso = atencionaclientes.tiempoProceso  WHERE estatusordenes.serie = '".$serieOrden."' and  estatusordenes.folio = '".$folioOrden."'";

			                mysqli_query($conn,$tiempoProcesoEstatus) or die("database error:". mysqli_error($conn));

			                /****INSERCION DE FACTURA INICIAL*******/
			                $getNumFactura = "SELECT MAX(numFactura)+1 FROM facturasgenerales WHERE seriePedido = '".$serieOrden."' and folioPedido = '".$folioOrden."'";
                                $request = mysqli_query($conn, $getNumFactura) or die("database error:". mysqli_error($conn));

                                $getLastNumFactura = mysqli_fetch_array($request);
                                if($getLastNumFactura[0] == NULL){
                                    $numeroFactura = 1;
                                }
                                else if($getLastNumFactura[0]==30){
                                    $numeroFactura = 1;
                                }else if($getLastNumFactura[0] < 30){
                                    $numeroFactura = $getLastNumFactura[0];
                                  
                                }


                           		if (strtoupper($formaPago) == "CREDITO") {

									$creditoPendiente = "1";
										
								}else{

									$creditoPendiente = "0";

								}
                           
                                $sql_update = "INSERT INTO facturasgenerales(seriePedido,folioPedido,concepto,serie,folio,importeFactura,estatusFactura,numeroUnidades,unidadesPendientes,pendiente,fechaFactura,fechaVencimiento,codigoCliente,rfc,statusCliente,diasCredito,nombreCliente,numFactura,neto,impuesto,total,estatus,formaPago, agente,numeroPartidas,tipoCliente,creditoPendiente,observacionesComercial) VALUES('".$serieOrden."','".$folioOrden."','".$concepto."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["total"])."',$estatusFactura,'".$value["unidadesPendientes"]."','".$value["unidadesPendientes"]."','".str_replace(',','',$value["total"])."','".$fechaFactura."','".$fechaVencimiento."','".$value["codigoCliente"]."','".$value["rfc"]."','".$value["estatus"]."','".$value["diasCredito"]."','".$value["razonSocial"]."','".$numeroFactura."','".number_format($neto,4,'.', '')."','".number_format($impuesto,4,'.', '')."','".number_format($total,4,'.', '')."','".$estatus."','".$formaPago."','".$agente."','".$value["partidas"]."','".$agente."','".$creditoPendiente."','".$value["observaciones"]."')";
                                mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));




                                $obtenerUnidades = "SELECT unidSurt from facturacion where serie = '".$serieOrden."' and idPedido = '".$folioOrden."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasgenerales set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));
                                
                           
                                
                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(importeFactura) as importeSurtido,SUM(numeroPartidas) as partidasSurtidas, SUM(numeroUnidades) as unidadesSurtidas from facturasgenerales where seriePedido= '".$serie."' and folioPedido = '".$folio."' and cancelado = 0";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];
                                $partidasSurtidas = $datos["partidasSurtidas"];

                                if ($secciones == 1) {
                                	
                                	$actualizarEstatusFactura = "UPDATE facturacion set estatusFactura = 1,serieFactura = '".$serieFactura."',folioFactura = '".$folioFactura."',estado = 1,status = 1,facturaPendiente= 0 where serie ='".$serie."' and idPedido = '".$folio."'";
                                	mysqli_query($conn, $actualizarEstatusFactura) or die("database error:".mysqli_error($conn));

                                	 $tiempoProcesoEstatusAlmacen = "UPDATE estatusordenes INNER JOIN almacen ON estatusordenes.serie = almacen.serie and estatusordenes.folio = almacen.idPedido  SET estatusordenes.tiempoAlmacen = almacen.tiempoProceso,estatusordenes.statusFacturacion = almacen.status,estatusordenes.estadoFacturacion = almacen.estado  WHERE estatusordenes.serie = '".$serieOrden."' and  estatusordenes.folio = '".$folioOrden."'";

                                	 mysqli_query($conn, $tiempoProcesoEstatusAlmacen) or die("database error:".mysqli_error($conn));
                                	 $tiempoProcesoEstatus = "UPDATE estatusordenes INNER JOIN facturacion ON estatusordenes.serie = facturacion.serie and estatusordenes.folio = facturacion.idPedido  SET estatusordenes.tiempoFacturacion = facturacion.tiempoProceso,estatusordenes.statusFacturacion = facturacion.status,estatusordenes.estadoFacturacion = facturacion.estado  WHERE estatusordenes.serie = '".$serieOrden."' and  estatusordenes.folio = '".$folioOrden."'";

                                	 mysqli_query($conn, $tiempoProcesoEstatus) or die("database error:".mysqli_error($conn));

                                	 $tiempoSec = "UPDATE estatusordenes set tiempoSec = TIME_TO_SEC(tiempoProceso), tiempoAlmacenSec = TIME_TO_SEC(tiempoAlmacen), tiempoFacturacionSec = TIME_TO_SEC(tiempoFacturacion)  WHERE serie = '".$serieOrden."' and  folio = '".$folioOrden."'";

                                	 mysqli_query($conn, $tiempoSec) or die("database error:".mysqli_error($conn));

                                	 $tiempoFinal = "UPDATE estatusordenes set tiempoFinal = tiempoSec+tiempoAlmacenSec+tiempoFacturacionSec   WHERE serie = '".$serieOrden."' and  folio = '".$folioOrden."'";

                                	 mysqli_query($conn, $tiempoFinal) or die("database error:".mysqli_error($conn));
                                }else{

                                }

                                 $actualizarSurtimientoImportes = "UPDATE facturacion set  secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100)  where serie = '".$serie."' and idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido and almacen.serie = facturacion.serie SET almacen.sumPartidas = facturacion.partSurt,almacen.nivelPartidas = facturacion.nivelPartidas,almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.serie = '".$serie."' and almacen.idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));


							
                        }


                    }
                  	}else{

                  	}
                    


			}

			echo  json_encode("finalizado");		

	}
	public $fechaActualOrdenes;
	public $empresaOrdenes;
	public function ajaxObtenerTraspasosNuevos(){

			switch ($this->empresaOrdenes) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				break;
				case 'Flex':
					include("../modelos/conexion-api-server-flex.modelo.php");
				break;
				
			}
			
			$item = "CFECHA";
			$valor = $this->fechaActualOrdenes;
			//$valor = '2020-10-25';

			$mostrarTraspasos = "SELECT admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CFECHA,admDoc.CREFERENCIA,admDoc.CTIMESTAMP FROM dbo.admDocumentos as admDoc  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO   where admDoc.CFECHA = '".$valor."' and admDoc.CSERIEDOCUMENTO IN ('TRGE','TRPU') GROUP BY admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,admDoc.CFECHA,admDoc.CREFERENCIA,admDoc.CTIMESTAMP";

            $ejecutarConsulta = sqlsrv_query($conne,$mostrarTraspasos);
            $i = 0;
          
           	if (sqlsrv_has_rows($ejecutarConsulta) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutarConsulta)) {
            	
            	$traspasos[$i] = array("idTraspaso" => $value["CIDDOCUMENTO"],
            						"serieTraspaso" => $value["CSERIEDOCUMENTO"],
            						 "folioTraspaso" => $value["CFOLIO"],
            						 "total" => $value["CTOTAL"],
            						 "cancelado" => $value["CCANCELADO"],
            						 "unidades" => $value["CTOTALUNIDADES"],
            						 "partidas" => $value["PARTIDAS"],
            						 "fecha"=>$value["CFECHA"],	
            						 "fechaElaboracion" => $value["CTIMESTAMP"],
            						 "referencia" => $value["CREFERENCIA"]);
            	$i++;
            }
            echo json_encode($traspasos);
           	}
         
           
           
           

	}
	public $listaTraspasos;
	public $empresaTraspasos;
	public function ajaxCargarTraspasos(){

			include("../db_connect.php");
			switch ($this->empresaTraspasos) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				break;
				case 'Flex':
					include("../modelos/conexion-api-server-flex.modelo.php");
				break;
				
			}
		
			
			$lista = $this->listaTraspasos;

			$arregloTraspasos = json_decode($lista,true);

			foreach ($arregloTraspasos as  $value) {

				$consulta1 = "SELECT id,serieTraspaso,folioTraspaso FROM traspasos WHERE serieTraspaso = '".$value["serieTraspaso"]."' and folioTraspaso = '".str_replace(',','',$value["folioTraspaso"])."'";

				$ejecutar = mysqli_query($conn, $consulta1) or die("database error:". mysqli_error($conn));
				$fecha = substr($value["fecha"]["date"],0,10);
				$fechaElab  =substr($value["fechaElaboracion"], 0,19);
			
				$date = date_create($fechaElab);
				$date = date_format($date, 'Y-m-d H:i:s');
				
				$fechaElaboracion = $date;

				$validacion = str_replace(" ","",$value["referencia"]);
                  	
                  	//$serie1 = substr($validacion, 0,-5);
                    $serie1 = substr($validacion, 0,4);
                    $folio1 = substr($validacion, 4,5);

                    if (strlen($serie1) == 4 and strlen($folio1) == 4) {
                        $serieOrden = substr($validacion, 0,-4);
                        $folioOrden = substr($validacion, 4,4);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 2){                     
                        $serieOrden =substr($validacion, 0,-2);
                        $folioOrden =substr($validacion, 4,2);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 3){
                        $serieOrden =substr($validacion, 0,-3);
                        $folioOrden =substr($validacion, 4,3);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 5){
                        $serieOrden =substr($validacion, 0,-5);
                        $folioOrden =substr($validacion, 4,5);
                    }else if(strlen($serie1) == 3 and strlen($folio1) == 4){
                        $serieOrden =substr($validacion, 0,-4);
                        $folioOrden =substr($validacion, 4,4);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 1){
                        $serieOrden =substr($validacion, 0,4);
                        $folioOrden =substr($validacion, 4,5);
                    }

				$row_count = mysqli_num_rows($ejecutar);



					if ($row_count) {

						if ($value["referencia"] == "" || $serieOrden != "OTRT") {
								
						}else{

							$updateTraspaso = "UPDATE traspasos set  cancelado='".$value["cancelado"]."', unidadesTraspaso='".$value["unidades"]."', partidasTraspaso='".$value["partidas"]."', totalTraspaso='".$value["total"]."',fechaTraspaso='".$fechaElaboracion."' WHERE serieTraspaso = '".$value["serieTraspaso"]."' and folioTraspaso = '".$value["folioTraspaso"]."'";
							mysqli_query($conn, $updateTraspaso) or die("database error:". mysqli_error($conn));
						}

					}else{

						if ($value["referencia"] == "" || $serieOrden != "OTRT") {
							
						}else{
							$identificador = $value["idTraspaso"];

							$mostrarAlmacenOrigen = "SELECT TOP 1 admMov.CIDMOVIMIENTO,admMov.CIDALMACEN FROM dbo.admMovimientos as admMov where admMov.CIDDOCUMENTO = '".$identificador."'";

           				 	$ejecutarConsultaOrigen = sqlsrv_query($conne,$mostrarAlmacenOrigen);

           				 	while ($valor = sqlsrv_fetch_array($ejecutarConsultaOrigen)) {
				                  $almacenOrigen =  $valor["CIDALMACEN"];
				                  $idMovimiento = $valor["CIDMOVIMIENTO"];
				            
				               }

							$mostrarAlmacenDestino = "SELECT admMov.CIDALMACEN FROM dbo.admMovimientos as admMov where admMov.CIDMOVTOOWNER = '".$idMovimiento."'";

           				 	$ejecutarConsultaDestino = sqlsrv_query($conne,$mostrarAlmacenDestino);

           				 	while ($valor2 = sqlsrv_fetch_array($ejecutarConsultaDestino)) {
				                  $almacenDestino =  $valor2["CIDALMACEN"];
				            
				               }

				          	

							$insertTraspaso = "INSERT INTO traspasos (serieTraspaso, folioTraspaso, cancelado, unidadesTraspaso, partidasTraspaso,totalTraspaso,serieOrden,folioOrden,fechaTraspaso,almacenOrigen,almacenDestino)VALUES('".$value["serieTraspaso"]."','".$value["folioTraspaso"]."','".$value["cancelado"]."','".$value["unidades"]."','".$value["partidas"]."','".$value["total"]."','".$serieOrden."','".$folioOrden."','".$fechaElaboracion."','".$almacenOrigen."','".$almacenDestino."')";
								mysqli_query($conn, $insertTraspaso) or die("database error:". mysqli_error($conn));

							$traspasosActivos = "UPDATE almacen SET traspasosActivos = 1,almacen = '".$almacenOrigen."',status = 1,pendiente = 0, estado = 1 WHERE serie = '".$serieOrden."' and idPedido = '".$folioOrden."'";

							mysqli_query($conn, $traspasosActivos) or die("database error:". mysqli_error($conn));

							$almacenActivo = "UPDATE facturacion SET almacen = '".$almacenOrigen."' WHERE serie = '".$serieOrden."' and idPedido = '".$folioOrden."'";

							mysqli_query($conn, $almacenActivo) or die("database error:". mysqli_error($conn));

						}		

					}
				
			
				
			}

			echo  json_encode("finalizado");

	}

	public $fechaActualCompras;
	public $empresaCompras;
	public function ajaxObtenerComprasNuevas(){

			switch ($this->empresaCompras) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				break;
				case 'Flex':
					include("../modelos/conexion-api-server-flex.modelo.php");
				break;
				
			}
			
			
			$item = "CFECHA";
			$valor = $this->fechaActualCompras;
			//$valor = '2020-10-25';

			$mostrarCompras = "SELECT admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CFECHA,admDoc.CREFERENCIA,admDoc.CTIMESTAMP FROM dbo.admDocumentos as admDoc  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO   where admDoc.CFECHA = '".$valor."' and admDoc.CIDCONCEPTODOCUMENTO IN (21) GROUP BY admDoc.CIDDOCUMENTO,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,admDoc.CFECHA,admDoc.CREFERENCIA,admDoc.CTIMESTAMP";

            $ejecutarConsulta = sqlsrv_query($conne,$mostrarCompras);
            $i = 0;
          
           	if (sqlsrv_has_rows($ejecutarConsulta) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutarConsulta)) {
            	
            	$compras[$i] = array("idCompra" => $value["CIDDOCUMENTO"],
            						"serieCompra" => $value["CSERIEDOCUMENTO"],
            						 "folioCompra" => $value["CFOLIO"],
            						 "total" => $value["CTOTAL"],
            						 "cancelado" => $value["CCANCELADO"],
            						 "unidades" => $value["CTOTALUNIDADES"],
            						 "partidas" => $value["PARTIDAS"],
            						 "fecha"=>$value["CFECHA"],	
            						 "fechaElaboracion" => $value["CTIMESTAMP"],
            						 "referencia" => $value["CREFERENCIA"]);
            	$i++;
            }
            echo json_encode($compras);
           	}
         
           
           
           

	}
	public $listaCompras;
	public $empresaListaCompras;
	public function ajaxCargarCompras(){

			include("../db_connect.php");
			switch ($this->empresaListaCompras) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				break;
				case 'Flex':
					include("../modelos/conexion-api-server-flex.modelo.php");
				break;
				
			}
			
			
			$lista = $this->listaCompras;

			$arregloCompras = json_decode($lista,true);

			foreach ($arregloCompras as  $value) {

				$consulta1 = "SELECT id,folioCompra FROM compras WHERE idCompra = '".$value["idCompra"]."'";

				$ejecutar = mysqli_query($conn, $consulta1) or die("database error:". mysqli_error($conn));
				$fecha = substr($value["fecha"]["date"],0,10);
				$fechaElab  =substr($value["fechaElaboracion"], 0,19);
			
				$date = date_create($fechaElab);
				$date = date_format($date, 'Y-m-d H:i:s');
				
				$fechaElaboracion = $date;

				$validacion = str_replace(" ","",$value["referencia"]);
                  	
                  	//$serie1 = substr($validacion, 0,-5);
                    $serie1 = substr($validacion, 0,4);
                    $folio1 = substr($validacion, 4,5);

                    if (strlen($serie1) == 4 and strlen($folio1) == 4) {
                        $seriePedido = substr($validacion, 0,-4);
                        $folioPedido = substr($validacion, 4,4);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 2){                     
                        $seriePedido =substr($validacion, 0,-2);
                        $folioPedido =substr($validacion, 4,2);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 3){
                        $seriePedido =substr($validacion, 0,-3);
                        $folioPedido =substr($validacion, 4,3);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 5){
                        $seriePedido =substr($validacion, 0,-5);
                        $folioPedido =substr($validacion, 4,5);
                    }else if(strlen($serie1) == 3 and strlen($folio1) == 4){
                        $seriePedido =substr($validacion, 0,-4);
                        $folioPedido =substr($validacion, 4,4);
                    }else if(strlen($serie1) == 4 and strlen($folio1) == 1){
                        $seriePedido =substr($validacion, 0,4);
                        $folioPedido =substr($validacion, 4,5);
                    }

				$row_count = mysqli_num_rows($ejecutar);
				$folioCompra = $value["serieCompra"]." ".$value["folioCompra"];

				$importe = ($value["total"]/1.16);

					if ($row_count) {

						if ($value["referencia"] == "") {
								
						}else{

							$updateCompras = "UPDATE compras set  cancelado='".$value["cancelado"]."', cantidad='".$value["unidades"]."', importeCompra='".number_format($importe,2, '.', '')."',folioCompra = '".$folioCompra."' WHERE serie = '".$seriePedido."' and idPedido = '".$folioPedido."'";
							mysqli_query($conn, $updateCompras) or die("database error:". mysqli_error($conn));
						}

					}else{

						if ($value["referencia"] == "") {
							
						}else{
							

							$updateComprasAct = "UPDATE compras set  cancelado='".$value["cancelado"]."', cantidad='".$value["unidades"]."', importeCompra='".number_format($importe,2, '.', '')."', fechaRecepcion='".$fechaElaboracion."',fechaElaboracion='".$fechaElaboracion."',fechaTermino = '".$fechaElaboracion."',usuario = 'Guadalupe Hernández López',status = '4', sinAdquisicion = 0,estado = 1,pendiente = '0',folioCompra = '".$folioCompra."',idCompra = '".$value["idCompra"]."' WHERE serie = '".$seriePedido."' and idPedido = '".$folioPedido."'";
							mysqli_query($conn, $updateComprasAct) or die("database error:". mysqli_error($conn));

							$tiempoProceso = "UPDATE compras SET tiempoProceso = TIMEDIFF(fechaTermino,fechaRecepcion) WHERE serie = '".$seriePedido."' and idPedido = '".$folioPedido."'";

							mysqli_query($conn, $tiempoProceso) or die("database error:". mysqli_error($conn));

							$actualizarAtencion = "UPDATE atencionaclientes INNER JOIN compras ON atencionaclientes.folio = compras.idPedido and atencionaclientes.serie = compras.serie SET atencionaclientes.tiempoCompras = compras.tiempoProceso,atencionaclientes.estadoCompras = compras.estado,atencionaclientes.statusCompras = compras.status,atencionaclientes.sinAdquisicion = compras.sinAdquisicion WHERE atencionaclientes.serie = '".$seriePedido."' and atencionaclientes.folio = '".$folioPedido."'";
							mysqli_query($conn, $actualizarAtencion) or die("database error:". mysqli_error($conn));


							$actualizarLogistica = "UPDATE logistica INNER JOIN compras ON logistica.idPedido = compras.idPedido and logistica.serie = compras.serie SET logistica.estadoCompras = compras.estado,logistica.statusCompras = compras.status WHERE logistica.serie = '".$seriePedido."' and logistica.idPedido = '".$folioPedido."'";
							mysqli_query($conn, $actualizarLogistica) or die("database error:". mysqli_error($conn));

						}		

					}
				
			
				
			}

			echo  json_encode("finalizado");

	}
	/*=============================================
	DETAIL CLIENT
	=============================================*/	
	public $codigoCliente;
	public $catalogo;
	public $idClienteComercial;

	public function ajaxVerDetalleEstatusCliente(){
	
		include("../db_connect.php");
		switch ($this->catalogo) {
			case 'PINTURAS':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
			break;
			case 'FLEX':
					include("../modelos/conexion-api-server-flex.modelo.php");
			break;
				
		}
		

		
		$codigoCliente = $this->codigoCliente;
		$catalogo = $this->catalogo;
		$idCliente = $this->idClienteComercial;


		$estatusCliente = "SELECT COUNT(admDoc.CIDDOCUMENTO) AS documentosVencidos,SUM(admDoc.CPENDIENTE) as saldoVencido,admCli.CDIASCREDITOCLIENTE,admCli.CLIMITECREDITOCLIENTE,admCli.CBANEXCEDERCREDITO,admCli.CLIMDOCTOS,admCli.CESTATUS FROM dbo.admDocumentos as admDoc LEFT OUTER JOIN dbo.admClientes as admCli ON  admCli.CIDCLIENTEPROVEEDOR = admDoc.CIDCLIENTEPROVEEDOR   WHERE admDoc.CIDCLIENTEPROVEEDOR = '".$idCliente."' AND admDoc.CSERIEDOCUMENTO IN ('FACD','FAND','FAPB','DFPR','DOPR') AND admDoc.CPENDIENTE != 0 AND admDoc.CCANCELADO = 0 GROUP BY admCli.CDIASCREDITOCLIENTE,admCli.CLIMITECREDITOCLIENTE,admCli.CBANEXCEDERCREDITO,admCli.CLIMDOCTOS,admCli.CESTATUS";

				$ejecutarConsulta = sqlsrv_query($conne,$estatusCliente);

				 while ($valoresCliente = sqlsrv_fetch_array($ejecutarConsulta)) {

				 	$documentosVencidos = $valoresCliente["documentosVencidos"];
				 	$saldoVencido = $valoresCliente["saldoVencido"];
				 	$limiteCredito  = $valoresCliente["CLIMITECREDITOCLIENTE"];
				 	$diasCredito = $valoresCliente["CDIASCREDITOCLIENTE"];
				 	$excederCredito = $valoresCliente["CBANEXCEDERCREDITO"];
				 	$limDoctosVenc = $valoresCliente["CLIMDOCTOS"];
				 	$statusCliente = $valoresCliente["CESTATUS"];

				 }

				 
				 if ($statusCliente == 1) {
						
						$estadoSituacional = "activado";
					}else{
						$estadoSituacional = "desactivado";
					}

				 $actualizarCliente = "UPDATE clientes set limiteCredito = '".$limiteCredito."',diasCredito = '".$diasCredito."',excederCredito = '".$excederCredito."',limDoctosVenc = '".$limDoctosVenc."',saldoVencido = '".$saldoVencido."',doctosVenc = '".$documentosVencidos."',statusCliente = '".$estadoSituacional."' where codigoCliente = '".$codigoCliente."'  and catalogo = '".$catalogo."'";
				mysqli_query($conn, $actualizarCliente) or die("database error:". mysqli_error($conn));


				 $arreglo = array("documentosVencidos" => $documentosVencidos,
								  "saldoVencido" => $saldoVencido,
								  "limiteCredito" => $limiteCredito,
								  "diasCredito" => $diasCredito,
								  "excederCredito" => $excederCredito,
								  "limDoctosVenc" => $limDoctosVenc,
								  "statusCliente" => $statusCliente);





				 echo json_encode($arreglo);



		/*

		$respuesta =  ControladorAtencion::ctrMostrarAtencion($item, $valor);

		
		*/
	}
	public $fechaActualFacturasRifa;
	public $empresaFacturasRifa;
	public function ajaxObtenerFacturasRifa(){

			switch ($this->empresaFacturasRifa) {
				case 'Pinturas':
					include("../modelos/conexion-api-server-pinturas.modelo.php");
					$folios = "653,
654,
655,
657,
661,
662,
664,
665,
666,
667,
668,
669,
670,
671,
672,
673,
674,
675,
676,
677,
678,
679,
680,
681,
682,
684,
685,
686,
687,
688,
689,
705,
706,
707,
708,
709,
710,
711,
712,
713,
714,
715,
716,
717,
718,
720,
722,
723,
724,
725,
726,
727,
728,
729,
730,
731,
732,
733,
735,
737,
739,
741,
742,
743,
746,
747,
748,
749,
750,
752,
753,
754,
755,
756,
757,
758,
759,
760,
761,
762,
763,
764,
765,
766,
767,
768,
769,
770,
771,
772,
777,
778,
779,
780,
781,
784,
785,
786,
787,
788,
789,
792,
797,
799,
800,
801,
802,
803,
804,
805,
806,
807,
808,
809,
810,
811,
812,
813,
814,
815,
816,
817,
818,
819,
820,
821,
822,
823,
824,
825,
826,
827,
828,
829,
830,
831,
832,
833,
834,
835,
837,
838,
839,
840,
845,
846,
847,
848,
849,
851,
852,
853,
854,
860,
862,
864,
867,
868,
869,
870,
871,
872,
873,
874,
875,
876,
877,
878,
879,
880,
881,
884,
886,
887,
888,
889,
891,
892,
894,
895,
896,
899,
902,
903,
904,
905,
906,
907,
910,
911,
912,
913,
914,
916,
2793,
2794,
2795,
2803,
2805,
2806,
2811,
2814,
2815,
2818,
2819,
2839,
2840,
2860,
2862,
2920,
2921,
2922,
2927,
3173,
3450,
3533,
3693,
3699,
3791,
3825,
3828,
3829,
3850,
3851,
3857,
3859,
3862,
3872,
3873,
3885,
3886,
3888,
3889,
3890,
3891,
3935,
3937,
3957,
3958,
3969,
3970,
4014,
4016,
4021,
4024,
4025,
4027,
4030,
4031,
4073,
4092,
4093,
4109,
4110,
4111,
4114,
4128,
4130,
4131,
4141,
4184,
4185,
4209,
4210,
4211,
4212,
4213,
4214,
4218,
4220,
4221,
4222,
4223,
4226,
4242,
4262,
4287,
4288,
4289,
4290,
4312,
4313,
4314,
4316,
4317,
4318,
4324,
4325,
4580,
4581,
4583,
4588,
4589,
4590,
4662,
4663,
4664,
4756,
4785,
4786,
4787,
4792,
4793,
4938,
4963,
4964,
4969,
5003,
5035,
5036,
5045,
5177,
5178,
5179,
5180,
5181,
5524,
5525,
5526,
5527,
5549,
5599,
5600,
5601,
5602,
5603,
5688,
5774,
5836,
5945,
5980,
6008,
6013,
6123,
6124,
6293,
6294,
6301,
6331,
6332,
6333,
6338,
6356,
6357,
6360,
6367,
6374,
6436,
6448,
6454,
6493,
6494,
6522,
6523,
6524,
6525,
6526,
6527,
6528,
6529,
6555,
6558,
6647,
6657,
6687,
6688,
6689,
6690,
6691,
6695,
6893,
6919,
6992,
7040,
7041,
7042,
7043,
7044,
7045,
7046,
7047,
7048,
7064,
7071,
7091";
				break;
				case 'Torres':
					include("../modelos/conexion-api-server-torres.modelo.php");
					$folios = "2207,
2206,
2208,
1197,
1196,
2052,
2051,
560,
557,
556,
559,
558,
567,
566,
565,
564,
563,
562,
561,
568,
538,
546,
545,
544,
543,
542,
1828,
1829,
1213,
1207,
1203,
1199,
1200,
1206,
1205,
1204,
1212,
1211,
1210,
1209,
1208,
1201,
1202,
805,
574,
590,
575,
577,
589,
588,
2038,
2037,
1144,
1973,
797,
798,
801,
799,
800,
2000,
1835,
606,
1517,
1382,
1132,
1133,
1134,
942,
1804,
1796,
1797,
1794,
1800,
1799,
1987,
314,
318,
317,
53,
1529,
319,
320,
1131,
50,
315,
1214,
1798,
28,
672,
373,
1245,
1795,
65,
58,
62,
1481,
64,
63,
1694,
1480,
1689,
1381,
26,
25,
24,
27,
31,
30,
29,
409,
408,
32,
1464,
1531,
1530,
1696,
1527,
1526,
419,
421,
420,
2075,
422,
423,
1695,
1473,
1468,
1470,
1472,
1471,
1391,
1387,
1390,
1520,
1479,
1475,
1476,
1522,
1523,
1478,
1477,
1698,
135,
1830,
1423,
1424,
61,
60,
298,
68,
1783,
66,
57,
67,
2490,
1839,
1840,
425,
70,
1842,
1593,
1361,
1699,
1747,
1366,
1994,
1254,
441,
52,
1253,
51,
1518,
1519,
1636,
1638,
1637,
2492,
1244,
1412,
1563,
1237,
1356,
1401,
1403,
1400,
1399,
1402,
1355,
2593,
295,
996,
584,
1389,
1388,
1404,
500,
2620,
2621,
2622,
2627,
18,
17,
20,
19,
16,
15,
2493,
1353,
547,
548,
549,
2050,
2049,
576,
2046,
2045,
2044,
571,
570,
569,
573,
572,
2643,
1774,
1384,
555,
554,
550,
551,
552,
553,
523,
2613,
2645,
1775,
312,
313,
311,
310,
316,
302,
303,
585,
586,
587,
2526,
268,
269,
1826,
1825,
1827,
536,
537,
1166,
1586,
1167,
1176,
1175,
521,
522,
518,
519,
520,
2353,
2354,
2355,
2356,
2357,
2636,
2761,
2644,
2751,
2744,
2745,
2746,
2747,
2748,
2749,
2752,
2750,
1737,
1736,
2550,
541,
539,
2551,
2552,
540,
2682,
2553,
1993,
160,
370,
1434,
36,
407,
413,
2365,
2209,
1290,
34,
426,
2743,
403,
1814,
1838,
1833,
1834,
2756,
994,
372,
410,
1807,
1465,
1466,
2646,
2647,
2648,
2649,
1521,
1806,
1809,
2484,
1808,
170,
2688,
1810,
1983,
2001,
2002,
290,
291,
494,
495,
1803,
1243,
322";
				break;
				
			}

			$item = "CFECHA";
			$valor = $this->fechaActualFacturasRifa;
			//$valor = '2021-10-20';
	
			$mostrarFacturas = "with ventas as(SELECT
			admDocs.CSERIEDOCUMENTO
			,admDocs.CFOLIO
			,admDocs.CFECHA
			,admMov.CIDPRODUCTO
			,admMov.CTOTAL
			,admDocs.CRAZONSOCIAL
			,admDocs.CTOTAL AS TOTALVENTA
			,'1' AS CLASIFICACION
			,admDocs.CCANCELADO
			
		FROM admDocumentos as admDocs INNER JOIN admMovimientos as admMov ON admDocs.CIDDOCUMENTO = admMov.CIDDOCUMENTO where admDocs.CFECHA = '".$valor."' AND admDocs.CSERIEDOCUMENTO IN ('FASM','FASG','FATR','FARF','FACP','FCCA','FCST','FCRM','FCSN','FCTO') and admDocs.CIDDOCUMENTODE = 4 AND admMov.CIDPRODUCTO IN(".$folios.") UNION SELECT
	  admDocs.CSERIEDOCUMENTO
			,admDocs.CFOLIO
			,admDocs.CFECHA
			,admMov.CIDPRODUCTO
			,admMov.CTOTAL
			,admDocs.CRAZONSOCIAL
			,admDocs.CTOTAL AS TOTALVENTA
			,'2' AS CLASIFICACION
			,admDocs.CCANCELADO
			
		FROM admDocumentos as admDocs INNER JOIN admMovimientos as admMov ON admDocs.CIDDOCUMENTO = admMov.CIDDOCUMENTO where admDocs.CFECHA = '".$valor."' AND admDocs.CSERIEDOCUMENTO IN ('FASM','FASG','FATR','FARF','FACP','FCCA','FCST','FCRM','FCSN','FCTO') and admDocs.CIDDOCUMENTODE = 4 AND  admMov.CIDPRODUCTO IN(0) UNION SELECT
	  admDocs.CSERIEDOCUMENTO
			,admDocs.CFOLIO
			,admDocs.CFECHA
			,admMov.CIDPRODUCTO
			,admMov.CTOTAL
			,admDocs.CRAZONSOCIAL
			,admDocs.CTOTAL AS TOTALVENTA
			,'3' AS CLASIFICACION
			,admDocs.CCANCELADO
			
		FROM admDocumentos as admDocs INNER JOIN admMovimientos as admMov ON admDocs.CIDDOCUMENTO = admMov.CIDDOCUMENTO where admDocs.CFECHA = '".$valor."' AND admDocs.CSERIEDOCUMENTO IN ('FASM','FASG','FATR','FARF','FACP','FCCA','FCST','FCRM','FCSN','FCTO') and admDocs.CIDDOCUMENTODE = 4 AND  admMov.CIDPRODUCTO IN(0) UNION SELECT
	  admDocs.CSERIEDOCUMENTO
			,admDocs.CFOLIO
			,admDocs.CFECHA
			,admMov.CIDPRODUCTO
			,admMov.CTOTAL
			,admDocs.CRAZONSOCIAL
			,admDocs.CTOTAL AS TOTALVENTA
			,'4' AS CLASIFICACION
			,admDocs.CCANCELADO
			
		FROM admDocumentos as admDocs INNER JOIN admMovimientos as admMov ON admDocs.CIDDOCUMENTO = admMov.CIDDOCUMENTO where admDocs.CFECHA = '".$valor."' AND admDocs.CSERIEDOCUMENTO IN ('FASM','FASG','FATR','FARF','FACP','FCCA','FCST','FCRM','FCSN','FCTO') and admDocs.CIDDOCUMENTODE = 4 AND  admMov.CIDPRODUCTO IN(0))
	  ,
	  ventasAcumulado AS(
		  SELECT 
			  vn.CRAZONSOCIAL,
			 vn.CSERIEDOCUMENTO,
			 vn.CFOLIO,
			 vn.CTOTAL,
			 vn.CFECHA,
			 vn.TOTALVENTA,
			 vn.CLASIFICACION,
			 vn.CCANCELADO
			 
			  
		  FROM ventas AS vn
	  )
	  SELECT * FROM ventasAcumulado PIVOT(SUM(CTOTAL) FOR CLASIFICACION in([1],[2],[3],[4])) as pivotTable ";

            $ejecutarConsulta = sqlsrv_query($conne,$mostrarFacturas);
            $i = 0;
          
           	if (sqlsrv_has_rows($ejecutarConsulta) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutarConsulta)) {
            	
            	$facturas[$i] = array("cliente" => $value["CRAZONSOCIAL"],
            						 "serie" => $value["CSERIEDOCUMENTO"],
            						 "folio" => $value["CFOLIO"],
									 "fecha"=>$value["CFECHA"],
									 "total"=>$value["TOTALVENTA"],
            						 "cancelado" => $value["CCANCELADO"],
									 "acumulado1" => $value["1"],
									 "acumulado2" => $value["2"],
									 "acumulado3" => $value["3"],
									 "acumulado4" => $value["4"]);
            	$i++;
            }
            echo json_encode($facturas);
           	}
         
           
           
           

	}




}
/*=============================================
HABILITAR PEDIDO
=============================================*/	

if(isset($_POST["activarPedido"])){

	$activarPedido = new AjaxAtencion();
	$activarPedido -> activarPedido = $_POST["activarPedido"];
	$activarPedido -> activarId = $_POST["activarId"];
	$activarPedido -> ajaxActivarPedido();

}

/*=============================================
EDITAR PEDIDO
=============================================*/
if(isset($_POST["idPedido"])){

	$editar = new AjaxAtencion();
	$editar -> idPedido = $_POST["idPedido"];
	$editar -> ajaxEditarPedido();

}
/*=============================================
VER MOTIVOS DE CANCELACIÓN
=============================================*/
if (isset($_POST["idPedido2"])) {
	
	$visualizar = new AjaxAtencion();
	$visualizar -> idPedido2 = $_POST["idPedido2"];
	$visualizar -> ajaxVerCancelacion();
}
/*=============================================
OBTENER PEDIDOS NUEVOS
=============================================*/
if (isset($_POST["fechaActual"])) {
	
	$obtenerDatos = new AjaxAtencion();
	$obtenerDatos -> fechaActual = $_POST["fechaActual"];
	$obtenerDatos -> empresa = $_POST["empresa"];
	$obtenerDatos -> ajaxObtenerPedidosNuevos();
}
/*==============================================
OBETENR FACTURAS NUEVAS
==============================================*/
if (isset($_POST["fechaActualFacturas"])) {
	$obtenerDatosFacturas = new AjaxAtencion();
	$obtenerDatosFacturas -> fechaActualFacturas = $_POST["fechaActualFacturas"];
	$obtenerDatosFacturas -> empresaFacturas = $_POST["empresaFacturas"];
	$obtenerDatosFacturas -> ajaxObtenerFacturasNuevas();
}
/*=============================================
CARGAR PEDIDOS
=============================================*/
if (isset($_POST["listaPedidos"])) {
	
	$cargarPedidos = new AjaxAtencion();
	$cargarPedidos -> listaPedidos = $_POST["listaPedidos"];
	$cargarPedidos -> empresaPedidos = $_POST["empresaPedidos"];
	$cargarPedidos -> ajaxCargarPedidos();
}
/*=============================================
CARGAR FACTURAS
=============================================*/
if (isset($_POST["listaFacturas"])) {
	$cargarFacturas = new AjaxAtencion();
	$cargarFacturas -> listaFacturas = $_POST["listaFacturas"];
	$cargarFacturas -> empresaListaFacturas = $_POST["empresaListaFacturas"];
	$cargarFacturas -> ajaxCargarFacturas();
}
/*=============================================
OBTENER TRASPASOS NUEVOS
=============================================*/
if (isset($_POST["fechaActualOrdenes"])) {
	
	$obtenerDatosTraspasos = new AjaxAtencion();
	$obtenerDatosTraspasos -> fechaActualOrdenes = $_POST["fechaActualOrdenes"];
	$obtenerDatosTraspasos -> empresaOrdenes = $_POST["empresaOrdenes"];
	$obtenerDatosTraspasos -> ajaxObtenerTraspasosNuevos();
}
/*=============================================
CARGAR TRASPASOS
=============================================*/
if (isset($_POST["listaTraspasos"])) {
	$cargarTraspasos = new AjaxAtencion();
	$cargarTraspasos -> listaTraspasos = $_POST["listaTraspasos"];
	$cargarTraspasos -> empresaTraspasos = $_POST["empresaTraspasos"];
	$cargarTraspasos -> ajaxCargarTraspasos();
}
/*=============================================
OBTENER COMPRAS REALIZADAS
=============================================*/
if (isset($_POST["fechaActualCompras"])) {
	
	$obtenerDatosCompras = new AjaxAtencion();
	$obtenerDatosCompras -> fechaActualCompras = $_POST["fechaActualCompras"];
	$obtenerDatosCompras -> empresaCompras = $_POST["empresaCompras"];
	$obtenerDatosCompras -> ajaxObtenerComprasNuevas();
}
/*=============================================
CARGAR COMPRAS
=============================================*/
if (isset($_POST["listaCompras"])) {
	$cargarCompras = new AjaxAtencion();
	$cargarCompras -> listaCompras = $_POST["listaCompras"];
	$cargarCompras -> empresaListaCompras = $_POST["empresaListaCompras"];
	$cargarCompras -> ajaxCargarCompras();
}
/*=============================================
VER DETALLE ESTATUS CLIENTE
=============================================*/
if (isset($_POST["codigoCliente"])) {
	$detalleCliente = new AjaxAtencion();
	$detalleCliente -> codigoCliente = $_POST["codigoCliente"];
	$detalleCliente -> catalogo = $_POST["catalogo"];
	$detalleCliente -> idClienteComercial = $_POST["idClienteComercial"];
	$detalleCliente -> ajaxVerDetalleEstatusCliente();
}
/*==============================================
OBETENER FACTURAS NUEVAS RIFA
==============================================*/
if (isset($_POST["fechaActualFacturasRifa"])) {
	$facturasRifa = new AjaxAtencion();
	$facturasRifa -> fechaActualFacturasRifa = $_POST["fechaActualFacturasRifa"];
	$facturasRifa -> empresaFacturasRifa = $_POST["empresaFacturasRifa"];
	$facturasRifa -> ajaxObtenerFacturasRifa();
}