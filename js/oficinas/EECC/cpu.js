$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'cpu',
            marginRight: 20,
            zoomType: 'xy'
          },
          title: {
            text: 'Consumo CPU %',
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
              format: '{value} %'
            },
            title: {
              text: 'CPU %'
            },
            max: 100
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
            name: 'spnac005 (F)',
            color: 'rgba(4,38,253,1)',
            type: 'column',
            data:[]
          },{
            name: 'spnac006 (F)',
            color: 'rgba(4,129,255,1)',
            type: 'column',
            data:[]
          },{
            name: 'spnac007 (F)',
            color: 'rgba(95,173,251,1)',
            type: 'column',
            data:[]
          },{
            name: 'spnac008 (F)',
            color: 'rgba(80,209,250,1)',
            type: 'column',
            data:[]
          },{
            name: 'spnac009 (F)',
            color: 'rgba(4,38,253,1)',
            type: 'column',
            data:[]
          },{
            name: 'spnac010 (F)',
            color: 'rgba(4,129,255,1)',
            type: 'column',
            data:[]
          },{
            name: 'spnac012 (F)',
            color: 'rgba(95,173,251,1)',
            type: 'column',
            data:[]
          },{
            name: 'spnac005 (T)',
            color: 'rgba(4,38,253,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac006 (T)',
            color: 'rgba(4,129,255,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac007 (T)',
            color: 'rgba(95,173,251,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac008 (T)',
            color: 'rgba(80,209,250,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac009 (T)',
            color: 'rgba(80,209,250,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac010 (T)',
            color: 'rgba(80,209,250,1)',
            type: 'line',
            data:[]
          },{
            name: 'spnac012 (T)',
            color: 'rgba(80,209,250,1)',
            type: 'line',
            data:[]
          }]
      }

      $.getJSON("/E2E/php/oficinas/EECC/cpu.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.series[4].data = json[5]['data'];
        options.series[5].data = json[6]['data'];
        options.series[6].data = json[7]['data'];
        options.series[7].data = json[8]['data'];
        options.series[8].data = json[9]['data'];
        options.series[9].data = json[10]['data'];
        options.series[10].data = json[11]['data'];
        options.series[11].data = json[12]['data'];
        options.series[12].data = json[13]['data'];
        options.series[13].data = json[14]['data'];
        options.subtitle.text = json[15]['text'];

        chart = new Highcharts.Chart(options);
      });
  });
