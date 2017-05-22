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
	<script src="assets/chart.js/Chart.min.js"></script>
<?php } ?>
</head>
