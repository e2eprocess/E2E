$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'cpuAPX',
            marginRight: 20,
            zoomType: 'xy',
            height: 300
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
            max: 100,
            lineWidth: 1,
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
            name: 'lppxo301 (F)',
            color: 'rgba(4,38,253,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo302 (F)',
            color: 'rgba(4,129,255,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo303 (F)',
            color: 'rgba(95,173,251,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo304 (F)',
            color: 'rgba(80,209,250,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo305 (F)',
            color: 'rgba(4,38,253,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo306 (F)',
            color: 'rgba(4,129,255,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo307 (F)',
            color: 'rgba(95,173,251,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo308 (F)',
            color: 'rgba(4,38,253,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo309 (F)',
            color: 'rgba(4,129,255,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo310 (F)',
            color: 'rgba(95,173,251,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo311 (F)',
            color: 'rgba(95,173,251,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo312 (F)',
            color: 'rgba(95,173,251,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppxo301 (T)',
            color: 'rgba(4,38,253,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo302 (T)',
            color: 'rgba(4,129,255,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo303 (T)',
            color: 'rgba(95,173,251,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo304 (T)',
            color: 'rgba(80,209,250,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo305 (T)',
            color: 'rgba(4,38,253,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo306 (T)',
            color: 'rgba(4,129,255,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo307 (T)',
            color: 'rgba(95,173,251,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo308 (T)',
            color: 'rgba(4,38,253,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo309 (T)',
            color: 'rgba(4,129,255,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo310 (T)',
            color: 'rgba(95,173,251,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo311 (T)',
            color: 'rgba(95,173,251,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppxo312 (T)',
            color: 'rgba(92,173,251,1)',
            type: 'line',
            data:[]
          }]
          }

          $.getJSON("php/APX/cpu.php", function(json) {
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
          options.series[14].data = json[15]['data'];
          options.series[15].data = json[16]['data'];
          options.series[16].data = json[17]['data'];
          options.series[17].data = json[18]['data'];
          options.series[18].data = json[19]['data'];
          options.series[19].data = json[20]['data'];
          options.series[20].data = json[21]['data'];
          options.series[21].data = json[22]['data'];
          options.series[22].data = json[23]['data'];
          options.series[23].data = json[24]['data'];
          options.subtitle.text = json[25]['text'];

          chart = new Highcharts.Chart(options);
          });
  });
