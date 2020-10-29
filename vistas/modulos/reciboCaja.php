<?php ob_start(); ?>
<?php

    session_start();
    require_once __DIR__ . "../../../controladores/facturacionTiendas.controlador.php";
    require_once __DIR__ . "../../../modelos/facturacionTiendas.modelo.php";
    $fechaActual = date("d/m/Y"); 

    $idMovimientoBanco = $_GET["idMovimiento"];
    $item = 'idMovimientoBanco';
    $valor = $idMovimientoBanco;
    $verDetalleDeposito = ControladorFacturasTiendas::ctrMostrarDetallesDepositosBancarios($item,$valor);
    $folio = $verDetalleDeposito[0]["id"];
    $abonoDeposito = $verDetalleDeposito[0]["abono"];
    $fechaDeposito = $verDetalleDeposito[0]["fecha"];
    $nombre = $verDetalleDeposito[0]["nombre"];
    $caracterBuscado   = ',';
    $posicion_coincidencia = strpos($verDetalleDeposito[0]["clienteDeposito"], $caracterBuscado);
 
    if ($posicion_coincidencia === false) {
        
        $clienteDeposito = $verDetalleDeposito[0]["clienteDeposito"];

    } else {
        
       $clienteDeposito = strtok($verDetalleDeposito[0]["clienteDeposito"], ",");

    }

   
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
                height: 150px;
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
                        <center><b>RECIBO DE CAJA</b></center>
                        <br>
                        <?php
                        if ($_SESSION["perfil"] == "Administrador General") {
                            $usuario = $nombre;
                        }else{
                            $usuario = $_SESSION["nombre"];
                        }
                     
                        switch ($usuario) {
                            case 'Sucursal San Manuel':
                                $serie = "RCSM";
                                break;
                            case 'Sucursal Reforma':
                                $serie = "RCRF";
                                break;
                            case 'Sucursal Capu':
                                $serie = "RCCP";
                                break;
                            case 'Sucursal Las Torres':
                                $serie = "RCTR";
                                break;
                            case 'Sucursal Santiago':
                                $serie = "RCSG";
                                break;

                            
                            default:
                                # code...
                                break;
                        }


                        ?>
                        <center><b id="folioInterno">Serie y Folio Interno: <?php echo $serie ?>  <?php echo $folio ?></b></center>
                    </th>
                    
                    
                </tr>
            </thead>
        </table>
        <table style="width: 100%" id="headerEmision">
            
            <thead >
                <tr>
                    <th style="width: 35%">
                        <b><strong class="headerTitulo">Emisor (Beneficiario):</strong><br>PINTURAS Y COMPLEMENTOS DE PUEBLA S.A DE C.V<br><strong class="headerTitulo">Rfc:</strong> <b id="headerSubtitulo">PCP970822467</b><br><strong class="headerTitulo">Régimen Fiscal:</strong> <b id="headerSubtitulo">601 - General de Ley Personas Morales</b><br><br></b>
                        
                        
                    </th>
                    <?php
                        $item = 'nombreCliente';
                        $valor = $clienteDeposito;

                        $buscarDatosCliente = ControladorFacturasTiendas::ctrBuscarDatosCliente($item,$valor);
                        $nombreCliente = $buscarDatosCliente["nombreCliente"];
                        $rfc = $buscarDatosCliente["rfc"];
                        $direccionFiscal = $buscarDatosCliente["domicilioFiscal"];


                    ?>
                    <th style="width: 35%">
                        <b><strong class="headerTitulo">Receptor (Ordenante del pago):</strong><br><?php echo $nombreCliente ?><br><strong class="headerTitulo">Rfc:</strong> <b id="headerSubtitulo"><?php echo $rfc ?></b><br><strong class="headerTitulo">Domicilio:</strong> <b id="headerSubtitulo" style="text-transform: uppercase;"><?php echo $direccionFiscal ?><br><br></b></b>
                    </th>
                    <th style="width: 30%">
                        <b><strong class="headerTitulo">Fecha Emisión: </strong><b id="headerSubtitulo"><?php echo $fechaActual; ?></b><br><strong class="headerTitulo">Lugar de Expedición: </strong> <b id="headerSubtitulo">72550</b><br><strong class="headerTitulo">Tipo Comprobante: </strong><b id="headerSubtitulo">P - Pago</b><br><br><br><br><br></b>
                    </th>

                </tr>
            </thead>
        </table>
        <br>
        <table style="width: 100%" id="headerSeparadores">
            <tr>
                <th>
                       <strong >DETALLE DEL PAGO</strong>
                       
                </th>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <th>
                    <strong  style="font-size: 13px;font-weight: bolder;color: #5f595a;font-family: Helvetica, Sans-Serif;">Información Banco Emisor - Receptor</strong>
                    <br><b><strong class="headerTitulo">RFC Emisor Cuenta Ordenante: </strong><b id="headerSubtitulo">BBA830831LJ2</b><br><strong class="headerTitulo">Nombre del banco Ordenante: </strong><b id="headerSubtitulo"></b><br><strong class="headerTitulo">Cuenta Ordenante: </strong><b id="headerSubtitulo">0162310198</b></b>
                       
                </th>
                 <th>
                 
                    <br><b><strong class="headerTitulo">RFC Emisor Cuenta Beneficiario: </strong><b id="headerSubtitulo">BBA830831LJ2</b><br><strong class="headerTitulo">Cuenta Beneficiario: </strong><b id="headerSubtitulo">0162310198</b><br><br></b>
                       
                </th>
            </tr>
        </table>
        <hr >

        <table style="width: 100%">
            <tr>
                <th>
                    <strong  style="font-size: 13px;font-weight: bolder;color: #5f595a;font-family: Helvetica, Sans-Serif;">Información del Pago</strong>
                    <br><b><strong class="headerTitulo">Fecha de Pago: </strong><b id="headerSubtitulo"><?php echo $fechaDeposito ?></b><br><strong class="headerTitulo">Forma de Pago: </strong><b id="headerSubtitulo">03 - Transferencia electrónica de fondos</b><br><strong class="headerTitulo">Moneda: </strong><b id="headerSubtitulo">MXN - Peso Mexicano</b></b>
                       
                </th>
                 <th>
                 
                    <br><b><strong class="headerTitulo">Tipo de Cambio: </strong><b id="headerSubtitulo"></b><br><strong class="headerTitulo">Monto: </strong><b id="headerSubtitulo">$ <?php echo number_format($abonoDeposito,2); ?></b><br><strong class="headerTitulo">N°. Operación: </strong><b id="headerSubtitulo"></b><br></b>
                       
                </th>
            </tr>
        </table>
        <br>
        
        <hr >
        <table style="width: 100%" id="headerSeparadores">
            <tr>
                <th>
                       <strong >DOCUMENTOS PAGADOS</strong>
                       
                </th>
            </tr>
        </table>
        <br>
        <table class="table" style="width: 100%" cellspacing="1">
            <thead>
                <tr class="row datos" style="background: #D9D4D4;" >
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;height: 45px;border: 1px solid #cacaca">ID Documento</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Serie</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Folio</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;border: 1px solid #cacaca">Moneda</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Método de Pago</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">N° parcialidad</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Importe Saldo Anterior</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Importe Pagado</th>
                    <th style="color: #0e0079;font-family: Helvetica, Sans-Serif;font-weight: bolder;font-size: 10px;text-align:center;border: 1px solid #cacaca">Importe Saldo Absoluto</th>
                 
                </tr>
            </thead>

            <tbody style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">

                <?php

                $item = 'idMovimientoBanco';
                $valor = $idMovimientoBanco;

                $detalleAbonosDepositos = ControladorFacturasTiendas::ctrListarAbonosDepositos($item,$valor); 
                $numDocumentos = 0;

                foreach ($detalleAbonosDepositos as $key => $value) {

                    echo '<tr>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["id"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["serieFactura"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["folioFactura"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">MXN</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["metodoPago"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.$value["numeroParcial"].'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.number_format($value["total"],2).'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.number_format($value["totalAbono"],2).'</td>
                                <td style="height:20px;border: 1px solid #cacaca">'.number_format($value["pendienteFactura"],2).'</td>

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
$idMovimiento = $_GET["idMovimiento"];
if ($opcion == 1) {

            
            $dompdf = new Dompdf();
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = "recibo-caja-'".$idMovimiento."'";
            file_put_contents($filename, $pdf);
            $dompdf->stream($filename);
}else{

            
            $dompdf = new Dompdf();
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = "recibo-caja-'".$idMovimiento."'";
            //file_put_contents($filename, $pdf);
            $dompdf->stream($filename,array('Attachment'=>0));

}

?>