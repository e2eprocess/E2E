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
              format: '{value}'
            },
            title: {
              text: 'Peticiones'
            }/*,
            plotLines: [{
               color: 'rgba(255,0,0,1.0)',
               width: 2,
               value: 500000
           }]*/
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
            name: 'Particulares (F)',
            color: 'rgba(82,190,128,1.0)',
            type: 'spline',
            marker:{
              enabled: false
            },
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'PosicionGlobal (F)',
            color: 'rgba(245,176,65,1.0)',
            type: 'spline',
            marker:{
              enabled: false
            },
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'KQOF (F)',
            color: 'rgba(65,105,225,1.0)',
            type: 'spline',
            marker:{
              enabled: false
            },
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'Particulares (T)',
            color: 'rgba(82,190,128,1.0)',
            type: 'line',
            data:[]
          },{
            name: 'PosicionGlobal (T)',
            color: 'rgba(245,176,65,1.0)',
            type: 'line',
            data:[]
          },{
            name: 'KQOF (T)',
            color: 'rgba(65,105,225,1.0)',
            type: 'line',
            data:[]
          },{
            name: 'Max. Peticiones (4/11)',
            color: 'rgba(255,0,0,1.0)',
            type: 'line',
            data:[]
          }]
      }

      $.getJSON("php/netParticulares/peticiones.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.series[4].data = json[5]['data'];
        options.series[5].data = json[6]['data'];
        options.series[6].data = json[7]['data'];
        options.subtitle.text = json[8]['text'];
        //options.yAxis[0].plotLines[0].value = json[9]['value']-1000000;

        chart = new Highcharts.Chart(options);
      });
  });
