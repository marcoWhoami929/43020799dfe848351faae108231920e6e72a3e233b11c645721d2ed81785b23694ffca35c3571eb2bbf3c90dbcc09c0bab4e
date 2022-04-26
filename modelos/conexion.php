<?php

class Conexion{
	
	public $counter;
	public static function conectar(){

		$link = new PDO("mysql:host=127.0.0.1;dbname=matriz",
						"mat",
						"matriz",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}
	public static function conectarDekkerlab()
	{

		try {

			$connParam = new PDO(
				"sqlsrv:server=192.168.1.250;Database=adDEKKERLAB",
				"sa",
				"M78o03e09p56*",
				array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
				)
			);
		} catch (PDOException $e) {
			die("Error connecting to SQL SERVER: " . $e->getMessage());
		}

		return $connParam;
	}
	/*
	public static function conectar(){

		$link = new PDO("mysql:host=127.0.0.1;dbname=matriz",
						"root",
						"",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}
	*/

}