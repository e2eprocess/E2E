$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'aplicacion_semanal',
            marginRight: 20,
            zoomType: 'xy'
          },
          title: {
            text: 'ENPP - APLICACIÓN',
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
              format: '{value} ms'
            },
            title: {
              text: 'Tiempo de respuesta (ms)'
            }
          },{ //Peticiones
            labels: {
              format: '{value}'
            },
            title: {
              text: 'Peticiones por minuto'
            },
            opposite: true
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
              },
              spline: {
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
            name: 'Tiempo Respuesta enpp_mult_web_mobility_02',
            color: 'rgba(248,0,0,1.0)',
            type: 'line',
            index: 1,
            legendIndex: 0,
            data:[]
          },{
            name: 'Peticiones enpp_mult_web_mobility_02',
            color: 'rgba(65,105,225,1.0)',
            type: 'column',
            yAxis: 1,
            index: 0,
            legendIndex: 1,
            data:[]
          }]
      }

      $.getJSON("/E2E/php/movil/ENPP/aplicacion_semanal.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        chart = new Highcharts.Chart(options);
      });
  });
