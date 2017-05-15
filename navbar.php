<?php

if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
?>
<nav class="navbar navbar-inverse" data-spy="affix" style="">
    <div class="navbar-header">
    <a class="navbar-brand" href="">SIP</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
      <li class="active"><a href="index.php">Beranda</a></li>
      <li class=""><a href="manajemendata.php">Manajemen Data</a></li>
      <li class=""><a href="pencarianpustaka.php">Pencarian Pustaka</a></li>
      <li class=""><a href="transaksi.php">Transaksi</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
      <li class=""><a href="logout.php">Logout</a></li>
    </ul>
</nav>
<?php
}else{
?>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="5">
    <div class="navbar-header">
    <a class="navbar-brand" href="home">SIP</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
      <li class=""><a href="pencarianpustaka.php">Pencarian Pustaka</a></li>
    </ul>
</nav>
<?php
}
?>
