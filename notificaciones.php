<?php
	include("config.php");

	$sql = $dbh->prepare("SELECT * FROM messages WHERE recivied = 0");

  	$sql->execute();

  	$data = $sql->fetchAll();

  	if (count($data) > 0) {

  		if ($data[count($data) - 1]['name'] === $_SESSION['user']) {
  			echo 0;
  			return;
  		}

  		echo true;

  		$sql = $dbh->prepare("UPDATE messages SET recivied = 1 WHERE recivied = 0");

  		$sql->execute();

  		return;
  	}

  	echo 0;