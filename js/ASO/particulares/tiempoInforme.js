$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'tiempoASONet',
            marginRight: 20,
            zoomType: 'xy'
          },
          title: {
            text: 'Tiempo de respuesta (ms.)',
            x: -20 //center
          },
          subtitle: {
            text: [],
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
              format: '{value} ms.'
            },
            title: {
              text: 'Tiempo de respuesta (ms.)'
            },
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
            name: 'Granting (F)',
            color: 'rgba(82,190,128,1)',
            type: 'spline',
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'Servicio (F)',
            color: 'rgba(65,105,225,1.0)',
            type: 'spline',
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'Granting (T)',
            color: 'rgba(82,190,128,1)',
            type: 'line',
            data:[]
          },{
            name: 'Servicio (T)',
            color: 'rgba(65,105,225,1.0)',
            type: 'line',
            data:[]
          }]
      }

      $.getJSON("/E2E/php/ASO/particulares/tiempoNetInforme.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.subtitle.text = json[5]['text'];

        chart = new Highcharts.Chart(options);
      });
  });
