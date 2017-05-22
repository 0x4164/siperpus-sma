<body style="padding-top:50px;">
<?php
$page="formpustaka";
session_start();
include("database.php");
include ("head-html.php");
include ("navbar.php");

if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$query="select * from buku where id=".$id;
		$eksekusi=$db->prepare($query);
		$eksekusi->execute();
		$data=$eksekusi->fetch(PDO::FETCH_ASSOC);

			$id=$data['id'];
			$judul=$data['judul'];
			$penulis=$data['penulis'];
			$isbn=$data['isbn'];
	}

?>
<div class="container">
<form name="form-pustaka" action="aksi_pustaka.php" method="POST">
<table>
<tr>
	<td>Judul:</td>
	<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo $id;} ?>" />
	<td><input type="text" size="50" name="judul" value="<?php if(isset($_GET['id'])){echo $judul;} ?>" /></td>
</tr>
<tr>
	<td>Penulis:</td>
	<td><input type="text" size="25" name="penulis" value="<?php if(isset($_GET['id'])){echo $penulis;} ?>" /></td>
</tr>
<tr>
	<td>ISBN:</td>
	<td><input type="text" name="isbn" size="15" value="<?php if(isset($_GET['id'])){echo $isbn;} ?>" /></td>
</tr>
<tr>
	<td colspan="2">

	<?php
		if(isset($_GET['id'])){
			echo '<input type="submit" name="proses" value="Update" />';
		}else{
			echo '<input type="submit" name="proses" value="Simpan" />';
		}
	?>
	</td>
</tr>
</table>
</form>
</div>
<?php
//include ("footer.php");
?>
