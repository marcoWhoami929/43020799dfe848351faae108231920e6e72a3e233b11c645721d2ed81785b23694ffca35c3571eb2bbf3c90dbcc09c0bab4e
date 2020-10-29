<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Tiendas"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      SUBCATEGORIAS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Subcategorias</li>
    
    </ol>

  </section>

  <section class="content">
    <div class="box">

      <div class="box-header with-border">
      	<?php 


         $dia = date("l");
         $mes = date("l"); 
         $dianumero = date("d");
         $año = date("Y");

         setlocale(LC_ALL, "es_MX");
         $fecha = strftime('%B', strtotime($mes));
         $diaLetra = strftime('%A', strtotime($dia));

         echo "<h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3>";

         ?>
         <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
      </div>

    </div>

    <div class="col-lg-9 col-md-9 col-sm-12">
      <div class="box box-success">

        <div class="box-header with-border">
          <h3 class="box-title">Marcas</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>

        </div>
        
        <div class="box-body padding">
          <div>
          <br>
            <table class="table table-bordered table-striped dt-responsive tablaMarcas" width="100%" style="border: 2px solid #001f3f">
              <thead style="background:#001f3f;color: white"> 
                <tr>

                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>Foto</th>
                  <th>Acciones</th>

                </tr> 
              </thead>
            </table>
                     
          </div>
                      
        </div>
      </div>
    </div>
        
    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="box box-success collapsed-box">

        <div class="box-header with-border">
                    
          <h3 class="box-title">Agregar Marcas</h3>

          <div class="box-tools pull-right">                        
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>        
          </div>

        </div>
                      
        <div class="box-body no-padding">                           
          <div class="col-lg-12 col-md-12 col-sm-12">

            <form  method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="codigo">Nombre</label>
                <input type="text" class="form-control" id="addNombre" name="addNombre" placeholder="Nombre" required>
              </div>

              <div class="form-group">
              
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              </div>
                                    
              <button type="submit" class="btn btn-success">Guardar</button>
            
            </form>
            <?php

              $agregarMarca = new ControladorControlMuestras();
              $agregarMarca -> ctrAgregarMarca();

            ?>
             </div>

        </div>
      </div>       
    </div>
            
    <div class="container-fluid">
      <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="box box-danger collapsed-box">

          <div class="box-header with-border">
                      
            <h3 class="box-title">Subcategorias de Marcas</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>

          </div>

          <div class="box-body padding">
            <div class="container col-lg-12 col-md-12 col-sm-12">
              <div class="row">
                                 
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <table class="table table-bordered table-striped dt-responsive tablaSubcategorias" width="100%" style="border: 2px solid #001f3f">
                            
                    <thead style="background:#001f3f;color: white">           
                      <tr>
                        <th style="width:10px">#</th>
                        <th>Nombre</th>
                        <th>Foto</th>
                        <th>Marca</th>
                        <th>Acciones</th>
                      </tr> 
                    </thead>

                  </table>
                </div>
                                  
              </div>
                                
            </div>
          </div>

        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="box box-danger collapsed-box">

        <div class="box-header with-border">
                    
          <h3 class="box-title">Agregar Subcategoria</h3>

          <div class="box-tools pull-right">                        
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>        
          </div>

        </div>
                      
        <div class="box-body no-padding">                           
          <div class="col-lg-12 col-md-12 col-sm-12">

            <form  method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" id="addNombreSub" name="addNombreSub" placeholder="Nombre" required>
              </div>

              <div class="form-group">
              
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-empire" aria-hidden="true"></i></span> 
                  <select class="form-control" id="addMarcaSub" name="addMarcaSub">
                    <option value="" >Selecionar Marca</option>
                    <?php

                    $item = null;
                    $valor = null;

                    $subcategoria = ControladorControlMuestras::ctrMostrarMarcas($item, $valor);

                    foreach ($subcategoria as $key => $value) {
                      
                      echo '<option value="'.$value["idMarca"].'">'.$value["nombre"].'</option>';
                    }

                    ?>
                     </select>
                </div>

            </div>

              <div class="form-group">
              
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              </div>
                                    
              <button type="submit" class="btn btn-success">Guardar</button>
            
            </form>
             <?php

              $agregarSubcategoria = new ControladorControlMuestras();
              $agregarSubcategoria -> ctrAgregarSubcategoria();

            ?>
             </div>

        </div>
      </div>       
    </div>

    </div>

    <div class="container-fluid">
          <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="box box-warning collapsed-box">

              <div class="box-header with-border">
                          
                <h3 class="box-title">Subcategorias Desglose</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>

              </div>

              <div class="box-body padding">
                <div class="container col-lg-12 col-md-12 col-sm-12">
                  <div class="row">
                                     
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <table class="table table-bordered table-striped dt-responsive tablaSubcategoriasDesglose" width="100%" style="border: 2px solid #001f3f">
                                
                        <thead style="background:#001f3f;color: white">           
                          <tr>
                            <th style="width:10px">#</th>
                            <th>Descripón</th>
                            <th>Subcategoria</th>
                            <th>Acciones</th>
                          </tr> 
                        </thead>

                      </table>
                    </div>
                                      
                  </div>
                                    
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="box box-warning collapsed-box">

            <div class="box-header with-border">
                        
              <h3 class="box-title">Agregar Desglose</h3>

              <div class="box-tools pull-right">                        
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>        
              </div>

            </div>
                          
            <div class="box-body no-padding">                           
              <div class="col-lg-12 col-md-12 col-sm-12">

                <form  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="Descripcion">Descripción</label>
                    <input type="text" class="form-control" id="addDescripcion" name="addDescripcion" placeholder="Descripción" required>
                  </div>

                  <div class="form-group">
                  
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-empire" aria-hidden="true"></i></span> 
                      <select class="form-control" id="addCategoria" name="addCategoria">
                        <option value="" >Selecionar Categoria</option>
                        <?php

                        $item = null;
                        $valor = null;

                        $subcategoria = ControladorControlMuestras::ctrMostrarSubcategoria($item, $valor);

                        foreach ($subcategoria as $key => $value) {
                          
                          echo '<option value="'.$value["idSubcategoria"].'">'.$value["nombreSubcategoria"].'</option>';
                        }

                        ?>
                        </select>
                    </div>

                </div>

                                        
                  <button type="submit" class="btn btn-success">Guardar</button>
                
                </form>
                <?php

                  $agregarSubcategoriaDesglose = new ControladorControlMuestras();
                  $agregarSubcategoriaDesglose -> ctrAgregarSubcategoriaDesglose();

                ?> 
                </div>

            </div>
          </div>       
        </div>



        </div>
         <div class="container-fluid">
          <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="box box-info collapsed-box">

              <div class="box-header with-border">
                          
                <h3 class="box-title">Subcategorias Subdesglose</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>

              </div>

              <div class="box-body padding">
                <div class="container col-lg-12 col-md-12 col-sm-12">
                  <div class="row">
                                     
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <table class="table table-bordered table-striped dt-responsive tablaSubDesglose" width="100%" style="border: 2px solid #001f3f">
                                
                        <thead style="background:#001f3f;color: white">           
                          <tr>
                            <th style="width:10px">#</th>
                            <th>Descripón</th>
                            <th>Subcategoria Desglose</th>
                            <th>Marca</th>
                            <th>Acciones</th>
                          </tr> 
                        </thead>

                      </table>
                    </div>
                                      
                  </div>
                                    
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="box box-info collapsed-box">

            <div class="box-header with-border">
                        
              <h3 class="box-title">Agregar Subdesglose</h3>

              <div class="box-tools pull-right">                        
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>        
              </div>

            </div>
                          
            <div class="box-body no-padding">                           
              <div class="col-lg-12 col-md-12 col-sm-12">

                <form  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="Descripcion">Descripción</label>
                    <input type="text" class="form-control" id="addDescripcionSub" name="addDescripcionSub" placeholder="Descripción" required>
                  </div>

                  <div class="form-group">
                  
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-empire" aria-hidden="true"></i></span> 
                      <select class="form-control" id="addSubdesglose" name="addSubdesglose">
                        <option value="" >Selecionar Categoria</option>
                        <?php

                        $item = null;
                        $valor = null;

                        $subcategoria = ControladorControlMuestras::ctrMostrarSubcategoriaDesglose($item, $valor);

                        foreach ($subcategoria as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                        }

                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="Marca">Marca</label>
                    <input type="text" class="form-control" id="addMarca" name="addMarca" placeholder="Marca" required>
                  </div>

                </div>

                                        
                  <button type="submit" class="btn btn-success">Guardar</button>
                
                </form>
                <?php

                  $agregarSubdesglose = new ControladorControlMuestras();
                  $agregarSubdesglose -> ctrAgregarSubcategoriaSubdesglose();

                ?>
                </div>

            </div>
          </div>       
        </div>

        
  </section>
  <!--=====================================
MODAL EDITAR PERFIL
======================================-->

<div id="modalEditarMarca" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Marca</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <span style="font-weight: bold">Nombre de la Marca</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-image"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                <input type="hidden" id="idMarcas" name="idMarcas">

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

          <button type="submit" class="btn btn-primary">Modificar</button>

        </div>
         <?php
          
          $editarMarca = new ControladorControlMuestras();
          $editarMarca -> ctrEditarMarca();
          

        ?>
        </form>

    </div>

  </div>

</div>

<!--=====================================
    MODAL EDITAR SUBCATEGORIA
======================================-->
<div id="modalEditarSubcategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Subcategoria</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <span style="font-weight: bold">Nombre de la Subcategoria</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-image"></i></span> 

                <input type="text" class="form-control input-lg" id="editarSubcategoria" name="editarSubcategoria" value="" required>

                <input type="hidden" id="idSubMarca" name="idSubMarca">

              </div>

            </div>

             <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-empire" aria-hidden="true"></i></span> 
                  <select class="form-control" id="editarMarcaSub" name="editarMarcaSub">
                    <option value=""></option>
                    <?php

                    $item = null;
                    $valor = null;

                    $subcategoria = ControladorControlMuestras::ctrMostrarMarcas($item, $valor);

                    foreach ($subcategoria as $key => $value) {
                      
                      echo '<option value="'.$value["idMarca"].'">'.$value["nombre"].'</option>';
                    }

                    ?> 
                    </select>
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

          <button type="submit" class="btn btn-primary">Modificar</button>

        </div>
        <?php
          
          $editarSubcategoria = new ControladorControlMuestras();
          $editarSubcategoria -> ctrEditarSubcategoria();
          

        ?> 
        </form>

    </div>

  </div>

</div>

<!--=====================================
    MODAL EDITAR SUBCATEGORIA
======================================-->
<div id="modalEditarDesglose" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Desglose</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <span style="font-weight: bold">Descripcón</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" value="" required>

                <input type="hidden" id="idDesglose" name="idDesglose">

              </div>

            </div>

             <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-empire" aria-hidden="true"></i></span> 
                  <select class="form-control" id="editarSubcategoriaD" name="editarSubcategoriaD">
                    <option value=""></option>
                 <?php

                        $item = null;
                        $valor = null;

                        $subcategoria = ControladorControlMuestras::ctrMostrarSubcategoria($item, $valor);

                        foreach ($subcategoria as $key => $value) {
                          
                          echo '<option value="'.$value["idSubcategoria"].'">'.$value["nombreSubcategoria"].'</option>';
                        }

                        ?>                 
                  </select>
                </div>

          </div>

        </div>
         <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar</button>

        </div>

     <?php
          
          $editarDesglose = new ControladorControlMuestras();
          $editarDesglose -> ctrEditarSubcategoriaDesglose();
          

        ?> 

      </form>

    </div>

  </div>

</div>
<!--=====================================
    MODAL EDITAR SUBCATEGORIA SUBDESGLOSE
======================================-->
<div id="modalEditarSubDesglose" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Sub Desglose</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <span style="font-weight: bold">Descripcón</span>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcionSub" name="editarDescripcionSub" value="" required>

                <input type="text" id="idSub" name="idSub">

              </div>

            </div>

             <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-empire" aria-hidden="true"></i></span> 
                  <select class="form-control" id="editarSubDesglose" name="editarSubDesglose">
                    <option value=""></option>
                 <?php

                        $item = null;
                        $valor = null;

                        $subDesglose = ControladorControlMuestras::ctrMostrarSubcategoriaDesglose($item, $valor);

                        foreach ($subDesglose as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                        }

                        ?>                 
                  </select>
                </div>

                <div class="form-group">
              
                  <span style="font-weight: bold">Marca</span>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> 

                    <input type="text" class="form-control input-lg" id="editarMarca" name="editarMarca" value="" required>

                  </div>

                </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar</button>

        </div>

     <?php
          
          $editarSubDesglose = new ControladorControlMuestras();
          $editarSubDesglose -> ctrEditarSubDesglose();
          

        ?> 

      </form>

    </div>

  </div>

</div>


</div>

<?php

  $eliminarMarca = new ControladorControlMuestras();
  $eliminarMarca -> ctrEliminarMarca();

?>

<?php

  $eliminarSubcategoria = new ControladorControlMuestras();
  $eliminarSubcategoria -> ctrEliminarSubcategoria();

?>

<?php

  $eliminarDesglose = new ControladorControlMuestras();
  $eliminarDesglose -> ctrEliminarSubcategoriaDesglose();

?>
<?php

  $eliminarSubDesglose = new ControladorControlMuestras();
  $eliminarSubDesglose -> ctrEliminarSubDesglose();

?>