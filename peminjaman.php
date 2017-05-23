<form id="form-peminjaman">
Anggota:
<select name="anggota">
<?php
include_once ("database.php");  
$query="select * from anggota";
$eksekusi=$db->query($query);
while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
?>
<option value="<?php echo $data['nopendaftaran']; ?>"><?php echo $data['nama']; ?></option>
<?php  
}
?>
</select>


<table width="513" border="0" align="center">
<tr bgcolor="#FFFFCC">
	<td width="10">no</td>
	<td width="880">judul</td>
	<td width="220">penulis</td>
	<td width="330">isbn</td>
	<td></td>
</tr>
<?php
$a=1;
$query="select * from buku";
$eksekusi=$db->query($query);
while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
	<td><?php echo $a; $a++;?></td>
	<td><?php echo $data['judul']; ?></td>
	<td><?php echo $data['penulis']; ?></td>
	<td><?php echo $data['isbn']; ?></td>
	<td><a id="pinjam-buku" href="javascript:pinjam(<?php echo $data['id'] ?>)">pinjam</a>|</td>
</tr>
<?php
}
?>
</table>
<input type="submit" name="proses" value="pinjam">
</form>
<script type="text/javascript">
	$(document).ready(function(){
	$("#cart-view" ).load( "aksi_pinjam.php", {"load_cart":"1"}); 

	$("#form-peminjaman").submit(function(){
		 $.ajax({
			 type: "POST",
			 url:"aksi_pinjam.php",
			 data:$(this).serialize()+"&proses="+$("#proses").val(),
				success:function (data) {
				if (data=="berhasil") {
			      	$("#main-view").load("transaksi.php");
			      	$("#cart-view").empty();
				}else{
				    $("#main-view").html(data);
				}
				},
				error:function (data){
					alert('<h1>Penambahan peminjaman gagal !!</h1>');
				}
		 });
	 return false;
	});


	});

	function pinjam(param){
	var target="aksi_pinjam.php";
	var xdata={ idbuku : param }
			
	$.post(target,xdata,function(data){
	$("#cart-view" ).load( "aksi_pinjam.php", {"load_cart":"1"}); 
	});
	}

	function hapus_cart(param){
	var target="aksi_pinjam.php";
	var xdata={ hapusbuku : param }
			
	$.post(target,xdata,function(data){
	$("#cart-view" ).load( "aksi_pinjam.php", {"load_cart":"1"}); 
	});
	}
</script>