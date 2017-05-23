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
	<h2>Tambah Data Pustaka</h2>
<div class="row">
	<div class="col-lg-4 col-sm-12">
	<form name="form-pustaka" class="form form-horizontal" action="aksi_pustaka.php" method="POST">
	<div class="form-group">
		<label class="control-label col-sm-3">Judul:</label>
		<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo $id;} ?>" />
		<div class="col-sm-9">
			<input type="text" class="form-control" name="judul" value="<?php if(isset($_GET['id'])){echo $judul;} ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-3">Penulis:</label>
		<div class="col-sm-9"><input type="text" class="form-control"  size="25" name="penulis" value="<?php if(isset($_GET['id'])){echo $penulis;} ?>" /></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-3">ISBN:</label>
		<div class="col-sm-9"><input type="text" class="form-control"  name="isbn" size="15" value="<?php if(isset($_GET['id'])){echo $isbn;} ?>" /></div>
	</div>
	<div class="form-group">

		<?php
			if(isset($_GET['id'])){
				echo '<input type="submit" class="form-control col-sm-3 btn btn-success" name="proses" value="Update"/>';
			}else{
				echo '<input type="submit" class="form-control col-sm-3 btn btn-success" name="proses" value="Simpan"/>';
			}
		?>
	</div>
	</table>
	</form>
		</div>
	</div>
</div>
<?php
//include ("footer.php");
?>
