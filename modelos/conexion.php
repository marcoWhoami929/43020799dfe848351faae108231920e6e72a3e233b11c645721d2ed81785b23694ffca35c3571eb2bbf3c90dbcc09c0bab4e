<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=127.0.0.1;dbname=matriz",
						"mat",
						"matriz",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}

}