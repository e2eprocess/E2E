$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'acumuladoTrx',
            marginRight: 30,
            zoomType: 'xy',
            height: 250
          },
          title: {
            text: 'Acumulado Trx'
             //center
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
              crosshair: true,
              formatter: function() {
                var s = '<b>Detalle:</b>';
                console.log(this);
                $.each(this.points, function(index) {
                    if (index<2) {
                      console.log(this.color);
                      s += '<br/><b>' + this.series.name + ': </b>' +
                    this.y + ' - <b>' +this.percentage.toFixed(2) +' %</b>';
                    }
                    else {
                      s += '<br/><b>' + this.series.name.substr(0,12) + ': </b>' +
                      this.y;
                    }
                });

                return s;;s
                
              }

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
              column:{
                stacking: 'normal'
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
            //name: 'Transacciones',
            name: 'Host',
            color:  '#072146',
            type: 'column',
            index: 1,
            legendIndex: 0,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%M'
            },
            turboThreshold: 0
          },{
            color: '  #2A86CA',
            name: 'APX',
            type: 'column',
            index: 0,
            legendIndex: 1,
            data: [],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          },{
            color: 'rgba(255,0,0,1.0)',
            type: 'line',
            data: [],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0,
            legendIndex: 2,
          }]
      }

      $.getJSON("/E2E/php/seguimientoTrx/acumuladoTrx.php", function(json) {
                  options.series[1].data = json[0];
                  options.series[0].data = json[1];
                  options.series[2].name = json[3];

                  var dataLength = json[0].length,
                  max_peti = [];

                  i=0;
                  for (i; i < dataLength; i += 1){
                    max_peti.push([
                        json[0][i][0],
                        json[2][i][0]]);
                  };

                  options.series[2].data = max_peti;
                  console.log(json)


              chart = new Highcharts.Chart(options);
      });
  });
