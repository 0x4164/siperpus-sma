<a id="peminjaman" href="javascript:void()">Peminjaman</a>
<!-- <a id="pengembalian" href="javascript:void()">Pengembalian</a> -->
<div class="container">
	<form id="form-peminjaman" class="form">
<div class="row">
	<div class="form-group col-lg-4">
		<label for="" class="control-label">Anggota:</label>
		<select name="anggota" class="form-control">
		<?php
		include_once ("database.php");
		$query="select * from anggota";
		$eksekusi=$db->query($query);
		while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
			if($data['nopendaftaran']==1){
				continue;
			}
		?>
		<option value="<?php echo $data['nopendaftaran']; ?>"><?php echo $data['nama']; ?></option>
		<?php
		}
		?>
		</select>
	</div>
	<div class="col-lg-8">
		<div id="cart-view" class=""></div>
		<input type="submit" class="btn btn-warning" name="proses" value="pinjam">
	</div>
</div>
</form>
<div class="row">
	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-table"></i>
		</div>
		<div class="card-block">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
					<!-- <table width="513" border="0" align="center"> -->
					<thead>
						<!-- <tr bgcolor="#FFFFCC"> -->
						<tr>
							<th>no</th>
							<th>judul</th>
							<th>penulis</th>
							<th>isbn</th>
							<th></th>
						</tr>
					</thead>
					<tfoot>
						<!-- <tr bgcolor="#FFFFCC"> -->
						<tr>
							<th>no</th>
							<th>judul</th>
							<th>penulis</th>
							<th>isbn</th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
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
								<td><a id="pinjam-buku" href="javascript:pinjam(<?php echo $data['id'] ?>)">pinjam</a></td>
							</tr>
							<?php
						}
						?>
						<!-- </table> -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- end container -->
</div>

<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.js"></script>
<!-- <script src="assets/vendor/chart.js/Chart.min.js"></script> -->
<script src="assets/js/sb-admin.min.js"></script>


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
