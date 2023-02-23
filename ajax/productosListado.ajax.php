<?php
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'productosListado') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $producto = strip_tags($_REQUEST['producto']);
    $campoOrden = strip_tags($_REQUEST['campo']);
    $marca = strip_tags($_REQUEST['marca']);
    $orden = strip_tags($_REQUEST['orden']);
    $clasificacion = strip_tags($_REQUEST['clasificacion']);
    $periodo = strip_tags($_REQUEST['periodo']);
  
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("marca" => $marca, "producto" => $producto, "clasificacion" => $clasificacion, "periodo" => $periodo, "campoOrden" => $campoOrden, "orden" => $orden, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getListadoProductos($search);
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
                        <th></th>
                        <th></th>
                        <th>CODIGO</th>
                        <th>NOMBRE PRODUCTO</th>
                        <th>UNIDAD MEDIDA</th>
                        <th>MARCA</th>
                        <th>EXISTENCIAS</th>
                        <th style="background:#FF7D33">CLASIFICACION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $num = 0;
                    
                    foreach ($datos as $key => $row) {
                        
                      

                    ?>
                        <tr>
                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#modalExistenciasProductos" onclick="obtenerExistenciasProducto(<?= $row['CIDPRODUCTO'] ?>)"><i class="fa fa-eye"></i></button></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CIDPRODUCTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CCODIGOPRODUCTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['UNIDAD'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['MARCA'] ?></td>

                            <td style="font-weight:bolder;text-align:left;"><?= bcdiv($row["EXISTENCIAS"], '1', 3)  ?></td>
                             <td style="font-weight:lighter;text-align:left;"><?= $row['CLASIFICACION'] ?></td>              

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
if ($action == 'busquedaProductos') {

     include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $producto = strip_tags($_REQUEST['producto']);
    $vista = strip_tags($_REQUEST['vista']);
    $vista2 = strip_tags($_REQUEST['vista2']);
    $per_page = intval($_REQUEST['per_page']);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("producto" => $producto, "per_page" => $per_page, "offset" => $offset);

    $aColumns = array("CCODIGOPRODUCTO", "CNOMBREPRODUCTO"); //Columnas de busqueda
    //consulta principal para recuperar los datos
    $datos = $database->getProductos($search, $aColumns);

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
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover " id="tableListaProductos">
                <thead>
                    <tr>
                        <th>CODIGO PRODUCTO</th>
                        <th>NOMBRE PRODUCTO</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {
                        if ($vista === "ultimosCostos") {
                            $nombreArreglo = 'arrayProductosCostos';
                        } else {
                            $nombreArreglo = 'arrayProductos';
                        }
                    ?>
                        <tr>
                            <td><?= $row['CCODIGOPRODUCTO'] ?></td>
                            <td style="font-weight:bold"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td><button type="button" class="btn btn-primary" onclick="agregarDatosBusqueda('<?php echo $row['CCODIGOPRODUCTO'] ?>','<?php echo $nombreArreglo ?>')"><i class="fa fa-plus" style="color:white"></i></button></td>
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
if ($action == 'existenciasProducto') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $idProducto = intval($_REQUEST["idProducto"]);
    $periodo = intval($_REQUEST["periodo"]);
    $ejercicio = intval($_REQUEST["ejercicio"]);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("idProducto" => $idProducto,  "periodo" => $periodo, "ejercicio" => $ejercicio, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getExistenciasProducto($search);
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
                        <th>Almacén</th>
                        <th style="background:#FF7D33">Existencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $num = 0;
                    $total = 0;

                    foreach ($datos as $key => $row) {
                        $total += $row["EXISTENCIAS"];


                    ?>
                        <tr>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CIDALMACEN'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CNOMBREALMACEN'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= number_format($row['EXISTENCIAS'], 3) ?></td>


                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th style="font-weight:bold;text-align:left;background:#FF7D33;color:#ffffff">Existencias Totales:</th>
                        <th style="font-weight:bold;text-align:left;background:#FF7D33;color:#ffffff"><?= number_format($total, 3) ?></th>
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
if ($action == 'preciosProducto') {

    include_once('../clases/data.php');
    $database = new data();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $idProducto = intval($_REQUEST["idProducto"]);

    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("idProducto" => $idProducto, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getPreciosProducto($search);
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
                        <th>Base</th>
                        <th>Cubeta</th>
                        <th>Galón</th>
                        <th>Lt-Kg-Mt-Pz</th>
                        <th>Medio</th>
                        <th>Cuarto</th>
                        <th>Octavo</th>
                        <th>Distribuidor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $num = 0;


                    foreach ($datos as $key => $row) {



                    ?>
                        <tr>

                            <td style="font-weight:bold;text-align:left;">$ <?= number_format($row['CPRECIO1'], 5) ?></td>
                            <td style="font-weight:bold;text-align:left;">$ <?= number_format($row['CPRECIO2'], 5) ?></td>
                            <td style="font-weight:bold;text-align:left;">$ <?= number_format($row['CPRECIO3'], 5) ?></td>
                            <td style="font-weight:bold;text-align:left;">$ <?= number_format($row['CPRECIO4'], 5) ?></td>
                            <td style="font-weight:bold;text-align:left;">$ <?= number_format($row['CPRECIO5'], 5) ?></td>
                            <td style="font-weight:bold;text-align:left;">$ <?= number_format($row['CPRECIO6'], 5) ?></td>
                            <td style="font-weight:bold;text-align:left;">$ <?= number_format($row['CPRECIO7'], 5) ?></td>
                            <td style="font-weight:bold;text-align:left;">$ <?= number_format($row['CPRECIO8'], 5) ?></td>

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

?>