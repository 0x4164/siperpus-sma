<?php
include("database.php");

function cari_data($db){
	$keyword=$_POST['katakunci'];
	$query="select * from buku where judul like '%".$keyword."%'";
	$eksekusi=$db->query($query);
	while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
	?>
	<tr>
		<td><?php echo $a; $a++;?></td>
		<td><?php echo $data['judul']; ?></td>
		<td><?php echo $data['penulis']; ?></td>
		<td><?php echo $data['isbn']; ?></td>
		<td><a id="show-form-ubah" href="form_pustaka.php?id=<?php echo $data['id'] ?>">edit</a></td>
		<td><a id="hapus-data" href="aksi_pustaka.php?id=<?php echo $data['id']."&" ?>proses=hapus">hapus</a></td>
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
	$judul=$_POST['judul'];
	$penulis=$_POST['penulis'];
	$isbn=$_POST['isbn'];
	$query="insert into buku (id,judul,penulis,isbn) values('','".$judul."','".$penulis."','".$isbn."')";
	$eksekusi=$db->exec($query);
	if($eksekusi){
		header("location:manajemendata.php?hal=pustaka");
	}else{
		echo "simpan gagal";;
	}
}

function hapus_data($db){
	$id=$_GET['id'];
	$perintah="DELETE FROM buku WHERE id='$id'";
	$hasil=$db->exec($perintah);
	if ($hasil)
	{
		header("location:manajemendata.php?hal=pustaka");
	}else
	{
		echo "Hapus gagal";
	}
}

function update_data($db){
	$id=$_POST['id'];
	$judul=$_POST['judul'];
	$penulis=$_POST['penulis'];
	$isbn=$_POST['isbn'];
	$perintah="UPDATE buku SET judul='$judul', penulis='$penulis',
	isbn='$isbn' WHERE id='$id'";
	$hasil=$db->exec($perintah);
	if ($hasil)
	{
		header("location:manajemendata.php?hal=pustaka");
	}else
	{
		echo "update gagal";
	}
}


if(isset($_GET['proses']) and $_GET['proses']=='hapus'){
	hapus_data($db);
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
