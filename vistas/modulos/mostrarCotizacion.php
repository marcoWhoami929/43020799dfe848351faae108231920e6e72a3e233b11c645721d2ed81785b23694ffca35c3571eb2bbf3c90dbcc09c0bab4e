<?php ob_start(); ?>
<?php

function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $mes.' '.$num.' '.$anno;
}
 
function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
           
            .logo{
                width: 200px;
            }
            .address{
                display: inline;
                width: 100px;
                padding: 0px;
                margin:0px;
                padding-left: 20px;
                border: 1px solid red;
            }
            .titulo{
                font-size: 17px;
                font-weight: bold;
                text-align: left;
                font-family: Helvetica, Sans-Serif;

            }
            .cotizacion{
                font-size: 15px;
                font-weight: bold;
                text-align: right;
                font-family: Helvetica, Sans-Serif;
                color: #30AB4F;
                margin-right: 28px;

            }
            .statusCotizacion{
                font-size: 15px;
                font-weight: bold;
                text-align: right;
                font-family: Helvetica, Sans-Serif;
                color: #30AB4F;
                margin-right: -100px;
                margin-left: -100px;

            }
            .rfc{
                color: #0362CE;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                text-align: left;
                margin-left: -70px;
            }
            .dir1{
                color: #0362CE;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                margin-left: -70px;
            }
            .matriz{
                color: #0362CE;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                margin-left: -70px;
            }
            .matriz1{
                color: #000000;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                margin-left: 10px;
            }
            .direccion{
                color: #000000;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                margin-left: -70px;

            }
            .direccion1{
                color: #000000;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                margin-left: -70px;

            }
            .direccion2{
                color: #000000;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                margin-left: -70px;

            }
            .nroPedido{
                color: #0362CE;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                margin-left: 200px;
            }
            .pedido{
                color: #0362CE;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
                margin-left: 50px;
            }
            .numFolio{
                color: black;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 12px;
            }
            .expedicion{
                color: black;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 8px;
            }
            .fechaExpedicion{
                color: black;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 8px;
            }
            .fecha-exp{
                color: black;
                font-family: Helvetica, Sans-Serif;
                font-weight: lighter;
                font-size: 9px;
            }
            .table th, .table td{
                border: none;
            }

            .table tbody td{
                height: 40px;
                text-align: left;
            }
            .vl {
                border-left: 2px solid;
                height: 78px;
                z-index: 101;
                color: #ABABAB;
                margin-top: -38px;
                margin-left: 500px;
            }
            .v2{
                border-left: 1px solid;
                width: 100%;
                height: 0.5px;
                z-index: 101;
                color: #ABABAB;
                margin-top: -40px;
                margin-left: 0px;
            }
            
            hr{
                border-style: solid;
                border-width: 1px;
                color: #ABABAB;
            }
            hr.style-one {
                border: 0;
                height: 1px;
                background: #ABABAB;
            
                }

        </style>
    
    </head>
    <body>
        <?php
            session_start();
                require_once __DIR__ . "../../../controladores/cotizaciones.controlador.php";
                require_once __DIR__ . "../../../modelos/cotizaciones.modelo.php";
            
            if (isset($_GET["folio3"])) {
                 $folio = $_GET["folio3"];
            }else{
                 $folio = $_GET["folio"];
            }
           

            $item = "folio";
            $valor = $folio;

            $cotizaciones = ControladorCotizaciones::ctrMostrarCotizacionesPdf($item, $valor);
            foreach ($cotizaciones as $value) {
                    
                    $codigoCliente = $value["codigoCliente"];
                    $rfc = $value["rfc"];
                    $fecha = $value["fechaVencimiento"];
                    list($day, $mouth, $year) = explode('/', $fecha);
                    $aux_date=$year."/".$mouth."/".$day;
                    $new_date=date("d-m-Y",strtotime($aux_date));
                    $fechaVencimientoC = obtenerFechaEnLetra($new_date);
                    $fechaElaboracion = $value["fechaElaboracion"];
                    $observaciones = $value["observaciones"];
                    $referencia = $value["referencia"];
                    $metodoPago = $value["formaPago"];
                    $fechaEntrega = $value["fechaEntrega"];
                    


                        $item = "rfc";
                        $valor = $rfc;
                        $cliente = ControladorCotizaciones::ctrMostrarClientes($item, $valor);

                        $filas = count($cliente);

                        if ($rfc != "") {

                             if ($filas == 1) {


                                foreach ($cliente as $value2) {
                                    $nombreCliente = $value2["nombreCliente"];
                                    $rfc = $value2["rfc"];
                                    $domicilioFiscal = $value["domicilioFiscal"];
                                    $separadoDomicilio = explode(",",$domicilioFiscal);
                                    $numeroInterior = $separadoDomicilio[1];
                                    $domicilio = $separadoDomicilio[0].$numeroInterior;
                                    $colonia = $separadoDomicilio[3];
                                    //$colonia = utf8_decode($separadoDomicilio[3]);
                                    $municipio = utf8_decode($separadoDomicilio[4]);
                                    $ciudad = $separadoDomicilio[6];
                                    $estado = utf8_decode($separadoDomicilio[5]);
                                    $pais = $separadoDomicilio[7];
                                    $diasCredito = $value2["diasCredito"];
                                    $telefono = $value2["telefono"];
                                    $cp = $value2["cp"];
                                }
                            
                        }else {

                            
                            $nombreCliente = $value["nombreCliente"];
                            $rfc = $value["rfc"];
                            $domicilioFiscal = $value["domicilioFiscal"];
                            $separadoDomicilio = explode(",",$domicilioFiscal);
                            $numeroInterior = $separadoDomicilio[1];
                            $domicilio = $separadoDomicilio[0].$numeroInterior;
                            $colonia = $separadoDomicilio[3];
                            //$colonia = utf8_decode($separadoDomicilio[3]);
                            $municipio = $separadoDomicilio[4];
                            $ciudad = $separadoDomicilio[6];
                            $estado = utf8_decode($separadoDomicilio[5]);
                            $pais = $separadoDomicilio[7];
                            $diasCredito = $value["diasCredito"];
                            $telefono = "";
                            $cp = "";
                        

                        }

                            
                        }else {
                            $nombreCliente = $value["nombreCliente"];
                            $rfc = "";
                            $domicilioFiscal = ""; 
                            $numeroInterior = "";
                            $domicilio = "";
                            $colonia = "";
                            $municipio = "";
                            $ciudad = "";
                            $estado = "";
                            $pais = "";
                            $diasCredito = "0";
                            $telefono = "";
                            $cp = "";
                        }

            }
         



        ?>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>
                        <b class="titulo">PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.</b>
                    </th>
                    <th>
                        <b class="cotizacion">COTIZACION</b>
                    </th>
                     <th>
                        <?php
                        $item = "folio";
                        $valor = $folio;
                        $consultaStatus = ControladorCotizaciones::ctrMostrarCotizacionesPdf($item, $valor);
                        foreach ($consultaStatus as $value) {
                            $estatusCotizacion = $value["cancelada"];
                            if ($estatusCotizacion == 1) {
                                echo '<th><b class="statusCotizacion" style="color:red;">CANCELADA</b></th>';
                            }else {
                                echo '<th><b class="statusCotizacion">ACTIVA</b></th>';
                            }
                        }
                        ?>
                    </th>
                    
                </tr>
            </thead>
        </table>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>
                        <img class="logo" src="../img/plantilla/logo.png" />
                    </th>
                    <th>
                        <b class="rfc">PCP970822467</b> <b class="nroPedido">Serie:<b class="numFolio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMA</b></b>
                        <br>
                        <b class="dir1">Régimen General de Ley Personas Morales</b>  <b class="pedido">Folio: <b class="numFolio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $folio ?></b></b>
                        <br>
                        <b class="matriz">Matriz:</b><b class="matriz1">Libertad 5973</b>
                        <br>
                        <b class="direccion"><strong class="direccion" style="font-weight: bold;">Col.</strong>San Baltazar Campeche <strong>C.P</strong> 72550 <strong>Localidad</strong> Puebla</b>
                        <br>
                        <b class="direccion1">(Heroica Puebla) <strong>Municipio</strong> Puebla</b>
                        <br>
                        <b class="direccion2"><strong  class="direccion2" style="font-weight: bold;">Estado</strong> Puebla <strong>País</strong> México</b>
                        <br>
                    </th>
                    
                    
                </tr>
            </thead>
        </table>
        <br>
        <table style="width: 100%">
            
            <thead>
                <tr>
                    <th>
                        <b class="expedicion"><strong class="expedicion" style="font-weight: bold;color: #0362CE;">Lugar de Expedición:</strong> Ejido No. 5970 Int No. A,B,C. <strong>Col.</strong> San Baltazar Linda Vista. <strong>C.P.</strong> 72550 <strong>Localidad</strong> Puebla(Heroica</b>
                        <br>
                        <b class="expedicion">Puebla) <strong>Municipio</strong> Puebla <strong>Estado</strong> Puebla <strong>País</strong> México <strong>Tels.</strong> 248 86 04 - 245 53 65 - 264 50 94 - 244 29 33 - 245 04 27</b>
                    </th>

                    <th>
                        <b class="fechaExpedicion" style="font-weight: bold;color: #0362CE;"><strong> Fecha y Hora de Expedición:</strong> <b class="fecha-exp"><?php echo $fechaElaboracion; ?></b></b>
                    </th>
                </tr>
            </thead>
        </table>
        <hr >
        <table style="width: 100%">
            <thead>
                <tr>
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Código Cliente:</b><br>
                        <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;"><?php echo $codigoCliente ?></b>
                    </th>
                    <th>
                        
                    </th>
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Días de Crédito:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;"><?php echo $diasCredito ?> Días</b>
                    </th>
                    <th>
                        
                    </th>
                    <th>
                        
                    </th>
                    <th>
                        
                    </th>
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Fecha de Vencimiento:</b><br>
                        <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: capitalize;"><?php echo $fechaVencimientoC ?></b>
                    </th>
                    <th>
                            
                        </th>
                        <th>
                            
                        </th>

                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Método Pago: </b><b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $metodoPago ?></b>
                    </th>
                    <th>
                            
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>

                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Núm Cuenta:</b><b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"> NO IDENTIFICADO</b>
                    </th>
                </tr>
            </thead>
        </table>
        <hr >
        <table style="width: 100%">
            <thead>
                <tr>
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Cliente:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombreCliente ?></b>
                        <br>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Domicilio:</b>
                        <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo str_replace ("Ñ", "&Ntilde;" ,$domicilio) ?></b>
                        <br>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Colonia:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $colonia  ?>
                        </b>
                    </th>
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left:-120px;" >RFC:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rfc ?>
                        </b>
                        <br>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left:-120px;" >Tels:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $telefono ?>
                        </b>
                        <br>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left:-120px;" >C.P.</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $cp ?>
                        </b>
                    </th>
                </tr>
            </thead>
        </table>
        <hr >
        <table style="width: 100%">
            <thead>
                <tr>
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Municipio:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $municipio  ?></b>
                    </th>
                        
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left: -50px;" >Ciudad:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $ciudad  ?></b>
                    </th>

                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left: -50px;" >Estado:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $estado  ?></b>
                    </th>
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left: -50px;" >País:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $pais  ?></b>
                    </th>
                </tr>
            </thead>
        </table>
        <hr >
            <table style="width: 100%">
            <thead>
                <tr>
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Observaciones: </b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $observaciones  ?></b>
                    </th>
                     <!--======================
                    |   HECHO POR DIEGO-PC   |
                    =======================-->
                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Fecha de Entrega: </b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $fechaEntrega  ?></b>
                    </th>
                    <!--=====================
                    *************************
                    ======================-->

                    <th>
                        <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;" >Referencia: </b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $referencia  ?></b>
                    </th>
                </tr>
            </thead>
        </table>
        <hr >
        <table class="table" style="width: 100%" cellspacing="0">
            <thead>
                <tr class="row datos" style="background: #D9D4D4" >
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;height: 45px">Cantidad</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Unidad</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Código</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Descripción</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Precio Unitario</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Importe</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">%Descto.</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Descto.</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">%Descto2.</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Descto2.</th>
                    <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Importe Total</th>
                </tr>
            </thead>

            <tbody style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">
                <?php
                    require_once __DIR__ . '../../../vistas/modulos/conversor.php';

                    if (isset($_GET["folio3"])) {

                        $folioCotizacion = $_GET["folio3"];

                    }else{

                        $folioCotizacion = $_GET["folio"];
                        
                    }
                    

                    $item2 = "folio";
                    $valor2 = $folioCotizacion;
                    $productos =  ControladorCotizaciones::ctrProductosCotizacion($item2,$valor2);
                    $productosTotales =  ControladorCotizaciones::ctrProductosCotizacionTotales($item2,$valor2);


                        foreach ($productos as $producto) {
                            foreach ($productosTotales as $productoTotal) {

                                if ($producto['unidad'] == 'L1') {

                                    $valorUnidad = "1 LT";

                                }else if ($producto['unidad'] == '106') {

                                    $valorUnidad = "106.6 MT";

                                }else if ($producto['unidad'] == 'L12') {

                                    $valorUnidad = "12 LT";

                                }else if ($producto['unidad'] == '121') {

                                    $valorUnidad = "121.9 MT";

                                }else if ($producto['unidad'] == 'L51') {

                                    $valorUnidad = "15.14 MT";

                                }else if ($producto['unidad'] == 'L52') {

                                    $valorUnidad = "15.2 LT";

                                }else if ($producto['unidad'] == 'L16') {

                                    $valorUnidad = "16 LT";

                                }else if ($producto['unidad'] == 'L68') {

                                    $valorUnidad = "16.85 LT";

                                }else if ($producto['unidad'] == 'L74') {

                                    $valorUnidad = "17.44 LT";

                                }else if ($producto['unidad'] == 'L18') {

                                    $valorUnidad = "18 LT";

                                }else if ($producto['unidad'] == 'L82') {

                                    $valorUnidad = "18.2 LT";

                                }else if ($producto['unidad'] == '18') {

                                    $valorUnidad = "18.3 MT";

                                }else if ($producto['unidad'] == 'L84') {

                                    $valorUnidad = "18.48 LT";

                                }else if ($producto['unidad'] == 'L89') {

                                    $valorUnidad = "18.925 LT";

                                }else if ($producto['unidad'] == 'L94') {

                                    $valorUnidad = "18.94 LT";

                                }else if ($producto['unidad'] == 'L9') {

                                    $valorUnidad = "19 LT";

                                }else if ($producto['unidad'] == 'L92') {

                                    $valorUnidad = "19.2 LT";

                                }else if ($producto['unidad'] == 'L95') {

                                    $valorUnidad = "19.5 LT";

                                }else if ($producto['unidad'] == 'L99') {

                                    $valorUnidad = "19.94 LT";

                                }else if ($producto['unidad'] == 'T96') {

                                    $valorUnidad = "196 LT";

                                }else if ($producto['unidad'] == 'K20') {

                                    $valorUnidad = "20 KG";

                                }else if ($producto['unidad'] == 'L20') {

                                    $valorUnidad = "20 LT";

                                }else if ($producto['unidad'] == 'TB') {

                                    $valorUnidad = "200 LT";

                                }else if ($producto['unidad'] == '200') {

                                    $valorUnidad = "200 MT";

                                }else if ($producto['unidad'] == 'TB8') {

                                    $valorUnidad = "208 LT";

                                }else if ($producto['unidad'] == 'M22') {

                                    $valorUnidad = "225 ML";

                                }else if ($producto['unidad'] == '228') {

                                    $valorUnidad = "228.6";

                                }else if ($producto['unidad'] == 'M23') {

                                    $valorUnidad = "235 ML";

                                }else if ($producto['unidad'] == 'M27') {

                                    $valorUnidad = "237 ML";

                                }else if ($producto['unidad'] == 'M25') {

                                    $valorUnidad = "250 ML";

                                }else if ($producto['unidad'] == 'L3') {

                                    $valorUnidad = "3 LT";

                                }else if ($producto['unidad'] == 'L32') {

                                    $valorUnidad = "3.2 LT";

                                }else if ($producto['unidad'] == 'L34') {

                                    $valorUnidad = "3.42 LT";

                                }else if ($producto['unidad'] == 'L36') {

                                    $valorUnidad = "3.69 LT";

                                }else if ($producto['unidad'] == 'L37') {

                                    $valorUnidad = "3.785 LT";

                                }else if ($producto['unidad'] == 'L38') {

                                    $valorUnidad = "3.8 LT";

                                }else if ($producto['unidad'] == 'K4') {

                                    $valorUnidad = "4 KG";

                                }else if ($producto['unidad'] == 'L4') {

                                    $valorUnidad = "4 LT";

                                }else if ($producto['unidad'] == 'M47') {

                                    $valorUnidad = "473 ML";

                                }else if ($producto['unidad'] == 'G50') {

                                    $valorUnidad = "500 GR";

                                }else if ($producto['unidad'] == 'M5') {

                                    $valorUnidad = "500 ML";

                                }else if ($producto['unidad'] == 'M56') {

                                    $valorUnidad = "561 ML";

                                }else if ($producto['unidad'] == 'L6') {

                                    $valorUnidad = "6 LT";

                                }else if ($producto['unidad'] == '66') {

                                    $valorUnidad = "66 MT";

                                }else if ($producto['unidad'] == 'M75') {

                                    $valorUnidad = "750 ML";

                                }else if ($producto['unidad'] == 'M80') {

                                    $valorUnidad = "800 ML";

                                }else if ($producto['unidad'] == 'M90') {

                                    $valorUnidad = "900 ML";

                                }else if ($producto['unidad'] == 'M94') {

                                    $valorUnidad = "946 ML";

                                }else if ($producto['unidad'] == 'M96') {

                                    $valorUnidad = "960 ML";

                                }else if ($producto['unidad'] == 'GR') {

                                    $valorUnidad = "GR";

                                }else if ($producto['unidad'] == 'KG') {

                                    $valorUnidad = "KG";

                                }else if ($producto['unidad'] == 'LT') {

                                    $valorUnidad = "LT";

                                }else if ($producto['unidad'] == 'ML') {

                                    $valorUnidad = "ML";

                                }else if ($producto['unidad'] == 'MT') {

                                    $valorUnidad = "MT";

                                }else if ($producto['unidad'] == 'PZ') {

                                    $valorUnidad = "PZ";

                                }else if ($producto['unidad'] == 'R19') {

                                    $valorUnidad = "ROLLO 19 PZ";

                                }else if ($producto['unidad'] == 'R29') {

                                    $valorUnidad = "ROLLO 29 PZ";

                                }else if ($producto['unidad'] == 'R60') {

                                    $valorUnidad = "ROLLO 60 PZ";

                                }else if ($producto['unidad'] == 'SRV') {

                                    $valorUnidad = "SERVICIO";

                                }else {

                                    $valorUnidad = $producto["unidad"];
                                }

                                if ($producto['observacionesProd'] == "") {
                                    
                                    $observacionesProd = "";

                                }else{

                                    $observacionesProd = $producto['observacionesProd'];

                                }
                                 if ($producto['referenciasProd'] == "") {
                                    
                                    $referenciasProd = "";

                                }else{

                                    $referenciasProd = $producto['referenciasProd'];

                                }


                                 echo "<tr>

                                <td style='height:10px'>".number_format($producto['cantidad'],3)."</td>
                                <td style='height:10px'>".$valorUnidad."</td>
                                <td style='height:10px'>".$producto['codigoProducto']."</td>
                                <td style='height:10px;padding-top:23px;'>".$producto['nombreProducto'].'<br>'.$observacionesProd.'<br>'.$referenciasProd."</td>
                                <td style='text-align:right;height:10px;'>".number_format($producto['precio'],4)."</td>
                                <td style='text-align:right;height:10px;'>".number_format($producto['neto'],2)."</td>
                                <td style='text-align:right;height:10px;'>".number_format($producto['porcentajeDescuento'],2)." %</td>
                                <td style='text-align:right;height:10px;'>".number_format($producto['descuento'],2)."</td>
                                <td style='text-align:right;height:10px;'>".number_format($producto['porcentajeDescuento2'],2)." %</td>
                                <td style='text-align:right;height:10px;'>".number_format($producto['descuento2'],2)."</td>
                                <td style='text-align:right;height:10px;'>".number_format(($producto['total'] - $producto['iva']),2)."</td>
                                </tr>";
                                echo "<tr>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>
                                <td style='height:0.20px'><hr class='style-one'></td>


                                </tr>";

                                

                                $subtotal = number_format($productoTotal["neto_productos"],2);
                                $totalDescuentos = number_format($productoTotal["descuento_productos"]+$productoTotal["descuento_productos2"],2);
                                $totalImpuestos = number_format($productoTotal["iva_productos"],2);
                                $totalGeneral = number_format($productoTotal["total_productos"],2);

                                $numero = $totalGeneral;
                                $resultado = convertir($numero);

                                $productosArreglo[] = $producto['nombreProducto'];
                                $codigosArreglo[] = $producto['codigoProducto'];
                                $preciosArreglo[] = $producto['total'];
                                $cantidadesArreglo[] = number_format($producto['cantidad'],3);
                                
                            }

                           
                        }


                ?> 
            </tbody>

        </table>
      
      
       <hr>
       <hr>
       <table style="width: 100%">
            <thead>
                <tr>
                    <th>
                        <strong style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>Importe Total en Letra: </b></strong><br> 
                        <strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;text-transform: uppercase;">
                            <b><?php echo $resultado ?></b><strong>
                            <div class="vl"></div>
                    </th>
                    <th>
                        <strong id="Strong1" style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>Subtotal: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;margin-top: -15px;"><?php echo $subtotal  ?></b><br>
                        <hr style="margin-left: -3px; margin-top: 0px;z-index: 101; width: 97%;margin-bottom: -10px" >
                         <strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>Descuentos: </b></strong>&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;" ><?php echo $totalDescuentos  ?></b><br>
                        <hr style="margin-left: -3px; margin-top: 0px;z-index: 101; width: 97%;margin-bottom: -10px" >
                        <strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>IVA 16%: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><?php echo $totalImpuestos  ?></b><br>
                        <hr style="margin-left: -3px; margin-top: 0px;z-index: 101; width: 97%;margin-bottom: -10px" >
                        <strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>Total: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><?php echo $totalGeneral  ?></b><br>
                        
                        
                    </th>
                </tr>
            </thead>
       </table>
       <hr style="z-index:101;width: 100%;margin-top: -1px">
       <!--======================
        |   HECHO POR DIEGO-PC  |
        ======================-->
       <table style="width: 100%">
        <thead>
            <tr>
                <th align="center">
                        <b style="font-size: 15px">NO SE ACEPTAN DEVOLUCIONES</b>
                         <?php 
                        $arrayProductos = json_encode($productosArreglo, JSON_UNESCAPED_UNICODE);
                        $arrayProductos = str_replace('"','',json_encode($productosArreglo, JSON_UNESCAPED_UNICODE));
                        $arrayProductos = str_replace('[','',$arrayProductos);
                        $arrayProductos = str_replace(']','',$arrayProductos);

                        $arrayCodigos = json_encode($codigosArreglo, JSON_UNESCAPED_UNICODE);
                        $arrayCodigos = str_replace('"','',json_encode($codigosArreglo, JSON_UNESCAPED_UNICODE));
                        $arrayCodigos = str_replace('[','',$arrayCodigos);
                        $arrayCodigos = str_replace(']','',$arrayCodigos);

                        $arrayPrecios = json_encode($preciosArreglo, JSON_UNESCAPED_UNICODE);
                        $arrayPrecios = str_replace('"','',json_encode($preciosArreglo, JSON_UNESCAPED_UNICODE));
                        $arrayPrecios = str_replace('[','',$arrayPrecios);
                        $arrayPrecios = str_replace(']','',$arrayPrecios);

                        $arrayCantidades = json_encode($cantidadesArreglo, JSON_UNESCAPED_UNICODE);
                        $arrayCantidades = str_replace('"','',json_encode($cantidadesArreglo, JSON_UNESCAPED_UNICODE));
                        $arrayCantidades = str_replace('[','',$arrayCantidades);
                        $arrayCantidades = str_replace(']','',$arrayCantidades);
                        
                        $arregloCotizacion = '[{"concepto":"'.$observaciones.'","monto":"'.$totalGeneral.'","productos":"'.$arrayProductos.'","codigos":"'.$arrayCodigos.'","precios":"'.$arrayPrecios.'","cantidades":"'.$arrayCantidades.'"}]';


                        ?>
                </th>
            </tr>
            <tr>
                <th align="center">
                        <b style="color: #0362CE; font-size: 12px">SUJETO A DISPONIBILIDAD</b>
                </th>
            </tr>
        </thead>
       </table>
       <table style="width: 100%">
        <thead>
            <tr>
                <th align="center">
                     <?php
                        $textqr = $arregloCotizacion;
                        $sizeqr = 180;
                        require_once __DIR__ . '../../../vendor/autoload.php';

                        use Endroid\QrCode\QrCode;

                        $qrCode = new QrCode($textqr);//Creo una nueva instancia de la clase
                        $qrCode->setSize($sizeqr);//Establece el tamaño del qr
                        //header('Content-Type: '.$qrCode->getContentType());
                        $image= $qrCode->writeString();//Salida en formato de texto 

                         $imageData = base64_encode($image);//Codifico la imagen usando base64_encode

                        echo '<img src="data:image/png;base64,'.$imageData.'">';
                    ?>
        
                </th>
            </tr>
        </thead>

       </table>
       <!--=====================
        | ******************** |
        ======================-->
    </body>
</html>
<?php
require_once __DIR__ . '../../../extensiones/dompdf/autoload.inc.php';
use Dompdf\Dompdf;


$opcion = $_GET["opcion"];
if ($opcion == 1) {

            
            $dompdf = new Dompdf();
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = "cotizacion-'".$folio."'";
            //file_put_contents($filename, $pdf);
            $dompdf->stream($filename);
}else{

            
            $dompdf = new Dompdf();
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = "cotizacion-'".$folio."'";
            //file_put_contents($filename, $pdf);
            $dompdf->stream($filename,array('Attachment'=>0));

}

?>