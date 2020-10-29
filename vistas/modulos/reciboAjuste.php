<?php ob_start(); ?>
<?php

    session_start();
    require_once __DIR__ . "../../../controladores/facturacionTiendas.controlador.php";
    require_once __DIR__ . "../../../modelos/facturacionTiendas.modelo.php";
    $fechaActual = date("d/m/Y"); 

    $folioAjuste = $_GET["folioAjuste"];
    $item = "folioAjuste";
    $valor = $folioAjuste;
    $obtenerAbonosConAjuste =  ControladorFacturasTiendas::ctrObtenerAbonosConAjuste($item,$valor);

    $serie = $obtenerAbonosConAjuste[0]["serieAjuste"];
    $folio = $obtenerAbonosConAjuste[0]["folioAjuste"];
    $fechaInicioAjuste = $obtenerAbonosConAjuste[0]["fechaInicioAjuste"];
    $fechaFinAjuste = $obtenerAbonosConAjuste[0]["fechaFinAjuste"];
    $valorAjuste = $obtenerAbonosConAjuste[0]["valorAjuste"];
    $fechaAbono = $obtenerAbonosConAjuste[0]["fechaAbono"];
   
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
                        <center><b>RECIBO DE AJUSTES DE SALDOS</b></center>
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
                       <strong >DETALLE DEL AJUSTE</strong>
                       
                </th>
            </tr>
        </table>
        <table style="width: 100%">
            <?php

                switch ($serie) {
                    case 'AJSM':
                    
                    $areaCorregida = "FACTURAS SUCURSAL SAN MANUEL";

                    break;
                    case 'AJRF':
                    
                    $areaCorregida = "FACTURAS SUCURSAL REFORMA";

                    break;
                    case 'AJCP':
                    
                    $areaCorregida = "FACTURAS SUCURSAL CAPU";

                    break;
                    case 'AJSG':
                    
                    $areaCorregida = "FACTURAS SUCURSAL SANTIAGO";

                    break;
                     case 'AJTR':
                    
                    $areaCorregida = "FACTURAS SUCURSAL LAS TORRES";

                    break;
                    
                    default:
                        
                     break;
                }
            ?>
            <tr>
                <th style="width: 50%">
                    <b><strong class="headerTitulo">Área Corregida: </strong><b id="headerSubtitulo"><?php echo $areaCorregida ?></b><br><strong class="headerTitulo">Fecha y Hora Inicio: </strong><b id="headerSubtitulo"><?php  echo $fechaAbono ?></b><br><b id="headerSubtitulo" style="text-align: justify;">Comienza con este proceso elimina pequeños saldos pendientes en documentos para que ya no aparezcan como documentos con saldos pendientes, el proceso recupera los documentos en el rango de fechas con un pendiente menor o igual al monto termina con pendiente a eliminar y los salda con documentos creados para este propósito.</b></b><br><br>
                       
                </th>
                <th style="width: 50%">
                    <strong  style="font-size: 13px;font-weight: bolder;color:  #0e0079;font-family: Helvetica, Sans-Serif;text-transform: uppercase;">Para la realización de este proceso el usuario eligió las siguientes opciones:</strong>
                    <br><b><br><strong class="headerTitulo">Fecha Inicial de la eliminación: </strong><b id="headerSubtitulo"><?php echo $fechaInicioAjuste ?></b><br><strong class="headerTitulo">Fecha Final de la eliminación: </strong><b id="headerSubtitulo"><?php echo $fechaFinAjuste ?></b><br><strong class="headerTitulo">Monto pendiente a eliminar: </strong><b id="headerSubtitulo"><?php echo $valorAjuste ?> PESO MEXICANO</b></b><br><br>
                       
                </th>
               
            </tr>
        </table>

        <hr >
        <table style="width: 100%" id="headerSeparadores">
            <tr>
                <th>
                       <strong >DOCUMENTOS CREADOS CON EL AJUSTE</strong>
                       
                </th>
            </tr>
        </table>
        <br>
        <table class="table" style="width: 100%" cellspacing="1">
            <thead>
                <tr class="row datos" style="background: #D9D4D4;" >
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;height: 45px;border: 1px solid #cacaca">Serie Ajuste</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Folio Ajuste</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Saldo Ajustado</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Serie Factura</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Folio Factura</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Abonado</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Pendiente</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Fecha Abono</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Concepto Abono</th>
                 
                </tr>
            </thead>

            <tbody style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">

                <?php

                $item = "folioAjuste";
                $valor = $folioAjuste;
                $obtenerAbonosConAjuste =  ControladorFacturasTiendas::ctrObtenerAbonosConAjuste($item,$valor);
                $numDocumentos = 0;

                foreach ($obtenerAbonosConAjuste as $key => $value) {

                    echo '<tr>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["serieAjuste"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["folioAjuste"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["saldoAjustado"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["serieFactura"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["folioFactura"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["totalAbono"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["pendienteFactura"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["fechaAbono"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["conceptoAbono"].'</td>

                                </tr>';
                    
                        }
                    $numDocumentos = $key++;

                ?>
              
                                
                                
                               
 
            </tbody>

        </table>
        <br>
        <hr>
        <table style="width: 100%" id="headerSeparadores">
            <tr>
                <th>
                       <strong >N° DE DOCUMENTOS AFECTADOS </strong><strong style="float: right;"><?php echo $numDocumentos+1 ?></strong>
                       
                </th>
            </tr>
        </table>
    
    </body>
</html>
<?php
require_once __DIR__ . '../../../extensiones/dompdf/autoload.inc.php';
use Dompdf\Dompdf;


$opcion = $_GET["opcion"];
$folioAjuste = $_GET["folioAjuste"];
if ($opcion == 1) {

            
            $dompdf = new Dompdf();
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = "recibo-ajuste-'".$folioAjuste."'";
            file_put_contents($filename, $pdf);
            $dompdf->stream($filename);
}else{

            
            $dompdf = new Dompdf();
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = "recibo-ajuste-'".$folioAjuste."'";
            //file_put_contents($filename, $pdf);
            $dompdf->stream($filename,array('Attachment'=>0));

}

?>