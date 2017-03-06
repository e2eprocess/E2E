$(function () {
    $.getJSON('/E2E/php/oficinas/highstock.php', pepe(data));
});

function pepe (data) {

    // split the data set into ohlc and volume
    var spnac005 = [],
        spnac006 = [],
        spnac007 = [],
        spnac008 = [],
        spnac009 = [],
        spnac010 = [],
        spnac012 = [],
        dataLength = data.length,

        i = 0;

    for (i; i < dataLength; i += 1) {
        spnac005.push([
            data[i][0], // the date
            data[i][1]  // tiempo de respuesta
        ]);
        spnac006.push([
            data[i][0], // the date
            data[i][2] // peticiones
        ]);
        spnac007.push([
            data[i][0], // the date
            data[i][3] // apbad022
        ]);
        spnac008.push([
            data[i][0], // the date
            data[i][4] // apbad023
        ]);
        spnac009.push([
            data[i][0], // the date
            data[i][5] // apbad024
        ]);
        spnac010.push([
            data[i][0], // the date
            data[i][6] // apbad026
        ]);
        spnac012.push([
            data[i][0], // the date
            data[i][7] // apbad026
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
                text: 'CPU maquinas impares',
            },
            height: '40%',
            opposite: false,
            max: 100
        },{
            labels: {
                align: 'left',
                x: 3
            },
            title: {
                text: 'CPU maquinas pares',
            },
            top: '45%',
            height: '40%',
            offset: 0,
            opposite: false,
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
            type: 'area',
            color: 'rgba(4,38,253,1)',
            name: 'spnac005',
            data: spnac005,
            dataGrouping: {
              approximation: 'high'
            }
        },{
            type: 'area',
            color: 'rgba(4,129,255,1)',
            name: 'spnac007',
            data: spnac007,
            dataGrouping: {
              approximation: 'high'
            }

        },{
            type: 'area',
            color: 'rgba(95,173,251,1)',
            name: 'spnac009',
            data: spnac009,
            dataGrouping: {
              approximation: 'high'
            }
        },{
            type: 'area',
            color: 'rgba(4,38,253,1)',
            name: 'spnac006',
            data: spnac006,
            yAxis: 1,
            dataGrouping: {
              approximation: 'high'
            }
        },{
            type: 'area',
            color: 'rgba(4,129,255,1)',
            name: 'spnac008',
            data: spnac008,
            yAxis: 1,
            dataGrouping: {
              approximation: 'high'
            }
        },{
            type: 'area',
            color: 'rgba(95,173,251,1)',
            name: 'spnac010',
            data: spnac010,
            yAxis: 1,
            dataGrouping: {
              approximation: 'high'
            }
        },{
            type: 'area',
            color: 'rgba(80,209,250,1)',
            name: 'spnac012',
            data: spnac012,
            yAxis: 1,
            dataGrouping: {
              approximation: 'high'
            }
        }]
    });
}
