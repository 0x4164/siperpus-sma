<?php
$page="statistik";
session_start();
include ("head-html.php");
?>
<body style="padding-top:50px;">

<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
  include ("navbar.php");
?>

<div class="container">
  <h2>Statistik Pengunjung</h2>
  <div class="card mb-3">
      <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example
      </div>
      <div class="card-block">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
      </div>
      <div class="card-footer small text-muted">
          Updated yesterday at 11:59 PM
      </div>
  </div>
</div>
<?php
}else{
	header('location:login.php');
}
?>
<script src="assets/chart.js/Chart.min.js"></script>
<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.js"></script>
<!-- <script src="assets/js/statistik.js"> -->
