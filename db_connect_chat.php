<?php
/* Database connection start */
$servername = "127.0.0.1";
$username = "mat";
$password = "matriz";
$dbname = "chat";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
printf("Connect failed: %sn", mysqli_connect_error());
exit();
}
?>