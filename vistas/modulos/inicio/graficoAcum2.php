<script type="text/javascript">
	Highcharts.chart('container2', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    text: 'Total facturado por agente'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      depth: 35,
      dataLabels: {
        enabled: true,
        format: '{point.name}'
      }
    }
  },
  series: [{
    type: 'pie',
    name: 'Porcentaje',
    data: [

      {
        name: 'ROCIO MARTINEZ MORALES',
       
          <?php
          if (isset($_POST["fechaInicio"])) {

             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);
             //var_dump($datosAcumulado);
           

             foreach ($datosAcumulado as $key => $datosValores) {
                  $valorAg1 = str_replace('$', '', $datosValores[1][4]);
                  $agente1 = str_replace(',', '', $valorAg1);
                  
             }
              


          }else {
            $agente1 = '32332.45';
            
            
          }

        ?>



         y: <?php echo $agente1 ?>,
        sliced: true,
        selected: true
      },
 

      {
        name: 'LUIS ENRIQUE BUSTOS MONTERD',
         
          <?php
          if (isset($_POST["fechaInicio"])) {

             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);
             //var_dump($datosAcumulado);
           

             foreach ($datosAcumulado as $key => $datosValores) {
                  $valorAg2 = str_replace('$', '', $datosValores[2][4]);
                  $agente2 = str_replace(',', '', $valorAg2);
                  
             }
              


          }else {
            $agente2 = '32332.45';
            
            
          }

        ?>

          y: <?php echo $agente2 ?>,
        sliced: true,
        selected: true
      },

      {
        name: 'GOMEZ RODRIGUEZ ERICK',
         
          <?php
          if (isset($_POST["fechaInicio"])) {

             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);
             //var_dump($datosAcumulado);
           

             foreach ($datosAcumulado as $key => $datosValores) {
                  $valorAg3 = str_replace('$', '', $datosValores[3][4]);
                  $agente3 = str_replace(',', '', $valorAg3);
                  
             }
              


          }else {
            $agente3 = '32332.45';
            
            
          }

        ?>


          y: <?php echo $agente3 ?>,
        sliced: true,
        selected: true
      },
    
      {
        name: 'ORLANDO BRIONES AGUIRRE',
        
          <?php
          if (isset($_POST["fechaInicio"])) {

             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);
             //var_dump($datosAcumulado);
           

             foreach ($datosAcumulado as $key => $datosValores) {
                  $valorAg4 = str_replace('$', '', $datosValores[5][4]);
                  $agente4 = str_replace(',', '', $valorAg4);
                  
             }
              


          }else {
            $agente4 = '32332.45';
            
            
          }

        ?>

          y: <?php echo $agente4 ?>,
        sliced: true,
        selected: true
      },

      {
        name: 'JONATHAN GONZALEZ SANCHEZ',
        
          <?php
          if (isset($_POST["fechaInicio"])) {

             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);
             //var_dump($datosAcumulado);
           

             foreach ($datosAcumulado as $key => $datosValores) {
                  $valorAg5 = str_replace('$', '', $datosValores[6][4]);
                  $agente5 = str_replace(',', '', $valorAg5);
                  
             }
              


          }else {
            $agente5 = '32332.45';
            
            
          }

        ?>


          y: <?php echo $agente5 ?>,
        sliced: true,
        selected: true
      },
      
      {
        name: 'ALFREDO MENDOZA SEGURA',
      
          <?php
          if (isset($_POST["fechaInicio"])) {

             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);
             //var_dump($datosAcumulado);
           

             foreach ($datosAcumulado as $key => $datosValores) {
                  $valorAg6 = str_replace('$', '', $datosValores[7][4]);
                  $agente6 = str_replace(',', '', $valorAg6);
                  
             }
              


          }else {
            $agente6 = '32332.45';
            
            
          }

        ?>


          y: <?php echo $agente6 ?>,
        sliced: true,
        selected: true
      },
      
      {
        name: 'CASTOLO GALINDO ARTURO',
         
          <?php
          if (isset($_POST["fechaInicio"])) {

             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);
             //var_dump($datosAcumulado);
           

             foreach ($datosAcumulado as $key => $datosValores) {
                  $valorAg7 = str_replace('$', '', $datosValores[8][4]);
                  $agente7 = str_replace(',', '', $valorAg7);
                  
             }
              


          }else {
            $agente7 = '32332.45';
            
            
          }

        ?>

          y: <?php echo $agente7 ?>,
        sliced: true,
        selected: true
      }
    ]

  }]

});
</script>