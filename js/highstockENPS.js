$(function () {
    $.getJSON('/E2E/php/highstockENPS.php', function (data) {

        // split the data set into ohlc and volume
        var enpp_mult_web = [],
            enps_mult_web_movil = [],
            enps_mult_web_net = [],
            kqof_es_web = [],
            dataLength = data.length,

            i = 0;

        for (i; i < dataLength; i += 1) {
            enpp_mult_web.push([
                data[i][0], // the date
                data[i][1]  // tiempo de respuesta
            ]);
            enps_mult_web_movil.push([
                data[i][0], // the date
                data[i][2] // peticiones
            ]);
            enps_mult_web_net.push([
                data[i][0], // the date
                data[i][3] // apbad002
            ]);
            kqof_es_web.push([
                data[i][0], // the date
                data[i][4] // apbad003
            ]);
        }

        var options = {
                chart: {
                    renderTo: 'container',
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
                        text: 'Peticiones'
                    },
                    height: '20%',
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
                    top: '25%',
                    height: '20%',
                    offset: 0,
                    opposite: false
                },{
                    labels: {
                        align: 'right'
                    },
                    title: {
                        text: 'Peticiones'
                    },
                    height: '20%',
                    top: '45%',
                    opposite: false,
                    offset: 0
                },{
                    labels: {
                        align: 'right',
                    },
                    title: {
                        text: 'Peticiones',
                    },
                    lineWidth: 1,
                    top: '65%',
                    height: '20%',
                    offset: 0,
                    opposite: false
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
                    type: 'column',
                    name: 'kqof_es_web',
                    data: kqof_es_web,
                    tooltip: {
                      valueDecimals: 0
                    },
                    dataGrouping: {
                        approximation: 'sum'
                    }
                },{
                    type: 'column',
                    name: 'enps_mult_web_net',
                    data: enps_mult_web_net,
                    yAxis: 1,
                    tooltip: {
                      valueDecimals: 0
                    },
                    dataGrouping: {
                        approximation: 'sum'
                    }
                },{
                    type: 'column',
                    name: 'enpp_mult_web',
                    data: enpp_mult_web,
                    yAxis: 2,
                    tooltip: {
                      valueDecimals: 0
                    },
                    dataGrouping: {
                        approximation: 'sum'
                    }
                },{
                    type: 'column',
                    name: 'enps_mult_web_movil',
                    data: enps_mult_web_movil,
                    yAxis: 3,
                    tooltip: {
                      valueDecimals: 0
                    },
                    dataGrouping: {
                        approximation: 'sum'
                    }
                }]
            }

        // create the chart
        Highcharts.stockChart(options);

    });
});
