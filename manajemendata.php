<body style="padding-top:50px;">
<?php
$page="manajemendata";
session_start();
include ("head-html.php");
?>
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
  include ("navbar.php");
  if(!isset($_GET['hal'])){
?>
  <div class="container">
  <h2>Manajemen Data</h2>
  <ul>
    <li><a href="manajemendata.php?hal=anggota">Manajemen Anggota</a></li>
    <li><a href="manajemendata.php?hal=pustaka">Manajemen Pustaka</a></li>
  </ul>
  </div>
<?php
  }else if(isset($_GET['hal'])&&$_GET['hal']=='pustaka'){
?>
<div class="container">
  <h2>Manajemen Data Pustaka</h2>
  <a href="form_pustaka.php">Tambah Pustaka</a>
  <!-- <table width="513" border="0" align="center" class="table table-bordered">
  <tr bgcolor="#FFFFCC">
  	<td width="10">no</td>
  	<td width="880">judul</td>
  	<td width="220">penulis</td>
  	<td width="330">isbn</td>
  	<td colspan="2"></td>
  </tr> -->
<div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i>
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
          <thead>
            <!-- <tr bgcolor="#FFFFCC"> -->
            <tr>
            	<th>no</th>
            	<th>judul</th>
            	<th>penulis</th>
            	<th>isbn</th>
            	<th>.</th>
            	<th>.</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            	<th>no</th>
            	<th>judul</th>
            	<th>penulis</th>
            	<th>isbn</th>
              <th>.</th>
            	<th>.</th>
            </try>
          </tfoot>
          <tbody>
    <?php
    include_once ("database.php");
    $a=1;
    $query="select * from buku";
    $eksekusi=$db->query($query);
    while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
    	<td><?php echo $a; $a++;?></td>
    	<td><?php echo $data['judul']; ?></td>
    	<td><?php echo $data['penulis']; ?></td>
    	<td><?php echo $data['isbn']; ?></td>
    	<td><a id="show-form-ubah" href="form_pustaka.php?id=<?php echo $data['id']; ?>">edit</a></td>
    	<td><a id="hapus-data" href="aksi_pustaka.php?id=<?php echo $data['id']."&"; ?>proses=hapus">hapus</a></td>
    </tr>
    <?php
    }
    ?>
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
<script src="assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="assets/js/sb-admin.min.js"></script>
<?php
  }else if(isset($_GET['hal'])&&$_GET['hal']=='anggota'){
?>
<div class="container">
  <h2>Manajemen Data Anggota</h2>
    <a href="form_anggota.php">Tambah Anggota</a>
    <!-- <table width="513" border="0" align="center" class="table table-bordered">
    <tr bgcolor="#FFFFCC">
    	<td width="10">no</td>
    	<td width="880">judul</td>
    	<td width="220">penulis</td>
    	<td width="330">isbn</td>
    	<td colspan="2"></td>
    </tr> -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i>
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
          <thead>
    <!-- <table border="0" align="center" class="table table-bordered"> -->
          <tr>
          	<th>No</th>
          	<th>NOP</th>
          	<th>Nama</th>
          	<th>Alamat</th>
          	<th>Prov/Kota</th>
          	<th>JenisKelamin</th>
          	<th>Kelas</th>
          	<th>Tempat Lahir</th>
          	<th>Tanggal Lahir</th>
          	<th>No Telp</th>
          	<th></th>
          	<th></th>
            <!-- <tr colspan="2"></tr> -->
          </tr>
          </thead>
          <tfoot>
            <tr>
            	<th>No</th>
            	<th>NOP</th>
            	<th>Nama</th>
            	<th>Alamat</th>
            	<th>Prov/Kota</th>
            	<th>JenisKelamin</th>
            	<th>Kelas</th>
            	<th>Tempat Lahir</th>
            	<th>Tanggal Lahir</th>
            	<th>No Telp</th>
            	<!-- <tr colspan="2"></tr> -->
            </tr>
          </tfoot>
          <tbody>
    <?php
    include_once ("database.php");
    $a=1;
    $query="select * from anggota";
    $eksekusi=$db->query($query);
    while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
    	<td><?php echo $a; $a++;?></td>
    	<td><?php echo $data['nopendaftaran']; ?></td>
    	<td><?php echo $data['nama']; ?></td>
    	<td><?php echo $data['alamat']; ?></td>
    	<td><?php echo $data['idprovinsi']." ".$data['idkota']; ?></td>
      <td><?php echo $data['jeniskelamin']; ?></td>
      <td><?php echo $data['idkelas']; ?></td>
      <td><?php echo $data['tempatlahir']; ?></td>
      <td><?php echo $data['tanggallahir']; ?></td>
      <td><?php echo $data['notelepon']; ?></td>
    	<td><a id="show-form-ubah" href="form_anggota.php?nopendaftaran=<?php echo $data['nopendaftaran']; ?>">Edit</a></td>
    	<td><a id="hapus-data" href="aksi_anggota.php?nopendaftaran=<?php echo $data['nopendaftaran']."&"; ?>proses=hapus">Hapus</a></td>
    </tr>
    <?php
    }
    ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="assets/js/sb-admin.min.js"></script>
<?php
  }
}else{
	header('location:login.php');
}
?>
