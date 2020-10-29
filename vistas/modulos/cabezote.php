 <!-- main-header -->
 <header class="main-header">

	<!-- logo -->
    <a href="#" class="logo">
      
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="vistas/img/plantilla/icono.png" class="img-responsive" style="padding:10px; filter:contrast(200%);"></span>
      <!-- logo for regular state and mobile devices -->    
      <span class="logo-lg"><img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:10px 30px; filter:contrast(200%);"></span>
    
    </a>
    <!-- logo -->

     <!-- navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
		
		 <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

		<!-- navbar-custom-menu -->
    	<div class="navbar-custom-menu"> 

    		<ul class="nav navbar-nav">
			
				<?php
					session_start();
					if ($_SESSION["perfil"] == "Administrador General") {

            include "cabezote/notificaciones.php";
            include "cabezote/usuario.php";
            //include "cabezote/notificacionesApp.php";


            
          }else if ($_SESSION["perfil"] == "Atencion a Clientes") {

            include "cabezote/notificaciones.php";
            include "cabezote/usuario.php";
            
          }else if($_SESSION["perfil"] == "Tiendas"){

             //include "cabezote/notificacionesApp.php";
             include "cabezote/usuario.php";

          }else{

              include "cabezote/usuario.php";

          }		



				?>

    		</ul>

    	</div>
		<!-- navbar-custom-menu -->

    </nav>
    <!-- navbar -->

 </header>
 <!-- main-header -->
 <script type="text/javascript">
  /*
    function actualiza(){
    $("#cabeceras-notificaciones").load("cabezote/notificaciones.php");
  }
  setInterval( "actualiza()", 1000 );
  */
</script>