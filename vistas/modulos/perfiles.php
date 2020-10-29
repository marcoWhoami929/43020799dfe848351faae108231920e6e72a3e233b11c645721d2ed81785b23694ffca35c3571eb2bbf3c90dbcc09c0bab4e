<?php
include("activos.php");
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarPerfil">Agregar Usuario</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="vistas/modulos/reportes.php?reporte=administradores">

             <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>

        </div>
        <br>
        <!--<?php //echo $USUARIOS_ACTIVOS; ?>-->
      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaPerfiles" width="100%" id="perfiles">
         
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Nombre</th>
             <th>Email</th>
             <th>Foto</th>
             <th>Grupo</th>
             <th>Perfil</th>
             <th>Estado</th>
             <th>Acciones</th>
             <th>Cotizador</th>

           </tr> 

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $perfiles = ControladorAdministradores::ctrMostrarAdministradores($item, $valor);

             foreach ($perfiles as $key => $value){

                 echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["email"].'</td>';

                         if($value["foto"] != ""){

                          echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                         }else{

                            echo '<td><img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                        }

                        echo '<td>'.$value["grupo"].'</td>';
                        echo '<td>'.$value["perfil"].'</td>';


                         if($value["estado"] != 0){

                          echo '<td><button class="btn btn-success btn-xs btnActivar" idPerfil="'.$value["id"].'" estadoPerfil="0">Activado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnActivar" idPerfil="'.$value["id"].'" estadoPerfil="1">Desactivado</button></td>';

                        } 

                         echo '<td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarPerfil" idPerfil="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnEliminarPerfil" idPerfil="'.$value["id"].'" fotoPerfil="'.$value["foto"].'" nombre="'.$value["nombre"].'"><i class="fa fa-times"></i></button>

                          </div>  

                        </td>';

                        /*=============================================
                        AGREGADO POR DIEGO-PC
                        =============================================*/ 
                         if($value["cotizador"] != 0){

                          echo '<td><button class="btn btn-success btn-xs btnCotizador" idPerCotizador="'.$value["id"].'" estadoCotizador="0">Activado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnCotizador" idPerCotizador="'.$value["id"].'" estadoCotizador="1">Desactivado</button></td></tr>';
                        } 
                    /*=============================================
                    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                    =============================================*/   

                              
             }


            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PERFIL
======================================-->

<div id="modalAgregarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Perfil</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <span style="font-weight: bold">Email</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Email" id="nuevoEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
               <span style="font-weight: bold">Contraseña</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>
            
             <!-- ENTRADA PARA SELECCIONAR SU GRUPO -->

            <div class="form-group">
              
              <span style="font-weight: bold">Grupo de Usuario</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoGrupo" id="nuevoGrupo">
                  
                  <option value="">Selecionar grupo</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Generador">Generador</option>
                  
                  <option value="Editor">Editor</option>

                  <option value="Visualizador">Visualizador</option>

                  <option value="Sucursales">Sucursales</option>

                  <option value="Inventarios">Inventarios</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <span style="font-weight: bold">Perfil de Usuario</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar perfil</option>

                  <option value="Administrador General">Administrador General</option>

                  <option value="Generador de Reportes">Generador de Reportes</option>

                  <option value="Visualizador">Visualizador</option>
                  
                  <option value="Atencion a Clientes">Atención a Clientes</option>

                  <option value="Almacen">Almacén</option>

                  <option value="Laboratorio de Color">Laboratorio de Color</option>

                  <option value="Compras">Compras</option>

                  <option value="Facturacion">Facturación</option>

                  <option value="Logistica">Logística</option>

                  <option value="Bancos">Bancos</option>

                  <option value="Credito y Cobranza">Crédito y Cobranza</option>

                  <option value="Contabilidad">Contabilidad</option>

                  <option value="Tiendas">Tiendas</option>

                  <option value="Inventarios">Inventarios</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Perfil</button>

        </div>

        <?php

          $crearPerfil = new ControladorAdministradores();
          $crearPerfil -> ctrCrearPerfil();

          $registroBitacoraAgregar =  new ControladorAdministradores();
          $registroBitacoraAgregar -> ctrRegistroBitacoraAgregar(); 

        ?>

      </form>

    </div>

  </div>

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
            
              <!-- ENTRADA PARA SELECCIONAR SU GRUPO -->

            <div class="form-group">
              
              <span style="font-weight: bold">Grupo de Usuario</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarGrupo" id="editarGrupo">
                  
                  <option value="" id="editarGrupo">Selecionar grupo</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Generador">Generador</option>
                  
                  <option value="Editor">Editor</option>

                  <option value="Visualizador">Visualizador</option>

                  <option value="Sucursales">Sucursales</option>

                  <option value="Inventarios">Inventarios</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <span style="font-weight: bold">Perfil de Usuario</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarPerfil" id="editarPerfil">
                  
                  <option value="" id="editarPerfil">Selecionar perfil</option>

                  
                  <option value="Administrador General">Administrador General</option>

                  <option value="Generador de Reportes">Generador de Reportes</option>

                  <option value="Visualizador">Visualizador</option>
                  
                  <option value="Atencion a Clientes">Atención a Clientes</option>

                  <option value="Almacen">Almacén</option>

                  <option value="Laboratorio de Color">Laboratorio de Color</option>

                  <option value="Compras">Compras</option>

                  <option value="Facturacion">Facturación</option>

                  <option value="Logistica">Logística</option>
                  
                  <option value="Bancos">Bancos</option>

                  <option value="Credito y Cobranza">Crédito y Cobranza</option>

                  <option value="Contabilidad">Contabilidad</option>

                  <option value="Tiendas">Tiendas</option>

                  <option value="Inventarios">Inventarios</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

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

          $editarPerfil = new ControladorAdministradores();
          $editarPerfil -> ctrEditarPerfil();

          $registroBitacora =  new ControladorAdministradores();
          $registroBitacora -> ctrRegistroBitacoraEdicion();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $eliminarPerfil = new ControladorAdministradores();
  $eliminarPerfil -> ctrEliminarPerfil();

?> 
<script type="text/javascript">
  $(document).ready( function () { $('#perfiles').DataTable({
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
        data: {funcion: "funcion16"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }
      

    </script>