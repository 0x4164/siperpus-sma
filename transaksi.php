<body style="padding-top:50px;">
<?php
$page="transaksi";
session_start();
include ("head-html.php");
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
  include ("navbar.php");
  include_once ("database.php");
?>
<div class="container">
  <h2>Transaksi</h2>
</div>
<div id="main-view" class="row">
</div>
<?php
}else{
	header('location:login.php');
}
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#main-view").load("pengembalian.php");
	// $("#main-view").load("peminjaman.php");
});
</script>
