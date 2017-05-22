<?php
  session_start();
  include('database.php');

  $user=$_POST['user'];
  $pass=$_POST['pass'];

  $query = "select * from users where username='".$user."' and password='".$pass."'";
  $result = $db->prepare($query);
  $result->execute();
  $data = $result->fetch();
  // $rows = mysqli_fetch_array();
  // $rows = mysqli_num_rows($result);

  if($data>0){
    $_SESSION['username']=$data['username'];
    $_SESSION['password']=$data['password'];
    $_GET['page']="beranda";
    header("location:index.php");
  }else{
    // header("location:login.php");
    header("location:index.php");
  }

 ?>
