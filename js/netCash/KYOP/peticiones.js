$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'peticionesCash',
            marginRight: 20,
            zoomType: 'xy'
          },
          title: {
            text: 'Peticiones / 5 min.',
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
          yAxis: {
            lineWidth: 1,
            title: {
              text: 'Peticiones'
            }
          },
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
            name: 'mult_web_kyoppresentation (F)',
            color: 'rgba(65,105,225,1.0)',
            type: 'spline',
            dashStyle: 'shortdot',
            data:[]
          },{
            name: 'mult_web_kyoppresentation (T)',
            color: 'rgba(65,105,225,1.0)',
            type: 'line',
            data:[]
          },{
            color: 'rgba(255,0,0,1.0)',
            type: 'line',
            data:[]
          }]
      }

      $.getJSON("/E2E/php/netCash/KYOP/peticiones.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.subtitle.text = json[4]['text'];
        options.series[2].name = json[5];

        chart = new Highcharts.Chart(options);
      });
  });
