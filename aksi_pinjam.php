<?php  
session_start();
include_once ("database.php");
if(isset($_POST["idbuku"]))
{
 	$idbuku=$_POST["idbuku"];
		$query="select * from buku where id=".$idbuku;
		$eksekusi=$db->prepare($query);
		$eksekusi->execute();
		$data=$eksekusi->fetch(PDO::FETCH_ASSOC);
		if(isset($_SESSION["buku"])){  
			if(isset($_SESSION["buku"][$idbuku])) 
			{
				unset($_SESSION["buku"][$idbuku]); 
			}			
		}

	$_SESSION["buku"][$idbuku]=$data;
}else if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{
 
	if(isset($_SESSION["buku"]) && count($_SESSION["buku"])>0){ 
		$cart_box = '<h2>Cart Buku</h2><br><ul class="cart-bukus-loaded">';
		foreach($_SESSION["buku"] as $buku){ 
 
 			$buku_id = $buku["id"];
			$buku_judul = $buku["judul"]; 
			$buku_penulis = $buku["penulis"];
			$buku_isbn = $buku["isbn"];
 
			$cart_box .=  "<li> $buku_judul (penulis : $buku_penulis | $buku_isbn ) &mdash; <a href=javascript:hapus_cart($buku_id)>Hapus</a>&times;</li>";
			
		}
		$cart_box .= "</ul>";
		die($cart_box); 
	}else{
		die("Keranjang Buku Kosong"); 
	}
}else if(isset($_POST["hapusbuku"])){
	$hapusbuku   = $_POST["hapusbuku"];
 
	if(isset($_SESSION["buku"][$hapusbuku]))
	{
		unset($_SESSION["buku"][$hapusbuku]);
	}
}else if (isset($_POST["proses"])){
	$id=date('dmY');
	$idpeminjam=$_POST["anggota"];
	$id.=$idpeminjam."";
	$tglp=date('Y-m-d');
	$tglk=date('Y-m-d', strtotime("+30 days"));
	$query="insert into peminjaman (kodepinjam,nopendaftaran,tanggalpinjam,tanggalkembali,status) values('$id','".$idpeminjam."','".$tglp."','".$tglk."',0)";
	$eksekusi=$db->exec($query);	
	if($eksekusi){
		foreach($_SESSION["buku"] as $buku){ 
 			$buku_id = $buku["id"];
 			$query="insert into buku_dipinjam values ('','$id','$buku_id')";
 			$eksekusi=$db->exec($query);
 			if($eksekusi){
 				unset($_SESSION["buku"][$buku_id]);
 			}
 		}
 		print "berhasil";
	}else{
		print $query;
	}
}else if (isset($_POST["kodepinjam"])){
	$kodepinjam=$_POST["kodepinjam"];
	$perintah="UPDATE peminjaman SET status=1 WHERE kodepinjam='$kodepinjam'";
	$hasil=$db->exec($perintah);
	if ($hasil)
	{
		print "berhasil";
	}else
	{
		print $perintah;
	}
}

?>