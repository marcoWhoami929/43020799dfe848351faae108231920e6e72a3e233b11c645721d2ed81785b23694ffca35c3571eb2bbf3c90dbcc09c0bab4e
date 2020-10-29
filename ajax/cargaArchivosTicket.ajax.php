<?php
session_start();
require_once "../controladores/tickets.controlador.php";
require_once "../modelos/tickets.modelo.php";
	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	$numeroTicket = $_POST["numTicket"];
	$url = $_POST["rutaTicket"];
	$contador = 0;
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {

			$filename = "tick-".$key; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			 //Obtenemos el numero del ticket para saber a que carpata acceder de la lista de archivos
			$nombreUsuario = $_SESSION["nombre"];

			$fecha = time();

			$newDate = date("d m Y-H i s", $fecha);
			
			$nombreFichero = $nombreUsuario.'-'.$newDate;
			
			$directorio = '../tickets/pedidos/'.$numeroTicket.'/'.$nombreFichero.'/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename.'.pdf'; //Indicamos la ruta de destino, así como el nombre del archivo
	
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {
		
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
	$tabla5 = "eventosticket";
	$datos5 = array("idTicket" => $numeroTicket,
					"tipo"  => 'LOAD',
					"idAutorDepartamento" => $_SESSION['departamento'],
					"idAutorUser" => $_SESSION['id']);
	$respuesta = ModeloTickets::mdlRegistroLogsEvento($tabla5, $datos5);
	if ($respuesta == "ok") {
		header('Location: '.$url.'');
	}
	
?>