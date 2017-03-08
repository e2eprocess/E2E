$(document).ready(function() {
  var options = {
          chart: {
            marginRight: 100,
            zoomType: 'xy'
          },
          title: {
            text: 'KYOS - APLICACIÓN',
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
            name: 'Tiempo Respuesta kyos_mult_web_servicios_02',
            id: 'tiempoServicios',
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
            name: 'Peticiones kyos_mult_web_servicios_02',
            color: 'rgba(65,105,225,1.0)',
            type: 'column',
            id: 'peticionesServicios',
            yAxis: 1,
            index: 0,
            legendIndex: 1,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          },{
            name: 'Tiempo Respuesta kyos_mult_web_posicioncuentas_01',
            id: 'tiempoPosicioncuentas',
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
            name: 'Peticiones kyos_mult_web_posicioncuentas_01',
            color: 'rgba(90,172,249,1.0)',
            type: 'column',
            id: 'peticionesPosicioncuentas',
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
                  { x: 1487592000000, text: '<b>Incidencia operativas LDAP</b> <br/>Incremento tiempo de respuesta operativas LDAP', title: 'Incidencia operativas LDAP' },
                  { x: 1488787200000, text: '<b>Incidencia operativas LDAP</b> <br/>Incremento tiempo de respuesta operativas LDAP', title: 'Incidencia operativas LDAP' }
                ],
              onSeries: 'tiempoServicios',
              tooltip: {
                       xDateFormat: '%e %B %Y %H:%MM'
              },
              showInLegend: false
          });
      }

      $.getJSON("/E2E/php/netCash/KYOS/aplicacion_mensual.php", function(json) {
                  options.series[0].data = json[0];
                  options.series[1].data = json[1];
                  options.series[2].data = json[2];
                  options.series[3].data = json[3];
              $('#aplicacion_mensualKYOS').highcharts(options);
      });
  });
