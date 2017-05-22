<?php

include ("database.php");

function pengunjung_masuka($db){

}
function pengunjung_masuk_a($db){
	$nopendaftaran=intval(substr($_POST['nop'],0,5));
	if(is_string($nopendaftaran)){
		$nopendaftaran=1;
	}
	try {
	$query="insert into pengunjung (namap,nopendaftaran,masuk) select nama,nopendaftaran,now() from anggota where nopendaftaran=".$nopendaftaran;
	$eksekusi=$db->exec($query);
	if($eksekusi){
		print "berhasil";
	}else{
		print "gagal";
		echo $nopendaftaran;
	}
	  // $db = new PDO('mysql:host=localhost;dbname=siperpus;', 'root', '');
	  // echo "berhasil";
	} catch (PDOException $ex) {
	  echo "Koneksi Gagal!";
	    some_logging_function($ex->getMessage());
	}
	header("location:index.php");
}

function pengunjung_masuk_b($db){
	$nopendaftaran=1;
	$nama = $_POST['namap'];
	try {
	$query="insert into pengunjung (namap,nopendaftaran,masuk) select '".$nama."',nopendaftaran,now() from anggota where nopendaftaran=".$nopendaftaran;
	$eksekusi=$db->exec($query);
	if($eksekusi){
		print "berhasil";
	}else{
		print "gagal";
		echo $nopendaftaran;
	}
	  // $db = new PDO('mysql:host=localhost;dbname=siperpus;', 'root', '');
	  // echo "berhasil";
	} catch (PDOException $ex) {
	  echo "Koneksi Gagal!";
	    some_logging_function($ex->getMessage());
	}
	header("location:index.php");
}

function hapus_data($db){
	$nim=$_POST['nim'];
	$perintah="DELETE FROM mahasiswa WHERE nim='$nim'";
	$hasil=$db->exec($perintah);
	if ($hasil)
	{
		print "berhasil";
	}else
	{
		print "gagal";
	}
}

function pengunjung_keluar($db){
	$idpeng=$_POST['idpeng'];

	$perintah="UPDATE pengunjung SET keluar=now() WHERE idpeng='$idpeng'";
	$hasil=$db->exec($perintah);
	if ($hasil)
	{
		print "berhasil";
	}else
	{
		print "gagal";
	}
	header("location:index.php");
}
function pengunjung_keluar_semua($db){

	$perintah="UPDATE pengunjung SET keluar=now() WHERE keluar is null";
	$hasil=$db->exec($perintah);
	if ($hasil)
	{
		print "berhasil";
	}else
	{
		print "gagal";
	}
	header("location:index.php");
}

function proses_login($db){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from mahasiswa where username like '$username' and password like '$password'";
	$eksekusi=$db->prepare($query);
	$eksekusi->execute();
	$row=$eksekusi->fetch();
	if(isset($row['username']) and isset($row['password'])){
		session_start();
		$_SESSION['nama']=$row['nama'];
		print "berhasil";
	}else{
		print "gagal";
	}

}

function logout(){
	session_start();
	unset($_SESSION['nama']);
	session_destroy();
}

if(isset($_POST['proses']) and $_POST['proses']=='Hapus'){
	hapus_data($db);
}else if(isset($_POST['proses']) and $_POST['proses']=='pengunjung_masuk_a'){
	pengunjung_masuk_a($db);
}else if(isset($_POST['proses']) and $_POST['proses']=='pengunjung_masuk_b'){
	pengunjung_masuk_b($db);
}else if(isset($_POST['proses']) and $_POST['proses']=='pengunjung_keluar'){
	pengunjung_keluar($db);
}else if(isset($_POST['proses']) and $_POST['proses']=='pengunjung_keluar_semua'){
	pengunjung_keluar_semua($db);
}else if(isset($_POST['username']) and isset($_POST['password'])){
	proses_login($db);
}else if(isset($_POST['logout'])){
	logout();
}else{
	print "gagal2";
}
?>
