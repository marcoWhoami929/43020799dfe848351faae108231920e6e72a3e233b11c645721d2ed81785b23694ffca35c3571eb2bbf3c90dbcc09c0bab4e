<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["perfil"] == "Atencion a Clientes" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Sucursal Capu"  && $_SESSION["cotizador"] == "1"){



}else {
  echo '<script>

              swal({

                type: "error",
                title: "¡No tiene los privilegios para realizar esta acción!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

              }).then(function(result){

                if(result.value){
                
                  window.location = "inicio";

                }

              });
            

            </script>'; 

}

?>
<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    ENVÍO DE COTIZACIONES
    
    </h1>

    <ol class="breadcrumb">

      <li><a href="cotizador"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Cotizaciones</li>

    </ol>
   

  </section>
  <!-- content-header -->

  <!-- content -->
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

         echo "<div class='col-lg-6'><h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3></div>";


         ?>

         <div class="col-lg-12">
           <center><h2 style="font-weight: bold;color:tomato;">COTIZADOR</h2></center>
         </div>
         <div class="col-lg-6">
            <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
         </div>

      </div>

      <div class="box-body">
        <center><img src="vistas/img/plantilla/logo.png" width="20%"></center>
        <br>
        <br>

        <section class="form_wrap" style="width: 80%">

                <section class="cantact_info">
                    <section class="info_title">
                         <center><img src="vistas/img/plantilla/icono-xl.png" width="20%"></center>
                        <h2>SAN FRANCISCO<br>DEKKERLAB</h2>
                    </section>
                    <section class="info_items">
                        <p><span class="fa fa-envelope"></span>cotizador.sfdk@gmail.com</p>
                        <p><span class="fa fa-mobile"></span> 248 86 04</p>
                    </section>
                </section>

                <form method="POST" action="procesar.php" enctype="multipart/form-data" class="form_contact">
                    <h2>Envio de cotizaciones en linea</h2>
                    <div class="user_info">

                        <label for="email">Correo electronico *</label>
                        <input type="text" id="email" name="txtDestin" size="30" required>

                        <label for="names">Asunto</label>
                        <input type="text" id="names" name="txtAsunto" value = "Cotización San Francisco Dekkerlab">

                        <label for="mensaje">Mensaje *</label>
                        <textarea id="mensaje" name="txtMensa">Ha recibido este correo electrónico porque ha solicitado el envió de su cotización con nuestros agentes de venta.</textarea>
                        
                       <input type="file" name="txtAdjun" accept=".pdf" required>
                        <input type="submit" class="btn btn-info" value="Enviar Cotización" id="btnSend">
                    </div>
                </form>

        </section>
      </div>

    </div>
      <!-- row -->
    
    <!-- row -->
 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->
<script type="text/javascript">
    function actualiza(){
    $("#cabeceras").load("vistas/modulos/inicio/cajas-superiores.php");
  }
  setInterval( "actualiza()", 1000 );
</script>
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
                      title: "¡La cotización ha sido enviada exitosamente!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                      if(result.value){
                        
                        window.location = "enviarCotizaciones";

                      }

                    });
                }else if (valores[index] == "error") {
                  swal({

                        type: "error",
                        title: "¡UPPS! Hubo un error durante el envio del correo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                      }).then(function(result){

                        if(result.value){
                        
                          window.location = "enviarCotizaciones";

                        }

                      });
                }
            }
        }else{
            
        }
    }
    </script>