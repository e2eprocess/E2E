$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'recurso_mensual',
            marginRight: 130,
            zoomType: 'xy',
            type: 'area'
          },
          title: {
            text: 'CPU MÁQUINA (máximos)',
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
            //type: 'datetime',
            tickPixelInterval: 150,
            crosshair: true,
            categories: []
          },
          yAxis: [{ //tiempo de respuesta
            labels: {
              format: '{value} %'
            },
            title: {
              text: 'CPU %'
            }
          },{ //Peticiones
            labels: {
              format: '{value} %'
            },
            title: {
              text: 'Memoria'
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
              }
          },
          /*series: []*/
          series: [{
            name: 'CPU-apbad022',
            color: 'rgba(57,51,255,0.5)',
            data:[]
          },{
            name: 'CPU-apbad023',
            color: 'rgba(51,107,255,0.5)',
            data:[]
          },{
            name: 'CPU-apbad024',
            color: 'rgba(51,162,255,0.5)',
            data:[]
          },{
            name: 'CPU-apbad026',
            color: 'rgba(51,209,255,0.5)',
            data:[]
          }]
      }

      $.getJSON("../php/netCash/VS_MQ/recurso_mensual.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[5]['data'];
        options.series[1].data = json[6]['data'];
        options.series[2].data = json[7]['data'];
        options.series[3].data = json[8]['data'];


        chart = new Highcharts.Chart(options);
      });
  });
