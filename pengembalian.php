<div class="container">
	<a id="peminjaman" href="javascript:void()">Peminjaman</a>
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
					<th>Kode Pinjam</th>
					<th>Peminjam</th>
					<th>Tgl Dipinjam</th>
					<th>Batas Pengembalian</th>
					<th>Buku yang dipinjam</th>
					<th>Status</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Kode Pinjam</th>
					<th>Peminjam</th>
					<th>Tgl Dipinjam</th>
					<th>Batas Pengembalian</th>
					<th>Buku yang dipinjam</th>
					<th>Status</th>
					<th>Opsi</th>
				</tr>
			</tfoot>
			<tbody>
	<?php
	include_once ("database.php");
	$query="SELECT * FROM peminjaman as p, anggota as a WHERE p.nopendaftaran=a.nopendaftaran";
	$eksekusi=$db->query($query);
	while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
	?>
	<tr>
		<td><?php echo $data['kodepinjam'];?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['tanggalpinjam']; ?></td>
		<td><?php echo $data['tanggalkembali']; ?></td>
		<td>
			<ul>
			<?php
				$query2="SELECT * FROM buku_dipinjam as p, buku as b WHERE p.idbuku=b.id and p.kodepinjam=".$data['kodepinjam'];
				$eksekusi2=$db->query($query2);
				while($data2=$eksekusi2->fetch(PDO::FETCH_ASSOC)){
					echo "<li>".$data2["judul"]."</li>";
				}
			?>
		</ul>
	</td>
		<?php
			if($data['status']==0){
				echo '<td>Belum Kembali</td>
					<td><a id="kembalikan-buku" href="javascript:kembali('.$data['kodepinjam'].')">Kembali</a></td>';
			}else{
				echo "<td>Telah dikembalikan</td><td><span class='glyphicon glyphicon-check'></span></td>";
			}
		?>
	</tr>
	<?php
	}
	?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
<!-- end row -->
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#peminjaman").click(function(){
	 $("#main-view").load("peminjaman.php");
	});
});

function kembali(param){
	var target="aksi_pinjam.php";
	var xdata={ kodepinjam : param }

	$.post(target,xdata,function(data){
	$("#main-view" ).load("pengembalian.php");
	});
}
</script>

<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.js"></script>
<!-- <script src="assets/vendor/chart.js/Chart.min.js"></script> -->
<script src="assets/js/sb-admin.min.js"></script>
