<?php
session_start();
$conn = mysqli_connect("127.0.0.1","mat","matriz") or die(mysqli_error($conn));
$DB = mysqli_select_db($conn,"matriz") or die(mysqli_error($conn));
date_default_timezone_set('America/Mexico_City');
?>