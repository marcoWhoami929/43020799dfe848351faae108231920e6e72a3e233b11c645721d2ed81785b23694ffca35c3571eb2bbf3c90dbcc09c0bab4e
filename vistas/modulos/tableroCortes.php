 
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

        <?php
          if ($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma") {
            echo '<div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="box box-warning box-solid">
                    <div class="box-header with-border" style="background: #dd5e09;">
                      <h3 class="box-title">Previsualización Facturas</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <a href="previsualizacion"><center><img src="vistas/img/plantilla/facturacion.jpg"  class="" alt="" width="72%"></center></a>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="background: #dd5e09">
                  
                    </div>
                  </div>
                  <!-- /.box -->
                </div>';
          }else{

           
          }


        ?>
        
          <div class="col-lg-3 col-md-3 col-sm-3">
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
        <div class="col-lg-3 col-md-3 col-sm-3">
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
              <a href="facturasTiendas"><center><img src="vistas/img/plantilla/facturas.png"  class="" alt="" width="62%"></center></a>
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
        <div class="col-lg-3 col-md-3 col-sm-3">
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
              <a href="ventasTiendas"><center><img src="vistas/img/plantilla/ventas.png"  class="" alt="" width="57%"></center></a>
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
               <a href="cobrosTiendas"><center><img src="vistas/img/plantilla/cobros.png"  class="" alt="" width="54%"></center></a>
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
                      <a href="gastosSolicitudes"><center><img src="vistas/img/plantilla/efectivo.png"  class="" alt="" width="48%"></center></a>
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
                      <a href="gastosTiendas"><center><img src="vistas/img/plantilla/efectivo.png"  class="" alt="" width="48%"></center></a>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="background: #26ce7d">
                
                    </div>
                  </div>
                  <!-- /.box -->
                </div>';
            

          }
        ?>
        

        <div class="col-lg-3 col-md-3 col-sm-3">
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
          if ($_SESSION["perfil"] == "Administrador General" ) {

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
    
    
    </section>

  </div>
