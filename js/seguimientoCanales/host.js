$(document).ready(function() {

  var options = {
          chart: {
            renderTo: 'host',
            marginRight: 100,
            zoomType: 'xy',
            height: 400
          },
          title: {
            text: 'Trx Host',
            x: -20 //center
          },
          credits: {
            enabled: false
          },
          xAxis: {
            type: 'datetime',
          },
          yAxis: [{ //tiempo de respuesta
            labels: {
              format: '{value}'
            },
            title: {
              text: 'Transacciones'
            },
            min: 0
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
            name: 'Transacciones',
            color: 'rgba(65,105,225,1.0)',
            type: 'column',
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%M'
            },
            turboThreshold: 0
          },{
            color: 'rgba(255,0,0,1.0)',
            type: 'line',
            data: [],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          }]
      }

      $.getJSON("/E2E/php/seguimientoCanales/trxHost.php", function(json) {
                  options.series[0].data = json[0];
                  options.series[1].name = json[2];
             
              var dataLength = json[0].length,
                  max_peti = [];

              i=0;
              for (i; i < dataLength; i += 1){
                max_peti.push([
                    json[0][i][0],
                    json[1][i][0]]);
              };

              options.series[1].data = max_peti;

              chart = new Highcharts.Chart(options);
      });
  });
