
<?php
/*
query statistik
 SELECT DISTINCT date(masuk) FROM `pengunjung` WHERE 1
 SELECT date(masuk),COUNT(*) FROM `pengunjung` GROUP by date(masuk)
*/
header('Content-Type: application/json');//penting

$page="statistik";
// include ("head-html.php");
include_once('database.php');

$query="SELECT date(masuk) as tanggal,COUNT(*) as jumlahpengunjung
FROM `pengunjung` GROUP by tanggal";
$eksekusi=$db->query($query);
//while($data=$eksekusi->fetch(PDO::FETCH_ASSOC))
$data = array();
foreach ($eksekusi as $row) {
  $data[] = $row;
}
echo json_encode($data);
?>
