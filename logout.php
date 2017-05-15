<?php
  session_start();

  if($_REQUEST['lgout']=='y'){
    if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
      unset($_SESSION['username']);
      unset($_SESSION['password']);
    }
  }
  
  header("location:login.php");

  session_destroy();
?>
