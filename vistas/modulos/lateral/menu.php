<!--=====================================
MENU
======================================--> 

<ul class="sidebar-menu">
  <?php
  if (isset($_SESSION["cotizador"]) == 0 && $_SESSION["perfil"] != "Tiendas") {

    if (isset($_SESSION["cotizador"]) == 1) {



    }else{

      echo '<li class="active"><a href="inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>';

    }
    
  }
  

  ?>
  
  <?php 
  if (isset($_SESSION["cotizador"]) == 0) {
   if ($_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["perfil"] == "Administrador General" && isset($_SESSION["cotizador"]) == 0) {
    echo '<li><a href="atencionClientes"><i class="fa fa-opencart"></i><span>Atención a clientes</span></a></li>';
  }
  else if($_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Sebastián Rodríguez" && isset($_SESSION["cotizador"]) == 0){
   echo '<li><a href="atencionClientes"><i class="fa fa-opencart"></i><span>Atención a clientes</span></a></li>';
 }
}else {
 if($_SESSION["grupo"] == "Editor" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["grupo"] == "Administrador" && isset($_SESSION["cotizador"]) == 1 || $_SESSION["nombre"] == "Aurora Fernandez" ){
  if ($_SESSION["nombre"] != "JESUS GARCIA MANJARREZ")  {

    echo '<li><a href="atencionClientes"><i class="fa fa-opencart"></i><span>Atención a clientes</span></a></li>';
    echo '<li><a href="facturacion"><i class="fa fa-file-text-o"></i><span>Facturación</span></a></li>';
    echo '<li><a href="cotizador"><i class="fa fa-calculator" aria-hidden="true"></i><span>Cotizador</span></a></li>';
    echo '<li><a href="prospectos"><i class="fa fa-users" aria-hidden="true"></i><span>Prospectos</span></a></li>';
    echo '<li><a href="productos"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span>Productos</span></a></li>';
    echo '<li><a href="reporteCotizacion"><i class="fa fa-file-excel-o" aria-hidden="true"></i><span>Análisis de Cotizaciones</span></a></li>';
    echo '<li><a href="facturasCrm"><i class="fa fa-btc" aria-hidden="true"></i><span>Facturas CRM</span></a></li>';
    echo '<li><a href="cotizacionesComercial"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Cotizaciones Comercial</span></a></li>';

  }else {


   echo '<li><a href="cotizador"><i class="fa fa-calculator" aria-hidden="true"></i><span>Cotizador</span></a></li>';
   echo '<li><a href="prospectos"><i class="fa fa-users" aria-hidden="true"></i><span>Prospectos</span></a></li>';
   echo '<li><a href="productos"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span>Productos</span></a></li>';
   echo '<li><a href="reporteCotizacion"><i class="fa fa-file-excel-o" aria-hidden="true"></i><span>Análisis de Cotizaciones</span></a></li>';
   echo '<li><a href="facturasCrm"><i class="fa fa-btc" aria-hidden="true"></i><span>Facturas CRM</span></a></li>';
   echo '<li><a href="cotizacionesComercial"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Cotizaciones Comercial</span></a></li>';

 }

}

if ($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Acatepec") {

  echo '<li><a href="cotizador"><i class="fa fa-calculator" aria-hidden="true"></i><span>Cotizador</span></a></li>';

  echo '<li><a href="reporteCotizacion"><i class="fa fa-file-excel-o" aria-hidden="true"></i><span>Análisis de Cotizaciones</span></a></li>';


}
}


?>
<?php 
if (isset($_SESSION["cotizador"]) == 0) {
  if ($_SESSION["perfil"] == "Almacen" || $_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Facturacion") {
    echo '<li><a href="almacen"><i class="fa fa-bank"></i><span>Almacén</span></a></li>';
  }
  else if($_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Sebastián Rodríguez"){
    echo '<li><a href="almacen"><i class="fa fa-bank"></i><span>Almacén</span></a></li>';
  }
}


?>
<?php 
if (isset($_SESSION["cotizador"]) == 0) {

 if ($_SESSION["perfil"] == "Laboratorio de Color" || $_SESSION["perfil"] == "Administrador General") {
  echo '<li><a href="laboratorioColor"><i class="fa fa-paint-brush"></i><span>Laboratorio de Color</span></a></li>';
}
else if($_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Sebastián Rodríguez"){
 echo '<li><a href="laboratorioColor"><i class="fa fa-paint-brush"></i><span>Laboratorio de Color</span></a></li>';
}

}


?>

<?php 
if (isset($_SESSION["cotizador"]) == 0) {
 if ($_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "Laura Delgado" || $_SESSION["perfil"] == "Logistica" || $_SESSION["nombre"] == "Aurora Fernandez" ) {
  echo '<li><a href="facturacion"><i class="fa fa-file-text-o"></i><span>Facturación</span></a></li>';
}
else if($_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Sebastián Rodríguez"){
  echo '<li><a href="facturacion"><i class="fa fa-file-text-o"></i><span>Facturación</span></a></li>';
}
}


?>

<?php 
if (isset($_SESSION["cotizador"]) == 0) {

  if ($_SESSION["perfil"] == "Compras") {
    echo '<li><a href="compras"><i class="fa fa-shopping-cart"></i><span>Compras</span></a></li>';
    echo '<li><a href="saldos"><i class="fa fa-bank"></i> <span>Bancos</span></a></li>';
    echo '<li><a href="gastosTiendas"><i class="fa fa-money"></i> <span>Gastos Tiendas</span></a></li>';
  }
  else if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Sebastián Rodríguez"){
    echo '<li><a href="compras"><i class="fa fa-shopping-cart"></i><span>Compras</span></a></li>';
  }

}

?>


<?php 
if (isset($_SESSION["cotizador"]) == 0) {

 if ($_SESSION["perfil"] == "Logistica" || $_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Nataly Fuentes" || $_SESSION["nombre"] == "Aurora Fernandez") {
  echo '<li><a href="logistica"><i class="fa fa-truck"></i><span>Logística</span></a></li>';
  echo '<li><a href="entregas"><i class="fa fa-archive"></i><span>Entregas</span></a></li>';
}
else if($_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Sebastián Rodríguez"){
  echo '<li><a href="logistica"><i class="fa fa-truck"></i><span>Logística</span></a></li>';
}

}else{

  if ($_SESSION["nombre"] == "Nataly Fuentes" || $_SESSION["nombre"] == "Aurora Fernandez") {
    echo '<li><a href="logistica"><i class="fa fa-truck"></i><span>Logística</span></a></li>';
  }

}


?>

<?php 
if (isset($_SESSION["cotizador"]) == 0) {

 if ($_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Administrador General") {

  echo '<li class="treeview">

  <a href="#">
  <i class="fa fa-clipboard"></i>
  <span>Catálogo</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>

  <ul class="treeview-menu" style="z-index: 101;">

  <li><a href="clientes"><i class="fa fa-users"></i><span>Lista de clientes</span></a></li>
  <li><a href="proveedores"><i class="fa fa-users"></i><span>Lista de proveedores</span></a></li>


  </ul>

  </li>';


}


}


?>

<?php
if (isset($_SESSION["cotizador"]) == 0 ) {

  if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Aydé Flores"){

    echo '<li class="treeview">

    <a href="#">
    <i class="fa fa-th"></i>
    <span style="width:200px;">Administración</span>
    <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>

    <ul class="treeview-menu" style="z-index: 101; width:200px;">

    <li><a href="perfiles"><i class="fa fa-key"></i> <span>Administrar de Usuarios</span></a></li>
    <li><a href="usuarios"><i class="fa fa-key"></i><span>Usuarios Bancos</span></a></li>
    <li><a href="respaldo"><i class="fa fa-database"></i> <span>Respaldo de Información</span></a></li>
    <li><a href="restauracion"><i class="fa fa-cogs"></i> <span>Restaurar Información</span></a></li>
    <li><a href="bitacora"><i class="fa fa-book"></i><span>Bitácora de Actividades</span></a></li>


    </ul>

    </li>';

  }

}

?>
<?php

if (isset($_SESSION["cotizador"]) == 0) {

 if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["perfil"] == "Almacen" || $_SESSION["perfil"] == "Laboratorio de Color" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Compras" || $_SESSION["perfil"] == "Logistica" || $_SESSION["perfil"] ==  "Generador de Reportes" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["perfil"] ==  "Visualizador" || $_SESSION["nombre"] == "Sebastián Rodríguez"){
  
  echo '<li class="treeview">

  <a href="#">
  <i class="fa fa-bar-chart" aria-hidden="true"></i>
  <span style="width:200px;">Indicadores</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>

  <ul class="treeview-menu" style="z-index: 101; width:200px;">

  <li><a href="indicadores"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Indicadores</span></a></li>
    <li><a href="backorder"><i class="fa fa-th" aria-hidden="true"></i><span>Backorder</span></a></li>
  
  </ul>

  </li>';
  /*
  
  
  <li><a href="reportAcumulado"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Reporte Acumulado</span></a></li>
  <li><a href="reportAcumuladoMensual"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Reporte Mensual</span></a></li>

   */

}

}else{
  echo '<li class="treeview">

  <a href="#">
  <i class="fa fa-bar-chart" aria-hidden="true"></i>
  <span style="width:200px;">Indicadores</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>

  <ul class="treeview-menu" style="z-index: 101; width:200px;">


    <li><a href="backorder"><i class="fa fa-th" aria-hidden="true"></i><span>Backorder</span></a></li>
  
  </ul>

  </li>';
}


?>
<?php
if (isset($_SESSION["cotizador"]) == 0) {
  if($_SESSION["perfil"] == "Administrador General"){

    /*
    echo '<li class="treeview">

    <a href="#">
    <i class="fa fa-money" aria-hidden="true"></i>
    <span style="width:200px;">Flujo de Efectivo</span>
    <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>

    <ul class="treeview-menu" style="z-index: 101; width:200px;">

    <li><a href="flujodeefectivoR"><i class="fa fa-money"></i><span>Mensual</span></a></li>
    <li><a href="flujodeefectivoDiario"><i class="fa fa-money"></i><span>Diario</span></a></li>
    <li><a href="valores"><i class="fa fa-money"></i><span>Valores</span></a></li>

    </ul>

    </li>';
    */

  }
  if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Laura Delgado" || $_SESSION["nombre"] == "Jesus Serrano" || $_SESSION["nombre"] == "Ulises Tuxpan" || $_SESSION["nombre"] == "Luis Gerardo Morales" || $_SESSION["nombre"] == "Miguel Gutierrez Angeles" || $_SESSION["nombre"] == "José Enrique Flores" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Jesús Serrano"){

    /*
    echo '<li class="treeview">

    <a href="#">
    <i class="fa fa-road" aria-hidden="true"></i>
    <span style="width:200px;">Rutas</span>
    <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    
    <ul class="treeview-menu" style="z-index: 101; width:200px;">

    <li><a href="ordenTrabajo"><i class="fa fa-file-text"></i><span>Orden De Trabajo</span></a></li>
    <li><a href="almacenRuta"><i class="fa fa-th"></i><span>Almacén</span></a></li>
    <li><a href="facturacionRuta"><i class="fa fa-file-text"></i><span>Facturación</span></a></li>
    <li><a href="estatusRuta"><i class="fa fa-file-text"></i><span>Estatus Ordenes</span></a></li>
    <li><a href="indicadoresRutas"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Indicadores</span></a></li>


    </ul>
    
    </li>';
    */
    
  }

}


?>
<?php
if (isset($_SESSION["cotizador"]) == 0) {

  if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Contabilidad"){

    echo '<li><a href="saldos"><i class="fa fa-bank"></i> <span>Bancos</span></a></li>';

  }
  if ($_SESSION["nombre"] == "Annet Landa Alvarado" || $_SESSION["nombre"] == "Sebastián Rodríguez") {

   echo '<li class="treeview">

   <a href="#">
   <i class="fa fa-fax"></i><span>Corte de Caja</span>
   <span class="pull-right-container">
   <i class="fa fa-angle-left pull-right"></i>
   </span>
   </a>

   <ul class="treeview-menu" style="z-index: 101; width:200px;">

   <li><a href="tableroCortes" sesion="'.$_SESSION["nombre"].'"><i class="fa fa-fax"></i><span>Corte de Caja</a></li>
   <li><a href="abonos"><i class="fa fa-money"></i><span>Abonos Facturas</a></li>


   </ul>

   </li>';



 }

}

?>

<?php

if (isset($_SESSION["cotizador"]) == 0) {

 if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["perfil"] == "Almacen" || $_SESSION["perfil"] == "Laboratorio de Color" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Compras" || $_SESSION["perfil"] == "Logistica" || $_SESSION["perfil"] ==  "Generador de Reportes" || $_SESSION["perfil"] ==  "Visualizador" || $_SESSION["nombre"] == "Sebastián Rodríguez" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Contabilidad" ) {
 
  echo '<li class="treeview">

   <a href="#">
   <i class="fa fa-ticket" aria-hidden="true"><span class="label label-warning count" style="position: fixed;z-index: 200;width:30px;height:30px;font-size:16px;margin-left:10px;margin-top:-30px"></span></i>
   <span style="width:200px;">Tickets</span>
   <span class="pull-right-container">
   <i class="fa fa-angle-left pull-right"></i>
   </span>
   </a>

   <ul class="treeview-menu" style="z-index: 101; width:200px;">

   <li><a href="generadorTickets"><i class="fa fa-ticket" aria-hidden="true"></i><span>Administración</a></li>
   <li><a href="dashboardTickets"><i class="fa fa-dashboard" aria-hidden="true"></i><span>Panel de Control</a></li>
   <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>Notificaciones</a>
   <ul id="dropdown-menu2" class="dropdown-menu" style="background-color:white;width:500px;overflow:scroll;height:200px;"></ul></a>
   </li>



   </ul>

   </li>';

   echo '<li><a href="estatusPedidos"><i class="fa fa-spinner"></i><span>Estatus de pedidos</a></li>';
   echo '<li><a href="productosListado"><i class="fa fa-product-hunt"></i><span>Listado Productos</a></li>';

  

 }if ( $_SESSION["nombre"] == "Aydé Flores") {

  echo '<li><a href="gastosSolicitudes"><i class="fa fa-money"></i> <span>Gastos Tiendas</span></a></li>';
  


 }
 if ( $_SESSION["nombre"] == "Ivan Herrera Perez") {

  echo '<li><a href="tableroCortes" sesion="'.$sucursal.'"><i class="fa fa-fax"></i><span>Corte de Caja</span></a></li>';
   echo '<li><a href="facturasCrm"><i class="fa fa-btc" aria-hidden="true"></i><span>Facturas CRM</span></a></li>';
  echo '<li><a href="cotizacionesComercial"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Cotizaciones Comercial</span></a></li>';


 }if($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez" || $_SESSION["nombre"] == "Sucursal Acatepec"){

  if ($_SESSION["nombre"] == "Diego Ávila" || $_SESSION["nombre"] == "Rocio Martínez Morales" || $_SESSION["nombre"] == "Aurora Fernandez") {

   if($_SESSION["nombre"] == "Diego Ávila"){

    $sucursal = "Mayoreo";

  }else if($_SESSION["nombre"] == "Aurora Fernandez"){

    $sucursal = "Industrial";

  }else if($_SESSION["nombre"] == "Rocio Martínez Morales"){

    $sucursal = "Rutas";

  }

  echo '<li><a href="tableroCortes" sesion="'.$sucursal.'"><i class="fa fa-fax"></i><span>Corte de Caja</span></a></li>';
  echo '<li><a href="facturasCrm"><i class="fa fa-btc" aria-hidden="true"></i><span>Facturas CRM</span></a></li>';
  echo '<li><a href="cotizacionesComercial"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Cotizaciones Comercial</span></a></li>';

}else{

 if ($_GET["ruta"] == "nuevoCorteCaja") {

  echo '<li><a href="#"><i class=""></i><span></a></li>';
  echo '<li class="treeview">

  <a href="#">
  <i class="fa fa-ticket" aria-hidden="true"><span class="label label-warning count" style="position: fixed;z-index: 200;width:30px;height:30px;font-size:16px;margin-left:10px;margin-top:-30px"></span></i>
  <span style="width:200px;">Tickets</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>

  <ul class="treeview-menu" style="z-index: 101; width:200px;">

  <li><a href="generadorTickets"><i class="fa fa-ticket" aria-hidden="true"></i><span>Administración</a></li>
  <li><a href="dashboardTickets"><i class="fa fa-dashboard" aria-hidden="true"></i><span>Panel de Control</a></li>
  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>Notificaciones</a>
  <ul id="dropdown-menu2" class="dropdown-menu" style="background-color:white;width:500px;overflow:scroll;height:200px;"></ul></a>
  </li>



  </ul>

  </li>';
  echo '<li><a href="tableroCortes" sesion="'.$_SESSION["nombre"].'"><i class="fa fa-fax"></i><span>Corte de Caja</span></a></li>';
  echo '<li><a href="facturasCrm"><i class="fa fa-btc" aria-hidden="true"></i><span>Facturas CRM</span></a></li>';
  echo '<li><a href="cotizacionesComercial"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Cotizaciones Comercial</span></a></li>';

}else{

 echo '<li><a href="#"><i class=""></i><span></a></li>';
 echo '<li class="treeview">

 <a href="#">
 <i class="fa fa-ticket" aria-hidden="true"><span class="label label-warning count" style="position: fixed;z-index: 200;width:30px;height:30px;font-size:16px;margin-left:10px;margin-top:-30px"></span></i>
 <span style="width:200px;">Tickets</span>
 <span class="pull-right-container">
 <i class="fa fa-angle-left pull-right"></i>
 </span>
 </a>

 <ul class="treeview-menu" style="z-index: 101; width:200px;">

 <li><a href="generadorTickets"><i class="fa fa-ticket" aria-hidden="true"></i><span>Administración</a></li>
 <li><a href="dashboardTickets"><i class="fa fa-dashboard" aria-hidden="true"></i><span>Panel de Control</a></li>
 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>Notificaciones</a>
 <ul id="dropdown-menu2" class="dropdown-menu" style="background-color:white;width:500px;overflow:scroll;height:200px;"></ul></a>
 </li>



 </ul>

 </li>';
 echo '<li><a href="tableroCortes" sesion="'.$_SESSION["nombre"].'"><i class="fa fa-fax"></i><span>Corte de Caja</span></a></li>';
 echo '<li><a href="facturasCrm"><i class="fa fa-btc" aria-hidden="true"></i><span>Facturas CRM</span></a></li>';
 echo '<li><a href="cotizacionesComercial"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Cotizaciones Comercial</span></a></li>';

}




}

}
if($_SESSION["perfil"] == "Administrador General"){

  echo '<li class="treeview">

  <a href="#">
  <i class="fa fa-fax"><span class="label label-danger count2" style="position: fixed;z-index: 200;width:30px;height:30px;font-size:16px;margin-left:10px;margin-top:-30px"></span></i><span>Corte de Caja</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>

  <ul class="treeview-menu" style="z-index: 101; width:200px;">

  <li><a href="tableroCortes" sesion="'.$_SESSION["nombre"].'"><i class="fa fa-fax"></i><span>Corte de Caja</a></li>
  <li><a href="abonos"><i class="fa fa-money"></i><span>Abonos Facturas</a></li>
  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count2" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>Notificaciones</a>
  <ul id="dropdown-menu3" class="dropdown-menu" style="background-color:white;width:550px;overflow:scroll;height:200px;"></ul></a>
  </li>



  </ul>

  </li>';
}
if ($_SESSION["perfil"] == "Credito y Cobranza") {

  echo '<li class="treeview">

  <a href="#">
  <i class="fa fa-fax"><span class="label label-danger" style="position: fixed;z-index: 200;width:30px;height:30px;font-size:16px;margin-left:10px;margin-top:-30px"></span></i><span>Corte de Caja</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>

  <ul class="treeview-menu" style="z-index: 101; width:200px;">
<li><a href="tableroCortes" sesion="'.$_SESSION["nombre"].'"><i class="fa fa-fax"></i><span>Corte de Caja</a></li>
  <li><a href="ajusteSaldos"><i class="fa fa-fax"></i><span>Ajustes De Saldos</a></li>
  <li><a href="abonos"><i class="fa fa-money"></i><span>Abonos Facturas</a></li>
  <li><a href="facturasTiendas"><i class="fa fa-file-text"></i><span>Facturas Tiendas</a></li>




  </ul>

  </li>';

}

}else{

   if($_SESSION["nombre"] === "Adrian Aguilera Rosete"){ 
     echo '<li><a href="facturasCrm"><i class="fa fa-btc" aria-hidden="true"></i><span>Facturas CRM</span></a></li>';
    echo '<li><a href="cotizacionesComercial"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Cotizaciones Comercial</span></a></li>';

  }else{ 

 echo '<li class="treeview">

 <a href="#">
 <i class="fa fa-ticket" aria-hidden="true"><span class="label label-warning count" style="position: fixed;z-index: 200;width:30px;height:30px;font-size:16px;margin-left:10px;margin-top:-30px"></span></i>
 <span style="width:200px;">Tickets</span>
 <span class="pull-right-container">
 <i class="fa fa-angle-left pull-right"></i>
 </span>
 </a>

 <ul class="treeview-menu" style="z-index: 101; width:200px;">

 <li><a href="generadorTickets"><i class="fa fa-ticket" aria-hidden="true"></i><span>Administración</a></li>
 <li><a href="dashboardTickets"><i class="fa fa-dashboard" aria-hidden="true"></i><span>Panel de Control</a></li>
 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>Notificaciones</a>
 <ul id="dropdown-menu2" class="dropdown-menu" style="background-color:white;width:500px;overflow:scroll;height:200px;"></ul></a>
 </li>



 </ul>

 </li>';

 if ($_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Acatepec") {


 }else{
  echo '<li><a href="estatusPedidos"><i class="fa fa-spinner"></i><span>Estatus de pedidos</a></li>';
    echo '<li><a href="productosListado"><i class="fa fa-product-hunt"></i><span>Listado Productos</a></li>';

}

     

  }



}

?>



</ul> 