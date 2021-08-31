<?php
error_reporting(E_ALL);
if($_SESSION["nombre"] == "Marco Lopez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        LISTA DE FACTURAS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">FACTURAS</li>
    
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
        <br>
        
        
        <br>
        <CENTER><h2>FACTURAS TODAS LAS TIENDAS</h2></CENTER>
        
        <div class="box-tools">

     
        </div>
 
        <div class="container  col-lg-12 col-md-12 col-sm-12">
         
        </div>

      </div>

    </div>

  
  </section>

</div>
 <script type="text/javascript">
      $(document).ready(function() {        
          $.timer(180000, function(temporizador){

                  if (localStorage.getItem("pausadoRifa") === null) {

                      localStorage.setItem("pausadoRifa",0);
                  }else{

                       if (localStorage.getItem("pausadoRifa") == 1) {
                     
                        }else{


                           obtenerFacturasRifa('Pinturas').then(
                              function () {
                                obtenerFacturasRifa('Torres');
                              }
                            );

                        }
                   

                  }
                   
                   
                })

            });

       if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
  
    </script>