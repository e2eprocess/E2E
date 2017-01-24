$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'recurso_semanal',
            marginRight: 130,
            zoomType: 'xy'
          },
          title: {
            text: 'ESMB - RECURSOS (max.)',
            x: -20 //center
          },
          subtitle: {
            text: 'Visión últimos 10 días',
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
              shared: true
          },
          legend: {
              enabled: false,
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
              }
          },
          /*series: []*/
          series: [{
            name: 'CPU-apbad002_esmb_s02_25',
            color: '#00BFFF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad002_esmb_s02_25',
            color: '#2EFEF7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad002_esmb_s02_26',
            color: '#0080FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad002_esmb_s02_26',
            color: '#00FFFF',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad003_esmb_s02_35',
            color: '#0040FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad003_esmb_s02_35',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad003_esmb_s02_36',
            color: '#0000FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad003_esmb_s02_36',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad004_esmb_s02_45',
            color: '#00BFFF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad004_esmb_s02_45',
            color: '#2EFEF7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad004_esmb_s02_46',
            color: '#0080FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad004_esmb_s02_46',
            color: '#00FFFF',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad006_esmb_s02_65',
            color: '#0040FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad006_esmb_s02_65',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          },{
            name: 'CPU-apbad006_esmb_s02_66',
            color: '#0000FF',
            type: 'column',
            index: 0,
            legendIndex: 0,
            data:[]
          },{
            name: 'Memoria-apbad006_esmb_s02_66',
            color: '#01DFD7',
            type: 'line',
            yAxis: 1,
            index: 13,
            legendIndex: 8,
            data:[]
          }]
      }

      $.getJSON("../php/movil/ESMB/recurso_semanal.php", function(json) {
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
        chart = new Highcharts.Chart(options);
      });
  });
