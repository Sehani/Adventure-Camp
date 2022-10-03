<?php 
if (!isset($_SESSION)) {
    session_start();
  }
  
  if (!isset($_SESSION['userID'])) {
      header('Location: login.php');
  }
  include_once "inc/connection.php";

  $ac_name = mysqli_real_escape_string($conn, $_POST['ac_name']); 
  $aid  = mysqli_real_escape_string($conn, $_POST['aid']); 
  $ac_status  = mysqli_real_escape_string($conn, $_POST['ac_status']); 
  $ac_price  = mysqli_real_escape_string($conn, $_POST['ac_price']); 
  $ac_desc  = mysqli_real_escape_string($conn, $_POST['ac_desc']); 

$sql = "UPDATE camp_activity SET ac_name   ='$ac_name',
                                 ac_price  ='$ac_price',                  
                                 ac_status ='$ac_status',                  
                                 ac_desc   ='$ac_desc'                  
                                 
                                 
                                 WHERE aid='$aid'";

if (mysqli_query($conn, $sql)) {
echo "success";
} else {
echo "error" . mysqli_error($conn);
}

?>
