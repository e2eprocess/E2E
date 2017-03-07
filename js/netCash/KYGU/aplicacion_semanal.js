$(document).ready(function() {
  var options = {
          chart: {
            marginRight: 100,
            zoomType: 'xy'
          },
          title: {
            text: 'KYGU - APLICACIÓN',
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
              format: '{value} ms.'
            },
            title: {
              text: 'Tiempo de respuesta (ms.)'
            },
            min: 0
          },{ //Peticiones
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
            name: 'Tiempo Respuesta kygu_mult_web_frontusuario_02',
            id: 'tiempoFront',
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
            name: 'Peticiones kygu_mult_web_frontusuario_02',
            color: 'rgba(65,105,225,1.0)',
            type: 'column',
            id: 'peticionesFront',
            yAxis: 1,
            index: 0,
            legendIndex: 1,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          },{
            name: 'Tiempo Respuesta kygu_mult_web_serviciosusuario_01',
            id: 'tiempoServicios',
            color: 'rgba(188,66,66,1.0)',
            type: 'line',
            index: 1,
            legendIndex: 0,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          },{
            name: 'Peticiones kygu_mult_web_serviciosusuario_01',
            color: 'rgba(90,172,249,1.0)',
            type: 'column',
            id: 'peticionesServicio',
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
                  { x: 1488787200000, text: '<b>Incidencia operativas LDAP</b> <br/>Incremento tiempo de respuesta operativas LDAP', title: 'Incidencia operativas LDAP' }
                ],
              onSeries: 'tiempoFront',
              tooltip: {
                       xDateFormat: '%e %B %Y %H:%MM'
              },
              showInLegend: false
          });
      }

      $.getJSON("/E2E/php/netCash/KYGU/aplicacion_semanal.php", function(json) {
                  options.series[0].data = json[0];
                  options.series[1].data = json[1];
                  options.series[2].data = json[2];
                  options.series[3].data = json[3];
              $('#aplicacion_semanal').highcharts(options);
      });
  });
