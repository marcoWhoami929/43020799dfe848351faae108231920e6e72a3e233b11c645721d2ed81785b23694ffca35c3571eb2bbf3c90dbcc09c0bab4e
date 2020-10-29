<?php 
include("config.php");
if(isset($_SESSION['user'])){
?>
<br>
<br>

 <div class='msgs'>
  
 	
  <?php include("msgs.php");?>
 </div>
 <form id="msg_form" action='subir_imagen.php' method='post' enctype='multipart/form-data'>
  <input name="msg" type="text" placeholder="Enviar mensaje" />
 </form>
<!--<form id="msg_form2" action='upload_file.php' method='post' enctype='multipart/form-data'>-->
<form id="msg_form2" action='subir_imagen.php' method='post' enctype='multipart/form-data'>
  
 <!--<button class="btn btn-primary" name="adjuntar" id="adjuntar"><i class="fa fa-file-image-o" aria-hidden="true"></i></button>-->

 <input type='file' id="file_url" name="foto" required />

 <input type='submit' name='submit' value='Adjuntar' />

 </form>

<?php 
}
?>