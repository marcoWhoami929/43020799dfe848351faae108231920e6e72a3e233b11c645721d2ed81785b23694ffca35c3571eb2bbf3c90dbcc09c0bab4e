<?php 


include("config.php");
$sql=$dbh->prepare("SELECT * FROM chatters");
$sql->execute();
		$aktip = "";
echo '<p style="font-size:22px;font-weight:bold">Leido por <img src="vistas/img/chat/palomitas.png" width="2%""></p>';
while($r=$sql->fetch()){
     if(isset($_SESSION['user'])){
	if($_SESSION['user'] == $r['name']){
		$aktip = "<a href='logout.php' class='keluar'>Salir del chat</a>";
	}
	 }

 echo "<div class='user'><p style='font-weight:lighter; font-size:18px'>{$r['name']}</p>
 <br><img src='vistas/img/chat/palomitas.png' width='1.9%'><small>{$r['seen']}</small> </div>";
}



?>
