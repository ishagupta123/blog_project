<?php
    session_start();
    include_once "config.php";
   echo $thought= mysqli_real_escape_string($conn, $_POST['thought']);            
   echo  $user_id=$_SESSION['unique_id'];
  echo  $sql="INSERT INTO thoughts (user_id,thought) VALUES ({$user_id}, '{$thought}')";
    mysqli_query($conn,$sql);
    header("Location:home.php");
    
    
    
    
    
    
    
?>