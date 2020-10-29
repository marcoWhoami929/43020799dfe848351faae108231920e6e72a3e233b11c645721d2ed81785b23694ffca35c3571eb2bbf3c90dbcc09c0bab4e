<?php
require_once("../../db_connect.php");
$dir_destino = '../img/promocionesApp/';
$imagen_subida = $dir_destino . basename($_FILES['foto']['name']);
$urlImagen = str_replace('..','vistas',$imagen_subida);
//Variables del metodo POST
$codigo=$_POST['codigo'];
$descripcion=$_POST['descripcion'];
if(!is_writable($dir_destino)){
	echo "no tiene permisos";
}else{
	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
		/*echo "Archivo ". $_FILES['foto']['name'] ." subido con éxtio.\n";
		echo "Mostrar contenido\n";
		echo $imagen_subida;*/
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_subida)) {
			
			//Creamos nuestra consulta sql
			$query="insert into promociones(codigo, descripcion, imagen) value ('$codigo', '$descripcion', '$urlImagen')";
			//Ejecutamos la consutla
			mysqli_query($conn,$query) or die('Error al procesar consulta: ' . mysql_error($conn));
			header('Location:../../controlMuestras');
		} else {
			echo "Posible ataque de carga de archivos!\n";
		}
	}else{
		header('Location:../../controlMuestras');
	}
}
?>