<?php
/*
$servername = "127.0.0.1";
$username = "mat";
$password = "matriz";
$dbname = "matriz";
*/
/* Database connection start */
$servername = "127.0.0.1";
$username = "mat";
$password = "matriz";
$dbname = "matrizPruebasServidor";
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');
if (mysqli_connect_errno()) {
printf("Connect failed: %sn", mysqli_connect_error());
exit();
}
?>