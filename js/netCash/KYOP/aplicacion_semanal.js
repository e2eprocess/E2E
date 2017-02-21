$(document).ready(function() {
  var options = {
          chart: {
            marginRight: 20,
            zoomType: 'xy'
          },
          title: {
            text: 'KYOP - APLICACIÓN',
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
            type: 'datetime'
          },
          yAxis: [{ //tiempo de respuesta
            labels: {
              format: '{value} ms'
            },
            title: {
              text: 'Tiempo de respuesta (ms)'
            },
            min: 0
          },{ //Peticiones
            labels: {
              format: '{value}'
            },
            title: {
              text: 'Peticiones por hora'
            },
            opposite: true
          }],
          tooltip: {
              shared: true,
              crosshair: true
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
            name: 'Tiempo Respuesta kyop_mult_web_kyoppresentation',
            id: 'Tiempo',
            color: 'rgba(248,0,0,1.0)',
            type: 'line',
            index: 1,
            legendIndex: 0,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          },{
            name: 'Peticiones kyop_mult_web_kyoppresentation',
            color: 'rgba(65,105,225,1.0)',
            type: 'column',
            id: 'Peticiones',
            yAxis: 1,
            index: 0,
            legendIndex: 1,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          }]
      }

      if (Highcharts.seriesTypes.flags) {
          options.series.push({
              type: 'flags',
              //name: 'Events',
              color: '#333333',
              fillColor: 'rgba(255,255,255,0.8)',
              data: [
                  //{ x: 1486026000000, text: '<b>Pico historico</b> <br/>Se ha alcanzado el máximo de peticiones (561.829 por hora)', title: 'Pico Histórico' },
                ],
              onSeries: 'Peticiones',
              tooltip: {
                       xDateFormat: '%e %B %Y %H:%M'
              },
              showInLegend: false
          });
      }

      $.getJSON("/E2E/php/netCash/KYOP/aplicacion_semanal.php", function(json) {
                  options.series[0].data = json[0];
                  options.series[1].data = json[1];
              $('#aplicacion_semanal').highcharts(options);
      });
  });
