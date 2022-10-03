<?php 

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['userID'])) {
	header('Location: login.php');
}

include('inc/connection.php');

$current_date = date("Y-m-d");  

$ac_name           = mysqli_real_escape_string($conn,$_POST['ac_name']);
$ac_price            = mysqli_real_escape_string($conn,$_POST['ac_price']);
$ac_status    = mysqli_real_escape_string($conn,$_POST['ac_status']);
$ac_desc           = mysqli_real_escape_string($conn,$_POST['ac_desc']);

    

 $sql = "INSERT INTO camp_activity (`ac_name`,
                                    `ac_price`,
                                    `ac_status`,
                                    `ac_desc`) VALUES ('$ac_name',
                                                         '$ac_price',
                                                         '$ac_status',
                                                         '$ac_desc')";

   
         $result  = mysqli_query($conn,$sql);

         if($result){
             echo "sucess";
         }else{
             echo "error";
         }

?>