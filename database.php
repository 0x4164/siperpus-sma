<?php
  // $host = 'localhost';
  // $username = 'root';
  // $password = '';
  // $database = 'siperpus';

  // $connect = mysqli_connect($host,$username,$password,$database);

  // if($connect){
  //   echo "success";
  // }else{
  //   die('connection failure');
  // }

try {
  $db = new PDO('mysql:host=localhost;dbname=siperpus;', 'root', '');
  //echo "berhasil";
} catch (PDOException $ex) {
  echo "Koneksi Gagal!";
    some_logging_function($ex->getMessage());
}
?>
