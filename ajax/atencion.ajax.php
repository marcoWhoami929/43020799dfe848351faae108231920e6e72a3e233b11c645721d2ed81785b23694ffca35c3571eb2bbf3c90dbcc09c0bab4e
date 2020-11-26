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
	public function ajaxObtenerPedidosNuevos(){

			include("../modelos/conexion-api-server.modelo.php");
			
			

			$item = "CFECHA";
			$valor = $this->fechaActual;

			$mostrarPedidos = "SELECT admDoc.CIDDOCUMENTO,admCli.CCODIGOCLIENTE,admDoc.CRAZONSOCIAL,admDoc.CRFC,admAge.CNOMBREAGENTE,admCli.CDIASCREDITOCLIENTE,admCli.CESTATUS,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO, COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CTOTALUNIDADES,admDoc.CTOTAL,admDoc.CFECHA,admDoc.CTIMESTAMP,admDoc.CMETODOPAG,admDoc.CREFERENCIA,admDoc.CCANCELADO FROM dbo.admDocumentos as admDoc LEFT JOIN dbo.admClientes as admCli ON admCli.CRAZONSOCIAL = admDoc.CRAZONSOCIAL LEFT JOIN dbo.admAgentes as admAge ON admAge.CIDAGENTE = admDoc.CIDAGENTE  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO  where admDoc.CFECHA = '".$valor."' and admDoc.CSERIEDOCUMENTO IN ('PECD','PEND') GROUP BY admDoc.CIDDOCUMENTO,admCli.CCODIGOCLIENTE,admDoc.CRAZONSOCIAL,admDoc.CRFC,admAge.CNOMBREAGENTE,admCli.CDIASCREDITOCLIENTE,admCli.CESTATUS,admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTALUNIDADES,admDoc.CTOTAL,admDoc.CFECHA,admDoc.CTIMESTAMP,admDoc.CMETODOPAG,admDoc.CREFERENCIA,admDoc.CCANCELADO";





            $ejecutar = sqlsrv_query($conn,$mostrarPedidos);
            $i = 0;
           		
           	if (sqlsrv_has_rows($ejecutar) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutar)) {
            	
            	$pedidos[$i] = array("codigoCliente" => $value["CCODIGOCLIENTE"],
            						 "razonSocial" => $value["CRAZONSOCIAL"],
            						 "rfc" => $value["CRFC"],
            						 "agente" => $value["CNOMBREAGENTE"],
            						 "diasCredito" => $value["CDIASCREDITOCLIENTE"],
            						 "estatus" => $value["CESTATUS"],
            						 "serie"=>$value["CSERIEDOCUMENTO"],
            						 "folio"=>$value["CFOLIO"],
            						 "partidas" => $value["PARTIDAS"],
            						 "unidades" => $value["CTOTALUNIDADES"],
            						 "total" => $value["CTOTAL"],
            						 "fechaElaboracion" => $value["CTIMESTAMP"],
            						 "formaPago" => $value["CMETODOPAG"],
            						 "referencia" => $value["CREFERENCIA"],
            						 "cancelado" => $value["CCANCELADO"],
            						 "fecha" => $value["CFECHA"]);
            	$i++;
            }
            echo json_encode($pedidos);
           	}
         
           
           
           

	}
	public $fechaActualFacturas;
	public function ajaxObtenerFacturasNuevas(){

			include("../modelos/conexion-api-server.modelo.php");
			
			

			$item = "CFECHA";
			$valor = $this->fechaActualFacturas;
			//$valor = '2020-10-25';

			$mostrarFacturas = "SELECT admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,COUNT(admMov.CIDDOCUMENTO) as PARTIDAS,admDoc.CPENDIENTE,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CRAZONSOCIAL,admDoc.CREFERENCIA,admDoc.CMETODOPAG,admCli.CCODIGOCLIENTE,admCli.CRFC,admCli.CESTATUS,admCli.CDIASCREDITOCLIENTE FROM dbo.admDocumentos as admDoc INNER JOIN dbo.admClientes as admCli ON admCli.CRAZONSOCIAL = admDoc.CRAZONSOCIAL  LEFT JOIN dbo.admMovimientos as admMov ON admMov.CIDDOCUMENTO = admDoc.CIDDOCUMENTO   where admDoc.CFECHA = '".$valor."' and admDoc.CSERIEDOCUMENTO IN ('FACD','FAND') GROUP BY admDoc.CSERIEDOCUMENTO,admDoc.CFOLIO,admDoc.CTOTAL,admDoc.CCANCELADO,admDoc.CTOTALUNIDADES,admDoc.CPENDIENTE,admDoc.CFECHA,admDoc.CFECHAVENCIMIENTO,admDoc.CRAZONSOCIAL,admDoc.CREFERENCIA,admDoc.CMETODOPAG,admCli.CCODIGOCLIENTE,admCli.CRFC,admCli.CESTATUS,admCli.CDIASCREDITOCLIENTE";



            $ejecutarConsulta = sqlsrv_query($conn,$mostrarFacturas);
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
            						 "pendiente" => $value["CPENDIENTE"],
            						 "fecha"=>$value["CFECHA"],
            						 "fechaVencimiento"=>$value["CFECHAVENCIMIENTO"],
            						 "razonSocial" => $value["CRAZONSOCIAL"],
            						 "codigoCliente" => $value["CCODIGOCLIENTE"],
            						 "rfc" => $value["CRFC"],
            						 "estatus" => $value["CESTATUS"],
            						 "diasCredito" => $value["CDIASCREDITOCLIENTE"],
            						 "formaPago"=> $value["CMETODOPAG"],
            						 "referencia" => $value["CREFERENCIA"]);
            	$i++;
            }
            echo json_encode($facturas);
           	}
         
           
           
           

	}
	public $listaPedidos;
	public function ajaxCargarPedidos(){

			include("../db_connect.php");

			
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

					$formaPago = '01';

				}else{

					$formaPago = $value["formaPago"];
				}
				
				switch ($value["serie"]) {
					case 'PEND':
						$usuario = "Aurora Fernandez";
						break;
					case 'PECD':
						$usuario = "Rocio Martínez";
						break;
					
					default:
						$usuario = "Aurora Fernandez";
						break;
				}
				
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
					
					
					
					$sql_update = "UPDATE atencionaclientes set codigoCliente='".$value["codigoCliente"]."', nombreCliente='".$value["razonSocial"]."', rfc='".$value["rfc"]."', agenteVentas='".$value["agente"]."', diasCredito='".$value["diasCredito"]."' , statusCliente='".$value["estatus"]."', serie='".$value["serie"]."', folio='".str_replace(',','',$value["folio"])."', numeroUnidades='".str_replace(',','',$value["unidades"])."',numeroPartidas = '".$value["partidas"]."', importe='".str_replace(',','',$value["total"])."', fechaPedido = '".$fecha."',fechaElaboracion = '".$fechaElaboracion."',formaPago = '".$formaPago."',metodoPago = '".$metodoPago."',tipoPago = '".$tipoPago."',fechaRecepcion = '".$fechaElaboracion."',ordenCompra = '".$value["referencia"]."' WHERE folio = '".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));

					
					$sql_update2 = "UPDATE almacen set serie='".$value["serie"]."', idPedido='".str_replace(',','',$value["folio"])."', numeroUnidades='".str_replace(',','',$value["unidades"])."',numeroPartidas = '".$value["partidas"]."', importeTotal='".str_replace(',','',$value["total"])."', suministrado ='Ulises Tuxpan', nombreCliente='".$value["razonSocial"]."', fechaPedido = '".$fecha."' WHERE idPedido='".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update2) or die("database error:". mysqli_error($conn));

					$sql_update3 = "UPDATE laboratoriocolor set idPedido='".str_replace(',','',$value["folio"])."', serie='".$value["serie"]."', nombreCliente='".$value["razonSocial"]."', fechaPedido = '".$fecha."' WHERE idPedido='".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update3) or die("database error:". mysqli_error($conn));

					$sql_update4 = "UPDATE facturacion set idPedido='".str_replace(',','',$value["folio"])."', serie='".$value["serie"]."',statusCliente='".$value["estatus"]."', unidades='".str_replace(',','',$value["unidades"])."', importeInicial='".str_replace(',','',$value["total"])."', nombreCliente='".$value["razonSocial"]."', fechaPedido = '".$fecha."'  WHERE idPedido='".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update4) or die("database error:". mysqli_error($conn));

					$sql_update5 = "UPDATE logistica set idPedido='".str_replace(',','',$value["folio"])."', serie='".$value["serie"]."', nombreCliente='".$value["razonSocial"]."',fechaPedido = '".$fecha."' WHERE idPedido='".str_replace(',','',$value["folio"])."' and serie = '".$value["serie"]."'";
					mysqli_query($conn, $sql_update5) or die("database error:". mysqli_error($conn));
					
					



				}else{

					if ($value["razonSocial"] == "FLEX FINISHES MEXICO, S.A. DE C.V." || $value["razonSocial"] == "PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V." ) {

						$mysql_insert = "INSERT INTO atencionaclientes (codigoCliente, nombreCliente, canal, rfc, agenteVentas, diasCredito, statusCliente, serie, folio, numeroUnidades,numeroPartidas, importe, fechaPedido,tipoRuta,tipoCompra,observaciones,estadoAlmacen,statusAlmacen,estadoFacturacion,statusFacturacion,estadoCompras,statusCompras,sinAdquisicion,estadoLogistica,statusLogistica,concluido,fechaElaboracion,formaPago,creado,metodoPago,tipoPago,fechaRecepcion,ordenCompra)VALUES('".$value["codigoCliente"]."','".$value["razonSocial"]."','Cedis','".$value["rfc"]."','".$value["agente"]."','".$value["diasCredito"]."','".$value["estatus"]."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["unidades"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','".$fecha."','Mostrador','2','Compra Interna','1','3','1','0','1','6','0','1','2','1','".$fechaElaboracion."','".$formaPago."','".$usuario."','".$metodoPago."','".$tipoPago."','".$fechaElaboracion."','".$value["referencia"]."')";
							mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));

							
							$mysql_insert2 = "INSERT INTO almacen (serie, idPedido, numeroUnidades,numeroPartidas, importeTotal,observacionesExtras,tipoCompra,status,estado,pendiente,suministrado,nombreCliente,fechaPedido)VALUES('".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["unidades"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','Compra Interna','2','3','1','0','Ulises Tuxpan','".$value["razonSocial"]."','".$fecha."')";
							mysqli_query($conn, $mysql_insert2) or die("database error:". mysqli_error($conn));

							$mysql_insert3 = "INSERT INTO laboratoriocolor (idPedido, serie, nombreCliente, fechaPedido) VALUES ('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["razonSocial"]."','".$fecha."')";
							mysqli_query($conn, $mysql_insert3) or die("database error:". mysqli_error($conn));

							$mysql_insert4 = "INSERT INTO facturacion (idPedido, serie, statusCliente, unidades, importeInicial,observacionesExtras,estado,status,usuario,cliente,fechaPedido,nombreCliente,agenteVentas) VALUES('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["estatus"]."','".str_replace(',','',$value["unidades"])."','".str_replace(',','',$value["total"])."','Compra Interna','1','0','Aurora Fernandez','".$value["razonSocial"]."','".$fecha."','".$value["razonSocial"]."','".$value["agente"]."')";
							mysqli_query($conn, $mysql_insert4) or die("database error:". mysql_error($conn));

							$mysql_insert5 = "INSERT INTO logistica (idPedido, serie, usuario,estado,status,tipoRuta,concluido,pendiente,estadoPedido,estadoAlmacen,statusAlmacen,estadoFacturacion,statusFacturacion,estadoCompras,statusCompras,nombreCliente,observacionesExtras,fechaPedido) VALUES ('".str_replace(',','',$value["folio"])."','".$value["serie"]."','Miguel Gutierrez Ángeles','1','2','Mostrador','1','0','1','1','3','1','0','1','6','".$value["razonSocial"]."','Compra Interna','".$fecha."')";
							mysqli_query($conn, $mysql_insert5) or die("database error:". mysqli_error($conn));

							$mysql_insert6 = "INSERT INTO compras(idPedido,serie,cliente,status,sinAdquisicion,estado,pendiente,tipoCompra, fechaPedido) VALUES('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["razonSocial"]."','6','0','1','1','2','".$fecha."')";
							mysqli_query($conn, $mysql_insert6) or die("database error:". mysqli_error($conn));
							
							
						

					}else{


						$mysql_insert7 = "INSERT INTO atencionaclientes (codigoCliente, nombreCliente, canal, rfc, agenteVentas, diasCredito, statusCliente, serie, folio, numeroUnidades,numeroPartidas, importe, fechaPedido,fechaElaboracion,formaPago,creado,tipoRuta,metodoPago,tipoPago,fechaRecepcion,ordenCompra)VALUES('".$value["codigoCliente"]."','".$value["razonSocial"]."','Cedis','".$value["rfc"]."','".$value["agente"]."','".$value["diasCredito"]."','".$value["estatus"]."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["unidades"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','".$fecha."','".$fechaElaboracion."','".$formaPago."','".$usuario."','Mostrador','".$metodoPago."','".$tipoPago."','".$fechaElaboracion."','".$value["referencia"]."')";
							mysqli_query($conn, $mysql_insert7) or die("database error:". mysqli_error($conn));
						

							$mysql_insert8 = "INSERT INTO almacen (serie, idPedido, numeroUnidades,numeroPartidas, importeTotal,nombreCliente,fechaPedido,suministrado)VALUES('".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["unidades"])."','".$value["partidas"]."','".str_replace(',','',$value["total"])."','".$value["razonSocial"]."','".$fecha."','Ulises Tuxpan')";
							mysqli_query($conn, $mysql_insert8) or die("database error:". mysqli_error($conn));

							$mysql_insert9 = "INSERT INTO laboratoriocolor (idPedido, serie, nombreCliente, fechaPedido) VALUES ('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["razonSocial"]."','".$fecha."')";
							mysqli_query($conn, $mysql_insert9) or die("database error:". mysqli_error($conn));

							$mysql_insert10 = "INSERT INTO facturacion (idPedido, serie, statusCliente, unidades, importeInicial,fechaPedido,nombreCliente,agenteVentas,partidas) VALUES('".str_replace(',','',$value["folio"])."','".$value["serie"]."','".$value["estatus"]."','".str_replace(',','',$value["unidades"])."','".str_replace(',','',$value["total"])."','".$fecha."','".$value["razonSocial"]."','".$value["agente"]."','".$value["partidas"]."')";
							mysqli_query($conn, $mysql_insert10) or die("database error:". mysqli_error($conn));

							$mysql_insert11 = "INSERT INTO logistica (idPedido, serie, usuario,nombreCliente,fechaPedido) VALUES ('".str_replace(',','',$value["folio"])."','".$value["serie"]."','Miguel Gutierrez Ángeles','".$value["razonSocial"]."','".$fecha."')";
							mysqli_query($conn, $mysql_insert11) or die("database error:". mysqli_error($conn));

							

					}



				}
				
			}

			echo  json_encode("finalizado");

	}
	public $listaFacturas;
	public function ajaxCargarFacturas(){

			include("../db_connect.php");

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

                    	$sql_query = "SELECT idPedido FROM facturacion WHERE idPedido = '".$folio."'";
                        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));

                        if(mysqli_num_rows($resultset)) {
                                                    
                            $importeFactura1 = str_replace(',', '', $value["total"]);
                            $neto = $importeFactura1/1.16;
                            $impuesto = $neto*0.16;
                            $total = $impuesto+$neto;
                            $estatus = 'Vigente';

                            $estatusFactura = 1;
                            $serieFactura = $value["serie"];

                            if ($serieFactura == "FACD") {
                                $concepto = 'FACTURA MAYOREO V 3.3';
                                $agente = 'Mayoreo';
                            }else if($serieFactura == "FAND"){
                                $concepto = 'FACTURA INDUSTRIAL V 3.3';
                                $agente = 'Industrial';
                            }else if($serieFactura == "FAPB") {
                                $concepto = 'FACTURA FX PUEBLA V 3.3';
                                $agente = 'Flex';
                            }else if ($serieFactura == "DOPR") {
                                $concepto = 'PEDIDO PRUEBA V 3.3';
                                $agente = 'Documento de Prueba';
                            }
                            
                            $folioFc = str_replace(',','',$value["folio"]);
                            $folioFactura = $folioFc;
                           
                            $fechaFactura = substr($value["fecha"]["date"],0,10);
                            $fechaVencimiento = substr($value["fechaVencimiento"]["date"],0,10);


                            $fechaCobro = $fechaVencimiento;
                            	
                            switch ($value["formaPago"]) {
                            	case '01':
                            		 $formaPago = 'EFECTIVO';
                            		break;
                            	case '02':
                            		 $formaPago = 'CHEQUE NOMINATIVO';
                            		break;
                            	case '03':
                            		 $formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS';
                            		break;
                            	case '04':
                            		 $formaPago = 'TARJETA DE CRÉDITO';
                            		break;
                            	case '05':
                            		 $formaPago = 'TARJETA DE DÉBITO';
                            		break;
                            	case '06':
                            		 $formaPago = 'DINERO ELECTRÓNICO';
                            		break;
                            	case '08':
                            		 $formaPago = 'VALES DE DESPENSA';
                            		break;
                            	case '12':
                            		 $formaPago = 'DACIÓN DE PAGO';
                            		break;
                            	case '13':
                            		 $formaPago = 'PAGO POR SUBROGACIÓN';
                            		break;
                            	case '14':
                            		 $formaPago = 'PAGO POR CONSIGNACIÓN';
                            		break;
                            	case '15':
                            		 $formaPago = 'CONDONACIÓN';
                            		break;
                            	case '17':
                            		 $formaPago = 'COMPENSACIÓN';
                            		break;
                            	case '23':
                            		 $formaPago = 'NOVACIÓN';
                            		break;
                            	case '24':
                            		 $formaPago = 'CONFUSIÓN';
                            		break;
                            	case '25':
                            		 $formaPago = 'REMISIÓN DE DEDUDA';
                            		break;
                            	case '26':
                            		 $formaPago = 'PRESCRIPCIÓN O CADUCIDAD';
                            		break;
                            	case '27':
                            		 $formaPago = 'A SATISFACCIÓN DEL ACREEDOR';
                            		break;
                            	case '28':
                            		 $formaPago = 'TARJETA DE DÉBITO';
                            		break;
                            	case '29':
                            		 $formaPago = 'TARJETA DE SERVICIOS';
                            		break;
                            	case '30':
                            		 $formaPago = 'APLICACIÓN DE ANTICIPOS';
                            		break;
                            	case '31':
                            		 $formaPago = 'INTERMEDIARIO PAGOS';
                            		break;
                            	case '99':
                            		 $formaPago = 'POR DEFINIR';
                            		break;
                            	default:
                            		$formaPago = 'EFECTIVO';
                            		break;
                            }


                            $verificacionFactura = "SELECT serie, folio from facturasgenerales where serie = '".$serieFactura."' && folio = '".$folioFactura."' AND seriePedido = '".$serie."' and folioPedido = '".$folio."'";
                            $resultado = mysqli_query($conn, $verificacionFactura) or die("database error:". mysqli_error($conn));

                            $codigoCliente = $value["codigoCliente"];
                            $rfc = $value["rfc"];
                            $statusCliente =$value["estatus"];
                            $diasCredito = $value["diasCredito"];



                            if(mysqli_num_rows($resultado)){

                                $actualizacionFactura = "UPDATE facturasgenerales SET concepto = '".$concepto."', importeFactura = '".str_replace(',','',$value["total"])."',numeroUnidades = '".$value["unidadesPendientes"]."',unidadesPendientes = '".$value["unidadesPendientes"]."',fechaFactura = '".$fechaFactura."', fechaVencimiento = '".$fechaVencimiento."',fechaCobro = '".$fechaCobro."',codigoCliente = '".$codigoCliente."',rfc = '".$rfc."',statusCliente = '".$statusCliente."',diasCredito = '".$diasCredito."',nombreCliente = '".$value["razonSocial"]."', neto = '".number_format($neto,4,'.', '')."', impuesto = '".number_format($impuesto,4,'.', '')."', total ='".number_format($total,4,'.', '')."', estatus = '".$estatus."', formaPago = '".$formaPago."', agente = '".$agente."',numeroPartidas = '".$value["partidas"]."' where serie = '".$serieFactura."' and folio = '".$folioFactura."' and folioPedido = '".$folio."'";
                                mysqli_query($conn,$actualizacionFactura) or die("database error:".mysqli_error($conn));

                                $obtenerUnidades = "SELECT unidSurt from facturacion where idPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasgenerales set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));

                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(numeroPartidas) as partidasSurtidas, SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas from facturasgenerales where folioPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];
                                $partidasSurtidas = $datos["partidasSurtidas"];

                                $actualizarSurtimientoImportes = "UPDATE facturacion set secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100), usuario = 'Aurora Fernandez'  where idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido SET almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

                            }else{

                            	if ($value["referencia"] == "") {
                            		
                            	}else{

                            	$getNumFactura = "SELECT MAX(numFactura)+1 FROM facturasgenerales WHERE folioPedido = '".$folio."'";
                                $request = mysqli_query($conn, $getNumFactura) or die("database error:". mysqli_error($conn));

                                $getLastNumFactura = mysqli_fetch_array($request);
                                if($getLastNumFactura[0] == NULL){
                                    $numeroFactura = 1;
                                }
                                else if($getLastNumFactura[0]==8){
                                    $numeroFactura = 1;
                                }else if($getLastNumFactura[0] < 8){
                                    $numeroFactura = $getLastNumFactura[0];
                                  
                                }
                           
                                $sql_update = "INSERT INTO facturasgenerales(seriePedido,folioPedido,concepto,serie,folio,importeFactura,estatusFactura,numeroUnidades,unidadesPendientes,pendiente,fechaFactura,fechaVencimiento,codigoCliente,rfc,statusCliente,diasCredito,nombreCliente,numFactura,neto,impuesto,total,estatus,formaPago, agente,numeroPartidas,tipoCliente) VALUES('".$serie."','".$folio."','".$concepto."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["total"])."',$estatusFactura,'".$value["unidadesPendientes"]."','".$value["unidadesPendientes"]."','".str_replace(',','',$value["total"])."','".$fechaFactura."','".$fechaVencimiento."','".$codigoCliente."','".$rfc."','".$statusCliente."','".$diasCredito."','".$value["razonSocial"]."','".$numeroFactura."','".number_format($neto,4,'.', '')."','".number_format($impuesto,4,'.', '')."','".number_format($total,4,'.', '')."','".$estatus."','".$formaPago."','".$agente."','".$value["partidas"]."','".$agente."')";
                                mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));




                                $obtenerUnidades = "SELECT unidSurt from facturacion where idPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasgenerales set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));
                                
                                $actualizarEstatusFactura = "UPDATE facturacion set estatusFactura = 1 where idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarEstatusFactura) or die("database error:".mysqli_error($conn));
                                
                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(importeFactura) as importeSurtido,SUM(numeroPartidas) as partidasSurtidas, SUM(numeroUnidades) as unidadesSurtidas from facturasgenerales where folioPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];
                                $partidasSurtidas = $datos["partidasSurtidas"];

                                 $actualizarSurtimientoImportes = "UPDATE facturacion set secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100), nivelPartidas = (('".$partidasSurtidas."'/partSurt)*100)  where idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido SET almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

                            	}
                                
                                

                            }

                        } else{

                        }

                    }else{

                    	$sql_query = "SELECT folio, estatusFactura, cliente FROM facturacionot WHERE folio = '".$folio."'";
                        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                
                        if(mysqli_num_rows($resultset)) {
                            
                            $importeFactura1 = str_replace(',', '', $value["total"]);
                            $neto = $importeFactura1/1.16;
                            $impuesto = $neto*0.16;
                            $total = $impuesto+$neto;

                            $validacion = str_replace(" ","",$value["referencia"]);
                            $estatus = 'Vigente';
                            $estatusFactura = 1;
                            $serieFactura = $value["serie"];

                            if ($serieFactura == "FACD") {
                                $concepto = 'FACTURA MAYOREO V 3.3';
                                $agente = 'Mayoreo';
                            }else if($serieFactura == "FAND"){
                                $concepto = 'FACTURA INDUSTRIAL V 3.3';
                                $agente = 'Industrial';
                            }else if($serieFactura == "FAPB") {
                                $concepto = 'FACTURA FX PUEBLA V 3.3';
                                $agente = 'Flex';
                            }else if ($serieFactura == "DOPR") {
                                $concepto = 'PEDIDO PRUEBA V 3.3';
                                $agente = 'Documento de Prueba';
                            }
                            
                            
                            $folioFc = str_replace(',','',$value["folio"]);
                            $folioFactura = $folioFc;
                            $fecha = substr($value["fecha"]["date"],0,10);
                            $fechaFactura = $fecha;
                            $fechaVencimiento = substr($value["fechaVencimiento"]["date"],0,10);
                            $fechaCobro = $fechaVencimiento;

                            switch ($value["formaPago"]) {
                            	case '01':
                            		 $formaPago = 'EFECTIVO';
                            		break;
                            	case '02':
                            		 $formaPago = 'CHEQUE NOMINATIVO';
                            		break;
                            	case '03':
                            		 $formaPago = 'TRANSFERENCIA ELECTRÓNICA DE FONDOS';
                            		break;
                            	case '04':
                            		 $formaPago = 'TARJETA DE CRÉDITO';
                            		break;
                            	case '05':
                            		 $formaPago = 'TARJETA DE DÉBITO';
                            		break;
                            	case '06':
                            		 $formaPago = 'DINERO ELECTRÓNICO';
                            		break;
                            	case '08':
                            		 $formaPago = 'VALES DE DESPENSA';
                            		break;
                            	case '12':
                            		 $formaPago = 'DACIÓN DE PAGO';
                            		break;
                            	case '13':
                            		 $formaPago = 'PAGO POR SUBROGACIÓN';
                            		break;
                            	case '14':
                            		 $formaPago = 'PAGO POR CONSIGNACIÓN';
                            		break;
                            	case '15':
                            		 $formaPago = 'CONDONACIÓN';
                            		break;
                            	case '17':
                            		 $formaPago = 'COMPENSACIÓN';
                            		break;
                            	case '23':
                            		 $formaPago = 'NOVACIÓN';
                            		break;
                            	case '24':
                            		 $formaPago = 'CONFUSIÓN';
                            		break;
                            	case '25':
                            		 $formaPago = 'REMISIÓN DE DEDUDA';
                            		break;
                            	case '26':
                            		 $formaPago = 'PRESCRIPCIÓN O CADUCIDAD';
                            		break;
                            	case '27':
                            		 $formaPago = 'A SATISFACCIÓN DEL ACREEDOR';
                            		break;
                            	case '28':
                            		 $formaPago = 'TARJETA DE DÉBITO';
                            		break;
                            	case '29':
                            		 $formaPago = 'TARJETA DE SERVICIOS';
                            		break;
                            	case '30':
                            		 $formaPago = 'APLICACIÓN DE ANTICIPOS';
                            		break;
                            	case '31':
                            		 $formaPago = 'INTERMEDIARIO PAGOS';
                            		break;
                            	case '99':
                            		 $formaPago = 'POR DEFINIR';
                            		break;
                            	default:
                            		$formaPago = 'EFECTIVO';
                            		break;
                            }


                            $verificacionFactura = "SELECT serie, folio from facturasordenes where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                            $resultado = mysqli_query($conn, $verificacionFactura) or die("database error:". mysqli_error($conn));

                            $codigoCliente = $value["codigoCliente"];
                            $rfc = $value["rfc"];
                            $statusCliente =$value["estatus"];
                            $diasCredito = $value["diasCredito"];

                            if(mysqli_num_rows($resultado)){

                                $actualizacionFactura = "UPDATE facturasordenes SET concepto = '".$concepto."', importeFactura = '".str_replace(',','',$value["total"])."',numeroUnidades = '".$value["unidadesPendientes"]."', unidadesPendientes = '".$value["unidadesPendientes"]."',fecha = '".$fecha."',fechaFactura = '".$fechaFactura."', fechaVencimiento = '".$fechaVencimiento."',fechaCobro = '".$fechaCobro."', codigoCliente = '".$codigoCliente."',rfc = '".$rfc."',statusCliente = '".$statusCliente."',diasCredito = '".$diasCredito."', nombreCliente = '".$value["razonSocial"]."', neto = '".number_format($neto,4,'.', '')."', impuesto = '".number_format($impuesto,4,'.', '')."', total ='".number_format($total,4,'.', '')."', estatus = '".$estatus."',formaPago = '".$formaPago."', agente = '".$agente."',numeroPartidas = '".$value["partidas"]."' where serie = '".$serieFactura."' and folio = '".$folioFactura."'";

                                mysqli_query($conn,$actualizacionFactura) or die("database error:".mysqli_error($conn));

                                $obtenerUnidades = "SELECT unidadesTotales from facturacionot where folio = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasordenes set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));

                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas from facturasordenes where folioPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];

                                $actualizarSurtimientoImportes = "UPDATE facturacionot set secciones = '".$secciones."',importeSurtido = '".$importeSurtido."', unidadesSurtidas = '".$unidadesSurtidas."', nivelDeImporte = ('".$importeSurtido."'*100/importeTotal), nivelDeUnidades = ('".$unidadesSurtidas."'*100/unidadesTotales)  where folio = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacenot INNER JOIN facturacionot ON almacenot.folio = facturacionot.folio SET almacenot.sumUnidades = facturacionot.unidadesSurtidas,almacenot.nivelUnidades = facturacionot.nivelDeUnidades,almacenot.importeSurtido = facturacionot.importeSurtido,almacenot.nivelImportes = facturacionot.nivelDeImporte where almacenot.folio = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

                            }else{
                                
                                $getNumFactura = "SELECT MAX(numFactura)+1 FROM facturasordenes WHERE folioPedido = '".$folio."'";
                                $request = mysqli_query($conn, $getNumFactura) or die("database error:". mysqli_error($conn));

                                $getLastNumFactura = mysqli_fetch_array($request);
                                if($getLastNumFactura[0] == NULL){
                                    $numeroFactura = 1;
                                }
                                else if($getLastNumFactura[0]==8){
                                    $numeroFactura = 1;
                                }else if($getLastNumFactura[0] < 8){
                                    $numeroFactura = $getLastNumFactura[0];
                                  
                                }
                           
                                $sql_update = "INSERT INTO facturasordenes(concepto,seriePedido,folioPedido,serie,folio,importeFactura,estatusFactura,unidadesPendientes,pendiente,fecha,fechaFactura,fechaVencimiento,fechaCobro,codigoCliente,rfc,statusCliente,diasCredito,nombreCliente,numFactura,neto,impuesto,total,estatus,formaPago,agente,numeroPartidas) VALUES('".$concepto."','OTRM','".$folio."','".$value["serie"]."','".str_replace(',','',$value["folio"])."','".str_replace(',','',$value["total"])."','".$estatusFactura."','".$value["unidadesPendientes"]."','".str_replace(',','',$value["total"])."','".$fecha."','".$fechaFactura."','".$fechaVencimiento."','".$fechaCobro."','".$codigoCliente."','".$rfc."','".$statusCliente."','".$diasCredito."','".$value["razonSocial"]."','".$numeroFactura."','".number_format($neto,4,'.', '')."','".number_format($impuesto,4,'.', '')."','".number_format($total,4,'.', '')."','".$estatus."','".$formaPago."','".$agente."','".$value["partidas"]."')";
                                mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));

                                $obtenerUnidades = "SELECT unidadesTotales from facturacionot where folio = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerUnidades) or die("database error:".mysqli_error($conn));
                                $unidades = mysqli_fetch_array($respuesta);
                              
                                $actualizarUnidades = "UPDATE facturasordenes set numeroUnidades = ($unidades[0]-($unidades[0]-unidadesPendientes)) where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                                mysqli_query($conn,$actualizarUnidades ) or die("database error:".mysqli_error($conn));
                                
                                $actualizarEstatusFactura = "UPDATE facturacionot set estatusFactura = 1 where folio = '".$folio."'";
                                mysqli_query($conn, $actualizarEstatusFactura) or die("database error:".mysqli_error($conn));
                                
                                $obtenerDatosFactura = "SELECT COUNT(id) as secciones,SUM(importeFactura) as importeSurtido, SUM(numeroUnidades) as unidadesSurtidas from facturasordenes where folioPedido = '".$folio."'";
                                $respuesta = mysqli_query($conn,$obtenerDatosFactura ) or die("database error:".mysqli_error($conn));
                                $datos = mysqli_fetch_array($respuesta);

                                $importeSurtido = $datos["importeSurtido"];
                                $unidadesSurtidas = $datos["unidadesSurtidas"];
                                $secciones = $datos["secciones"];

                                $actualizarSurtimientoImportes = "UPDATE facturacionot set secciones = '".$secciones."',importeSurtido = '".number_format($importeSurtido,4,'.', '')."', unidadesSurtidas = '".$unidadesSurtidas."', nivelDeImporte = ('".$importeSurtido."'*100/importeTotal), nivelDeUnidades = ('".$unidadesSurtidas."'*100/unidadesTotales)  where folio = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacenot INNER JOIN facturacionot ON almacenot.folio = facturacionot.folio SET almacenot.sumUnidades = facturacionot.unidadesSurtidas,almacenot.nivelUnidades = facturacionot.nivelDeUnidades,almacenot.importeSurtido = facturacionot.importeSurtido,almacenot.nivelImportes = facturacionot.nivelDeImporte where almacenot.folio = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));
                            }

                        } else{

                        }


                    }
                  	}else{

                  	}
                    


			}

			echo  json_encode("finalizado");		

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
	$obtenerDatos -> ajaxObtenerPedidosNuevos();
}
/*==============================================
OBETENR FACTURAS NUEVAS
==============================================*/
if (isset($_POST["fechaActualFacturas"])) {
	$obtenerDatosFacturas = new AjaxAtencion();
	$obtenerDatosFacturas -> fechaActualFacturas = $_POST["fechaActualFacturas"];
	$obtenerDatosFacturas -> ajaxObtenerFacturasNuevas();
}
/*=============================================
CARGAR PEDIDOS
=============================================*/
if (isset($_POST["listaPedidos"])) {
	
	$cargarPedidos = new AjaxAtencion();
	$cargarPedidos -> listaPedidos = $_POST["listaPedidos"];
	$cargarPedidos -> ajaxCargarPedidos();
}
/*=============================================
CARGAR FACTURAS
=============================================*/
if (isset($_POST["listaFacturas"])) {
	$cargarFacturas = new AjaxAtencion();
	$cargarFacturas -> listaFacturas = $_POST["listaFacturas"];
	$cargarFacturas -> ajaxCargarFacturas();
}