<?php
$page="pencarian";
session_start();
include ("head-html.php");
include ("navbar.php");
?>
<body style="padding-top:50px;">
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
?>
<div class="container">
  <h2>Pencarian Pustaka</h2>
<!-- <form class="form" action="aksi_pustaka.php" method="post">
  <input class="form-control" type="text" name="katakunci" value="">
  <input class="form-control" type="submit" name="proses" value="Cari">
</form> -->
  <?php include("pustaka_cari.php"); ?>
</div>
<?php
}else{
?>
<div class="container">
  <h2>Pencarian Pustaka</h2>
</div>
<?php include("pustaka_cari.php");
	//header('location:login.php');
}
?>
