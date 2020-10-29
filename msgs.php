<?php 

include("config.php");
$sql=$dbh->prepare("SELECT * FROM messages");

$sql->execute();

$incremento = $sql->rowCount();

//print("Insertadas $incremento\n");

$_SESSION['canti'] = $incremento;



date_default_timezone_set('America/Mexico_City'); //configuro un nuevo timezone

$fecha = new DateTime('NOW');

//echo 'Fecha/hora actual: ', $fecha->format('Y-m-d H:i:s');



while($r=$sql->fetch()){
//echo '<embed src="whatsapp-apple.mp3" AUTOSTART="true" HIDDEN="true" width="0" height="0">';
	if($_SESSION['user'] == $r['name']){

		$aktip = "bubble-right";


	}else{
		$aktip = "bubble-left";
  

	}



 echo "<div class='urltag $aktip'><p><span class='name'>{$r['name']}</span><span class='msgc'>".urlf($r['msg'])."</span><img src='".$r['img']."' alt='".$r['img']."' class='zoom' id='aumento'><span class='dat'>{$r['posted']}</span></p></div>";
}
if(!isset($_SESSION['user']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
 echo "<script>window.location.reload()</script>";
 

}


   function urlf($text){
      $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
     preg_match_all($reg_exUrl, $text, $matches);
     $usedPatterns = array();
     foreach($matches[0] as $pattern){
       if(!array_key_exists($pattern, $usedPatterns)){
         $usedPatterns[$pattern]=true;
         $text = str_replace  ($pattern, '<a href="'.$pattern.'" rel="nofollow">'.$pattern.'</a> ', $text);   
       }
     }
     return $text;
   }




?>

