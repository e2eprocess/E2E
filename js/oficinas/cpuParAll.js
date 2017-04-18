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
          credits: {
            enabled: false
          },
          xAxis: {
            type: 'datetime'
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
            name: 'spnac006',
            color: 'rgba(4,129,255,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac008',
            color: 'rgba(4,38,253,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac010',
            color: 'rgba(4,129,255,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac012',
            color: 'rgba(19,227,244,0.5)',
            type: 'column',
            data:[]
          }]
      }

      $.getJSON("/E2E/php/oficinas/cpuParAll.php", function(json) {
        options.series[0].data = json[0];
        options.series[1].data = json[1];
        options.series[2].data = json[2];
        options.series[3].data = json[3];

        grafico = new Highcharts.Chart(options);
      });
  });
