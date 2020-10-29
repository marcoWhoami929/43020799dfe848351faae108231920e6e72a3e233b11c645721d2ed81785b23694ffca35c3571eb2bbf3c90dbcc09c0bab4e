<div class="login-box" >

  <div class="login-logo" >
    <center><img src="vistas/img/plantilla/icono-xl.png" class="img-responsive" style="padding:10px 50px;width: 50%"></center>
  </div>
  <!-- /.login-logo -->

  <div class="login-box-body" >
     <center><img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:10px 50px;"></center>
    <p class="login-box-msg" style="font-size: 20px">BIENVENIDO A SAN FRANCISCO DEKKERLAB <br><strong>CONTROL MATRIZ</strong></p>


    <form  method="post">

      <div class="form-group has-feedback">
        <label>Ingresar correo:</label>
        <input type="email" class="form-control" placeholder="Correo electrónico" name="ingEmail" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>


      <div class="form-group has-feedback">
            <label>Ingresar password:</label>
            <div class="input-group" id="show_hide_password">
              <input class="form-control" type="password" placeholder="Contraseña" name="ingPassword" required>
              <div class="input-group-addon">
                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
              </div>
            </div>
      </div>
      <div class="form-group has-feedback">
        <small>*Si desea ver su contraseña dar click en el recuadro que se encuentra junto al campo contraseña.</small>
      </div>
      <div class="form-group has-feedback">
          <div class="row">
            <div class="form-control" style="border: none;">

              <div class="col-lg-6  col-md-6 col-sm-6">
                 <label class="radio-inline"><input type="radio" name="optRadio"  value="0" required><br>Matriz</label>
              </div>
              <div class="col-lg-6  col-md-6 col-sm-6">
                 <label class="radio-inline"><input type="radio" name="optRadio"  value="1" required><br>Cotizador</label>
              </div>
            </div>
          </div>  
      </div>
      <br>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>

      <?php

        $login = new ControladorAdministradores();
        $login -> ctrIngresoAdministrador();

      ?>

    </form>

  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->
<div class="modal" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" >
   <div class="modal-dialog" style=" width: 100%;height: 100%;margin: 0;padding: 0;">
      <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            
     </div>
         <div class="modal-body">


              <center><img src="vistas/img/plantilla/NAVIDAD.png" alt="" width="60%"></center>
      
          </div>
         <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
     </div>
      </div>
   </div>
</div>
<!-- 
<script>

  $( document ).ready(function() {
    $('#mostrarmodal').modal('toggle')
});
</script>
-->