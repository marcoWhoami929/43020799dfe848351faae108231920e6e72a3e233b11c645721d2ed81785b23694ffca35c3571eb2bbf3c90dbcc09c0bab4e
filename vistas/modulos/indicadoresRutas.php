<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Tablero
    <small>INDICADORES</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>

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

         <div class="col-lg-6" >
            <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
         </div>
         
        
          

      </div>

    </div>
      <!-- row -->
    <div class="row">

      <div class="container">
              <h5 style="font-weight: bold;font-size: 25px">Búsqueda por rango de fechas</h5>
              <div class="row">
               <form action="indicadoresRutas" method="POST">
                <div class="container">
                  <div class="col-lg-3">
                    <?php
                    if (isset($_POST["fechaInicio"])) {
                       echo '<input type="date" id="fechaInicio" name="fechaInicio" class="form-control" placeholder="Fecha Inicio" value="'.date('Y-m-d', strtotime($_POST["fechaInicio"])).'">';
                    }else {

                         echo '<input type="date" id="fechaInicio" name="fechaInicio" class="form-control" placeholder="Fecha Inicio">';

                     }
                    ?>


                  </div>
                  <div class="col-lg-3">
                     <?php
                     if (isset($_POST["fechaFinal"])) {
                       echo '<input type="date" id="fechaFinal" name="fechaFinal" class="form-control" placeholder="Fecha Inicio" value="'.date('Y-m-d', strtotime($_POST["fechaFinal"])).'">';
                    }else {

                         echo '<input type="date" id="fechaFinal" name="fechaFinal" class="form-control" placeholder="Fecha Final">';

                     }
                    ?>

                  </div>
                  <div class="col-lg-2">
                    <input type="submit" class="btn btn-info" value="BUSCAR">
                  </div>
                   
                </div>
              </form>
              </div>
              
             </div>
             <br>
             <br>
      
      <div id="container" class="col-lg-4"></div>
      <div id="container2" class="col-lg-4"></div>
      <div id="container3" class="col-lg-4"></div>
      
      
      
      <?php
        include("inicio/graficoPartidasRutas.php");
        include("inicio/graficoUnidadesRutas.php");
        include("inicio/graficoImportesRutas.php");
        //include("inicio/graficoFechas.php");
      ?>
    

    </div>
    <!-- row -->
 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->
<script type="text/javascript">
  /*
    function actualiza(){
    $("#container").load("vistas/modulos/inicio/graficoNivelPartidas.php");
  }
  setInterval( "actualiza()", 1000 );

  function actualiza2(){
    $("#container2").load("vistas/modulos/inicio/graficoNivelSurtimiento.php");
  }
  setInterval( "actualiza2()", 1000 );

  function actualiza3(){
    $("#container3").load("vistas/modulos/inicio/graficoNivelSurtimientoCosto.php");
  }
  setInterval( "actualiza3()", 1000 );

  */
</script>
<script type="text/javascript">
    
  
     function limpiar(){

        $("#fechaInicio").val("");
        $("#fechaFinal").val("");


     }
  </script>