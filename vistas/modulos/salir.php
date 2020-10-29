<?php

session_start();
$tabla = "bitacora";

						$datos = array("usuario" => $_SESSION['nombre'],
											   "perfil" => $_SESSION['perfil'],
											   "accion" => 'Salió del Sistema',
											   "folio" => 'Sin folio');

						$respuesta = ModeloAdministradores::mdlRegistroBitacoraSalir($tabla, $datos);
session_unset();
session_destroy();

echo '<script>
	
	window.location= "ingreso";

</script>';