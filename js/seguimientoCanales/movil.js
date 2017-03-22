$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'movil',
            marginRight: 100,
            zoomType: 'xy'
          },
          title: {
            text: 'Móvil',
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
              format: '{value} ms.'
            },
            title: {
              text: 'Tiempo de respuesta (ms.)'
            },
            min: 0
          },{ //Peticiones
            title: {
              text: 'Peticiones'
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
                  },
                }/*,
                events: {
                    legendItemClick: function () {
                      return false;
              },
              allowPointSelect: false,
            }*/
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
              },
              pie: {
                 showInLegend: true,
                 allowPointSelect: false,  // disable selected
              }
          },
          /*series: []*/
          series: [{
            name: 'Tiempo Respuesta',
            id: 'Tiempo',
            color: 'rgba(41,198,248,1.0)',
            type: 'line',
            index: 1,
            legendIndex: 0,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          },{
            name: 'Peticiones',
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
          },{
            color: 'rgba(255,0,0,1.0)',
            type: 'line',
            yAxis: 1,
            legendIndex: 2,
            data:[]
          }]
      }

      $.getJSON("/E2E/php/seguimientoCanales/movil.php", function(json) {
                  options.series[1].data = json[0];
                  options.series[0].data = json[1];
                  options.series[2].data = json[2];
                  options.series[2].name = json[3];
              //$('#movil').highcharts(options);
              chart = new Highcharts.Chart(options);
      });
  });
