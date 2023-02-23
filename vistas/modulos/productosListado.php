<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Listado Productos

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Listado Productos</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <?php


                $dia = date("l");
                $mes = date("l");
                $dianumero = date("d");
                $año = date("Y");

                setlocale(LC_ALL, "es_MX.UTF-8");
                $fecha = strftime('%B', strtotime($mes));
                $diaLetra = strftime('%A', strtotime($dia));

                echo "<h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3>";

                ?>

                <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
                <div class="row text-center" id="loader" style="position: absolute;top: 30px;left: 50%;color:#00BCD4;font-size:22px">

                </div>
                <div class="container col-lg-12 col-md-12 col-sm-12" style="margin-top:20px">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div style="width: 70%; margin: auto;">

                                <input class="form-control" id="arregloProductos">



                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">

                            
                            <button class="btn btn-success" onclick="generarReporteListadoProductos('listadoProductos')"><i class="fa fa-file-excel-o fa-1x" aria-hidden="true"></i>Reporte</button>

                        </div>
                    
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label for="">Campo orden</label>
                            <select class="form-control" id="campoOrden" name="campoOrden" onchange="cargarListadoProductos(1)">
                                <option value="CIDPRODUCTO">Id</option>
                                <option value="CCODIGOPRODUCTO">Codigo</option>
                                <option value="CLASIFICACION">Clasificacion</option>
                                

                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label for="">Orden</label>
                            <select class="form-control" id="orden" name="orden" onchange="cargarListadoProductos(1)">
                                <option value="asc">Asc</option>
                                <option value="desc">Desc</option>

                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label for="">Marcas</label>
                            <select class="form-control" id="marca" name="marca" onchange="cargarListadoProductos(1)">
                                <option value="">Todas</option>
                                <?php

                                include_once('clases/data.php');
                                $marcas = new data();
                                $marcas = $marcas->listadoMarcas();

                                foreach ($marcas as $key => $value) {
                                    echo "<option value='" . $value["Marca"] . "'>" . $value['Marca'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                      
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label>Clasificacion:</label>
                            <select class="form-control" name="clasificacion" id="clasificacion" onchange="cargarListadoProductos(1);">
                                <option value="">Todas</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label>Periodo:</label>
                            <select class="form-control" name="periodo" id="periodo" disabled>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                     
                    
                        <div class="col-lg-2 col-md-2 col-sm-2" style="margin-top:20px">
                         

                             <button type="button" id="searchProductoVenta" class="btn btn-info fa-1x" data-toggle="modal" data-target="#modalProductosVenta"> <i class="fa fa-search"></i>Productos</button>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top:20px">
                            <button type="button" class="btn btn-warning" onclick="cargarListadoProductos(1)"> <i class="fa fa-refresh"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body">

                <div>

                    <div class="data">


                    </div>
                </div>


            </div>

        </div>


    </section>

</div>
<!--MODAL PRODUCTOS -->
<div class="modal" id="modalProductosVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2667CE;color:white;font-size:17px">
                <h5 class="modal-title">Buscar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">

                        <div class="container col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    <input type="text" class="form-control" id="nombreProductoSearch" placeholder="Buscar producto" onkeyup="loadProductosVenta(1)">
                                    <input type="hidden" class="form-control" id="clasificacionVenta" value="cargarListadoProductos">
                                    <input type="hidden" class="form-control" id="clasificacionVenta2">
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
                <div id="loader2" style="position: absolute;    text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
                <div class="outer_div2"></div><!-- Datos ajax Final -->
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<!---MODAL EXISTENCIAS-->
<div class="modal" id="modalExistenciasProductos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:0px">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2667CE;color:white;font-size:18px">
                <h3>Existencias Costos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="loaderExistencias" style="position: absolute;    text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
                <div class="preciosProducto"></div><!-- Datos ajax Final -->
                <div class="existenciasProducto"></div><!-- Datos ajax Final -->
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /*ACCESOS DIRECTOS CLIENTES*/
    shortcut.add("Ctrl+B", function() {
        document.getElementById("searchProductoVenta").click();
    });

    /**ELIMINAR ELEMENTOS ARREGLO CLIENTES */
    $('#arregloProductos').tagEditor({
        initialTags: JSON.parse(localStorage.getItem("arrayProductos")),
        delimiter: ', ',
        forceLowercase: false,
        beforeTagDelete: function(field, editor, tags, val) {
            var arrayProductos = localStorage.getItem("arrayProductos");
            removeItemFromArregloBusqueda(arrayProductos, val, "arrayProductos")
        }

    });
</script>
<style type="text/css">
    table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>