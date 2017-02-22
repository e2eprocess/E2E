$(document).ready(function() {
  var options = {
          chart: {
            marginRight: 100,
            zoomType: 'xy',
            height: 250
          },
          title: {
            text: 'KYOP - RECURSOS (max.)',
            x: -20 //center
          },
          subtitle: {
            text: 'Visión últimos 40 días',
            x: -20
          },
          credits: {
            enabled: false
          },
          xAxis: {
            type: 'datetime',
          },
          yAxis: [{ //tiempo de respuesta
            labels: {
              format: '{value} %'
            },
            title: {
              text: 'CPU %'
            },
            max:100
          },{ //Peticiones
            labels: {
              format: '{value} %'
            },
            title: {
              text: 'Memoria'
            },
            opposite: true,
            max:100
          }],
          tooltip: {
              shared: true,
              style: {
                fontSize: '10px'
              },
              valueDecimals: 2
          },
          legend: {
              enabled:false,
              layout: 'horizontal',
              align: 'center',
              verticalAlign: 'bottom',
              borderWidth: 1,
              itemStyle:{
                  fontSize: "10px"
                }

          },
          plotOptions: {
              line: {
                marker: {
                  enabled: false,
                  symbol: 'circle',
                  radius: 1,
                  states : {
                    hover: {enabled: true}
                  }
                }
              },
              column:{
                stacking: 'normal'
              },
              series: {
                marker: {
                  enabled: false,
                  symbol: 'circle',
                  radius: 2
                },
                fillOpacity: 0.5
              },
              flags: {
                tooltip: {
                  xDateFormat: '%B %e, %Y'
                }
              }
          },
          /*series: []*/
          series: [{
            name: 'CPU-apbad022_kyop_s01_10',
            id: 'CPU-apbad022_kyop_s01_10',
            color: '#00BFFF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad022_kyop_s01_10',
            color: '#2EFEF7',
            type: 'line',
            yAxis: 1,
            index: 8,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad022_kyop_s01_11',
            color: '#0080FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad022_kyop_s01_11',
            color: '#00FFFF',
            type: 'line',
            yAxis: 1,
            index: 8,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad023_kyop_s01_20',
            color: '#0040FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad023_kyop_s01_20',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 8,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad023_kyop_s01_21',
            color: '#0000FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad023_kyop_s01_21',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 8,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad024_kyop_s01_30',
            color: '#00BFFF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad024_kyop_s01_30',
            color: '#2EFEF7',
            type: 'line',
            yAxis: 1,
            index: 8,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad024_kyop_s01_31',
            color: '#0080FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad024_kyop_s01_31',
            color: '#00FFFF',
            type: 'line',
            yAxis: 1,
            index: 8,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad026_kyop_s01_40',
            color: '#0040FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad026_kyop_s01_40',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 8,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad026_kyop_s01_41',
            color: '#0000FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad026_kyop_s01_41',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 8,
            legendIndex: 8,
            data:[]
          }]
      }

      $.getJSON("/E2E/php/netCash/KYOP/recurso_mensual.php", function(json) {
        options.series[0].data = json[0];
        options.series[1].data = json[1];
        options.series[2].data = json[2];
        options.series[3].data = json[3];
        options.series[4].data = json[4];
        options.series[5].data = json[5];
        options.series[6].data = json[6];
        options.series[7].data = json[7];
        options.series[8].data = json[8];
        options.series[9].data = json[9];
        options.series[10].data = json[10];
        options.series[11].data = json[11];
        options.series[12].data = json[12];
        options.series[13].data = json[13];
        options.series[14].data = json[14];
        options.series[15].data = json[15];

        $('#recurso_mensual').highcharts(options);
      });
  });
