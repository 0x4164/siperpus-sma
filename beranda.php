<?php
//query peng keluar -> update pengunjung set keluar=now() where idpeng=1
//query trigger peng masuk -> insert into pengunjung (namap,nopendaftaran) select nama,nopendaftaran from anggota where nopendaftaran=11954
include_once('database.php');
?>
<!-- <h1 class="text-center">== Beranda == Pengunjung ==</h1> -->
<!-- <div class="container-fluid row"> -->
<body onload="startTime()">
  <script async type="text/javascript">
  /*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(document).ready(function() {
        $("#nodaftar").autocomplete({
          source: "autoanggota.php",
          minLength:2
        });
    });
  </script>
<div class="row">
  <div class="col-lg-3">
    <h2>Pengunjung <br><hr>
      <h5><a href="statistikp.php">Statistik Pengunjung</a></h5>
    </h2>&nbsp;
  </div>
  <div class="col-lg-2 col-lg-offset-7">
    <h5 id="waktu"></h5>
    <!-- <h4><a href="statistikp.php">Statistik Pengunjung</a></h4> -->
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
    <div class="panel panel-default">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#panggota1">Cari Pengunjung</a></li>
      </ul>
      <div class="panel-body">
        <div id="panggota1" class="tab-pane in active panel-body">
            <form role="form" class="" action="pengunjung.php" method="post" autocomplete="on">
              <div class="form-group">
                <label class="control-label" for="nama">Nama:</label>
                <input type="text" class="form-control" name="namap" value="">
              </div>
              <input type="hidden" name="proses" value="cari_pengunjung">
              <button type="submit" class="col-lg-offset-9 btn btn-default">Cari</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#pmasuk">Pengunjung Masuk</a></li>
        <li ><a data-toggle="tab" href="#tamu">Tamu</a></li>
      </ul>
      <div class="tab-content">
        <div id="pmasuk" class="tab-pane in active panel-body">
          <?php //echo form_open('aplikasi/proses_pengunjung_masuk','class="form-horizontal"')?>
          <form role="form" action="pengunjung.php" method="post">
          <div class="form-group"><!--ui-widget-->
            <label class="control-label" for="nama">No Daftar:</label>
            <div class="ui-widget">
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
          <form role="form" action="pengunjung.php" method="post">
          <div class="form-group">
            <label class="control-label" for="nama">Nama Tamu:</label>
            <input type="text" class="form-control" name="namap" value="">
            <input type="hidden" name="proses" value="pengunjung_masuk_b">
          </div>
          <button type="submit" class="col-lg-offset-9 btn btn-success">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#panggota3">Pengunjung Keluar</a></li>
      </ul>
      <div class="tab-content">
        <div id="panggota3" class="tab-pane in active panel-body">
          <?php //echo form_open('aplikasi/proses_pengunjung_masuk','class="form-horizontal"')?>
          <form class="" action="pengunjung.php" method="post">
            <label class="control-label" for="nama">No Daftar:</label>
              <div class="form-group">
              <select name="nop" class="form-control" id="sel1">
                <?php
                $query="select nopendaftaran,nama from anggota";
                $eksekusi=$db->query($query);
                while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
                  echo "<option>".$data['nopendaftaran']; ?> <?php echo $data['nama']."</option>";
                }
                ?>
              </select>
              </div>
          <input type="hidden" class="col-lg-offset-9 btn btn-default" name="proses" value="pengunjung_keluar">
          <button type="submit" class="col-lg-offset-9 btn btn-danger">Keluar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


  <table class="table table-bordered">
    <tr>
      <td>NO</td>
      <td>Nama Penunjung</td>
      <td>No. Pendaftaran </td>
      <td>Kelas</td>
      <td>Masuk</td>
      <td>Keluar</td>
      <td>
        <?php //form_open('aplikasi/proses_pengunjung_keluar_semua','class="form-horizontal"')?>
        <form class="" action="pengunjung.php" method="post">
        <input type="hidden" name="proses" value="pengunjung_keluar_semua">
        <button type=submit class=btn btn-default>Keluar Semua</button>
        </form></td>
    <tr/>
    <?php
    // $query="select * from pengunjung";
    $query="SELECT idpeng,namap,a.nopendaftaran,k.kelas,masuk,keluar FROM anggota a,pengunjung p,kelas k where masuk is not null and a.idkelas=k.idkelas and a.nopendaftaran=p.nopendaftaran";
    $eksekusi=$db->query($query);
    //while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
    while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
      <td><?php echo $data['idpeng']; ?></td>
      <td><?php echo $data['namap']; ?></td>
      <td><?php echo $data['nopendaftaran']; ?></td>
      <td><?php echo $data['kelas']; ?></td>
      <td><?php echo $data['masuk']; ?></td>
      <td><?php echo $data['keluar']; ?></td>
      <td>
        <form class="" action="pengunjung.php" method="post">
        <input type="hidden" name="proses" value="pengunjung_keluar">
        <input type="hidden" name="idpeng" value="<?php echo $data['idpeng']; ?>">
        <!--<input name="nop" value="" style=display:none;>-->
        <button type="submit" class="btn btn-default">Kaluar</button>
        </form>
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
<!-- </div> -->
