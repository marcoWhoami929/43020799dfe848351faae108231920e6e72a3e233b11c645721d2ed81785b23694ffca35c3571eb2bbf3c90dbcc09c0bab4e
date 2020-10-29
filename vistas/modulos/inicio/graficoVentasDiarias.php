<script type="text/javascript">
	Highcharts.chart('graficoVentasDiarias', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Ventas Actuales'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
  	
   
    categories: ['MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE']
  },
  yAxis: {
    title: {
      text: 'Ventas ($)'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: true
    }
  },
  series: [{
    name: 'San Manuel',
    data: [
    		<?php

    			require_once("db_connect.php");
    			 $sql_query = "SELECT (SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'marzo' and concepto = 'FACTURA SAN MANUEL V 3.3' and cancelado != 1) as totalMarzo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'abril' and concepto = 'FACTURA SAN MANUEL V 3.3' and cancelado != 1)  as totalAbril,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'mayo' and concepto = 'FACTURA SAN MANUEL V 3.3' and cancelado != 1)  as totalMayo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'junio' and concepto = 'FACTURA SAN MANUEL V 3.3' and cancelado != 1)  as totalJunio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'julio' and concepto = 'FACTURA SAN MANUEL V 3.3' and cancelado != 1)  as totalJulio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'agosto' and concepto = 'FACTURA SAN MANUEL V 3.3' and cancelado != 1)  as totalAgosto,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'septiembre' and concepto = 'FACTURA SAN MANUEL V 3.3' and cancelado != 1)  as totalSeptiembre";
                 
                 $resultado = mysqli_query($conn, $sql_query) or die("database_error:".mysqli_error($conn));
        
                 $total = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

                 echo number_format($total["totalMarzo"],2,'.', '').','.number_format($total["totalAbril"],2,'.', '').','.number_format($total["totalMayo"],2,'.', '').','.number_format($total["totalJunio"],2,'.', '').','.number_format($total["totalJulio"],2,'.', '').','.number_format($total["totalAgosto"],2,'.', '').','.number_format($total["totalSeptiembre"],2,'.', '');

    		?>

    		]
  },
  	{
    name: 'Reforma',
    data: [

    		<?php

    			require_once("db_connect.php");
    			 $sql_query = "SELECT (SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'marzo' and concepto = 'FACTURA REFORMA V 3.3' and cancelado != 1) as totalMarzo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'abril' and concepto = 'FACTURA REFORMA V 3.3' and cancelado != 1)  as totalAbril,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'mayo' and concepto = 'FACTURA REFORMA V 3.3' and cancelado != 1)  as totalMayo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'junio' and concepto = 'FACTURA REFORMA V 3.3' and cancelado != 1)  as totalJunio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'julio' and concepto = 'FACTURA REFORMA V 3.3' and cancelado != 1)  as totalJulio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'agosto' and concepto = 'FACTURA REFORMA V 3.3' and cancelado != 1)  as totalAgosto,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'septiembre' and concepto = 'FACTURA REFORMA V 3.3' and cancelado != 1)  as totalSeptiembre";
                 
                 $resultado = mysqli_query($conn, $sql_query) or die("database_error:".mysqli_error($conn));
        
                 $total = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

                 echo number_format($total["totalMarzo"],2,'.', '').','.number_format($total["totalAbril"],2,'.', '').','.number_format($total["totalMayo"],2,'.', '').','.number_format($total["totalJunio"],2,'.', '').','.number_format($total["totalJulio"],2,'.', '').','.number_format($total["totalAgosto"],2,'.', '').','.number_format($total["totalSeptiembre"],2,'.', '');
    		?>
    	  ]
  },
  	{
    name: 'Santiago',
    data: [
    		<?php

    			require_once("db_connect.php");
    			 $sql_query = "SELECT (SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'marzo' and concepto = 'FACTURA SANTIAGO V 3.3' and cancelado != 1) as totalMarzo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'abril' and concepto = 'FACTURA SANTIAGO V 3.3' and cancelado != 1)  as totalAbril,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'mayo' and concepto = 'FACTURA SANTIAGO V 3.3' and cancelado != 1)  as totalMayo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'junio' and concepto = 'FACTURA SANTIAGO V 3.3' and cancelado != 1)  as totalJunio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'julio' and concepto = 'FACTURA SANTIAGO V 3.3' and cancelado != 1)  as totalJulio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'agosto' and concepto = 'FACTURA SANTIAGO V 3.3' and cancelado != 1)  as totalAgosto,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'septiembre' and concepto = 'FACTURA SANTIAGO V 3.3' and cancelado != 1)  as totalSeptiembre";
                 
                 $resultado = mysqli_query($conn, $sql_query) or die("database_error:".mysqli_error($conn));
        
                 $total = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

                 echo number_format($total["totalMarzo"],2,'.', '').','.number_format($total["totalAbril"],2,'.', '').','.number_format($total["totalMayo"],2,'.', '').','.number_format($total["totalJunio"],2,'.', '').','.number_format($total["totalJulio"],2,'.', '').','.number_format($total["totalAgosto"],2,'.', '').','.number_format($total["totalSeptiembre"],2,'.', '');

    		?>
    	 ]
  },
  {
    name: 'Capu',
    data: [
    		<?php

    			require_once("db_connect.php");
    			 $sql_query = "SELECT (SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'marzo' and concepto = 'FACTURA CAPU V 3.3' and cancelado != 1) as totalMarzo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'abril' and concepto = 'FACTURA CAPU V 3.3' and cancelado != 1)  as totalAbril,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'mayo' and concepto = 'FACTURA CAPU V 3.3' and cancelado != 1)  as totalMayo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'junio' and concepto = 'FACTURA CAPU V 3.3' and cancelado != 1)  as totalJunio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'julio' and concepto = 'FACTURA CAPU V 3.3' and cancelado != 1)  as totalJulio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'agosto' and concepto = 'FACTURA CAPU V 3.3' and cancelado != 1)  as totalAgosto,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'septiembre' and concepto = 'FACTURA CAPU V 3.3' and cancelado != 1)  as totalSeptiembre";
                 
                 $resultado = mysqli_query($conn, $sql_query) or die("database_error:".mysqli_error($conn));
        
                 $total = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

                 echo number_format($total["totalMarzo"],2,'.', '').','.number_format($total["totalAbril"],2,'.', '').','.number_format($total["totalMayo"],2,'.', '').','.number_format($total["totalJunio"],2,'.', '').','.number_format($total["totalJulio"],2,'.', '').','.number_format($total["totalAgosto"],2,'.', '').','.number_format($total["totalSeptiembre"],2,'.', '');

    		?>
    	  ]

  },
  {
    name: 'Las Torres',
    data: [

    		<?php

    			require_once("db_connect.php");
    			 $sql_query = "SELECT (SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'marzo' and concepto = 'FACTURA TORRES' and cancelado != 1) as totalMarzo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'abril' and concepto = 'FACTURA TORRES' and cancelado != 1)  as totalAbril,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'mayo' and concepto = 'FACTURA TORRES' and cancelado != 1)  as totalMayo,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'junio' and concepto = 'FACTURA TORRES' and cancelado != 1)  as totalJunio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'julio' and concepto = 'FACTURA TORRES' and cancelado != 1)  as totalJulio,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'agosto' and concepto = 'FACTURA TORRES' and cancelado != 1)  as totalAgosto,(SELECT IF(SUM(total)IS NULL,0,SUM(total)) from facturastiendas WHERE Date_format(fechaFactura,'%M') = 'septiembre' and concepto = 'FACTURA TORRES' and cancelado != 1)  as totalSeptiembre";
                 
                 $resultado = mysqli_query($conn, $sql_query) or die("database_error:".mysqli_error($conn));
        
                 $total = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

                 echo number_format($total["totalMarzo"],2,'.', '').','.number_format($total["totalAbril"],2,'.', '').','.number_format($total["totalMayo"],2,'.', '').','.number_format($total["totalJunio"],2,'.', '').','.number_format($total["totalJulio"],2,'.', '').','.number_format($total["totalAgosto"],2,'.', '').','.number_format($total["totalSeptiembre"],2,'.', '');

    		?>
    	]
  }]
});

</script>