<script type="text/javascript">
  Highcharts.chart('container4', {
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
    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
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
          $item = null;
          $valor = null;
          $valorRocio =  ControladorreportAcumulado::ctrMostrarAcumulado($item, $valor);
          $agente1 = $valorRocio[7][4];
          
          ?>



         y: <?php echo  $agente1 ?>,
        sliced: true,
        selected: true
      },
 

      {
        name: 'LUIS ENRIQUE BUSTOS MONTERD',
         
          <?php
          $item = null;
          $valor = null;
          $valorBustos =  ControladorreportAcumulado::ctrMostrarAcumulado($item, $valor);
          $agente2 = $valorBustos[5][4];
          
          ?>



         y: <?php echo  $agente2 ?>,
        sliced: true,
        selected: true
      },

      {
        name: 'GOMEZ RODRIGUEZ ERICK',
         
         <?php
          $item = null;
          $valor = null;
          $valorErick =  ControladorreportAcumulado::ctrMostrarAcumulado($item, $valor);
          $agente3 = (($valorErick[2][4])+($valorErick[3][4]));
          
          ?>



         y: <?php echo  str_replace(',', '.', $agente3)?>,
        sliced: true,
        selected: true
      },
    
      {
        name: 'ORLANDO BRIONES AGUIRRE',
        
          <?php
          $item = null;
          $valor = null;
          $valorOrlando =  ControladorreportAcumulado::ctrMostrarAcumulado($item, $valor);
          $agente4 = $valorOrlando[6][4];
          
          ?>



         y: <?php echo  $agente4 ?>,
        sliced: true,
        selected: true
      },

      {
        name: 'JONATHAN GONZALEZ SANCHEZ',
        
         <?php
          $item = null;
          $valor = null;
          $valorJonathan =  ControladorreportAcumulado::ctrMostrarAcumulado($item, $valor);
          $agente5 = $valorJonathan[4][4];
          
          ?>



         y: <?php echo  $agente5 ?>,
        sliced: true,
        selected: true
      },
      
      {
        name: 'ALFREDO MENDOZA SEGURA',
      
          <?php
          $item = null;
          $valor = null;
          $valorAlfredo =  ControladorreportAcumulado::ctrMostrarAcumulado($item, $valor);
          $agente6 = $valorAlfredo[0][4];
          
          ?>



         y: <?php echo  $agente6 ?>,
        sliced: true,
        selected: true
      },
      
      {
        name: 'CASTOLO GALINDO ARTURO',
         
          <?php
          $item = null;
          $valor = null;
          $valorCastolo =  ControladorreportAcumulado::ctrMostrarAcumulado($item, $valor);
          $agente7 = $valorCastolo[1][4];
          
          ?>



         y: <?php echo  $agente7 ?>,
        sliced: true,
        selected: true
      }
    ]

  }]

});
</script>