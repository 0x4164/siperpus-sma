<?php
	/*fitur2
	home=pengunjung
	1. Manajemen Data anggota, pengunjung(home), pustaka
	2. pencarian pustaka
	3. peminjaman
	4. pengembalian
	5. Laporan statistik pengunjung
	*/
session_start();
//userdata
$user = $_SESSION['username'];
include ("head-html.php");
?>
  <body>
<?php
	if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
		include ("navbar.php");
?>
	<!-- html -->
	<!-- <header class="container">
	  <div class="header judul">
	    <a href="home"><h1>SIPERPUS</h1></a>
	    <p>Sistem Informasi Perpustakaan SMAN 1 Batu</p>
	  </div>
	  <div class="header keterangan">
	    <span class="header-waktu">9:39 PM Selasa, 22 November 2016</span><br><br>
	    <span class="header-selamat">Selamat datang <?php echo $user;?></span>
	    <a href="logout" class="btn btn-logout">Logout</a>
	  </div>
	  <div class="clear"></div>
	</header> -->
	<div class="container">

<?php
		include ("beranda.php");
?>
<!-- html -->
<?php
}else{
	header('location:login.php');
}
?>
	</div>
</body>
</html>
