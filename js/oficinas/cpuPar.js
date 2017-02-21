$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'cpuParOfi',
            marginRight: 20,
            zoomType: 'xy'
          },
          title: {
            text: 'Consumo CPU % <br/><font style="font-size:10px;">(máquinas pares)</font>',
            x: -20 //center
          },
          subtitle: {
            text: [],
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
            max: 100,
            lineWidth: 1
          }],
          tooltip: {
              shared: true
          },
          legend: {
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
              }
          },
          /*series: []*/
          series: [{
            name: 'spnac006 (F)',
            color: 'rgba(4,129,255,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac008 (F)',
            color: 'rgba(4,38,253,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac010 (F)',
            color: 'rgba(4,129,255,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac012 (F)',
            color: 'rgba(19,227,244,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac006 (T)',
            color: 'rgba(4,129,255,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac008 (T)',
            color: 'rgba(4,38,253,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac010 (T)',
            color: 'rgba((4,129,255,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac012 (T)',
            color: 'rgba(14,64,219,1)',
            type: 'line',
            data:[]
          }]
      }

      $.getJSON("/E2E/php/oficinas/cpuPar.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.series[4].data = json[5]['data'];
        options.series[5].data = json[6]['data'];
        options.series[6].data = json[7]['data'];
        options.series[7].data = json[8]['data'];
        options.subtitle.text = json[9]['text'];

        chart = new Highcharts.Chart(options);
      });
  });
