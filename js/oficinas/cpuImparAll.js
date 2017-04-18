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
            name: 'spnac005',
            color: 'rgba(4,38,253,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac007',
            color: 'rgba(4,129,255,0.5)',
            type: 'column',
            data:[]
          },{
            name: 'spnac009',
            color: 'rgba(14,203,219,0.5)',
            type: 'column',
            data:[]
          }]
      }

      $.getJSON("/E2E/php/oficinas/cpuImparAll.php", function(json) {
        options.series[0].data = json[0];
        options.series[1].data = json[1];
        options.series[2].data = json[2];

        chart = new Highcharts.Chart(options);
      });
  });
