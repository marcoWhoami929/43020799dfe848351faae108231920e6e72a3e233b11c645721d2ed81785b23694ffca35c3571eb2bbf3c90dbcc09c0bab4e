<?php
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'productosBackorder') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $empresa = strip_tags($_REQUEST['empresa']);
    $canal = strip_tags($_REQUEST['canal']);
    $fechaInicio = strip_tags($_REQUEST['fechaInicio']);
    $fechaFinal = strip_tags($_REQUEST['fechaFinal']);
    $cliente = strip_tags($_REQUEST['cliente']);
    $campoOrden = strip_tags($_REQUEST['campo']);
    $marca = strip_tags($_REQUEST['marca']);
    $orden = strip_tags($_REQUEST['orden']);
    $clasificacion = strip_tags($_REQUEST['clasificacion']);
    $periodo = strip_tags($_REQUEST['periodo']);
    $estatus = strip_tags($_REQUEST['estatus']);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("estatus" => $estatus, "empresa" => $empresa, "marca" => $marca, "canal" => $canal, "fechaInicio" => $fechaInicio, "fechaFinal" => $fechaFinal, "cliente" => $cliente, "clasificacion" => $clasificacion, "periodo" => $periodo, "campoOrden" => $campoOrden, "orden" => $orden, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosBackorder($search);
    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);


    //Recorrer los datos recuperados

    if ($numrows > 0) {
?><div class="fixedColumns" style="overflow-x:auto;"> 
            <table class="table-striped dt-responsive tableBackorder" width="100%">
                <thead id="fixedHead">
                    <tr>
                        <th>#</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>CLIENTE</th>
                        <th>FECHA</th>
                        <th>CODIGO</th>
                        <th>PRODUCTO</th>
                        <th>UNIDAD</th>
                        <th>CLASIF</th>
                        <th>MARCA</th>
                        <th>ALMACEN</th>
                        <th>EXIST</th>
                        <th>DESC</th>
                        <th style="background:#33FF96">PRECIO</th>
                        <th style="background:#33FF96">UNIDADES</th>
                        <th style="background:#33FF96">TOTAL SOLICITADO</th>
                        <th style="background:#FF7D33">PENDIENTES</th>
                        <th style="background:#FF7D33">TOTAL PENDIENTE</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $num = 0;
                    $totalUnidades = 0;
                    $total = 0;
                    $totalUnidadesPendientes = 0;
                    $totalPendiente = 0;
                    $pendientes = 0;
                    $totalPendientes = 0;
                    $totalPedido = 0;
                    $unidades = 0;
                    $totalPendienteMonto = 0;
                    foreach ($datos as $key => $row) {
                        
                        if ($estatus === 'FALTANTE' AND $row["backorder"] == null AND $row["surtido"] == null) {

                            $pendientes = $row["CUNIDADESPENDIENTES"] - $row["backorder"];
                            $descuento = ($row["CPRECIOCAPTURADO"] * $pendientes)*$row["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $row["CPRECIOCAPTURADO"] * $pendientes - $descuento ;

                            $totalUnidadesPendientes += $pendientes;
                        
                        }else if ($estatus === 'FALTANTE' AND $row["surtido"] != 0) {

                            $pendientes = $row["CUNIDADESPENDIENTES"] - $row["surtido"];
                            $descuento = ($row["CPRECIOCAPTURADO"] * $pendientes)*$row["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $row["CPRECIOCAPTURADO"] * $pendientes - $descuento ;

                            $totalUnidadesPendientes += $pendientes;
                            
                        }else if ($estatus === 'BACKORDER' AND $row["surtido"] != 0 AND  $row["backorder"] != 0) {

                            $pendientes = $row["backorder"] ;
                           $descuento = ($row["CPRECIOCAPTURADO"] * $pendientes)*$row["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $row["CPRECIOCAPTURADO"] * $pendientes - $descuento ;

                            $totalUnidadesPendientes += $pendientes;
                       
                        }else if ($estatus === 'SURTIDOS') {

                            $pendientes = $row["surtido"] ;
                            $descuento = ($row["CPRECIOCAPTURADO"] * $pendientes)*$row["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $row["CPRECIOCAPTURADO"] * $pendientes - $descuento ;

                            $totalUnidadesPendientes += $pendientes;
                           
                        } else if ($estatus === 'MULTIPLE') {

                            $pendientes = $row["CUNIDADESPENDIENTES"] - $row["surtido"] -$row["backorder"];
                            $descuento = ($row["CPRECIOCAPTURADO"] * $pendientes)*$row["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $row["CPRECIOCAPTURADO"] * $pendientes - $descuento ;

                            $totalUnidadesPendientes += $pendientes;
                          
                        } else {

                            $pendientes =  $row["backorder"];
                            $descuento = ($row["CPRECIOCAPTURADO"] * $pendientes)*$row["CPORCENTAJEDESCUENTO1"]/100;
                            $total = $row["CPRECIOCAPTURADO"] * $pendientes - $descuento ;
                            $totalUnidadesPendientes += $pendientes;
                           
                        }
                        $totalPendienteMonto+= $total;
                        $unidades = $row["CUNIDADESCAPTURADAS"];
                        $totalUnidades += $row["CUNIDADESCAPTURADAS"];
                        $totalPedido += $row["CNETO"]-$row["CDESCUENTO1"]-$row["CDESCUENTO2"];
                        
                        if($estatus === 'BACKORDER'){
                        if($_SESSION['nombre'] == 'Diego Ávila' || $_SESSION['nombre'] == 'Rocio Martínez Morales' || $_SESSION['nombre'] == 'Marco Lopez'){
                                $accion = '';
                          }else{
                                $accion = 'display:none';
                          }
                        }else{
                            $accion = 'display:none';
                        }

                    ?>
                        <tr>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CIDPRODUCTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CSERIEDOCUMENTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= bcdiv($row["CFOLIO"], '1', 0) ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CRAZONSOCIAL'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['CFECHA'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CCODIGOPRODUCTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['UNIDAD'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['CLASIFICACION'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['MARCA'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['CNOMBREALMACEN'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["EXISTENCIA"], '1', 2)  ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= number_format(bcdiv($row["CPORCENTAJEDESCUENTO1"] , '1', 2),2) ?></td>
                            <td style="font-weight:lighter;text-align:left;">$ <?= number_format(bcdiv($row["CPRECIO"], '1', 2),2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($unidades, '1', 5) ?></td>
                            <td style="font-weight:lighter;text-align:left;">$<?= number_format(bcdiv($row["CNETO"]-$row["CDESCUENTO1"]-$row["CDESCUENTO2"], '1', 2),2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($pendientes, '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;">$<?= number_format($total,2) ?></td>
                            <td><button type="button" class="btn btn-info"  style="<?php echo $accion ?>" onclick="eliminarBackorder('<?php echo $row['CSERIEDOCUMENTO'] ?>','<?php echo intval($row['CFOLIO']) ?>','<?php echo $row['CCODIGOPRODUCTO'] ?>','<?php echo $pendientes ?>')"><i class="fa fa-trash" style="color:white"></i></button></td>               

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                         <th></th>
                        <th style="color:white"><?= number_format(bcdiv($totalUnidades, '1', 2),2) ?></th>
                        <th style="color:white">$ <?= number_format(bcdiv($totalPedido, '1', 2),2)  ?></th>
                        <th style="color:white"><?= number_format(bcdiv($totalUnidadesPendientes, '1', 2),2)  ?></th>
                        <th style="color:white">$ <?= number_format($totalPendienteMonto,2)  ?></th>

                    </tr>
                </tfoot>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginate($vista);

            ?>
        </div>
    <?php
    } else {
        echo "fail";
    }
}
if ($action == 'busquedaClientes') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $cliente = strip_tags($_REQUEST['nombreClienteSearch']);
    $vista = strip_tags($_REQUEST['vista']);
    $vista2 = strip_tags($_REQUEST['vista2']);
    $per_page = intval($_REQUEST['per_page']);

    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("cliente" => $cliente, "per_page" => $per_page, "offset" => $offset);

    $aColumns = array("CCODIGOCLIENTE", "CRAZONSOCIAL"); //Columnas de busqueda
    //consulta principal para recuperar los datos
    $datos = $database->getClientes($search, $aColumns);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover " id="tableListaClientes">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>RFC</th>
                        <th>RAZON SOCIAL</th>
                        <th>FECHA ALTA</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {

                    ?>
                        <tr>
                            <th><?= $row['CCODIGOCLIENTE'] ?></th>
                            <td style="font-weight:bold"><?= $row['CRFC'] ?></td>
                            <td style="font-weight:bold"><?= $row['CRAZONSOCIAL'] ?></td>
                            <td style="font-weight:bold"><?= $row['CFECHAALTA'] ?></td>
                            <td><button type="button" class="btn btn-info" onclick="agregarDatosBusqueda('<?php echo $row['CRAZONSOCIAL'] ?>','arrayClientes')"><i class="fa fa-plus" style="color:white"></i></button></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginate($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'detalleProductosPedido') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $empresa = intval($_REQUEST['empresa']);
    $idDocumento = intval($_REQUEST['idDocumento']);
    switch ($empresa) {
        case 1:
            $tabla = "adDEKKERLAB";
            break;
        case 2:
            $tabla = "adPINTURAS2020SADEC";
            break;
        case 3:
            $tabla = "adFLEX2020SADEC";
            break;
    }
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("idDocumento" => $idDocumento, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getDetalleProductosPedido($tabla, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>TOTAL PENDIENTES</th>
                        <th>PENDIENTES</th>
                        <th>BACKORDER</th>
                         <th>SURTIDO MANUAL</th>
                        <th>ESTATUS</th>
                       
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {
                        switch ($row['ESTATUS']) {
                            case 'SURTIDO':
                                $color = "#05A02F";
                                break;
                            case 'BACKORDER':
                                $color = "#DB9200";
                                break;
                            case 'FALTANTE':
                                $color = "#D31212";
                                break;
                            case 'SURTIDO PARCIAL':
                                $color = "#126AD3";
                                break;
                        }
                        if ($row["CUNIDADESPENDIENTES"] == 0 || $row["ESTATUS"] === 'SURTIDO' || $row["ESTATUS"] == 'BACKORDER') {
                            $accion1 = "display:none";
                            $accion2 = "display:none";
                            $accionUnidad = "readonly";
                            if($row["ESTATUS"] === 'SURTIDO' and $row["CUNIDADESPENDIENTES"] != 0)  {  
                                $pendientes = $row["CUNIDADESPENDIENTES"]-$row["surtido"];
                            }else{ 
                                  $pendientes = $row["CUNIDADESPENDIENTES"];
                                 }
                          
                        } else {
                            if ($row["ESTATUS"] == "FALTANTE" and $row["backorder"] != NULL) {
                                $pendientes = $row["CUNIDADESPENDIENTES"] - $row["backorder"];
                                $accion1 = "";
                                $accion2 = "display:none";
                                $accionUnidad = "";
                            } else  if ($row["ESTATUS"] == "FALTANTE" and $row["backorder"] === NULL) {
                                $pendientes = $row["CUNIDADESPENDIENTES"] - $row["backorder"];
                                $accion1 = "";
                                $accion2 = "";
                                $accionUnidad = "";
                            }else  if ($row["ESTATUS"] == "FALTANTE" and $row["backorder"] != NULL AND $row["surtido"] != NULL) {
                                $pendientes = $row["CUNIDADESPENDIENTES"] - $row["backorder"];
                                $accion1 = "";
                                $accion2 = "";
                                $accionUnidad = "";
                            }  
                            else if ($row["ESTATUS"] == "SURTIDO PARCIAL") {

                                if($row["backorder"] != NULL){
                                    $accion1 = "";
                                    $accion2 = "display:none";

                                }else{
                                    $accion1 = "";
                                    $accion2 = "";

                                }
                                $pendientes = $row["CUNIDADESPENDIENTES"] - $row["backorder"] - $row["surtido"];
                              
                                $accionUnidad = "";
                            }
                        }

                        if($row['backorder'] === NULL){
                                $backorder = 0;
                        }else{
                                $backorder = $row['backorder'];
                        }

                        if($row['surtido'] === NULL){
                                $surtido = 0;
                        }else{
                                $surtido = $row['surtido'];
                        }
                    ?>
                        <tr>
                            <td style="font-weight:bold;"><?= $row['CNUMEROMOVIMIENTO'] ?></td>
                            <td style=" font-weight:bold"><?= $row['CCODIGOPRODUCTO'] ?></td>
                            <td style="font-weight:bold"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td style="font-weight:bold"><?= $row['CUNIDADESPENDIENTES'] ?></td>
                            <td style="font-weight:bold"><input style="width:100px" type="number" class="form-control unidadesPendientes" value="<?= $pendientes ?>" <?= $accionUnidad ?>></td>
                            <td style="font-weight:bold"><?= $backorder ?></td>
                            <td style="font-weight:bold"><?= $surtido ?></td>
                            <td style="font-weight:bold;color:<?= $color ?>"><?= $row['ESTATUS'] ?></td>
                            <td><button style="<?= $accion1 ?>" type="button" class="btn btn-warning" onclick="agregarSurtido('<?php echo $row['CSERIEDOCUMENTO'] ?>','<?php echo bcdiv($row['CFOLIO'], '1', 0) ?>','<?php echo $row['CCODIGOPRODUCTO'] ?>','<?php echo $row["CUNIDADESPENDIENTES"] ?>','<?php echo $empresa ?>','<?php echo $idDocumento ?>',this,'<?php echo $row["backorder"] ?>')"><i class="fa fa-check" style="color:white"></i>Surt</button>&nbsp;<button style="<?= $accion2 ?>" type="button" class="btn btn-info" onclick="agregarBackorder('<?php echo $row['CSERIEDOCUMENTO'] ?>','<?php echo bcdiv($row['CFOLIO'], '1', 0) ?>','<?php echo $row['CCODIGOPRODUCTO'] ?>','<?php echo $row["CUNIDADESPENDIENTES"] ?>','<?php echo $empresa ?>','<?php echo $idDocumento ?>',this)"><i class="fa fa-retweet" style="color:white"></i>Back</button></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginate($vista);

            ?>
        </div>
<?php
    }
}
if ($action == 'agregarBackorder') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $serie = strip_tags($_REQUEST['serie']);
    $folio = strip_tags($_REQUEST['folio']);
    $codigoProducto = strip_tags($_REQUEST['codigoProducto']);
    $unidades = strip_tags($_REQUEST['unidades']);
    $unidadesPendientes = strip_tags($_REQUEST['unidadesPendientes']);

    $datos = array("serie" => $serie, "folio" => $folio, "codigoProducto" => $codigoProducto, "unidades" => $unidades, "unidadesPendientes" => bcdiv($unidadesPendientes, '1', 2));
    //consulta principal para recuperar los datos
    $datos = $database->setProductosBackorder($datos);

    echo $datos;
}
if ($action == 'agregarSurtido') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $serie = strip_tags($_REQUEST['serie']);
    $folio = strip_tags($_REQUEST['folio']);
    $codigoProducto = strip_tags($_REQUEST['codigoProducto']);
    $unidades = strip_tags($_REQUEST['unidades']);
    $unidadesPendientes = strip_tags($_REQUEST['unidadesPendientes']);
     $backorder = strip_tags($_REQUEST['backorder']);

    $datos = array("serie" => $serie, "folio" => $folio, "codigoProducto" => $codigoProducto, "unidades" => $unidades, "unidadesPendientes" => $unidadesPendientes,"backorder" => $backorder);
    //consulta principal para recuperar los datos
    $datos = $database->setProductosSurtidos($datos);

    echo $datos;
}
if ($action == 'eliminarBackorder') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $serie = strip_tags($_REQUEST['serie']);
    $folio = strip_tags($_REQUEST['folio']);
    $codigoProducto = strip_tags($_REQUEST['codigoProducto']);
    $unidades = strip_tags($_REQUEST['unidades']);
   

    $datos = array("serie" => $serie, "folio" => $folio, "codigoProducto" => $codigoProducto, "unidades" => $unidades);
    //consulta principal para recuperar los datos
    $datos = $database->setELiminarBackorder($datos);

    echo $datos;
}
?>