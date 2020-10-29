<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Facturacion" || $_SESSION["perfil"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["nombre"] == "Sebastián Rodríguez"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      REPORTE ACUMULADO MENSUAL
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reporte Acumulado M.</li>
    
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

      <div class="box-body">
        <br>
        
        
        <br>
        <CENTER><h2>REPORTE ACUMULADO MENSUAL</h2></CENTER>
        <br>
        <br>
      <div class="container">
              <h5 style="font-weight: bold;font-size: 25px">Búsqueda por mes</h5>
              <div class="row">
               <form action="reportAcumuladoMensual" method="POST">
                <div class="container">
                  <div class="col-lg-3">
                    <select id="fechaInicio" name="fechaInicio" style="border: solid;">
                      <?php
                          $valorFecha = $_POST["fechaInicio"];
                          switch ($valorFecha) {
                            
                            case '01':
                              echo '<option value="01">ENERO</option>';
                              break;
                            case '02':
                              echo '<option value="02">FEBRERO</option>';
                              break;
                            case '03':
                              echo '<option value="03">MARZO</option>';
                              break;
                            case '04':
                              echo '<option value="04">ABRIL</option>';
                              break;
                            case '05':
                              echo '<option value="05">MAYO</option>';
                              break;
                            case '06':
                              echo '<option value="06">JUNIO</option>';
                              break;
                            case '07':
                              echo '<option value="07">JULIO</option>';
                              break;
                            case '08':
                              echo '<option value="08">AGOSTO</option>';
                              break;
                            case '09':
                              echo '<option value="09">SEPTIEMBRE</option>';
                              break;
                            case '10':
                              echo '<option value="10">OCTUBRE</option>';
                              break;
                            case '11':
                              echo '<option value="11">NOVIEMBRE</option>';
                              break;
                            case '12':
                              echo '<option value="12">DICIEMBRE</option>';
                              break;

                            default:
                              echo '<option value="06">JUNIO</option>';
                              break;
                          }
                       ?>
                      <option value="01">ENERO</option>
                      <option value="02">FEBRERO</option>
                      <option value="03">MARZO</option>
                      <option value="04">ABRIL</option>
                      <option value="05">MAYO</option>
                      <option value="06">JUNIO</option>
                      <option value="07">JULIO</option>
                      <option value="08">AGOSTO</option>
                      <option value="09">SEPTIEMBRE</option>
                      <option value="10">OCTUBRE</option>
                      <option value="11">NOVIEMBRE</option>
                      <option value="12">DICIEMBRE</option>

                      
                    </select>
                    <input type="hidden" name="fechaIni" id="fechaIni" value="<?php echo $_POST["fechaInicio"] ?>">
                  </div>
                  <!--
                  <div class="col-lg-3">
                    <input type="date" id="fechaFinal" name="fechaFinal" class="form-control" placeholder="">
                  </div>
                -->
                  <div class="col-lg-2">
                    <input type="submit" class="btn btn-info" value="BUSCAR" >
                  </div>
                   
                </div>
              </form>
              </div>
             </div>
             <br>

        <table class="table-bordered table-striped dt-responsive reportAcumuladoMensual" width="100%" id="reportAcumuladoMensual" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             
             
             <th rowspan="2" style="border: none;">Agente Ventas</th>
             <th colspan="2" style="border:none">Pedido</th>
             <th colspan="2" style="border:none">Facturado</th>
             <th colspan="2" style="border:none">Mes</th>
             <th rowspan="2" style="border:none">Surtimiento</th>
             <th rowspan="2" style="border:none">Indicador</th>

           </tr> 
           <tr>
             <th style="border:none">PZ</th>
             <th style="border:none">Monto</th>
              <th style="border:none">Pz</th>
              <th style="border:none">Monto</th>
              <th style="border:none">Pz</th>
              <th style="border:none">Monto</th>
             
           </tr>

          </thead>

          
          
        </table>

        <div id="container1" style="height: 400px" class="col col-lg-6"></div>
        <div id="container2" style="height: 400px" class="col col-lg-6"></div>


         <div class="container col-lg-12" style="margin-top:50px">
          <div class="row" >
          <!--filtro agentes-->
          <form>
                <div class="container">
                  <div class="col-lg-3">
                    <select id="nombreAgenteSe" name="nombreAgenteSe" style="border: solid;" onchange="mostrarCliente(this.value)" onkeypress="return pulsar(event)">
                      <?php
                          $nombreAgente = $_POST["nombreAgente"];
                          switch ($nombreAgente) {
                            
                            case 'ROCIO MARTINEZ MORALES':
                              echo '<option value="ROCIO MARTINEZ MORALES">ROCIO MARTINEZ MORALES</option>';
                              break;
                            case 'LUIS ENRIQUE BUSTOS MONTERD':
                              echo '<option value="LUIS ENRIQUE BUSTOS MONTERD">LUIS ENRIQUE BUSTOS MONTERD</option>';
                              break;
                            case 'GOMEZ RODRIGUEZ ERICK':
                              echo '<option value="GOMEZ RODRIGUEZ ERICK">GOMEZ RODRIGUEZ ERICK</option>';
                              break;
                            case 'ORLANDO BRIONES AGUIRRE':
                              echo '<option value="ORLANDO BRIONES AGUIRRE">ORLANDO BRIONES AGUIRRE</option>';
                              break;
                            case 'JONATHAN GONZALEZ SANCHEZ':
                              echo '<option value="JONATHAN GONZALEZ SANCHEZ">JONATHAN GONZALEZ SANCHEZ</option>';
                              break;
                            case 'ALFREDO MENDOZA SEGURA':
                              echo '<option value="ALFREDO MENDOZA SEGURA">ALFREDO MENDOZA SEGURA</option>';
                              break;
                            case 'CASTOLO GALINDO ARTURO':
                              echo '<option value="ACASTOLO GALINDO ARTURO">CASTOLO GALINDO ARTURO>';
                              break;
                          }
                       ?>
                       <option value="">SELECCIONAR AGENTE</option>
                      <option value="ROCIO MARTINEZ MORALES">ROCIO MARTINEZ MORALES</option>
                      <option value="LUIS ENRIQUE BUSTOS MONTERD">LUIS ENRIQUE BUSTOS MONTERD</option>
                      <option value="GOMEZ RODRIGUEZ ERICK">GOMEZ RODRIGUEZ ERICK</option>
                      <option value="ORLANDO BRIONES AGUIRRE">ORLANDO BRIONES AGUIRRE</option>
                      <option value="JONATHAN GONZALEZ SANCHEZ">JONATHAN GONZALEZ SANCHEZ</option>
                      <option value="ALFREDO MENDOZA SEGURA">ALFREDO MENDOZA SEGURA</option>
                      <option value="CASTOLO GALINDO ARTURO">CASTOLO GALINDO ARTURO</option>

                      
                    </select>
                    <input type="hidden" name="nombreAgentes" id="nombreAgentes">
                  </div>
                  <div class="col-lg-3" style="padding-left: 50px">
                    <input id="buttonBus" type="button" class="btn btn-info" href="javascript" onclick="javascript: recarga()" value="BUSCAR" > 
                  </div>
                                   
                  
              
                </div>
              </form>
        </div>

        </div>
        
        <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col col-lg-12"></div>

        <span id="resultado" style="color: transparent">null</span>

        <?php
        include("inicio/graficoAcum1.php");
        include("inicio/graficoAcum2.php");  
      
        ?>

      </div>
    </div>
  </section>

</div>
<script type="text/javascript">

  if ($("#nombreAgente").val() != "") {

       var nombreAgente = $("#nombreAgente").val();

    }else{

      var nombreAgente = "";
    }

  function mostrarCliente(dato) {
        if (dato != "") {

          $("#nombreAgentes").val(dato);
          $("#nombreAgentes").keyup();
          
        }
      }
    
</script>
    <script type="text/javascript">
                      
                            $(document).ready(function(){    
                              $('#nombreAgenteSe').click(function(){        
                                  /*Captura de datos escrito en los inputs*/        
                                  var agente = document.getElementById("nombreAgentes").value;
                                  /*Guardando los datos en el LocalStorage*/
                                  localStorage.setItem("name", agente);
                              });   
                          });
                            $(document).ready(function(){    
                              $('#buttonBus').click(function(){
                                   
                                  /*Captura de datos escrito en los inputs*/        
                                  var agentename = localStorage.getItem("name");
                                  document.getElementById("resultado").innerHTML = agentename;
                                  //console.log(localStorage);
                              });   
                          });                          
                    </script>