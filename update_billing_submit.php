<?php
session_start();

if (isset($_SESSION['userID'])) {
    $cust_id = $_SESSION['userID'];
} else {
    header("Location: login-user.php");
}

include 'inc/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $date = date('Y-m-d H:i:s');

    $bookID = $_POST['bookID'];
    $check_in_date = $_POST['check_in_date'];
	$check_out_date = $_POST['check_out_date'];
	$cust_id = $_POST['cust_id'];
	$First_name = $_POST['First_name'];
	$Last_name = $_POST['Last_name'];
	$contact_number = $_POST['contact_number'];
	$email = $_POST['email'];
	$package = $_POST['Packages'];
	$Room_type = $_POST['Room_type'];
	$Tent_type = $_POST['Tent_type'];
	$Meals_type = $_POST['Meals_type'];
	$persons = $_POST['no_of_guest'];

    $sql = "UPDATE booking SET 

    booking_id ='$bookID', 
    check_in_date='$check_in_date', 
    check_out_date='$check_out_date', 
    customer_id='$cust_id', 
    first_name='$First_name', 
    last_name='$Last_name', 
    contact_number='$contact_number', 
    email='$email', 
    pack_id='$package', 
    room_type='$Room_type', 
    tent_type='$Tent_type', 
    meals_type='$Meals_type', 
    no_of_people='$persons',
    update_date='$date'
    
    WHERE booking_id ='$bookID'";

    if (mysqli_query($conn, $sql)) {
        echo "sucess";
    } else {
        echo "error" . mysqli_error($conn);
    }
}
