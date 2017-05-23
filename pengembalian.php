<a id="peminjaman" href="javascript:void()">Peminjaman</a>
	<table width="513" border="0" align="center">
	<tr bgcolor="#FFFFCC">
		<td width="10">Kode Pinjam</td>
		<td width="880">Peminjam</td>
		<td width="330">Tgl Dipinjam</td>
		<td width="330">Batas Pengembalian</td>
		<td>Buku yang dipinjam</td>
		<td>Status</td>
		<td></td>
	</tr>
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
		<td><ul>
			<?php  
				$query2="SELECT * FROM buku_dipinjam as p, buku as b WHERE p.idbuku=b.id and p.kodepinjam=".$data['kodepinjam'];
				$eksekusi2=$db->query($query2);
				while($data2=$eksekusi2->fetch(PDO::FETCH_ASSOC)){
					echo "<li>".$data2["judul"]."</li>";
				}
			?>
		</ul></td>
		<?php  
			if($data['status']==0){
				echo '<td>Belum Kembali</td>
					<td><a id="kembalikan-buku" href="javascript:kembali('.$data['kodepinjam'].')">Kembali</a></td>';
			}else{
				echo "<td>Telah dikembalikan</td>";
			}
		?>
		
	</tr>
	<?php
	}
	?>
	</table>
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