<?php
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Control Matriz | Panel de Control</title>

  <link rel="icon" href="vistas/img/plantilla/icono.png">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  
  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!--<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>-->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue-light.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <!-- Animate css -->
  <link rel="stylesheet" href="vistas/css/animated.css">

   <!-- jvectormap -->
  <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

  <!-- bootstrap slider -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">

  <!-- bootstrap tags input -->
  <link rel="stylesheet" href="vistas/plugins/tags/bootstrap-tagsinput.css">

 <!-- bootstrap datepicker -->
   <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
   <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  

  <!-- Dropzone -->
  <!--<link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css">-->

  <!--Date time picker-->
  <link rel="stylesheet" href="vistas/css/bootstrap-datetimepicker.min.css">

  <!--jquery.progressbar-->
  <link rel="stylesheet" type="text/css" href="vistas/css/jquery.progressbar.css">

  <!--STYLE PROGRESS BAR-->
  <link rel="stylesheet" type="text/css" href="vistas/css/style.css">

  <!--STYLE PROGRESS BAR-->
  <link rel="stylesheet" type="text/css" href="vistas/css/chat.css">

  
  <link rel="stylesheet" href="extensiones/plantilla/css/estilos.css">
  <link rel="stylesheet" href="extensiones/plantilla/css/font-awesome.css">


 <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

  <link rel="stylesheet" href="vistas/css/plantilla.css">

   <?php
   if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

   
   }else{
     if(isset($_GET["ruta"]) == "ingreso" || isset($_GET["ruta"]) == "login"){

      echo '<link rel="stylesheet" href="vistas/css/login.css">';

    }else{

        echo '<link rel="stylesheet" href="vistas/css/login.css">';
    }
   }
  ?>

  <link rel="stylesheet" href="vistas/css/slide.css">

    <!--Jquery UI-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
   
   <!--Jquery UI-->
   <!--<link rel="stylesheet" href="vistas/css/jquery-ui.css">-->

   
  <!--=====================================
  CSS PERSONALIZADO DE AUTENTICACION
  ======================================-->
  <link rel="stylesheet" type="text/css" href="vistas/css/app_style.css">

  <!--tags editor-->
  <link rel="stylesheet" type="text/css" href="vistas/css/jquery.tag.editor.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
  <script src="vistas/js/shortcut.js"></script>
  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  

    <!-- jQuery UI 1.11.4 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- iCheck http://icheck.fronteed.com/-->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

    <!-- Morris.js charts -->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>

  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- jQuery Knob Chart -->
  <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

  <!-- jvectormap -->
  <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

  <script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

  <!-- ChartJS -->
  <script src="vistas/bower_components/chart.js/Chart.js"></script>
  
  <script type="text/javascript" src="vistas/js/scripts.js"></script>

 
 


  <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
  <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

  <!-- Bootstrap slider http://seiyria.com/bootstrap-slider/-->
  <script src="vistas/plugins/bootstrap-slider/bootstrap-slider.js"></script>

  <!-- DataTables https://datatables.net/-->
  <script src="vistas/js/jquery.dataTables.min.js"></script>
  <script src="vistas/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <script type="text/javascript" src="vistas/js/dataTables.fixedHeader.min.js"></script>
  <script type="text/javascript" src="vistas/js/dataTables.fixedColumns.min.js"></script>

  <script type="text/javascript" src="vistas/js/dataTables.semanticui.min.js"></script>
  <script type="text/javascript" src="vistas/js/semantic.min.js"></script>

  <!-- bootstrap tags input https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/-->
  <script src="vistas/plugins/tags/bootstrap-tagsinput.min.js"></script>

   <!-- bootstrap datetimepicker http://bootstrap-datepicker.readthedocs.io-->
  <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

   <!-- Dropzone http://www.dropzonejs.com/-->
  <!--<script src="vistas/plugins/dropzone/dropzone.js"></script>-->

  <script src="vistas/js/reloj.js"></script>

  <!--Date time picker-->
  <script src="https://momentjs.com/downloads/moment.js"></script>
  <script src="vistas/js/bootstrap-datetimepicker.min.js"></script>

   <!--jquery.progressbar-->
   <script src="vistas/js/jquery.progressbar.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.14/jquery.tinymce.min.js"></script>

   


  <!--Jquery UI-->
   <!--<script src="vistas/js/jquery-ui.js"></script>-->

   <!--<script src="vistas/js/jquery-1.10.2.js"></script>-->
    <!--=====================================
    JS PERSONALIZADO DE AUTENTICACION
    ======================================-->
    <script type="text/javascript" src="vistas/js/jquery.validate.min.js"></script>
    <!--<script type="text/javascript" src="vistas/js/chat.js"></script>-->
    <script type="text/javascript" src="vistas/js/push.min.js"></script>

    <!--INPUT MASK PARA FORMATEAR CAMPOS DE TEXTO-->
    <script type="text/javascript" src="vistas/js/jquery.mask.js"></script>
    <!--INPUT MASK PARA FORMATEAR CAMPOS DE TEXTO-->
    <script src="vistas/code/highcharts.js"></script>
    <script src="vistas/code/highcharts-more.js"></script>
    <script src="vistas/code/modules/exporting.js"></script>
    <script src="vistas/code/modules/export-data.js"></script>

    <script src="extensiones/plantilla/js/script.js"></script>


    <!-- tags editor-->
    <script src="vistas/js/jquery.caret.min.js"></script>
    <script src="vistas/js/jquery.tag-editor.js"></script>

</head>

<body class="hold-transition skin-blue-light sidebar-collapse sidebar-mini login-page-cotizador">

<?php

 if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

    echo '<div class="wrapper">';

    /*=============================================
     CABEZOTE
     =============================================*/

     include "modulos/cabezote.php";

    /*=============================================
     LATERAL
     =============================================*/

     include "modulos/lateral.php";

     /*=============================================
     CONTENIDO
     =============================================*/

     if(isset($_GET["ruta"])){

          $carpeta = "vistas/modulos/";
          $class = $carpeta . $_GET["ruta"]. '.php';


          if (!file_exists($class)) {
              include "modulos/404.php";
          }else{

            include "modulos/".$_GET["ruta"].".php";
            

          }   

     }else{

       include "modulos/inicio.php";

     }

     /*=============================================
     FOOTER
     =============================================*/

     include "modulos/footer.php";


    echo '</div>';

 }else{

  include "modulos/login.php";

 }

 
?>

<!--=====================================
JS PERSONALIZADO
======================================-->

<script src="vistas/js/plantilla.js"></script>




<!-- GESTORES DE CONTROL MATRIZ -->
<script src="vistas/js/gestorAdministradores.js"></script>
<script src="vistas/js/gestorUsuarios.js"></script>
<script src="vistas/js/gestorAtencion.js"></script>
<script src="vistas/js/gestorAlmacen.js"></script>
<script src="vistas/js/gestorLaboratorio.js"></script>
<script src="vistas/js/gestorFacturacion.js"></script>
<script src="vistas/js/gestorLogistica.js"></script>
<script src="vistas/js/gestorCompras.js"></script>
<script src="vistas/js/gestorClientes.js"></script>
<script src="vistas/js/gestorProveedores.js"></script>
<script src="vistas/js/gestorBitacora.js"></script>
<script src="vistas/js/gestorBanco0198.js" async="async"></script>
<script src="vistas/js/gestorBanco6278.js"></script>
<script src="vistas/js/gestorBanco3450.js"></script>
<script src="vistas/js/gestorCaja.js"></script>
<script src="vistas/js/gestorBanco1286.js"></script>
<script src="vistas/js/gestorBanco1219.js"></script>
<script src="vistas/js/gestorBanco0840.js"></script>
<script src="vistas/js/gestorBanco1340.js"></script>
<script src="vistas/js/gestorEstatusPedidos.js"></script>
<script src="vistas/js/login.js"></script>
<script src="vistas/js/gestorCotizaciones.js"></script>
<script src="vistas/js/gestorVerCotizaciones.js"></script>
<script src="vistas/js/gestorNotificaciones.js"></script>
<script src="vistas/js/gestorAcumulado.js"></script>
<script src="vistas/js/gestorAcumuladoMensual.js"></script>
<script src="vistas/js/gestorProspectos.js"></script>
<script src="vistas/js/gestorProductos.js"></script>
<script src="vistas/js/ScriptGrafico3.js"></script>
<script src="vistas/js/gestorTickets.js"></script>
<script src="vistas/js/gestorOrdenTrabajo.js"></script>
<script src="vistas/js/gestorAlmacenRuta.js"></script>
<script src="vistas/js/gestorFacturacionRuta.js"></script>
<script src="vistas/js/gestorEstatusOrdenes.js"></script>
<script src="vistas/js/gestorFacturasTiendas.js"></script>

<script src="vistas/js/gestorEntregas.js"></script>
<script src="vistas/js/timer.js"></script>
<script src="vistas/js/menuDinamico.js"></script>
<script src="vistas/js/gestorBanco7338.js"></script>
  <script src="vistas/js/template.js"></script>

<!-- GESTORES DE CONTROL MATRIZ -->

</body>
</html>