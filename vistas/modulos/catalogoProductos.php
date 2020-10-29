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
      
      CATALOGO DE PRODUCTOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Catalogo de Productos</li>
    
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
       <br>
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto"><i class="fa fa-plus" aria-hidden="true"></i> 
          Agregar Producto
        </button>
      </div> 
      <div class="box-body">
        <br>
        <table class="table-bordered table-striped dt-responsive tablaCatalogoProductos" width="100%" style="border: 2px solid #001f3f">
          <thead style="background:#001f3f;color: white;">
             <tr>
             
             <th style="width:10px;">#</th>
             <th>Código</th>
             <th>Descripción</th>
             <th>Cubeta</th>
             <th>Litro</th>
             <th>Galon</th>
             <th>Medio</th>
             <th>Cuarto</th>
             <th>Octavo</th>
             <th>Unidad Medida</th>
             <th style="width:100px;">Acciones</th>

           </tr>
          </thead>
        </table>

      </div>

    </div>


 
  </section>
</div>
<!--=====================================
      MODAL AGREGAR NUEVO INTEGRANTE
======================================-->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">

          <div class="tab-content">
            <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-terminal" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addCodigo" name="addCodigo" placeholder="Ingresar Código" value="" required>
              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-bars" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addDescripcion" name="addDescripcion" placeholder="Ingresar Descripción" value="" required>
              </div>

            </div>

            <!-- ENTRADA PRECIOS -->
            <div class="form-group" style="float: left;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addPrecioCubeta" name="addPrecioCubeta" placeholder="Ingresar Precio Cubeta" value="" required>
              </div>

            </div>
            <div class="form-group" style="float: right;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addPrecioGalon" name="addPrecioGalon" placeholder="Ingresar Precio Galón" value="" required>
              </div>

            </div>
            <div class="form-group" style="float: left;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addPrecioLitro" name="addPrecioLitro" placeholder="Ingresar Precio Litro" value="" required>
              </div>

            </div>
            <div class="form-group" style="float: right;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addPrecioMedio" name="addPrecioMedio" placeholder="Ingresar Precio 500ml" value="" required>
              </div>

            </div>
            <div class="form-group" style="float: left;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addPrecioCuarto" name="addPrecioCuarto" placeholder="Ingresar Precio 250ml" value="" required>
              </div>

            </div>
            <div class="form-group" style="float: right;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addPrecioOctavo" name="addPrecioOctavo" placeholder="Ingresar Precio 125ml" value="" required>
              </div>

            </div>
            <!-- ENTRADA UNIDAD DE MEDIDA -->
            <div class="form-group" style="float: left;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-underline" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addUnidadMedida" name="addUnidadMedida" placeholder="Ingresar Unidad Medida" value="" required>
              </div>

            </div>
            <div class="form-group" style="float: right;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-underline" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addValorMedida" name="addValorMedida" placeholder="Ingresar Valor Medida" value="" required>
              </div>

            </div>
            <div class="form-group" style="float: left;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-underline" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addGramaje" name="addGramaje" placeholder="Ingresar Gramaje" value="" required>
              </div>

            </div>
            <div class="form-group" style="float: right;">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-underline" aria-hidden="true"></i></span> 
                <input type="text" class="form-control input-lg" id="addNombreUnidad" name="addNombreUnidad" placeholder="Ingresar Nombre" value="" required>
              </div>

            </div>


            <div class="form-group">
              
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-industry" aria-hidden="true"></i></span> 
                  <select class="form-control input-lg addCatalogo" id="addCatalogo" name="addCatalogo">
                    <option value="" >Selecionar Catalogo</option>
                    <?php

                    $item = null;
                    $valor = null;

                    $catalogo = ControladorControlMuestras::ctrMostrarSubdesglose($item, $valor);

                    foreach ($catalogo as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                    }

                    ?>
                    </select>
                </div>

            </div>
 
          </div>
          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Agregar</button>

        </div>
         <?php

          $agregarProducto = new ControladorControlMuestras();
          $agregarProducto -> ctrAgregarProducto();

        ?>
        </form>

     </div>
     
   </div>

</div>

<!--=====================================
MODAL EDITAR INTEGRANTES
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">

              <div class="tab-content">
                <div class="form-group">
              
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-terminal" aria-hidden="true"></i></span> 
                    <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" value="" required>

                    <input type="hidden" id="idProducto" name="idProducto">
                  </div>

                </div>

                    <!-- EDITAREL NOMBRE -->
                    
                    <div class="form-group">
                      
                      <div class="input-group">          
                        <span class="input-group-addon"><i class="fa fa-bars" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" value="" required>
                                              </div>

                    </div>

                    <!-- EDITAR PRECIO -->
                    <div class="form-group" style="float: left;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarPrecioCubeta" name="editarPrecioCubeta" value="" required>
                      </div>

                    </div>
                    <div class="form-group" style="float: right;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarPrecioGalon" name="editarPrecioGalon" value="" required>
                      </div>

                    </div>

                    <div class="form-group" style="float: left;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarPrecioLitro" name="editarPrecioLitro" value="" required>
                      </div>

                    </div>
                    <div class="form-group" style="float: right;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarPrecioMedio" name="editarPrecioMedio" value="" required>
                      </div>

                    </div>

                    <div class="form-group" style="float: left;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarPrecioCuarto" name="editarPrecioCuarto" value="" required>
                      </div>

                    </div>
                    <div class="form-group" style="float: right;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarPrecioOctavo" name="editarPrecioOctavo" value="" required>
                      </div>

                    </div>

                    <!-- ENTRADA UNIDAD DE MEDIDA -->
                    <div class="form-group" style="float: left;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-underline" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarUnidadMedida" name="editarUnidadMedida" value="" required>
                      </div>

                    </div>
                    <div class="form-group" style="float: right;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-underline" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarValorMedida" name="editarValorMedida" value="" required>
                      </div>

                    </div>

                    <div class="form-group" style="float: left;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-underline" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarGramaje" name="editarGramaje" value="" required>
                      </div>

                    </div>
                    <div class="form-group" style="float: right;">

                      <div class="input-group">                  
                        <span class="input-group-addon"><i class="fa fa-underline" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control input-lg" id="editarNombreUnidad" name="editarNombreUnidad" value="" required>
                      </div>

                    </div>

                    <div class="form-group">
              
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-industry" aria-hidden="true"></i></span> 
                  <select class="form-control input-lg editarCatalogoDesglose" id="editarCatalogoDesglose" name="editarCatalogoDesglose">
                    <option value="" >Selecionar Catalogo</option>
                    <?php

                    $item = null;
                    $valor = null;

                    $catalogo = ControladorControlMuestras::ctrMostrarSubdesglose($item, $valor);

                    foreach ($catalogo as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                    }

                    ?>
                    </select>
                </div>

            </div>
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Producto</button>

        </div>
        <?php

          $editarProducto = new ControladorControlMuestras();
          $editarProducto -> ctrEditarProducto();

        ?>
         </form>

    </div>

  </div>

</div>
<?php

  $eliminarProducto = new ControladorControlMuestras();
  $eliminarProducto -> ctrEliminarProducto();

?>