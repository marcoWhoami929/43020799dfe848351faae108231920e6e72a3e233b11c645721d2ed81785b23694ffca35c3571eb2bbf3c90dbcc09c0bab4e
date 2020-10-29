<?php
if($_SESSION["perfil"] != "Administrador General"){

echo '<script>

  window.location = "inicio";

</script>';

return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Usuarios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
       

      </div>
      <div class="box-tools">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="vistas/modulos/reportes.php?reporte=tbl_users">

             <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>

        </div>
        <br>
        <!--<?php //echo $USUARIOS_ACTIVOS; ?>-->
      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%" id="usuarios">
         
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Email</th>
             <th>Foto</th>
             <th>Nombre</th>
             <th>Codigo de Autenticación</th>
             <th>Estado</th>
             <th>Acciones</th>

           </tr> 

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $perfiles = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

             foreach ($perfiles as $key => $value){

                 echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["email"].'</td>';

                         if($value["profile_image"] == ""){

                         echo '<td><img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                         }

                        echo '<td>'.$value["profile_name"].'</td>';
                        echo '<td>'.$value["google_auth_code"].'</td>';


                         if($value["estado"] != 0){

                          echo '<td><button class="btn btn-success btn-xs btnActivar" idPerfil="'.$value["user_id"].'" estadoPerfil="0">Activado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnActivar" idPerfil="'.$value["user_id"].'" estadoPerfil="1">Desactivado</button></td>';

                        } 

                         echo '<td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarPerfil" idPerfil="'.$value["user_id"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnEliminarPerfil" idPerfil="'.$value["user_id"].'" nombre="'.$value["profile_name"].'"><i class="fa fa-times"></i></button>

                          </div>  

                        </td>

                      </tr>';            
             }


            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL EDITAR PERFIL
======================================-->

<div id="modalEditarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
               <span style="font-weight: bold">Nombre de Usuario</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                <input type="hidden" id="idPerfil" name="idPerfil">

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
               <span style="font-weight: bold">Email</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
               <span style="font-weight: bold">Contraseña</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>
            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Perfil</button>

        </div>

     <?php

          $editarPerfil = new ControladorUsuarios();
          $editarPerfil -> ctrEditarPerfil();

          $registroBitacora =  new ControladorUsuarios();
          $registroBitacora -> ctrRegistroBitacoraEdicion();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $eliminarPerfil = new ControladorUsuarios();
  $eliminarPerfil -> ctrEliminarPerfil();

?> 
<script type="text/javascript">
  $(document).ready( function () { $('#usuarios').DataTable({
    "iDisplayLength": 5,
    "language": idioma_espanol
  }); } );

  var idioma_espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
</script>
 <script type="text/javascript">

      function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion17"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }
      

    </script>