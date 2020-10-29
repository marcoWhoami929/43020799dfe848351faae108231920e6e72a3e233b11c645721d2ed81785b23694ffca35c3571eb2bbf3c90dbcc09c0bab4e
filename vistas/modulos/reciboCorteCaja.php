<?php ob_start(); ?>
<?php

    session_start();
    require_once __DIR__ . "../../../controladores/facturacionTiendas.controlador.php";
    require_once __DIR__ . "../../../modelos/facturacionTiendas.modelo.php";
    $fechaActual = date("d/m/Y"); 

    $folioCorte = $_GET["folioReciboCorte"];
    $item = "folio";
    $valor = $folioCorte;
    $datosCorteCaja =  ControladorFacturasTiendas::ctrMostrarTiempoTranscurridoCorte($item,$valor);
    $serie = $datosCorteCaja["serie"];
    $folio = $datosCorteCaja["folio"];
    $sucursal = $datosCorteCaja["nombre"];
    $fechaInicializado = $datosCorteCaja["fechaCorte"];
    $fechaFinalizado = $datosCorteCaja["fechaTerminoCorte"];
    $observaciones = $datosCorteCaja["observaciones"];
    
   
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
           
            .logo{
                width: 180px;
                margin-left: 10px;
            }
            #headerLogo {

                background: white;
                width: 30%;
                height: 100px;
    
            }
            #headerCabecera {

                background: #0e0079;
                width: 75%;
                font-size: 14px;
                font-weight: bold;
                color: white;
                font-family: Helvetica, Sans-Serif;
                height: 100px;
            }
            #folioInterno{
                font-size: 12px;
                font-weight: lighter;
                color: white;
                font-family: Helvetica, Sans-Serif;
            }
            #headerEmision {

                background: #cacaca;
                width: 100%;
                font-size: 13px;
                font-weight: lighter;
                color: #5f595a;
                font-family: Helvetica, Sans-Serif;
                height: 100px;
            }
            .headerTitulo{
                font-weight: bold;
                color: #0e0079;;
                font-family: Helvetica, Sans-Serif;
                font-size: 13px;


            }
            #headerSubtitulo{
                font-size: 12px;
                font-weight: lighter;
                color: #5f595a;
                font-family: Helvetica, Sans-Serif;

            }
            #headerSeparadores{
                background: #0e0079;
                font-size: 13px;
                font-weight: lighter;
                color: white;
                font-family: Helvetica, Sans-Serif;
            }
  

            .table th, .table td{
                border: none;
            }

            .table tbody td{
                height: 40px;
                text-align: left;
            }
            
            
            hr{
                border-style: solid;
                border-width: 4px;
                color: #ABABAB;
                margin-top: -5px;
            }
            hr.style-one {
                border: 0;
                height: 1px;
                background: #ABABAB;
            
                }

        </style>
    
    </head>
    <body>
        
        <table style="width: 100%;background: #0e0079">
            <thead>
                <tr>
                    <th id="headerLogo">
                        <img class="logo" src="../img/plantilla/logo.png" />
                    </th>
                    <th id="headerCabecera">
                        <center><b>RECIBO DE CORTE DE CAJA</b></center>
                        <br>
                        
                        <center><b id="folioInterno">Serie y Folio Interno: <?php echo $serie ?>  <?php echo $folio ?></b></center>
                    </th>
                    
                    
                </tr>
            </thead>
        </table>
        <table style="width: 100%" id="headerEmision">
            
            <thead >
                <tr>
                    <th style="width: 70%">
                        <b><strong class="headerTitulo">PINTURAS Y COMPLEMENTOS DE PUEBLA S.A DE C.V</strong><br><strong class="headerTitulo">Rfc:</strong> <b id="headerSubtitulo">PCP970822467</b><br><strong class="headerTitulo">Domicilio:</strong> <b id="headerSubtitulo">CALLE LIBERTAD N° 5973, SAN BALTAZAR CAMPECHE, C.P. 72550,PUEBLA, PUEBLA, MÉXICO.</b></b>
                        
                        
                    </th>
 
                    <th style="width: 30%">
                        <b><strong class="headerTitulo">Fecha Emisión: </strong><b id="headerSubtitulo"><?php echo $fechaActual; ?></b><br><strong class="headerTitulo">Lugar de Expedición: </strong> <b id="headerSubtitulo">72550.</b><br><br><br></b>
                    </th>

                </tr>
            </thead>
        </table>
    
        <table style="width: 100%" id="headerSeparadores">
            <tr>
                <th>
                       <strong >DETALLE DEL CORTE</strong>
                       
                </th>
            </tr>
        </table>
        <table style="width: 100%">
           
            <tr>
                <th >
                    <b><strong class="headerTitulo">Sucursal: </strong><b id="headerSubtitulo"><?php echo $sucursal ?></b><br><strong class="headerTitulo">Fecha y Hora Iniciado: </strong><b id="headerSubtitulo"><?php  echo $fechaInicializado ?></b><br><strong class="headerTitulo">Fecha y Hora Finalizado: </strong><b id="headerSubtitulo"><?php  echo $fechaFinalizado ?></b></b><br><br>
                       
                </th>

               
            </tr>
        </table>

        <hr >
        <table style="width: 100%" id="headerSeparadores">
            <tr>
                <th>
                       <strong ></strong>
                       
                </th>
            </tr>
        </table>
        <br>
        <table style="width: 100%">
           
            <tr>
                <th style="width: 50%">
                    <table class="table" style="width: 100%" cellspacing="1">
                        <thead>
                            <tr class="row datos" style="background: #D9D4D4;" >
                                <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;height: 45px;border: 1px solid #cacaca">Forma de Pago</th>
                                <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Monto</th>
                                
                             
                            </tr>
                        </thead>

                        <tbody style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">

                            <?php

                            

                            $arregloFormasPago = [0=>"EFECTIVO",
                                                  1=>'CHEQUE NOMINATIVO',
                                                  2=>'TRANSFERENCIA ELECTRÓNICA',
                                                  3=>'TARJETA DE CREDITO',
                                                  4=>'TARJETA DE DEBITO',
                                                  5=>'POR DEFINIR',
                                                  6=>'CREDITO',
                                                  7=>'TOTAL'];

                            $arregloValoresFormasPago = [0=>'efectivo',
                                                  1=>'cheque',
                                                  2=>'transferencia',
                                                  3=>'tarjetaCredito',
                                                  4=>'tarjetaDebito',
                                                  5=>'porDefinir',
                                                  6=>'credito',
                                                  7=>'totalGeneral'];
                         
                            foreach ($arregloFormasPago  as $key => $value) {

                                echo '<tr>
                                            <td style="height:20px;border: 1px solid #cacaca;font-weight:bold;font-size:11px">'.$value.'</td>
                                            <td style="height:20px;border: 1px solid #cacaca;font-weight:bold;font-size:11px;color:#0e0079">$ '.number_format($datosCorteCaja[$arregloValoresFormasPago[$key]],2).'</td>
                                   

                                            </tr>';
                                 $numDocumentos = $key++;
                                
                            }
                           
              
                            ?>
                          
                        </tbody>

                    </table>
                    <br>
                    <br>
                    <table class="table" style="width: 100%" cellspacing="1">
                        <thead>
                            
                        </thead>

                        <tbody style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">
                        <?php

                             $importes = ['Importe Venta','Gastos','Fondo Caja','Diferencia'];
                             $importesValores = ['importeVenta','gastos','fondoCaja','diferencia'];
                         
                            foreach ($importes as $key => $value) {
                               
                                echo '<tr>
                                            <td style="height:20px;border: 1px solid #cacaca;font-weight:bold;font-size:11px;background:#0e0079;color:white">'.$value.'</td>
                                            <td style="height:20px;border: 1px solid #cacaca;font-weight:bold;font-size:11px;color:#0e0079;text-align:right">$ '.number_format($datosCorteCaja[$importesValores[$key]],2).'</td>
                                            </tr>';
                              
                                
                            }
                        ?>
                          
                        </tbody>

                    </table>

                       
                </th>
                <th style="width: 50%">
                    <table class="table" style="width: 100%" cellspacing="1">
                        <thead>
                            <tr class="row datos" style="background: #D9D4D4;" >
                                <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;height: 45px;border: 1px solid #cacaca">Denominación</th>
                                <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Cantidad</th>
                                <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Total</th>
                                
                             
                            </tr>
                        </thead>

                        <tbody style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">

                            <?php

                            

                            $arregloDenominaciones = ['$ 1,000.00','$ 500.00','$ 200.00','$ 100.00','$ 50.00','$ 20.00','$ 10.00','$ 5.00','$ 2.00','$ 1.00','$ 0.50','$ 0.20','$ 0.10','$ 0.05'];

                            $arregloMontosDenominaciones = ['1000.00','500.00','200.00','100.00','50.00','20.00','10.00','5.00','2.00','1.00','0.50','0.20','0.10','0.05'];

                            $arregloNombresDenominaciones = ['dn1','dn2','dn3','dn4','dn5','dn6','dn7','dn8','dn9','dn10','dn11','dn12','dn13','dn14'];
                         
                            foreach ($arregloDenominaciones as $key => $value) {
                               
                                echo '<tr>
                                            <td style="height:20px;border: 1px solid #cacaca;font-weight:bold;font-size:11px">'.$value.'</td>
                                            <td style="height:20px;border: 1px solid #cacaca;font-weight:bold;font-size:11px;color:#0e0079">'.$datosCorteCaja[$arregloNombresDenominaciones[$key]]/$arregloMontosDenominaciones[$key].'</td>
                                            <td style="height:20px;border: 1px solid #cacaca;font-weight:bold;font-size:11px;color:#0e0079">$ '.number_format($datosCorteCaja[$arregloNombresDenominaciones[$key]],2).'</td>
                                   

                                            </tr>';
                                 $numDocumentos = $key++;
                                
                            }
                           
              
                            ?>
                          
                        </tbody>

                    </table>
                       
                </th>

               
            </tr>
        </table>

        <br>
        <table style="width: 100%" id="headerSeparadores">
            <tr>
                <th>
                       <strong >OBSERVACIONES CORTE</strong>
                       
                </th>
            </tr>
        </table>
        <br>
        <strong style="font-weight: lighter;"><?php echo $observaciones; ?></strong>
        <br>
        <br>
        <table style="width: 100%" id="headerSeparadores">
            <tr>
                <th>
                       
                       
                </th>
            </tr>
        </table>
    
    </body>
</html>
<?php
require_once __DIR__ . '../../../extensiones/dompdf/autoload.inc.php';
use Dompdf\Dompdf;


$opcion = $_GET["opcion"];
$folioCorte = $_GET["folioReciboCorte"];
if ($opcion == 1) {

            
            $dompdf = new Dompdf();
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = "recibo-Corte-Caja-'".$folioCorte."'";
            file_put_contents($filename, $pdf);
            $dompdf->stream($filename);
}else{

            
            $dompdf = new Dompdf();
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = "recibo-Corte-Caja-'".$folioCorte."'";
            //file_put_contents($filename, $pdf);
            $dompdf->stream($filename,array('Attachment'=>0));

}

?>