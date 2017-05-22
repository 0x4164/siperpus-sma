<body style="padding-top:50px;">
<?php
$page="transaksi";
session_start();
include ("head-html.php");
?>
<body>
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
  include ("navbar.php");
?>
<div class="container">
  <h2>Transaksi</h2>
</div>
<?php
}else{
	header('location:login.php');
}
?>
