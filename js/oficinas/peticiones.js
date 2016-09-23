$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'peticiones',
            marginRight: 130,
            zoomType: 'xy'
          },
          title: {
            text: 'Peticiones',
            x: -20 //center
          },
          subtitle: {
            text: '- Últimas 24 horas; --Últimas 24 horas semana pasada',
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
              format: '{value}'
            },
            title: {
              text: 'Peticiones NCOC'
            }
          },{ //tiempo de respuesta
            labels: {
              format: '{value}'
            },
            title: {
              text: 'Peticiones EECC'
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
            name: 'Objeto Cliente last',
            color: 'rgba(82,190,128,1.0)',
            type: 'spline',
            marker:{
              enabled: false
            },
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'EECC last',
            color: 'rgba(65,105,225,1.0)',
            type: 'spline',
            marker:{
              enabled: false
            },
            dashStyle: 'shortdot',
            yAxis: 1,
            data:[]
          },{
            name: 'Objeto Cliente now',
            color: 'rgba(82,190,128,1.0)',
            type: 'line',
            data:[]
          },{
            name: 'EECC now',
            color: 'rgba(65,105,225,1.0)',
            type: 'line',
            yAxis: 1,
            data:[]
          }]
      }

      $.getJSON("php/oficinas/peticiones.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];

        chart = new Highcharts.Chart(options);
      });
  });
