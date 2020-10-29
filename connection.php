<?php
session_start();
$conn = mysqli_connect("127.0.0.1","mat","matriz") or die(mysql_error());
$DB = mysqli_select_db($conn,"matriz") or die(mysql_error($conn));
date_default_timezone_set('America/Mexico_City');
?>