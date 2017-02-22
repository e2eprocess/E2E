$(document).ready(function() {
  var options = {
      chart: {
        marginRight: 20,
        zoomType: 'xy'
      },
      title: {
        text: 'Ejecuciones Online (Producción Tres Cantos)',
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
          value: 24,
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
          text: 'Ejecuciones'
        },
        min: 0
      },
      tooltip: {
          shared: true,
          crosshair: true,
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
        name: 'Ejecuciones (días seleccionados)',
        color: 'rgba(113,209,250,1)',
        type: 'area',
        data:[]
      },{
        name: 'Ejecuciones (días seleccionados - menos 7 días)',
        color: 'rgba(12,70,148,1.0)',
        type: 'line',
        data:[]
      },{
        name: [],
        color: 'rgba(255,3,3,1.0)',
        type: 'line',
        data:[]
      }]
  }

  $.getJSON("/E2E/php/mainframe/online.php", function(json) {
              options.xAxis.categories = json[0];
              options.xAxis.plotLines[0].label.text = json[4];
              options.series[0].data = json[1];
              options.series[2].data = json[2];
              options.series[1].data = json[3];
              options.series[2].name = json[5];
              $('#online').highcharts(options);
  });
});
