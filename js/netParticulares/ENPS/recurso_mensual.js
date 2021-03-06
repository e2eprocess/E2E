$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'recurso_mensual',
            marginRight: 100,
            zoomType: 'xy',
            height: 275
          },
          title: {
            text: 'ENPS - RECURSOS (max.)',
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
            //type: 'datetime',
            tickPixelInterval: 150,
            crosshair: true,
            categories: []
          },
          yAxis: [{ //tiempo de respuesta
            labels: {
              format: '{value} %'
            },
            title: {
              text: 'CPU %'
            },
            max: 100
          },{ //Peticiones
            labels: {
              format: '{value} %'
            },
            title: {
              text: 'Memoria'
            },
            opposite: true,
            max: 100
          }],
          tooltip: {
              shared: true,
              style: {
                fontSize: '8px'
              },
              valueDecimals: 2
          },
          legend: {
              enabled: false
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
              }
          },
          /*series: []*/
          series: [{
            name: 'CPU-apbad002_enps_701_20',
            color: '#00BFFF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad002_enps_701_20',
            color: '#2EFEF7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad002_enps_701_21',
            color: '#0080FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad002_enps_701_21',
            color: '#00FFFF',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad002_enps_701_22',
            color: '#0087FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad002_enps_701_22',
            color: '#04F1F1',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad003_enps_701_30',
            color: '#0040FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad003_enps_701_30',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad003_enps_701_31',
            color: '#0000FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad003_enps_701_31',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad003_enps_701_32',
            color: '#0087FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad003_enps_701_32',
            color: '#04F1F1',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad004_enps_701_40',
            color: '#00BFFF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad004_enps_701_40',
            color: '#2EFEF7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad004_enps_701_41',
            color: '#0080FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad004_enps_701_41',
            color: '#00FFFF',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad004_enps_701_42',
            color: '#0087FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad004_enps_701_42',
            color: '#04F1F1',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad006_enps_701_60',
            color: '#0040FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad006_enps_701_60',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad006_enps_701_61',
            color: '#0000FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad006_enps_701_61',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad006_enps_701_62',
            color: '#0087FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad006_enps_701_62',
            color: '#04F1F1',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          }]
      }

      $.getJSON("/E2E/php/netParticulares/ENPS/recurso_mensual.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.series[4].data = json[5]['data'];
        options.series[5].data = json[6]['data'];
        options.series[6].data = json[7]['data'];
        options.series[7].data = json[8]['data'];
        options.series[8].data = json[9]['data'];
        options.series[9].data = json[10]['data'];
        options.series[10].data = json[11]['data'];
        options.series[11].data = json[12]['data'];
        options.series[12].data = json[13]['data'];
        options.series[13].data = json[14]['data'];
        options.series[14].data = json[15]['data'];
        options.series[15].data = json[16]['data'];
        options.series[16].data = json[17]['data'];
        options.series[17].data = json[18]['data'];
        options.series[18].data = json[19]['data'];
        options.series[19].data = json[20]['data'];
        options.series[20].data = json[21]['data'];
        options.series[21].data = json[22]['data'];
        options.series[22].data = json[23]['data'];
        options.series[23].data = json[24]['data'];
        chart = new Highcharts.Chart(options);
      });
  });
