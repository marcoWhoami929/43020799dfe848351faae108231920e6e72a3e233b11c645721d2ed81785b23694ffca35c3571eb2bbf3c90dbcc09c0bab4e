<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Tablero
    <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>

    </ol>
   

  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content">
    <div class="box">

      <div class="box-header with-border">
        
         <?php 
          require_once "controladores/atencion.controlador.php";
          require_once "controladores/almacen.controlador.php";
          require_once "controladores/laboratorio.controlador.php";
          require_once "controladores/compras.controlador.php";
          require_once "controladores/facturacion.controlador.php";
          require_once "controladores/logistica.controlador.php";
          require_once "controladores/administradores.controlador.php";

          require_once "modelos/atencion.modelo.php";
          require_once "modelos/almacen.modelo.php";
          require_once "modelos/laboratorio.modelo.php";
          require_once "modelos/compras.modelo.php";
          require_once "modelos/facturacion.modelo.php";
          require_once "modelos/logistica.modelo.php";
          require_once "modelos/administradores.modelo.php";


          if (isset($_POST["fechaInicio"])){

                $diaInicio = $_POST["fechaInicio"];
                $diaInicioFecha = $diaInicio;

                $item = 'fechaPedido';
                $valor = $diaInicioFecha;
                
          }else {

                $item = null;
                $valor = null;
          }
           /************ALMACEN*******************/
          $pedidosDetenidos = ControladorAlmacen::ctrMostrarPedidosDetenidos($item, $valor);
          $pedidosLaboratorio = ControladorAlmacen::ctrMostrarPedidosEnLaboratorio($item, $valor);
          $pedidosPendientes = ControladorAlmacen::ctrMostrarPedidosPendientes($item, $valor);
          $pedidosSuministrados = ControladorAlmacen::ctrMostrarPedidosSuministrados($item, $valor);
          /************ATENCION A CLIENTES*******************/
          $pedidosTotales = ControladorAtencion::ctrMostrarPedidosTotales($item, $valor);
          $pedidosTerminados = ControladorAtencion::ctrMostrarPedidosTerminados($item, $valor);
          $pedidosCancelados = ControladorAtencion::ctrMostrarPedidosCancelados($item, $valor);
          $pedidosEnProceso = ControladorAtencion::ctrMostrarPedidosEnProceso($item, $valor);

          /************LABORATORIO DE COLOR***************/
          $pedidosDete = ControladorLaboratorio::ctrMostrarPedidosDetenidos($item, $valor);
          $pedidosProduccion = ControladorLaboratorio::ctrMostrarPedidosProduccion($item, $valor);
          $pedidosConcluidos = ControladorLaboratorio::ctrMostrarPedidosConcluidos($item, $valor);
          $igualadosCancelados = ControladorLaboratorio::ctrMostrarIgualadosCancelados($item, $valor);
          $igualadosEnProduccion= ControladorLaboratorio::ctrMostrarPedidosEnProduccion($item, $valor);
          $igualadosPendientes= ControladorLaboratorio::ctrMostrarIgualadosPendientes($item, $valor);
          /************LABORATORIO DE COLOR***************/
          /************LOGISTICA***************/
          $pedidosDetenidosLogistica = ControladorLogistica::ctrMostrarPedidosDetenidos($item, $valor);
          $pedidosRuta = ControladorLogistica::ctrMostrarPedidosRuta($item, $valor);
          $pedidosEntregados = ControladorLogistica::ctrMostrarPedidosEntregados($item, $valor);
          $pedidosDetenidosLogistica2= ControladorLogistica::ctrMostrarPedidosDetenidos2($item, $valor);
          /************LOGISTICA***************/
          /************USUARIOS***************/
          $totalUsuarios = ControladorAdministradores::ctrMostrarTotalUsuarios($item, $valor);
          /************USUARIOS***************/
            /************COMPRAS***************/
          $comprasInternas = ControladorCompras::ctrMostrarComprasInternas($item, $valor);
          $comprasExternas = ControladorCompras::ctrMostrarComprasExternas($item, $valor);
          $comprasInternasPendientes = ControladorCompras::ctrMostrarComprasInternasPendientes($item, $valor);
          $comprasExternasPendientes = ControladorCompras::ctrMostrarComprasExternasPendientes($item, $valor);
          $comprasTotales = ControladorCompras::ctrMostrarComprasTotales($item, $valor);
          $comprasEnRecoleccion = ControladorCompras::ctrMostrarEnRecoleccion($item, $valor);
          $comprasProcesoPago = ControladorCompras::ctrMostrarProcesoPago($item, $valor);
          $comprasAutorizacionPendiente = ControladorCompras::ctrMostrarAutorizacionPendiente($item, $valor);
          $comprasConcluido = ControladorCompras::ctrMostrarConcluido($item, $valor);
          $comprasSinAdquisicion = ControladorCompras::ctrMostrarSinAdquisicion($item, $valor);
          /************COMPRAS***************/

          /*************FACTURACION **********************/
          $pedidosFacturados = ControladorFacturacion::ctrMostrarPedidosFacturados($item, $valor);
          $facturasPendientes = ControladorFacturacion::ctrMostrarFacturasPendientes($item, $valor);
          $porFacturar = ControladorFacturacion::ctrMostrarPorFacturar($item, $valor);
          $facturasPedido = ControladorFacturacion::ctrMostrarFacturasPedido($item, $valor);

          /*************FACTURACION **********************/


         $dia = date("l");
         $mes = date("l"); 
         $dianumero = date("d");
         $año = date("Y");

         setlocale(LC_ALL, "es_MX.UTF-8");
         $fecha = strftime('%B', strtotime($mes));
         $diaLetra = strftime('%A', strtotime($dia));

         echo "<div class='col-lg-6'><h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3></div>";


         ?>

         <div class="col-lg-12">
           <center><h2 style="font-weight: bold;color:tomato;">BIENVENIDO A CONTROL MATRIZ Versión 3.3.0</h2></center>
         </div>
         <div class="col-lg-6">
            <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
         </div>
         
        
          

      </div>

      <div class="box-body">
        <center><img src="vistas/img/plantilla/logo.png" width="20%"></center>
        <br>
        <br>
        <div class="col-lg-12">
          <small style="font-size: 17px;">Esta aplicación esta desarrollada con fines de obtener un mayor control en cada una de las área correspondiente tomando en cuenta tiempos de ejecución de cada uno de los procesos.</small>
        </div>

      </div>

    </div>
      <!-- row -->
    <div class="row">
      <div class="container">
              <h5 style="font-weight: bold;font-size: 25px">Búsqueda por mes</h5>
              <div class="row">
               <form action="inicio" method="POST">
                <div class="container">
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <select id="fechaInicio" name="fechaInicio" style="border: solid;">
                      <?php
                      $mesElegido = $_POST["fechaInicio"];

                      switch ($mesElegido) {
                        case '01':
                          echo '<option value="01">ENERO</option>';
                          break;
                        case '02':
                          echo '<option value="02">FEBRERO</option>';
                          break;
                        case '03':
                          echo '<option value="03">MARZO</option>';
                          break;
                        case '04':
                          echo '<option value="04">ABRIL</option>';
                          break;
                        case '05':
                          echo '<option value="05">MAYO</option>';
                          break;
                        case '06':
                          echo '<option value="06">JUNIO</option>';
                          break;
                        case '07':
                          echo '<option value="07">JULIO</option>';
                          break;
                        case '08':
                          echo '<option value="08">AGOSTO</option>';
                          break;
                        case '09':
                          echo '<option value="09">SEPTIEMBRE</option>';
                          break;
                        case '10':
                          echo '<option value="10">OCTUBRE</option>';
                          break;
                        case '11':
                          echo '<option value="11">NOVIEMBRE</option>';
                          break;
                        case '12':
                          echo '<option value="12">DICIEMBRE</option>';
                          break;
                        
                        default:
                          echo '<option value="00">TODOS</option>';
                          break;
                      }
                  
                      ?>
                      <option value="01">ENERO</option>
                      <option value="02">FEBRERO</option>
                      <option value="03">MARZO</option>
                      <option value="04">ABRIL</option>
                      <option value="05">MAYO</option>
                      <option value="06">JUNIO</option>
                      <option value="07">JULIO</option>
                      <option value="08">AGOSTO</option>
                      <option value="09">SEPTIEMBRE</option>
                      <option value="10">OCTUBRE</option>
                      <option value="11">NOVIEMBRE</option>
                      <option value="12">DICIEMBRE</option>
                      
                    </select>

                  </div>
                  <!--
                  <div class="col-lg-3">
                    <input type="date" id="fechaFinal" name="fechaFinal" class="form-control" placeholder="">
                  </div>
                -->
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <input type="submit" class="btn btn-info" value="BUSCAR">
                  </div>
                   
                </div>
              </form>
              </div>
             </div>
             <br>
             <br>

            <div class="cabeceras" id="cabeceras">

              <!--=====================================
              CAJAS SUPERIORES
              ======================================-->
              <!--===========================================================================-->
              <div>
                <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-green">

                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosTotales["pedidosTotales"] ?></h3>

                    <P>PEDIDOS</P>
                    <P>TOTAL PEDIDOS</P>
                  
                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-opencart"></i>
                  
                  </div>
                  
                </div>
                <!-- small box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-aqua">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosDetenidos["pedidosDetenidos"] ?></h3>

                    <p>ALMACÉN</p>
                    <p>PEDIDOS EN BACKORDER</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-bank"></i>
                  
                  </div>
                  <!-- icon -->
                
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-red">
                  
                  <!-- inner -->
                  <div class="inner">
                  
                    <h3><?php echo $igualadosPendientes["igualadosPendientes"] ?></h3>

                    <p>LABORATORIO COLOR</p>
                    <p>IGUALADOS PENDIENTES</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-paint-brush"></i><span>
                  
                  </div>
                 
                </div>
                <!-- small box -->
              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-navy">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosFacturados["pedidosFacturados"] ?></h3>

                    <p>FACTURACIÓN</p>
                    <p>PEDIDOS FACTURADOS</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-file-text"></i>
                  
                  </div>
                  <!-- icon -->
                
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-purple">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $comprasInternas["comprasInternas"] ?></h3>

                    <p>COMPRAS</p>
                    <p>INTERNAS</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-shopping-cart"></i>
                  
                  </div>
                  <!-- icon -->
                
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->


              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-yellow">
                
                  <!-- inner -->
                  <div class="inner">
                  
                    <h3><?php echo $pedidosDetenidosLogistica["pedidosDetenidos"] - $pedidosCancelados["pedidosCancelados"] - $pedidosDetenidosLogistica2["pedidosDetenidosLogistica"] ?></h3>

                    <p>LOGÍSTICA</p>
                    <p>PEDIDOS PENDIENTES</p>

                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-truck"></i>
                  
                  </div>
                 
                </div>
                <!-- small box -->

              </div>
              <!-- col -->


              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-green">

                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosTerminados["pedidosTerminados"] ?></h3>

                    <P>PEDIDOS</P>
                    <P>CONCLUIDOS</P>
                  
                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-opencart"></i>
                  
                  </div>
                  
                </div>
                <!-- small box -->

              </div>
              <!-- col -->

              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-aqua">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosLaboratorio["pedidosLaboratorio"] ?></h3>

                    <p>POR</p>
                    <p>CONCLUIR</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-bank"></i>
                  
                  </div>
                  <!-- icon -->
                  
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-red">
                
                  <!-- inner -->
                  <div class="inner">
                  
                    <h3><?php echo $pedidosProduccion["pedidosProduccion"] ?></h3>

                   <p>SIN</p>
                    <p>IGUALADO</p>

                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-paint-brush"></i><span>
                  
                  </div>
                  <!-- icon -->

                
                </div>
                <!-- small box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-navy">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $porFacturar["porFacturar"] - $pedidosCancelados["pedidosCancelados"] - $facturasPedido["formatoPedido"] ?></h3>

                    <p>POR</p>
                    <p>FACTURAR</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-file-text"></i>
                  
                  </div>
                  <!-- icon -->
                
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                  <!-- small box -->
                <div class="small-box bg-purple">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $comprasExternas["comprasExternas"] ?></h3>

                    <p>COMPRAS</p>
                    <p>EXTERNAS</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-shopping-cart"></i>
                  
                  </div>
                
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-yellow">
                
                  <!-- inner -->
                  <div class="inner">
                  
                    <h3><?php echo $pedidosRuta["pedidosRuta"] ?></h3>

                    <p>PEDIDOS</p>
                    <p>EN RUTA</p>

                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-truck"></i>
                  
                  </div>
                 
                </div>
                <!-- small box -->

              </div>
              <!-- col -->

              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-green">

                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosCancelados["pedidosCancelados"] ?></h3>

                    <P>PEDIDOS</P>
                    <P>CANCELADOS</P>
                  
                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-opencart"></i>
                  
                  </div>
                  
                </div>
                <!-- small box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-aqua">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosPendientes["pedidosPendientes"] ?></h3>

                    <p>PEDIDOS</p>
                    <p>PENDIENTES</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-bank"></i>
                  
                  </div>
                
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-red">
                
                  <!-- inner -->
                  <div class="inner">
                  
                    <h3><?php echo $pedidosConcluidos["pedidosConcluidos"] ?></h3>

                    <p>PEDIDOS</p>
                    <p>CONCLUIDOS</p>

                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-paint-brush"></i><span>
                  
                  </div>
               
                </div>
                <!-- small box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-navy">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $facturasPendientes["facturasPendientes"]?></h3>

                    <p>FACTURAS</p>
                    <p>PENDIENTES</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-file-text"></i>
                  
                  </div>
                  <!-- icon -->
                
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-purple">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $comprasExternasPendientes["comprasExternasPendientes"] + $comprasInternasPendientes["comprasInternasPendientes"]?></h3>

                    <p>COMPRAS</p>
                    <p>PENDIENTES</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-shopping-cart"></i>
                  
                  </div>
                
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-yellow">
                
                  <!-- inner -->
                  <div class="inner">
                  
                    <h3><?php echo $pedidosEntregados["pedidosEntregados"] ?></h3>

                    <p>PEDIDOS</p>
                    <p>ENTREGADOS</p>

                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-truck"></i>
                  
                  </div>
                 
                </div>
                <!-- small box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box bg-green">

                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosEnProceso["pedidosEnProceso"] ?></h3>

                    <P>PEDIDOS</P>
                    <P>EN PROCESO</P>
                  
                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-opencart"></i>
                  
                  </div>
                  
                </div>
                <!-- small box -->

              </div>
              <!-- col -->

              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-aqua">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosSuministrados["pedidosSuministrados"] ?></h3>

                    <p>PEDIDOS</p>
                    <p>SUMINISTRADOS</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-bank"></i>
                  
                  </div>
                 
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
                 <!-- small box -->
                <div class="small-box bg-red">
                  
                  <!-- inner -->
                  <div class="inner">
                  
                    <h3><?php echo $igualadosEnProduccion["igualadosEnProduccion"]  ?></h3>

                    <p>LABORATORIO COLOR</p>
                    <p>EN PRODUCCIÓN</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-paint-brush"></i>
                  
                  </div>
                
              </div>
              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">


                 <!-- small box -->
                <div class="small-box bg-navy">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $facturasPedido["formatoPedido"] ?></h3>

                    <p>ENTREGAS</p>
                    <p>CON PEDIDO</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-file-text"></i>
                  
                  </div>
                  <!-- icon -->
                
                
                </div>
                <!-- small-box -->
                

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-purple">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $comprasTotales["comprasTotales"] ?></h3>

                    <p>COMPRAS</p>
                    <p>REALIZADAS</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                  
                    <i class="fa fa-shopping-cart"></i>
                  
                  </div>
                 
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-yellow">
                  
                  <!-- inner -->
                  <div class="inner">
                    
                    <h3><?php echo $pedidosDetenidosLogistica2["pedidosDetenidosLogistica"]?></h3>

                    <p>PEDIDOS</p>
                    <p>DETENIDOS</p>
                  
                  </div>
                  <!-- inner -->

                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-truck"></i>
                  
                  </div>
                 
                
                </div>
                <!-- small-box -->

              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-lg-2 col-xs-6">
                
               

              </div>



              <!--===========================================================================-->

              <!-- col -->
               <?php 

              if ($_SESSION["perfil"] == "Administrador General") {
                echo '
              <div class="col-lg-2 col-xs-6">
                
                <!-- small box -->
                <div class="small-box" style="background:#cbd0d8">
                
                  <!-- inner -->
                  <div class="inner">
                  
                    <h3>'.$totalUsuarios["totalUsuarios"].'</h3>

                    <p>USUARIOS REGISTRADOS</p>

                  </div>
                  <!-- inner -->
                  
                  <!-- icon -->
                  <div class="icon">
                    
                    <i class="fa fa-users"></i>
                  
                  </div>
                  <!-- icon -->
                 
                      
                    
                  <a href="perfiles" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
                
                </div>
                <!-- small box -->

              </div>';
                    }
              ?>
              <!-- col -->


              </div>

              
              
            </div>
      

    </div>
    <!-- row -->
 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->
<script type="text/javascript">
    /*
    function actualiza(){
    $("#cabeceras").load("vistas/modulos/inicio/cajas-superiores.php");
  }
  setInterval( "actualiza()", 1000 );
  */

</script>