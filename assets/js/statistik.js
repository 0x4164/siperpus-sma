
$(document).ready(function(){
  $.ajax({
    url:"statistikp.php",
    method:"POST",
    success: function(data){
      // Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      // Chart.defaults.global.defaultFontColor = '#292b2c';

      // -- Area Chart Example
      // var ctx = document.getElementById("statistik");
      console.log(data);
      var ctx = $("#statistik");
      var tanggal = [];
      var jml = [];

      for(var i in data) {
				tanggal.push("Tanggal "+data[i].tanggal);
				jml.push(data[i].jumlahpengunjung);
			}
      var chartdata = {
          labels: tanggal,
          datasets: [{
              label: "Jumlah Pengunjung",
              lineTension: 0.3,
              backgroundColor: "rgba(2,117,216,0.2)",
              borderColor: "rgba(2,117,216,1)",
              pointRadius: 5,
              pointBackgroundColor: "rgba(2,117,216,1)",
              pointBorderColor: "rgba(255,255,255,0.8)",
              pointHoverRadius: 5,
              pointHoverBackgroundColor: "rgba(2,117,216,1)",
              pointHitRadius: 20,
              pointBorderWidth: 2,
              data: jml,
          }],
      };

      var myLineChart = new Chart(ctx, {
          type: 'line',
          data: chartdata,
          options: {
              scales: {
                  xAxes: [{
                      time: {
                          unit: 'date'
                      },
                      gridLines: {
                          display: false
                      },
                      ticks: {
                          maxTicksLimit: 7
                      }
                  }],
                  yAxes: [{
                      ticks: {
                          min: 0,
                          max: 50,
                          maxTicksLimit: 5
                      },
                      gridLines: {
                          color: "rgba(0, 0, 0, .125)",
                      }
                  }],
              },
              legend: {
                  display: false
              }
          }
        });
    },
    error: function(data) {
			console.log(data);
		}
  });
});
