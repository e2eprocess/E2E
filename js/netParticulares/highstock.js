$(function () {
    $.getJSON('/E2E/php/netParticulares/highstock.php', function (data) {

        // split the data set into ohlc and volume
        var tiempo_respuesta = [],
            peticiones = [],
            apbad002 = [],
            apbad003 = [],
            apbad004 = [],
            apbad006 = [],
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
            apbad002.push([
                data[i][0], // the date
                data[i][3] // apbad002
            ]);
            apbad003.push([
                data[i][0], // the date
                data[i][4] // apbad003
            ]);
            apbad004.push([
                data[i][0], // the date
                data[i][5] // apbad004
            ]);
            apbad006.push([
                data[i][0], // the date
                data[i][6] // apbad006
            ]);

        }


        // create the chart
        Highcharts.stockChart('container', {
            chart: {
                marginRight: 60,
                marginLeft: 70,
            },
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
                    type: 'week',
                    count: 1,
                    text: 'W'
                },{
                    type: 'month',
                    count: 1,
                    text: 'M'
                },,{
                    type: 'Ytd',
                    count: 1,
                    text: 'Y'
                }],
                selected: 1,
                inputEnabled: false
            },
            yAxis: [{
                labels: {
                    align: 'right',
                },
                title: {
                    text: 'Tiempo respuesta (ms.)'
                },
                height: '25%',
                opposite: false,
                lineWidth: 1
            },{
                labels: {
                    align: 'right',
                },
                title: {
                    text: 'Peticiones',
                },
                lineWidth: 1,
                top: '30%',
                height: '25%',
                offset: 0,
                opposite: false
            },{
                labels: {
                    align: 'right'
                },
                title: {
                    text: 'CPU %'
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
                name: 'apbad002',
                data: apbad002,
                yAxis: 2,
                dataGrouping:{
                  approximation: "high"
                }
            },{
                type: 'area',
                color: 'rgba(4,129,255,0.5)',
                name: 'apbad003',
                data: apbad003,
                yAxis: 2,
                dataGrouping:{
                  approximation: "high"
                }
            },{
                type: 'area',
                color: 'rgba(95,173,251,0.5)',
                name: 'apbad004',
                data: apbad004,
                yAxis: 2,
                dataGrouping:{
                  approximation: "high"
                }
            },{
                type: 'area',
                color: 'rgba(80,209,250,0.5)',
                name: 'apbad006',
                data: apbad006,
                yAxis: 2,
                dataGrouping:{
                  approximation: "high"
                }
            }]
        });
    });
});
