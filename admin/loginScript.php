<?php

if (!isset($_SESSION)) {
  session_start();
}

include('inc/connection.php');

if (isset($_POST['login'])) {
	
 
  
$uname = mysqli_real_escape_string($conn, $_POST['username']); 
$pass  = mysqli_real_escape_string($conn, $_POST['password']); 
 
$sql_login = "SELECT * FROM `administrator` WHERE username = '$uname' AND password = '$pass' AND status = 'Active' AND role = 'Admin' LIMIT 1";
 
  
$qry_login = mysqli_query($conn, $sql_login); 
$row       = mysqli_fetch_assoc($qry_login);
$totalrow  = mysqli_num_rows($qry_login);  
  
if ($totalrow > 0) {
   
  $_SESSION['userID']   = $row['userid']; 
 
	echo "SUCCESS";

           
}else{
	
	echo "ERROR";  
	
}

}

 

?>