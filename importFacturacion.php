<?php
    include_once("db_connect.php");
    if(isset($_POST['import_data'])){
    
        $file_mimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values', 
            'application/octet-stream', 
            'application/vnd.ms-excel', 
            'application/x-csv', 
            'text/x-csv', 
            'text/csv', 
            'application/csv', 
            'application/excel', 
            'application/vnd.msexcel'
        );
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){

            if(is_uploaded_file($_FILES['file']['tmp_name'])){

                $csv_file = fopen($_FILES['file']['tmp_name'], 'r');

                while(($emp_record = fgetcsv($csv_file,10000, ",")) !== FALSE){
                    
                    $validacion = str_replace(" ","",$emp_record[9]);
                    /*
                    $serie1 = substr($validacion, 0,-4);
                    $folio1 = substr($validacion, 4,4);

                    if (strlen($serie1) == 4 || strlen($folio1) == 4) {
                        $serie = substr($validacion, 0,-4);
                        $folio = substr($validacion, 4,4);
                    }else if(strlen($serie1) == 4 || strlen($folio1) == 2){                     
                        $serie =substr($validacion, 0,-2);
                        $folio =substr($validacion, 4,2);
                    }else if(strlen($serie1) == 4 || strlen($folio1) == 3){
                        $serie =substr($validacion, 0,-3);
                        $folio =substr($validacion, 4,3);
                    }
                    */
                     $serie1 = substr($validacion, 0,-5);
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
                    }
                    if ($serie != "OTRT") {

                        $sql_query = "SELECT idPedido FROM facturacion WHERE idPedido = '".$folio."'";
                        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                
                        if(mysqli_num_rows($resultset)) {
                                                    
                            $importeFactura1 = str_replace(',', '', $emp_record[2]);
                            $neto = $importeFactura1/1.16;
                            $impuesto = $neto*0.16;
                            $total = $impuesto+$neto;
                            $estatus = 'Vigente';
                            $estatusFactura = 1;
                            $serieFactura = $emp_record[0];

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
                            
                            $folioFc = str_replace(',','',$emp_record[1]);
                            $folioFactura = $folioFc;
                            $fechaFactura = DateTime::createFromFormat('d/m/Y', $emp_record[6])->format('Y-m-d');
                            $fechaVencimiento = DateTime::createFromFormat('d/m/Y', $emp_record[7])->format('Y-m-d');
                            $fechaCobro = $fechaVencimiento;
                            
                            $formaPago = 'EFECTIVO';

                            $verificacionFactura = "SELECT serie, folio from facturasgenerales where serie = '".$serieFactura."' && folio = '".$folioFactura."' && folioPedido = '".$folio."'";
                            $resultado = mysqli_query($conn, $verificacionFactura) or die("database error:". mysqli_error($conn));

                            $nameClient = utf8_encode(trim($emp_record[8]));
                            $obtenerDatosClient = "SELECT codigoCliente AS codigoCliente, rfc AS rfc, statusCliente AS statusCliente, diasCredito AS diasCredito FROM clientes WHERE nombreCliente = '".$nameClient."'";
                            $respuestaClient = mysqli_query($conn,$obtenerDatosClient ) or die("database error:".mysqli_error($conn));
                            $datosClient = mysqli_fetch_array($respuestaClient);

                            $codigoCliente = $datosClient["codigoCliente"];
                            $rfc = $datosClient["rfc"];
                            $statusCliente =$datosClient["statusCliente"];
                            $diasCredito = $datosClient["diasCredito"];

                            if(mysqli_num_rows($resultado)){

                                $actualizacionFactura = "UPDATE facturasgenerales SET concepto = '".$concepto."', importeFactura = '".str_replace(',','',$emp_record[2])."',numeroUnidades = '".$emp_record[4]."',unidadesPendientes = '".$emp_record[4]."',pendiente = '".str_replace(',','',$emp_record[5])."',fechaFactura = '".$fechaFactura."', fechaVencimiento = '".$fechaVencimiento."',fechaCobro = '".$fechaCobro."',codigoCliente = '".$codigoCliente."',rfc = '".$rfc."',statusCliente = '".$statusCliente."',diasCredito = '".$diasCredito."',nombreCliente = '".$nameClient."', neto = '".number_format($neto,4,'.', '')."', impuesto = '".number_format($impuesto,4,'.', '')."', total ='".number_format($total,4,'.', '')."', estatus = '".$estatus."', formaPago = '".$formaPago."', agente = '".$agente."' where serie = '".$serieFactura."' and folio = '".$folioFactura."' and folioPedido = '".$folio."'";
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

                                $actualizarSurtimientoImportes = "UPDATE facturacion set secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100)  where idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido SET almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

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
                           
                                $sql_update = "INSERT INTO facturasgenerales(seriePedido,folioPedido,concepto,serie,folio,importeFactura,estatusFactura,numeroUnidades,unidadesPendientes,pendiente,fechaFactura,fechaVencimiento,codigoCliente,rfc,statusCliente,diasCredito,nombreCliente,numFactura,neto,impuesto,total,estatus,formaPago, agente) VALUES('".$serie."','".$folio."','".$concepto."','".$emp_record[0]."','".str_replace(',','',$emp_record[1])."','".str_replace(',','',$emp_record[2])."',$estatusFactura,'".$emp_record[4]."','".$emp_record[4]."','".str_replace(',','',$emp_record[5])."','".$fechaFactura."','".$fechaVencimiento."','".$codigoCliente."','".$rfc."','".$statusCliente."','".$diasCredito."','".$nameClient."','".$numeroFactura."','".number_format($neto,4,'.', '')."','".number_format($impuesto,4,'.', '')."','".number_format($total,4,'.', '')."','".$estatus."','".$formaPago."','".$agente."')";
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

                                 $actualizarSurtimientoImportes = "UPDATE facturacion set secciones = '".$secciones."',partSurt = '".$partidasSurtidas."',importSurt = '".number_format($importeSurtido,4,'.', '')."', unidSurt = '".$unidadesSurtidas."', nivelSumCosto = (('".$importeSurtido."'/importeInicial)*100), nivelDeSum = (('".$unidadesSurtidas."'/unidSurt)*100)  where idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarSurtimientoImportes) or die("database error:".mysqli_error($conn));

                                $actualizarNivelesAlmacen = "UPDATE almacen INNER JOIN facturacion ON almacen.idPedido = facturacion.idPedido SET almacen.sumUnidades = facturacion.unidSurt,almacen.nivelDeSum = facturacion.nivelDeSum,almacen.importeSurtido = facturacion.importSurt,almacen.nivelSumCosto = facturacion.nivelSumCosto where almacen.idPedido = '".$folio."'";
                                mysqli_query($conn, $actualizarNivelesAlmacen) or die("database error:".mysqli_error($conn));

                            }

                        } else{

                        }

                    }else{
                        
                        $sql_query = "SELECT folio, estatusFactura, cliente FROM facturacionot WHERE folio = '".$folio."'";
                        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                
                        if(mysqli_num_rows($resultset)) {
                            
                            $importeFactura1 = str_replace(',', '', $emp_record[2]);
                            $neto = $importeFactura1/1.16;
                            $impuesto = $neto*0.16;
                            $total = $impuesto+$neto;

                            $validacion = str_replace(" ","",$emp_record[9]);
                            $estatus = 'Vigente';
                            $estatusFactura = 1;
                            $serieFactura = $emp_record[0];

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
                            
                            
                            $folioFc = str_replace(',','',$emp_record[1]);
                            $folioFactura = $folioFc;
                            $fecha = DateTime::createFromFormat('d/m/Y', $emp_record[6])->format('Y-m-d');
                            $fechaFactura = $fecha;
                            $fechaVencimiento = DateTime::createFromFormat('d/m/Y', $emp_record[7])->format('Y-m-d');
                            $fechaCobro = $fechaVencimiento;

                            $formaPago = 'EFECTIVO';

                            $verificacionFactura = "SELECT serie, folio from facturasordenes where serie = '".$serieFactura."' && folio = '".$folioFactura."'";
                            $resultado = mysqli_query($conn, $verificacionFactura) or die("database error:". mysqli_error($conn));

                            $nameClient = utf8_encode(trim($emp_record[8]));
                            $obtenerDatosClient = "SELECT codigoCliente AS codigoCliente, rfc AS rfc, statusCliente AS statusCliente, diasCredito AS diasCredito FROM clientes WHERE nombreCliente = '".$nameClient."'";
                            $respuestaClient = mysqli_query($conn,$obtenerDatosClient ) or die("database error:".mysqli_error($conn));
                            $datosClient = mysqli_fetch_array($respuestaClient);

                            $codigoCliente = $datosClient["codigoCliente"];
                            $rfc = $datosClient["rfc"];
                            $statusCliente =$datosClient["statusCliente"];
                            $diasCredito = $datosClient["diasCredito"];

                            if(mysqli_num_rows($resultado)){

                                $actualizacionFactura = "UPDATE facturasordenes SET concepto = '".$concepto."', importeFactura = '".str_replace(',','',$emp_record[2])."',numeroUnidades = '".$emp_record[4]."', unidadesPendientes = '".$emp_record[4]."',pendiente = '".str_replace(',','',$emp_record[5])."',fecha = '".$fecha."',fechaFactura = '".$fechaFactura."', fechaVencimiento = '".$fechaVencimiento."',fechaCobro = '".$fechaCobro."', codigoCliente = '".$codigoCliente."',rfc = '".$rfc."',statusCliente = '".$statusCliente."',diasCredito = '".$diasCredito."', nombreCliente = '".$nameClient."', neto = '".number_format($neto,4,'.', '')."', impuesto = '".number_format($impuesto,4,'.', '')."', total ='".number_format($total,4,'.', '')."', estatus = '".$estatus."',formaPago = '".$formaPago."', agente = '".$agente."' where serie = '".$serieFactura."' and folio = '".$folioFactura."'";

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
                           
                                $sql_update = "INSERT INTO facturasordenes(concepto,seriePedido,folioPedido,serie,folio,importeFactura,estatusFactura,unidadesPendientes,pendiente,fecha,fechaFactura,fechaVencimiento,fechaCobro,codigoCliente,rfc,statusCliente,diasCredito,nombreCliente,numFactura,neto,impuesto,total,estatus,formaPago,agente) VALUES('".$concepto."','OTRM','".$folio."','".$emp_record[0]."','".str_replace(',','',$emp_record[1])."','".str_replace(',','',$emp_record[2])."','".$estatusFactura."','".$emp_record[4]."','".str_replace(',','',$emp_record[5])."','".$fecha."','".$fechaFactura."','".$fechaVencimiento."','".$fechaCobro."','".$codigoCliente."','".$rfc."','".$statusCliente."','".$diasCredito."','".$nameClient."','".$numeroFactura."','".number_format($neto,4,'.', '')."','".number_format($impuesto,4,'.', '')."','".number_format($total,4,'.', '')."','".$estatus."','".$formaPago."','".$agente."')";
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
                }
                fclose($csv_file);
                $import_status = '?import_status=success';
            } else {
                $import_status = '?import_status=error';
            }
        } else {
        $import_status = '?import_status=invalid_file';
        }
    }
    header("Location: facturacion".$import_status);
?>