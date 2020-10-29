<?php


if(!isset($dbh)){
 session_start();
 date_default_timezone_set("America/Mexico_City");
 $musername = "mat";
 $mpassword = "matriz";
 $hostname  = "127.0.0.1";
 $dbname    = "chat";
 $dbh=new PDO('mysql:dbname='.$dbname.';host='.$hostname.";port=3306",$musername, $mpassword);
 /*Change The Credentials to connect to database.*/
 include("user_online.php");


}
?>

