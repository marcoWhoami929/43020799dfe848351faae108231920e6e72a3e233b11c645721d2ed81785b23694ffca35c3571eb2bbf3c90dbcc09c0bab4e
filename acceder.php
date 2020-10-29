<br/><br/>
<?php 

if(isset($_POST['name']) && !isset($display_case)){
 $name=htmlspecialchars($_POST['name']);
 $sql=$dbh->prepare("SELECT name FROM chatters WHERE name=?");
 $sql->execute(array($name));
 if($_POST['name'] == $name){

  $_SESSION['user']=$name;

 }
 else{
  $sql=$dbh->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
  $sql->execute(array($name));
  $_SESSION['user']=$name;
 
 }
}elseif(isset($display_case)){
 if(!isset($ermsg)){
?>
 <form action="salaChat" method="POST">
  <input name="name" class="feedback-input" placeholder="Nombre de usuario" required/>
  <button id="button-blue">Registrar nombre</button>
 </form>
<?php 
 }else{
?>
 <form action="salaChat" method="POST">
  <input name="name" class="feedback-input" placeholder="Nombre de usuario" required/>
  <button id="button-blue">Registrar nombre</button>
 </form>
<?php 
  echo $ermsg;
 }
 echo '<p align="center">Esta es una sala de chat en la cual pueden comunicarse las áreas participantes</p>';
}

?>

