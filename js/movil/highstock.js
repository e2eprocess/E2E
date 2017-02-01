$(function () {
    $.getJSON('/E2E/php/movil/highstock.php', function (data) {

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
                offset: 0
            }],

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
                yAxis: 1
            },{
                type: 'area',
                color: 'rgba(4,38,253,1)',
                name: 'apbad002',
                data: apbad002,
                stacking: 'normal',
                yAxis: 2
            },{
                type: 'area',
                color: 'rgba(4,129,255,1)',
                name: 'apbad003',
                data: apbad003,
                stacking: 'normal',
                yAxis: 2
            },{
                type: 'area',
                color: 'rgba(95,173,251,1)',
                name: 'apbad004',
                data: apbad004,
                stacking: 'normal',
                yAxis: 2
            },{
                type: 'area',
                color: 'rgba(80,209,250,1)',
                name: 'apbad006',
                data: apbad006,
                stacking: 'normal',
                yAxis: 2
            }]
        });
    });
});
