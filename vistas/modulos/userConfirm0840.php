<?php
include('connection.php');
require_once 'googleLib/GoogleAuthenticator.php';
$gauth = new GoogleAuthenticator();

if(isset($_SESSION['user_id']) == false)
{
	echo "<script> window.location = 'acceso0840'; </script>";
}

$user_id = $_SESSION['user_id'];
$user_result = mysqli_query($conn,"select * from tbl_users where user_id='$user_id'") or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($user_result);

$secret_key	= $user_row['google_auth_code'];
$email	= $user_row['email'];

$google_QR_Code = $gauth->getQRCodeGoogleUrl($email, $secret_key,'Matriz');
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ACCESO A BANCOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Acceso a Bancos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
			<small><strong>Nota:</strong>Si ya escaneo por primera vez el código QR omitir paso 2 y pasar al paso 3</small>
        </div>
        <div class="box-body">
        	<div class="container col-lg-12">
           
           			<div id="container">
						<center><label style="font-weight: lighter;font-size: 55px;">¡Bienvenido(a) <?php echo $_SESSION["nombre"]; ?>!</label></center>
						<div id='device'>
							<br>
						<center><label style="font-weight: bold;font-size: 25px;">TOKEN DE SEGURIDAD:</label></center>
								<center><small style="font-weight: lighter;font-size: 15px;">Ingresa el código de seguridad que se muestra en tu Disposito Móvil en la aplicación Authenticator.</small></center>
						<br>
						<div id="img"><img src='<?php echo $google_QR_Code; ?>' /></div>

						<form id="LI-form" onKeypress="if(event.keyCode == 13) event.returnValue = false;">

						<input type="hidden" id="process_name" name="process_name" value="verify_code" />
							<div class="form-group">
								
								<input type="password" name="scan_code" class="form-control" id="scan_code" required />
							</div>
							<div class="nota">
								<br>

								<center><i class="fa fa-info-circle fa-2x" style="color: #40BDF3"></i></center>
								<center><small style="font-weight: lighter;font-size: 20px;padding-top: 40px;margin-left: 20px;margin-right: 20px;">Solicitamos tu codigo para autenticar tu identidad y autorizar tu acceso al área de Bancos.</small></center>
							</div>
							   <br>
							<input type="button" style="width: 15%;float: left;" class="btn btn-success btn-submit" value="Verificar Código"/>
							
						</form>
						</div>
					
					</div>
					
        	</div>
        </div>
        <br>
		<br>
		<br>
        <!-- /.box-body -->
        <div class="box-footer">
            <strong>Pasos:</strong>
            <p>1.- Descargar la aplicación Google Authenticator de la tienda de aplicaciones.</p>            
            <p>2.- Escanear el código QR con la aplicación Google Authenticator.</p>
            <p>3.- Escribir el código aleatorio que se muestra en la aplicación y dar click en el botón verificar código.</p>
           	<small>*El código cambia automáticamente cada minuto.</small>
          	
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

	<script>
		$(document).ready(function(){
			/* submit form details */
			$(document).on('click', '.btn-submit', function(ev){
				if($("#LI-form").valid() == true){
					var data = $("#LI-form").serialize();
					$.post('check_user.php', data, function(data,status){
						console.log("submitnig result ====> Data: " + data + "\nStatus: " + status);
						if( data == "done"){
							swal({

						type: "success",
						title: "¡Acceso correcto!",
						showConfirmButton: true,
						confirmButtonText: "Acceder"

					}).then(function(result){

						if(result.value){
						
							window.location = 'banco0840';

						}

					});
							
						}
						else{
							swal({

						type: "error",
						title: "¡No se puede acceder verificar el código generado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "userConfirm0840";

						}

					});
						}
						
					});
				}
			});
			/* ebd submit form details */
		});
	</script>
