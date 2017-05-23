<?php
// session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="">SIP</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
      <li class="active"><a href="index.php">Beranda</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">Manajemen Data
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="manajemendata.php?hal=anggota">Manajemen Anggota</a></li>
          <li><a href="manajemendata.php?hal=pustaka">Manajemen Pustaka</a></li>
        </ul>
      </li>
      <li class=""><a href="pencarianpustaka.php">Pencarian Pustaka</a></li>
      <li class=""><a href="transaksi.php">Transaksi</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
      <li class=""><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<?php
}else{
?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="">
    <div class="navbar-header">
    <a class="navbar-brand" href="home">SIP</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
      <li class=""><a href="pencarianpustaka.php">Pencarian Pustaka</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
      <li class=""><a href="login.php">Login</a></li>
    </ul>
</nav>
<?php
}
?>
<div class="container">
