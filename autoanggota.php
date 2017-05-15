<?php
include("database.php");

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

 ?>
