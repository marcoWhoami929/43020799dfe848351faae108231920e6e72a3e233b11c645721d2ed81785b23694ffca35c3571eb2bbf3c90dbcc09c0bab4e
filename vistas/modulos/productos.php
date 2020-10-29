<?php

if($_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["perfil"] == "Administrador General"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    GESTOR DE PRODUCTOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">PRODUCTOS</li>
    
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

         setlocale(LC_ALL, "es_MX.UTF-8");
         $fecha = strftime('%B', strtotime($mes));
         $diaLetra = strftime('%A', strtotime($dia));

         echo "<h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3>";

         ?>

         <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
        

      </div>

      <div class="box-body">
         <?php
          if ($_SESSION["perfil"] == "Administrador General") {
                      
                        echo '<div class="">
                      <div class="row">
                        <form action="importListaPrecios.php" method="post" enctype="multipart/form-data" id="import_form">
                          <div class="col-md-4">
                            <input type="file" name="file" id="inputFile" />
                          </div>
                          <div class="col-md-2">
                            <input type="submit" class="btn btn-success" name="import_data" onclick="agregar()" value="ACTUALIZAR PRECIOS">
                          </div>';

                          ?>
                         <?php 


                           

                       echo '</form>
                      </div>
                    </div>';

                     

                    }
        ?>
        <div class="logi" id="logi">
          <CENTER><h2>LISTA DE PRODUCTOS</h2></CENTER>
         
         <div class="box-tools">
          <a href="vistas/modulos/reportes.php?reporte=productos">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>
        

        </div>
        <br>

        <br>
        <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%" id="productos">
         
          <thead>
           
           <tr>
             
             <th>#</th>
             <th>Código</th>
             <th>Descripción</th>
             <th>Catálogo</th>
             <th>Base</th>
             <th>Cubeta</th>
             <th>Galón</th>
             <th>Litro</th>
             <th>500 ML</th>
             <th>250 ML</th>
             <th>125 ML</th>
             <th>Distribuidor</th>
             <th>Estado</th>
             <th>Clave Sat</th>
             <th>Unidad Medida</th>

      


           </tr> 

          </thead>

        </table>
        </div>
        

      </div>

    </div>

  
  </section>

</div>
<script>
    /**
     * Funcion que captura las variables pasados por GET
     * Devuelve un array de clave=>valor
     */
    function getGET()
    {
        // capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];
            // obtenemos un array con cada clave=valor
            var GET = getString.split('&');
            var get = {};
 
            // recorremos todo el array de valores
            for(var i = 0, l = GET.length; i < l; i++){
                var tmp = GET[i].split('=');
                get[tmp[0]] = unescape(decodeURI(tmp[1]));
            }
            return get;
        }
    }
 
    window.onload = function()
    {
        // Cogemos los valores pasados por get
        var valores=getGET();
        if(valores)
        {
            // hacemos un bucle para pasar por cada indice del array de valores
            for(var index in valores)
            {
                
                if (valores[index] == "success") {
              
                  swal({

                      type: "success",
                      title: "¡Los precios han sido actualizados correctamente!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                      if(result.value){
                        
                        window.location = "productos";

                      }

                    });
                }else if (valores[index] == "error") {
                  swal({

                        type: "error",
                        title: "¡UPPS! Hubo un error durante la ejecución",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                      }).then(function(result){

                        if(result.value){
                        
                          window.location = "productos";

                        }

                      });
                }else if (valores[index] == "invalid_file") {
                      swal({

                        type: "error",
                        title: "¡UPPS!El formato del archivo es inválido",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                      }).then(function(result){

                        if(result.value){
                        
                          window.location = "productos";

                        }

                      });
                }
            }
        }else{
            
        }
    }
    </script>