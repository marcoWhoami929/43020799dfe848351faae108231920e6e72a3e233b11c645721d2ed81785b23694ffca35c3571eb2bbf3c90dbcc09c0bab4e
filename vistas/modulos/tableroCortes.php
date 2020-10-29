 
 <div class="content-wrapper" style="margin-bottom: 150px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TABLERO
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">TABLERO</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" >

      <div class="row">
          <div class="col-md-3">
          <div class="box box-warning box-solid" >
            <div class="box-header with-border" style="background: #1399AE">
              <h3 class="box-title">Corte De Caja</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <a href="corteCaja"><center><img src="vistas/img/plantilla/corte.png"  alt="" width="63%"></center></a>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="background: #1399AE">
       
            </div>
         
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-3">
          <div class="box box-warning box-solid" >
            <div class="box-header with-border" style="background: #32922f">
              <h3 class="box-title">Facturas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="facturasTiendas"><center><img src="vistas/img/plantilla/facturas.png"  class="" alt="" width="65%"></center></a>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="background: #32922f">
              
            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="box box-warning box-solid" >
            <div class="box-header with-border" style="background: #3f67a7">
              <h3 class="box-title">Facturas Canceladas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="facturasCanceladas"><center><img src="vistas/img/plantilla/facturas-canceladas.png"  class="" alt="" width="53%"></center></a>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="background: #3f67a7">
              
            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-3">
          <div class="box box-warning box-solid">
            <div class="box-header with-border" style="background: #c90f15">
              <h3 class="box-title">Ventas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="ventasTiendas"><center><img src="vistas/img/plantilla/ventas.png"  class="" alt="" width="53%"></center></a>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="background: #c90f15">
              
            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="box box-warning box-solid" >
            <div class="box-header with-border" style="background: #2667ce">
              <h3 class="box-title">Cobros</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <a href="cobrosTiendas"><center><img src="vistas/img/plantilla/cobros.png"  class="" alt="" width="55%"></center></a>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="background: #2667ce">
       
            </div>
         
          </div>
          <!-- /.box -->
        </div>
        <?php
          if ($_SESSION["nombre"] == "Roberto Gutierrez" || $_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "José Martinez") {

            echo '<div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="box box-warning box-solid">
                    <div class="box-header with-border" style="background: #26ce7d;">
                      <h3 class="box-title">Gastos</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <a href="gastosSolicitudes"><center><img src="vistas/img/plantilla/efectivo.png"  class="" alt="" width="50%"></center></a>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="background: #26ce7d">
                
                    </div>
                  </div>
                  <!-- /.box -->
                </div>';
            
          }else{

               echo '<div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="box box-warning box-solid">
                    <div class="box-header with-border" style="background: #26ce7d;">
                      <h3 class="box-title">Gastos</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <a href="gastosTiendas"><center><img src="vistas/img/plantilla/efectivo.png"  class="" alt="" width="50%"></center></a>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="background: #26ce7d">
                
                    </div>
                  </div>
                  <!-- /.box -->
                </div>';
            

          }
        ?>
        

        <div class="col-md-3">
          <div class="box box-warning box-solid">
            <div class="box-header with-border" style="background: #dd5e09;">
              <h3 class="box-title">Mis Depósitos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="misDepositos"><center><img src="vistas/img/plantilla/depositos.png"  class="" alt="" width="38%"></center></a>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="background: #dd5e09">
          
            </div>
          </div>
          <!-- /.box -->
        </div>

        <?php
          if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] != "José Martinez") {

            echo '<div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="box box-warning box-solid">
                      <div class="box-header with-border" style="background: #d3da37">
                        <h3 class="box-title">Ajuste de Saldos</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <a href="ajusteSaldos"><center><img src="vistas/img/plantilla/ajustes.png"  class="" alt="" width="55%"></center></a>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer" style="background: #d3da37">
                       
                      </div>
                    </div>

                  </div>';
            
          }else{

               echo '<div class="col-lg-3 col-md-3 col-sm-3">
                      <div class="box box-warning box-solid">
                        <div class="box-header with-border" style="background: #d3da37">
                          <h3 class="box-title">Ajuste de Saldos</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <a href="ajustesGenerados"><center><img src="vistas/img/plantilla/ajustes.png"  class="" alt="" width="55%"></center></a>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" style="background: #d3da37">
                         
                        </div>
                      </div>

                    </div>';
            

          }
        ?>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="box box-warning box-solid">
            <div class="box-header with-border" style="background: #c90f15">
              <h3 class="box-title">Ventas Por Tienda Mensuales</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="graficoVentasDiarias" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <?php

               include("inicio/graficoVentasDiarias.php");

            ?>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">San Manuel</h3>
                        <?php

                            $item = "concepto";
                            $valor = 'FACTURA SAN MANUEL V 3.3';

                            $hoy = date("d/m/Y");
                            $fecha = str_replace('/', '-', $hoy);

                            $fechaFinal = date('Y-m-d', strtotime($fecha."- 1 days"));

                            $item2 = 'fechaFactura';
                            $valor2 = $fechaFinal;
                            $obtenerVentasSm = ControladorFacturasTiendas::ctrObtenerVentasTienda($item,$valor,$item2,$valor2);


                        ?>

            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="vistas/img/plantilla/icono-xl.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasSm["ventaDiaria"],2) ?></h5>
                    <span class="description-text">Venta Diaria</span>
                  </div>
                  <!-- /.description-block -->
                </div>
           
                <div class="col-sm-6">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasSm["ventaAcumulada"],2) ?></h5>
                    <span class="description-text">Acumulado Actual</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Reforma</h3>
                        <?php

                            $item = "concepto";
                            $valor = 'FACTURA REFORMA V 3.3';

                            $hoy = date("d/m/Y");
                            $fecha = str_replace('/', '-', $hoy);

                            $fechaFinal = date('Y-m-d', strtotime($fecha."- 1 days"));

                            $item2 = 'fechaFactura';
                            $valor2 = $fechaFinal;
                            $obtenerVentasRf = ControladorFacturasTiendas::ctrObtenerVentasTienda($item,$valor,$item2,$valor2);


                        ?>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="vistas/img/plantilla/icono-xl.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasRf["ventaDiaria"],2) ?></h5>
                    <span class="description-text">Venta Diaria</span>
                  </div>
                  <!-- /.description-block -->
                </div>
           
                <div class="col-sm-6">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasRf["ventaAcumulada"],2) ?></h5>
                    <span class="description-text">Acumulado Actual</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Capu</h3>

                        <?php

                            $item = "concepto";
                            $valor = 'FACTURA CAPU V 3.3';

                            $hoy = date("d/m/Y");
                            $fecha = str_replace('/', '-', $hoy);

                            $fechaFinal = date('Y-m-d', strtotime($fecha."- 1 days"));

                            $item2 = 'fechaFactura';
                            $valor2 = $fechaFinal;
                            $obtenerVentasCp = ControladorFacturasTiendas::ctrObtenerVentasTienda($item,$valor,$item2,$valor2);


                        ?>
          
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="vistas/img/plantilla/icono-xl.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasCp["ventaDiaria"],2) ?></h5>
                    <span class="description-text">Venta Diaria</span>
                  </div>
                  <!-- /.description-block -->
                </div>
           
                <div class="col-sm-6">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasCp["ventaAcumulada"],2) ?></h5>
                    <span class="description-text">Acumulado Actual</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Santiago</h3>

                        <?php

                            $item = "concepto";
                            $valor = 'FACTURA SANTIAGO V 3.3';

                            $hoy = date("d/m/Y");
                            $fecha = str_replace('/', '-', $hoy);

                            $fechaFinal = date('Y-m-d', strtotime($fecha."- 1 days"));

                            $item2 = 'fechaFactura';
                            $valor2 = $fechaFinal;
                            $obtenerVentasSg = ControladorFacturasTiendas::ctrObtenerVentasTienda($item,$valor,$item2,$valor2);


                        ?>
        </div>
            <div class="widget-user-image">
              <img class="img-circle" src="vistas/img/plantilla/icono-xl.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasSg["ventaDiaria"],2) ?></h5>
                    <span class="description-text">Venta Diaria</span>
                  </div>
                  <!-- /.description-block -->
                </div>
           
                <div class="col-sm-6">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasSg["ventaAcumulada"],2) ?></h5>
                    <span class="description-text">Acumulado Actual</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Las Torres</h3>
                        <?php

                            $item = "concepto";
                            $valor = 'FACTURA TORRES';

                            $hoy = date("d/m/Y");
                            $fecha = str_replace('/', '-', $hoy);

                            $fechaFinal = date('Y-m-d', strtotime($fecha."- 1 days"));

                            $item2 = 'fechaFactura';
                            $valor2 = $fechaFinal;
                            $obtenerVentasTr = ControladorFacturasTiendas::ctrObtenerVentasTienda($item,$valor,$item2,$valor2);


                        ?>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="vistas/img/plantilla/icono-xl.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasTr["ventaDiaria"],2) ?></h5>
                    <span class="description-text">Venta Diaria</span>
                  </div>
                  <!-- /.description-block -->
                </div>
           
                <div class="col-sm-6">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$ ".number_format($obtenerVentasTr["ventaAcumulada"],2) ?></h5>
                    <span class="description-text">Acumulado Actual</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="box box-warning box-solid">
            <div class="box-header with-border" style="background: #c90f15">
              <h3 class="box-title">Ventas Por Tienda Mensuales</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <figure class="highcharts-figure">

                  <div id="graficoVentasMensuales"></div>

                  <?php

                     include("inicio/graficoVentasMensuales.php");

                  ?>
                        
              </figure>
            </div>

          </div>
          <!-- /.box -->
        </div>
      </div>
    
    </section>

  </div>
  <style>
 
</style>
