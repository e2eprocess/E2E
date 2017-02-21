$(function () {
    $.getJSON('/E2E/php/netCash/highstock.php', function (data) {

        // split the data set into ohlc and volume
        var tiempo_respuesta = [],
            peticiones = [],
            apbad022 = [],
            apbad023 = [],
            apbad024 = [],
            apbad026 = [],
            dataLength = data.length,

            i = 0;

        for (i; i < dataLength; i += 1) {
            tiempo_respuesta.push([
                data[i][0], // the date
                data[i][1]  // tiempo de respuesta
            ]);
            peticiones.push([
                data[i][0], // the date
                data[i][2] // peticiones
            ]);
            apbad022.push([
                data[i][0], // the date
                data[i][3] // apbad022
            ]);
            apbad023.push([
                data[i][0], // the date
                data[i][4] // apbad023
            ]);
            apbad024.push([
                data[i][0], // the date
                data[i][5] // apbad024
            ]);
            apbad026.push([
                data[i][0], // the date
                data[i][6] // apbad026
            ]);

        }


        // create the chart
        Highcharts.stockChart('container', {
            legend: {
                enabled: true
            },
            credits: {
                enabled: false
            },
            rangeSelector: {
                buttons: [{
                    type: 'day',
                    count: 1,
                    text: 'D'
                },{
                    type: 'month',
                    count: 1,
                    text: 'M'
                },{
                    type: 'Ytd',
                    count: 1,
                    text: 'Y'
                },{
                    type: 'all',
                    count: 1,
                    text: 'All'
                }],
                selected: 1,
                inputEnabled: false
            },
            yAxis: [{
                labels: {
                    align: 'left',
                    x: 3
                },
                title: {
                    text: 'Tiempo respuesta (ms.)',
                },
                height: '25%',
                opposite: false
            },{
                labels: {
                    align: 'left',
                    x: 3
                },
                title: {
                    text: 'Peticiones',
                },
                top: '30%',
                height: '25%',
                offset: 0,
                opposite: false,
                plotLines:[{
                    value: 300,
                    width: 1,
                    color: 'red',
                    dashStyle: 'dash'
                }]
            },{
                labels: {
                    align: 'left',
                    x: -3
                },
                title: {
                    text: 'CPU %',
                },
                height: '25%',
                top: '65%',
                opposite: false,
                offset: 0,
                max: 100
            }],

                plotOptions: {
                    series: {
                        showInNavigator: true
                    }
                },

            tooltip: {
                split: true,
                valueDecimals: 2
            },

            series: [{
                type: 'line',
                name: 'tiempo de respuesta',
                data: tiempo_respuesta
            },{
                type: 'column',
                name: 'Peticiones',
                data: peticiones,
                yAxis: 1,
                tooltip: {
                  valueDecimals: 0
                }
            },{
                type: 'area',
                color: 'rgba(4,38,253,1)',
                name: 'apbad022',
                data: apbad022,
                yAxis: 2,
                dataGrouping: {
                  approximation: 'high'
                }
            },{
                type: 'area',
                color: 'rgba(4,129,255,1)',
                name: 'apbad023',
                data: apbad023,
                yAxis: 2,
                dataGrouping: {
                  approximation: 'high'
                }
            },{
                type: 'area',
                color: 'rgba(95,173,251,1)',
                name: 'apbad024',
                data: apbad024,
                yAxis: 2,
                dataGrouping: {
                  approximation: 'high'
                }
            },{
                type: 'area',
                color: 'rgba(80,209,250,1)',
                name: 'apbad026',
                data: apbad026,
                yAxis: 2,
                dataGrouping: {
                  approximation: 'high'
                }
            }]
        });
    });
});
