<?php
require_once "controladores/notificaciones.controlador.php";
require_once "modelos/notificaciones.modelo.php";
session_start();

  if(!empty($_POST["guardar"])) {
        $conn = mysqli_connect("127.0.0.1","mat","matriz", "matriz");
        mysqli_set_charset($conn,'utf8');  
        $verificarCliente = "SELECT codigoCliente, nombreCliente FROM clientes WHERE codigoCliente = '".$_POST["codigoClienteCot"]."' AND nombreCliente = '".strtoupper($_POST["nombreClienteCot"])."' ";
        $resultset = mysqli_query($conn, $verificarCliente) or die("database error:". mysqli_error($conn));
        
          if(mysqli_num_rows($resultset)) {

            $conn = mysqli_connect("127.0.0.1","mat","matriz", "matriz");
            mysqli_set_charset($conn,'utf8');  
            $contador = count($_POST["codigo"]);
            $ProContador=0;
            
            $eliminacion = "DELETE FROM cotizaciones where folio = '".$_POST["folioCot"]."'";

            $resultado = mysqli_query($conn, $eliminacion);
            /*
            mysqli_query($conn,"ALTER TABLE cotizaciones DROP id");
            mysqli_query($conn,"ALTER TABLE cotizaciones AUTO_INCREMENT = 1");
            mysqli_query($conn,"ALTER TABLE cotizaciones ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST"); 
            */


            $query = "INSERT INTO cotizaciones (serie,folio,fechaCotizacion,fechaVencimiento,fechaEntrega,empresa,codigoCliente,nombreCliente,rfc,domicilioFiscal,diasCredito,referencia,observaciones,referenciasProd,observacionesProd,metodoPago,formaPago,moneda,tipoCambio,codigoAgente,agenteVenta,codigoProducto,nombreProducto,cantidad, unidad, valorMedida, precio, neto, porcentajeDescuento,descuento,porcentajeDescuento2,descuento2,porcentajeIva, iva, total,usuarioVendedor,cantidadProductos) VALUES ";
            $queryValue = "";
            for($i=0;$i<$contador;$i++) {
              if(!empty($_POST["codigo"][$i]) || !empty($_POST["nombre"][$i]) || !empty($_POST["cantidad"][$i]) || !empty($_POST["unidadMedida"][$i]) || !empty($_POST["valorMedida"][$i]) || !empty($_POST["precio"][$i]) || !empty($_POST["neto"][$i]) || !empty($_POST["porcentajeDescuento"][$i]) || !empty($_POST["descuento"][$i]) || !empty($_POST["porcentajeIva"][$i]) || !empty($_POST["descuentoIva"][$i]) || !empty($_POST["total"][$i])) {
                $ProContador++;
                if($queryValue!="") {
                  $queryValue .= ",";
                }
                $usuario = $_SESSION["nombre"];
                $queryValue .= "('" . $_POST["serieCot"] . "','" . $_POST["folioCot"] . "','" . $_POST["fechaCot"] . "','" . $_POST["vencimientoCot"] . "','" . $_POST["fechaEntregaCot"] . "','" . $_POST["empresaCot"] . "','" . $_POST["codigoClienteCot"] . "','" . strtoupper($_POST["nombreClienteCot"]) . "','" . $_POST["rfcCot"] . "','" . $_POST["domicilioFiscalCot"] . "','" . $_POST["diasCreditoCot"] . "','" . strtoupper($_POST["referenciaCot"]) . "','" . strtoupper($_POST["observacionesCot"]) . "','" . strtoupper($_POST["referencias"][$i]) . "','" . strtoupper($_POST["observaciones"][$i]) . "','" . $_POST["metodoPagoCot"] . "','" . $_POST["formaPagoCot"] . "','" . $_POST["monedaCot"] . "','" . $_POST["tipoCambioCot"] . "','" . $_POST["codigoAgenteCot"] . "','" . $_POST["agenteVentasCot"] . "','" . $_POST["codigo"][$i] . "', '" . $_POST["nombre"][$i] . "', '" .str_replace(',', '', $_POST["cantidad"][$i]). "','" . $_POST["unidadMedida"][$i] . "','" . $_POST["valorMedida"][$i] . "','" . str_replace(',','',$_POST["precio"][$i]). "','" . str_replace(',','',$_POST["neto"][$i]). "','" . $_POST["porcentajeDescuento"][$i] . "','" .str_replace(',','',$_POST["descuento"][$i]). "','" . $_POST["porcentajeDescuento2"][$i] . "','" . str_replace(',','',$_POST["descuento2"][$i]). "','" . $_POST["porcentajeIva"][$i] . "','" . str_replace(',','',$_POST["descuentoIva"][$i]). "','" . str_replace(',','',$_POST["total"][$i]). "','" . $usuario . "','" . $_POST["listasCot"] . "')";
              }
            }
            $sql = $query.$queryValue;


          

            if($ProContador!=0) {
                $resultadocon = mysqli_query($conn, $sql);
              if(!empty($resultadocon)) {

                    $import_status = '?import_status=success';
                    /*============================================= 
                    ACTUALIZAR NOTIFICACIONES NUEVAS COTIZACIONES
                    =============================================*/

                    $traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

                    $nuevaCotizacion = $traerNotificaciones["nuevasCotizaciones"] +1;

                    ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevasCotizaciones", $nuevaCotizacion);
                  }
              }
               unset($_POST['guardar']);

            // Redirecciona a la página que deseas
            header('Location: realizarCotizacion'.$import_status);



          }else {
            $usuario = $_SESSION["nombre"];

              $consultaProspecto = "SELECT codigoProspecto, nombreProspecto,rfc FROM prospectos WHERE rfc = '".$_POST["rfcCot"]."' AND nombreProspecto = '".strtoupper($_POST["nombreClienteCot"])."' ";
              $resultset = mysqli_query($conn, $consultaProspecto) or die("database error:". mysqli_error($conn));
              
                if(mysqli_num_rows($resultset)) {

                  $conn = mysqli_connect("127.0.0.1","mat","matriz", "matriz");
                  mysqli_set_charset($conn,'utf8');  
                  $contador = count($_POST["codigo"]);
                  $ProContador=0;
                  
                  $eliminacion = "DELETE FROM cotizaciones where folio = '".$_POST["folioCot"]."'";

                  $resultado = mysqli_query($conn, $eliminacion);
                  /*
                  mysqli_query($conn,"ALTER TABLE cotizaciones DROP id");
                  mysqli_query($conn,"ALTER TABLE cotizaciones AUTO_INCREMENT = 1");
                  mysqli_query($conn,"ALTER TABLE cotizaciones ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST"); 
                  */


                  $query = "INSERT INTO cotizaciones (serie,folio,fechaCotizacion,fechaVencimiento,fechaEntrega,empresa,codigoCliente,nombreCliente,rfc,domicilioFiscal,diasCredito,referencia,observaciones,referenciasProd,observacionesProd,metodoPago,formaPago,moneda,tipoCambio,codigoAgente,agenteVenta,codigoProducto,nombreProducto,cantidad, unidad, valorMedida, precio, neto, porcentajeDescuento,descuento,porcentajeDescuento2,descuento2,porcentajeIva, iva, total,usuarioVendedor,cantidadProductos) VALUES ";
                  $queryValue = "";
                  for($i=0;$i<$contador;$i++) {
                    if(!empty($_POST["codigo"][$i]) || !empty($_POST["nombre"][$i]) || !empty($_POST["cantidad"][$i]) || !empty($_POST["unidadMedida"][$i]) || !empty($_POST["valorMedida"][$i]) || !empty($_POST["precio"][$i]) || !empty($_POST["neto"][$i]) || !empty($_POST["porcentajeDescuento"][$i]) || !empty($_POST["descuento"][$i]) || !empty($_POST["porcentajeIva"][$i]) || !empty($_POST["descuentoIva"][$i]) || !empty($_POST["total"][$i])) {
                      $ProContador++;
                      if($queryValue!="") {
                        $queryValue .= ",";
                      }
                      $usuario = $_SESSION["nombre"];
                      $queryValue .= "('" . $_POST["serieCot"] . "','" . $_POST["folioCot"] . "','" . $_POST["fechaCot"] . "','" . $_POST["vencimientoCot"] . "','" . $_POST["fechaEntregaCot"] . "','" . $_POST["empresaCot"] . "','" . $_POST["codigoClienteCot"] . "','" . strtoupper($_POST["nombreClienteCot"]) . "','" . $_POST["rfcCot"] . "','" . $_POST["domicilioFiscalCot"] . "','" . $_POST["diasCreditoCot"] . "','" . strtoupper($_POST["referenciaCot"]) . "','" . strtoupper($_POST["observacionesCot"]) . "','" . strtoupper($_POST["referencias"][$i]) . "','" . strtoupper($_POST["observaciones"][$i]) . "','" . $_POST["metodoPagoCot"] . "','" . $_POST["formaPagoCot"] . "','" . $_POST["monedaCot"] . "','" . $_POST["tipoCambioCot"] . "','" . $_POST["codigoAgenteCot"] . "','" . $_POST["agenteVentasCot"] . "','" . $_POST["codigo"][$i] . "', '" . $_POST["nombre"][$i] . "', '" . str_replace(',','',$_POST["cantidad"][$i]). "','" . $_POST["unidadMedida"][$i] . "','" . $_POST["valorMedida"][$i] . "','" .str_replace(',','',$_POST["precio"][$i]). "','" .str_replace(',','',$_POST["neto"][$i]). "','" . $_POST["porcentajeDescuento"][$i] . "','" .str_replace(',','',$_POST["descuento"][$i]) . "','" . $_POST["porcentajeDescuento2"][$i] . "','" . str_replace(',','',$_POST["descuento2"][$i]). "','" . $_POST["porcentajeIva"][$i] . "','" .str_replace(',','',$_POST["descuentoIva"][$i]). "','" . str_replace(',','',$_POST["total"][$i]). "','" . $usuario . "','" . $_POST["listasCot"] . "')";
                    }
                  }
                  $sql = $query.$queryValue;


                

                  if($ProContador!=0) {
                      $resultadocon = mysqli_query($conn, $sql);
                    if(!empty($resultadocon)) {

                          $import_status = '?import_status=success';
                          /*============================================= 
                          ACTUALIZAR NOTIFICACIONES NUEVAS COTIZACIONES
                          =============================================*/

                          $traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

                          $nuevaCotizacion = $traerNotificaciones["nuevasCotizaciones"] +1;

                          ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevasCotizaciones", $nuevaCotizacion);
                        }
                    }
                     unset($_POST['guardar']);

                  // Redirecciona a la página que deseas
                  header('Location: realizarCotizacion'.$import_status);

          }else{
             $conn = mysqli_connect("127.0.0.1","mat","matriz", "matriz");
            mysqli_set_charset($conn,'utf8');  
             $consulta = mysqli_query($conn,'SELECT MAX(codigoProspecto) as codigoProspecto FROM prospectos LIMIT 1');
             $consulta = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
              
               
            $codigoProspecto = (empty($consulta['codigoProspecto']) ? 1 : $consulta['codigoProspecto']+=1);
            $nuevoProspecto = "INSERT INTO prospectos (codigoProspecto, rfc, nombreProspecto,agenteContactado) VALUES ('".$codigoProspecto."','".$_POST["rfcCot"]."', '".strtoupper($_POST["nombreClienteCot"])."','".$usuario."')";

            $resultadoProspecto = mysqli_query($conn, $nuevoProspecto);
              if(!empty($resultadoProspecto)) {
                    /*============================================= 
                    ACTUALIZAR NOTIFICACIONES NUEVAS COTIZACIONES
                    =============================================*/

                    $traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

                    $nuevosProspectos = $traerNotificaciones["nuevosProspectos"] +1;

                    ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevosProspectos", $nuevosProspectos);
                  }

                $conn = mysqli_connect("127.0.0.1","mat","matriz", "matriz");
                mysqli_set_charset($conn,'utf8');  
                $contador = count($_POST["codigo"]);
                $ProContador=0;
                
                $eliminacion = "DELETE FROM cotizaciones where folio = '".$_POST["folioCot"]."'";

                $resultado = mysqli_query($conn, $eliminacion);
                /*
                mysqli_query($conn,"ALTER TABLE cotizaciones DROP id");
                mysqli_query($conn,"ALTER TABLE cotizaciones AUTO_INCREMENT = 1");
                mysqli_query($conn,"ALTER TABLE cotizaciones ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST"); 
                */
              

                $query = "INSERT INTO cotizaciones (serie,folio,fechaCotizacion,fechaVencimiento,fechaEntrega,empresa,codigoCliente,nombreCliente,rfc,domicilioFiscal,diasCredito,referencia,observaciones,referenciasProd,observacionesProd,metodoPago,formaPago,moneda,tipoCambio,codigoAgente,agenteVenta,codigoProducto,nombreProducto,cantidad, unidad, valorMedida, precio, neto, porcentajeDescuento,descuento,porcentajeDescuento2,descuento2,porcentajeIva, iva, total,usuarioVendedor,cantidadProductos) VALUES ";
                $queryValue = "";
                for($i=0;$i<$contador;$i++) {
                  if(!empty($_POST["codigo"][$i]) || !empty($_POST["nombre"][$i]) || !empty($_POST["cantidad"][$i]) || !empty($_POST["unidadMedida"][$i]) || !empty($_POST["valorMedida"][$i]) || !empty($_POST["precio"][$i]) || !empty($_POST["neto"][$i]) || !empty($_POST["porcentajeDescuento"][$i]) || !empty($_POST["descuento"][$i]) || !empty($_POST["porcentajeIva"][$i]) || !empty($_POST["descuentoIva"][$i]) || !empty($_POST["total"][$i])) {
                    $ProContador++;
                    if($queryValue!="") {
                      $queryValue .= ",";
                    }
                    $usuario = $_SESSION["nombre"];
                    $queryValue .= "('" . $_POST["serieCot"] . "','" . $_POST["folioCot"] . "','" . $_POST["fechaCot"] . "','" . $_POST["vencimientoCot"] . "','" . $_POST["fechaEntregaCot"] . "','" . $_POST["empresaCot"] . "','" . $codigoProspecto . "','" . strtoupper($_POST["nombreClienteCot"]) . "','" . $_POST["rfcCot"] . "','" . $_POST["domicilioFiscalCot"] . "','" . $_POST["diasCreditoCot"] . "','" . strtoupper($_POST["referenciaCot"]) . "','" . strtoupper($_POST["observacionesCot"]) . "','" . strtoupper($_POST["referencias"][$i]) . "','" . strtoupper($_POST["observaciones"][$i]) . "','" . $_POST["metodoPagoCot"] . "','" . $_POST["formaPagoCot"] . "','" . $_POST["monedaCot"] . "','" . $_POST["tipoCambioCot"] . "','" . $_POST["codigoAgenteCot"] . "','" . $_POST["agenteVentasCot"] . "','" . $_POST["codigo"][$i] . "', '" . $_POST["nombre"][$i] . "', '" . str_replace(',','',$_POST["cantidad"][$i]) . "','" . $_POST["unidadMedida"][$i] . "','" . $_POST["valorMedida"][$i] . "','" . str_replace(',','',$_POST["precio"][$i]). "','" .str_replace(',','',$_POST["neto"][$i]). "','" . $_POST["porcentajeDescuento"][$i] . "','" . str_replace(',','',$_POST["descuento"][$i]). "','" . $_POST["porcentajeDescuento2"][$i] . "','" .str_replace(',','',$_POST["descuento2"][$i]). "','" . $_POST["porcentajeIva"][$i] . "','" .str_replace(',','',$_POST["descuentoIva"][$i]) . "','" . str_replace(',','',$_POST["total"][$i]). "','" . $usuario . "','" . $_POST["listasCot"] . "')";
                  }
                }
                $sql = $query.$queryValue;


              

                if($ProContador!=0) {
                    $resultadocon = mysqli_query($conn, $sql);
                  if(!empty($resultadocon)) {

                        $import_status = '?import_status=success';
                        /*============================================= 
                        ACTUALIZAR NOTIFICACIONES NUEVAS COTIZACIONES
                        =============================================*/

                        $traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

                        $nuevaCotizacion = $traerNotificaciones["nuevasCotizaciones"] +1;

                        ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevasCotizaciones", $nuevaCotizacion);
                      }
                  }
                   unset($_POST['guardar']);

                // Redirecciona a la página que deseas
                header('Location: realizarCotizacion'.$import_status);



             }
            


          }

            
          


        }


    
     
?>