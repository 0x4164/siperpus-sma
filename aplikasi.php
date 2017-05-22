<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->

<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
// if ( $this->session->userdata('userid') and
// 	 $this->session->userdata('pass') ) {
// if ( $this->session->userdata('userid') and
// 	 $this->session->userdata('pass') ) {

?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> SIPERPUS <?php echo ucwords("- ".$page);?></title>
	<link href="<?php echo site_url('assets/css/style.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/337/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<script src="<?php echo site_url('assets/js/jquery.js'); ?>"></script>
	<script>
		$(document).on("click", ".open-AddBookDialog", function () {
			 var myBookId = $(this).data('id');
			 $(".modal-body #bookId").val( myBookId );
		});
	</script>
	<script src="<?php echo site_url('assets/337/js/bootstrap.min.js'); ?>"></script>
  </head>
  <body>
    <header class="container">
		<div class="header judul">
			<a href="<?php echo base_url('aplikasi/home'); ?>"><h1>SIPERPUS</h1></a>
			<p>Sistem Informasi Perpustakaan SMAN 1 Batu</p>
		</div>
		<div class="header keterangan">
			<span class="header-waktu">9:39 PM Selasa, 22 November 2016</span><br><br>
			<span class="header-selamat">Selamat datang Admin</span>
			<a href="<?php echo base_url('aplikasi/logout')?>" class="btn btn-logout">Logout</a>
		</div>
		<div class="clear"></div>
    </header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
					<a class="navbar-brand" href="#">Menu</a>
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo base_url('aplikasi/home'); ?>">Home</a></li>
						<li class=""><a href="<?php echo base_url('aplikasi/pengunjung'); ?>">Pengunjung</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaksi
						<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('aplikasi/peminjaman'); ?>">Peminjaman</a></li>
								<li><a href="<?php echo base_url('aplikasi/daftarpeminjam'); ?>">Daftar Peminjam</a></li>
							</ul>
						</li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Anggota
						<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('aplikasi/pendaftaran_anggota'); ?>">pendaftaran</a></li>
								<li><a href="<?php echo base_url('aplikasi/daftar_anggota')?>">kelola</a></li>
							</ul>
						</li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Kepustakaan
						<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('aplikasi/favorit_pustaka'); ?>">Favorit </a></li>
								<li><a href="<?php echo base_url('aplikasi/kelola_pustaka')?>">Kelola </a></li>
								<li><a href="<?php echo base_url('aplikasi/tambah_datapustaka')?>">Tambah Data</a></li>
							</ul>
						</li>
					</ul>
			  </div>
			</nav>
    <main>
		<div class="container">
        <div class="row">


 <?php if ((isset($page)) and ($page == 'kalkulator')) { ?>
	<legend>Kalkulator</legend>
	<?php echo form_open('aplikasi/kalkulator','class="form-horizontal"')?>
	<input type="text" name="angka1" placeholder="Angka 1"/> <br/><br/>
	<input type="text" name="angka2" placeholder="Angka 2"/> <br/><br/>
		<select name="pilih-hitung">
		<option value="+">+</option>
		<option value="-">-</option>
		<option value="*">*</option>
		<option value="/">/</option>
	</select><br/><br/>
	<button type="submit" name="Hitung" class="btn btn-primary"><i class="icon-ok icon-white"></i> Hitung</button>
	</form>

	<?php if (isset($hasil_hitung)) { ?>
	<hr/>
	<h3> Hasil perhitungan </h3>
	<h4>
	<?php echo $angka1." $pilih_hitung ".$angka2." = ".$hasil_hitung?>
	</h4>
	<?php }
} else if ((isset($page)) and ($page == 'home')) { ?>

	<legend>Pilih Menu untuk mulai</legend>

<?php
// }if ((isset($page)) and ($page == 'pengunjung')) {
}if ($_GET['hal']=='peng') {
	?>

	<legend>Pengunjung</legend>

	<div class="container-fluid">
		<div class="col-lg-4">
			<div class="panel panel-default">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#panggota1">Anggota</a></li>
				  <li><a data-toggle="tab" href="#pnonanggota1">Non Anggota</a></li>
				</ul>
				<div class="tab-content">
					<div id="panggota1" class="tab-pane in active panel-body">
						<h4>Cari Pengunjung - Anggota</h4></br>
						<?php echo form_open('aplikasi/cari_pengunjunga','class="form-horizontal"')?>
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">No Daftar:</label>
							<div class="col-sm-10">
								<select name="nop" class="form-control" id="sel1">
									<?php	foreach ($loadanggota as $r){
										echo "<option>".$r->nopendaftaran."</option>";
										}
									?>
								</select>
								</div>
						</div>
						<button type="submit" class="col-lg-offset-9 btn btn-default">Cari</button>
						</form>
					</div>
					<div id="pnonanggota1" class="tab-pane panel-body">
						<h4>Cari Pengunjung - Non Anggota</h4></br>
						<?php echo form_open('aplikasi/cari_pengunjungb','class="form-horizontal"')?>
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama:</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="namap" placeholder="NamaPengunjung">
							</div>
						</div>
						<button type="submit" class="col-lg-offset-9 btn btn-default">Cari</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="panel panel-default">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#panggota2">Anggota</a></li>
				  <li><a data-toggle="tab" href="#pnonanggota2">Non Anggota</a></li>
				</ul>
				<div class="tab-content">
					<div id="panggota2" class="tab-pane in active panel-body">
						<h4>Pengunjung Masuk - Anggota</h4></br>
						<?php echo form_open('aplikasi/proses_pengunjung_masuk','class="form-horizontal"')?>
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">No Daftar:</label>
							<div class="col-sm-10">
								<select name="nop" class="form-control" id="sel1">
									<?php	foreach ($loadanggota as $r){
										echo "<option>".$r->nopendaftaran."</option>";
										}
									?>
								</select>
								</div>
						</div>
						<button type="submit" class="col-lg-offset-9 btn btn-default">Masuk</button>
						</form>
					</div>
					<div id="pnonanggota2" class="tab-pane panel-body">
						<h4>Pengunjung Masuk - Non Anggota</h4></br>
						<?php echo form_open('aplikasi/proses_pengunjung_masukb','class="form-horizontal"')?>
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama:</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="namap" placeholder="NamaPengunjung">
							</div>
						</div>
						<button type="submit" class="col-lg-offset-9 btn btn-default">Masuk</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-default">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#panggota3">Anggota</a></li>
				  <li><a data-toggle="tab" href="#pnonanggota3">Non Anggota</a></li>
				</ul>
				<div class="tab-content">
					<div id="panggota3" class="tab-pane in active panel-body">
						<h4>Pengunjung Keluar - Anggota</h4></br>
						<?php echo form_open('aplikasi/proses_pengunjung_masuk','class="form-horizontal"')?>
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">No Daftar:</label>
							<div class="col-sm-10">
								<select name="nop" class="form-control" id="sel1">
									<?php	foreach ($loadanggota as $r){
										echo "<option>".$r->nopendaftaran."</option>";
										}
									?>
								</select>
								</div>
						</div>
						<button type="submit" class="col-lg-offset-9 btn btn-default">Keluar</button>
						</form>
					</div>
					<div id="pnonanggota3" class="tab-pane panel-body">
						<h4>Pengunjung Keluar - Non Anggota</h4></br>
						<?php echo form_open('aplikasi/proses_pengunjung_masuk','class="form-horizontal"')?>
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama:</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="namap" placeholder="NamaPengunjung">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="sel1">Kelas:</label>
								<div class="col-sm-10">
								<select name="kelasp" class="form-control" id="sel1">
									<?php	foreach ($loadkelas as $r){
										echo "<option>".$r->idkelas." ".$r->kelas."</option>";
										}
									?>
								</select>
								</div>
						</div>
						<button type="submit" class="col-lg-offset-9 btn btn-default">Keluar</button>
						</form>
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
				<td><?php form_open('aplikasi/proses_pengunjung_keluar_semua','class="form-horizontal"')?>
					<input name=nop value="" style=display:none;><button type=submit class=btn btn-default>Keluar Semua</button>
					</form></td>
			<tr/>
			<?php	foreach ($daftar_peng as $r){
				$nop=$r->nopendaftaran;
				$idpeng=$r->idpeng;
				echo "<tr><td>".$r->idpeng."</td>
							  <td>".$r->namap."</td>
							  <td>".$r->nopendaftaran."</td>
							  <td>".$r->kelas."</td>
							  <td>".$r->masuk."</td>
							  <td>".$r->keluar."</td>
							  <td>".form_open('aplikasi/proses_pengunjung_keluar','class="form-horizontal"')."
							  <input name=idpeng value=".$r->idpeng." style=display:none;><button type=submit class=btn btn-default>","Keluar","</button>
								</form></td>
						  <tr/>";
				}
			?>
		</table>
	</div>
<?php
} else if ((isset($page)) and ($page == 'peminjaman')) { ?>
	<legend>Peminjaman</legend>
		<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-default">
				<div class="panel-body">
				<h4>Peminjaman</h4>
				<?php echo form_open('aplikasi/proses_tambah_peminjaman','class="form-horizontal"')?>
				<table class="table table-bordered">
					<tr><td>Kode Pinjam </td><td>: <input type="text" name="kodepinjam" placeholder="Kodepinjam" value="<?php echo $next->kpinjam ?>" disabled/></td> </tr>
					<tr><td>No. Pendaftaran </td><td>
						<div class="col-lg-4">
							<select name="nopendaftaran" class="form-control" id="sel1">
									<?php	foreach ($loadanggota as $r){
										echo "<option>".$r->nopendaftaran."</option>";
									}
								?>
							</select>
						</div>
					</td> </tr>
					<tr><td>Induk Buku </td><td>: <input type="text" name="indukbuku" placeholder="Induk Buku"/></td> </tr>
					<tr><td>Tanggal Peminjaman </td><td>: <input type="text" name="tanggalpeminjaman" placeholder="TanggalPeminjaman" value="<?php echo substr($t->now,0,10) ?>" disabled/></td> </tr>
					<tr><td>Batas Pengembalian </td><td>: <input type="text" name="bataskembali" placeholder="BatasPengembalian" value="<?php echo substr($b->batas,0,10) ?>" disabled/></td> </tr>
					<tr><td>Tanggal Pengembalian </td><td>: <input type="text" name="tanggalkembali" placeholder="TanggalPengembalian" disabled/></td> </tr>
					<tr><td></td><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i>Pinjamkan</button></td> </tr>
				</table>
				</form>
				</div>
				</div>
			</div>
			<div class="col-lg-8">
			<table class="table table-bordered">
				<tr><td>Kode Pinjam </td>
					<td>No. Pendaftaran </td>
					<td>Induk Buku </td>
					<td>Tanggal Peminjaman</td>
					<td>Batas Pengembalian</td>
					<td>Tanggal Pengembalian</td>
					<td>Selesai</td>
					<td>Kembalikan</td>
				<tr/>
				<?php	foreach ($daftar_pinjam as $r)
					{	echo "<tr>
								  <td>".$r->kodepinjam."</td>
								  <td>".$r->nopendaftaran."</td>
								  <td>".$r->indukbuku."</td>
								  <td>".$r->tanggalpinjam."</td>
								  <td>".$r->bataskembali."</td>
								  <td>".$r->tanggalkembali."</td>
								  <td>".$r->selesai."</td>
								  <td>".form_open('aplikasi/proses_pengembalianb','class="form-horizontal"')."
							  <input name=kodepinjam value=".$r->kodepinjam." style=display:none;><button type=submit class=btn btn-default>","Kembalikan","</button>
								</form></td>
							  <tr/>";
					}
				?>
			</table>
		</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-default">
				<div class="panel-body">
				<h4>Pengembalian</h4>
				<?php echo form_open('aplikasi/proses_pengembalian','class="form-horizontal"')?>
				<table class="table table-bordered">
					<tr><td>No. Pendaftaran </td><td>
						<div class="col-lg-4">
							<select name="nopendaftaran" class="form-control" id="sel1">
									<?php	foreach ($loadanggota as $r){
										echo "<option>".$r->nopendaftaran."</option>";
									}
								?>
							</select>
						</div>
					</td> </tr>
					<tr><td>Induk Buku </td><td>: <input type="text" name="indukbuku" placeholder="Induk Buku"/></td> </tr>
					<tr><td></td><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i>Kembalikan</button></td> </tr>
				</table>
				</form>
				</div>
				</div>
			</div>
		</div>
		</div>
<?php
} else if ((isset($page)) and ($page == 'daftarpeminjam')) {?>

	<legend>Daftar Peminjam</legend>
	<div class="container">
		<div class="col-lg-12">
			<table class="table table-bordered">
				<tr><td>Kode Pinjam </td>
					<td>No. Pendaftaran </td>
					<td>Induk Buku </td>
					<td>Tanggal Peminjaman</td>
					<td>Batas Pengembalian</td>
					<td>Tanggal Pengembalian</td>
					<td>Selesai</td>
				<tr/>
				<?php	foreach ($daftar_pinjam as $r)
					{	echo "<tr>
								  <td>".$r->kodepinjam."</td>
								  <td>".$r->nopendaftaran."</td>
								  <td>".$r->indukbuku."</td>
								  <td>".$r->tanggalpinjam."</td>
								  <td>".$r->bataskembali."</td>
								  <td>".$r->tanggalkembali."</td>
								  <td>".$r->selesai."</td>
							  <tr/>";
					}
				?>
			</table>
		</div>
	</div>
<?php
} else if ((isset($page)) and ($page == 'pendaftaran_anggota')) { ?>

	<legend>Pendaftaran Anggota</legend>
	<?php echo form_open('aplikasi/proses_tambah_anggota','class="form-horizontal"')?>
	<table class="table table-bordered">
		<tr><td>No. Pendaftaran /induk</td><td>: <input type="text" name="nopendaftaran" placeholder="No. Pendaftaran"/></td> </tr>
		<tr><td>Nama </td><td>: <input type="text" name="nama" placeholder="Nama"/></td> </tr>
		<tr><td>Alamat </td><td>: <input type="text" name="alamat" placeholder="Alamat"/></td> </tr>
		<tr><td>ID. Propinsi </td><td>:
			<div class="col-sm-10">
				<select name="idprovinsi" class="form-control" id="sel1">
					<?php	foreach ($loadprovinsi as $r){
						echo "<option>".$r->idprovinsi." ".$r->provinsi."</option>";
						}
					?>
				</select>
			</div></td>
		</tr>
		<tr><td>ID. Kota </td><td>:
			<div class="col-sm-10">
				<select name="idkota" class="form-control" id="sel1">
					<?php	foreach ($loadkota as $r){
						echo "<option>".$r->idkota." ".$r->idprovinsi." ".$r->kota."</option>";
						}
					?>
				</select>
			</div></td>
		</tr>
		<tr><td>Jenis Kelamin </td><td>:
			<div class="col-sm-10">
				<select name="jeniskelamin" class="form-control" id="sel1">
					<option>L</option>
					<option>P</option>
				</select>
			</div>
		</td>
		</tr>
		<tr><td>Kelas</td><td>:
			<div class="col-sm-10">
				<select name="idkelas" class="form-control" id="sel1">
					<?php	foreach ($loadkelas as $r){
						echo "<option>".$r->idkelas." ".$r->kelas."</option>";
						}
					?>
				</select>
			</div>
		</td> </tr>
		<tr><td>Tempat Lahir </td><td>: <input type="text" name="tempatlahir" placeholder="Tempat Lahir"/></td> </tr>
		<tr><td>Tanggal Lahir </td><td>: <input type="text" name="tanggallahir" value="1997-12-10" placeholder="contoh : 1997-12-10"/><input type="text" class="datepicker">
			<script>
				$(function(){
				$('.datepicker').datepicker({
					format: 'mm-dd-yyyy'
					});
				});
			</script>
		</td> </tr>
		<tr><td>No Telepon </td><td>: <input type="text" name="notelepon" placeholder="max 12 digit"/></td> </tr>
		<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
	</table>
	</form>

<?php
}  else if ((isset($page)) and ($page == 'ubah_anggota')) { ?>
	<legend>Ubah Anggota</legend>
	<?php echo form_open('aplikasi/proses_ubah_anggota','class="form-horizontal"')?>
	<input type="hidden" name="nopendaftaran" value="<?php echo $agt->nopendaftaran ?>">
	<table class="table table-bordered">
		<tr><td>No.Pendaftaran /induk</td><td>: <input type="text" name="nopendaftaran" value="<?php echo $agt->nopendaftaran ?>" disabled/> </td> </tr>
		<tr><td>Nama </td><td>: <input type="text" name="nama" value="<?php echo $agt->nama ?>"/></td> </tr>
		<tr><td>Alamat </td><td>: <input type="text" name="alamat" value="<?php echo $agt->alamat ?>"/></td> </tr>
		<tr><td>ID. Propinsi </td><td>: <input type="text" name="idprovinsi" value="<?php echo $agt->idprovinsi ?>"/></td> </tr>
		<tr><td>ID. Kota </td><td>: <input type="text" name="idkota" value="<?php echo $agt->idkota ?>"/></td> </tr>
		<tr><td>Jenis Kelamin </td><td>: <input type="text" name="jeniskelamin" value="<?php echo $agt->jeniskelamin ?>"/></td> </tr>
		<tr><td>Kelas </td><td>: <input type="text" name="kelas" value="<?php echo $agt->idkelas ?>"/>
			<div class="col-sm-10">
				<select name="idkelas" class="form-control" id="sel1">
					<?php	foreach ($loadkelas as $r){
						echo "<option>".$r->idkelas." ".$r->kelas."</option>";
						}
					?>
				</select>
			</div></td></tr>
		<tr><td>Tempat Lahir </td><td>: <input type="text" name="tempatlahir" value="<?php echo $agt->tempatlahir ?>"/></td> </tr>
		<tr><td>Tanggal Lahir </td><td>: <input type="text" name="tanggallahir" value="<?php echo $agt->tanggallahir ?>"/></td> </tr>
		<tr><td>No Telepon </td><td>: <input type="text" name="notelepon" value="<?php echo $agt->notelepon ?>"/></td> </tr>
		<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
	</table>
	</form>
<?php
// menghapus variabel dari memory
unset($mhs);
} else if ((isset($page)) and ($page == 'daftar_anggota')) { ?>
	<legend>Daftar Anggota</legend>
		<div class="col-lg-12 col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					<h4>Cari Anggota</h4>
					<form class="form-inline" role="form">
					<div class="form-group">
						<label class="control-label col-sm-2" for="namap">Nama:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="namap" placeholder="NamaAnggota">
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-sm-2" for="sel1">Kelas:</label>
						<div class="col-sm-10">
						<select name="kelasp" class="form-control" id="sel1">
							<?php	foreach ($loadkelas as $r){
								echo "<option>".$r->kelas."</option>";
								}
							?>
						</select>
						</div>
				</div>
					<div class="form-group">
						<div class="col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
						</div>

					</div>

				</div>
			</div>
			<table class="table table-bordered">
				<tr><td>nopendaftaran/noinduk</td>
					<td>nama</td>
					<td>alamat</td>
					<td>idprovinsi</td>
					<td>idkota</td>
					<td>JK</td>
					<td>idKelas</td>
					<td>tempatlahir</td>
					<td>tanggallahir</td>
					<td>notelepon</td>
					<td>Edit</td>
					<td>Hapus</td>
				<tr/>
				<?php	foreach ($daftar_agt as $r)
					{	echo "<tr><td>".$r->nopendaftaran."</td>
								  <td>".$r->nama."</td>
								  <td>".$r->alamat."</td>
								  <td>".$r->idprovinsi."</td>
								  <td>".$r->idkota."</td>
								  <td>".$r->jeniskelamin."</td>
								  <td>".$r->idkelas."</td>
								  <td>".$r->tempatlahir."</td>
								  <td>".$r->tanggallahir."</td>
								  <td>".$r->notelepon."</td>
								  <td><a href='".base_url('aplikasi/ubah_anggota/'.$r->nopendaftaran)."'><i class='icon-edit'></i> Ubah</a></td>
								  <td><a href='".base_url('aplikasi/hapus_anggota/'.$r->nopendaftaran)."'  onClick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i> Hapus</a></td>
							  <tr/>";
					}
				?>
			</table>
			<br/>
		</div>

<?php
// menghapus variabel dari memory
unset($daftar_mhs,$r);
} else if ((isset($page)) and ($page == 'daftar_pustaka')) { ?>
	<legend>Daftar Pustaka</legend>
	<div class="">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Cari Pustaka</h4></br>
				<form class="form-inline" role="form" <?php echo form_open('aplikasi/kelola_pustakacari','class="form-horizontal"')?>>
				  <div class="form-group">
					<label for="text">Cari Pustaka</label>
					<input name="judulbuku" type="text" class="form-control" id="cpustaka">
				  </div>
				  <div class="form-group">
					<button type="submit" class="col-lg-offset-10 btn btn-default">Submit</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<tr><td>ID</td>
			<td>Judul</td>
			<td>ID Penulis</td>
			<td>Edisi</td>
			<td>ID Rak</td>
			<td>Kode Katalog</td>
			<td>ISBN</td>
			<td> </td>
			<td> </td>
		<tr/>
		<?php	foreach ($daftar_pustaka as $r){
			echo "<tr><td>".$r->id."</td>
					<td><a href='".base_url('aplikasi/detail_pustaka/'.$r->id)."'>".$r->judul."</a></td>
					<td>".$r->idpenulis."</td>
					<td>".$r->edisi."</td>
					<td>".$r->idrak."</td>
					<td>".$r->kodekatalog."</td>
					<td>".$r->isbn."</td>
					<td><a href='".base_url('aplikasi/ubah_pustaka/'.$r->id)."'><i class='icon-edit'></i> Ubah</a></td>
					<td><a href='".base_url('aplikasi/hapus_pustaka/'.$r->id)."'  onClick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i> Hapus</a></td>
					<tr/>";
			}
		?>
	</table>
	<br/>
<?php
// menghapus variabel dari memory
unset($daftar_mhs,$r);
} else if ((isset($page)) and ($page == 'detail_pustaka')) { ?>
	<legend>Detail Pustaka</legend>
		<div class="container">
		<div class="col-lg-4">
			<table >
				<tr><td>".$r->idpenulis."</td></tr>
				<tr><td>".$r->edisi."</td></tr>
				<tr><td>".$r->idrak."</td></tr>
				<tr><td>".$r->kodekatalog."</td></tr>
				<tr><td>".$r->isbn."</td></tr>
			</table>
		</div>
		<div class="col-lg-8">
		<table class="table table-bordered">
			<tr><td>indukbuku</td>
				<td>idjudul</td>
				<td>tersedia</td>
				<td> </td>
				<td> </td>
			<tr/>
			<?php	foreach ($ketersediaan as $r){
					echo "<tr><td>".$r->indukbuku."</td>
							<td>".$r->id."</a></td>
							<td>".$r->tersedia."</td>
							<td> </td>
							<td> </td>
						<tr/>";
				}
			?>
		</table>
		</div>
	</div>
<?php
// menghapus variabel dari memory
unset($r);
} else if ((isset($page)) and ($page == 'ubah_pustaka')) { ?>
	<legend>Ubah Pustaka</legend>
	<?php echo form_open('aplikasi/proses_ubah_pustaka','class="form-horizontal"')?>
	<input type="hidden" name="id" value="<?php echo $agt->id ?>">
	<table class="table table-bordered">
		<tr><td>ID</td><td>: <input type="text" name="id" value="<?php echo $agt->id ?>" disabled/> </td> </tr>
		<tr><td>Judul </td><td>: <input type="text" name="judul" value="<?php echo $agt->judul ?>"/></td> </tr>
		<tr><td>idpenulis</td><td>: <input type="text" name="idpenulis" value="<?php echo $agt->idpenulis ?>"/></td> </tr>
		<tr><td>Edisi</td><td>: <input type="text" name="edisi" value="<?php echo $agt->edisi ?>"/></td> </tr>
		<tr><td>idrak</td><td>: <input type="text" name="idrak" value="<?php echo $agt->idrak ?>"/></td> </tr>
		<tr><td>kodekatalog</td><td>: <input type="text" name="kodekatalog" value="<?php echo $agt->kodekatalog ?>"/></td> </tr>
		<tr><td>isbn </td><td>: <input type="text" name="isbn" value="<?php echo $agt->isbn ?>"/></td> </tr>
		<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
	</table>
	</form>
<?php
// menghapus variabel dari memory
unset($agt);
} else if ((isset($page)) and ($page == 'favorit_pustaka')) { ?>
	<legend>Pustaka Favorit</legend>
	<div class="">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Cari Pustaka</h4></br>
				<form class="form-inline" role="form" <?php echo form_open('aplikasi/favorit_pustakacari','class="form-horizontal"')?>>
				  <div class="form-group">
					<label for="text">Cari Pustaka</label>
					<input name="cari" type="text" class="form-control" id="cpustaka">
				  </div>
				  <div class="form-group">
					<button type="submit" class="col-lg-offset-10 btn btn-default">Submit</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<tr><td>ID Favorit</td>
			<td>Judul</td>
			<td>ID Penulis</td>
			<td>ID Rak</td>
			<td>ID USER</td>
		<tr/>
		<?php	foreach ($daftar_pustakafavorit as $r)
			{	echo "<tr><td>".$r->idfav."</td>
						  <td>".$r->judul."</td>
						  <td>".$r->idpenulis."</td>
						  <td>".$r->idrak."</td>
						  <td>".$r->iduser."</td>
						  <td><a href='".base_url('aplikasi/ubah_anggota/'.$r->id)."'><i class='icon-edit'></i> Ubah</a></td>
						  <td><a href='".base_url('aplikasi/hapus_anggota/'.$r->id)."'  onClick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i> Hapus</a></td>
					  <tr/>";
			}
		?>
	</table>
	<br/>

<?php
// menghapus variabel dari memory
unset($daftar_pustakafavorit,$r);
} else if ((isset($page)) and ($page == 'tambah_datapustaka')) { ?>

	<legend>Tambah Data Pustaka</legend>
	<div class="col-lg-12">
			<div class="panel panel-default">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#tambahjudul">Tambah Judul</a></li>
				  <li><a data-toggle="tab" href="#tambahpenulis">Tambah Penulis</a></li>
				  <li><a data-toggle="tab" href="#tambahpenerbit">Tambah Penerbit</a></li>
				  <li><a data-toggle="tab" href="#tambahrak">Tambah Rak/Topik</a></li>
				  <li><a data-toggle="tab" href="#pnonanggota1">Tambah...</a></li>
				</ul>
				<div class="tab-content">
					<div id="tambahjudul" class="tab-pane in active panel-body">
						<h4>Tambah Judul</h4></br>
						<div class="col-lg-4">
						<?php echo form_open('aplikasi/proses_tambah_pustaka','class="form-horizontal"')?>
						<table class="table table-bordered">
							<tr><td>Judul </td><td>: <input type="text" name="judul" placeholder="Judul"/></td>
							<tr><td>ID Penulis </td><td>
								<div class="col-sm-10">
								<select name="idpenulis" class="form-control" id="sel1">
									<?php	foreach ($daftar_penulis as $r){
										echo "<option>".$r->idpenulis."</option>";
										}
									?>
								</select>
								</div></td>
							</tr>
							<tr><td>Edisi </td><td>: <input type="text" name="edisi" placeholder="Edisi"/></td> </tr>
							<tr><td>ID Rak </td><td>
								<div class="col-sm-10">
								<select name="idrak" class="form-control" id="sel1">
									<?php	foreach ($daftar_rak as $r){
										echo "<option>".$r->idrak."</option>";
										}
									?>
									<option>a</option>
								</select>
								</div></td>
							</tr>
							<tr><td>Kode Katalog </td><td>: <input type="text" name="kodekatalog" placeholder="Kode Katalog"/></td> </tr>
							<tr><td>ISBN </td><td>: <input type="text" name="isbn" placeholder="ISBN"/></td> </tr>
							<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
						</table>
						</form>
						</div>
					</div>
					<div id="tambahpenulis" class="tab-pane panel-body">
						<h4>Tambah Penulis</h4></br>
						<div class="col-lg-4">
						<?php echo form_open('aplikasi/proses_tambah_penulis','class="form-horizontal"')?>
						<table class="table table-bordered">
							<tr><td>ID Penulis </td><td>: <input type="text" name="idpenulis" placeholder="ID Penulis"/></td> </tr>
							<tr><td>Nama </td><td>: <input type="text" name="nama" placeholder="Nama Penulis"/></td> </tr>
							<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
						</table>
						</form>
						</div>
						<div class="col-lg-8">
							<table class="table table-bordered">
								<tr><td>Id Penulis</td>
									<td>Nama Penulis</td>
									<td> </td>
									<td> </td>
								<tr/>
								<?php	foreach ($daftar_penulis as $r){
										echo "<tr><td>".$r->idpenulis."</td>
												<td>".$r->nama."</a></td>
												<td><a href='".base_url('aplikasi/ubah_penulis/'.$r->idpenulis)."'><i class='icon-edit'></i> Ubah</a></td>
					<td><a href='".base_url('aplikasi/hapus_penulis/'.$r->idpenulis)."'  onClick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i> Hapus</a></td>
											<tr/>";
									}
								?>
							</table>
						</div>
					</div>
					<div id="tambahpenerbit" class="tab-pane panel-body">
						<h4>Tambah Penerbit</h4></br>
						<div class="col-lg-4">
						<?php echo form_open('aplikasi/proses_tambah_penerbit','class="form-horizontal"')?>
						<table class="table table-bordered">
							<tr><td>ID Penerbit </td><td>: <input type="text" name="idpenerbit" placeholder="ID Penerbit"/></td> </tr>
							<tr><td>Nama </td><td>: <input type="text" name="nama" placeholder="Nama Penerbit"/></td> </tr>
							<tr><td>No.Telepon </td><td>: <input type="text" name="notelepon" placeholder="No Telepon"/></td> </tr>
							<tr><td>Alamat </td><td>: <input type="text" name="alamat" placeholder="Alamat"/></td> </tr>
							<tr><td>Email</td><td>: <input type="text" name="email" placeholder="Nama Penulis"/></td> </tr>
							<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
						</table>
						</form>
						</div>
						<div class="col-lg-8">
							<table class="table table-bordered">
								<tr><td>Id Penerbit</td>
									<td>Nama Penerbit</td>
									<td>No. Telepon</td>
									<td>Alamat</td>
									<td>Email</td>
									<td> </td>
									<td> </td>
								<tr/>
								<?php	foreach ($daftar_penerbit as $r){
										echo "<tr><td>".$r->idpenerbit."</td>
												<td>".$r->nama."</a></td>
												<td>".$r->notelepon."</a></td>
												<td>".$r->alamat."</a></td>
												<td>".$r->email."</a></td>
												<td><a href='".base_url('aplikasi/ubah_penerbit/'.$r->idpenerbit)."'><i class='icon-edit'></i> Ubah</a></td>
					<td><a href='".base_url('aplikasi/hapus_penerbit/'.$r->idpenerbit)."'  onClick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i> Hapus</a></td>
											<tr/>";
									}
								?>
							</table>
						</div>
					</div>
					<div id="tambahrak" class="tab-pane panel-body">
						<h4>Tambah Rak</h4></br>
						<div class="col-lg-4">
						<?php echo form_open('aplikasi/proses_tambah_rak','class="form-horizontal"')?>
						<table class="table table-bordered">
							<tr><td>ID Rak </td><td>: <input type="text" name="idrak" placeholder="ID Rak"/></td> </tr>
							<tr><td>Lokasi </td><td>: <input type="text" name="lokasi" placeholder="Nama Penerbit"/></td> </tr>
							<tr><td>Topik</td><td>: <input type="text" name="topik" placeholder="No Telepon"/></td> </tr>
							<tr><td>Deskripsi</td><td>: <input type="text" name="deskripsi" placeholder="Alamat"/></td> </tr>
							<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
						</table>
						</form>
						</div>
						<div class="col-lg-8">
							<table class="table table-bordered">
								<tr><td>Id Rak</td>
									<td>Lokasi</td>
									<td>Topik</td>
									<td>Deskripsi</td>
									<td> </td>
									<td> </td>
								<tr/>
								<?php	foreach ($daftar_rak as $r){
										echo "<tr><td>".$r->idrak."</td>
												<td>".$r->lokasi."</a></td>
												<td>".$r->topik."</a></td>
												<td>".$r->deskripsi."</a></td>
												<td><a href='".base_url('aplikasi/ubah_rak/'.$r->idrak)."'><i class='icon-edit'></i> Ubah</a></td>
					<td><a href='".base_url('aplikasi/hapus_rak/'.$r->idrak)."'  onClick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i> Hapus</a></td>
											<tr/>";
									}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
} else if ((isset($page)) and ($page == 'ubah_penulis')) { ?>
	<legend>Ubah Pustaka</legend>
	<?php echo form_open('aplikasi/proses_ubah_penulis','class="form-horizontal"')?>
	<input type="hidden" name="idpenulis" value="<?php echo $agt->idpenulis ?>">
	<table class="table table-bordered">
		<tr><td>ID Penulis </td><td>: <input type="text" name="idpenulis" value="<?php echo $agt->idpenulis ?>"/></td> </tr>
		<tr><td>Nama </td><td>: <input type="text" name="nama" value="<?php echo $agt->nama ?>"/></td> </tr>
		<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
	</table>
	</form>
<?php
// menghapus variabel dari memory
unset($agt);
} else if ((isset($page)) and ($page == 'ubah_penerbit')) { ?>
	<legend>Ubah Pustaka</legend>
	<?php echo form_open('aplikasi/proses_ubah_penerbit','class="form-horizontal"')?>
	<input type="hidden" name="idpenerbit" value="<?php echo $agt->idpenerbit ?>">
	<table class="table table-bordered">
		<tr><td>ID Penerbit </td><td>: <input type="text" name="idpenerbit" value="<?php echo $agt->idpenerbit ?>"/></td> </tr>
		<tr><td>Nama </td><td>: <input type="text" name="nama" value="<?php echo $agt->nama ?>"/></td> </tr>
		<tr><td>No.Telepon </td><td>: <input type="text" name="notelepon" value="<?php echo $agt->notelepon ?>"/></td> </tr>
		<tr><td>Alamat </td><td>: <input type="text" name="alamat" value="<?php echo $agt->alamat ?>"/></td> </tr>
		<tr><td>Email</td><td>: <input type="text" name="email" value="<?php echo $agt->email ?>"/></td> </tr>
		<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
	</table>
	</form>
<?php
// menghapus variabel dari memory
unset($agt);
} else if ((isset($page)) and ($page == 'ubah_rak')) { ?>
	<legend>Ubah Pustaka</legend>
	<?php echo form_open('aplikasi/proses_ubah_rak','class="form-horizontal"')?>
	<input type="hidden" name="idrak" value="<?php echo $agt->idrak ?>">
	<table class="table table-bordered">
		<tr><td>ID Rak </td><td>: <input type="text" name="idrak" value="<?php echo $agt->idrak ?>"/></td> </tr>
		<tr><td>Lokasi </td><td>: <input type="text" name="lokasi" value="<?php echo $agt->lokasi ?>"/></td> </tr>
		<tr><td>Topik</td><td>: <input type="text" name="topik" value="<?php echo $agt->topik ?>"/></td> </tr>
		<tr><td>Deskripsi</td><td>: <input type="text" name="deskripsi" value="<?php echo $agt->deskripsi ?>"/></td> </tr>
		<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>
	</table>
	</form>
<?php
// menghapus variabel dari memory
unset($agt);
// } else { // home
?>
	          <div class="col-9">
            <div class="container-fluid">
              <h3 class="text-center">Silakan pilih menu untuk memulai...</h3>
            </div>
          </div>
<?php
}
?>
          <div class="clear"></div>
      </div>
    </main>

      <footer>
        <div class="container">
          <p class="text-center">

        </p>
        </div>
      </footer>
  </body>
</html>
<?php //} ?>
