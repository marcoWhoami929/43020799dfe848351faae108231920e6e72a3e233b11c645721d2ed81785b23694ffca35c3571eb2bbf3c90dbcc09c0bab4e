
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        LISTA DE FACTURAS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">LISTA FACTURAS</li>
    
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
        <CENTER><h2>FACTURAS CRM</h2></CENTER>
        
        <div class="box-tools">

                  <?php
                  echo '<div class="container col-lg-12 col-md-12 col-sm-12"><br>
                    <h5 style="font-weight: bold;font-size: 25px">Búsqueda por Rango de Fechas</h5><br>
                    <div class="row">
                     <form action="facturasCrm" method="POST">
                      <div class="container col-lg-12 col-md-12 col-sm-12">
                        
                        <div class="col-lg-3">';?>
                            <?php
                            if (isset($_POST["fecha"])) {
                               echo '<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fecha"])).'">';
                               echo '<input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaFin"])).'" required>';

                              

                            }else {

                                 echo '<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" required>';
                                 echo '<input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" required>';
                                

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
          <table class="table-bordered table-striped dt-responsive tablaFacturasCrm estiloBordesTablas" width="100%" id="facturacionTiendas" >
         
                  <thead class="estilosTablas">
                   
                   <tr style="">
                     
                     <th style="width:20px;height: 40px;border:none">#</th>
                     <th style="border:none">Fecha Factura</th>
                     <th style="border:none">Accion</th>
                     <th style="border:none">Estatus</th>
                     <th style="border:none">Serie</th>
                     <th style="border:none">Folio</th>
                     <th style="border:none">Codigo Cliente</th>
                     <th style="border:none">Cliente</th>
                     <th style="border:none">Neto</th>
                     <th style="border:none">Impuesto</th>
                     <th style="border:none">Total</th>
                     <th style="border:none">Forma Pago</th>
                     <th style="border:none">Sucursal</th>
                   

                   </tr> 

                  </thead>
                </table>
        </div>

   

      </div>

    </div>

  
  </section>

</div>
