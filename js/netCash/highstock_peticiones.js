$(function () {
    $.getJSON('/E2E/php/netCash/highstock_peticiones.php', function (data) {

        // split the data set into ohlc and volume
        var kyfb_firmas = [],
            kyfb_kyfbws = [],
            kygu_front = [],
            kygu_servicios = [],
            kyop = [],
            kyos_posicion = [],
            kyos_servicios = [],
            dataLength = data.length,

            i = 0;

        for (i; i < dataLength; i += 1) {
            kyfb_firmas.push([
                data[i][0], // the date
                data[i][1]  // tiempo de respuesta
            ]);
            kyfb_kyfbws.push([
                data[i][0], // the date
                data[i][2] // kyfb_kyfbws
            ]);
            kygu_front.push([
                data[i][0], // the date
                data[i][3] // apbad022
            ]);
            kygu_servicios.push([
                data[i][0], // the date
                data[i][4] // kygu_servicios
            ]);
            kyop.push([
                data[i][0], // the date
                data[i][5] // kyop
            ]);
            kyos_posicion.push([
                data[i][0], // the date
                data[i][6] // kyos_posicion
            ]);
            kyos_servicios.push([
                data[i][0], // the date
                data[i][7] // kyos_servicios
            ]);

        }


        // create the chart
        Highcharts.stockChart('container', {
            chart: {
                marginRight: 60,
                marginLeft: 70,
                zoomType: 'xy'
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
                    x: -10
                },
                title: {
                    text: 'Peticiones KYOP',
                },
                height: '20%',
                opposite: false
            },{
                labels: {
                    x: -10
                },
                title: {
                    text: 'Peticiones KYFB',
                },
                top: '23%',
                height: '20%',
                offset: 0,
                opposite: false
            },{
                labels: {
                    x: -10
                },
                title: {
                    text: 'Peticiones KYGU',
                },
                height: '20%',
                top: '46%',
                opposite: false,
                offset: 0
            },{
                labels: {
                    x: -10
                },
                title: {
                    text: 'Peticiones KYOS',
                },
                height: '20%',
                top: '70%',
                opposite: false,
                offset: 0
            }],
                /*plotOptions: {
                    series: {
                        showInNavigator: true
                    }
                },*/

            tooltip: {
                valueDecimals: 0
            },

            series: [{
                type: 'column',
                name: 'kyop',
                data: kyop,
                dataGrouping: {
                    approximation: 'sum'
                }
            },{
                type: 'column',
                name: 'kyfb_firmas',
                data: kyfb_firmas,
                yAxis: 1
            },{
                type: 'column',
                name: 'kyfb_kyfbws',
                data: kyfb_kyfbws,
                yAxis: 1
            },{
                type: 'column',
                name: 'kygu_front',
                data: kygu_front,
                yAxis: 2
            },{
                type: 'column',
                name: 'kygu_servicios',
                data: kygu_servicios,
                yAxis: 2
            },{
                type: 'column',
                name: 'kyos_posicion',
                data: kyos_posicion,
                yAxis: 3
            },{
                type: 'column',
                name: 'kyos_servicios',
                data: kyos_servicios,
                yAxis: 3
            }]
        });
    });
});
