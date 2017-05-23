<body style="padding-top:50px;">

<?php
$page="formanggota";
//form anggota
session_start();
include_once("database.php");
include ("head-html.php");
include ("navbar.php");

if(isset($_GET['nopendaftaran']))
	{
		$nopendaftaran=$_GET['nopendaftaran'];
		$query="select * from anggota where nopendaftaran=".$nopendaftaran;
		$eksekusi=$db->prepare($query);
		$eksekusi->execute();
		$data=$eksekusi->fetch(PDO::FETCH_ASSOC);

			// $id=$data['id'];
			// $judul=$data['judul'];
			// $penulis=$data['penulis'];
			// $isbn=$data['isbn'];
			$nopendaftaran = $data['nopendaftaran'];
    	$nama=$data['nama'];
    	$alamat=$data['alamat'];
    	$idprovinsi=$data['idprovinsi'];
			$idkota=$data['idkota'];
      $jeniskelamin=$data['jeniskelamin'];
      $idkelas=$data['idkelas'];
      $tempatlahir=$data['tempatlahir'];
      $tanggallahir=$data['tanggallahir'];
      $notelepon=$data['notelepon'];
	}

?>
<div class="container">
	<h2>Tambah Data Anggota</h2>
<div class="row">
	<div class="col-lg-4 col-sm-12">
		<form name="form-anggota" class="form form-horizontal" action="aksi_anggota.php" method="POST">
			<div class="form-group"><label class="control-label col-sm-4" for="nopendaftaran">Nopendaftaran</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="nopendaftaran" value="<?php if(isset($_GET['nopendaftaran'])){echo $nopendaftaran;} ?>" />
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="nama">Nama:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="nama" value="<?php if(isset($_GET['nopendaftaran'])){echo $nama;} ?>" />
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="alamat">Alamat:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="alamat" value="<?php if(isset($_GET['nopendaftaran'])){echo $alamat;} ?>" />
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="idprovinsi">idprovinsi:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="idprovinsi" value="<?php if(isset($_GET['nopendaftaran'])){echo $idprovinsi;} ?>" disabled="true"/>
				<select class="form-control" name="sidprovinsi">
					<?php
					if(isset($_GET['nopendaftaran'])){
						echo $idprovinsi;
					}else{

					$query="select * from provinsi";
			    $eksekusi=$db->query($query);
				    while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){?>
				    	<option value="<?php echo $data['idprovinsi'];?>"><?php echo $data['idprovinsi']." ".$data['provinsi'];?></option>
				    <?php
						}
			    }
					?>
				</select>
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="idkota">idkota:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="idkota" value="<?php if(isset($_GET['nopendaftaran'])){echo $idkota;} ?>" />
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="jeniskelamin">jeniskelamin:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="jeniskelamin" value="<?php if(isset($_GET['nopendaftaran'])){echo $jeniskelamin;} ?>" />
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="jeniskelamin">idkelas:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="idkelas" value="<?php if(isset($_GET['nopendaftaran'])){echo $idkelas;} ?>" />
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="tempatlahir">tempatlahir:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="tempatlahir" value="<?php if(isset($_GET['nopendaftaran'])){echo $tempatlahir;} ?>" />
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="tanggallahir">tanggallahir:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="tanggallahir" value="<?php if(isset($_GET['nopendaftaran'])){echo $tanggallahir;} ?>" />
				</div>
			</div>
			<div class="form-group"><label class="control-label col-sm-4" for="notelepon">notelepon:</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="notelepon" value="<?php if(isset($_GET['nopendaftaran'])){echo $notelepon;} ?>" />
				</div>
			</div>
			<?php
			if(isset($_GET['nopendaftaran'])){
				echo '<input type="submit" class="form-control col-sm-3 btn btn-success" name="proses" value="Update"/>';
			}else{
				echo '<input type="submit" class="form-control col-sm-3 btn btn-success" name="proses" value="Simpan"/>';
			}
			?>
		</form>

				</div>
			</div>

				</div>
			</div>

				</div>
			</div>
<?php
//include ("footer.php");
?>
