  function recarga(){
       
      var options = {
       
          chart: {
            renderTo: 'container3',
            type: 'line'
          },
          title: {
             text: 'Facturado vs Pedido'
          },
          subtitle: {
            text: 'Por agente'
          },
          xAxis: [],
  
          yAxis: {
             title: {
              text: 'Monto ($)'
            }
          },
          tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>' + this.series.name + ': ' + this.y + ' Meses';
                }
            },
          plotOptions: {
            line: {
              dataLabels: {
                enabled: true
              },
              enableMouseTracking: false
            }
          },
          series: []
        }
        var nombreAgente = $("#nombreAgentes").val();
        var url = '../../ajax/graficoAcum3.json.ajax.php?case=grafica&nombreAgente='+nombreAgente;
        var xAxis = {
            categories: [],
            labels: {
                rotation: -45,
                align: 'right',
                style: {
                    fontSize: '12px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
          
    };
    var seriesfacturado = {
        data: []
    };
    seriesfacturado.name = 'Facturado';
    var seriesPedido = {
        data: []
    };
    seriesPedido.name = 'Pedido';
    var seriesfechaPedido = {
        data: []
    };
    seriesfechaPedido.name = 'Fecha';

    jQuery.getJSON(url, function(data) {
        jQuery.each(data, function(key1,val1) {
            xAxis.categories.push(key1);
            jQuery.each(val1, function(key2,val2) {
                if(key2 == 0){
                    seriesfacturado.data.push(val2);
                }
                else if(key2 == 1){
                    seriesPedido.data.push(val2);
                }else if(key2 == 2){
                    seriesfechaPedido.data.push(val2);
                }
            });
        });
        options.xAxis.push(xAxis);
        options.series.push(seriesfacturado);
        options.series.push(seriesPedido);
        //options.series.push(seriesfechaPedido);
        var chart = new Highcharts.Chart(options);
    });
    return false;
}