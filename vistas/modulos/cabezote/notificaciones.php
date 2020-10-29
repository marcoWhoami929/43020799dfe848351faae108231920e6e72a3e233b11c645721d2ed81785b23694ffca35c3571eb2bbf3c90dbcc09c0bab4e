<?php

if($_SESSION["perfil"] == "Administrador General" and $_SESSION["perfil"] == "Atencion a Clientes"){

	return;	

}

$notificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

$totalNotificaciones = $notificaciones["nuevasCotizaciones"] + $notificaciones["cotizacionesAprobadas"] + $notificaciones["nuevosProspectos"];

?>

<!--=====================================
NOTIFICACIONES
======================================-->

<!-- notifications-menu -->
<li class="dropdown notifications-menu">
	
	<!-- dropdown-toggle -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		
		<i class="fa fa-bell-o"></i>
		
		<span class="label label-warning"><?php  echo $totalNotificaciones ?></span>
	
	</a>
	
	<!-- dropdown-toggle -->

	<!--dropdown-menu -->
	<ul class="dropdown-menu">

		<li class="header">Tu tienes <span class="label label-warning"> <?php  echo $totalNotificaciones ?></span> notificaciones</li>

		<li>
			<!-- menu -->
			<ul class="menu">

				<!-- NUEVAS COTIZACIONES -->
				<li>
				
					<a href="" class="actualizarNotificaciones" item="nuevasCotizaciones">
					
						<i class="fa fa-users text-aqua"></i>Nuevas Cotizaciones <span class="label label-warning"> <?php  echo $notificaciones["nuevasCotizaciones"] ?></span>
					
					</a>

				</li>

				<!-- COTIZACIONES APROBADAS -->
				<li>
				
					<a href="" class="actualizarNotificaciones" item="cotizacionesAprobadas">
					
						<i class="fa fa-shopping-cart text-aqua" id="cotAprob"></i>Cotizaciones Aprobadas <span class="label label-warning"> <?php  echo $notificaciones["cotizacionesAprobadas"] ?></span>
					
					</a>

				</li>
				<!-- NUEVOS PROSPECTOS -->
				<li>
				
					<a href="" class="actualizarNotificaciones" item="nuevosProspectos">
					
						<i class="fa fa-map-marker text-aqua"></i>Nuevos Prospectos <span class="label label-warning"> <?php  echo $notificaciones["nuevosProspectos"] ?></span>
					
					</a>

				</li>
				

			</ul>
			<!-- menu -->

		</li>

	</ul>
	<!--dropdown-menu -->

</li>
<!-- notifications-menu -->	
