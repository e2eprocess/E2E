$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'cpuImparOfi',
            marginRight: 20,
            zoomType: 'xy'
          },
          title: {
            text: 'Consumo CPU % <br/><font style="font-size:10px;">(máquinas impares)</font>',
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
            name: 'spnac005 (F)',
            color: 'rgba(4,38,253,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac007 (F)',
            color: 'rgba(4,129,255,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac009 (F)',
            color: 'rgba(14,203,219,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac005 (T)',
            color: 'rgba(4,38,253,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac007 (T)',
            color: 'rgba(4,129,255,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac009 (T)',
            color: 'rgba(14,64,219,1)',
            type: 'line',
            data:[]
          }]
      }

      $.getJSON("/E2E/php/oficinas/cpuImparInforme.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.series[4].data = json[5]['data'];
        options.series[5].data = json[6]['data'];
        options.subtitle.text = json[7]['text'];

        chart = new Highcharts.Chart(options);
      });
  });
