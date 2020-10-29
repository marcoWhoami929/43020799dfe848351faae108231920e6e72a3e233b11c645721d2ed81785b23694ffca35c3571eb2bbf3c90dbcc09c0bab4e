<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="text-shadow: 3px 2px #000000;font-weight: bold;font-size: 40px">Verificación en 2 pasos</h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Verificación en 2 Pasos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

        </div>
        <div class="box-body">
        	<div class="container col-lg-12">
          
	
				<div class="row">
					<!--
					<div class="col-md-offset-1 col-md-4">
						<h3>Registro</h3>
						<form name="signup-form" id="signup-form">
						<input type="hidden" id="process_name" name="process_name" value="user_registor" />
						  <div class="errorMsg errorMsgReg"></div>
						  <div class="form-group">
							<label for="email">Nombre completo</label>
							<input type="text" name="reg_name" class="form-control" id="reg_name" required />
						  </div>
						  <div class="form-group">
							<label for="email">Email:</label>
							<input type="email" name="reg_email" class="form-control" id="reg_email" required />
						  </div>
						  <div class="form-group">
							<label for="password">Password:</label>
							<input type="password" name="reg_password" class="form-control" id="reg_password" required />
						  </div>
						  
						  <button type="button" class="btn btn-primary btn-reg-submit">Enviar</button>
						</form>

					</div>
					-->
					<div class="col-md-offset-1 col-md-2">
						
					</div>
					<div class="col-md-offset-1 col-md-4" style="-webkit-box-shadow: 23px 20px 19px 6px rgba(0,0,0,0.75);
-moz-box-shadow: 23px 20px 19px 6px rgba(0,0,0,0.75);
box-shadow: 23px 20px 19px 6px rgba(0,0,0,0.75);border-radius: 71px 0px 71px 0px;
-moz-border-radius: 71px 0px 71px 0px;
-webkit-border-radius: 71px 0px 71px 0px;
border: 1px dashed #000000;">
						<center><h3>Ingreso</h3></center>
						<form name="login-form" id="login-form">
						<input type="hidden" id="process_name" name="process_name" value="user_login" />
						  <div class="errorMsg errorMsgReg"></div>
						  <div class="form-group">
							<label for="login_email">Email:</label>
							<input type="email" name="login_email" class="form-control" id="login_email" required />

						  </div>
						  <div class="form-group">
						  	<div class="input-group" id="show_hide_password">
							<label for="login_password">Password:</label>
							<input type="password" name="login_password" class="form-control" id="login_password" required />
							 <div class="input-group-addon" style="border: none;background: white">
				                <a href=""><i class="fa fa-eye-slash" aria-hidden="true" style="margin-top: 25px;"></i></a>
				              </div>
				          	</div>
						  </div>
						  <small>*Si desea ver su contraseña dar click en el ícono que se encuentra junto al campo contraseña.</small>
						  <br>
						  <br>
						  <button type="button" class="btn btn-success btn-login-submit">Ingresar</button>
						  <br>
						  <br>
						  <br>
						</form>
						
					</div>
					<div class="col-md-offset-1 col-md-4">
						
					</div>
				</div>  
					
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <strong>Nota importante:</strong><p>Para el acceso con verificación en 2 pasos se debe de descargar la aplicacion Authenticator de google.</p>
          Cualquier duda sobre el manejo comunicarse con el administrador.
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
		$(document).on('click', '.btn-reg-submit', function(ev){
			if($("#signup-form").valid() == true){
				var data = $("#signup-form").serialize();
				$.post('check_user.php', data, function(data,status){
					console.log("submitnig result ====> Data: " + data + "\nStatus: " + status);
					if( data == "done"){
						
						swal({

						type: "success",
						title: "Usuario Agregado Exitosamente.",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "acceso1286";

						}

					});

					}
					else{
						swal({

						type: "error",
						title: "¡OPPS! El email ya está registrado en el sistema.",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "acceso1286";

						}

					});
					}
					
				});
			}
		});
		/* ebd submit form details */
		
		/* submit form details */
		$(document).on('click', '.btn-login-submit', function(ev){
			if($("#login-form").valid() == true){
				var data = $("#login-form").serialize();
				$.post('check_user.php', data, function(data,status){
					console.log("submitnig result ====> Data: " + data + "\nStatus: " + status);
					if( data == "done"){
						window.location = 'userConfirm1286';
					}
					else{
						swal({

						type: "error",
						title: "¡OPPS! No se puede acceder, porfavor verifique sus datos de acceso, o pongase en contacto con el administrador para saber si el usuario se encuentra activo.",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "acceso1286";

						}

					});
					}
					
				});
			}
		});
		/* ebd submit form details */

	});
</script>
