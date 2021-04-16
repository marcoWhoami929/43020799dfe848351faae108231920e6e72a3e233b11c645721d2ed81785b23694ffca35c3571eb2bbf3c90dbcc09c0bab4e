
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        LISTA DE COTIZACIONES COMERCIAL
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Cotizaciones</li>
    
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
        <CENTER><h2>COTIZACIONES COMERCIAL</h2></CENTER>
        
        <div class="box-tools">

                  <?php
                  echo '<div class="container col-lg-12 col-md-12 col-sm-12"><br>
                    <h5 style="font-weight: bold;font-size: 25px">Búsqueda por Rango de Fechas</h5><br>
                    <div class="row">
                     <form action="cotizacionesComercial" method="POST">
                      <div class="container col-lg-12 col-md-12 col-sm-12">
                        
                        <div class="col-lg-3">';?>
                            <?php
                            if (isset($_POST["fechaCotizacion"])) {
                               echo '<input type="date" id="fechaCotizacion" name="fechaCotizacion" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaCotizacion"])).'">';
                               echo '<input type="date" id="fechaFinCotizacion" name="fechaFinCotizacion" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaFinCotizacion"])).'" required>';
                                echo '<select class="form-control" name="empresaCotizacion" id="empresaCotizacion"><option value="'.$_POST["empresaCotizacion"].'">'.$_POST["empresaCotizacion"].'</option><option value="Pinturas">Pinturas</option><option value="Flex">Flex</option><option value="Torres">Torres</option></select>';
                            

                              

                            }else {

                                 echo '<input type="date" id="fechaCotizacion" name="fechaCotizacion" class="form-control" placeholder="FechaCotizacion" required>';
                                 echo '<input type="date" id="fechaFinCotizacion" name="fechaFinCotizacion" class="form-control" placeholder="FechaCotizacion" required>';

                                 $usuario = $_SESSION["nombre"]; 

                                  if(preg_match('/Las Torres/i', $usuario)){
                                      
                                      $empresa = "Torres";
                                  }else{

                                      $empresa = "Pinturas";
                                  }
                                 echo '<select class="form-control" name="empresaCotizacion" id="empresaCotizacion"><option value="'.$empresa.'">'.$empresa.'</option><option value="Pinturas">Pinturas</option><option value="Flex">Flex</option><option value="Torres">Torres</option></select>';
                                

                             }
                            ?>


                          <?php echo'</div>';?>

                        <?php
                        echo '<div class="col-lg-2">
                          <input type="submit" class="btn btn-info" value="BUSCAR">
                        </div>
                         
                      </div>
                    </form>
                    </div>
                    
                   </div>';
              

             ?>
        </div>
        <br>
  
        <div class="container  col-lg-12 col-md-12 col-sm-12">
          <table class="table-bordered table-striped dt-responsive tablaCotizacionesComercial estiloBordesTablas" width="100%" id="facturacionTiendas" >
         
                  <thead class="estilosTablas">
                   
                   <tr>
                            <th style="border:none">Identificador</th>
                            <th style="border:none">Serie Cotización</th>
                            <th style="border:none">Folio Cotización</th>
                            <th style="border:none">Fecha Cotización</th>
                            <th style="border:none">Fecha Vencimiento</th>
                            <th style="border:none">Fecha Entrega</th>
                            <th style="border:none">Partidas</th>
                            <th style="border:none">Unidades</th>
                            <th style="border:none">Nombre Cliente</th>
                            <th style="border:none">Agente de Venta</th>
                            <th style="border:none">Total de Cotización</th>
                            <th style="border:none">Estatus</th>
                        
                            <th style="border:none">Referencias</th>
                            <th style="border:none">Observaciones</th>
                            <th style="border:none">Crm</th>
                        </tr>

                  </thead>
                </table>
        </div>

   

      </div>

    </div>

  
  </section>

</div>
