<script type="text/javascript">
  Highcharts.chart('container1', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {

    text : 


    <?php

    if (isset($_POST["fechaInicio"])) {

      $valor = $_POST["fechaInicio"];

      switch ($valor) {
        case '01':
          $valorMes = "ENERO";
          break;
        case '02':
          $valorMes = "FEBRERO";
          break;
        case '03':
          $valorMes = "MARZO";
          break;
         case '04':
          $valorMes = "ABRIL";
          break;
        case '05':
          $valorMes = "MAYO";
          break;
        case '06':
          $valorMes = "JUNIO";
          break;
        case '07':
          $valorMes = "JULIO";
          break;
         case '08':
          $valorMes = "AGOSTO";
          break;
        case '09':
          $valorMes = "SEPTIEMBRE";
          break;
        case '10':
          $valorMes = "OCTUBRE";
          break;
        case '11':
          $valorMes = "NOVIEMBRE";
          break;
        case '12':
          $valorMes = "DICIEMBRE";
          break;
        default:
          $valorMes = "JUNIO";
          break;
      }


    }else {
      $valorMes = 'JUNIO';
    }
    

    echo "'TOTAL FACTURADO ".$valorMes."'" ?>
    
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
        name: 'CUENTAS CORPORATIVAS',
          <?php
          if (isset($_POST["fechaInicio"])) {
            $fechaRecibida = $_POST["fechaInicio"];
            $req ='http://dkmatrizz.ddns.net/ajax/tablaAcumuladoMensual.ajax.php?fechaInicio='.$fechaRecibida;
            $urlData = curl_init($req);
            curl_setopt($urlData, CURLOPT_RETURNTRANSFER, TRUE);
            $getData = curl_exec($urlData);
            $datosJson = json_decode($getData,true);
            /*
             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);*/
             //var_dump($datosAcumulado);
           

             foreach ($datosJson as $key => $datosValores) {
                  $valorRec1 = str_replace('$', '', $datosValores[4][4]);
                  $valorCuentas = str_replace(',', '', $valorRec1);
                  
             }

          }else {
            $valorCuentas = '32332.45';
            
            
          }

        ?>


        y: <?php echo $valorCuentas; ?> ,
        sliced: true,
        selected: true
      },
      {
        name: 'CEDIS',
        

        <?php
          if (isset($_POST["fechaInicio"])) {


            $fechaRecibida = $_POST["fechaInicio"];
            $req ='http://dkmatrizz.ddns.net/ajax/tablaAcumuladoMensual.ajax.php?fechaInicio='.$fechaRecibida;
            $urlData = curl_init($req);
            curl_setopt($urlData, CURLOPT_RETURNTRANSFER, TRUE);
            $getData = curl_exec($urlData);
            $datosJson = json_decode($getData,true);
/*
             $datos = file_get_contents("ajax/acumulado.json");
             $datosAcumulado = json_decode($datos, true);*/
             //var_dump($datosAcumulado);
          
             foreach ($datosJson as $key => $datosValores) {
                  $valorRec2 = str_replace('$', '', $datosValores[0][4]);
                  $valor = str_replace(',', '', $valorRec2);
                  
             }

              


          }else {
            $valor = '32332.45';
            
            
          }
           

        ?>
        y: <?php echo $valor ?>,
        sliced: true,
        selected: true
      },
    ]
  }]

});
</script>
