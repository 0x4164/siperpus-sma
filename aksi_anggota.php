<?php

//aksi anggota incomplete

include("database.php");

function autosearch($db){
	//autocomplete anggota
	$keyword=$_POST['nop'];
	$query="select * from anggota where nopendaftaran like '%".$keyword."%'";
	$eksekusi=$db->query($query);
	$row_set = array();
	while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
		// $data['value']=htmlentities(stripslashes($data['nopendaftaran']));
		// $data['nopendaftaran']=(int)$data['nopendaftaran'];
		//buat array yang nantinya akan di konversi ke json
		$row_set[] = $data['nopendaftaran'];;
	}
	//data hasil query yang dikirim kembali dalam format json
	echo json_encode($row_set);
	// echo "aaa";
}

function cari_data($db){
	$keyword=$_POST['katakunci'];
	$query="select * from anggota where judul like '%".$keyword."%'";
	$eksekusi=$db->query($query);
	while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
	?>
	<tr>
		<td><?php echo $a; $a++;?></td>
		<td><?php echo $data['judul']; ?></td>
		<td><?php echo $data['penulis']; ?></td>
		<td><?php echo $data['isbn']; ?></td>
		<td><a nopendaftaran="show-form-ubah" href="form_anggota.php?nopendaftaran=<?php echo $data['nopendaftaran'] ?>">edit</a></td>
		<td><a nopendaftaran="hapus-data" href="aksi_anggota.php?nopendaftaran=<?php echo $data['nopendaftaran']."&" ?>proses=hapus">hapus</a></td>
	</tr>
	<?php
	}
	if($eksekusi){
		header("location:manajemendata.php");
	}else{
		echo "simpan gagal";;
	}
}

function simpan_data($db){
	// $judul=$_POST['judul'];
	// $penulis=$_POST['penulis'];
	// $isbn=$_POST['isbn'];
	$nopendaftaran = $_POST['nopendaftaran'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$idprovinsi=$_POST['idprovinsi'];
	$idkota=$_POST['idkota'];
	$jeniskelamin=$_POST['jeniskelamin'];
	$idkelas=$_POST['idkelas'];
	$tempatlahir=$_POST['tempatlahir'];
	$tanggallahir=$_POST['tanggallahir'];
	$notelepon=$_POST['notelepon'];

	$query="insert into anggota (nopendaftaran,nama,alamat,idprovinsi,idkota,jeniskelamin,idkelas,tempatlahir,tanggallahir,notelepon)".
	"values(:nopendaftaran,:nama,:alamat,:idprovinsi,:idkota,:jeniskelamin,:idkelas,:tempatlahir,:tanggallahir,:notelepon)";
	$stmt = $db->prepare($query);
	$stmt->bindParam(':nopendaftaran',$nopendaftaran);
	$stmt->bindParam(':nama',$nama);
	$stmt->bindParam(':alamat',$alamat);
	$stmt->bindParam(':idprovinsi',$idprovinsi);
	$stmt->bindParam(':idkota',$idkota);
	$stmt->bindParam(':jeniskelamin',$jeniskelamin);
	$stmt->bindParam(':idkelas',$idkelas);
	$stmt->bindParam(':tempatlahir',$tempatlahir);
	$stmt->bindParam(':tanggallahir',$tanggallahir);
	$stmt->bindParam(':notelepon',$notelepon);

	$eksekusi=$stmt->execute();
	if($eksekusi){
		header("location:manajemendata.php?hal=anggota");
	}else{
		echo "simpan gagal";
	}
}

function hapus_data($db){
	$nopendaftaran=$_GET['nopendaftaran'];
	$perintah="DELETE FROM anggota WHERE nopendaftaran='$nopendaftaran'";
	$hasil=$db->exec($perintah);
	if ($hasil)
	{
		header("location:manajemendata.php?hal=anggota");
	}else
	{
		echo "Hapus gagal";
	}
}

function update_data($db){
	$nopendaftaran=$_POST['nopendaftaran'];
	// $judul=$_POST['judul'];
	// $penulis=$_POST['penulis'];
	// $isbn=$_POST['isbn'];

	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$idprovinsi=$_POST['idprovinsi'];
	$idkota=$_POST['idkota'];
	$jeniskelamin=$_POST['jeniskelamin'];
	$idkelas=$_POST['idkelas'];
	$tempatlahir=$_POST['tempatlahir'];
	$tanggallahir=$_POST['tanggallahir'];
	$notelepon=$_POST['notelepon'];
	// $perintah="UPDATE anggota SET judul='$judul', penulis='$penulis',	isbn='$isbn' WHERE nopendaftaran='$id'";
	try{
	$query="update anggota set nopendaftaran=:nopendaftaran,nama=:nama,alamat=:alamat,idprovinsi=:idprovinsi,idkota=:idkota,
	jeniskelamin=:jeniskelamin,idkelas=:idkelas,tempatlahir=:tempatlahir,tanggallahir=:tanggallahir,notelepon=:notelepon where
	nopendaftaran=:nopendaftaran";

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $db->prepare($query);
	$stmt->bindParam(':nopendaftaran',$nopendaftaran);
	$stmt->bindParam(':nama',$nama);
	$stmt->bindParam(':alamat',$alamat);
	$stmt->bindParam(':idprovinsi',$idprovinsi);
	$stmt->bindParam(':idkota',$idkota);
	$stmt->bindParam(':jeniskelamin',$jeniskelamin);
	$stmt->bindParam(':idkelas',$idkelas);
	$stmt->bindParam(':tempatlahir',$tempatlahir);
	$stmt->bindParam(':tanggallahir',$tanggallahir);
	$stmt->bindParam(':notelepon',$notelepon);
	$stmt->bindParam(':nopendaftaran',$nopendaftaran);
	}catch(PDOException $e){
		echo $query . "<br>" . $e->getMessage();
	}
	$eksekusi=$stmt->execute();
	if($eksekusi){
		header("location:manajemendata.php?hal=anggota");
	}else
	{
		echo "update gagal";
	}
}


if(isset($_GET['proses']) and $_GET['proses']=='hapus'){
	hapus_data($db);
}else if(isset($_GET['proses']) and $_GET['proses']=='autosearch'){
	autosearch($db);
}else if(isset($_POST['proses']) and $_POST['proses']=='Simpan'){
	simpan_data($db);
}else if(isset($_POST['proses']) and $_POST['proses']=='Update'){
	update_data($db);
}else if(isset($_POST['proses']) and $_POST['proses']=='Cari'){
	cari_data($db);
}else{
	echo "gagal seleksi";
}
?>
