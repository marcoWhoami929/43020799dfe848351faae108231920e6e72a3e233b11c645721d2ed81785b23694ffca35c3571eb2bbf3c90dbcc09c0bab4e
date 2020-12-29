
<div class="content-wrapper" style="margin-bottom: 150px;">
  <section class="content-header">
    <h1>
      Actualizar Datos
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Actualizar></li>
    </ol>
  </section>

  <section class="content" >

    <div  class="col-lg-6 col-md-6 col-sm-6">
      <form action="importFacturasValidacion.php" method="post" enctype="multipart/form-data" id="actualizarDatos">
        <div  class="col-lg-12 col-md-12 col-sm-12">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <input type="file" name="file" id="inputFile" />
            <input type="submit" class="btn btn-success" name="import_data" value="IMPORTAR">

          </div>
        </div>
      </form>
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
                      title: "¡Los datos han sido ingresados correctamente!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                      if(result.value){
                        
                        window.location = "actualizarFacturasTiendas";

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
                        
                          window.location = "actualizarFacturasTiendas";

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
                        
                          window.location = "actualizarFacturasTiendas";

                        }

                      });
                }
            }
        }else{
            
        }
    }
    </script>