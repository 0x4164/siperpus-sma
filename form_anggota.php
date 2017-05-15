<?php
//form anggota
session_start();
include("database.php");
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
<div class="row">
	<form name="form-pustaka" class="form" action="aksi_anggota.php" method="POST">
		<label for="nopendaftaran">Nopendaftaran</label>
		<input type="text" class="form-control" name="nopendaftaran" value="<?php if(isset($_GET['nopendaftaran'])){echo $nopendaftaran;} ?>" />
		<label for="nama">Nama:</label>
		<input type="text" class="form-control" name="nama" value="<?php if(isset($_GET['nopendaftaran'])){echo $nama;} ?>" />
		<label for="alamat">Alamat:</label>
		<input type="text" class="form-control" name="alamat" value="<?php if(isset($_GET['nopendaftaran'])){echo $alamat;} ?>" />
		<label for="idprovinsi">idprovinsi:</label>
		<input type="text" class="form-control" name="idprovinsi" value="<?php if(isset($_GET['nopendaftaran'])){echo $idprovinsi;} ?>" />
		<label for="idkota">idkota:</label>
		<input type="text" class="form-control" name="idkota" value="<?php if(isset($_GET['nopendaftaran'])){echo $idkota;} ?>" />
		<label for="jeniskelamin">jeniskelamin:</label>
		<input type="text" class="form-control" name="jeniskelamin" value="<?php if(isset($_GET['nopendaftaran'])){echo $jeniskelamin;} ?>" />
		<label for="jeniskelamin">idkelas:</label>
		<input type="text" class="form-control" name="idkelas" value="<?php if(isset($_GET['nopendaftaran'])){echo $idkelas;} ?>" />
		<label for="tempatlahir">tempatlahir:</label>
		<input type="text" class="form-control" name="tempatlahir" value="<?php if(isset($_GET['nopendaftaran'])){echo $tempatlahir;} ?>" />
		<label for="tanggallahir">tanggallahir:</label>
		<input type="text" class="form-control" name="tanggallahir" value="<?php if(isset($_GET['nopendaftaran'])){echo $tanggallahir;} ?>" />
		<label for="notelepon">notelepon:</label>
		<input type="text" class="form-control" name="notelepon" value="<?php if(isset($_GET['nopendaftaran'])){echo $notelepon;} ?>" />
		<?php
		if(isset($_GET['nopendaftaran'])){
			echo '<input type="submit" name="proses" value="Update" />';
		}else{
			echo '<input type="submit" name="proses" value="Simpan" />';
		}
		?>
	</form>
</div>
</div>
<?php
//include ("footer.php");
?>
