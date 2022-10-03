<?php 
if (!isset($_SESSION)) {
    session_start();
  }
  
  if (!isset($_SESSION['userID'])) {
      header('Location: login.php');
  }
  include_once "inc/connection.php";

  $pack_name = mysqli_real_escape_string($conn, $_POST['pack_name']); 
  $pack_type = mysqli_real_escape_string($conn, $_POST['pack_type']); 
  $pid  = mysqli_real_escape_string($conn, $_POST['pid']); 
  $ac_price  = mysqli_real_escape_string($conn, $_POST['ac_price']); 
  $pack_stuts  = mysqli_real_escape_string($conn, $_POST['pack_stuts']); 
  $pack_details  = mysqli_real_escape_string($conn, $_POST['pack_details']); 

$sql = "UPDATE packages SET pack_name   ='$pack_name',
                                 pack_type  ='$pack_type',                  
                                 pack_price ='$ac_price',                  
                                 pack_details   ='$pack_details',                  
                                 pack_status   ='$pack_stuts'                   
                                 
                                 
                                 WHERE id='$pid'";

if (mysqli_query($conn, $sql)) {
echo "success";
} else {
echo "error" . mysqli_error($conn);
}

?>
