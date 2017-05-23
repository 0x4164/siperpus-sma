<body onload="startTime()" style="padding-top:50px;">
<?php

$page="beranda";
//query peng keluar -> update pengunjung set keluar=now() where idpeng=1
//query trigger peng masuk -> insert into pengunjung (namap,nopendaftaran) select nama,nopendaftaran from anggota where nopendaftaran=11954
include_once('database.php');

if(!isset($_GET['hal'])){
?>
<!-- <h1 class="text-center">== Beranda == Pengunjung ==</h1> -->
<!-- <div class="container-fluid row"> -->
  <script async type="text/javascript">
  /*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(document).ready(function() {
        // $("#nodaftar").autocomplete({
        //   source: "autoanggota.php",
        //   minLength:2
        // });
        // $('#country_name').autocomplete({
        $("#nodaftar").autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'autoanggota.php',
		      			dataType: "json",
						data: {
						   nop: request.term,
						   type: 'nodaftar'
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 3
		    });
    });
  </script>
<div class="row">
  <div class="col-lg-5">
    <h2>Pengunjung
    <h5><a href="index.php?hal=statistik">Statistik Pengunjung</a></h5></h2>
  </div>
  <div class="col-lg-5">
  </div>
  <div class="col-lg-2">
    <h5 id="waktu"></h5>
    <!-- <h4><a href="statistikp.php">Statistik Pengunjung</a></h4> -->
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
    <div class="panel panel-default">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#pmasuk">Pengunjung Masuk</a></li>
        <li ><a data-toggle="tab" href="#tamu">Tamu</a></li>
      </ul>
      <div class="tab-content">
        <div id="pmasuk" class="tab-pane in active panel-body">
          <?php //echo form_open('aplikasi/proses_pengunjung_masuk','class="form-horizontal"')?>
          <form role="form" class="form form-horizontal" action="pengunjung.php" method="post">
          <div class="form-group"><!--ui-widget-->
            <label class="control-label col-sm-4" for="nama">No Daftar:</label>
            <div class="ui-widget col-sm-8">
              <input type="text" id="nodaftar" class="form-control" name="nop" value="">
            </div>
            <!-- <select name="nop" class="form-control" id="sel1">
              <?php
              // $query="select nopendaftaran,nama from anggota";
              // $eksekusi=$db->query($query);
              // while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
              //   echo "<option>".$data['nopendaftaran']; ?> <?php //echo $data['nama']."</option>";
              // }
              ?>
            </select> -->
          </div>
          <input type="hidden" name="proses" value="pengunjung_masuk_a">
          <button type="submit" class="col-lg-offset-9 btn btn-success">Masuk</button>
          </form>
        </div>
        <div id="tamu" class="tab-pane panel-body">
          <?php //echo form_open('aplikasi/proses_pengunjung_masuk','class="form-horizontal"')?>
          <form role="form" class="form form-horizontal" action="pengunjung.php" method="post">
          <div class="form-group">
            <label class="control-label col-sm-4" for="nama">Nama Tamu:</label>
            <div class="ui-widget col-sm-8">
              <input type="text" class="form-control" name="namap" value="">
            </div>
            <input type="hidden" name="proses" value="pengunjung_masuk_b">
          </div>
          <button type="submit" class="col-lg-offset-9 btn btn-success">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i>
  </div>
  <div class="card-block">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
        <thead>
          <tr>
            <th>NO</th>
            <th>Nama Pengunjung</th>
            <th>No. Pendaftaran </th>
            <th>Kelas</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th><?php //form_open('aplikasi/proses_pengunjung_keluar_semua','class="form-horizontal"')?>
              <form class="" action="pengunjung.php" method="post">
                <input type="hidden" name="proses" value="pengunjung_keluar_semua">
                <button type=submit class="btn btn-default">Keluar Semua</button>
              </form></th>
            </tr>
        </thead>
        <tfoot>
          <tr>
            <th>NO</th>
            <th>Nama Pengunjung</th>
            <th>No. Pendaftaran </th>
            <th>Kelas</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th><?php //form_open('aplikasi/proses_pengunjung_keluar_semua','class="form-horizontal"')?>
              <form class="" action="pengunjung.php" method="post">
                <input type="hidden" name="proses" value="pengunjung_keluar_semua">
                <button type=submit class=btn btn-default>Keluar Semua</button>
              </form></th>
            </tr>
        </tfoot>
        <tbody>
    <?php
    // $query="select * from pengunjung";
    $query="SELECT idpeng,namap,a.nopendaftaran,k.kelas,masuk,keluar FROM anggota a,pengunjung p,kelas k where masuk is not null and a.idkelas=k.idkelas and a.nopendaftaran=p.nopendaftaran";
    $eksekusi=$db->query($query);
    //while($data=$eksekusi->fetch(PDO::FETCH_ASSOC))
    while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
      <td><?php echo $data['idpeng']; ?></td>
      <td><?php echo $data['namap']; ?></td>
      <td><?php echo $data['nopendaftaran']; ?></td>
      <td><?php echo $data['kelas'];?></td>
      <td><?php echo $data['masuk']; ?></td>
      <td><?php echo $data['keluar']; ?></td>
      <td>
        <form class="" action="pengunjung.php" method="post">
        <input type="hidden" name="proses" value="pengunjung_keluar">
        <input type="hidden" name="idpeng" value="<?php echo $data['idpeng']; ?>">
        <!--<input name="nop" value="" style=display:none;>-->
        <button type="submit" class="btn btn-default">Keluar</button>
        </form>
      </td>
    </tr>
<?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>
<!-- </div> -->
<script src="assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="assets/js/sb-admin.min.js"></script>

<?php } if(isset($_GET['hal'])&&$_GET['hal']=='statistik'){?>
  <div class="container">
    <h2>Statistik Pengunjung</h2>
    <label for="">Umum</label>
    <div class="row">
      <div class="col-lg-4">
      <?php
      include_once ("database.php");
      $query="SELECT date(masuk) as tanggal,COUNT(*) as jumlahpengunjung FROM `pengunjung` GROUP by tanggal order by jumlahpengunjung desc limit 1";
      $eksekusi=$db->query($query);
      $data=$eksekusi->fetch(PDO::FETCH_ASSOC);
      echo "Max == ".$data['tanggal']." @ ".$data['jumlahpengunjung']."<br>";
      $query="SELECT date(masuk) as tanggal,COUNT(*) as jumlahpengunjung FROM `pengunjung` GROUP by tanggal order by jumlahpengunjung asc limit 1";
      $eksekusi=$db->query($query);
      $data=$eksekusi->fetch(PDO::FETCH_ASSOC);
      echo "Min == ".$data['tanggal']." @ ".$data['jumlahpengunjung'];

      //while($data=$eksekusi->fetch(PDO::FETCH_ASSOC))
      // while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
      //   echo "Max == ".$data['tanggal']." @ ".$data['jumlahpengunjung']."<br>";
      // }
      //while($data=$eksekusi->fetch(PDO::FETCH_ASSOC))
      ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <label for="">Grafik</label>
      </div>
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-area-chart"></i>
        </div>
        <div class="card-block">
            <canvas id="statistik" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">
            <!-- Updated yesterday at 11:59 PM -->
        </div>
      </div>
    </div>
  </div>
  <!-- plugin -->
  <script src="assets/datatables/jquery.dataTables.js"></script>
  <script src="assets/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/datatables/dataTables.bootstrap4.js"></script>
  <script src="assets/vendor/chart.js/Chart.min.js"></script>
  <script src="assets/js/statistik.js"></script>
<?php } ?>
