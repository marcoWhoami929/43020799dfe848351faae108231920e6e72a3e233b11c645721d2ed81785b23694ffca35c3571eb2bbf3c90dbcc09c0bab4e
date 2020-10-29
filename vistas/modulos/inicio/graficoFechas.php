<script type="text/javascript">
    
Highcharts.chart('container4', {

            chart: {
                type: 'gauge',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false
            },

            title: {
                text: 'Nivel de Partidas'
            },

            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                    backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                            [0, '#FFF'],
                            [1, '#333']
                        ]
                    },
                    borderWidth: 0,
                    outerRadius: '109%'
                }, {
                    backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                            [0, '#333'],
                            [1, '#FFF']
                        ]
                    },
                    borderWidth: 1,
                    outerRadius: '107%'
                }, {
                    // default background
                }, {
                    backgroundColor: '#DDD',
                    borderWidth: 0,
                    outerRadius: '105%',
                    innerRadius: '103%'
                }]
            },

            // the value axis
            yAxis: {
                min: 0,
                max: 100,

                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',

                tickPixelInterval: 30,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
                title: {
                    text: 'Nivel de Partidas'
                },
                plotBands: [{
                    from: 90,
                    to: 100,
                    color: '#55BF3B' // green
                }, {
                    from: 50,
                    to: 90,
                    color: '#DDDF0D' // yellow
                }, {
                    from: 0,
                    to: 50,
                    color: '#DF5353' // red
                }]
            },

            series: [{
                name: 'Nivel Actual',
                data: [
                
                

                     <?php

                    require_once("db_connect.php");

                    $sql_query = "SELECT (SUM(sumPartidas)/SUM(numeroPartidas)*100) AS nivelPartidas  FROM almacen WHERE nombreCliente != 'FLEX FINISHES MEXICO, S.A. DE C.V.' AND nombreCliente != 'PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.'";
                    $resultado = mysqli_query($conn, $sql_query) or die("database_error:".mysqli_error($conn));
                    
                    $total = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

                    echo $total["nivelPartidas"];
                   

                     ?>

                ],
                tooltip: {
                    valueSuffix: 'Nivel de Partidas'
                }
            }]

        },
        // Add some life
        function (chart) {
            if (!chart.renderer.forExport) {
                setInterval(function () {
                    var point = chart.series[0].points[0],
                        newVal,
                        inc = 0;

                }, 3000);
            }
        });

</script>

 