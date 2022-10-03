<?php 
if (!isset($_SESSION)) {
    session_start();
  }
  
  if (!isset($_SESSION['userID'])) {
      header('Location: login.php');
  }
  include_once "inc/connection.php";

  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']); 
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']); 
  $email  = mysqli_real_escape_string($conn, $_POST['email']); 
  $contact_number  = mysqli_real_escape_string($conn, $_POST['contact_number']); 
  $pack_stuts  = mysqli_real_escape_string($conn, $_POST['pack_stuts']); 
  $no_of_rooms  = mysqli_real_escape_string($conn, $_POST['no_of_rooms']); 
  $no_of_tents  = mysqli_real_escape_string($conn, $_POST['no_of_tents']); 
  $adults  = mysqli_real_escape_string($conn, $_POST['adults']); 
  $no_of_people  = mysqli_real_escape_string($conn, $_POST['no_of_people']); 
  $childern  = mysqli_real_escape_string($conn, $_POST['childern']); 
  $bid  = mysqli_real_escape_string($conn, $_POST['bid']); 

$sql = "UPDATE booking SET first_name   ='$first_name',
                                 last_name  ='$last_name',                  
                                 email ='$email',                  
                                 contact_number   ='$contact_number',                  
                                 status   ='$pack_stuts',                   
                                 no_of_rooms   ='$no_of_rooms',                   
                                 no_of_tents   ='$no_of_tents',                   
                                 adults   ='$adults',                   
                                 no_of_people   ='$no_of_people',                   
                                 childern   ='$childern'                   
                                 
                                 
                                 WHERE booking_id='$bid'";

if (mysqli_query($conn, $sql)) {
echo "success";
} else {
echo "error" . mysqli_error($conn);
}

?>
