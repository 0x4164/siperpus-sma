<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> SIPERPUS </title>
	<link href="assets/css/style.css" rel="stylesheet"/>
	<link href="assets/css/bootstrap-responsive.css" rel="stylesheet"/>
	<!-- <link href="assets/337/css/bootstrap.min.css" rel="stylesheet"/> -->
	<link href="assets/337/css/bootstrap.min.css" rel="stylesheet"/>
	<script	src="assets/js/jquery-3.2.1.min.js"></script>
	<script	src="assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script	src="assets/jquery-ui-1.12.1/jquery-ui.css"></script>
	<script src="assets/337/js/bootstrap.min.js"></script>
	<!-- <script src="assets/337/js/bootstrap.js"></script> -->
	<link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- <link href="assets/css/sb-admin.css" rel="stylesheet"> -->
	<script>
		$(document).on("click", ".open-AddBookDialog", function () {
			 var myBookId = $(this).data('id');
			 $(".modal-body #bookId").val( myBookId );
		});
	</script>
	<!-- time -->
	<script async type="text/javascript" language="javascript">
		function showTime(){
			var hari= new Array("Minggu","Senin "," Selasa ","Rabu"," Kamis"," Jumat"," Sabtu")
			var bulan= new Array("Januari","Februari ","Maret","April","Mei","Juni","Juli"," Agustus"," September"," Oktober"," November"," Desember")
			var t=new Date()
			var hrini=hari[t.getDay()]
			var tanggal = t.getDate()
			var bulanini = bulan[t.getMonth()]
			var tahun = t.getYear()
			// document.write(hrini+" tanggal :"+tanggal+" "+bulanini)
			var waktu = hrini+" tanggal :"+tanggal+" "+bulanini;
			document.getElementById('waktu').innerHTML = waktu;
		}
		</script>
	<script>
	function startTime() {
	    var hari= new Array("Minggu","Senin "," Selasa ","Rabu"," Kamis"," Jumat"," Sabtu")
			var bulan= new Array("Januari","Februari ","Maret","April","Mei","Juni","Juli"," Agustus"," September"," Oktober"," November"," Desember")
			var t=new Date()
			var hrini=hari[t.getDay()]
			var tanggal = t.getDate()
			var bulanini = bulan[t.getMonth()]
			var tahun = t.getYear()
			// document.write(hrini+" tanggal :"+tanggal+" "+bulanini)
			var waktu = hrini+", "+tanggal+" "+bulanini;

	    var h = t.getHours();
	    var m = t.getMinutes();
	    var s = t.getSeconds();
	    m = checkTime(m);
	    s = checkTime(s);
			var jam =   h + ":" + m + ":" + s;
	    document.getElementById('waktu').innerHTML =  waktu +" "+ jam;
	    var t = setTimeout(startTime, 500);
	}
	function checkTime(i) {
	    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	    return i;
	}
	</script>
	<style media="screen">
		.affix {
		  top: 0;
		  width: 100%;
		}
		.affix-top {
		  width: 100%;
		}
		.affix-bottom {
		  position: absolute;
		  width: 100%;
		}
	</style>


<?php if ($page=="statistik"){?>
	<script src="assets/js/statistik.js">
	</script>
	 <script type="text/javascript">
	 Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	 Chart.defaults.global.defaultFontColor = '#292b2c';

	 // -- Area Chart Example
	 var ctx = document.getElementById("myAreaChart");
	 var myLineChart = new Chart(ctx, {
	     type: 'line',
	     data: {
	         labels: ["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
	         datasets: [{
	             label: "Sessions",
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
	             data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
	         }],
	     },
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
	                     max: 40000,
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

	 // -- Bar Chart Example
	 var ctx = document.getElementById("myBarChart");
	 var myLineChart = new Chart(ctx, {
	     type: 'bar',
	     data: {
	         labels: ["January", "February", "March", "April", "May", "June"],
	         datasets: [{
	             label: "Revenue",
	             backgroundColor: "rgba(2,117,216,1)",
	             borderColor: "rgba(2,117,216,1)",
	             data: [5412, 5312, 5846, 6125, 5971, 6025],
	         }],
	     },
	     options: {
	         scales: {
	             xAxes: [{
	                 time: {
	                     unit: 'month'
	                 },
	                 gridLines: {
	                     display: false
	                 },
	                 ticks: {
	                     maxTicksLimit: 6
	                 }
	             }],
	             yAxes: [{
	                 ticks: {
	                     min: 0,
	                     max: 8000,
	                     maxTicksLimit: 5
	                 },
	                 gridLines: {
	                     display: true
	                 }
	             }],
	         },
	         legend: {
	             display: false
	         }
	     }
	 });
	 </script>
<?php } ?>

</head>
