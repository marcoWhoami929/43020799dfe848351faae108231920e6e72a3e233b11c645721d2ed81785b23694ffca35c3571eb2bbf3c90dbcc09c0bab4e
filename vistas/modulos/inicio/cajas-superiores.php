<?php 
session_start();
require_once "../../../controladores/atencion.controlador.php";
require_once "../../../controladores/almacen.controlador.php";
require_once "../../../controladores/laboratorio.controlador.php";
require_once "../../../controladores/compras.controlador.php";
require_once "../../../controladores/facturacion.controlador.php";
require_once "../../../controladores/logistica.controlador.php";
require_once "../../../controladores/administradores.controlador.php";

require_once "../../../modelos/atencion.modelo.php";
require_once "../../../modelos/almacen.modelo.php";
require_once "../../../modelos/laboratorio.modelo.php";
require_once "../../../modelos/compras.modelo.php";
require_once "../../../modelos/facturacion.modelo.php";
require_once "../../../modelos/logistica.modelo.php";
require_once "../../../modelos/administradores.modelo.php";

  /************ALMACEN*******************/
  $pedidosDetenidos = ControladorAlmacen::ctrMostrarPedidosDetenidos();
  $pedidosLaboratorio = ControladorAlmacen::ctrMostrarPedidosEnLaboratorio();
  $pedidosPendientes = ControladorAlmacen::ctrMostrarPedidosPendientes();
  $pedidosSuministrados = ControladorAlmacen::ctrMostrarPedidosSuministrados();
  /************ATENCION A CLIENTES*******************/
  $pedidosTotales = ControladorAtencion::ctrMostrarPedidosTotales();
  $pedidosTerminados = ControladorAtencion::ctrMostrarPedidosTerminados();
  $pedidosCancelados = ControladorAtencion::ctrMostrarPedidosCancelados();
  $pedidosEnProceso = ControladorAtencion::ctrMostrarPedidosEnProceso();

  /************LABORATORIO DE COLOR***************/
  $pedidosDete = ControladorLaboratorio::ctrMostrarPedidosDetenidos();
  $pedidosProduccion = ControladorLaboratorio::ctrMostrarPedidosProduccion();
  $pedidosConcluidos = ControladorLaboratorio::ctrMostrarPedidosConcluidos();
  $igualadosCancelados = ControladorLaboratorio::ctrMostrarIgualadosCancelados();
  $igualadosEnProduccion= ControladorLaboratorio::ctrMostrarPedidosEnProduccion();
  /************LABORATORIO DE COLOR***************/
  /************LOGISTICA***************/
  $pedidosDetenidosLogistica = ControladorLogistica::ctrMostrarPedidosDetenidos();
  $pedidosRuta = ControladorLogistica::ctrMostrarPedidosRuta();
  $pedidosEntregados = ControladorLogistica::ctrMostrarPedidosEntregados();
  $pedidosDetenidosLogistica2= ControladorLogistica::ctrMostrarPedidosDetenidos2();
  /************LOGISTICA***************/
  /************USUARIOS***************/
  $totalUsuarios = ControladorAdministradores::ctrMostrarTotalUsuarios();
  /************USUARIOS***************/
    /************COMPRAS***************/
  $comprasInternas = ControladorCompras::ctrMostrarComprasInternas();
  $comprasExternas = ControladorCompras::ctrMostrarComprasExternas();
  $comprasInternasPendientes = ControladorCompras::ctrMostrarComprasInternasPendientes();
  $comprasExternasPendientes = ControladorCompras::ctrMostrarComprasExternasPendientes();
  $comprasTotales = ControladorCompras::ctrMostrarComprasTotales();
  $comprasEnRecoleccion = ControladorCompras::ctrMostrarEnRecoleccion();
  $comprasProcesoPago = ControladorCompras::ctrMostrarProcesoPago();
  $comprasAutorizacionPendiente = ControladorCompras::ctrMostrarAutorizacionPendiente();
  $comprasConcluido = ControladorCompras::ctrMostrarConcluido();
  $comprasSinAdquisicion = ControladorCompras::ctrMostrarSinAdquisicion();
  /************COMPRAS***************/

  /*************FACTURACION **********************/
  $pedidosFacturados = ControladorFacturacion::ctrMostrarPedidosFacturados();
  $facturasPendientes = ControladorFacturacion::ctrMostrarFacturasPendientes();
  $porFacturar = ControladorFacturacion::ctrMostrarPorFacturar();
  $facturasPedido = ControladorFacturacion::ctrMostrarFacturasPedido();

  /*************FACTURACION **********************/



?>

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
    
      <h3><?php echo $pedidosDete["pedidosDetenidos"] - $pedidosConcluidos["pedidosConcluidos"] - $igualadosCancelados["igualadosCancelados"] - $igualadosEnProduccion["igualadosEnProduccion"]  ?></h3>

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
      
      <h3><?php echo $pedidosPendientes["pedidosPendientes"] - $pedidosCancelados["pedidosCancelados"]  ?></h3>

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
      
      <h3><?php echo $pedidosSuministrados["pedidosSuministrados"] + $pedidosCancelados["pedidosCancelados"] ?></h3>

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
  <div class="small-box bg-yellow">
  
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
