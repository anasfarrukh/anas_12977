<?php
session_start();
  // include('connect.php');
   
   
   $user_check = $_SESSION['UserID'];
   
   $ses_sql = mysqli_query($db,"select UserID from users_12977 where UserID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['UserID'];
   
   if(!isset($_SESSION['UserID'])){
      header("location:login.php");
   }
?>