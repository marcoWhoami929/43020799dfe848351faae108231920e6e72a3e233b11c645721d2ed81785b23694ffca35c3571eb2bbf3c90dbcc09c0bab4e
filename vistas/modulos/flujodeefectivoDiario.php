<?php
error_reporting(E_ALL);
include("archivos-flujo/flujo-diario.php");
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos"){

    if (isset($_SESSION["user_id"]) == true && $_SESSION['googleVerifyCode'] == true) {
      
      
    }else{

      echo "<script> window.location = 'acceso0198'; </script>";

    }



}else {
  echo '<script>
          window.location = "inicio"
          </script>'; 

}


?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      FLUJO DE EFECTIVO
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">FLUJO DE EFECTIVO</li>
    
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
        <div class="box-tools">

          

        </div> 
        <br>
        <div class="container">
          <div class="row">
            <div class="col-lg-2">
              
                  <form action="flujodeefectivoDiario" method="POST">
                    <div class="form-group">
                        <h5 style="font-weight: bold;font-size: 22px">Elegir Mes</h5>
                        <select class="form-control" id="selectMes" name="selectMes">
                            <option value="" disabled>Elegir valor</option>
                            <option value="ENERO">ENERO</option>
                            <option value="FEBRERO">FEBRERO</option>
                            <option value="MARZO">MARZO</option>
                            <option value="ABRIL">ABRIL</option>
                            <option value="MAYO">MAYO</option>
                            <option value="JUNIO">JUNIO</option>
                            <option value="JULIO">JULIO</option>
                            <option value="AGOSTO">AGOSTO</option>
                            <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                            <option value="OCTUBRE">OCTUBRE</option>
                            <option value="NOVIEMBRE">NOVIEMBRE</option>
                            <option value="DICIEMBRE">DICIEMBRE</option>
                      </select>
                       <br>
                      <input type="submit" class="btn btn-info" value="BUSCAR">
                            
                    </div>
                  </form>
 
            </div>
                  <div class="col-lg-10">
                     <h5 style="font-weight: bold;font-size: 22px">Búsqueda por rango de fechas</h5>
                        <div class="row">
                         <form action="flujodeefectivoDiario" method="POST">
                          <div class="container">
                            <div class="col-lg-3">
                              <input type="date" id="fechaInicio" name="fechaInicio" class="form-control" placeholder="Fecha Inicio">
                            </div>
                            <div class="col-lg-3">
                              <input type="date" id="fechaFinal" name="fechaFinal" class="form-control" placeholder="Fecha Final">
                            </div>
                            <div class="col-lg-2">
                              <input type="submit" class="btn btn-info" value="BUSCAR">
                            </div>
                                 
                              </div>
                          </form>
                        </div>
                  </div>
          </div>
  
        </div>
        <br>

        <br />
        
        <table id="example" class="table table-bordered table-striped" style="width:100%;">
                    <thead style="background: #f39c12;color: white;">
                        <tr>
                            <th style="border: none;">Entradas de efectivo</th>
                            <?php
                            $item = 'mes';
                           

                            if (isset($_POST["selectMes"])) {
                                 $mes = $_POST["selectMes"];
                                 $valor = $mes;
                            }else {
                              $valor = 'ENERO';
                            }
                            $item2 = 'fecha';
                            $item3 = 'fecha';
                            if (isset($_POST["fechaInicio"]) and isset($_POST["fechaFinal"])) {
                                $mesInicial = date('d/m/Y', strtotime($_POST["fechaInicio"]));
                                $valor2 = $mesInicial;
                                $mesFinal = date('d/m/Y', strtotime($_POST["fechaFinal"]));
                                $valor3 = $mesFinal;
                                echo $valor2;
                                echo $valor3;
                            }else {
                                $mesInicial = '01/02/2019';
                                $valor2 = date('d/m/Y', strtotime($mesInicial));
                                $mesFinal = '31/02/2019';
                                $valor3 = date('d/m/Y', strtotime($mesFinal));
                                
                            }
                            
                            

                            $diasMes = ControladorFlujo::ctrDiasMes($item, $valor);
                            foreach ($diasMes as $value) {
                                echo '<th style="border:none">'.$value["fecha"].'</th>';
                            }
                            ?>
                            <th style="border: none;">Total general</th>


                        </tr>
                    </thead>

                    <tbody>



                    </tbody>

                </table>
                <?php
                  setlocale(LC_TIME, 'es_MX');
                  $numero = substr('15/02/2019',-7,2);
                  echo $numero;
                  
                  $mes=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 
                  echo '<br>';
                  echo strtoupper($mes);

                ?>
          

      </div>

    </div>

  
  </section>

</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({

              
              "iDisplayLength": 100,
              "scrollY":        "400px",
              "scrollX":        true,
              "scrollCollapse": true,
              "ordering": false,
              "fixedColumns":   {
                  "leftColumns": 1,
                  "rightColumns": 1
              },
              "columnDefs": [
                  {
                      "targets": [ 0, 1, 2 ],
                      "className": 'mdl-data-table__cell--non-numeric'
                  }
              ],
              "language": {

              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
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
           }

      );
} );
</script>


