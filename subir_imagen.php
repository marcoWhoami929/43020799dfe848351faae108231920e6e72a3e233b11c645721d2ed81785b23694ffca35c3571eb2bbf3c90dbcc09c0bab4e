<?php
session_start();
require_once("db_connect_chat.php");

$dir_destino = 'chats/';
$imagen_subida = $dir_destino . basename($_FILES['foto']['name']);
$usuario = $_SESSION["user"];
 
if(!is_writable($dir_destino)){
	echo "no tiene permisos";
}else{
	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
		/*echo "Archivo ". $_FILES['foto']['name'] ." subido con éxtio.\n";
		echo "Mostrar contenido\n";
		echo $imagen_subida;*/
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_subida)) {
			
			
			//Creamos nuestra consulta sql
			$query="insert into messages(name,img) value ('$usuario','$imagen_subida')";
			//Ejecutamos la consutla
			mysqli_query($conn,$query) or die('Error al procesar consulta: ' . mysqli_error($conn));

			header('Location:salaChat');
		} else {
			echo "Posible ataque de carga de archivos!\n";
		}
	}else{
		header('Location:salaChat');
	}
}

?>
