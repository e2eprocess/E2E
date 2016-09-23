$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'tiempoRespuesta',
            marginRight: 130,
            zoomType: 'xy'
          },
          title: {
            text: 'Tiempo de respuesta (ms.)',
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
              format: '{value} (ms.)'
            },
            title: {
              text: 'Tiempo de respuesta'
            }
          },{ //tiempo de respuesta
            labels: {
              format: '{value} (ms.)'
            },
            title: {
              text: 'Pasaporte tiempo respuesta (ms.)'
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
            name: 'Particulares last',
            color: 'rgba(82,190,128,1)',
            type: 'spline',
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'PosicionGlobal last',
            color: 'rgba(245,176,65,1.0)',
            type: 'spline',
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'KQOF last',
            color: 'rgba(65,105,225,1.0)',
            type: 'spline',
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'Pasaporte last',
            color: 'rgba(223,99,248,1.0)',
            type: 'spline',
            dashStyle: 'shortdot',
            yAxis: 1,
            data:[]
          },{
            name: 'Particulares now',
            color: 'rgba(82,190,128,1.0)',
            type: 'line',
            data:[]
          },{
            name: 'PosicionGlobal now',
            color: 'rgba(245,176,65,1.0)',
            type: 'line',
            data:[]
          },{
            name: 'KQOF now',
            color: 'rgba(65,105,225,1.0)',
            type: 'line',
            data:[]
          },{
            name: 'Pasaporte now',
            color: 'rgba(223,99,248,1.0)',
            type: 'line',
            yAxis: 1,
            data:[]
          }]
      }

      $.getJSON("php/netParticulares/tiempoRespuesta.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.series[4].data = json[5]['data'];
        options.series[5].data = json[6]['data'];
        options.series[6].data = json[7]['data'];
        options.series[7].data = json[8]['data'];

        chart = new Highcharts.Chart(options);
      });
  });
