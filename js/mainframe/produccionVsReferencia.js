$(document).ready(function() {
  var options = {
          chart: {
            marginRight: 30,
            zoomType: 'xy'
          },
          title: {
            text: 'Consumo de Producción por Sysplex / Maquina (*)',
            x: -20 //center
          },
          subtitle: {
            text: '(* Día de referencia: último día de máxima actividad transaccional)',
            x: -20,
            y: 30
          },
          credits: {
            enabled: false
          },
          xAxis: {
            plotLines: [{ // mark the weekend
              color: 'grey',
              width: 2,
              value: 96,
              dashStyle: 'Dash',
              label: {
                text: [],
                align: 'top',
                rotation: 0,
                style: {
                  fontSize: "10px"
                }
              }
            }]
          },
          yAxis: {
            lineWidth: 1,
            title: {
              text: 'MIPS'
            },
            min: 0
          },
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
              series: {
                marker: {
                  enabled: false,
                  symbol: 'circle',
                  radius: 2
                },
                fillOpacity: 0.5
              }
          },
          /*series: []*/
          series: [{
            name: 'Prod. Tres Cantos',
            color: 'rgba(113,209,250,1)',
            type: 'area',
            data:[]
          },{
            name: [],
            color: 'rgba(149,0,0,1.0)',
            type: 'line',
            data:[]
          },{
            name: 'Prod. Informacional',
            color: 'rgba(41,103,190,1)',
            type: 'area',
            data:[]
          },{
            name: [],
            color: 'rgba(255,1,1,1.0)',
            type: 'line',
            data:[]
          }],
      }

      $.getJSON("/E2E/php/mainframe/produccionVsReferencia.php", function(json) {
                  options.xAxis.categories = json[0];
                  options.series[0].data = json[1];
                  options.series[1].data = json[2];
                  options.series[1].name = json[5];
                  options.series[2].data = json[3];
                  options.series[3].data = json[4];
                  options.series[3].name = json[6];
                  options.xAxis.plotLines[0].label.text = json[7];
                  $('#produccionVsReferencia').highcharts(options);
      });
  });
